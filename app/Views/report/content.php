
<div class="row">
    <div class="col-12 mt-5">
        <div id="dt-report"></div>
    </div>
    <div class="col-12 text-right mt-5 no-print">
        <button id="btn-printReport" class="btn btn-secondary"><i class="mdi mdi-printer"></i> Imprimir</button>
    </div>
</div>


<script>
    dtReport();
    function getCollectionReport() {

        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/getCollectionReport'); ?>",
            data: {
                'dateStart': '<?php echo $dateStart; ?>',
                'dateEnd': '<?php echo $dateEnd; ?>'
            },
            dataType: "html",
            success: function(response) {
                $('#main-collection').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    }

    function dtReport() {

        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/dtReport'); ?>",
            data: {
                'dateStart': '<?php echo $dateStart; ?>',
                'dateEnd': '<?php echo $dateEnd; ?>'
            },
            dataType: "html",
            success: function(response) {
                $('#dt-report').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    }

    $('#btn-printReport').on('click', function() {
        window.print();
    });
</script>