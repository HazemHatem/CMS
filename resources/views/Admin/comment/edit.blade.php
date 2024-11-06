@extends('Admin.app')

@section('title' , 'Edit Comment')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Comment</h3>
                    </div>
                    <form action="{{ route('Admin.comment.update' , $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{ $comment->content }}" placeholder="Enter content">
                                @error('content')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="article_id">Article</label>
                                <select name="article_id" class="form-control @error('article_id') is-invalid @enderror" id="article_id">
                                    @foreach ($articles as $article)
                                    <option value="{{ $article->id }}" @if ($article->id == $comment->article_id) selected @endif>{{ $article->title }}</option>
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
                                    <option value="{{ $user->id }}" @if ($user->id == $comment->user_id) selected @endif>{{ $user->name }}</option>
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
