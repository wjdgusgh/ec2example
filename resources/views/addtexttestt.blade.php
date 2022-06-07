<html>
    <head>
        <script>
            window.onload = function () {
                var canvas = document.getElementById("canvas");
                var context = canvas.getContext("2d");
                context.font = "20px Georgia";
                var ele = document.getElementById("contentToWrite1");
                var ele1 = document.getElementById("contentToWrite2");
                if (ele.textContent) {
                    // for firefox
                    context.fillText(ele.textContent, 10, 90);
                    context.fillText(ele1.textContent, 10, 110);
                } else {
                    // for other browser
                    context.fillText(ele.innerText, 10, 90);
                    context.fillText(ele1.innerText, 10, 110);
                }
            }
            function exportImage() {
                var img = document.getElementById("exportedImage");
                img.src = canvas.toDataURL('image/png');
            }
        </script>
        <style>
        </style>
    </head>
    <body>
        <h2>Text</h2>
        <div id="contentToWrite1" style="border: solid 1px gray; padding: 5px;">
        first line
        </div>
        <br/>
        <br/>
        <div id="contentToWrite2" style="border: solid 1px gray; padding: 5px;">
        second line
        </div>
        <h2>Canvas</h2>
        <canvas id="canvas" width="200" height="200" style="border: solid 1px gray;">
            <canvas id="testimg"></canvas>
        </canvas>
        <br />
        <h2>Exported Image</h2>
        <img id="exportedImage" width="200" height="200" src="#" />
        <br />
        <input type="button" name="name" value="export canvas to image" onclick="exportImage();"/>
    </body>
</html>
