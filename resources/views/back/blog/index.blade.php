@extends('back.Dashboard.master')

@section('title' , 'Product')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Manage Blog</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Cat.name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->name}}</td>
                                        <td>{{$blog->category->name}}</td>
                                        <td>{{$blog->description}}</td>
                                        <td>
                                            <a href="{{route('blogs.edit', $blog->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('blogs.destroy', $blog->id)}}" onclick="return confirm('Are you Sure  ?')" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
