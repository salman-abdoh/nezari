<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions;
class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->color("success")->Icon('heroicon-s-plus'),

        ];
    }
}
