<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <?php if ($ureport['status'] == "Cancelled" || $ureport['status'] == "Dismiss" || $ureport['status'] == "Unresolved") : ?>
                            <h6 class="m-0 font-weight-bold">
                                <p>Status: <span style="color: #ff0000"><?= $ureport['status']; ?></span></p>
                            </h6>
                        <?php endif; ?>
                        <?php if ($ureport['status'] == "Schedule" || $ureport['status'] == "Pending" || $ureport['status'] == "Record" || $ureport['status'] == "Endorsed") : ?>
                            <h6 class="m-0 font-weight-bold">
                                <p>Status: <span style="color: #FDFD96"><?= $ureport['status']; ?></span></p>
                            </h6>
                        <?php endif; ?>
                        <?php if ($ureport['status'] == "Settled" || $ureport['status'] == "Resolved") : ?>
                            <h6 class="m-0 font-weight-bold">
                                <p>Status: <span style="color: #77DD77"><?= $ureport['status']; ?></span></p>
                            </h6>
                        <?php endif; ?>
                        <?php if ($ureport['status'] == "On Process") : ?>
                            <h6 class="m-0 font-weight-bold">
                                <p>Status: <span style="color: #00C0F9"><?= $ureport['status']; ?></span></p>
                            </h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>        
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">        
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="<?= $ureport['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="uqid">UQID</label>
                    <input class="form-control" type="text" name="uqid" value="<?= $ureport['uqid']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Reporter's Name</label>
                    <input class="form-control" type="text" name="name" value="<?= $ureport['name']; ?>" readonly>
                </div>
                <?php if (!empty($ureport['accused_name'])) : ?>
                    <div class="form-group">
                        <label for="name">Accused Name</label>
                        <input class="form-control" type="text" name="accused_name" value="<?= $ureport['accused_name']; ?>" readonly>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row" style="display: none;visibility: hidden">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="status" id="status" disable value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <?php if ($ureport['status'] == "Record") : ?>
                                <label for="report" hidden>Status of Report</label>
                                <select class="form-control" name="status" disabled="disabled" hidden>
                                    <option class="text-secondary text-center" value="Record" disable <?php if ($ureport['status'] == "Record") echo 'selected = "selected"'; ?> readonly>Record</option>
                                </select>
                            <?php endif; ?>
                            <?php if ($ureport['status'] == "Cancelled") : ?>
                                <label for="report">Status of Report</label>
                                <select class="form-control" name="status" disabled="disabled">
                                    <option class="text-secondary text-center" value="Cancelled" disable <?php if ($ureport['status'] == "Cancelled") echo 'selected = "selected"'; ?> readonly>Cancelled</option>
                                </select>
                            <?php endif; ?>
                            <?php if ($ureport['status'] == "Close") : ?>
                                <label for="report">Status of Report</label>
                                <select class="form-control" name="status" disabled="disabled">
                                    <option class="text-secondary text-center" value="Close" disable <?php if ($ureport['status'] == "Close") echo 'selected = "selected"'; ?> readonly>Close</option>
                                </select>
                            <?php endif; ?>
                            <?php if ($ureport['status'] != "Cancelled" && $ureport['status'] != "Done" && $ureport['status'] != "Record") : ?>
                                <?php if ($ureport['status'] == "Pending") : ?>
                                    <input class="form-control" type="hidden" name="cases" value="Unresolved" readonly>
                                    <select class="form-control" name="status">
                                        <option class="text-warning text-center" value="Pending" <?php if ($ureport['status'] == "Pending") echo 'selected = "selected"'; ?>>Pending</option>
                                        <option class="text-primary text-center" value="On Process" <?php if ($ureport['status'] == "On Process") echo 'selected = "selected"'; ?>>On Process</option>
                                    </select>
                                <?php endif; ?>
                                <?php if ($ureport['status'] == "On Process") : ?>
                                    <label for="report" hidden>Status of Report</label>
                                    <input class="form-control" type="hidden" name="cases" value="Unresolved" readonly>
                                    <select class="form-control" name="status" disabled="disabled" hidden>
                                        <option class="text-primary text-center" value="On Process" disable <?php if ($ureport['status'] == "On Process") echo 'selected = "selected"'; ?> readonly>On Process</option>
                                    </select>
                                <?php endif; ?>
                                <?php if ($ureport['status'] == "Scheduled") : ?>
                                    <input class="form-control" type="hidden" name="cases" value="Resolved" readonly>
                                    <select class="form-control" name="status">
                                        <option class="text-primary text-center" value="" disable <?php if ($ureport['status'] == "Scheduled") echo 'selected = "selected"'; ?> readonly>Scheduled</option>
                                        <option class="text-warning text-center" value="Endorsed" <?php if ($ureport['status'] == "Endorsed") echo 'selected = "selected"'; ?>>Endorse</option>
                                        <option class="text-success text-center" value="Settled" <?php if ($ureport['status'] == "Settled") echo 'selected = "selected"'; ?>>Settle</option>
                                        <option class="text-danger text-center" value="Dismiss" <?php if ($ureport['status'] == "Dismiss") echo 'selected = "selected"'; ?>>Dismiss</option>
                                    </select>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" name="address" value="<?= $ureport['address']; ?>" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input class="form-control" type="text" name="age" value="<?= $ureport['age']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactnum">Contact Number</label>
                            <input class="form-control" type="text" name="contactnum" value="<?= $ureport['contactnum']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Report Title</label>
                    <input class="form-control" type="text" name="title" value="<?= $ureport['title']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Report Description*</label>
                    <textarea class="form-control" id="description" name="description" rows="3" readonly><?= $ureport['description']; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Report Type</label>
                            <input class="form-control" type="text" name="type" value="<?= $ureport['type']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_reported">Reported On</label>
                            <input class="form-control" type="text" name="date_reported" value="<?= $ureport['date_reported']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/') . $ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
                </div>
                <!-- btn -->
                <hr>
                <div class="row">
                    <?php if ($ureport['status'] == "Pending" || $ureport['status'] == "Scheduled") : ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="btn" value="Change" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($ureport['status'] == "On Process") : ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="btn btn-warning" href="#deleteModal" type="button" data-toggle="modal" data-target="#confirm-submit" name="btn" value="Make a Schedule" onclick="return deleteConfirm(this.form)" />
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </form>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Confirm Schedule Status.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input id="delete-confirm" class="btn btn-success" type="submit" value="Confirm" />
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function deleteConfirm() {
        $('#deleteModal').modal();
        $('#delete-confirm').click(function() {
            // handle form processing here
            var txt = "Scheduled";
            document.getElementById("status").value = txt;
            window.open('<?= site_url('report/schedule_summon/' . $ureport['id']); ?>');
            $('#form1').submit();
        });
    }
</script>
