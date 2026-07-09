<?php

namespace App\Filament\Resources\ApiTokens\Pages;

use App\Filament\Resources\ApiTokens\ApiTokenResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateApiToken extends CreateRecord
{
    protected static string $resource = ApiTokenResource::class;

    protected ?string $plainTextToken = null;

    protected function handleRecordCreation(array $data): Model
    {
        $newToken = auth()->user()->createToken(
            name: $data['name'],
            abilities: $data['abilities'],
        );

        $this->plainTextToken = $newToken->plainTextToken;

        return $newToken->accessToken;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->persistent()
            ->title('Chave API criada')
            ->body('Copie agora: ' . $this->plainTextToken);
    }
}
