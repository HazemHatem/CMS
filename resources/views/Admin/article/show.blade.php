@extends('Admin.app')

@section('title' , $article->title)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Article Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($article->image) }}" alt="{{ $article->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Title</th>
                                    <td>{{ $article->title }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><a href="{{route('Admin.category.show', $article->category->id)}}">{{ $article->category->name }}</a></td>
                                </tr>
                                <tr>
                                    <th>Author</th>
                                    <td><a href="{{route('Admin.author.show', $article->author->id)}}">{{ $article->author->name }}</a></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $article->status }}</td>
                                </tr>
                                <tr>
                                    <th>Views</th>
                                    <td>{{ $article->views }}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>{!! $article->content !!}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $article->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $article->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('Admin.article.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        <form action="{{route('Admin.article.destroy', $article->id)}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger float-right"><i class="fa fa-trash"></i> Delete</button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection