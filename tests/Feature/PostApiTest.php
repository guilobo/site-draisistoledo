<?php

namespace Tests\Feature;

use App\Filament\Resources\ApiTokens\Pages\CreateApiToken;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_requires_authentication_to_create_posts(): void
    {
        $this->postJson('/api/posts', [])
            ->assertUnauthorized();
    }

    public function test_api_can_create_a_post_with_token_and_image_upload(): void
    {
        Storage::fake('public');

        $admin = User::factory()->admin()->create();
        $category = Category::create([
            'name' => 'Na Mídia',
            'slug' => 'na-midia',
        ]);

        Sanctum::actingAs($admin, ['posts:create']);

        $response = $this->post('/api/posts', [
            'title' => 'Novo post via API',
            'excerpt' => 'Resumo do post.',
            'content' => '<p>Conteúdo do post.</p>',
            'categories' => [$category->slug],
            'featured_image' => UploadedFile::fake()->image('capa.jpg'),
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => '2026-07-09 14:00:00',
            'tag' => 'Jovem Pan',
            'seo_title' => 'SEO title',
            'seo_description' => 'SEO description',
        ]);

        $response->assertCreated()
            ->assertJsonPath('data.title', 'Novo post via API')
            ->assertJsonPath('data.status', Post::STATUS_PUBLISHED)
            ->assertJsonPath('data.categories.0.slug', 'na-midia');

        $post = Post::firstOrFail();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Novo post via API',
            'tag' => 'Jovem Pan',
        ]);
        $this->assertDatabaseHas('category_post', [
            'post_id' => $post->id,
            'category_id' => $category->id,
        ]);
        Storage::disk('public')->assertExists($post->featured_image_path);
    }

    public function test_api_can_update_an_existing_post(): void
    {
        $admin = User::factory()->admin()->create();
        $category = Category::create([
            'name' => 'Blog',
            'slug' => 'blog',
        ]);
        $post = Post::create([
            'user_id' => $admin->id,
            'title' => 'Original',
            'slug' => 'original',
            'content' => '<p>Antes</p>',
            'status' => Post::STATUS_DRAFT,
        ]);

        Sanctum::actingAs($admin, ['posts:update']);

        $this->putJson("/api/posts/{$post->id}", [
            'title' => 'Atualizado',
            'content' => '<p>Depois</p>',
            'categories' => [$category->slug],
            'status' => Post::STATUS_ARCHIVED,
        ])->assertOk()
            ->assertJsonPath('data.title', 'Atualizado')
            ->assertJsonPath('data.status', Post::STATUS_ARCHIVED);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Atualizado',
            'status' => Post::STATUS_ARCHIVED,
        ]);
        $this->assertDatabaseHas('category_post', [
            'post_id' => $post->id,
            'category_id' => $category->id,
        ]);
    }

    public function test_api_rejects_tokens_without_required_ability(): void
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin, ['posts:update']);

        $this->postJson('/api/posts', [
            'title' => 'Sem permissão',
            'content' => '<p>Teste</p>',
            'status' => Post::STATUS_DRAFT,
        ])->assertForbidden();
    }

    public function test_api_can_list_categories_with_valid_token(): void
    {
        $admin = User::factory()->admin()->create();
        Category::create([
            'name' => 'Na Mídia',
            'slug' => 'na-midia',
            'description' => 'Participações em mídia',
        ]);

        Sanctum::actingAs($admin, ['categories:view']);

        $this->getJson('/api/categories')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.slug', 'na-midia');
    }

    public function test_api_can_create_category_with_valid_token(): void
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin, ['categories:create']);

        $this->postJson('/api/categories', [
            'name' => 'Blog',
            'slug' => 'blog',
            'description' => 'Conteúdos editoriais',
        ])->assertCreated()
            ->assertJsonPath('data.slug', 'blog');

        $this->assertDatabaseHas('categories', [
            'name' => 'Blog',
            'slug' => 'blog',
        ]);
    }

    public function test_api_rejects_category_requests_without_required_ability(): void
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin, ['posts:create']);

        $this->getJson('/api/categories')->assertForbidden();
        $this->postJson('/api/categories', [
            'name' => 'Nova categoria',
        ])->assertForbidden();
    }

    public function test_api_validates_unknown_category_slugs(): void
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin, ['posts:create']);

        $this->postJson('/api/posts', [
            'title' => 'Categorias inválidas',
            'content' => '<p>Teste</p>',
            'categories' => ['nao-existe'],
            'status' => Post::STATUS_DRAFT,
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['categories.0']);
    }

    public function test_api_can_create_a_youtube_post_without_content(): void
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin, ['posts:create']);

        $this->postJson('/api/posts', [
            'title' => 'Post com vídeo',
            'youtube_url' => 'https://www.youtube.com/watch?v=JUT-6AvdsME',
            'status' => Post::STATUS_DRAFT,
        ])->assertCreated();

        $post = Post::firstOrFail();

        $this->assertStringContainsString('youtube.com/embed/JUT-6AvdsME', $post->content);
    }

    public function test_api_validates_unique_slug(): void
    {
        $admin = User::factory()->admin()->create();
        Post::create([
            'user_id' => $admin->id,
            'title' => 'Existente',
            'slug' => 'slug-duplicado',
            'content' => '<p>Teste</p>',
            'status' => Post::STATUS_DRAFT,
        ]);

        Sanctum::actingAs($admin, ['posts:create']);

        $this->postJson('/api/posts', [
            'title' => 'Outro post',
            'slug' => 'slug-duplicado',
            'content' => '<p>Teste</p>',
            'status' => Post::STATUS_DRAFT,
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['slug']);
    }

    public function test_admin_can_create_an_api_token_from_filament_page(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin);

        Livewire::test(CreateApiToken::class)
            ->fillForm([
                'name' => 'Integração editorial',
                'abilities' => ['categories:view', 'categories:create', 'posts:create', 'posts:update'],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $token = PersonalAccessToken::query()->first();

        $this->assertNotNull($token);
        $this->assertSame('Integração editorial', $token->name);
        $this->assertSame(['categories:view', 'categories:create', 'posts:create', 'posts:update'], $token->abilities);
    }

    public function test_api_docs_page_is_publicly_accessible(): void
    {
        $this->get('/docs/api-3f84c6db2a7e41c091b5d9e8f2a1c7ab4e56f901a2b3c4d5')
            ->assertOk()
            ->assertSee('Documentação da API de Postagens')
            ->assertSee('POST /api/posts')
            ->assertSee('GET /api/categories');
    }

    public function test_api_tokens_page_shows_docs_button(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get('/admin/api-tokens')
            ->assertOk()
            ->assertSee('Criar chave de API')
            ->assertSee('Ver documentação da API');
    }

    public function test_revoked_token_can_no_longer_access_the_api(): void
    {
        $admin = User::factory()->admin()->create();
        $plainTextToken = $admin->createToken('Integração', ['posts:create'])->plainTextToken;
        [$tokenId] = explode('|', $plainTextToken, 2);

        PersonalAccessToken::query()->findOrFail($tokenId)->delete();

        $this->withHeader('Authorization', 'Bearer ' . $plainTextToken)
            ->postJson('/api/posts', [
                'title' => 'Post bloqueado',
                'content' => '<p>Teste</p>',
                'status' => Post::STATUS_DRAFT,
            ])
            ->assertUnauthorized();
    }
}
