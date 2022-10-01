@extends('layouts.app')
@section('title', __('Edit category').' - '.$category->name)
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Edit category')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('policy.index') }}">{{ __('Settings') }}</a> >
        <a href="{{ route('categories.index') }}">{{ __('Categories') }}</a> >
        <a href="{{ route('categories.edit', $category) }}">{{ $category->name }}</a> >
        <a href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
    </div>

    <div class="scroll height-content section-content pl-[32px]">
        <form class="text-gray-700 forma"
              action="{{ route('categories.update', $category->id) }}"
              method="post" enctype="multipart/form-data" id="not_filter_form">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <div class="mt-[20px]">
                        <p>{{ __('Category name') }} <span class="text-red-500">*</span></p>
                        <input type="text" name="name" required id="categoryNameEdit"
                               value="{{ $category->name }}"
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                                   shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a category name') }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-[20px]">
                        <p>{{__('Icon')}} <span class="text-red-500">*</span></p>
                        <ul>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-palette"
                                @if($category->icon === 'fas fa-palette') checked @endif>
                                <i class="fas fa-palette"></i>&nbsp; {{ __('Palette') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-address-book"
                                @if($category->icon === 'fas fa-address-book') checked @endif>
                                <i class="fas fa-address-book"></i>&nbsp; {{ __('Address book') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-children"
                                @if($category->icon === 'fas fa-children') checked @endif>
                                <i class="fas fa-children"></i>&nbsp; {{ __('Children') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-screwdriver-wrench"
                                @if($category->icon === 'fas fa-screwdriver-wrench') checked @endif>
                                <i class="fas fa-screwdriver-wrench"></i>&nbsp; {{ __('Screwdriver wrench') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-gun"
                                @if($category->icon === 'fas fa-gun') checked @endif>
                                <i class="fas fa-gun"></i>&nbsp; {{ __('Gun') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-burger"
                                @if($category->icon === 'fas fa-burger') checked @endif>
                                <i class="fas fa-burger"></i>&nbsp; {{ __('Burger') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-tv"
                                @if($category->icon === 'fas fa-tv') checked @endif>
                                <i class="fas fa-tv"></i>&nbsp; {{ __('TV') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-calendar-day"
                                @if($category->icon === 'fas fa-calendar-day') checked @endif>
                                <i class="fas fa-calendar-day"></i>&nbsp; {{ __('Calendar day') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-brain"
                                @if($category->icon === 'fas fa-brain') checked @endif>
                                <i class="fas fa-brain"></i>&nbsp; {{ __('Brain') }}
                            </li>
                            <li>
                                <input required type="radio" name="icon" value="fas fa-rocket"
                                @if($category->icon === 'fas fa-rocket') checked @endif>
                                <i class="fas fa-rocket"></i>&nbsp; {{ __('Rocket') }}
                            </li>
                        </ul>

                        @if($errors->first('icon'))
                            <span class="text-red-600">{{ $errors->first('icon') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="reset" onclick="return confirm('{{ __('Are you sure you want to cancel? The changes you made won\'t be saved.') }}"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5
                                    px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit" onclick="return confirm('{{ __('Are you sure you want to save the changes?')}} ')"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                    py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                value="save">
                            {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
