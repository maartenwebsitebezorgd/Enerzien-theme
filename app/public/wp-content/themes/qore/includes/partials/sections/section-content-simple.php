<?php
$group = get_sub_field('content_simple');
$maxwidth = !empty($group['maxwidth']) ? $group['maxwidth'] : 'max-w-prose';
?>

<section class="padding-section-small overflow-hidden">
    <div class="container">
        <div class="mx-auto prose-xl prose-ul:list-disc <?php echo $maxwidth; ?>">
            <?php echo the_content_more($group['body']); ?>
        </div>
    </div>
</section>