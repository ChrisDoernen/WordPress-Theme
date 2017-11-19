<?php
	$siteId = get_the_ID();
	$slug = basename(get_permalink());
	$cats = get_the_category($siteId);
	$authorId = get_post_field('post_author', $siteId);
	$postType = get_post_type();
	$numberContentCards = 2;
	
	if (!empty($cats)) 
	{
	    $cat_slug = esc_html($cats[0]->slug);
	    $cat_name = esc_html($cats[0]->name);
	}
	
	function get_id_by_slug($page_slug, $post_type) 
	{
	    //$postType = array ('page', 'post');
	    $post = get_page_by_path($page_slug, OBJECT, $post_type);
	    if ($post) 
	    {
	        return $post->ID;
	    } else 
	    {
	        return null;
	    }
	}
	
	// Include and instantiate the class.
	require_once 'mobile-detect.php';
	$detect = new Mobile_Detect;
	
	// Any mobile device (phones or tablets).
	if ($detect->isMobile()) 
	{
		// Any tablet device.
		if ($detect->isTablet())
		{
			$imageSize = "large";
			$isTablet = true;
			$numberContentCards = 3;
			$numberOfPosts = 6;
		} 
		else 
		{
			$imageSize = "large";
			$isMobilePhone = true;
			$numberContentCards = 2;
			$numberOfPosts = 4;
		}
	} 
	else 
	{
		//Desktop Devices
		$imageSize = "full";
		$numberContentCards = 3;
		$numberOfPosts = 5;
	}
?>