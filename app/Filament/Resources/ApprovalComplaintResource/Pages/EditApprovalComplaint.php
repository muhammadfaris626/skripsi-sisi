<?php

namespace App\Filament\Resources\ApprovalComplaintResource\Pages;

use App\Filament\Resources\ApprovalComplaintResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApprovalComplaint extends EditRecord
{
    protected static string $resource = ApprovalComplaintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
