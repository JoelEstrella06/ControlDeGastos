<div class="w-full mb-3">
    <div {{$attributes->merge(['class'=>'rounded-t-lg bg-indigo-950 text-indigo-100 hidden sm:grid justify-items-center font-medium'])}}>
        {{$header}}
    </div>
    <div class="flex flex-col gap-2 sm:block sm:divide-y sm:divide-indigo-100">
        {{$body}}
    </div>
</div>