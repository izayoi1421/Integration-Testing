<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div oncontextmenu='return false' class='snippet-body'>
        <div class="container register">
            <div class="row">
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="<?php echo site_url('report/addaction_taken') ?>" onsubmit="myFunction()" class="form1" method="post" enctype="multipart/form-data">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary" style="float:left; display:inline-block;"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                                        <h6 class="m-0 font-weight-bold text-primary" style="float:right;display:inline-block;"><a href="" data-toggle="modal" data-target="#newRoleModal">View Detail</a></h6>
                                    </div>
                                </div>
                                <div class="card shadow mb-3">
                                    <div class="card-header">
                                        <h4 style="float:left;display:inline-block;">Action of Barangay</h4>
                                        <?php if ($ureport['status'] == "Record") : ?>
                                            <?php if ($ureport['cases'] == "Resolved") : ?>
                                                <h6 class="m-0 font-weight-bold" style="float:right;display:inline-block;">
                                                    <p>Status: <span style="color: #77DD77"><?= $ureport['cases']; ?></span></p>
                                                </h6>
                                            <?php endif; ?>
                                            <?php if ($ureport['cases'] == "Unresolved") : ?>
                                                <h6 class="m-0 font-weight-bold" style="float:right;display:inline-block;">
                                                    <p>Status: <span style="color: #ff0000"><?= $ureport['cases']; ?></span></p>
                                                </h6>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <?php $holder_count = 0; ?>
                                        <?php foreach ($reportremark as $i) : ?>
                                            <?php if ($ureport['id'] == $i['case_no']) : ?>
                                                <?php $action_detail = $i['action_description'] ?>
                                                <?php $holder_count++ ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <input type="hidden" class="form-control" id="case_no" name="case_no" value="<?= $ureport['id']; ?>" readonly>
                                        <?php if ($holder_count == 0) : ?>
                                            <div class="form-group">
                                                <textarea class="form-control" id="action_description" name="action_description" placeholder="Action Taken" rows="7"></textarea>
                                                <?= form_error('action_description', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="file">Attachment</label>
                                                <input class="form-control-file" type="file" name="file" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('file') ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="btn btn-success" type="submit" name="btn" value="Submit" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($holder_count != 0) : ?>
                                            <div class="form-group">
                                                <textarea class="form-control" id="action_description" name="action_description" placeholder="<?php echo $action_detail ?>" rows="7" disabled></textarea>
                                                <?= form_error('action_description', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group" disabled>
                                                <div class="form-group">
                                                    <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/') . $ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer small text-muted">
        * must be filled
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal add new role-->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">View Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form -->
            <form action="<?= site_url('report/addsummon'); ?>" id="actiontake" method="post">
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
                                <label for="name">Uqid</label>
                                <input type="text" class="form-control" value="<?= $ureport['uqid']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Complainant</label>
                        <input type="text" class="form-control" value="<?= $ureport['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Details</label>
                        <input type="text" class="form-control" value="<?= $ureport['description']; ?>" rows="7" readonly>
                    </div>
                    <div class="form-group">
                        <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/') . $ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.form1').on('submit', function() {
        var self = $(this),
            button = selft.find('input[type="submit"],button');
        button.attr('disabled', 'disabled').val('Already Submit');
        return false;
    });
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