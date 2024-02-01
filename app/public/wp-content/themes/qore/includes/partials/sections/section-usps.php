<?php
$group = get_sub_field('usps');

if (!empty($group['items'])) :

    if ($group['has_background'] == true)
    {
        $section_class = 'usps body-font overflow-hidden bg-base-100 py-20 lg:py-40 target-viewport';
        $article_class = 'w-full relative usp w-full mb-12 px-4 md:px-10 pt-16 pb-8 bg-white';
        $container_class = 'container mx-auto';
    }
    else
    {
        $section_class = 'usps body-font overflow-hidden target-viewport';
        $article_class = 'w-full relative usp w-full mb-12 bg-base-100 px-4 md:px-10 pt-16 pb-8';
        $container_class = 'container mx-auto px-4 md:px-10';
    }
    $item_count = count($group['items']) >= 5 ? 'xl:grid-cols-5' : 'xl:grid-cols-4';
?> 
<section class="<?php echo $section_class; ?>">

    <?php if (!empty($group['title']) || !empty($group['text'])) : ?>
    <div class="container px-4 md:px-10 mx-auto text-left md:text-center mb-8 lg:mb-24 md:max-w-lg lg:max-w-none">

            <?php if (!empty($group['title'])): ?>
                <h2 class="h2"> 
                    <?php echo $group['title']; ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($group['text'])): ?>
                <div class="w-full mt-8 text-lg text-base-content">
                    <p><?php echo $group['text']; ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo $container_class ?>">
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-6 text-base-content pt-4 <?php echo $item_count; ?>">

            <?php if (!empty($group['items'])) : ?>
                <?php foreach ($group['items'] as $key => $value) : $nr = $key + 1; ?>

                    <article <?php post_class($article_class); ?> role="article">
                        <span class="absolute -mt-20 bg-secondary h-10 w-10 inline-flex items-center justify-center text-white font-bold text-2xl">
                            <?php echo $nr; ?>
                        </span>
                        <h3 class="title-font text-2xl text-base-content font-bold mb-3">
                            <?php echo $value['title']; ?>
                        </h3>
                        <p class="leading-relaxed mb-4">
                            <?php echo $value['text']; ?>
                        </p>
                    </article>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php endif; ?>