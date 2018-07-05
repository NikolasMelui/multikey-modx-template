(function(){
  function Animator (options) {
    var _ = this;
        _.elems = $(options.elems);
        _.elem;
        _.scrollContainer = $(options.scrollContainer);
        _.animator = options.animator;
        _.offset = options.offsetPercent;
        _.thsElem;
        _.handler = options.handler;
    _.elemAnimator = function () {
      $(_.scrollContainer).scroll(function () {
        $.each(_.elems, function(i){
          _.elem = $(_.elems[i]);
          if (100 * _.elem.offset().top / $(window).height() <= _.offset && 100 * _.elem.offset().top / $(window).height() >= _.offset / 3) {
            _.thsElem = _.elem;
            _.callback();
            _.elem.addClass(_.animator);
          }
        });
      });
    }
    _.callback = function () {
      _.handler();
    }
    _.init = function () {
      _.elemAnimator();
    }
  }
  window.Animator = Animator;
})();
