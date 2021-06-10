$('#userForm').submit(function(e){
    e.preventDefault();

    let name =$("#name").val();
    let email =$("#email").val();
    let password =$("#password").val();
    let password_confirm =$("#password-confirm").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
        url: "/admin/users",
        type:"POST",
        _token:_token,
        data:{
            name:name,
            email:email,
            password:password,
            password_confirm:password_confirm
        },
        success:function(response){

        }

    });

});