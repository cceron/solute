<?php
/*
echo "<pre>";
//print_r($obj_users);
print_r(json_decode($array_data_permission["permissions"]));
echo "</pre>";
*/
$array_permissions_assigned=json_decode($array_data_permission["permissions"]);
$chk_add    =(in_array("2",$array_permissions_assigned))?'checked=checked':'';
$chk_edit   =(in_array("3",$array_permissions_assigned))?'checked=checked':'';
$chk_delete =(in_array("4",$array_permissions_assigned))?'checked=checked':'';
?>
<form id="frm-edit-permission">
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label" for="user">Usuario</label>
            <input class="form-control" value="<?php echo $array_data_permission["username"]?>" required="" readonly="" disabled=""/>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="modules">Modulos</label>
            <select class="form-control select2" id="module" data-toggle="select2" readonly="" disabled="" multiple="">
                <option ><?php echo $array_data_permission["module"]?></option>
            </select>
        </div>
        <div class="mb-3 col-md-8 ">
            <label class="form-label" for="modules">Permisos</label>  
            <div class="row dv-modules-permissions">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-3">
                            <label ><?php echo $array_data_permission["module"]?></label>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="btn-check" checked="checked" onclick="javascript:return false;">
                            <label class="btn btn-outline-primary" for="chk-permission-see">
                                <i class="align-middle fas fa-solid fa-eye fa-lg"></i>
                            </label>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="btn-check" id="chk-permission-add" name="permission[]" value="2" <?php echo $chk_add?>>
                            <label class="btn btn-outline-primary" for="chk-permission-add">
                                <i class="align-middle fas fa-solid fa-plus fa-lg"></i>

                            </label>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="btn-check" id="chk-permission-edit" name="permission[]" value="3" <?php echo $chk_edit?>>
                            <label class="btn btn-outline-primary" for="chk-permission-edit">
                                <i class="align-middle fas fa-solid fa-pen-to-square fa-lg"></i>
                            </label>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="btn-check" id="chk-permission-del" name="permission[]" value="4" <?php echo $chk_delete?>>
                            <label class="btn btn-outline-primary" for="chk-permission-del">
                                <i class="align-middle fas fa-solid fa-trash fa-lg"></i>
                            </label>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>