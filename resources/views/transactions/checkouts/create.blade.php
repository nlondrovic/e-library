@extends('layouts.app')
@section('title', __('New checkout'))
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Check out')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('books.index') }}">{{ __('Books') }}</a> >
        <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a> >
        <a href="{{ route('checkouts.create', $book) }}">{{ __('Check out') }}</a>
    </div>

    @include('components.error-check')
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="">
            <form action="{{ route('checkouts.store', ['book_id' => $book->id]) }}" method="post">
                @csrf
                @method('post')
                <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                    <div class="mt-[20px]">
                        <h3>{{__('Check out this book')}}</h3>
                    </div>
                    <div class="flex flex-col justify-start">
                        {{-- Student --}}
                        <div class="mt-[20px] w-[268px]">
                            <p>{{__('Choose a student')}} <span class="text-red-500">*</span></p>
                            <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                    shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select"
                                    name="student_id">
                                <option value="">{{ __('None') }}</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Start date/time --}}
                        <div class="mt-[20px] w-[268px]">
                            <p>{{__('Checkout date (today)')}}</p>
                            <input type="date" disabled class="flex w-[90%] mt-2 px-2 py-2 text-base text-gray-400
                                bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" value="{{ date('Y-m-d', time()) }}"/>
                        </div>
                        {{-- End date --}}
                        <div class="mt-[20px] w-[268px]">
                            <p>{{__('Return date')}}</p>
                            <input type="date" disabled class="flex w-[90%] mt-2 px-2 py-2 text-base text-gray-400
                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                            focus:ring-[#576cdf]"
                                   value="{{ $end_date }}"/>
                            <p>{{__('Return period:')}} {{ $holding_time }} {{__('days')}}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row bottom-50 pl-[50px] ml-[2px] w-full text-white text-right">
                    <button type="reset" class="btn-animation shadow-lg mr-[15px] focus:outline-none
                                text-sm py-2.5 px-4 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button type="submit" class="btn-animation shadow-lg disabled:opacity-50
                                    focus:outline-none text-sm py-2.5 px-4 transition duration-300 ease-in rounded-[5px]
                                    hover:bg-[#46A149] bg-[#4CAF50]">
                        {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="w-[50%] mb-[100px] pr-[83%]">
            <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[20px]">
                @include('components.book-copies')
            </div>
        </div>
    </div>

@endsection
