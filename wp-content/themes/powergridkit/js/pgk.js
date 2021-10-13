//pgk.js
var pgk = {

    hamburger: function(){
      var $header = $('.main-header');
      var $content = $('main');
      var $footer = $('footer');
      var $hamburger = $('button.hamburger');
      var $nav = $('nav.nav');
      $hamburger.on('touchend', function(){
        $(this).toggleClass('active');
        $content.toggleClass('blurred');
        $footer.toggleClass('blurred');
        $header.toggleClass('active');
        $nav.toggleClass('active');
      });
    }

}

$(document).ready(function(){
    pgk.hamburger();
});
