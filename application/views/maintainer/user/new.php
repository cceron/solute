
<form id="frm-new-user">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label" for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label" for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required="">
        </div>
    </div>
    
    <div class="row">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" autocomplete="off" required="">
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="">
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label" for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required="">
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>