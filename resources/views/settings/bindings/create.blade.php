@extends('layouts.app')
@section('main')

    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[60px] pb-[27px] flex flex-col">
                <h1>{{ __('New binding') }}</h1>
            </div>
        </div>
    </div>

    <div class="scroll height-content section-content pl-[32px]">
        <form class="text-gray-700 forma" method="post" action="{{ route('bindings.store') }}">
            @csrf
            @method('post')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <div class="mt-[20px]">
                        <p>{{ __('Binding') }} <span class="text-red-500">*</span></p>
                        <input type="text" name="name" required
                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300
                                   shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               placeholder="{{ __('Enter a binding name') }}"/>
                        @if($errors->first('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="reset"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" {{--onclick="validacijaZanr()"--}}>
                            {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

@endsection
