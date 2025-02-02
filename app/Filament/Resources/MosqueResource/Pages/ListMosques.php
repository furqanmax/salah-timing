<?php

namespace App\Filament\Resources\MosqueResource\Pages;

use App\Filament\Resources\MosqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// use Filament\Pages\Actions;

class ListMosques extends ListRecords
{
    protected static string $resource = MosqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
}
