<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $post->seo_description ?? $post->excerpt ?? 'Participação da Dra. Isis Toledo na mídia — Endocrinologista e Metabologista.' }}">
    <title>{{ $post->seo_title ?? $post->title }} | Dra. Isis Toledo — Endocrinologista</title>
    <link rel="icon" type="image/png" href="/images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .prose h2 { font-family: var(--font-serif); font-size: 1.5rem; font-weight: 600; color: #1C1917; margin-top: 2.5rem; margin-bottom: 1rem; }
        .prose h3 { font-family: var(--font-serif); font-size: 1.25rem; font-weight: 600; color: #1C1917; margin-top: 2rem; margin-bottom: 0.75rem; }
        .prose p { color: #44403C; line-height: 1.9; margin-bottom: 1.25rem; }
        .prose a { color: #B8955A; text-decoration: underline; text-underline-offset: 2px; }
        .prose strong { color: #1C1917; font-weight: 600; }
        .prose blockquote { border-left: 3px solid #B8955A; padding-left: 1.25rem; margin: 2rem 0; color: #57534E; font-style: italic; }
        .media-video-embed { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 2px; margin: 2rem 0; background: #1C1917; }
        .media-video-embed iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; }
    </style>
</head>

<body class="bg-warm-white font-sans text-brand-900 antialiased">

    {{-- NAV --}}
    <nav id="main-nav" class="nav-scrolled fixed top-0 inset-x-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="/"><img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo" class="h-10 w-auto object-contain"></a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href="/#sobre" class="text-sm text-white/80 hover:text-white font-medium transition-colors">Sobre</a>
                    <a href="/#programas" class="text-sm text-white/80 hover:text-white font-medium transition-colors">Programas</a>
                    <a href="/na-midia" class="text-sm text-white font-medium">Na Mídia</a>
                    <a href="/blog" class="text-sm text-white/80 hover:text-white font-medium transition-colors">Blog</a>
                </div>
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                   target="_blank" rel="noopener noreferrer"
                   class="hidden lg:inline-flex btn-gold">Agendar Avaliação</a>
                <button id="menu-btn" type="button" aria-label="Abrir menu" aria-expanded="false"
                        class="lg:hidden flex flex-col justify-center items-center w-9 h-9 gap-1.5">
                    <span class="block w-6 h-px bg-white"></span>
                    <span class="block w-6 h-px bg-white"></span>
                    <span class="block w-4 h-px bg-white"></span>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="absolute inset-x-0 top-full lg:hidden opacity-0 pointer-events-none transition-opacity duration-200 bg-brand-900/98 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col gap-5">
                <a href="/" class="text-base text-white/80 hover:text-white font-medium">Início</a>
                <a href="/na-midia" class="text-base text-white font-medium">Na Mídia</a>
                <a href="https://wa.me/5548999344088" target="_blank" rel="noopener noreferrer" class="btn-gold self-start mt-2">Agendar Avaliação</a>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <header class="pt-32 pb-12 bg-brand-900">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="flex items-center gap-2 mb-6 flex-wrap">
                <a href="/" class="text-sm text-white/40 hover:text-white/70 transition-colors">Início</a>
                <span class="text-white/20">›</span>
                <a href="/na-midia" class="text-sm text-white/40 hover:text-white/70 transition-colors">Na Mídia</a>
                <span class="text-white/20">›</span>
                <span class="text-sm text-white/60 line-clamp-1">{{ $post->title }}</span>
            </div>

            <div class="flex items-center gap-3 mb-5 flex-wrap">
                @if($post->tag)
                <span class="text-xs font-semibold text-brand-900 bg-gold-400 px-3 py-1.5 rounded-sm">{{ $post->tag }}</span>
                @endif
                @if($post->published_at)
                <time class="text-sm text-white/40">{{ $post->published_at->translatedFormat('d \d\e F \d\e Y') }}</time>
                @endif
            </div>

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif text-white leading-tight mb-5">
                {{ $post->title }}
            </h1>

            @if($post->excerpt)
            <p class="text-lg text-white/50 leading-relaxed">{{ $post->excerpt }}</p>
            @endif
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="py-12 pb-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">

            {{-- Featured image (only if no video) --}}
            @php
                $img = $post->featured_image_path;
                $imgSrc = $img ? Storage::url($img) : null;
                $hasVideo = str_contains($post->content ?? '', 'youtube.com/embed');
            @endphp

            @if($imgSrc && !$hasVideo)
            <div class="mb-10 rounded-sm overflow-hidden shadow-lg">
                <img src="{{ $imgSrc }}"
                     alt="{{ $post->title }}"
                     class="w-full object-cover"
                     style="max-height: 480px;"
                     loading="eager">
            </div>
            @endif

            {{-- Main content (includes YouTube embed if video) --}}
            <div class="prose max-w-none">
                {!! $post->content !!}
            </div>

            {{-- Author bar --}}
            <div class="mt-14 pt-8 border-t border-brand-100 flex items-center gap-4">
                <img src="/images/Dra_Isis_Thiago_Braga-9.jpg"
                     alt="Dra. Isis Toledo"
                     class="w-12 h-12 rounded-full object-cover object-top flex-shrink-0">
                <div>
                    <p class="font-semibold text-brand-900 text-sm">Dra. Isis Toledo</p>
                    <p class="text-xs text-brand-500 mt-0.5">Endocrinologista · SBEM · Especialista em Gestão Metabólica</p>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="mt-10 flex items-center gap-4 flex-wrap">
                <a href="/na-midia" class="btn-outline-gold text-sm">← Ver todas as participações</a>
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-gold text-sm">Agendar Avaliação</a>
            </div>
        </div>
    </main>

    {{-- RELATED --}}
    @if($related->count())
    <section class="py-16 bg-cream border-t border-brand-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-2xl font-serif text-brand-900 mb-8">Outras participações</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($related as $rel)
                @php
                    $relImg = $rel->featured_image_path;
                    $relImgSrc = $relImg ? (str_starts_with($relImg, 'http') ? $relImg : Storage::url($relImg)) : null;
                    $relHasVideo = str_contains($rel->content ?? '', 'youtube.com/embed');
                @endphp
                <article class="group bg-white rounded-sm overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="/na-midia/{{ $rel->slug }}" class="block relative overflow-hidden aspect-video bg-brand-900">
                        @if($relImgSrc)
                        <img src="{{ $relImgSrc }}" alt="{{ $rel->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-brand-800 to-brand-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/50 to-transparent"></div>
                        @if($relHasVideo)
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        @endif
                        @if($rel->tag)
                        <div class="absolute top-2 left-2">
                            <span class="text-xs font-semibold text-brand-900 bg-gold-400 px-2 py-1 rounded-sm">{{ $rel->tag }}</span>
                        </div>
                        @endif
                    </a>
                    <div class="p-4">
                        <h3 class="font-serif font-semibold text-brand-900 text-sm leading-snug line-clamp-2 group-hover:text-gold-700 transition-colors">
                            <a href="/na-midia/{{ $rel->slug }}">{{ $rel->title }}</a>
                        </h3>
                        @if($rel->published_at)
                        <time class="text-xs text-brand-400 mt-2 block">{{ $rel->published_at->format('d/m/Y') }}</time>
                        @endif
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-16 bg-brand-900">
        <div class="max-w-3xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-serif text-white mb-4">Quer entender mais sobre o seu caso?</h2>
            <p class="text-white/50 mb-8">Agende uma avaliação e receba um diagnóstico individualizado da Dra. Isis Toledo.</p>
            <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
               target="_blank" rel="noopener noreferrer" class="btn-gold">Agendar pelo WhatsApp</a>
        </div>
    </section>

    <footer class="bg-brand-950 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="/"><img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo" class="h-7 w-auto object-contain opacity-70"></a>
            <p class="text-xs text-brand-600">© {{ date('Y') }} Dra. Isis Toledo · CRM-SC 22334 · RQE 17867 · SBEM</p>
        </div>
    </footer>

    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
       target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Falar pelo WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
</body>
</html>
