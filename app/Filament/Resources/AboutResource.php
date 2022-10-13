<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    //heroicon-o-user-group
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-alt';
    protected static ?int $navigationSort = 4;
    protected static ?string $label = 'About Us_';
    public static function getModelLabel(): string
    {
        return __("ar.about");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.about");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Textarea::make('ar_intro')->required()->label(__('Arabic Intro'))->placeholder((__('Write Arabic Intro'))),
                Forms\Components\Textarea::make('en_intro')->required()->label(__('Engilsh Intro'))->placeholder((__('Write Engilsh Intro'))),
                Forms\Components\Textarea::make('ar_vision')->required()->label(__('Arabic Vision'))->placeholder((__('Write Arabic Vision'))),
                Forms\Components\Textarea::make('en_vision')->required()->label(__('Engilsh Vision'))->placeholder((__('Write Engilsh Vision'))),
                Forms\Components\Textarea::make('ar_target')->required()->label(__('Arabic Target'))->placeholder((__('Write Arabic Target'))),
                Forms\Components\Textarea::make('en_target')->required()->label(__('Engilsh Target'))->placeholder((__('Write Engilsh Target'))),
                Forms\Components\Textarea::make('ar_mision')->required()->label(__('Arabic Mision'))->placeholder((__('Write Arabic Mision'))),
                Forms\Components\Textarea::make('en_mision')->required()->label(__('Engilsh Mision'))->placeholder((__('Write Engilsh Mision'))),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->Label('ID')->sortable(),
                Tables\Columns\TextColumn::make((__('en_intro')))->searchable()->sortable()->Label(__('Intro'))->limit(50),
                Tables\Columns\TextColumn::make((__('en_vision')))->searchable()->sortable()->Label(__('Vision'))->limit(50),
                Tables\Columns\TextColumn::make((__('en_target')))->searchable()->sortable()->Label(__('Target'))->limit(50),
                Tables\Columns\TextColumn::make((__('en_mision')))->searchable()->sortable()->Label(__('Mision'))->limit(50),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
