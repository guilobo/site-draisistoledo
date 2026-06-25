@props([
    'type' => 'home',
    'post' => null,
    'faqItems' => null,
])

@php
    $baseUrl = rtrim(config('app.url', 'https://draisistoledo.com'), '/');
    $schemas = [];

    // ============================================
    // ORGANIZATION + LOCAL BUSINESS + MEDICAL CLINIC
    // (Presente em todas as páginas)
    // ============================================
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type' => ['MedicalClinic', 'LocalBusiness', 'Organization'],
        '@id' => $baseUrl . '/#organization',
        'name' => 'Dra. Isis Toledo — Endocrinologia',
        'alternateName' => 'Clínica Toledo — Unidade de Gestão Metabólica',
        'description' => 'Unidade de Gestão Metabólica para resultados sustentáveis em saúde, emagrecimento e longevidade. Endocrinologia baseada em evidência.',
        'url' => $baseUrl,
        'logo' => $baseUrl . '/images/logo-endocrinologista.png',
        'image' => $baseUrl . '/images/Dra_Isis_Thiago_Braga-10.jpg',
        'telephone' => '+5548999344088',
        'medicalSpecialty' => 'https://schema.org/Endocrine',
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Florianópolis, SC, Brasil',
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Florianópolis',
            'addressRegion' => 'SC',
            'addressCountry' => 'BR',
        ],
        'sameAs' => [
            'https://www.instagram.com/draisisendocrino',
        ],
        'priceRange' => '$$$',
    ];

    // ============================================
    // WEBSITE (com SearchAction) — apenas na home
    // ============================================
    if ($type === 'home') {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => $baseUrl . '/#website',
            'url' => $baseUrl,
            'name' => 'Dra. Isis Toledo — Endocrinologista',
            'description' => 'Endocrinologia, hormônios, obesidade e gestão metabólica com a Dra. Isis Toledo em Florianópolis.',
            'inLanguage' => 'pt-BR',
            'publisher' => ['@id' => $baseUrl . '/#organization'],
        ];
    }

    // ============================================
    // PHYSICIAN / PERSON — Dra. Isis Toledo
    // ============================================
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type' => 'Physician',
        '@id' => $baseUrl . '/#physician',
        'name' => 'Dra. Isis Toledo',
        'description' => 'Médica endocrinologista e metabologista, especialista em obesidade, hormônios, emagrecimento e longevidade.',
        'url' => $baseUrl,
        'image' => $baseUrl . '/images/Dra_Isis_Thiago_Braga-10.jpg',
        'medicalSpecialty' => [
            'https://schema.org/Endocrine',
            'https://schema.org/PublicHealth',
        ],
        'credential' => 'CRM-SC 22334',
        'qualification' => [
            'CRM-SC 22334',
            'RQE 17867',
            'Título de Especialista pela SBEM (Sociedade Brasileira de Endocrinologia e Metabologia)',
        ],
        'availableService' => [
            'Consultoria em Endocrinologia',
            'Tratamento de Obesidade',
            'Gestão Metabólica',
            'Avaliação Hormonal',
            'Programas de Emagrecimento',
            'Medicina de Longevidade',
        ],
        'knowsAbout' => [
            'Endocrinologia',
            'Hormônios',
            'Obesidade',
            'Emagrecimento',
            'Menopausa',
            'Metabolismo',
            'GLP-1',
            'Longevidade',
            'Bioimpedância',
        ],
        'worksFor' => ['@id' => $baseUrl . '/#organization'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Florianópolis',
            'addressRegion' => 'SC',
            'addressCountry' => 'BR',
        ],
        'telephone' => '+5548999344088',
    ];

    // ============================================
    // ARTICLE / BLOG POST
    // ============================================
    if ($type === 'article' && $post) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->excerpt ?? $post->seo_description,
            'image' => $post->featured_image_path
                ? (str_starts_with($post->featured_image_path, 'http')
                    ? $post->featured_image_path
                    : $baseUrl . \Illuminate\Support\Facades\Storage::url($post->featured_image_path))
                : $baseUrl . '/images/Dra_Isis_Thiago_Braga-10.jpg',
            'datePublished' => $post->published_at?->format('c'),
            'dateModified' => ($post->updated_at ?? $post->published_at)?->format('c'),
            'author' => [
                '@type' => 'Physician',
                'name' => 'Dra. Isis Toledo',
                'url' => $baseUrl . '/#physician',
            ],
            'publisher' => ['@id' => $baseUrl . '/#organization'],
            'inLanguage' => 'pt-BR',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $baseUrl . '/blog/' . $post->slug,
            ],
        ];
    }

    // ============================================
    // MEDIANEWS / MÍDIA
    // ============================================
    if ($type === 'media' && $post) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->excerpt ?? $post->seo_description,
            'image' => $post->featured_image_path
                ? (str_starts_with($post->featured_image_path, 'http')
                    ? $post->featured_image_path
                    : $baseUrl . \Illuminate\Support\Facades\Storage::url($post->featured_image_path))
                : null,
            'datePublished' => $post->published_at?->format('c'),
            'dateModified' => ($post->updated_at ?? $post->published_at)?->format('c'),
            'author' => [
                '@type' => 'Physician',
                'name' => 'Dra. Isis Toledo',
                'url' => $baseUrl . '/#physician',
            ],
            'publisher' => ['@id' => $baseUrl . '/#organization'],
            'inLanguage' => 'pt-BR',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $baseUrl . '/na-midia/' . $post->slug,
            ],
        ];
    }

    // ============================================
    // FAQPage (GEO — otimizado para IA)
    // ============================================
    if ($faqItems && is_array($faqItems) && count($faqItems)) {
        $faqEntries = [];
        foreach ($faqItems as $item) {
            $faqEntries[] = [
                '@type' => 'Question',
                'name' => $item['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['a'],
                ],
            ];
        }
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqEntries,
        ];
    }

    // ============================================
    // BREADCRUMBLIST
    // ============================================
    $crumbs = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Início',
            'item' => $baseUrl . '/',
        ],
    ];

    if ($type === 'blog-index') {
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => $baseUrl . '/blog',
        ];
    } elseif ($type === 'media-index') {
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Na Mídia',
            'item' => $baseUrl . '/na-midia',
        ];
    } elseif ($type === 'article' && $post) {
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => $baseUrl . '/blog',
        ];
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $post->title,
            'item' => $baseUrl . '/blog/' . $post->slug,
        ];
    } elseif ($type === 'media' && $post) {
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Na Mídia',
            'item' => $baseUrl . '/na-midia',
        ];
        $crumbs[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $post->title,
            'item' => $baseUrl . '/na-midia/' . $post->slug,
        ];
    }

    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $crumbs,
    ];
@endphp

@foreach($schemas as $schema)
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endforeach
