<?php

namespace App\Console;

use App\Models\Point;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use App\Notifications\CheckPointNotification;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\CheckTodayReminder::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
        protected function schedule(Schedule $schedule)
        {
            $schedule->command('CheckTodayReminder')->daily();
            // $schedule->command('inspire')->hourly();
            $schedule->call(function() {
                try {
                    // $points = Point::where('exp_date', '<=', now()->addDays(3))->get();
                    $points = Point::whereBetween('expiry_date', [now()->startOfDay(), now()->addDays(3)->endOfDay()])->get();

                    foreach ($points as $point) {
                        $notifiable = $point->customer;
            
                        if ($notifiable) {
                            $notifiable->notify(new CheckPointNotification($notifiable));
                        }
                    }
                } catch (\Exception $e) {
                    Log::error('Error in CheckPointsExpiration: ' . $e->getMessage());
                }
            })->everyMinute();
        }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
