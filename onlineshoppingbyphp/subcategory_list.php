<?php

    require('backendheader.php');
    require('db_connect.php')

?>



<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> SubCategory </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategory_from.php" class="btn btn-outline-primary">
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
                                          <th>Category</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td> 1. </td>
                                            <td> aaa </td>
                                            <td></td>
                                            <td> -->

                                    <?php

                                        $sql="SELECT subcategories.*,categories.id as cid,categories.name as cname FROM subcategories LEFT JOIN categories ON subcategories.category_id=categories.id";
                                        $stml=$conn->prepare($sql);
                                        $stml->execute();
                                        $rows=$stml->fetchAll();

                                        //var_dump($row);

                                        $i=1;
                                        foreach ($rows as $row) {
                                            
                                            $id=$row['id'];
                                            $name=$row['name'];
                                            $categoryid=$row['category_id'];
                                            $categoryname=$row['cname']
                                        

                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?>; </td>
                                            <td><?= $name?></td>
                                            <td><?=$categoryname?></td>
                                            <td>

                                                <a href="subcategory_edit.php?cid=<?= $id ?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="subcategory_delete.php?cid=<?=$id ?>" class="btn btn-outline-danger">
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