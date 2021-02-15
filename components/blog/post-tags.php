<div class="post_tags">
    <?php foreach ( $tags as $tag ): ?>
        <?php $tag_link = get_tag_link( $tag->term_id ) ?>
                
        <a href='<?php echo $tag_link ?>' title='<?php echo $tag->name ?> Tag' class='<?php echo $tag->slug ?>'>
            <?php echo $tag->name ?>
        </a>
    <?php endforeach; ?>
</div>