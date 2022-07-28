@extends('layouts.app')
@section('main')
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="w-[77px] pl-[30px]">
                    <img src="img/tomsojer.jpg" alt="">
                </div>
                <div class="pl-[15px]  flex flex-col">
                    <div>
                        <h1>
                            {{ $book->title }}
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">
                                        Evidencija knjiga
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="knjigaOsnovniDetalji.php"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-467
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="rezervisiKnjigu.php"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Rezervisi knjigu
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pt-[24px] mr-[30px]">
                <a href="otpisiKnjigu.php" class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpisi knjigu
                </a>
                <a href="izdajKnjigu.php" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="vratiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="fas fa-redo-alt mr-[3px] "></i>
                    Vrati knjigu
                </a>
                <a href="{{route('reservations.create')}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="far fa-calendar-check mr-[3px] "></i>
                    Reserve
                </a>
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsRezervisiKnjigu hover:text-[#606FC7]">
                    <i
                        class="fas fa-ellipsis-v"></i>
                </p>
                <div
                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-rezervisi-knjigu">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                         aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="editKnjiga.php" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni knjigu</span>
                            </a>
                            <a href="#" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izbrisi knjigu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Space for content -->
    <div class="scroll height-content section-content">
        <form class="text-gray-700 forma" method="post" action="{{route('reservations.store')}}">
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <h3 class="mt-[20px] mb-[10px]">Reserve the book</h3>
                    <div class="mt-[20px]">
                        <p>Choose the student that wants to reserve the book <span class="text-red-500">*</span></p>
                        <select
                            class="flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="student_id" id="ucenikRezervisanje" required {{--onclick="clearErrorsUcenikRezervisanje()"--}}>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        {{--                                <div id="validateUcenikRezervisanje"></div>--}}
                    </div>
                    <div class="mt-[20px]">
                        <p>Date of reservation<span class="text-red-500">*</span></p>
                        <label class="text-gray-700" for="date">
                            <input type="date" name="start_time" id="datumRezervisanja"
                                   min="{{\Carbon\Carbon::today()}}"
                                   class="flex w-[50%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                {{--onclick="clearErrorsDatumRezervisanja()" --}}/>
                        </label>
                        {{--                                <div id="validateDatumRezervisanja"></div>--}}
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 w-full bg-white">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Cancel <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="rezervisiKnjigu" type="submit"
                                class="btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            {{--onclick="validacijaRezervisanje()"--}}>
                            Reserve <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
