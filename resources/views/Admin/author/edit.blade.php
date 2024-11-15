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
                                @include('Admin.layout.message.erorr', ['name' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ $author->description }}" placeholder="Enter description">
                                @include('Admin.layout.message.erorr', ['name' => 'description'])
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Update image</label>
                                    </div>
                                </div>
                                @include('Admin.layout.message.erorr', ['name' => 'image'])
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