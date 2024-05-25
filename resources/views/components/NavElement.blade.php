@props(['href'=>'home','text'=>'Inicio'])
<li>
    <a href={{route($href)}} class="{{request()->routeIs($href)?'text-indigo-500':''}} font-medium hover:text-indigo-400 px-2 peer">{{$text}}</a>
    <div class="{{request()->routeIs($href)?'w-full':'w-0 peer-hover:w-full'}} h-1 bg-indigo-800 transition-[width] duration-300"></div>
</li>