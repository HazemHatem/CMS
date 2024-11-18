@extends('Admin.app')

@section('title' , Auth::guard('admin')->user()->name)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::guard('admin')->user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Admin.profile.update', Auth::guard('admin')->id()) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <div class="text-center m-2 p-2">
                                    <img class="profile-user-img img-fluid img-circle" src=" {{ FileHelper::userimage(Auth::guard('admin')->user()->image) }}" alt="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @include('Admin.layout.message.error', ['name' => 'image'])
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ Auth::guard('admin')->user()->name }}">
                                @include('Admin.layout.message.error', ['name' => 'name'])
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ Auth::guard('admin')->user()->email }}">
                                @include('Admin.layout.message.error', ['name' => 'email'])
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone" value="{{ Auth::guard('admin')->user()->phone }}">
                                @include('Admin.layout.message.error', ['name' => 'phone'])
                            </div>
                            <div class="text-center mb-3">
                                <button type="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('Admin.profile.change-password', Auth::guard('admin')->id()) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="current_password">Current Password</label>
                                <div class="input-group">
                                    <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter current password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-warning" type="button" onclick="toggleCurrentPassword()">
                                            <i class="fas fa-eye" id="togglecurrentIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                @include('Admin.layout.message.error', ['name' => 'current_password'])
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-warning" type="button" onclick="togglePassword()">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                @include('Admin.layout.message.error', ['name' => 'password'])
                            </div>
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-warning" type="button" onclick="togglePasswordConfirmation()">
                                            <i class="fas fa-eye" id="toggleConfirmationIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                @include('Admin.layout.message.error', ['name' => 'password_confirmation'])
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
<script src="{{ asset('dashboard/js/showpassword.js') }}"></script>
@endpush
