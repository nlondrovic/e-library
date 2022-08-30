@extends('layouts.app')
@section('main')

    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
                Dashboard
            </h1>
        </div>
    </div>

    <div class="pl-[30px] scroll height-dashboard overflow-auto mt-[20px] pb-[30px]">
        <div class="flex flex-row justify-between">
            <!-- Left side -->
            <div class="mr-[30px]">
                <h3 class="capitalize ml-[20px] mb-[20px] text-center pr-[30px]">Recent activities</h3>
                <!-- Activity Cards -->
                <div class="ml-[20px] border-[1px] px-3 py-2 rounded-[5px]  shadow-lg">
                    <div class="overflow-y-auto scroll h-[630px]">
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
                    focus:outline-none focus:ring-[1px] focus:ring-gray-300  shadow-md">
                        Show all
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="mr-[50px] ">
                <h3 class="uppercase mb-[20px] text-left">
                    Reservation requests
                </h3>
                <div>
                    <table class="w-[560px] table-auto">
                        <tbody class="bg-gray-200">
                        <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                            <td class="flex flex-row items-center px-2 py-4">
                                <img class="object-cover w-8 h-8 rounded-full " src="#" alt="">
                                <a href="#" class="ml-2 font-medium text-center">Pero Smith</a>
                            </td>
                            <td>
                            </td>
                            <td class="px-2 py-2">
                                <a href="#">
                                    Tom Sawyer
                                </a>
                            </td>
                            <td class="px-2 py-2">
                                <span
                                    class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">05.11.2020</span>
                            </td>
                            <td class="px-2 py-2">
                                <a href="#" class="hover:text-green-500 mr-[5px]">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="#" class="hover:text-red-500 ">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-right mt-[5px]">
                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                            <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                            Show all
                        </a>
                    </div>
                </div>

                @include('components.dashboard.book-chart')

            </div>
        </div>
    </div>

@endsection
