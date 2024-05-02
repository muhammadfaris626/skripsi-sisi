<?php

namespace App\Filament\Resources\JournalSlipResource\Pages;

use App\Filament\Resources\JournalSlipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJournalSlips extends ListRecords
{
    protected static string $resource = JournalSlipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
