<div class="row">
    <?php if ( !empty($alarms)): ?>
        <?php foreach ($alarms AS $alarm): ?>
            <?php if ($alarm->subject == null || $alarm->alarm_type == null || $alarm->detail == null || $alarm->receiver == null) continue;?>
            <div class="card mb-3">
                <div class="card-header">PCP-01: <?=$alarm->alarm_type->name?></div>
                <div class="card-body row py-0 px-4">
                    <div class="col-md-3 alarm-image" style='background-image: url("<?=base_url('');?>/assets/uploads/missing-unknown.jpg");'></div>
                    <div class="col-md-9 py-3">
                        <h4><span class="font-bold">Name: </span>
                            <?=$alarm->subject->fname.' '.$alarm->subject->mname.' y '.$alarm->subject->lname?>
                        </h4>
                        <p><span class="font-bold">Age: </span><?=$alarm->subject->age?></p>
                        <p><span class="font-bold">Gender: </span> <?=$alarm->subject->gender?></p>
                        <?php if ($alarm->alarm_type_id == 1): ?>
                            <a class="btn btn-primary" href="<?php echo base_url("/user_panel/alarm/missing_details/$alarm->id") ?>">
                        <?php else: ?>
                                <a class="btn btn-primary" href="<?php echo base_url("/user_panel/alarm/dead_details/$alarm->id") ?>">
                        <?php endif?>
                            View Detail
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert" style="background-color: darkorange; color: white;">
            <span style="font-weight: bold;">Warning: </span> There is no Alarms
        </div>
    <?php endif; ?>
</div>
