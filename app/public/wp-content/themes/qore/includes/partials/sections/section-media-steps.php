<?php
$group = get_sub_field('media_steps');
?>

<section class="overflow-hidden bg-white py-32">
  <div class="container">
    <div class="grid grid-cols-1 gap-16 md:grid-cols-2 lg:gap-24">
      <div class="w-full">
        <div
          class="h-full w-full transform overflow-hidden rounded-lg object-cover transition duration-1000 ease-in-out hover:-translate-y-4">
          <?php if (!empty ($group['main_image'])): ?>
            <?php echo wp_get_attachment_image($group['main_image']['ID'], 'shape-image', false, ['class' => 'w-full h-full']); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="w-full">
        <?php if (!empty ($group['subtitle'])): ?>
          <h2 class="subtitle">
            <?php echo $group['subtitle']; ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty ($group['title'])): ?>
          <h2 class="h2 mb-12 md:mb-20 md:max-w-lg">
            <?php echo $group['title']; ?>
          </h2>
        <?php endif; ?>
        <div class="flex flex-wrap">
          <div class="w-full p-1.5">
            <div class="-m-6 flex flex-wrap">
              <div class="w-auto p-6">
                <div class="relative mb-3 h-10 w-10 rounded-full bg-green-600 text-lg font-bold text-white">
                  <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform">1</span>
                </div>
                <img class="relative left-3" src="https://shuffle.dev/flaro-assets/images/how-it-works/line.svg"
                  alt="" />
              </div>
              <div class="flex-1 p-6">
                <div class="md:max-w-xs">
                  <?php if (!empty ($group['heading_1'])): ?>
                    <h3 class="h5">
                      <?php echo $group['heading_1']; ?>
                    </h3>
                  <?php endif; ?>
                  <?php if (!empty ($group['text_1'])): ?>
                    <p class="leading-relaxed text-gray-700">
                      <?php echo $group['text_1']; ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full p-1.5">
            <div class="-m-6 flex flex-wrap">
              <div class="w-auto p-6">
                <div class="relative -left-1 mb-3 h-10 w-10 rounded-full bg-green-600 text-lg font-bold text-white">
                  <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform">2</span>
                </div>
                <img class="relative left-3" src="https://shuffle.dev/flaro-assets/images/how-it-works/line2.svg"
                  alt="" />
              </div>
              <div class="flex-1 p-6">
                <div class="md:max-w-xs">
                  <?php if (!empty ($group['heading_2'])): ?>
                    <h3 class="h5">
                      <?php echo $group['heading_2']; ?>
                    </h3>
                  <?php endif; ?>
                  <?php if (!empty ($group['text_2'])): ?>
                    <p class="leading-relaxed text-gray-700">
                      <?php echo $group['text_2']; ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full p-1.5">
            <div class="-m-6 flex flex-wrap">
              <div class="w-auto p-6">
                <div class="relative left-5 mb-3 h-10 w-10 rounded-full bg-green-600 text-lg font-bold text-white">
                  <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform">3</span>
                </div>
              </div>
              <div class="flex-1 p-6">
                <div class="md:max-w-xs">
                  <?php if (!empty ($group['heading_3'])): ?>
                    <h3 class="h5">
                      <?php echo $group['heading_3']; ?>
                    </h3>
                  <?php endif; ?>
                  <?php if (!empty ($group['text_3'])): ?>
                    <p class="leading-relaxed text-gray-700">
                      <?php echo $group['text_3']; ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>