<?php echo $form->messages(); ?>


<div class="row px-4">
    <form method="post">
        <div class="card">
            <div class="card-header">
                Add Alarm
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Alarm type</label><br>
                    <label>
                        <input type="radio" name="alarm_type" value="1" required />
                        Missing person
                    </label>
                    <label>
                        <input type="radio" name="alarm_type" value="2"/>
                        Found Cadaver Body
                    </label>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fname">First name</label>
                            <input id="fname" name="fname" class="form-control" required />
                        </div >
                        <div class=col-md-4>
                            <label for="mname">Middle name</label>
                            <input id="mname" name="mname" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="lname">Last name</label>
                            <input id="lname" name="lname" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" class="form-control" required />
                </div >
                <div class="form-group">
                    <label for="addr">Address</label>
                    <input id="addr" name="addr" class="form-control" required />
                </div >
                <div class="form-group">
                    <label>Gender</label><br>
                    <label>
                        <input type="radio" name="gender" value="male" required />
                        Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female"/>
                        Female
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input name="height" id="height" class="form-control" required type="number"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">weight</label>
                            <input name="weight" id="weight" class="form-control" required type="number"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input id="nationality" name="nationality" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="complexion">Complexion</label>
                    <select id="complexion" name="complexion" class="form-control" required >
                        <option value=""></option>
                        <option value="dark">Dark</option>
                        <option value="light brown">Light brown</option>
                        <option value="light">Light</option>
                        <option value="tan">Tan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="build">Build</label>
                    <select id="build" class="form-control" name="build" required >
                        <option value=""></option>
                        <option value="endomorph">Endomorph</option>
                        <option value="mesomorph">Mesomorph</option>
                        <option value="exomorph">Exomorph</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body_mark">Body Mark</label>
                            <select id="body_mark" name="body_mark" class="form-control" required >
                                <option value=""></option>
                                <?php foreach($body_marks as $marks): ?>
                                    <option value="<?=$marks->id?>"><?=$marks->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body_mark_loc">Body Mark Location</label>
                            <input name="body_mark_loc" id="body_mark_loc" class="form-control" required />
                        </div>
                    </div>
                </div>
                <label>Color</label>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="upper_cloth">Upper cloth</label>
                            <input name="upper_cloth" id="upper_cloth" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="upper_cloth_color">Upper cloth color</label>
                        <input name="upper_cloth_color" id="upper_cloth_color" class="form-control" required />
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lower_cloth">Lower cloth</label>
                            <input name="lower_cloth" id="lower_cloth" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="lower_cloth_color">Lower cloth color</label>
                        <input name="lower_cloth_color" id="lower_cloth_color" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="peculiarity">Peculiarity</label>
                            <input name="peculiarity" id="peculiarity" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hcolor">Hair Color</label>
                            <input name="hcolor" id="hcolor" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="loc_detail">Location Detail</label>
                    <input name="loc_detail" id="loc_detail" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="description">Additional Description</label>
                    <textarea name="desc" id="description" class="form-control" required rows="2"></textarea>
                </div>
                <hr>
                <label>Reportee Description</label><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="rep-fname">First name</label>
                            <input id="rep-fname" name="rep_fname" class="form-control" required />
                        </div >
                        <div class=col-md-4>
                            <label for="rep-mname">Middle name</label>
                            <input id="rep-mname" name="rep_mname" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="rep-lname">Last name</label>
                            <input id="rep-lname" name="rep_lname" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rep_addr">Address</label>
                            <input id="rep_addr" name="rep_addr" class="form-control" required />
                        </div >
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="contact_no">Contact number</label>
                            <input id="contact_no" name="contact_no" class="form-control" required />
                        </div >
                    </div>
                </div>
                <div class="form-group">
                    <label for="rel_to_subj">Relation to subject</label>
                    <input id="rel_to_subj" name="rel_to_subj" class="form-control" required />
                </div>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>