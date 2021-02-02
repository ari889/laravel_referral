(function($){
    $(document).ready(function(){

        /**
         * select package
         */
        $(document).on('click', '#select-package', function(e){
            e.preventDefault();
            let package_name = $(this).data('package_name');
            let referral_id = $(this).data('referral_id');
            let csrf = $(this).data('csrf');
            $.ajax({
               url: '/packages/create',
                method: 'POST',
                data: {'package_name' : package_name, 'referral_id' : referral_id, '_token': csrf},
                success: function(data){
                   window.location.href = data;
                }
            });
        });


        /**
         * change password
         */
        $(document).on('submit', '#change-password', function(e){
           e.preventDefault();
           let user_id = $(this).data('user_id');
           let csrf = $(this).data('csrf');
           let old_password = $('#change-password input[name="old_password"]').val();
           let new_password = $('#change-password input[name="new_password"]').val();
           let confirm_password = $('#change-password input[name="confirm_password"]').val();
           let is_login;
           // if($('#change-password input[name="check"]').is(":checked")){
           //      is_login = true;
           // }else{
           //     is_login = false;
           // }
           if(old_password === '' || new_password === '' || confirm_password === ''){
               $('#change-password .message').html('<div class="alert alert-danger"><strong>Stop!</strong> Field must not be empty. <button class="close" type="button" data-dismiss="alert">&times;</button></div>');
           }else if(new_password.length < 8){
               $('#change-password .message').html('<div class="alert alert-danger"><strong>Stop!</strong> New password must be 8 character. <button class="close" type="button" data-dismiss="alert">&times;</button></div>');
           }else{
               $.ajax({
                   url: 'password/change',
                   method: 'POST',
                   data: {'user_id' : user_id, '_token': csrf, 'old_password' : old_password, 'new_password' : new_password, 'confirm_password' : confirm_password},
                   success: function(data){
                       $('#change-password .message').html(data);
                       // if(is_login == true){
                       //     $('#change-password .message').html(data);
                       // }else{
                       //     window.location.href = data;
                       // }
                   }
               });
           }
        });

        /**
         * change name
         */
        $(document).on('submit', '#name-change', function(e){
            e.preventDefault();
            let first_name = $('#name-change input[name="first_name"]').val();
            let last_name = $('#name-change input[name="last_name"]').val();
            let csrf = $(this).data('csrf');
            if(first_name == '' || last_name == ''){
                $('#name-change .message').html('<div class="alert alert-danger"><strong>Danger!</strong> All fields are requred. <button class="close" data-dismiss="alert" type="button">&times;</button></div>');
            }else{
                $.ajax({
                    url: 'name/change',
                    method: 'POST',
                    data: {'first_name' : first_name, 'last_name' : last_name, '_token' : csrf},
                    success: function(data){
                        $('#name-change .message').html(data);
                    }
                });
            }
        });

        /**
         * copy referrel id
         */
        $(document).on('click', '#copy-link', function(e){
            e.preventDefault();
            let copy_text = $('#copy-text').val();
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val(copy_text).select();
            document.execCommand("copy");
            $temp.remove();
            $(this).text('Copied');
            $(this).attr('disabled', true);
        });

        /**
         * live user registration data
         */
        allUsers();
        function allUsers(){
            let csrf = $('#live-register').data('csrf');
            $.ajax({
               url: 'register/getallusers',
                method: 'POST',
                data: {'_token': csrf},
                success: function(data){
                    $('#live-register').text(data);
                }
            });
        }
        setInterval(allUsers, 7000);

    });
})(jQuery)
