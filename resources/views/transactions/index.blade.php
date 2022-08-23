@extends('layouts.app')
<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading flex flex-row mt-[7px] border-b-[1px] border-[#e4dfdf]">
            <h1 class="pl-[50px] pb-[21px]">
                @yield('transactions-title', 'Book transactions')
            </h1>
            @if(isset(request()->student_id))
                <h3 class="pl-[50px] ml-[57px] pt-[18px]">{{__('For student:')}} <b>{{ $student->name }}</b></h3>
            @endif

            @if(isset(request()->book_id))
                <h3 class="pl-[50px] pt-[18px]">{{__('For book:')}} <b>{{ $book->title }}</b></h3>
            @endif
        </div>
    </div>

    <!-- Space for content -->
    <div class="flex justify-start pt-3 bg-white">

        {{-- Side navbar --}}
        <div class="mt-[10px]">
            <ul class="text-[#2D3B48]">
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'checkouts')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('checkouts.index', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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
                                <a href="{{ route('checkins.index', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[28px]">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer
                                 @if(str_contains($route_name, 'overdue')) bg-[#EFF3F6] text-[#576cdf] @endif">
                                <a href="{{ route('overdue.index', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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
                                <a href="{{ route('lost.index', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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
                                <a href="{{ route('reservations.active', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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
                                <a href="{{ route('reservations.archived', ['student_id' => request()->get('student_id'), 'book_id' => request()->get('book_id')]) }}"
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

        <!-- Table -->
        <div class="w-full mt-[10px] ml-2 px-2">
            @if((isset($reservations) && $reservations->count()) || (isset($checkouts) && $checkouts->count()))
                @include('components.filter-transactions')
                @yield('table')
            @else
                <div class="w-[50%] ml-[50px]">
                    <div class="flex items-center px-6 py-4 my-4 text-lg bg-gray-200 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-gray-600"></i>&nbsp;&nbsp;
                        <p class="font-medium text-gray-600">There are no results for this query.</p>
                    </div>
                </div>
            @endif
        </div>

    </div>

@endsection
