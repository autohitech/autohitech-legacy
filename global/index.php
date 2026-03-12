<?session_start();
include_once './inc/_config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>동영상변환</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/my.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.20.custom.css"> 
<script type="text/javascript" src="js/jquery-1.7.1.js"> </script> 
<script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script> 
<script type="text/javascript" src="js/upload.js"></script>
<!----script language="JavaScript" src="js/progressbar.js" type="text/javascript"></script---->
        <script> 
$(function() {     
$("#progressba_step_one").hide(); 
$("#proaaa").hide(); 
$("#progressba_step_one").progressbar({value: 0}); 
$("#percent").progressbar({value: 0}); 
$("#btnCancel").click(function(e) {
	$("#progressba_step_one").hide(); 
	$("#UploadBtn").show(); 
	$("#UploadBtn img").attr({src:"images/btn_upload03.gif"});
 }); 
 }); 
 </script>
<script type="text/javascript">
		var swfu;
		window.onload = function() {
			var settings = {
				flash_url : "./swf/swfupload.swf",
				upload_url: "upload.php",
				file_post_name : "Filedata",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 100,
				file_queue_limit : 0,

				// Button settings
				button_image_url: "images/btn_upload.gif",
				button_width: "360",
				button_height: "32",
				button_action : SWFUpload.BUTTON_ACTION.SELECT_FILES,
				button_disabled : false,
				button_cursor : SWFUpload.CURSOR.HAND,
				button_placeholder_id: "spanButtonPlaceHolder",
				button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,

				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_dialog_complete_handler: fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				
				custom_settings : {
					tdPercentUploaded : document.getElementById("tdPercentUploaded"),
					tdFilesQueued : document.getElementById("tdFilesQueued"),
					tdFilesUploaded : document.getElementById("tdFilesUploaded"),
					tdErrors : document.getElementById("tdErrors"),
					tdCurrentSpeed : document.getElementById("tdCurrentSpeed"),
					tdAverageSpeed : document.getElementById("tdAverageSpeed"),
					tdMovingAverageSpeed : document.getElementById("tdMovingAverageSpeed"),
					tdTimeRemaining : document.getElementById("tdTimeRemaining"),
					tdTimeElapsed : document.getElementById("tdTimeElapsed"),
					tdSizeUploaded : document.getElementById("tdSizeUploaded"),
					tdProgressEventCount : document.getElementById("tdProgressEventCount")

				}

			};
			swfu = new SWFUpload(settings);

			function uploadStart(){
                try {
                   $("#UploadBtn img").attr({src:"images/btn_upload04.gif"});
				   $("#progressba_step_one").css("z-index", "3000"); 
                   $("#progressba_step_one").show();
			    } catch (ex) {
			    }
			}


			function uploadSuccess (file, serverData){
				try {
					if (serverData) {
					     $("#step1").fadeOut('1200', function() {
							$("#step2").load("encoding.php?filename="+serverData);  
  						});
					} else {
					progress.setError();
					progress.setStatus("An error occurred.");
					}

				} catch (ex) {
					this.debug(ex);
				}

			}

 		 };


	</script>
</head>
<body>

<div id="step1">
<b>1단계 동영상 업로드 </b>> 2단계 동영상 변환 > 3단계 이미지 선택<br>
<form id="form1" action="save.php" method="post" enctype="multipart/form-data">
<div id="progressba_step_one"><div id="tdPercentUploaded" class="label"></div></div> 
<div  id="UploadBtn"><span id="spanButtonPlaceHolder"></span><img id="btnCancel" src="images/btn_upload03.gif" onclick="swfu.cancelQueue();" />	</div>
<div id=txt>잔여시간/경과시간 : <div id="tdTimeRemaining"></div> / <div id="tdTimeElapsed"></div> </div>
<div id="divStatus"></div>
</form>
<br><div id="proaaa">
<div id="tdFilesQueued"></div> 
<div id="tdFilesUploaded"></div> 
<div id="tdErrors"></div> 
<div id="tdCurrentSpeed"></div> 
<div id="tdAverageSpeed"></div> 
<div id="tdMovingAverageSpeed"></div> 
<div id="tdTimeRemaining"></div> 
<div id="tdTimeElapsed"></div> 
<div id="tdSizeUploaded"></div> 
<div id="tdProgressEventCount"></div> 
</div>
지적재산권, 음란물, 청소년 유해매체물을 포함한 타인의 권리를
침해하는 자료등은 제한 조치나 법적인 처벌을 받을 수 있습니다.
</div>
<div id="step2"></div>

<?echo userquotasum();

echo "<br>$limit_uploadquota";
echo "<br>".byteFormat($limit_uploadquota);
?>
</html>
