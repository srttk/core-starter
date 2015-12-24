$(function(){

 	// Add Photo Validation
 	
 	$("#add-post-form").validate({
 		rules:{
 			"title":{"required":true},
 			'category':{"required":true},
 			"story":{"required":true},
 			"photo":{"required":true}
 		},
 		messages:{
 			"title":{"required":"Photo title required."},
 			"category":{"required":"category required"},
 			"story":{"required":"Year field required."},
 			"photo":{"required":"File required."}
 		}
 	});

 	// Delete Modal
 	$(".action-delete").on('click',function(){

 		var deleteid = $(this).data('post-id');
 		$('#deleteModal').modal('show');
 		$("#delete-id").val(deleteid);

 	});

 });