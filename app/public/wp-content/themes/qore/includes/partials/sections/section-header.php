<?php
$group = get_sub_field('header');
$align = !empty($group['align']) ? 'text-left md:text-' . $group['align'] : 'text-left md:text-center';
$title = !empty($group['type']) ? $group['type'] : 'h2';

if ($group['type'] == 'h4') {
    $title_size = 'text-2xl';
} elseif ($group['type'] == 'h3') {
    $title_size = 'text-3xl';
} else {
    $title_size = 'text-4xl';
}
?>

<section class="section-header bg-white py-20 lg:py-40 target-viewport" id="<?php echo sanitize_title_with_dashes($group['title']); ?>">
    <div class="container px-4 md:px-10 lg:max-w-3xl <?php echo $align; ?>">

        <?php if (!empty($group['subtitle'])) { ?>
            <h3 class="subtitle text-[#1cc6a5]">
                <?php echo $group['subtitle']; ?>
            </h3>
        <?php } ?>

        <h2 class="h2">
            <?php echo $group['title']; ?>
        </h2>

        <?php if (!empty($group['text'])) { ?>
            <div class="w-full mt-8 prose prose-lg max-w-none text-xl">
                <?php echo $group['text']; ?>
            </div>
        <?php } ?>
    </div>
</section>