$(function(){
 $('.search').keyup(function(){
 	var search = $(this).val();
 	$.post('http://localhost/twitterclone/core/ajax/search.php', {search:search}, function(data){
  //$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/search.php', {search:search}, function(data){
 		$('.search-result').html(data);

 	});
  });

 $(document).on('keyup', '.search-user', function(){
 	$('.message-recent').hide();
 	var search = $(this).val();
 	$.post('http://localhost/twitterclone/core/ajax/searchUserInMsg.php', {search:search}, function(data){
  //$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/searchUserInMsg.php', {search:search}, function(data){
 		$('.message-body').html(data);
 	});

  });
});