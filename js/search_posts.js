$('#search').keyup(function(){
	var searchField = $('#search').val();
	var myExp = new RegExp(searchField, "i");
	$.ajax({
		url: 'uploads/temp/results.json',
		dataType: 'json',
		success: function (data){
				console.log(data);
				var output = '<ul class="searchresults">';
				$.each(data, function(key, val){
				if ((val.post_title.search(myExp) != -1) || (val.post_text.search(myExp) != -1)) {
				output += '<li class="clearfix">';
				output += '<a href="project.php?id='+val.proj_id+'"><img class="img-polaroid" width="200" src="uploads/'+ val.post_file +'" alt="'+val.post_title+'" /></a>';
				output += '<a href="project.php?id='+val.proj_id+'"><h4>'+ val.post_title + '</h4></a>';
				output += '<p>'+val.post_text+'</p>';	
				output += '</li>';
				}
				});
				output += '</ul>';
				$('#update').html(output);
				},
			error: function(data){
			alert('Uh-oh! Something is wrong! That search isn\'t going to work. Please try again later.');
		}
	});// end ajax	
});

