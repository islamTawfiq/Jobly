$(document).ready(function () {

    $('.openMainImage').magnificPopup({
        type: 'image',
      });

    $('.openImage').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true, // set to true to enable gallery
            preload: [0,2], // read about this option in next Lazy-loading section
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
            tPrev: 'Previous (Left arrow key)', // title for left button
            tNext: 'Next (Right arrow key)', // title for right button
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
        }
      });
  // light slider in index
  $('.vertical').lightSlider({
    gallery: true,
    item: 1,
    vertical: false,
    // verticalHeight: 350,
    // vThumbWidth: 140,
    thumbItem: 3,
    thumbMargin: 12,
    slideMargin: 0
  });

  // image preview
  $('.attach').jPreview();

  // sineNav
  $(".openSideMenu").click(function () {
    if ($(window).width() < 768) {
      $("#mySidenav").css("width", "100%");
      $("#mySidenav").css("transform", "translate(0px)");
      $("#main").css("margin-left", "0");
      $(".openSideMenu").css("display", "none");
    } else {
      $("#mySidenav").css("width", "250px");
      $("#mySidenav").css("transform", "translate(0px)");
      $("#main").css("margin-left", "250px");
      $(".openSideMenu").css("transform", "translate(250px)");
    }
  });

  $(".closebtn").click(function () {
    if ($(window).width() < 768) {
      $("#mySidenav").css("width", "0");
      $("#mySidenav").css("transform", "translate(-250px)");
      $("#main").css("margin-left", "0");
      $(".openSideMenu").css("display", "block");
    } else {
      $("#mySidenav").css("transform", "translate(-250px)");
      $("#main").css("margin-left", "0");
      $(".openSideMenu").css("transform", "translate(0px)");
    }

  });

  // UnoDropZone.init();

  // $(".addNewExperience").click(function(){
  //   $(".appendTo").appendTo('appendMe');
  // });
  // $(".addNewExperience").click(function(){
  //   $(".appendMe").append('<div class="col-lg-8 appendTo"><div class="row"><div class="col-lg-6 mb-3"><select class="selectpicker form-control"><option disabled selected>Number Of Years</option><option>' + 1 + '</option><option>' + 2 + '</option></select></div><div class="col-lg-6 mb-3"><select class="selectpicker form-control"><option disabled selected>Country</option><option>'+ 1 + '</option><option>'+ 2 +'</option></select></div></div></div>');
  // });

});







