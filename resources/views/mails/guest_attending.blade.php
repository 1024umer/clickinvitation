<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attending Guest</title>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td bgcolor="#f7f7f7" align="center" style="padding:0 10px;color:#777777"><br>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px">
                        <tbody>
                            <tr>
                                <td align="center" valign="top">
                                    <table width="100%" cellpadding="0" bgcolor="#FFFFFF" cellspacing="0"
                                        style="text-align:left;width:100%;border-radius:10px;border:1px solid #e8e8e8">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding:0 20px 0 20px;font-family:'Open Sans',Helvetica,Arial;font-size:14px">
                                                    <table width="100%" style="width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size:24px;color:#333333;padding:30px 0 10px 0;text-align:center;font-family:'brandon-grotesque',Helvetica,Arial">
                                                                    RSVP Confirmation</td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="font-size:18px;color:#333333;padding:15px 0 5px 0">
                                                                    <span
                                                                        style="font-family:'brandon-grotesque',Helvetica,Arial">Event:
                                                                        Wedding of {{ $guest->bridefname }} &amp;
                                                                        {{ $guest->groomfname }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size:14px;color:#333333"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                @php
                                                                    // Convert the date string to Carbon instance
                                                                    $date = \Carbon\Carbon::parse($guest->date);
                                                                    // Format the date as required
                                                                    $formattedDate = $date->format('g:i A l, F j, Y');
                                                                @endphp
                                                                <td style="color:#777777;padding-bottom:10px">
                                                                    {{ $formattedDate }} - RSVP Submitted (Attending)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div
                                                                        style="background-color:#eeeeee;padding:15px;padding-top:0;margin-bottom:10px;border-radius:5px">
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="35"
                                                                                        style="padding-top:15px">
                                                                                        <div
                                                                                            style="font-family:arial,sans-serif;background-color:#4ab37e;width:22px;height:22px;color:#ffffff;text-align:center;padding-left:2px;padding-right:2px;padding-bottom:1px;padding-top:1px;font-size:14px;border-radius:4px">
                                                                                            {{ strtoupper(substr($event->name, 0, 1)) }}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td style="padding-top:15px">
                                                                                        <strong>{{ $event->name }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="padding-top:10px">Q: What
                                                                                        would you like to eat?</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td><em>A: {{ $meal->name }}</em>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" cellpadding="0"
                                                                        cellspacing="0"
                                                                        style="text-align:center;margin-bottom:10px;border-top:1px solid #ebe9e9;font-size:14px;color:#777777">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <p
                                                                                        style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                                        Ceremony</p>
                                                                                    <p style="margin:5px">
                                                                                        {{ $guest->ceraddress . ', ' . $guest->cercity . ', ' . $guest->cercountry . ', ' . $guest->cerprovince . ', ' . $guest->cerpc }}<a
                                                                                            href="{{ $guest->cerAddressLink }}"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="{{ $guest->cerAddressLink }}">(View
                                                                                            Map)</a></p>
                                                                                    <p style="margin:5px">
                                                                                        @php
                                                                                            // Convert the date string to Carbon instance
                                                                                            $cerdate = \Carbon\Carbon::parse(
                                                                                                $guest->certime
                                                                                            );
                                                                                            // Format the date as required
                                                                                            $formattedCerDate = $cerdate->format(
                                                                                                'g:i A l, F j, Y'
                                                                                            );
                                                                                        @endphp
                                                                                        <span
                                                                                            style="white-space:nowrap"><span
                                                                                                style="white-space:nowrap">
                                                                                                {{ $formattedCerDate }}</span>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <p
                                                                                        style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                                        Reception</p>
                                                                                    <p style="margin:5px">
                                                                                        {{ $guest->recaddress . ', ' . $guest->reccity . ', ' . $guest->reccountry . ', ' . $guest->recprovince . ', ' . $guest->recpc }}
                                                                                        <a href="{{ $guest->recAddressLink }}"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="{{ $guest->recAddressLink }}">(View
                                                                                            Map)</a>
                                                                                    </p>
                                                                                    @php
                                                                                        // Convert the date string to Carbon instance
                                                                                        $RecTime = \Carbon\Carbon::parse(
                                                                                            $guest->rectime
                                                                                        );
                                                                                        // Format the date as required
                                                                                        $formattedRecTime = $RecTime->format(
                                                                                            'g:i A l, F j, Y'
                                                                                        );
                                                                                    @endphp
                                                                                    <p style="margin:5px"><span
                                                                                            style="white-space:nowrap">
                                                                                            {{ $formattedRecTime }}
                                                                                        </span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td style="text-align:center;padding:15px"><a
                                                                        href="https://www.greenvelope.com/card/16LEKjX/0#rsvp"
                                                                        style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin:0 5px 10px 5px;display:inline-block;text-transform:uppercase"
                                                                        target="_blank"
                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.greenvelope.com/card/16LEKjX/0%23rsvp&amp;source=gmail&amp;ust=1710002959298000&amp;usg=AOvVaw07MGNpvISJ_W-1fGWh53-e">View
                                                                        RSVP </a><br>
                                                                    <br>
                                                                    <a href="https://www.greenvelope.com/card/16LEKjX/0"
                                                                        style="color:#2bb573;text-decoration:none"
                                                                        target="_blank"
                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.greenvelope.com/card/16LEKjX/0&amp;source=gmail&amp;ust=1710002959298000&amp;usg=AOvVaw0ENjP16rQLmcskrYRdphTU">Invitation</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                                        href="https://www.greenvelope.com/card/16LEKjX/0#rsvp"
                                                                        style="color:#2bb573;text-decoration:none"
                                                                        target="_blank"
                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.greenvelope.com/card/16LEKjX/0%23rsvp&amp;source=gmail&amp;ust=1710002959298000&amp;usg=AOvVaw07MGNpvISJ_W-1fGWh53-e">RSVP</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                                        href="https://www.greenvelope.com/card/16LEKjX/0#details"
                                                                        style="color:#2bb573;text-decoration:none"
                                                                        target="_blank"
                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.greenvelope.com/card/16LEKjX/0%23details&amp;source=gmail&amp;ust=1710002959298000&amp;usg=AOvVaw0tZHpi92lbVTm33VSo4l3r">Detail<wbr>s</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                                        href="https://www.greenvelope.com/card/16LEKjX/0#messaging"
                                                                        style="color:#2bb573;text-decoration:none"
                                                                        target="_blank"
                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.greenvelope.com/card/16LEKjX/0%23messaging&amp;source=gmail&amp;ust=1710002959298000&amp;usg=AOvVaw3l1Shg5QyO7HQ1H1tJ4tI-">Messaging</a>
                                                                </td>
                                                            </tr> --}}
                                                        </tbody>
                                                    </table>
                                                    <div style="text-align:center"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="background-color:#777;text-align:center;padding:10px 15px;border-radius:0 0 10px 10px">
                                                    <table width="100%" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="color:#ffffff">Powered
                                                                    by&nbsp;&nbsp;&nbsp;<img
                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                        alt="Click Invitation"
                                                                        style="vertical-align:middle; width: 115px;"
                                                                        class="CToWUd" data-bit="iit"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding-top:10px;padding-bottom:20px;text-align:center;line-height:2;color:#777777;font-size:12px">
                                                    Copyright © 2024 ClickInvitation. All rights reserved.<br>
                                                    +1 (438) 303-9948<br>
                                                    <a href="mailto:Info@Clickinvitation.Com"
                                                        target="_blank">Info@Clickinvitation.Com</a> <a
                                                        href="https://clickinvitation.com/contact" target="_blank">
                                                        clickinvitation.com/contact</a><a></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
