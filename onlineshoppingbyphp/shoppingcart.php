<?php 

	require('frontendheader.php');

?>

	
	<!-- <script type="text/javascript" src="add_to-cart.js"></script> -->
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="index.php" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						<!-- <tr>
							<td>
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> 
							</td>
							<td> 
								<img src="frontend/image/item/saisai_one.jpg" class="cartImg">						
							</td>
							<td> 
								<p> Item Name </p>
								<p> Code Number</p>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn"> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> 1 </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn"> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>
								<p class="text-danger"> 
									230,000 Ks
								</p>
								<p class="font-weight-lighter"> 
								<del> 25,000 Ks </del> </p>
							</td>
							<td>
								230,000 Ks
							</td>
						</tr>
						<tr>
							<td>
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> 
							</td>
							<td> 
								<img src="frontend/image/item/saisai_two.jpg" class="cartImg">						
							</td>
							<td> 
								<p> Item Name </p>
								<p> Code Number</p>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn"> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> 1 </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn"> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>
								<p class="text-danger"> 
									230,000 Ks
								</p>
							</td>
							<td>
								230,000 Ks
							</td>
						</tr>
 -->
					</tbody>
					<tfoot id="shoppingcart_tfoot">
						<tr>
							<td colspan="8">
								<h3 class="text-right">  </h3>
							</td>
						</tr>
						<tr> 
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								<?php if(isset($_SESSION['login_user'])) {?>
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
									Check Out 
								</button>
								<?php }else{ 
									$_SESSION['cartURL'] = 'shoppingcart.php';
								?>
									<a href="login.php" class="btn btn-secondary btn-block mainfullbtncolor"> Check Out </a>
								<?php } ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="index.php" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div>
		

	</div>
	


<?php 

	require('frontendfooter.php');

?>