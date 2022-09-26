<?php

namespace App\Filament\Resources\ProductsResource\Widgets;

use App\Models\products;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class productsStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
          
            Card::make((__('Number Of Products Added During The Month')), products::where("created_at",'>',Carbon::now()->month(1))->count()),
            Card::make((__('Total Products Displayed On The Site')), products::where('status', 1)->count()),
            Card::make((__('Total Products Deleted')), products::where('status', 0)->count())->color('danger'),


        ];
        
    }
}
