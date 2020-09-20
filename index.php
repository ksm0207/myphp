<?php include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
            <?php
            // board 테이블에서 idx(고유번호) 기준으로 내림차순해서 5개까지 표시
            $sql = mq('select * form board order by idx desc limit 0,5');
            while ($board = $sql->fetch_array()) {
                // title변수에 DB에서 가져온 title 선택하기
                $title = $board['title']; // title변수안에 $board 테이블의 title값 저장
                if (strlen($title) > 30) {
                    // title이 30을 넘어간다면 ... 표시하기 <일정 문자길이를 초과하면 초과한 문자를 자르고 ... 출력
                    $title = str_replace(
                        $board['title'],
                        mb_substr($board['title'], 0, 30, 'utf-8') . '...',
                        $board['title']
                    );
                }
            ?>
            <tbody>
                <tr>
                    <td with="70"><?php echo $board["idx"]; ?> </td>
                    <td with="500"><a href="#"><?php echo $title["idx"]; ?></a></td>
                    <td with="120"><?php echo $board["name"]; ?> </td>
                    <td with="100"><?php echo $board["date"]; ?> </td>
                    <td with="100"><?php echo $board["hit"]; ?> </td>
                </tr>
            </tbody>
        <?php } ?>
        </table>
        <div id="write_btn">
                <a href="/page/board/write.php"><button>글쓰기</button> </a>
        </div>
    </div>
    
</body>
</html>