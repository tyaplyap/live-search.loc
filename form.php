<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Живой поиск по тайпингу | Live Search</title>	
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --><!-- bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"> --><!-- bootstrap-theme CSS -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"> --><!-- bootstrap icons -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- jQuery -->
		<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --><!-- summernote CSS -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --><!-- summernote JS -->
		<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --><!-- bootstrap js -->
		<style>
			.style{
				
			}
		</style>
	</head>
	<body>
		<div class="search_box">
			<form method="post">
				<input type="text" name="search" id="search" placeholder="Введите город" autocomplete="off">
				<input type="submit">			
			</form>
			<div id="search_box-result"></div>
		</div>
		<script>
			$(document).ready(function() {	
			var $result = $('#search_box-result');
			
			$('#search').on('keyup', function(){
				var search = $(this).val();
				if ((search != '') && (search.length > 1)){
					$.ajax({
						type: "POST",
						url: "/ajax_search.php",
						data: {'search': search},
						success: function(msg){
							$result.html(msg);
							if(msg != ''){	
								$result.fadeIn();
							} else {
								$result.fadeOut(100);
							}
						}
					});
				 } else {
					$result.html('');
					$result.fadeOut(100);
				 }
			});
		 
			$(document).on('click', function(e){
				if (!$(e.target).closest('.search_box').length){
					$result.html('');
					$result.fadeOut(100);
				}
			});
			
			$(document).on('click', '.search_result-name a', function(){
				$('#search').val($(this).text());
				$result.fadeOut(100);
				return false;
			});
			
			$(document).on('click', function(e){
				if (!$(e.target).closest('.search_box').length){
					$result.html('');
					$result.fadeOut(100);
				}
			});
			
		});
		</script>
	</body>
</html>