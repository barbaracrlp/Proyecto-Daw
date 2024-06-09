<?php

namespace App\Filament\SuperAdmin\Widgets;

use App\Models\Cart;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Carts extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // ...
                Cart::query(),
            )
            ->columns([
                // ...
                TextColumn::make('id'),
                TextColumn::make('user.name'),
                TextColumn::make('state'),
                TextColumn::make('totalPrice')->money('EUR'),
            ]);
    }
}
