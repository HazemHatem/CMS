@extends('web.app')

@section('content')

<section class="LandingPage col-12">
    <!-- start landing -->

    <style>
        .landing {
            background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0.14) 98%),
                url("{{asset('site/Style/image/img/landing.jpg')}}");

        }
    </style>
    <section class="landing col-12">


        <div class="col-6">
            <span class="title">
                <h1>Let's do it together.</h1>
            </span>
            <span class="subTitle">
                <p>We travel the world in search of stories. Come along for the ride.</p>
            </span>
            <span class="btn_a"><button class="btn col-3 ">View Latest Post</button></span>
        </div>



    </section>
    <!-- End landing -->

    <div class="categories col-12 ">
        <!-- sm 10 -->
        <ul class="col-sm-10 col-lg-7">
            @foreach ($categories as $category)

                <button class="btn_2 col-12"><a
                        href="{{route('category.show', $category->id)}}">{{$category->name}}</a></button>

            @endforeach
        </ul>
    </div>
</section>
<main class="col-12 container">

    <div class="row col-12">
        <span class="title_featured col-2">
            <h1>Most Viewed Article</h1>
        </span>



        <section class="featured">
            @foreach ($Most_viewed_article as $article)
                <div class="post col-sm-12 col-md-5 ">

                    <img src="{{FileHelper::userimage($article->image) }}" alt="">

                    <div class="post_body col-12">
                        <span class="title_category col-3">
                            <h6>{{$article->title}}</h6>
                        </span>

                        <a href="{{route('post', $article->id)}}">

                            <div class="body_">
                                <div class="col-12 title_post">
                                    <h3>{{$article->status}}</h3>
                                    <p>The road ahead might be paved - it might not be.</p>
                                </div>
                                <div class="owner col-12">
                                    <span class="col-12">
                                        <span class=" img_name gap-2">
                                            <img src="{{FileHelper::userimage($article->author->image) }}"
                                                class="card-img-top" alt="...">

                                            <p>{{ $article->author->name }}</p>
                                        </span>
                                        <div class="post_date">
                                            <p>{{$article->created_at}} </p>

                                        </div>
                                    </span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            @endforeach

        </section>

    </div>




    </div>




    <div class="recent col-10">

        <div class="container col-12">
            <div class="row  col-12">


                <div class="title2">

                    <h1 class="col-3">Most Recent</h1>
                </div>


                <div class="col-12   row-2s">
                    @foreach ($articles as $Post)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                            <div class="card h-100">
                                <a href="{{route('post', $Post->id)}}">

                                    <div class="image-container">
                                        <img src="{{FileHelper::userimage($Post->image)}}" class="card-img-top"
                                            alt="...">

                                    </div>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{$Post->title}}</h5>
                                    <p class="card-text">{{FileHelper::truncateDescription($Post->content, 10) }}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="img_name col-6">
                                        <img src="{{FileHelper::userimage($Post->author->image)}}" class="card-img-top"
                                            alt="...">

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

            </div>




        </div>
    </div>
</main>
@endsection

@push('home-css')
    <link rel="stylesheet" href="{{ asset('site/Style/css/home/index.css') }}">
@endpush