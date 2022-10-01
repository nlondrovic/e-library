@extends('layouts.app')
<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
@section('main')

    <div class="heading pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> @yield('transactions-title', 'Book transactions') </h1>
        @yield('transactions-subtitle')
    </div>

    <div class="flex justify-start pt-3 bg-white">
        <div class="mt-[10px]">
            <ul class="text-[#2D3B48]">
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'checkouts')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('checkouts.index') }}"
                                   class="flex items-center">
                                    <i class="@if(str_contains($route_name, 'checkouts')) text-[#576cdf] @else text-[#707070] @endif transition duration-300 ease-in group-hover:text-[#576cdf] far fa-copy text-[20px]"></i>
                                    <p class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[15px] ml-[18px]">
                                        {{__('Checkouts')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'checkins')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('checkins.index') }}"
                                   class="flex items-center">
                                    <i class="transition duration-300 ease-in @if(str_contains($route_name, 'checkins')) text-[#576cdf] @else text-[#707070] @endif text-[20px] fas fa-file group-hover:text-[#576cdf]"></i>
                                    <p class="transition duration-300 ease-in text-[15px] ml-[21px] group-hover:text-[#576cdf]">
                                        {{__('Checkins')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <hr>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[28px] py-1">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'overdue')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('overdue.index') }}"
                                   class="flex items-center">
                                    <i class="group-hover:text-[#576cdf] @if(str_contains($route_name, 'overdue')) text-[#576cdf] @else text-[#707070] @endif text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in "></i>
                                    <p class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        {{__('Overdue books')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[28px]">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'lost')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('lost.index') }}"
                                   class="flex items-center">
                                    <i class="group-hover:text-[#576cdf] @if(str_contains($route_name, 'lost')) text-[#576cdf] @else text-[#707070] @endif text-[20px] fas fa-exclamation-circle transition duration-300 ease-in "></i>
                                    <p class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        {{__('Lost books')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <hr>
                <li class="mb-[4px] py-1">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'active')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('reservations.active') }}"
                                   class="flex items-center">
                                    <i class="group-hover:text-[#576cdf] @if(str_contains($route_name, 'active')) text-[#576cdf] @else text-[#707070] @endif text-[20px] far fa-calendar-check transition duration-300 ease-in"></i>
                                    <p class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        {{__('Active reservations')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'archived')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('reservations.archived') }}"
                                   class="flex items-center">
                                    <i class="@if(str_contains($route_name, 'archived')) text-[#576cdf] @else text-[#707070] @endif text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                    <p class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        {{__('Archived reservations')}}
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="w-full ml-[15px] px-2">
            <div class="w-[100%] text-center mb-[10px]">
                <button onclick="fadeInAndOut()" class="text-center text-[22px]" style="outline: none">{{ __('Filters') }}</button>
                <i onclick="fadeInAndOut()" id="arrow-down" class="text-[17px] fa-solid fa-chevron-down cursor-pointer"></i>
            </div>

            @include('components.filter-transactions')

            @if(isset($reservations) && $reservations->count() || isset($checkouts) && $checkouts->count())
                @yield('table')
            @elseif(isset(request()->book_ids) || isset(request()->student_ids) || isset(request()->librarian_ids))
                @include('components.no-results')
            @else
                @include('components.no-results')
            @endif
        </div>

    </div>

    <script>
        const div = document.getElementById('filter-component');
        @if(filtering() )
        div.classList.toggle("accordionPanelHidden");
        @endif
        function fadeInAndOut() {
            $('#arrow-down').toggleClass("fa-solid fa-chevron-up fa-solid fa-chevron-down");
            div.classList.toggle("accordionPanelHidden");
        }
    </script>

@endsection
