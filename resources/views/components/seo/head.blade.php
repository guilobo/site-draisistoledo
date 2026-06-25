@props([
    'title' => null,
    'description' => null,
    'url' => null,
    'image' => null,
    'type' => 'website',
    'canonical' => null,
])

@php
    $baseUrl = rtrim(config('app.url', 'https://draisistoledo.com'), '/');
    $currentUrl = $canonical ?? ($baseUrl . '/' . ltrim(request()->path(), '/'));
    $pageTitle = $title
        ? $title . ' | Dra. Isis Toledo — Endocrinologista'
        : 'Dra. Isis Toledo | Endocrinologista | Gestão Metabólica';
    $pageDescription = $description ?? 'Dra. Isis Toledo — Endocrinologista especialista em gestão metabólica, emagrecimento sustentável e longevidade. Medicina baseada em evidência, estratégia personalizada.';
    $pageImage = $image ? (str_starts_with($image, 'http') ? $image : $baseUrl . $image) : $baseUrl . '/images/Dra_Isis_Thiago_Braga-10.jpg';
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="author" content="Dra. Isis Toledo — CRM-SC 22334 | RQE 17867 | SBEM">
<link rel="canonical" href="{{ $currentUrl }}">

{{-- Open Graph --}}
<meta property="og:site_name" content="Dra. Isis Toledo — Endocrinologista">
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $title ?? 'Dra. Isis Toledo | Endocrinologista' }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta property="og:image:alt" content="Dra. Isis Toledo — Endocrinologista">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? 'Dra. Isis Toledo | Endocrinologista' }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">
