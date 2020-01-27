if (function($) {
  // vc hcode button settings js
  $( '.hcode-color-picker' ).wpColorPicker();
  vc.atts.hcode_button_settings = {
    parse: function(param) {
      var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
      var $block = $field.parent();
      var options = {};
      var string_pieces;
      var string;
    
      // Color Settings
      options.color_text = $block.find('[data-type="color_text"]').val();
      options.color_text_hover=$block.find('[data-type="color_text_hover"]').val();
      options.color_bg=$block.find('[data-type="color_bg"]').val();
      options.color_bg_hover=$block.find('[data-type="color_bg_hover"]').val();
      options.color_border=$block.find('[data-type="color_border"]').val();
      options.color_border_hover=$block.find('[data-type="color_border_hover"]').val();
      options.color_icon=$block.find('[data-type="color_icon"]').val();
      options.color_icon_hover=$block.find('[data-type="color_icon_hover"]').val();
      
      // Font Settings for Desktop
      options.font_lg = $block.find('[data-type="font-lg"]').val();
      options.line_lg = $block.find('[data-type="line-lg"]').val();
      options.transform_lg = $block.find('[data-type="transform-lg"]').val();
      options.letter_lg = $block.find('[data-type="letter-lg"]').val();

      // Font Settings for Mini Desktop
      options.font_md = $block.find('[data-type="font-md"]').val();
      options.line_md = $block.find('[data-type="line-md"]').val();
      options.transform_md = $block.find('[data-type="transform-md"]').val();
      options.letter_md = $block.find('[data-type="letter-md"]').val();

      // Font Settings for Tablet
      options.font_sm = $block.find('[data-type="font-sm"]').val();
      options.line_sm = $block.find('[data-type="line-sm"]').val();
      options.transform_sm = $block.find('[data-type="transform-sm"]').val();
      options.letter_sm = $block.find('[data-type="letter-sm"]').val();

      // Font Settings for Mobile
      options.font_xs = $block.find('[data-type="font-xs"]').val();
      options.line_xs = $block.find('[data-type="line-xs"]').val();
      options.transform_xs = $block.find('[data-type="transform-xs"]').val();
      options.letter_xs = $block.find('[data-type="letter-xs"]').val();
      
      string_pieces = _.map(options, function(value, key) {
        if (_.isString(value) && 0 < value.length) {
          if( !( key == 'transform_lg' || key == 'transform_md' || key == 'transform_sm' || key == 'transform_xs' || key == 'color_text' || key == 'color_text_hover' || key == 'color_bg' || key == 'color_bg_hover' || key == 'color_border' || key == 'color_border_hover' ) && $.isNumeric( value ) ) {
            value = value + 'px';
          }
        return key + ':' + value;
        }
      });
      string = $.grep(string_pieces, function(value) {
        return _.isString(value) && 0 < value.length;
      }).join('|');
    return string;
    },
    init: function(param, $field) {
      $('h3.font-setting-button', $field).click( function(e) {
        var selected_tab = $(this).attr('data-device');
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parents('.hcode-font-settings-container').find( '.'+selected_tab ).addClass('active');
      });
    },
  }
}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);