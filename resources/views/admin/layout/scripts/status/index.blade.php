<script>
    $(document).on('click', '.action-status', function (e) {
        var id = $(this).data("id"),
            tr = $(this).closest('tr'),
            td = tr.find('.my_class');

        Swal.fire({
            title: 'Select Status',
            input: 'select',
            text: "",
            inputPlaceholder: 'change status',
            inputOptions: {
                '0': 'Pending',
                '1': 'Approve',
            },
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                var status_val  = result.value;
                $.ajax({
                    url: "{{url()->current()}}/change-status",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "status": status_val,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data, status) {
                        if (data == 0) {
                            td.html('<div class="chip chip-danger"> <div class="chip-body"> <div class="chip-text">Pending</div> </div> </div>');
                        }else if (data == 1) {
                            td.html('<div class="chip chip-success"> <div class="chip-body"> <div class="chip-text">Approved</div> </div> </div>');
                        }
                        Swal.fire({
                            type: "success",
                            title: 'Done!',
                            text: 'Your Data Have Edited Successfully',
                            confirmButtonClass: 'btn btn-success',
                        });
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed');
                    }
                });

            }
            else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });

</script>
