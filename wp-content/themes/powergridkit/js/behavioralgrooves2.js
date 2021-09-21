//behavioralgrooves.js
var grooves = {

    episodeSort: function(){

        var $cloud = $('.page-template-template-episodes .tag-cloud');
        $tag = $cloud.find('a.tag-cloud-link');
        $tag.each(function(e){
            var $thisTag = $(this);
            var $thisText = $thisTag.text();
            $thisTag.addClass( ($thisText.replace(/\s+/g, '-').toLowerCase()) );
            $thisText = $thisText.replace(/\s+/g, '-').toLowerCase();
            $onTags = [];
            $thisTag.on('click touchend', function(e){
                var $this = $(this);
                var $tagClass = '.episode.tag-'+$thisText;
                var $episodes = $('.episode');

                //make the tag look active or inactive
                $this.toggleClass('tag-selected');

                //show em all, in case none are selected
                $episodes.show();

                //active filtered tags
                if ( $this.hasClass('tag-selected') ) {
                    //add to the array of active divs
                    $onTags.push($tagClass);
                    $($onTags).each(function(){
                        var $arrayString = $onTags + "";
                        $episodes.hide();
                        $($arrayString).show();
                    });
                }

                //inactive tags
                if ( ! $this.hasClass('tag-selected') ) {
                    //cut from the array of active divs
                    $onTags.splice($.inArray($tagClass, $onTags),1);
                    $($onTags).each(function(){
                        var $arrayString = $onTags + "";
                        $episodes.hide();
                        $($arrayString).show();
                    });
                }

                //show the label of the selector depending on if you've selected tags or not...
                var $selectorLabel = $('.filter-bar .selector h2');
                var $orderByDates = $selectorLabel.find('#order-date');
                var $orderByTopic = $selectorLabel.find('#order-topic');
                var $active = $onTags.length;

                if ( $active === 0 ) {
                    // $wordall.show();
                    // $wordeps.css('text-transform', 'none');
                    $orderByDates.show();
                    $orderByTopic.hide();
                }

                if ( $active > 0 ) {
                    // $wordall.hide();
                    // $wordeps.css('text-transform', 'capitalize');
                    $orderByDates.hide();
                    $orderByTopic.show();
                }

                e.preventDefault();

            });//this tag.onclick

        });//tag.each

        //show more handling...
        var $showMore = $('a.showmore');
        var $secondaryTags = $('.tag-cloud.secondary-tags');

        //put the expand link at the end of the primary tags
        $showMore.appendTo('.tag-cloud.primary-tags');

        $showMore.on('click touchend', function(e){
            $(this).toggleClass('active');
            $secondaryTags.slideToggle();
            e.preventDefault();
        });

    },//episodeSort

    hamburger: function(){
        var $hambuger = $('.hamburger');
        var $nav = $('.menu-main-menu-container');

        $hambuger.on('click touchend', function(e){
            $nav.toggleClass('active');
            $(this).toggleClass('active');
            e.preventDefault();
        });
    },

    carouselInit: function(){
        $('.episode-carousel').owlCarousel({
            loop:true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 6000,
            animateOut: 'fadeOut',
            nav: true,
            navText : ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            dots: false,
            margin:15,
            items: 3,
            responsive:{
                0:{
                    items:1
                },
                769:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        });

        $('.insight-carousel-blogs').owlCarousel({
            loop:false,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: 6000,
            animateOut: 'fadeOut',
            nav: true,
            navText : ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            //navText : ["<",">"],
            dots: false,
            margin:15,
            items: 3,
            responsive:{
                0:{
                    items:1
                },
                769:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        });

        $('.insight-carousel-bonus').owlCarousel({
            loop:false,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: 6000,
            animateOut: 'fadeOut',
            nav: true,
            navText : ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            dots: false,
            margin:15,
            items: 3,
            responsive:{
                0:{
                    items:1
                },
                769:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        });

        $('.insight-carousel-newsletters').owlCarousel({
            loop:false,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: 6000,
            animateOut: 'fadeOut',
            nav: true,
            navText : ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            //navText : ["<",">"],
            dots: false,
            margin:15,
            items: 3,
            responsive:{
                0:{
                    items:1
                },
                769:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        });


        $('.review-carousel').owlCarousel({
            loop:true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 12000,
            nav: true,
            navText : ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            dots: false,
            margin:30,
            items: 2,
            responsive:{
                0:{
                    items:1
                },
                769:{
                    items:1
                },
                992:{
                    items:2
                }
            }
        });

    },

    signupForms: function(){
        var $widget = $('.newsletter-widget');
        var $formArea = $widget.find('.newsletter-form');
        var $trigger = $widget.find('a.trigger');
        var $triggerText = $('.buttonText-default').html();
        var $triggerTextCancel = $('.buttonText-cancel').html();
        var $closeTrigger = $('.close-trigger a');

        $trigger.on('click touchend', function(e){
            $widget.toggleClass('active');
            $trigger.text($triggerTextCancel);
            e.preventDefault();
        });

        $closeTrigger.on('click touchend', function(e){
            $widget.removeClass('active');
            $trigger.html($triggerText);
            e.preventDefault();
        });

    },

    searchTrigger: function(){
        var $searchTrigger = $('.search-trigger a');
        var $searchBar = $('.search-bar');
        var $nav = $('header .menu');

        $searchTrigger.on('click touchend', function(e){
            $searchBar.toggleClass('active').find('#s').focus();
            $nav.toggleClass('search-active')
            e.preventDefault();
        });
    },

    newsletterSanitize: function(){
        console.log('newsletter sanitize');
        var $contentArea = $('.post-area');
        var $table = $contentArea.find('table');

        $table.each(function(){
            var $td = $(this).find('td');
            var $p = $td.find('p');

            $p.each(function(){
                var $text = $(this).text();
                if ( ($text.length) || ($text = '&nbsp;') ) {
                    $(this).remove();
                }
                else {
                }
            })
        });
    },

    readMore: function(){

      var $readMoreTop = $('a.readmore-top');
      $readMoreTop.each(function(){
        var $this = $(this);
        $this.insertBefore('.more-info .extra-content');
      });

      var $readMore = $('a.readmore');
      $readMore.each(function(){
        var $this = $(this);
        var $thisContent = $this.siblings('.extra-content');
        $this.on('click', function(e){
          $thisContent.slideToggle();
          $this.children('span').toggleClass('active');
          e.preventDefault();
        });
      });

    }


}

$(document).ready(function(){
    grooves.hamburger();
    grooves.readMore();
    // grooves.searchTrigger();
    if ( $('body').hasClass('page-template-template-episodes') ) {
        grooves.episodeSort();
    }
    if ( $('body').hasClass('home') ) {
        grooves.signupForms();
        grooves.carouselInit();
    }
    if ( $('body').hasClass('page-template-template-insights') ) {
        grooves.carouselInit();
    }
    if ( $('body').hasClass('single-newsletter') ) {
        //grooves.newsletterSanitize();
    }
});
