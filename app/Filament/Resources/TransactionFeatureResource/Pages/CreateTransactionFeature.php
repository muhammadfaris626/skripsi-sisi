<?php

namespace App\Filament\Resources\TransactionFeatureResource\Pages;

use App\Filament\Resources\TransactionFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactionFeature extends CreateRecord
{
    protected static string $resource = TransactionFeatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
