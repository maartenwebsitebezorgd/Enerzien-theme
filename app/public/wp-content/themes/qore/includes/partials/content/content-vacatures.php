<main class="main main-single has_table_of_contents w-full" role="main">

    <?php get_template_part('includes/partials/heros/hero', 'post'); ?>

    <article class="relative mx-auto text-base-content" id="content">

        <?php if (!empty(get_the_post_thumbnail())) { ?>
            <div
                class="container mx-auto md:px-10 mb-10 lg:mb-20 h-auto lg:h-[500px] overflow-hidden md:rounded-md target-viewport">
                <div class="prose lg:prose-lg max-w-none rounded-md">
                    <?php the_post_thumbnail('post-detail-image', ['class' => 'object-cover object-center rounded h-full w-full max-h-[500px] md:rounded-md']); ?>
                </div>
            </div>
        <?php } ?>

        <div class="container relative mx-auto px-4 lg:px-10 mb-20 lg:mb-40">
            <div class="relative grid grid-cols-12 lg:gap-x-10 text-base-content text-left">

                <aside
                    class="hidden lg:flex relative col-span-12 lg:col-span-2 justify-start items-start flex-col max-w-xs ml-auto h-full flex-grow-1 target-viewport">
                    <?php get_template_part('includes/partials/social/share'); ?>
                </aside>

                <section class="col-span-12 lg:col-span-8 target-viewport">
                    <div class="max-w-[610px] mx-auto">
                        <div class="prose-lg">
                            <?php if (have_posts()) { ?>

                                <?php while (have_posts()) {
                                    the_post(); ?>

                                    <?php the_content(); ?>

                                <?php } ?>

                            <?php } else { ?>

                                <p>
                                    <?php echo __('Geen inhoud gevonden.', 'qore'); ?>
                                </p>

                            <?php } ?>
                        </div>

                        <?php get_template_part('includes/partials/sections/section', 'about'); ?>
                    </div>

                </section>

                <aside
                    class="relative hidden lg:flex flex-col col-span-12 lg:col-span-2 items-start justify-start max-w-xs ml-auto prose h-full flex-grow-1 target-viewport">
                    <div class="table_of_contents_wrapper lg:sticky lg:top-36">
                        <ul class="table_of_contents"></ul>
                    </div>
                </aside>
            </div>
        </div>

    </article>
</main>