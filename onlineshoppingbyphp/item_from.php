<?php

require('backendheader.php');
require('db_connect.php')

?>

<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item Form </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_list.php" class="btn btn-outline-primary">
            <i class="icofont-double-left"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="item_add.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                          <input type="file" id="photo_id" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name_id" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label"> Price </label>

                    <div class="col-sm-10">

                        <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Unit Price </a>
                                    
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
                                </div>
                            </nav>
                            
                            <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
                                    <input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice">
                                </div>
                                
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount">
                                </div>
                            </div>
                            
                    </div>
                    </div>


                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"> Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="text"></textarea>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="catagory" class="col-sm-2 col-form-label"> Brand </label>
                    <div class="col-sm-10">
                        <select for="catagory" class="custom-select custom-control-inline bg-white" name="brand">
                            
                            <?php 

                                $sql="SELECT * FROM brands ORDER BY name ASC";
                                $stmt=$conn->prepare($sql);
                                $stmt->execute();
                                $rows=$stmt->fetchAll();

                                //var_dump($row);

                                $i=1;
                                foreach ($rows as $brand) {

                                $id=$brand['id'];
                                $name=$brand['name'];
                            ?>

                                <option value="<?= $id; ?>"> <?= $name;?></option>
                            <?php } ?>
                            </select>
                        </select>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="catagory" class="col-sm-2 col-form-label"> SubCatagory </label>
                    <div class="col-sm-10">
                        <select for="catagory" class="custom-select custom-control-inline bg-white" name="subcategory">
                            <?php

                                $sql= "SELECT * FROM subcategories";
                                $stmt=$conn->prepare($sql);
                                $stmt->execute();
                                $rows=$stmt->fetchAll();

                                $i=1;
                                foreach ($rows as $subcategory) {
                            
                                    $id=$subcategory['id'];
                                    $name=$subcategory['name'];


                            ?>
                                <option value="<?= $id ?>"><?= $name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">
                            <i class="icofont-save"></i>
                            Save
                        </button>
                    </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</main>




<?php
require('backendfooter.php');

?>