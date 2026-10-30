<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'belajar aja' }}</title>
</head>

<body>
    <h1>Halooo</h1>
    <a href="{{ Route('pertambahan') }}">Pertambahan</a>
    <a href="{{ Route('perkurangan') }}">pengurangan</a>
    <a href="{{ Route('pembagian') }}">pembagian</a>
    <a href="{{ Route('perkalian') }}">perkalian</a>

    <a href="{{ url()->previous() }}">back</a>


    {{-- layouting --}}
    <main>
        {{-- directive --}}
        @yield('content')
    </main>
</body>

</html>
