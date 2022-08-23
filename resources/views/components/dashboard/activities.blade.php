@extends('layouts.app')

@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                Activities
            </h1>
        </div>
    </div>
    <!-- Space for content -->
    <div class="pl-[50px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
        <div class="flex flex-row justify-between">
            <div class="mr-[30px]">
                <!-- Activity Cards -->
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
                <div class="inline-block w-full mt-4">
                    <button type="button"
                            class="btn-animation w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition
                            duration-300 ease-in border-[1px] border-gray-400 rounded activity-showMore hover:bg-gray-200
                            focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                        {{ __('Show more') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
