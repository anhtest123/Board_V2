<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid div_navbar">
        <a class="navbar-brand" href="/">AnhBoard</a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown active" href="/Main/postsList/<?php echo array_search('HTML',BOARD_LIST)?>" id="navbarDropdownMenuLink1" role="button" aria-expanded="false">
                        클라이언트
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('HTML',BOARD_LIST)?>">HTML</a></li>
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('CSS',BOARD_LIST)?>">CSS</a></li>
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('Javascript',BOARD_LIST)?>">Javascript</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown active" href="/Main/postsList/<?php echo array_search('PHP',BOARD_LIST)?>" id="navbarDropdownMenuLink2" role="button" aria-expanded="false">
                        서버
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('PHP',BOARD_LIST)?>">PHP</a></li>
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('JAVA',BOARD_LIST)?>">JAVA</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown active" href="/Main/postsList/<?php echo array_search('MYSQL',BOARD_LIST)?>" id="navbarDropdownMenuLink3" role="button" aria-expanded="false">
                        데이터베이스
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('MYSQL',BOARD_LIST)?>">MYSQL</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdow active" href="/Main/postsList/<?php echo array_search('기타1',BOARD_LIST)?>" id="navbarDropdownMenuLink3" role="button" aria-expanded="false">
                        기타
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('기타1',BOARD_LIST)?>">기타1</a></li>
                        <li><a class="dropdown-item" href="/Main/postsList/<?php echo array_search('기타2',BOARD_LIST)?>">기타2</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="div_board container">
