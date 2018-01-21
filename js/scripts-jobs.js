
(function($){
	$('#filter').submit(function(){
	    jobs_query(false, 4);
	    return false;
	});

    $( '#load-more' ).click( function() {
        event.preventDefault();
        jobs_query(true, 4);
        return false;
    });
    
    $( document ).ready(function() {
        //jobs_query(false, 4);
    });
    
    $( document ).ajaxError(function( event, jqxhr, settings, exception ) {  
        alert( "Triggered ajaxError handler." );  
    }); 
})(jQuery);


function jobs_query(isLoadMoreCall, postOffset){
	var filter = jQuery('#filter');
	var ajaxData = filter.serialize(); // form data
	var postsLoaded = filter.attr('actual-loaded-posts');
	var loadPosts = filter.attr('default-loaded-posts');
	
	if (!isLoadMoreCall)
	{
	    jQuery('#jobs-container').html('');
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
		},
		success:function(data){
			jQuery('#jobs-container').append(data[0]); // insert data
			var postsLoadedNew = parseInt(postsLoaded) + parseInt(data[1]);
			filter.attr('actual-loaded-posts', postsLoadedNew);
		},
		error: function (data) {
		    alert("error");
        }
	});
}



function ajax_next_posts() {

    //How many posts there's total
    //var totalPosts = parseInt( jQuery( '#total-posts-count' ).text() );
    //How many have been loaded
    //var postOffset = jQuery( '.single-post' ).length;
    //How many do you want to load in single patch
    //var postsPerPage = 24;

    var postOffset = 4;

    //Hide button if all posts are loaded
    //if( totalPosts < postOffset + ( 1 * postsPerPage ) ) {

      //  jQuery( '#more-posts-button' ).fadeOut();
    //}

    //Change that to your right site url unless you've already set global ajaxURL
    var ajaxURL = 'https://arche-web-chrisdoernen.c9users.io/wp-admin/admin-ajax.php';

    //Parameters you want to pass to query
    var ajaxData = '&post_offset=' + postOffset + '&action=jobfilter';

    //Ajax call itself
    jQuery.ajax({

        type: 'POST',
        url:  ajaxURL,
        data: ajaxData,
        dataType: 'json',

        //Ajax call is successful
        success: function ( response ) {

            //Add new posts
            jQuery( '#jobs-container' ).append( response[0] );
            //Update the count of total posts
            //jQuery( '#total-posts-count' ).text( response[1] );

        },

        //Ajax call is not successful, still remove lock in order to try again
        error: function () {

        }
    });
}
