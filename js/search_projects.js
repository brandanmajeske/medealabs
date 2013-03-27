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
				},
		error: function(data){
		alert('Uh-oh! Something is wrong! That search isn\'t going to work. Please try again later.');
		}
	});// end ajax	
});