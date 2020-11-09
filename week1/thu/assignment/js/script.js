$(document).ready(function(){
    $("#submitForm").on("change", function(){
       var formData = new FormData(this);
       $.ajax({
          url  : "upload.php",
          type : "POST",
          cache: false,
          contentType : false, // you can also use multipart/form-data replace of false
          processData: false,
          data: formData,
          success:function(data){
            alert(data);
            load_images();
            $("#image").val('');
          },
          error:function(data){
            alert(data);
            load_images();
          }
       });
    });

    load_images();

    function load_images(){
        $.ajax({
            url  : "load.php",
            method : "GET",
            success:function(response){
                if($.trim(response)){
                    $(".gallery").html(response);}
                
            }
         });
    }
        
    $(".gallery").on('click', "img", function(event){
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        // Get the <span> element that closes the modal
        
    });
      
 });