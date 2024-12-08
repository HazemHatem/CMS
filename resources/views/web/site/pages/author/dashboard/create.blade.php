@extends('web.app')

@section('title', 'Add Article')

@section('content')
<section class="LandingPage col-12">
    <!-- start landing -->
    <style>
        .form-group{
            display: flex
;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
        }
        .tox {
            width: 100%;
        }
        .landing {
            background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0) 0), url("http://127.0.0.1:8000/site/Style/image/profile/profile.jpg");
            height: 65vh;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .profile {
            display: flex;
            max-height: 53vh;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            align-content: center;
        }

        .articel {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .contetn {
            position: relative;
            display: flex;
            gap: 1rem;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: space-between;
        }
        .content{
            margin: 1rem 0rem;
        }
    </style>

    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Welcome M/{{ Auth::user()->name }} </h1>
            </span>
        </div>
    </section>
  
</section>
<section class="content col-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Article</h3>
                    </div>
                    <form action="{{ route('Author.dashboard.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <!-- Title Field -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @include('web.site.layout.message.error', ['name' => 'title'])
                            </div>
                            <!-- Content Field (TinyMCE) -->
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @include('web.site.layout.message.error', ['name' => 'content'])
                            </div>
            
                            <!-- Category Field -->
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @include('web.site.layout.message.error', ['name' => 'category_id'])
                            </div>

                            <!-- Image Upload Field -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @include('web.site.layout.message.error', ['name' => 'image'])
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
<script src="https://cdn.tiny.cloud/1/34ri62ry2ty734gxgcsjh8jio0wq4p89amijenyz64jkp7vj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic | bullist numlist | link image | code',
        menubar: false,
        height: 400,
    });
</script>
@endpush
