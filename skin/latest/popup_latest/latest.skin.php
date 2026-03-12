<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<style>
.g4-popup-modal {
    position: absolute;
    z-index: 10000;
    background: #fff;
    border: 1px solid #666;
    box-shadow: 0 0 15px rgba(0,0,0,0.3);
    display: none;
}
.g4-popup-header {
    height: 7px;
    background: #666;
    cursor: move;
}
.g4-popup-body {
    padding: 0;
}
.g4-popup-footer {
    background: #666;
    padding: 5px 10px;
    color: #fff;
    font-size: 11px;
    text-align: right;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.g4-popup-footer a {
    color: #fff;
    text-decoration: none;
}
.g4-popup-footer input[type="checkbox"] {
    vertical-align: middle;
    margin-right: 5px;
}
</style>

<?
for ($i=0; $i<count($list); $i++) 
{
    $wr_id = $list[$i]['wr_id'];
    $cookie_name = "popup_{$bo_table}_{$wr_id}";
    
    // 쿠키 체크 (PHP단에서도 1차 거름)
    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'done') continue;

    $content = nl2br($list[$i]['wr_content']); 
    $img = "$g4[path]/data/file/$bo_table/".urlencode($list[$i]['file'][0]['file']);
    $has_img = (file_exists($img) && $list[$i]['file'][0]['file']);
    
    // 이미지 사이즈 확인
    if ($has_img) {
        list($width, $height) = getImagesize($img);
    } else {
        $width = 367;
    }
    
    // 위치 설정 (기본 중앙 근처)
    $top = 80 + ($i * 30);
    $left = 100 + ($i * 30);
?>

<div id="popup_<?=$wr_id?>" class="g4-popup-modal" style="width:<?=$width?>px; top:<?=$top?>px; left:<?=$left?>px;">
    <div class="g4-popup-header"></div>
    <div class="g4-popup-body">
        <? if ($has_img) { ?>
            <a href="<?=$list[$i]['wr_link1']?>" target="<?=$list[$i]['wr_2']?>">
                <img src="<?=$img?>" border="0" style="width:100%; display:block;">
            </a>
        <? } else { ?>
            <div style="padding:20px; min-height:150px;">
                <h3 style="margin:0 0 10px 0; color:#c70752;">★ <?=$list[$i]['wr_subject']?> ★</h3>
                <div style="border-top:1px solid #ddd; padding-top:10px;">
                    <? if ($list[$i]['wr_link1']) { ?>
                        <a href="<?=$list[$i]['wr_link1']?>" target="<?=$list[$i]['wr_2']?>"><?=$content?></a>
                    <? } else { ?>
                        <?=$content?>
                    <? } ?>
                </div>
            </div>
        <? } ?>
    </div>
    <div class="g4-popup-footer">
        <label style="cursor:pointer;">
            <input type="checkbox" id="chk_<?=$wr_id?>" onclick="closePopup('<?=$wr_id?>', true)"> 오늘은 이창을 다시 열지않음
        </label>
        <a href="javascript:void(0);" onclick="closePopup('<?=$wr_id?>', false)">[닫기]</a>
    </div>
</div>

<script type="text/javascript">
$(function() {
    // 드래그 가능하게
    if (typeof $.fn.draggable !== 'undefined') {
        $("#popup_<?=$wr_id?>").draggable({ handle: ".g4-popup-header" });
    }
    
    // 쿠키 확인 후 노출
    if (get_cookie("<?=$cookie_name?>") != "done") {
        $("#popup_<?=$wr_id?>").show();
    }
});

function closePopup(id, setCookie) {
    if (setCookie) {
        set_cookie("popup_<?=$bo_table?>_" + id, "done", 24);
    }
    $("#popup_" + id).hide();
}
</script>

<? } ?>
