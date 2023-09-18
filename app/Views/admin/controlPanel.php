<style>
    .nav .nav-link .nav-text {
        color: #fff;
    }
</style>
<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h1 class="text-light font-weight-bold my-1 mr-5"><i class="flaticon-settings-1 fa-1x text-light"></i> Panel de Control</h1>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <a href="<?php echo base_url('Home/loginAdmin'); ?>" class="btn btn-light-danger font-weight-bolder btn-sm">Salir</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="card-toolbar">
        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
            <!-- Tab Profile -->
            <li class="nav-item mr-3">
                <a id="tab-profile" class="tab nav-link active" href="#" data-tab="profile">
                    <span class="nav-icon">
                        <span class="svg-icon">
                            <i class="flaticon2-user-1"></i>
                        </span>
                    </span>
                    <span class="nav-text font-size-lg">Perfil</span>
                </a>
            </li>
            <!-- Tab Schedule -->
            <li class="nav-item mr-3">
                <a id="tab-schedule" class="tab nav-link" href="#" data-tab="schedule">
                    <span class="nav-icon">
                        <i class="flaticon-calendar-with-a-clock-time-tools"></i>
                    </span>
                    <span class="nav-text font-size-lg">Horarios</span>
                </a>
            </li>
            <!-- Tab Services -->
            <li class="nav-item mr-3">
                <a id="tab-service" class="tab nav-link" href="#" data-tab="services">
                    <span class="nav-icon">
                        <i class="flaticon-notepad"></i>
                    </span>
                    <span class="nav-text font-size-lg">Servicios</span>
                </a>
            </li>
            <!-- Tab Appointments -->
            <li class="nav-item mr-3">
                <a id="tab-appointments" class="tab nav-link" href="#" data-tab="appointments">
                    <span class="nav-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                    <span class="nav-text font-size-lg">Calendario</span>
                </a>
            </li>
            <!-- Tab Customers -->
            <li class="nav-item mr-3">
                <a id="tab-customers" class="tab nav-link" href="#" data-tab="customers">
                    <span class="nav-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="nav-text font-size-lg">Clientes</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="card mt-2 mb-5">
        <div class="card-body">
            <div id="tab-content"></div>
            <div id="main-calendar"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getTabContent('profile');
        $('.tab').on('click', function(e) {
            e.preventDefault();
            $('#tab-content').html('');
            $('#main-calendar').html('');
            $('.tab').each(function() {
                $(this).removeClass('active');
            });
            $(this).addClass('active');
            let tab = $(this).attr('data-tab');
            getTabContent(tab);
        });

        function getTabContent(tab) {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Admin/getTabContent'); ?>",
                data: {
                    'tab': tab
                },
                dataType: "html",
                success: function(response) {
                    $('#tab-content').html(response);
                },
                error: function() {
                    showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                }
            });
        }
    });
</script>