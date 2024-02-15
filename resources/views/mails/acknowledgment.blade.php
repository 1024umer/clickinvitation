<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body style="background:#fff;">
    <br><br>


    <table align="center" style="background:white; width: 595px ; border: 2px solid #8f6e0b; border-radius:20px;">
        <tr>
            <td>
                <table width="595" align="center" style="background:white; text-align:center; border-radius:20px;">
                    <tr>
                        <td><img moz-do-not-send="false"
                                src="https://clickinvitation.com/assets/images/logo/logoNewGolden.png"
                                alt="Event masterplan" height="32"></td>

                    </tr>
                </table>
                <table width="595" cellpadding="20"
                    style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; ">
                    <tr>
                        <td>
                            {{-- <img style="width: 594px;" moz-do-not-send="false"
                                src="https://clickinvitation.com/event-images/{{ $event->id_event }}/acknowledgment.jpg"
                                alt="main"> --}}
                            <br>
                            {!! html_entity_decode($event->atitle) !!}
                            {!! html_entity_decode($event->asubtitle) !!}
                            {!! html_entity_decode($event->atext) !!}
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 100px;">
                            @if (!$fake)
                                <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#8f6e0b;"
                                    href="https://clickinvitation.com/add-photos/ack/{{ $cardId }}/{{ $guest->code }}/{{ $lang }}">
                                    ADD YOUR PHOTOS
                                </a>
                            @endif

                            @if ($fake)
                                <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#8f6e0b;"
                                    href="">
                                    ADD YOUR PHOTOS
                                </a>
                            @endif
                            <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#8f6e0b;"
                                href="https://clickinvitation.com/website/{{ $event->id_event }}">
                                GO TO WEBSITE
                            </a>
                            <br><br>
                        </td>
                    </tr>
                </table>


                <table width="100%" cellpadding="20"
                    style="background:#8f6e0b; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  ">
                    <tr>
                        <td>
                            <p> This is an automated message please do not reply.<br>
                                Clickinvitation.com <?php echo date('Y'); ?>. All rights reserved.<br>
                                <a style="color:white;"
                                    href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a style="color:white;" href="https://clickinvitation.com/privacy-policy">Privacy
                                    Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a style="color:white;" href="https://clickinvitation.com/termos-of-use">Terms and
                                    Conditions</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

</body>

</html>
