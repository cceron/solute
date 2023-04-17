
<div class="container-fluid p-0 dv-uf">
    <h1 class="h3 mb-1 text-capitalize"><i class="align-middle me-2 fas fa-fw fa-chart-simple"></i> <?php echo $array_module_permissions["group"]." > ".$array_module_permissions["module"]?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table data-permissions="<?php echo base64_encode($array_module_permissions["permissions"])?>" class="table table-responsive table-sm table-striped table-hover tbl-uf">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
