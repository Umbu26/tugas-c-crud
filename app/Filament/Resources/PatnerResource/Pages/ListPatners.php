<?php

namespace App\Filament\Resources\PatnerResource\Pages;

use App\Filament\Resources\PatnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatners extends ListRecords
{
    protected static string $resource = PatnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
