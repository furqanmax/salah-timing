<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

use App\Models\Mosque;
use Filament\Widgets\Widget;
// use Filament\Widgets\Widget as BaseWidget;
use Filament\Forms\Components\TextInput;




use Filament\Widgets\TableWidget;

use Filament\Tables\Columns\TextColumn;



class MosqueWidget extends BaseWidget
{

    protected static ?string $heading = 'Mosques';

    public function table(Table $table): Table
    {
        return $table
            ->query(Mosque::query()) // Query the mosque data
            ->columns([ // Define table columns
                TextColumn::make('masjidname')
                    ->label('Masjid Name')
                    ->searchable(), // Make this column searchable
                TextColumn::make('city')
                    ->label('City')
                    ->searchable(), // Make this column searchable
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable(), // Make this column searchable
                TextColumn::make('fajr')
                    ->label('Fajr Time'),
                TextColumn::make('juma')
                    ->label('Juma Time'),
            ])
            ->filters([ // Optional: Add filters if needed
                // Example filter:
                // Tables\Filters\SelectFilter::make('city')->options(Mosque::pluck('city', 'city')->toArray()),
            ])
            ->actions([ // Add actions like Edit/Delete
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->query(
    //             // ...
    //         )
    //         ->columns([
    //             // ...
    //         ]);
    // }
}
