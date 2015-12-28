$(function(){
	var fx = {
		"initModal" : function(){
			if($(".modal-window").length == 0){
				$("<div>").attr("id", "jquery-overlay")
				          .fadeIn(2000).appendTo("body");
				return $("<div>").addClass("modal-window")
				                 
								 .fadeIn(2000).appendTo("body");
			}
			else{
				return $(".modal-window");
			}
		}
	}
	
	$('.pic').bind('click', function(e){
		e.preventDefault();
		data = $(this).attr('data_id');
		modal = fx.initModal();
		$("<a>").attr("href", "#")
		        .addClass("modal-close-btn")
				.html("&times")
				.click(function(e){
					e.preventDefault();
					modal.fadeOut('2000', function(){
						$(this).remove();
					})
					
					$('#jquery-overlay').fadeOut('2000', function(){
					$(this).remove();
					});
				})
				.appendTo(modal);
		$.ajax({
			url: "ajax.php",
			type: "Post",
			data: "id="+data,
			success: function(data){
				modal.append(data);
			},
			error: function(msg){
				modal.append(msg);
			}
		});
		
	});
});
		