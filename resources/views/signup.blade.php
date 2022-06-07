<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>회원가입 테스트</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <div id="signup">
            <sign-up></sign-up>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
