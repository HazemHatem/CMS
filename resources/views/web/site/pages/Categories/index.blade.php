@extends('web.app')

@section('title' , 'Categories')

<!-- End landing -->

@section('content')
<section class="LandingPage col-12">
    <!-- start landing -->
    <style>
        .landing {
            background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0) 0),
            url("{{asset('site/Style/image/categories/landing.jpg')}}");
            height: 45vh;
            background-position: 0px 0px, 50% 50%;
            background-size: auto, cover;
        }
    </style>
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Categories</h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="gallery-container">
            @foreach ($categories as $category )
            <div class="gallery-item">
                <a href="{{route('category.article', $category->id)}}">
                    <div class="image-overlay">
                        <h3 class="title">{{$category->name}}</h3>
                    </div>
                    <img src="{{FileHelper::categoryimage($category->image) }}" class="card-img-top" alt="...">
                </a>
            </div>
            @endforeach
        </div>
    </section>
</main>
@endsection



@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush
