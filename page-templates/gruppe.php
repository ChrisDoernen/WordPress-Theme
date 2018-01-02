<?php /* Template Name: Gruppe */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
    
    <?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-sub-page.php'); ?>
    
    <section class="content section section--less-margin background-white diagonal-top diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                	<div class="row">
                		<div class="col-xs-12">
							<div class="">
								 <h1 class='left'><?php echo get_the_title();?></h1>
							</div>
						</div>
	                </div>
					<div class="row">
						<div class="col-xs-12 page__content">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="" class="contact background-grey">
		<div class='background'>
			<i class="background__icon fa fa-paper-plane fa-5x"></i>
		</div>
		<div class='container container-ms'>
	        <div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="">
						<h2 class="section__heading centered">
						
							<?php
							    if($siteId==25)
							    {
							        echo "Haben sie Fragen?";
							    }
							    else
							    {
							         echo "Hast du Fragen?";
							    }
							?>
						</h2>
						<h3 class="section__subheading"></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
					<div class="row">
						<?php 
                    		if (rwmb_meta('ctdn_authorleader_image') != "") 
                    		{
                                $args = array('size' => 'medium','type' => 'image');
                                $images = rwmb_meta('ctdn_authorleader_image', $args);
                    			if (!empty($images )) 
                    			{
                    				$imageUrl = reset($images)['url'];
                    			    include (get_template_directory().'/contact-avatar.php');
                                }
                            }
                        ?>
					</div>
					<div class="row">	
						<div class="col-xs-12 ">
							<div class='centered'>
								<a href="<?php echo esc_url(home_url( '/' )).'kontakt'.rwmb_meta('ctdn_contact_get_parameter').'#form';?>" class="btn btn-default" role="button">
    								<?php
        								if($siteId==25)
        							    {
        							        echo "Kontakt";
        							    }
        							    else
        							    {
        							         echo "Schreib' uns";
        							    }
        							?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id='dabeiSein' class='background-white centered section--less-margin diagonal-top'>
	    <div class='container container-ms'>
	        <div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="">
						<h6 class="section__heading">Weitere
							<?php 
								if ( $post->post_parent == '81'){
									$cd_text = " Gruppen";
									$cd_link = "dabei-sein";
									$parentId = 81;
								}
								else if ( $post->post_parent == '85'){
									$cd_text = " Themen";
									$cd_link = "dein-naechster-schritt";
									$parentId = 85;
								}
								echo $cd_text;
							?>
						</h6>
						<h3 class="section__subheading"></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
			        <div class="row">
    				    <?php
							$ppp = $numberContentCards;
							$anz = 0;
							
							$related_pages = rwmb_meta ('ctdn_related_pages');
							
							if (!empty ($related_pages)) 
							{
								$anz = count ($related_pages);
								if ($anz == 3 && $ppp == 2)
								{
								    array_pop($related_pages);
								    $anz = count ($related_pages);
								}
								
								$ppp = $numberContentCards - $anz;
								
								$post_in = array();
								
								foreach ($related_pages as $key => $path) 
								{
									$postId = get_id_by_slug ($path, 'page');	
									$post_in[$key] = $postId;
								}
								
								$argu = array (
									'post_type' => 'page',
									'post__in' => $post_in,
									'orderby' => 'post__in',
								);
								
								$the_query1 = new WP_Query ($argu);
			
								if ($the_query1->have_posts()) 
								{
									while ($the_query1->have_posts()) 
									{
										$the_query1->the_post();
										include (get_template_directory()."/card-pages.php");
									}
								    wp_reset_postdata();
								} 
								else 
								{
									echo "keine verwandten pages"; // no posts found
								}
								
							} //Ende if !empty related posts
		
			    			//$post_in[$anz] = $siteId;
			    			
		    				if ($ppp > 0)
		    				{
    							$argu = array (
    								'post_type' => 'page',
    								'post_parent' => $parentId,
    								'posts_per_page' => $ppp,
    								'post__not_in' => $post_in,
    								'orderby' => 'menu_order',
    								'order' => 'ASC',
    							);
    							
    							$the_query = new WP_Query ($argu);
    		
    							if ($the_query->have_posts()) 
    							{
    								while ($the_query->have_posts()) 
    								{
    									$the_query->the_post();
    									include (get_template_directory()."/card-pages.php");
    								}
    							    wp_reset_postdata();
    							} 
    							else 
    							{
    								echo ""; // no posts found
    							}
		    				}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<a href="<?php echo esc_url( home_url( '/' ) ).$cd_link; ?>" class="btn btn-default" role="button">Alle<?php echo $cd_text; ?></a>
				</div>
			</div>
	    </div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>