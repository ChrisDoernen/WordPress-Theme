    <?php include ('frontend-functions.php'); ?>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php
        if ($siteId == 580)
        {
            echo '<meta name="viewport" content="width=1120, user-scalable=yes">';
        }
        else 
        {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
        }
    ?>
    
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php if ( is_singular() && pings_open() ) { ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php } ?>
    <?php wp_head(); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php include ('ga.php'); ?>
