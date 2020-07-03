@php
    $min = \App\Model\Nanny::min('age') > 20 ?  \App\Model\Nanny::min('age') :  20;
    $max = \App\Model\Nanny::max('age') < 50 ?  \App\Model\Nanny::max('age') :  50;
@endphp
<script>

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

    });


</script>
