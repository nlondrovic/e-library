@extends('layouts.app')
@section('title', __('Edit admin').' - '.$admin->name)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Edit admin')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('admins.index') }}">{{ __('Admins') }}</a> >
        <a href="{{ route('admins.show', $admin) }}">{{ $admin->name }}</a> >
        <a href="{{ route('admins.create') }}">{{ __('Edit') }}</a>
    </div>

    <div class="scroll height-content section-content">
        <form class="text-gray-700 text-[14px] forma"
              action="{{ route('admins.update', $admin) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[50px]">
                <div class="w-[50%] mb-[100px]">
                    <div class="mt-[20px]">
                        <span>{{__('Name and surname')}} <span class="text-red-500">*</span></span>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a name') }}" value="{{ $admin->name }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-[20px]">
                        <span>{{__('JMBG')}} <span class="text-red-500">*</span></span>
                        <input type="number" name="jmbg" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a JMBG') }}" value="{{ $admin->jmbg }}"/>
                        @if($errors->first('jmbg'))
                            <span class="text-red-600">{{ $errors->first('jmbg') }}</span>
                        @endif
                    </div>
                    <div class="mt-[20px]">
                        <span>{{__('Email')}} <span class="text-red-500">*</span></span>
                        <input type="text" name="email" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter an email') }}" value="{{ $admin->email }}"/>
                        @if($errors->first('email'))
                            <span class="text-red-600">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-[20px]">
                    <p class="py-2 mt-2 leading-normal">{{__('Add a photo')}}</p>
                    <input type="file" name="picture" accept="image/*" class="shadow-md w-[360px]"
                           onchange="loadFileStudent(event)"/>
                    <img id="image-output-student" width="360" class="mt-[20px] p-2 border-2 border-gray-300"
                         onerror="this.onerror=null; this.src='{{ \App\Models\User::DEFAULT_USER_PICTURE_PATH }}'"
                         src="{{ getPictureFilePath($admin->picture) }}" alt="{{ __('Admin image') }}"/>
                </div>
            </div>

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

