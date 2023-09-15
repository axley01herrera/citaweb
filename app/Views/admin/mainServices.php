<?php if (sizeof($services) == 0) : ?>
    <div class="alert alert-custom alert-danger mt-10" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">No hay servicios disponibles.</div>
    </div>
<?php endif ?>

<?php foreach ($services as $service) : ?>

    <div class="card card-custom mt-5">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-correct text-primary"></i>
                </span>
                <h3 class="card-label">
                    <?php echo $service->title; ?>
                    <small><?php echo '€' . number_format($service->price, 2, ".", ','); ?></small>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="#" data-id="<?php echo $service->id; ?>" class="edit-service btn btn-sm btn-success font-weight-bold mr-1">
                    Editar
                </a>
                <a href="#" data-id="<?php echo $service->id; ?>" class="del-service btn btn-sm btn-danger font-weight-bold ms-1">
                    Eliminar
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty($service->description)) : echo $service->description;
            else : echo 'Servicio sin descripción!';
            endif ?>
        </div>
    </div>


<?php endforeach ?>

<script>
    $('.edit-service').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');

        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/modalService'); ?>",
            data: {
                'action': 'update',
                'id': id
            },
            dataType: "html",
            success: function(response) {
                $('#main-modal').html(response);
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos!', 'Ha ocurrido un error!');
            }
        });
    });

    $('.del-service').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');

        Swal.fire({
            title: 'Eliminar Servicio?',
            text: "Está Seguro que desea eliminar este servicio!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cerrar',
            customClass: {
                confirmButton: 'delete'
            }
        });

        $('.delete').on('click', function() { // ACTION DELETE
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Admin/deleteService'); ?>",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    switch (response.error) {
                            case 0:
                                getServices();
                                showAlert('success', 'Perfecto!', 'Servicio eliminado!');
                                break;
                            case 1:
                                showAlert('error', 'Lo Sentimos!', 'Ha ocurrido un error!');
                                break;
                            case 2:
                                window.location.href = "<?php echo base_url('Home/index?sessionExpired=true'); ?>";
                                break;
                        }
                },
                error: function(error) {
                    showAlert('error', 'Lo Sentimos!', 'Ha ocurrido un error!');
                }
            });

        });
    });
</script>