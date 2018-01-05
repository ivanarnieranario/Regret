<div class="row px-4">
    <div class="card">
        <div class="card-header">
            Search Filters
        </div>
        <div class="card-body">
            <form>
                <p>Search type</p>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="missing" value="1" />
                        Missing Person
                    </label>
                    <label>
                        <input type="checkbox" name="dead" value="2" />
                        Found Dead Body
                    </label>
                    <label>
                        <input type="checkbox" name="lifted" value="3" />
                        Lifted
                    </label>
                <div class="form-group">
                    <label for="pcp">Precinct reported</label>
                    <select class="form-control" name="pcp" id="pcp">
                        <option value=""></option>
                        <?php foreach ($pcp as $key => $pc):?>
                            <option value="<?=$key?>"><?=$pc?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fname">First name</label>
                            <input id="fname" name="fname" class="form-control"/>
                        </div >
                        <div class=col-md-4>
                            <label for="mname">Middle name</label>
                            <input id="mname" name="mname" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label for="lname">Last name</label>
                            <input id="lname" name="lname" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Gender</p>
                    <label>
                        <input type="radio" name="gender" value="male"/>
                        Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female"/>
                        Female
                    </label>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input id="nationality" name="nationality" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="complexion">Complexion</label>
                    <select id="complexion" name="complexion" class="form-control">
                        <option value=""></option>
                        <option value="dark">Dark</option>
                        <option value="light brown">Light brown</option>
                        <option value="light">Light</option>
                        <option value="tan">Tan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="build">Build</label>
                    <select id="build" class="form-control" name="build">
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
                            <select id="body_mark" name="body_mark" class="form-control">
                                <option value=""></option>
                                <?php foreach($body_marks as $marks): ?>
                                <option value="<?=$body_marks->id?>"><?=$body_marks->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body_mark_loc">Body Mark Location</label>
                            <input name="body_mark_loc" id="body_mark_loc" class="form-control"/>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>