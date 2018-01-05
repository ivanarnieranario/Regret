<div class="row px-4">
    <div class="card mb-3">
        <div class="card-header">PCP-10: Missing Person</div>
        <div class="card-body">
            <h4><span class="font-bold">Name: </span><?=$alarm->subject->fname.' '.$alarm->subject->mname.' '.$alarm->subject->lname?></h4>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="font-bold">Age: </span><?=$alarm->subject->age?></p>
                    <p><span class="font-bold">Gender: </span><?=$alarm->subject->gender?></p>
                    <p><span class="font-bold">Address: </span><?=$alarm->subject->addr?></p>
                    <p><span class="font-bold">Nationality: </span><?=$alarm->subject->nationality?></p>
                    <p><span class="font-bold">Height(cm): </span><?=$alarm->subject->height?></p>
                    <p><span class="font-bold">Weight(kg): </span><?=$alarm->subject->weight?></p>
                    <p><span class="font-bold">Complexion: </span><?=$alarm->subject->complexion?></p>
                    <p><span class="font-bold">Build: </span><?=$alarm->subject->build?></p>
                    <p><span class="font-bold">Hair Color: </span><?=$alarm->subject->hair_color?></p>
                    <p><span class="font-bold">Upper Cloth: </span><?=$alarm->detail->upper_cloth_color?> <?=$alarm->detail->upper_cloth?></p>
                    <p><span class="font-bold">Lower Cloth: </span><?=$alarm->detail->lower_cloth_color?> <?=$alarm->detail->lower_cloth?></p>
                    <p><span class="font-bold">Peculiarity: </span><?=$alarm->detail->peculiarity?></p>
                    <p><span class="font-bold">Body Mark: </span><?=$body_mark->name?></p>
                    <p><span class="font-bold">Body Mark Location: </span><?=$alarm->detail->body_mark_loc?></p>
                    <p><span class="font-bold">Location Last Seen: </span><?=$alarm->detail->location_detail?></p>
                    <p><span class="font-bold">Additional Description: </span><?=$alarm->detail->description?></p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?=base_url('/assets/uploads/missing-unknown.jpg')?>" style="width: 100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="card-header">Reported <to></to></div>
        <div class="card-body">
            <h4><span class="font-bold">Name: </span><?=$alarm->receiver->first_name?> <?=$alarm->receiver->last_name?></h4>
            <p><span class="font-bold">PCP: </span><?=$pcp->name?></p>
            <p><span class="font-bold">Rank: </span><?=$rank->name?></p>
        </div>
    </div>
</div>