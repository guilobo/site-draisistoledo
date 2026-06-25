<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <x-seo.head
        title="Endocrinologista | Gestão Metabólica | Florianópolis"
        description="Dra. Isis Toledo — Endocrinologista especialista em gestão metabólica, emagrecimento sustentável e longevidade. Medicina baseada em evidência, estratégia personalizada."
    />

    <x-seo.schema type="home" :faq-items="$faqItems ?? null" />

    <link rel="icon" type="image/png" href="/images/fav.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-seo.analytics />
</head>

<body class="bg-warm-white font-sans text-brand-900 antialiased">

    {{-- ============================================================
         NAVIGATION
    ============================================================ --}}
    <nav id="main-nav" class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <a href="/" class="flex-shrink-0" aria-label="Dra. Isis Toledo — página inicial">
                    <img src="/images/logo-endocrinologista.png"
                         alt="Dra. Isis Toledo Endocrinologista"
                         class="h-10 w-auto object-contain">
                </a>

                <!-- Desktop links -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="#sobre" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Sobre</a>
                    <a href="#como-funciona" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Método</a>
                    <a href="#programas" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Programas</a>
                    <a href="#depoimentos" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Resultados</a>
                    <a href="/na-midia" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Na Mídia</a>
                    <a href="/blog" class="text-sm text-white/80 hover:text-white font-medium tracking-wide transition-colors duration-200">Blog</a>
                </div>

                <!-- CTA + hamburger -->
                <div class="flex items-center gap-4">
                    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                       target="_blank" rel="noopener noreferrer"
                       class="hidden lg:inline-flex btn-gold">
                        Agendar Avaliação
                    </a>

                    <!-- Hamburger -->
                    <button id="menu-btn" type="button" aria-label="Abrir menu" aria-expanded="false"
                            class="lg:hidden flex flex-col justify-center items-center w-9 h-9 gap-1.5">
                        <span class="block w-6 h-px bg-white transition-all duration-200"></span>
                        <span class="block w-6 h-px bg-white transition-all duration-200"></span>
                        <span class="block w-4 h-px bg-white transition-all duration-200"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu"
             class="absolute inset-x-0 top-full lg:hidden opacity-0 pointer-events-none transition-opacity duration-200 bg-brand-900/98 backdrop-blur-sm border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col gap-5">
                <a href="#sobre" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Sobre</a>
                <a href="#como-funciona" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Método</a>
                <a href="#programas" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Programas</a>
                <a href="#depoimentos" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Resultados</a>
                <a href="/na-midia" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Na Mídia</a>
                <a href="/blog" class="text-base text-white/80 hover:text-white font-medium tracking-wide">Blog</a>
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-gold self-start mt-2">
                    Agendar Avaliação
                </a>
            </div>
        </div>
    </nav>

    {{-- ============================================================
         HERO
    ============================================================ --}}
    <section id="inicio" class="relative min-h-screen bg-brand-900 overflow-hidden flex items-center">

        <!-- Background texture -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-950 via-brand-900 to-brand-800 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(ellipse 80% 50% at 70% 60%, rgba(184,149,90,0.08) 0%, transparent 70%);"></div>

        <!-- Decorative lines -->
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gold-600/30 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 w-full py-32 lg:py-0">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-8 items-center min-h-screen lg:min-h-0 lg:py-32">

                <!-- Text Content -->
                <div class="order-2 lg:order-1">
                    <div class="flex items-center gap-3 mb-8" data-reveal>
                        <div class="gold-line"></div>
                        <span class="section-label-light">Unidade de Gestão Metabólica</span>
                    </div>

                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-6" data-reveal data-delay="100ms">
                        Resultados sustentáveis em saúde,
                        <em class="text-gold-400 not-italic"> emagrecimento</em>
                        e longevidade.
                    </h1>

                    <p class="text-lg text-white/60 leading-relaxed mb-10 max-w-lg" data-reveal data-delay="200ms">
                        Tratamento médico integrado com estratégia, acompanhamento contínuo e tecnologia de precisão.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4" data-reveal data-delay="300ms">
                        <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-gold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Agendar Avaliação
                        </a>
                        <a href="#programas" class="btn-outline-light">
                            Conheça os Programas
                        </a>
                    </div>

                    <!-- Trust signals -->
                    <div class="flex flex-wrap gap-6 mt-12 pt-10 border-t border-white/10" data-reveal data-delay="400ms">
                        <div>
                            <p class="text-2xl font-serif text-gold-400">SBEM</p>
                            <p class="text-xs text-white/40 tracking-wider uppercase mt-0.5">Título de especialista</p>
                        </div>
                        <div class="w-px bg-white/10"></div>
                        <div>
                            <p class="text-2xl font-serif text-gold-400">InBody 970</p>
                            <p class="text-xs text-white/40 tracking-wider uppercase mt-0.5">Tecnologia de precisão</p>
                        </div>
                        <div class="w-px bg-white/10"></div>
                        <div>
                            <p class="text-2xl font-serif text-gold-400">+10 anos</p>
                            <p class="text-xs text-white/40 tracking-wider uppercase mt-0.5">Experiência clínica</p>
                        </div>
                    </div>
                </div>

                <!-- Doctor Photo -->
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end" data-reveal data-delay="150ms">
                    <div class="relative">
                        <!-- Decorative frame -->
                        <div class="absolute -top-4 -right-4 w-full h-full border border-gold-600/30 rounded-sm"></div>
                        <div class="absolute -top-8 -right-8 w-32 h-32 border-t border-r border-gold-500/20"></div>
                        <div class="absolute -bottom-8 -left-8 w-32 h-32 border-b border-l border-gold-500/20"></div>

                        <img src="/images/Dra_Isis_Thiago_Braga-10.jpg"
                             alt="Dra. Isis Toledo — Endocrinologista"
                             class="relative z-10 w-full max-w-sm lg:max-w-md object-cover object-top rounded-sm"
                             style="aspect-ratio: 3/4;"
                             loading="eager">

                        <!-- Gold accent badge -->
                        <div class="absolute -bottom-6 left-8 z-20 bg-gold-500 text-brand-900 px-4 py-2.5 rounded-sm shadow-lg">
                            <p class="text-xs font-semibold tracking-widest uppercase">Endocrinologista e Metabologista</p>
                            <p class="text-sm font-serif font-medium mt-0.5">CRMSC 22334 | RQE 17867</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/30 animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- ============================================================
         GEO: ANSWER-FIRST BLOCK + PONTOS-CHAVE
         (Otimizado para IA — ChatGPT, Perplexity, Gemini)
    ============================================================ --}}
    <section id="resumo-seo" class="py-12 bg-warm-white border-b border-brand-100">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="prose prose-brand max-w-none">
                <p class="text-brand-600 leading-relaxed text-base">
                    A <strong>Dra. Isis Toledo</strong> é médica <strong>endocrinologista</strong> em Florianópolis (SC), com título de especialista pela SBEM, dedicada ao tratamento de <strong>obesidade</strong>, <strong>desequilíbrios hormonais</strong> e <strong>emagrecimento sustentável</strong>. Sua clínica é uma Unidade de Gestão Metabólica que combina diagnóstico aprofundado (bioimpedância InBody 970, painel hormonal completo), terapias modernas como análogos de GLP-1, e acompanhamento longitudinal para garantir resultados duradouros. A abordagem é baseada em evidência científica e personalizada para cada paciente.
                </p>

                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-6 mb-0">
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> <strong>Endocrinologista</strong> com título SBEM e mais de 10 anos de experiência clínica
                    </li>
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> Especialista em <strong>obesidade</strong>, <strong>hormônios</strong> e metabolic health
                    </li>
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> Bioimpedância de alta precisão (InBody 970) para análise metabólica
                    </li>
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> Protocolos com GLP-1, estratégia nutricional e equipe integrada
                    </li>
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> Acompanhamento de 3 ou 12 meses, sem efeito sanfona
                    </li>
                    <li class="flex items-start gap-2 text-sm text-brand-600">
                        <span class="text-gold-500 font-bold">✓</span> Atendimento em Florianópolis/SC, com concierge médico
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- ============================================================
         POSICIONAMENTO
    ============================================================ --}}
    <section id="posicionamento" class="py-24 bg-warm-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-16" data-reveal>
                <span class="section-label">Nosso diferencial</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                    Não é uma consulta isolada.
                </h2>
                <p class="mt-4 text-brand-500 max-w-xl mx-auto leading-relaxed">
                    É um sistema médico completo, desenhado para entregar transformação real e resultado duradouro.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="card-pillar" data-reveal data-delay="0ms">
                    <div class="w-10 h-10 rounded-full bg-gold-50 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-brand-900 mb-2 text-base">Medicina Baseada em Evidência</h3>
                    <p class="text-sm text-brand-500 leading-relaxed">Decisões clínicas fundamentadas em ciência atual, não em modismos ou protocolos genéricos.</p>
                </div>

                <div class="card-pillar" data-reveal data-delay="100ms">
                    <div class="w-10 h-10 rounded-full bg-gold-50 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-brand-900 mb-2 text-base">Estratégia Personalizada</h3>
                    <p class="text-sm text-brand-500 leading-relaxed">Cada paciente recebe um plano único, construído a partir do seu diagnóstico e objetivos específicos.</p>
                </div>

                <div class="card-pillar" data-reveal data-delay="200ms">
                    <div class="w-10 h-10 rounded-full bg-gold-50 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-brand-900 mb-2 text-base">Acompanhamento Contínuo</h3>
                    <p class="text-sm text-brand-500 leading-relaxed">Monitoramento ativo em cada fase do tratamento, com ajustes de precisão para garantir progressão.</p>
                </div>

                <div class="card-pillar" data-reveal data-delay="300ms">
                    <div class="w-10 h-10 rounded-full bg-gold-50 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-brand-900 mb-2 text-base">Equipe Integrada</h3>
                    <p class="text-sm text-brand-500 leading-relaxed">Médica, nutricionista e suporte coordenados em torno do seu objetivo, sem lacunas de comunicação.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         PARA QUEM É
    ============================================================ --}}
    <section id="para-quem" class="py-24 bg-brand-900 relative overflow-hidden">

        <!-- Background accent -->
        <div class="absolute inset-0" style="background-image: radial-gradient(ellipse 60% 80% at 90% 50%, rgba(184,149,90,0.06) 0%, transparent 70%);"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Left: heading -->
                <div data-reveal>
                    <span class="section-label-light">Perfil ideal</span>
                    <h2 class="mt-4 text-3xl md:text-4xl font-serif text-white leading-tight">
                        Este programa foi criado para
                        <em class="text-gold-400 not-italic">você?</em>
                    </h2>
                    <p class="mt-6 text-white/50 leading-relaxed max-w-md">
                        A Clínica Toledo não atende todo tipo de paciente — e isso é um diferencial. Trabalhamos com quem está pronto para uma abordagem séria e comprometida com resultado real.
                    </p>
                    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20saber%20se%20o%20programa%20é%20indicado%20para%20mim"
                       target="_blank" rel="noopener noreferrer"
                       class="btn-gold mt-8 inline-flex">
                        Verificar se é para mim
                    </a>
                </div>

                <!-- Right: checklist -->
                <div data-reveal data-delay="150ms">
                    <ul class="space-y-5">
                        @php
                        $targets = [
                            ['Mulheres 35+', 'Com histórico de tentativas sem resultado duradouro.'],
                            ['Dificuldade em emagrecer', 'Mesmo com dieta e exercício, a balança não move.'],
                            ['Menopausa e hormônios', 'Alterações hormonais que impactam peso, energia e qualidade de vida.'],
                            ['Cansaço e metabolismo lento', 'Fadiga persistente, sem causa aparente ou diagnóstico resolvido.'],
                            ['Múltiplas tentativas anteriores', 'Já passou por outros tratamentos e ainda não encontrou o que funciona.'],
                        ];
                        @endphp
                        @foreach($targets as $item)
                        <li class="flex items-start gap-4 p-5 border border-white/10 rounded-sm hover:border-gold-600/40 transition-colors duration-300">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gold-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-white text-sm">{{ $item[0] }}</p>
                                <p class="text-white/50 text-sm mt-0.5 leading-relaxed">{{ $item[1] }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         COMO FUNCIONA
    ============================================================ --}}
    <section id="como-funciona" class="py-24 bg-cream">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-16" data-reveal>
                <span class="section-label">Metodologia</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                    Como funciona o método Toledo
                </h2>
                <p class="mt-4 text-brand-500 max-w-xl mx-auto leading-relaxed">
                    Três pilares estruturais que formam um sistema completo — do diagnóstico ao resultado sustentado.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Pilar 1 -->
                <div class="relative bg-white p-8 rounded-sm border-t-2 border-gold-500 shadow-sm" data-reveal data-delay="0ms">
                    <div class="text-7xl font-serif text-gold-100 leading-none mb-6 select-none">01</div>
                    <h3 class="text-xl font-serif font-semibold text-brand-900 mb-3">Medicina de Performance</h3>
                    <p class="text-brand-500 leading-relaxed text-sm">
                        Diagnóstico preciso com exames aprofundados de composição corporal, hormônios e metabolismo. Decisões clínicas baseadas em dados reais — não em suposições.
                    </p>
                    <div class="mt-6 pt-6 border-t border-brand-100">
                        <ul class="space-y-2 text-sm text-brand-600">
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Bioimpedância InBody 970
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Análise hormonal completa
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Mapeamento metabólico individual
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Pilar 2 -->
                <div class="relative bg-brand-900 p-8 rounded-sm border-t-2 border-gold-500 shadow-sm" data-reveal data-delay="150ms">
                    <div class="text-7xl font-serif text-gold-800/40 leading-none mb-6 select-none">02</div>
                    <h3 class="text-xl font-serif font-semibold text-white mb-3">Estratégia de Precisão</h3>
                    <p class="text-white/50 leading-relaxed text-sm">
                        Uso criterioso de terapias modernas — incluindo análogos GLP-1 quando indicado — dentro de um plano estruturado, com dosagem e timing ajustados ao seu perfil.
                    </p>
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <ul class="space-y-2 text-sm text-white/60">
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-400 flex-shrink-0"></span>
                                Protocolo medicamentoso individualizado
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-400 flex-shrink-0"></span>
                                Terapias de última geração (GLP-1)
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-400 flex-shrink-0"></span>
                                Estratégia nutricional integrada
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Pilar 3 -->
                <div class="relative bg-white p-8 rounded-sm border-t-2 border-gold-500 shadow-sm" data-reveal data-delay="300ms">
                    <div class="text-7xl font-serif text-gold-100 leading-none mb-6 select-none">03</div>
                    <h3 class="text-xl font-serif font-semibold text-brand-900 mb-3">Acompanhamento Longitudinal</h3>
                    <p class="text-brand-500 leading-relaxed text-sm">
                        A estrutura que garante o resultado no longo prazo. Monitoramento ativo, retornos programados, ajustes finos e suporte contínuo — sem lacunas no processo.
                    </p>
                    <div class="mt-6 pt-6 border-t border-brand-100">
                        <ul class="space-y-2 text-sm text-brand-600">
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Retornos e reavaliações programadas
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Ajustes estratégicos contínuos
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-gold-500 flex-shrink-0"></span>
                                Suporte da equipe integrada
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         PROGRAMAS
    ============================================================ --}}
    <section id="programas" class="py-24 bg-warm-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-16" data-reveal>
                <span class="section-label">Nossos programas</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                    Resultado, não consulta.
                </h2>
                <p class="mt-4 text-brand-500 max-w-xl mx-auto leading-relaxed">
                    Aqui você não compra uma hora de médico — você investe em um programa estruturado para entregar transformação real.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Programa 1 -->
                <div class="program-card bg-white" data-reveal data-delay="0ms">
                    <div class="bg-cream p-8 pb-6">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <p class="text-xs font-semibold tracking-widest uppercase text-gold-600 mb-2">3 meses</p>
                                <h3 class="text-2xl font-serif font-semibold text-brand-900">Programa Metabólico Intensivo</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-brand-500 text-sm leading-relaxed">
                            Indicado para quem precisa de uma reestruturação metabólica completa em tempo definido, com foco e intensidade.
                        </p>
                    </div>
                    <div class="p-8">
                        <h4 class="text-xs font-semibold tracking-widest uppercase text-brand-400 mb-5">O que inclui</h4>
                        <ul class="space-y-3">
                            @php
                            $intensive = [
                                'Consultas médicas com Dra. Isis Toledo',
                                'Avaliação nutricional e acompanhamento',
                                'Bioimpedância InBody 970 (avaliações periódicas)',
                                'Protocolo medicamentoso personalizado',
                                'Estratégia GLP-1 quando indicada',
                                'Acesso à equipe entre consultas',
                            ];
                            @endphp
                            @foreach($intensive as $item)
                            <li class="flex items-start gap-3 text-sm text-brand-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gold-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/5548999344088?text=Olá,%20tenho%20interesse%20no%20Programa%20Metabólico%20Intensivo"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-outline-gold w-full justify-center mt-8">
                            Tenho interesse
                        </a>
                    </div>
                </div>

                <!-- Programa 2 -->
                <div class="program-card bg-brand-900" data-reveal data-delay="150ms">
                    <div class="bg-brand-800 p-8 pb-6 relative overflow-hidden">
                        <!-- Gold accent -->
                        <div class="absolute top-0 right-0 w-32 h-32" style="background: radial-gradient(circle at top right, rgba(184,149,90,0.15), transparent 70%);"></div>

                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <p class="text-xs font-semibold tracking-widest uppercase text-gold-400 mb-2">12 meses</p>
                                <h3 class="text-2xl font-serif font-semibold text-white">Programa Longitudinal</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gold-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-white/50 text-sm leading-relaxed">
                            Para quem entende que transformação real exige tempo e quer a segurança de um acompanhamento completo durante todo o processo.
                        </p>
                    </div>
                    <div class="p-8">
                        <div class="inline-block bg-gold-500/15 text-gold-400 text-xs font-semibold tracking-widest uppercase px-3 py-1.5 rounded-sm mb-5">
                            Mais completo
                        </div>
                        <ul class="space-y-3">
                            @php
                            $longitudinal = [
                                'Tudo do Programa Intensivo',
                                'Acompanhamento por 12 meses completos',
                                'Ajustes estratégicos em cada fase',
                                'Monitoramento contínuo de resultados',
                                'Suporte de concierge médico',
                                'Reestruturação metabólica sustentável',
                            ];
                            @endphp
                            @foreach($longitudinal as $item)
                            <li class="flex items-start gap-3 text-sm text-white/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gold-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/5548999344088?text=Olá,%20tenho%20interesse%20no%20Programa%20Longitudinal%2012%20meses"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-gold w-full justify-center mt-8">
                            Tenho interesse
                        </a>
                    </div>
                </div>
            </div>

            <p class="text-center text-sm text-brand-400 mt-8" data-reveal>
                Não sabe qual programa se encaixa melhor no seu caso?
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20entender%20qual%20programa%20é%20ideal%20para%20mim"
                   target="_blank" rel="noopener noreferrer"
                   class="text-gold-600 hover:text-gold-500 underline underline-offset-2 transition-colors">
                    Fale com nossa equipe.
                </a>
            </p>
        </div>
    </section>

    {{-- ============================================================
         TECNOLOGIA E DIFERENCIAIS
    ============================================================ --}}
    <section id="tecnologia" class="py-24 bg-brand-900 relative overflow-hidden">

        <div class="absolute inset-0" style="background-image: radial-gradient(ellipse 60% 60% at 20% 80%, rgba(184,149,90,0.06) 0%, transparent 70%);"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-16" data-reveal>
                <span class="section-label-light">Tecnologia e diferenciais</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-serif text-white">
                    Estrutura que reforça o resultado.
                </h2>
                <p class="mt-4 text-white/40 max-w-xl mx-auto leading-relaxed">
                    Cada componente do nosso ecossistema foi escolhido para maximizar precisão, segurança e a experiência do paciente.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="tech-card" data-reveal data-delay="0ms">
                    <div class="text-gold-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-2">InBody 970</h3>
                    <p class="text-sm text-white/40 leading-relaxed">Bioimpedância de alta precisão para análise completa de composição corporal — músculo, gordura, hidratação e metabolismo basal.</p>
                </div>

                <div class="tech-card" data-reveal data-delay="100ms">
                    <div class="text-gold-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-2">Protocolos Estruturados</h3>
                    <p class="text-sm text-white/40 leading-relaxed">Fluxos clínicos definidos e testados, que eliminam variabilidade e garantem consistência em cada etapa do tratamento.</p>
                </div>

                <div class="tech-card" data-reveal data-delay="200ms">
                    <div class="text-gold-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-2">Equipe Integrada</h3>
                    <p class="text-sm text-white/40 leading-relaxed">Médica, nutricionista e suporte clínico trabalhando de forma coordenada — sem ruídos de comunicação e com visão compartilhada do paciente.</p>
                </div>

                <div class="tech-card" data-reveal data-delay="300ms">
                    <div class="text-gold-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-2">Concierge Médico</h3>
                    <p class="text-sm text-white/40 leading-relaxed">Atendimento de alto padrão, com agilidade e atenção personalizada. Experiência clínica que respeita o tempo e a individualidade de cada paciente.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         SOBRE A MÉDICA
    ============================================================ --}}
    <section id="sobre" class="py-24 bg-cream">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Photo -->
                <div class="relative flex justify-center" data-reveal>
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-full h-full border border-gold-500/30 rounded-sm"></div>
                        <div class="absolute -bottom-6 -right-6 w-40 h-40 border-b border-r border-gold-500/20"></div>
                        <img src="/images/Dra_Isis_Thiago_Braga-25.jpg"
                             alt="Dra. Isis Toledo — Endocrinologista"
                             class="relative z-10 w-full max-w-sm object-cover rounded-sm shadow-xl"
                             style="aspect-ratio: 3/4;"
                             loading="lazy">
                        <!-- Credential badge -->
                        <div class="absolute -right-4 top-1/3 z-20 bg-brand-900 text-white px-4 py-3 rounded-sm shadow-lg">
                            <p class="text-xs text-white/40 tracking-widest uppercase">Especialista</p>
                            <p class="text-sm font-semibold text-gold-400 mt-0.5">SBEM</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div data-reveal data-delay="150ms">
                    <span class="section-label">Sobre a médica</span>
                    <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900 leading-tight">
                        Dra. Isis Toledo
                    </h2>
                    <p class="text-gold-600 font-medium text-sm tracking-wide mt-1 mb-6">
                        Endocrinologista · Especialista em Obesidade e Longevidade
                    </p>

                    <div class="space-y-4 text-brand-600 leading-relaxed">
                        <p>
                            Médica endocrinologista com título de especialista pela Sociedade Brasileira de Endocrinologia e Metabologia (SBEM), a Dra. Isis Toledo dedica sua prática ao que realmente funciona: diagnóstico aprofundado, estratégia personalizada e acompanhamento que garante resultado.
                        </p>
                        <p>
                            Sua atuação é focada em obesidade, transtornos metabólicos, saúde hormonal feminina e medicina preventiva — com especial atenção ao envelhecimento saudável e à performance de longo prazo.
                        </p>
                        <p>
                            Com anos de experiência clínica, ela construiu um método próprio que integra as melhores evidências científicas com uma visão humana e individualizada de cada paciente.
                        </p>
                    </div>

                    <!-- Credentials -->
                    <div class="grid grid-cols-3 gap-4 mt-10 pt-8 border-t border-brand-200">
                        <div>
                            <p class="font-serif text-2xl text-brand-900">SBEM</p>
                            <p class="text-xs text-brand-400 mt-1 leading-tight">Título de especialista</p>
                        </div>
                        <div>
                            <p class="font-serif text-2xl text-brand-900">CRM</p>
                            <p class="text-xs text-brand-400 mt-1 leading-tight">Registro ativo · SC</p>
                        </div>
                        <div>
                            <p class="font-serif text-2xl text-brand-900">+10 anos</p>
                            <p class="text-xs text-brand-400 mt-1 leading-tight">Experiência clínica</p>
                        </div>
                    </div>

                    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação%20com%20a%20Dra.%20Isis%20Toledo"
                       target="_blank" rel="noopener noreferrer"
                       class="btn-gold mt-8 inline-flex">
                        Agendar avaliação
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         MÍDIA
    ============================================================ --}}
    <section id="midia" class="py-20 bg-warm-white border-y border-brand-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
                <div data-reveal>
                    <span class="section-label">Presença na mídia</span>
                    <h2 class="mt-4 text-2xl md:text-3xl font-serif text-brand-900">
                        Como vista em
                    </h2>
                    <p class="mt-3 text-brand-500 text-sm max-w-md leading-relaxed">
                        A Dra. Isis Toledo é referência nacional em endocrinologia — presente nos principais veículos de comunicação do Brasil.
                    </p>
                </div>
                <a href="/na-midia" class="btn-outline-gold text-sm flex-shrink-0" data-reveal>
                    Ver todas as participações →
                </a>
            </div>

            @if(isset($midiaHighlights) && $midiaHighlights->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-reveal data-delay="100ms">
                @foreach($midiaHighlights as $mPost)
                @php
                    $mImg = $mPost->featured_image_path;
                    $mImgSrc = $mImg ? Storage::url($mImg) : null;
                    $mHasVideo = str_contains($mPost->content ?? '', 'youtube.com/embed');
                    $mOutlet = $mPost->tag;
                @endphp
                <article class="group bg-white rounded-sm overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <a href="/na-midia/{{ $mPost->slug }}" class="block relative overflow-hidden aspect-video bg-brand-900">
                        @if($mImgSrc)
                        <img src="{{ $mImgSrc }}" alt="{{ $mPost->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-brand-800 to-brand-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/50 to-transparent"></div>
                        @if($mHasVideo)
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30 group-hover:bg-gold-500/90 group-hover:border-gold-500 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        @endif
                        @if($mOutlet)
                        <div class="absolute top-2.5 left-2.5">
                            <span class="text-xs font-semibold text-brand-900 bg-gold-400 px-2.5 py-1 rounded-sm">{{ $mOutlet }}</span>
                        </div>
                        @endif
                    </a>
                    <div class="p-4">
                        @if($mPost->published_at)
                        <time class="text-xs text-brand-400 mb-1.5 block">{{ $mPost->published_at->translatedFormat('d M Y') }}</time>
                        @endif
                        <h3 class="font-serif font-semibold text-brand-900 text-sm leading-snug line-clamp-2 group-hover:text-gold-700 transition-colors mb-3">
                            <a href="/na-midia/{{ $mPost->slug }}">{{ $mPost->title }}</a>
                        </h3>
                        <a href="/na-midia/{{ $mPost->slug }}"
                           class="inline-flex items-center gap-1 text-xs font-semibold text-gold-600 hover:text-gold-500 uppercase tracking-wide transition-colors">
                            @if($mHasVideo)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            Assistir
                            @else
                            Ver aparição →
                            @endif
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center mt-10" data-reveal>
                <a href="/na-midia" class="btn-outline-gold">
                    Ver todas as {{ $midiaHighlights->count() >= 6 ? '23' : $midiaHighlights->count() }} participações →
                </a>
            </div>

            @else
            {{-- Fallback: outlet badges only --}}
            <div class="flex flex-wrap items-center justify-center gap-4" data-reveal>
                @foreach(['SBT', 'NSC TV / Globo', 'Band News SC', 'JP News', 'CBN Rádio', 'SC Acontece', 'FloripaCast', 'RIC TV'] as $ch)
                <span class="text-sm font-medium text-brand-400 border border-brand-200 px-4 py-2 rounded-sm">{{ $ch }}</span>
                @endforeach
            </div>
            <div class="text-center mt-8" data-reveal>
                <a href="/na-midia" class="btn-gold">Ver participações na mídia</a>
            </div>
            @endif
        </div>
    </section>

    {{-- ============================================================
         DEPOIMENTOS
    ============================================================ --}}
    <section id="depoimentos" class="py-24 bg-cream overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
                <div data-reveal>
                    <span class="section-label">Depoimentos</span>
                    <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                        Transformações reais.
                    </h2>
                </div>
                <!-- Nav arrows -->
                <div class="flex items-center gap-3" data-reveal>
                    <button id="testimonials-prev"
                            aria-label="Anterior"
                            class="w-10 h-10 rounded-full border border-brand-300 flex items-center justify-center text-brand-600 hover:border-gold-500 hover:text-gold-600 transition-colors duration-200 disabled:opacity-30 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="testimonials-next"
                            aria-label="Próximo"
                            class="w-10 h-10 rounded-full border border-brand-300 flex items-center justify-center text-brand-600 hover:border-gold-500 hover:text-gold-600 transition-colors duration-200 disabled:opacity-30 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Carousel -->
            <div class="overflow-hidden">
                <div id="testimonials-track" class="flex gap-6 transition-transform duration-500 ease-in-out">

                    @php
                    $testimonials = [
                        [
                            'name' => 'Fernanda M.',
                            'age' => '42 anos',
                            'result' => '18kg em 6 meses',
                            'text' => 'Depois de anos tentando sem resultado, finalmente entendi o que estava acontecendo no meu corpo. A Dra. Isis encontrou um desequilíbrio hormonal que nenhum outro médico tinha investigado. Em 6 meses, 18kg a menos — e sem reganho.',
                        ],
                        [
                            'name' => 'Carolina R.',
                            'age' => '38 anos',
                            'result' => 'Menopausa sob controle',
                            'text' => 'A menopausa precoce estava destruindo minha qualidade de vida. O acompanhamento longitudinal foi decisivo — hoje me sinto outra pessoa. A abordagem é completamente diferente do que eu havia experimentado antes.',
                        ],
                        [
                            'name' => 'Mariana S.',
                            'age' => '45 anos',
                            'result' => '23kg em 8 meses',
                            'text' => 'O programa de 12 meses foi a melhor decisão que tomei. Não é só sobre perder peso — é sobre entender o seu metabolismo. Os ajustes ao longo do acompanhamento foram fundamentais para eu chegar onde cheguei.',
                        ],
                        [
                            'name' => 'Juliana P.',
                            'age' => '52 anos',
                            'result' => 'Energia e metabolismo restaurados',
                            'text' => 'Eu cheguei na clínica exausta, com 52 anos e achando que era "normal" se sentir assim. Não era. O diagnóstico correto mudou tudo. Sinto mais energia hoje do que tinha aos 40.',
                        ],
                        [
                            'name' => 'Patricia L.',
                            'age' => '37 anos',
                            'result' => 'Resultado sem efeito sanfona',
                            'text' => 'O que me surpreendeu foi a consistência. Sem efeito sanfona, sem sofrimento. O protocolo foi feito para o meu corpo — não um pacote genérico. E o suporte da equipe entre as consultas fez toda a diferença.',
                        ],
                    ];
                    @endphp

                    @foreach($testimonials as $t)
                    <div data-testimonial
                         class="flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] testimonial-card">
                        <!-- Stars -->
                        <div class="flex gap-1 mb-5">
                            @for($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gold-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @endfor
                        </div>

                        <blockquote class="text-brand-600 text-sm leading-relaxed mb-6 flex-1">
                            "{{ $t['text'] }}"
                        </blockquote>

                        <div class="flex items-center justify-between pt-5 border-t border-brand-100">
                            <div>
                                <p class="font-semibold text-brand-900 text-sm">{{ $t['name'] }}</p>
                                <p class="text-xs text-brand-400 mt-0.5">{{ $t['age'] }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block text-xs font-semibold text-gold-600 bg-gold-50 px-2.5 py-1 rounded-sm">{{ $t['result'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Dots -->
            <div id="testimonials-dots" class="flex items-center justify-center gap-2 mt-8"></div>
        </div>
    </section>

    {{-- ============================================================
         BLOG (se houver posts publicados)
    ============================================================ --}}
    @if(false)
    <section id="blog" class="py-24 bg-warm-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
                <div data-reveal>
                    <span class="section-label">Conteúdo</span>
                    <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                        Artigos recentes
                    </h2>
                </div>
                <a href="/blog" class="btn-outline-gold text-sm" data-reveal>Ver todos →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="group" data-reveal>
                    @if($post->featured_image_path)
                    <div class="overflow-hidden rounded-sm mb-5 aspect-video bg-brand-100">
                        <img src="{{ Storage::url($post->featured_image_path) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             loading="lazy">
                    </div>
                    @else
                    <div class="rounded-sm mb-5 aspect-video bg-gradient-to-br from-cream to-gold-50 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gold-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    @endif

                    <div class="flex items-center gap-2 mb-3">
                        @foreach($post->categories->take(1) as $cat)
                        <span class="text-xs font-semibold tracking-widest uppercase text-gold-600">{{ $cat->name }}</span>
                        @endforeach
                        @if($post->published_at)
                        <span class="text-xs text-brand-300">·</span>
                        <time class="text-xs text-brand-400">{{ $post->published_at->translatedFormat('d M Y') }}</time>
                        @endif
                    </div>

                    <h3 class="font-serif font-semibold text-brand-900 text-lg mb-2 group-hover:text-gold-700 transition-colors leading-snug">
                        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                    </h3>

                    @if($post->excerpt)
                    <p class="text-sm text-brand-500 leading-relaxed line-clamp-3">{{ $post->excerpt }}</p>
                    @endif

                    <a href="/blog/{{ $post->slug }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gold-600 hover:text-gold-500 mt-4 transition-colors">
                        Ler artigo
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================
         CTA FINAL
    ============================================================ --}}
    <section id="contato" class="py-28 bg-brand-900 relative overflow-hidden">

        <div class="absolute inset-0" style="background-image: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(184,149,90,0.08) 0%, transparent 70%);"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gold-600/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gold-600/20 to-transparent"></div>

        <div class="relative max-w-3xl mx-auto px-6 lg:px-8 text-center">

            <div class="flex items-center justify-center gap-3 mb-8" data-reveal>
                <div class="gold-line"></div>
                <span class="section-label-light">Próximo passo</span>
                <div class="gold-line"></div>
            </div>

            <h2 class="text-3xl md:text-5xl font-serif text-white leading-tight mb-6" data-reveal data-delay="100ms">
                Agende sua avaliação e entenda o que está
                <em class="text-gold-400 not-italic"> impedindo</em>
                seu resultado.
            </h2>

            <p class="text-white/50 text-lg leading-relaxed mb-10" data-reveal data-delay="200ms">
                Uma conversa com a Dra. Isis Toledo pode mudar o que você entende sobre seu corpo e sobre o que é possível alcançar.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-reveal data-delay="300ms">
                <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação%20com%20a%20Dra.%20Isis%20Toledo"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-gold text-base px-10 py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Agendar pelo WhatsApp
                </a>
            </div>

            <p class="text-white/30 text-xs mt-6 tracking-wide" data-reveal data-delay="400ms">
                Respondemos em até 24 horas em dias úteis.
            </p>
        </div>
    </section>

    {{-- ============================================================
         GEO: FAQ OTIMIZADO PARA IA
    ============================================================ --}}
    <section id="faq" class="py-24 bg-cream">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12" data-reveal>
                <span class="section-label">Perguntas frequentes</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-serif text-brand-900">
                    Dúvidas sobre endocrinologia e tratamento
                </h2>
                <p class="mt-4 text-brand-500 max-w-xl mx-auto leading-relaxed">
                    Respostas claras para as perguntas mais comuns sobre obesidade, hormônios e o acompanhamento com a Dra. Isis Toledo.
                </p>
            </div>

            <div class="space-y-4">
                @php
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
                @endphp

                @foreach($faqItems as $index => $faq)
                <details class="faq-item bg-white rounded-sm shadow-sm overflow-hidden group" data-reveal data-delay="{{ ($index % 3) * 100 }}ms">
                    <summary class="flex items-center justify-between cursor-pointer p-5 font-medium text-brand-900 hover:text-gold-700 transition-colors">
                        <span class="text-base pr-4">{{ $faq['q'] }}</span>
                        <svg class="w-5 h-5 text-gold-500 flex-shrink-0 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <div class="px-5 pb-5 text-brand-500 text-sm leading-relaxed border-t border-brand-100 pt-4">
                        {{ $faq['a'] }}
                    </div>
                </details>
                @endforeach
            </div>

            <p class="text-center text-xs text-brand-400 mt-8 max-w-2xl mx-auto">
                As informações acima têm caráter educacional e não substituem uma consulta médica. Para avaliação individualizada, agende um atendimento.
            </p>
        </div>
    </section>

    {{-- ============================================================
         FOOTER
    ============================================================ --}}
    <footer class="bg-brand-950 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

                <!-- Brand -->
                <div>
                    <img src="/images/logo-endocrinologista.png"
                         alt="Dra. Isis Toledo"
                         class="h-8 w-auto object-contain mb-4"
                         loading="lazy">
                    <p class="text-sm text-brand-500 leading-relaxed max-w-xs">
                        Unidade de Gestão Metabólica para resultados sustentáveis em saúde, emagrecimento e longevidade.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-xs font-semibold tracking-widest uppercase text-brand-500 mb-5">Navegação</h3>
                    <ul class="space-y-3">
                        <li><a href="#sobre" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Sobre a Dra. Isis</a></li>
                        <li><a href="#como-funciona" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Como funciona</a></li>
                        <li><a href="#programas" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Programas</a></li>
                        <li><a href="#tecnologia" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Tecnologia</a></li>
                        <li><a href="#depoimentos" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Depoimentos</a></li>
                        @if(isset($posts) && $posts->count())
                        <li><a href="/blog" class="text-sm text-brand-400 hover:text-gold-400 transition-colors">Blog</a></li>
                        @endif
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xs font-semibold tracking-widest uppercase text-brand-500 mb-5">Contato</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="https://wa.me/5548999344088"
                               target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-2 text-sm text-brand-400 hover:text-gold-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/draisisendocrino"
                               target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-2 text-sm text-brand-400 hover:text-gold-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                                @draisisendocrino
                            </a>
                        </li>
                        <li class="text-sm text-brand-500 mt-1">Florianópolis, SC — Brasil</li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-brand-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-brand-600">
                    © {{ date('Y') }} Dra. Isis Toledo — Todos os direitos reservados.
                </p>
                <p class="text-xs text-brand-700">
                    Endocrinologista · CRM-SC 22334 · RQE 17867 · SBEM
                </p>
            </div>
        </div>
    </footer>

    {{-- WhatsApp floating button --}}
    <a href="https://wa.me/5548999344088?text=Olá,%20gostaria%20de%20agendar%20uma%20avaliação"
       target="_blank" rel="noopener noreferrer"
       class="whatsapp-float"
       aria-label="Falar pelo WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

</body>
</html>
