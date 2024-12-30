@extends('layout.layout')
@section('page-title','posts')
@section('content')
    @include('shares.left_side_par')
    <div class="col-6">
        @include('shares.succes_message')

        <div class="mt-3">
            @if ($editing ?? false)
                <h4> update yours ideas </h4>
                <div class="row">
                    <form action="{{ route('idea.update', $idea->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <textarea class="form-control" id="idea" rows="3" name='content'></textarea>
                            @error('idea')
                                <span class=" fs-5 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-dark"> update </button>
                    </form>
                </div>
        </div>
        <hr>
    @else
        @include('ideas.shared.idea_card')
        @endif

    </div>
    </div>
    <div class="col-3">
        @include('shares.search')

        @include('shares.follow_pox')

    </div>
    </div>
@endsection
