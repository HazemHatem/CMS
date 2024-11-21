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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
                            @include('Admin.layout.message.error', ['name' => 'name'])
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
                            @include('Admin.layout.message.error', ['name' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Enter phone">
                            @include('Admin.layout.message.error', ['name' => 'phone'])
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update image</label>
                                </div>
                            </div>
                            @include('Admin.layout.message.error', ['name' => 'image'])
                        </div>

                        <div class="form-group">
                            <label for="rule_id">Rule</label>
                            <select name="rule_id" class="form-control @error('rule_id') is-invalid @enderror" id="rule_id">
                                @foreach ($rules as $rule)
                                <option value="{{ $rule->id }}" {{ $rule->id == $user->rule_id ? 'selected' : '' }}>{{ $rule->name }}</option>
                                @endforeach
                            </select>
                            @include('Admin.layout.message.error', ['name' => 'rule_id'])
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
