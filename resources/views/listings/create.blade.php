@extends('layouts.app')

@section('css')
    <style>
        [type='checkbox']:checked, [type='radio']:checked{
            background-color: #264653;
        }
        [type='checkbox']:checked, [type='radio']:checked:hover{
            background-color: #264653;
        }
    </style>
@endsection

@section('main')
    <div class=" md:w-11/12 mx-auto">
        <div class="md:shadow-lg rounded-lg h-auto md:w-93 my-10">

            <h2 class="text-primary text-center font-bold text-2xl py-2">
                Add Lisitng
            </h2>

            <div class=" md:flex md:justify-center px-5 md:px-0">

                <form action="{{ route('listings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex">
                        <div class="my-3 ">
                            <label for="tole" class="block text-primary font-semibold mb-2">
                            Tole
                            </label>
                            <input type="text" name="tole" id="tole" class=" sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('address'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('tole')}}">
    
                            @error('tole')
                                <p class="text-red-400 py-2 text-sm">
                                    * Enter Your Tole Name
                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 mx-3">
                            <label for="municipality" class="block text-primary font-semibold mb-2">
                            Municipality
                            </label>
                            <input type="text" name="municipality" id="municipality" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('municipality'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('municipality')}}">
    
                            @error('municipality')
                                <p class="text-red-400 py-2 text-sm">
                                    * Enter Your Municipality Name
                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 mx-3">
                            <label for="wardno" class="block text-primary font-semibold mb-2">
                            Ward Number
                            </label>
                            <input type="text" name="wardno" id="wardno" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('wardno'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('wardno')}}" placeholder="1">
    
                            @error('wardno')
                                <p class="text-red-400 py-2 text-sm">
                                    * Enter Your Ward Number
                                </p>
                            @enderror
    
                        </div>
                    </div>

                    <div class="md:flex">
                        <div class="my-3">
                            <label for="price" class="block text-primary font-semibold mb-2">
                            Price per Month
                            </label>
                            <input type="text" name="price" id="price" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('address'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('price')}}">
    
                            @error('price')
                                <p class="text-red-400 py-2 text-sm">
                                    * Enter Your Desire Price per Month
                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 mx-3 w-full">
                            <label  class="block text-primary font-semibold mb-2">
                            Is Negotiable ?
                            </label>
                            <input type="radio" name="isNegotiable" id="yes" value="1"> <span class="px-2">Yes</span>
                            <input type="radio" name="isNegotiable" id="no" value="0"> <span class="px-2">No</span>
    
                        </div>

                        <div class="my-3 mx-3 w-full">
                            <label  class="block text-primary font-semibold mb-2">
                            Is Available ?
                            </label>
                            <input type="radio" name="isAvailable" id="yes" value="1"> <span class="px-2">Yes</span>
                            <input type="radio" name="isAvailable" id="no" value="0"> <span class="px-2">No</span>
    
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="thumbnail" class="block text-primary font-semibold mb-2">
                        Thumbnail Photo
                        </label>
                        <input type="file" name="thumbnail" id="thumbnail" class="sm:w-auto w-full border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('thumbnail'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{old('thumbnail')}}">

                        @error('thumbnail')
                            <p class="text-red-400 py-2 text-sm">
                                * Insert Thumbnail Photo

                            </p>
                        @enderror
                    </div>

                    <div class="md:flex">
                        <div class="my-3">
                            <label for="tbphoto" class="block text-primary font-semibold mb-2">
                            Toilet / Bathroom Photo
                            </label>
                            <input type="file" name="tbphoto" id="tbphoto" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('tbphoto'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('tbphoto')}}">
    
                            @error('tbphoto')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Toilet / Bathroom Photo

                                </p>


                            @enderror
    
                        </div>

                        <div class="my-3 md:mx-3">
                            <label for="hallphoto" class="block text-primary font-semibold mb-2">
                            Hall Room Photo
                            </label>
                            <input type="file" name="hallphoto" id="hallphoto" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('hallphoto'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('hallphoto')}}">
    
                            @error('hallphoto')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Hall Room Photo

                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 md:mx-3">
                            <label for="kitchenphoto" class="block text-primary font-semibold mb-2">
                            Kitchen Photo
                            </label>
                            <input type="file" name="kitchenphoto" id="kitchenphoto" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('kitchenphoto'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('kitchenphoto')}}">
    
                            @error('kitchenphoto')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Kitchen Photo

                                </p>
                            @enderror
    
                        </div>

                    </div>

                    <div class="md:flex">
                        <div class="my-3">
                            <label for="psphoto" class="block text-primary font-semibold mb-2">
                            Parking Space Photo
                            </label>
                            <input type="file" name="psphoto" id="psphoto" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('psphoto'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('t/bphoto')}}">
    
                            @error('psphoto')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Parking Space Photo

                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 md:mx-3">
                            <label for="froom" class="block text-primary font-semibold mb-2">
                            Room Photo
                            </label>
                            <input type="file" name="froom" id="froom" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('froom'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('froom')}}">
    
                            @error('froom')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Room Photo

                                </p>
                            @enderror
    
                        </div>

                        <div class="my-3 md:mx-3">
                            <label for="sroom" class="block text-primary font-semibold mb-2">
                            Room Photo
                            </label>
                            <input type="file" name="sroom" id="sroom" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('sroom'))
                                border-red-500 border-b-2 focus:border-primary
                            @endif" value="{{old('sroom')}}">
    
                            @error('sroom')
                                <p class="text-red-400 py-2 text-sm">
                                    * Insert Room Photo

                                </p>
                            @enderror
    
                        </div>
                        
                    </div>

                    <div class="my-3">
                        <label for="type" class="block text-primary font-semibold mb-2">
                            Property Type
                        </label>
                        <select name="type" id="type" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md my-2">
                            <option value="Room">Room</option>
                            <option value="Flat">Flat</option>
                        </select>
                    </div>
                    
                    <div class="my-3">
                        <label for="info" class="block text-primary font-semibold mb-2">
                        Description
                        </label>
                        <textarea name="info" id="info" class="border-0 focus:ring-primary editor shadow-md rounded-md @if ($errors->has('info'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" placeholder="Add your property description. Its size and where is is located and what services are near"> {{old('info')}} </textarea>

                        @error('info')
                            <p class="text-red-400 py-2 text-sm">
                                * Add Description About your Properties
                            </p>
                        @enderror

                    </div>

                    <div class="my-3">
                        <label for="rules" class="block text-primary font-semibold mb-2">
                        Rules
                        </label>
                        <textarea name="rules" id="rules" class="border-0 focus:ring-primary editors shadow-md rounded-md @if ($errors->has('rules'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" placeholder="Add your Rules to be follow" value="Not any rules"> {{old('rules')}} </textarea>

                        @error('rules')
                            <p class="text-red-400 py-2 text-sm">
                                * Add Your Rules
                            </p>
                        @enderror

                    </div>

                    <h2 class="text-primary font-bold text-2xl py-2 mt-4">
                        Prefered Tenants
                    </h2>

                    <div class="my-3">
                        <label for="age_range" class="block text-primary font-semibold mb-2">
                            Age Range
                        </label>
                        <input type="text" name="age_range" id="age_range" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('age_range'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{old('age_range')}}" placeholder="20-40">

                        @error('age_range')
                            <p class="text-red-400 py-2 text-sm">
                                * Define Age Range

                            </p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="tenant_type" class="block text-primary font-semibold mb-2">
                            Tenant Type
                        </label>
                        <input type="text" name="tenant_type" id="tenant_type" class="sm:w-auto border-0 my-2 focus:ring-primary shadow-md rounded-md @if ($errors->has('tenant_type'))
                        border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{old('tenant_type')}}" placeholder="Students">

                        @error('tenant_type')
                            <p class="text-red-400 py-2 text-sm">
                                * Define Tenant Type
                            </p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="gender" class="block text-primary font-semibold mb-2">
                            Gender Type
                        </label>
                        <select name="gender" id="gender" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md my-2">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="any">Any</option>
                        </select>
                    </div>



                    <div class="flex justify-center mb-3 mx-5 md:mx-0">
                        <input type="submit" value="Publish Now" class="ml-3 px-10 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary">
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
    <script>
        ClassicEditor
				.create( document.querySelector( '.editors' ), {
					
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