<?php

$page_id = is_404() ? 450 : get_the_ID();
$group = get_field('hero', $page_id);

if (!empty($group['choose_hero']) && $group['choose_hero'] == 'large')
{
    get_template_part('includes/partials/heros/hero', 'large');
}
else
{
    get_template_part('includes/partials/heros/hero', 'compact');
}
