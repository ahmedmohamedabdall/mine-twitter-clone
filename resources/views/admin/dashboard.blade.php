@extends('layout.layout')

@section('page-title','admin')

@section('content')


<div class="row">
    <!-- Sidebar -->
    <div class="col-md-4  ">
        @include('admin.shared.left_side_par')
    </div>

    <!-- Main content -->
    <div class="col-md-8  ">
        <h1>Admin Dashboard</h1>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                @include('shares.widgets',
                ['title'=>'users',
                'icon'=>'fas fa-users',
                'data'=> $count->users ])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shares.widgets',
                ['title'=>'ideas',
                'icon'=>'fas fa-pencil',
                'data'=>$count->ideas])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shares.widgets',
                ['title'=>'comments',
                'icon'=>'fas fa-comments',
                'data'=>$count->comments])
            </div>
            <div class="col-sm-6 col-md-4 mt-3">
                @include('shares.widgets',
                ['title'=>'likes',
                'icon'=>'fas fa-thumbs-up',
                'data'=>$count->likes])
            </div>

        </div>



    </div>
</div>




@endsection