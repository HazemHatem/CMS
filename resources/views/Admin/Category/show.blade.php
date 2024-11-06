@extends('Admin.app')

@section('title' , $category->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($category->image) }}" alt="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $category->description }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $category->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('Admin.category.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        <form action="{{route('Admin.category.destroy', $category->id)}}" method="POST" class="d-inline">
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
