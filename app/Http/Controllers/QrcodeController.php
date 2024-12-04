<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        $qrCodeData = json_encode([
            'name'  => $customer->name,
            'email' => $customer->email,
            'mobile'=> $customer->mobile,
        ]);

        return view('dashboard.qrcode.show', [
            'customer' => $customer,
            'qrCode'   => QrCode::size(200)->generate($qrCodeData),
        ]);
    }



    public function showDetails($id)
    {
        $item = Customer::findOrFail($id);

        return view('dashboard.qrcode.showDetails', [
            'item' => $item,
        ]);
    }



    public function showApi($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }
}
