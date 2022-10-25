@extends('layouts.app')

@section('main')
    <div class="w-11/12 mx-auto">
        <h2 class="text-primary text-center font-bold text-4xl py-2">
            Contact Us
        </h2>

        @if (Session::has('sucess'))
            <div class="w-6/12 rounded-lg absolute right-0 top-4 bg-green-600 text-white px-3 py-2 wow fadeIn hidee" data-wow-delay="2s">
                {{ Session::get('sucess') }}
            </div>
        @endif
                
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class=" mt-10 shadow-xl rounded-md py-4">
                <form action="{{ route('messages.store') }}" method="post">
                    @csrf
                    <div class="px-5 py-1 mb-2">
                        <label for="name" class="block font-bold text-gray-600 mb-1">Full Name </label>
                        <input type="text" name="name" id="name" class="border-0 w-full focus:ring-primary shadow-md rounded-md @if ($errors->has('name'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" required>
                    </div>

                    <div class="px-5 py-1 mb-2">
                        <label for="email" class="block font-bold text-gray-600 mb-1">Email Address </label>
                        <input type="email" name="email" id="email" class="border-0 w-full focus:ring-primary shadow-md rounded-md @if ($errors->has('email'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" required>
                    </div>

                    <div class="px-5 py-1 mb-2">
                        <label for="phone" class="block font-bold text-gray-600 mb-1">Phone Number </label>
                        <input type="text" name="phone" id="phone" class="border-0 w-full focus:ring-primary shadow-md rounded-md @if ($errors->has('phone'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" required>
                    </div>

                    <div class="px-5 py-1 mb-2">
                        <label for="message" class="block font-bold text-gray-600 mb-1">Message </label>
                        <textarea name="message" id="message" class="border-0 w-full focus:ring-primary shadow-md rounded-md @if ($errors->has('message'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" required> </textarea>
                    </div>

                    <div class="px-5 py-1">
                        <input type="submit" value="Submit" class="ml-3 px-30 mb-4 md:mb-0 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary cursor-pointer">
                    </div>

                    

                </form>
            </div>

            <div class=" mt-10  rounded-md py-4 px-8">
                <p class="font-bold text-2xl text-primary">Other ways to connect.</p>
                <p class="  text-gray-600">Feel free to contact us.</p>

                {{-- Location --}}
                {{-- <div class="flex items-center mt-3">
                    <div class="w-10 h-10 rounded-full bg-primary">
                        <div class="flex justify-center items-center">
                            <i class="fas fa-map-marker-alt text-white mt-3"></i>
                        </div>
                    </div>
                    <p class="px-2 text-xl text-black font-semibold">
                        Gaindakot-2
                    </p>
                </div> --}}

                <div class="flex items-center mt-3">
                    <div class="w-10 h-10 rounded-full bg-primary">
                        <div class="flex justify-center items-center">
                            <i class="fas fa-phone text-white mt-3"></i>
                        </div>
                    </div>
                    <p class="px-2 text-xl text-black font-semibold">
                        +977-9745374282
                    </p>
                </div>

                <div class="flex items-center mt-3">
                    <div class="w-10 h-10 rounded-full bg-primary">
                        <div class="flex justify-center items-center">
                             <i class="fas fa-envelope text-white mt-3"></i>
                        </div>
                    </div>
                    <p class="px-2 text-xl text-black font-semibold">
                        homienepal@gmail.com
                    </p>
                </div>

                <div class="flex items-center mt-3">
                    <div class="w-10 h-10 rounded-full bg-primary ">
                        <div class="flex justify-center items-center text-white hover:text-blue-500 cursor-pointer">
                             <a href="https://www.facebook.com/homieenepal"><i class="fab fa-facebook mt-3  "></i></a>
                        </div>
                    </div>

                    <div class="w-10 h-10 rounded-full bg-primary ml-3">
                        <div class="flex justify-center items-center text-white hover:text-red-400 cursor-pointer">
                             <a href="https://www.instagram.com/homienepal"><i class="fab fa-instagram mt-3"></i></a>
                        </div>
                    </div>
                    
                </div>

            </div>
            
        </div>
    </div>
@endsection


@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
            $(function(){
            setTimeout(function(){
                $(".hidee").fadeOut(1000);}, 4000);
            });
    </script>

@endsection