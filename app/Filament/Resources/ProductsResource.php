<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Filament\Resources\ProductsResource\Widgets\productsStats;
use App\Filament\Widgets\LatestProducts;
use App\Models\category;
use App\Models\company;
use App\Models\Products;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $label = 'Products';
    public static function getModelLabel(): string
    {
        return __("ar.product");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.products");
    }
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ar_title')->required()->label(__('Arabic Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\TextInput::make('en_title')->required()->label(__('English Name'))->placeholder((__('Write Arabic Name'))),
                Forms\Components\Textarea::make('ar_description')->required()->label(__('Arabic Description'))->placeholder((__('Write Arabic Description'))),
                Forms\Components\Textarea::make('en_description')->required()->label(__('English Description'))->placeholder((__('Write English Description'))),
                Forms\Components\Textarea::make('ar_usage')->required()->label(__('Arabic Usage'))->placeholder((__('Write Arabic Usage'))),
                Forms\Components\Textarea::make('en_usage')->required()->label(__('English Usage'))->placeholder((__('Write English Usage'))),
                Forms\Components\Card::make()
                ->schema([
                Forms\Components\Select::make('cate_id')
                                           ->label(__('Arabic Category'))->placeholder((__('Chooce Arabic Category')))
                                            ->options(category::query()->pluck('ar_title', 'id'))
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('en_title1', category::query()->pluck('en_title', 'id'))),
                Forms\Components\Select::make('cate_id')
                                            ->label(__('English Category'))->placeholder((__('Chooce English Category')))
                                             ->options(category::query()->pluck('en_title', 'id'))
                                             ->required()
                                             ->reactive()
                                             ->afterStateUpdated(fn ($state, callable $set) => $set('ar_title1', category::query()->pluck('en_title', 'id'))),
                                             Forms\Components\Select::make('company_id')
                                             ->label(__('Arabic Company'))->placeholder((__('Chooce Arabic Company')))
                                              ->options(company::query()->pluck('ar_title', 'id'))
                                              ->required()
                                              ->reactive()
                                              ->afterStateUpdated(fn ($state, callable $set) => $set('en_title2', company::query()->pluck('en_title', 'id'))),
                  Forms\Components\Select::make('company_id')
                                              ->label(__('English Company'))->placeholder((__('Chooce English Company')))
                                               ->options(company::query()->pluck('en_title', 'id'))
                                               ->required()
                                               ->reactive()
                                               ->afterStateUpdated(fn ($state, callable $set) => $set('ar_title2', company::query()->pluck('en_title', 'id'))),
                                               ])->columns(2),
                                               Forms\Components\FileUpload::make('image')->Label(__('Image'))->enableOpen()->placeholder((__('Chooce Image'))),
                // ->imagePreviewHeight('250')
                // ->loadingIndicatorPosition('left')
                // ->panelAspectRatio('2:1')
                // ->panelLayout('integrated')
                // ->removeUploadedFileButtonPosition('right')
                // ->uploadButtonPosition('left')
                // ->uploadProgressIndicatorPosition('left')
                Forms\Components\FileUpload::make('images')->Label(__('Images'))->multiple()->enableOpen()->placeholder((__('Chooce More Than one Images'))),
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
                ImageColumn::make('image')->rounded()->Label((__('Image'))),
                Tables\Columns\TextColumn::make((__('en_description')))->searchable()->sortable()->Label((__('Description')))->limit(50),
                Tables\Columns\TextColumn::make((__('category.en_title')))->searchable()->sortable()->Label((__('Category'))),
                Tables\Columns\TextColumn::make('created_at')->searchable()->sortable()->date()->Label((__('Created At'))),
                Tables\Columns\BooleanColumn::make('status')->sortable()->label((__('Visibilit')))

            ])
            ->filters([
                Tables\Filters\SelectFilter::make((__('en_title')))
                    ->options(\App\Models\category::get(['ar_title', 'id'])->pluck('ar_title', 'id'))
                    ->column('cate_id')->Label('Category In Arabic'),
              
            ])
            ->actions([
                Tables\Actions\Action::make('Delete')->hidden(function ($record){
                    return $record["status"] != 1;
                })->action(function ( $record) {


                    // \Illuminate\Support\Facades\Log::debug(json_encode($record["id"]));
                    $products =products::latest()->FindOrFail($record["id"]);

                    $products->status = 1;

                    $products->save();
                    DB::connection('mysql')->statement("UPDATE products SET status =0 where id = $products->id");


                })
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete  Ctegory')
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
    public static function getWidgets(): array
    {
        return [
            productsStats::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
