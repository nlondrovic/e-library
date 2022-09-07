@extends('layouts.app')
@section('main')

    <div class="mt-2">
        <div class="heading mt-[7px] pl-[50px] pb-[21px] border-b-[1px] border-[#e4dfdf]">
            <h1> {{ __('Dashboard') }} </h1>
        </div>
    </div>

    <div class="pl-[32px] scroll height-dashboard pt-[20px] pb-[30px]">
        <div class="flex flex-row justify-between">
            <!-- Left side -->
            <div class="mr-[30px]">
                <h3 class="capitalize ml-[20px] mb-[20px] text-center pr-[30px]">{{ __('Recent activities') }}</h3>
                <!-- Activity Cards -->
                <div class="ml-[20px] border-[1px] px-3 py-2 rounded-[5px] shadow-lg">
                    <div class="overflow-y-auto scroll h-[630px] w-[560px]">
                        @foreach($activities as $activity)
                            @if($activity->type == 'Checkout')
                                @include('components/dashboard/checkout-card')
                            @elseif($activity->type == 'Checkin')
                                @include('components/dashboard/checkin-card')
                            @elseif($activity->type == 'Lost Book')
                                @include('components/dashboard/lost-card')
                            @elseif($activity->type == 'Reservation')
                                @include('components/dashboard/reservation-card')
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Show more -->
                <div class="inline-block w-[90%] mt-4 ml-[35px] px-2 py-2">
                    <a href="{{ route('activities') }}" class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider
                    text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200
                    focus:outline-none focus:ring-[1px] focus:ring-gray-300 shadow-md">
                        {{ __('Show all') }}
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="mr-[50px] ">
                @include('components.dashboard.book-chart')
            </div>
        </div>
    </div>

@endsection
