<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionTypeResource\Pages;
use App\Filament\Resources\TransactionTypeResource\RelationManagers;
use App\Models\TransactionType;
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

class TransactionTypeResource extends Resource
{
    protected static ?string $model = TransactionType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = "Masters";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('code')->required()->label('Kode Transaksi'),
                    TextInput::make('name')->required()->label('Jenis Transaksi')
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Kode Transaksi')->searchable()->sortable(),
                TextColumn::make('name')->label('Jenis Transaksi')->searchable()->sortable()
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
            'index' => Pages\ListTransactionTypes::route('/'),
            'create' => Pages\CreateTransactionType::route('/create'),
            'edit' => Pages\EditTransactionType::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Jenis Transaksi";
    }
}
