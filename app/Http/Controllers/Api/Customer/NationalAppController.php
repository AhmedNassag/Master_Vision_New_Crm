<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Api\NationalApp\NationalAppInterface;
use App\Repositories\Api\NationalApp\NationalAppRepository;

class NationalAppController extends Controller
{
    protected $nationalApp;

    public function __construct(NationalAppInterface $nationalApp)
    {
      $this->nationalApp = $nationalApp;
    }

    public function home($id)
    {
        return $this->nationalApp->home($id);
    }



    public function currentInvoices($id)
    {
      return $this->nationalApp->currentInvoices($id);
    }



    public function finishedInvoices($id)
    {
      return $this->nationalApp->finishedInvoices($id);
    }



    public function updateProfile($id, Request $request)
    {
      return $this->nationalApp->updateProfile($id, $request);
    }
}
