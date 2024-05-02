<?php

namespace App\Filament\Resources\FpknResource\Pages;

use App\Filament\Resources\FpknResource;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
class CreateFpkn extends CreateRecord
{
    protected static string $resource = FpknResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $customer = Customer::where('user_id', auth()->id())->first();
        $data['complaint_code'] = 'CC-'.Carbon::now()->format('dmY').rand(100,999);
        $data['customer_id'] = $customer->id;
        Notification::make()
            ->success()
            ->title('Nasabah :'.$customer->name)
            ->body('Telah melakukan pengaduan, dengan kode pengaduan : '.$data['complaint_code'])
            ->sendToDatabase(User::whereHas('roles', function ($query) {
                $query->where('name', 'card center');
            })->get());
        return $data;
    }
}
