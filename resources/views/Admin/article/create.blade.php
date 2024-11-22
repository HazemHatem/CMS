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
                    <form action="{{ route('Admin.article.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'title' , 'type' => 'text' , 'value' => old('title')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'content' , 'type' => 'text' , 'value' => old('content')])
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
                                @include('Admin.layout.forms.image')
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