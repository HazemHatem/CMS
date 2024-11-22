@extends('Admin.app')

@section('title' , 'Add Admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Admin</h3>
                    </div>
                    <form action="{{ route('Admin.admin.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter name">
                                @include('Admin.layout.message.error', ['name' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email">
                                @include('Admin.layout.message.error', ['name' => 'email'])
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Enter phone">
                                @include('Admin.layout.message.error', ['name' => 'phone'])
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password">
                                @include('Admin.layout.message.error', ['name' => 'password'])
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rule_id" value="4" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Manager
                                </label>
                                @include('Admin.layout.message.error', ['name' => 'rule_id'])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
