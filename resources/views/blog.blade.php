@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <div class="pbmit-title-bar-wrapper" style="background-image: url(/blog.jpg);">
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
    <div class="page-content">

        <!-- Blog Grid Col 2 -->
        <section class="section-lgx">
            <div class="container">
                <div class="row pbmit-element-posts-wrapper">
                    @foreach($blogs as $blog)
                        <article class="pbmit-blog-style-1 col-md-6">
                            <div class="post-item">
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-featured-container">
                                        <div class="pbmit-featured-img-wrapper">

                                            <div class="pbmit-featured-wrapper">
                                                <img src="storage/{{$blog->image}}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <a class="pbmit-blog-btn" href="/blog/{{$blog->slug}}">
										<span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
                                        </a>
                                        <div class="pbmit-meta-cat-wrapper pbmit-meta-line">
                                            <div class="pbmit-meta-category">
                                                <a href="blog-classic.html" rel="category tag">{{$blog->category}}</a>
                                            </div>
                                        </div>
                                        <a class="pbmit-link" href="/blog/{{$blog->slug}}"></a>
                                    </div>
                                    <div class="pbmit-category-date-wraper d-flex align-items-center">
                                        <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                            <div class="pbmit-meta-date">
											<span class="pbmit-post-date">
												<i class="pbmit-base-icon-calendar-3"></i>{{\Carbon\Carbon::parse($blog->date)->format('d/m/Y')}}
											</span>
                                            </div>
                                        </div>
                                        <div class="pbmit-meta-author pbmit-meta-line">
										<span class="pbmit-post-author">
											<i class="pbmit-base-icon-user-3"></i>{{$blog->user_name}} {{$blog->user_firstname}}
										</span>
                                        </div>
                                    </div>
                                    <div class="pbmit-content-wrapper">
                                        <h3 class="pbmit-post-title">
                                            <a href="/blog/{{$blog->slug}}">{{$blog->title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-4">
                            <nav aria-label="Pagination blog">
                                <ul class="pagination">
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Précédent">
                                            <span class="page-link" aria-hidden="true">&laquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}" rel="prev" aria-label="Précédent">&laquo;</a>
                                        </li>
                                    @endif

                                    @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    @if ($blogs->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}" rel="next" aria-label="Suivant">&raquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Suivant">
                                            <span class="page-link" aria-hidden="true">&raquo;</span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Blog Grid Col 2 End -->

    </div>
    <!-- Contact Us Content End -->

@endsection
