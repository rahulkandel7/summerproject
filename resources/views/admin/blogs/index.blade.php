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
        @if (Session::has('sucess'))
        <div class="w-6/12 rounded-lg absolute right-0 top-4 bg-green-600 z-50 text-white px-3 py-2 wow fadeIn hidee" data-wow-delay="2s">
            {{ Session::get('sucess') }}
        </div>
        @endif
        @if (Session::has('delete'))
            <div class="w-6/12 rounded-lg absolute right-0 top-4 z-50 bg-red-600 text-white px-3 py-2 wow fadeIn hidee" data-wow-delay="2s">
                {{ Session::get('delete') }}
            </div>
        @endif
        <div>
            <h2 class="text-primary font-bold text-2xl py-2">
                Blogs
            </h2>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Blogs
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{count($blogs)}}
                </p>
            </div>

            <table class="border border-gray-200 w-full mt-10 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Title
                    </td>
                    
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
    
                @foreach ($blogs as $blog)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$blog->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('admin.blogs.show', $blog->id) }}" class="cursor-pointer">
                                {{$blog->title}}
                            </a>
                        </td>
                        
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"><i class="fas fa-edit hover:text-primary font-bold cursor-pointer text-xl"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post" class="inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    <i class="fas fa-trash hover:text-red-500 font-bold cursor-pointer text-xl ml-3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
    
                @endforeach
    
            </table>
            {{$blogs->links()}}
        </div>

        <div class="fixed bottom-3 right-7">
            <div class=" w-14 h-14 rounded-full bg-primary text-white text-lg">
                <div class="flex justify-center pt-4">
                    <a href="{{ route('admin.blogs.create') }}">
                        <i class="fas fa-plus"></i>
                    </a>
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