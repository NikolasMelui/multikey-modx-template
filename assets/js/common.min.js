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

(function(){
  function SpacePopup(options){
    var _ = this;
    _.opened;
    _.closed;
    _.close_btn = $(options.close_btn);
    _.link = $(options.popup) || $('.open-popup');
    _.body = $('body');
    _.transition = options.transition || 500;
    _.body_class;
    _.popup_class;
    _.visible_class;
    _.fun_open = options.when_open;
    _.fun_close = options.when_close;
    _.to = options.to;
    _.parent;
    _.from = $(options.from);
    _.wrap = options.wrap;
    _.btn_open = function(){
      _.link.click(function(e){
        e.preventDefault();
        var ths = $(this),
            str = options.popup.substr(1, options.popup.length),
            href = ths.attr('href');
        _.parent = ths.closest(_.wrap).find(_.to);
        if(ths.hasClass('appender')){
          _.opened = _.from.find(href);
          _.parent.append(_.opened);
          _.parent.closest(_.wrap).addClass('appender-popup-wrap');
          _.visible_class = 'appender-popup';
        }else{
          _.visible_class = 'visible-popup';
          _.opened = $(href);
        }
        _.body_class = 'popup-' + str;
        _.popup_class = 'popup-opened-' + str;
        _.opened.addClass(_.visible_class);
        setTimeout(function(){
          _.body.addClass(_.body_class);
          _.opened.addClass(_.popup_class);
        }, 50);
        _.when_open();
      });
    };
    _.btn_close = function(){
      _.close_btn.click(function(e){
        e.preventDefault();
        _.body.removeClass(_.body_class);
        if(_.parent.closest(_.wrap).hasClass('appender-popup-wrap')){
          _.parent.closest(_.wrap).removeClass('appender-popup-wrap');
          _.opened.removeClass(_.visible_class);
          setTimeout(function(){
            _.from.append(_.opened);
          }, _.transition);
        }
        _.opened.removeClass(_.popup_class);
        setTimeout(function(){
          _.opened.removeClass(_.visible_class);
        }, _.transition);
        _.when_close();
      });
    };
    _.close = function(){
      if(_.body_class != undefined && _.popup_class != undefined){
        if(_.parent.closest(_.wrap).hasClass('appender-popup-wrap')){
          _.parent.closest(_.wrap).removeClass('appender-popup-wrap');
          _.opened.removeClass(_.visible_class);
          setTimeout(function(){
            _.from.append(_.opened);
          }, _.transition);
        }
        _.body.removeClass(_.body_class);
        _.opened.removeClass(_.popup_class);
        _.when_close();
      }
    };
    _.when_open = function(){
      _.fun_open();
    };
    _.when_close = function(){
      _.fun_close();
    };
    _.init = function(){
      _.btn_open();
      _.btn_close();
    };
  }
  window.spop = SpacePopup;
})();

(function(){
  function SpaceSlide(options){
    var _ = this;
        _.wind = $(window);
        _.slider_wrap = $(options.slider).length != 0 ? $(options.slider) : $('.slider');
        _.slider = _.slider_wrap.find(options.viewport).length != 0 ? _.slider_wrap.find(options.viewport) : _.slider_wrap.find('.multislide');
        _.slider_inner = _.slider_wrap.find(options.slide_line).length != 0 ? _.slider_wrap.find(options.slide_line) : _.slider_wrap.find('.multislide-wrap');
        _.item = _.slider_wrap.find(options.item).length != 0 ? _.slider_wrap.find(options.item) : _.slider_wrap.find('.item');
        _.row = options.row || 1;
        _.items = options.items || 1;
        _.items_slide = options.items_slide || 1;
        _.slide_arr = [];
        _.slide_len;
        _.slide_wrap;
        _.slide_index = 0;
        _.slide_act;
        _.slide_not_act;
        _.arrow = _.slider_wrap.find(options.arrow).length != 0 ? _.slider_wrap.find(options.arrow) : _.slider_wrap.find('.arrow');
        _.dots = $(document.createElement('div'));
        _.dots_len;
        _.slide;
        _.transform = 0;
        _.translate = 0;
        _.dot;
        _.dot_index = 0;
        _.direction;
        _.res_w = options.res_w || false;
        _.res_h = options.res_h || false;
        _.responsive = options.responsive;
        _.filter_func = options.filter_func;
        _.filter = options.filter || false;
        _.filter_wrap = $(options.filter_wrap).length != 0 ? $(options.filter_wrap) : $('.filter');
        _.chosen = _.filter_wrap.find(options.filter_link).length != 0 ? _.filter_wrap.find(options.filter_link) : _.filter_wrap.find('.filter-link');
        _.allitems = _.item;
        _.setinter;
        _.automove = options.automove || _.automove;
        _.interval = options.interval || 0;
        _.loop = options.loop || false;
        _.old_transform = 0;
        _.prev_dot_index = 0;
        _.prev_slide_index = 0;
        _.startX = 0;
    _.build = function(){
      _.response();
      var l = -1;
      for(var i = 0; i < _.allitems.length / _.row; i++){
        _.slide_wrap = $(document.createElement('div'));
        _.slider_inner.append(_.slide_wrap);
        _.slide_wrap.addClass('slide');
        _.slide_arr.push(_.slide_wrap);
        for(var j = 0; j < _.row; j++){
          l++;
          var ths_item = $(_.allitems[l]);
          ths_item.appendTo(_.slide_wrap);
        }
      }
      _.slide = _.slider_wrap.find('.slide');
      _.slide.css('width', Math.round(_.slider.width() / _.items));
      _.slider_inner.css('width', _.slide.width() * _.slide.length);
      _.slide_len = _.slide.length;
      var active_el = _.slide_arr;
      for(var n = 0; n < _.items; n++){
        if(active_el[n] != undefined){
          active_el[n].addClass('active-slide');
        }
      }
      _.autoMove();
    };
    _.buildDots = function(){
      _.dots.addClass('slider-dots');
      _.dots.appendTo(_.slider_wrap);
      var dots_len_1 = (_.slide_len - _.items) / _.items_slide;
          _.dots_len = Math.round(dots_len_1);
      for(var f = 0; f <= _.dots_len; f++){
        var dot_content = $(document.createElement('div'));
        dot_content.addClass('dot').attr('data-page', f);
        _.dots.append(dot_content);
        _.dot_index = f;
      }
      _.dot = _.slider_wrap.find('.dot');
      _.dot.first().addClass('dot-active');
    };
    _.arrowMove = function(){
      _.arrow.click(function(){
        var ths_arrow = $(this),
            active_sl = $('.active-slide');
        _.prev_dot_index = _.dot_index;
        _.prev_slide_index = _.slide_index;
        _.translate = _.slide.width() * _.items_slide;
        ths_arrow.hasClass('next') ? _.direction = 'next' : _.direction = 'prev';
        if(ths_arrow.hasClass('next') && _.transform < _.slider_inner.width() - _.slide.width() * _.items){
          _.transform += _.translate;
          _.dot_index = _.transform / _.translate;
          _.slide_index += _.items_slide;
          _.slide_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index + _.items);
          _.slide_not_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index);
        }else if(ths_arrow.hasClass('prev') && _.transform > 0){
          _.transform -= _.translate;
          _.dot_index = _.transform / _.translate;
          _.slide_index -= _.items_slide;
          _.slide_act = _.slide_arr.slice(_.slide_index, _.slide_index + _.items_slide);
          _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.slide_index + _.items_slide + _.items);
        }else if(_.loop){
          _.looping();
        }
        _.dotActive();
        _.moveTo();
        _.old_transform = _.transform;
      });
    };
    _.swipe = function(){
      var endX,
          moveX;
      _.dot_index = _.prev_dot_index;
      if(_.slide_len >= _.items){
        _.slider.on("touchstart", function(e){
          _.slider_inner.css('transition', '0s');
          _.startX = e.originalEvent.changedTouches[0].screenX;
          _.prev_dot_index = _.dot_index;
          _.prev_slide_index = _.slide_index;
        });
        _.slider.on("touchmove", function(e){
          endX = e.originalEvent.changedTouches[0].screenX;
          moveX = _.startX - endX;
          moveX < 0 ? _.direction = 'prev' : _.direction = 'next';
          _.translate = _.old_transform;
          _.transform = _.translate + moveX;
          if(_.direction == 'next' && _.transform < _.slider_inner.width() - _.slide.width() * _.items){
            _.dot_index = Math.round(_.transform / (_.translate + _.slide.width())) + _.prev_dot_index;
            _.slide_index = Math.round(_.transform / (_.translate + _.slide.width())) * _.items_slide + _.prev_slide_index;
            _.slide_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index + _.items);
            _.slide_not_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index);
          }else if(_.direction == 'prev' && _.transform > 0){
            _.dot_index = _.prev_dot_index - Math.ceil(_.transform / (_.translate + _.slide.width()));
            _.slide_index = _.prev_slide_index - Math.ceil(_.transform / (_.translate + _.slide.width())) * _.items_slide;
            _.slide_act = _.slide_arr.slice(_.slide_index, _.slide_index + _.items_slide);
            _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.slide_index + _.items_slide + _.items);
          }
          _.moveTo();
          _.dotActive();
        });
        _.slider.on("touchend", function(e){
          _.slider_inner.css('transition', '');
          if(_.loop && (_.direction == 'prev' && _.transform <= 0 || _.direction == 'next' && _.transform >= _.slider_inner.width() - _.slide.width() * _.items)){
              _.looping();
          }else{
            _.slide_index = _.slide_index;
            _.translate = _.slide.width() * _.items_slide;
            _.transform = _.dot_index * _.translate;
          }
          _.moveTo();
          _.dotActive();
          _.old_transform = _.transform;
          _.prev_slide_index = _.slide_index;
        });
      }
    };
    _.mouseMove = function(){
      var endX,
          moveX,
          start_move = false;
      _.dot_index = _.prev_dot_index;
      if(_.slide_len >= _.items){
        _.slider.on("mousedown", function(e){
          start_move = true;
          _.slider_inner.css({'transition': '0s', 'cursor': 'pointer'});
          _.startX = e.originalEvent.screenX;
          _.prev_dot_index = _.dot_index;
          _.prev_slide_index = _.slide_index;
        });
        _.slider.on("mousemove", function(e){
          if(start_move) {
            endX = e.originalEvent.screenX;
            moveX = _.startX - endX;
            moveX < 0 ? _.direction = 'prev' : _.direction = 'next';
            _.translate = _.old_transform;
            _.transform = _.translate + moveX;
            if(_.direction == 'next' && _.transform < _.slider_inner.width() - _.slide.width() * _.items){
              _.dot_index = Math.round(_.transform / (_.translate + _.slide.width())) + _.prev_dot_index;
              _.slide_index = Math.round(_.transform / (_.translate + _.slide.width())) * _.items_slide + _.prev_slide_index;
              _.slide_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index + _.items);
              _.slide_not_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index);
            }else if(_.direction == 'prev' && _.transform > 0){
              _.dot_index = _.prev_dot_index - Math.ceil(_.transform / (_.translate + _.slide.width()));
              _.slide_index = _.prev_slide_index - Math.ceil(_.transform / (_.translate + _.slide.width())) * _.items_slide;
              _.slide_act = _.slide_arr.slice(_.slide_index, _.slide_index + _.items_slide);
              _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.slide_index + _.items_slide + _.items);
            }
            _.moveTo();
            _.dotActive();
          }
        });
        _.slider.on("mouseup", function(e){
          start_move = false;
          _.slider_inner.css('transition', '');
          if(_.loop && (_.direction == 'prev' && _.transform <= 0 || _.direction == 'next' && _.transform >= _.slider_inner.width() - _.slide.width() * _.items)){
            _.looping();
          }
          _.slide_index = _.slide_index;
          _.translate = _.slide.width() * _.items_slide;
          _.transform = _.dot_index * _.translate;
          _.moveTo();
          _.dotActive();
          _.old_transform = _.transform;
          _.prev_slide_index = _.slide_index;
        });
      }
    };
    _.dotMove = function(){
      _.dot.click(function(){
        var ths_dot = $(this);
        _.prev_dot_index = _.dot_index;
        _.prev_slide_index = _.slide_index;
        _.slide_index = ths_dot.data('page') * _.items_slide;
        _.dot_index = ths_dot.data('page');
        _.translate = _.slide.width();
        _.transform = _.slide_index * _.translate;
        _.prev_slide_index > _.slide_index ? _.direction = 'prev' : _.direction = 'next';
        if(_.direction == 'next'){
          _.slide_act = _.slide_arr.slice(_.slide_index, _.slide_index + _.items);
          _.slide_not_act = _.slide_arr.slice(_.prev_slide_index, _.slide_index);
        }else if(_.direction == 'prev'){
          _.slide_act = _.slide_arr.slice(_.slide_index, _.prev_slide_index);
          _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.prev_slide_index + _.items);
        }
        _.dotActive();
        _.moveTo();
        _.old_transform = _.transform;
      });
    };
    _.dotActive = function(){
      _.dot.removeClass('dot-active');
      for(var v = 0; v <= _.dots_len; v++){
        if(v == _.dot_index){
          $(_.dot[v]).addClass('dot-active');
        }
      }
    };
    _.looping = function(){
      if(_.slide_len >= _.items){
        if(_.direction == 'next'){
          _.translate = 0;
          _.transform = 0;
          _.dot_index = 0;
          _.slide_index = 0;
          _.slide_act = _.slide_arr.slice(_.slide_index);
          _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.prev_slide_index + _.items);
        }else if(_.direction == 'prev'){
          _.dot_index = _.dot.last().data('page');
          _.translate = _.slide.width();
          _.transform = _.dot_index * _.items_slide * _.slide.width();
          _.slide_index = _.transform / _.translate;
          _.slide_act = _.slide_arr.slice(_.slide_index);
          _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, _.prev_slide_index + _.items);
        }
        _.dotActive();
      }
    };
    _.response = function(){
      if(_.res_w){
        for(var key in _.responsive.width){
          if(_.wind.innerWidth() > key){
            _.row = _.responsive.width[key].row || _.row;
            _.items = _.responsive.width[key].items || _.items;
            _.items_slide = _.responsive.width[key].items_slide || _.items_slide;
            _.loop = _.responsive.width[key].loop || _.loop;
            _.automove = _.responsive.width[key].automove || _.automove;
            _.interval = _.responsive.width[key].interval || _.interval;
          }
        }
      }
      if(_.res_h){
        var prev_row = _.row,
            prev_items = _.items,
            prev_items_slide = _.items_slide,
            prev_loop = _.loop,
            prev_interval = _.interval,
            prev_automove = _.automove;
        for(var key in _.responsive.height){
          if(_.wind.innerHeight() > key){
            _.row = _.responsive.height[key].row || prev_row;
            _.items = _.responsive.height[key].items || prev_items;
            _.items_slide = _.responsive.height[key].items_slide || prev_items_slide;
            _.loop = _.responsive.height[key].loop;
            _.automove = _.responsive.height[key].automove;
            _.interval = _.responsive.height[key].interval || _.interval;
          }
        }
      }
    };
    _.moveTo = function(){
      _.slider_inner.css('transform', 'translateX(' + _.transform * -1 + 'px)');
      if(_.slide_act){
        for(var m = 0; m < _.slide_act.length; m++){
          _.slide_act[m].addClass('active-slide');
        }
        for(var b = 0; b < _.slide_not_act.length; b++){
          _.slide_not_act[b].removeClass('active-slide');
        }
      }
    };
    _.autoMove = function(){
      if(_.automove === true && _.automove !== undefined){
        clearInterval(_.setinter);
        _.setinter = setInterval(function(){
          var prev_dot_index = _.dot_index,
              prev_slide_index = _.slide_index;
          _.translate = _.slide.width() * _.items_slide;
          if(_.transform < _.slider_inner.width() - _.slide.width() * _.items){
            _.transform += _.translate;
            _.dot_index = _.transform / _.translate;
            _.slide_index += _.items_slide;
            _.slide_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index + _.items);
            _.slide_not_act = _.slide_arr.slice(_.slide_index - _.items_slide, _.slide_index);
            _.direction = 'next';
            _.dotActive();
            _.moveTo();
          }else{
            _.translate = 0;
            _.transform = 0;
            _.dot_index = 0;
            _.slide_index = 0;
            _.slide_act = _.slide_arr.slice(_.slide_index);
            _.slide_not_act = _.slide_arr.slice(_.slide_index + _.items, prev_slide_index + _.items);
            _.dotActive();
            _.moveTo();
          }
          _.old_transform = _.transform;
        }, _.interval);
      }else{
        clearInterval(_.setinter);
      }
    };
    _.thrash = function(){
      _.slide.remove();
      _.dot.remove();
    };
    _.reBuild = function(){
      if(_.res_w || _.res_h || _.filter){
        _.thrash();
        _.slide_arr = [];
        _.build();
        _.buildDots();
        _.dotMove();
        _.translate = 0;
        _.transform = 0;
        _.prev_slide_index = 0;
        _.slide_index = 0;
        _.prev_dot_index = 0;
        _.dot_index = _.prev_dot_index;
        _.startX = 0;
        _.old_transform = 0;
        _.moveTo();
      }
    };
    _.resize = function(){
      _.wind.resize(function(){
        _.reBuild();
        _.slide.css('width', Math.round(_.slider.width() / _.items));
        _.slider_inner.css('width', _.slide.width() * _.slide.length);
        _.translate = _.slide.width() * _.items_slide;
        _.transform = _.translate * _.slide_index;
        _.slider_inner.css('transform', 'translateX(-' + _.transform + 'px)');
      });
    };
    _.filtr = function(){
      if(_.filter){
        _.chosen.click(function(e){
          e.preventDefault();
          var ths_link = $(this);
          if(!ths_link.hasClass('filter-active')){
            _.chosen.removeClass('filter-active');
            ths_link.addClass('filter-active');
            _.slider.addClass('slider-rebuild');
            _.dots.css('opacity', 0);
            setTimeout(function(){
              _.allitems = _.item;
              _.reBuild();
              var href = ths_link.attr('href'),
                  str = href.substr(1, href.length);
              if(str != 'clear'){
                var ths_elements = _.slider_inner.find('[data-filter="' + str + '"]');
                _.allitems = ths_elements;
                _.reBuild();
                _.slider.removeClass('slider-rebuild');
                setTimeout(function(){
                  _.dots.css('opacity', 1);
                }, 100);
              }else{
                _.slider.removeClass('slider-rebuild');
                setTimeout(function(){
                  _.dots.css('opacity', 1);
                }, 100);
              }
            }, 1000);
          }
        });
      }
    };
    _.init = function(){
      _.build();
      _.buildDots();
      _.resize();
      _.dotMove();
      _.arrowMove();
      _.swipe();
      _.mouseMove();
      _.filtr();
    };
  }
  window.sslider = SpaceSlide;
})();

//Mobile menu
var mob_menu = new mmenu({
  menu: '.mob-mnu',
  blocker: '.blocker',
  hamburger: '.hamburger',
  page: '.page'
});
mob_menu.init();
//Fullpage
var space_page = new spage({
  screen_scroll: '.screen-scroll',
  sect: '.sect',
  link: '.screen-link',
  interval: 1300,
  oversize: false,
  afterChange: function(){},
  beforeChange: function(){
  	mob_menu.close();
  }
});
space_page.init();
//Popup politics
var politics = new spop({
	popup: '.open-politics',
  close_btn: '.close-politics',
  from: '.hidden',
  to: '.page',
  wrap: 'body',
  when_open: function(){},
  when_close: function(){}
});
politics.init();
//Slider
var space_slide = new sslider({
    slider: '.slider',
    row: 1,
    items: 1,
    items_slide: 1,
    res_w: true,
    res_h: true,
    arrow: '.control',
    responsive: {
      width:{
        '300':{
          loop: false,
          automove: false,
          row: 1,
          items: 1,
          items_slide: 1
        },
        '480':{
          row: 1,
          items: 2,
          items_slide: 2
        },
        '768':{
          row: 2,
          items: 3,
          items_slide: 3
        },
        '1200':{
          loop: false,
          automove: true,
          row: 2,
          items: 4,
          items_slide: 2
        }
      },
      height:{
        '0':{
          automove: false,
          row: 1,
          items: 1,
          items_slide: 1,
        },
        '320':{
          row: 2,
          loop: true,
          automove: true,
          items: 2,
          items_slide: 1
        },
        '560':{
          automove: false,
          loop: true,
          row: 2,
          items: 3,
          items_slide: 2
        },
        '900':{
          automove: false,
          items: 4,
          items_slide: 2
        },
      }
    },
    filter: true,
    filter_wrap: '.filter',
    chosen: '.filter-link',
    viewport: '.viewport',
    slide_line: '.slide-line',
    item: '.item',
    automove: false,
    interval: 5000,
    loop: false
  });
space_slide.init();

$(window).on("load", function(){
  var preloader = $('.preloader'),
	    body = $('body');
	preloader.fadeOut();
	body.addClass('ready');
});