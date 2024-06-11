<div>
    <button wire:click='deleteCategory()' wire:confirm='¿Está seguro de eliminar el registro?\nTodos los registros relacionados serán eliminados.' type="button" class="flex gap-2 items-center text-indigo-900 hover:text-blue-500 transition-colors duration-300">
        <x-icons.trash class="size-4"/>
        <span>Eliminar</span>
    </button>
</div>
