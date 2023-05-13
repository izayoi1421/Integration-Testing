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
        <h3 style="text-align: center;"><strong>Summary of Reports</strong></h3>
        <div class="card shadow mb-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Frequency of Resolved and Unresolved Cases</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <?php foreach ($analyticsrecord as $j) : ?>
                                        <td>
                                            <p style="text-align: center;"><?= $j['record']; ?></p>

                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1 ?>

                                <tr>
                                    <?php foreach ($analyticsrecord as $j) : ?>
                                        <td>
                                            <p style="text-align: center;"><?= $j['c_action']; ?></p>

                                        </td>

                                        <?php $index++; ?>
                                    <?php endforeach; ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Frequency of Reports</h5>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <?php foreach ($analytics as $r) : ?>
                                        <td>
                                            <strong>
                                                <p style="text-align: center;"><?= $r['type']; ?></p>
                                            </strong>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($analytics as $r) : ?>
                                        <td>
                                            <p style="text-align: center;"><?= $r['tcount']; ?></p>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">History Report</h5>
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
                                    <th>Date Filed</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($reports as $r) : ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><?= $r['cases']; ?></td>
                                        <?php if ($r['status'] == "Cancelled") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Pending") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "On Process") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Record") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Scheduled") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Endorsed") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Settled") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Dismiss") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Resolved") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Unresolved") : ?>
                                            <td>
                                                <p style="text-align: center;"><?= $r['status']; ?></p>
                                            </td>
                                        <?php endif; ?>
                                        <td><?= $r['name']; ?></td>
                                        <td><?= $r['id']; ?></td>
                                        <td><?= $r['accused_name']; ?></td>
                                        <td><?= $r['title']; ?></td>
                                        <td><?= $r['type']; ?></td>
                                        <td><?= $r['date_reported'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
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

        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em solid #ccc;
            border-bottom: 0;
            border-collapse: collapse;
        }

        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }
    </style>