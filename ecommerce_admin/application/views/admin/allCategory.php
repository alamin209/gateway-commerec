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
                            <th>Description</th>
                            <th data-breakpoints="xs">Category Adding Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">

                            <td>8</td>
                            <td>Lorriane</td>
                            <td>Cooke</td>
                            <td>Technical Services Librarian</td>
                            <td>April 7th 1969</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <div class="clearfix"> </div>
        </div>
        <div id="myModal" class="modal">
            <br/><br/><br/>
            <!-- Modal content -->
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


