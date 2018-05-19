<form action="<?php echo base_url()?>Category/addCategory"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3"> Catagory Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="catagoryname" placeholder="enter catagory name" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Category Status
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">

                <select class="form-control input-height"  id="CategoryStatus" required name="CategoryStatus">
                    <option value="">Select Status...</option>
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>

            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-3">
            <span class="required"> Image* </span>
        </label>
        <div class="col-md-5">
            <input type="file" id="imageFile" name="photo">
        </div>
    </div>

        <div  class="form-group">
            <div class="form-actions">
                <div class="row">

                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>