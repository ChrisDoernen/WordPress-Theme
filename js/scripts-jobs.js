
(function($){
	$('#filter').submit(function(){
	    jobs_query(false);
	    return false;
	});

    $( '#load-more' ).click( function() {
        event.preventDefault();
        jobs_query(true);
        return false;
    });
    
    $( document ).ready(function() {
        jobs_query(false);
    });
    
    $( document ).ajaxError(function( event, jqxhr, settings, exception ) {  
        alert( "Triggered ajaxError handler." );  
    }); 

    function jobs_query(isLoadMoreCall){
        $('.jobs-display-count').addClass('hidden')
        $('#load-more').addClass('hidden')
    	var filter = $('#filter');
    	var ajaxData = filter.serialize(); // form data
    	var postsLoaded = filter.attr('actual-loaded-posts');
    	var loadPosts = filter.attr('default-loaded-posts');
    	
    	if (!isLoadMoreCall)
    	{
    	    $('#jobs-container').html('');
    	    filter.attr('actual-loaded-posts', '0');
    	    var postsLoaded = 0;
    	}
    	else
    	{
    	   ajaxData += "&post_offset=" + postsLoaded;
    	}
    	
    	ajaxData += "&post_per_page=" + loadPosts;
    
    	var ajaxUrl = filter.attr('action');
    	var ajaxType = filter.attr('method');
    	
    	jQuery.ajax({
    		url: ajaxUrl,
    		data: ajaxData, 
    		type: ajaxType,
    		dataType: 'json',
    		
    		beforeSend:function(xhr){
    		    // show load animation
    		},
    		success:function(data){
    			$('#jobs-container').append(data[0]); // insert data
    			var postsLoadedNew = parseInt(postsLoaded) + parseInt(data[1]);
    			filter.attr('actual-loaded-posts', postsLoadedNew);
    			if (postsLoadedNew < data[2]){
    			    $('#load-more').removeClass('hidden')
    			}
    			$('.jobs-display-count__currently-loaded').html(postsLoadedNew);
    			$('.jobs-display-count__total').html(data[2]);
    		},
    		error: function (data) {
    		    alert("error");
            },
            complete: function() {
                $('.jobs-display-count').removeClass('hidden');
            }
    	});
    }

})(jQuery);