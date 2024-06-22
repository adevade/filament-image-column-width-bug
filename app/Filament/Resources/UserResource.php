<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('smushed_avatar')
                    ->state('https://gravatar.com/avatar/foo?d=mp&f=y')
                    ->width('1%'),

                Tables\Columns\ImageColumn::make('normal_avatar')
                    ->state('https://gravatar.com/avatar/foo?d=mp&f=y')
                    ->extraHeaderAttributes(['style' => 'width: 1%']),

                Tables\Columns\TextColumn::make('name'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
