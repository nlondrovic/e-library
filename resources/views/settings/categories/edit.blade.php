@extends('layouts.app')
@section('main')

    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="mt-[2px]">
                <div class="pl-[60px] pb-[27px] flex flex-col">
                    <h1>Edit category</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll height-content section-content pl-[32px]">
        <form class="text-gray-700 forma"
              action="{{ route('categories.update', $category->id) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <div class="mt-[20px]">
                        <p>Category name <span class="text-red-500">*</span></p>
                        <input type="text" name="name" required id="categoryNameEdit"
                               value="{{ $category->name }}"
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                                   shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="Enter a category name"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <p class="mt-[20px]">Icon <span class="text-red-500">*</span></p>
                    <div class="mt-[10px] flex flex-row justify-start text-lg">
                        <div>
                            <ul>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-palette"
                                           @if($category->icon === 'fas fa-palette') checked @endif>
                                    <i class="fas fa-palette"></i>&nbsp; Palette
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-address-book"
                                           @if($category->icon === 'fas fa-address-book') checked @endif>
                                    <i class="fas fa-address-book"></i>&nbsp; Address book
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-children"
                                           @if($category->icon === 'fas fa-children') checked @endif>
                                    <i class="fas fa-children"></i>&nbsp; Children
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-screwdriver-wrench"
                                           @if($category->icon === 'fas fa-screwdriver-wrench') checked @endif>
                                    <i class="fas fa-screwdriver-wrench"></i>&nbsp; Screwdriver wrench
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-gun"
                                           @if($category->icon === 'fas fa-gun') checked @endif>
                                    <i class="fas fa-gun"></i>&nbsp; Gun
                                </li>
                            </ul>
                        </div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div>
                            <ul>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-burger"
                                           @if($category->icon === 'fas fa-burger') checked @endif>
                                    <i class="fas fa-burger"></i>&nbsp; Burger
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-tv"
                                           @if($category->icon === 'fas fa-tv') checked @endif>
                                    <i class="fas fa-tv"></i>&nbsp; TV
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-calendar-day"
                                           @if($category->icon === 'fas fa-calendar-day') checked @endif>
                                    <i class="fas fa-calendar-day"></i>&nbsp; Calendar day
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-brain"
                                           @if($category->icon === 'fas fa-brain') checked @endif>
                                    <i class="fas fa-brain"></i>&nbsp; Brain
                                </li>
                                <li>
                                    <input required type="radio" name="icon" value="fas fa-rocket"
                                           @if($category->icon === 'fas fa-rocket') checked @endif>
                                    <i class="fas fa-rocket"></i>&nbsp; Rocket
                                </li>
                            </ul>
                        </div>
                        @if($errors->first('icon'))
                            <span class="text-red-600">{{ $errors->first('icon') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="reset"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5
                                    px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Discard <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                    py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                value="save">
                            Save <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
