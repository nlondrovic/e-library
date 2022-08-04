@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>Reserve: <i>{{ $book->title }}</i></h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">

            @include('components.error-check')

            <form action="{{ route('reservations.store', ['book_id' => $book->id]) }}" method="post">
                    @csrf
                    @method('post')
                    <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                        <div class="mt-[20px]">
                            <h3>Reserve book</h3>
                        </div>
                        <div class="flex flex-row justify-start">

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

                            {{-- Reserve date/time --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Reserve date<span class="text-red-500">*</span></p>
                                <input required type="date" id="start_time" name="start_time" min="{{ \Carbon\Carbon::tomorrow()->parse()->format('Y-m-d') }}" max="{{\Carbon\Carbon::now()->addMonth()->format('Y-m-d') }}" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]"/>
                                @if($errors->first('start_time'))
                                    <span class="text-red-600">{{ $errors->first('start_time') }}</span>
                                @endif
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

        </div>

        <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf]">
            @include('components.book-copies')
        </div>


    </div>

@endsection
