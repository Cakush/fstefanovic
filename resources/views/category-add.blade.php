<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj novu kategoriju
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 rounded shadow-sm">
                <form action="{{ route('category.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Naziv kategorije</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                    <a href="{{ route('product.list') }}" class="btn btn-secondary m-2">odustani</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>