@extends('layouts.app')
@section('title')Registrazione privati | vivoqui.it @endsection
@section('description')Registrazione privati: Terreni, Box, Negozi e uffici in vendita e in affitto, cerca per rata mutuo e richiedi consulenza. @endsection


@section('content')
<div class="blueheader" style="margin-bottom:0;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Cambia qui la tua password</h1>
			</div>
		</div>
	</div>
</div>
<br><br>
<div class="container register">
		<div class="row">
			<div class="col">
				<form id="register-formInPage" class="register-form default-form" onsubmit="return false;">
					<div class="form-group posrel">
						<label for="">Nuova Password</label>
						<input name="passwordreg" id="passwordreg" type="password" class="form-control" pattern=".{8,20}" required title="dagli 8 ai 20 caratteri">
					</div>
					<div class="form-group posrel">
						<label for="">Conferma nuova Password</label>
						<input name="confirm_password" id="confirm_password" type="password" class="form-control" required>
					</div>
					<button type="submit" id="register" class="btn btn-main btn-orange btn-reg">Cambia password</button>
				</form>
					<div id="mailControl" class="alert alert-danger hide" style="margin:100px 0 0; color:green; font-weight:bold;">Password cambiata con successo</div>

			</div>		
		</div>

		<br>
		<br>
</div>
@endsection

@section('under-javascripts')
<script>
	$(document).ready(function() {

		var password = document.getElementById("passwordreg")
		  , confirm_password = document.getElementById("confirm_password");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Le password non coincidono");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;



	  $("#register").click(function(){
	  	if( $("#register-formInPage")[0].checkValidity() ) {
		    var passwordreg = $("#passwordreg").val();
		    var confirm_password = $("#confirm_password").val();

		    $.ajax({
		      type: "POST",
		      url: "/changep",
  		      data:JSON.stringify({
  		      		"_token": "{{ csrf_token() }}",
              		"passwordreg":passwordreg,
              		"code":"{{$code}}"
           	  }),
  		      dataType: 'json',
  		      contentType: 'application/json',
		      success: function(msg)
		      {
		        if(msg==1) $('#mailControl').removeClass('hide');
		      },
		      error: function(err)
		      {
		        console.log(err);
		      }
		    });
		} else console.log("invalid form");
	  });
	});
</script>
@endsection