

(function($) {
$('.fadeInUp').click(function(){
  $('#works-grid').show();
})

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
//home-sectionの画像クロスフェードさせる
  var speed = 3000; // フェードイン・フェードアウトの処理時間（1000で1秒）
  var times = 5000; // 画像切り替えの間隔（1000で1秒）
  var className = '.home-section';
  var bgArray = [
    "\assets/images/img04_click.jpg",//homeの画像3枚時間で入れ替わる
    "\assets/images/img05_click.jpg",
    "\assets/images/img06_click.jpg",
    ];


  $.each(bgArray.reverse(), function(i, value) {
    $(className).prepend('<div class="slides" style="background-image:url(' + value + ');"></div>');
  });
  var bgNo = 1;
  var bgLength = bgArray.length;
  setInterval(function(){
    $(className + ' .slides:nth-child(' + bgNo + ')').fadeOut(speed);
    $(className + ' .slides:nth-child(' + ( bgNo === bgLength ? 1 : bgNo + 1) + ')').fadeIn(speed/3);
    if ( bgNo >= bgLength ) {
      bgNo = 1;
    } else {
      bgNo += 1;
    }
  }, times);





})(jQuery);
