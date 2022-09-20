@extends('layouts.app')
@section('title', __('Show reservation').' - '.$reservation->id)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        @if($reservation->end_time)
            <h1> {{__('Archived reservation')}} </h1>
        @else
            <h1> {{__('Active reservation')}} </h1>
        @endif

        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('checkouts.index') }}">{{ __('Transactions') }}</a> >
        @if($reservation->end_time)
            <a href="{{ route('reservations.archived') }}">{{ __('Archived reservations') }}</a> >
        @else
            <a href="{{ route('reservations.active') }}">{{ __('Active reservations') }}</a> >
        @endif
        <a href="{{ route('reservations.show', $reservation) }}">{{ $reservation->id }}</a>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-start">
                    <div class="">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{__('Book')}}</span>
                            <a href="{{ route('books.show', $reservation->book) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->book->title }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">{{__('Reservation librarian')}}</span>
                            <a href="{{ route('librarians.show', $reservation->librarian) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->librarian->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">{{__('Student')}}</span>
                            <a href="{{ route('students.show', $reservation->student) }}">
                                <p class="font-medium text-[#2196f3]">{{ $reservation->student->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">{{__('Date of reservation')}}</span>
                            <p class="font-medium">{{ format_date($reservation->start_time) }}</p>
                        </div>
                    </div>

                    <div class="ml-[50px]">
                        @if($reservation->end_time)
                            <div class="mt-[20px]">
                                <span class="text-gray-500 text-[14px]">{{__('Reservation end date')}}</span>
                                <p class="font-medium">{{ format_date($reservation->end_time) }}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500 text-[14px]">{{__('Reservation end reason')}}</span>
                                <p class="font-medium">{{ __($reservation->end_reason->value) }}</p>
                            </div>
                        @else
                            <div class="mt-[20px]">
                                <span class="text-gray-500 text-[14px]">{{__('Reservation due')}}</span>
                                <p class="font-medium">{{ format_date($reservation->supposed_end_time) }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
