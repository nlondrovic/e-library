@extends('settings.index')
@section('title', __('Policy'))
@section('settings-subtitle')
    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
    <a href="{{ route('policy.index') }}">{{ __('Settings') }}</a> >
    <a href="{{ route('policy.index') }}">{{ __('Policy') }}</a>
@endsection
@section('main-settings')

    <form method="post" action="{{ route('policy.update') }}">
        @csrf
        @method('PATCH')
        <div class="section- mt-[5px]">
            <div class="flex flex-col">
                <div class="flex border-b-[1px] border-[#e4dfdf] pb-[20px]">
                    <div>
                        <h3>{{ __('Period for checkouts') }}</h3>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __('This value defines the time in days, a book can be checked out for a student. After this period the checkout will be overdue.') }}
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
                        <h3>{{ __('Period for reservations') }}</h3>
                        <p class="pt-[15px] max-w-[400px]">
                            {{ __('This value defines the time in days, a book can be reserved for a student. In this period a student can check out the book. After this period the reservation will be canceled.') }}
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
                            {{ __("This value defines a number of books that can be checked out or reserved for a student.") }}
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
                        onclick="return confirm('{{ __('Are you sure you want to save the changes?')}} ')"
                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50] text-white mt-[30px]">
                    {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                </button>
            </div>
        </div>
    </form>

@endsection
