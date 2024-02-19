<?php
namespace App\Services;
use App\DTOs\LeadHistoryData;
use App\Models\Contact;
use App\Models\LeadHistory;
use Illuminate\Support\Facades\Request;

class LeadHistoryService
{
    public function logAction(LeadHistoryData $leadHistoryData)
    {
        if(Request::is('admin/contact/changeStatus'))
        {
            $relatedModelId = $leadHistoryData->relatedModelId;
        } else {
            $relatedModelId = $leadHistoryData->relatedModelId->id;
        }
        $history = LeadHistory::create([
            'contact_id'       => $leadHistoryData->contactId,
            'action'           => $leadHistoryData->action,
            'related_model_id' => $relatedModelId,
            'placeholders'     => json_encode($leadHistoryData->placeholders),
            'created_by'       => $leadHistoryData->createdBy,
        ]);
    }



    public function organizeLeadHistoryForTimeline(Contact $contact)
    {
        $leadHistory  = $contact->leadHistories()->orderBy('created_at','desc')->get();
        $timelineData = [];
        foreach ($leadHistory as $record)
        {
            $date = $record->created_at->toDateString();
            if (!isset($timelineData[$date]))
            {
                $timelineData[$date] = [];
            }
            $timelineData[$date][] = $record;
        }
        return $timelineData;
    }
}
