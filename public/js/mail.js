$(document).on('click', ".ver_todo", function(){
   var todo = $(this).attr('id');
   $.ajax({
    url: "/" + todo + "/description",
    type: 'get',
    cache: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        todo: todo
    },
}).done(function (response) {
$(".description").html(response);
})
})
// DELETE TODO WITH AJAX CALL
$(document).on("click", "#delete", function (e) {
    e.preventDefault();
    if (!confirm("Do you really want to do this?")) {
        return false;
    }
    var todo = $(this).data("id");
    $.ajax({
        url: "/" + todo + "/delete",
        type: 'DELETE',
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            todo: todo
        }     
    }).done(function (response) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'TODO DELETED SUCCESSFULLY',
        })
        location.reload();
    })
});
// END DELETE TODO

// AÑADIR MAS CODIGOS PILOTOS
let i = 1;
$(document).on('click','.ad_code',function(e){
e.preventDefault();
 $("#add_more").append(
'<div class="form-group row" id ="nuevoCodigo'+i+'" >'+
 '<div class="col-sm-4">'+
     '<select  class="form-control form-control-sm input_border" id="codigoCliente'+i+'" name="codigoCliente" placeholder="Client code">'+
     '</select>'+
 '</div>'+
 '<div class="col-sm-2">'+
    '<i class="fas fa-trash eliminar_cod" id = "eliminar'+i+'"></i>'+
'</div>'+
'</div');
var options = $("#codigoCliente > option").clone();
$("#codigoCliente"+i).append(options);
i++
})
// ELIMINAR CUANDO SE HACE CLICK EN EL TRASH
$(document).on('click', ".eliminar_cod", function(){
  let id = $(this).attr('id');
  let ids = id.match(/\d+/)[0];
  $("#nuevoCodigo"+ids).fadeOut(500,function(){
    $(this).remove();
});
})
// FIN MAS CODIGOS PILOTO
// ENSEÑAR OCULTAR BOTONES EDIT DELETE
$(document).on('mouseenter', ".todo_table", function(){
    let id = $(this).attr('id');
    let ids = id.match(/\d+/)[0];
    $(".delete_"+ids).show();
    $(".edit_"+ids).show();
  })
  $(document).on('mouseleave', ".todo_table", function(){
    let id = $(this).attr('id');
    let ids = id.match(/\d+/)[0];
    $(".delete_"+ids).hide();
    $(".edit_"+ids).hide();
  })
//FIN ENSEÑAR OCULTAR BOTONES EDIT DELETE