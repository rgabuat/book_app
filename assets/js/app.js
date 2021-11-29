$(document).ready(function(){
// console.log('test');


$('a#editBtn').on('click',function(){
    var id = $(this).attr('data-id');
    var action = $(this).attr('data-action');
    $.ajax({
        url:'./controller/author.controller.php',
        type:'POST',
        dataType:'text',
        data:{id:id,action:action},
        success:function(data)
        {
            var result = JSON.parse(data);
            console.log(result.name);
            $('#editModal').modal('show'); 
            $('#title').text(action);
            $('#action').val('update');
            $('#editId').val(id);
            $('#authorName').val(result.name);
        }
    });

    
});

$('a#delBtn').on('click',function(){
    var  id = $(this).attr('data-id');
    var action = $(this).attr('data-action');
    var html ='';

    html += '<h2 class="text-danger text-center">';
    html += '<span class="material-icons me-3">warning</span>'
    html += 'Confirm to Delete author';
    html += '</h2>';

    $('#editModal').modal('show'); 
    $('#title').text(action);
    $('#action').val(action);
    $('#editId').val(id);
    $('#editContainer').hide();
    $('#authorName').removeAttr('required');
    $('#alert').html(html);

    // $.ajax({
    //     url:'./controller/author.controller.php',
    //     type:'POST',
    //     dataType:'text',
    //     data:{id:id,action:action},
    //     success:function(data)
    //     {
    //         var html ='';

    //         html += '<h2 class="text-danger text-center">';
    //         html += '<span class="material-icons me-3">warning</span>'
    //         html += 'Confirm to Delete author';
    //         html += '</h2>';

    //         console.log(data);
    //         $('#editModal').modal('show'); 
    //         $('#title').text(action);
    //         $('#action').val('deleteId');
    //         $('#editId').val(id);
    //         $('#editContainer').hide();
    //         $('#authorName').removeAttr('required');
    //         $('#alert').html(html);
    //     }
    // });

   
});

$('#editprofile').on('click',function(){
    $(this).hide();
    $('#profileform').removeClass('d-none');
});

function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image-preview').attr('src', e.target.result);
        $('#image-preview').hide();
        $('#image-preview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#file-input").change(function() {
    readURL(this);
  });
  

$('.navbar-toggler').on('click',function(){
    $('#sidebar-container').removeClass('d-none');
});

$('#close').on('click',function(){
    $('#sidebar-container').addClass('d-none');
});

$('#booksTable').DataTable({
    responsive: true
});
$('#accountsTable').DataTable({
    responsive: true
});
$('#logsTable').DataTable({
    responsive: true
});
$('#topBooks').DataTable({
    responsive: true
});
$('#topBorrower').DataTable({
    responsive: true
});

$('#authorsTable').DataTable({
    responsive: true
});


});