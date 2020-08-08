<script>
    let countryList = document.getElementById("countryList") //select list with id countryList
    let phoneCode = document.getElementById('phonecode') //span with id phonecode

    countryList.addEventListener('change', function(){
     phoneCode.value = this.options[this.selectedIndex].getAttribute("phonecode");
    });
</script>
