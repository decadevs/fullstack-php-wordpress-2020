
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iGallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    
</head>
<body >
    <header>
        <h1 id="title">iGallery</h1>
        <div class="lead header-lead gara">A simple way to share your photos with the public</div>
    </header>
    <section id="upload-section" class="container">
        <form id="submitForm">
            <div class="form-group">
                <div class="custom-file upload mb-5">
                    <input type="file" class="custom-file-input" name="photo" id="image">
                    <label class="custom-file-label" for="photo">Choose Image to Upload</label>
                </div>
            </div>
        </form>
    </section>
        <!-- view of uploaded images -->
    <div class="row">
    <div class="col-md-4"></div>  
        <div class="card col-md-4" id="preview" style="display: none;">
        <div class="card-body" id="imageView">
                
        </div>
    </div>    
    </div>
    <h4 class="gara">Latest Photos</h4>
    <section id="gallery-section">
        <div id="imageView" class="gallery">
            <span id="empty-text" class="container ">No photo in the gallery, Click upload to Add..</span>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
    </section>
    
    <script src="../js/script.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Get the modal
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var modal = document.getElementById("myModal");

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
    }
</script>
</body>
</html>