@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>Check out: <i>{{ $book->title }}</i></h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            @if($book->total_count - ($book->checkouts_count + $book->reserved_count))
                <form action="{{ route('checkouts.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                        <div class="mt-[20px]">
                            <h3>Check out this book</h3>
                        </div>
                        {{ $errors->first() }}
                        <div class="flex flex-row justify-start">

                            {{-- Book --}}
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            {{-- Librarian --}}
                            <input type="hidden" name="checkout_librarian_id" value="{{ auth()->id() }}">

                            {{-- Student --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Choose a student <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="student_id">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('student_id'))
                                    <span class="text-red-600">{{ $errors->first('student_id') }}</span>
                                @endif
                            </div>

                            {{-- Start date/time --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Checkout date<span class="text-red-500">*</span></p>
                                <input required type="date" id="book_checkout_date" name="start_time" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]"/>
                                @if($errors->first('start_time'))
                                    <span class="text-red-600">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>

                            {{-- End date --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Return date<span class="text-red-500">*</span></p>
                                <input type="date" id="book_return_date" disabled class="flex w-[90%] mt-2 px-2 py-2 text-base text-gray-400
                                bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]"/>
                                <p>Return period: {{ getenv('HOLDING_TIME') }} days</p>
                            </div>

                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] px-5 px-[50px] mr-[100px]">
                                <button type="reset" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
                                    text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Cancel <i class="fas fa-times ml-[4px]"></i>
                                </button>

                                <button type="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50
                                        focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                                        hover:bg-[#46A149] bg-[#4CAF50]">
                                    Save <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="w-[50%] ml-[50px]">
                    <div class="flex items-center px-6 py-4 my-4 text-lg bg-red-200 rounded-lg">
                        <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                            <path fill="currentColor"
                                  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                            </path>
                        </svg>
                        <p class="font-medium text-red-600"> All copies of this book are checked out or reserved. </p>
                    </div>
                </div>
            @endif
        </div>

        <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf]">
            @include('components.book-copies')
        </div>


    </div>

@endsection
