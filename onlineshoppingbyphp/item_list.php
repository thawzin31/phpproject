<?php

require('backendheader.php');
require('db_connect.php');

?>



<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_from.php" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Brand</th>
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php 

                            $sql="SELECT items.*,brands.id as cid, brands.name as cname FROM items LEFT JOIN brands ON items.brand_id=brands.id";

                                $stmt=$conn->prepare($sql);
                                $stmt->execute();
                                $rows=$stmt->fetchAll();

                                $i=1;
                                foreach ($rows as $row) {
                                            
                                    $id=$row['id'];
                                    $name=$row['name'];
                                    $brandid=$row['brand_id'];
                                    $brandname=$row['cname'];
                                    $price=$row['price'];

                        ?>
                        <tr>
                            <td><?php echo $i++ ?>; </td>
                            <td><?= $name?></td>
                            <td><?=$brandname?></td>
                            <td><?=$price ?> </td>
                            <td>
                                <a href="item_edit.php?cid=<?=$id?>" class="btn btn-warning">
                                    <i class="icofont-ui-settings"></i>
                                </a>

                                <a href="item_delete.php?cid=<?=$id?>" class="btn btn-outline-danger">
                                    <i class="icofont-close"></i>
                                </a>
                            </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<?php
require('backendfooter.php');

?>