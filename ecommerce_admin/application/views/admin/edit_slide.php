
<form action="<?php echo base_url('Slide/update_slide')?>"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">
            <label class="control-label col-md-3">
                <span class="required"></span>
            </label>
            <div class="col-md-5">
                <img src="<?= base_url($get_slide->photo); ?>" class="img-responsive" alt="img" title="img" style="height: 80px;width: 100px;" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">
                <span class="required"> Upload Image* </span>
            </label>
            <div class="col-md-5">
                <input type="file" id="imageFile" name="photo" required="">
                <p>Image size must be less than 1 MB</p>
            </div>
        </div>

        <input type="hidden" name="slide_id" value="<?= $get_slide->slide_id?>">

        <div  class="form-group">
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Save Change</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>