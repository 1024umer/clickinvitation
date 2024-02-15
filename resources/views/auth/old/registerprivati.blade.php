@extends('layouts.app')
@section('title')Registrazione privati | vivoqui.it @endsection
@section('description')Registrazione privati: Terreni, Box, Negozi e uffici in vendita e in affitto, cerca per rata mutuo e richiedi consulenza. @endsection


@section('content')
<div class="blueheader" style="margin-bottom:0;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Tutti i vantaggi della registrazione a Vivoqui</h1>
			</div>
		</div>
	</div>
</div>
<br><br>
<div class="container register">
		<div class="row">
			<div class="col-md-6 border-right d-none d-md-block" style="padding-right:2%">
				<h3>Un servizio su misura</h3><br>
					<h4>Che tu stia cercando un immobile o debba metterlo in vendita, godi di tutti i vantaggi della registrazione! Trovare casa non è mai stato così facile!</h4>
					<br><br>
				    <table cellspacing="0" cellpadding="0" width="100%" border="0">
				        <tbody><tr>
				            <td><i class="icon-save blue"></i></td>
				            <td>
				                <p><strong>Salva</strong> gli annunci preferiti, potrai consultarli velocemente senza ripetere la ricerca.</p>
				            </td>
				        </tr>
				        <tr class="spacer"></tr>
				        <tr>
				            <td><i class="icon-hide-1 blue"></i></td>
				            <td>
				                <p><strong>Nascondi</strong> gli annunci che non ti interessano per ottenere contenuto più mirato.</p>
				            </td>
				        </tr>
				    </tbody></table>
				<br><br>

				<h3>Chi mostra vende!</h3><br>								
					<table cellspacing="0" cellpadding="0" width="100%" border="0">
						<tbody><tr>
							<td><i class="icon-publish blue"></i></td>
							<td>
								<p><strong>Pubblica</strong> gratis fino a due annunci per due mesi.</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-insert-images blue"></i></td>
							<td>
								<p><strong>Inserisci</strong> fino a 20 foto + 5 Piantine + 1 video per ogni annuncio</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-contacts blue"></i></td>
							<td>
								<p><strong>Ricevi contatti</strong> qualificati da chi cerca proprio il tuo immobile.</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-control blue"></i></td>
							<td>
								<p><strong>Controlla</strong> l’andamento delle Tue offerte.</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-partner blue"></i></td>
							<td>
								<p>Vedi i tuoi annunci pubblicati anche su altri siti <strong>partner</strong>.</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-modify blue"></i></td>
							<td>
								<p><strong>Modifica</strong> gli annunci in tempo reale.</p>
							</td>
						</tr>
						<tr class="spacer"></tr>
						<tr>
							<td><i class="icon-buy-visibility blue"></i></td>
							<td>
								<p>Decidi se dare più <strong>visibilità</strong> ai tuoi annunci acquistando ulteriori servizi.</p>
							</td>
						</tr>					
					</tbody></table>
					<br>
			</div>
			<div class="col-md-6"  style="padding-left:2%">
				<form id="register-formInPage" class="register-form default-form" onsubmit="return false;">
					<div class="form-group">
						<label for="">Nome</label>
						<input name="name" id="name" type="text" class="form-control" value="" pattern=".{0,30}" required title="Massimo 30 caratteri">
					</div>
					<div class="form-group">
						<label for="">Cognome</label>
						<input name="surname" id="surname" type="text" class="form-control" value="" pattern=".{0,30}" required title="Massimo 30 caratteri">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="emailreg" id="emailreg" type="email" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<label for="">Telefono</label>
						<input name="telreg" id="telreg" type="tel" class="form-control" value="" required>
					</div>
					<div class="form-group posrel">
						<label for="">Password</label>
						<input name="passwordreg" id="passwordreg" type="password" class="form-control" pattern=".{8,20}" required title="dagli 8 ai 20 caratteri">
					</div>
					<div class="form-group posrel">
						<label for="">Conferma Password</label>
						<input name="confirm_password" id="confirm_password" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<div class="checkbox registration-check">
	            <label>
	              <input type="checkbox" name="terms" id="terms" required>
	              Ho letto l'<a class="info-links" href="/privacy">informativa sulla privacy</a> e
	              accetto le <a class="info-links" href="/termini-e-condizioni">condizioni generali</a> (*)
	            </label>
						</div>
					</div>
					<div class="checkbox registration-check">
						<label>
							<input name="newsletter" id="newsletter" type="checkbox" value="off"> Desidero ricevere comunicazioni informative e promozionali
						</label>
					</div>
					<button type="submit" id="register" class="btn btn-main btn-orange btn-reg">Registrati</button>
				</form>
					<div id="mailControl" class="alert alert-danger hide" style="margin:100px 0 0;">Attenzione! L'utente risulta già registrato.</div>

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
		    var emailreg = $("#emailreg").val();
		    var telreg = $("#telreg").val();
		    var passwordreg = $("#passwordreg").val();
		    var confirm_password = $("#confirm_password").val();
		    var name = $("#name").val();
		    var surname = $("#surname").val();
		    var terms = $("#terms").val();
		    var newsletter = $("#newsletter").val();
		    //$('#register').attr("disabled", true);

		    $.ajax({
		      type: "POST",
		      url: "/registerpriv",
  		      data:JSON.stringify({
  		      		"_token": "{{ csrf_token() }}",
              		"emailreg":emailreg,
              		"passwordreg":passwordreg,
              		"confirm_password":confirm_password,
              		"telreg":telreg,
              		"name":name,
              		"surname":surname,
              		"newsletter":newsletter,
              		"terms":terms
           	  }),
  		      dataType: 'json',
  		      contentType: 'application/json',
		      success: function(msg)
		      {
		        if(msg==1) window.location="/success";
 		        else $('#mailControl').removeClass('hide');
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