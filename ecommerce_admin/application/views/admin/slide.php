
<?php include_once ('header.php') ?>
<?php include_once ('leftsidebar.php') ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">Homepage Slide</div>
                <?php 
                    if(!empty($message)){
                ?>
                    <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>

                        <i class="ace-icon fa fa-check green"></i>
                        <?php echo $message; ?>
                    </div>

                <?php } ?>

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
                            <tr>
                                <th data-breakpoints="xs">SN</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $count=1;
                                foreach ($all_slide as $val) { ?>
                                    
                                    <tr class="odd gradeX">
                                        <td><?= $count++; ?></td>
                                        <td><img src="<?= base_url($val->photo); ?>" class="img-responsive" alt="img" title="img" style="height: 80px;width: 100px;" ></td>
                                        <td>
                                            <a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" data-panel-id="<?php echo $val->slide_id; ?>" onclick="selectid2(this)" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>|
                                            <a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" data-panel-id="<?php echo $val->slide_id; ?>" onclick="selectid3(this)" href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </a>

                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div id="myModal" class="modal">
            <br/><br/><br/>
            <div class="modal-content">
                <span class="close">×</span>
                <div id="txtHint"></div>
            </div>
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
            url:'<?php echo base_url("Slide/Add_Slide" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function selectid2(x){

        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Slide/Edit_Slide_Photo")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {

                $('#txtHint').html(data);

            }
        });
        modal.style.display = "block";

    }

    function selectid3(x){

        if (confirm("Are you sure to delete this Photo?")){

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Slide/Delete_Slide_Photo")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Image deleted Successfully');
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