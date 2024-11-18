@extends('admin.app')

@section('title' , 'Comments')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comments</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.comment.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Article</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->article->title }}</td>
                                    <td>{{ Str::words($comment->content, 5) }}</td>
                                    <td>
                                        <a href="{{ route('Admin.comment.show' , $comment->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('Admin.comment.edit' , $comment->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('Admin.comment.destroy' , $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $comments])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
