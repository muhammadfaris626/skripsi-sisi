<?php

namespace App\Filament\Resources\ReasonClaimResource\Pages;

use App\Filament\Resources\ReasonClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReasonClaims extends ListRecords
{
    protected static string $resource = ReasonClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
