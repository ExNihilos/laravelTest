@extends('GamePortal.layouts.app')

@section('content')

@include('components.test.header')

@include('components.test.sidebar')

<form action="{{route('user.update', ['id'=>1])}}" method="POST">
    @method('PUT')
    <div class="bg-black text-white py-20">
        <div class="container mx-auto flex flex-col md:flex-row my-6 md:my-24">
            <div class="flex flex-col w-full lg:w-2/3 justify-center">
                <div class="container w-full px-4">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
                                <div class="flex-auto p-5 lg:p-10">
                                    <h4 class="text-2xl mb-4 text-black font-semibold">Have a suggestion?</h4>
                                    <form id="feedbackForm" action="" method="">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email">
                                                email
                                            </label>
                                            <input type="email" name="email" id="email"
                                                   class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=""
                                                   style="transition: all 0.15s ease 0s;" required
                                                   value="{{$user->email}}"
                                            />
                                        </div>
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="name">
                                                Логин
                                            </label>
                                            <input type="text" name="name" id="name"
                                                   class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=""
                                                   style="transition: all 0.15s ease 0s;" required
                                                   value="{{$user->name}}"
                                            />
                                        </div>
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="password">
                                                Пароль
                                            </label>
                                            <input type="password" name="password" id="password"
                                                   class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=""
                                                   style="transition: all 0.15s ease 0s;" required
                                                   value="{{$user->password}}"
                                            />
                                        </div>

                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                   for="message">Message
                                            </label>
                                            <textarea maxlength="300" name="feedback" id="feedback" rows="4"
                                                      cols="80"
                                                      class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                                                      placeholder="" required>

                                            </textarea>
                                        </div>
                                        <div class="text-center mt-6">
                                            <button id="feedbackBtn" class="bg-yellow-300 text-black text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="submit" style="transition: all 0.15s ease 0s;">
                                                Подтвердить изменения
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
