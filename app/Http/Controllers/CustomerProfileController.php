<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\CustomerPortal\CustomerPortalInterface;

class CustomerProfileController extends Controller
{
    protected $customerPortal;
    public function __construct(CustomerPortalInterface $customerPortal)
    {
        $this->customerPortal = $customerPortal;
    }

    public function edit($id)
    {
       return $this->customerPortal->edit($id);
    }

    public function editPassword($id)
    {
       return $this->customerPortal->editPassword($id);
    }

    public function update(Request $request)
    {
        $data = $this->customerPortal->update($request);

        if ($data == "success") {
            session()->flash('success');
            return redirect()->route('customer.home');
        }
    }
  
    public function updatePassword(Request $request)
    {
        $data = $this->customerPortal->updatePassword($request);

        if ($data == "success") {
            session()->flash('success');
            return redirect()->route('customer.home');
        } else {
            return redirect()->back();
        }
    }

    
}
