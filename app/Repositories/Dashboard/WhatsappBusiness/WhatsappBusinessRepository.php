<?php

namespace App\Repositories\Dashboard\WhatsappBusiness;

use App\Models\LAConfigs;

class WhatsappBusinessRepository implements WhatsappBusinessInterface
{
    public function index($request)
    {
        $data = [];
        $whatsapp_business_phone_number_id = LAConfigs::where('key','whatsapp_business_phone_number_id')->first();
        $whatsapp_business_access_token    = LAConfigs::where('key','whatsapp_business_access_token')->first();


        if($whatsapp_business_phone_number_id && $whatsapp_business_access_token)
        {
            $whatsapp_business_phone_number_id_value = $whatsapp_business_phone_number_id->value;
            $whatsapp_business_access_token_value    = $whatsapp_business_access_token->value;
            $data['whatsapp_business_phone_number_id'] = $whatsapp_business_phone_number_id_value;
            $data['whatsapp_business_access_token']    = $whatsapp_business_access_token_value;
        }


        return view('dashboard.whatsappBusiness.index',compact('data'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            //insert data
            $whatsappBusiness = LAConfigs::create([
                'key'   => 'whatsapp_business_phone_number_id',
                'value' => $request->whatsapp_business_phone_number_id,
            ]);
            $whatsappBusiness = LAConfigs::create([
                'key'   => 'whatsapp_business_access_token',
                'value' => $request->whatsapp_business_access_token,
            ]);
            if (!$whatsappBusiness) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $whatsapp_business_phone_number_id  = LAConfigs::where('key','whatsapp_business_phone_number_id')->first();
            $whatsapp_business_phone_number_id->update(['value' => $request->whatsapp_business_phone_number_id]);
            if (!$whatsapp_business_phone_number_id) {
                session()->flash('error');
                return redirect()->back();
            }

            $whatsapp_business_access_token  = LAConfigs::where('key','whatsapp_business_access_token')->first();
            $whatsapp_business_access_token->update(['value' => $request->whatsapp_business_access_token]);
            if (!$whatsapp_business_access_token) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            // $related_table = realed_model::where('category_id', $request->id)->pluck('category_id');
            // if($related_table->count() == 0) {
                $whatsapp_business_phone_number_id  = LAConfigs::where('key','whatsapp_business_phone_number_id')->first();
                $whatsapp_business_phone_number_id->delete();
                if (!$whatsapp_business_phone_number_id) {
                    session()->flash('error');
                    return redirect()->back();
                }

                $whatsapp_business_access_token  = LAConfigs::where('key','whatsapp_business_access_token')->first();
                $whatsapp_business_access_token->delete();
                if (!$whatsapp_business_access_token) {
                    session()->flash('error');
                    return redirect()->back();
                }

                session()->flash('success');
                return redirect()->back();
            // } else {
                // session()->flash('canNotDeleted');
                // return redirect()->back();
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
