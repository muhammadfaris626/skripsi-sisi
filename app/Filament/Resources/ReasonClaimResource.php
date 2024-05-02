<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReasonClaimResource\Pages;
use App\Filament\Resources\ReasonClaimResource\RelationManagers;
use App\Models\ReasonClaim;
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

class ReasonClaimResource extends Resource
{
    protected static ?string $model = ReasonClaim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = "Masters";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('code')->required()->label('Kode Alasan Klaim'),
                    TextInput::make('name')->required()->label('Alasan Klaim')
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Kode Alasan Klaim')->searchable()->sortable(),
                TextColumn::make('name')->label('Alasan Klaim')->searchable()->sortable()
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
            'index' => Pages\ListReasonClaims::route('/'),
            'create' => Pages\CreateReasonClaim::route('/create'),
            'edit' => Pages\EditReasonClaim::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Alasan Klaim";
    }
}
