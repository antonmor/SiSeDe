<!--href="/SiSeDe/index.php/cenviar/aprobarmag"
    href="/SiSeDe/index.php/cenviar/rechazarmag"-->
<div id="ppal" style="margin-left:10%; width:90%;height:100%; text-align:center;">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-edit"></span> Proyecto </a></li>
  <li><a data-toggle="tab" href="#documentos"><span class="glyphicon glyphicon-ok-sign"></span>Documentos</a></li>
</ul>
</div>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="row" style="margin-left:10%">
  		<div class="col-xs-10" style="text-align:center">
  			<legend><h4>Proyecto de Sentencia</h4></legend>
  		</div>
  	</div>
    <div class="row" style="margin-left:40%;">
    	    <div class="col-xs-2">
              <a data-toggle="modal" href="#aprobar">
              <span class="glyphicon glyphicon-ok"></span> Aprobar </a>
          </div>
          <div class="col-xs-2">
            <a data-toggle="modal" href="#rechazar">
              <span class="glyphicon glyphicon-remove"></span> Rechazar </a>
          </div>
    </div>
    <br>
    	<div class="row" style="margin-left:10%;width:80%;text-align:center">
    		<div class="col-xs-12">
    			<form action="/SiSeDe/index.php/ceditarproy/editarm" method="post">
    				<textarea class="form-control" rows="10" name="descripcion">
    					<?php
    						$fichero1 = $folder.$archivo;
    						$fp = fopen($fichero1,"r+");
    						$contenido = fread ($fp, filesize ($fichero1));
    						fclose($fp);
    						echo $contenido;
    					?>
    				</textarea>
    				<script>CKEDITOR.replace('descripcion');</script>
    				<br>
    				<input type="hidden" value="<?php echo $archivo ?>" name="archivo">
    			</form>
    		</div>
    	</div>
  </div>
  <div id="documentos" class="tab-pane fade">
    <div class="row" style="margin-left:10%">
  		<div class="col-xs-10" style="text-align:center">
  			<legend><h4>Documentos del Expediente: <?php echo $expediente ?></h4></legend>
  		</div>
  	</div>
    <div class="row" style="margin-left:10%;">
  		  <div class="col-xs-6 col-xs-offset-2">
  		     <table class="table table-striped">
  		      <thead>
  		        <tr>
  		        	<th style="text-align:center;">Tipo</th>
  		            <th style="text-align:center;">Documento</th>
  		            <th style="text-align:center;">Acción</th>
  		        </tr>
  		      </thead>
  		     <tbody>
  		       		<?php
                $directorio="Historico/".$expediente;
                $fichero  = scandir($directorio);
  						    for($i=0;$i<sizeof($fichero);$i++){
  						      	if($fichero[$i]!="." && $fichero[$i]!=".."){
  						      		$cadena=substr(urlencode($fichero[$i]), 0, strlen(urlencode($fichero[$i]))-4);
  						?>
  					<tr >
  						<td style="text-align:left"> <img src="<?php echo base_url();  ?>Imagenes/pdf1.jpg" title="Expedientes"
  		     		   style="width:30px; height:30px;"></td>
  		        <td style="padding-left:50px;"><label > <?php echo $cadena ?></label></td>
  		            <td style="text-align:center;">
                    <a href="#archpdf" id="<?php $nombre=$fichero[$i] ?>"data-toggle="modal"> <span tittle="Ver Documento" class="glyphicon glyphicon-eye-open"></span> Ver</a>
  		            </td>
  		           </tr>
  						<?php
  						      	}
  						    }
  						?>

  		     </tbody>
  		     </table>
  		  </div>
  	</div>
  </div>

</div>

  <!-- Modal -->
<div class="modal fade" id="archpdf" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;"><?php echo $cadena ?></h4>
        </div>
        <div class="modal-body">
          <?php
            $fi="http://localhost/SiSeDe/Historico/".$expediente."/".$nombre;
            //echo $fi;
          ?>
          <embed src="<?php echo $fi?>" style="margin-left:10%; width:80%;height:700px;">
        </div>
        <div class="modal-footer">
          <p style="text-align:center;">
          	Dirección Francisco Zarco #1460, Colonia Girasoles<br/>
          	Teléfono: 01 312 314 8203 </br>
          	C.P. 28018, Colima, Colima, México<br/>
              contencioso@tcacolima.org.mx </br>
              &copy; Derechos Reservados Julio 2016. Tribunal de lo Contencioso Administrativo del Estado de Colima</br>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="aprobar" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">APROBAR</h4>
        </div>
        <div class="modal-body">
          <form  action="/SiSeDe/index.php/cenviar/aprobarmag" method="post">
            <div class="content" style="text-align:center">
              <textarea placeholder="Escribir Comentarios" name="comentarios" rows="8" cols="80"></textarea>
              <input type="hidden" value="<?php echo $archivo ?>" name="archivo">
            </div>
            <div class="row" style="text-align:center">
              <button class="btn btn-basic btn-xs" type="submit" name="button" ><span class="glyphicon glyphicon-send"> </span> Enviar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <p style="text-align:center;">
          	Dirección Francisco Zarco #1460, Colonia Girasoles<br/>
          	Teléfono: 01 312 314 8203 </br>
          	C.P. 28018, Colima, Colima, México<br/>
              contencioso@tcacolima.org.mx </br>
              &copy; Derechos Reservados Julio 2016. Tribunal de lo Contencioso Administrativo del Estado de Colima</br>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="rechazar" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">RECHAZAR</h4>
        </div>
        <div class="modal-body">
          <form  action="/SiSeDe/index.php/cenviar/rechazarmag" method="post">
            <div class="content" style="text-align:center">
              <textarea placeholder="Escribir Comentarios" name="comentarios" rows="8" cols="80"></textarea>
              <input type="hidden" value="<?php echo $archivo ?>" name="archivo">
            </div>
            <div class="row" style="text-align:center">
              <button class="btn btn-basic btn-xs" type="submit" name="button" ><span class="glyphicon glyphicon-send"> </span> Enviar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <p style="text-align:center;">
            Dirección Francisco Zarco #1460, Colonia Girasoles<br/>
            Teléfono: 01 312 314 8203 </br>
            C.P. 28018, Colima, Colima, México<br/>
              contencioso@tcacolima.org.mx </br>
              &copy; Derechos Reservados Julio 2016. Tribunal de lo Contencioso Administrativo del Estado de Colima</br>
          </p>
        </div>
      </div>
    </div>
  </div>
