<?php

namespace App\Filament\Resources\ApprovalComplaintResource\Pages;

use App\Filament\Resources\ApprovalComplaintResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApprovalComplaints extends ListRecords
{
    protected static string $resource = ApprovalComplaintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
