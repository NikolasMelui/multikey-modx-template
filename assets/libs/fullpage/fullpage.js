(function(){
  function SpacePage(options){
    var _ = this;
        _.screen_scroll = $(options.screen_scroll).length != 0 ? $(options.screen_scroll) : $('.screen-scroll');
        _.sect = _.screen_scroll.find(options.sect).length !=0 ? _.screen_scroll.find(options.sect) : _.screen_scroll.find('.sect');
        _.wind = $(window);
        _.body = $('body');
        _.active_link = 'active-link';
        _.body_active;
        _.link = $(options.link).length !=0 ? $(options.link) : $('.screen-link');
        _.direction = 'down';
        _.transform = 0;
        _.interval = options.interval || 500;
        _.ths_sect = $(_.sect[_.index]);
        _.next_sect = _.ths_sect.next();
        _.prev_sect = _.ths_sect.prev();
        _.index = 0;
        _.next = 0;
        _.prev = 0;
        _.oversize = options.oversize || false;
        _.anchorLink;
        _.hash = _.wind[0].location.hash;
        _.fun = options.afterChange;
        _.before = options.beforeChange;
        _.stop = true;
        _.progerss_bar = $('.progress');
        _.percent = 100 / (_.sect.length - 1);
    _.build = function (){
      var wind_height = _.wind.innerHeight();
      _.sect.css({'height': wind_height});
      _.linkActive();
      if(_.hash){
        var hash_str = _.hash.substr(2, _.hash.length);
        _.ths_sect = $('#' + hash_str);
        _.linkActive();
      }
      _.moveWithAncore();
      _.active();
      _.beforeChange();
      _.afterChange();
      _.progressBar();
    };
    _.active = function(){
      var ths_id = $(_.sect[_.index]).attr('id'),
          body_ths_class = 'body-' + ths_id,
          active_sect_id = $('.active').attr('id'),
          body_active_class = 'body-' + active_sect_id;
      _.direction == 'down' ? _.body.removeClass('body-active-' + _.prev + ' ' + body_active_class) : _.body.removeClass('body-active-' + _.next + ' ' + body_active_class);
      _.sect.removeClass('active active-sect active-next active-prev');
      _.direction == 'down' ? _.sect.removeClass('active-' + _.prev + ' active-next') : _.sect.removeClass('active-' + _.next + ' active-prev');
      $(_.sect[_.index + 1]).addClass('active-next');
      $(_.sect[_.index - 1]).addClass('active-prev');
      $(_.sect[_.index]).addClass('active');
      setTimeout(function(){
        $(_.sect[_.index]).addClass('active-sect');
      }, _.interval);
      $(_.sect[_.index]).addClass('active-' + _.index);
      _.body.addClass('body-active-' + _.index + ' ' + body_ths_class);
    };
    _.linkActive = function(){
      _.link.removeClass(_.active_link);
      var active_sect = $('.active'),
          id_active = active_sect.attr('id'),
          ths_link = $('[href="#' + id_active + '"]'),
      link_parent = ths_link.parent();
      link_parent.addClass(_.active_link);
    };
    _.anchor = function(){
      _.anchorLink = $(_.sect[_.index]).attr('id')
      _.wind[0].location.hash = _.index + 1 + _.anchorLink;
    };
    _.resize = function(){
      _.wind.resize(function(){
        _.build();
        _.active();
      });
    };
    _.mouseweel = function(){
      if(_.stop){
        var debounceTimer = 0,
            debounce = true;
        _.sect.on("wheel", function(e){
          e.originalEvent.deltaY > 0 ? _.direction = 'down' : _.direction = 'up';
          _.ths_sect = $(this);
          _.next_sect = $(this).next();
          _.prev_sect = $(this).prev();
          _.overflow();
          if (!debounce) {
            return;
          }
          debounce = false;
          clearTimeout(debounceTimer);
          debounceTimer = setTimeout(function(){
            debounce = true;
          }, _.interval);
          if($(e.target).closest('.scrollable').hasClass('scrollable')){
            if(_.oversize){
              _.move();
            }
          }else{
            _.move();
          }
        });
      }
    };
    _.swipe = function(){
      if(_.stop){
        var startY,
            endY,
            startX,
            endX;
        _.sect.on("touchstart", function(e){
          startY = e.originalEvent.changedTouches[0].screenY;
          startX = e.originalEvent.changedTouches[0].screenX;
        });
        _.sect.on("touchend", function(e){
          _.ths_sect = $(this);
          _.next_sect = $(this).next();
          _.prev_sect = $(this).prev();
          endY = e.originalEvent.changedTouches[0].screenY;
          endX = e.originalEvent.changedTouches[0].screenX;
          startY < endY ? _.direction = 'up': _.direction = 'down';
          startY - endY > 70 || startY - endY < -70 ? _.overflow() : _.oversize = false;
          if($(e.target).closest('.scrollable').hasClass('scrollable')){
            if(_.oversize){
              _.move(false, _.ths_sect);
            }
          }else if(startX - endX > 100 || startX - endX < -100){
            return;
          }else{
            startY - endY > 70 || startY - endY < -70 ? _.oversize = true : _.oversize = false;
            if(_.oversize){
              _.move(false, _.ths_sect);
            }
          }
        });
      }
    };
    _.move = function(){
      if(((_.direction == 'down' && _.index >= 0) || (_.direction == 'up' && _.index > 0)) && ((_.direction == 'down' && _.index < _.sect.length - 1) || (_.direction == 'up' && _.index <= _.sect.length - 1))){
        _.direction == 'down' ? _.index = _.index += 1 : _.index -= 1;
        _.next = _.index + 1;
        _.prev = _.index - 1;
        _.active();
        _.linkActive();
        _.anchor();
        _.beforeChange();
        _.afterChange();
        _.progressBar();
      }
    };
    _.moveTo = function(){
      _.link.click(function(e){
        e.preventDefault();
        var prev_active = $('.active').attr('id');
        _.body.removeClass('body-active-' + _.index + ' body-' + prev_active);
        _.sect.removeClass('active-' + _.index);
        _.sect.removeClass('active active-sect');
        var href = $(this).find('a').attr('href'),
            str = href.substr(1, href.length);
        _.oversize = true;
        for(i = 0; i < _.sect.length; i++){
          if($(_.sect[i]).attr('id') == str){
            _.index = i;
          }
        }
        $(_.sect[_.index]).addClass('active');
        setTimeout(function(){
          $(_.sect[_.index]).addClass('active-sect');
        }, 1500);
        setTimeout(function(){
          $(_.sect[_.index]).addClass('active-' + _.index);
        }, 1000);
        _.body.addClass('body-active-' + _.index);
        _.linkActive();
        _.active();
        _.anchor();
        _.beforeChange();
        _.afterChange();
        _.progressBar();
      });
    };
    _.moveWithAncore = function(){
      _.body.removeClass('body-active-' + _.index);
      _.sect.removeClass('active-' + _.index);
      _.sect.removeClass('active active-sect');
      _.hash = _.wind[0].location.hash;
      var str = _.hash.substr(2, _.hash.length)
      for(i = 0; i < _.sect.length; i++){
        if($(_.sect[i]).attr('id') == str){
          _.index = i;
        }
      }
      _.moveTo()
      $(_.sect[_.index]).addClass('active');
      setTimeout(function(){
        $(_.sect[_.index]).addClass('active-sect');
      }, 1500);
      setTimeout(function(){
        $(_.sect[_.index]).addClass('active-' + _.index);
      }, 1000);
      _.body.addClass('body-active-' + _.index);
      _.linkActive();
    }
    _.overflow = function(){
      if(_.ths_sect.find('.scrollable').length != 0 && _.ths_sect != undefined){
        var scrollable = _.ths_sect.find('.scrollable');
        _.direction == "down" ? _.oversize = scrollable.height() + scrollable.scrollTop() + 10 >= scrollable[0].scrollHeight :  _.oversize = scrollable.scrollTop() == 0;
      }else{
        _.oversize = true;
      }
    };
    _.beforeChange = function(before){
      _.before();
    };
    _.afterChange = function(fun){
      setTimeout(function(){
        _.fun();
      }, _.interval);
    };
    _.stop = function(){

    };
    _.progressBar = function(){
      _.progerss_bar.css('width', _.percent * _.index + '%');
    };
    _.init = function(){
      _.build();
      _.resize();
      _.mouseweel();
      _.swipe();
      _.moveTo();
    };
  }
  window.spage = SpacePage;
})();
