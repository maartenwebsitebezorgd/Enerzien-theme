"use strict";
(() => {
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __commonJS = (cb, mod) => function __require() {
    return mod || (0, cb[__getOwnPropNames(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
  };

  // src/assets/js/components/viewport.js
  var require_viewport = __commonJS({
    "src/assets/js/components/viewport.js"() {
      (function($) {
        $.fn.visible = function(partial) {
          var $t = $(this), $w = $(window), viewTop = $w.scrollTop(), viewBottom = viewTop + $w.height(), _top = $t.offset().top, _bottom = _top + $t.height(), compareTop = partial === true ? _bottom : _top, compareBottom = partial === true ? _top : _bottom;
          return compareBottom <= viewBottom && compareTop >= viewTop;
        };
      })(jQuery);
    }
  });

  // src/assets/js/script.js
  require_viewport();
  jQuery(function($) {
    let $body = jQuery("body");
    setTimeout(function() {
      $body.removeClass("loading");
    }, 150);
    jQuery(window).on("resize", function() {
      targetViewport();
    });
    jQuery(window).on("scroll", function() {
      targetViewport();
    }).scroll();
    tableOfContents(".table_of_contents_wrapper ul.table_of_contents");
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
      var index = 0;
      if (jQuery(".has_table_of_contents #content h2").length) {
        jQuery("#content h2").each(function() {
          var anchor = "<a id='" + index + "'></a>";
          jQuery(this).before(anchor);
          var li = "<li><a href='#" + index + "' class='link scrollto'>" + jQuery(this).text() + "</a></li>";
          prevH2Item = jQuery(li);
          prevH2Item.appendTo(tocList);
          var $target = jQuery("#" + index);
          var $href = jQuery('a[href="#' + index + '"]');
          jQuery(window).on("scroll", function() {
            if (isScrolledIntoView($target) == true) {
              $href.parent().addClass("active");
            } else {
              $href.parent().removeClass("active");
            }
          });
          index++;
        });
      } else {
        jQuery(tocList).parent().hide();
      }
    }
    function getExtension(url) {
      var extStart = url.indexOf(".", url.lastIndexOf("/") + 1);
      if (extStart == -1)
        return false;
      var ext = url.substr(extStart + 1), extEnd = ext.search(/$|[?#]/);
      return ext.substring(0, extEnd);
    }
    jQuery(document).on("click", ".readmore_toggle", function(e) {
      e.preventDefault();
      jQuery(this).closest(".readmore_wrapper").toggleClass("active");
    });
    jQuery(document).on("click", ".modal .modal-background", function(e) {
      e.preventDefault();
      window.location.href = "/";
    });
    jQuery(document).on("click", ".toggle-menu-mobile", function(e) {
      e.preventDefault();
      $body.toggleClass("menu-mobile-active");
    });
    jQuery(document).on("click", ".offcanvas-background", function(e) {
      e.preventDefault();
      $body.removeClass("menu-mobile-active");
    });
    jQuery(document).on("keyup", function(e) {
      if (e.key === "Escape") {
        $body.removeClass("menu-mobile-active");
      }
    });
    jQuery("a[href*=\\#]:not([href$=\\#])").on("click", function(e) {
      e.preventDefault();
      var home = window.location.origin;
      if (jQuery(this).parent("li").hasClass("homepage_scroll")) {
        window.location = home + "/" + $.attr(this, "href");
      } else {
        jQuery("html, body").animate(
          {
            scrollTop: jQuery($.attr(this, "href")).offset().top - 100
          },
          500
        );
      }
    });
    if (jQuery("select").length) {
      jQuery("select").each(function() {
        if (jQuery(this).val() === "" || jQuery(this).val() === null) {
          jQuery(this).addClass("placeholder");
        } else {
          jQuery(this).removeClass("placeholder");
        }
      });
    }
    jQuery(window).on("scroll", function() {
      stickyNav();
    });
    function stickyNav() {
      if (jQuery(window).scrollTop() > 0) {
        jQuery("body").addClass("sticky-nav-active");
      } else {
        jQuery("body").removeClass("sticky-nav-active");
      }
    }
    jQuery(document).on("change load", "select", function(e) {
      if (jQuery(this).val() === "" || jQuery(this).val() === null) {
        jQuery(this).addClass("placeholder");
      } else {
        jQuery(this).removeClass("placeholder");
      }
    });
    function targetViewport(params) {
      jQuery(".target-viewport").each(function(i, element) {
        var $element = jQuery(element);
        if ($element.visible(true)) {
          $element.addClass("in-viewport");
        }
      });
    }
    jQuery("[data-filter]").on("change", function() {
      var $value = jQuery(this).val();
      var $target = jQuery("[data-category]");
      if ($value == "" || $value == "all" || $value == null || $value == "undefined") {
        $target.removeClass("hidden");
      } else {
        $target.addClass("hidden");
        jQuery('[data-category*="' + $value.toLowerCase() + '"]').removeClass("hidden");
      }
    });
    stickyNav();
    targetViewport();
  });
})();
