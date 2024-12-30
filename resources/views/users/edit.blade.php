@extends('layout.layout')
@section('page-title','edit profile')
@section('content')
    @include('shares.left_side_par')
    <div class="col-6">
        @include('shares.succes_message')

        <div class="mt-3">

            @include('users.shared.user-card')


        </div>
    </div>
    <div class="col-3">
        @include('shares.search')

        @include('shares.follow_pox')

    </div>
    </div>
@endsection
