<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h2>
	<blockquote> 마당서점 도서목록 </blockquote>
</h2>
<?php
// host = localhost, user = WonChiHyeon, password = 1234, database = madang
$conn = mysqli_connect('localhost', 'WonChiHyeon', '1234', 'madang');
if (mysqli_connect_error()) {
	echo 'Connection Error';
	exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM Book WHERE bookid='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
echo '<table border=1><tr><td>책번호</td><td>' . $id . '</td></tr>';
echo '<tr><td>책제목</td><td>' . $row['bookname'] . '</td></tr>';
echo '<tr><td>출판사</td><td>' . $row['publisher'] . '</td></tr>';
echo '<tr><td>가격</td><td>' . $row['price'] . '</td></tr>';
echo '</table>';
echo '<a href="./booklist.php">목록보기</a>';
?>