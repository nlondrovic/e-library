@extends('layouts.app')
@section('main')
    <main class="flex flex-row small:hidden">
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{$author->name}}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="autori.php" class="text-[#2196f3] hover:text-blue-600">
                                            Record of the author
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="autorProfile.php" class="text-gray-400 hover:text-blue-600">
                                            {{$author->id}}
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsAutor hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autor">
                            <div class="absolute right-0 w-56 mt-[2px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                 aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{route('authors.edit', $author)}}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Edit the author</span>
                                    </a>
                                    <form method="post" action="{{route('authors.destroy', $author)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" tabindex="0"
                                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                role="menuitem">
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Delete author</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space for content -->
            <div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">Name</span>
                        <p class="font-medium">{{$author->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">About</span>
                        <p class="font-medium max-w-[550px]">
                           {{$author->about}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
