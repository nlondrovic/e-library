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
                                <p>Title <span class="text-red-500">*</span></p>
                                <input required type="text" name="title" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('title') }}"
                                       placeholder="Enter a title of the book"/>
                                <p></p>
                                @if($errors->first('title'))
                                    <p class="text-red-600">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            {{-- Author --}}
                            <div class="mt-[20px]">
                                <p>Author <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="author_id">
                                    <option value="0">Choose an author</option>
                                    @foreach ($authors as $author)
                                        <option
                                            @if($author->id == old('author_id')) selected @endif
                                        value="{{ $author->id }}">
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('author_id'))
                                    <p class="text-red-600">{{ $errors->first('author_id') }}</p>
                                @endif
                            </div>
                            {{-- Category --}}
                            <div class="mt-[20px]">
                                <p>Category <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="category_id">
                                    <option value="0">Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option
                                            @if($category->id == old('category_id')) selected @endif
                                        value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('category_id'))
                                    <p class="text-red-600">{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>
                            {{-- Genre --}}
                            <div class="mt-[20px]">
                                <p>Genre <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="genre_id">
                                    <option value="0">Choose a genre</option>
                                    @foreach ($genres as $genre)
                                        <option
                                            @if($genre->id == old('genre_id')) selected @endif
                                        value="{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre_id'))
                                    <p class="text-red-600">{{ $errors->first('genre_id') }}</p>
                                @endif
                            </div>
                            {{-- Publisher --}}
                            <div class="mt-[20px]">
                                <p>Publisher <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="publisher_id">
                                    <option value="0">Choose a publisher</option>
                                    @foreach ($publishers as $publisher)
                                        <option
                                            @if($publisher->id == old('publisher_id')) selected @endif
                                        value="{{ $publisher->id }}">
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('publisher_id'))
                                    <p class="text-red-600">{{ $errors->first('publisher_id') }}</p>
                                @endif
                            </div>
                            {{-- Publish date --}}
                            <div class="mt-[20px]">
                                <p>Date of publishing <span class="text-red-500">*</span></p>
                                <input required type="date" name="publish_date" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('publish_date') }}"/>
                                @if($errors->first('publish_date'))
                                    <p class="text-red-600">{{ $errors->first('publish_date') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-2">
                            {{-- ISBN --}}
                            <div class="mt-[20px]">
                                <p>ISBN <span class="text-red-500">*</span></p>
                                <input required type="number" name="isbn" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('isbn') }}"
                                       placeholder="Enter a 13-digit ISBN"/>
                                @if($errors->first('isbn'))
                                    <p class="text-red-600">{{ $errors->first('isbn') }}</p>
                                @endif
                            </div>
                            {{-- Number of pages --}}
                            <div class="mt-[20px]">
                                <p>Number of pages <span class="text-red-500">*</span></p>
                                <input required type="number" name="page_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('page_count') }}"
                                    placeholder="Enter a number of pages"/>
                                @if($errors->first('page_count'))
                                    <p class="text-red-600">{{ $errors->first('page_count') }}</p>
                                @endif
                            </div>
                            {{-- Script --}}
                            <div class="mt-[20px]">
                                <p>Script <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="script_id">
                                    <option value="0">Choose a script</option>
                                    @foreach ($scripts as $script)
                                        <option
                                            @if($script->id == old('script_id')) selected @endif
                                        value="{{ $script->id }}">
                                            {{ $script->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('script_id'))
                                    <p class="text-red-600">{{ $errors->first('script_id') }}</p>
                                @endif
                            </div>
                            {{-- Binding --}}
                            <div class="mt-[20px]">
                                <p>Binding <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="binding_id">
                                    <option value="0">Choose a binding</option>
                                    @foreach ($bindings as $binding)
                                        <option
                                            @if($binding == old('binding_id')) selected @endif
                                        value="{{ $binding->id }}">
                                            {{ $binding->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('binding_id'))
                                    <p class="text-red-600">{{ $errors->first('binding_id') }}</p>
                                @endif
                            </div>
                            {{-- Size --}}
                            <div class="mt-[20px]">
                                <p>Size <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="size_id">
                                    <option value="0">Choose a size</option>
                                    @foreach ($sizes as $size)
                                        <option
                                            @if($size->id == old('size_id')) selected @endif
                                        value="{{ $size->id }}">
                                            {{ $size->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('size_id'))
                                    <p class="text-red-600">{{ $errors->first('size_id') }}</p>
                                @endif
                            </div>
                            {{-- Content --}}
                            <div class="mt-[20px]">
                                <p>Content <span class="text-red-500">*</span></p>
                                <textarea required name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" rows="8" placeholder="Enter a short description about the book (min. 20 characters)">{{ old('content') }}</textarea>
                                @if($errors->first('content'))
                                    <p class="text-red-600">{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-3">
                            {{-- Total book count --}}
                            <div class="mt-[20px]">
                                <p>Total number of books <span class="text-red-500">*</span></p>
                                <input required type="number" name="total_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('total_count') }}"
                                       placeholder="Enter a number of book copies"/>
                                @if($errors->first('total_count'))
                                    <p class="text-red-600">{{ $errors->first('total_count') }}</p>
                                @endif
                            </div>
                            <div class="mt-[50px]">
                                <p class="py-2 mt-2 leading-normal">Add photo</p>
                                <input type="file" name="picture" accept="image/*"
                                       onchange="loadFileStudent(event)"/>
                                <img id="image-output-student" width="360" class="mt-[20px]"/>
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
