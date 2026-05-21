<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_post_creation_page(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this
            ->actingAs($admin)
            ->get('/admin/posts/create')
            ->assertOk()
            ->assertSee('Titulo')
            ->assertSee('Categorias')
            ->assertSee('Conteudo')
            ->assertSee('Status');
    }

    public function test_post_can_be_created_published_deleted_and_restored(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);
        $category = Category::create([
            'name' => 'Metabolismo',
            'slug' => 'metabolismo',
        ]);

        $post = Post::create([
            'user_id' => $admin->id,
            'title' => 'Postagem de teste',
            'slug' => 'postagem-de-teste',
            'content' => '<p>Conteudo de teste.</p>',
            'status' => Post::STATUS_DRAFT,
        ]);
        $post->categories()->attach($category);

        $post->update([
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);

        $this->assertDatabaseHas('posts', [
            'slug' => 'postagem-de-teste',
            'status' => Post::STATUS_PUBLISHED,
        ]);
        $this->assertDatabaseHas('category_post', [
            'category_id' => $category->id,
            'post_id' => $post->id,
        ]);

        $post->delete();
        $this->assertSoftDeleted($post);

        $post->restore();
        $this->assertNotSoftDeleted($post);
    }

    public function test_admin_home_redirects_to_posts_instead_of_dashboard(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this
            ->actingAs($admin)
            ->get('/admin')
            ->assertRedirect('/admin/posts');
    }
}
