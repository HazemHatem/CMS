@extends('web.app')

@section('title' , $article->title)


@section('content')
<style>
    .landing {
        background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0) 0),
        url("{{asset('site/Style/image/categories/landing.jpg')}}");
        height: 45vh;
        background-position: 0px 0px, 50% 50%;
        background-size: auto, cover;
    }
</style>
<section class="LandingPage col-12">
    <!-- start landing -->
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>post</h1>
            </span>
        </div>
    </section>
</section>


<!-- End landing -->

<main class="container col-11">
    <div class="recent col-11">
        <div class="container col-12">
            <div class="row  col-12">
                <div class="title2">
                    <h1 class="col-12">{{ $article->title }}</h1>
                    <p> {{date('F j, Y', strtotime($article->created_at))}} | {{ $article->category->name }} </p>
                </div>
                <div class="col-10   row-2s">
                    <div class="paragraph">
                        <p>{!! $article->content !!}</p>
                    </div>
                    <div class="author">
                        <div class="cont_author col-lg-12">
                            <div class="authorImg">
                                <img src="{{ FileHelper::userimage($article->author->image) }}" alt="">
                                <h6>{{ $article->author->name }}</h6>
                            </div>
                            <div class="paragraph_2">
                                <p>{{ $article->author->description }}</p>
                            </div>
                            <div class="links_author">
                                <a href="https://www.facebook.com">
                                    <i class="fa-brands fa-facebook" style="font-size: 24px;"></i>
                                </a>
                                <a href="https://www.instagram.com">
                                    <i class="fa-brands fa-twitter" style="font-size: 24px;"></i>
                                </a>
                                <a href="https://www.linkedin.com">
                                    <i class="fa-brands fa-linkedin" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/post/index.css') }}">
@endpush
