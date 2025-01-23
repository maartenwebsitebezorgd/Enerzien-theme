<?php
// Ensure $group is defined and populated
$group = get_sub_field('header');

if ($group) {
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

<section class="section-header bg-white py-20 lg:py-40 target-viewport">
    <div class="container px-4 md:px-10 lg:max-w-3xl <?php echo esc_attr($align); ?>">

        <?php if (!empty($group['subtitle'])) { ?>
            <h3 class="subtitle text-[#1cc6a5]">
                <?php echo esc_html($group['subtitle']); ?>
            </h3>
        <?php } ?>

        <<?php echo esc_html($title); ?> class="<?php echo esc_attr($title_size); ?>">
            <?php echo esc_html($group['title']); ?>
        </<?php echo esc_html($title); ?>>

        <?php if (!empty($group['text'])) { ?>
            <div class="w-full mt-8 prose prose-lg max-w-none text-xl">
                <?php echo wp_kses_post($group['text']); ?>
            </div>
        <?php } ?>

        <link rel="stylesheet" href="https://cdn.vidstack.io/player.css" />
        <script src="https://cdn.vidstack.io/player.core" type="module"></script>
        <script src="https://cdn.vidstack.io/player.core.dev" type="module"></script>  
        <script src="https://cdn.vidstack.io/player.core@1.11.21" type="module"></script>

        <div class="relative aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg mt-12">
            <?php if (!empty($group['video_url'])) { ?>
                <iframe 
                    src="<?php echo ($group['video_url']); ?>" 
                    title="Video player" 
                    frameborder="0" 
                    class="w-full h-full"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            <?php } else { ?>
                <p class="text-gray-500">Video is not available at the moment.</p>
            <?php } ?>
        </div>

    </div>
</section>

<?php
} else {
    echo '<p class="text-center text-gray-500">Content is not available at the moment.</p>';
}
?>
