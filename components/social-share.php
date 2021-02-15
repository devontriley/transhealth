<?php 
    $title = get_the_title();
    $urlTitle = urlencode($title); 
?>

<div class="module-flush share-module">
    <div class="inner">
        <p class="title">Share to Social</p>

        <ul class="social-sharing">
            <li>
                <a class="share-item facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" aria-label="Share on Facebook: <?php echo $title ?>">
                    <svg aria-hidden="true" class="fb" viewbox="0 0 12 24">
                        <use xlink:href="#fb-icon"></use>
                    </svg>
                </a>
            </li>

            <li>
                <a class="share-item twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&text=<?php $urlTitle ?>" aria-label="Share on Twitter: <?php echo $title ?>">
                    <svg aria-hidden="true" class="twitter" viewbox="0 0 16 16">
                        <use xlink:href="#twitter-icon"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>