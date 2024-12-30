@extends('layout.layout')
@section('page-title','dashboard')
@section('content')
    @include('shares.left_side_par')
    <div class="col-6">
        @include('shares.succes_message')
        @include('ideas.shared.submit_idea')
        <div class="mt-3">




            @forelse($ideas as $idea)

                @include('ideas.shared.idea_card', $idea)

            @empty
<h1 class=" text-center">no result</h1>
            @endforelse
            {{-- submit idea --}}
            <div class=" mt-3">{{ $ideas->WithQueryString()->links() }}</div>

        </div>
    </div>
    <div class="col-3">
        @include('shares.search')

        @include('shares.follow_pox')


    </div>
    </div>
@endsection
