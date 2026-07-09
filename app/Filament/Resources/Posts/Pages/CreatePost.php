<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Actions\Posts\UpsertPostAction;
use App\Filament\Resources\Posts\PostResource;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(UpsertPostAction::class)->execute(
            post: null,
            data: $data,
            author: auth()->user(),
        );
    }
}
