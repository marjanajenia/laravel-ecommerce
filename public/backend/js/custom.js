jQuery(document).ready(function(){


	// jQuery(".catEdit").click(function(){
	// 	var catId=jQuery(this).val();
	// 	alert("ok");
	// });

	showAlldata();    
	function showAlldata(){
		$.ajax({
			url:'categoryshow',
			type:'GET',
			dataType:'json',
			success:function(result){
				var sl=1;
				$.each(result.data, function(key,item){
                     jQuery(".tbody").append('<tr>\
                               <td>'+sl+'</td>\
                               <td>'+item.name+'</td>\
                               <td>'+item.des+'</td>\
                               <td>'+item.tag+'</td>\
                               <td>'+item.status+'</td>\
                               <td>\
                                 <button class="btn btn-sm btn-info catEdit" data-toggle="modal" data-target="#editCategoryModel" value="'+item.id+'"><i class="fa fa-edit"></i></button> \
                               \
                                 <button class="btn btn-sm btn-danger catDelete" data-toggle="modal" data-target="#deleteCategoryModel" value="'+item.id+'"><i class="fa fa-trash"></i></button> \
                               </td>\
                           </tr>');
						   sl++;
				});				
			}
			

		});

	};
   

	jQuery(document).on('click','.catEdit', function(e){
       e.preventDefault();
       var catId=jQuery(this).val();
       $.ajax({
       	  url:'categoryedit/'+catId,
       	  type:'GET',
       	  dataType:'json',
       	  success:function(result){
       	  	if(result.error=="400"){
               jQuery(".modelmsg").append('<div class="alert alert-danger">'+result.error+'</div>');
       	  	}
       	  	else{
       	  		jQuery("#name").val(result.data.name);
       	  		jQuery("#des").val(result.data.des);       	  		
       	  		jQuery("#tag").val(result.data.tag);
       	  		jQuery("#stsVal").text(result.data.status);
       	  		jQuery("#stsVal").val(result.data.status);
				jQuery("#id").val(result.data.id);
       	  		// jQuery("#id").val(result.category.id);
       	  	}
       	  }
       });
	});

	jQuery(".addCategory").click(function(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		var name=jQuery(".name").val();
		var des=jQuery(".des").val();
		var tag=jQuery(".tag").val();
		var status=jQuery(".status").val();

		$.ajax({
			url:'categorystore',
			type:'POST',
			dataType:'json',
			data:{
				'name':name,
				'des':des,
				'tag':tag,
				'status':status				
			},
			'success':function(result){
                 if(result.status=="faild"){
                 	jQuery(".nameError").text(result.errors.name);
                 	jQuery(".desError").text(result.errors.des);
                 	jQuery(".tagError").text(result.errors.tag);             	
                 }
                 else{
                    showAlldata();
                 	jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
                 	jQuery(".msg").fadeOut(5000);
                 	jQuery("#addCategory").modal('hide');
                 	jQuery("#addCategory").find('input').val('');
                 	jQuery("#addCategory").find('textarea').val('');
                 }
			}
		});
		
	});

	
	// jQuery(document).on('click','.updateCategory', function(e){
 //       e.preventDefault();

 //        var catId=jQuery(this).val();

	// 	var name=jQuery(".name").val();
	// 	var des=jQuery(".des").val();
	// 	var tag=jQuery(".tag").val();
	// 	var status=jQuery(".status").val();

	// 	$.ajax({
	// 		url:'categoryupdate/'+catId,
	// 		type:'POST',
	// 		dataType:'json',
	// 		data:{
	// 			'name':name,
	// 			'des':des,
	// 			'tag':tag,
	// 			'status':status				
	// 		},
	// 		success:function(result){
	// 			message
	// 		}
			
	//     });  
 //    });

	jQuery(".updateCategory").click(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var name = jQuery("#name").val();
		var des = jQuery("#des").val();
		var tag = jQuery("#tag").val();
		var status = jQuery("#status").val(); 
		var id = jQuery("#id").val();
	//    var catId=jQuery(this).val();
		// alert(name); 
		$.ajax({
			url:'categoryupdate/'+id,
			type:'POST',
			dataType:'json',
			data:{
				'name':name,
				'des':des,
				'tag':tag,
				'status':status,
			},

			success:function(result){
				jQuery(".msg").append('<div class="alert alert-success">UPDATED SUCCESSFULLY CATEGORY</div>');
				jQuery(".msg").fadeOut(5000);
				showAlldata();
				jQuery("#editCategoryModel").modal('hide');
				jQuery("#editCategoryModel").find('input').val('');
				jQuery("#editCategoryModel").find('textarea').val('');
			}
		})

	});

	jQuery(document).on('click','.deleteCat',function(e){
	e.preventDefault();
	var catId = jQuery(this).val();
	var did = jQuery("#catiddddd").val(catId);
	});


    jQuery('.DeleteCategory').click(function(){
            var did = jQuery("#catiddddd").val();
            $.ajax({
                    url:'delete/'+did,
                    dataType:'json',
                    type:'GET',
                    success:function(result){
                        jQuery(".msg").append('<div class="alert alert-danger">'+result.message+'</div>');
                        jQuery(".msg").fadeOut(5000);
                        jQuery("#CategoryDeleteModal").modal('hide');
                        showAlldata();
                        
                    }
                   });
	});

//    vendor
	jQuery(".addVendor").click(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var name=jQuery(".name").val();
		var des=jQuery(".des").val();
		var off_addres=jQuery(".off_addres").val();
		var email=jQuery(".email").val();
		var phone=jQuery(".phone").val();
		var operatorName=jQuery(".operatorName").val();
		var operatorPhone=jQuery(".operatorPhone").val();
		var tin=jQuery(".tin").val();
		var tradeNum =jQuery(".tradeNum ").val();
		var status=jQuery(".status").val();

		$.ajax({
			url:'Vendorstore',
			type:'POST',
			dataType:'json',
			data:{
				'name':name,
				'des':des,
				'off_addres':off_addres,
				'email':email,
				'phone':phone,
				'operatorName':operatorName,
                'operatorPhone':operatorPhone,
				'tin':tin,
				'tradeNum':tradeNum ,
				'status':status				
			},
			'success':function(result){
				// if(result.status=="faild"){
				// 	jQuery(".nameError").text(result.errors.name);
				// 	jQuery(".desError").text(result.errors.des);
				// 	jQuery(".tagError").text(result.errors.tag);             	
				// }
				// else{
					// showAlldata();
					jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
					jQuery(".msg").fadeOut(5000);
					jQuery("#addCategory").modal('hide');
					jQuery("#addCategory").find('input').val('');
					jQuery("#addCategory").find('textarea').val('');
				
			}
		});
		
	});
});