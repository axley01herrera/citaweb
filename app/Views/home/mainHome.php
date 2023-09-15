<?php
if (empty($config->avatar))
    $urlImage = 'background-image: url("' . base_url('assets/media/users/blank.png') . '")';
else
    $urlImage = 'background-image: url(data:image/png;base64,' . base64_encode($config->avatar) . ')';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3 mt-5">
            <div class="card card-custom">
                <div class="card-body pt-15">
                    <!-- User -->
                    <div class="text-center mb-10">
                        <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                            <div class="symbol-label" style="<?php echo $urlImage; ?>"></div>
                            <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                        </div>
                        <h4 class="font-weight-bold my-2"><?php echo $config->name . ' ' . $config->lastName; ?></h4>
                        <div class="text-muted mb-2"><a href="<?php echo base_url('Home/loginAdmin'); ?>"><?php echo $config->companyName; ?></a></div>
                    </div>
                    <div class="mt-5">
                        <span class="font-weight-bold mr-2">Correo Electróico:</span>
                        <br>
                        <a href="mailto:<?php echo $config->email; ?>" class="text-muted text-hover-primary"><?php echo $config->email; ?></a>
                        <br><br>
                        <span class="font-weight-bold mr-2">Teléfono:</span>
                        <br>
                        <a href="tel:<?php echo str_replace(' ', '', $config->phone); ?>" class="text-muted text-hover-primary"><?php echo $config->phone; ?></a>
                    </div>
                    <div class="pb-6 mt-5">¡Bienvenido a mi perfil profesional en línea, te invito a registrarte para que reserves tus citas aquí!</div>
                    <a id="btn-registration" href="<?php echo base_url('Home/signup'); ?>" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Registrate!</a>
                    <div class="text-center mt-10">
                        <h3 class="card-title font-weight-bolder">¿Ya eres cliente?</h3>
                        <p class="text-center font-weight-normal font-size-lg">¡Inicia sesión para gestionar tus citas!</p>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="<?php echo base_url('Home/login'); ?>" class="btn btn-success btn-shadow-hover font-weight-bolder py-3">Iniciar Sesión</a>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <a href="<?php echo base_url('Home/forgotPassword'); ?>" class="text-dark-50 text-hover-primary my-3 mr-2">¿Contraseña Olvidada?</a>
                    </div>
                    <!-- Contact -->
                    <div class="mt-10 text-center">
                        <?php if (!empty($config->facebookLink)) : ?>
                            <a href="<?php echo $config->facebookLink; ?>" target="_blank" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                <i class="socicon-facebook"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($config->instagramLink)) : ?>
                            <a href="<?php echo $config->instagramLink; ?>" target="_blank" class="btn btn-icon btn-circle btn-light-instagram mr-2">
                                <i class="socicon-instagram"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($config->bussinessAddress)) : ?>
                            <a id="open-maps" href="#" class="btn btn-icon btn-circle btn-light-primary">
                                <i class="socicon-periscope"></i>
                            </a>
                        <?php endif ?>
                    </div>
                    <!-- Address -->
                    <div class="mt-5">
                        <span class="text-muted">
                            <?php echo $config->bussinessAddress; ?>
                            <?php
                            if (!empty($config->bussinessAddress2)) : ?>
                                , <?php echo $config->bussinessAddress2; ?>
                            <?php endif ?>
                        </span>
                        <br>
                        <span class="text-muted"><?php echo $config->bussinessCity . ', ' . $config->bussinessState . ', ' . $config->bussinessPostalCode . ', ' . $config->bussinessCountry; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 ">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card card-custom wave wave-animate-slow wave-primary mb-lg-0">
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="font-weight-bolder text-dark">Horarios</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php if ($config->monday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Lunes</h5>
                                        <?php if (!empty($config->monday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->monday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->monday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->monday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->monday_start2) && $config->monday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->monday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->monday_end2) && $config->monday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->monday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->tuesday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Martes</h5>
                                        <?php if (!empty($config->tuesday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->tuesday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->tuesday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->tuesday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->tuesday_start2) && $config->tuesday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->tuesday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->tuesday_end2) && $config->tuesday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->tuesday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->wednesday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Miércoles</h5>
                                        <?php if (!empty($config->wednesday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->wednesday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->wednesday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->wednesday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->wednesday_start2) && $config->wednesday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->wednesday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->wednesday_end2) && $config->wednesday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->wednesday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->thursday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Jueves</h5>
                                        <?php if (!empty($config->thursday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->thursday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->thursday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->thursday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->thursday_start2) && $config->thursday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->thursday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->thursday_end2) && $config->thursday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->thursday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->friday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Viernes</h5>
                                        <?php if (!empty($config->friday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->friday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->friday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->friday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->friday_start2) && $config->friday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->friday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->friday_end2) && $config->friday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->friday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->saturday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Sábado</h5>
                                        <?php if (!empty($config->saturday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->saturday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->saturday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->saturday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->saturday_start2) && $config->saturday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->saturday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->saturday_end2) && $config->saturday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->saturday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($config->sunday == 1) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 mt-5">
                                        <h5>Domingo</h5>
                                        <?php if (!empty($config->sunday_start1)) : ?>
                                            <?php echo date("h:i A", strtotime($config->sunday_start1)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->sunday_end1)) : ?>
                                            - <?php echo date("h:i A", strtotime($config->sunday_end1)); ?>
                                        <?php endif ?>
                                        <br>
                                        <?php if (!empty($config->sunday_start2) && $config->sunday_start2 != '00:00:00') : ?>
                                            <?php echo date("h:i A", strtotime($config->sunday_start2)); ?>
                                        <?php endif ?>
                                        <?php if (!empty($config->sunday_end2) && $config->sunday_end2 != '00:00:00') : ?>
                                            - <?php echo date("h:i A", strtotime($config->sunday_end2)); ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="font-weight-bolder text-dark">Servicios</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($services as $service) : ?>
                                    <div class="col-12 col-md-3 col-lg-4 mt-5">
                                        <h5><?php echo $service->title; ?></h5>
                                        <?php echo '€' . number_format($service->price, 2, ".", ','); ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#open-maps').on('click', function(e) {
        e.preventDefault();
        let address = "<?php echo $config->bussinessAddress; ?><?php if (!empty($config->bussinessAddress2)) : ?> , <?php echo $config->bussinessAddress2;
                                                                                                                endif ?><?php echo $config->bussinessCity . ', ' . $config->bussinessState . ', ' . $config->bussinessPostalCode . ', ' . $config->bussinessCountry; ?>";
        let encodedAddress = encodeURIComponent(address);
        let mapUrl = "https://www.google.com/maps/search/?api=1&query=" + encodedAddress;
        window.open(mapUrl, '_blank');
    });
</script>