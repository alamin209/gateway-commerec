<?php include_once ('header.php') ?>
    <!--header end-->
    <!--sidebar start-->
<?php include_once ('leftsidebar.php') ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Form Elements
                            </header>
                            <div class="panel-body">
                                <form  action="<?php echo base_url() ?>Product/newProduct "  class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Product name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Slected
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">

                                            <select class="form-control input-height" required id="cit" name="categoryid">
                                                <option value="">select  Category</option>
                                                <?php foreach ($category as $category) { ?>
                                                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group" id="example">
                                        <label class="control-label col-md-3"> Sub Category
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">

                                            <select class="form-control input-height  id="city" name="categoryid">
                                                <option value="">select Sub Category</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" id="Item_price" >Product Description </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">If you want to add any Size click </label>
                                        <div class="col-md-5">
                                            <input class="btn btn-success" type="button" name = 'add' value='Add' onclick="selectid2()">
                                        </div>
                                    </div>

                                    <div id="showattr" style="display: none">
                                        <div id='TextBoxesGroup'>
                                            <div id="TextBoxDiv1" >
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Size/Extra #1 : </label>
                                                    <div class="col-md-5">
                                                        <input class="form-control input-height" type='textbox' id='textbox1' name="textbox[]" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price #1 : </label>
                                                    <div class="col-md-5">
                                                        <input class="form-control input-height" type='textbox' id='textimage1' name="textprice[]">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Status #1: </label>
                                                    <div class="col-md-5">
                                                        <select class="form-control input-height"  name="itemsizeStatus[]">
                                                            <option value="">Select...</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="add_remove_button" class="form-group" style="margin-left: 230px">
                                            <input class="btn btn-success" type='button' value='Add More' id='addButton'>
                                            <input class="btn btn-danger" type='button' value='Remove' id='removeButton'>
                                        </div>

                                    </div>

                                    <div class="form-group" id="Item_price">
                                        <label class="col-sm-3 control-label">Product Description </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="focusedInput" type="text"  name="p_desc" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Product Status
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">

                                            <select class="form-control input-height"  id="Item_Status"   name="status">
                                                <option value="">Select Status...</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
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
                            </div>
                        </section>


                    </div>
                </div>




                <!-- page end-->
            </div>
        </section>
        <!-- footer -->
     <?php include_once ('footer.php') ?>
    </section>
    <!--main content end-->
        <?php include_once ('js.php') ?>
</body>
</html>
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

    function selectid2() {
        document.getElementById('showattr').style.display = "block";
        document.getElementById('Item_price').style.display = "none";
//        document.getElementById('Item_Status').style.display = "none";
        document.getElementById('add_remove_button').style.display = "block";
        return false;
    }

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
//
//                newTextBoxDiv.after().html('<label class="control-label col-md-3">Size/Extra #'+ counter + ' : </label>' +
//                    '<input class="form-control input-height" type="text" name="textbox[]' + counter +
//                    '" id="textbox' + counter + '" value="" >'+
//                    '<label>Price #'+ counter + ' : </label>' +
//                    '<input class="form-control input-height" type="text" name="textprice[]' + counter +
//                    '" id="textprice' + counter + '" value="" >'
//
//                );
            newTextBoxDiv.after().html('<div class="form-group">'+
                '<label class="control-label col-md-3">Size/Extra #'+ counter + ' : </label>'+
                '<div class="col-md-5">'+
                '<input class="form-control input-height" type="textbox" id="textbox1" name="textbox[]" >'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Price #'+ counter + ' : </label>'+
                '<div class="col-md-5">'+
                '<input class="form-control input-height" type="textbox" id="textimage1" name="textprice[]">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Status: #' +counter+'</label>'+
                '<div class="col-md-5">'+
                '<select class="form-control input-height"  name="itemsizeStatus[]">'+
                '<option value="">Select...'+'</option>'+
                '<option value="1">Active'+'</option>'+
                '<option value="0">Inactive'+'</option>'+
                '</select>'+
                '</div>'+
                '</div>'
            );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" textbox to remove");
                document.getElementById('Item_price').style.display = "block";
//                    document.getElementById('Item_Status').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });
</script>