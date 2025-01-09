<?php
$group = get_sub_field('cta_simple');
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-medium';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-medium';
?>

<section class="<?php echo $padding_top ?>  <?php echo $padding_bottom ?> relative isolate overflow-hidden bg-[#055]">
    <div class="container">
        <div class="mx-auto max-w-2xl text-center">
            <?php if (!empty($group['title'])): ?>
                <h2 class="text-balance text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                    <?php echo $group['title']; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($group['text'])): ?>
                <div class="mx-auto mt-6 max-w-xl text-lg/8 !text-gray-200">
                    <?php echo $group['text']; ?>
                </div>
            <?php endif; ?>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <?php if (!empty($group['cta_1'])): ?>
                    <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                        class="rounded-md bg-white px-3.5 py-2.5 text-base font-semibold tracking-wide text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                        <?php echo $group['cta_1']['title']; ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($group['cta_2'])): ?>
                    <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                        class="font-semibold leading-6 text-white flex gap-2 items-center transition-all hover:gap-3">
                        <?php echo $group['cta_2']['title']; ?><span class="w-4" aria-hidden="true"><svg data-slot="icon"
                                fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                                </path>
                            </svg></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="absolute inset-x-0 -top-16 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl"
        aria-hidden="true">
        <div class="aspect-[1318/752] w-[82.375rem] flex-none bg-gradient-to-r from-green-300 to-green-700 opacity-25"
            style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)">
        </div>
    </div>
</section>