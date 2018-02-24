<?php global $posts;?>
<main class="feed-page page">
    <div class="container">
        <div class="flex">
            <div class="col-2"></div>
            <div class="feed">
                <?php require 'modules/feed.php';
                    $posts->feed($posts->feedGetPostsArray(), null);
                ?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</main>