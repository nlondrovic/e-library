@extends('master.settings.index')
@section('main-settings')

{{--    <div class="height-ucenikProfile pb-[30px] scroll">--}}
        <!-- Space for content -->
        <div class="section- mt-[5px]">
            <div class="flex flex-col">
                <div class="pl-[0px] flex border-b-[1px] border-[#e4dfdf]  pb-[20px]">
                    <div>
                        <h3>
                            Reservation overdue limit
                        </h3>
                        <p class="pt-[15px] max-w-[400px]">
                            Ovdje se definiše rok za rezervaciju u danima. Po isteku tog roka, rezervacija ističe i dobija status zatvaranja 'Rezervacija istekla'.
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            Trenutni rok:
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="text"
                               class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                               placeholder="..."/>
                        <p class="ml-[10px] mt-[10px]">dana</p>
                    </div>
                </div>
                <div class="pl-[0px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                    <div>
                        <h3>
                            Checkin limit
                        </h3>
                        <p class="pt-[15px] max-w-[400px]">
                            Ovdje se definiše rok za vraćanje u danima. Po isteku tog roka + rok prekoračenja, izdata knjiga ulazi u prekoračenje i moguće je otpisati primjerak.
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            Trenutni rok:
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="text"
                               class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                               placeholder="..."/>
                        <p class="ml-[10px] mt-[10px]">dana</p>
                    </div>
                </div>
                <div class="pl-[0px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                    <div>
                        <h3>
                            Overdue limit
                        </h3>
                        <p class="pt-[15px] max-w-[400px]">
                            Ovdje se definiše rok za prekoračenje u danima. Nakon isteka roka za vraćanje student može vratiti knjigu u roku prekoračenja, nakon čega izdati primjerak ulazi u knjige u prekoračenju.
                        </p>
                        <p class="pt-[15px] max-w-[400px]">
                            Trenutni rok:
                        </p>
                    </div>
                    <div class="relative flex ml-[60px] mt-[20px]">
                        <input type="text"
                               class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                               placeholder="..."/>
                        <p class="ml-[10px] mt-[10px]">dana</p>
                    </div>
                </div>
                <button type="submit" class="btn-animation mt-[10px] text-white shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                    <i class="fas fa-check mr-[7px]"></i> Sačuvaj
                </button>
            </div>
        </div>

@endsection
