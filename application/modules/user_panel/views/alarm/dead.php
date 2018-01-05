






<!-- 

Include the dataTable.min.css and dataTables.min.js to this page to make it dynamic search and filter numbers
I don't know how to link it. The files was inside this user_panel/views/datatable_design -->













<div class="container-fluid well">
  <div class="row">
    <div class="col-md-8">
      <h1>List of Found Dead Bodies</h1>
    </div>
    <div class="col-md-4 float-right">
      <a href="javascript:void(0)"  data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary btn-lg">Add new body</a>
    </div>
  </div>
<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Action</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
            </tr>
        </tfoot>
        <tbody>

<?php for($x = 0 ; $x < 100; $x++){?>
    <tr>
        <td width="150px;">
          <div class="row">
            <form method="POST" action="">
              <!-- value = body_id -->
              <input type="hidden" name="body_details" value="">
              <div class="col-md-12">
                <button type="submit" href="#" class="btn btn-primary btn-sm btn-block">Details</button>
              </div>
            </form>

          <form method="POST" action="">
            <div class="col-md-12" style="margin-top: 5px;">
              <!-- value = body_id -->
              <input type="hidden" name="body_id" value="">
              <button type="submit" name="delete_body" class="btn btn-danger btn-sm btn-block">Remove
            </div>
          </form>
          </div>
        </td>


        <td>Your firstname here...</td>
        <td>Your middlename here...</td>
        <td>Your lastname here...</td>
    </tr>

        <?php } ?>

        </tbody>
    </table>
</div>





<!-- Dead Bodies Modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
       <div class="card-header">
            Add Body
        </div>
    </div>
    <div class="modal-body">
      <form method="POST" action="">
       



<div class="row px-4">
    <form method="post">
        <div class="card">
            <div class="card-body">
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
                <div class="row">
                <div class="form-group col-md-10">
                    <label for="aka">A.K.A</label>
                    <input type="text" id="aka" name="aka" class="form-control" required />
                </div >
                 <div class="form-group col-md-2">
                    <label for="complexion">AGE</label>
                    <select id="complexion" name="complexion" class="form-control" required >
                      <?php
                        for($x = 1; $x < 100; $x ++){ 
                      ?>
                        <option value="<?php echo $x;?>"><?php echo $x; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                </div>
              </div>
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
                <div class="form-group">
                    <label for="peculiarity">Peculiarity</label>
                    <input name="peculiarity" id="peculiarity" class="form-control" required />
                </div>
            </div>
        </div>
    </form>
</div>
    </div> <!-- Modal Body-->


    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"  role="button">Close</button>
        </div>
        <div class="btn-group" role="group">
          <button type="submit" id="add_body" name="add_body" class="btn btn-primary btn-lg" role="button">Save</button>
        </div>
      </div>
    </div>

  </div>
  </form>
  </div>
</div>
