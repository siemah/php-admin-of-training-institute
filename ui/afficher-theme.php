<?php require './includes/header.php' ?>
<?php

// recuperer la list des domaines
$theme = $mysql->query(
  'SELECT cod_them, des_them, cat_them, typ_them, des_gra, des_dom 
    FROM `theme`, Grade, Domaine
    WHERE 
      theme.cod_dom = domaine.cod_dom AND
      theme.cod_gra = grade.cod_gra'
);
?>
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Liste Theme</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>cod_them</th>
                <th>des_them</th>
                <th>cat_them</th>
                <th>typ_them</th>
                <th>des_gra</th>
                <th>des_dom</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($theme as $rows) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $rows['cod_them']; ?></td>
                  <td><?= $rows['des_them']; ?></td>
                  <td><?= $rows['cat_them']; ?></td>
                  <td><?= $rows['typ_them']; ?></td>
                  <td><?= $rows['des_gra']; ?></td>
                  <td><?= $rows['des_dom']; ?></td>
                </tr>
              <?php $i++;
              endforeach; ?>
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