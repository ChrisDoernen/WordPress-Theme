<div class="card-events">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-2 ">
            <? if($url != "") {?>
                <a href="<?php echo $link; ?>" >
                    <img class="img-responsive <? if($eventIsOver){echo ' event-is-over';} ?>" src="<?php echo $url; ?>"></img>
                </a>
            <?}?>
    	</div>
        <div class="col-sm-6 ">
            <h5 class="card-events__date <? if($eventIsOver){echo ' event-is-over';}?>"><?php echo $datetime; ?></h5>
            <a href="<?php echo $link; ?>" >
                <h3 class="card-events__title <? if($eventIsOver){echo ' event-is-over';}?>" <?php echo $style; ?>><?php echo $title; ?></h3>
            </a>
            <a class="card-events__more" href="<?php echo $link; ?>" >
                <span class="<? if($eventIsOver){echo ' event-is-over';}?>">mehr Infos</span>
            </a>
        </div>
    </div>
</div>