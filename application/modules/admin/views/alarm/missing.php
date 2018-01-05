<div class="row px-5">
    <?php if ( !empty($alarms) ): ?>
        <?php foreach ($alarms AS $alarm): ?>
            <div class="card mb-3">
                <div class="card-header">PCP-01: </div>
                <div class="card-body row py-0 px-4">
                    <div class="col-md-3 alarm-image" style='background-image: url("<?=base_url('');?>/assets/uploads/missing-unknown.jpg");'></div>
                    <div class="col-md-9 py-3">
                        <h4><span class="font-bold">Name:</span> Marzan Calilung</h4>
                        <p><span class="font-bold">Age:</span> 24</p>
                        <p><span class="font-bold">Gender:</span> Male</p>
                        <a class="btn btn-primary" href="<?php echo base_url('/admin/alarm/missing_details/1') ?>">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="card mb-3">
        <div class="card-header">PCP-01: Missing Person</div>
        <div class="card-body row py-0 px-4">
            <div class="col-md-3 alarm-image" style='background-image: url("<?=base_url('');?>/assets/uploads/missing-unknown.jpg");'></div>
            <div class="col-md-9 py-3">
                <h4><span class="font-bold">Name:</span> Mark Anthony Patawaran</h4>
                <p><span class="font-bold">Age:</span> 25</p>
                <p><span class="font-bold">Gender:</span> Male</p>
                <button class="btn btn-primary">View Details</button>
            </div>
        </div>
    </div>
</div>