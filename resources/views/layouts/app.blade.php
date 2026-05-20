<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

@yield('title')

</title>

<link
rel="stylesheet"
href="{{ asset('css/style.css') }}">

<script src="https://unpkg.com/@phosphor-icons/web"></script>

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

function setCookie(
name,
value,
days=30
){

let date=
new Date();

date.setTime(
date.getTime()
+
(days*24*60*60*1000)
);

document.cookie=
`${name}=${value};expires=${date.toUTCString()};path=/`;

}

function getCookie(
name
){

let data=
document.cookie
.split(';');

for(

let i=0;

i<data.length;

i++

){

let c=
data[i]
.trim();

if(

c.startsWith(
name+'='
)

){

return c.substring(
name.length+1
);

}

}

return null;

}

function deleteCookie(
name
){

document.cookie=
`${name}=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/`;

}

let mode=
getCookie(
'theme'
);

if(
mode==='dark'
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

let font=
getCookie(
'font'
);

if(
font
){

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

}

</script>

</head>

<body>

@include('partials.navbar')

@if(session('success'))

<div class="alert-success">

{{ session('success') }}

</div>

@endif


@if(session('error'))

<div class="alert-error">

{{ session('error') }}

</div>

@endif


<main>

@yield('content')

</main>

@include('partials.footer')

<script src="{{ asset('js/script.js') }}"></script>

@stack('scripts')

<script>

const tombol=

document
.getElementById(
'toggleDark'
);

if(
tombol
){

tombol
.addEventListener(

'click',

function(){

document
.documentElement
.classList
.toggle(
'dark'
);

if(

document
.documentElement
.classList
.contains(
'dark'
)

){

setCookie(
'theme',
'dark'
);

}

else{

setCookie(
'theme',
'light'
);

}

}

);

}

</script>

</body>

</html>
