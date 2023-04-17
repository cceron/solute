<?php
// print_r(base64_encode($array_permissions["permissions"]));
// print_r($array_module_permissions);
?>
<div class="container-fluid p-0 dv-permissions">
    <h1 class="h3 mb-1 text-capitalize"><i class="align-middle me-2 fas fa-fw fa-unlock"></i> <?php echo $array_module_permissions["group"]." > ".$array_module_permissions["module"]?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table data-permissions="<?php echo base64_encode($array_module_permissions["permissions"])?>" class="table table-responsive table-sm table-striped table-hover tbl-permissions">
                        <thead>
                            <tr>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Modulo</th>
                                <th>Permisos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
