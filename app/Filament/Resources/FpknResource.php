<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FpknResource\Pages;
use App\Filament\Resources\FpknResource\RelationManagers;
use App\Models\ApprovalComplaint;
use App\Models\Fpkn;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class FpknResource extends Resource
{
    protected static ?string $model = Fpkn::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Formulir')->schema([
                    Select::make('branch_id')
                        ->relationship('branch', 'name')
                        ->required()->searchable()->preload()->label('Nama Cabang'),
                    Select::make('request_type_id')
                        ->relationship('requestType', 'name')
                        ->required()->searchable()->preload()->label('Jenis Pengaduan'),
                    DateTimePicker::make('form_date')->required()->label('Tanggal Pengaduan'),
                    Select::make('transaction_type_id')
                        ->relationship('transactionType', 'name')
                        ->required()->searchable()->preload()->label('Jenis Transaksi'),
                    Select::make('transaction_feature_id')
                        ->relationship('transactionFeature', 'name')
                        ->required()->searchable()->preload()->label('Fitur Transaksi'),
                    TextInput::make('transaction_value')
                        ->label('Nominal Transaksi')
                        ->required()->numeric()->prefix('Rp'),
                ])->columns(3),
                Section::make('Pengaduan')->schema([
                    Textarea::make('description')->required()->label('Keterangan')->rows(10),
                    Textarea::make('escalation')->required()->label('Eskalasi')->rows(10),
                ])->columnSpan(1),
                Section::make('Unggah Berkas')->schema([
                    Repeater::make('fpknFileUpload')->label('Bukti Transaksi')->relationship()->schema([
                        Select::make('name')
                            ->options([
                                'Copy Buku Tabungan' => 'Copy Buku Tabungan',
                                'Rekening Koran' => 'Rekening Koran',
                                'Bukti Transfer' => 'Bukti Transfer'
                            ])->label('Nama Berkas')->required(),
                        FileUpload::make('file')
                        ->preserveFilenames()
                        ->directory('bukti-transaksi')->required()
                    ])->columns(2)->addActionLabel('Tambah Bukti Transaksi')->addable(false)
                ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ToggleColumn::make('card_center_status')->label('Status')
                //     ->hidden(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "card center") {
                //             return true;
                //         }else {
                //             return false;
                //         }
                //     })
                //     ->disabled(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "card center") {
                //             return true;
                //         } else {
                //             return false;
                //         }
                //     })->onColor('success')->offColor('danger')->sortable(),
                // ToggleColumn::make('settlement_status')->label('Status')
                //     ->hidden(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "settlement") {
                //             return true;
                //         }else {
                //             return false;
                //         }
                //     })
                //     ->disabled(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "settlement") {
                //             return true;
                //         } else {
                //             return false;
                //         }
                //     })->onColor('success')->offColor('danger')->sortable(),
                TextColumn::make('complaint_code')->searchable()->sortable()->label('Kode Pengaduan'),
                TextColumn::make('branch.name')->searchable()->sortable()->label('Cabang'),
                TextColumn::make('requestType.name')->searchable()->sortable()->label('Jenis Permintaan'),
                TextColumn::make('form_date')->label('Tanggal Permintaan')->searchable()->sortable(),
                TextColumn::make('transactionType.name')->label('Jenis Transaksi')->searchable()->sortable(),
                TextColumn::make('transactionFeature.name')->label('Fitur Transaksi')->searchable()->sortable(),
            ])
            ->filters([
                // SelectFilter::make('card_center_status')->label('Status')
                //     ->options([
                //         '1' => 'Diverifikasi',
                //         '0' => 'Belum diverifikasi'
                //     ])->hidden(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "card center") {
                //             return true;
                //         }else {
                //             return false;
                //         }
                //     }),
                // SelectFilter::make('settlement_status')->label('Status')
                //     ->options([
                //         '1' => 'Diverifikasi',
                //         '0' => 'Belum diverifikasi'
                //     ])->hidden(function () {
                //         if (auth()->user()->roles->pluck('name')[0] !== "settlement") {
                //             return true;
                //         }else {
                //             return false;
                //         }
                //     }),
            ])
            ->actions([
                // Action::make('Lacak Pengaduan')
                //     ->icon('heroicon-m-viewfinder-circle')
                //     ->color('info'),
                ViewAction::make()
                    ->label('Lacak Pengaduan')
                    ->icon('heroicon-m-viewfinder-circle')
                    ->color('warning')
                    ->form([
                        Toggle::make('card_center_status')->onColor('success')->offColor('danger')
                            ->label(function($record) {
                                $check = ApprovalComplaint::where('fpkn_id', $record->id)->first();
                                if (empty($check)) {
                                    return "Pengaduan sedang diproses oleh card center";
                                }else {
                                    return "Pengaduan telah disetujui oleh card center";
                                }
                            })->onIcon('heroicon-m-check')->offIcon('heroicon-m-clock'),
                        Toggle::make('settlement_status')->onColor('success')->offColor('danger')
                            ->label(function($record) {
                                if ($record->settlement_status == 0 && $record->card_center_status == 0) {
                                    return "Sedang menunggu persetujuan card center";
                                } elseif ($record->settlement_status == 0) {
                                    return "Pengaduan sedang diproses oleh settlement";
                                }else {
                                    return "Pengaduan telah disetujui oleh settlement";
                                }
                            })->onIcon('heroicon-m-check')->offIcon('heroicon-m-clock'),
                    ]),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFpkns::route('/'),
            'create' => Pages\CreateFpkn::route('/create'),
            'edit' => Pages\EditFpkn::route('/{record}/edit'),
        ];
    }
    public static function getLabel(): ?string
    {
        return "Formulir Pengaduan";
    }
}
