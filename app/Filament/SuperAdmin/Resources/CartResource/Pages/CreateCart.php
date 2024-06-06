<?php

namespace App\Filament\SuperAdmin\Resources\CartResource\Pages;

use App\Filament\SuperAdmin\Resources\CartResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCart extends CreateRecord
{
    protected static string $resource = CartResource::class;
}
