<?php

namespace App\Filament\SuperAdmin\Resources\CollectionResource\Pages;

use App\Filament\SuperAdmin\Resources\CollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCollection extends CreateRecord
{
    protected static string $resource = CollectionResource::class;
}
