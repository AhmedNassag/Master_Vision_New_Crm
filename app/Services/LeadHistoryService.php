<?php
namespace App\Services;
use App\DTOs\LeadHistoryData;
use App\Models\Contact;
use App\Models\LeadHistory;

class LeadHistoryService
{
    public function logAction(LeadHistoryData $leadHistoryData)
    {
        $history = LeadHistory::create([
            'contact_id'       => $leadHistoryData->contactId,
            'action'           => $leadHistoryData->action,
            'related_model_id' => $leadHistoryData->relatedModelId->id,
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
