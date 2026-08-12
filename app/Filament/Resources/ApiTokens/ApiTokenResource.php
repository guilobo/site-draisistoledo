<?php

namespace App\Filament\Resources\ApiTokens;

use App\Filament\Resources\ApiTokens\Pages\CreateApiToken;
use App\Filament\Resources\ApiTokens\Pages\ListApiTokens;
use App\Models\User;
use BackedEnum;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DeleteAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\PersonalAccessToken;
use UnitEnum;

class ApiTokenResource extends Resource
{
    public const ABILITY_OPTIONS = [
        'categories:view' => 'Listar categorias',
        'categories:create' => 'Criar categorias',
        'posts:create' => 'Criar posts',
        'posts:update' => 'Editar posts',
    ];

    protected static ?string $model = PersonalAccessToken::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedKey;

    protected static ?string $navigationLabel = 'Chaves';

    protected static string|UnitEnum|null $navigationGroup = 'API';

    protected static ?int $navigationSort = 100;

    protected static ?string $modelLabel = 'chave API';

    protected static ?string $pluralModelLabel = 'chaves API';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nome da chave')
                ->required()
                ->maxLength(255),
            CheckboxList::make('abilities')
                ->label('Permissoes')
                ->options(self::ABILITY_OPTIONS)
                ->columns(1)
                ->required()
                ->minItems(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('abilities')
                    ->label('Permissoes')
                    ->badge()
                    ->separator(',')
                    ->formatStateUsing(fn (string $state): string => self::ABILITY_OPTIONS[$state] ?? $state)
                    ->wrap(),
                TextColumn::make('last_used_at')
                    ->label('Ultimo uso')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('Nunca usada')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Criada em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                DeleteAction::make()
                    ->label('Revogar'),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Nenhuma chave criada ainda.');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApiTokens::route('/'),
            'create' => CreateApiToken::route('/create'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('tokenable_type', User::class)
            ->where('tokenable_id', auth()->id());
    }
}
