@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <div class="pbmit-title-bar-wrapper" style="background-image: url(/competences.jpg);">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{$produit->title}}</h1>
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
                            <span><span class="post-root post post-post current-item">{{$produit->title}}</span></span>
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
                                    <h3 class="pbmit-title mb-3">{{$produit->title}}</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pbmit-animation-style1 active">
                                            <img   src="/{{ $produit->picture }}" class="img-fluid" alt="{{ $produit->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pbmit-animation-style2 active">
                                        </div>
                                    </div>
                                </div>

                                {!! $produit->description !!}

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
                                            <li><a href="/competences-and-savoir-faire/{{$categorie->slug}}"> {{$categorie->title}} </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                            <aside class="widget pbmit-service-ad" style="background-image: {{$produit->picture}};">
                                <div class="textwidget">

                                    <div class="pbmit-service-ads">
                                        <h5 class="pbmit-ads-subheding">Contact</h5>
                                        <h4 class="pbmit-ads-subtitle">Des questions </h4>
                                        <h3 class="pbmit-ads-title">Sur nos services?</h3>
                                        <div class="pbmit-ads-desc">
                                            <i class="pbmit-base-icon-phone-call-1"></i>Chênée  {{ str_replace(['"', "'"], '', ($setting5[0]->value) ?? '') }}
                                        </div>
                                        <div class="pbmit-ads-desc">
                                            <i class="pbmit-base-icon-phone-call-1"></i> Marche{{ str_replace(['"', "'"], '', ($setting5[0]->value) ?? '') }}
                                        </div>
                                        <a class="pbmit-btn" href="service-details.html">
												<span class="pbmit-button-content-wrapper">
													<span class="pbmit-button-icon pbmit-align-icon-right">
														<svg xmlns="http://www.w3.org/2000/svg" width="22.76"
                                                             height="22.76" viewBox="0 0 22.76 22.76">
															<title>black-arrow</title>
															<path
                                                                d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1"
                                                                transform="translate(-0.29 -0.29)" fill="none"
                                                                stroke="#000" stroke-width="2"></path>
															<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75"
                                                                  transform="translate(-0.29 -0.29)" fill="none"
                                                                  stroke="#000" stroke-width="2"></path>
															<path d="M22.34,1,1,22.34"
                                                                  transform="translate(-0.29 -0.29)" fill="none"
                                                                  stroke="#000" stroke-width="2"></path>
														</svg>
													</span>
													<span class="pbmit-button-text">Contact</span>
												</span>
                                        </a>
                                    </div>
                                </div>
                            </aside>

                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Details End -->

    </div>
@endsection
