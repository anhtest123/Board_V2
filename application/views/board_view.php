<div>
    <div class="div_board container">
        <div class="row">
            <!-- board -->
            <div class="col">
                <div class="board">
                    <!-- 게시판 제목 -->
                    <h3><?php echo $board_name ?></h3>

                    <!-- 검색 -->
                    <div class="container-fluid">
                        <form class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>

                    <!-- 게시글 목록 -->
                    <table class="table_board">
                        <colgroup>
                            <col width="8%"> <!-- 게시물 제목 -->
                            <col width="50%"> <!-- 제목 -->
                            <col width="17%"> <!-- 글쓴이 -->
                            <col width="12%"> <!-- 날짜 -->
                            <col width="13%"> <!-- 조회수 -->
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>글쓴이</th>
                                <th>날짜</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><a href="#"><?php echo $value['subject'] ?></a></td>
                                <td><?php echo $value['writer'] ?></td>
                                <td><?php echo date('y-m-d', strtotime($value['date'])) ?></td>
                                <td><?php echo $value['hit'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <!-- 글쓰기 버튼 -->
                    <div class="container div_write">
                        <ul class="justify-content-end">
                            <a class="button_write btn btn-success" href="/Main/postWrite">글쓰기</a>
                        </ul>
                    </div> 

                    <!-- 페이징 -->
                    <div class="container">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <button class="page-link" value="1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </button>
                            </li>

                            <li class="page-item"><button class="page-link" value="1">1</button></li>
                            <li class="page-item"><button class="page-link" value="2">2</button></li>
                            <li class="page-item"><button class="page-link" value="3">3</button></li>
                            <li class="page-item"><button class="page-link" value="4">4</button></li>
                            <li class="page-item"><button class="page-link" value="5">5</button></li>

                            <li class="page-item">
                                <button class="page-link" value="6" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- board_veiw javascript -->
            <script>
                
                $('.page-link').click(function(){
                    // 페이징 - 게시글 출력
                    var form_data = {
                        page: $(this).val(), //페이지번호
                        board_no: <?php echo $this->uri->segment(3,'0') ?> //게시판 번호
                    };
                    
                    load_posts_ajax(form_data); //게시글 불러오기

                    // 페이징 - 페이징 ui
                    var form_data = {
                        page: $(this).val(),
                        board_no: <?php echo $this->uri->segment(3,'0') ?>
                    };
                });
                
                // ajax로 게시글 불러오기 
                function load_posts_ajax(form_data)
                {
                    $.ajax({
                        type: "POST",
                        url: "/Main/pagination",
                        dataType: "json",   
                        data : form_data,
                        success: 
                            function(data){
                                var result='', tag;
                                for(var i=0;data.length>i;i++)
                                {
                                    tag ='<tr><td>'+data[i].id+'</td><td><a href="#">'+data[i].subject+'</a></td><td>'+data[i].writer+'</td><td>'+to_date2(data[i].date)+'</td><td>'+data[i].hit+'</td></tr>';
                                    result += tag;
                                }
                                $('.table_board tbody').html(result);
                            }  

                    });
                }

                //  ajax로 페이지 ui 불러오기
                function load_pagination_ui_ajax(form_data)
                {
                    $.ajax({
                        type: "POST",
                        url: "/Main/pagination",
                        dataType: "json",   
                        data : form_data,
                        success: 
                            function(data){
                                var result='', tag;
                                for(var i=0;data.length>i;i++)
                                {
                                    tag ='';
                                    result += tag;
                                }
                                $('.table_board tbody').html(result);
                            }  

                    });
                }

                // 날짜 형식 변환
                function to_date2(date_str)
                {
                    var yyyyMMdd = String(date_str);
                    var sYear = yyyyMMdd.substring(2,4);
                    var sMonth = yyyyMMdd.substring(5,7);
                    var sDate = yyyyMMdd.substring(8,10);

                    return sYear+'-'+sMonth+'-'+sDate;
                }

            </script>
            <!-- side-bar-start -->
