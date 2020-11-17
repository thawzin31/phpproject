

$(document).ready(function(){
	showdata();
	count();
	$('.add_to_cart').click(function(){
			//alert('ok');
		
			var id=$(this).data('id');
			console.log(id);
			var codeno=$(this).data('codeno');
			console.log(codeno);
			var name=$(this).data('name');
			console.log(name);
			var photo=$(this).data('photo');
			console.log(photo);
			var price=$(this).data('price');
			console.log(price);
			var discount=$(this).data('discount');
			console.log(discount);
			var description=$(this).data('description');
			console.log(description);

			var qty=1;
			
			var item={
				id:id,
				codeno:codeno,
				name:name,
				photo:photo,
				price:price,
				discount:discount,
				description:description,
				qty:qty

			}
			var itemlist=localStorage.getItem('item');
			console.log(itemlist);

			var itemArray;
			if (itemlist==null) 
			{
				itemArray=[]
			}
			else
			{
				itemArray=JSON.parse(itemlist);
			}

			var status=false;
			$.each(itemArray,function(i,v){
				if (id==v.id) 
				{
					v.qty++;
					status=true;
				}
			})

			if (!status) 
			{
				itemArray.push(item);
			}
			var itemstring=JSON.stringify(itemArray);
			console.log(itemstring);
			localStorage.setItem("item",itemstring);

			count();
			showdata();
		
	})

	function count(){
		var noti=0;
		var itemlist=localStorage.getItem('item');
		if(itemlist){
			itemArray=JSON.parse(itemlist);
			//noti=itemArray.length;
			//console.log(noti);
			$.each(itemArray,function(i,v){
				noti+=v.qty;
			})

			$("#cart").html(noti);

		}
	}

	function showdata()
	{
		var itemlist=localStorage.getItem('item');
		if (itemlist)
		{
			var itemArray=JSON.parse(itemlist);

			
				var html="";
				var mytfoot="";
				var total=0;
				$.each(itemArray,function(i,v){
					if(v)
					{
						var id=v.id;
						var codeno=v.codeno;
						var name=v.name;
						var price=v.price;
						var discount=v.discount;
						var photo=v.photo;
						var qty=v.qty;

						if (discount) 
						{
							var unit=discount;
							
						}

						else
						{
							var unit=price;
							
						}
						var subtotal=unit*qty;
						
						html+=`<tr>
						<td>
							<button class="btn btn-outline-danger remove btn-sm"  data-id="${i}"> 
							<i class="icofont-close-line"></i> 
						</button> 
						</td>
						<td>
							<img src="${photo}" class="img-fluid" style="width:50px; height:50px;">
						</td>
						<td> 
							<p> ${name} </p>
							<p> ${codeno}</p>
						</td>
						<td>
							<button class="btn btn-outline-secondary plus_btn" data-id="${i}">
								<i class="icofont-plus"></i> 
							</button>
						</td>
						<td>
							<p> ${qty} </p>
						</td>
						<td>
							<button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
								<i class="icofont-minus"></i>
							</button>
						</td>
						<td>`;
						if(discount>0)
						{
							html+=`<p class="text-danger"> 
									${discount} ks
								</p>
								<p class="font-weight-lighter"> 
								<del> ${price} ks</del> </p>`;
						}else{
							html+=`<p class="text-danger"> ${price} ks</p>`;
						}
							
				html+=`</td>
						<td>
							<p>${subtotal}</p>
						</td>
						</tr>`;

						$('#shoppingcart_table').html(html);
					}

					 total+=subtotal++;
				})
				
			mytfoot+=`<tr>
							<td colspan="8">
								<h3 class="text-right"> Total : ${total} </h3>
							</td>
					</tr>
					<tr> 
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn" data-total=${total}> 
									Check Out 
								</button>
							</td>
						</tr>`
					$('#shoppingcart_tfoot').html(mytfoot);
		}
		$("#amout").html(total+'Ks')
	}

	 $('tfoot').on("click",".checkoutbtn",function(){
	 	//alert('ok')
		 var note=$('#notes').val();
		 console.log(note);
		// var total=$(this).data('total');
		 var itemlist=localStorage.getItem("item");
		 var itemArray=JSON.parse(itemlist);

		 var total=0;
		 $.each(itemArray,function(i,v){
		 	var price=v.price;
			var discount=v.discount;
			var qty=v.qty; 

			if (discount) 
			{
				var unit=discount;
							
			}

			else
			{
				var unit=price;
							
			}
			var subtotal=unit*qty;
			total+=subtotal++;
		 })
		 	//console.log(total);
		 $.post('storeorder.php',{
		 	item: itemArray,
		 	notes: note,
		 	total: total
		 },function(response){
		 	//console.log(response);

		 	localStorage.clear();
		 	location.href="ordersuccess.php";
		 });
	 })

	$("tbody").on("click",".remove",function(){
				//alert('ok');
		var id=$(this).data("id");
		var itemlist=localStorage.getItem("item");
		var itemArray=JSON.parse(itemlist);
		itemArray.splice(id,1);
		var itemstring=JSON.stringify(itemArray);
		localStorage.setItem("item",itemstring);
		showdata();
		count();
	})

	$("tbody").on("click",".plus_btn",function(){
		//alert('ok');
				
		var id=$(this).data("id");
				
		var itemlist=localStorage.getItem("item");
		var itemArray=JSON.parse(itemlist);
		
		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty++;
			}
		})
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			count();
	})

	
	$("tbody").on("click",".minus_btn",function(){
		//alert('ok');
				
		var id=$(this).data("id");
				
		var itemlist=localStorage.getItem("item");
		var itemArray=JSON.parse(itemlist);
				

		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty--;
				if(v.qty<=0)
				{
					itemArray.splice(id,1);
				}
			}
		})
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			count();
	})



	// for order Detail(show detail)

	$('.orderDetail').click(function(){
	//alert('ok');
		var id=$(this).data('id');
		var orderdate=$(this).data('orderdate');
		var voucherno=$(this).data('voucherno');
		var total=$(this).data('total');
		//var status=$(this).dat('status');

		console.log(id);

		$.post('getorderdetail.php',{
			id:id,
		},function(response){
			console.log(response);

			var orderdetails=JSON.parse(response);

			var shoppingcartData='';

			shoppingcartData+=`<div>`;

			$.each(orderdetails,function(i,v){
				var id=v.id;
				var codeno=v.codeno;
				var name=v.name;
				var price=v.price;
				var discount=v.discount;
				var photo=v.photo;
				var qty=v.qty;

			if (discount) 
			{
				var unit=discount;
							
			}

			else
			{
				var unit=price;
							
			}
			var subtotal=unit*qty;
			
			shoppingcartData += `<tr> 
										<td> 
											<img src="${photo}" class="cartImg">
										</td>
										<td>
											<p> ${name} </p>
											<p> ${codeno} </p>
										</td>
										<td>
											<p> ${qty} </p>
										</td>
										<td>`; 
				if (discount > 0) {
					shoppingcartData += `<p class="text-danger"> 
											${discount} Ks
										</p>
										<p class="font-weight-lighter">
											<del> ${price} Ks </del>
										</p>
										`;
				}
				else{
					shoppingcartData += `<p class="text-danger"> 
											${price} Ks
										</p>`;
				}

				shoppingcartData+=`</td>
									<td> 
										<p> ${subtotal} Ks </p> 
									</td>
								</tr>`;
				total += subtotal ++;
			});

			$('#orderDetail').html(shoppingcartData);

		})

	 	$('#invoiceNo').html(voucherno);
        $('#dateNo').html(orderdate);

        if (status == "Order") {
        	statusBadge = '<h5> <span class="badge badge-warning">'+status+'</span> </h5>';
        	$('#orderStatus').html(statusBadge);
        }
        else if (status == "Confirm") {
        	statusBadge = '<h5> <span class="badge badge-success">'+status+'</span> </h5>';
        	$('#orderStatus').html(statusBadge);
        }
        else if (status == "Cancel") {
        	statusBadge = '<h5> <span class="badge badge-danger">'+status+'</span> </h5>';
        	$('#orderStatus').html(statusBadge);
        }
        else{
        	statusBadge = '<h5> <span class="badge badge-primary">'+status+'</span> </h5>';
        	$('#orderStatus').html(statusBadge);
        }
        $('#invoiceTotal').html(total);
        $('#orderTotal').html(total);


        $('#detailModal').modal('show');
	})

	//for profile data in profile.php 
	$('.profile_editBtn').show();
	$('.profile_cancelBtn').hide();

	$('.profile_editBtn').click(function(){
		//alert('ok');
		$("fieldset").removeAttr("disabled");
		$("#imageUpload").removeAttr("disabled");

		$('.profile_editBtn').hide();
		$('.profile_cancelBtn').show();

	})

	$('.profile_cancelBtn').on('click',function(){
		//alert('ok');
		$('#imageUpload').prop('disabled',true);
		$('fieldset').prop('disabled',true);

		$('.profile_editBtn').show();
		$('.profile_cancelBtn').hide();
	})

	function readURL(input){
		if (input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#imagePreview').css('background-image','url('+e.target.result+')');
				$('#imagePreview').hide();
				$('#imagePreview').fadeIn(650);
			}

			reader.readAsDataURL(input.files[0]);
			console.log('preview');	
		}

		console.log(input.files);
	}

	$('#imageUpload').change(function(){
		readURL(this);
	})


	//password=confirmpassword

	 $('#inputPassword').change(function ()
    {
        var password=$(this).val();
        console.log(password.length);

        if(password.length > 8)
        {
        	$('#error').html(`<span class="text-danger">* Password shouldn't exceed eight digit</span>`);
        }
    });


    $('#inputConfirmPassword').change(function () 
    {
        var cpassword = $(this).val();
        var password = $("#inputPassword").val();


        if(password!=cpassword)
        {
          	$('#cerror').html(`<span class="text-danger">* Confirm Password don't match!</span>`);
        }
        else{
          	$('#cerror').html();
          	$('#cerror').html(`<span class="text-success">* Confirm Password match!</span>`);

        }
    });
    



})



