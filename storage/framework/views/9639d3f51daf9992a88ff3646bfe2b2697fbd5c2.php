<!DOCTYPE html>
<html>
    <head>
        <meta name="_token" content="<?php echo e(csrf_token()); ?>">
        <title>Live Search</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({ headers : { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
        </script>
        <script>
            $(document).ready(function () {
                $('#search').on('keyup', function () {
                    var value = $(this).val();
                    console.log(value);
                    $.ajax({
                        type: "GET", 
                        url: "/search", 
                        data: {'search': value},
                        success: function (data) {
                            console.log(data)
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Products info </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-controller" id="search" name="Search"></input>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#search').on('keyup',function() {
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '/search',
                    data: { 'search' : $value },
                    success:function(data) {
                        console.log(data);
                    }
                });
            })
        </script>
        <script type="text/javascript">
            $.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
        </script>
    </body>
</html><?php /**PATH /Users/pedromacedo/Desktop/pedroLBAW/2nd-delivery/lbaw2284/resources/views/pages/search.blade.php ENDPATH**/ ?>