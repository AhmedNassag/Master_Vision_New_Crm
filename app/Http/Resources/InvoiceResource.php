<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "invoice_number" => $this->invoice_number,
            "invoice_date" => $this->invoice_date,
            "total_amount" => $this->total_amount,
            "amount_paid" => $this->amount_paid,
            "debt" => $this->debt,
            "description" => $this->description,
            "status" => $this->status,
            "activity" => $this->activity->name,
            "interest" => $this->interest->name,
            "status" => $this->status,
        ];
    }
}
