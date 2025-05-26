<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ulogovani ste!") }}
                </div>
                <div class="p-6">
                    <h4 class="mb-4 font-semibold">Opcije:</h4>
                    <div class="d-flex flex-column gap-3">
                        <a href="{{ route('product.list') }}" class="btn btn-primary w-100">Pogledaj sve proizvode</a>
                        <a href="{{ route('product.add') }}" class="btn btn-secondary w-100">Dodaj proizvod</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-dark w-100">Moj nalog</a>
                        <a href="{{ route('product.contact') }}" class="btn btn-outline-info w-100">Kontakt</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>