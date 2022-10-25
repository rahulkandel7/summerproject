@extends('layouts.admin.index')

@section('css')
    <style>
        .service{
            transition: all .3s ease-in-out;
        }
        .service:hover{
            transform: translateY(-.5rem);
    }
    </style>
@endsection

@section('main')
    <div class="w-11/12 mx-auto">
        <div>
            <h2 class="text-primary font-bold text-2xl py-2">
                Create New Blogs
            </h2>

            <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="my-3">
                        <label for="title" class="block text-primary font-semibold mb-2">
                        Title
                        </label>
                        <input type="text" name="title" id="title" class=" sm:w-auto md:w-full border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('title'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{old('title')}}">

                        @error('title')
                            <p class="text-red-400 py-2 text-sm">
                                * Enter Title
                            </p>
                        @enderror

                    </div>

                    <div class="my-3">
                        <label for="image" class="block text-primary font-semibold mb-2">
                        Image
                        </label>
                        <input type="file" name="image" id="image" class=" sm:w-auto md:w-full border-0 focus:ring-primary shadow-md rounded-md @if ($errors->has('image'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" value="{{old('image')}}">

                        @error('image')
                            <p class="text-red-400 py-2 text-sm">
                                * Select Image
                            </p>
                        @enderror

                    </div>

                    <div class="my-3">
                        <label for="body" class="block text-primary font-semibold mb-2">
                        Body
                        </label>
                        <textarea  name="body" id="body" class=" sm:w-auto md:w-full border-0 editor focus:ring-primary shadow-md rounded-md @if ($errors->has('body'))
                            border-red-500 border-b-2 focus:border-primary
                        @endif" >
                            {{old('body')}}
                        </textarea>
                        @error('body')
                            <p class="text-red-400 py-2 text-sm">
                                * Enter Body of The Blog
                            </p>
                        @enderror

                    </div>

                    <div class="my-3">
                        <label for="isPublished" class="block text-primary font-semibold mb-2">
                            Publish Now
                        </label>
                        <select name="isPublished" id="isPublished" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md my-2">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="flex justify-center mb-3 mx-5 md:mx-0">
                        <input type="submit" value="Save" class="ml-3 px-10 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary">
                    </div>

            </form>
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