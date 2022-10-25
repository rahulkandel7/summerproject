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
                Messages
            </h2>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Messages
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_messages}}
                </p>
            </div>

            <table class="border border-gray-200 w-full mt-10 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Message
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Name
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Phone
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Email
                    </td>
                </tr>
    
                @foreach ($messages as $message)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$message->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$message->message}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$message->name}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$message->phone}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$message->email}}
                        </td>
                        
                    </tr>
    
                @endforeach
    
            </table>
            <div class="mt-5">
                {{$messages->links()}}
            </div>
        </div>
    </div>
@endsection