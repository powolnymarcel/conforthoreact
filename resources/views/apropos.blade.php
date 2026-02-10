@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')

    <style>
        .pbmit-title-bar-content-inner{
            background-color: rgba(118, 107, 107, 0.7);
            width: 60%;
            padding: 14px;
        }
        @media(max-width:820px){
            .pbmit-title-bar-content-inner{
                background-color: rgba(118, 107, 107, 0.7);
                width: 99%;
                padding: 14px;
            }
        }



    </style>
    <div class="pbmit-title-bar-wrapper" style="background-image: url(/confortho3.jpg);">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner" style="background-color: rgba(105, 105, 105, 0.7);">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title" style="color: white;"> A propos</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner" style="color: white;">
                            <span>
                                <a title="" href="#" class="home" style="color: white;"><span>Confortho</span></a>
                            </span>
                            <span class="sep">
                                <i class="pbmit-base-icon-right-1"></i>
                            </span>
                            <span><span class="post-root post post-post current-item" style="color: white;"> A propos</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Content -->
    <div class="page-content">



        <!-- About Us Start -->
        <section>
            <div class="container mt-5">
                <div class="row g-0 align-items-center">
                    <div class="col-md-12 col-xl-6">
                        <div class="about-us-left_box">
                            <div class="about-us_img1 pbmit-animation-style4">
                                <img src="storage/{{$apropos->image_1}}" class="img-fluid" alt="">
                            </div>
                            <div class="about-us_img2 pbmit-animation-style3">
                                <img width="430px" src="storage/{{$apropos->image_2}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="about-us-right_box">
                            <div class="pbmit-heading-subheading">
                                <h4 class="pbmit-subtitle"> A propos</h4>
                                <h2 class="pbmit-title">{{$apropos->title}}</h2>
                                <div class="pbmit-heading-desc">
                                    {!! $apropos->description !!}
                                </div>
                            </div>
                            <div class="row">
                                @foreach($apropos->sentences as $sentence)
                                    <div class="pbmit-ihbox-style-20 col-md-12">
                                        <div class="pbmit-ihbox-headingicon">
                                            <div class="pbmit-ihbox-icon">
                                                <div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">01.</div>
                                            </div>
                                            <div class="pbmit-ihbox-contents">
                                                <h2 class="pbmit-element-title">
                                                    {{$sentence['sentence']}}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us End -->

        <!-- Marquee -->
        <section class="section-lgt">
            <div class="container-fluid p-0">
                <div class="swiper-slider marquee">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
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
        <!-- Marquee end -->



        <!-- Team Start -->
        <section class="section-xl">
            <div class="container">
                <div class="position-relative">
                    <div class="pbmit-heading-subheading">
                        <h4 class="pbmit-subtitle">Our Team</h4>
                        <h2 class="pbmit-title">Our Specialist Doctors</h2>
                    </div>
                    <div class="team_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
                </div>
                <div class="swiper-slider" data-arrows-class="team_arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="4" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
                        @foreach($specialistes as $specialiste)
                        <div class="swiper-slide">
                            <article class="pbmit-team-style-1">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-featured-wrap">
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                                <img src="storage/{{$specialiste->picture}}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="pbmit-team-btn">
                                            <a class="pbmit-team-text" href="#">
                                                <i class="pbmit-base-icon-share-1"></i>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="pbminfotech-box-content">
                                        <div class="pbminfotech-box-content-inner">
                                            <div class="pbminfotech-box-team-position">{{$specialiste->job}}</div>
                                            <h3 class="pbmit-team-title">
                                                <a href="#">{{$specialiste->name}}{{$specialiste->firstname}}</a>
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
        <!-- Team End -->


    </div>
    <!-- Contact Us Content End -->

@endsection

