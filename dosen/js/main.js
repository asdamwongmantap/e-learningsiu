$(function() {  

  // collections navigation
  $('.collections .down').click(function() {
    $('.collections .content li.current:not(:last-child)')
      .hide().removeClass('current')
      .next().fadeIn().addClass('current');
  });
  $('.collections .up').click(function() {
    $('.collections .content li.current:not(:first-child)')
      .hide().removeClass('current')
      .prev().fadeIn().addClass('current');
  });

  // currency select settings
  $('#current-currency .value').text($('#main-currency').val());
  $('#main-currency').change(function() {
    $('#current-currency .value').text($(this).val());
  });
  
  // main menu settings
  $('#main-menu li:last-child')
    .css('border-right','0')
    .css('padding-right', '0')
    .css('margin-right','0');  
  
  // main slideshow settings
  $('.main-slideshow .slider-menu div.button').click(function() {
    $('.main-slideshow .slider-menu div.button .splitter').show();
    $(this).find('.splitter').hide();
    $(this).parent().next().find('.splitter').hide();
    $(this).parent().next().find('.splitter.secondary').show();
  });
  //$('.main-slideshow .slider-menu li.current div.button .splitter').hide();
  //$('.main-slideshow .slider-menu li.current').next().find('div.button .splitter').css('display', 'none');
  
  // main slideshow navigation
  $('#main-slider-menu li div.button').click(function() {
    $('#main-slider li.current').hide().removeClass('current');
    $('#main-slider-menu li.current').removeClass('current');
    var id = $(this).attr('id').split('-');
    $('li.slide-' + id[id.length-1]).fadeIn().addClass('current');
    $(this).parent('li').addClass('current');
  });

  // shop submenu
  
  $('.shop-submenu').hide();
  var timer;
  $('#shop-submenu-area').mouseover(function() {
    clearTimeout(timer); // important
    $('.shop-submenu').show();
  });
  $('#shop-submenu-area').mouseout(function() {
    timer = setTimeout(function() {
        $('.shop-submenu').hide();
    }, 300);    
  });
  
  
  // popular products
  $('.grid-display li .info').hide();
  $('.grid-display li').hover(function() {
    $(this).find('.info').show();
  }, function() {
    $(this).find('.info').hide();
  });
  
  // desat fix for IE  
  $('.grid-display li .badge').addClass('desat');
  $('.grid-display li').hover(function() {
    $(this).find('.badge').removeClass('desat');
  }, function() {
    $(this).find('.badge').addClass('desat');
  });
  $('.list-display li .photo-wrapper .badge').addClass('desat');
  $('.list-display li .photo-wrapper').hover(function() {
    $(this).find('.badge').removeClass('desat');
  }, function() {
    $(this).find('.badge').addClass('desat');
  });
  
  
  // other products slider  
  $('#other-prod-slider').pajinate({
    items_per_page : 4,
    item_container_id : '.other-products',
    nav_panel_id : '.navigation',
    num_page_links_to_display : 0,
    show_first_last : false,
    wrap_around : true
  });
  
      // mobile approach
  
  if ( $(window).width() < 768 ) {
    unPajinatedOP();
  }
  
  $(window).resize(function() {
    if ( $(window).width() > 767 ) {
      pajinatedOP()
    } else {
      unPajinatedOP()
    }
  });
  
  function pajinatedOP() {
    $('.other-products li').css('display', 'none');
    $('.other-products li').slice(0, 4).css('display', 'block');
    $('#other-prod-slider .navigation').show();
  }
  function unPajinatedOP() {
    $('.other-products li').css('display', 'block');
    $('#other-prod-slider .navigation').hide();
  }
  
  
  // transform menus in selects for mobile  
  
  $('.top-bar .menu ul').mobileMenu({
    defaultText: 'Navigate to...',
    className: 'select-menu-top',
    subMenuDash: '&ndash;'
  });
  $('.main-menu').mobileMenu({
    defaultText: 'Navigate to...',
    className: 'select-menu-main',
    subMenuDash: '&ndash;'
  });  
  
  $('.left-nav ul.category').mobileMenu({
    defaultText: 'Select category...',
    className: 'select-menu-category',
    subMenuDash: '&ndash;'
  });
  $('.left-nav ul.colour-list').mobileMenu({
    defaultText: 'Select colour...',
    className: 'select-menu-colour',
    subMenuDash: '&ndash;'
  });
  $('.left-nav ul.price').mobileMenu({
    defaultText: 'Select price...',
    className: 'select-menu-price',
    subMenuDash: '&ndash;'
  });
  
  // breadcrumb last-child
  
  $('.breadcrumb li:last-child a').addClass('current');
  
  // product-details gallery
  
  $('.product-details .gallery .tabs li.active').click(function() {
    $('.product-details .gallery li').removeClass('current');
    var elem = $(this).attr('id');
    $('.' + elem).addClass('current');
    $(this).addClass('current');
  });
  
  // product details tabbed info 
  
  $('.product-details .prod-info .tabs li').click(function() {
    $('.product-details .prod-info li').removeClass('current');
    var elem = $(this).attr('id');
    $('.' + elem).addClass('current');
    $(this).addClass('current');
  });
  
  // quantity select settings
  $('#current-quantity .value').text($('#main-quantity').val());
  $('#main-quantity').change(function() {
    $('#current-quantity .value').text($(this).val());
  });
  
  // quantity
  
  $('.quant-input .plus').click(function() {
    var val = $(this).parent().next().val();
    val = parseInt(val) + 1;
    $(this).parent().next().val(val);
  });
  $('.quant-input .minus').click(function() {
    var val = $(this).parent().next().val();
    if (val > 0) {
      val = parseInt(val) - 1;
      $(this).parent().next().val(val);
    }
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  // placeholder polyfill
    
	if(!Modernizr.input.placeholder) {
		$("input").each(
		function() {
			if($(this).val() == "" && $(this).attr("placeholder") != "") {
				$(this).val($(this).attr("placeholder")).css('color', '#999');
				$(this).focus(function() {
					if($(this).val() == $(this).attr("placeholder")) { $(this).val(""); };
				});
				$(this).blur(function() {
					if($(this).val() == "") { $(this).val($(this).attr("placeholder")).css('color', '#999'); };
				});
			}
		});
		$('[placeholder]').parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
				  input.val('');
				}
		  })
		});
	}
  
});
