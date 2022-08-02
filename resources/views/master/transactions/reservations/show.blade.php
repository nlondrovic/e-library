@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>{{ $reservation->book->title }}</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            <!-- Space for content -->
            <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-start">

                    <div class="">
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Book</span>
                            <p class="font-medium">{{ $reservation->book->title }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Reservation librarian</span>
                            <p class="font-medium">{{ $reservation->librarian->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Reservation student</span>
                            <p class="font-medium">{{ $reservation->student->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Time of reservation</span>
                            <p class="font-medium">{{ $reservation->start_time }}</p>
                        </div>
                    </div>

                    <div class="ml-[50px]">
                        @if($reservation->end_time)
                            <div class="mt-[40px]">
                                <span class="text-gray-500 text-[14px]">Reservation end time</span>
                                <p class="font-medium">{{ $reservation->end_time }}</p>
                            </div>
                            <div class="mt-[40px] mb-[20px]">
                                <span class="text-gray-500 text-[14px]">End reason</span>
                                <div>
                                    @if($reservation->end_reason->id == 1)
                                        <p class="inline-block px-[6px] py-[2px] font-medium bg-red-600 rounded-[10px]">
                                            <span
                                                class="text-xs text-green-800">{{ $reservation->end_reason->value }}</span>
                                        </p>
                                    @elseif($reservation->end_reason->id == 2)
                                        <p class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span
                                                class="text-xs text-red-800">{{ $reservation->end_reason->value }}</span>
                                        </p>
                                    @elseif($reservation->end_reason->id == 3)
                                        <p class="inline-block px-[6px] py-[2px] font-medium bg-green-200 rounded-[10px]">
                                            <span
                                                class="text-xs text-green-800">{{ $reservation->end_reason->value }}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
