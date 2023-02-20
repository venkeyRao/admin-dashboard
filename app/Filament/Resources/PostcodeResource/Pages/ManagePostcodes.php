<?php

namespace App\Filament\Resources\PostcodeResource\Pages;

use App\Filament\Resources\PostcodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePostcodes extends ManageRecords
{
    protected static string $resource = PostcodeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
