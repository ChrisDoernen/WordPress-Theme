<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>

    <section id="intro" class="section section--less-margin background-white centered diagonal-top">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
					<div class="row">
                        <div class="col-xs-12 left">
                            <?php
                                $sermonDirectory = get_home_path().'/../live_podcast/*/*.mp3';
                                $sermons = [];
                                
                                foreach(glob($sermonDirectory) as $file) {
                                    $split = explode("_", basename($file));
                                    $sermon['date'] = date_create_from_format('Y-m-d', $split[0]);
                                    $sermon['preacher'] = $split[1];
                                    $sermon['fileName'] = basename($file);
                                    $sermon['title'] = explode(".", $split[2])[0];
                                    
                                    array_push($sermons, $sermon);
                                }
                                
                                rsort($sermons);
                                
                                foreach($sermons as $sermon) {
                                    include (get_template_directory().'/card-sermon.php');
                                }
                            ?>
                        </div>
                    </div>
				</div>
			</div>	
		</div>
	</section>
 
	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>
