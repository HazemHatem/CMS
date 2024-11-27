@extends('web.app')

@section('title' , 'Articles')
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

        .pagination .page-link {
            background-color: #0000008c;
            border-color: black;
            margin-top: 3rem;
        }

        .text-muted {
            margin-top: 3rem;
            margin-right: 1rem;
        }
    </style>
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Articles</h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="col-12   row-2s">
            @foreach ($articles as $Post)
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card h-100">
                    <a href="{{route('article.show', $Post->id)}}">
                        <div class="image-container">
                            <img src="{{FileHelper::articleimage($Post->image)}}" class="card-img-top"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$Post->title}}</h5>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="img_name col-6">
                            <img src="{{FileHelper::authorimage($Post->author->image)}}" class="card-img-top" alt="...">
                            <p>{{$Post->author->name}}</p>
                        </div>
                        <span class="date">
                            <p>{{$Post->created_at}}</p>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ( $articles->hasPages() )
        <div class="pagination">
            {{ $articles->links() }}
        </div>
        @endif
    </section>
</main>
@endsection



@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush
