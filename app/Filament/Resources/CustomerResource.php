<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')->required()->label('Nama Lengkap'),
                    TextInput::make('email')->email()->unique()->required()->label('Email'),
                    TextInput::make('birth_place')->required()->label('Tempat Lahir'),
                    DatePicker::make('birth_date')->required()->label('Tanggal Lahir'),
                    TextInput::make('phone')->required()->label('No Handphone'),
                    TextInput::make('address')->required()->label('Alamat'),
                    TextInput::make('card_number')->required()->label('Nomor Rekening')
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label('Nama Lengkap'),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable()->label('No Handphone')
                ->description(fn (Customer $record): string => $record->address),
                TextColumn::make('birth_place')->label('Tempat Tanggal Lahir')
                    ->description(fn (Customer $record): string => $record->birth_date),
                TextColumn::make('card_number')->searchable()->label('Nomor Rekening')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'view' => Pages\ViewCustomer::route('/{record}'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Nasabah";
    }
}
