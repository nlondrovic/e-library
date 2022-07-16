@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[60px] pt-[7px] flex flex-col">
                <div>
                    <h1>
                        Edit author
                    </h1>
                </div>
                <div>
                    <nav class="w-full rounded">
                        <ol class="flex list-reset">
                            <li>
                                <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                    All authors
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-blue-600">
                                    Edit author
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                    ID-{{ $author->id }}
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Space for content -->
    <div class="pl-[30px] scroll height-content section-content">

        <form class="text-gray-700 forma" method="post" action="{{route('authors.update', $author)}}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">

                    <div class="mt-[20px]">
                        <span>Name<span class="text-red-500">*</span></span>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               value="{{ $author->name }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="mt-[20px]">
                        <p class="inline-block mb-2">About</p>
                        <textarea name="about" rows="8" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                        shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ $author->about }}</textarea>
                        @if($errors->first('about'))
                            <span class="text-red-600">{{ $errors->first('about') }}</span>
                        @endif
                    </div>

                </div>
            </div>

            {{-- Buttons --}}
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5
                                px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Cancel <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            Save <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
