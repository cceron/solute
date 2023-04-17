
<form id="frm-new-uf">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label" for="email">Fecha</label>
            <input type="date" value="<?php echo date("Y-m-d")?>" class="form-control" id="date" name="date" placeholder="Fecha" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Precio" required="" step=".01">
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>