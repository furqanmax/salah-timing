<?php

namespace App\Filament\Widgets;

use App\Models\Mosque;
use Filament\Widgets\TableWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\Layout\Grid;

use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
 
use Filament\Infolists\Infolist;



class MosqueTableWidget extends TableWidget
{
    protected static ?string $heading = 'Mosques';
    protected int | string | array $columnSpan = 'full';

     
public function infolist(Infolist $infolist): Infolist
{
    return $infolist
    ->query(Mosque::query())
        ->schema([
            RepeatableEntry::make('comments')
            ->schema([
                TextEntry::make('masjidname'),
                TextEntry::make('fajr'),
                TextEntry::make('asr')
                    ->columnSpan(2),
            ])
            ->columns(2),
        ]);
}

    public function table(Table $table): Table
    {
        return $table
            ->query(Mosque::query()) // Query mosque data
            ->columns([ // Define the table columns
                
// Split::make([
//     ImageColumn::make('avatar')
//         ->circular(),
//     TextColumn::make('name')
//         ->weight(FontWeight::Bold)
//         ->searchable()
//         ->sortable(),
//     Stack::make([
        
//         TextColumn::make('phone')
//             ->icon('heroicon-m-phone')
//             ->grow(false),
//         TextColumn::make('email')
//             ->icon('heroicon-m-envelope')
//             ->grow(false),
//     ])
//         ->alignment(Alignment::End)
//         ->visibleFrom('md'),
//     ]),



                TextColumn::make('masjidname')
                    ->label('Masjid Name')
                    ->searchable(), // Make this column searchable
                
                    TextColumn::make('fajr')
                    ->label('Fajr Time'),
        TextColumn::make('zohar')
                    ->label('Dohar Time'),
        TextColumn::make('asr')
                    ->label('Asr Time'),
        TextColumn::make('maghrib')
                    ->label('Maghrib Time'),
        TextColumn::make('isha')
                    ->label('Isha Time'),
        TextColumn::make('juma')
                    ->label('Juma Time'),
                    TextColumn::make('city')
                    ->label('City')
                    ->searchable(), // Make this column searchable
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable(), // Make this column searchable
            ])
            ->actions([ // Add actions like Edit/Delete
                // EditAction::make(),
                // DeleteAction::make(),
            ]);
            


 
    }


   
}
