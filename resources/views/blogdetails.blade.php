@extends('layouts.app')

@section('title', 'Accueil - Confortho')

@section('content')
    <style>
        .pbmit-entry-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* Center the image horizontally */
        }

    </style>
    <!-- Contact Us Content -->
    <div class="page-content">

        <!-- Blog Single Details -->
        <section class="site_content blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 -right-col">
                        <div class="row">
                            <div class="col-md-12">
                                <article>
                                    <div class="post blog-classic">
                                        <div class="pbmit-blog-classic-inner">
                                            <div class="pbmit-blog-meta pbmit-blog-meta-top">
												<span class="pbmit-meta pbmit-meta-date">
													<i class="pbmit-base-icon-calendar-3"></i>
													<a href="blog-details.html" rel="bookmark">
														<time class="entry-date published" datetime="2023-08-29T09:05:54+00:00">{{\Carbon\Carbon::parse($blog->date)->format('d/m/Y')}}</time>
													</a>
												</span>
                                                <span class="pbmit-meta pbmit-meta-author">
													<i class="pbmit-base-icon-user-3"></i>par
													<a class="pbmit-author-link" href="#">{{$blog->user_name}} {{$blog->user_firstname}}</a>
												</span>

                                            </div>
                                            <div class="pbmit-entry-content">
                                                {!! $blog->content  !!}
                                            </div>

                                        </div>
                                    </div>

                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Single Details End -->

    </div>
    <!-- Contact Us Content End -->

@endsection

