@extends('layouts.app')

@section('main')

        <div class="heading">
            <div class="flex border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[30px] py-[10px] flex flex-col">
                    <div>
                        <h1>
                            Edit category
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="{{route('policy')}}" class="text-[#2196f3] hover:text-blue-600">
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('categories.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                        Categories
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-blue-600">
                                        Edit category
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Space for content -->
        <div class="scroll height-content section-content">
            <form class="text-gray-700 forma"
                  action="{{ route('categories.update', ['category' => $category->id]) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <form class="text-gray-700 forma">
                <div class="flex flex-row ml-[30px]">
                    <div class="w-[50%] mb-[100px]">
                        <div class="mt-[20px]">
                            <p>Category name <span class="text-red-500">*</span></p>
                            <input type="text" name="categoryNameEdit" required id="categoryNameEdit" value="{{ $category->name }}"
                                   class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                   onkeydown="clearErrorsNazivKategorijeEdit()" />
                           <div id="validateNazivKategorijeEdit"></div>
                            @if($errors->first('name'))
                                <span class="text-red-600">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mt-[20px]">
                            <p>Upload an icon </p>
                            <div id="empty-cover-art-ikonica"
                                 class="flex w-[90%] mt-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                                <div class="bg-gray-300 h-[40px] w-[102px] px-[20px] pt-[10px]">
                                    <label class="cursor-pointer">
                                        <p class="leading-normal">Browse...</p>
                                        <input id="icon-upload" type='file' class="hidden" :multiple="multiple"
                                               :accept="accept" />
                                    </label>
                                </div>
                                <div id="icon-output" class="h-[40px] px-[20px] pt-[7px]">{{ $category->icon }}</div>
                            </div>
                        </div>

                        <div class="mt-[20px]">
                            <p class="inline-block">Description</p>
                            <textarea name="opisKategorije" rows="10" required
                                      class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ $category->about }}</textarea>
                            @if($errors->first('about'))
                                <span class="text-red-600">{{ $errors->first('about') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                            <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Discard <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button id="sacuvajKategorijuEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                    onclick="validacijaKategorijaEdit()" value="save">
                                Save <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            </form>
        </div>


@endsection
