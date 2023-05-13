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
<h3 class="font-bold" style="text-align: center;">OFFICE OF THE PUNONG TAGAPAMAYAPA</h3>
<div class="row">
<div class="col-md-5 col-sm-5 col-xs-5">
<h5 class="font-bold m-b-0 m-t-0"><?php echo $ureport['name']; ?>,</h5>
<p>Complainants</p>
<p class="m-t-10 m-b-10">- against -</p>
<h5 class="font-bold m-b-0 m-t-0"><?php echo $ureport['accused_name']; ?></h5>
<p class="m-t-0">Respondent,</p>
</div>

<div class="col-md-7 col-sm-7 col-xs-7">
<p class="m-t-0 m-b-0">Barangay Case No.&nbsp;<strong><?php echo $reportsettlement['case_no']; ?></strong></p>
<p class="m-t-0 m-b-0">For:&nbsp;<strong><?php echo $ureport['type']; ?></strong></p>
</div>
</div>
<div class="text-center">
<h3 class="font-bold" style="text-align: center;">Complaint SETTLEMENT</h3>
</div>
<?php
foreach ($reportsettlement as $i) {
  $date = $reportsettlement['date_settled'];
  $strdatesettled= date("F, d Y ", strtotime($date));
  $strdatesettled2 = date("jS \d\a\y \of F, Y", strtotime($date));
}
?>
<p class="font-bold">AFTER hearing the testimonies given and careful examination of the evidence presented in this case, award is hereby made as follows:</p>
<p><strong><?php echo $reportsettlement['settlement_agreement']; ?></strong></p>
<p>Both parties complainant and respondent agreed to settle this case and will sign in the presence of Hon. <strong><?php echo $reportsettlement['kag_onduty']; ?></strong>, on <?php echo $strdatesettled ?> and will bind themselves to comply honestly and faithfully with the above terms of settlement.</p>
<p>Entered into this <?php echo $strdatesettled2 ?>.</p>
<div class="text-center">
<h3 class="font-bold" style="text-align: center;">ATTESTATION</h3>
</div>
<h5 class="font-bold">I hereby certify that the foregoing complaint settlement was entered into by the parties freely and voluntary after I had explained to them the nature and consequence of such settlement.</h5>
<div class="row m-t-20">
<div class="col-md-6 col-sm-6 col-xs-6 text-left">
<p>Attested By:</p>
<div class="p-2 text-bottom text-center">
<p> <h4 class="font-bold m-b-0" style="float: left;">PERFECTO P. PAHIGNALO</h4></p>
<p style="float: right;">Not Valid Without Seal</p>
<p>&nbsp;</p>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
<p style="text-align: left;">Punong Barangay</p>
<div class="text-center">
<h4 class="font-bold m-b-0"><?php echo $reportsettlement['kag_onduty'] ?></h4>
<p>Barangay Kagawad On Duty</p>
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