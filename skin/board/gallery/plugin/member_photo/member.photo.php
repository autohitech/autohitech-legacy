<?
include_once("./_common.php");
if (!$is_member) exit;

$g4['title'] = "회원사진변경";
include_once("$g4[path]/head.sub.php");

$mb_id = $member['mb_id'];
$mb_dir = substr($mb_id,0,2);

$member_path = $g4['path']."/data/member/".$mb_dir; //폴더경로
$Photo_path = $member_path."/photo"; //폴더경로
$photo_file = $Photo_path."/".$member['mb_id']; //이미지경로

if (!file_exists($member_path)){
	@mkdir("{$g4[path]}/data/member/{$mb_dir}", 0707);
	@chmod("{$g4[path]}/data/member/{$mb_dir}", 0707);
}

if (!file_exists($Photo_path)){
	@mkdir($Photo_path, 0707);
	@chmod($Photo_path, 0707);
}
?>

<link rel="stylesheet" href="../../css/basic.css" type="text/css">
<link rel="stylesheet" href="../../css/button.css" type="text/css">

<div class="member_photo">
<h3><div class="icon member"></div>회원사진 변경</h3>

<form name="mphoto" method="post" onsubmit="return mphoto_submit(this);" enctype="multipart/form-data">
<div class="img">
<?
if (file_exists($photo_file)) {
    echo "<img src='".$photo_file."' >";
	echo "<p><input type=\"checkbox\" name=\"member_photo_del\" value=\"1\"> <span>삭제</span></p>";
} else {
    echo "<img src='../../img/member_noimg.gif'></span>";
} 
?>
</div>

<div class="file">
	<p>이미지 크기는 가로60px 세로60px 로 업로드해 주세요.</p>
	<p>확장자는gif만 가능합니다.</p>
	<input type="file" name="member_photo" />
</div>

<div class="footer">
	<input type="submit" value="등록" class="button" onfocus="this.blur();" />
    <input type="button" value="취소" class="button" onclick="window.close()" />
</div>

</form>

</div>
<script type="text/javascript">
function mphoto_submit(f)
{
<?
  if ($g4[https_url])
    echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';"; //스킨경로를 확인
  else
    echo "f.action = './member.photo_update.php';";
?>
}
</script>
<?
include_once("$g4[path]/tail.sub.php");
?>