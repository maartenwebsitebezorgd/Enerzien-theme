<?php
$group = get_sub_field('form_wrapper');
$form_id = $group['form_id'];
$form_title = false;
$form_description = false;
$form_inactive = false;
$form_ajax = true;
$form_index = true;
$form_echo = false;
$form_values = [];
$form = gravity_form($form_id, $form_title, $form_description, $form_inactive, $form_values, $form_ajax, $form_index, $form_echo);

if ($group['form_id']) : ?>
<section class="form target-viewport <?php echo !empty($group['show_usps']) ? 'bg-base-100 py-16 md:py-32' : 'bg-white py-0' ?>" id="<?php echo !empty($group['title']) ? sanitize_title_with_dashes('form-' . $group['form_id']) : 'form-' . the_ID(); ?>">
    <div class="container px-4 md:px-10">

        <div class="flex <?php echo !empty($group['usps']) && !empty($group['show_usps']) && $group['show_usps'] == true ? 'flex-row flex-wrap text-left' : 'flex-col text-center'; ?>">

        <?php if ($group['show_usps'] == true): ?>
        <div class="relative w-full md:px-10 <?php echo !empty($group['show_usps']) ? 'md:w-1/2 mb-12' : '' ?>">
            <?php if (!empty($group['title'])): ?>
            <h2 class="title text-4xl font-bold w-full text-base-content mb-8"> 
                <?php echo $group['title']; ?>
            </h2>
            <?php endif; ?>

            <?php if (!empty($group['text'])): ?>
            <div class="w-full text-lg text-base-content mb-12 md:mb-24 prose">
                <?php echo $group['text']; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
                <div class="relative w-full text-base-content leading-relaxed flex justify-center items-start md:px-10 <?php echo !empty($group['show_usps']) ? 'md:w-1/2 text-left' : 'text-center' ?>">
                    <div class="rounded-sm w-full max-w-4xl mx-auto">
                        <div class="bg-white <?php echo !empty($group['show_usps']) ? 'px-8 py-10 md:px-16 md:py-20 rounded-sm' : '' ?>">
                            
                            <?php if (!empty($group['form_title'])): ?>
                                <h2 class="text-2xl md:text-3xl text-base-content mb-10">
                                    <?php echo $group['form_title']; ?>
                                </h2> 
                            <?php endif; ?>

                            <?php if (!empty($group['form_text'])): ?>
                                <div class="prose">
                                    <?php echo $group['form_text']; ?>
                                </div>
                            <?php endif; ?>

                            <div class="text-left">
                                <?php echo $form; ?>
                            </div>
                            
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>