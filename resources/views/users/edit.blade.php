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
            <img src="/storage/{{$user->photo}}" class="w-52 h-52 rounded-full">
        </div>
        
        <div class="md:flex md:justify-center mx-3  px-5 md:mx-0">
            <form method="POST" action="{{ route('users.update',$user->id) }}" class="my-2" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Photo -->
                <div class="my-3 flex justify-center">
                    <div>
                        <label for="photo" class="block text-primary font-semibold mb-2">
                            Change Profile
                        </label>
                        <input type="file" name="photo" id="photo" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('photo'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif">

                    </div>
                </div>

                <!-- Tenant/Landlord -->
                <div class="my-3">
                    <p for="type" class="block text-primary font-semibold mb-2">
                       Account Type: <span class="font-bold text-lg">{{$user->type}}</span>
                       
                    </p>
                    
                </div>

                <div class="md:flex">
                    <!-- Full NAme -->
                    <div class="my-3">
                        <label for="name" class="block text-primary font-semibold mb-2">
                        Full Name
                        </label>
                        <input type="text" name="name" id="name" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('name'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{$user->name}}" >

                    </div>

                    <!-- Email Address -->
                    <div class="my-3 md:ml-3">
                        <label for="email" class="block text-primary font-semibold mb-2">
                        Email Address
                        </label>
                        <input type="email" name="email" id="email" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('email'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{$user->email}}">

                        

                    </div>
                </div>
                
                <h2 class="text-primary font-bold text-2xl py-2 mt-8 border-b-2">
                    Change Password
                </h2>

                <div class="md:flex">
                        <!-- Password -->
                        <div class="my-3">
                            <x-label for="password" :value="__('New Password')" class="block text-primary font-semibold mb-2"/>

                            <x-input id="password" class="border-0 focus:ring-primary shadow-md rounded-md "
                                            type="password"
                                            name="password"
                                             autocomplete="new-password" />

                            @error('password')
                            <p class="text-red-400 py-2 text-sm">
                                * {{$message}}
                            </p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="my-3 md:ml-3">
                            <x-label for="password_confirmation" :value="__('Confirm New Password')" class="block text-primary font-semibold mb-2"/>

                            <x-input id="password_confirmation" class="border-0 focus:ring-primary shadow-md rounded-md"
                                            type="password"
                                            name="password_confirmation"  />
                            
                        </div>
                </div>

                <h2 class="text-primary font-bold text-2xl py-2 mt-8 border-b-2">
                    Information
                </h2>
                
                <div class="md:flex">
                    <!-- Address -->
                    <div class="my-3">
                        <label for="address" class="block text-primary font-semibold mb-2">
                        Address
                        </label>
                        <input type="text" name="address" id="address" class="border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('address'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{$user->address}}">
                    </div>

                    <!-- Phone Number -->
                    <div class="my-3 md:ml-3">
                        <label for="phone" class="block text-primary font-semibold mb-2">
                        Phone Number
                        </label>
                        <input type="text" name="phone" id="phone" class="border-0  focus:ring-primary shadow-md rounded-md @if ($errors->has('phone'))
                        border-red-500 border-b-2 focus:border-primary
                        
                        @endif" value="{{$user->phone}}">
                    </div>
                </div>

                <div class="my-3">
                    <h2 class="text-primary font-bold text-2xl py-2 mt-8 border-b-2">
                        About Yourself
                    </h2>
                    <textarea name="bio" id="bio" class="border-0 focus:ring-primary editor shadow-md rounded-md @if ($errors->has('info'))
                        border-red-500 border-b-2 focus:border-primary
                    @endif" placeholder="Add your yourself"> {{$user->bio}} </textarea>


                </div>

                
            
                <div class="flex items-center justify-center mt-4">
            
                    <input type="submit" value="Save" class="ml-3 px-30 mb-4 md:mb-0 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary cursor-pointer">
                </div>
            </form>  
        </div>  
    </div>
</div>


@endsection

@section('js')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
				.create( document.querySelector( '.editor' ), {
					
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'bulletedList',
						'numberedList',
						'|',
						'blockQuote',
						'insertTable',
						'undo',
						'redo',
						'alignment',
						'fontColor',
						'fontFamily',
						'fontSize',
						'highlight',
						'specialCharacters',
						'subscript',
						'superscript',
						'strikethrough',
						'underline',
						'todoList'
					]
				},
				language: 'en',
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: dvt4g1mbgspp-qwznh4fctzxq' );
					console.error( error );
				} );
		
    </script>
@endsection