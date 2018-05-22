<form action="<?php echo base_url()?>Category/addSubCategory"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3">  Sub Catagory Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="subcatagoryname" placeholder="enter catagory name" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Select Category
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">

                <select class="form-control input-height" required id="city" name="categoryid">
                    <option value="">select  Category</option>
                    <?php foreach ($category as $category) { ?>
                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

                    <?php } ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Sub Category Status
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">

                <select class="form-control input-height"  id="CategoryStatus" required name="subCategoryStatus">
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