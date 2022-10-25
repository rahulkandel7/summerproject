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
                Switch Request
            </h2>

            <table class="border border-gray-200 w-full mt-10 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        User Name
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Phone Number
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Role
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
                @php
                    $i = 1;
                @endphp
                @foreach ($converts as $convert)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            @php echo $i; $i++; @endphp
                        </td>
                        <td class="text-primary px-5 border">
                            {{$convert->user->name}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$convert->user->phone}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$convert->user->type}}
                        </td>
                        
                        <td class="text-gray-600 px-5 border w-32 py-2">
                          
                            <form action="{{route('convert.accept',$convert->id)}}" method="post" class="inline-block">
                                @csrf
                                @method('put')
                                <button type="submit">
                                    <i title="accept" class="fas fa-check text-blue-500 hover:text-blue-700 font-bold cursor-pointer text-xl ml-3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
    
                @endforeach
    
            </table>
            {{-- <div class="mt-5">
                {{$converts->links()}}
            </div> --}}
        </div>
    </div>
@endsection