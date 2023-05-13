<?php
$path = 'https://i.postimg.cc/T25WXykk/11268d7df4c09f02370ea223083f991d.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = 'https://i.postimg.cc/MTFZFD2W/110ee624dfbd60ec1d2c7e0fcc8c1ad0.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base65 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<div class="card-body">
    
                <div class="table-responsive">
                <p style="float: left;"><img src="<?php echo $base64?>" alt="hehe" width="102" height="115" /></p>

<p style="float: right;"><img src="<?php echo $base65?>" alt="hehe" width="102" height="115" /></p>
<p style="text-align: center;"><br /><br />Republic of the Philippines<br /> Province of Manila<br /> Quiapo</p>
<h4 style="text-align: center;"><strong>Barangay 386</strong></h4>
<p style="text-align: center;">Contact No. 83745885/Email:brgy386@gmail.com</p>
<h3 style="text-align: center;"><strong>OFFICE OF THE PUNONG TAGAPAMAYAPA</strong></h3>
<p><strong><?php echo $ureport['name']; ?>,</strong></p>
<p>Complainants</p>
<p>- against -</p>
<?php
foreach ($summondetail as $k) {
  $case_no = $k['case_no'];
  $summon_detail = $k['summon_detail'];
  $kag_onduty = $k['kag_onduty'];
}
?>
<p><strong><?php echo $ureport['accused_name']; ?></strong></p>
<p>Respondent,</p>
<p>Barangay Case No.&nbsp;<strong><?php echo $case_no ?></strong></p>
<p>For:&nbsp;<strong><?php echo $summon_detail ?></strong></p>
<h4 style="text-align: center;"><strong><u>COMPLAINT</u></strong></h4>
<?php
foreach ($summondetail as $i) {
  $datesched = $i['summon_schedule'];
  $strdate = date("l F, d Y ", strtotime($datesched));
  $timesched = $i['summon_time'];
  $strtime = date("h:i A", strtotime($timesched));
}
$filedatesched = $ureport['date_reported'];
$strfileddate = date("l F, d Y ", strtotime($filedatesched));
$strdatesettled2 = date("jS \d\a\y \of F, Y", strtotime($filedatesched));

?>
<p>We hereby complain against the above named respondent for violating my rights and interest in the following manner:</p>
<p><strong><?php echo $ureport['description']; ?></strong></p>
<p>THEREFORE, we pray that the following relief/s be granted to me in accordance with law and/or equity.</p>
<p>Made this <?php echo $strdatesettled2 ?>.</p>
<p>&nbsp;</p>
<p><strong><?php echo $ureport['name']; ?></strong></p>
<p>Complainant</p>
<p class="font-bold m-b-0"><strong><?php echo $kag_onduty ?></strong></p>
<p>Barangay Kagawad Onduty</p>
<p><strong>Received and filed on <?php echo $strdatesettled2 ?>.&nbsp;</strong></p>
            </div>
<style>
.nsize{
  width:30%;
}
.center {
  margin: auto;
  width: 50%;
  text-align: center; 
}
.centerwspace {
  margin: auto;
  width: 50%;
  text-align: center; 
  padding-bottom: 1em;
}
tr.centerwspace>td {
  margin: auto;
  width: 50%;
  text-align: center; 
  padding-bottom: 1em;
}

.uspace{
    padding: 5em;
}
tr.smallspacingBot>td {
  padding-bottom: 1em;
}
tr.spacingBot>td {
  padding-bottom: 4em;
}
tr.spacingTop>td {
    padding-top: 3em;
    padding-bottom: 1em;
}
tr.spaceUnder>td {
  padding-bottom: 4em;
  margin: auto;
  width: 50%;
  text-align: center; 
}
tr.spaceUpper>td {
  padding-top: 4em;
  margin: auto;
  width: 50%;
  text-align: center; 
}
</style>            