    <!-- <div class="div_board container"> -->
        <div class="row">
            <!-- postView -->
            <div class="col">
                <div class="postView">
                    <!-- 게시글 제목 -->
                    <h3><?php echo $post['subject']?></h3>

                    <!-- 게시글 정보 -->
                    <div class="div_postInfo row">
                        <div class="col-9">
                            <label>
                                <i class="fa fa-user-edit"></i>
                                <span><?php echo $post['writer']?></span>
                            </label>
                            <label>
                                <i class="fa fa-comment"></i>
                                <span><?php echo $post['totalComment']?></span>
                            </label>
                            <label>
                                <i class="fa fa-eye"></i>
                                <span><?php echo $post['hit']?></span>
                            </label>
                            <label>
                                <i class="fa fa-thumbs-up"></i>
                                <span><?php echo $post['thumbsUP']?></span>
                            </label>
                            <label>
                                <i class="fa fa-thumbs-down"></i>
                                <span><?php echo $post['thumbsDown']?></span>
                            </label>
                            <label for="print">
                                <i class="fa fa-print"></i>
                                <a href="#" id="print">프린트</a>
                            </label>
                        </div>
                        <div class="col justify-content-end">
                            <label>
                                <i class="fa fa-clock"></i>
                                <span><?php echo $post['date']?></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="content">
                        <?php echo $post['content']?>
                    </div>
                </div>

                <div class="container-flex justify-content-center div_thumb">
                    <a href="#">
                        <div class="circle justify-content-center">
                            <div><?php echo $post['thumbsUP']?></div>
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div class="circle justify-content-center">
                            <div><?php echo $post['thumbsDown']?></div>
                            <i class="fa fa-thumbs-down"></i>
                        </div>
                    </a>
                </div>

                <div class="row div_portView_button">
                    <div class="col">
                        <a href="/Main/postsList/<?php echo $this->uri->segment(3,'0')?>" class="btn btn-secondary">목록</a>
                    </div>
                    <div class="col container-flex justify-content-end">
                        <a href="/Main/postWrite" class="btn btn-success">글쓰기</a>
                    </div>
                </div> 


                <!-- side-bar-start -->
         