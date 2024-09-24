<?php

namespace App\Repositories\Dashboard\CustomerPortal;


use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use App\Models\Major;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Activity;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\JobTitle;
use App\Models\Attachment;
use App\Models\ContactSource;
use App\Models\ReorderReminder;
use App\Imports\CustomersImport;
use App\Models\ContactCompletion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Observers\ContactDataObserver;
use Illuminate\Support\Facades\Storage;



class CustomerPortalRepository implements CustomerPortalInterface
{
    // public function show($id)
    // {
    //     $item = Customer::with(['customerSource','city','area','customerCategory','activity'])->findOrFail($id);
    //     if(isset($id))
    //     {
    //         $module            = Customer::get();
    //         $attachmentsModule = Attachment::get();
    //         $cities            = City::get();
    //         $areas             = Area::get();
    //         $industries        = Industry::get();
    //         $majors            = Major::get();
    //         $activities        = Activity::get();
    //         $contactSources    = ContactSource::get();

    //         return view('dashboard.customer.show', [
    //             'attachmentsModule' => $attachmentsModule,
    //             'contactSources'    => $contactSources,
    //             'cities'            => $cities,
    //             'areas'             => $areas,
    //             'industries'        => $industries,
    //             'majors'            => $majors,
    //             'activities'        => $activities,
    //         ])->with('item', $item);
    //     }
    //     else
    //     {
    //         return view('404');
    //     }
    // }



    // public function create()
    // {
    //     return view('dashboard.customer.create');
    // }



    // public function store($request)
    // {
    //     try {
    //         $validated                   = $request->validated();
    //         $inputs                      = $request->except('photo','tag_ids','mobile_whatsapp_checkbox','mobile2_whatsapp_checkbox');
    //         $inputs['has_special_needs'] = $request->has_special_needs ? 1 : 0;
    //         $inputs['created_by']        = Auth::user()->employee->id;
    //         $data                        = Customer::create($inputs);
    //         if (!$data) {
    //             session()->flash('error');
    //             return redirect()->back();
    //         }
    //         //create code
    //         $data->update(['code' => $this->createCode($data)]);
    //         //upload photo
    //         if ($request->hasFile('photo')) {
    //             $file      = $request->photo;
    //             $file_size = $file->getSize();
    //             $file_type = $file->getMimeType();
    //             $file_name = time() . '.' . $file->getClientOriginalName();
    //             $file->storeAs('customer', $file_name, 'attachments');
    //             $data->media()->create([
    //                 'file_path' => asset('attachments/customer/' . $file_name),
    //                 'file_name' => $file_name,
    //                 'file_size' => $file_size,
    //                 'file_type' => $file_type,
    //                 'file_sort' => 1,
    //             ]);
    //         }

    //         // Attach tags to the customer
    //         $tagIds = $request->input('tag_ids', []);
    //         $data->tags()->sync($tagIds);

    //         session()->flash('success');
    //         return redirect()->route('customer.index');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }



    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $jobTitles = JobTitle::all();
        return view('customer-portal.dashboard.profile.edit-profile', compact('customer','jobTitles'));
    }



    public function update($request)
    {
        try {
            $validated = $request->validate([
                'name' => "required|string|max:255",
                "email" => "required|email|string|max:255",
                "mobile" => "required|regex:/^\d{11,}$/",
                "password" => "nullable|confirmed",
                "national_id" => "nullable",
                "job_title_id" => "nullable|integer"
            ]);
            // $inputs                      = $request->except('photo','tag_ids','mobile_whatsapp_checkbox','mobile2_whatsapp_checkbox');
            // $inputs['has_special_needs'] = $request->has_special_needs ? 1 : 0;
            $data = Customer::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            //Check-Password
            if($request->old_password)
            {
                $password_verify = password_verify($request->old_password,$data->password);
                // $password_verify = Hash::check($request->old_password,$data->password);
                if(!$password_verify)
                {
                    session()->flash('error');
                    return redirect()->back();
                }
                $validated->password = Hash::make($validated->password);
            }

            //update data
            $dataUpdate = $data->update($validated);
            // update photo
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                //remove old photo
                if($data->media) {
                    Storage::disk('attachments')->delete('customer/' . $data->media->file_name);
                    $data->media->delete();
                }
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('customer', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }

            if ($dataUpdate)
            {
                return "success";
            }
            // session()->flash('success');
            // return redirect()->route('customer.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editPassword($id)
    {
        $customer = Customer::find($id);
        return view('customer-portal.dashboard.profile.change-password', compact('customer'));
    }

    public function updatePassword($request)
    {
        try {
            $validated = $request->validate([
                "old_Password" =>"required",
                "password" => "required|min:8|confirmed",
            ]);

            $data = Customer::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            $password_verify = password_verify($request->old_Password,$data->password);
            if(!$password_verify)
            {
                session()->flash('error');
                return redirect()->back();
            }
            $request->password = Hash::make($request->password);

            //update data
            $dataUpdate = $data->update([
                'password' => $validated['password']
            ]);

            if ($dataUpdate)
            {
                return "success";
            }
            // session()->flash('success');
            // return redirect()->route('customer.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function deleteSelected($request)
    // {
    //     try {
    //         $delete_selected_id = explode(",", $request->delete_selected_id);
    //         // foreach($delete_selected_id as $selected_id) {
    //         //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
    //         //     if($related_table->count() == 0) {
    //                 $customers = Customer::whereIn('id', $delete_selected_id)->get();
    //                 foreach($customers as $customer)
    //                 {
    //                     $customer->delete();
    //                 }
    //                 session()->flash('success');
    //                 return redirect()->back();
    //         //     } else {
    //         //         session()->flash('canNotDeleted');
    //         //         return redirect()->back();
    //         //     }
    //         // }
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }

}
