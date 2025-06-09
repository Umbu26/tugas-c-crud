<?php

namespace App\Filament\Resources\PatnerResource\Pages;

use App\Filament\Resources\PatnerResource;
use App\Models\patner;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPatner extends EditRecord
{
    protected static string $resource = PatnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(patner $record){
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
