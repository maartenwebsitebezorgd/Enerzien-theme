<?php

/*
Template Name: Styleguide
Template Post Type: page
*/

?>

<main class="flex-grow block overflow-x-hidden bg-base-100 text-base-content drawer-content">

    <div id="nav" class="inset-x-0 top-0 z-50 w-full transition duration-200 ease-in-out border-b border-base-100 bg-primary text-base-content sticky">
      <div class="mx-auto space-x-1 navbar max-w-none lg:px-16 lg:py-8">

        <div title="Wordpress ↗︎" class="items-center flex-none">
            <a aria-label="wordpress" target="_blank" href="<?php echo home_url('/wp-admin/'); ?>" rel="noopener" class="normal-case btn btn-primary drawer-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            <span class="">Naar WordPress </span>
            </a>
        </div> 
        <div class="flex-1"></div>
            <a target="_blank" href="https://qore.digital/" class="flex items-center flex-none text-gray-400 hover:text-white"> 
                <svg class=" w-24 h-auto" viewBox="0 0 605 152" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white"><path d="m72.500637 0c15.362757 0 28.420618 2.38702 39.176127 7.161315 10.752963 4.774041 18.995289 11.581544 24.726977 20.422511 5.731688 8.841221 8.596259 19.509154 8.596259 32.004563 0 12.377303-2.864571 22.986564-8.596259 31.827531s-13.974014 15.648724-24.726977 20.422765c-7.887255 3.50091-17.012625 5.71831-27.377116 6.651997l.000025 33.461373h-23.043974l-.000526-33.419089c-10.508942-.90788-19.789287-3.139377-27.841035-6.694281-10.8130548-4.774041-19.0854266-11.581798-24.8168602-20.422765s-8.5972778-19.450228-8.5972778-31.827531c0-12.495409 2.8658442-23.163342 8.5972778-32.004563 5.7314336-8.840967 14.0038054-15.64847 24.8168602-20.422511 10.813056-4.774295 23.841888-7.161315 39.086499-7.161315zm0 20.334376c-9.335956 0-17.667401 1.443946-24.994082 4.332094-7.326936 2.887893-13.05837 7.219987-17.194556 12.996281-4.1361859 5.776041-6.2042788 13.084672-6.2042788 21.925638 0 8.840967 2.0680929 16.149598 6.2042788 21.925638 4.136186 5.776041 9.86762 10.078672 17.194556 12.907893 7.326681 2.829221 15.658126 4.243704 24.994082 4.243704 9.453848 0 17.756775-1.414483 24.904198-4.243704 7.149969-2.829221 12.764528-7.131852 16.841131-12.907893 4.076603-5.77604 6.116177-13.084671 6.116177-21.925638 0-8.840966-2.039574-16.149597-6.116177-21.925638-4.076603-5.776294-9.691162-10.108388-16.841131-12.996281-7.147423-2.888148-15.45035-4.332094-24.904198-4.332094z"/><path d="m240.500637 0c15.362757 0 28.420618 2.38702 39.176127 7.161315 10.752963 4.774041 18.995289 11.581544 24.726977 20.422511 5.731688 8.841221 8.596259 19.509154 8.596259 32.004563 0 12.377303-2.864571 22.986564-8.596259 31.827531s-13.974014 15.648724-24.726977 20.422765c-10.755509 4.774041-23.81337 7.161315-39.176127 7.161315-15.244611 0-28.273443-2.387274-39.086499-7.161315-10.813055-4.774041-19.085427-11.581798-24.81686-20.422765-5.731434-8.840967-8.597278-19.450228-8.597278-31.827531 0-12.495409 2.865844-23.163342 8.597278-32.004563 5.731433-8.840967 14.003805-15.64847 24.81686-20.422511 10.813056-4.774295 23.841888-7.161315 39.086499-7.161315zm0 20.334376c-9.335956 0-17.667401 1.443946-24.994082 4.332094-7.326936 2.887893-13.05837 7.219987-17.194556 12.996281-4.136186 5.776041-6.204279 13.084672-6.204279 21.925638 0 8.840967 2.068093 16.149598 6.204279 21.925638 4.136186 5.776041 9.86762 10.078672 17.194556 12.907893 7.326681 2.829221 15.658126 4.243704 24.994082 4.243704 9.453848 0 17.756775-1.414483 24.904198-4.243704 7.149969-2.829221 12.764528-7.131852 16.841131-12.907893 4.076603-5.77604 6.116177-13.084671 6.116177-21.925638 0-8.840966-2.039574-16.149597-6.116177-21.925638-4.076603-5.776294-9.691162-10.108388-16.841131-12.996281-7.147423-2.888148-15.45035-4.332094-24.904198-4.332094zm-.722814 25.665624c3.296223 0 6.09791.517651 8.405605 1.553009 2.30715 1.035303 4.075618 2.511585 5.305405 4.428845 1.229788 1.917316 1.844409 4.230774 1.844409 6.94054 0 2.684153-.614621 4.984888-1.844409 6.902148-1.229787 1.91726-2.998255 3.393597-5.305405 4.4289-2.307695 1.035303-5.109382 1.55301-8.405605 1.55301-3.270875 0-6.066333-.517707-8.386376-1.55301-2.320042-1.035303-4.094957-2.51164-5.32469-4.4289s-1.844627-4.217995-1.844627-6.902148c0-2.709766.614894-5.023224 1.844627-6.94054 1.229733-1.91726 3.004648-3.393542 5.32469-4.428845 2.320043-1.035358 5.115501-1.553009 8.386376-1.553009z"/><path d="m604.277686 97v10.120592.368496c-.001425.080431-.002117.161493-.003143.243129l-.004193.24657c-.001806.082725-.004056.165965-.006861.249661l-.010184.252402c-.0061.128253-.013726.257423-.023261.387306l-.021726.260656c-.342955 3.660812-2.381481 7.774274-14.498486 7.869503l-.432146.001685h-93c-13.527273 0-14.855405-4.879656-14.985803-8.771552l-.006861-.249661c-.003611-.165449-.005445-.328838-.007336-.489699v-7.776285-2.712803z"/><path d="m413.680789 1.996694c8.87973 0 16.603897 1.214553 23.175051 3.643657 6.571154 2.42936 11.690837 6.221102 15.361602 11.375736 3.670765 5.154635 5.504872 11.760758 5.504872 19.818369 0 5.450804-.946389 10.072077-2.841718 13.864075-1.892778 3.791741-6.268117 11.149102-14.020894 14.466668 11.35774 2.263802 14.375471 12.014824 14.375471 24.459005v27.37249h-23.61891v-25.772662c0-4.384337-.767825-7.791058-2.308577-10.220418-1.538201-2.429104-4.290637-4.117528-8.257308-5.065528-3.966671-.947999-9.678166-1.421871-17.137038-1.421871h-44.572116v42.480479h-23.61891v-115zm0 20.262879h-54.339565v33.771294h54.339565c6.629824 0 11.690837-1.599829 15.183038-4.79923 3.492201-3.199402 5.239577-7.524506 5.239577-12.97531 0-5.213613-1.747376-9.183312-5.239577-11.908842-3.492201-2.725275-8.553214-4.087912-15.183038-4.087912z"/><path d="m604.276472 49v20h-122.998786v-20z"/><path d="m589.277686 2c12.75 0 14.6625 4.335 14.949375 8.092l.01767.264176c.022815.394632.029835.781488.032955 1.154736v7.776285 2.712803h-123v-10.489088c.001891-.160861.003725-.32425.007336-.489699l.006861-.249661c.128996-3.850047 1.430107-8.666727 14.553657-8.769867l.432146-.001685z"/>
            </svg> 
        </a>
      </div>
   </div>

   <div class="items-end justify-start h-96 hero bg-primary">
        <div class="hero-content w-full p-20">
            <div class="py-6 hero-text">
                <div class="py-2 font-bold text-3xl text-primary-content">
                    Aa
                </div>
                <div class="py-2 text-6xl font-bold text-primary-content">
                    <?php echo ucfirst(get_bloginfo('name')); ?> styleguide
                </div>
                <p class="text-primary-content text-md">Pas de tailwind.config file aan om globale style wijzigingen aan te brengen</p>
            </div>
        </div>
    </div>

   <div class="p-4 lg:p-20">
      <div>
         <div class="pb-12">
            <div class="inline-block text-2xl font-bold border-b-8 lg:text-6xl text-base-content border-primary">Typografie</div>
         </div>
         <div class="flex flex-col lg:space-x-6 lg:flex-row">
            <div class="space-y-2 font-bold text-base-content">
               <div class="text-9xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-8xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-7xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-6xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-5xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-4xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-3xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-2xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-lg">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-base">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-sm">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-xs">AaBb<span class="hidden lg:inline-block">Cc</span></div>
            </div>
            <div class="space-y-2 text-base-content">
               <div class="text-9xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-8xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-7xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-6xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-5xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-4xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-3xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-2xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-xl">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-lg">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-base">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-sm">AaBb<span class="hidden lg:inline-block">Cc</span></div>
               <div class="text-xs">AaBb<span class="hidden lg:inline-block">Cc</span></div>
            </div>
         </div>
         <div class="pt-32 pb-12">
            <div class="inline-block text-2xl font-bold border-b-8 lg:text-6xl text-base-content border-primary">Branding</div>
         </div>
         <div class="grid grid-cols-3 gap-6 mt-10 text-xs font-bold capitalize">
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-primary"></div>
               <div class="py-4">Primary</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-primary-focus"></div>
               <div class="py-4">Primary (focus)</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-primary-content"></div>
               <div class="py-4">Primary content</div>
            </div>
         </div>
         <div class="grid grid-cols-3 gap-6 mt-10 text-xs font-bold capitalize">
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-secondary"></div>
               <div class="py-4">Secondary</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-secondary-focus"></div>
               <div class="py-4">Secondary (focus)</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-secondary-content"></div>
               <div class="py-4">Secondary </div>
            </div>
         </div>
         <div class="grid grid-cols-3 gap-6 mt-10 text-xs font-bold capitalize">
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-accent"></div>
               <div class="py-4">accent</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-accent-focus"></div>
               <div class="py-4">accent (focus)</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-accent-content"></div>
               <div class="py-4">accent content</div>
            </div>
         </div>
         <div class="grid grid-cols-3 gap-6 mt-10 text-xs font-bold capitalize">
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-neutral"></div>
               <div class="py-4">neutral</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-neutral-focus"></div>
               <div class="py-4">neutral (focus)</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg w-fill lg:w-32 lg:h-32 rounded-md bg-neutral-content"></div>
               <div class="py-4">neutral content</div>
            </div>
         </div>
         <div class="pt-32 pb-12">
            <div class="inline-block text-2xl font-bold border-b-8 lg:text-6xl text-base-content border-primary">Base</div>
         </div>
         <div class="grid grid-cols-2 gap-6 mt-10 text-xs font-bold capitalize lg:grid-cols-5">
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-100"></div>
               <div class="py-4">100</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-100"></div>
               <div class="py-4">200</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-200"></div>
               <div class="py-4">300</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-300"></div>
               <div class="py-4">400</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-500"></div>
               <div class="py-4">500</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-600"></div>
               <div class="py-4">600</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-700"></div>
               <div class="py-4">700</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-800"></div>
               <div class="py-4">800</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-900"></div>
               <div class="py-4">900</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-base-content"></div>
               <div class="py-4">content</div>
            </div>
         </div>
         <div class="pt-32 pb-12">
            <div class="inline-block text-2xl font-bold border-b-8 lg:text-6xl text-base-content border-primary">Status</div>
         </div>
         <div class="grid grid-cols-2 gap-6 mt-10 text-xs font-bold capitalize lg:grid-cols-5">
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-info"></div>
               <div class="py-4">Info</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-success"></div>
               <div class="py-4">Success</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-warning"></div>
               <div class="py-4">Warning</div>
            </div>
            <div>
               <div class="w-20 h-20 shadow-lg rounded-sm bg-error"></div>
               <div class="py-4">Error</div>
            </div>
         </div>
      </div>
   </div>
</main>