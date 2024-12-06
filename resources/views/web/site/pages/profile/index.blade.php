@extends('web.app')

@section('title' , Auth::user()->name)

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/profile/index.css') }}">
@endpush

@section('content')
<section class="LandingPage col-12">
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>{{ Auth::user()->name }}</h1>
            </span>
        </div>
    </section>
</section>
<section class="content mt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <div class="text-center m-2 p-2">
                                    <img class="rounded-circle" style="width: 200px; height: 200px" src=" {{ FileHelper::userimage(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                                </div>
                                <div class="upload-container">
                                    <label for="image-upload" class="custom-upload-btn">Browse</label>
                                    <span class="upload-label">Upload Image</span>
                                    <input type="file" name="image" id="image-upload" class="upload-input">
                                    @include('web.site.layout.message.error', ['name' => 'image'])
                                </div>
                            </div>
                            <div class="form-groupe">
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.input' , ['name' => 'name' , 'type' => 'text' , 'value' => Auth::user()->name])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.input' , ['name' => 'email' , 'type' => 'email' , 'value' => Auth::user()->email])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.input' , ['name' => 'phone' , 'type' => 'text' , 'value' => Auth::user()->phone])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.message', ['name' => 'description', 'value' => Auth::user()->description])
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success" id="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('profile.change-password', Auth::id()) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-groupe">
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.password', ['name'=>'current_password' , 'onclick' => 'toggleCurrentPassword()'])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.password', ['name'=>'password' , 'onclick' => 'togglePassword()'])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('web.site.layout.forms.password', ['name'=>'password_confirmation' , 'onclick' => 'togglePasswordConfirmation()'])
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success" id="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
@include('web.site.layout.message.success')
<script src="{{ asset('dashboard/js/showpassword.js') }}"></script>
@endpush
