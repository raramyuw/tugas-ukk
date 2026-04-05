@forelse($orders as $item)
    @php
        $produk = json_decode($item->produk, true);
    @endphp

    <div class="card mb-3 border-0 shadow-sm transaction-card" 
        data-status="{{ $item->status }}"
        data-produk="{{ strtolower($item->produk) }}">

        <div class="card-body p-4">
            <div class="row align-items-center">

                <div class="col-md-5">
                    <h5>
                        @foreach($produk ?? [] as $p)
                            {{ $p['nama'] }} ({{ $p['qty'] }}) <br>
                        @endforeach
                    </h5>
                </div>

                <div class="col-md-3">
                    @php $total = 0; @endphp
                    @foreach($produk ?? [] as $p)
                        @php $total += $p['harga'] * $p['qty']; @endphp
                    @endforeach

                    Rp {{ number_format($total,0,',','.') }}
                </div>

                <div class="col-md-2">
                    {{ $item->status }}
                </div>

                <div class="col-md-2">
                    <button onclick="updateStatus({{ $item->id }}, 'Selesai')">
                        Update
                    </button>
                </div>

            </div>
        </div>
    </div>

@empty
    <p>Tidak ada data</p>
@endforelse