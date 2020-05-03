<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

</head>

<body>

	<input  id="lol" type="button" value="12345">


	<script>
		$(document).ready(function(){
			$('#lol').click(function(){

				//console.log('ok');
				$.ajax({
					url: "/check",
					method: "post",
					data: {val: 113},
					success: function(result){
						console.log(result);
					}
				});
			});

		});
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>