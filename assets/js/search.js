$(function(){
 $('.search').keyup(function(){
 	var search = $(this).val();
 	$.post('http://localhost/twitterclone/core/ajax/search.php', {search:search}, function(data){
 		$('.search-result').html(data);
 	//$.post('https://calm-ocean-67152.herokuapp.com/core/ajax/search.php', {search:search}, function(data){
 		//$('.search-result').html(data);
 	});
  });
});