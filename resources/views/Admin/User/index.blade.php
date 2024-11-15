@extends('Admin.app')

@section('title' , 'Users')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    @include('Admin.layout.forms.search', ['url' => route('Admin.user.search')])
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>
                                    <a href="{{route('Admin.user.show', $user->id)}}" class="btn btn-info mr-2"><i class="fa fa-eye"></i> Show</a>
                                    <a href="{{route('Admin.user.edit', $user->id)}}" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('Admin.user.destroy', $user->id)}}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('Admin.layout.pagination.pagination' , ['data' => $users])
            </div>
        </div>
    </div>
</section>
@endsection

@push('before-scripts')
@include('Admin.layout.message.success')
@endpush