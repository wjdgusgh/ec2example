<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<style>
		canvas { border: solid 1px black; display: block; }
	</style>
	<script type='text/javascript'>

		var clsImage;
		var iCropLeft, iCropTop, iCropWidth, iCropHeight;

		// 로컬 이미지 파일을 Canvas 에 로드한다.
		function LoadImage()
		{
			if( typeof window.FileReader !== 'function' )
			{
				alert("FileReader is not supported");
				return;
			}

			var inputFile = document.getElementById('image_file');
			var clsFileReader = new FileReader();
			clsFileReader.onload = function(){
				clsImage = new Image();
				clsImage.onload = function(){
					var canvas = document.getElementById("canvas");
					canvas.width = clsImage.width;
					canvas.height = clsImage.height;

					iCropLeft = 100;
					iCropTop = 100;
					iCropWidth = (clsImage.width/100)*70;
					iCropHeight = (clsImage.height/100)*70;
					iImageWidth = clsImage.width;
					iImageHeight = clsImage.height;

					DrawCropRect();
					AddCropMoveEvent();
				};

				clsImage.src = clsFileReader.result;
			};

			clsFileReader.readAsDataURL(inputFile.files[0]);
		}

		// 로컬 이미지 파일과 Crop 을 위한 사각형 박스를 그려준다.
		function DrawCropRect()
		{
			var canvas = document.getElementById("canvas");
			var ctx = canvas.getContext("2d");

			ctx.drawImage( clsImage, 0, 0 );

			ctx.strokeStyle = "#ff0000";
			ctx.beginPath();
			ctx.rect( iCropLeft, iCropTop, iCropWidth, iCropHeight );
			ctx.stroke();
		}

		// 이미지를 crop 하여서 하단 Canvas 에 그려준다.
		function CropImage()
		{
			var canvas = document.getElementById("canvas");

			img = new Image();
			img.onload = function(){
				var canvas = document.getElementById("canvas_crop");
				canvas.width = iCropWidth;
				canvas.height = iCropHeight;
				var ctx = canvas.getContext("2d");
				ctx.drawImage( img, iCropLeft, iCropTop, iCropWidth, iCropHeight, 0, 0, iCropWidth, iCropHeight );
			};

			img.src = canvas.toDataURL();
		}

		// 마우스 이동에 따른 Crop 사각 박스을 이동하기 위한 이벤트 핸들러를 등록한다.
		function AddCropMoveEvent()
		{
			var canvas = document.getElementById("canvas");
			var bDrag = false;
			var iOldX, iOldY;
			var iCropLeftOld, iCropTopOld;

			canvas.onmousedown = function(e){
				bDrag = true;
				iOldX = e.clientX;
				iOldY = e.clientY;
				iCropLeftOld = iCropLeft;
				iCropTopOld = iCropTop;
			};

			canvas.onmousemove = function(e){
				if( bDrag == false ) return;

				var iX = e.clientX - iOldX;
				var iY = e.clientY - iOldY;

				iCropLeft = iCropLeftOld + iX;
				if( iCropLeft < 0 )
				{
					iCropLeft = 0;
				}
				else if( iCropLeft + iCropWidth > clsImage.width )
				{
					iCropLeft = clsImage.width - iCropWidth;
				}

				iCropTop = iCropTopOld + iY;
				if( iCropTop < 0 )
				{
					iCropTop = 0;
				}
				else if( iCropTop + iCropHeight > clsImage.height )
				{
					iCropTop = clsImage.height - iCropHeight;
				}

				DrawCropRect();
			};

			canvas.onmouseup = function(e){
				bDrag = false;
			};
		}

	</script>
</head>
<body>
	<input type='file' id='image_file' />
	<input type='button' value='Load' onclick='LoadImage();' />
	<canvas id="canvas"></canvas>

	<input type='button' value='Crop' onclick='CropImage();' />
	<canvas id="canvas_crop"></canvas>
</body>
