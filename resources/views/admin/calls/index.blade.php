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
        <div>
            <h2 class="text-primary font-bold text-2xl py-2">
                Call Requested
            </h2>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    Pending Calls
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{count($pendings)}}
                </p>
            </div>

            <table class="border border-gray-200 w-full mt-10 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Name
                    </td>
                    
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Phone Number
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Status
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        User ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Date
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Actions
                    </td>
                </tr>
    
                @foreach ($calls as $call)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$call->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('profile', $call->user_id) }}" class="cursor-pointer">
                                {{$call->name}}
                            </a>

                        </td>
                        <td class="text-primary px-5 border w-32">
                            {{$call->phone}}
                        </td>
                        <td class=" px-5 border w-32 @if($call->status == 'pending') bg-red-500 text-white @else bg-green-400 text-white @endif uppercase">
                            {{$call->status}}
                        </td>
                        <td class="text-primary px-5 border w-32">
                            {{$call->user_id}}
                        </td>
                        <td class="text-primary px-5 border w-32">
                            {{\Carbon\Carbon::parse($call->created_at)->diffForHumans()}}
                        </td>
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <a href="{{ route('admin.calls.edit', $call->id) }}"><i class="fas fa-edit hover:text-primary font-bold cursor-pointer text-xl"></i></a>
                            
                        </td>
                    </tr>
    
                @endforeach
    
            </table>

            <div class="mt-5">
            {{$calls->links()}}

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