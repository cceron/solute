<?php
    // echo "<pre>";
    // print_r($obj_uf);
    // echo "</pre>";
    
?>
<form id="frm-edit-uf" >
    <input type="hidden" name="ref" value="<?php echo $obj_uf->id_uf?>">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label" for="email">Fecha</label>
            <input type="date" class="form-control" value="<?php echo $obj_uf->fecha?>" id="date" name="date" placeholder="Fecha" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $obj_uf->precio?>" placeholder="Precio" required="" step=".01">
        </div>
    </div>

    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>