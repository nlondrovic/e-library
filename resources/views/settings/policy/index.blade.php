@extends('settings.index')
@section('main-settings')

    <form method="post" action="{{ route('policy.update') }}">
        @csrf
        @method('PATCH')
        <div class="section- mt-[5px]">
            <div class="flex flex-col">
                <div class="flex border-b-[1px] border-[#e4dfdf] pb-[20px]">
                    <div>
                        <h3>{{ __('Holding time') }}</h3>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __("This value defines the time in days, a book can be checked out before being checked in.
                                After this deadline the book will be given a status of \"Overdue\".") }}
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __('Current value') }}: {{ $holding_time }} {{ __('day(s)') }}
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="number" name="holding_time" value="{{ $holding_time }}"
                               class="h-[50px] flex-1 w-full px-4 py-2 mt-[20px] text-sm text-gray-700 placeholder-gray-400
                               bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none
                               focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>
                        <p class="ml-[10px] mt-[35px]">{{ __('day(s)') }}</p>
                    </div>
                </div>
                <div class="pl-[0px] mt-[20px] flex border-b-[1px] border-[#e4dfdf] pb-[20px]">
                    <div>
                        <h3>{{ __('Reservation time') }}</h3>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __("This value defines the time in days, a book can be reserved for a student.
                                After this deadline the reservation will be canceled.") }}
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __('Current value') }}: {{ $reservation_time }} {{ __('day(s)') }}
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="number" name="reservation_time" value="{{ $reservation_time }}"
                               class="h-[50px] flex-1 w-full px-4 py-2 mt-[20px] text-sm text-gray-700 placeholder-gray-400
                               bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none
                               focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>
                        <p class="ml-[10px] mt-[35px]">{{ __('day(s)') }}</p>
                    </div>
                </div>
                <div class="pl-[0px] mt-[20px] flex border-b-[1px] border-[#e4dfdf] pb-[20px]">
                    <div>
                        <h3>
                            {{ __('Books per student') }}
                        </h3>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __("This value defines a limit of books that can be checked out or reserved for a student.") }}
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __('Current value') }}: {{ $books_per_student }} {{ __('book(s)') }}
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="number" name="books_per_student" value="{{ $books_per_student }}"
                               class="h-[50px] flex-1 w-full px-4 py-2 mt-[20px] text-sm text-gray-700 placeholder-gray-400
                               bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none
                               focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>
                        <p class="ml-[10px] mt-[35px]">{{ __('book(s)') }}</p>
                    </div>
                </div>
                <button type="submit"
                        class="btn-animation mt-[10px] text-white shadow-lg w-[150px] disabled:opacity-50
                            focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                            hover:bg-[#46A149] bg-[#4CAF50]">
                    <i class="fas fa-check mr-[7px]"></i> {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>

@endsection
