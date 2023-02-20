<?php

namespace App\Filament\Resources\SuburbResource\Pages;

use App\Filament\Resources\SuburbResource;
use App\Filament\Resources\SuburbResource\RelationManagers\PostcodesRelationManager;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSuburbs extends ManageRecords
{
    protected static string $resource = SuburbResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
