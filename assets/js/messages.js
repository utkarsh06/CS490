$(function(){
	$(document).on('click', '#messagePopup', function(){
		var getMessages = 1; 
		$.post('http://localhost/twitterclone/core/ajax/messages.php', {showMessage:getMessages}, function(data){
			$('.popupPost').html(data);
			//$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/messages.php', {showMessage:getMessages}, function(data){
 		    //$('.popupPost').html(data);
		});
	});

	$(document).on('click', '.people-message', function(){
		var get_id = $(this).data('user');
		$.post('http://localhost/twitterclone/core/ajax/messages.php',{showChatPopup:get_id}, function(data){
			$('.popupPost').html(data);
			//$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/messages.php', {showChatPopup:get_id}, function(data){
 		    //$('.popupPost').html(data);
		});

		$.post('http://localhost/twitterclone/core/ajax/messages.php',{showChatMessage:get_id}, function(data){
			$('.main-msg-inner').html(data);
			//$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/messages.php', {showChatMessage:get_id}, function(data){
 		    //$('.main-msg-inner').html(data);
		});
	});
})