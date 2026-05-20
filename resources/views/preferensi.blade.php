@extends('layouts.app')

@section('title', 'Preferensi')

@section('content')
    <section class="preferensi">
        <h2>Pengaturan Tampilan</h2>

        <form id="prefForm">
            <label>Tema</label>
            <select name="tema">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
                <option value="system">System</option>
            </select>
            <br><br>

            <label>Ukuran Font</label>
            <select name="font">
                <option value="small">Kecil</option>
                <option value="medium">Sedang</option>
                <option value="large">Besar</option>
            </select>
            <br><br>

            <button type="submit">Simpan</button>
        </form>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('prefForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                let data = new FormData(this);

                const response = await fetch('/preferensi', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: data
                });

                if (!response.ok) {
                    throw new Error();
                }

                let tema =
data.get('tema');

let font =
data.get('font');

setCookie(
'theme',
tema
);

setCookie(
'font',
font
);

if(
tema==='dark'
){

document
.documentElement
.classList
.add(
'dark'
);

}

else if(
tema==='light'
){

document
.documentElement
.classList
.remove(
'dark'
);

}

else{

if(

window
.matchMedia(
'(prefers-color-scheme: dark)'
)
.matches

){

document
.documentElement
.classList
.add(
'dark'
);

}

else{

document
.documentElement
.classList
.remove(
'dark'
);

}

}

document
.documentElement
.style
.fontSize=

font==='small'

?

'14px'

:

font==='large'

?

'20px'

:

'16px';

alert(
'Preferensi tersimpan'
);
            } catch {
                alert('Gagal menyimpan');
            }
        });
    </script>
@endpush
