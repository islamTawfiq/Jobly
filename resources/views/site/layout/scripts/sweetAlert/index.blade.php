<script>
    // Book / Request Interview
    function bookInterview() {
        Swal.fire({
            customClass: ".swal-back",
            html:
                '<h2 class="myCustomTitle">Request an interview</h2><div class="row"> <div class="col-6"><p class="text-left mb-0">Date</p><input id="requestDate" class="requestDate form-control" type="date"></div>' +
                '<div class="col-6"><p class="text-left mb-0">Time</p><input id="requestTime" class="requestTime form-control" type="time"></div></div><hr class="mt-4">',
            confirmButtonColor: '#EF7F65',
            confirmButtonText: 'Next',
            showCloseButton: true
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    showCloseButton: true,
                    html:
                        '<h2 class="myCustomTitleThen">You Confirm the interview we will give you the feedback shortly</h2>',
                })
            }
        })
    }
</script>
