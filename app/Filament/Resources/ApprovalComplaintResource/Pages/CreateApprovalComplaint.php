<?php

namespace App\Filament\Resources\ApprovalComplaintResource\Pages;

use App\Filament\Resources\ApprovalComplaintResource;
use App\Models\Fpkn;
use App\Models\User;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateApprovalComplaint extends CreateRecord
{
    protected static string $resource = ApprovalComplaintResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $fpkn = Fpkn::where('id', $data['fpkn_id'])->first();
        $fpkn->card_center_status = 1;
        $fpkn->save();
        $data['claim_code'] = 'KLAIM-PP-'.Carbon::now()->format('dmY').'-'.rand(100,999);
        $data['user_id'] = auth()->id();
        Notification::make()
            ->success()
            ->title('Card Center : '.Auth::user()->name)
            ->body('Telah melakukan persetujuan pengaduan, dengan kode klaim : '.$data['claim_code'])
            ->sendToDatabase(User::whereHas('roles', function ($query) {
                $query->where('name', 'settlement');
            })->get());
        return $data;
    }
}
