@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <div class="pbmit-title-bar-wrapper" style="background-image: url(/contact.jpg);">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title" style="color: white;"> Contactez-nous</h1>
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
                            <span><span class="post-root post post-post current-item" style="color: white;">Contactez-nous</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Content -->
    <div class="page-content contact_us">


        <div class="container">
            <div class="row">
            <div class="col-lg-12 mt-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
            </div>
            </div>
        </div>


        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="pbmit-ihbox-style-15">
                            <div class="pbmit-ihbox-box">
                                <div class="pbmit-icon-wrap d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper">
                                            <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                <i class="pbmit-xcare-icon pbmit-xcare-icon-email"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="pbmit-element-title">Email</h2>
                                <div class="pbmit-content-wrapper">
                                    <div class="pbmit-heading-desc">{{ str_replace(['"', "'"], '', ($setting7[0]->value) ?? '') }}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="pbmit-ihbox-style-15">
                            <div class="pbmit-ihbox-box">
                                <div class="pbmit-icon-wrap d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper">
                                            <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="pbmit-element-title">Téléphone</h2>
                                <div class="pbmit-content-wrapper">
                                    <div class="pbmit-heading-desc">Chênée  {{ str_replace(['"', "'"], '', ($setting5[0]->value) ?? '') }} <br> Aye :  {{ str_replace(['"', "'"], '', ($setting6[0]->value) ?? '') }}</div>
                                </div>
                            </div>
                            <div class="pbmit-ihbox-btn">
                                <a href="#">
                                    <span class="pbmit-button-text">Read More</span>
                                    <span class="pbmit-button-icon-wrapper">
                                            <span class="pbmit-button-icon">
                                                <i class="pbmit-base-icon-black-arrow-1"></i>
                                            </span>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-4">
                        <div class="pbmit-ihbox-style-15">
                            <div class="pbmit-ihbox-box">
                                <div class="pbmit-icon-wrap d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper">
                                            <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                <i class="pbmit-xcare-icon pbmit-xcare-icon-placeholder"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="pbmit-element-title">Adresses</h2>
                                <div class="pbmit-content-wrapper">
                                    <div class="pbmit-heading-desc">{{ str_replace(['"', "'"], '', ($setting9[0]->value) ?? '') }} {{ str_replace(['"', "'"], '', ($setting10[0]->value) ?? '' )}}, {{ str_replace(['"', "'"], '',( $setting11[0]->value) ?? '') }} <br>{{ str_replace(['"', "'"], '', ($setting13[0]->value) ?? '' )}} {{ str_replace(['"', "'"], '', ($setting14[0]->value) ?? '') }} {{ str_replace(['"', "'"], '', ($setting15[0]->value) ?? '') }}</div>
                                </div>
                            </div>

                            <div class="pbmit-ihbox-btn">
                                <a href="#">
                                    <span class="pbmit-button-text">Read More</span>
                                    <span class="pbmit-button-icon-wrapper">
                                            <span class="pbmit-button-icon">
                                                <i class="pbmit-base-icon-black-arrow-1"></i>
                                            </span>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ihbox End -->

        <!-- Contact Form -->
        <section class="">
            <br>
            <br>
            <div class="container">
                <div class="row g-0">




                    <div class="col-md-12 col-xl-6">
                        <div class="contact-us-left_img" style="background-image: url(contact2.jpg);"></div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="contact-form-one_right pbmit-bg-color-white">
                            <div class="pbmit-heading-subheading">
                                <h4 class="pbmit-subtitle">Contactez-nous</h4>
                                <h2 class="pbmit-title">Prenez rendez-vous ou demandez des renseignements</h2>
                            </div>
                            <form class="contact-form" method="POST" id="contact-form" action="{{ route('contact.submit') }}">
                                @csrf
                                <input type="hidden" name="form_time" value="{{ now()->timestamp }}">
                                <input type="text" name="{{ $honeypotName }}" style="display:none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Votre nom *" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Votre e-mail *" name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="tel" class="form-control" placeholder="Votre téléphone *" name="phone" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Sujet" name="subject" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" cols="40" rows="10" class="form-control" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="pbmit-btn">
                <span class="pbmit-button-content-wrapper">
                    <span class="pbmit-button-icon pbmit-align-icon-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
                            <title>black-arrow</title>
                            <path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
                            <path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
                            <path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
                        </svg>
                    </span>
                    <span class="pbmit-button-text">Soumettre maintenant</span>
                </span>
                                        </button>
                                    </div>
                                    <div class="col-md-12 col-lg-12 message-status"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->


        <!-- Iframe -->
        <section class="iframe_section section-lgb mt-5">
            <div class="container-fluid">
                <div class="iframe_box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4298.769746315506!2d5.6115245765668025!3d50.6124252716236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0f73b5c49b005%3A0x309e83598a52442f!2sConfortho%20(orthop%C3%A9die-bandagisterie)!5e1!3m2!1sfr!2sbe!4v1727298757729!5m2!1sfr!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>                </div>
            </div>
        </section>
        <!-- Iframe -->
        <section class="iframe_section section-lgb">
            <div class="container-fluid">
                <div class="iframe_box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4333.760933699765!2d5.320383576544173!3d50.22844897155067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c04b3729bc179f%3A0xe2494c7a9133de17!2sConfortho%20marche%20(bandagisterie-orthop%C3%A9die)!5e1!3m2!1sfr!2sbe!4v1727298750041!5m2!1sfr!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>
        </section>
        <!-- Iframe End-->

    </div>
    <!-- Contact Us Content End -->

@endsection

