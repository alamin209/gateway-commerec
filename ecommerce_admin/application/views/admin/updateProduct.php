<?php foreach ($productinfo as $p) { ?>

                            <form  action="<?php echo base_url() ?>Product/updateProduct"  class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Product name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" value="<?php echo  $p->p_name ?>">
                                    </div>
                                </div>
                                        <input type="hidden" class="form-control" name="id1" value="<?php echo  $p->product_id ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> Slected
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">

                                        <select class="form-control input-height" required id="cit" name="categoryid">
                                            <option value="">select  Category</option>
                                            <?php foreach ($category as $category) { ?>
                                                <option value="<?php echo $category->category_id  ?>" <?php if(!empty($p->category_id) && $category->category_id== $p->category_id )  echo 'selected="selected"'  ?>"><?php echo $category->name ?></option>

                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group" id="example">
                                    <label class="control-label col-md-3"> Sub Category
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">

                                        <select class="form-control input-height  id="city" name="subcategoryid">
                                        <?php foreach ($subcategory as $sub) { ?>
                                            <option value="<?php echo $sub->sub_catgoryId?>" <?php if(!empty($p->subcat_id) && $sub->sub_catgoryId== $p->subcat_id )  echo 'selected="selected"'  ?>"><?php echo $sub->subCatoryName ?></option>
                                        <?php } ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">product Price  : </label>
                                    <div class="col-md-6">
                                        <input class="form-control input-height" type="number" name="itemPrice" value="<?php echo $p->product_price ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">product  Quantity  : </label>
                                    <div class="col-md-6">
                                        <input class="form-control input-height" type="number" name="qty" value="<?php echo $p->qty ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">product  Code  : </label>
                                    <div class="col-md-6">
                                        <input class="form-control input-height" type="number" name="code" value="<?php echo $p->pro_code  ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label"  >Product Description </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="p_desc" value="<?php echo $p->p_desc ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-6">
                                        <img src="<?php print base_url($p->p_image);?>"  name="photo"   height="150px" width="120px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product Status
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">

                                        <select class="form-control input-height"  id="Item_Status"   name="status">
                                            <option value="">Select Status...</option>
                                            <option value="1" <?php echo ($p->status=='1')?'selected="selected"':''; ?>>Active</option>
                                            <option value="0" <?php echo ($p->status=='0')?'selected="selected"':''; ?>>In-Active</option>
                                        </select>

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
                            </form>

 <?php   }   ?>

<script type="text/javascript">


    $(document).ready(function() {

        $('select[name="categoryid"]').on('change', function() {

            var stateID = $(this).val();


            if(stateID) {

                $.ajax({
                    url:"<?php echo base_url() ?>Product/addProducts/"+stateID,
                    data:{id:stateID},
                    type: "POST",
                    success:function(data) {
                        $('#example').html(data);
                    }

                });

            }

        });

    });

</script>
