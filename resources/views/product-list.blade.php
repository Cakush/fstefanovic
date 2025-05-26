<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proizvodi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-striped table-bordered align-middle">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <thead class="table-dark">
                        <tr>
                            <td>ID</td>
                            <td>Naziv</td>
                            <td>Cena</td>
                            <td>Kategorija</td>
                            <td>Korisnik</td>
                            <td>Slika</td>
                            <td colspan="3" class="text-center">Opcije</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>slika za sad</td>
                                <td><a href="{{ route('product.single', $product->id) }}" class="btn btn-primary">Opsirnije</a></td>
                                @if(auth()->user()->role->name === 'admin')
                                    <td><a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Obrisi</a></td>
                                    <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">Izmeni</a></td>
                                @elseif(auth()->user()->role->name === 'edit')
                                    <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">Izmeni</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('product.add') }}" class="btn btn-primary mt-2">Dodaj proizvod</a>
            @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'edit')
            <a href="{{ route('category.add') }}" class="btn btn-secondary mt-2">Dodaj kategoriju</a>
            <a href="{{ route('category.delete') }}" class="btn btn-danger mt-2">Obrisi kategoriju</a>
            @endif

        </div>
    </div>
</x-app-layout>
