$(document).ready(function () {

    $("#submit").click(function (e) {
        e.preventDefault();
        const formData = new FormData();
        const files = $('#photo')[0].files;
        
        
        if(files.length > 0) {
            formData.append('photo', files[0]);

        $.ajax({
              url: 'upload.php',
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
            success: function (response) {
                if (response == 1) {
                    alert("File uploaded successfully");
                    $("ul").html(`<li id='success'>File uploaded successfully</li>`)
                }
                else {
                    
                    alert(response)
                    $("ul").html(`<li>${response}</li>`)
                }
                

                  
            }
            
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
