<?php if (!empty($args)) { ?>
    <div class="icon-usp <?php echo $args['class']; ?>" style="<?php echo $args['style']; ?>">
    <?php if ($args['icon'])
{
    echo $args['icon'];
} ?>
        <div class="flex-flex-col">
            <p class="title mb-1 text-xl text-base-content leading-tight"><strong><?php echo $args['title']; ?></strong></p>
            <p class="mb-0 text-base-content leading-normal"><?php echo $args['text']; ?></p>
        </div>
    </div>
<?php } ?>