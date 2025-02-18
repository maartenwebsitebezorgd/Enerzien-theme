<?php
$group = get_sub_field('text_test');
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-medium';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-medium';
?>

<section class="<?php echo $padding_top ?> <?php echo $padding_bottom ?>">
    <div class="container">
      <h1>
        <?php echo $group['test title']; ?>
      </h1>
    </div>
</section>