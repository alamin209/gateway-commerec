<!--<div id="example">-->
<div class="form-group"  id="example" >
    <label class="control-label col-md-3"> Sub Category
        <span class="required"> * </span>
    </label>
    <div class="col-md-6">

        <select class="form-control input-height" required id="city" name="subcategoryid">
            <?php foreach ($categoryInfo as $sub) { ?>
                <option value="<?php echo $sub->sub_catgoryId ?>"><?php echo $sub->subCatoryName ?></option>

            <?php } ?>
        </select>

    </div>
</div>

<!--</div>-->