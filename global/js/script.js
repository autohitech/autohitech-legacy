$(function() {     
$("#step2").hide(); 
$("#progressba_step_one").hide(); 
$("#proaaa").hide(); 
$("#txt_1").hide();
$("#step_2_txt").hide();  
$("#progressba_step_one").progressbar({value: 0}); 
$("#percent").progressbar({value: 0}); 
$("#btnCancel").click(function(e) {
	$("#step2").hide(); 
	$("#progressba_step_one").hide(); 
	$("#UploadBtn").show(); 
	$("#txt_2").show(); 
	$("#txt_1").hide(); 
	$("#step_1_txt").show(); 
	$("#step_2_txt").hide();
	$("#UploadBtn img").attr({src:"images/btn_upload03.gif"});
 }); 
 }); 

		var swfu;
		window.onload = function() {
			var settings = {
				flash_url : "./swf/swfupload.swf",
				upload_url: "gmupload.php",
				file_post_name : "Filedata",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "100 MB",
				file_types : "*.avi;*.wmv;*.mov;*.mp4;*.flv",
				file_types_description : "동영상 파일",
				file_upload_limit : 1,
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
				file_queue_error_handler : fileQueueError, 
				file_dialog_complete_handler: fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError, 
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
				   	$("#txt_1").show(); 
	                $("#txt_2").hide(); 
					$("#step_2_txt").show(); 
	                $("#step_1_txt").hide();
					
			    } catch (ex) {
					//$("#status").show();
			    }
			}
			function fileQueueError(file, errorCode, message) { 
				var error; 

				switch (errorCode) { 
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED: 
						error = ("동영상 업로드 최대용량은 100Mb입니다."); 
					break; 
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT: 
						error = ("동영상 업로드 최대용량은 100Mb입니다."); 
					break; 
					case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE: 
						error = ("비어있는 동영상 파일입니다."); 
					break; 
					case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE: 
						error = ("유효하지 않는 동영상 파일입니다."); 
					break; 
					default: 
					if (file !== null) { 
						error = ("동영상파일을 선택해 주세요"); 
					} 
					break; 
					} 
					//$("#step1").hide();
					 alert('에러: ' + error ); 			
					if(error) return false; 
			}
			 
			function uploadError(file, errorCode, message){
					var error; 

				switch (errorCode) { 

					case SWFUpload.UPLOAD_ERROR.HTTP_ERROR: 
						error = ("서버접속할 수 없습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.MISSING_UPLOAD_URL: 
						error = ("업로드URL에 접근할 수 없습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.IO_ERROR: 
						error = ("서버 IO "); 
					break; 
					case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR: 
						error = ("동영상 보안 업로드에 접근할 수 없습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED: 
						error = ("동영상 업로드 최대용량은 100Mb입니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED: 
						error = ("동영상 업로드를 실패하였습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.SPECIFIED_FILE_ID_NOT_FOUND: 
						error = ("동영상파일를 찾을 수 없습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED: 
						error = ("동영상 업로드를 취소하였습니다."); 
					break; 
					case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED: 
						error = ("동영상 업로드를 중지하였습니다."); 
					break;
					default: 
					if (file !== null) { 
						error = ("동영상파일을 선택해 주세요"); 
					} 
					break; 
  			    	}
				     alert('에러: ' + error ); 			
					if(error) return false; 
			}


			function uploadSuccess (file, serverData){
				try {
					if (serverData) {
						$("#step1").hide();
						$("#step2").show().height(174); 
					    $("#step1").fadeOut(500, function() {
						$("#step2").load("global_encoding.php?filename="+serverData);  
  						});
					} else {
					progress.setError();
					progress.setStatus("An error occurred.");
					}

				} catch (ex) {
				//	$("#error").show();
				}

			}

 		 };