
<form action="<?php echo base_url('Slide/save_photo')?>"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">
                <span class="required"> Upload Image* </span>
            </label>
            <div class="col-md-5">
                <input type="file" id="imageFile" name="photo" required="">
                <p>Image size must be less than 1 MB</p>
            </div>
        </div>

        <div  class="form-group">
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Save Photo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>