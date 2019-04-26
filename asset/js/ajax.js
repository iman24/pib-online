
function delete_ajax(id){
$.ajax({
url: "/action/delete/"+id,
type: "GET",
success: function(){
   
}
})
}


function load_data(){
    $.ajax({
        url: "/ajax/all",
        type: "GET",
        dataType: "json",
        beforeSend: function(){

             // Let's call it 2 times just for fun...
            $("#test").LoadingOverlay("show", {
                background  : "rgba(165, 190, 100, 0.5)"
            });
            $("#test").LoadingOverlay("show");

            // Here we might call the "hide" action 2 times, or simply set the "force" parameter to true:
            //$("#test").LoadingOverlay("hide", true);

        },
        success: function(html){
            html.forEach(function(id){
                $("#test").append(id.nama+"<br>");
            })
            $("#test").LoadingOverlay("hide", true);

        }

    })

    

}
$(document).ready(function(){
load_data();
});