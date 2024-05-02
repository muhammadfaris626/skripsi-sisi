<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionFeatureResource\Pages;
use App\Filament\Resources\TransactionFeatureResource\RelationManagers;
use App\Models\TransactionFeature;
use Filament\Forms;
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

class TransactionFeatureResource extends Resource
{
    protected static ?string $model = TransactionFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = "Masters";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('code')->required()->label('Kode Fitur Transaksi'),
                    TextInput::make('name')->required()->label('Fitur Transaksi')
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Kode Fitur Transaksi')->searchable()->sortable(),
                TextColumn::make('name')->label('Fitur Transaksi')->searchable()->sortable()
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
            'index' => Pages\ListTransactionFeatures::route('/'),
            'create' => Pages\CreateTransactionFeature::route('/create'),
            'edit' => Pages\EditTransactionFeature::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Fitur Transaksi";
    }
}
