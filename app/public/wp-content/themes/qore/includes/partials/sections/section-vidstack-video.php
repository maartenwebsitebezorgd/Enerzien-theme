<?php
$group = get_sub_field('vidstack_video');
$align = !empty($group['align']) ? 'text-left md:text-' . $group['align'] : 'text-left md:text-center';
$title = !empty($group['type']) ? $group['type'] : 'h2';

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

        <!-- Video Section -->
        <div class="relative aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg mt-12">
            <?php if (!empty($group['video_url'])) { ?>
                <iframe 
                height="500"
                    src="<?php echo esc_url($group['video_url']); ?>" 
                    title="Video player" 
                    frameborder="0" 
                    class="w-full"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            <?php } else { ?>
                <p class="text-gray-500">Video is not available at the moment.</p>
            <?php } ?>
        </div>
    </div>
</section>
