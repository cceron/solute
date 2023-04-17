<?php
    // echo "<pre>";
    // print_r($obj_user);
    // echo "</pre>";
    $vig="";
    $sus="";
    $del="";

    if($obj_user->status==1){
        $vig="checked='checked'";
    }elseif($obj_user->status==2){
        $sus="checked='checked'";
    }else{
        $del="checked='checked'";   
    }
?>
<form id="frm-edit-user" >
    <input type="hidden" name="ref" value="<?php echo $obj_user->id_user?>">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label" for="email">Correo</label>
            <input type="email" class="form-control" value="<?php echo $obj_user->email?>" id="email" name="email" placeholder="Correo" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label" for="password">Contraseña</label>
            <input type="password" class="form-control" autocomplete="new-password" id="password" name="password" placeholder="Contraseña" >
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="username">Usuario</label>
            <input type="text" class="form-control" value="<?php echo $obj_user->username?>" id="username" name="username" autocomplete="off" required="">
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $obj_user->first_name?>" id="nombre" name="nombre" placeholder="Nombre" required="">
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label" for="apellido">Apellido</label>
            <input type="text" class="form-control" value="<?php echo $obj_user->last_name?>" id="apellido" name="apellido" placeholder="Apellido" required="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="apellido">Estado</label>
			<!-- <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inline-radios-example" value="option1">
                <span class="form-check-label">1</span>
            </label> -->
			
		</div>
        <div class="col-md-3">
            
			<label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="1" <?php echo $vig?> >
                <span class="form-check-label">Vigente</span>
            </label>
			
		</div>
        <div class="col-md-3">
			<label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="2" <?php echo $sus?>>
                <span class="form-check-label">Suspendido</span>
            </label>
		</div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>