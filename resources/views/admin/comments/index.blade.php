@extends('layout.layout')

@section('page-title','COMMENT|admin')

@section('content')
@include('shares.succes_message')

<div class="row">
    <!-- Sidebar -->
    <div class="col-md-4  ">
@include('admin.shared.left_side_par')
    </div>

    <!-- Main content -->
    <div class="col-md-8 r">
        <h1> COMMENTS</h1>
        <table class="table table-striped">
            <thead class=" table-dark">
                <tr>
                    <th>ID</th>
                    <th>user</th>
                    <th>idea</th>
                    <th>comment</th>
                    <th>CREATED_AT</th>
                    <th>#</th>

                </tr>
            </thead>
            @foreach ($comments as $comment )
                
           
            <tbody>
                <td>{{ $comment->id }}</td>
                <td><a href="{{ route('users.show',$comment->user) }}">{{ $comment->user->name }}</a></td>
                <td><a href="{{ route('idea.show',$comment->idea) }}">{{ $comment->idea->content}}</a></td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->created_at->toDateString() }}</td>
                <td>
                    <form action="{{ route('admin.comments.destroy',$comment) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">delete</button>
                    </form>
                    
                    
                </td>
            </tbody> 
            @endforeach
        </table>
        <div>{{ $comments->links() }}</div>
    </div>
</div>
@endsection