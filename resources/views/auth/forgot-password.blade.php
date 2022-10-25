@extends('layouts.app')

@section('main')

    <div class="w-10/12 mx-auto">
        <div class="shadow-lg rounded-lg h-auto w-93 my-10">
            <div class="flex justify-center">
                <img src="{{asset('images/LOGO.svg')}}" class="w-32 ">
            </div>
            
            <div class="mb-4 text-sm text-gray-600 px-10 py-5 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

             <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <div class="flex justify-center">
                <x-auth-validation-errors class="mb-4 px-10" :errors="$errors" />
            </div>

            <div class="flex justify-center">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="border-0 focus:ring-primary shadow-md rounded-md mt-2" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
@endsection
    
