<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = 1;
        return $data;
    }
}
