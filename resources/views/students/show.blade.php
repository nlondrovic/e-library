@extends('layouts.app')
@section('title', __('Show student').' - '.$student->name)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $student->name }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('students.index') }}">{{ __('Students') }}</a> >
                <a href="{{ route('students.show', $student) }}">{{ $student->name }}</a>
            </div>

            <div class="flex flex-row pt-[24px] mr-[30px]">
                <a href="{{ route('checkouts.index', ['student_id' => $student]) }}"
                   class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="fas fa-exchange-alt mr-[3px]"></i>
                    {{ __('Transactions') }}
                </a>
                <p class="inline cursor-pointer text-[25px] pl-[30px] dotsKnjigaOsnovniDetalji hover:text-[#606FC7]">
                    <i class="fas fa-ellipsis-v"></i>
                </p>
                <div class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95
                    -translate-y-2 dropdown-knjiga-osnovni-detalji">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y
                        divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="{{ route('students.edit', $student) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Edit student') }}</span>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="post">
                                @csrf
                                @method('delete')
                                <p tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left
                                            text-gray-700 outline-none hover:text-blue-600">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <button type="submit" class="px-4 py-0">{{ __('Delete student') }}</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="height-ucenikProfile pb-[30px]">
        <div class="pl-[50px] section- mt-[20px]">
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
                    <img class="rounded-full border-2 border-blue-600 p-2" width="300px"
                         src="{{ asset($student->picture) }}" alt="{{ __('Student image') }}">
                </div>
            </div>
        </div>
    </div>

@endsection
