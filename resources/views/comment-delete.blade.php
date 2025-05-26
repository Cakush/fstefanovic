<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Obrisi Komentar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <div class="card-body">
                            <p>Da li ste sigurni da zelite da obrisete komentar <b>"{{ $comment->comment }}"</b>?</p>
                            <form action="{{ route('comment.destroy', $product->id) }}" method="post">
                                @csrf 
                                <button type="submit" class="btn btn-danger m-2">Obrisi</button>
                                <a href="{{ route('product.list', ) }}" class="btn btn-secondary m-2">odustani</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
