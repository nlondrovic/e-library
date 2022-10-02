@extends('layouts.app')
@section('title', __('Reserve').' - '.$book->title)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Reserve')}} : {{ $book->title }}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('books.index') }}">{{ __('Books') }}</a> >
        <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a> >
        <a href="{{ route('reservations.create', $book) }}">{{ __('Reserve') }}</a>
    </div>

    <div class="flex flex-row justify-between">
        <div class="w-[80%]">
            @include('components.error-check')
            <div class="flex flex-row justify-between w-[100%]">
                <form action="{{ route('reservations.store', ['book_id' => $book->id]) }}" method="post">
                    @csrf
                    @method('post')
                    <div class="pl-[50px] pr-[30px] pb-[30px]">
                        <div class="flex flex-col justify-start">
                            {{-- Student --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>{{__('Choose a student')}} <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select"
                                        name="student_id">
                                    <option value="">None</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Reserve date/time --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>{{__('Reserve date')}}<span class="text-red-500">*</span></p>
                                <input required type="date" id="start_time" name="start_time"
                                       min="{{ $min_date }}" max="{{ $max_date }}" value="{{ $min_date }}"
                                       class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                                       shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row bottom-50 pl-[50px] ml-[2px] w-full text-white text-right">
                        @include('components.confirm-reset-buttons')
                    </div>
                </form>

                <div class="mb-[100px]">
                    <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[20px]">
                        @include('components.book-copies')
                    </div>
                </div>
            </div>
        </div>

        <div class="mr-[50px] ml-[50px]">
            <img class="p-2 border-2 border-gray-300 mt-[20px]" width="660"
                 src="{{ asset($book->picture) }}" alt="{{ __('Book image') }}"
                 onerror="this.onerror=null; this.src='{{ \App\Models\Book::DEFAULT_BOOK_PICTURE_PATH }}'">
        </div>

        <div class="min-w-[20%] max-w-[25%] border-l-[1px] h-100 border-[#e4dfdf]">
            @include('components.book-recent-activity')
        </div>

    </div>

@endsection
