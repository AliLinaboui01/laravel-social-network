@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    <title>First App | {{ $title }}</title>
</head>

<body>
    @include('profile.partials.nav')
    <div class="container">
        <main>
            <div class="row my-3">
                @include('profile.partials.flashbag')
            </div>
            {{ $slot }}
        </main>
    </div>
    @include('profile.partials.footer')
</body>

</html>
