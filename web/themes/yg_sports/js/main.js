(function ($, Drupal) {
  Drupal.behaviors.myModuleBehavior = {
    attach: function (context, settings) {

  function doAnimations( elems ) {
    var animEndEv = 'webkitAnimationEnd animationend';
    elems.each(function () {
      var $this = $(this),
        $animationType = $this.data('animation');
      $this.addClass($animationType).one(animEndEv, function () {
        $this.removeClass($animationType);
      });
    });
  }
  var $myCarousel = $('#carousel-sr'),
    $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
  $myCarousel.carousel();
  doAnimations($firstAnimatingElems);
  $myCarousel.carousel('pause');
  $myCarousel.on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
    doAnimations($animatingElems);
  });
    $('#carousel-sr').carousel({
        interval:3000,
        pause: "false"
    });

    function main() {
(function () {
   'use strict';
    $(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('#back-to-top').fadeIn();
          } else {
              $('#back-to-top').fadeOut();
          }
    });
    $("#block-sports-main-menu ul li:first-child a").addClass("page-scroll");
    $("#block-sports-main-menu ul li:first-child a").attr("href", "#header");
    $("#block-sports-main-menu ul").addClass("nav navbar-nav navbar-right");
    $('body').scrollspy({
        target: '.navbar-default',
        offset: 80
    });
    $('a.page-scroll, #block-sports-main-menu ul li:first-child a').unbind('click').bind('click', function (e) {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
              $('html,body').animate({
                  scrollTop: target.offset().top - 50
              }, 900);
              return false;
          }
      }
    });
    $('body').scrollspy({
        target: '.navbar-default',
        offset: 120
    });
    $("#block-sports-main-menu ul.navbar-nav li a").click(function (event) {
      var toggle = $(".navbar-toggle").is(":visible");
      if (toggle) {
        $(".navbar-collapse").collapse('hide');
      }
    });
    $('.gallery-item a').nivoLightbox({
            effect: 'slideDown',
            keyboardNav: true,
    });
    $("#menu .nav li:first-child a").attr("href", "#header");
    $('.young-skins-panel').unbind('click').bind('click', function (e) {
      $(this).toggleClass("active");
    });
    $("#menu li:first-child a").addClass("page-scroll");
   $("#menu li:first-child a").attr("href", "#header");
    var href = document.location.href;
   var hostn = document.location.hostname;
   var PathSegment = href.substr(href.lastIndexOf('/') + 1);
   if (!$("body").hasClass("path-frontpage")) {
       $("#menu li a").each(function() {
           var $this = $(this);
           var _href = $this.attr("href");
           $this.attr("href", "/" + _href);
       });
   }
var shiftWindow = function() { scrollBy(0, -50) };
if (location.hash) shiftWindow();
window.addEventListener("hashchange", shiftWindow);

}());
}
main();

    }
  };
})(jQuery, Drupal);


