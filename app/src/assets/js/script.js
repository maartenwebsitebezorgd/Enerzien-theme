'use strict';

// you can import modules from the theme lib or even from
// NPM packages if they support it…
// import Slick from "slick-carousel";

require('./components/viewport.js'); // Voeg een class toe als element in beeld is (optioneel).

// import Swiper JS
// import Swiper, { Autoplay, Navigation, Pagination, EffectFade, EffectFlip } from 'swiper';

// configure Swiper to use modules
// Swiper.use([Autoplay, Navigation, Pagination, EffectFade, EffectFlip]);

// Initialise our components on jQuery.ready…
jQuery(function ($) {
  let $body = jQuery('body');

  setTimeout(function () {
    $body.removeClass('loading');
  }, 150);

  jQuery(window).on('resize', function () {
    targetViewport();
  });

  jQuery(window)
    .on('scroll', function () {
      targetViewport();
    })
    .scroll();

  tableOfContents('.table_of_contents_wrapper ul.table_of_contents');

  function isScrolledIntoView(elem) {
    var docViewTop = jQuery(window).scrollTop();
    var docViewBottom = docViewTop + jQuery(window).height();

    var elemTop = jQuery(elem).offset().top;
    var elemBottom = elemTop + jQuery(elem).height();

    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }

  function tableOfContents(tocList) {
    jQuery(tocList).empty();
    var prevH2Item = null;
    // var prevH2List = null;
    var index = 0;

    if (jQuery('.has_table_of_contents #content h2').length) {
      jQuery('#content h2').each(function () {
        var anchor = "<a id='" + index + "'></a>";
        jQuery(this).before(anchor);

        var li = "<li><a href='#" + index + "' class='link scrollto'>" + jQuery(this).text() + '</a></li>';

        prevH2Item = jQuery(li);
        prevH2Item.appendTo(tocList);

        var $target = jQuery('#' + index);
        var $href = jQuery('a[href="#' + index + '"]');

        jQuery(window).on('scroll', function () {
          if (isScrolledIntoView($target) == true) {
            $href.parent().addClass('active');
          } else {
            $href.parent().removeClass('active');
          }
        });

        index++;
      });
    } else {
      jQuery(tocList).parent().hide();
    }
  }

  function getExtension(url) {
    var extStart = url.indexOf('.', url.lastIndexOf('/') + 1);
    if (extStart == -1) return false;
    var ext = url.substr(extStart + 1),
      extEnd = ext.search(/$|[?#]/);
    return ext.substring(0, extEnd);
  }

  jQuery(document).on('click', '.readmore_toggle', function (e) {
    e.preventDefault();
    jQuery(this).closest('.readmore_wrapper').toggleClass('active');
  });

  jQuery(document).on('click', '.modal .modal-background', function (e) {
    e.preventDefault();
    window.location.href = '/';
  });

  jQuery(document).on('click', '.toggle-menu-mobile', function (e) {
    e.preventDefault();
    $body.toggleClass('menu-mobile-active');
  });

  jQuery(document).on('click', '.offcanvas-background', function (e) {
    e.preventDefault();
    $body.removeClass('menu-mobile-active');
  });

  jQuery(document).on('keyup', function (e) {
    if (e.key === 'Escape') {
      $body.removeClass('menu-mobile-active');
    }
  });

  jQuery('a[href*=\\#]:not([href$=\\#])').on('click', function (e) {
    e.preventDefault();

    var home = window.location.origin;

    if (jQuery(this).parent('li').hasClass('homepage_scroll')) {
      window.location = home + '/' + $.attr(this, 'href');
    } else {
      jQuery('html, body').animate(
        {
          scrollTop: jQuery($.attr(this, 'href')).offset().top - 100,
        },
        500
      );
    }
  });

  if (jQuery('select').length) {
    jQuery('select').each(function () {
      if (jQuery(this).val() === '' || jQuery(this).val() === null) {
        jQuery(this).addClass('placeholder');
      } else {
        jQuery(this).removeClass('placeholder');
      }
    });
  }

  jQuery(window).on('scroll', function () {
    stickyNav();
  });

  function stickyNav() {
    if (jQuery(window).scrollTop() > 0) {
      jQuery('body').addClass('sticky-nav-active');
    } else {
      jQuery('body').removeClass('sticky-nav-active');
    }
  }

  jQuery(document).on('change load', 'select', function (e) {
    if (jQuery(this).val() === '' || jQuery(this).val() === null) {
      jQuery(this).addClass('placeholder');
    } else {
      jQuery(this).removeClass('placeholder');
    }
  });

  function targetViewport(params) {
    jQuery('.target-viewport').each(function (i, element) {
      var $element = jQuery(element);
      if ($element.visible(true)) {
        $element.addClass('in-viewport');
      }
    });
  }

  jQuery('[data-filter]').on('change', function () {
    var $value = jQuery(this).val();
    var $target = jQuery('[data-category]');

    if ($value == '' || $value == 'all' || $value == null || $value == 'undefined') {
      $target.removeClass('hidden');
    } else {
      $target.addClass('hidden');
      jQuery('[data-category*="' + $value.toLowerCase() + '"]').removeClass('hidden');
    }
  });

  stickyNav();
  targetViewport();
});


document.addEventListener('DOMContentLoaded', function() {
  const postsGrid = document.getElementById('posts-grid');
  const paginationContainer = document.querySelector('.pagination');
  const filterInputs = document.querySelectorAll('input[data-filter]');
  let isLoading = false;

  async function loadPosts(category, page = 1) {
      if (isLoading) return;
      isLoading = true;

      // Show loading state
      if (postsGrid) {
          postsGrid.classList.add('opacity-50');
      }

      const formData = new FormData();
      formData.append('action', 'load_filtered_posts');
      formData.append('nonce', categoryFilter.nonce);
      formData.append('category', category);
      formData.append('page', page);

      try {
          const response = await fetch(categoryFilter.ajaxurl, {
              method: 'POST',
              body: formData,
              credentials: 'same-origin'
          });

          if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();

          if (data.success && postsGrid) {
              // Update posts
              postsGrid.innerHTML = data.data.posts;

              // Update pagination if it exists
              if (paginationContainer && data.data.pagination) {
                  paginationContainer.innerHTML = data.data.pagination.join('');
                  setupPaginationListeners();
              }

              // Update URL without reload
              const url = new URL(window.location);
              if (category && category !== 'all') {
                  url.searchParams.set('category', category);
              } else {
                  url.searchParams.delete('category');
              }
              if (page > 1) {
                  url.searchParams.set('paged', page);
              } else {
                  url.searchParams.delete('paged');
              }
              window.history.pushState({}, '', url);

              // Smooth scroll to top of posts grid
              postsGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
      } catch (error) {
          console.error('Error loading posts:', error);
      } finally {
          if (postsGrid) {
              postsGrid.classList.remove('opacity-50');
          }
          isLoading = false;
      }
  }

  function setupPaginationListeners() {
      const paginationLinks = document.querySelectorAll('.pagination a');
      paginationLinks.forEach(link => {
          link.addEventListener('click', function(e) {
              e.preventDefault();
              const pageNum = this.href.match(/page(?:d)?\/(\d+)/)?.[1] 
                  || this.href.match(/paged=(\d+)/)?.[1] 
                  || 1;
              const activeFilter = document.querySelector('input[data-filter]:checked');
              if (activeFilter) {
                  loadPosts(activeFilter.value, pageNum);
              }
          });
      });
  }

  // Set up filter listeners
  filterInputs.forEach(input => {
      input.addEventListener('change', function() {
          loadPosts(this.value, 1);
      });
  });

  // Initial pagination setup
  setupPaginationListeners();

  // Handle browser back/forward buttons
  window.addEventListener('popstate', function() {
      const url = new URL(window.location);
      const category = url.searchParams.get('category') || 'all';
      const page = url.searchParams.get('paged') || 1;
      
      // Update radio button
      const radioButton = document.querySelector(`input[data-filter="${category}"]`);
      if (radioButton) {
          radioButton.checked = true;
      }
      
      loadPosts(category, page);
  });
});