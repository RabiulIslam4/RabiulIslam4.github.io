!function($) {
	"use strict";
    /* jQuery Enable Click Event For Switch */
    $('.switch-option-enable').on('click',function(){    
      if (!$(this).hasClass('selected')) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass('selected');
          $(this).addClass('selected');
          c.val(1).trigger('change');
        }
    });

    /* jQuery Disable Click Event For Switch */
    $('.switch-option-disable').on('click',function(){
      if (!$(this).hasClass("selected")) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass("selected");
          $(this).addClass("selected");
          c.val(0).trigger('change');
        }
    });    

    /* jQuery For Preview Image */
    $('.hcode-preview-image-main').parent().parent().find('.wpb_element_label').hide();
    $('.slider_premade_style,.hcode_page_title_premade_style,.tabs_style,.hcode_alert_massage_premade_style,.hcode_team_member_premade_style,.accordian_pre_define_style,.hcode_single_image_premade_style,.button_style,.hcode_feature_type,.hcode_heading_type,.popup_type,.counter_or_chart,.hcode_block_premade_style,.hcode_tab_content_premade_style,.hcode_font_icon_premade_style,.hcode_et_icon_premade_style,.hcode_newsletter_premade_style,.slider_content_premade_style,.show_content,.hcode_parallax_style,.show_blog_slider_style,.hcode_portfolio_filter_style').each(preview_image);
    $('.slider_premade_style,.hcode_page_title_premade_style,.tabs_style,.hcode_alert_massage_premade_style,.hcode_team_member_premade_style,.accordian_pre_define_style,.hcode_single_image_premade_style,.button_style,.hcode_feature_type,.hcode_heading_type,.popup_type,.counter_or_chart,.hcode_block_premade_style,.hcode_tab_content_premade_style,.hcode_font_icon_premade_style,.hcode_et_icon_premade_style,.hcode_newsletter_premade_style,.slider_content_premade_style,.show_content,.hcode_parallax_style,.show_blog_slider_style,.hcode_portfolio_filter_style').bind('change keyup', preview_image);

    function preview_image(){
      var current_selected_reload = $(this).val();
      $(this).parent().parent().parent().find('.hcode-preview-image-main').hide();
      if(current_selected_reload != ''){
        $(this).parent().parent().parent().find('.hcode-preview-image-main').show();
        var preview_src = $(this).parent().parent().parent().find('.hcode-preview-image-main').data('url')+'/'+current_selected_reload+'.jpg';
        $(this).parent().parent().parent().find('.hcode-preview-image-main img').attr('src',preview_src);
      }
    }

    /* jQuery Click Event For Icon */
    $('.hcode_icon_preview').on('click', function() {
        if( $(this).hasClass('active_icon') ){
          $(this).removeClass('active_icon');
          $(this).parent().parent().find('.hcode_icon_field').val('');
        }else{
          $('.hcode_icon_preview').removeClass('active_icon');
          $(this).addClass('active_icon');
          var selected_icon = $(this).children().attr('data-name');
          $(this).parent().parent().find('.hcode_icon_field').val(selected_icon);
        }
    });

    /* For Desktop Custom Padding Settings */
    var desktopdefaultVal = $( '.hcode-desktop-custom-select' ).parent().find( '.hcode-desktop-custom-select-value' ).val();
    if( desktopdefaultVal ){ 
      $( '.hcode-desktop-custom-select' ).find("option[value='" + desktopdefaultVal +"']").attr('selected', true);
    }

    $( '.hcode-desktop-custom-select' ).bind('change keyup', function(e) {
      var desktop_current_selected = $(this).val();
      $(this).parent().find( '.hcode-desktop-custom-select-value' ).val( desktop_current_selected );

      if( desktop_current_selected == 'custom-desktop-padding' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_padding]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_padding]').addClass('vc_dependent-hidden');
      }
    });

    /* For Ipad Custom Padding Settings */

    var ipaddefaultVal = $( '.hcode-ipad-custom-select' ).parent().find( '.hcode-ipad-custom-select-value' ).val();
    if( ipaddefaultVal ){ 
      $( '.hcode-ipad-custom-select' ).find("option[value='" + ipaddefaultVal +"']").attr('selected', true);
    }
    $( '.hcode-ipad-custom-select' ).bind('change keyup', function(e) {
      var ipad_current_selected = $(this).val();
      $(this).parent().find( '.hcode-ipad-custom-select-value' ).val( ipad_current_selected );
      console.log(ipad_current_selected);
      if( ipad_current_selected == 'custom-ipad-padding' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_padding]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_padding]').addClass('vc_dependent-hidden');
      }
    });

    /* For Mobile Custom Padding Settings */

    var mobiledefaultVal = $( '.hcode-mobile-custom-select' ).parent().find( '.hcode-mobile-custom-select-value' ).val();
    if( mobiledefaultVal ){ 
      $( '.hcode-mobile-custom-select' ).find("option[value='" + mobiledefaultVal +"']").attr('selected', true);
    }
    $( '.hcode-mobile-custom-select' ).bind('change keyup', function(e) {
      var mobile_current_selected = $(this).val();
      $(this).parent().find( '.hcode-mobile-custom-select-value' ).val( mobile_current_selected );

      if( mobile_current_selected == 'custom-mobile-padding' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_padding]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_padding]').addClass('vc_dependent-hidden');
      }
    });

    /* For Desktop Custom Margin Settings */
    var desktopmargindefaultVal = $( '.hcode-desktop-custom-margin-select' ).parent().find( '.hcode-desktop-custom-margin-select-value' ).val();
    if( desktopmargindefaultVal ){ 
      $( '.hcode-desktop-custom-margin-select' ).find("option[value='" + desktopmargindefaultVal +"']").attr('selected', true);
    }

    $( '.hcode-desktop-custom-margin-select' ).bind('change keyup', function(e) {
      var desktop_current_margin_selected = $(this).val();
      $(this).parent().find( '.hcode-desktop-custom-margin-select-value' ).val( desktop_current_margin_selected );

      if( desktop_current_margin_selected == 'custom-desktop-margin' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_margin]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_margin]').addClass('vc_dependent-hidden');
      }
    });

    /* For Ipad Custom Margin Settings */

    var ipadmargindefaultVal = $( '.hcode-ipad-custom-margin-select' ).parent().find( '.hcode-ipad-custom-margin-select-value' ).val();
    if( ipadmargindefaultVal ){ 
      $( '.hcode-ipad-custom-margin-select' ).find("option[value='" + ipadmargindefaultVal +"']").attr('selected', true);
    }
    $( '.hcode-ipad-custom-margin-select' ).bind('change keyup', function(e) {
      var ipad_margin_current_selected = $(this).val();
      $(this).parent().find( '.hcode-ipad-custom-margin-select-value' ).val( ipad_margin_current_selected );

      if( ipad_margin_current_selected == 'custom-ipad-margin' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_margin]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_margin]').addClass('vc_dependent-hidden');
      }
    });

    /* For Mobile Custom Margin Settings */

    var mobilemargindefaultVal = $( '.hcode-mobile-custom-margin-select' ).parent().find( '.hcode-mobile-custom-margin-select-value' ).val();
    if( mobilemargindefaultVal ){ 
      $( '.hcode-mobile-custom-margin-select' ).find("option[value='" + mobilemargindefaultVal +"']").attr('selected', true);
    }
    $( '.hcode-mobile-custom-margin-select' ).bind('change keyup', function(e) {
      var mobile_margin_current_selected = $(this).val();
      $(this).parent().find( '.hcode-mobile-custom-margin-select-value' ).val( mobile_margin_current_selected );

      if( mobile_margin_current_selected == 'custom-mobile-margin' ) {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_margin]').removeClass('vc_dependent-hidden');
      } else {
        $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_margin]').addClass('vc_dependent-hidden');
      }
    });

    /* For Custom Srcset Settings */

    $( '.hcode-srcset-custom-select' ).bind('change keyup', function(e) {
      var srcset_current_selected = $(this).val();
      $(this).parent().find( '.hcode-srcset-custom-select-value' ).val( srcset_current_selected );
    });

    /* For Animation Settings */

    var animationdefaultVal = $( '.hcode-animation-custom-select' ).parent().find( '.hcode-animation-custom-select-value' ).val();
    if( animationdefaultVal ){ 
      $( '.hcode-animation-custom-select' ).find("option[value='" + animationdefaultVal +"']").attr('selected', true);
    }
    $( '.hcode-animation-custom-select' ).bind('change keyup', function(e) {
      var animation_current_selected = $(this).val();
      $(this).parent().find( '.hcode-animation-custom-select-value' ).val( animation_current_selected );
    });

    

}(window.jQuery);