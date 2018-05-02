<!DOCTYPE html>
<html lang="id">

    <head>
        {!! meta_init() !!}
        <meta name="keywords" content="@get('keywords')">
        <meta name="description" content="@get('description')">
        <meta name="author" content="@get('author')">

        <title>{{ $wedding->groom_nick }} and {{ $wedding->bride_nick }}'s Wedding | EsriveInvitation</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/img/esrive/logo-box-dark-36x36px.png') }}">

        @styles()

    </head>

    <body>
        @partial('header')

        @content()

        @partial('footer')

        @scripts()
    </body>

</html>
