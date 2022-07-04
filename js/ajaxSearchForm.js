	$(document).ready(function() {
					
		let $searchResult = $('#search-results');
				
		$('#search').on('keyup', function(){
					
			// Каждый раз, когда кнопка будет отпущена в процессе ввода поискового запроса,
			// текст будет записываться в переменную search
			let search = $(this).val(); 
					
			if ((search != '') && (search.length > 1)){
				$.ajax({
					method: 'POST',
					url: '/',
					data: {'articles': search},
					
					// В случае успешного запроса, ответ от обрабочика 
					// будет помещен в переменную response		
					success: function(response){
						$searchResult.html(response);
						
						if(response != ''){	
							$searchResult.fadeIn();
						} else {
							$searchResult.fadeOut();
						}
					}
				});
			} else {
				$searchResult.html('');
				$searchResult.fadeOut();
			}
		});
	});