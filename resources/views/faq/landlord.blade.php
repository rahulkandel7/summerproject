@extends('layouts.app')

@section('main')
  <div class="w-11/12 mx-auto mb-5">
    <h2 class="text-primary text-2xl text-left font-semibold px-10 py-10">
        LandLord FAQ's (Frequently Asked Questions)
    </h2>

      <!-- Questions and Answers open-->
        <div class="bg-white px-5 py-2 rounded-lg shadow-lg mb-5" x-data="{isOpen:false}">
          <h3 class="text-primary font-semibold text-xl" @click="isOpen = !isOpen" @click.away="isOpen=false">
            Is this website is safe?
            <span class="inline-block float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
          </h3>

          <p class="text-gray-600 py-2 px-3" x-show="isOpen" x-transition>
            Yes, our first priority is to provide you the best and safe serivises. 
          </p>
        </div>
    <!-- Questions and Answers Close-->

    <!-- Questions and Answers open-->
        <div class="bg-white px-5 py-2 rounded-lg shadow-lg mb-5" x-data="{isOpen:false}">
          <h3 class="text-primary font-semibold text-xl" @click="isOpen = !isOpen" @click.away="isOpen=false">
            How do I get a rent?
            <span class="inline-block float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
          </h3>

          <p class="text-gray-600 py-2 px-3" x-show="isOpen" x-transition>
            You can get a rent by related tenant hand to hand or using internet banking.
          </p>
        </div>
    <!-- Questions and Answers Close-->
  </div>
@endsection