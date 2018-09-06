(function(){
  function LinkActivator (options) {
    var _ = this;
    _.link = $(options.link);
    _.scrollContainer = $(options.scrollContainer);
    _.sections = $(options.sect);
    _.findlink = function () {
      $(_.scrollContainer).scroll(function () {
        for (var i = 0; i < _.sections.length; i++) {
          if (_.scrollContainer[0].scrollTop >= _.sections[i].offsetTop - 50 && _.scrollContainer[0].scrollTop <= _.sections[i].offsetTop + 50) {
            var id = $(_.sections[i]).attr('id');
            _.link.removeClass('active-link');
            $(options.link + '[href="#' + id + '"]').addClass('active-link');
          }
        }
      })
    }
    _.init = function () {
      _.findlink();
    }
  }
  window.linkActivator = LinkActivator;
})();
