@php
    $newData = explode('&&', $data);
    
@endphp
<!--         0        1       2       3       4       5     6        7       8       9-->
<!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
<!--             10      11       12         13        14         15           16           17           18       19-->
<!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->

<body>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_841tqzlz.json" background="transparent"
        speed="1" loop autoplay></lottie-player>
    <h2
        style="position: absolute;top: 80%;left: 50%;transform: translateX(-50%);font-size: 2em;color: purple;font-family: sans-serif;">
        Please wait generating PDF</h2>
</body>
<script src="/assets/js/jspdf.umd.min.js"></script>
<script>
    const {
        jsPDF
    } = window.jspdf;

    const doc = new jsPDF();

    doc.addFont("/assets/fonts/animationFont/MONTEZ-REGULAR.TTF", "MONTEZ-REGULAR", "normal");
    doc.addFont("/assets/fonts/animationFont/NIGHT-DEMO.TTF", "NIGHT-DEMO", "normal");
    doc.addFont("/assets/fonts/animationFont/DANCINGSCRIPT-BOLD.TTF", "DANCINGSCRIPT-BOLD", "normal");
    doc.addFont("/assets/fonts/animationFont/DANCINGSCRIPT-REGULAR.TTF", "DANCINGSCRIPT-REGULAR", "normal");
    doc.addFont("/assets/fonts/animationFont/FREESCPT.TTF", "FREESCPT", "normal");
    doc.addFont("/assets/fonts/animationFont/AGENCYB.TTF", "AGENCYB", "normal");


    doc.addImage("/assets/images/cardAnimation/{{ $newData[11] }}", "JPEG", 0, 0, 220, 300);

    doc.setFont("{{ $newData[12] }}");
    doc.setTextColor("{{ $newData[13] }}");
    doc.setFontSize(26)
    doc.text("{{ $newData[0] }}", 105, 83, null, null, "center");
    doc.text("{{ $newData[1] }}", 105, 95, null, null, "center");
    doc.text("{{ $newData[2] }}", 105, 107, null, null, "center");
    doc.text("{{ $newData[3] }}", 105, 119, null, null, "center");


    doc.setFont("{{ $newData[14] }}");
    doc.setTextColor("{{ $newData[15] }}");
    doc.setFontSize(50)
    @if (strlen($newData[4]) > 0 && strlen($newData[5]) > 0)
        doc.text("{{ $newData[4] }} & {{ $newData[5] }}", 110, 150, null, null, "center");
    @elseif (strlen($newData[4]) > 0)
        doc.text("{{ $newData[4] }}", 110, 150, null, null, "center");
    @elseif (strlen($newData[5]) > 0)
        doc.text("{{ $newData[5] }}", 110, 150, null, null, "center");
    @endif


    doc.setFont("{{ $newData[16] }}");
    doc.setTextColor("{{ $newData[17] }}");
    doc.setFontSize(26)
    doc.text("{{ $newData[6] }}", 105, 180, null, null, "center");

    doc.setFont("{{ $newData[18] }}");
    doc.setTextColor("{{ $newData[19] }}");
    doc.setFontSize(21)
    doc.text("{{ $newData[7] }}", 105, 200, null, null, "center");
    doc.text("{{ $newData[8] }}", 105, 210, null, null, "center");
    doc.text("{{ $newData[9] }}", 105, 220, null, null, "center");

    const d = new Date();
    if (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase())) {
        window.open(doc.output('bloburl', {
            filename: "{{ $newData[20] }}_" + d.getMilliseconds()
        }))
    } else {
        doc.save("{{ $newData[20] }}_" + d.getMilliseconds());
    }

    window.close();
</script>
