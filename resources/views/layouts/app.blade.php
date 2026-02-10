<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Confortho - Bandagisterie & Orthopédie')</title>
    <meta name="description" content="@yield('meta_description', 'Confortho, votre bandagisterie orthopédique à Chênée (Liège) et Aye (Marche-en-Famenne). Attelles, orthèses, prothèses, semelles orthopédiques, fauteuils roulants et vêtements compressifs.')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:locale" content="fr_BE">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Confortho - Bandagisterie & Orthopédie à Liège et Marche')">
    <meta property="og:description" content="@yield('meta_description', 'Confortho, votre bandagisterie orthopédique à Chênée (Liège) et Aye (Marche-en-Famenne). Attelles, orthèses, prothèses, semelles orthopédiques, fauteuils roulants et vêtements compressifs.')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:site_name" content="Confortho">
    <meta property="og:image" content="@yield('og_image', asset('logo-confortho-small-nobg.png'))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Confortho - Bandagisterie & Orthopédie à Liège et Marche')">
    <meta name="twitter:description" content="@yield('meta_description', 'Confortho, votre bandagisterie orthopédique à Chênée (Liège) et Aye (Marche-en-Famenne). Attelles, orthèses, prothèses, semelles orthopédiques, fauteuils roulants et vêtements compressifs.')">
    <meta name="twitter:image" content="@yield('og_image', asset('logo-confortho-small-nobg.png'))">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/homepage-6/fevicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/twentytwenty.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo-3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @yield('extra-css')
    @stack('structured-data')
    @cookieconsentscripts

</head>
<body>
<div class="page-wrapper demo-six">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</div>

@include('partials.search-overlay')
@include('partials.scroll-to-top')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.appear.js') }}"></script>
<script src="{{ asset('js/numinate.min.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/circle-progress.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/gsap.js') }}"></script>
<script src="{{ asset('js/ScrollTrigger.js') }}"></script>
<script src="{{ asset('js/SplitText.js') }}"></script>
<script src="{{ asset('js/magnetic.js') }}"></script>
<script src="{{ asset('js/gsap-animation.js') }}"></script>
<script src="{{ asset('js/jquery.event.move.js') }}"></script>
<script src="{{ asset('js/jquery.twentytwenty.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@yield('extra-js')
@cookieconsentview
</body>
</html>
