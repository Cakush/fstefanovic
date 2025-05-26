<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontakt') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Kontakt informacije</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Adresa:</strong> 8121 Sloughhouse Rd, Elk Grove, CA 95624, USA
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> <a href="mailto:info@firma.com">info@firma.com</a>
                            </div>
                            <div class="mb-3">
                                <strong>Telefon:</strong> <a href="tel:+1234567890">+1 234 567 890</a>
                            </div>
                            <div class="mb-3">
                                <strong>Lokacija na mapi:</strong>
                                <div class="ratio ratio-16x9 mt-2">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3124.1216086529457!2d-121.23976291090935!3d38.46175369964342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809aeaedefb40001%3A0x9a6a99d77c5f425!2s8121%20Sloughhouse%20Rd%2C%20Elk%20Grove%2C%20CA%2095624%2C%20USA!5e0!3m2!1sen!2srs!4v1748283756739!5m2!1sen!2srs"
                                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('product.list') }}" class="btn btn-secondary btn-sm">Nazad na proizvode</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>