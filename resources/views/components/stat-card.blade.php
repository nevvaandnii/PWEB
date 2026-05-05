<div class="card" onclick="flipCard(this)">
    <div class="card-inner">
        <div class="card-front" style="border-top: 5px solid {{ $warna }}">
            <i class="{{ $ikon }}"></i>
            <h3>{{ $judul }}</h3>
            <p>{{ $nilai }}</p>
        </div>

        <div class="card-back">
            <h4>Detail</h4>
            <p>{{ $slot }}</p>
        </div>

    </div>
</div>
