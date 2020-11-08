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
    <link rel="stylesheet" href="style.css">
    <script src="mainscript.js" defer></script>
</head>
<body>
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

                <figure class="enlarged-unique-img">
                    <div><button class="close-btn">x</button></div>
                    <img src="<?php echo $whereToSave."/$file" ?>" alt="<?php echo $file ?>">
                </figure>
                
                <?php endif ?>
                <?php endforeach; ?>
            </section>

            <!-- <section class="enlarged-photo-grid">
            <?php //foreach($files as $file): ?>
                    <?php //$extension = substr($file,-3); ?>
                    <?php //if(in_array($extension,$allowed)): ?>
                <figure class="enlarged-unique-img">
                    <img src="<?php //echo $whereToSave."/$file" ?>" alt="<?php //echo $file ?>">
                </figure>
                <?php //endif ?>
                <?php //endforeach; ?>
            </section> -->
        </main>
        <footer>
           <p> &copy; Deyems 2020 </p> 
        </footer>
    </div>
</body>
</html>