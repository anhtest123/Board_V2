<div class="div_signup container"> 
    <form>
        <div class="card">
            <h5 class="card-header">회원가입</h5>

            <div class="card-body row">
                <div class="col-md-12" data-validate = "ID is required">
                    <label for="signupID" class="form-label">아이디</label>
                    <input type="id" class="form-control" id="signupID" required>
                    <div class="invalid-feedback">
                        ID is required
                    </div>
                </div>
                <div class="col-md-12" data-validate = "ID is required">
                    <label for="signupPW" class="form-label">비밀번호</label>
                    <input type="password" class="form-control" id="signupPW" required>
                </div>
                <div class="col-12" data-validate = "ID is required">
                    <label for="pwCheck" class="form-label">비밀번호 확인</label>
                    <input type="text" class="form-control" id="pwCheck" required>
                </div>
                <div class="col-12" data-validate = "ID is required">
                    <label for="nickname" class="form-label">닉네임</label>
                    <input type="text" class="form-control" id="nickname" required>
                </div>
                <div class="col-md-1">
                    <label for="gender" class="form-label">성별</label>
                    <select id="gender" class="form-select">
                        <option></option>
                        <option>남</option>
                        <option>여</option>
                    </select>
                </div>
                
            </div>   
            
            <div class="card-footer">
                <div class="col-12 justify-content-end">
                    <button type="submit" class="btn btn-success" id="button_signup">회원가입</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>  
    var input = $('.div_signup form .form-control');
    
    $('#button_signup').click(function(e)
    {
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
                console.log(check);
            }
        }

        if(check) signup_ajax(e)
    });


    $('.div_signup form .form-control').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'id') {
            if($(input).val().trim().match(/^[A-Za-z0-9_\-]{5,20}$/) == null) {
                console.log(input);
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        $(input).addClass('is-invalid');
    }

    function hideValidate(input) {
        $(input).removeClass('is-invalid');
    }
    
    function signup_ajax(e)
    {
        e.preventDefault();
        var form_data = {
            signupID: $('#signupID').val(),
            signupPW: $('#signupPW').val(),
            nickname: $('#nickname').val(),
            gender: $('#gender').val()
        };

        $.ajax({
            type: "POST",
            url: "/Signup",
            dataType: "json",   
            data : form_data,
            success: 
                function(data){
                    console.log(data);
                }        
        });

        
    }
    
</script>