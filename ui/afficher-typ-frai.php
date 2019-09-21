<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $typ_local = $mysql->find(
    ['cod_ty_fr', 'des_ty_fr'],
    'typ_frai'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Typ_frai</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_ty_fr</th>
                    <th>des_ty_fr</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($typ_local as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_ty_fr']; ?></td>
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