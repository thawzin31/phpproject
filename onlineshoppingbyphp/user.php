<?php

    require('backendheader.php');


?>



<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> User </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="catagories_from.php" class="btn btn-outline-primary">
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
                                          <th>Contact</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1. </td>
                                            <td> aaa </td>
                                            <th></th>
                                            <td>
                                                <a href="" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
                                            </td>

                                        </tr>
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

$sql = "SELECT items.*, brands.name as bname, subcategories.name as sname, categories.name as cname  FROM items 
                INNER JOIN brands ON items.brand_id = brands.id
                INNER JOIN subcategories ON items.subcategory_id = subcategories.id
                INNER JOIN categories ON categories.id = subcategories.category_id
                WHERE items.id = :value1";