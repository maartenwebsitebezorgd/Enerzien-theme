jQuery(function($) {
  let $body = jQuery("body");
  setTimeout(function() {
    $body.removeClass("loading");
  }, 150);
  jQuery(".largeUpdateButton").on("click", function() {
    jQuery("input#publish, .acf-publish").click();
    jQuery(this).addClass("clicked");
  });
});
