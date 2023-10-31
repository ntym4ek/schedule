(function($){
  Drupal.behaviors.shedule_forms = {
    attach: function (context, settings) {

      // подключить jquery.datetimepicker.js на элемент формы
      $("[name^=field_period]").datetimepicker({
        lang: 'ru',
        format: 'd.m.Y - H:i',
        dayOfWeekStart: 1,
        allowBlank: true,
        validateOnBlur: false
      });

    }
  };
})(jQuery);
