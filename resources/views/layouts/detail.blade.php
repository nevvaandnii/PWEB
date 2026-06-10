<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>

        function getCookie(name){

            let data = document.cookie.split(';');

            for(let i = 0; i < data.length; i++){

                let c = data[i].trim();

                if(c.startsWith(name + '=')){

                    return c.substring(name.length + 1);

                }

            }

            return null;

        }

        let mode = getCookie('theme');

        if(mode === 'dark'){

            document.documentElement.classList.add('dark');

        }
        else{

            document.documentElement.classList.remove('dark');

        }

    </script>
</head>
<body>

<main>
    @yield('content')
</main>

</body>
</html>
