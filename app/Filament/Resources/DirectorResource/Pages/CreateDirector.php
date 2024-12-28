<?php

namespace App\Filament\Resources\DirectorResource\Pages;

use App\Filament\Resources\DirectorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDirector extends CreateRecord
{
    protected static string $resource = DirectorResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
