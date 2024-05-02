<?php

namespace App\Filament\Resources\JournalSlipResource\Pages;

use App\Filament\Resources\JournalSlipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJournalSlip extends EditRecord
{
    protected static string $resource = JournalSlipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
