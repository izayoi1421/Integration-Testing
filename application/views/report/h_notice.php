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
<h3 class="font-bold m-b-0">NOTICE OF HEARING</h3>
<h4 class="m-t-0">(MEDIATION PROCEEDINGS)</h4>
</div>
<div class="row m-t-40 m-b-40">
<div class="col-md-12 ml-5">
<p class="m-b-0">TO:</p>
<h5 class="font-bold m-t-0 m-b-0"><?php echo $ureport['name']; ?>,</h5>
<p>Complainants</p>
</div>
</div>
<?php
foreach ($summondetail as $i) {
  $datesched = $i['summon_schedule'];
  $strdate = date("jS \d\a\y, l \of F, Y ", strtotime($datesched));
  $strdate = date("jS \d\a\y \of F, Y", strtotime($datesched));
  $timesched = $i['summon_time'];
  $strtime = date("h:i A", strtotime($timesched));
}

  $filedatesched = $ureport['date_reported'];
  $strfileddate = date("jS \d\a\y \of F, Y", strtotime($filedatesched));
  

?>
<p>You are hereby required to appear before me on the&nbsp;<strong><?php echo $strdate ?> at <?php echo $strtime ?>&nbsp;</strong>for the hearing of your complaint.</p>
<p>This <?php echo $strdate ?>.</p>
<div class="row m-t-40">
<div class="col-md-6 col-sm-6 col-xs-6 text-left">&nbsp;</div>
<div class="col-md-6 col-sm-6 col-xs-6">
<div class="p-2 text-center">
<h6 class="font-bold m-b-0">PERFECTO P. PAHIGNALO</h6>
<p>Punong Barangay</p>
</div>
</div>
</div>
<p class="m-t-40">Notified this <?php echo $strfileddate ?>.</p>
<div class="row m-t-40">
<div class="col-md-8 col-sm-8 col-xs-8">&nbsp;</div>
<div class="col-md-4  col-sm-4 col-xs-4">
<div class="text-left">
<p>Complainants:</p>
<h5 class="font-bold m-t-20"><?php echo $ureport['name']; ?>,</h5>
</div>
</div>
</div>
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