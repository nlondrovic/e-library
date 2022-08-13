@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="pl-[50px] pb-[27px] border-b-[1px] border-[#e4dfdf]">
            <h1> Edit librarian</h1>
        </div>
    </div>

    <!-- Space for content -->
    <div class="scroll height-content section-content">

        <form class="text-gray-700 text-[14px] forma"
              action="{{ route('librarians.update', $librarian) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-row ml-[50px]">
                <div class="w-[50%] mb-[100px]">

                    <div class="mt-[20px]">
                        <span>Name<span class="text-red-500">*</span></span>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               value="{{ $librarian->name }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-[20px]">
                        <span>JMBG <span class="text-red-500">*</span></span>
                        <input type="number" name="jmbg" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               value="{{ $librarian->jmbg }}"/>
                        @if($errors->first('jmbg'))
                            <span class="text-red-600">{{ $errors->first('jmbg') }}</span>
                        @endif
                    </div>

                    <div class="mt-[20px]">
                        <span>E-mail <span class="text-red-500">*</span></span>
                        <input type="text" name="email" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm
                               appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               value="{{ $librarian->email }}"/>
                        @if($errors->first('email'))
                            <span class="text-red-600">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mt-[50px]">
                    <label class="mt-6 cursor-pointer">
                        <div class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                            <div class="py-4">
                                <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg"
                                     width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span class="px-4 py-2 mt-2 leading-normal">Add photo</span>
                                <input type="file" name="picture" class="hidden" :accept="accept"
                                       onchange="loadFileStudent(event)"/>
                            </div>
                            <img id="image-output-student" class="absolute w-48 h-[188px] bottom-0"
                                 src="{{ $librarian->picture }}"/>
                        </div>
                    </label>
                </div>

            </div>

            {{-- Buttons --}}
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5
                                px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Cancel <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            Save <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection

