<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JournalSlipResource\Pages;
use App\Filament\Resources\JournalSlipResource\RelationManagers;
use App\Models\JournalSlip;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JournalSlipResource extends Resource
{
    protected static ?string $model = JournalSlip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('approval_complaint_id')
                        ->relationship('approvalComplaint', 'claim_code')
                        ->searchable()->preload()->required()->label('Kode Persetujuan Klaim'),
                    Select::make('journal_information')->label('Informasi Jurnal')->required()->searchable()->preload()
                        ->options([
                            'Jurnal Atas Klaim Transaksi Yang Gagal' => 'Jurnal Atas Klaim Transaksi Yang Gagal'
                        ])
                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('approvalComplaint.claim_code')->label('Kode Klaim')->searchable(),
                TextColumn::make('journal_information')->label('Informasi Jurnal')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Download klaim')->icon('heroicon-m-arrow-down-tray')->color('warning')
                        ->url(fn(JournalSlip $record) => route('download.klaim', $record))->openUrlInNewTab(),
                    Action::make('Download jurnal')->icon('heroicon-m-arrow-down-tray')->color('warning')
                        ->url(fn(JournalSlip $record) => route('download.jurnal', $record))->openUrlInNewTab(),
                ])->button()->label('Download')->color('warning'),
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
            'index' => Pages\ListJournalSlips::route('/'),
            'create' => Pages\CreateJournalSlip::route('/create'),
            'edit' => Pages\EditJournalSlip::route('/{record}/edit'),
        ];
    }
}
