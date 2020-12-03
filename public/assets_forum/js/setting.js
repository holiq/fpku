$(document).ready(function(){
  $('#editor_forum').summernote({
    height:'250px',
    callbacks: {
      onImageUpload: function(image) {
        uploadImage(image[0]);
        console.log(image[0]);
      },
      onMediaDelete: function(target) {
        deleteImage(target[0].src);
      }
    }
  });
});
function uploadImage(image) {
  var data = new FormData();
  data.append("file", image);
  $.ajax({
    url: 'summernote_upload.php',
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: "post",
    success: function(url) {
      var image = $('<img>').attr('src', url).addClass('imdis');
      $('#editor_forum').summernote("insertNode", image[0]);
    },
    error: function(data) {
      console.log(data);
    }
  });
}
function deleteImage(src) {
  $.ajax({
    data: {src : src},
    type: "POST",
    url: "summernote_delete.php",
    cache: false,
    success: function(response) {
      console.log(response);
    }
  });
}
$(document).ready(function(){
	$('input[type="file"]').on("change", function(){
		let filenames = [];
		let files = document.getElementById("customFile").files;
		for (let i in files){
			if (files.hasOwnProperty(i)){
				filenames.push(files[i].name);
			}
		}
		$(this).next(".custom-file-label").html(filenames.join(","));
	});
});
function validateForm() {
  var a = $("#nama").val();
  var b = $("#pw").val();
  if (a.length > 20) {
    alert("Nama tidak boleh lebih dari 20 karakter");
    return false;
  }
  if(a.length < 5) {
    alert("Nama harus lebih dari 5 karakter");
    return false;
  }
  if (b.length < 6) {
    alert("Password harus lebih dari 6 karakter");
    return false;
  }
}
function pwForm() {
  var a = $("#pass").val();
  var b = $("#passc").val();
  if (a.length < 6 || b.length < 6) {
    alert("Password harus lebih dari 6 karakter");
    return false;
  }
  if(a !== b){
    $("#gasama").css("display", "block");
    return false;
  }
}
$(document).ready(function(){
  $(document).on( 'focus', ':input', function(){
    $(this).attr( 'autocomplete', 'off' );
  });
});
$('.input').each(function(){
  $(this).on('blur', function(){
    if($(this).val().trim() != "") {
      $(this).addClass('inad');
    }else{
      $(this).removeClass('inad');
    }
  });
});