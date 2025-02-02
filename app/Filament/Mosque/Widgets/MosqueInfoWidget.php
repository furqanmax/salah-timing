<?php

namespace App\Filament\Mosque\Widgets;
use App\Models\Mosque;
use Filament\Widgets\Widget;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;

class MosqueInfoWidget extends Widget
{
    protected static string $view = 'filament.mosque.widgets.mosque-info-widget';
    protected static ?string $model = Mosque::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            RepeatableEntry::make('comments')
                ->schema([
                    TextEntry::make('masjidname')->label("Masjid Name"),
                    TextEntry::make('fajr')->label("fajr"),
                    TextEntry::make('asr')
                        ->columnSpan(2)->label("asr"),
                ])
                ->columns(2)
        ]);
    }

}
