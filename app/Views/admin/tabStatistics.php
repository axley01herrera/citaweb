<div class="row">
    <div class="col-12 mt-1">
        <div id="main-collection-day"></div>
    </div>
    <div class="col-12 mt-1">
        <div id="main-chart-week"></div>
    </div>
    <div class="col-12 mt-1">
        <div id="main-chart-mont"></div>
    </div>
    <div class="col-12 mt-1">
        <div class="card">
            <div class="card-header">
                <h5>Historial de Ventas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dt-history" class="table" style="width: 100%;">
                        <thead>
                            <th class=""><strong>ID</strong></th>
                            <th class=""><strong>Fecha</th>
                            <th class="text-center "><strong>Servicios</strong></th>
                            <th class="text-center "><strong>Tipo de Pago</strong></th>
                            <th class="text-center "><strong>Monto</strong></th>
                            <th class="text-center "><strong>Acciones</strong></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    collectionDay();
    chartWeek();
    chartMont();

    function collectionDay() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/collectionDay'); ?>",
            data: "",
            dataType: "html",
            success: function(response) {
                $('#main-collection-day').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    }

    function chartWeek() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/chartWeek'); ?>",
            data: "",
            dataType: "html",
            success: function(response) {
                $('#main-chart-week').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    }

    function chartMont(year = '') {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/chartMont'); ?>",
            data: {
                'year': year
            },
            dataType: "html",
            success: function(response) {
                $('#main-chart-mont').html(response);
            },
            error: function(error) {
                showToast('error', 'Ha ocurrido un error');
            }
        });
    }

    var dtHistory = $('#dt-history').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        bAutoWidth: true,
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        language: {
            url: '<?php echo base_url('assets/datatable/es.json'); ?>'
        },
        ajax: {
            url: "<?php echo base_url('Admin/dtProcessingHistory'); ?>",
            type: "POST"
        },
        order: [
            [0, 'desc']
        ],
        columns: [{
                data: 'id',
                visible: false
            },
            {
                data: 'date'
            },
            {
                data: 'articles',
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'payType',
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'amount',
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'action',
                searchable: false,
                orderable: false,
                class: 'text-center'
            },
        ],
    });
</script>