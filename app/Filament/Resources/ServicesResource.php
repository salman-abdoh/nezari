<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesResource\Pages;
use App\Filament\Resources\ServicesResource\RelationManagers;
use App\Models\category;
use App\Models\Services;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class ServicesResource extends Resource
{
    protected static ?string $model = Services::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $label = 'Services';
    protected static ?int $navigationSort = 5;
    public static function getModelLabel(): string
    {
        return __("ar.service");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.services");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ar_title')->required()->label(__('Arabic Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\TextInput::make('en_title')->required()->label(__('English Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\Textarea::make('ar_description')->required()->label(__('Arabic Description'))->placeholder((__('Write Arabic Description'))),
                Forms\Components\Textarea::make('en_description')->required()->label(__('English Description'))->placeholder((__('Write English Description'))),
                Forms\Components\TextInput::make('image')->Label(__('Icon'))->required()->placeholder((__('Select Icon here'))),
                Forms\Components\Toggle::make('status')->label(__('Visibilit'))->inline()->onIcon('heroicon-s-lightning-bolt') ->onColor('success')
                    ->offColor('danger')->columnSpan('full'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->Label('ID'),
                Tables\Columns\TextColumn::make((__('en_title')))->searchable()->sortable()->Label(__('Name')),
                Tables\Columns\TextColumn::make('image')->Label((__('Image'))),
                Tables\Columns\TextColumn::make((__('en_description')))->searchable()->sortable()->Label(__('Description')),
                Tables\Columns\TextColumn::make('created_at')->searchable()->date()->Label((__('Created At'))),
                Tables\Columns\BooleanColumn::make('status')->sortable()->label(__('Visibilit')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Delete')->hidden(function ($record){
                    return $record["status"] != 1;
                })->action(function ( $record) {


                    // \Illuminate\Support\Facades\Log::debug(json_encode($record["id"]));
                    $services =services::latest()->FindOrFail($record["id"]);

                    $services->status = 1;

                    $services->save();
                    DB::connection('mysql')->statement("UPDATE Services SET status = 0 where id = $services->id");


                })
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete service')
                    ->modalSubheading('Are you sure you would like to do this? ')
                    ->modalButton('Delete'),
                Tables\Actions\EditAction::make(),


            ])
            ->bulkActions([

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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateServices::route('/create'),
            'edit' => Pages\EditServices::route('/{record}/edit'),
        ];
    }

}
