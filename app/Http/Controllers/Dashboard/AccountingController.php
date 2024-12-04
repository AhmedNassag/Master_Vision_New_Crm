<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Accounting\AccountingInterface;
use App\Http\Requests\Dashboard\Accounting\StoreRequest;
use App\Http\Requests\Dashboard\Accounting\UpdateRequest;

class AccountingController extends Controller
{
    protected $accounting;

    public function __construct(AccountingInterface $accounting)
    {
        $this->accounting = $accounting;
        $this->middleware('permission:عرض الإيصالات', ['only' => ['invoice','receipt']]);
    }



    public function invoice($id)
    {
        return $this->accounting->invoice($id);
    }



    public function receipt($id)
    {
        return $this->accounting->receipt($id);
    }
}
