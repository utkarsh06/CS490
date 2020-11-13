$(function(){
	$(document).on('click', '.t-show-popup', function(){
		var tweet_id = $(this).data('post');
	    $.post('http://localhost/twitterclone/core/ajax/popupposts.php', {showpopup:tweet_id}, function(data){
	    //$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/popupposts.php', {showpopup: tweet_id}, function(data){
			$('.popupPost').html(data);
			$('.tweet-show-popup-box-cut').click(function(){
				$('.tweet-show-popup-wrap').hide();
			
			});
		});
	});
});