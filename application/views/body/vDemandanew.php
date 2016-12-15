<style>
     td.details-control {
    cursor: pointer;
}
tr.shown td.details-control {  
}
.styTable{
    width: 95%;
    margin-bottom: 0px; margin-top: -9px;
    margin-left: 30px;
}
</style>
<div class="container">
<!--
	<div class="row">
		<div class="col-md-3 col-md-offset-6">
			<div class="input-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción <span class="caret"></span></button>
		        <ul class="dropdown-menu dropdown-menu-right">
		          <li><a href="#">Buscar</a></li>
		          <li><a href="#">Another action</a></li>
		          <li><a href="#">Something else here</a></li>
		          <li role="separator" class="divider"></li>
		          <li><a href="<?php echo site_url('cOficial/nueva_demanda'); ?>">Nueva demanda</a></li>
		        </ul>
			</div>
		</div>
	</div>
-->
    <div class="row">
    <div class="col-md-12">
        <div class="wrapper">
          <div class="content-main">
          <span style="font-size: 25px;">Demandas</span>
            <a href="<?php echo site_url('cOficial/nueva_demanda'); ?>" class="btn btn-default pull-right" role="button">Nueva demanda</a>
          </div>
        </div>
    </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Expediente</th>
                        <th>Fecha</th>
                        <th>Demandado</th>
                        <th>Demandante</th>
                        <th>Resumen</th>
                        <th>Eviar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($expedientes as  $expediente): ?>
                    <tr data-child-value="<?php echo $expediente['id_expediente']; ?>">
                        <td class="details-control" style="color: blue; text-align: center; font-weight: bold;"><?=$expediente['id_expediente']; ?></td>
                        <td><?= $expediente['Fecha']?></td>
                        <td><?= $expediente['Demandado']?></td>
                        <td><?= $expediente['Demandante']?></td>
                        <td><?= $expediente['Resumen']?></td>
                        <td style="text-align: center;">
                            
                            <a href="#" class="btn btn-link btn-enviar" data-id="<?=$expediente['id_expediente']?>" data-toggle="modal" data-target="#enviarSA">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="enviarSA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Enviar al Secretario de Acuerdos...</h5>
      </div>
      <div class="modal-body">
          <div class="modal-body">
          <form method="POST" action="<?php echo site_url('cOficial/demanda'); ?>">
            <input type="hidden" class="form-control" id="id_exp" name="id_exp">
            <input type="hidden" class="form-control" value="<?=$_SESSION["Persona_id"]?>" name="id_log">
            <div class="form-group">
            <select class="form-control" name="id_sa">
              <?php foreach ($secretario_a as  $sa): ?>
                <option value="<?=$sa['id']?>"><?= $sa['Persona']?></option>   
                <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="width: 150px;">Enviar</button>
            </div>
            </form>
          </div>
          
      </div>
    </div>
  </div>
</div>




<div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-16">
                    <div class="widget-box">
                        <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" style="padding: 0px;">
                                <div class="panel-body" id="editar_resul" style="padding: 0px;">
                                    <object id="object" type="application/pdf" data="" width="100%" height="550">
                                        <param id="param" name="src" value="" />
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                            
        </div>
    </div>
</div>
<?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {?>
    <div class="row">
        <div class="container">
            <div class = 'alert alert-info alert-dismissable'>
                <button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>
                    &times;
                </button>Se envio con exito
            </div>
        </div>
    </div>
<?php }?>
<script>
    function format(id_expediente,data) {
        var $table = $('<table>'), $tr, $td;
        $table.addClass('table');
        $table.addClass('styTable');
        for (var i = 0, anexo; anexo = data.anexos[i]; i++) {
            $tr = $('<tr>').appendTo($table);
            $td = $('<td>').appendTo($tr).text(anexo.Folio);
            $td = $('<td>').appendTo($tr).text(anexo.FechaUp);
            $td = $('<td>').appendTo($tr).text(anexo.id_Tipo);
            $td = $('<td>').appendTo($tr).text(anexo.NomFile);
            $td = $('<td>').appendTo($tr);
            $a =$('<a>').appendTo($td)
                .prop('href','#')
                .text('Ver Documento')
                .attr('data-toggle','modal')
                .attr('data-target','#myModalmostrar')
                .attr('onclick','mostrar("'+anexo.PathAnexo+'","'+anexo.NomFile+'")');

            $span =$('<span>').appendTo($a)
                .prop('aria-hidden','true');
            $span.addClass('glyphicon');
            $span.addClass('gglyphicon-file');
        }
        
        return $table[0].outerHTML;
    }
  $(function () {
      var table = $('#example').DataTable({});

      // Add event listener for opening and closing details
      $('#example').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              var id_expediente = tr.data('child-value');
              $.ajax({
                'type'  : 'GET',
                'url'   : "<?= base_url()?>index.php/cOficial/recuperar",
                'data'  : {
                    'expediente' : id_expediente
                },
                'error':function(jqXHR){
                    console.log(jqXHR.responseText);
                },
                'success': function(data, textStatus, jqXHR) {
                    row.child(format(id_expediente,data)).show();
                    tr.addClass('shown');
                }
            });
          }
      });
  });
</script>
<script>
$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
});</script>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
<script>
    function mostrar(folder, file) {
        var object =$ ('#object');
        object.attr('data','<?=base_url()?>/'+folder+'/'+file);
        var param =$('#param');
        param.attr('name','src');
        param.attr('value','<?=base_url()?>/'+folder+'/'+file);
        }
</script>
<script>
$(document).on("click", ".btn-enviar", function () {
     var id = $(this).data('id');
     $(".modal-body #id_exp").val( id );
    });
</script>
