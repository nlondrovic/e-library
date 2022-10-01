@extends('layouts.app')
@section('title', __('Student').' - '.$student->name)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $student->name }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('students.index') }}">{{ __('Students') }}</a> >
                <a href="{{ route('students.show', $student) }}">{{ $student->name }}</a>
            </div>

            <div class="pt-[24px] mr-[30px]">
                <a href="{{ route('checkouts.index', ['student_ids[]' => $student]) }}"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-exchange-alt mr-[5px]"></i>
                    <span> {{ __('Transactions') }} </span>
                </a>
                <a href="{{ route('students.edit', $student) }}" tabindex="0"
                   class="inline hover:text-blue-600 mr-[14px]">
                    <i class="fas fa-edit mr-[5px]"></i>
                    <span> {{ __('Edit student') }} </span>
                </a>
                <form action="{{ route('students.destroy', $student) }}" method="post"
                      class="inline hover:text-blue-600">
                    @csrf
                    @method('delete')
                    <p tabindex="0" class="inline w-full text-sm leading-5 text-left
                                text-gray-700 outline-none hover:text-blue-600">
                        <i class="fa fa-trash mr-[5px] text-red-500"></i>
                        <button type="submit" class="text-red-500 btn-animation"> {{__('Delete student')}} </button>
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
                        <span class="text-gray-500">{{ __('Name and surname') }}</span>
                        <p class="font-medium">{{ $student->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('User type') }}</span>
                        <p class="font-medium">{{ $student->role->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('JMBG') }}</span>
                        <p class="font-medium">{{ $student->jmbg }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{ __('Email') }}</span>
                        <p class="font-medium">{{ $student->email }}</p>
                    </div>
                </div>
                <div class="ml-[100px] mt-[20px]">
                    <img class="p-2 border-2 border-gray-300" width="360px"
                         src="{{ asset($student->picture) }}" alt="{{ __('Student image') }}"
                         onerror="this.onerror=null; this.src='{{ \App\Models\User::DEFAULT_USER_PICTURE_PATH }}'">
                </div>
            </div>
        </div>

        <div class="min-w-[25%] border-l-[1px] border-[#e4dfdf]">
            @include('components.user-recent-activity')
        </div>
    </div>

@endsection
