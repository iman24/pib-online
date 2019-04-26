$(document).ready(function(){/*
// Show full page LoadingOverlay
$.LoadingOverlay("show");

// Hide it after 3 seconds
setTimeout(function(){
    $.LoadingOverlay("hide");
}, 3000);

*/
$(".delete").each(function(i, e){
    $(e).on("click", function(ev){
    ev.preventDefault();
    var no = $(e).attr("no");
    alert(no);
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
      })
      
      swalWithBootstrapButtons.fire({
        allowOutsideClick: false,
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
          console.log(result);
        if (result.value) {
         delete_ajax(no);
         swalWithBootstrapButtons.fire({
          allowOutsideClick: false,
          title: 'Di Hapus',
          text: 'Data Telah terhapus',
          type: 'success',
          onAfterClose: function(){
              location.reload();
          }
        })
          
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            allowOutsideClick: false,
            title: 'Cancelled',
            text: 'Your imaginary file is safe :)',
            type: 'error',
            onAfterClose: function(){
                location.reload();
            }
          })
        
        }
      })
    });
});


});