<!DOCTYPE html>
<html>
    <head>
        <title>회원정보</title>
    </head>
    <body>
        <div id="account" data-id="{{ $email }}">
            <account></account>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
