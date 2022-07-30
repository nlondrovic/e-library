@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>Reserve: <i>{{ $book->title }}</i></h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            @if($book->available_count))
                <form action="{{ route('reservations.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                        <div class="mt-[20px]">
                            <h3>Reserve book</h3>
                        </div>
                        <div class="flex flex-row justify-start">

                            {{-- Book --}}
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            {{-- TODO: Ovo se mora popraviti --}}

                            {{-- Librarian --}}
                            <input type="hidden" name="librarian_id" value="{{ auth()->id() }}">
                            {{-- TODO: Ovo se mora popraviti, da se ovi podaci ne salju perko htmla --}}

                            {{-- Student --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Choose a student <span class="text-red-500">*</span></p>
                                <select required class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        name="student_id">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('student_id'))
                                    <span class="text-red-600">{{ $errors->first('student_id') }}</span>
                                @endif
                            </div>

                            {{-- Reserve date/time --}}
                            <div class="mt-[20px] w-[268px]">
                                <p>Reserve date<span class="text-red-500">*</span></p>
                                <input required type="date" id="start_time" name="start_time" class="flex w-[90%] mt-2 px-2 py-2 text-base
                                            bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none
                                            focus:ring-2 focus:ring-[#576cdf]"/>
                                @if($errors->first('start_time'))
                                    <span class="text-red-600">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] px-5 px-[50px] mr-[100px]">
                                <button type="reset" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none
                                    text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Cancel <i class="fas fa-times ml-[4px]"></i>
                                </button>

                                <button type="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50
                                        focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px]
                                        hover:bg-[#46A149] bg-[#4CAF50]">
                                    Save <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="w-[50%] ml-[50px]">
                    <div class="flex items-center px-6 py-4 my-4 text-lg bg-red-200 rounded-lg">
                        <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                            <path fill="currentColor"
                                  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                            </path>
                        </svg>
                        <p class="font-medium text-red-600"> All copies of this book are checked out or reserved. </p>
                    </div>
                </div>
            @endif
        </div>

        <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf]">
            @include('components.book-copies')
        </div>


    </div>

@endsection









{{--@extends('layouts.app')--}}
{{--@section('main')--}}
{{--            <!-- Heading of content -->--}}
{{--            <div class="heading">--}}
{{--                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">--}}
{{--                    <div class="py-[10px] flex flex-row">--}}
{{--                        <div class="w-[77px] pl-[30px]">--}}
{{--                            <img src="img/tomsojer.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="pl-[15px]  flex flex-col">--}}
{{--                            <div>--}}
{{--                                <h1>--}}
{{--                                    {{ $book->title }}--}}
{{--                                </h1>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <nav class="w-full rounded">--}}
{{--                                    <ol class="flex list-reset">--}}
{{--                                        <li>--}}
{{--                                            <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">--}}
{{--                                                Evidencija knjiga--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <span class="mx-2">/</span>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="knjigaOsnovniDetalji.php"--}}
{{--                                               class="text-[#2196f3] hover:text-blue-600">--}}
{{--                                                KNJIGA-467--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <span class="mx-2">/</span>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="rezervisiKnjigu.php"--}}
{{--                                               class="text-[#2196f3] hover:text-blue-600">--}}
{{--                                                Rezervisi knjigu--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ol>--}}
{{--                                </nav>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="pt-[24px] mr-[30px]">--}}
{{--                        <a href="otpisiKnjigu.php" class="inline hover:text-blue-600">--}}
{{--                            <i class="fas fa-level-up-alt mr-[3px]"></i>--}}
{{--                            Otpisi knjigu--}}
{{--                        </a>--}}
{{--                        <a href="izdajKnjigu.php" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">--}}
{{--                            <i class="far fa-hand-scissors mr-[3px]"></i>--}}
{{--                            Izdaj knjigu--}}
{{--                        </a>--}}
{{--                        <a href="vratiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">--}}
{{--                            <i class="fas fa-redo-alt mr-[3px] "></i>--}}
{{--                            Vrati knjigu--}}
{{--                        </a>--}}
{{--                        <a href="{{route('reservations.create')}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">--}}
{{--                            <i class="far fa-calendar-check mr-[3px] "></i>--}}
{{--                            Reserve--}}
{{--                        </a>--}}
{{--                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsRezervisiKnjigu hover:text-[#606FC7]">--}}
{{--                            <i--}}
{{--                                class="fas fa-ellipsis-v"></i>--}}
{{--                        </p>--}}
{{--                        <div--}}
{{--                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-rezervisi-knjigu">--}}
{{--                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"--}}
{{--                                 aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">--}}
{{--                                <div class="py-1">--}}
{{--                                    <a href="editKnjiga.php" tabindex="0"--}}
{{--                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                       role="menuitem">--}}
{{--                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>--}}
{{--                                        <span class="px-4 py-0">Izmijeni knjigu</span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" tabindex="0"--}}
{{--                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                       role="menuitem">--}}
{{--                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>--}}
{{--                                        <span class="px-4 py-0">Izbrisi knjigu</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Space for content -->--}}
{{--            <div class="scroll height-content section-content">--}}
{{--                <form class="text-gray-700 forma" method="post" action="{{route('reservations.store')}}">--}}
{{--                    @csrf--}}
{{--                    @method('post')--}}
{{--                    <div class="flex flex-row ml-[30px]">--}}
{{--                        <div class="w-[50%] mb-[100px]">--}}
{{--                            <h3 class="mt-[20px] mb-[10px]">Reserve the book</h3>--}}
{{--                            <div class="mt-[20px]">--}}
{{--                                <p>Choose the student that wants to reserve the book <span class="text-red-500">*</span></p>--}}
{{--                                <select--}}
{{--                                    class="flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"--}}
{{--                                    name="student_id" id="ucenikRezervisanje" required --}}{{--onclick="clearErrorsUcenikRezervisanje()"--}}{{-->--}}
{{--                                    @foreach($students as $student)--}}
{{--                                    <option value="{{ $student->id }}">--}}
{{--                                        {{ $student->name }}--}}
{{--                                    </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <div id="validateUcenikRezervisanje"></div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-[20px]">--}}
{{--                                <p>Date of reservation<span class="text-red-500">*</span></p>--}}
{{--                                <label class="text-gray-700" for="date">--}}
{{--                                    <input required type="date" name="start_time" id="datumRezervisanja"--}}
{{--                                           min="{{\Carbon\Carbon::today()}}"--}}
{{--                                           class="flex w-[50%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"--}}
{{--                                           --}}{{--onclick="clearErrorsDatumRezervisanja()" --}}{{--/>--}}
{{--                                </label>--}}
{{--                                <div id="validateDatumRezervisanja"></div>--}}
{{--                            </div>--}}
{{--                            <input type="hidden" name="book_id" value="{{$book->id}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute bottom-0 w-full bg-white">--}}
{{--                        <div class="flex flex-row">--}}
{{--                            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">--}}
{{--                                <button type="button"--}}
{{--                                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">--}}
{{--                                    Cancel <i class="fas fa-times ml-[4px]"></i>--}}
{{--                                </button>--}}
{{--                                <button id="rezervisiKnjigu" type="submit"--}}
{{--                                        class="btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"--}}
{{--                                        --}}{{--onclick="validacijaRezervisanje()"--}}{{-->--}}
{{--                                    Reserve <i class="fas fa-check ml-[4px]"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--@endsection--}}
