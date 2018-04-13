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
//Popup callback
var callback = new spop({
	popup: '.open-callback',
  close_btn: '.close-callback, .blocker',
  from: '.hidden',
  to: '.page',
  wrap: 'body',
  when_open: function(){},
  when_close: function(){}
});
callback.init();
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
$("#phone").mask("+7 (999) 999-99-99");
$(window).on("load", function(){
  var preloader = $('.preloader'),
	    body = $('body');
	preloader.fadeOut();
	body.addClass('ready');
});
