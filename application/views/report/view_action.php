<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report/user_report_detail') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php if ($ureport['status'] == "Cancelled") : ?>
                            <h6 class="m-0 font-weight-bold">
                                <p>Status: <span style="color: #ff0000"><?= $ureport['status']; ?></span></p>
                            </h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <div class="form-group" style="display: none;visibility: hidden">
                    <input class="form-control" type="hidden" name="id" value="<?= $ureport['id']; ?>" readonly>
                </div>
                <div class="form-group" style="display: none;visibility: hidden">
                    <label for="uqid">UQID</label>
                    <input class="form-control" type="text" name="uqid" value="<?= $ureport['uqid']; ?>" readonly>
                </div>
                <div class="form-group" style="display: none;visibility: hidden">
                    <label for="name">Reporter's Name</label>
                    <input class="form-control" type="text" name="name" value="<?= $ureport['name']; ?>" readonly>
                </div>
                <?php if (!empty($ureport['accused_name'])) : ?>
                    <div class="form-group" style="display: none;visibility: hidden">
                        <label for="name">Accused Name</label>
                        <input class="form-control" type="text" name="accused_name" value="<?= $ureport['accused_name']; ?>" readonly>
                    </div>
                <?php endif; ?>            
                <div class="form-group" style="display: none;visibility: hidden">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" name="address" value="<?= $ureport['address']; ?>" readonly>
                </div>
                <div class="row" style="display: none;visibility: hidden">
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
                <div class="form-group" style="display: none;visibility: hidden">
                    <label for="title">Report Title</label>
                    <input class="form-control" type="text" name="title" value="<?= $ureport['title']; ?>" readonly>
                </div>

                <div class="form-group" style="display: none;visibility: hidden">
                    <label for="description">Report Description*</label>
                    <textarea class="form-control" id="description" name="description" rows="3" readonly><?= $ureport['description']; ?></textarea>
                </div>
                <div class="row" style="display: none;visibility: hidden">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Report Type</label>
                            <input class="form-control" type="text" name="type" value="<?= $ureport['type']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Case Status: </label>
                            <input class="form-control" type="text" name="cases" id="cases" disable value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_reported">Reported On</label>
                            <input class="form-control" type="text" name="date_reported" value="<?= $ureport['date_reported']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="display: none;visibility: hidden">
                    <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/') . $ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
                </div>
                <?php $count = 0; ?>
                <?php foreach ($vremark as $i) { ?>
                    <?php if ($ureport['id'] == $i['case_no']) { ?>
                    <div class="form-group">
                        <label for="file">Case No.</label>
                        <input type="text" class="form-control" id="case_no" name="case_no" value="<?= $i['case_no']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="file">Action of Barangay</label>
                        <textarea class="form-control" id="action_description" name="action_description" placeholder="<?= $i['action_description']; ?>" rows="7" disabled></textarea>
                        <?= form_error('action_description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
               
                <div class="form-group">
                    <label for="file">Attachment</label>
                    <div class="form-group">
                        <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/') . $ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo form_error('file') ?>
                    </div>
                </div>
                <?php $count++; }}?>
                <?php if($count==0):?> 
                <div class="col-xs-1" align="center">
                    <h4> No data available Yet! </h4> 
                </div>
                
                <?php endif; ?>
                <hr>
                
                <!-- btn -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php if ($ureport['cases'] != "Unresolved") : ?>
                                <input class="btn btn-success" href="#deleteModal" type="button" data-toggle="modal" data-target="#confirm-submit" name="btn" value="Case Closed" onclick="return deleteConfirm(this.form)" />
                            <?php endif; ?>
                        </div>
                    </div>                
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
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">This will be your submitted remark in the case.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input id="delete-confirm" class="btn btn-success" type="submit" value="Confirm" />
            </div>
        </div>
    </div>
</div>
<script>
    function deleteConfirm() {
        $('#deleteModal').modal();
        $('#delete-confirm').click(function() {
            // handle form processing here
            var txt = "Resolved";
            document.getElementById("cases").value = txt;
            $('#form1').submit();
        });
    }
</script>
<script>
    function deleteConfirm2() {
        $('#deleteModal').modal();
        $('#delete-confirm').click(function() {
            // handle form processing here
            var txt = "Unresolved";
            document.getElementById("cases").value = txt;
            $('#form1').submit();
        });
    }
</script>

<style>
    @media print {
        #print-btn {
            display: none;
        }
    }
</style>