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

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">History Report</h6>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Case</th>
                                <th>Status</th>
                                <th>Reporters Name</th>
                                <th>Case No.</th>
                                <th>Accused Name</th>
                                <th>Report Title</th>
                                <th>Report Type</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1; ?>
                            <?php foreach ($reports as $r) : ?>
                                <tr>
                                    <td><?= $index; ?></td>
                                    <td><?= $r['cases']; ?></td>
                                    <?php if ($r['status'] == "Cancelled") : ?>
                                        <td><a class="badge badge-secondary badge-center" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Pending") : ?>
                                        <td><a class="badge badge-warning badge-center" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "On Process") : ?>
                                        <td><a class="badge badge-primary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Record") : ?>
                                        <td><a class="badge badge-secondary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Scheduled") : ?>
                                        <td><a class="badge badge-info" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Endorsed") : ?>
                                        <td><a class="badge badge-warning" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>                                                                  
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['id']; ?></td>
                                    <td><?= $r['accused_name']; ?></td>
                                    <td><?= $r['title']; ?></td>
                                    <td><?= $r['type']; ?></td>
                                    <td><?= $r['date_reported'] ?></td>
                                    <td width="25%">                                       
                                    </td>
                                </tr>
                                <?php $index++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
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