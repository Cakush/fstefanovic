<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Izmeni Proizvod') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="d-flex flex-column gap-4" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Naziv</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripcija</label>
                        <textarea class="form-control" name="description" cols="30" rows="10">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Cena</label>
                        <input type="number" class="form-control" name="price" placeholder="1234567890" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kategorija</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Izmeni</button>
                </form>
                <a href="{{ route('product.list') }}" class="btn btn-secondary mt-2">Nazad</a>
            </div>
        </div>
    </div>
</x-app-layout>
