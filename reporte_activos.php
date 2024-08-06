<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte Activos SF</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/datatable/datatables.min.css">
  <link rel="stylesheet" href="css/datatable/table.css">
</head>
<body>

  <div class="container">
    <div class="row"></div>
      <div class="col-lg-12">
        <h1>Reporte Activos SF</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <table id="tabla_activos" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Organismo</th>
              <th>Nombre</th>
              <th>Tipo Doc</th>
              <th>DNI</th>
              <th>País</th>
              <th>F_NAC</th>
              <th>Sexo</th>
              <th>Edad</th>
              <th>E_Civil</th>
              <th>Cambio Civil</th>
              <th>COD POST</th>
              <th>Domicilio</th>
              <th>Localidad</th>
              <th>Categoría</th>
              <th>F_AFILIACION</th>
              <th>Antiguedad</th>
              <th>Cargo</th>
              <!-- <th>Escala Categoria</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              require_once 'reporte_model.php';
              $model = new ReporteModel();
              $activos = $model->getActivosSF();
              foreach ($activos as $act) {
            ?>
            <tr>
              <td><?php echo $model->setNombreOrg($act['organismos_id']); ?></td>
              <td><?php echo $act['a_nomb']; ?></td>
              <td><?php echo $model->tipoDoc($act['a_tipo']); ?></td>
              <td><?php echo $act['a_docu']; ?></td>
              <td><?php echo $act['a_pais']; ?></td>
              <td><?php echo $model->formatFecha($act['a_naci']); ?></td>
              <td><?php echo $model->setSexo($act['a_sexo']); ?></td>
              <td><?php echo $model->getEdad($act['a_naci']); ?></td>
              <td><?php echo $model->estadoCivil($act['a_civil']); ?></td>
              <td><?php echo $model->formatFecha($act['a_cambio_civil']); ?></td>
              <td><?php echo $act['a_postal']; ?></td>
              <td><?php echo $act['a_domi']; ?></td>
              <td><?php echo $act['a_loca']; ?></td>
              <td><?php echo $act['a_cate']; ?></td>
              <td><?php echo $model->formatFecha($act['a_afil']); ?></td>
              <td><?php echo $act['a_anios_anti']; ?></td>
              <td><?php echo $act['a_cargo']; ?></td>
              <!-- <td><?//php echo $act['a_esca_cate']; ?></td> -->
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js\jquery.js"></script>
  <script src="js\datatable\table.js"></script>
  <script src="js\bootstrap.min.js"></script>
  <script src="js\datatable\datatables.min.js"></script>
  <script>
    $(document).ready(function () {
      createDataTable('tabla_activos','ACTIVOS SANTA FE',[0,1,2]);
      alert('Listo');
    });
  </script>
  
</body>
</html>