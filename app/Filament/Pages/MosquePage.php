<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\Mosque;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class MosquePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.mosque-page';


     // Define the table
     protected function getTable(): Tables\Table
     {
         return Tables\Table::make()
             ->query(Mosque::all()) // Query the mosque data
             ->columns([
                 TextColumn::make('masjidname')->label('Masjid Name')->searchable(),
                 TextColumn::make('city')->label('City')->searchable(),
                 TextColumn::make('address')->label('Address'),
                 TextColumn::make('fajr')->label('Fajr Time'),
                 TextColumn::make('juma')->label('Juma Time'),
             ])
             ->filters([
                 // You can add filters here if needed
             ])
             ->actions([
                 // You can add row actions here (e.g. view/edit/delete)
             ])
             ->bulkActions([
                 // You can add bulk actions here (e.g. delete multiple)
             ]);
     }
}
