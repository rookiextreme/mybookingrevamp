<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Tempahan Masuk :: <?php echo $site_name; ?></title>
        <style>
            table {border-collapse: collapse; line-height: 25px;}
            table tr {border: 1px solid #aaa;}
            table td {padding: 5px;}
        </style>
    </head>
    <body>
        <div style="font: 13px/18px Arial, Helvetica, sans-serif; max-width: 800px; margin: 0; padding: 30px 0;">
            
            <p>Assalamualaikum Dan Salam Sejahtera.</p>
            <p><strong><span style='text-decoration: underline;'>PEMBERITAHUAN TEMPAHAN BARU</span></strong></p>
            <p>Satu tempahan kendaraan baru , nombor rujukan : <?php echo $booking_ref_no ?> .
            <!--<p>Pengguna <?php echo $booking_ref_no ?> telah membuat tempahan bilik seperti maklumat dibawah :</p>

            <table width="80%" border="1">
                <tr><td width="150">Tarikh Mula</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Tarikh Tamat</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Nama Bilik</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Nama Mesyuarat</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Urusetia</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Pengerusi</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Bil. Pegawai Agensi</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Bil. Pegawai Luar</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>
                <tr><td>Penerangan</td><td>:</td><td><?php echo $booking_ref_no ?></td></tr>

            </table>-->
                
            <p>Untuk melihat maklumat tempahan tersebut,sila layari website <strong><?php echo $site_name; ?> di <a href="<?php echo site_url('/search'); ?>" style="color: #3366cc;"><?php echo site_url('/search'); ?></a>  dan cari nombor rujukan ini <?php echo $booking_ref_no ?> </strong>
           <!--<a href="<?php echo site_url('/booking_transport/view/'.$fk_book_id); ?>" style="color: #3366cc;"><?php echo site_url('/booking_transport/view/'.$fk_book_id); ?></a>-->
           </p>
           <p>Terima kasih,<br />
           The <?php echo $site_name; ?>@JKR-BTM Team
           <p><small>Emel ini dihantar secara automatik melalui Sistem MyBooking.</small></p>
        </div>
    </body>
</html>
