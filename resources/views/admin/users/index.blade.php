@extends('layout.layout')

@section('page-title','USER|admin')

@section('content')


<div class="row">
    <!-- Sidebar -->
    <div class="col-md-4  ">
@include('admin.shared.left_side_par')
    </div>

    <!-- Main content -->
    <div class="col-md-8 r">
        <h1> users</h1>
        <table class="table table-striped">
            <thead class=" table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>JOINED AT</th>
                    <th>#</th>

                </tr>
            </thead>
            @foreach ($users as $user )
                
           
            <tbody>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->toDateString() }}</td>
                <td><a href="{{ route('users.show',$user) }}">show</a></td>
            </tbody> 
            @endforeach
        </table>
        <div>{{ $users->links() }}</div>
    </div>
</div>




@endsection