@extends('Admin.app')

@section('title' , 'Add Comment')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Comment</h3>
                    </div>
                    <form action="{{ route('Admin.comment.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{ old('content') }}" placeholder="Enter content">
                                @error('content')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="article_id">Article</label>
                                <select name="article_id" class="form-control @error('article_id') is-invalid @enderror" id="article_id">
                                    @foreach ($articles as $article)
                                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                                    @endforeach
                                </select>
                                @error('article_id')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user_id">User</label>
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
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
