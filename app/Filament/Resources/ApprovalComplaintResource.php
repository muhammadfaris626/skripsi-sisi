<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovalComplaintResource\Pages;
use App\Filament\Resources\ApprovalComplaintResource\RelationManagers;
use App\Models\ApprovalComplaint;
use App\Models\Fpkn;
use App\Models\FpknFileUpload;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class ApprovalComplaintResource extends Resource
{
    protected static ?string $model = ApprovalComplaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('fpkn_id')
                        // ->options(Fpkn::all()->pluck('complaint_code', 'id'))
                        ->options(function () {
                            $data = [];
                            $fpkn = Fpkn::all();
                            foreach ($fpkn as $key => $value) {
                                $check = ApprovalComplaint::where('fpkn_id', $value->id)->first();
                                if (empty($check)) {
                                    $data[$value->id] = $value->complaint_code;
                                }
                            }
                            return $data;
                        })
                        ->searchable()
                        ->preload()
                        ->required()
                        ->label('Kode Pengaduan')->live()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            $data = Fpkn::where('id', $state)->first();
                            $set('customer_id', $data->customer->name);
                            $set('branch_id', $data->branch->name);
                            $set('request_type_id', $data->requestType->name);
                            $set('form_date', $data->form_date);
                            $set('transaction_type_id', $data->transactionType->name);
                            $set('transaction_feature_id', $data->transactionFeature->name);
                            $set('transaction_value', $data->transaction_value);
                            $set('description', $data->description);
                            $set('escalation', $data->escalation);
                            $file = FpknFileUpload::where('fpkn_id', $data->id)->first();
                            $set('file_name', $file->name);
                            $set('file_upload', $file->file);
                        }),
                    TextInput::make('customer_id')->label('Nama Nasabah')->disabled()
                        ->visible(function(Get $get) { if ($get('customer_id') == '') {return false;}else {return true;}}),
                    TextInput::make('branch_id')->label('Cabang')->disabled()
                        ->visible(function(Get $get) { if ($get('customer_id') == '') {return false;}else {return true;}}),
                    TextInput::make('request_type_id')->label('Jenis Permintaan')->disabled()
                        ->visible(function(Get $get) { if ($get('request_type_id') == '') {return false;}else {return true;}}),
                    TextInput::make('form_date')->label('Tanggal Pengaduan')->disabled()
                        ->visible(function(Get $get) { if ($get('form_date') == '') {return false;}else {return true;}}),
                    TextInput::make('transaction_type_id')->label('Jenis Transaksi')->disabled()
                        ->visible(function(Get $get) { if ($get('transaction_type_id') == '') {return false;}else {return true;}}),
                    TextInput::make('transaction_feature_id')->label('Fitur Transaksi')->disabled()
                        ->visible(function(Get $get) { if ($get('transaction_feature_id') == '') {return false;}else {return true;}}),
                    TextInput::make('transaction_value')->label('Nominal Transaksi')->disabled()
                        ->visible(function(Get $get) { if ($get('transaction_value') == '') {return false;}else {return true;}}),
                    TextInput::make('file_name')->label('Nama Berkas')->disabled()->columnSpan(2)
                        ->visible(function(Get $get) { if ($get('file_name') == '') {return false;}else {return true;}}),
                    TextInput::make('file_upload')->label('Berkas')->prefix(fn() => new HtmlString('<img src="/storage/bukti-transaksi/aaa.png">'))
                        ->visible(function(Get $get) { if ($get('file_upload') == '') {return false;}else {return true;}})->columnSpan(2),
                    Textarea::make('description')->label('Keterangan')->disabled()->columnSpan(2)->rows(5)
                        ->visible(function(Get $get) { if ($get('description') == '') {return false;}else {return true;}}),
                    Textarea::make('escalation')->label('Eskalasi')->disabled()->columnSpan(2)->rows(5)
                        ->visible(function(Get $get) { if ($get('escalation') == '') {return false;}else {return true;}}),
                    Select::make('reason_claim_id')
                        ->relationship('reasonClaim', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->label('Alasan Klaim')->columnSpan(2)
                        ->visible(function(Get $get) { if ($get('customer_id') == '') {return false;}else {return true;}}),
                    Textarea::make('transaction_information')->required()->label('Keterangan Transaksi')->rows(5)->columnSpan(2)
                        ->visible(function(Get $get) { if ($get('customer_id') == '') {return false;}else {return true;}}),
                ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('claim_code')->searchable()->sortable()->label('Kode Klaim'),
                TextColumn::make('fpkn.complaint_code')->searchable()->sortable()->label('Kode Pengaduan'),
                TextColumn::make('reasonClaim.name')->searchable()->sortable()->label('Alasan Klaim'),
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
            'index' => Pages\ListApprovalComplaints::route('/'),
            'create' => Pages\CreateApprovalComplaint::route('/create'),
            'edit' => Pages\EditApprovalComplaint::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return "Persetujuan Pengaduan";
    }
}
