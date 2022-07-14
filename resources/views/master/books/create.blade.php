@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] py-[2px] flex flex-col">
                <div>
                    <h1>
                        New book
                    </h1>
                </div>
                <div>
                    <nav class="w-full rounded">
                        <ol class="flex list-reset">
                            <li>
                                <a href="" class="text-[#2196f3] hover:text-blue-600">
                                    All books
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                    New book
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{--            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">--}}
    {{--                <a href="#" class="inline active-book-nav hover:text-blue-800">--}}
    {{--                    Overview--}}
    {{--                </a>--}}
    {{--                <a href="novaKnjigaSpecifikacija.php" class="inline ml-[70px] hover:text-blue-800 ">--}}
    {{--                    Specifications--}}
    {{--                </a>--}}
    {{--                <a href="novaKnjigaMultimedija.php" class="inline ml-[70px] hover:text-blue-800">--}}
    {{--                    Multimedia--}}
    {{--                </a>--}}
    {{--            </div>--}}

    <!-- Space for content -->
    <div class="scroll height-content px-[30px] section-content">
        <form class="text-gray-700 forma" method="post" action="{{route('books.store')}}"
              enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="flex flex-row ml-[30px] mb-[150px]">
                <div class="w-[50%]">
                    <div class="mt-[20px]">
                        <p>Book title<span class="text-red-500">*</span></p>
                        <input type="text" name="title" id="nazivKnjiga" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>

                    </div>

                    <div class="mt-[20px]">
                        <p class="inline-block mb-2">Content</p>
                        <textarea name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"></textarea>
                    </div>

                    <div class="mt-[20px]">
                        <p>ISBN<span class="text-red-500">*</span></p>
                        <input type="number" name="ISBN" id="ISBN" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                 bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>

                    </div>

                    <div class="w-[50%]">
                        <div class="mt-[20px]">
                            <p>Choose an author <span class="text-red-500">*</span></p>
                            <select class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]" id="autori"
                                    name="author_id">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div
                                class="inline-block w-full text-white text-right py-[7px] px-5 px-[50px] mr-[100px]">

                                <button type="button"
                                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
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
            </div>
        </form>
    </div>
    </div>

@endsection
