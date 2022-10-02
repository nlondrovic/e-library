@extends('layouts.app')
@section('title', __('Reservation requests'))
@section('main')

    <div class="mt-2">
        <div class="heading mt-[7px] pl-[50px] pb-[21px] border-b-[1px] border-[#e4dfdf]">
            <h1> {{ __('Reservation requests') }} </h1>
        </div>
    </div>

    <div class="ml-[50px] scroll height-dashboard">
        @include('components.dashboard.reservation-requests-table')
    </div>

@endsection
