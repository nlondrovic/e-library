@extends('layouts.app')
@section('title', __('Author').' - '.$author->name)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $author->name }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('authors.index') }}">{{ __('Authors') }}</a> >
                <a href="{{ route('authors.show', $author) }}">{{ $author->name }}</a>
            </div>

            <div class="pt-[24px] mr-[30px]">
                <a href="{{ route('authors.edit', $author) }}" tabindex="0"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-edit mr-[5px]"></i>
                    <span> {{ __('Edit author') }} </span>
                </a>
                <form action="{{ route('authors.destroy', $author) }}" method="post"
                      class="inline hover:text-blue-600">
                    @csrf
                    @method('delete')
                    <p tabindex="0" class="inline w-full text-sm leading-5 text-left
                                text-gray-700 outline-none hover:text-blue-600">
                        <i class="fa fa-trash mr-[5px] text-red-500"></i>
                        <button type="submit" class="text-red-500 btn-animation" > {{__('Delete author')}} </button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class="height-ucenikProfile pb-[30px] pl-[50px] mt-[20px] flex flex-row">

        <div class="mr-[30px]">
            <div class="mt-[20px]">
                <span class="text-gray-500">{{ __('Name') }}</span>
                <p class="font-medium">{{ $author->name }}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500">{{ __('About author') }}</span>
                <p class="font-medium max-w-[550px]">
                    {{ $author->about }}
                </p>
            </div>
        </div>

        <div class="ml-[100px] mt-[20px]">
            <img class="p-2 border-2 border-gray-300" width="360" alt="{{ __('Author image') }}"
                 src="{{asset( $author->picture) }}"
                 onerror="this.onerror=null; this.src='{{ \App\Models\User::DEFAULT_USER_PICTURE_PATH }}'">
        </div>

    </div>

@endsection
