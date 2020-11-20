var W3CDOM = (document.createElement && document.getElementsByTagName);

function initFileUploads() {
    if (!W3CDOM) return;
    
    var add = document.getElementsByClassName(".add-image");
    add.on("click", function(){
        console.log("i am in")
        var fileUpload = document.getElementsByClassName(".file-input");
        var file = document.createElement('input');
        file.type="file";
        file.className="thefile"
        fileUpload.appendChild(file);
        file.click();
        console.log("clicked");
    });

}