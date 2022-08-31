@extends('layouts.app')
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pt-[1px]">
                <div class="py-[7px] flex flex-row">
                    <div class="pl-[50px] pb-[14px] flex flex-col">
                        <h1>{{__('Check out')}}: <i>{{ $book->title }}</i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            @include('components.error-check')
            <form action="{{ route('checkouts.store', ['book_id' => $book->id]) }}" method="post">
                @csrf
                @method('post')
                <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                    <div class="mt-[20px]">
                        <h3>{{__('Check out this book')}}</h3>
                    </div>
                    <div class="flex flex-row justify-start">
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
                            @if($errors->first('student_id'))
                                <span class="text-red-600">{{ $errors->first('student_id') }}</span>
                            @endif
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

                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-white text-right py-[7px] px-5 px-[50px] mr-[100px]">
                            <button type="reset" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
                                text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                {{__('Cancel')}} <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button type="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50
                                    focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                                    hover:bg-[#46A149] bg-[#4CAF50]">
                                {{__('Save')}} <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-[50%] mb-[100px]">
            <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[75px]">
                @include('components.book-copies')
            </div>
        </div>
    </div>

@endsection
