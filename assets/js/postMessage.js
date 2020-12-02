$(function(){
	$(document).on('click', '#send', function(){
		var message = $('#msg').val();
		var get_id  = $(this).data('user');
		$.post('http://localhost/twitterclone/core/ajax/messages.php', {sendMessage:message, get_id:get_id}, function(data){
		//$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/messages.php', {sendMessage:message, get_id:get_id}, function(data){
			getMessages();
			$('#msg').val('');
		});
	});
});