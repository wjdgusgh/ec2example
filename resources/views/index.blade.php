<!DOCTYPE html>
<html>
    <head>
        <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous">
        </script>
        <title>route sample</title>
    </head>
    <body>
        test page
        <button onclick="onClick()">테스트 입니다ㅏㅏㅏ</button>
        <script>
            function onClick() {
                // () => {} == function() {}
                $.ajax('/api/json')
                    .done(({name, initial}) => {
                        console.log(name + " " + initial);
                    })
                    .fail(function(e) {
                        console.log(e);
                    });
            }
        </script>
    </body>
</html>
