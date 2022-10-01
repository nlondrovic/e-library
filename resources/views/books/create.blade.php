@extends('layouts.app')
@section('title', __('New book'))
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('New book')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('books.index') }}">{{ __('Books') }}</a> >
        <a href="{{ route('books.create') }}">{{ __('New book') }}</a>
    </div>

    <div class="scroll height-content pb-[30px] section-content">
        <form class="text-gray-700 forma" method="post" action="{{ route('books.store') }}"
              enctype="multipart/form-data" id="not_filter_form">
            @csrf
            @method('post')
            <div class="flex flex-row overflow-auto">
                <div class="pl-[50px] w-[100%] mt-[20px] pb-2">
                    <div class="grid grid-cols-3">
                        <div class="row-1">
                            {{-- Title --}}
                            <div class="mt-[20px]">
                                <p>{{__('Title')}} <span class="text-red-500">*</span></p>
                                <input required type="text" name="title" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('title') }}"
                                       placeholder="{{__('Enter a title of the book')}}"/>
                                <p></p>
                                @if($errors->first('title'))
                                    <p class="text-red-600">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            {{-- Author --}}
                            <div class="mt-[20px]">
                                <p>{{__('Author')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="author_id">
                                    <option value="0">{{__('Choose an author')}}</option>
                                    @foreach ($authors as $author)
                                        <option
                                            @if($author->id == old('author_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $author->id }}">
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('author_id'))
                                    <p class="text-red-600">{{ $errors->first('author_id') }}</p>
                                @endif
                            </div>
                            {{-- Content --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Content') }} <span class="text-red-500">*</span></p>
                                <textarea required name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" rows="8"
                                          placeholder="{{ __('Enter a short description about the book (min. 20 characters)') }}">{{ old('content') }}</textarea>
                                @if($errors->first('content'))
                                    <p class="text-red-600">{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                            {{-- Category --}}
                            <div class="mt-[20px]">
                                <p>{{__('Category')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="category_id">
                                    <option value="0">{{__('Choose a category')}}</option>
                                    @foreach ($categories as $category)
                                        <option
                                            @if($category->id == old('category_id'))
                                                {{__('selected')}}
                                            @endif
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
                                <p>{{__('Genre')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="genre_id">
                                    <option value="0">{{__('Choose a genre')}}</option>
                                    @foreach ($genres as $genre)
                                        <option
                                            @if($genre->id == old('genre_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre_id'))
                                    <p class="text-red-600">{{ $errors->first('genre_id') }}</p>
                                @endif
                            </div>
                            {{-- Binding --}}
                            <div class="mt-[20px]">
                                <p>{{__('Binding')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="binding_id">
                                    <option value="0">{{__('Choose a binding')}}</option>
                                    @foreach ($bindings as $binding)
                                        <option
                                            @if($binding == old('binding_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $binding->id }}">
                                            {{ $binding->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('binding_id'))
                                    <p class="text-red-600">{{ $errors->first('binding_id') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-2">
                            {{-- Publish date --}}
                            <div class="mt-[20px]">
                                <p>{{__('Date of publishing')}} <span class="text-red-500">*</span></p>
                                <input required type="date" name="publish_date" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('publish_date') }}"/>
                                @if($errors->first('publish_date'))
                                    <p class="text-red-600">{{ $errors->first('publish_date') }}</p>
                                @endif
                            </div>
                            {{-- Publisher --}}
                            <div class="mt-[20px]">
                                <p>{{__('Publisher')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="publisher_id">
                                    <option value="0">{{__('Choose a publisher')}}</option>
                                    @foreach ($publishers as $publisher)
                                        <option
                                            @if($publisher->id == old('publisher_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $publisher->id }}">
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('publisher_id'))
                                    <p class="text-red-600">{{ $errors->first('publisher_id') }}</p>
                                @endif
                            </div>
                            {{-- ISBN --}}
                            <div class="mt-[20px]">
                                <p>{{__('ISBN')}} <span class="text-red-500">*</span></p>
                                <input required type="text" name="isbn" class="flex flex-row w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('isbn') }}"
                                       placeholder="{{__('Enter a 13-digit ISBN')}}"/>
                                @if($errors->first('isbn'))
                                    <p class="text-red-600">{{ $errors->first('isbn') }}</p>
                                @endif
                            </div>
                            {{-- Number of pages --}}
                            <div class="mt-[20px]">
                                <p>{{__('Number of pages')}} <span class="text-red-500">*</span></p>
                                <input required type="number" name="page_count" class="flex flex-row w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('page_count') }}"
                                       placeholder="{{__('Enter a number of pages')}}"/>
                                @if($errors->first('page_count'))
                                    <p class="text-red-600">{{ $errors->first('page_count') }}</p>
                                @endif
                            </div>
                            {{-- Total book count --}}
                            <div class="mt-[20px]">
                                <p>{{__('Number of copies')}} <span class="text-red-500">*</span></p>
                                <input required type="number" name="total_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ old('total_count') }}"
                                       placeholder="{{__('Enter a number of copies')}}"/>
                                @if($errors->first('total_count'))
                                    <p class="text-red-600">{{ $errors->first('total_count') }}</p>
                                @endif
                            </div>
                            {{-- Script --}}
                            <div class="mt-[20px]">
                                <p>{{__('Script')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="script_id">
                                    <option value="0">{{__('Choose a script')}}</option>
                                    @foreach ($scripts as $script)
                                        <option
                                            @if($script->id == old('script_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $script->id }}">
                                            {{ $script->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('script_id'))
                                    <p class="text-red-600">{{ $errors->first('script_id') }}</p>
                                @endif
                            </div>
                            {{-- Size --}}
                            <div class="mt-[20px]">
                                <p>{{__('Size')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="size_id">
                                    <option value="0">{{__('Choose a size')}}</option>
                                    @foreach ($sizes as $size)
                                        <option
                                            @if($size->id == old('size_id'))
                                                {{__('selected')}}
                                            @endif
                                            value="{{ $size->id }}">
                                            {{ $size->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('size_id'))
                                    <p class="text-red-600">{{ $errors->first('size_id') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-3">
                            {{-- Picure --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Add a photo') }}</p>
                                <input type="file" name="picture" accept="image/*"
                                       onchange="loadFileBook(event)"/>
                                <img id="image-output-book" width="360" class="mt-[20px] p-2 border-2 border-gray-300"
                                     alt="{{ __('Book image') }}" src="{{ asset(\App\Models\Book::DEFAULT_BOOK_PICTURE_PATH) }}"/>
                            </div>
                        </div>

                        <div class="absolute bottom-0 right-0">
                            <div class="flex flex-row">
                                <div class="inline-block w-full text-white text-right py-[7px] px-5 mr-[50px]">
                                    <button type="reset" onclick="return confirm('{{ __('Are you sure you want to cancel? The changes you made won\'t be saved.') }}"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
                                    text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                    <button type="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50
                                        focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                                        hover:bg-[#46A149] bg-[#4CAF50]">
                                        {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
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
