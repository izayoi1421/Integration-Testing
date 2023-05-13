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
        <div class="white-box">
            <div class="row m-t-40">
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <h6 class="font-bold m-b-0 m-t-0"><?php echo $ureport['name']; ?>,</h6>
                    <p>Complainants</p>
                    <p class="m-t-10 m-b-10">- against -</p>
                    <h6 class="font-bold m-b-0 m-t-0"><?php echo $ureport['accused_name']; ?></h6>
                    <p class="m-t-0">Respondent,</p>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <p class="m-t-0 m-b-0">Barangay Case No.&nbsp;<strong><?php echo $reportsettlement['case_no']; ?></strong></p>
                    <p class="m-t-0 m-b-0">For:&nbsp;<strong><?php echo $ureport['type']; ?></strong></p>
                </div>
            </div>
            <?php
            date_default_timezone_set('Asia/Manila');
            $date = date('l \\t\h\\e jS \d\a\y \of F, Y', time());

            ?>
            <div class="text-center m-t-30">
                <h3 class="font-bold" style="text-align: center;"><u>CERTIFICATION TO FILE ACTION</u></h3>
            </div>
            <p>This is to certify that::</p>
            <p>1. There was a personal confrontation between the parties before the Punong Barangay but mediation failed;</p>
            <p>2. The Punong Barangay set the meeting of the parties for the constitution of the Pangkat;</p>
            <p>3. The respondent willfully failed or refused to appear without justifiable reason at the conciliation proceedings before the Pangkat; and</p>
            <p>4. Therefore, the corresponding complaint for the dispute may now be filed in court/government office.</p>
            <h5 class="m-t-40 font-bold">Received and filed on <?php echo $date ?>.</h5>
            <div class="row m-t-40">
                <div class="col-md-6 col-sm-6 col-xs-6">&nbsp;</div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="p-2 text-center mt-3">
                        
                        <p>
                        <h5 class="font-bold m-b-0" style="float:left;display:inline-block;">Perfecto P. Pahignalo</h5>
                        </p>
                        <p style="float:right;display:inline-block;">Not Valid Without Seal</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <br>
   
                <p style="text-align:left;">Punong Barangay</p>
    
        </div>
    </div>
</div>
</div>