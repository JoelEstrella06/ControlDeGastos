@php
    $message="prueba de mensaje";
    $clases="";
    if (session('success')) {
        $message=session('success');
        $clases="text-green-800 bg-green-200 z-50";
    }
    if (session('error')) {
        $message=session('error');
        $clases="text-red-800 bg-red-200 z-50";
    }
@endphp
@session('success','error')    
  <div class="flex items-center p-2 sm:p-3 text-sm w-full fixed top-0 {{$clases}}":class="close ?'hidden':''" x-data="{close:false}">
    <div class="flex items-center gap-2 max-w-7xl m-auto">
      <svg class="size-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div>
        <p class="font-medium">{{$message}}</p>
      </div>
    </div>
      <button class="p-2 flex justify-center items-center" @click="close=!close">
        <x-icons.close class="size-6"/>
      </button>
  </div>
@endsession