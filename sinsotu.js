

(function($) {
  $('.faq-list-item').click(function() {
      var $answer = $(this).find('.answer');
      if($answer.hasClass('opened')) {
        $answer.removeClass('opened');

        $answer.slideUp();


        $(this).find('.plus-icon').text('+');

      } else {
        $answer.addClass('opened');

        $answer.slideDown();


        $(this).find('.plus-icon').text('-');

      }
    });

  

})(jQuery);
