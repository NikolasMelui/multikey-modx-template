(function(){
  function MobileMenu(options){
    var _ = this;
    _.menu = $(options.menu);
    _.blocker = $(options.blocker);
    _.hamurger = $(options.hamburger);
    _.wrap_page = $(options.page);
    _.body = $('body');
    _.click_open = function(){
      _.hamurger.click(function(){
        _.body.addClass('mob-mnu-active');
        _.hamurger.addClass('hamburger-active');
      });
    };
    _.click_close = function(){
      _.blocker.click(function(){
        _.close();
      });
    };
    _.close = function(){
      _.body.removeClass('mob-mnu-active');
      _.hamurger.removeClass('hamburger-active');
    };
    _.init = function(){
      _.click_open();
      _.click_close();
    };
  }
  window.mmenu = MobileMenu;
})();
