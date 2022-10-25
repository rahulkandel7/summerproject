@extends('layouts.app')

@section('css')
    <style>
        [type='checkbox']:checked, [type='radio']:checked {
            background-color: #264653;
        }
        [type='checkbox']:checked:hover, [type='checkbox']:checked:focus, [type='radio']:checked:hover, [type='radio']:checked:focus {
            background-color: #264653;
        }
        
    </style>
@endsection

@section('main')
<div class="md:w-10/12 mx-auto">
    <div class="shadow-lg rounded-lg h-auto w-93 my-10">
        <div class="flex justify-center">
            <img src="{{asset('images/LOGO.svg')}}" class="w-32 ">
        </div>
        
        <div class="flex justify-center my-2 px-3">
            <h2 class=" text-teritory" style="font-family: 'Poppins', serif;">
                Register Now To Find your Perfect Place & To Rent Out with <span class="text-primary font-semibold">Homie Nepal</span>
            </h2>
        </div>


        <div class="md:flex md:justify-center mx-3 md:mx-0">
            <form method="POST" action="{{ route('register') }}" class="my-2" enctype="multipart/form-data">
                @csrf
                <!-- Full NAme -->
                <div class="my-3">
                    <label for="name" class="block text-primary font-semibold mb-2">
                       Full Name
                    </label>
                    <input type="text" name="name" id="name" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('name'))
                        border-red-500 border-b-2 focus:border-primary
                    @endif" value="{{old('name')}}">

                    @error('name')
                        <p class="text-red-400 py-2 text-sm">
                            * {{$message}}
                        </p>
                    @enderror

                </div>

                <!-- Email Address -->
                <div class="my-3">
                    <label for="email" class="block text-primary font-semibold mb-2">
                       Email Address
                    </label>
                    <input type="email" name="email" id="email" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('email'))
                    border-red-500 border-b-2 focus:border-primary
                    @endif" value="{{old('email')}}">

                    @error('email')
                        <p class="text-red-400 py-2 text-sm">
                            * {{$message}}
                        </p>
                    @enderror

                </div>

                <!-- Password -->
                <div class="my-3">
                    <x-label for="password" :value="__('Password')" class="block text-primary font-semibold mb-2"/>

                    <x-input id="password" class="border-0 focus:ring-primary shadow-md rounded-md "
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    @error('password')
                    <p class="text-red-400 py-2 text-sm">
                        * {{$message}}
                    </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="my-3">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="block text-primary font-semibold mb-2"/>

                    <x-input id="password_confirmation" class="border-0 focus:ring-primary shadow-md rounded-md"
                                    type="password"
                                    name="password_confirmation" required />
                    
                </div>

                <!-- Address -->
                <div class="my-3">
                    <label for="municipality" class="block text-primary font-semibold mb-2">
                       Municipality
                    </label>
                    <input type="text" name="municipality" id="municipality" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('municipality'))
                    border-red-500 border-b-2 focus:border-primary
                    @endif" value="{{old('municipality')}}">

                    @error('municipality')
                    <p class="text-red-400 py-2 text-sm">
                        * {{$message}}
                    </p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="my-3">
                    <label for="phone" class="block text-primary font-semibold mb-2">
                       Phone Number
                    </label>
                    <input type="text" name="phone" id="phone" class="border-0  focus:ring-primary shadow-md rounded-md @if ($errors->has('phone'))
                    border-red-500 border-b-2 focus:border-primary
                    
                    @endif" value="{{old('phone')}}">

                    @error('phone')
                    <p class="text-red-400 py-2 text-sm">
                        * {{$message}}
                    </p>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="my-3">
                    <label for="gender" class="block text-primary font-semibold mb-2">
                       Select Gender
                    </label>
                    <select name="gender" id="gender" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('gender'))
                        border-red-500 border-b-2 focus:border-primary
                    @endif">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Photo -->
                <div class="my-3">
                    <label for="photo" class="block text-primary font-semibold mb-2">
                       Your Photo
                    </label>
                    <input type="file" name="photo" id="photo" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('photo'))
                    border-red-500 border-b-2 focus:border-primary
                    @endif">

                    @error('photo')
                    <p class="text-red-400 py-2 text-sm">
                        * {{$message}}
                    </p>
                    @enderror
                </div>

                <!-- Tenant/Landlord -->
                <div class="my-3">
                    <label for="type" class="block text-primary font-semibold mb-2 @if ($errors->has('type'))
                        border-red-500 border-b-2 focus:border-primary
                    @endif">
                       I am a 
                    </label>
                    <select name="type" id="type" class="border-0 focus:ring-primary shadow-md rounded-md">
                        <option value="tenant">Tenant</option>
                        <option value="landlord">LandLord</option>
                    </select>
                </div>

                <!-- checkbox agreement -->
                <div class="my-3">
                    
                    <input type="checkbox" id="agreement" name="agreement" value="0" class="border-primary">
                    <label for="agreement" class="pl-2 text-gray-600">I Agree to the Homie Nepal Terms and Conditions</label>
                    @error('agreement')
                    <p class="text-red-400 py-2 text-sm">
                        * Accept Agreement to Continue
                    </p>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary text-sm hover:underline">
                        Already Have a Account?
                    </a>
                </div>
            
                <div class="flex items-center justify-center mt-4">
            
                    <input type="submit" value="Register" class="ml-3 px-30 mb-4 md:mb-0 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary cursor-pointer">
                        
                </div>
            </form>  
        </div>  
    </div>
</div>


@endsection

