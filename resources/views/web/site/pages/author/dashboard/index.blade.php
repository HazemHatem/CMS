@extends('web.app')


@section('content')
<section class="LandingPage col-12">
    <!-- start landing -->
    <style>
        .landing {
            background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0) 0), url("http://127.0.0.1:8000/site/Style/image/profile/profile.jpg");
            height: 65vh;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .profile {
            display: flex;
            max-height: 53vh;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            align-content: center;
        }

        .articel {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .contetn {
            display: flex;
            gap: 1rem;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: space-between;
        }
    </style>

    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Welcome M/{{ Auth::user()->name }} </h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="profile col-10" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f7f7f7;">
            <div style="width: 400px; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
                <!-- صورة المستخدم -->
                <div style="background-color: #007bff; padding: 20px; text-align: center;">
                    <img src="{{FileHelper::userimage(Auth::user()->image) }}" alt="User Profile"
                        style="width: 100px; height: 100px; border-radius: 50%; border: 3px solid #fff;">
                </div>


                <!-- معلومات المستخدم -->
                <div style="padding: 20px; text-align: center;">
                    <h3 style="margin: 10px 0; font-size: 1.5rem; color: #333;">{{ Auth::user()->name }}</h3>
                    <p style="color: #777; font-size: 0.9rem;">{{ Auth::user()->email }}</p>
                    <p style="color: #555; font-size: 0.9rem;">رقم الهاتف: {{ Auth::user()->phone ?? 'غير متوفر' }}</p>

                    <!-- أزرار التحكم -->
                    <div style="margin-top: 20px;">

                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit"
                                style="background-color: #dc3545; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 0.9rem; cursor: pointer;">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="articel col-12 ">

            @if(Auth::user()->articles->isEmpty())
            <p>لا توجد مقالات لهذا الناشر.</p>
            @else

            @foreach(Auth::user()->articles as $article)
            <div class="col-12  ">
                <div class="card shadow-sm border-light">
                    <img src="{{ FileHelper::articleimage($article->image) }}" class="card-img-top" alt="مقال">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 50) }}</p>
                        <p><small class="text-muted">تاريخ النشر: {{ $article->created_at->format('Y-m-d') }}</small></p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
            @endforeach




            @endif
        </div>
    </section>
</main>
@endsection


<!-- End landing -->
@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush