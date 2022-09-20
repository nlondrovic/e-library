@extends('layouts.app')
@section('title', __('Show checkout').' - '.$checkout->id)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{__('Checkout')}}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('checkouts.index') }}">{{ __('Transactions') }}</a> >
                <a href="{{ route('checkouts.show', $checkout) }}">{{ __('Checkouts') }}</a> >
                <a href="{{ route('checkouts.show', $checkout) }}">{{ $checkout->id }}</a>
            </div>

            <div class="pt-[15px] mr-[30px] grid grid-cols-2">
                @if(!$checkout->end_time)
                    <div class="col">
                        <form action="{{ route('checkIn', $checkout) }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                                <i class="fas fa-redo-alt mr-[3px] "></i>
                                {{__('Check in')}}
                            </button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route('writeOff', $checkout) }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                                <i class="far fa-calendar-check mr-[3px] "></i>
                                {{__('Write off')}}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-start">
                    <div class="">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{__('Book')}}</span>
                            <a href="{{ route('books.show', $checkout->book) }}">
                                <p class="font-medium text-[#2196f3]">{{ $checkout->book->title }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">{{__('Checkout librarian')}}</span>
                            <a href="{{ route('librarians.show', $checkout->checkout_librarian) }}">
                                <p class="font-medium text-[#2196f3]">{{ $checkout->checkout_librarian->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <a href="{{ route('students.show', $checkout->student) }}">
                                <span class="text-gray-500 text-[14px]">{{__('Checkout student')}}</span>
                                <p class="font-medium text-[#2196f3]">{{ $checkout->student->name }}</p>
                            </a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">{{__('Checkout time')}}</span>
                            <p class="font-medium">{{ format_time($checkout->start_time) }}</p>
                        </div>
                    </div>

                    <div class="ml-[50px]">
                        @if($checkout->end_time)
                            @if($checkout->end_reason->id == 2)
                                <div class="mt-[20px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Checkin reason')}}</span>
                                    <p class="font-medium">{{ __($checkout->end_reason->value) }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500 text-[14px]">{{ __('Write-off time') }}</span>
                                    <p class="font-medium">{{ format_time($checkout->end_time) }}</p>
                                </div>
                            @else
                                <div class="mt-[20px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Checkin time')}}</span>
                                    <p class="font-medium">{{ format_time($checkout->end_time) }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Checkin librarian')}}</span>
                                    <a href="{{ route('librarians.show', $checkout->checkin_librarian) }}">
                                        <p class="font-medium text-[#2196f3]">{{ $checkout->checkin_librarian->name }}</p>
                                    </a>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Holding for')}}</span>
                                    <p class="font-medium">{{ $checkout->getHoldingTime() }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Overdue time')}}</span>
                                    <p class="font-medium">{{ $checkout->getOverdueTime() }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500 text-[14px]">{{__('Checkin reason')}}</span>
                                    <p class="font-medium">{{ __($checkout->end_reason->value) }}</p>
                                </div>
                            @endif
                        @else
                            <div class="mt-[20px]">
                                <span class="text-gray-500 text-[14px]">{{__('Holding for')}}</span>
                                <p class="font-medium">{{ $checkout->getHoldingTime() }}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500 text-[14px]">{{__('Overdue time')}}</span>
                                <p class="font-medium">{{ $checkout->getOverdueTime() }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
