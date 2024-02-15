<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Vivoqui.it</title>
        <style type="text/css">

            body {margin: 0; padding: 0; min-width: 100%!important; background-color:#EFF4F8; font-size:13px; }
            img {height: auto;}
            
            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                body[yahoo] .buttonwrapper {background-color: transparent!important;}
                body[yahoo] .button {padding: 0px!important;}
                body[yahoo] .button a {background-color: #f27279; padding: 10px 20px!important; display: block!important;}
            }

            @media only screen and (min-device-width: 601px) {
                .content {width: 600px !important;}
            }
			
			div, p, a, li, td { line-height:30px; font-size:13px  }

        </style>
    </head>
    <body yahoo style="margin: 0; padding: 0; background-color:#EFF4F8">
    <table cellpadding="2" cellspacing="2" align="center" width="600px" border="0" style="padding:7px; background-color:#EFF4F8;" bgcolor='#EFF4F8'>
        <tr>
            <td colspan="4" bgcolor="#ffffff" style="padding: 30px 30px 30px 30px; font-size: 15px; font-family: Arial, Helvetica, sans-serif; color: #000000;">
                <table style="border-bottom:1px #e5e5e5 solid; width:100%;" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="50%"><p>Gentile <strong>{{$destinatario}}</strong></p></td>
                            <td width="50%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><p><strong>Il nostro utente</strong></p></td>
                            <td><p>{{$nome}} {{$cognome}}</p></td>
                        </tr>
                        <tr>
                            <td><p><strong>Email</strong></p></td>
                            <td><p>{{$email}}</p></td>
                        </tr>
                        <tr>
                            <td><p><strong>Telefono</strong></p></td>
                            <td><p>{{$telefono}}</p></td>
                        </tr>
                    </tbody>
                </table>
                <table style="border-bottom:1px #e5e5e5 solid; width:100%;" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="100%"> <p style="font-weight:bold">Richiede informazioni sul seguente immobile :</p></td>
                            
                        </tr>
                        <tr>
                        <td>
                            <center>
                                <p><a href="{{$url}}" style="display:block; color: #fff;
                                                            background-color: #ed7c20;
                                                            border-color: #f48327;
                                                            padding: 6px 12px;
                                                            line-height: 1.42857143;
                                                            text-align: center;
                                                            white-space: nowrap;
                                                            vertical-align: middle;
                                                            width:120px;
                                                            text-decoration:none;
                                                            -webkit-border-radius: 3px;
                                                            -moz-border-radius: 3px;
                                                            border-radius: 3px;
                                                            ">Clicca qui</a><p>
                                </center>             
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="border-bottom:1px #e5e5e5 solid; width:100%;" cellspacing="0" cellpadding="0">
                    <tdoby>
                        <tr>
                            <td width="100%">  
                                <p>Se il pulsante non dovesse funzionare, copia/incolla il link nel tuo browser</p>
                                <p><a href="{{$url}}">{{$url}}</a></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">
                                <p><strong>Ha lasciato il seguente messaggio</strong></p> 
                            </td>
                        </tr>    
                    </tbody>
                </table>
                <table style="border-bottom:1px #e5e5e5 solid;" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">
                                <p>{{$messaggio}}</p>   
                            </td>
                        </tr>
                    </tbody>
				</table>
            </td>
        </tr>
	</table>

        
        <table style="margin-top:30px; border:1px #e5e5e5 solid; background-color:#EFF4F8; padding:10px;" cellpadding="0" cellspacing="0" width="100%" border="0"  >
                <tr>
                    <td colspan="3" style="text-align:justify; font-family: Arial, Helvetica, sans-serif; color: #000; font-size: 11px;">
                          <h3>NOTE LEGALI</h3>
                          <p style='line-height:17px; font-size:11px; color#333;' >La collocazione dei dati e la simulazione conseguente del portale "VIVOQUI.IT" non costituiscono attivit&agrave; di mediazione, intermediazione ovvero promozione creditizia e finanziaria, n&eacute; sollecito delle stesse n&eacute; tantomeno costituiscono contrattazione on-line con effetti giuridici tra le parti.
Trattasi di simulazione matematica solo indicativa su richiesta dell'utente per ottenere dal sistema informatico, nel rispetto delle norme di legge e della <a style='line-height:17px; font-size:11px; color#333;' href='https://www.vivoqui.it/privacy' style='color: #000000'>privacy</a>, un risultato finanziario determinato dall'inserimento dei dati propri dell'utente cui conseguir&agrave; una elaborazione del sistema con risultato variabile a seconda dei dati inseriti dall'utente.</p>
                    </td>
                </tr>
        </table>
    </td>
</tr>

<!--  FOOTER  -->

</table>
            <table  cellpadding="0" cellspacing="0" width="610" border="0" bgcolor="#EFF4F8" style="background-color: #EFF4F8;">
                <tr>
                    <td bgcolor="#EFF4F8" align="center" colspan="3" style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 12px; background-color: #EFF4F8; padding: 20px 0px 20px 0px;">
                            <p style='line-height:17px; font-size:13px; color#333;'>
                            Questa email ti &egrave; stata inviata da un sistema automatico, non rispondere a questo messaggio.
							<br>

							Vivoqui.it &egrave; di propriet&agrave; di Crea.Re Digital Srl - P. IVA 11382050018 &copy;<?php echo date("Y"); ?>. Tutti i diritti riservati. <br>
                            
                            <a style='line-height:17px; font-size:13px; color#333;' href='https://www.vivoqui.it/termini-e-condizioni' style='color: #000000'>Condizioni di utilizzo</a>
                            <a style='line-height:17px; font-size:13px; color#333;' href='https://www.vivoqui.it/privacy' style='color: #000000'>Privacy</a>
                            
                            </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

