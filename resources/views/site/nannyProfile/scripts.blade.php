<script>

    $(".myLike").on('click', function() {

        var like_status = $(this).attr('data-like');
        var nanny_id = $(this).attr('data-nanny-id');
        var url = "{{ route('like') }}";
        var token = "{{ Session::token() }}";

        $.ajax({
            type: 'POST',
            url: url,
            data: {like_status: like_status, nanny_id: nanny_id, _token: token},

            success: function(data){

               if(data.isLike == 1) {
                   $('.myLike').addClass('favourit');
               }

               if(data.isLike == 0) {
                   $('.myLike').removeClass('favourit');
               }
            }

        });

    });

</script>
