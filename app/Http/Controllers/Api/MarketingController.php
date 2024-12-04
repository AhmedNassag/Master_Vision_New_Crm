<?php
namespace App\Http\Controllers\Api;

use Validator;
use App\Models\City;
use App\Models\User;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Activity;
use App\Models\Campaign;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Models\ContactCompletion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MarketingController extends Controller
{
    use ApiResponseTrait;



    public function campaignContact(Request $request)
    {
        try
        {
            // Auth::login(User::first());
            $validator = Validator::make($request->all(), [
                "campaign_id" => "required|exists:campaigns,id",
                "name"        => "required|string",
                "mobile"      =>
                [
                    'required',
                    'numeric',
                    // 'regex:/^0\d{9,}$/',
                    
                    'unique:contacts,mobile,NULL,id,deleted_at,NULL',
                    \Illuminate\Validation\Rule::unique('contacts')->where(function ($query) use ($request) {
                        return $query->where('campaign_id', $request->campaign_id)->whereNull('deleted_at');
                    }),
                    function ($attribute, $value, $fail) {
                        $lastTenDigits = substr(preg_replace('/\D/', '', $value), -10);
                        $exists = Contact::whereRaw("SUBSTRING(mobile, -10) = ?", [$lastTenDigits])
                            ->whereNull('deleted_at')
                            ->exists();

                        if ($exists) {
                            $fail(trans('main.The mobile number already exists'));
                        }
                    }
                    
                    
                ],
                "custom_attributes" => "nullable|array",
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $campaign = Campaign::find($request->campaign_id);
            if(!$campaign)
            {
                $campaign = Campaign::latest()->first();
            }

            $data = Contact::create([
                'name'              => $request->name,
                'mobile'            => $request->mobile,
                'city_id'           => $request->city_id ?? null,
                'contact_source_id' => @$campaign->contact_source_id,
                'custom_attributes' => $request->custom_attributes,
                'campaign_id'       => @$campaign->id,
                //'created_by'        => auth()->user()->id,
                'activity_id'       => @$campaign->activity_id,
                'interest_id'       => @$campaign->interest_id,
            ]);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            //create in completion
            $this->completionData($request->all(), $data->id);

            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function completionData($inputs, $id)
    {
        //delete old records
        $oldContactCompletions = ContactCompletion::where('contact_id',$id)->get();
        if($oldContactCompletions->count() > 0)
        {
            foreach($oldContactCompletions as $oldContactCompletion)
            {
                $oldContactCompletion->delete();
            }
        }
        foreach($inputs as $key=>$input)
        {
            //insert new records
            if($key != "_token" && $key != "_method" && $key != "id" && $key != "created_by" && $input != null)
            {
                $contactCompletion = ContactCompletion::create([
                    'contact_id'    => $id,
                    'property_name' => $key,
                    // 'completed_by'  => auth()->user()->id,
                ]);
            }
        }
    }



    public function getCampaigns()
    {
        try
        {
            $data = Campaign::get(['id','name']);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getCountries()
    {
        try
        {
            $data = Country::get(['id','name']);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getCities()
    {
        try
        {
            $data = City::with(['country','areas'])->get(['id','name']);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getCitiesByCountryId($id)
    {
        try
        {
            $data = City::with(['country','areas'])->where('country_id',$id)->get(['id','name','country_id']);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getActivities()
    {
        try
        {
            $data = Activity::get();
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getSubActivitiesByActivityId($id)
    {
        try
        {
            $data = SubActivity::where('activity_id',$id)->get();
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
