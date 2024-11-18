@extends('Admin.app')

@section('title' , $article->title)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Article</h3>
                    </div>
                    <form action="{{ route('Admin.article.update', $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Update image</label>
                                    </div>
                                </div>
                                @include('Admin.partials.error', ['name' => 'image'])
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $article->title }}" placeholder="Enter title">
                                @include('Admin.partials.error', ['name' => 'title'])
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter content">{{ $article->content }}</textarea>
                                @include('Admin.partials.error', ['name' => 'content'])
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                    <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="unpublished" {{ $article->status == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                                </select>
                                @include('Admin.partials.error', ['name' => 'status'])
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.partials.error', ['name' => 'category_id'])
                            </div>
                            <div class="form-group">
                                <label for="author_id">Author</label>
                                <select name="author_id" class="form-control @error('author_id') is-invalid @enderror" id="author_id">
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}" {{ $article->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.partials.error', ['name' => 'author_id'])
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
<script src="https://cdn.tiny.cloud/1/j4oi2sigysy4d2vt6ensqjvkoiisa0xxzan1m9oujlofoi2w/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic | bullist numlist | link image | code',
        menubar: true,
        height: 400,
    });
</script>
@endpush