<?php

namespace App\Filament\Resources\FpknResource\Pages;

use App\Filament\Resources\FpknResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFpkn extends EditRecord
{
    protected static string $resource = FpknResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
