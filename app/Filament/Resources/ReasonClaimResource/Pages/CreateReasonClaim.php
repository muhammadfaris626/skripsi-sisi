<?php

namespace App\Filament\Resources\ReasonClaimResource\Pages;

use App\Filament\Resources\ReasonClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReasonClaim extends CreateRecord
{
    protected static string $resource = ReasonClaimResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
