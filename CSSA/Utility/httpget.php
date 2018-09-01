<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var latX='37.7752315', latY = '-122.418075', lngX = '37.7752415', lngY = '-122.518075';
var result;
$.post( "uber.php",
	{
		latX,
		latY,
		lngX,
		lngY
	},
	function( data, status ) {
		console.log(data);
		result = JSON.parse(data);

		$( "body" )
		.append("Res  " + result.prices[0].estimate);
	}
);

</script>
</head>
<body>

<button>Pop UP</button>

</body>
</html>



