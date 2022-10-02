@extends('layouts.app')
@section('title', __('Edit author').' - '.$author->name)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Edit author')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('authors.index') }}">{{ __('Authors') }}</a> >
        <a href="{{ route('authors.show', $author) }}">{{ $author->name }}</a> >
        <a href="{{ route('authors.create') }}">{{ __('Edit') }}</a>
    </div>

    <div class="pl-[30px] scroll height-content section-content">
        <form class="text-gray-700 forma" method="post" action="{{ route('authors.update', $author) }}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">
                    <div class="mt-[20px]">
                        <span>{{ __('Name') }} <span class="text-red-500">*</span></span>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a name') }}" value="{{ $author->name }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-[20px]">
                        <p class="inline-block mb-2">{{ __('About author') }}</p>
                        <textarea name="about" rows="8" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                        shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                  placeholder="{{ __('Enter a short biography') }}">{{ $author->about }}</textarea>
                        @if($errors->first('about'))
                            <span class="text-red-600">{{ $errors->first('about') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-[20px]">
                    <p>{{ __('Add a photo') }}</p>
                    <input type="file" name="picture" accept="image/*"
                           onchange="loadFileStudent(event)"/>
                    <img id="image-output-student" class="mt-[20px] p-2 border-2 border-gray-300"
                         width="360" src="{{ asset($author->picture) }}" alt="{{ __('Author image') }}"
                         onerror="this.onerror=null; this.src='{{ \App\Models\User::DEFAULT_USER_PICTURE_PATH }}'"/>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        @include('components.confirm-reset-buttons')
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
