<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(10)
            ->components([
                Section::make('Conteudo')
                    ->columns(2)
                    ->columnSpan(7)
                    ->schema([
                        TextInput::make('title')
                            ->label('Titulo')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, Get $get, ?string $state): void {
                                if (blank($get('slug'))) {
                                    $set('slug', Str::slug($state ?? ''));
                                }
                            }),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique('posts', 'slug', ignoreRecord: true),
                        Textarea::make('excerpt')
                            ->label('Resumo')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                        FileUpload::make('featured_image_path')
                            ->label('Imagem destacada')
                            ->disk('public')
                            ->directory('posts/featured')
                            ->visibility('public')
                            ->image()
                            ->imageEditor()
                            ->maxSize(4096)
                            ->columnSpanFull(),
                        Select::make('categories')
                            ->label('Categorias')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, Get $get, ?string $state): void {
                                        if (blank($get('slug'))) {
                                            $set('slug', Str::slug($state ?? ''));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique('categories', 'slug'),
                                Textarea::make('description')
                                    ->label('Descricao')
                                    ->rows(3)
                                    ->maxLength(1000),
                            ])
                            ->editOptionForm([
                                TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique('categories', 'slug', ignoreRecord: true),
                                Textarea::make('description')
                                    ->label('Descricao')
                                    ->rows(3)
                                    ->maxLength(1000),
                            ]),
                        TextInput::make('youtube_url')
                            ->label('URL do vídeo YouTube (opcional)')
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->helperText('Se preenchido, o embed será gerado automaticamente e substituirá o conteúdo abaixo.')
                            ->url()
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->afterStateHydrated(function (TextInput $component, $record): void {
                                if (!$record) return;
                                $content = $record->content ?? '';
                                if (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/', $content, $m)) {
                                    $component->state('https://www.youtube.com/watch?v=' . $m[1]);
                                }
                            }),
                        RichEditor::make('content')
                            ->label('Conteúdo (texto do artigo)')
                            ->required(fn(Get $get): bool => blank($get('youtube_url')))
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('posts/content')
                            ->fileAttachmentsVisibility('public')
                            ->helperText('Deixe vazio se o post for apenas um vídeo do YouTube.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Publicacao')
                    ->columns(1)
                    ->columnSpan(3)
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options(Post::STATUS_OPTIONS)
                            ->default(Post::STATUS_DRAFT)
                            ->required()
                            ->native(false),
                        DateTimePicker::make('published_at')
                            ->label('Data de publicacao')
                            ->seconds(false),
                        TextInput::make('tag')
                            ->label('Tag (ex: SC Acontece, SBT…)')
                            ->maxLength(100)
                            ->helperText('Exibida como badge na capa e nas listagens.'),
                    ]),
                Section::make('SEO')
                    ->columns(2)
                    ->columnSpan(10)
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('Titulo SEO (meta title)')
                            ->maxLength(255)
                            ->helperText('Deixe vazio para usar o título do post. Exibido na aba do navegador e no Google.'),
                        Textarea::make('seo_description')
                            ->label('Descricao SEO')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
