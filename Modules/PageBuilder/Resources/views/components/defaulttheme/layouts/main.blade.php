<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('meta')
        <title>{{$title??'PageBuilder Module'}}</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/pagebuilder.css') }}"> --}}
       @stack('styles')
    </head>
    <body>
        @component('pagebuilder::components.defaulttheme.partials.header')

        @endcomponent
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/pagebuilder.js') }}"></script> --}}
        @stack('scripts')
    </body>
</html>
