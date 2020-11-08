<?php 
    class UploadException extends Exception
    {
        public function __construct($code) {
            $message = $this->codeToMessage($code);
            parent::__construct($message, $code);
        }
    
        private function codeToMessage($code)
        {
            switch ($code) {
                case UPLOAD_ERR_INI_SIZE:
                    $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $message = "The uploaded file was only partially uploaded";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message = "No file was uploaded";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = "Missing a temporary folder";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = "Failed to write file to disk";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $message = "File upload stopped by extension";
                    break;
    
                default:
                    $message = "Unknown upload error";
                    break;
            }
            return $message;
        }
    }
    $whereToSave = "uploads";
    $allowed = ["jpg","jpeg","png","gif"];
    $files = scandir($whereToSave);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try {

            var_dump($_FILES);
            $mimeTypes = ["image/jpeg","image/png","image/jpg","image/gif"];
            // $whereToSave = "uploads";
            $fileName = $_FILES["photo"]["name"];
            $fileType = $_FILES["photo"]["type"];
            $fileTempStorage = $_FILES["photo"]["tmp_name"];
            $errorStatus = $_FILES["photo"]["error"];
            $fileSize = $_FILES["photo"]["size"];
            
            
            $filelimit = 1000000; //1MB;

            if($errorStatus !== 0){
                throw new UploadException($errorStatus);
            }

            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($fileInfo,$fileTempStorage);
            
            echo "<br/><br/>";
            var_dump($mimeType);
            echo "Lets see here...<br/><br/>";
            
            if(!in_array($mimeType,$mimeTypes)){
                throw new Exception('File format  unsupported');
            }

            if($fileSize > $filelimit){
                throw new Exception("File size too large");
            }

            $isUploaded = move_uploaded_file($fileTempStorage, "$whereToSave/$fileName");
            if(!$isUploaded){
                throw new Exception("Error in uploading to directory");
            }
            //die("file uploaded successfully");
            
        } catch(Throwable $t){
            die($t->getMessage());
        }
         catch (Exception $e) {
            // echo $e->getMessage();
            die($e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>
<body>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        header{
            margin: auto;
            text-align: center;
        }
        header > *{
            margin: 15px 0;
        }
        .inp-grp{
            margin: auto;
        }
        .inp-grp form{
            display: flex;
            align-items: flex-end;
            padding: 10px;
            width: 75%;
            margin: auto;
            box-shadow: 0 5px 8px rgb(220,220,220);
        }
        form>*{
            /* border: 1px solid brown; */
        }
        form>div:first-child{
            /* border: 1px solid brown; */
            width: 70%;
            margin-right: 30px;
        }
        input[type="file"]{
            border: 1px solid grey;
            width: 100%;
            outline: none;
        }
        button[type="submit"]{
            border: 2px solid white;
            padding: 5px;
            background-color: rgb(100,50,150);
            cursor: pointer;
            color: white;
        }
        .photo-grid{
            display: grid;
            grid-template-columns: repeat(4,1fr);
            grid-gap: 15px;
            width: 75%;
            margin: 30px auto;
            padding: 15px;
            box-shadow: 0 5px 8px rgb(220,220,220);
        }
        img{
            width: 100%;
            display: block;
            height: 100%;
        }
        .enlarged-photo-grid{
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(10,10,10,0.5);
            height: 100vh;
            display: none;
        }
        .enlarged-unique-img{
            width: 75%;
            height: 80%;
            margin: auto;
            border: 2px solid green;
        }
        footer{
            padding: 50px;
        }
        footer p{
            text-align: center;
        }
    </style>
    <div class="wrapper">
        <header>
            <h1>Galleria</h1>
            <h5>A simple way to share your photos with the public</h5>
        </header>
        <main>
            <section class="inp-grp">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="upload">
                        <label for="photo">Upload a new photo</label> <br/>
                        <input type="file" name="photo" placeholder="Select a new file" id="photo">
                    </div>
                    <div>
                        <button type="submit">Upload</button>
                    </div>
                </form>
            </section>
            <!-- A Loop to display each image in a grid-->
            <section class="photo-grid">
                    <?php foreach($files as $file): ?>
                    <?php $extension = substr($file,-3); ?>
                    <?php if(in_array($extension,$allowed)): ?>
                <figure class="unique-img">
                    <img src="<?php echo $whereToSave."/$file" ?>" alt="<?php echo $file ?>">
                </figure>
                <?php endif ?>
                <?php endforeach; ?>
            </section>
            <section class="enlarged-photo-grid">
                <figure class="enlarged-unique-img">
                    <img src="<?php echo $whereToSave."/$file" ?>" alt="<?php echo $file ?>">
                </figure>
            </section>
        </main>
        <footer>
           <p> &copy; Deyems 2020 </p> 
        </footer>
    </div>
</body>
<script>
    let figures = document.querySelectorAll(".unique-img");
    figures.forEach((figure) => {
        figure.addEventListener("click", (e) => {
            console.log("You tapped me");
            console.log(e.target);
        })
    })
</script>
</html>