


<br/><br/>
<?php  //$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
       //$today1 = date("Y-m-d", $today);
       $today = date('l jS \of F Y');
       ?>
       
<table class="table table-bordered table-striped table-hover">
    <tr bgcolor="#FF0000">
        <td><center><h2><b>
            <?php 
            echo $today;
            ?>
        </b></h2></center></td>
    </tr>
</table>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <?php if ($this->tank_auth->is_admin()): ?>
                                        <!--                <th width="5%"></th>-->
            <?php endif; ?> 
            <th width="25%">Maklumat Bilik</th>
            <th width="42%">Maklumat Mesyuarat</th>
            <th width="20%">Tarikh</th>
            <th class="hide">Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if (!empty($bookings)): ?>
            <?php $current_location = ''; ?>
            <?php foreach ($bookings as $booking): ?>
            
        <!-- tukar nama dari unproper case ke strlower -> ucwords add by ake and en bukhary 10.4.2014 4.43pm 
        
            <?php $tolowernamesecretariat = strtolower($booking->secretariat);
                  $upname1 =   ucwords($tolowernamesecretariat);
                  
                  $tolowernamechairman = strtolower($booking->chairman);
                  $upname2 = ucwords($tolowernamechairman);
            
            ?>-->
           
                <tr data-provides="rowlink">

                    <?php if ($this->tank_auth->is_admin()): ?>
<!--                        <td class="nolink"><input type="checkbox" name="delete[<?php echo $booking->booking_id; ?>]" value="<?php echo $booking->booking_id; ?>"></td>-->
                    <?php endif; ?> 

                    <td>
                        <strong>
<?php echo "{$booking->name}"; ?></strong></td>
                    <td>
                        <strong>Tujuan:
                        <?php echo $booking->room_purpose; ?>
                        <br/>Urusetia: <?php echo  ucwords(strtolower($booking->secretariat)); ?><br>
                        <?php 
			   	$getname = $this->User_model->getEmelNotelSec($booking->secretariat);
				if ($getname):?>
                        <strong><?php echo "{$getname->cawangan_name}" ; ?></strong><br>
                        <strong><?php echo $getname->contact_mobile; ?></strong>
                        
                        <?php else: ?>
                        <strong style="font-size:x-small;">Sistem tidak dapat menjumpai maklumat terperinci urusetia ini.</strong>
                        <?php endif; ?>
                        <?php
                        //if (!empty($booking->chairman)):
                        //    echo "<br/><strong>Pengerusi:</strong> " ?> <?php //echo ucwords(strtolower($booking->chairman));
                        //endif;
                        ?>
                        </strong>
                    </td>
                    <td>
                        <strong>
                        <?php echo date('d/m/Y', strtotime($booking->start_date)); ?>
                        <?php if ($booking->full_day == '2'): ?>
                            <br>(Sepanjang hari)
                        <?php else: ?>
                            </br>
                            <?php echo date('H:ia', strtotime($booking->start_date)); ?> - <?php echo date('H:ia', strtotime($booking->end_date)); ?></strong>
                        <?php endif; ?>
                    </td>
                    <td class="hide">
                        <?php echo anchor("booking_rooms/view/{$booking->booking_id}", '<i class="icon-eye-open"></i> Lihat', 'class="btn btn-mini"'); ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>

            <tr>
                <td colspan="8">Tiada bilik digunakan untuk hari ini.</td>
            </tr>

        <?php endif; ?>

    </tbody>
</table>

<!--<?php echo $pagination; ?>

<?php if (!empty($bookings)): ?>
    <div class="custom-legend"><?php echo $this->pagination->create_pagination_text(); ?></div>
<?php endif; ?>-->
<br/><br/>

