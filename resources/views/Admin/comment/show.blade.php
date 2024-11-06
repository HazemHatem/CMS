@extends('Admin.app')

@section('title' , 'Comment Details')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comment Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $comment->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Article</th>
                                    <td>{{ $comment->article->title }}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>{{ $comment->content }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $comment->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $comment->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('Admin.comment.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        <form action="{{route('Admin.comment.destroy', $comment->id)}}" method="POST" class="d-inline">
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
