<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';

</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<script>

$('#userForm').submit(function(e){
    e.preventDefault();

    let name =$("#name").val();
    let email =$("#email").val();
    let password =$("#password").val();
    let password_confirmation =$("#password-confirm").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "/admin/users",
        type:"POST",
        data:{
            name:name,
            email:email,
            password:password,
            password_confirmation:password_confirmation,
            _token:_token,
        },
        success :function(response){
            
            $("#add-category").modal('toggle');
            $("#success").addClass('alert alert-success').html(response.message).fadeIn('slow');
            $("#success").html(response.message).delay(5000).fadeOut('slow');
            $("#userForm")[0].reset();
            

        },
        error: function(response){
            $("#nameError").text(response.responseJSON.errors.name).addClass("text text-danger");
            $("#emailError").text(response.responseJSON.errors.email).addClass("text text-danger");
            $("#passwordError").text(response.responseJSON.errors.password).addClass("text text-danger");

        }

    });

});
$(".deleteUser").click(function(){
  var user = $(this).data('id');
  var modal = $(this).data('modal');
  var token = "{{csrf_token()}}";
  $.ajax({
     url:"/admin/users/"+user,
     type: 'DELETE',
     data:{
         "user"   :user,
         "_token" :token,
     },

     succsse :function(response){
            $("#success").addClass('alert alert-danger').html(response.message).fadeIn('slow');
            $("#success").html(response.message).delay(5000).fadeOut('slow');
            
           
     }
  });
});
</script>