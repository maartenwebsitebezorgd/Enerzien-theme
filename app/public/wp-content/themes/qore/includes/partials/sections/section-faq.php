<?php

$group = get_sub_field('faq');
$repeater = $group['questions_and_answers'];

?>

<section class="padding-section-medium">
    <div class="container">
        <div class="md:grid md:grid-cols-12 md:gap-8">
            <div class="flex flex-col items-start md:col-span-4 lg:col-span-5">
                <?php if (!empty($group['subtitle'])): ?>
                    <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                        <?php echo $group['subtitle']; ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($group['title'])): ?>
                    <h2 class="text-pretty text-3xl font-bold sm:text-4xl lg:text-5xl leading-xtight">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($group['text'])): ?>
                    <div class="mt-4 text-pretty text-lg lg:text-xl">
                        <?php echo $group['text']; ?>
                    </div>
                <?php endif; ?>
                <div class="mt-10 flex items-center flex-wrap gap-4">
                    <?php if (!empty($group['cta_1'])): ?>
                        <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                            class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                            <?php echo $group['cta_1']['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($group['cta_2'])): ?>
                        <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                            class="font-semibold leading-6 text-gray-900 flex gap-2 items-center transition-all hover:gap-3">
                            <?php echo $group['cta_2']['title']; ?><span class="w-4" aria-hidden="true"><svg
                                    data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                                </svg></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-10 md:col-span-8 md:mt-0 lg:col-span-7">
                <div class="space-y-4">
                    <?php foreach ($repeater as $key => $item): ?>
                        <div class="collapse collapse-arrow bg-gray-100 rounded">
                            <input type="radio" name="my-accordion-2" class="w-full" />
                            <div
                                class="collapse-title text-base font-semibold leading-7 text-emerald-800 md:text-lg lg:text-xl">
                                <?php echo $item['question']; ?>
                            </div>
                            <div class="collapse-content text-base leading-7 text-gray-600">
                                <p>
                                    <?php echo $item['answer']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>