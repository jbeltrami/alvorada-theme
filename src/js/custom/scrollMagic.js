(function($) {
  const controller = new ScrollMagic.Controller();

  new ScrollMagic.Scene({ triggerElement: '.header' })
    .setClassToggle('.mobile-menu-container', 'scrolled')
    .addIndicators()
    .addTo(controller);
})(jQuery);
