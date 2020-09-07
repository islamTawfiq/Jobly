@php
    $min = \App\Model\Nanny::min('age') ? \App\Model\Nanny::min('age') : 20 ;
    $max = \App\Model\Nanny::max('age') ? \App\Model\Nanny::max('age') : 50 ;
@endphp
<script>

    page = 1;
    var able = true;
    $(document).ready(function () {


        $("#slider-range").slider({
            range: true,
            min: {{$min}},
            max: {{$max}},
            values: [ {{ request('min') ? request('min') :  $min }},
             {{  request('max') ? request('max') :  $max }} ],
            slide: function (event, ui) {
                $("#amount").val("Age From " + ui.values[0] + " To " + ui.values[1]);
                $("#min").val(ui.values[0]);
                $("#max").val(ui.values[1]);
            }
        });

        $("#min").val($("#slider-range").slider("values", 0));
        $("#max").val($("#slider-range").slider("values", 1));
        $("#amount").val("Age From " + $("#slider-range").slider("values", 0) +
            " To " + $("#slider-range").slider("values", 1));


        $(window).scroll(function () {
            if ($(window).scrollTop() >= $('#nannyBody').height() - 500) {
                if (typeof page == "undefined" || page == null) {
                    page = 1;
                }
                if (able == false) {
                    return false
                } else if (able == true) {
                    page++;
                    loadMoreData(page);
                }

            }
        });



        function loadMoreData(page) {

            var formData = $('#filter').serialize();
            $('#spinner-main-div').show();
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    data: formData,
                    beforeSend: function () {
                        $('#spinner-main-div').show();
                        able = false;
                    }
                })
                .done(function (data) {
                    $('#spinner-main-div').hide();
                    if (data.html == "") {
                        $('#spinner-main-div').hide();
                        able = false;
                    } else {
                        $('#spinner-main-div').hide();
                        $("#nannyBody").append(data.html);
                        able = true;
                    }

                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    able = false;
                    $('#spinner-main-div').hide();

                });
        }


        var Nanny_Main_Div = $('.filter').offset().top;

        $('#filter').on('submit', function (e){

            e.preventDefault();

            $('html,body').animate({scrollTop: Nanny_Main_Div}, 'fast');

            able = true;
            page = 1;
            var formData = $('#filter').serialize();
            $.ajax(
                {
                    url: '',
                    type: "get",
                    data: formData,
                    beforeSend: function () {
                        $("#nannyBody").empty();
                        $('#spinner-main-div').show();
                    },

                })
                .done(function (data) {
                    if (data.html == "") {
                        $('#spinner-main-div').hide();
                        stop();
                        $("#nannyBody").append('<div class="row"><div class="col-2"></div><div class="noCvs col-8 mt-5 mb-5"><img src="{{url("design/site/images/we-are-sorry.png")}}" alt=""></div></div>');
                    } else {
                        $('#spinner-main-div').hide();
                        $("#nannyBody").empty();
                        $("#nannyBody").append(data.html);
                    }

                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {

                });


        });


    });


</script>
