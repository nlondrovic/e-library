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
                            <a href="{{ route('books.show', $reservation->book) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->book->title }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Reservation librarian</span>
                            <a href="{{ route('librarians.show', $reservation->librarian) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->librarian->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Reservation student</span>
                            <a href="{{ route('students.show', $reservation->student) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->student->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Time of reservation</span>
                            <p class="font-medium">{{ format_date($reservation->start_time) }}</p>
                        </div>
                    </div>

                    <div class="ml-[50px]">
                        @if($reservation->end_time)
                            <div class="mt-[40px]">
                                <span class="text-gray-500 text-[14px]">Reservation end time</span>
                                <p class="font-medium">{{ format_date($reservation->end_time) }}</p>
                            </div>
                            <div class="mt-[40px] mb-[20px]">
                                <span class="text-gray-500 text-[14px] font-medium">End reason</span>
                                <p class="font-medium">{{ $reservation->end_reason->value }}</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection