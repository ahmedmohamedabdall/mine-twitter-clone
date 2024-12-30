@extends('layout.layout')
@section('page-title',$user->name)
@section('content')
    @include('shares.left_side_par')
    <div class="col-6">
        @include('shares.succes_message')

        <div class="mt-3">

            @include('users.shared.user-card')


        </div>
        <hr>
        @forelse($ideas as $idea)
            @include('ideas.shared.idea_card',['idea'=>$idea])

        @empty
            <h1 class=" text-center">no result</h1>
        @endforelse
    </div>
    <div class="col-3">
        @include('shares.search')

        @include('shares.follow_pox')

    </div>
    </div>
    <h3 class=" mt-5"> {{ $ideas->WithQueryString()->links() }}</h3>
@endsection
