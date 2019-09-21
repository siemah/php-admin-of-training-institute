<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $structure = $mysql->find(
    ['cod_str', 'des_str'],
    'structure'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Typ_local</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_str</th>
                    <th>des_str</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($structure as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_str']; ?></td>
                      <td><?= $rows['des_str']; ?></td>
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