<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        TextInput::make('birth_place')->required()->label('Tempat Lahir'),
                        DatePicker::make('birth_date')->required()->label('Tanggal Lahir'),
                        TextInput::make('phone')->required()->label('No Handphone'),
                        TextInput::make('address')->required()->label('Alamat'),
                        TextInput::make('card_number')->required()->label('Nomor Rekening'),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function form(Form $form): Form
    {
        return $form;
    }
}
