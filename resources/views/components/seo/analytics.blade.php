@php
    $gaId = config('services.google.analytics_id', env('GA_MEASUREMENT_ID', 'G-E4665EKB75'));
@endphp

{{-- Google Analytics (gtag.js) --}}
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $gaId }}', {
        'anonymize_ip': true,
        'language': 'pt-BR',
    });
</script>
