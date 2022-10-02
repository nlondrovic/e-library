@extends('layouts.app')
@section('title', __('Edit genre').' - '.$genre->name)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Edit genre')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('policy.index') }}">{{ __('Settings') }}</a> >
        <a href="{{ route('genres.index') }}">{{ __('Genres') }}</a> >
        <a href="{{ route('genres.edit', $genre) }}">{{ $genre->name }}</a> >
        <a href="{{ route('genres.edit', $genre) }}">{{ __('Edit') }}</a>
    </div>

    <div class="scroll height-content section-content pl-[32px]">
        <form class="text-gray-700 forma"
              action="{{ route('genres.update', $genre->id) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <div class="mt-[20px]">
                        <p>{{ __('Genre') }} <span class="text-red-500">*</span></p>
                        <input type="text" name="name" required id="genreNameEdit"
                               value="{{ $genre->name }}"
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                                   shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a genre name') }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        @include('components.confirm-reset-buttons')
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
