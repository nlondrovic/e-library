@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] py-[2px] pb-[27px] flex flex-col">
                <h1>Edit book</h1>
            </div>
        </div>
    </div>

    <!-- Space for content -->
    <div class="scroll height-content px-[30px] section-content">

        <form class="text-gray-700 forma" method="post" action="{{ route('books.update', $book) }}"
              enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="flex flex-row ml-[30px] mb-[150px]">
                <div class="w-[50%]">

                    <div class="mt-[20px]">
                        <p>Book title<span class="text-red-500">*</span></p>
                        <input required type="text" name="title" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                focus:ring-2 focus:ring-[#576cdf]" value="{{ $book->title }}"/>
                        @if($errors->first('title'))
                            <span class="text-red-600">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="mt-[20px]">
                        <p>Content<span class="text-red-500">*</span></p>
                        <textarea required name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" rows="8">{{ $book->content }}</textarea>
                        @if($errors->first('content'))
                            <span class="text-red-600">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <div class="mt-[20px]">
                        <p>ISBN<span class="text-red-500">*</span></p>
                        <input required type="number" name="isbn" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                 bg-white border border-gray-300 shadow-sm appearance-none
                                 focus:outline-none focus:ring-2 focus:ring-[#576cdf]" value="{{ $book->isbn }}"/>
                        @if($errors->first('isbn'))
                            <span class="text-red-600">{{ $errors->first('isbn') }}</span>
                        @endif
                    </div>
                    <div class="w-[50%]">
                        <div class="mt-[20px]">
                            <p>Choose an author <span class="text-red-500">*</span></p>
                            <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                    name="author_id">
                                @foreach ($authors as $author)
                                    <option
                                        @if($author == $book->author) selected @endif
                                    value="{{ $author->id }}">
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>

                <div class="mt-[50px] w-[50%]">
                    <label class="mt-6 cursor-pointer">
                        <div class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                            <div class="py-4">
                                <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg"
                                     width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span class="px-4 py-2 mt-2 leading-normal">Add photo</span>
                                <input type="file" name="picture" class="hidden" :accept="accept"
                                       onchange="loadFileStudent(event)"/>
                            </div>
                            <img id="image-output-student" class="absolute w-48 h-[188px] bottom-0"
                                 src="{{ $book->picture }}"/>
                        </div>
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-white text-right py-[7px] px-5 px-[50px] mr-[100px]">
                            <button type="button" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
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

            </div>

        </form>

    </div>

@endsection
