@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <h1 class="pl-[50px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
            Book transactions
        </h1>
    </div>

    <!-- Space for content -->
    <div class="flex justify-start pt-3 bg-white">

        {{-- Side navbar --}}
        <div class="mt-[10px]">
            <ul class="text-[#2D3B48]">
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                            <div class="py-[15px] px-[20px] w-[268px] cursor-pointer group hover:bg-[#EFF3F6] rounded-[10px]">
                                <a href="{{ route('checkouts.index', request()->all()) }}" class="flex items-center">
                                    <i class="text-[#707070] transition duration-300 ease-in group-hover:text-[#576cdf] far fa-copy text-[20px]"></i>
                                    <p class="transition duration-300 ease-in group-hover:text-[#576cdf]  text-[15px] ml-[18px]">
                                        Checkouts
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class="whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                <a href="{{ route('checkins.index') }}" class="flex items-center">
                                    <i class="transition duration-300 ease-in  text-[#707070] text-[20px] fas fa-file group-hover:text-[#576cdf]"></i>
                                    <p class="transition duration-300 ease-in  text-[15px] ml-[21px] group-hover:text-[#576cdf]">
                                        Checkins
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[28px]">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                <a href="{{ route('overdues.index') }}" class="flex items-center">
                                    <i class="group-hover:text-[#576cdf] text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in "></i>
                                    <p class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        Overdue books
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
                            <div class="group {{-- bg-[#EFF3F6]--}} hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                <a href="{{ route('reservations.active') }}" class="flex items-center">
                                    <i class="group-hover:text-[#576cdf] text-[#707070] text-[20px] far fa-calendar-check transition duration-300 ease-in"></i>
                                    <p class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf] {{--text-[#576cdf]--}}">
                                        Active reservations
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <li class="mb-[4px]">
                    <div class="w-[300px] pl-[32px]">
                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                <a href="{{ route('reservations.archived') }}" aria-label="Rezervacije" class="flex items-center">
                                    <i class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                    <p class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                        Archived reservations
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
{{--                <li class="mb-[4px]">--}}
{{--                    <div class="w-[300px] pl-[32px]">--}}
{{--                        <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">--}}
{{--                            <div class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">--}}
{{--                                <a href="{{ route('reservations.pending') }}" aria-label="Rezervacije" class="flex items-center">--}}
{{--                                    <i class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>--}}
{{--                                    <p class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">--}}
{{--                                        Pending reservations--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>

        <!-- Table -->
        <div class="w-full mt-[10px] ml-2 px-2">
            @yield('table')
        </div>

    </div>

@endsection
