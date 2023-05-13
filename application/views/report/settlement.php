<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <?php $holder_count = 0; ?>
        <?php foreach ($reportsettlement as $i) : ?>
            <?php if ($ureport['id'] == $i['case_no']) : ?>
                <?php $settlement_agreement = $i['settlement_agreement'] ?>
                <?php $kag_onduty = $i['kag_onduty'] ?>
                <?php $holder_count++ ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="card-body">
            <form action="<?= site_url('report/addsettlementinfo'); ?>" method="post">
                <?php if ($holder_count == 0) : ?>
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
                        <input type="text" class="form-control" value="<?= $ureport['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Settlement Agreement</label>
                        <textarea class="form-control" id="settlement_agreement" name="settlement_agreement" placeholder="Enter Agreement" rows="7"></textarea>
                        <?= form_error('action_description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Kagawad On Duty</label>
                        <input type="text" class="form-control" id="kag_onduty" name="kag_onduty" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn" class="btn btn-success">Submit</button>
                    </div>
                <?php endif; ?>
                <?php if ($holder_count != 0) : ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab()" title="Settlement PDF"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                            </div>
                        </div>
                    </div>
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
                        <input type="text" class="form-control" value="<?= $ureport['name']; ?>" readonly>
                    </div>                    
                    <div class="form-group">
                        <label for="name">Settlement Agreement</label>
                        <textarea class="form-control" id="settlement_agreement" name="settlement_agreement" placeholder="<?php echo $settlement_agreement ?>" rows="7" disabled></textarea>
                        <?= form_error('action_description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Kagawad On Duty</label>
                        <input type="text" class="form-control" value="<?= $kag_onduty ?>" disabled readonly>
                    </div>
                    <div class="form-group" hidden>
                        <button type="submit" id="btn" class="btn btn-success">Submit</button>
                    </div>
                <?php endif; ?>
        </div>
        </form>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    function openTab() {
        window.open('<?= site_url('report/settlement_pdf/' . $ureport['id']); ?>', '_blank');
    }
    $('#btn').click(function() {
        $('#kag_onduty').prop('disabled', true);
        $('#settlement_agreement').prop('disabled', true);
    });
</script>