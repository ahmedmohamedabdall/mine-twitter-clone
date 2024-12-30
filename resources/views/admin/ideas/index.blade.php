@extends('layout.layout')

@section('page-title','IDEA|admin')

@section('content')


<div class="row">
    <!-- Sidebar -->
    <div class="col-md-4  ">
@include('admin.shared.left_side_par')
    </div>

    <!-- Main content -->
    <div class="col-md-8 r">
        <h1> IDEAS</h1>
        <table class="table table-striped">
            <thead class=" table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IDEA</th>
                    <th>CREATED_AT</th>
                    <th>#</th>

                </tr>
            </thead>
            @foreach ($ideas as $idea )
                
           
            <tbody>
                <td>{{ $idea->id }}</td>
                <td><a href="{{ route('users.show',$idea->user) }}">{{ $idea->user->name }}</a></td>
                <td>{{ $idea->content }}</td>
                <td>{{ $idea->created_at->toDateString() }}</td>
                <td>
                    <a class=" me-2" href="{{ route('idea.show',$idea) }}">show</a>
                    <a href="{{ route('idea.edit',$idea) }}">edit</a>
                </td>
            </tbody> 
            @endforeach
        </table>
        <div>{{ $ideas->links() }}</div>
    </div>
</div>
@endsection