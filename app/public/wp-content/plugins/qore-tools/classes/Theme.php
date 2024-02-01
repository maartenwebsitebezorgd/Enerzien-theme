<?php
/**
 * Theme class
 */
class QoreToolsTheme {
	
	// Initialize functions here, mostly actions and filters.
	public function init() {
		// Insert head_scripts from the options table into wp_head
		add_action('wp_head', array($this, 'loadHeadScripts'));
		add_action('wp_head', array($this, 'toolsStyling'));

		// Insert body_scripts from the options table into wp_head
		add_action('wp_body_open', array($this, 'loadBodyScripts'));

		// Insert functions in the Qore Digital toolbar
		add_action('wp_footer', array($this, 'toolsToolbar'));
		add_action('qore_tools_toolbar', array($this, 'toolsSmoothingButton'));
		add_action('qore_tools_toolbar', array($this, 'toolsBreakpointsButton'));
		//add_action('qore_tools_toolbar', array($this, 'toolsGridButton'));
		add_action('qore_tools_toolbar_functions', array($this, 'toolsBreakpoints'));
		//add_action('qore_tools_toolbar_functions', array($this, 'toolsGrid'));

		// Insert footer_scripts from the options table into wp_head
		add_action('wp_footer', array($this, 'loadFooterScripts'));
	}

	// Insert head_scripts from the options table into wp_head
	public function loadHeadScripts() {
		$head_scripts = get_option('qore-tools_head_scripts');

		if($head_scripts) {
			echo $head_scripts;
		}

		$show_toolbar = get_option('qore-tools_show_toolbar');
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');

		if (is_user_logged_in() && array_intersect($allowed_roles, $user->roles) && $show_toolbar):
			wp_enqueue_script('qore-tools-script-js', plugins_url('qore-tools/dist/js/qore-tools-script.js'));
			wp_enqueue_style('qore-tools-style-css', plugins_url('qore-tools/dist/css/qore-tools-style.css'));
		endif;
	}

	// Insert body_scripts from the options table into wp_head
	public function loadBodyScripts() {
		$body_scripts = get_option('qore-tools_body_scripts');

		if($body_scripts) {
			echo $body_scripts;
		}
	}

	// Insert footer_scripts from the options table into wp_head
	public function loadFooterScripts() {
		$footer_scripts = get_option('qore-tools_footer_scripts');

		if($footer_scripts) {
			echo $footer_scripts;
		}
	}

	// Insert tools specific styling
	public function toolsStyling() {
		echo '<style type="text/css">';
		if (is_plugin_active('user-switching/user-switching.php') && is_user_logged_in()) {
			echo '#user_switching_switch_on {
				position: fixed;
				margin-bottom: 0;
				bottom: 0;
				left: 0;
				width: 100%;
				background: white;
				font-size: 14px;
				padding: 8px 16px;
				text-align: center;
				z-index: 50;
			}';
		}
		echo '</style>';
	}

	public function toolsToolbar() {
		$show_toolbar = get_option('qore-tools_show_toolbar');
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');

		if (is_user_logged_in() && array_intersect($allowed_roles, $user->roles) && $show_toolbar):

			echo '<div class="qore-tools-toolbar-container qt-hidden md:!qt-block qt-fixed qt-top-[50%] -qt-translate-y-2/4 qt-right-0 qt-w-14 qt-z-9999 qt-text-center qt-rounded">
				<button aria-label="Open tools" type="button" class="open-toolbar toggle-toolbar qt-absolute qt-w-full qt-top-1/2 qt-right-0 qt-bg-[#5c2bff] qt-text-white !qt-pt-5 -qt-translate-y-2/4">
					<i class="dashicons dashicons-admin-tools !qt-text-white qt-text-[24px]"></i>
					<div class="qt-w-full qt-mt-5 qt-bg-[#050310] qt-flex qt-items-center qt-justify-center qt-py-3"><img class="qt-w-7 qt-h-auto" src="'.plugins_url('qore-tools/dist/img/favicon/favicon.svg').'" alt="Qore Digital"></div>
				</button>
		
				<div class="qore-tools-toolbar qt-flex qt-flex-col qt-translate-x-full">';

				if ( current_user_can( 'manage_options' ) ): do_action('qore_tools_toolbar_admin'); endif;
				do_action('qore_tools_toolbar');

			echo '<button aria-label="Sluit tools" type="button" class="close-toolbar toggle-toolbar qt-bg-[#050310] qt-text-white qt-p-3">
					<i class="dashicons dashicons-no-alt"></i>
					</button>
				</div>
			</div>';
			
			if ( current_user_can( 'manage_options' ) ): do_action('qore_tools_toolbar_functions_admin'); endif;
			do_action('qore_tools_toolbar_functions');

		endif;
	}

	public function toolsSmoothingButton() {
		echo '<a aria-label="Font-smoothing" class="qore-tools-smoothing go" href="#" data-tooltip="Font-smoothing inschakelen">
			<i class="dashicons dashicons-editor-bold"></i>
		</a>';
	}


	public function toolsBreakpointsButton() {
		echo '<a aria-label="Breakpoints" class="qore-tools-breakpoints go" href="#" data-tooltip="Breakpoints tonen">
			<i class="dashicons dashicons-image-flip-horizontal"></i>
		</a>';
	}

	public function toolsBreakpoints() {
		echo '<div id="qore-tools-breakpoints" class="qt-flex qt-w-14 qt-text-center qt-hidden qt-items-center qt-fixed qt-bottom-0 qt-right-0 qt-justify-center qt-py-2 qt-bg-[#5c2bff] qt-text-white qt-text-sm qt-z-9999">
			<span class="sm:!qt-hidden md:!qt-hidden lg:!qt-hidden xl:!qt-hidden qt-font-extrabold">xs</span>
			<span class="!qt-hidden sm:!qt-inline md:!qt-hidden qt-font-extrabold">sm</span>
			<span class="!qt-hidden md:!qt-inline lg:!qt-hidden qt-font-extrabold">md</span>
			<span class="!qt-hidden lg:!qt-inline xl:!qt-hidden qt-font-extrabold">lg</span>
			<span class="!qt-hidden xl:!qt-inline 2xl:!qt-hidden 3xl:!qt-hidden 4xl:!qt-hidden 5xl:!qt-hidden 6xl:!qt-hidden qt-font-extrabold">xl</span>
			<span class="!qt-hidden 2xl:!qt-inline 3xl:!qt-hidden 4xl:!qt-hidden 5xl:!qt-hidden 6xl:!qt-hidden qt-font-extrabold">2xl</span>
			<span class="!qt-hidden 3xl:!qt-inline 4xl:!qt-hidden 5xl:!qt-hidden 6xl:!qt-hidden qt-font-extrabold">3xl</span>
			<span class="!qt-hidden 4xl:!qt-inline 5xl:!qt-hidden 6xl:!qt-hidden qt-font-extrabold">4xl</span>
			<span class="!qt-hidden 5xl:!qt-inline 6xl:!qt-hidden qt-font-extrabold">5xl</span>
			<span class="!qt-hidden 6xl:!qt-inline qt-font-extrabold">6xl</span>
		</div>';
	}

	public function toolsGridButton() {
		echo '<a aria-label="Grid" class="qore-tools-grid go" href="#" data-tooltip="Grid tonen">
			<i class="dashicons dashicons-columns"></i>
		</a>';
	}

	public function toolsGrid() {
		echo '<div id="qore-tools-grid" class="qt-fixed qt-left-0 qt-hidden qt-top-0 qt-w-screen qt-h-screen qt-z-90 qt-flex qt-flex-row qt-flex-nowrap qt-items-start qt-justify-center qt-select-none qt-pointer-events-none">
			<div class="container qt-h-full qt-w-full">
				<div class="qt-h-full qt-w-full qt-grid qt-grid-cols-12 qt-grid-rows-1 qt-gap-x-4 sm:qt-gap-x-6 2xl:qt-gap-x-10">
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
					<div class="qt-w-full qt-h-full qt-bg-[#5c2bff] qt-bg-opacity-10"></div>
				</div>
			</div>
		</div>';
	}
}