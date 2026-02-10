@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <div class="pbmit-slider-area pbmit-slider-six">
        <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
            <div class="swiper-wrapper">
                @foreach($slides as $slide)
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg"
                                 style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
                            </div>
                            <div class="container">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-10 col-lg-7">
                                        <div class="pbmit-slider-content text-background">
                                            <h5 class="pbmit-sub-title transform-center-1 transform-delay-1">{{ $slide->category }}</h5>
                                            <h2 style="color:white" class="pbmit-title transform-left transform-delay-2">{{ $slide->title }}</h2>
                                            <p class="pbmit-desc transform-center transform-delay-3">{{ $slide->short_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>

    <div class="page-content">
        <section class="section-xl">
            <div class="container">
                <div class="row">
                    @foreach($section1s as $k=> $section1)
                        <div class="col-md-6 col-xl-4">
                            <div class="pbmit-ihbox-style-32 ">
                                <div class="pbmit-ihbox-box">
                                    <h2 class="pbmit-element-title">{{$section1->title}}</h2>
                                    <div class="pbmit-content-box pa d-flex justify-content-between">

                                        <div class="pbmit-content-wrapper ">
                                            <div class="pbmit-heading-desc">
                                                {{$section1->description}}
                                            </div>
                                            <a class="pbmit-btn mt-4" href="{{$section1->link}}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-icon pbmit-align-icon-right">
											<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
												<title>black-arrow</title>
												<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											</svg>
										</span>
										<span class="pbmit-button-text">Voir +</span>
									</span>
                                            </a>
                                        </div>
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                                <div class="pbmit-xcare-icon ">
                                                    {!! preg_replace(['/\b(?<!stroke-)width="\d+"/', '/\bheight="\d+"/'], ['width="65"', 'height="65"'], $section1->svg) !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>

        <!-- Service Start -->
        <section class="section-xl pbmit-bg-color-global pbmit-extend-animation service-one_bg" id="pbmit-service-scroll">
            <div class="container pbmit-col-stretched-yes pbmit-col-right">
                <div class="position-relative">
                    <div class="pbmit-heading-subheading text-white animation-style3">
                        <h4 class="pbmit-subtitle">Nos Services</h4>
                        <h2 class="pbmit-title">Ce que nous vous proposons</h2>
                    </div>
                    <div class="service_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
                </div>
                <div class="pbmit-col-stretched-right">
                    <div class="swiper-slider" data-arrows-class="service_arrow" data-autoplay="false" data-loop="false" data-dots="false" data-arrows="true" data-columns="3.6" data-margin="30" data-effect="slide">
                        <div class="swiper-wrapper">


                            @foreach($categoriesproducts as $categoriesproduct)
                                <div class="swiper-slide">
                                    <article class="pbmit-service-style-2">
                                        <div class="pbminfotech-post-item">
                                            <div class="pbminfotech-box-content">
                                                <div class="pbmit-service-image-wrapper">
                                                    <div class="pbmit-featured-img-wrapper">
                                                        <div class="pbmit-featured-wrapper">
                                                            <img src="storage/{{ $categoriesproduct->picture }}" class="img-fluid" alt="{{ $categoriesproduct->title }}">
                                                        </div>
                                                    </div>
                                                    <!-- Lien dynamique vers les détails -->
                                                    <a class="pbmit-service-btn" href="{{ route('competencesdetails', ['slug' => $categoriesproduct->slug]) }}" title="{{ $categoriesproduct->title }}">
                        <span class="pbmit-button-icon-wrapper">
                            <span class="pbmit-button-icon">
                                <i class="pbmit-base-icon-black-arrow-1"></i>
                            </span>
                        </span>
                                                    </a>
                                                </div>
                                                <style>
                                                    .pbmit-contant-box {
                                                        position: relative;
                                                        padding: 20px; /* Add some spacing */
                                                        background-color: rgba(172, 170, 170, 0.55); /* Light semi-transparent background */
                                                        border-radius: 8px; /* Rounded corners for a smoother look */
                                                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4); /* Optional shadow for contrast */
                                                    }

                                                    .pbmit-contant-box h3,
                                                    .pbmit-contant-box a {
                                                        color: #333; /* Use a dark color for text */
                                                        text-decoration: none; /* Remove underline from links */
                                                    }

                                                    .pbmit-contant-box:hover {
                                                        background-color: rgba(255, 255, 255, 1); /* Make the background fully opaque on hover */
                                                        transform: scale(1.02); /* Optional hover effect */
                                                        transition: all 0.3s ease;
                                                    }

                                                </style>
                                                <div class="pbmit-contant-box">
                                                    <div class="pbmit-service-icon elementor-icon">
                                                        <i class="pbmit-xcare-icon pbmit-xcare-icon-gesundheit-1"></i>
                                                    </div>
                                                    <div class="pbmit-serv-cat">
                                                        <a href="{{ route('competencesdetails', ['slug' => $categoriesproduct->slug]) }}" rel="tag">
                                                            {{ $categoriesproduct->title }}
                                                        </a>
                                                    </div>
                                                    <h3 class="pbmit-service-title">
                                                        <a href="{{ route('competencesdetails', ['slug' => $categoriesproduct->slug]) }}">
                                                            {{ $categoriesproduct->title }}
                                                        </a>
                                                    </h3>
                                                </div>

                                            </div>
                                            <a class="pbmit-link" href="{{ route('competencesdetails', ['slug' => $categoriesproduct->slug]) }}"></a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Service End -->



        <!-- Ihbox -->
        <section class="pbmit-bg-color-white ihbox-section-six">
            <div class="container">
                <div class="row">
                    @foreach($section2s as $section2)
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="pbmit-ihbox-style-27 shadow-sm rounded border">
                                <div class="pbmit-ihbox-box d-flex align-items-center p-3">
                                    <div class="pbmit-ihbox-icon flex-shrink-0 me-3">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                            {!! preg_replace(
                                                ['/\b(?<!stroke-)width="\d+"/', '/\bheight="\d+"/'],
                                                ['width="65"', 'height="65"'],
                                                $section2->svg ?? '<svg width="65" height="65" viewBox="0 0 65 65" aria-hidden="true"></svg>'
                                            ) !!}
                                        </div>
                                    </div>
                                    <div class="pbmit-ihbox-contents flex-grow-1">
                                        <h2 class="pbmit-element-title h5 mb-1 fw-bold text-primary" style="color: #00bde0 !important;">
                                            {{ $section2->title ?? 'Titre non disponible' }}
                                        </h2>
                                        <p class="pbmit-heading-desc text-muted mb-0">
                                            {{ $section2->description ?? 'Description non disponible' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Ihbox End -->

        <!-- About Us Start -->
        <section class="section-xl">
            <div class="container">



                @foreach($section3s as $section3)
                    <div class="row g-0 align-items-center mb-5">
                        <!-- Image Section -->
                        <div class="col-md-12 col-xl-6">
                            <div class="about-one_img rounded shadow"
                                 style="background: url('{{ $section3->image ? asset('storage/' . $section3->image) : asset('/images/default-image.jpg') }}') center/cover no-repeat; min-height: 300px;">
                                <div class="about-one_fidbox position-relative">
                                    <!-- Sticky Corners -->
                                    <div class="pbmit-sticky-corner pbmit-bottom-left-corner position-absolute">
                                        <svg width="30" height="30" aria-hidden="true">
                                            <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                        </svg>
                                    </div>
                                    <div class="pbmit-sticky-corner pbmit-top-right-corner position-absolute">
                                        <svg width="30" height="30" aria-hidden="true">
                                            <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="col-md-12 col-xl-6 p-4">
                            <div class="about-one-rightbox">
                                <!-- Title & Description -->
                                <div class="pbmit-heading-subheading mb-4">
                                    <h4 class="pbmit-subtitle text-uppercase text-secondary">
                                        {{ $section3->category ?? 'Catégorie indisponible' }}
                                    </h4>
                                    <h2 class="pbmit-title fw-bold text-dark">
                                        {{ $section3->title ?? 'Titre non disponible' }}
                                    </h2>
                                    <p class="pbmit-heading-desc text-muted">
                                        {{ $section3->description ?? 'Description à venir.' }}
                                    </p>
                                </div>

                                <!-- Dynamic List Section -->
                                <div class="row">
                                    @php
                                        $formatList = function ($list) {
                                            return preg_replace(
                                                ['/<ul>/', '/<li>/', '/<\/ul>/', '/<\/li>/'],
                                                [
                                                    '<ul class="list-unstyled mb-3">',
                                                    '<li class="d-flex align-items-start mb-2"><i class="text-success me-2 ti-check"></i><span>',
                                                    '</ul>',
                                                    '</span></li>',
                                                ],
                                                $list
                                            );
                                        };
                                    @endphp

                                    <div class="col-md-6">
                                        {!! $formatList($section3->ul_li_list ?? '<ul><li>Contenu indisponible</li></ul>') !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! $formatList($section3->ul_li_list_2 ?? '<ul><li>Contenu indisponible</li></ul>') !!}
                                    </div>
                                </div>

                                <!-- Call-to-Action Button -->
                                <div class="about-one_btn mt-4">
                                    <a class="btn btn-primary d-inline-flex align-items-center"
                                       href="{{ $section3->link ?? '#' }}">
                                        <span class="me-2">En savoir plus</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#fff" stroke-width="2">
                                            <path d="M2 12h18M12 2l8 10-8 10"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- About Us End -->

        <!-- Marquee Start -->
        <section>
            <div class="container-fluid p-0">
                <div class="swiper-slider marquee">
                    <div class="swiper-wrapper">

                    @foreach($deroulants as $deroulant)
                        <div class="swiper-slide">
                            <article class="pbmit-marquee-effect-style-1">
                                <div class="pbmit-tag-wrapper">
                                    <h2 class="pbmit-element-title" data-text=" {{$deroulant->title}}">
                                        {{$deroulant->title}}
                                    </h2>
                                </div>
                            </article>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- Marquee End -->


        <!-- Who We Are Start -->
        <section class="section-xl pbmit-bg-color-global pbmit-extend-animation who-we-are-section-six">
            <div class="container">
                @foreach($section4s as $section4)

                    <br>
                    <br>
                <div class="row">
                    <div class="col-md-12 col-xl-6">
                        <div class="left-area">
                            <img src="storage/{{$section4->image}}" class="img-fluid" alt="">
                            <div class="ihbox-style-area">
                                <div class="pbmit-ihbox-style-28">
                                    <div class="pbmit-ihbox-headingicon">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                                <i class="pbmit-xcare-icon pbmit-xcare-icon-gesundheit-1"></i>
                                            </div>
                                        </div>
                                        <div class="pbmit-content-wrapper">
                                            <h2 class="pbmit-element-title">{{$section4->text}}
                                            </h2>
                                            <div class="pbmit-heading-desc">
                                                <span>{{$section4->note}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pbmit-sticky-corner pbmit-top-right-corner">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
                                        </svg>
                                    </div>
                                    <div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="right-area">
                            <div class="pbmit-heading-subheading animation-style3">
                                <h4 class="pbmit-subtitle">{{$section4->category}}</h4>
                                <h2 class="pbmit-title text-white">{{$section4->title}}</h2>
                            </div>
                            <a class="pbmit-btn pbmit-btn-blackish mt-4" href="tel:{{ preg_replace('/[^0-9]/', '', ($setting5[0]->value) ?? '') }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-icon pbmit-align-icon-right">
											<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
												<title>black-arrow</title>
												<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											</svg>
										</span>
										<span class="pbmit-button-text">Chênée : {{$setting6[0]->value ?? '' }}</span>
									</span>
                            </a>
                            <a class="pbmit-btn pbmit-btn-blackish mt-4" href="tel:{{ preg_replace('/[^0-9]/', '', ($setting5[0]->value) ?? '') }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-icon pbmit-align-icon-right">
											<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
												<title>black-arrow</title>
												<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
												<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											</svg>
										</span>
										<span class="pbmit-button-text">Marche : {{$setting6[0]->value ?? '' }}</span>
									</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </section>
        <!-- Who We Are End -->

        <!-- Team Start -->
        <section class="section-xl">
            <div class="container">
                <div class="position-relative">
                    <div class="pbmit-heading-subheading">
                        <h4 class="pbmit-subtitle">Equipe</h4>
                        <h2 class="pbmit-title">Nos spécialistes</h2>
                    </div>
                    <div class="team_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
                </div>
                <div class="swiper-slider" data-arrows-class="team_arrow" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="true" data-columns="4" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        @foreach($specialistes as $specialiste)
                            <article class="pbmit-team-style-4 swiper-slide">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="storage/{{$specialiste->picture}}" class="img-fluid" alt="">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pbminfotech-box-content">
                                        <h3 class="pbmit-team-title">
                                            <a href="#">{{$specialiste->name}}{{$specialiste->firstname}}</a>
                                        </h3>
                                        <div class="pbminfotech-box-team-position">{{$specialiste->job}}</div>
                                    </div>

                            </article>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- Team End -->

        <style>
            .pbmit-slider-bg {
                background-position: center center; /* Centers the image content */
                background-size: cover; /* Ensures the image covers the container */
                background-repeat: no-repeat; /* Prevents repeating the image */
                width: 100%; /* Ensures the container takes the full width */
                height: 100%; /* Adjust based on your layout (e.g., fixed height or full viewport) */
            }

            #hot-spots {
                margin-bottom: 0;
                position: absolute;
                z-index: 9;
                width: 100%;
                height: 100%
            }

            #hot-spots li:hover {
                cursor: pointer
            }




        </style>

        <style>
            .specialty .category-title {
                font-weight: bold;
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }

            .specialty h1 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .specialty p {
                font-size: 1rem;
                margin-bottom: 2rem;
            }

            .menu-sidebar-specialities-parent-page-container {
                margin-top: 2rem;
            }

            .menu-sidebar-specialities-parent-page .nav-link {
                display: block;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                color: #28a745;
                text-decoration: none;
            }

            .menu-sidebar-specialities-parent-page .nav-link:hover {
                background-color: #f8f9fa;
            }

            .link-as-title span {
                font-weight: bold;
                color: #343a40;
                font-size: 1.2rem;
                margin-top: 1rem;
                display: block;
            }

            .specialties-image {
                background: #fff;
                border: 1px solid #e1e1e1;
                border-radius: 0.25rem;
                padding: 1rem;
                margin-top: 2rem;
            }

            .specialties-image ul {
                list-style-type: none;
                padding: 0;
            }

            .specialties-image li {
                margin-bottom: 1rem;
            }

            .specialties-image li a {
                display: block;
                padding: 0.5rem 1rem;
                background: #f8f9fa;
                border-radius: 0.25rem;
                text-decoration: none;
                color: #007bff;
                font-size: 1rem;
            }

            .specialties-image li a:hover {
                background: #e2e6ea;
            }
        </style>
        <!-- Blog Start -->




        <!-- Blog Start -->
        <section class="section-xl pbmit-blog-column-three">
            <div class="container">
                <div class="position-relative">
                    <div class="pbmit-heading-subheading animation-style2">
                        <h4 class="pbmit-subtitle">Notre blog</h4>
                        <h2 class="pbmit-title">Derniers articles</h2>
                    </div>
                    <div class="blog-swiper_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
                </div>
                <div class="swiper-slider" data-arrows-class="blog-swiper_arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="3" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
                        @foreach($blogarticles as $blogarticle)
                            <div class="swiper-slide">
                                <article class="pbmit-blog-style-1">
                                    <div class="post-item">
                                        <div class="pbminfotech-box-content">
                                            <div class="pbmit-featured-container">
                                                <div class="pbmit-featured-img-wrapper">
                                                    <div class="pbmit-featured-wrapper">
                                                        <img src="storage/{{$blogarticle->image}}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <a class="pbmit-blog-btn" href="#">
													<span class="pbmit-button-icon-wrapper">
														<span class="pbmit-button-icon">
															<i class="pbmit-base-icon-black-arrow-1"></i>
														</span>
													</span>
                                                </a>
                                                <div class="pbmit-meta-cat-wrapper pbmit-meta-line">
                                                    <div class="pbmit-meta-category">
                                                        <a href="blog-classic.html" rel="category tag">{{$blogarticle->category}}</a>
                                                    </div>
                                                </div>
                                                <a class="pbmit-link" href="blog-details.html"></a>
                                            </div>
                                            <div class="pbmit-category-date-wraper d-flex align-items-center">
                                                <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                                    <div class="pbmit-meta-date">
														<span class="pbmit-post-date">
															<i class="pbmit-base-icon-calendar-3"></i>{{\Carbon\Carbon::parse($blogarticle->date)->format('d/m/Y')}}
														</span>
                                                    </div>
                                                </div>
                                                <div class="pbmit-meta-author pbmit-meta-line">
													<span class="pbmit-post-author">
														<i class="pbmit-base-icon-user-3"></i>{{$blogarticle->user_name}} {{$blogarticle->v}}
													</span>
                                                </div>
                                            </div>
                                            <div class="pbmit-content-wrapper">
                                                <h3 class="pbmit-post-title">
                                                    <a href="blog-details.html">{{$blogarticle->title}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </section>
        <!-- Blog End -->

    </div>
@endsection
