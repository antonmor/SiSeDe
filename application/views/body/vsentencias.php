 <?php
	$this->load->database();
	$sentencias=$this->mlogin->getsent();
?>
<legend style="text-align:center"><img src="<?php echo base_url();  ?>Imagenes/sentencia.png" title="Acuerdos" style="width:80px; height:80px">&nbsp;&nbsp;&nbsp;&nbsp;SENTENCIAS</legend>
<div class="row">
    <div class="col-xs-12" style="margin-left:15%;width:70%; ">
        <table class="table" >
            <thead>
                <tr>
                    <th style="text-align:center;">Expediente</th>
                    <th style="text-align:center;">Documento</th>
                </tr>
            </thead>
            <tbody>
              <?php
                foreach ($sentencias as $sent){
                    $archivo=$sent['NomFile'];
                    $nombre1=substr(urlencode($sent['NomFile']), 0, strlen(urlencode($sent['NomFile']))-4);
                    $expediente=$sent['id_Expediente'];
                    $carpeta=$sent['PathAnexo'];
                    $directorio='http://sisede.tcacolima.com'.$carpeta.'/'/*.$expediente.'/'*/.$archivo;
                    
              ?>
              <tr id="<?php echo $sent['id_Expediente']; ?>" name="table1">
                <td id="<?php echo $sent['id_Expediente']; ?>" style="text-align:center" ><?php echo $expediente; ?></td>
                <td id="<?php echo $sent['NomFile']; ?>" style="text-align:center" ><a href="#"  data-toggle="modal" data-target="#leerdcto"><img src="<?php echo base_url();  ?>Imagenes/pdf1.jpg" title="Acuerdos" style="width:30px; height:30px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre1; ?></a></td>
              <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div> 
<div class="modal fade" id="leerdcto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title" id="myModalLabel" style="text-align:center"><?php echo $nombre1; ?></h5>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <iframe src="<?php echo $directorio ?>" width="100%" height="780" style="border: none;"></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <p style="text-align:center;">
            Dirección Francisco Zarco #1460, Colonia Girasoles<br/>
            Teléfono: 01 312 314 8203 C.P. 28018, Colima, Colima, México<br/>
              contencioso@tcacolima.org.mx </br>
              &copy; Derechos Reservados Agosto 2017.</br> Tribunal de lo Contencioso Administrativo del Estado de Colima
          </p>
        </div>
      </div>
      
    </div>
    
  </div>
 