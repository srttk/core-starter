console.log("Photogallery.js");
	

	function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("preview-photo").src = oFREvent.target.result;
        };
    };

 $(function(){

 	// Add Photo Validation
 	
 	$("#add-photo-form").validate({
 		rules:{
 			"title":{"required":true},
 			"year":{"required":true},
 			"photo":{"required":true}
 		},
 		messages:{
 			"title":{"required":"Photo title required."},
 			"year":{"required":"Year field required."},
 			"photo":{"required":"File required."}
 		}
 	});

 	// Edit photo
 	$("#edit-photo-form").validate({
 		rules:{
 			"title":{"required":true},
 			"year":{"required":true}
 		},
 		messages:{
 			"title":{"required":"Photo title required."},
 			"year":{"required":"Year field required."}
 		}
 	});

 	// Delete Modal
 	$(".action-delete").on('click',function(){

 		var deleteid = $(this).data('photo-id');
 		$('#deleteModal').modal('show');
 		$("#delete-id").val(deleteid);

 	});

 	// Filter Year Select
 	$("#filter-year").on("change",function(){

 	var selectedYear = $(this).val();
 		window.location.href = "photo-gallery.php?year="+selectedYear;

 	});

 });

