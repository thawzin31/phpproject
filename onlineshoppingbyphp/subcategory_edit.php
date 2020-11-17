<?php


	require('backendheader.php');
	require('db_connect.php');

	$id = $_GET['cid'];

	$sql="SELECT * FROM subcategories WHERE id=:value1";
	$stmt=$conn->prepare(
		$sql);
	$stmt->bindParam(':value1',$id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$sid= $row['id'];
	$name=$row['name'];
	$cid=$row['category_id'];
	//var_dump($cid);

?>

<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i>  Edit SubCatagory Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategory_list.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategory_update.php" method="POST">
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$row['name']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="catagory" class="col-sm-2 col-form-label"> Catagory </label>
                                    <div class="col-sm-10">
                                        <select for="catagory" class="form-control custom-select custom-control-inline bg-white" name="catagoryid">
                                        	<option>choose category</option>
                                            <?php

                                            $sql= "SELECT * FROM categories";
                                            $stml=$conn->prepare($sql);
                                            $stml->execute();
                                            $rows=$stml->fetchAll();

                                            
                                            foreach ($rows as $row) {
                            
                                                $id=$row['id'];
                                               // var_dump($id);
                                                 $name=$row['name'];


                                            ?>
                                            <option <?php
                                            	if ($id == $cid) echo "selected"; ?> value="<?php echo $id; ?>" >
                                            <?php echo $name; ?></option>

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