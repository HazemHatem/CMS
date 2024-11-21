@extends('Admin.app')

@section('title' , $author->name)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Author</h3>
                    </div>
                    <form action="{{ route('Admin.author.update', $author->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $author->name }}" placeholder="Enter name">
                                @include('Admin.layout.message.error', ['name' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $author->email }}" placeholder="Enter email">
                                @include('Admin.layout.message.error', ['name' => 'email'])
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $author->phone }}" placeholder="Enter phone">
                                @include('Admin.layout.message.error', ['name' => 'phone'])
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter description" value="{{ $author->description }}" cols="3"></textarea>
                                @include('Admin.layout.message.error', ['name' => 'description'])
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Update image</label>
                                    </div>
                                </div>
                                @include('Admin.layout.message.error' , ['name' => 'image'])
                            </div>
                            <div class="form-group">
                                <label for="rule_id">rule</label>
                                <select name="rule_id" class="form-control @error('rule_id') is-invalid @enderror" id="rule_id">
                                    @foreach ($rules as $rule)
                                    <option value="{{ $rule->id }}" {{ $rule->id == $author->rule_id ? 'selected' : '' }}>{{ $rule->name }}</option>
                                    @endforeach
                                </select>
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
