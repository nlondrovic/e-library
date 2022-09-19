@extends('layouts.app')
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Reservation requests')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('reservationRequests.index') }}">{{ __('Reservation requests') }}</a>
    </div>

    <div class="flex flex-row pl-[50px] overflow-auto scroll height-dashboard pb-[30px] mt-[0px]">
        <div class="mr-[30px] mt-[30px]">
            <p class="mb-[20px]">
                {{ __('Results found') }}: {{ count($reservationRequests) }}
            </p>

            @include('components.dashboard.reservation-requests-table')

        </div>

    </div>

@endsection
