@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] py-[2px] pb-[27px] flex flex-col">
                <h1>Create a book</h1>
            </div>
        </div>
    </div>

    <!-- Space for content -->
    <div class="scroll height-content pb-[30px] section-content">
        <form class="text-gray-700 forma" method="post" action="{{ route('books.store') }}"
              enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="flex flex-row overflow-auto height-osnovniDetalji">
                <div class="pl-[30px] pl-[50px] w-[100%] mt-[20px]">
                    <div class="grid grid-cols-3">

                        <div class="row-1">
                            {{-- Title --}}
                            <div class="mt-[20px]">
                                <p>Book title<span class="text-red-500">*</span></p>
                                <input required type="text" name="title" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('title') }}"/>
                                @if($errors->first('title'))
                                    <span class="text-red-600">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            {{-- Author --}}
                            <div class="mt-[20px]">
                                <p>Choose an author <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="author_id">
                                    @foreach ($authors as $author)
                                        <option
                                            @if($author->id == old('author_id')) selected @endif
                                        value="{{ $author->id }}">
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('author_id'))
                                    <span class="text-red-600">{{ $errors->first('author_id') }}</span>
                                @endif
                            </div>
                            {{-- Category --}}
                            <div class="mt-[20px]">
                                <p>Choose a category <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="category_id">
                                    @foreach ($categories as $category)
                                        <option
                                            @if($category->id == old('category_id')) selected @endif
                                        value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('category_id'))
                                    <span class="text-red-600">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            {{-- Genre --}}
                            <div class="mt-[20px]">
                                <p>Choose a genre <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="genre_id">
                                    @foreach ($genres as $genre)
                                        <option
                                            @if($genre->id == old('genre_id')) selected @endif
                                        value="{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre_id'))
                                    <span class="text-red-600">{{ $errors->first('genre_id') }}</span>
                                @endif
                            </div>
                            {{-- Publisher --}}
                            <div class="mt-[20px]">
                                <p>Choose a publisher <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="publisher_id">
                                    @foreach ($publishers as $publisher)
                                        <option
                                            @if($publisher->id == old('publisher_id')) selected @endif
                                        value="{{ $publisher->id }}">
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('publisher_id'))
                                    <span class="text-red-600">{{ $errors->first('publisher_id') }}</span>
                                @endif
                            </div>
                            {{-- Publish date --}}
                            <div class="mt-[20px]">
                                <p>Date of publishing<span class="text-red-500">*</span></p>
                                <input required type="date" name="publish_date" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('publish_date') }}"/>
                                @if($errors->first('publish_date'))
                                    <span class="text-red-600">{{ $errors->first('publish_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row-2">
                            {{-- ISBN --}}
                            <div class="mt-[20px]">
                                <p>Book ISBN<span class="text-red-500">*</span></p>
                                <input required type="number" name="isbn" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('isbn') }}"/>
                                @if($errors->first('isbn'))
                                    <span class="text-red-600">{{ $errors->first('isbn') }}</span>
                                @endif
                            </div>
                            {{-- Number of pages --}}
                            <div class="mt-[20px]">
                                <p>Number of pages <span class="text-red-500">*</span></p>
                                <input required type="number" name="page_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('page_count') }}"/>
                                @if($errors->first('page_count'))
                                    <span class="text-red-600">{{ $errors->first('page_count') }}</span>
                                @endif
                            </div>
                            {{-- Script --}}
                            <div class="mt-[20px]">
                                <p>Choose a script <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="script_id">
                                    @foreach ($scripts as $script)
                                        <option
                                            @if($script->id == old('script_id')) selected @endif
                                        value="{{ $script->id }}">
                                            {{ $script->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('script_id'))
                                    <span class="text-red-600">{{ $errors->first('script_id') }}</span>
                                @endif
                            </div>
                            {{-- Binding --}}
                            <div class="mt-[20px]">
                                <p>Choose a binding <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="binding_id">
                                    @foreach ($bindings as $binding)
                                        <option
                                            @if($binding == old('binding_id')) selected @endif
                                        value="{{ $binding->id }}">
                                            {{ $binding->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('binding_id'))
                                    <span class="text-red-600">{{ $errors->first('binding_id') }}</span>
                                @endif
                            </div>
                            {{-- Size --}}
                            <div class="mt-[20px]">
                                <p>Choose a size <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="size_id">
                                    @foreach ($sizes as $size)
                                        <option
                                            @if($size->id == old('size_id')) selected @endif
                                        value="{{ $size->id }}">
                                            {{ $size->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('size_id'))
                                    <span class="text-red-600">{{ $errors->first('size_id') }}</span>
                                @endif
                            </div>
                            {{-- Content --}}
                            <div class="mt-[20px]">
                                <p>Content<span class="text-red-500">*</span></p>
                                <textarea required name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" rows="8">{{ old('content') }}</textarea>
                                @if($errors->first('content'))
                                    <span class="text-red-600">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row-3">
                            {{-- Total book count --}}
                            <div class="mt-[20px]">
                                <p>Total number of books <span class="text-red-500">*</span></p>
                                <input required type="number" name="total_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('total_count') }}"/>
                                @if($errors->first('total_count'))
                                    <span class="text-red-600">{{ $errors->first('total_count') }}</span>
                                @endif
                            </div>
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
                </div>
            </div>
        </form>
    </div>


@endsection
