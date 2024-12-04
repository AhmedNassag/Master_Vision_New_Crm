<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Meeting;
use App\Models\MeetingNote;
use App\Services\LeadHistoryService;
use App\DTOs\LeadHistoryData;
use App\Constants\LeadHistory\Actions as ActionConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class MeetingController extends Controller
{
    use ApiResponseTrait;

    function __construct()
    {
        $this->middleware('permission:إضافة مكالمات جهات الإتصال', ['only' => ['store']]);
    }



    public function index(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like', '%'.$request->name.'%');
                })
                ->when($request->country_id != null,function ($q) use($request){
                    return $q->where('country_id', $request->country_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like', '%'.$request->name.'%');
                })
                ->when($request->country_id != null,function ($q) use($request){
                    return $q->where('country_id', $request->country_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else
            {
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->whereRelation('createdBy','id', $auth_user->employee->id)
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like', '%'.$request->name.'%');
                })
                ->when($request->country_id != null,function ($q) use($request){
                    return $q->where('country_id', $request->country_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        try {

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Meeting::findOrFail($id);
                // return $this->apiResponse($id, 'The Data Returned Successfully', 200);
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->findOrFail($id);
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
                ->findOrFail($id);
            }
            else
            {
                $data = Meeting::with('notes','creator','contact','interests','reply','createdBy')
                ->whereRelation('createdBy','id', $auth_user->employee->id)
                ->findOrFail($id);
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'           => 'required|exists:users,id',
                'type'            => 'required|string|in:call,meeting',
                'meeting_place'   => 'required|string|in:in,out',
                'meeting_date'    => 'required|date',
                'follow_date'     => 'required|date',
                'revenue'         => 'required|numeric',
                'notes'           => 'required|string',
                'interests_ids.*' => 'required|integer|exists:interests,id',
                'contact_id'      => 'required|integer|exists:contacts,id',
                'reply_id'        => 'required|integer|exists:saved_replies,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $data      = Meeting::create([
                'type'          => $request->type,
                'meeting_place' => $request->meeting_place,
                'meeting_date'  => $request->meeting_date,
                'revenue'       => $request->revenue,
                'interests_ids' => $request->interests_ids,
                'contact_id'    => $request->contact_id,
                'reply_id'      => $request->reply_id,
                'created_by'    => auth()->guard('api')->user()->context_id,
            ]);
            $meeting = Meeting::find($data->id);
            $meeting->interests()->attach($request->interests_ids);
			if(!empty($request->notes) && !empty($request->follow_date))
			{
                $notes = new MeetingNote;
				$notes->notes       = $request->notes;
				$notes->follow_date = $request->follow_date;
				$notes->meeting_id  = $data->id;
				$notes->created_by  = auth()->guard('api')->user()->context_id;
				$notes->save();

                $meeting_count = Meeting::where('contact_id',$request->contact_id)->count();
				if($meeting_count == 1)
				{
                    $meeting->contact->status = 'contacted';
					$meeting->contact->save();
				}
				$leadHistoryData    = new LeadHistoryData($request->contact_id, ActionConstants::CALL_CREATED,$data, $notes, auth()->guard('api')->user()->context_id);
				$leadHistoryService = new LeadHistoryService();
				$leadHistoryService->logAction($leadHistoryData);
			}

            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    public function update(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
                'type'            => 'required|string|in:call,meeting',
                'meeting_place'   => 'required|string|in:in,out',
                'meeting_date'    => 'required|date',
                'follow_date'     => 'required|date',
                'revenue'         => 'required|numeric',
                'notes'           => 'required|string',
                'interests_ids.*' => 'required|integer|exists:interests,id',
                'contact_id'      => 'required|integer|exists:contacts,id',
                'reply_id'        => 'required|integer|exists:saved_replies,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $data      = Meeting::find($request->id);
            $data->update([
                'type'          => $request->type,
                'meeting_place' => $request->meeting_place,
                'meeting_date'  => $request->meeting_date,
                'revenue'       => $request->revenue,
                'interests_ids' => $request->interests_ids,
                'contact_id'    => $request->contact_id,
                'reply_id'      => $request->reply_id,
                'created_by'    => Auth::user()->context_id,
            ]);

            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {

            $data = Meeting::findOrFail($request->id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->delete();
            return $this->apiResponse(null,'The Data Deleted Successfully', 200);
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
