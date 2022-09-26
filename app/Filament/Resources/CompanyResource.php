<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use App\Models\products;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe';
    protected static ?string $label = 'Companies';
    protected static ?int $navigationSort = 3;
    public static function getModelLabel(): string
    {
        return __("ar.Company");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.Companies");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ar_title')->required()->label(__('Arabic Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\TextInput::make('en_title')->required()->label(__('English Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\Textarea::make('ar_description')->required()->label(__('Arabic Description'))->placeholder((__('Write Arabic Description'))),
                Forms\Components\Textarea::make('en_description')->required()->label(__('English Description'))->placeholder((__('Write English Description'))),
                Forms\Components\TextInput::make('ar_country')->required()->label(__('Arabic Country'))->placeholder((__('Write Arabic Country'))),
                Forms\Components\TextInput::make('en_country')->required()->label(__('English Country'))->placeholder((__('Write English Country'))),
                Forms\Components\FileUpload::make('image')->Label(__('Image'))->placeholder((__('Chooce Image'))),
                Forms\Components\Toggle::make('status')->label(__('Visibilit'))->inline()->onIcon('heroicon-s-lightning-bolt') ->onColor('success')
                    ->offColor('danger')->columnSpan('full'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->Label('ID')->sortable(),
                Tables\Columns\TextColumn::make((__('en_title')))->searchable()->sortable()->Label(__('Name')),
                ImageColumn::make('image')->rounded()->Label((__('Image'))),
                Tables\Columns\TextColumn::make((__('en_description')))->searchable()->sortable()->Label((__('Description')))->limit(50),
                Tables\Columns\TextColumn::make((__('en_country')))->searchable()->sortable()->Label((__('Country'))),
                Tables\Columns\TextColumn::make('created_at')->searchable()->date()->Label((__('Created At'))),
                Tables\Columns\BooleanColumn::make('status')->sortable()->label((__('Visibilit'))),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Delete')->hidden(function ($record){
                    return $record["status"] != 1;
                })->action(function ( $record) {


                    // \Illuminate\Support\Facades\Log::debug(json_encode($record["id"]));
                   $company =company::latest()->FindOrFail($record["id"]);

                    $company->status = 1;

                    $company->save();
                    DB::connection('mysql')->statement("UPDATE companies SET status = 0 where id = $company->id");


                })
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete company')
                    ->modalSubheading('Are you sure you would like to do this? ')
                    ->modalButton('Delete'),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
