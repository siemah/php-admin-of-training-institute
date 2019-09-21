<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $benefier = $mysql->query(
    'SELECT frais_unit, des_gra, des_ty_fr 
     FROM `grade`, `benefier`, `typ_frai` 
     WHERE 
      grade.cod_gra = benefier.cod_gar AND
      typ_frai.cod_ty_fr = benefier.cod_ty_frai'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Benifier</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>frais_unit</th>
                    <th>des_gra</th>
                    <th>des_ty_fr</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($benefier as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['frais_unit']; ?></td>
                      <td><?= $rows['des_gra']; ?></td>
                      <td><?= $rows['des_ty_fr']; ?></td>
                    </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
        </div>
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php require './includes/footer.php' ?>   