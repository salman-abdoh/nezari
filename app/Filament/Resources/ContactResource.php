<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;

use App\Models\contacts;
use App\Models\services;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isWritable;

class ContactResource extends Resource
{
    protected static ?string $model = contacts::class;
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-mail';
    protected static ?string $label = 'Contact';
    public static function getModelLabel(): string
    {
        return __("ar.contact");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.contact");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                Forms\Components\TextInput::make('name')->required()->label(__('Name'))->disabled() ->columns(3),
                Forms\Components\TextInput::make('email')->required()->label(__('Email'))->disabled() ,
                Forms\Components\TextInput::make('phone')->required()->label(__('Phone Number'))->disabled(),
              
             

                ])->columns(3),
                Forms\Components\Card::make()
                ->schema([
                Forms\Components\TextInput::make('subject')->required()->label(__('Subject'))->disabled(),
               Forms\Components\Textarea::make('message')->required()->label(__('Message'))->disabled(),
            ])
         ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->Label(__('ID'))->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label(__('Name')),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->Label(__('Email')),
                Tables\Columns\TextColumn::make('phone')->searchable()->Label(__('Phone Number')),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable()->Label(__('Subject')),
                Tables\Columns\TextColumn::make('message')->searchable()->Label(__('Message'))->limit(50),
                Tables\Columns\TextColumn::make('created_at')->searchable()->date()->Label(__('Created At')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Delete')->hidden(function ($record){
                    return $record["status"] != 1;
                })->action(function ( $record) {


                    // \Illuminate\Support\Facades\Log::debug(json_encode($record["id"]));
                    $contact =contacts::latest()->FindOrFail($record["id"]);

                    $contact->status = 1;

                    $contact->save();
                    DB::connection('mysql')->statement("UPDATE contacts SET status = 0 where id = $contact->id");


                })
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete contact')
                    ->modalSubheading('Are you sure you would like to do this? ')
                    ->modalButton('Delete'),
                    Tables\Actions\EditAction::make()->label(__('Show'))->icon('heroicon-o-eye'),


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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
    protected static function getNavigationBadge(): ?string
    {
        return static::$model::where("created_at",'<',Carbon::now()->days(1))->count();
    }
}
