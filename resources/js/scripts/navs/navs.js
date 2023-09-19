(function (window, document, $) {
  'use strict';
  // for active tab arrow
  $('.nav-tabs .nav-item').click(function () {
    $(this).addClass('current').siblings().removeClass('current');
  });
  // add current class to parent of active class
  if ($('.nav-tabs .nav-item' ).length > 0) {
    $('.nav-tabs .nav-item').find('.active').parent().addClass("current");
  }
  // add class pill-cotainer with pill componet for styling
  if($('.nav.nav-pills').length > 0){
   $('.nav-pills').addClass('pill-container');
  }

})(window, document, jQuery);
