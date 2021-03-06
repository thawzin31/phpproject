<?php

    require('backendheader.php');
    require('db_connect.php');

?>

<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> SubCatagory Form </h1>
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
                            <form action="subcategory_add.php" method="POST">
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="catagory" class="col-sm-2 col-form-label"> Catagory </label>
                                    <div class="col-sm-10">
                                        <select for="catagory" class="form-control custom-select custom-control-inline bg-white" name="catagoryid">

                                            <?php

                                            $sql= "SELECT * FROM categories";
                                            $stml=$conn->prepare($sql);
                                            $stml->execute();
                                            $rows=$stml->fetchAll();

                                            $i=1;
                                            foreach ($rows as $row) {
                            
                                                $id=$row['id'];
                                                 $name=$row['name'];


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