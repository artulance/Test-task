<?php

namespace App\Filament\Resources\GroupTaskResource\Pages;

use App\Filament\Resources\GroupTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupTasks extends ListRecords
{
    protected static string $resource = GroupTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
