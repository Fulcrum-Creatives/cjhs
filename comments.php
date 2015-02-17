<?php comment_form(); ?>
<ol class="commentlist">
    <?php wp_list_comments(); ?>
</ol>
<div class="navigation">
    <?php paginate_comments_links(); ?> 
</div>