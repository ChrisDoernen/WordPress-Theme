// post love snippet for cards
            <? $love = get_post_meta( $post->ID, "_post_like_count", true ); if($love > 0){?>
                <span class="post-love"><i class="fa fa-heart"></i> <? echo $love; ?></span>
            <?}?>