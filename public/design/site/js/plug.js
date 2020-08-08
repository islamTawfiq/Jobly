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


  $('#fileup').change(function(){
    //here we take the file extension and set an array of valid extensions
        var res=$('#fileup').val();
        var arr = res.split("\\");
        var filename=arr.slice(-1)[0];
        filextension=filename.split(".");
        filext="."+filextension.slice(-1)[0];
        valid=[".docx",".pdf",".doc"];
    //if file is not valid we show the error icon, the red alert, and hide the submit button
        if (valid.indexOf(filext.toLowerCase())==-1){
            $( ".imgupload" ).hide("slow");
            $( ".imgupload.ok" ).hide("slow");
            $( ".imgupload.stop" ).show("slow");

            $('#namefile').css({"color":"red","font-weight":700});
            $('#namefile').html("File "+filename+" is not  pic!");
        }else{
            //if file is valid we show the green alert and show the valid submit
            $( ".imgupload" ).hide("slow");
            $( ".imgupload.stop" ).hide("slow");
            $( ".imgupload.ok" ).show("slow");

            $('#namefile').css({"color":"green","font-weight":700});
            $('#namefile').html(filename);
        }
    });

  $('#fileup2').change(function(){
    //here we take the file extension and set an array of valid extensions
        var res=$('#fileup2').val();
        var arr = res.split("\\");
        var filename=arr.slice(-1)[0];
        filextension=filename.split(".");
        filext="."+filextension.slice(-1)[0];
        valid=[".docx",".pdf",".doc"];
    //if file is not valid we show the error icon, the red alert, and hide the submit button
        if (valid.indexOf(filext.toLowerCase())==-1){
            $( ".imgupload2" ).hide("slow");
            $( ".imgupload2.ok2" ).hide("slow");
            $( ".imgupload2.stop2" ).show("slow");

            $('#namefile2').css({"color":"red","font-weight":700});
            $('#namefile2').html("File "+filename+" is not  pic!");
        }else{
            //if file is valid we show the green alert and show the valid submit
            $( ".imgupload2" ).hide("slow");
            $( ".imgupload2.stop2" ).hide("slow");
            $( ".imgupload2.ok2" ).show("slow");

            $('#namefile2').css({"color":"green","font-weight":700});
            $('#namefile2').html(filename);
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







