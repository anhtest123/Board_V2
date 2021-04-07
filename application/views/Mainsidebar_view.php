        </div>
        <!-- Main-side-bar-->
            <div class="col">
                <div class="sidebar">
                <?php if($this->session->userdata('logged_in')) { ?>
                    <div id="form_login_sidebar">
                        <h3><?php echo $this->session->userdata('nickname') ?>님 환영합니다.</h3>
                        
                        <span><a href="#">마이페이지</a></span>
                        <span> | </span>
                        <span><a href="/Login/logout">로그아웃</a></span>
                    </div>
                <?php } else { ?>
                    <form id="form_login_sidebar">
                        <h3>로그인</h3>

                        <input type="text" class="ID" placeholder="ID" id="loginID">
                        <input type="password" class="password" placeholder="password" id="loginPW" require>

                        <button class="btn btn-outline-primary btn-sm">로그인</button>
                        
                        <span><a href="/Signup">회원가입</a></span>
                        <span> | </span>
                        <span><a href="#">회원정보찾기</a></span>
                    </form>
                <?php } ?>
                    <div class="div_Recent-Posts">
                        <h3>최근 게시물</h3>

                        <ul class="ul_REcent-Posts">
                            <?php foreach ($list as $key => $value): ?>
                                <li><a href="/Main/postView/<?php echo array_search($value['boardName'],BOARD_LIST)?>/<?php echo $value['postID'] ?>"><?php echo $value['subject'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="div_Comments">
                        <h3>최근 댓글</h3>  

                        <ul class="ul_Comments">
                            <li>최근 댓글1</li>
                            <li>최근 댓글2</li>
                            <li>최근 댓글3</li>
                            <li>최근 댓글4</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#form_login_sidebar button').click(function(e){
        e.preventDefault();

        login_ajax();
    });

    function login_ajax()
    {
        var form_data = {
            loginID: $('#loginID').val(),
            loginPW: $('#loginPW').val()
        };

        $.ajax({
            type: "POST",
            url: "/Login",
            dataType: "json",   
            data : form_data,
            success: 
                function(data){
                    if(data.validation_result == 'Login Fail')
                    {
                        alert(data.guide_text);
                    }
                    else
                    {
                        window.location.replace('./');
                    }
                }  

        });
    }
</script>