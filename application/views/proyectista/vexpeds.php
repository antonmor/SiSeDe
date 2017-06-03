<?php
  $this->load->database();
  $redactado=$this->mLogin->getarc(1);
  $revision=$this->mLogin->getarc(2);
  $aprobados=$this->mLogin->getarc(3);
  $rechazados=$this->mLogin->getarc(4);
?>
<div class="container">
  <h2><span class="glyphicon glyphicon-book"></span>  Proyectos de Sentencia</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-edit"></span> Redactados</a></li>
    <li><a data-toggle="tab" href="#menu1"><span class="glyphicon glyphicon-ok-sign"></span> Aprobados</a></li>
    <li><a data-toggle="tab" href="#menu2"><span class="glyphicon glyphicon-remove-sign"></span> Rechazados</a></li>
    <li><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-eye-open"></span> En revisión</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="row">
        <div class="col-xs-12" style="margin-left:10%;width:70%; ">
          <table class="table" >
            <thead>
              <tr>
                <th style="text-align:center;">Proyecto</th>
                <th style="text-align:center;">Acción a Realizar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($redactado as  $red){ 
                    $nombre1=substr(urlencode($red['nombre']), 0, strlen(urlencode($red['nombre']))-4);
              ?>
              <tr id="<?php echo $red['nombre']; ?>" name="table1">
                <td id="<?php echo $red['nombre']; ?>" style="text-align:center" ><br><?php echo $nombre1; ?></td>
                <td style="text-align:center;">
                    <form method="POST" action="<?php echo site_url('cenviar/guardarmag'); ?>">
                      <input type="hidden" name="archivored" id="archivored" value="<?php echo $red['nombre']; ?>">
                      <p><button  class="btn btn-primary"> Enviar al magistrado </button></p>  
                    </form>
                    <form action="/SiSeDe/index.php/crevproy2/ceditproy" method="post">
                      <input type="hidden" value="<?php echo $red['folder']; ?>" name="folder">
                      <input type="hidden" value="<?php echo $red['nombre']; ?>" name="archivo">
                      <button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">  
                          Editar Proyecto</button>
                    </form>
                  </td>
              </tr>
              <?php
                }
                ?>
            </tbody>
        </table>
        </div>
      </div>
    
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="row">
        <div class="col-xs-12" style="margin-left:10%;width:70%; ">
          <table class="table" >
            <thead>
              <tr>
                <th style="text-align:center;">Proyecto</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Acción a realizar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($revision as  $rev){  
                  $nombre2=substr(urlencode($rev['nombre']), 0, strlen(urlencode($rev['nombre']))-4);
              ?>
              <tr id="<?php echo $rev['nombre']; ?>" name="table1">
                <td id="<?php echo $rev['nombre']; ?>" style="text-align:center" ><?php echo $nombre2; ?></td>
                <td id="<?php echo $rev['fechaenv']; ?>" style="text-align:center" ><?php echo $rev['fechaenv']; ?></td>
                <td style="text-align: center;">
                    <form action="/SiSeDe/index.php/crevproy/revproyp" method="post">
                      <input type="hidden" value="<?php echo $rev['folder']; ?>" name="folder">
                      <input type="hidden" value="<?php echo $rev['nombre']; ?>" name="archivo">
                      <button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">  
                          Ver Proyecto</button>
                    </form>
                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="row">
        <div class="col-xs-12" style="margin-left:10%;width:70%; ">
          <table class="table" >
            <thead>
              <tr>
                <th style="text-align:center;">Proyecto</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Acción a realizar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($aprobados as  $apro){  
                  $nombre=substr(urlencode($apro['nombre']), 0, strlen(urlencode($apro['nombre']))-4);
              ?>
              <tr id="<?php echo $apro['nombre']; ?>" name="table1">
                <td id="<?php echo $apro['nombre']; ?>" style="text-align:center" ><?php echo $nombre; ?></td>
                <td id="<?php echo $apro['fechaenv']; ?>" style="text-align:center" ><?php echo $apro['fechaenv']; ?></td>
                <td style="text-align: center;">
                    <form action="/SiSeDe/index.php/crevproy/revproyp" method="post">
                      <input type="hidden" value="<?php echo $apro['folder']; ?>" name="folder">
                      <input type="hidden" value="<?php echo $apro['nombre']; ?>" name="archivo">
                      <button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">  
                          Ver Proyecto</button>
                    </form>
                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>  
    <div id="menu1" class="tab-pane fade">
      <div class="row">
        <div class="col-xs-12" style="margin-left:10%;width:70%; ">
          <table class="table" >
            <thead>
              <tr>
                <th style="text-align:center;">Proyecto</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Acción a realizar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($rechazados as  $rec){  
                  $nombre=substr(urlencode($rec['nombre']), 0, strlen(urlencode($rec['nombre']))-4);
              ?>
              <tr id="<?php echo $rec['nombre']; ?>" name="table1">
                <td id="<?php echo $rec['nombre']; ?>" style="text-align:center" ><?php echo $nombre; ?></td>
                <td id="<?php echo $rec['fechaenv']; ?>" style="text-align:center" ><?php echo $rec['fechaenv']; ?></td>
                <td style="text-align: center;">
                    <form action="/SiSeDe/index.php/crevproy/revproyp" method="post">
                      <input type="hidden" value="<?php echo $rec['folder']; ?>" name="folder">
                      <input type="hidden" value="<?php echo $rec['nombre']; ?>" name="archivo">
                      <button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">  
                           Ver Proyecto</button>
                    </form>
                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
        </table>
        </div>
      </div>  
    </div>
  </div>
</div>