$(document).on('click', '#forgot-password-btn', function (e) {
    e.preventDefault();
    var _token = token;
    if($('#email_forgot').val()==''){
        $('#email_forgot_error').html('Please enter your email or username').css({'color':'#FF0000','font-size':'14px','font-weight':'700'});
    }else{
        $('#email_forgot_error').html('');
        $.ajax({
            type:'POST',
            dataType:'json',
            data:$('#forgotForm').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/forgot-password',
            success:function(response){
                if(response.status=="true"){
                    swal({
                        title: "Done it!",
                        text: response.message,
                        type: "success"
                    });
                    $('#forgotForm')[0].reset();
                }else if(response.status=="error"){
                    $('#email_forgot_error').html('Please enter a valid email ID').css({'color':'#FF0000','font-size':'14px','font-weight':'700'}).show();
                }else{ 
                    swal({
                        title: "Error",
                        text: response.message,
                        type: 'error'
                    });
                }
            }
        });
    }
}); 

$(document).on('click', '#reset-password-btn', function (e) {
    e.preventDefault();
    var _token = token;
    var required = [];
    $('.required').each(function(){
        var id = $(this).attr('id');
        var id_text = id.replace(/_/g, ' ');
        if($('#'+id).val()==''){
            required.push($('#'+id).val());
            $('#'+id+'_error').html('Please enter '+id_text).css({'color':'#FF0000','font-size':'14px','font-weight':'700'});
        }else{
            $('#'+id+'_error').html('');
        }
    });
    if(required.length==0){
        $('.with-errors').html('');
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        if(password==confirm_password){
            $.ajax({
                type:'POST',
                dataType:'json',
                data:$('#reset-password-form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/reset-password',
                success:function(response){
                    if(response.status=="true"){
                        swal({
							title: "Done it!",
							text: response.message,
							type: "success"
						}, function() {
							window.location.href = base_url;
						});
                    }else{ 
                        swal({
                            title: "Error",
                            text: response.message,
                            type: 'error'
                        });
                    }
                }
            });
        }else{
            $('#confirm_password_error').html("Password doesn't seems match").css({'color':'#FF0000','font-size':'14px','font-weight':'700'});
        }
    }
});