<header class="bg-slate-100 w-full sticky top-0 z-50">
    <nav class="w-full border p-2 relative" x-data="{open:false}" @click.outside="open=false">
        <button @click="open=!open" class="sm:hidden text-purple-700">
            <x-icons.menu-mobile class="size-8"/>
        </button>
        <ul class="flex gap-2 flex-col bg-slate-100 left-0 right-0 px-2 sm:px-0 pb-2 sm:pb-0 sm:flex-row absolute sm:static border-b-2 sm:border-b-0 border-slate-300" :class="open?'':'hidden sm:flex'">
            <x-NavElement/>
            <x-NavElement href="gastos" text="Listado de gastos"/>
            <x-NavElement href="categorias" text="Categorías"/>
        </ul>
    </nav>
</header>