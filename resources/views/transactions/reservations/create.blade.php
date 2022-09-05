@extends('layouts.app')
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pt-[1px]">
                <div class="py-[7px] flex flex-row">
                    <div class="pl-[50px] pb-[14px] flex flex-col">
                        <h1>{{__('Reserve')}}: <i>{{ $book->title }}</i></h1>
                        Home > Books > Stranac > Reserve
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="">
            @include('components.error-check')
            <form action="{{ route('reservations.store', ['book_id' => $book->id]) }}" method="post">
                @csrf
                @method('post')
                <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                    <div class="mt-[20px]">
                        <h3>{{__('Reserve book')}}</h3>
                    </div>
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

                <div class="flex flex-row bottom-50 pl-[50px] ml-[4px] w-full text-white text-right">
                    <button type="reset" class="btn-animation shadow-lg mr-[15px] focus:outline-none
                                text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button type="submit" class="btn-animation shadow-lg disabled:opacity-50
                                    focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                                    hover:bg-[#46A149] bg-[#4CAF50]">
                        {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="w-[50%] mb-[100px]">
            <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[20px]">
                @include('components.book-copies')
            </div>
        </div>
    </div>

@endsection
