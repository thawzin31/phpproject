<?php 
	require('backendheader.php');
	require('db_connect.php');


	$id=$_GET['cid'];

	$sql="SELECT * FROM items WHERE id=:value1";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	 // $sid= $row['id'];
  //    $codeno=$row['codeno']
	 // $name=$row['name'];
	 // $price=$row['price'];
  //    $discount=$row['discount'];
  //   $brand=$row['brand'];
?>

<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Edit Item Form </h1>
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
                <form action="item_update.php" method="POST" enctype="multipart/form-data">

                	<input type="hidden" name="id" value="<?= $row['id'] ?>">
                  	<input type="hidden" name="oldphoto" value="<?= $row['photo'] ?>">

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo </a>
                            </div>
                        </nav>
                           	<div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <img src="<?= $row['photo'] ?>" class="img-fluid">
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        
                                    <input type="file" id="photo_id" name="newphoto">
                                        
                                 </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name_id" name="name" value="<?= $row['name']?>">
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
                                    <input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice" value="<?= $row['price']?>">
                                </div>
                                
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount" value="<?= $row['discount']?>">
                                </div>
                            </div>
                            
                    </div>
                    </div>


                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"> Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="text" value="<?= $row['description']?>"><?= $row['description'] ?></textarea>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="catagory" class="col-sm-2 col-form-label"> Brand </label>
                    <div class="col-sm-10">
                        <select for="catagory" class="custom-select custom-control-inline bg-white" name="brand">
                            
                            <?php 

                                $sql="SELECT * FROM brands";
                                $stmt=$pdo->prepare($sql);
                                $stmt->execute();
                                $rows=$stmt->fetchAll();

                                //var_dump($row);

                                
                                foreach ($rows as $Brand) {

                                $bid=$Brand['id'];

                                $bname=$Brand['name'];
                                //var_dump($name);
                            ?>

                               <option 
                                     value="<?= $bid ?>"><?= $bname ?>    
                                </option>


                             <?php } ?>
                        </select>
                       
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="catagory" class="col-sm-2 col-form-label"> SubCatagory </label>
                    <div class="col-sm-10">
                        <select for="catagory" class="custom-select custom-control-inline bg-white" name="subcategory">
                            <?php

                                $sql= "SELECT * FROM subcategories";
                                $stmt=$pdo->prepare($sql);
                                $stmt->execute();
                                $rows=$stmt->fetchAll();

                                
                                foreach ($rows as $row) {
                            
                                    $id=$row['id'];
                                    //var_dump($id);
                                    $name=$row['name'];
                                    //var_dump($name);

                            ?>
                                
                            <option <?php
                                if ($id == $cid) echo "selected"; ?> value="<?php echo $id; ?>"><?php echo $name; ?>    
                            </option>

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