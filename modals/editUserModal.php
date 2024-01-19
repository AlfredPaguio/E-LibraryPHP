<div class="modal fade" id="user_<?= $rows['userid'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="./php/editUser.php">
        <div class="modal-header">
          <h3 class="modal-title">Edit User for: <?php echo $rows['username'] ?> </h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Firstname</label>
              <input type="hidden" name="id" value="<?php echo $rows['userid'] ?>" />
              <input type="text" name="username" value="<?php echo $rows['username'] ?>" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" value="<?php echo $rows['password'] ?>" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <!-- <label>Role</label>
              <input type="text" name="role" value="<?php echo $rows['role'] ?>" class="form-control" required="required"/> -->
              <label for="selectRole">Select Role</label>
              <select class="form-control" id="selectRole" name="role">
                <option value=0>Administrator</option>
                <option value=1>Regular Member</option>
              </select>
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button name="edituser" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
        </div>
    </div>
    </form>
  </div>
</div>
</div>