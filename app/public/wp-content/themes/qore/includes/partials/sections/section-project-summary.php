<?php
$group = get_sub_field('project_summary');
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-small';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-small';
?>

<section class="<?php echo $padding_top ?>  <?php echo $padding_bottom ?>">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
            class="relative isolate overflow-hidden bg-[#055] px-6 py-16 text-center shadow-2xl sm:rounded-3xl sm:px-16">
            <h2 class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl">
                <?php echo $group['title']; ?>
            </h2>
            <div class="mx-auto mt-6 max-w-2xl text-white prose-lg text-pretty">
                <?php echo $group['body']; ?>
            </div>

            <div class="absolute -top-24 right-0 -z-10 transform-gpu blur-3xl" aria-hidden="true">
                <div class="aspect-[1404/767] w-[87.75rem] bg-gradient-to-r from-green-300 to-green-600 opacity-25"
                    style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)">
                </div>
            </div>
        </div>
    </div>
</section>