<?php
if (empty($config->avatar))
    $urlImage = 'background-image: url("' . base_url('assets/media/users/blank.png') . '")';
else
    $urlImage = 'background-image: url(data:image/png;base64,' . base64_encode($config->avatar) . ')';
?>
<div class="tab-pane show active" id="profile" role="tabpanel">
    <div class="row">
        <div class="col-12 col-lg-4 mt-5">
            <h6 class="text-dark font-weight-bold mb-10">Información del Perfil:</h6>
            <!-- Avatar -->
            <div class="form-group row">
                <div class="col-12">
                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="<?php echo $urlImage; ?>">
                        <div class="image-input-wrapper"></div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Cambiar Avatar">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input id="avatar" type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="profile_avatar_remove" />
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- CompanyName -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-companyName" class="required-profile form-control form-control-lg form-control-solid" placeholder="Nombre del Negocio" value="<?php echo $config->companyName; ?>" />
                </div>
            </div>
            <!-- Name -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-name" class="required-profile form-control form-control-lg form-control-solid" placeholder="Nombre" value="<?php echo $config->name; ?>" />
                </div>
            </div>
            <!-- Last Name -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-lastName" class="required-profile form-control form-control-lg form-control-solid" placeholder="Apellidos" value="<?php echo $config->lastName; ?>" />
                </div>
            </div>
            <!-- Profession -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-profession" class="required-profile form-control form-control-lg form-control-solid" placeholder="Profesión" value="<?php echo $config->profession; ?>" />
                </div>
            </div>
            <!-- Phone -->
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group input-group-lg input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-phone"></i>
                            </span>
                        </div>
                        <input type="text" id="txt-phone" class="required-profile form-control form-control-lg form-control-solid" placeholder="Teléfono" value="<?php echo $config->phone; ?>" />
                    </div>
                </div>
            </div>
            <!-- email -->
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group input-group-lg input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-at"></i>
                            </span>
                        </div>
                        <input type="text" id="txt-email" class="required-profile form-control form-control-lg form-control-solid" placeholder="Correo Electrónico" value="<?php echo $config->email; ?>" />
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a id="change-password" href="#">¡Cambiar Clave de Acceso!</a>
            </div>
            <div class="col-12 text-center mt-10">
                <button id="btn-save-profile" type="button" class="btn btn-primary font-weight-bold">Actualizar Información del Perfil</button>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-5">
            <h6 class="text-dark font-weight-bold mb-10">Dirección:</h6>
            <!-- Address -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessAddress" class="form-control form-control-lg form-control-solid" placeholder="Calle" value="<?php echo $config->bussinessAddress; ?>" />
                </div>
            </div>
            <!-- Address2 -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessAddress2" class="form-control form-control-lg form-control-solid" placeholder="Número/Puerta/Piso/Otros" value="<?php echo $config->bussinessAddress2; ?>" />
                </div>
            </div>
            <!-- City -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessCity" class="form-control form-control-lg form-control-solid" placeholder="Ciudad" value="<?php echo $config->bussinessCity; ?>" />
                </div>
            </div>
            <!-- State -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessState" class="form-control form-control-lg form-control-solid" placeholder="Provincia" value="<?php echo $config->bussinessState; ?>" />
                </div>
            </div>
            <!-- Postal Code -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessPostalCode" class="form-control form-control-lg form-control-solid" placeholder="Código Postal" value="<?php echo $config->bussinessPostalCode; ?>" />
                </div>
            </div>
            <!-- Country -->
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" id="txt-bussinessCountry" class="form-control form-control-lg form-control-solid" placeholder="País" value="<?php echo $config->bussinessCountry; ?>" />
                </div>
            </div>
            <div class="col-12 text-center">
                <button id="btn-save-bussiness" type="button" class="btn btn-primary font-weight-bold">Actualizar Dirección</button>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-5">
            <h6 class="text-dark font-weight-bold mb-10">Configuración de Enlaces:</h6>
            <!-- Facebook -->
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group input-group-lg input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="socicon-facebook"></i>
                            </span>
                        </div>
                        <input type="text" id="txt-facebook" class="form-control form-control-lg form-control-solid" placeholder="Facebook" value="<?php echo $config->facebookLink; ?>" />
                    </div>
                </div>
            </div>
            <!-- Instagram -->
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group input-group-lg input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="socicon-instagram"></i>
                            </span>
                        </div>
                        <input type="text" id="txt-instagram" class="form-control form-control-lg form-control-solid" placeholder="Instagram" value="<?php echo $config->instagramLink; ?>" />
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <button id="btn-save-link" type="button" class="btn btn-primary font-weight-bold">Actualizar Enlaces</button>
            </div>
        </div>
    </div>
</div>

<script>
    var avatar = new KTImageInput('kt_user_edit_avatar');
    avatar.on('cancel', function(imageInput) {});
    avatar.on('remove', function(imageInput) {});
    avatar.on('change', function(imageInput) {
        let formData = new FormData();
        formData.append('file', $("#avatar")[0].files[0]);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Admin/uploadPhoto'); ?>",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                window.location.reload();
            },
            error: function(error) {
                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
            }
        });
    });

    $(document).ready(function() {
        $('#btn-save-profile').on('click', function() {
            let result = checkRequiredValuesProfile();
            if (result == 0) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('Admin/updateProfile'); ?>",
                    data: {
                        'companyName': $('#txt-companyName').val(),
                        'name': $('#txt-name').val(),
                        'lastName': $('#txt-lastName').val(),
                        'profession': $('#txt-profession').val(),
                        'phone': $('#txt-phone').val(),
                        'email': $('#txt-email').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        switch (response.error) {
                            case 0:
                                showAlert('success', 'Perfecto', 'Información del Perfil Actualizada');
                                break
                            case 1:
                                showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                                break
                            case 2:
                                window.location.href = '<?php echo base_url('Home/loginAdmin?sessionExpired=true'); ?>';
                                break
                        }
                    },
                    error: function(error) {
                        showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                    }
                });
            }
        });

        function checkRequiredValuesProfile() {
            let response = 0;
            let value = '';
            $('.required-profile').each(function() {
                value = $(this).val();
                if (value == '') {
                    $(this).addClass('is-invalid');
                    response = 1
                }
            });
            return response;
        }

        $('.required-profile').on('focus', function() {
            $(this).removeClass('is-invalid');
        });

        $('#change-password').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Admin/changePassword'); ?>",
                data: "",
                dataType: "html",
                success: function(response) {
                    $('#main-modal').html(response);
                },
                error: function(error) {
                    showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                }
            });
        });

        $('#btn-save-bussiness').on('click', function() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Admin/updateAddress'); ?>",
                data: {
                    'bussinessAddress': $('#txt-bussinessAddress').val(),
                    'bussinessAddress2': $('#txt-bussinessAddress2').val(),
                    'bussinessCity': $('#txt-bussinessCity').val(),
                    'bussinessState': $('#txt-bussinessState').val(),
                    'bussinessPostalCode': $('#txt-bussinessPostalCode').val(),
                    'bussinessCountry': $('#txt-bussinessCountry').val()
                },
                dataType: "json",
                success: function(response) {
                    switch (response.error) {
                        case 0:
                            showAlert('success', 'Perfecto', 'Dirección Actualizada');
                            break
                        case 1:
                            showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                            break
                        case 2:
                            window.location.href = '<?php echo base_url('Home/loginAdmin?sessionExpired=true'); ?>';
                            break
                    }
                },
                error: function(error) {
                    showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                }
            });
        });

        $('#btn-save-link').on('click', function() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Admin/updateLink'); ?>",
                data: {
                    'facebook': $('#txt-facebook').val(),
                    'instagram': $('#txt-instagram').val(),
                },
                dataType: "json",
                success: function(response) {
                    switch (response.error) {
                        case 0:
                            showAlert('success', 'Perfecto', 'Configuracion de Enlaces Actualizada');
                            break
                        case 1:
                            showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                            break
                        case 2:
                            window.location.href = '<?php echo base_url('Home/loginAdmin?sessionExpired=true'); ?>';
                            break
                    }
                },
                error: function(error) {
                    showAlert('error', 'Lo Sentimos', 'Ha ocurrido un error');
                }
            });
        });
    });
</script>