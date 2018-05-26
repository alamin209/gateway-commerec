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
                    Category Table
                </div>
                <?php if ($this->session->flashdata('errorMessage')!=null){?>
                    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                <?php }
                elseif($this->session->flashdata('successMessage')!=null){?>
                    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                <?php }?>
                <br/>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="btn-group">
                            <button id="addRow" onclick="selectid1(this)" class="btn btn-info" style="z-index: inherit">
                                Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div>
                    <table class="table" ui-jq="footable" ui-options='{
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
                            <th data-breakpoints="xs">Sr.NO</th>
                            <th>Catagory Name</th>
                            <th>Category Image</th>
                            <th data-breakpoints="xs">Category Adding Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; $i=1; foreach ($category as $c)
                            { ?>

                        <tr class="odd gradeX">

                            <td><?php echo $i ?></td>
                            <td><?php  echo $c->name ?></td>
                            <td><img src="<?php  echo base_url(). $c->image ?>" alt="productimage"  hight="100px" width="125px" ></td>
                            <td> img<?php echo $c->insertDate ?></td>
                            <td class="center">
                                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $c->category_id ?>" onclick="selectid2(this)">

                                    <i class="fa fa-pencil"></i>
                                </button>

                                <button type="button" data-panel-id="<?php echo $c->category_id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                    <i class="fa fa-trash-o "></i>
                                </button>
                            </td>

                        </tr>

                        <?php $i++; } ?>

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
            url:'<?php echo base_url("Category/newCategory" )?>',
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
            url:'<?php echo base_url("Category/getCategoryById")?>',
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

        if (confirm("are you sure to delete this Category?"))
        {

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Category/deleteCategoryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Category deleted Successfully');
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


