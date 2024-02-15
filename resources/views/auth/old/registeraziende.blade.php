@extends('layouts.app')
@section('title')Registrazione aziende | vivoqui.it @endsection
@section('description')Registrazione aziende: Terreni, Box, Negozi e uffici in vendita e in affitto, cerca per rata mutuo e richiedi consulenza. @endsection


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
<div class="container register" id="zack">
	<div class="row">

		<div class="col-md-6 border-right d-none d-md-block"  style="padding-right:2%">
					<h3>Puoi esportare automaticamente gli annunci dai gestionali partner</h3><br>
			
			<table cellspacing="0" cellpadding="0" width="100%" border="0">
					<tbody><tr>
						<td><img src="/assets/images/banner.jpg" class="img-fluid"></td>
					</tr>	
						</tbody></table><br><br>
				

			<h3>Scopri i vantaggi dell’attivazione</h3><br>
			    <table cellspacing="0" cellpadding="0" width="100%" border="0">
			        <tbody><tr>
			            <td><i class="icon-prove orange"></i></td>
			            <td>
			                <p><strong>Prova</strong> gratis i nostri servizi per un periodo determinato, se sarai soddisfatto potrai rinnovare la tua fiducia!</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-insert-images orange"></i></td>
			            <td>
			                <p><strong>Inserisci</strong> fino a 20 foto + 5 piantine + 1 video per ogni annuncio!</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-investment orange"></i></td>
			            <td>
			                <p>Usufruisci dei nostri <strong>investimenti</strong> mirati sui portali immobiliari più visitati.</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
					<tr>
						<td><i class="icon-tutors orange"></i></td>
						<td>
							<p>Affidati alla nostra <strong>assistenza</strong>: un tutor sarà a tua completa disposizione!</p>
						</td>
					</tr>					
			    </tbody></table><br><br>
			
			<h3>Puoi inoltre usufruire del servizio di richieste specifiche:</h3><br>
		    <table cellspacing="0" cellpadding="0" width="100%" border="0">
					<tbody>
			        <tr>
			            <td><i class="icon-control orange"></i></td>
			            <td>
			                <p><strong>Controlla</strong> l’andamento delle tue offerte.</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-modify orange"></i></td>
			            <td>
			                <p><strong>Modifica</strong> gli annunci in tempo reale.</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-dedicated-pages orange"></i></td>
			            <td>
			                <p>Accedi alla <strong>tua area dedicata</strong> con tutte le offerte pubblicate della tua agenzia.</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-brand-logo orange"></i></td>
			            <td>
			                <p>Ottieni <strong>più visibilità</strong> per la tua azienda su tutte le offerte pubblicate.</p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-mail-alert orange"></i></td>
			            <td>
			                <p>Raggiungi gli utenti in tempo reale tramite il servizio <strong>Alert Mail</strong></p>
			            </td>
			        </tr>
			        <tr class="spacer"></tr>
			        <tr>
			            <td><i class="icon-partner orange"></i></td>
			            <td>
			                <p>Guarda i tuoi annunci pubblicati anche su altri siti <strong>partner</strong>.</p>
			            </td>
			        </tr>
			</tbody></table>			
		
		</div>
















		<div class="col-md-6"  style="padding-left:2%">
			
			<form id="register-agency-form" class="" onsubmit="return false;">

					<!-- Begin panel "informazioni di accesso"
					<h3>Come pubblicare su <strong>Vivoqui.it</strong></h3><br>
					
					<p><strong>Modalità di pubblicazione</strong></p>
					<div class="form-group">		
						<select class="selectpicker inserimento" name="inserimento" id="inserimento">
							<option value="man" >Inserimento manuale da Vivoqui.it</option>
							<option value="gest">Inserimento automatico via gestionale</option>
						</select>
					</div>
					<div id="text-manual"><p class="register text-justify">Compila il seguente modulo e riceverai un’email per l’attivazione del tuo account. <br>Utilizza le tue credenziali per accedere al pannello di pubblicazione.</p></div>
					

						
					<div class="form-group">		
						<select class="selectpicker partner hide" name="partner" id="partner" >
							<option value="none">Seleziona gestionale</option>
							<option value="1click" >1Click</option>
							<option value="agim" >Agim</option>
							<option value="casa24" >Casain24ore</option>
							<option value="cometa" >Cometa</option>
							<option value="gestim" >Gestim</option>
							<option value="getrix" >Getrix</option>
							<option value="immobilia2k" >Immobilia2000</option>
							<option value="miogest" >Miogest</option>
							<option value="reasoft" >Reasoft</option>
							<option value="soluzionep" >Soluzione Portali</option>
						</select>
					</div>
					
				<div id="text-partner" class="hide"><p class="register text-justify">La piattaforma selezionata non necessita di ulteriore registrazione. Ti invitiamo ad attivare il portale Vivoqui.it direttamente dal tuo gestionale.<br>Se non fosse tra quelli già attivi, invia una richiesta di collegamento ad <a href="mailto:assistenza@vivoqui.it">assistenza@vivoqui.it</a></p></div>
				<div id="text-miogest" class="hide"><p class="register text-justify">Per la piattaforma selezionata <strong>è necessario generare UserID e password</strong> compilando il modulo seguente. Riceverai un'email contenente il tuo UserID personale che, unitamente alla password che avrai indicato in fase di registrazione, dovrai inserire direttamente nel pannello Miogest per attivare il portale.</p></div> -->
				

		<div id="frm">
				<div class="card">Informazioni di accesso</div>
				<p class="pull-right"><small> (*) Campi obbligatori</small></p><br>
				

				<div class="form-group"><!-- email -->
					<label for="email">Email (*)</label>
					<input type="email" class="form-control" id="emailreg" name="emailreg" value="" required>
				</div>
				<div class="form-group"><!-- password -->
					<label for="password">Password (*)</label>
					<input type="password" class="form-control" id="passwordreg" name="passwordreg" value="" pattern=".{8,20}" required title="dagli 8 ai 20 caratteri" required>
				</div>
				<div class="form-group"><!-- confirm password -->
					<label for="password-confirm">Conferma password (*)</label>
					<input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" pattern=".{8,20}" required title="dagli 8 ai 20 caratteri" required>
				</div><!-- /end panel "informazioni di accesso" -->

				<!-- Begin panel "dati società" -->
				<div class="card">Dati società</div>
				<!-- div class="form-group">
					<label>Tipo di impresa: (*)</label>
					<select class="form-control" name="id_user_type" id="id_user_type" required>
						<option selected="" value="2">Agenzia immobiliare</option>
						<option value="3">Impresa di costruzioni</option>
					</select>
				</div -->
				

				
				
				<div class="form-group"><!-- ragione sociale -->
					<label for="ragione-sociale">Ragione sociale (*)</label>
					<input type="text" class="form-control" name="ragionesociale" id="ragionesociale" value="" required>
				</div>
				<div class="form-group"><!-- città -->
					<label>Città (*)</label>
					<input type="text" name="city" class="form-control" id="city" value="" required>
				</div>
				<div class="form-group">
					<input type="hidden" name="idc">
				</div>
				<div class="form-group posrel" id="search-address-group">
					<label>Indirizzo (*)</label>
					<input type="text" name="address" class="form-control" id="address" value="" required>
					<!--<button type="button" class="btn btn-main btn-search-address" id="search-address-btn">Conferma</button>
					<div id="search-address-results"></div>-->
				</div>
				<!--<div class="form-group">
					<div id="map-container" class="map-register">
						<div id="map-selection" class="map-internal" data-height="300" data-tip="" data-latitude="" data-longitude="">
						<div id="map-selection-map" class="hidden embed-responsive" style="width: 100%; height: 300px;"></div><div class="alert hidden" id="map-selection-map-err"></div></div>
					</div>
				</div>-->
				<div class="form-group hidden">
					<input type="hidden" name="idt">
					<input type="hidden" name="la">
					<input type="hidden" name="lo">
				</div>

				<div class="form-group"><!-- Numero identificazione -->
					<label>Partita IVA (*)</label>
					<input type="text" class="form-control" name="piva" id="piva" value="" required>
				</div>
				<div class="form-group"><!-- Telefono -->
					<label>Numero telefono (*)</label>
					<input type="tel" class="form-control" name="telazienda" id="telazienda" value="" required>
				</div>
				<div class="form-group"><!-- nome titolare -->
					<label>Nominativo referente (*) </label>
					<input type="text" class="form-control" name="namereg" id="namereg" value="" required>
				</div>



				<!-- Begin panel "dati titolare">
				<div class="well well-sm">Dati titolare</div>
				<div class="form-group">
					<label>Nome (*)</label>
					<input type="text" class="form-control" name="namereg" id="namereg" value="" required>
				</div>
				<div class="form-group">
					<label>Cognome (*)</label>
					<input type="text" class="form-control" name="cognomereg" id="cognomereg" value="" required>
				</div>
				<div class="form-group">
					<label>Telefono diretto titolare / referente (*)</label>
					<input type="text" class="form-control" name="telefonotitolare" id="telefonotitolare" value="" required>
				</div><!-- /end panel "dati titolare" -->
			

			
			
			
				<div class="form-group">
					<div class="checkbox registration-check">
						<label>
							<input type="checkbox" name="terms" id="terms" required>
							Ho letto l'<a class="info-links" href="/privacy">informativa sulla privacy</a> e
							accetto le <a class="info-links" href="/termini-e-condizioni">condizioni generali</a> (*)
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox registration-check">
						<label>
							<input type="checkbox" name="newsletter" id="newsletter"> Desidero ricevere comunicazioni informative e promozionali</label>
					</div>
				</div>
				<button type="submit" id="register" class="btn btn-main btn-orange btn-reg">Registra agenzia</button>
			</form>
		
			</div>
				<div id="mailControl" class="alert alert-danger hide" style="margin:100px 0 0;">Attenzione! L'utente risulta già registrato.</div>
				<div id="miogestControl"></div>
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
	  	if( $("#register-agency-form")[0].checkValidity() ) {
			//var partner = $("#partner").val();
		    var emailreg = $("#emailreg").val();
		    var passwordreg = $("#passwordreg").val();
			var confirm_password = $("#confirm_password").val();
			var ragionesociale = $("#ragionesociale").val();		    
		    var city = $("#city").val();
		    var address = $("#address").val();
		    var piva = $("#piva").val();
		    var telazienda = $("#telazienda").val();
		    var sito = $("#sito").val();
		    var namereg = $("#namereg").val();
		    var inserimreg=$("inserimento").val();
		    var terms = $("#terms").val();
		    var newsletter = $("#newsletter").val();
		    $('#register').attr("disabled", true);
    	

	
	    $.ajax({
		      type: "POST",
		      url: "/registerag",
  		      data:JSON.stringify({
  		      		"_token": "{{ csrf_token() }}",
              		"emailreg":emailreg,
              		"passwordreg":passwordreg,
              		"confirm_password":confirm_password,
              		//"id_user_type":id_user_type,
              		"ragionesociale":ragionesociale,
              		"city":city,
              		"address":address,
              		"piva":piva,
              		"telazienda":telazienda,
              		"namereg":namereg,
              		//"cognomereg":cognomereg,
              		//"telefonotitolare":telefonotitolare,

           	  }),
  		      dataType: 'json',
  		      contentType: 'application/json',
		      success: function(msg)
		      {
		        if(msg==1) window.location="/success";
		        else{
		        	$('#register').attr("disabled", false);
		        	$('#mailControl').removeClass('hide');
		        } 
		        
		      },
		     error: function()
		      {
		         //
		      }
		    });
		} else console.log("invalid form");
	  });


	});
</script>






<!-- SWITCH SU SELECT 
<script>

	$("#inserimento").change(function() {

	 if($("#inserimento").val()=="gest")
		 {    
				 $(".partner").removeClass('hide');
				 $("#text-manual").addClass('hide').removeClass('show');
				 $("#frm").addClass('hide').removeClass('show');
				 
		 }
		else if($("#inserimento").val()=="man")
			{
					$(".partner").addClass('hide');
					 $("#text-manual").addClass('show');
					 	$("#text-partner").addClass('hide').removeClass('show');
					 	$("#text-miogest").removeClass('show').addClass('hide');
					 	$("#frm").show(); 
					 	$("#partner").val('none');
			}
			else 
			{
				$(".partner").addClass('hide');
				$("#text-manual").addClass('show');
				$("#frm").show(); 
			}
			

	}); 	
	
	$("#partner").change(function(){
	 if($("#partner").val()=="miogest")
	 {
			$("#frm").show(); 
			$("#text-partner").addClass('hide').removeClass('show');
		//	$("#partner option[value=miogest]").toggleClass('show');
			$("#text-miogest").removeClass('hide');
			 $("#text-manual").removeClass('show');
	 }
	 else if($("#partner").val()=="none")	
	 {
			$("#frm").hide(); 
			$("#text-partner").addClass('hide').removeClass('show');
			$("#text-miogest").addClass('hide').removeClass('show');
	 }
	 else 
	 {
			$("#frm").hide(); 
			$("#text-partner").removeClass('hide').addClass('show');
			$("#text-miogest").addClass('hide').removeClass('show');
	 }
	 
	 
	});
	

</script>-->
@endsection