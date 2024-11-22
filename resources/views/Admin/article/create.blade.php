@extends('Admin.app')

@section('title' , 'Add Article')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Article</h3>
                    </div>
                    
                    <form action="{{ route('Admin.article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Enter title">
                                @include('Admin.layout.message.error', ['name' => 'title'])
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter content">{{ old('content') }}</textarea>
                                @include('Admin.layout.message.error', ['name' => 'content'])
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                    <option value="draft" selected>Draft</option>
                                    <option value="published">Published</option>
                                    <option value="unpublished">Unpublished</option>
                                </select>
                                @include('Admin.layout.message.error', ['name' => 'status'])
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.layout.message.error', ['name' => 'category_id'])
                            </div>
                            <div class="form-group">
                                <label for="author_id">Author</label>
                                <select name="author_id" class="form-control @error('author_id') is-invalid @enderror" id="author_id">
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.layout.message.error', ['name' => 'author_id'])
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


@push('before-scripts')
  
<script src="https://cdn.tiny.cloud/1/34ri62ry2ty734gxgcsjh8jio0wq4p89amijenyz64jkp7vj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    api:'34ri62ry2ty734gxgcsjh8jio0wq4p89amijenyz64jkp7vj'
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>
 


@endpush