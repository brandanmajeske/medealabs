$('#search').keyup(function() {
	var searchField = $('#search').val();
	var myExp = new RegExp(searchField, "i");
	$.getJSON('uploads/temp/results.json', function(data){
	console.log(data)
	var output = '<ul class="searchresults">';
	$.each(data, function(key, val){
		if ((val.proj_title.search(myExp) != -1) || (val.proj_desc.search(myExp) != -1) || (val.proj_cat.search(myExp) != -1)) {
			output += '<li class="clearfix">';
			output += '<a href="project.php?id='+val.proj_id+'"><img class="img-polaroid" width="200" src="uploads/'+ val.proj_file +'" alt="'+val.proj_title+'" /></a>';
			output += '<a href="project.php?id='+val.proj_id+'"><h4>'+ val.proj_title + '</h4></a>';
			output += '<p>'+val.proj_desc+'</p>';	
			output += '</li>';
		}
	});
	output += '</ul>';
	$('#update').html(output);
	});// get JSON
});

//<a href="project.php?id='.$proj_id.'">