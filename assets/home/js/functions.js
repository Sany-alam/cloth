(function($){
    "use strict"; // Start of use strict
    var stickyHeaderTop =0;
    if( $('#header .main-menu').length > 0){
      stickyHeaderTop = $('#header .main-menu').offset().top;
    }
     /* ---------------------------------------------
     Stick menu
     --------------------------------------------- */
     function kutetheme_ovic_stick_menu(){

      if($('#header .main-menu').length >0){
          var h = $(window).scrollTop();
          var width = $(window).width();
          if(width > 991){

              if((h > stickyHeaderTop) ){
                  kutetheme_ovic_clone_header_ontop();
                  $('#header-ontop').addClass('on-sticky');
                  $('#header-ontop').find('.header').addClass('ontop');
              }else{
                  $('#header-ontop').removeClass('on-sticky');
                  $('#header-ontop').find('.header').removeClass('ontop');
              }
          }else{
              $('#header-ontop').find('.header').removeClass('ontop');
              $('#header-ontop').removeClass('on-sticky');
          }
      }
     }
     function kutetheme_ovic_clone_header_ontop(){
        if( $('#header').length > 0 && $('#header-ontop').length >0 && !$('#header').hasClass('no-ontop') ){
          if( $('#header-ontop').find('.header').length <= 0 ){
            var content = $( "#header" ).clone();
            content.removeAttr('id');
            content.appendTo( "#header-ontop" );
          }
        }
    }

    /* ---------------------------------------------
     Owl carousel
     --------------------------------------------- */
    function kutetheme_ovic_carousel(){
        $('.owl-carousel').each(function(){
          var config = $(this).data();
          var animateOut = $(this).data('animateout');
          var animateIn = $(this).data('animatein');
          var slidespeed = $(this).data('slidespeed');
          config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];

          if(typeof(animateOut)  != 'undefined' ){
            config.animateOut = animateOut;
          }
          if(typeof(animateIn) != 'undefined' ){
            config.animateIn = animateIn;
          }

          if( typeof(slidespeed) != 'undefined' ){
            config.smartSpeed = slidespeed;
          }
          var owl = $(this);
          owl.owlCarousel(config);
        });
    }
    function is_ie() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
        {
           return true;
        }
        else  // If another browser, return 0
        {
           return false;
        }
    }
    /* ---------------------------------------------
     Owl carousel mobile
     --------------------------------------------- */
    function kutetheme_ovic_init_carousel_mobile(){
        var window_size = jQuery('body').innerWidth();
        window_size += kutetheme_ovic_get_scrollbar_width();
        if( window_size < 768 ){
          $('.owl-carousel-mobile').each(function(){
            var config = $(this).data();
            var animateOut = $(this).data('animateout');
            var animateIn = $(this).data('animatein');
            if(typeof animateOut != 'undefined' ){
              config.animateOut = animateOut;
            }
            if(typeof animateIn != 'undefined' ){
              config.animateIn = animateIn;
            }

            var owl = $(this);
            owl.owlCarousel(config);
          });
        }
    }
    /* ---------------------------------------------
     MENU REPONSIIVE
     --------------------------------------------- */
     function kutetheme_ovic_init_menu_reposive(){
          var kt_is_mobile = (Modernizr.touch) ? true : false;
          if(kt_is_mobile === true){
            $(document).on('click', '.kt-nav .menu-item-has-children > a', function(e){
              var licurrent = $(this).closest('li');
              var liItem = $('.kt-nav .menu-item-has-children');
              if ( !licurrent.hasClass('show-submenu') ) {
                liItem.removeClass('show-submenu');
                licurrent.parents().each(function (){
                    if($(this).hasClass('menu-item-has-children')){
                     $(this).addClass('show-submenu');   
                    }
                      if($(this).hasClass('main-menu')){
                          return false;
                      }
                })
                licurrent.addClass('show-submenu');
                // Close all child submenu if parent submenu is closed
                if ( !licurrent.hasClass('show-submenu') ) {
                  licurrent.find('li').removeClass('show-submenu');
                  }
                  return false;
                  e.preventDefault();
              }else{
                var href = $this.attr('href');
                  if ( $.trim( href ) == '' || $.trim( href ) == '#' ) {
                      licurrent.toggleClass('show-submenu');
                  }
                  else{
                      window.location = href;
                  } 
              }
              // Close all child submenu if parent submenu is closed
                  if ( !licurrent.hasClass('show-submenu') ) {
                      //licurrent.find('li').removeClass('show-submenu');
                  }
                  e.stopPropagation();
          });
          $(document).on('click', function(e){
              var target = $( e.target );
              if ( !target.closest('.show-submenu').length || !target.closest('.kt-nav').length ) {
                  $('.show-submenu').removeClass('show-submenu');
              }
          }); 
          // On Desktop
          }else{
            
              $(document).on('mousemove','.kt-nav .menu-item-has-children',function(){
                  $(this).addClass('show-submenu');
              })

              $(document).on('mouseout','.kt-nav .menu-item-has-children',function(){
                  $(this).removeClass('show-submenu');
              })
          }
     }
    /* ---------------------------------------------
     Resize mega menu
     --------------------------------------------- */
     function kutetheme_ovic_resizeMegamenu(){
        var window_size = jQuery('body').innerWidth();
        window_size += kutetheme_ovic_get_scrollbar_width();
          if( $('#header .main-menu-wapper').length >0){
            var container = $('#header .main-menu-wapper');
            if( container!= 'undefined'){
              var container_width = 0;
              container_width = container.innerWidth();
              var container_offset = container.offset();
              setTimeout(function(){
                  $('.main-menu .item-megamenu').each(function(index,element){
                      $(element).children('.megamenu').css({'max-width':container_width+'px'});
                      var sub_menu_width = $(element).children('.megamenu').outerWidth();
                      var item_width = $(element).outerWidth();
                      $(element).children('.megamenu').css({'left':'-'+(sub_menu_width/2 - item_width/2)+'px'});

                      var container_left = container_offset.left;
                      var container_right = (container_left + container_width);
                      var item_left = $(element).offset().left;
                      var overflow_left = (sub_menu_width/2 > (item_left - container_left));
                      var overflow_right = ((sub_menu_width/2 + item_left) > container_right);
                      if( overflow_left ){
                        var left = (item_left - container_left);
                        $(element).children('.megamenu').css({'left':-left+'px'});
                      }
                      if( overflow_right && !overflow_left ){
                        var left = (item_left - container_left);
                        left = left - ( container_width - sub_menu_width );
                        $(element).children('.megamenu').css({'left':-left+'px'});
                      }
                  })
              },100);
            }
          }
     }
     function kutetheme_ovic_get_scrollbar_width() {
        var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
            $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
            inner = $inner[0],
            outer = $outer[0];
        jQuery('body').append(outer);
        var width1 = inner.offsetWidth;
        $outer.css('overflow', 'scroll');
        var width2 = outer.clientWidth;
        $outer.remove();
        return (width1 - width2);
    }
    function kt_home_slide(){
        var window_size = jQuery('body').innerWidth();
        window_size += kutetheme_ovic_get_scrollbar_width();

        $('.kt_home_slide').each(function(){
          // Seting
          $(this).find('.item-slide').each(function(){
            var background = $(this).data('background');
            var height = $(this).data('height');
            var reponsive = $(this).data('reponsive');
            if( typeof(background) != 'undefined'){
              $(this).css({
               'background-image':'url('+background+')'
              });
            }
            if( typeof(height) != 'undefined'){
              height = height+'px';
              $(this).css({
               'height':height
              });
            }

            if (typeof(reponsive) != 'undefined'){
              //console.log(window_size);
               for (var k in reponsive){
                    if (typeof reponsive[k] !== 'function') {
                        if( window_size <= k ){
                          if( reponsive[k] > 0 ){
                            $(this).css({
                              'min-height':reponsive[k]+'px',
                              'height':reponsive[k]+'px'
                            });
                            break;
                          }
                        }
                    }
                }
             }
          })

          /* OWL */
          var owl = $(this);
          var config = $(this).data();
          var navnexttext = $(this).data('navnexttext');
          var navprevtext = $(this).data('navprevtext');
          if( (typeof(navnexttext) != 'undefined') && (typeof(navprevtext) != 'undefined')){
            config.navText = [navprevtext,navnexttext];
          }else{
            config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];
          }
          
          var animateOut = $(this).data('animateout');
          var animateIn = $(this).data('animatein');
          var smartSpeed = $(this).data('smartspeed');
          
          if(typeof (animateOut) != 'undefined' ){
            config.animateOut = animateOut;
          }
          if(typeof (animateIn) != 'undefined' ){
            config.animateIn = animateIn;
          }

          if( typeof smartSpeed != 'undefined'){
              config.smartSpeed = smartSpeed;
          }else{
            config.smartSpeed = 2000;
          }



          owl.owlCarousel(config);
          owl.trigger('next.owl.carousel');
          owl.on('changed.owl.carousel', function(property) {
            var current = property.item.index;
            $(property.target).find(".owl-item").eq(current).find(".caption").each(function(i){
                var t = $(this);
                var style = $(this).attr("style");
                style     = ( style == undefined ) ? '' : style;
                var delay  = i+1 * 1000;
                var animate = t.data('animate');
                t.attr("style", style +
                          ";-webkit-animation-delay:" + delay + "ms;"
                        + "-moz-animation-delay:" + delay + "ms;"
                        + "-o-animation-delay:" + delay + "ms;"
                        + "animation-delay:" + delay + "ms;"
                ).addClass('animated '+ animate).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $(this).removeClass('animated '+animate);
                });
                
            })
          })
        });
    }
    function kt_parallaxInit() {
        var window_size = jQuery('body').innerWidth();
        window_size += kutetheme_ovic_get_scrollbar_width();
        if( window_size > 991 ){
          $('.bg-parallax').each(function(){
            $(this).parallax('50%', 0.3);
          });
        }
        
    }
    function js_height_full(){
        (function($){
            var height = $(window).outerHeight();
            $(".full-height").css("height",height);
        })(jQuery);
    }
    function js_width_full(){
        (function($){
            var width = $(window).outerWidth();
            $(".full-width").css("width",width);
        })(jQuery);
    }
    /* ---------------------------------------------
     OWL TAB EFFECT
     --------------------------------------------- */
    function kt_tab_fadeeffect(){
      // effect first tab
      if(! is_ie() ){

          // effect click
          $(document).on('click','.kt-tab-fadeeffect a[data-toggle="tab"]',function(){
            var item = '.product-item';

            var tab_id = $(this).attr('href');
            var tab_animated = $(this).data('animated');
            tab_animated = ( tab_animated == undefined ) ? 'fadeInUp' : tab_animated;

            if( $(tab_id).find('.owl-carousel').length > 0 ){
              item = '.owl-item.active';
            }
            $(tab_id).find(item).each(function(i){
                var t = $(this);
                var style = $(this).attr("style");
                style     = ( style == undefined ) ? '' : style;
                var delay  = i * 200;
                t.attr("style", style +
                          ";-webkit-animation-delay:" + delay + "ms;"
                        + "-moz-animation-delay:" + delay + "ms;"
                        + "-o-animation-delay:" + delay + "ms;"
                        + "animation-delay:" + delay + "ms;"
                ).addClass(tab_animated+' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    t.removeClass(tab_animated+' animated');
                    t.attr("style", style);
                });
            })
          })
      }
    }
    function kutetheme_ovic_clone_main_menu(){
        if( $('#header .clone-main-menu').length > 0 && $('#box-mobile-menu').length >0){
          $( "#header .clone-main-menu" ).clone().appendTo( "#box-mobile-menu .box-inner" );
          $('#box-mobile-menu').find('.clone-main-menu').removeAttr('id');
        }
    }

    $(window).bind('load', function(){
      kutetheme_ovic_carousel();
      kt_parallaxInit();
      kutetheme_ovic_stick_menu();
      kutetheme_ovic_clone_main_menu();
    })
    /* ---------------------------------------------
     Scripts initialization
     --------------------------------------------- */
    $(window).load(function() {
        kutetheme_ovic_init_carousel_mobile();
    });
    /* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    $(window).on("resize", function() {
      // Resize Megamenu
        kutetheme_ovic_resizeMegamenu();
        kutetheme_ovic_init_carousel_mobile();
        js_height_full();
        js_width_full();
    });
    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    $(window).scroll(function(){
      kutetheme_ovic_stick_menu();
      // Show hide scrolltop button
      if( $(window).scrollTop() == 0 ) {
          $('.scroll_top').stop(false,true).fadeOut(600);
      }else{
          $('.scroll_top').stop(false,true).fadeIn(600);
      }
    });
    /* ---------------------------------------------
     Scripts ready
     --------------------------------------------- */

    $(document).ready(function() {
      kutetheme_ovic_init_menu_reposive();
      kutetheme_ovic_resizeMegamenu();
      kt_home_slide();
      js_height_full();
      js_width_full();
      kt_tab_fadeeffect();

      // FORM SEARCH

      $(document).on('click','.form-search .icon',function(){
          $(this).closest('.form-search').find('form').addClass('open');
          return false;
      })
      $(document).on('click','.form-search .close-box',function(){
          $(this).closest('.form-search').find('form').removeClass('open');
          return false;
      })

      // Category product
      $(document).on('click','.widget_product_categories a',function(){
          var paerent = $(this).closest('li');
          var t = $(this);
          paerent.toggleClass('open');
          if(paerent.children('ul').length > 0){
              $(this).closest('li').children('ul').slideToggle();
              return false;
          }
      });

      $('.widget_product_categories').each(function(){
          $(this).find('.current-cat-parent').addClass('open');
      });
      // CATEGORY FILTER 
        $('.slider-range-price').each(function(){
            var min             = $(this).data('min');
            var max             = $(this).data('max');
            var unit            = $(this).data('unit');
            var value_min       = $(this).data('value-min');
            var value_max       = $(this).data('value-max');
            var label_reasult   = $(this).data('label-reasult');
            var t               = $(this);
            $( this ).slider({
              range: true,
              min: min,
              max: max,
              values: [ value_min, value_max ],
              slide: function( event, ui ) {
                var result = '<span class="from">'+ unit + ui.values[ 0 ] +' </span> - <span class="to"> '+ unit +ui.values[ 1 ]+'</span>';
                t.closest('.price_slider_wrapper').find('.amount-range-price').html(result);
              }
            });
        })

        //
        $('.woocommerce-ordering select').chosen();

        $('.variations select').chosen();
        
        //CATEGORIES GRID
        $('.shop-grid-masonry').each(function(){
            var $isotopGrid = $(this);
            var layout_mode = $isotopGrid.attr('data-layoutmode');
            var cols = $isotopGrid.data('cols');
            $(this).addClass('columns-'+cols);

            // Re-layout after images loaded
            $isotopGrid.isotope({
                resizable: false, 
                itemSelector : '.grid',
                layoutMode: layout_mode,
                transitionDuration: '0.6s',
                packery: {
                    gutter: 0
                },
                masonry: {
                  // use outer width of grid-sizer for columnWidth
                  columnWidth: '.grid-sizer'
                }
            }).isotope( 'layout' );
            
            // layout Isotope after each image loads
            $isotopGrid.imagesLoaded().progress( function() {
                $isotopGrid.isotope('layout');
            });
        });

        // Instantiate EasyZoom instances
        if( $('.kt-easyzoom').length > 0 ){
            var $easyzoom = $('.kt-easyzoom').easyZoom();

          // Setup thumbnails example
          var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

          $('.kt-zoom-thumbnails').on('click', 'a', function(e) {
            var $this = $(this);
            $(this).closest('.kt-zoom-thumbnails').find('.thumb').each(function(){
                $(this).removeClass('selected');
            })
            $this.addClass('selected');
            e.preventDefault();
            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
          });
        }
        // Scroll top 
        $(document).on('click','.scroll_top',function(){
          $('body,html').animate({scrollTop:0},400);
          return false;
        });
        
        // BOX MOBILE MENU
        $(document).on('click','.mobile-navigation',function(){
          $('#box-mobile-menu').addClass('open');
          return false;
        });
        // Close box menu
        $(document).on('click','#box-mobile-menu .close-menu',function(){
            $('#box-mobile-menu').removeClass('open');
            return false;
        });
        //  Box mobile menu
        if($('#box-mobile-menu').length >0 ){
            $("#box-mobile-menu").mCustomScrollbar();
        }
        $(document).on('click','.close-block-newsletter',function(){
            $(this).closest('.block-newsletter').fadeOut(600);
        });
        $(document).on('click','.open-mainmenu',function(){
          var container = $(this).closest('.main-header');
          container.find('.header-control').toggle(600);
          container.find('.main-menu').toggle(600);
          return false;
        })
        $(document).on('click','.showlogin',function(){
          $('.login').slideToggle();
          return false;
        })
        $(document).on('click','.showcoupon',function(){
          $('.checkout_coupon').slideToggle();
          return false;
        })

        $(document).on('change','.woocommerce-checkout-payment .input-radio',function(){
          $(this).closest('.woocommerce-checkout-payment').find('.wc_payment_method ').each(function(){
            $(this).removeClass('selected');
          })
          $(this).closest('.wc_payment_method').addClass('selected');
        })

        // FAQ 
        $(document).on('click','.faq .title',function(){
          $(this).closest('.faqs').find('.faq').each(function(){
            $(this).removeClass('selected');
          })

          $(this).closest('.faq').addClass('selected');
        })

        /* Send conttact*/
        $(document).on('click','#btn-send-contact',function(){
                var email   = $('#email').val(),
                name = $('#name').val(),
                content = $('#content').val();
            var data = {
                email:email,
                content:content,
                name:name
            }

            $(this).html('Loading...');
            var t = $(this);
            $.post('ajax_contact.php',data,function(result){
                if(result.trim()=="done"){
                    $('#email').val('');
                    $('#content').val('');
                    $('#name').val('');
                    $('#message-box-conact').html('<div class="alert alert-info">Your message was sent successfully. Thanks</div>');
                }else{
                    $('#message-box-conact').html(result);
                }
                t.html('SEND');
            })
        })
    })
    
})(jQuery); // End of use strict