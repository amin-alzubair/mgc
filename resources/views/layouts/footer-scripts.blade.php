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
        /*user opertions  */
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
                    $("#success-modal").modal('show').find('.text-success').text(response.message);
                    $("#success").html(response.message).delay(5000).fadeOut('slow');
                    $('#myTable > tbody:last-child').append('<tr>'+'<th>'+response.user.id+'</th>'+'<td>'+response.user.name+'</td>'+'<td>'+response.user.email+'</td><button class="btn btn-danger"><i class="fa fa-times"></i></button></td>'+'</tr>');
                    $("#userForm")[0].reset();
                    closeModal('#success-modal');
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
        var token = "{{csrf_token()}}";
        $.ajax({
            url:"/admin/users/"+user,
            type: 'DELETE',
            data:{
                "user"   :user,
                "_token" :token,
            },

            success :function(response){
                $("#delete-user-"+user).modal('toggle');
                $("#success-modal").modal('show').find('.text-success').text(response.message);
                $("#tr-"+user).remove();
                closeModal('#success-modal');
                    
                
            }
        });
        });
        function closeModal(modalId){
            setTimeout(() => {
                $(modalId).modal('hide');
            }, 5000);
        }

        //Student opretions

</script>

<script>
   $('#studenForm').submit(function(e){
            e.preventDefault();

            let studentName =$("#name").val();
            let phoneNumber =$("#phoneNumber").val();
            let email =$("#email").val();
            let stage =498998;
            let _token = "{{csrf_token()}}";

            $.ajax({
                url:"{{route('student.store')}}",
                type : "POST",
                data:{
                    name : studentName,
                    phone_number : phoneNumber,
                    email : email,
                    stage : stage,
                    _token : _token,

                },

                success:function(response){
                    $("#add-category").modal('toggle');
                    $("#success-modal").modal('show').find('.text-success').text(response.message);
                    $("#success").html(response.message).delay(5000).fadeOut('slow');
                    $("#studenForm")[0].reset();
                    closeModal('#success-modal');
                },
                error: function(response){
                    $("#nameError").text(response.responseJSON.errors.name).addClass("text text-danger");
                    $("#emailError").text(response.responseJSON.errors.email).addClass("text text-danger");
                    $("#phoneError").text(response.responseJSON.errors.phone_number).addClass("text text-danger");

                }
            });


        });

        $(".deleteStudent").click(function(){
        var student = $(this).data('id');
        var token = "{{csrf_token()}}";
        $.ajax({
            url:"/student/destroy/"+student,
            type: 'DELETE',
            data:{
                "student"   :student,
                "_token" :token,
            },

            success :function(response){
                $("#delete-student-"+student).modal('toggle');
                $("#success-modal").modal('show').find('.text-success').text(response.message);
                $("#tr-"+student).remove();
                closeModal('#success-modal');
                    
                
            }
        });
        });

</script>