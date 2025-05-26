<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proizvod') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">{{ $product->name }}</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-success">{{ number_format($product->price, 2) }} RSD</h4>
                            <p class="card-text"><strong>Kategorija:</strong> {{ $product->category->name ?? '-' }}</p>
                            <p class="card-text"><strong>Opis:</strong> {{ $product->description }}</p>
                            <p class="card-text text-muted"><small>Kreirano: {{ $product->created_at->format('d.m.Y. H:i') }}</small></p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('product.list') }}" class="btn btn-secondary btn-sm">Nazad na listu</a>
                        </div>
                        <hr>
                        <h5>Komentari:</h5>
                        @if($product->comments->count())
                            @foreach($product->comments as $comment)
                                <div class="mb-2 p-2 border rounded">
                                    <strong>{{ $comment->user->name ?? 'Nepoznat korisnik' }}</strong>:
                                    <span>{{ $comment->comment }}</span>
                                    <div class="text-muted" style="font-size: 0.9em;">
                                        {{ $comment->created_at->format('d.m.Y. H:i') }}
                                    </div>
                                    @if(auth()->user()->role->name === 'admin')
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Nema komentara za ovaj proizvod.</p>
                        @endif
                        <form action="{{ route('comment.store', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-3">
                                <label for="comment" class="form-label">Dodaj komentar:</label>
                                <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Pošalji</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>