<?php
    $this->load->database();
    $revision=$this->mLogin->getarc(2);
?>
  <div class="row">
        <div class="col-xs-12" style="margin-left:10%;width:70%; ">
          <table class="table" >
            <thead>
              <tr>
                <th style="text-align:center;">Proyecto</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Actividad</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($revision as  $rev){
                  $nombre2=substr(urlencode($rev['nombre']), 0, strlen(urlencode($rev['nombre']))-4);
              ?>
              <tr id="<?php echo $rev['nombre']; ?>" name="table1">
                <div class="row">
                  <div class="col-xs-12">
                    <td id="<?php echo $rev['nombre']; ?>" style="text-align:center" >
                      <?php echo $nombre2; ?></td>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <td id="<?php echo $rev['fechaenv']; ?>" style="text-align:center" >
                      <?php echo $rev['fechaenv']; ?></td>
                  </div>
                </div>

                <td style="text-align: center;">
                  <div class="row">
                    <div class="col-xs-2 col-xs-offset-3">
                      <form action="/SiSeDe/index.php/crevproy/revproym" method="post">
                        <input type="hidden" value="<?php echo $rev['folder']; ?>" name="folder">
                        <input type="hidden" value="<?php echo $rev['nombre']; ?>" name="archivo">
                        <button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">Revisar</button>
                      </form>
                    </div>
                    <div class="col-xs-2">
                      <form action="/SiSeDe/index.php/cenviar/aprobarmag" method="post">
                        <input type="hidden" value="<?php echo $rev['folder']; ?>" name="folder">
                        <input type="hidden" value="<?php echo $rev['nombre']; ?>" name="archivo">
                        <button class="btn btn-success" title="aprobar " name="Revisar" type="submit">Aprobar</button>
                      </form>
                    </div>
                    <div class="col-xs-2">
                      <form action="/SiSeDe/index.php/cenviar/rechazarmag" method="post">
                        <input type="hidden" value="<?php echo $rev['folder']; ?>" name="folder">
                        <input type="hidden" value="<?php echo $rev['nombre']; ?>" name="archivo">
                        <button class="btn btn-danger" title="rechazar " name="Revisar" type="submit">Rechazar</button>
                      </form>
                    </div>
                  </div>
                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
        </table>
        </div>
      </div>
