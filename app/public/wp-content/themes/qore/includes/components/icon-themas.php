<?php if (!empty($args['image_id'])) { ?>
    <span class="icon-themas absolute bg-transparent inline-flex items-center justify-center text-primary font-bold text-xl bg-no-repeat bg-contain bg-center drop-shadow-lg top-full left-1/2 mt-[-88px] ml-[-120px] xl:mt-[-152px] xl:ml-[-210px] h-[91px] w-[80px] xl:h-[136px] xl:w-[120px]">
        <?php echo wp_get_attachment_image($args['image_id'], 'thumbnail', true, ['class' => 'w-[55%]']); ?>
    </span>
<?php } ?>