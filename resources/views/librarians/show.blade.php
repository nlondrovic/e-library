@extends('layouts.app')
@section('title', __('Show librarian').' - '.$librarian->name)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $librarian->name }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('librarians.index') }}">{{ __('Librarians') }}</a> >
                <a href="{{ route('librarians.show', $librarian) }}">{{ $librarian->name }}</a>
            </div>

            <div class="pt-[24px] mr-[30px]">
                <a href="{{ route('checkouts.index', ['librarian_ids[]' => $librarian->id]) }}"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-exchange-alt mr-[5px]"></i>
                    <span> {{ __('Transactions') }} </span>
                </a>
                <a href="{{ route('librarians.edit', $librarian) }}" tabindex="0"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-edit mr-[5px]"></i>
                    <span> {{ __('Edit librarian') }} </span>
                </a>
                <form action="{{ route('librarians.destroy', $librarian) }}" method="post"
                      class="inline hover:text-blue-600">
                    @csrf
                    @method('delete')
                    <p tabindex="0" class="inline w-full text-sm leading-5 text-left
                                text-gray-700 outline-none hover:text-blue-600">
                        <i class="fa fa-trash mr-[5px]"></i>
                        <button type="submit"> {{__('Delete librarian')}} </button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto scroll h-full pb-[30px]">
        <div class="w-[100%] pl-[50px] mt-[20px]">
            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">{{ __('Name and surname') }}</span>
                        <p class="font-medium">{{ $librarian->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('User type') }}</span>
                        <p class="font-medium">{{ $librarian->role->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('JMBG') }}</span>
                        <p class="font-medium">{{ $librarian->jmbg }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('Email') }}</span>
                        <p class="font-medium">{{ $librarian->email }}</p>
                    </div>
                </div>
                <div class="ml-[100px] mt-[20px]">
                    <img class="rounded-full border-2 border-blue-600 p-2" width="300px"
                         src="{{ asset($librarian->picture) }}" alt="{{ __('Librarian image') }}">
                </div>
            </div>
        </div>
            <div class="min-w-[25%] border-l-[1px] h-screen border-[#e4dfdf] ">
                @include('components.book-recent-activity')
            </div>
        </div>

@endsection
