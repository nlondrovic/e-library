@extends('layouts.app')
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Edit book')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('books.index') }}">{{ __('Books') }}</a> >
        <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a> >
        <a href="{{ route('books.create') }}">{{ __('Edit') }}</a>
    </div>

    <div class="scroll height-content pb-[30px] section-content">
        <form class="text-gray-700 forma" method="post" action="{{ route('books.update', $book) }}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row overflow-auto height-osnovniDetalji">
                <div class="pl-[30px] pl-[50px] w-[100%] mt-[20px]">
                    <div class="grid grid-cols-3">
                        <div class="row-1">
                            {{-- Title --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Title') }} <span class="text-red-500">*</span></p>
                                <input required type="text" name="title" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]"
                                       placeholder="{{__('Enter a title of the book')}}"
                                       value="{{ $book->title }}"/>
                                @if($errors->first('title'))
                                    <p class="text-red-600">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            {{-- Author --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Author') }} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="author_id">
                                    @foreach ($authors as $author)
                                        <option
                                            @if($author->id == $book->author_id) selected @endif
                                        value="{{ $author->id }}">
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('author'))
                                    <p class="text-red-600">{{ $errors->first('author') }}</p>
                                @endif
                            </div>
                            {{-- Content --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Content') }} <span class="text-red-500">*</span></p>
                                <textarea required name="content" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                                border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2
                                focus:ring-[#576cdf]" rows="8"
                                          placeholder="{{ __('Enter a short description about the book (min. 20 characters)') }}">{{ $book->content }}</textarea>
                                @if($errors->first('content'))
                                    <p class="text-red-600">{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                            {{-- ISBN --}}
                            <div class="mt-[20px]">
                                <p>{{ __('ISBN') }} <span class="text-red-500">*</span></p>
                                <input class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" name="isbn"
                                       placeholder="{{__('Enter an ISBN')}}" required
                                       type="text" value="{{ $book->isbn }}"/>
                                @if($errors->first('isbn'))
                                    <p class="text-red-600">{{ $errors->first('isbn') }}</p>
                                @endif
                            </div>
                            {{-- Number of pages --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Number of pages') }} <span class="text-red-500">*</span></p>
                                <input required type="number" name="page_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]"
                                       placeholder="{{__('Enter a number of pages')}}" value="{{ $book->page_count }}"/>
                                @if($errors->first('page_count'))
                                    <p class="text-red-600">{{ $errors->first('page_count') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-2">
                            {{-- Publish date --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Date of publishing') }} <span class="text-red-500">*</span></p>
                                <input required type="date" name="publish_date" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ $book->publish_date }}"/>
                                @if($errors->first('publish_date'))
                                    <p class="text-red-600">{{ $errors->first('publish_date') }}</p>
                                @endif
                            </div>
                            {{-- Publisher --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Publisher') }} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="publisher_id">
                                    @foreach ($publishers as $publisher)
                                        <option
                                            @if($publisher == $book->publisher) selected @endif
                                        value="{{ $publisher->id }}">
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre'))
                                    <p class="text-red-600">{{ $errors->first('genre') }}</p>
                                @endif
                            </div>
                            {{-- Category --}}
                            <div class="mt-[20px]">
                                <p>{{__('Category')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="category_id">
                                    @foreach ($categories as $category)
                                        <option
                                            @if($category == $book->category) selected @endif
                                        value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('category'))
                                    <p class="text-red-600">{{ $errors->first('category') }}</p>
                                @endif
                            </div>
                            {{-- Genre --}}
                            <div class="mt-[20px]">
                                <p>{{__('Genre')}} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="genre_id">
                                    @foreach ($genres as $genre)
                                        <option
                                            @if($genre == $book->genre) selected @endif
                                        value="{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre'))
                                    <p class="text-red-600">{{ $errors->first('genre') }}</p>
                                @endif
                            </div>
                            {{-- Script --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Choose a script') }} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="script_id">
                                    @foreach ($scripts as $script)
                                        <option
                                            @if($script == $book->script) selected @endif
                                        value="{{ $script->id }}">
                                            {{ $script->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('script'))
                                    <p class="text-red-600">{{ $errors->first('script') }}</p>
                                @endif
                            </div>
                            {{-- Binding --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Binding') }} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="binding_id">
                                    @foreach ($bindings as $binding)
                                        <option
                                            @if($binding == $book->binding) selected @endif
                                        value="{{ $binding->id }}">
                                            {{ $binding->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('genre'))
                                    <p class="text-red-600">{{ $errors->first('genre') }}</p>
                                @endif
                            </div>
                            {{-- Size --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Size') }} <span class="text-red-500">*</span></p>
                                <select required class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="size_id">
                                    @foreach ($sizes as $size)
                                        <option
                                            @if($size == $book->size) selected @endif
                                        value="{{ $size->id }}">
                                            {{ $size->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('size'))
                                    <p class="text-red-600">{{ $errors->first('size') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row-3">
                            {{-- Total book count --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Total number of books') }} <span class="text-red-500">*</span></p>
                                <input required type="number" name="total_count" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]" value="{{ $book->total_count }}"
                                       placeholder="{{ __('Enter a number of book copies') }}"/>
                                @if($errors->first('total_count'))
                                    <p class="text-red-600">{{ $errors->first('total_count') }}</p>
                                @endif
                            </div>
                            {{-- Picture --}}
                            <div class="mt-[20px]">
                                <p>{{ __('Add photo') }}</p>
                                <input type="file" name="picture" accept="image/*"
                                       onchange="loadFileStudent(event)"/>
                                <img id="image-output-student" width="360" class="mt-[20px]"
                                     src="{{ asset($book->picture) }}" alt="Book image"/>
                            </div>
                        </div>

                        <div class="absolute bottom-0 right-0">
                            <div class="flex flex-row">
                                <div class="inline-block w-full text-white text-right py-[7px] px-5 mr-[50px]">
                                    <button type="reset" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
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
