@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')


    <section class="pbmit-sticky-section section-xl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5 pbmit-sticky-col">
                    <div class="pbmit-ele-header-area">
                        <div class="pbmit-heading-subheading">
                            <h4 class="pbmit-subtitle">Pro</h4>
                            <h2 class="pbmit-title">Professionnels</h2>
                            <div class="pbmit-heading-desc">
                                The healthcare arena there was a felt need of developing new as well as upgrading the existing functioning and processes, consequently develop an institution supported with necessary
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-7 pbmit-servicebox-right">
                    @foreach($pros as $pro)
                        <article class="pbmit-service-style-4">
                            <div class="pbminfotech-post-item">
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-box-content-wrap">
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                                <!-- Dynamically load the image -->
                                                @if($pro->image)
                                                    <img style="max-width: 250px;"   src="{{ asset('storage/' . $pro->image) }}" class="img-fluid" alt="{{ $pro->title }}">
                                                @else
                                                    <img  style="max-width: 250px;"   src="images/default-image.jpg" class="img-fluid" alt="Default Image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="pbmit-box-content-inner">
                                            <div class="pbmit-content-inner-wrap">
                                                <div class="pbmit-contant-box">
                                                    <div class="pbmit-serv-cat">
                                                        <!-- Display the category -->
                                                        <a href="{{ $pro->external_link ?? '#' }}" rel="tag">{{ $pro->category }}</a>
                                                    </div>
                                                    <h3 class="pbmit-service-title">
                                                        <!-- Display the title -->
                                                        <a href="{{ $pro->external_link ?? '#' }}">{{ $pro->title }}</a>
                                                    </h3>
                                                    <div class="pbmits-service-description" style="margin-bottom: 20px">
                                                        <!-- Display the description -->
                                                        {!!  $pro->description   !!}
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- File download buttons -->
                                            @if($pro->file_1 && $pro->file_1_visible)
                                            <div class="pbmit-service-files">
                                                    <div class="item-download">
                                                        <a href="{{ asset('storage/' . $pro->file_1) }}" target="_blank" rel="noopener noreferrer" download>
                                        <span class="pbmit-download-content">
                                            <i class="pbmit-base-icon-pdf-file-format-symbol-1"></i> Télecharger
                                        </span>
                                                            <span class="pbmit-download-item">
                                            <i class="pbminfotech-base-icons pbmit-righticon pbmit-base-icon-download"></i>
                                        </span>
                                                        </a>
                                                    </div>
                                            </div>
                                            @endif

                                            @if($pro->file_2 && $pro->file_2_visible)
                                                    <div class="pbmit-service-files">
                                                            <div class="item-download">
                                                                <a href="{{ asset('storage/' . $pro->file_2) }}" target="_blank" rel="noopener noreferrer" download>
                                        <span class="pbmit-download-content">
                                              <i class="pbmit-base-icon-pdf-file-format-symbol-1"></i> Télecharger
                                        </span>
                                                                    <span class="pbmit-download-item">
                                            <i class="pbminfotech-base-icons pbmit-righticon pbmit-base-icon-download"></i>
                                        </span>
                                                                </a>
                                                            </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </article>
                    @endforeach




                </div>
            </div>
        </div>
    </section>
@endsection
