$(function(){
	$(document).on('click', '#postComment', function(){
		var comment  = $('#commentField').val();
		var tweet_id = $('#commentField').data('post');

		if(comment != ""){
			$.post('http://localhost/twitterclone/core/ajax/comment.php', {comment:comment, tweet_id:tweet_id}, function(data){
		  //$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/comment.php', {comment:comment, tweet_id:tweet_id}, function(data){
				$('#comments').html(data);
				$('#commentField').val("");

			});
		}
	});
});