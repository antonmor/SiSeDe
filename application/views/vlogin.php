
<br>
<br>
<div id="container">
 
 <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">SiSeDe v1.0</h1>
        <div class="account-wall">
          <form class="form-signin">
            <label >Usuario: </label>
              <input type="text" class="form-control" id="user" name="user" placeholder="Email" required autofocus>
            <label>Contraseña:</label>
              <input type="password" class="form-control" id="password" name ="password" placeholder="Password" required>
          </form> <!--form-->
        </div><!--account-->
        </div> <!--cols-->
 </div> <!--ROW-->
 <div class="row">
    <div class="col-sm-6 col-md-5 col-md-offset-7">
       <button  type="button" class="btn btn-sm btn-success" onclick="loggin();">Iniciar</button>
    </div><!--col-->
 </div><!--Row-->
<div class="row">
    <div class="col-sm-4 col-md-4 col-md-offset-4">
       <a href="#" class="pull-right need-help">¿Necesitas ayuda? </a><span class="clearfix"></span>
    </div><!--Col-->
</div><!--Row-->
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <a href="<?php echo site_url('Welcome/vregistrar/');?>" class="pull-right new-account">Registrarse</a>
    </div><!--Col-->
</div><!--Row-->

</div> <!--container-->


<script lenguage="javascript" type="text/javascript">


    function loggin(){
    
      var url='<?php echo base_url().'index.php/cOficial';?>';
      
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
                 // alert('Bienvenido ' + result);
                   window.location.href=url;
                //aqui se su pone que mando abrir el controlador...
            }
           }          
        });//ajax
    }//function
</script>

