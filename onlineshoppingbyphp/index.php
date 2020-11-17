<?php

require('frontendheader.php');
?>


<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		</div>
		<div class="carousel-item">
			<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		</div>
		<div class="carousel-item">
			<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		</div>
	</div>
</div>


<!-- Content -->
<div class="container mt-5 px-5">
	<!-- Category -->

	<div class="row">

		<?php 

			//$sql="SELECT * FROM categories ORDER BY name LIMIT 8 ";
			$sql="SELECT * FROM categories ORDER BY rand() LIMIT 8 ";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $categories=$stmt->fetchAll();	 
                    foreach ($categories as $category) {
                            
                        $cid=$category['id'];
                        $cname=$category['name'];
                        $cphoto=$category['logo'];

		?>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
			<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				<img src="<?= $cphoto ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<p class="card-text font-weight-bold text-truncate"> <?= $cname ?> </p>
				</div>
			</div>
		</div>

		<?php } ?>
	</div>

	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	<!-- Discount Item -->
	<div class="row mt-5">
		<h1> Discount Item </h1>
	</div>

	<!-- Disocunt Item -->
	<div class="row">
		<div class="col-12">
			<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
				<div class="MultiCarousel-inner">

					<?php 

						$sql="SELECT * FROM items WHERE discount!=''";
						$stmt=$conn->prepare($sql);
						$stmt->execute();

						$discount_item=$stmt->fetchAll();

						foreach ($discount_item as $discount) {
							$di_id=$discount['id'];
							$di_codeno=$discount['codeno'];
							//var_dump($di_codeno);
							//die();
							$di_name=$discount['name'];
							$di_price=$discount['price'];
							$di_discount=$discount['discount'];
							$di_description=$discount['description'];
							$di_photo=$discount['photo'];
						


					?>
					<div class="item">
						<div class="pad15">
							<a href="" >
								<img src="<?= $di_photo ?>" class="img-fluid img_detail">
							</a>
							<p class="text-truncate"><?= $di_name ?></p>
							<p class="item-price">
								<strike><?= $di_price ?>Ks </strike> 
								<span class="d-block"><?= $di_discount ?> Ks</span>
							</p>

							<div class="star-rating">
								<ul class="list-inline">
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
								</ul>
							</div>
							<?php if(isset($_SESSION['login_user'])){ ?>
								<a href="#" class="addtocartBtn text-decoration-none add_to_cart" data-id="<?= $di_id ?>"data-codeno="<?= $di_codeno ?>" data-name=" <?= $di_name ?>" data-price="<?= $di_price ?>" data-discount="<?= $di_discount ?>" data-description="<?= $di_description ?>" data-photo="<?= $di_photo ?>">Add to Cart</a>
							<?php } else {?>
								<a href="login.php" class="addtocartBtn text-decoration-none" >Add to Cart</a>
							<?php } ?>
						</div>
					</div>
					<?php }?>

				</div>
				<button class="btn btnMain leftLst"><</button>
				<button class="btn btnMain rightLst">></button>
			</div>
		</div>
	</div>

	<!-- Flash Sale Item -->
	<div class="row mt-5">
		<h1> Flash Sale </h1>
	</div>

	<!-- Flash Sale Item -->
	<div class="row">
		<div class="col-12">
			<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
				<div class="MultiCarousel-inner">

					<?php 

						$sql="SELECT * FROM items ORDER BY created_at";
						$stmt=$conn->prepare($sql);
						$stmt->execute();

						$sale_item=$stmt->fetchAll();

						foreach ($sale_item as $sale) {
							$s_id=$sale['id'];
							$s_codeno=$sale['codeno'];
							$s_name=$sale['name'];
							$s_price=$sale['price'];
							$s_discount=$sale['discount'];
							$s_photo=$sale['photo'];
							$s_description=$sale['description'];
						


					?>
					<div class="item">
						<div class="pad15">
							<a href="" >
								<img src="<?= $s_photo ?>" class="img-fluid">
							</a>
							<p class="text-truncate"><?= $s_name ?></p>
							<p class="item-price">
								<?php if ($s_discount) {?>
									<strike><?= $s_price ?> Ks </strike> 
									<span class="d-block"><?= $s_discount ?> Ks</span>
								<?php } else{ ?>
											<span class="d-block"><?= $s_price ?> Ks</span>
								<?php } ?>

							</p>

							<div class="star-rating">
								<ul class="list-inline">
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
								</ul>
							</div>
							<?php if(isset($_SESSION['login_user'])){ ?>
								<a href="#" class="addtocartBtn text-decoration-none add_to_cart"data-id="<?= $s_id ?>" data-code="<?= $s_codeno ?>" data-name=" <?= $s_name ?>" data-price="<?= $s_price ?>" data-discount="<?= $s_discount ?>" data-description="<?= $s_description ?>" data-photo="<?= $s_photo ?>">Add to Cart</a>
							<?php } else {?>
								<a href="login.php" class="addtocartBtn text-decoration-none" >Add to Cart</a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>

				</div>
				<button class="btn btnMain leftLst"><</button>
				<button class="btn btnMain rightLst">></button>
			</div>
		</div>
	</div>

	<!-- Random Catgory ~ Item -->
	<div class="row mt-5">
		<h1> Fresh Picks </h1>
	</div>

	<!-- Random Item -->
	<div class="row">
		<div class="col-12">
			<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
				<div class="MultiCarousel-inner">

					<?php 
					$sql="SELECT * FROM items WHERE subcategory_id =21 ORDER BY created_at";
						$stmt=$conn->prepare($sql);
						$stmt->execute();

						$ra_item=$stmt->fetchAll();

						foreach ($ra_item as $radom) {
							$ra_id=$radom['id'];
							$ra_codeno=$radom['codeno'];
							$ra_name=$radom['name'];
							$ra_price=$radom['price'];
							$ra_discount=$radom['discount'];
							$ra_photo=$radom['photo'];
							$ra_description=$radom['description'];

					?>
					<div class="item">
						<div class="pad15">
							<a href="" >
								<img src="<?= $ra_photo ?>" class="img-fluid">
							</a>
							<p class="text-truncate"><?= $ra_name ?></p>
							<p class="item-price">
								<?php if ($ra_discount) { ?>
									<strike><?= $ra_price ?> Ks </strike> 
									<span class="d-block"><?= $ra_discount ?> Ks</span>
								<?php } else { ?>
									<span class="d-block"><?= $ra_price ?> Ks</span>
								<?php } ?>
								
							</p>

							<div class="star-rating">
								<ul class="list-inline">
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
								</ul>
							</div>
							<?php if(isset($_SESSION['login_user'])){ ?>
								<a href="#" class="addtocartBtn text-decoration-none add_to_cart"data-id="<?= $ra_id ?>" data-code="<?= $ra_codeno ?>" data-name=" <?= $ra_name ?>" data-price="<?= $ra_price ?>" data-discount="<?= $ra_discount ?>" data-description="<?= $ra_description ?>" data-photo="<?= $ra_photo ?>">Add to Cart</a>
							<?php } else {?>
								<a href="login.php" class="addtocartBtn text-decoration-none" >Add to Cart</a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>

				</div>
				<button class="btn btnMain leftLst"><</button>
				<button class="btn btnMain rightLst">></button>
			</div>
		</div>
	</div>

	
	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	<!-- Brand Store -->
	<div class="row mt-5">
		<h1> Top Brand Stores </h1>
	</div>

	<!-- Brand Store Item -->
	<section class="customer-logos slider mt-5">
		<?php 

				$sql="SELECT * FROM brands";
                   	$stmt=$conn->prepare($sql);
                    $stmt->execute();
                    $brands=$stmt->fetchAll();

                    $i=1;
                    foreach ($brands as $brand) {

                        $id=$brand['id'];
                        $name=$brand['name'];
                        $photo=$brand['logo'];
			?>
		<div class="slide">
			
			<a href="">
				<img src="<?= $photo ?>">
			</a>

		</div>
		<?php } ?>
		
	</section>

	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

</div>



<?php

require('frontendfooter.php');


?>