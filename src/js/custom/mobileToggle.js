(function($) {
  const toggleMenu = ev => {
    const menu = $('.mobile-menu');
    const menuToggle = $('.mobile-menu-toggle');

    menu.hasClass('open') ? menu.removeClass('open') : menu.addClass('open');
    return menuToggle.hasClass('open')
      ? menuToggle.removeClass('open')
      : menuToggle.addClass('open');
  };

  $('.mobile-menu-toggle').on('click', toggleMenu);
})(jQuery);
