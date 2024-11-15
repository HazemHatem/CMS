@extends('admin.app')

@section('title' , 'Authors')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Authors</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.author.search')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ Str::words($author->description, 5) }}</td>
                                    <td>
                                        <a href="{{ route('Admin.author.show' , $author->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Show</a>
                                        <a href="{{ route('Admin.author.edit' , $author->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('Admin.author.destroy' , $author->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $authors])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush