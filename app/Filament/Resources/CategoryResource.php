<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use App\Models\products;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-color-swatch';

    protected static ?string $label = 'Categories';
    protected static ?int $navigationSort = 2;
    public static function getModelLabel(): string
    {
        return __("ar.category");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.categories");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ar_title')->required()->label(__('Arabic Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\TextInput::make('en_title')->required()->label(__('English Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\Textarea::make('ar_description')->required()->label(__('Arabic Description'))->placeholder((__('Write Arabic Description'))),
                Forms\Components\Textarea::make('en_description')->required()->label(__('English Description'))->placeholder((__('Write English Description'))),
                Forms\Components\Toggle::make('status')->label(__('Visibilit'))->inline()->onIcon('heroicon-s-lightning-bolt') ->onColor('success')
                    ->offColor('danger')->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->Label('ID')->sortable(),
                Tables\Columns\TextColumn::make((__('en_title')))->searchable()->sortable()->Label(__('Name')),
                Tables\Columns\TextColumn::make((__('en_description')))->searchable()->sortable()->Label((__('Description')))->limit(50),
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
                    $category =category::latest()->FindOrFail($record["id"]);

                    $category->status = 1;

                    $category->save();
                    DB::connection('mysql')->statement("UPDATE categories SET status = 0 where id = $category->id");


                })
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Ctegory')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
