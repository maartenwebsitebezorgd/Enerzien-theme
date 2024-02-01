"use strict";
(() => {
  // src/assets/js/script.js
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1e3);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ")
        c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0)
        return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
  var toggleToolbar = document.querySelectorAll(".toggle-toolbar");
  var stickyToolbarContainer = document.querySelector(
    ".qore-tools-toolbar-container"
  );
  toggleToolbar.forEach(function(element) {
    element.addEventListener("click", function() {
      stickyToolbarContainer.classList.toggle("show-toolbar");
    });
  });
  function enableQoreTool(btn_class, btn_tooltip, cookie_name, toggle_element) {
    jQuery(btn_class).addClass("active");
    jQuery(toggle_element).removeClass("qt-hidden");
    jQuery(btn_class).attr("data-tooltip", btn_tooltip);
    setCookie(cookie_name, "1", 7);
  }
  function disableQoreTool(btn_class, btn_tooltip, cookie_name, toggle_element) {
    jQuery(btn_class).removeClass("active");
    jQuery(toggle_element).addClass("qt-hidden");
    jQuery(btn_class).attr("data-tooltip", btn_tooltip);
    setCookie(cookie_name, "0", 7);
  }
  document.addEventListener("DOMContentLoaded", function() {
    var qtSmoothing = getCookie("qtSmoothing");
    var qtGrid = getCookie("qtGrid");
    var qtBreakpoints = getCookie("qtBreakpoints");
    if (qtGrid == "1") {
      enableQoreTool(".qore-tools-grid", "Grid verbergen", "qtGrid", "#qore-tools-grid");
    } else {
      disableQoreTool(".qore-tools-grid", "Grid tonen", "qtGrid", "#qore-tools-grid");
    }
    if (qtBreakpoints == "1") {
      enableQoreTool(".qore-tools-breakpoints", "Breakpoints verbergen", "qtBreakpoints", "#qore-tools-breakpoints");
    } else {
      disableQoreTool(".qore-tools-breakpoints", "Breakpoints tonen", "qtBreakpoints", "#qore-tools-breakpoints");
    }
    if (qtSmoothing == "1") {
      enableQoreTool(".qore-tools-smoothing", "Font-smoothing inschakelen", "qtSmoothing", "#qore-tools-smoothing");
      jQuery("body").removeClass("qore-tools-antialiased");
      jQuery("body").addClass("qore-tools-subpixel-antialiased");
    } else {
      disableQoreTool(".qore-tools-smoothing", "Font-smoothing uitschakelen", "qtSmoothing", "#qore-tools-smoothing");
      jQuery("body").addClass("qore-tools-antialiased");
      jQuery("body").removeClass("qore-tools-subpixel-antialiased");
    }
  });
  jQuery(function($) {
    let $body = jQuery("body");
    setTimeout(function() {
      $body.removeClass("loading");
    }, 150);
    jQuery(".qore-tools-grid").on("click", function(e) {
      e.preventDefault();
      if (jQuery(".qore-tools-grid").hasClass("active")) {
        disableQoreTool(".qore-tools-grid", "Grid tonen", "qtGrid", "#qore-tools-grid");
      } else {
        enableQoreTool(".qore-tools-grid", "Grid verbergen", "qtGrid", "#qore-tools-grid");
      }
    });
    jQuery(".qore-tools-breakpoints").on("click", function(e) {
      e.preventDefault();
      if (jQuery(".qore-tools-breakpoints").hasClass("active")) {
        disableQoreTool(".qore-tools-breakpoints", "Breakpoints tonen", "qtBreakpoints", "#qore-tools-breakpoints");
      } else {
        enableQoreTool(".qore-tools-breakpoints", "Breakpoints verbergen", "qtBreakpoints", "#qore-tools-breakpoints");
      }
    });
    jQuery(".qore-tools-smoothing").on("click", function(e) {
      e.preventDefault();
      if (jQuery(".qore-tools-smoothing").hasClass("active")) {
        disableQoreTool(".qore-tools-smoothing", "Font-smoothing uitschakelen", "qtSmoothing", "#qore-tools-smoothing");
        jQuery("body").addClass("qore-tools-antialiased");
        jQuery("body").removeClass("qore-tools-subpixel-antialiased");
      } else {
        enableQoreTool(".qore-tools-smoothing", "Font-smoothing inschakelen", "qtSmoothing", "#qore-tools-smoothing");
        jQuery("body").removeClass("qore-tools-antialiased");
        jQuery("body").addClass("qore-tools-subpixel-antialiased");
      }
    });
  });
})();
