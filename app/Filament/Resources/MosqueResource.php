<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MosqueResource\Pages;
use App\Filament\Resources\MosqueResource\RelationManagers;
use App\Models\Mosque;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MosqueResource extends Resource
{
    protected static ?string $model = Mosque::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email2')
                    ->email()
                    ->maxLength(50),
                Forms\Components\TextInput::make('mobileno')
                    ->maxLength(20),
                Forms\Components\TextInput::make('mobileno2')
                    ->maxLength(20),
                Forms\Components\TextInput::make('masjidname')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('zipcode')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('state')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('addresslink')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('fajr')
                    ->maxLength(50),
                Forms\Components\TextInput::make('zohar')
                    ->maxLength(200),
                Forms\Components\TextInput::make('asr')
                    ->maxLength(200),
                Forms\Components\TextInput::make('maghrib')
                    ->maxLength(200),
                Forms\Components\TextInput::make('isha')
                    ->maxLength(200),
                Forms\Components\TextInput::make('juma')
                    ->maxLength(200),
                Forms\Components\Toggle::make('forladies')
                    ->required(),
                Forms\Components\DateTimePicker::make('timestamp'),
                Forms\Components\DateTimePicker::make('reset_expiry'),
                Forms\Components\Textarea::make('aelaan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobileno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobileno2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('masjidname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zipcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('addresslink')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fajr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zohar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maghrib')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('juma')
                    ->searchable(),
                Tables\Columns\IconColumn::make('forladies')
                    ->boolean(),
                Tables\Columns\TextColumn::make('timestamp')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reset_expiry')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMosques::route('/'),
            'create' => Pages\CreateMosque::route('/create'),
            'edit' => Pages\EditMosque::route('/{record}/edit'),
        ];
    }
}
