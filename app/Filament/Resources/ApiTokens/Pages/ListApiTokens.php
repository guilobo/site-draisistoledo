<?php

namespace App\Filament\Resources\ApiTokens\Pages;

use App\Filament\Resources\ApiTokens\ApiTokenResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApiTokens extends ListRecords
{
    protected static string $resource = ApiTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Criar chave de API'),
            Action::make('api_docs')
                ->label('Ver documentação da API')
                ->url(url('/docs/api-3f84c6db2a7e41c091b5d9e8f2a1c7ab4e56f901a2b3c4d5'))
                ->openUrlInNewTab(),
        ];
    }
}
