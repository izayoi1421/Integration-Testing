<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">


        <div class="card-header py-3">
            <div class="col-md-9">
                <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary" style="text-align:left; display:inline-block;">Summon History</h6>
            <?php $count = 1 ?>
            <?php foreach ($reportsummon as $i) : ?>
                <?php if ($ureport['id'] == $i['case_no']) : ?>
                    <?php $count++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($count <= 3) { ?>
                <h6 class="m-0 font-weight-bold text-primary" style="float:right;display:inline-block;"><a href="" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus"></i> Add New</a></h6>

            <?php } ?>

        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th># Summon</th>
                                <th>Summon Detail</th>
                                <th>Case No.</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1 ?>
                            <?php foreach ($reportsummon as $r) : ?>
                                <?php if ($ureport['id'] == $r['case_no'] ) : ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><?= $r['summon_detail']; ?></td>
                                        <td><?= $r['case_no']; ?></td>
                                        <td><?= $r['summon_schedule']; ?></td>
                                        <td width="17%">
                                            <?php if ($r['summon_no'] == "1st") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                            <?php if ($r['summon_no'] == "2nd") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab2()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                            <?php if ($r['summon_no'] == "3rd") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab3()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $index++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal add new role-->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add Summon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form -->
            <form action="<?= site_url('report/addsummon'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Case No.</label>
                                <input type="text" class="form-control" id="case_no" name="case_no" value="<?= $ureport['id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Summon No.</label>
                                <?php $testval = 0; ?>
                                <?php foreach ($limitsummon as $r) : ?>
                                    <?php if ($ureport['id'] == $r['case_no']) : ?>
                                        <?php if ($r['ccn'] == 1) : ?>
                                            <input type="text" class="form-control" id="summon_no" name="summon_no" value="2nd" readonly>
                                            <?php $testval++; ?>
                                        <?php endif; ?>
                                        <?php if ($r['ccn'] >= 2) : ?>
                                            <input type="text" class="form-control" id="summon_no" name="summon_no" value="3rd" readonly>
                                            <?php $testval++; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($testval == 0) :  ?>
                                    <input type="text" class="form-control" id="summon_no" name="summon_no" value="1st" readonly>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Complainant</label>
                        <input type="text" class="form-control" id="user_id" name="case_no" value="<?= $ureport['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Summon Details</label>
                        <input type="text" class="form-control" id="summon_detail" name="summon_detail" required>
                    </div>
                    <?php if ($ureport['status'] != "Cancelled" && $ureport['status'] != "Done" && $ureport['status'] != "Record") : ?>
                        <?php if ($ureport['status'] == "On Process") : ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="status" name="status" value="Scheduled" readonly>
                            </div>
                        <?php endif; ?>
                        <?php if ($ureport['status'] == "Schedule") : ?>
                            <div class="form-group">
                                <label for="report">Status of Report</label>
                                <select class="form-control" name="status">
                                    <option class="text-primary text-center" value="Scheduled" <?php if ($ureport['status'] == "Scheduled") echo 'selected = "selected"'; ?>>Scheduled</option>
                                    <option class="text-primary text-center" value="Settled" <?php if ($ureport['status'] == "Settled") echo 'selected = "selected"'; ?>>Settled</option>
                                    <option class="text-primary text-center" value="Dismissed" <?php if ($ureport['status'] == "Dismissed") echo 'selected = "selected"'; ?>>Dismissed</option>
                                </select>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="name">Kagawad on Duty</label>
                        <input type="text" class="form-control" id="kag_onduty" name="kag_onduty" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Set Summon Date</label>
                                <input class="form-control" type="date" data-date="" id="summon_schedule" name="summon_schedule" data-date-format="DD MMMM YYYY" onchange="check(this.value)" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Set Summon Time</label>
                                <input class="form-control" type="time" name="summon_time" id="summon_time" required id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function openTab() {
        window.open('<?= site_url('report/first_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }

    function openTab2() {
        window.open('<?= site_url('report/second_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }

    function openTab3() {
        window.open('<?= site_url('report/third_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }
</script>
<script>
    function check(val) {
        val = new Date(val);
        var age = (Date.now() - val) / 31557600000;
        var formDate = document.getElementById('date');
        if (age > 0) {
            alert("Past/Current Date not allowed");
            formDate.value = "";
            return false;
        }
    }
</script>