$(document).ready(function () {

    $("#submit").click(function () {

        const formData = new FormData();
        const files = $('#photo')[0].files;
        
        
        if(files.length > 0) {
            formData.append('photo', files[0]);

        $.ajax({
              url: 'gallery.php',
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
            success: function (response) {
                  alert('file uploaded successfully');
                  
            },
            error: function (error) {
                alert('unable to unpload file');
            },
        });
           
        }else{
           alert("Please select a file.");
        }

    })



    const modal = document.getElementById("modal");
    const close = document.querySelector(".close");
    
    $('#modal').click(function (e) {
        if (e.target === modal) {
            $('#modal').css('visibility', 'Hidden');
        }
    })
    $('.close').click(function (e) {
        if (e.target === close) {
            $('#modal').css('visibility', 'Hidden');
        }
    })

    

})

const showModal = (photo) => {
    const modalcontent = document.querySelector(".modal-content");
    const image = `<img src= 'images/${photo}' />`;
    modalcontent.innerHTML = image;
    modal.style.visibility = 'visible';
}
