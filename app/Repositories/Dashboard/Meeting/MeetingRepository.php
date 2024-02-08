<?php

namespace App\Repositories\Dashboard\Meeting;

use App\Models\Meeting;
use App\Models\MeetingNote;
use App\Services\LeadHistoryService;
use Illuminate\Support\Facades\Auth;
use App\DTOs\LeadHistoryData;
use App\Constants\LeadHistory\Actions as ActionConstants;

class MeetingRepository implements MeetingInterface
{
    public function index($request)
    {
        $data = Meeting::with('country')
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

        return view('dashboard.city.index',compact('data'))
        ->with([
            'name'       => $request->name,
            'country_id' => $request->country_id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
        ]);
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
			$data      = Meeting::create([
                'type'          => $request->type,
                'meeting_place' => $request->meeting_place,
                'meeting_date'  => $request->meeting_date,
                'revenue'       => $request->revenue,
                'interests_ids' => $request->interests_ids,
                'contact_id'    => $request->contact_id,
                'reply_id'      => $request->reply_id,
                'created_by'    => Auth::user()->context_id,
            ]);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $meeting = Meeting::find($data->id);
            $meeting->interests()->attach($request->interests_ids);
			if(!empty($request->notes) && !empty($request->follow_date))
			{
                $notes = new MeetingNote;
				$notes->notes       = $request->notes;
				$notes->follow_date = $request->follow_date;
				$notes->meeting_id  = $data->id;
				$notes->created_by  = Auth::user()->context_id;
				$notes->save();

                $meeting_count = Meeting::where('contact_id',$meeting->contact->id)->count();
				if($meeting_count == 1)
				{
                    $meeting->contact->status = 'contacted';
					$meeting->contact->save();
				}
				$leadHistoryData    = new LeadHistoryData($meeting->contact->id, ActionConstants::CALL_CREATED, $data, $notes, Auth::user()->context_id);
				$leadHistoryService = new LeadHistoryService();
				$leadHistoryService->logAction($leadHistoryData);
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
            $inputs    = $request->all();
            $data      = $this->model::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update($inputs);
            if (!$data) {
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
            $data = $this->model::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
