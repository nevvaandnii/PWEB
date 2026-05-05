<!DOCTYPE html>
<html>
<head>
    <title>App</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    @include('partials.navbar')

    @if(session('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
