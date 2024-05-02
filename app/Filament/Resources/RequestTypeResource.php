<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestTypeResource\Pages;
use App\Filament\Resources\RequestTypeResource\RelationManagers;
use App\Models\RequestType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestTypeResource extends Resource
{
    protected static ?string $model = RequestType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = "Masters";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')->label('Kode Permintaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')->label('Jenis Permintaan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Permintaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')->label('Jenis Permintaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRequestTypes::route('/'),
            'create' => Pages\CreateRequestType::route('/create'),
            'edit' => Pages\EditRequestType::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Jenis Permintaan";
    }
}
