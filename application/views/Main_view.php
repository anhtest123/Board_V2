    <!-- <div class="div_main container"> -->
        <div class="row">
            <!-- Main -->
            <div class="col">
                <img src="/images/anh_main.png" alt="main" style="width:847.5px">

                <div class="row">
                    <?php for($j=0;$j<8;$j++) { ?>
                    <div class="col-6 board_small">
                            <div class="board_small_title">
                                <?php echo BOARD_LIST[$j] ?>

                                <div class="pull_right ms-auto">
                                    <a href="/Main/postsList/<?php echo array_search(BOARD_LIST[$j],BOARD_LIST)?>">더보기 > </a>
                                </div>  
                            </div>

                            <blockquote class="blockquote mb-0">
                                <table class="board_small_list">
                                    <colgroup>
                                        <col width="80%"> <!-- 게시물 제목 -->
                                        <col width="20%"> <!-- 날짜 -->
                                    </colgroup>

                                    <tbody>
                                        <?php for($i=0;$i<4;$i++) { 
                                            if(count(${BOARD_LIST[$j]})>$i) {    
                                        ?>
                                            <tr>
                                                <td><a href="/Main/postView/<?php echo array_search(BOARD_LIST[$j],BOARD_LIST)?>/<?php echo ${BOARD_LIST[$j]}[$i]['postID'] ?>"><?php echo ${BOARD_LIST[$j]}[$i]['subject'] ?></a></td>
                                                <td><?php echo date('m-d', strtotime(${BOARD_LIST[$j]}[$i]['date'])) ?></td>
                                            </tr>
                                        <?php } else {?>
                                            <tr>
                                                <td>게시물이 없습니다.</a></td>
                                                <td></td>
                                            </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </blockquote>
                    </div>
                    <?php } ?>
                </div>
                <!-- side-bar-start -->