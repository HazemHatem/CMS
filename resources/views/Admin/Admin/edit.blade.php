@extends('admin.app')

@section('title' , 'Edit Admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <form action="{{ route('Admin.admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" placeholder="Enter name">
                            @include('Admin.layout.message.erorr', ['name' => 'name'])
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Enter email">
                            @include('Admin.layout.message.erorr', ['name' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" placeholder="Enter phone">
                            @include('Admin.layout.message.erorr', ['name' => 'phone'])
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

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="role_id" value="4" id="flexCheckDefault" @if($admin->role->name == 'manager') checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                                Manager
                            </label>
                            @include('Admin.layout.message.erorr', ['name' => 'role_id'])
                        </div>
                    </div>
                    <div class="box-footer mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endSection