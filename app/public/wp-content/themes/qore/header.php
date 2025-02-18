<?php
$body_class = !empty($_GET['submit']) && $_GET['submit'] == 'true' ? 'loading relative bg-white modal-open' : 'loading relative bg-white';
$wrapper_class = is_page('contact') ? 'relative pt-18 overflow-hidden' : 'relative pt-18';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="enerzien">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

    <script>
        (function (global) { global.pageFunctions = global.pageFunctions || { executed: {}, functions: {}, addFunction: function (id, fn) { if (!this.functions[id]) this.functions[id] = fn }, executeFunctions: function () { if (this.added) return; this.added = true; for (const id in this.functions) { if (!this.executed[id]) { try { this.functions[id](); this.executed[id] = true } catch (e) { console.error(`Error executing function ${id}:`, e) } } } } } })(window);
    </script>

    <!-- Favicons -->
    <?php get_template_part('includes/components/favicons'); ?>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        html {
            font-size: calc(0.6250000000000002rem + 0.3124999999999999vw);
        }

        @media screen and (max-width:1920px) {
            html {
                font-size: calc(0.625rem + 0.31250000000000006vw);
            }
        }

        @media screen and (max-width:1280px) {
            html {
                font-size: calc(0.37500000000000006rem + 0.7812499999999999vw);
            }
        }

        @media screen and (max-width:1024px) {
            html {
                font-size: calc(0.5rem + 0.7812499999999999vw);
            }
        }

        @media screen and (max-width:768px) {
            html {
                font-size: calc(0.8748370273794003rem + 0.2607561929595828vw);
            }
        }
    </style>

    <!-- Vidstack video -->
    <link rel="stylesheet" href="https://cdn.vidstack.io/player.css" />
    <link rel="stylesheet" href="https://cdn.vidstack.io/plyr.css" />

</head>

<body <?php body_class($body_class); ?>>

    <?php wp_body_open(); ?>

    <div id="wrapper" class="<?php echo $wrapper_class; ?>">

        <?php if (is_page('contact')): ?>
            <svg class="text-base-200 w-[960px] h-[1086px] hidden lg:block absolute bottom-[-365px] ml-0 z-1 left-1/2 select-none pointer-events-none"
                viewBox="0 0 960 1086" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m624.300333 793.476431 143.245287 82.667416-143.245287 82.701517zm-.221662-501.904133-.034102-165.539444 143.381694 82.778248zm-242.652502-191.7510631 73.178545-42.3802118c7.621788-4.4162039 16.125964-6.6200431 24.634404-6.6200431 8.499913 0 17.00409 2.2038392 24.617353 6.6072549l73.195596 42.3546353.038364 218.9175368-97.595549 56.349228-98.026086-56.596467zm-334.3356239 305.7283411-.0980793-84.5686c-.0212776-17.600874 9.3738126-33.86751 24.6259146-42.653027l73.2851136-42.196914 314.931608 181.827392c6.082937 3.512502 12.87349 5.268753 19.65978 5.268753 6.790553 0 13.576843-1.756251 19.664043-5.268753l314.927346-181.827392 73.285113 42.201176c15.252102 8.781255 24.647192 25.047891 24.625915 42.653028l-.098079 84.564337-314.931608 181.823129c-12.165875 7.025004-19.659781 20.009326-19.659781 34.055071v363.650522l-73.18707 42.367422c-7.617526 4.41194-16.121702 6.61152-24.625879 6.61152-8.504176 0-17.008353-2.19958-24.625878-6.61152l-73.182808-42.367422v-363.650522c0-14.050008-7.493906-27.030067-19.65978-34.055071zm287.6031489 333.572592-189.901031 109.688957-73.2936395-42.179863c-15.2521019-8.785517-24.6514549-25.04789-24.6301773-42.648764l.0810283-84.564338 190.2122115-109.867992 97.531608 56.3066zm387.052992-169.529372 190.0076 109.654855.115147 84.564337c.025524 17.600874-9.365304 33.871772-24.617406 42.65729l-73.272325 42.209702-189.679369-109.463031v-113.359181zm-387.308757-443.265812.034102 164.989549-142.904266-82.505431zm-287.897278 333.163369 143.633196 82.927443-143.633196 82.965807zm144.899231 416.649231 143.253812-82.748408v165.449926zm721.013494-250.747455-143.709925-82.931706 143.709925-82.97007zm10.563083-380.484102-407.548271-235.29926664c-22.187588-12.81381176-49.759023-12.80954902-71.946612 0l-407.5482701 235.29926664c-22.1875883 12.809549-35.9733059 36.685184-35.9733059 62.304282v470.598534c0 25.619098 13.7857176 49.494733 35.9733059 62.304282l407.5482701 235.299265c11.095926 6.40691 23.534616 9.60823 35.973306 9.60823 12.438691 0 24.881643-3.20132 35.973306-9.60823l407.552534-235.299265c22.187588-12.809549 35.969043-36.685184 35.969043-62.304282v-470.598534c0-25.619098-13.781455-49.494733-35.973306-62.304282z"
                    fill="currentColor" opacity="0.64" transform="translate(.117647)" />
            </svg>
        <?php endif; ?>

        <header class="header xl:top-2 z-50">

            <div class="xl:container mx-auto relative z-50">
                <?php get_template_part('includes/partials/navigation/menu', 'main'); ?>
            </div>

            <?php get_template_part('includes/partials/navigation/menu', 'mobile'); ?>

        </header>