<?php

namespace App\Filament\Widgets;

use App\Models\Design;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Designs extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Design::query()->latest()
            )
            ->columns([
                // ...
                TextColumn::make('name'),
            TextColumn::make('price')->money('EUR'),
            TextColumn::make('file_path'),
            ImageColumn::make('file_path'),
            ]);
    }
}
