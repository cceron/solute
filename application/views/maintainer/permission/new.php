<?php
// echo "<pre>";
// print_r($obj_users);
// echo "</pre>";
?>
<form id="frm-new-permission">
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label" for="user">Usuario</label>
            <input class="form-control" list="users-list" id="user" name="user" autocomplete="off" required=""/>
            <datalist id="users-list"><?php
                foreach($array_users as $k => $obj_user){?>
                    <option value="<?php echo $obj_user->email?>"><?php echo $obj_user->username?> | <?php echo $obj_user->first_name." ".$obj_user->last_name?></option><?php
                }
                ?>
                
            </datalist>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="modules">Modulos</label>
            <select class="form-control select2" name="module" id="module" data-toggle="select2"multiple><?php
                foreach($array_modules as $k => $obj_module){?>
                    <option value="<?php echo $obj_module->id_module?>"><?php echo $obj_module->module?></option><?php
                    
                }
                ?>
                
            </select>
        </div>
        <div class="mb-3 col-md-8 ">
            <label class="form-label" for="modules">Permisos</label>  
            <div class="row dv-modules-permissions"></div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>