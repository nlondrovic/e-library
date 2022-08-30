@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[60px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
                {{ __('New author') }}
            </h1>
        </div>
    </div>

    <!-- Space for content -->
    <div class="pl-[30px] scroll height-content section-content">

        <form class="text-gray-700 forma" method="post" action="{{ route('authors.store') }}"
              enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">
                    <div class="mt-[20px]">
                        <span>{{ __('Name') }} <span class="text-red-500">*</span></span>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a name') }}" value="{{ old('name') }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="mt-[20px]">
                        <span>{{ __('About') }} <span class="text-red-500">*</span></span>
                        <textarea required name="about" rows="8" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                        shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                        placeholder="{{ __('Enter a short biography') }}">{{ old('about') }}</textarea>
                        @if($errors->first('about'))
                            <span class="text-red-600">{{ $errors->first('about') }}</span>
                        @endif
                    </div>

                </div>

                <div class="mt-[20px]">
                    <p class="py-2 mt-2 leading-normal">{{ __('Add photo') }}</p>
                    <input type="file" name="picture" accept="image/*"
                           onchange="loadFileStudent(event)"/>
                    <img id="image-output-student" width="360" class="mt-[20px]"/>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5
                                px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection
