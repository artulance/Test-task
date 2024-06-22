<?php

namespace App\Filament\Resources\GroupTaskResource\Pages;

use App\Filament\Resources\GroupTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupTask extends EditRecord
{
    protected static string $resource = GroupTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
