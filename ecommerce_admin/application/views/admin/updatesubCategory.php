<?php foreach ($subcategoryInfo as $s) { ?>
<form action="<?php echo base_url()?>Category/updateSubCategory/<?php echo $s->sub_catgoryId ?>"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3">  Sub Catagory Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="subcatagoryname"  value="<?php echo $s->subCatoryName ?>" required class="form-control input-height" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3"> Category  Name
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">

                <select class="form-control input-height" required id="city" name="categoryid">
                    <option value="">select  Category</option>
                    <?php foreach ($category as $category) { ?>
                        <option value="<?php echo $category->category_id  ?>" <?php if(!empty($s->cat_id) && $category->category_id== $s->cat_id )  echo 'selected="selected"'  ?>"><?php echo $category->name ?></option>

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
                    <option value="1" <?php echo ($s->status=='1')?'selected="selected"':''; ?>>Active</option>
                    <option value="0" <?php echo ($s->status=='0')?'selected="selected"':''; ?>>In-Active</option>
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
<?php } ?>