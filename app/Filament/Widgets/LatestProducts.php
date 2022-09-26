<?php

namespace App\Filament\Widgets;
use Filament\Tables\Columns\ImageColumn;

use App\Filament\Resources\ProductsResource;
use App\Filament\Resources\Shop\OrderResource;
use App\Models\products;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Squire\Models\Currency;

class LatestProducts extends BaseWidget
{
   
    protected int | string | array $columnSpan = 'full';
    protected static ?string $label = 'Our Categories';
    protected static ?string $pluralModelLabel = 'products';
    protected static ?string $name = 'products';

    protected static ?int $sort = 2;
    public static function getModelLabel(): string
    {
        return __("ar.products");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.products");
    }
    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 5;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    protected function getTableQuery(): Builder
    {
        return ProductsResource::getEloquentQuery()->where("created_at",'>',Carbon::now()->month(1));
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')->Label('ID')->sortable(),

            Tables\Columns\TextColumn::make((__('en_title')))->searchable()->sortable()->Label(__('Name')),
            ImageColumn::make('image')->rounded()->Label((__('Image'))),
            Tables\Columns\TextColumn::make((__('en_description')))->searchable()->sortable()->Label((__('Description')))->limit(50),
            Tables\Columns\TextColumn::make((__('category.ar_title')))
            ->searchable()
            ->sortable()
            ->label(__('Category'))->sortable(),
            Tables\Columns\TextColumn::make('createdBy.name')
            ->searchable()
            ->sortable()
            ->label(__('Created By')),
            Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created Date'))
                    ->date()
                    ->sortable()->sortable(),
           Tables\Columns\BooleanColumn::make('status')->sortable()->label(__('Visibilit')),
           

           
        ];
    }
}
