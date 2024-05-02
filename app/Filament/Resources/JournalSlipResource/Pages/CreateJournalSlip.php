<?php

namespace App\Filament\Resources\JournalSlipResource\Pages;

use App\Filament\Resources\JournalSlipResource;
use App\Models\ApprovalComplaint;
use App\Models\Fpkn;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJournalSlip extends CreateRecord
{
    protected static string $resource = JournalSlipResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $approvalComplaint = ApprovalComplaint::where('id', $data['approval_complaint_id'])->first();
        $fpkn = Fpkn::where('id', $approvalComplaint->fpkn_id)->first();
        $fpkn->settlement_status = 1;
        $fpkn->save();
        $data['user_id'] = auth()->id();
        return $data;
    }
}
