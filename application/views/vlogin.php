<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">SiSeDe v1.0</h1>
        <div class="account-wall">
            <!--<form action="<?= base_url().'index.php/login'?>" method='post'> agregado (15/08/2017)-->
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                 <input type="text" class="form-control" id="user" name="user" placeholder="Email" required="required" autofocus/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="password" name ="password" placeholder="Password" required="required" />
              </div>
             <!--<button class="btn btn-success" style="width: 100%;" >Iniciar Sesión</button> agregado(15/08/2017)-->
              <button type="button" class="btn btn-success" style="width: 100%;" onclick="loggin();">Iniciar Sesión</button>            </form><br>
            <span><a href="<?php echo site_url('Welcome/recuperar_datos/');?>" class="pull-left need-help">¿Necesitas ayuda? </a></span>
            <span><a href="<?php echo site_url('Welcome/vregistrar/');?>" class="pull-right new-account">Registrarse</a></span>
        </div><!--account-->
    </div>
  </div>
</div>

<script lenguage="javascript" type="text/javascript">


    function loggin(){

      var url2='<?php echo base_url().'index.php/Coficial';?>';
        $.ajax({url:"<?php echo base_url().'index.php/Welcome/validar'; ?>",
            type:'POST',
            data:{
                    user:document.getElementById('user').value,
                    password:document.getElementById('password').value
                 },
            cache:false,     
            success:function(result){            
            if(result == '0'){          
               alert('Usuario o Contraseña no existe');                
            }else{
                 //alert('Bienvenido ' + result);
                  window.location.href=url2; 
                //aqui se su pone que mando abrir el controlador...
            }
           }          
        });//ajax
    }//function
</script>

