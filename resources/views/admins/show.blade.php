@extends('layouts.app')
@section('title', __('Show admin').' - '.$admin->name)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $admin->name }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('admins.index') }}">{{ __('Admins') }}</a> >
                <a href="{{ route('admins.show', $admin) }}">{{ $admin->name }}</a>
            </div>

            <div class="pt-[24px] mr-[30px]">
                <a href="{{ route('admins.edit', $admin) }}" tabindex="0"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-edit mr-[5px]"></i>
                    <span> {{ __('Edit admin') }} </span>
                </a>
                <form action="{{ route('admins.destroy', $admin) }}" method="post"
                      class="inline hover:text-blue-600">
                    @csrf
                    @method('delete')
                    <p tabindex="0" class="inline w-full text-sm leading-5 text-left
                                text-gray-700 outline-none hover:text-blue-600">
                        <i class="fa fa-trash mr-[5px]"></i>
                        <button type="submit"> {{__('Delete admin')}} </button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji scroll">
        <div class="w-[100%] pl-[50px] section- mt-[20px]">
            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">{{__('Name and surname')}}</span>
                        <p class="font-medium">{{ $admin->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('User type')}}</span>
                        <p class="font-medium">{{ $admin->role->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('JMBG')}}</span>
                        <p class="font-medium">{{ $admin->jmbg }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Email')}}</span>
                        <p class="font-medium">{{ $admin->email }}</p>
                    </div>
                </div>
                <div class="ml-[100px] mt-[20px]">
                    <img class="p-2 border-2 border-gray-300" width="300px"
                         src="{{ asset($admin->picture) }}" alt="{{ __('Admin image') }}">
                </div>
            </div>
        </div>

        <div class="min-w-[25%] border-l-[1px] border-[#e4dfdf]">
            @include('components.user-recent-activity')
        </div>
    </div>

@endsection
