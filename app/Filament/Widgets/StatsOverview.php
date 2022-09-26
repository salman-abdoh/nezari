<?php

namespace App\Filament\Widgets;

use App\Models\category;
use App\Models\company;
use App\Models\products;
use App\Models\services;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;
    protected function getCards(): array
    {
        return [
            Card::make((__('Products')), products::where('status',1)->count())->Icon('heroicon-s-shopping-cart')
            ->description((__('Total Products')))
            ->chart([7, 2, 10, 3, 10, 4, 17])
            ->color('success'),
            Card::make((__('Categories')), category::where('status', 1)->count())->Icon('heroicon-s-color-swatch')->chart([7, 2, 10, 3, 15, 4, 17])
            ->description((__('Total Categories')))
            ->color('primary'),
            Card::make((__('Companies')), company::where('status',1)->count())->Icon('heroicon-s-globe')->color('danger')
            ->description((__('Total Companies')))
            ->chart([15, 4, 10, 2, 12, 4, 12])
             ->color('danger'),
            Card::make((__('services')), services::where('status', 1)->count())->Icon('heroicon-s-cog')
            ->description((__('Total services')))
            ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('dark'),
        ];
    }
}
