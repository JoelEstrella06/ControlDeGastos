<div class="flex sm:block w-full">
    <div class="bg-indigo-950 border border-indigo-950 rounded-l-lg flex flex-col text-indigo-100 sm:hidden">
        {{$labels}}
    </div>
    <div {{$attributes->merge(['class'=>'flex flex-1 sm:flex-none flex-col sm:grid divide-y sm:divide-y-0 relative border sm:border-0 border-indigo-300 rounded-r-lg sm:rounded-none text-center'])}}>
        {{$cells}}
    </div>
</div>