@extends('Admin.app')

@section('title' , 'Add Category')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <form action="{{ route('Admin.category.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter name">
                                @include('Admin.layout.message.error', ['name' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" placeholder="Enter description">
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
                                @include('Admin.layout.message.error', ['name' => 'image'])
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