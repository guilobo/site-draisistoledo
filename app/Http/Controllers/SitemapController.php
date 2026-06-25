<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * Gera o sitemap.xml dinâmico para SEO.
     * Inclui páginas estáticas, posts do blog e participações na mídia.
     */
    public function index(): Response
    {
        $baseUrl = rtrim(config('app.url', 'https://draisistoledo.com'), '/');

        // ============================================
        // PÁGINAS ESTÁTICAS (sempre presentes)
        // ============================================
        $staticPages = [
            [
                'loc' => $baseUrl . '/',
                'lastmod' => Carbon::now(),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => $baseUrl . '/na-midia',
                'lastmod' => Carbon::now(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => $baseUrl . '/blog',
                'lastmod' => Carbon::now(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
        ];

        // ============================================
        // POSTS PUBLICADOS (Blog + Mídia)
        // ============================================
        $posts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        $postUrls = [];

        foreach ($posts as $post) {
            // Determina se é blog ou mídia pela categoria
            $isMidia = $post->categories()
                ->where('slug', 'na-midia')
                ->exists();

            $path = $isMidia ? '/na-midia/' : '/blog/';

            $postUrls[] = [
                'loc' => $baseUrl . $path . $post->slug,
                'lastmod' => $post->updated_at ?? $post->published_at ?? Carbon::now(),
                'changefreq' => 'monthly',
                'priority' => $isMidia ? '0.7' : '0.8',
            ];
        }

        $allUrls = array_merge($staticPages, $postUrls);

        // ============================================
        // GERAR XML
        // ============================================
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($allUrls as $url) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc'], ENT_XML1) . "</loc>\n";
            $xml .= '    <lastmod>' . $url['lastmod']->format('Y-m-d') . "</lastmod>\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . "</changefreq>\n";
            $xml .= '    <priority>' . $url['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
