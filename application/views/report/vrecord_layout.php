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
                    <?php foreach ($reportsettlement as $r) : ?>
                        <?php if ($ureport['id'] == $r['case_no']) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $r['settlement_agreement']; ?></td>
                                <td><?= $r['case_no']; ?></td>
                                <td><?= $r['kag_onduty']; ?></td>
                                <td><?= $r['date_settled']; ?></td>
                                <td width="17%">
                                    <div class="form-group">
                                        <button class="badge badge-danger" style="font-size:14px;" onclick="openTab()" title="Settlement PDF"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                    </div>
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