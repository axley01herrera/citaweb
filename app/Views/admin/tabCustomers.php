<div id="main-customers"></div>
<script>
    getCustomerDT();
    function getCustomerDT() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/getCustomerDT'); ?>",
            data: "",
            dataType: "html",
            success: function(response) {
                $('#main-customers').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    }
</script>