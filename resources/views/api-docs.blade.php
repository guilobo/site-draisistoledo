<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Dra. Isis Toledo</title>
    <link rel="icon" type="image/png" href="/images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #f4efe6;
            --surface: #ffffff;
            --text: #1c1917;
            --muted: #6b6155;
            --border: #e7ded2;
            --accent: #b8955a;
            --code-bg: #201c18;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", sans-serif;
            line-height: 1.7;
        }

        .wrap {
            max-width: 960px;
            margin: 0 auto;
            padding: 40px 24px 64px;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: inherit;
        }

        .brand img {
            height: 40px;
            width: auto;
        }

        .eyebrow {
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .shell {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(28, 25, 23, 0.05);
            overflow: hidden;
        }

        .hero {
            padding: 32px 32px 20px;
            border-bottom: 1px solid var(--border);
        }

        .hero h1 {
            margin: 0 0 8px;
            font-family: "Playfair Display", serif;
            font-size: 40px;
            line-height: 1.1;
        }

        .hero p {
            margin: 0;
            color: var(--muted);
            max-width: 700px;
        }

        .content {
            padding: 32px;
        }

        .prose h1,
        .prose h2,
        .prose h3 {
            font-family: "Playfair Display", serif;
            line-height: 1.2;
            color: var(--text);
        }

        .prose h1 { font-size: 2rem; margin-top: 0; }
        .prose h2 { font-size: 1.5rem; margin-top: 2rem; }
        .prose h3 { font-size: 1.2rem; margin-top: 1.6rem; }
        .prose p,
        .prose li { color: #3f372f; }
        .prose a { color: #9a7741; }
        .prose code {
            background: #f6f1ea;
            padding: 0.15rem 0.35rem;
            border-radius: 4px;
            font-size: 0.92em;
        }
        .prose pre {
            background: var(--code-bg);
            color: #f8f5f1;
            padding: 18px;
            border-radius: 8px;
            overflow-x: auto;
        }
        .prose pre code {
            background: transparent;
            padding: 0;
            color: inherit;
        }
        .prose ul { padding-left: 1.25rem; }
        .prose hr {
            border: 0;
            border-top: 1px solid var(--border);
            margin: 2rem 0;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .hero,
            .content { padding: 24px; }
            .top { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="top">
            <a href="/" class="brand">
                <img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo">
                <div>
                    <div class="eyebrow">Integração</div>
                    <strong>Documentação pública da API</strong>
                </div>
            </a>
        </div>

        <div class="shell">
            <div class="hero">
                <h1>{{ $title }}</h1>
                <p>Guia de uso da API de postagens com autenticação por chave, payload aceito e exemplos prontos para integração.</p>
            </div>

            <div class="content prose">
                {!! $html !!}
            </div>
        </div>
    </div>
</body>
</html>
