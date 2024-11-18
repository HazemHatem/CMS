@extends('admin.app')

@section('title' , 'Categories')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.category.index')])
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::words($category->description, 7) }}</td>
                                    <td>
                                        <a href="{{ route('Admin.category.show' , $category->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('Admin.category.edit' , $category->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('Admin.category.destroy' , $category->id) }}" method="POST" class="d-inline">
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
                    @include('Admin.layout.pagination.pagination' , ['data' => $categories])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
