<div class="card__sermon">
    <div class="card__sermon-infos clearfix">
        <span class="card__sermon-date">
            <?php echo date_format($sermon['date'], 'd. m. Y'); ?>
        </span>
        <span class="card__sermon-dash">
            &#8211;
        </span>
        <span class="card__sermon-preacher">
            <?php echo $sermon['preacher']; ?>
        </span> 
        <span class="card__sermon-dash">
            &#8211;
        </span>
        <span class="card__sermon-title">
            <?php echo $sermon['title']; ?>
        </span>
        <div class="card__sermon-interact pull-right">
            <a href="http://podcast.arche-augsburg.de/<?php echo $sermon['fileName']; ?>">download</a>
        </div>
    </div>
</div>
