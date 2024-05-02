<?php

namespace App\Filament\Resources\TransactionFeatureResource\Pages;

use App\Filament\Resources\TransactionFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionFeatures extends ListRecords
{
    protected static string $resource = TransactionFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
