<?php
$group = get_sub_field('featured_services');
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-medium';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-medium';
?>

<section class="<?php echo $padding_top ?>  <?php echo $padding_bottom ?>">
    <div class="container"></div>
    <h1>
        <?php echo $group['title']; ?>
    </h1>
    </div>
</section>