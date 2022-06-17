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
            <p>Pengguna <?php echo $display_name ?> telah membuat tempahan bilik seperti maklumat dibawah :</p>

            <table width="80%" border="1">
                <tr><td width="150">Tarikh Mula</td><td>:</td><td><?php echo $start_date ?></td></tr>
                <tr><td>Tarikh Tamat</td><td>:</td><td><?php echo $end_date ?></td></tr>
                <tr><td>Nama Bilik</td><td>:</td><td><?php echo $room_name ?></td></tr>
                <tr><td>Nama Mesyuarat</td><td>:</td><td><?php echo $room_purpose ?></td></tr>
                <tr><td>Urusetia</td><td>:</td><td><?php echo $secretariat ?></td></tr>
                <tr><td>Pengerusi</td><td>:</td><td><?php echo $chairman ?></td></tr>
                <tr><td>Bil. Pegawai Agensi</td><td>:</td><td><?php echo $total_from_agensi ?></td></tr>
                <tr><td>Bil. Pegawai Luar</td><td>:</td><td><?php echo $total_from_nonagensi ?></td></tr>
                <tr><td>Penerangan</td><td>:</td><td><?php echo $description ?></td></tr>

            </table>
            <p><strong><span style='text-decoration: underline; color:red;''><small>* Klausa Pengecualian / Notis :-<br>				
Penggunaan bilik diberi keutamaan kepada mesyuarat yang dipengurusikan oleh pegawai atasan mengikut gred (KPKR/TKPKR/PCPK/KB). Sekiranya permohonan ditolak/dibatalkan, pemohon dikehendaki membuat tempahan baru.</small></span></strong></p>				

            <p>Untuk melihat maklumat tempahan tersebut,sila layari website <strong><?php echo $site_name; ?> </strong>
           <!--<a href="<?php echo site_url('/booking_rooms/view/'.$fk_book_id); ?>" style="color: #3366cc;"><?php echo site_url('/booking_rooms/view/'.$fk_book_id); ?></a>-->
           </p>
           <p>Terima kasih,<br />
           The <?php echo $site_name; ?>@JKR-BTM Team
           <p><small>Emel ini dihantar secara automatik melalui Sistem MyBooking.</small></p>
        </div>
    </body>
</html>
