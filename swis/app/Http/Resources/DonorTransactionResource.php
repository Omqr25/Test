<?php

namespace App\Http\Resources;

use App\Enums\transactionModeType;
use App\Enums\transactionType;
use App\Enums\transactionStatusType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonorTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'donor_id' => $this->user->name,
            'is_convoy' => $this->is_convoy,
            'notes' => $this->notes,
            'code' => $this->code,
            'status' => $this->status instanceof transactionStatusType ? $this->status->name : null,
            'date' => $this->date,
            'transaction_type' => $this->transaction_type instanceof transactionType ? $this->transaction_type->name : null,
            'transaction_mode_type' => $this->transaction_mode_type instanceof transactionModeType ? $this->transaction_mode_type->name : null,
            'waybill_num' => $this->waybill_num,
            'waybill_img' => $this->imageUrl('waybill_img'),
            'qr_code' => $this->imageUrl('qr_code'),
            'CTN'=>$this->CTN,
            'driver'=>$this->driverTransaction->map(function ($transactionDriver){
                return new DriverResource($transactionDriver);
            }),
            'items'=>$this->transactionWarehouseItem->map(function ($transactionItem){
                return new transactionItemForDonorResource($transactionItem);
            }),
        ];
    }
}
