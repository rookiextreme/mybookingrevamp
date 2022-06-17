<?php

require_once '../application/config/Database.php';

$mykj_db = $this->load->database('mykj', TRUE);

$sql = " SELECT  nama, nokp, tel_bimbit, tel_pejabat, kod_waran, kod_gred, l_waran_pej.waran_pej, l_jawatan.jawatan
FROM list_pegawai_etass LEFT JOIN l_waran_pej ON list_pegawai_etass.kod_waran = l_waran_pej.kod_waran_pej LEFT JOIN l_jawatan ON list_pegawai_etass.kod_jawatan = l_jawatan.kod_jawatan WHERE (l_waran_pej.kod_waran_pej LIKE '02%' OR l_waran_pej.kod_waran_pej LIKE '03%' OR l_waran_pej.kod_waran_pej LIKE '04%' OR
 l_waran_pej.kod_waran_pej LIKE '0203%') ";

$rows = $mykj_db->query($sql);

if ($rows->num_rows() > 0)
{
$res = $rows->result();

foreach($res as $r)
{
    
$mybooking_db = $this->load->database('mybooking', TRUE);

$data = array(
'fullname' => $r->nama,
'department_name' => $r->l_waran_pej.waran_pej,
'position_level' => $r->kod_gred,
'position_name' => $r->l_jawatan.jawatan,
'contact_office' => $r->tel_pejabat,
'contact_mobile' => $r->tel_bimbit);

$mybooking_db->insert('user_profiles',$data);

$data2 = array(
'username' => $r->nokp);

$mybooking_db->insert('users',$data2);
}
echo "Migration completed";
}
?>