<!--header -->
<?php include_once ('header.php') ?>
<!--header end-->
<!--sidebar start-->
<?php include_once ('leftsidebar.php') ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">

                <div class="panel-heading">
                     Product List
                </div>
                <?php if ($this->session->flashdata('errorMessage')!=null){?>
                    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                <?php }
                elseif($this->session->flashdata('successMessage')!=null){?>
                    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                <?php }?>
                <br/>
                <div>
                    <table    border="1px sold black"  class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                        <thead>
                        <tr >
                            <th>Sr.NO</th>
                            <th> Product Name</th>
                            <th>Product Category </th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <th> Price </th>
                            <th> Extra size details </th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; $i=1; foreach ($product as $p)
                        { ?>

<!--                        --><?php //print_r($p) ?>

                        <tr class="odd gradeX">
                                <td><?php echo $i ?></td>

                                <td><?php  echo $p->p_name ?>

                                </td>
                            <td><?php  echo $p->name?></td>
                            <td><?php  echo $p->pro_code ?></td>
<!--                            <td>--><?php // echo $p->qty ?><!--</td>-->
                            <td> <img src="<?php   echo base_url(). $p->p_image ?>" alt="image" height="75px" width="75px"></td>

                            <td><?php  echo $p->product_price?></td>
                            <td>
                                <div class="table table-responsive">
                                 <table style="margin-bottom: 5px" class="orderexmple table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">

                                     <?php foreach ($product_d  as $d ) {  ?>
                                         <?php  if( $p->product_id== $d->product_id ) { ?>
                                        <tr>

                                         <td>

                                   <?php echo $d->optional ?>
                                         </td>
                                            <td>
                                       <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $d->id?>" onclick="selectid2(this)">
                                                <i class="fa fa-pencil"></i>
                                                    </button>

                                         <button type="button" data-panel-id="<?php echo $p->product_id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                              <i class="fa fa-trash-o "></i>
                                        </button>

                                           </td>
                                     </tr>
                                     <?php  } } ?>


                                     <tr>
                                   <button id="addRow" onclick="selectid1(this)" class="btn btn-info" style="z-index: inherit">
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                                     </tr>
                                 </table>
                                </div>
                                </td>

                                <td><?php
                                    if($p->status =="1" )
                                    {
                                        echo "Active";
                                    }

                                    if($p->status =="0" )
                                    {
                                        echo "In-Active";
                                    }
                                    ?></td>
                                <td class="center">
                                    <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $p->product_id?>" onclick="selectid2(this)">

                                        <i class="fa fa-pencil"></i>
                                    </button>

                                    <button type="button" data-panel-id="<?php echo $p->product_id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                        <i class="fa fa-trash-o "></i>
                                    </button>
                                </td>



                            </tr>

                            <?php $i++; }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <br/><br/><br/>
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">×</span>

                <div id="txtHint"></div>

            </div>

        </div>

        <div class="clearfix"> </div>
        </div>




    </section>

    <!-- footer -->
    <?php include_once ('footer.php') ?>
</section>

<!-- morris JavaScript -->

<?php  include('js.php') ?>


</body>
</html>
<script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function selectid1(x)
    {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Category/newSubCategory" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function selectid2(x)
    {

        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Category/getSubCategoryById")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {

                $('#txtHint').html(data);

            }
        });
        modal.style.display = "block";

    }

    function selectid3(x)
    {

        if (confirm("are you sure to delete this Sub Category?"))
        {

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Category/deleteCategoryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert(' Sub Category deleted Successfully');
                    location.reload();
                }

            });
        }
    }
    // When the user clicks * of the modal, close it
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>


