<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image_path')
                    ->label('Imagem')
                    ->disk('public')
                    ->square()
                    ->toggleable(),
                TextColumn::make('title')
                    ->label('Titulo')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('categories.name')
                    ->label('Categorias')
                    ->badge()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Post::STATUS_OPTIONS[$state] ?? $state)
                    ->colors([
                        'gray' => Post::STATUS_DRAFT,
                        'success' => Post::STATUS_PUBLISHED,
                        'warning' => Post::STATUS_ARCHIVED,
                    ])
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Publicacao')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('Nao publicado')
                    ->sortable(),
                TextColumn::make('author.name')
                    ->label('Autor')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Atualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(Post::STATUS_OPTIONS),
                SelectFilter::make('categories')
                    ->label('Categorias')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
