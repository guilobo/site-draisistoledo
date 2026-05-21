<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dra. Isis Toledo na mídia — participações em TV, rádio, podcasts e portais de notícias. Especialista em endocrinologia e gestão metabólica.">
    <title>Na Mídia — Dra. Isis Toledo | Endocrinologista</title>
    <link rel="icon" type="image/png" href="/images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-warm-white font-sans text-brand-900 antialiased">

    {{-- NAV --}}
    <nav id="main-nav" class="nav-scrolled fixed top-0 inset-x-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex-shrink-0">
                    <img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo" class="h-10 w-auto object-contain">
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href="/#sobre" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors">Sobre</a>
                    <a href="/#programas" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors">Programas</a>
                    <a href="/na-midia" class="text-sm text-white font-medium tracking-wide">Na Mídia</a>
                    <a href="/blog" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors">Blog</a>
                </div>
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                   target="_blank" rel="noopener noreferrer"
                   class="hidden lg:inline-flex btn-gold">
                    Agendar Avaliação
                </a>
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
                <a href="/#sobre" class="text-base text-white/80 hover:text-white font-medium">Sobre</a>
                <a href="/#programas" class="text-base text-white/80 hover:text-white font-medium">Programas</a>
                <a href="/na-midia" class="text-base text-white font-medium">Na Mídia</a>
                <a href="/blog" class="text-base text-white/80 hover:text-white font-medium">Blog</a>
                <a href="https://wa.me/5548999344088" target="_blank" rel="noopener noreferrer" class="btn-gold self-start mt-2">Agendar Avaliação</a>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <header class="pt-32 pb-20 bg-brand-900 relative overflow-hidden">
        <div class="absolute inset-0" style="background-image: radial-gradient(ellipse 70% 60% at 80% 60%, rgba(184,149,90,0.1) 0%, transparent 70%);"></div>
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center gap-2 mb-8">
                <a href="/" class="text-sm text-white/40 hover:text-white/70 transition-colors">Início</a>
                <span class="text-white/20 text-sm">›</span>
                <span class="text-sm text-gold-400">Na Mídia</span>
            </div>

            <div class="max-w-3xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="gold-line"></div>
                    <span class="section-label-light">Presença na mídia</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif text-white leading-tight mb-6">
                    Dra. Isis Toledo<br>
                    <em class="text-gold-400 not-italic">na mídia</em>
                </h1>
                <p class="text-lg text-white/50 leading-relaxed max-w-2xl">
                    Participações em programas de TV, rádio, podcasts e portais de notícias. A voz da Dra. Isis Toledo levando informação de qualidade sobre saúde metabólica, emagrecimento e longevidade para o Brasil.
                </p>

                {{-- Outlet badges --}}
                <div class="flex flex-wrap gap-2 mt-8">
                    @php
                    $outlets = $posts->pluck('seo_title')->filter()->unique()->values();
                    @endphp
                    @foreach($outlets->take(8) as $outlet)
                    <span class="text-xs font-medium text-white/50 border border-white/15 px-3 py-1.5 rounded-sm">{{ $outlet }}</span>
                    @endforeach
                    @if($outlets->count() > 8)
                    <span class="text-xs font-medium text-white/30 px-3 py-1.5">+{{ $outlets->count() - 8 }} outros</span>
                    @endif
                </div>
            </div>
        </div>
    </header>

    {{-- POSTS GRID --}}
    <main class="py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            @if($posts->isEmpty())
            <div class="text-center py-20">
                <p class="text-brand-400 text-lg">Nenhuma aparição cadastrada ainda.</p>
                <a href="/" class="btn-gold mt-6 inline-flex">Voltar ao início</a>
            </div>
            @else

            {{-- Count --}}
            <p class="text-sm text-brand-400 mb-10">
                {{ $posts->total() }} participações registradas
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                @php
                    $img = $post->featured_image_path;
                    $imgSrc = $img ? Storage::url($img) : null;
                    $hasVideo = str_contains($post->content ?? '', 'youtube.com/embed');
                    $outlet = $post->tag;
                @endphp

                <article class="group bg-white rounded-sm overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">

                    {{-- Thumbnail --}}
                    <a href="/na-midia/{{ $post->slug }}" class="block relative overflow-hidden aspect-video bg-brand-900">
                        @if($imgSrc)
                        <img src="{{ $imgSrc }}"
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             loading="lazy">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-brand-800 to-brand-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif

                        {{-- Overlay gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/60 via-transparent to-transparent"></div>

                        {{-- Video play badge --}}
                        @if($hasVideo)
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30 group-hover:bg-gold-500/90 group-hover:border-gold-500 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        @endif

                        {{-- Outlet badge --}}
                        @if($outlet)
                        <div class="absolute top-3 left-3">
                            <span class="text-xs font-semibold text-brand-900 bg-gold-400 px-2.5 py-1 rounded-sm">{{ $outlet }}</span>
                        </div>
                        @endif
                    </a>

                    {{-- Content --}}
                    <div class="p-5">
                        @if($post->published_at)
                        <time class="text-xs text-brand-400 mb-2 block">{{ $post->published_at->translatedFormat('d \d\e F \d\e Y') }}</time>
                        @endif

                        <h2 class="font-serif font-semibold text-brand-900 text-base leading-snug mb-3 group-hover:text-gold-700 transition-colors line-clamp-2">
                            <a href="/na-midia/{{ $post->slug }}">{{ $post->title }}</a>
                        </h2>

                        @if($post->excerpt)
                        <p class="text-sm text-brand-500 leading-relaxed line-clamp-2 mb-4">{{ $post->excerpt }}</p>
                        @endif

                        <a href="/na-midia/{{ $post->slug }}"
                           class="inline-flex items-center gap-1.5 text-xs font-semibold text-gold-600 hover:text-gold-500 uppercase tracking-wide transition-colors">
                            @if($hasVideo)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            Assistir vídeo
                            @else
                            Ver aparição
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            @endif
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($posts->hasPages())
            <div class="flex items-center justify-center gap-2 mt-14">
                @if($posts->onFirstPage())
                <span class="px-5 py-2.5 text-sm text-brand-300 border border-brand-200 rounded-sm cursor-not-allowed">← Anterior</span>
                @else
                <a href="{{ $posts->previousPageUrl() }}" class="px-5 py-2.5 text-sm text-brand-600 border border-brand-200 rounded-sm hover:border-gold-500 hover:text-gold-600 transition-colors">← Anterior</a>
                @endif

                <span class="text-sm text-brand-400 px-3">{{ $posts->currentPage() }} / {{ $posts->lastPage() }}</span>

                @if($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="px-5 py-2.5 text-sm text-brand-600 border border-brand-200 rounded-sm hover:border-gold-500 hover:text-gold-600 transition-colors">Próximo →</a>
                @else
                <span class="px-5 py-2.5 text-sm text-brand-300 border border-brand-200 rounded-sm cursor-not-allowed">Próximo →</span>
                @endif
            </div>
            @endif
            @endif
        </div>
    </main>

    {{-- CTA --}}
    <section class="py-16 bg-brand-900">
        <div class="max-w-3xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-serif text-white mb-4">Pronta para dar o próximo passo?</h2>
            <p class="text-white/50 mb-8 leading-relaxed">Agende uma avaliação com a Dra. Isis Toledo e receba um diagnóstico individualizado.</p>
            <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
               target="_blank" rel="noopener noreferrer"
               class="btn-gold">Agendar pelo WhatsApp</a>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-brand-950 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="/"><img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo" class="h-7 w-auto object-contain opacity-70"></a>
            <p class="text-xs text-brand-600">© {{ date('Y') }} Dra. Isis Toledo · CRM-SC 22334 · RQE 17867 · SBEM</p>
        </div>
    </footer>

    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
       target="_blank" rel="noopener noreferrer"
       class="whatsapp-float" aria-label="Falar pelo WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
</body>
</html>
