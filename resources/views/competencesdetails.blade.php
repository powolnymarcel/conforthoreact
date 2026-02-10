@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <div class="pbmit-title-bar-wrapper" style="background-image: url(/competences.jpg);">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">Compétences & savoir-faire</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Confortho</span></a>
								</span>

                            <span class="sep">
									<i class="pbmit-base-icon-angle-double-right"></i>
								</span>
                            <span><span class="post-root post post-post current-item">Compétences & savoir-faire</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div class="page-content">

        <!-- Service Details -->
        <section class="site_content service_details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 service-right-col">
                        <div class="pbmit-entry-content">
                            <div class="pbmit-service_content">
                                <div class="pbmit-heading animation-style2">
                                    <h3 class="pbmit-title mb-3">{{ $activeCategory->title }}</h3>
                                </div>
                                {!! $activeCategory->description !!}
                            </div>
                            <div class="ihbox_style_box">
                                <div class="row">
                                    @if($activeCategory->products->isNotEmpty())
                                        @foreach($activeCategory->products as $product)
                                            <article class="pbmit-miconheading-style-18 col-md-4">
                                                <a href="/competences-and-savoir-faire/{{ $activeCategory->slug }}/produit/{{ $product->slug }}">
                                                    <div class="pbmit-ihbox-style-18">
                                                        <div class="pbmit-ihbox-headingicon">
                                                            <div class="pbmit-icon-wrap">
                                                                <div class="pbmit-ihbox-wrapper">
                                                                    <div class="pbmit-ihbox-icon-type-image">
                                                                        <img src="/{{ $product->picture }}" class="img-fluid" alt="{{ $product->title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="pbmit-ihbox-box-number">{{ $loop->iteration }}</div>
                                                            </div>
                                                            <div class="pbmit-ihbox-contents">
                                                                <h2 class="pbmit-element-title">{{ $product->title }}</h2>
                                                                <div class="pbmit-heading-desc">
                                                                    {!! Str::limit(strip_tags($product->description), 60) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </article>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 service-left-col sidebar">
                        <aside class="service-sidebar">
                            <aside class="widget post-list">
                                <h2 class="widget-title">Services</h2>
                                <div class="all-post-list">
                                    <ul>
                                        @foreach($categories as $categorie)
                                            <li><a href="/competences-and-savoir-faire/{{ $categorie->slug }}"> {{ $categorie->title }} </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                            <!-- Sidebar contact widget remains unchanged -->
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Details End -->

    </div>
@endsection
