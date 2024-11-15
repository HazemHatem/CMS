@extends('admin.app')

@section('title' , 'Edit User')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <form action="{{ route('Admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
                            @include('Admin.layout.message.error', ['name' => 'name'])
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
                            @include('Admin.layout.message.error', ['name' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Enter phone">
                            @include('Admin.layout.message.error', ['name' => 'phone'])
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update image</label>
                                </div>
                            </div>
                            @include('Admin.layout.message.error', ['name' => 'image'])
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="status" name="role_id" value="2" @if($user->role_id == 2) checked @endif>
                                <label for="status" class="custom-control-label">Author</label>
                            </div>
                            @include('Admin.layout.message.error', ['name' => 'role_id'])
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endSection