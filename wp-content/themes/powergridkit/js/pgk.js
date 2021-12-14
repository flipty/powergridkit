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
  },

  productGallery: function(){
    var $gallery = $('ul.image-choices');
    var $imageTarget = $('.main-image');
    $gallery.children('li').each(function(){
      var $thisLink = $(this).find('a');
      $thisLink.on('click', function(e){
        var $src = $(this).data('src');
        $imageTarget.empty().prepend($('<img>',{src:$src}));
        e.preventDefault();
      });
    });
  }

}

$(document).ready(function(){
  pgk.hamburger();
  pgk.productGallery();
});
