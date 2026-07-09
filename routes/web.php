<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\SitemapController;

// ============================================
// SEO: Sitemap dinâmico
// ============================================
Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->name('sitemap');

Route::get('/docs/api-3f84c6db2a7e41c091b5d9e8f2a1c7ab4e56f901a2b3c4d5', function () {
    $markdownPath = resource_path('docs/api-public-integration.md');

    abort_unless(File::exists($markdownPath), 404);

    return view('api-docs', [
        'title' => 'Documentação da API de Postagens',
        'html' => Str::markdown(File::get($markdownPath)),
    ]);
})->name('api.docs.public');

Route::get('/', function () {
    $posts = Post::where('status', 'published')
        ->orderBy('published_at', 'desc')
        ->with('categories')
        ->take(3)
        ->get();

    $midiaCategory = Category::where('slug', 'na-midia')->first();
    $midiaHighlights = $midiaCategory
        ? Post::where('status', 'published')
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get()
        : collect();

    // FAQ items para Schema.org FAQPage (GEO optimization)
    $faqItems = [
        [
            'q' => 'Quando procurar um endocrinologista?',
            'a' => 'Recomenda-se procurar um endocrinologista quando há dificuldade de emagrecer mesmo com dieta e exercício, ganho de peso inexplicado, fadiga persistente, alterações hormonais (como menopausa), ou quando se busca um acompanhamento médico estruturado para reverter obesidade e transtornos metabólicos. A Dra. Isis Toledo oferece avaliação individualizada em Florianópolis/SC.',
        ],
        [
            'q' => 'Como é o tratamento para obesidade com a Dra. Isis Toledo?',
            'a' => 'O tratamento de obesidade combina diagnóstico aprofundado (bioimpedância InBody 970, painel hormonal), estratégia nutricional integrada, uso criterioso de medicamentos como análogos de GLP-1 quando indicado, e acompanhamento longitudinal de 3 ou 12 meses. O foco é resultado sustentável, sem efeito sanfona, com ajustes personalizados em cada fase.',
        ],
        [
            'q' => 'O que causa desequilíbrio hormonal?',
            'a' => 'Desequilíbrios hormonais podem ser causados por menopausa, estresse crônico, disfunções da tireoide, resistência à insulina, ganho de peso, sedentarismo e fatores genéticos. Os sintomas incluem fadiga, alterações de peso, mudanças de humor e distúrbios do sono. O diagnóstico correto exige exames específicos interpretados por um endocrinologista.',
        ],
        [
            'q' => 'O que são análogos de GLP-1 e quando são indicados?',
            'a' => 'Análogos de GLP-1 são medicamentos que auxiliam no controle do apetite e da glicemia, indicados para tratamento de obesidade e diabetes tipo 2. São prescritos apenas com avaliação médica, dentro de um protocolo estruturado que inclui dieta, exercício e monitoramento. A Dra. Isis Toledo utiliza GLP-1 de forma criteriosa e personalizada.',
        ],
        [
            'q' => 'Quanto tempo dura o tratamento de emagrecimento?',
            'a' => 'A Dra. Isis Toledo oferece dois formatos: o Programa Metabólico Intensivo (3 meses) para reestruturação metabólica focada, e o Programa Longitudinal (12 meses) para transformação completa com acompanhamento estendido. A escolha depende do perfil e objetivos de cada paciente.',
        ],
        [
            'q' => 'É necessário ter sobrepeso para consultar um endocrinologista?',
            'a' => 'Não. O endocrinologista trata não apenas obesidade, mas também alterações hormonais (tireoide, menopausa), fadiga crônica, questões de longevidade e performance metabólica. Mesmo sem sobrepeso, a avaliação endocrinológica pode identificar desequilíbrios que afetam qualidade de vida.',
        ],
        [
            'q' => 'Como agendar uma avaliação com a Dra. Isis Toledo?',
            'a' => 'O agendamento é feito pelo WhatsApp (+55 48 99934-4088) ou pelo botão "Agendar Avaliação" no site. A primeira consulta inclui avaliação clínica, análise de histórico e definição de um plano personalizado baseado nos objetivos e no perfil metabólico do paciente.',
        ],
    ];

    return view('welcome', compact('posts', 'midiaHighlights', 'faqItems'));
});

// Na Mídia
Route::get('/na-midia', function () {
    $midiaCategory = Category::where('slug', 'na-midia')->first();

    $posts = $midiaCategory
        ? Post::where('status', 'published')
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->paginate(12)
        : collect()->paginate(12);

    return view('midia.index', compact('posts'));
})->name('midia.index');

Route::get('/na-midia/{slug}', function (string $slug) {
    $midiaCategory = Category::where('slug', 'na-midia')->first();

    $post = Post::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    $related = $midiaCategory
        ? Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get()
        : collect();

    return view('midia.show', compact('post', 'related'));
})->name('midia.show');

// Blog
Route::get('/blog', function () {
    $posts = Post::where('status', 'published')
        ->orderBy('published_at', 'desc')
        ->with('categories')
        ->paginate(9);

    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = Post::where('slug', $slug)
        ->where('status', 'published')
        ->with('categories')
        ->firstOrFail();

    return view('blog.show', compact('post'));
})->name('blog.show');
