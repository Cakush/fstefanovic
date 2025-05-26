<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Obriši Kategoriju') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <div class="card-body">
                            <form action="{{ route('category.destroy', 0) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Izaberi kategoriju za brisanje:</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="" disabled selected>Izaberi kategoriju</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger m-2">
                                    Obrisi
                                </button>
                                <a href="{{ route('product.list') }}" class="btn btn-secondary m-2">Odustani</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>