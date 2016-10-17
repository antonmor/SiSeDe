<div class="container">
<div class="row">
  <div class="col-md-3 col-md-offset-6">
    <div class="input-group">
      
        <input type="text" class="form-control" ng-model="buscar" aria-label="...">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">Buscar</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="<?php echo site_url('cOficial/nueva_demanda'); ?>">Nueva demanda</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-md2">
    {{buscar}}
  </div>
  
</div>


</div> <!--container-->