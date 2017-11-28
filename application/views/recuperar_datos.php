<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">SiSeDe v1.0 <small>Recuperar datos de usuario</small></h1>
        <div class="account-wall">
            <form action="<?= site_url('Clogin/recuperar/');?>" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico</label>
                 <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required autofocus>
              </div>
              <button type="submit" class="btn btn-success" style="width: 100%;">Enviar</button>
            </form>
          <?php $msj = $this->session->flashdata('msj');
        if ($msj) {?>
          <?php echo $msj; ?>
       
      <?php } ?>
        </div><!--account-->
        

    </div>
  </div>
</div>
<script>
  $(".alert").fadeTo(4000, 500).slideUp(500, function(){
    $(".alert").alert('close');
  });
</script>
