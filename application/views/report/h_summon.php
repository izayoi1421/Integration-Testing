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
    <p style="float: left;"><img src="<?php echo $base64 ?>" alt="hehe" width="102" height="115" /></p>

    <p style="float: right;"><img src="<?php echo $base65 ?>" alt="hehe" width="102" height="115" /></p>
    <p style="text-align: center;"><br /><br />Republic of the Philippines<br /> Province of Manila<br /> Quiapo</p>
    <h4 style="text-align: center;"><strong>Barangay 386</strong></h4>
    <p style="text-align: center;">Contact No. 83745885/Email:brgy386@gmail.com</p>
    <h3 style="text-align: center;"><strong>OFFICE OF THE PUNONG TAGAPAMAYAPA</strong></h3>
    <p><strong><?php echo $ureport['name']; ?>,</strong></p>
    <p>Complainants</p>
    <p>- against -</p>
    <p><strong><?php echo $ureport['accused_name']; ?></strong></p>
    <p>Respondent,</p>
    <?php
    foreach ($summondetail as $k) {
      $case_no = $k['case_no'];
      $summon_no = $k['summon_no'];
      $summon_detail = $k['summon_detail'];
    }
    ?>
    <p>Barangay Case No.&nbsp;<strong><?php echo $case_no ?></strong></p>
    <p>For:&nbsp;<strong><?php echo $summon_detail ?></strong></p>
    <h3 class="font-bold" style="text-align: center;"><u><?php echo $summon_no ?> Summon</u></h3>
  </div>
  <div class="m-t-20">
    <h6 class="font-bold m-b-0">TO: <?php echo $ureport['accused_name']; ?></h6>
  </div>
  <?php
  foreach ($summondetail as $i) {
    $datesched = $i['summon_schedule'];
    $strdate = date("l, \\t\h\\e jS \d\a\y \of F, Y ", strtotime($datesched));
    $timesched = $i['summon_time'];
    $strtime = date("h:i A", strtotime($timesched));
  }
  $filedatesched = $ureport['date_reported'];
  $strfileddate = date("jS \d\a\y \of F, Y ", strtotime($filedatesched));

  ?>
  <p>You are hereby summoned to appear before me in person, together with your witnesses, day of <?php echo $strdate; ?>, at <?php echo $strtime ?> then and there to answer to a complaint made before me, copy of which is attached hereto, for mediation/conciliation of your dispute with complainant/s.</p>
  <p>You are hereby warned that if you refuse or willfully fail to appear in obedience to this summons, you may be barred from filing any counterclaim arising from said complaint.</p>
  <p>FAIL NOT or else face punishment as for contempt of court.</p>
  <p>Made this on <?php echo $strfileddate; ?>.</p>
  <div class="row m-t-40">
    <div class="col-md-6 col-sm-6 col-xs-6">&nbsp;</div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="p-2 text-center mt-3">
        <p style="float: left;">Not Valid Without Seal</p>
        <p><h5 class="font-bold m-b-0" style="float: right;">Perfecto P. Pahignalo</h5></p>
      </div>
    </div>
  </div>
  <br>
  <div class="row m-t-40">
  <div class="col-md-6 col-sm-6 col-xs-6">&nbsp;</div>
  <p style="text-align: right;">Punong Barangay</p>
  </div>
</div>

<style>
  .nsize {
    width: 30%;
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

  .uspace {
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