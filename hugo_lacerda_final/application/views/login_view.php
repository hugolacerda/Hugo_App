<!-- <h1>Simple Login with CodeIgniter</h1>
<?php //echo validation_errors(); ?>
<?php //echo form_open('verifylogin'); ?>
   <label for="username">Username:</label>
   <input type="text" size="20" id="username" name="username"/>
   <br/>
   <label for="password">Password:</label>
   <input type="password" size="20" id="passowrd" name="password"/>
   <br/>
   <input type="submit" value="Login"/>
</form> -->
 
 <div class="navbar-form navbar-right">
  <?php echo validation_errors(); ?>
  <?php echo form_open('verifylogin'); ?>
                  <div class="form-group">
                    <input type="text" size="20" placeholder="Username" class="form-control" id="username" name="username"/>
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" size="20" id="passowrd" name="password"/>
                  </div>
                  <button type="submit" class="btn btn-success">Sign in</button>
  </div>