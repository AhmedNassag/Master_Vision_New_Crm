<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use App\Models\ReorderReminder;
use App\Notifications\TodayReminderNotification;

class CheckTodayReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CheckTodayReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Check the database value
        $reminders = ReorderReminder::whereDate('reminder_date',Carbon::today())->get();
        foreach($reminders as $reminder)
        {
            $value          = $reminder->reminder_date; // Retrieve the value from the database
            $formattedValue = date('Y-m-d', strtotime($value));

            if ($formattedValue == now()->format('Y-m-d'))
            {
                // Value matches today's date, send notification
                if($reminder->customer->created_by != null)
                {
                    $user = User::where('context_id',$reminder->customer->created_by)->first(); // Example user, you should retrieve the user from the database
                    $user->notify(new TodayReminderNotification($reminder));
                }
            }
        }
    }
}
