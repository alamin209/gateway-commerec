<?php foreach ($userInfo as $u)  {  ?>

<form action="<?php echo base_url()?>User/updateUserById/<?php echo $u->id ?>"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3"> Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="name"  value="<?php echo $u->name ?>" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">

            <label class="control-label col-md-3">Address<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="address"  value="<?php echo $u->address ?>" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">

            <label class="control-label col-md-3"> Email<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="email"  value="<?php echo $u->email ?>" required class="form-control input-height" />
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-md-3">Password<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="password" name="Password"  value="<?php echo $u->password ?>" required class="form-control input-height" />
            </div>
        </div><div class="form-group">

            <label class="control-label col-md-3"> City<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="fkCity"   value="<?php echo $u->fkCity ?>" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">

            <label class="control-label col-md-3"> Post Code<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="postalCode"   value="<?php echo $u->postalCode ?>" required class="form-control input-height" />
            </div>
        </div><div class="form-group">

            <label class="control-label col-md-3">Contact Number<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="contactNo"   value="<?php echo $u->contactNo ?>" required class="form-control input-height" />
            </div>
        </div>



            <div class="form-group">
                <label class="control-label col-md-3"> Admin Type
                    <span class="required"> * </span>
                </label>
                <div class="col-md-5">

                    <select class="form-control input-height"  id="CategoryStatus" required name="fkUserType">
                        <option value="">Select....</option>
                        <option value="Admin" <?php echo ($u->fkUserType=='Admin')?'selected="selected"':''; ?>>Admin</option>
                        <option value="cus" <?php echo ($u->fkUserType=='cus')?'selected="selected"':''; ?>>Customer</option>
                    </select>

                </div>
            </div>


    <div class="form-group">

            <label class="control-label col-md-3">Country<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="Country"  readonly value="<?php echo $u->Country ?>" required class="form-control input-height" />
            </div>
        </div>

        <!--        <div class="form-group">-->
        <!--            <label class="control-label col-md-3"> Description<span class="required"> * </span></label>-->
        <!--             <div class="col-md-5">-->
        <!--                <input type="text" name="description" placeholder="Give Offer  description"  class="form-control input-height" />-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="form-group">
            <label class="control-label col-md-3">User ActivationN Status
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">

                <select class="form-control input-height"  id="CategoryStatus" required name="userActivationStatus">
                    <option value="">User Activation Status</option>
                    <option value="1" <?php echo ($u->userActivationStatus=='1')?'selected="selected"':''; ?>>Active</option>
                    <option value="0" <?php echo ($u->userActivationStatus=='0')?'selected="selected"':''; ?>>In-Active</option>
                </select>

            </div>
        </div>
<!--        <div class="form-group">-->
<!--            <label class="control-label col-md-3">-->
<!--                <span class="required"> Image* </span>-->
<!--            </label>-->
<!--            <div class="col-md-5">-->
<!--                <input type="file" id="imageFile" name="photo">-->
<!--            </div>-->
<!--        </div>-->

        <div  class="form-group">
            <div class="form-actions">
                <div class="row">

                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</form>