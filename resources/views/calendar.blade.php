<x-app-layout>
    <x-slot name="head"> 
          @vite(['resources/js/calendar.js'])
    </x-slot>
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-calendar.modal/>
   
    
</x-app-layout>

