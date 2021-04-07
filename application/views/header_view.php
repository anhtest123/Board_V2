<!doctype html>
<html lang="ko">
    <head>
        <title>Board_V2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/afc36b5dc6.js" crossorigin="anonymous"></script>
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="/css/main.css?ver=22">
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="wrapper">
        
        <header>
            <div class="container header">
                <div class="row"> 
                    <div class="col">
                        <span class="span_header-title mr-auto">코드이그나이터 기반 PHP 게시판: anhboard</span>
                    </div>
                    <div class="col justify-content-end">
                        <?php if($this->session->userdata('logged_in')) { ?>
                            <span class="span_header-menu">
                                <i class="fa fa-user"></i>
                                <a href="#">마이페이지</a>
                            </span>

                            <span class="span_header-menu">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <a href="/Login/logout">로그아웃</a>
                            </span>
                        <?php } else { ?>
                            <span class="span_header-menu">
                                <i class="fa fa-user"></i>
                                <a href="/Login">로그인</a>
                            </span>

                            <span class="span_header-menu">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <a href="/Signup">회원가입</a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            <div>
        </header>
        <!-- hearder_view END -->
