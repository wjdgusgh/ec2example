<!DOCTYPE html>
<html>
<head>
    <title>Add text to image</title>
    <script type='text/javascript'>
        var text_title ="Overlay text";
        var imageLoader = document.getElementById('imageLoader');
        imageLoader.addEventListener('change', handleImage, false);
        var canvas = document.getElementById('imageCanvas');
        var ctx = canvas.getContext('2d');
        var img = new Image();
        img.crossOrigin="anonymous";

        window.addEventListener('load', DrawPlaceholder)

        function DrawPlaceholder() {
            img.onload = function() {
                DrawOverlay(img);
                DrawText();
                DynamicText(img)
            };
            img.src = 'https://unsplash.it/400/400/?random';
        }
        function DrawOverlay(img) {
            ctx.drawImage(img,0,0);
            ctx.fillStyle = 'rgba(30, 144, 255, 0.4)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }
        function DrawText() {
            ctx.fillStyle = "white";
            ctx.textBaseline = 'middle';
            ctx.font = "50px 'Montserrat'";
            ctx.fillText(text_title, 50, 50);
        }
        function DynamicText(img) {
            document.getElementById('name').addEventListener('keyup', function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                DrawOverlay(img);
                DrawText();
                text_title = this.value;
                ctx.fillText(text_title, 50, 50);
            });
        }
        function handleImage(e) {
            var reader = new FileReader();
            var img = "";
            var src = "";
            reader.onload = function(event) {
               img = new Image();
               img.onload = function() {
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img,0,0);
                }
                img.src = event.target.result;
                src = event.target.result;
                canvas.classList.add("show");
                DrawOverlay(img);
                DrawText();
                DynamicText(img);
            }

            reader.readAsDataURL(e.target.files[0]);

        }
        function convertToImage() {
	        window.open(canvas.toDataURL('png'));
        }
        document.getElementById('download').onclick = function download() {
	    	convertToImage();
        }

    </script>
    <style rel="stylesheet">
        body {
            background: #222;
            color: #fff;
            position: relative;
            text-align: center;
            font-size: 1rem;
            font-family: sans-serif;
            padding-bottom: 3em;
}

.page-wrap {
  display: inline-block;
  margin: 2em auto;
}

.controls__input {
  display: block;
  margin: 0 auto;
  background: none;
  border: none;
  font-size: 1em;
  padding-bottom: 0.5em;
  border-bottom: 2px solid #ccc;
  text-align: center;
  outline: none;
  color: #fff;
}
.controls__btn {
  background: dodgerblue;
  color: #fff;
  border: none;
  font-size: 1em;
}
.controls__label {
  display: block;
  font-size: 0.8em;
  padding-top: 0.3em;
  margin-bottom: 2em;
}

canvas {
  background-color: #eee;
  transition: opacity 0.3s;
}
canvas.show {
  opacity: 1;
}

.canvas-wrap {
  margin-top: 50px;
  position: relative;
}

.canvasID {
  z-index: 9999;
}
    </style>
</head>

<body>
    <h1>Overlay text on canvas image and save as base64</h1>
    <div class="page-wrap">
        <div class="controls">
            <input class="controls__input" type="file" id="imageLoader" name="imageLoader"/>
            <label class="controls__label" for="name">First, choose an image.</label>

            <input class="controls__input" id="name" type="text" value=""/>
            <label class="controls__label" for="name">Overlay Text</label>
        </div>
        <div id="canvas-wrap">
            <canvas style="display:block" id="imageCanvas">
                <canvas id="canvasID"></canvas>
            </canvas>
        </div>
        <button id="download" value="download">download</button>
    </div>
</body>
</html>
