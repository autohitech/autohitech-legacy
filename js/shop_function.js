   function flash_movie(src, ids, width, height, wmode)
  {
       var wh = "";
       if (parseInt(width) && parseInt(height))
           wh = " width='"+width+"' height='"+height+"' ";
       return "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0' "+wh+" id="+ids+"><param name=wmode value="+wmode+"><param name=movie value="+src+"><param name=quality value=high><embed src="+src+" quality=high wmode="+wmode+" type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash' "+wh+"></embed></object>";
  }

  function doc_write(cont)
  {
       document.write(cont);
  }


//png파일 투명하게
function setPng24(obj) { 
  obj.width=obj.height=1; 
  obj.className=obj.className.replace(/\bpng24\b/i,''); 
  obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');" 
  obj.src='';  
  return ''; 
}


function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
/*
function jsmyimg(picName,windowName, windowWidth, windowHeight){
mypop = window.open("/mypopup",windowName,"toolbar=no,scrollbars=no,resizable=no,width=" + windowWidth + ",height=" + windowHeight)
mypop.document.myimage.src= picName;
}
*/


<!--//FAQ리스트 스크립트-->
var menux="juldaeogosu";
function visual2(sub){
    var el = document.getElementById(sub);
    if (!el) return;

	if (menux != sub){
		show_Menu2();
		el.style.display="block";
		menux=sub;
	}
	else{
		menux="juldaegosu";
		show_Menu2();
	}
}
function show_Menu2(){
	
	for(i=1;i<33;i++) {
		if(document.getElementById("menu"+i)) {
			document.getElementById("menu"+i).style.display="none";		
		}		
		bb="document.getElementById(sub).style";
	}	
}

function commaNum(num) { 

	if (num < 0) { num *= -1; var minus = true}
	else var minus = false
	
	var dotPos = (num+"").split(".")
	var dotU = dotPos[0]
	var dotD = dotPos[1]
	var commaFlag = dotU.length%3

	if(commaFlag) {
		var out = dotU.substring(0, commaFlag) 
		if (dotU.length > 3) out += ","
	}
	else var out = ""

	for (var i=commaFlag; i < dotU.length; i+=3) {
		out += dotU.substring(i, i+3) 
		if( i < dotU.length-3) out += ","
	}

	if(minus) out = "-" + out;
	if(dotD) return out + "," + dotD
	else return out 
}

var is_submit=0;
function check_overlap() {
	if(is_submit) {
		return false;
	} else {
		is_submit=1;
		return true;
	}
}
function bycount(formname) {
var target=eval(self) 
if (formname.value==''){
}
else {
target.location=formname.options[formname.selectedIndex].value;
// document.form1.bycount.selectedIndex=0; 
}
}
function containsCharsOnly(input,chars) {
   for (var inx = 0; inx < input.length; inx++) {
      if (chars.indexOf(input.charAt(inx)) == -1)
       return false;
   }
   return true;
  }
function isNumber(input) {
   var chars = "0123456789.";
   if(input == "") return false;
   return containsCharsOnly(input,chars);
}
function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall'){
	  theForm[z].checked = theElement.checked;
	  }
     }
}

/*
function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall'){
	  theForm[z].checked = theElement.checked;
	  }
     }
    }
function checkUncheckAll() {
     checkbox.each(function(input) { 
            input.checked = input.checked ? false : true; 
    } 
}; 



  function reverse() {
   var i, chked=0;

    for(i=0;i<document.list.length;i++)
    {
     if(document.list[i].type=='checkbox')
     {
      if(document.list[i].checked) { document.list[i].checked=false; }
      else { document.list[i].checked=true; }
     }
    }
   }
*/

function addform_check(pt) {
            if (pt == "dru") {
                document.addform.action.value = 'du';
                document.addform.submit(); 
            } else if (pt == "drb") {
                document.addform.action.value = 'dr';
                document.addform.submit();
            } else {
                document.addform.action.value = '';
                document.addform.submit();
            }
}


function cartmodify(pt,pid,bid){
  var f = document.createElement("form");
        f.method = 'post';
        f.action = '/cart/modify?pt='+pt+'&pid='+pid+'&bid='+bid;
        document.body.appendChild(f);
        f.submit();
}
function addcartmodi(a,b,c){
  var f = document.createElement("form");
        f.method = 'post';
        f.action = '/cart/add_modify?bname='+a+'&bid='+b+'&optval='+c;
        document.body.appendChild(f);
        f.submit();

}


function changeqty(addfrm,Bqty) {
   if (isNaN(addfrm.value)) {
         addfrm.value = 1;
   } else {
        if (Bqty > 0 || addfrm.value > 1) addfrm.value = addfrm.value*1 + Bqty;
   }
}

function addcart(pt) {
     if (pt == "order") {
          document.addform.action.value = 'gorder';
          document.addform.submit();
     } else if (pt == "wishlist") {
          document.addform.action.value = 'gwishlist';
          document.addform.submit();
     } else if (pt == "delete") {
          document.addform.action.value = 'gseldel';
          document.addform.submit();
     } else if (pt == "empty") {
          document.addform.action.value = 'gempty';
          document.addform.submit();
    }
}


function logined_check() {
   ModalConfirm('회원분에게만 제공되는 서비스로\n로그인 하셔야 서비스를 이용하실 수 있습니다.\n로그인 하시겠습니까?', '로그인 안내', function(r) {
   if(r) { location.href='/member/login'; }
 });
}


function secret_logined_check(aa,bb,cc,dd) {
   ModalConfirm('비밀글입니다.\n글을 읽을 권한이 없습니다. 로그인하시겠습니까?', '로그인 안내', function(r) {
   if(r) { location.href='customer.html?mode=PW&bo_table='+ aa + '&ftype=&action=scr&id=' + bb +'&no=' + cc; }
   else {
location.href='customer.html?mode=list&bo_table=' + aa + '&ftype=&page='+dd; 
  }
 });
}

function board_logined_check(aa,bb,cc,dd) {
   ModalConfirm('회원분에게만 제공되는 서비스로\n로그인 하셔야 서비스를 이용하실 수 있습니다. \n\n로그인하시겠습니까?', '로그인 안내', function(r) {
   if(r) { location.href='/member/login?ReturnUrl=%2Fcustomer%2Fcustomer.html%3Fmode%3Dlist%26bo_table%3D' + aa + '%26ftype%3D%26page='+dd; }
   else {
return false;
  }
 });
}


function product_search_check(f) {
 if(f.q.value=='') {
         ModalAlert('검색어를 입력해 주십시오.', '상품검색 안내');
         f.q.focus(); return false;
 } 
return true;
}
function ordering_check() {
      var chk = 0;
      var totprice=parseInt(document.addform.totalprice.value);
      $("input:checked").each(function() {  
       if($(this).val()>0) { chk= chk + 1;}
      });  
    if(chk>0) {
       if(totprice<1) {
         ModalAlert('선택하신 상품의 가격이 없습니다. \n 구매하실 상품의 가격을 체크하신 후 주문하세요.', '구매상품 안내');
       } else {
         addcart('order') 
          //  ModalConfirm('선택하신 ' + chk + '개의 상품을 주문합니다. \n주문 하시겠습니까?', '구매상품 안내', function(r) {
           //    if(r) { addcart('order') }
           //   });
      }
    } else {
         ModalAlert('선택하신 상품이 없습니다. \n 구매하실 상품에 체크하신 후 주문하세요.', '구매상품 안내');
    }

}

function gocart_check() {
 location.href='/cart/list'; 
 // ModalConfirm('상품이 장바구니에 담겼습니다. \n지금 확인하시겠습니까?', '장바구니 확인 안내', function(r) {
 // if(r) {  location.href='/cart/list'; }
 //});
}

function order_del(Oid) {
  ModalConfirm('주문을 삭제하시겠습니까?', '주문내역삭제 안내', function(r) {
  if(r) {
        var f = document.createElement("form");
        f.method = 'post';
        f.action = '/mypage/orderdel?order_id=' +Oid;
        document.body.appendChild(f);
        f.submit();
    }
 });
}


function gowishlist_check() {
 location.href='/cart/list'; 
 // ModalConfirm('상품이 보관상품에 담겼습니다. \n지금 확인하시겠습니까?', '보관상품  확인 안내', function(r) {
 // if(r) {  location.href='/cart/list'; }
 //});
}

function gopcart_check() {
  ModalConfirm('상품이 장바구니에 담겼습니다. \n지금 확인하시겠습니까?', '장바구니 확인 안내', function(r) {
  if(r) { window.opener.document.location.href='/cart/list';   self.close();}
  else {self.close();}
 });

}

function gopwishlist_check() {
  ModalConfirm('상품이 보관상품에 담겼습니다. \n지금 확인하시겠습니까?', '보관상품  확인 안내', function(r) {
  if(r) { window.opener.document.location.href='/cart/list';   self.close(); }
  else {self.close();}
 });
}

function logined_cart_check() {
   ModalConfirm('회원분에게만 제공되는 서비스로\n로그인 하셔야 서비스를 이용하실 수 있습니다.\n로그인 하시겠습니까?', '로그인 안내', function(r) {
   if(r) {  location.href='/member/login?ReturnUrl=%2Fcart%2Flist';}
 });
}


function logined_pop_check() {
   ModalConfirm('회원분에게만 제공되는 서비스로\n로그인 하셔야 서비스를 이용하실 수 있습니다.\n로그인 하시겠습니까?', '로그인 안내', function(r) {
   if(r) { window.opener.document.location.href='/member/login?ReturnUrl=%2Fcart%2Flist'; self.close();}
 });
}


 function agreecheckform() 
    {  
 
       count   = 0; 
       var obj=document.checklist.elements.length; 
        for(var i=0;i<obj;i++) 
       {       
          if (document.checklist.elements[i].checked) 
                 count++;  
       } 
       if (count == "0")   
       { 
         ModalAlert('쇼핑몰이용약관 및 개인정보취급방침에 \n 동의체크를 하셔야 회원가입을 할 수 있습니다.', '회원가입 동의');
         return false; 
       }         


} 

 function nonmemagreecheck() 
    {  
 
       count   = 0; 
       var obj=document.checklist.elements.length; 
        for(var i=0;i<obj;i++) 
       {       
          if (document.checklist.elements[i].checked) 
                 count++;  
       } 
       if ((count == "0") || (document.checklist.chkAgree[1].checked == true))   
       { 
         ModalAlert('비회원정보수집동의 및 개인정보취급방침에 \n 동의체크를 하셔야 주문을 할 수 있습니다.', '비회원정보수집 동의');
         return false; 
       } else {
       var f = document.createElement("form");
        f.method = 'post';
        f.action = '/cart/order?agr=Y&cartnos='+document.checklist.cartnos.value;
        document.body.appendChild(f);
        f.submit();

        Popup.hide('agree');
       }        

} 

function check_login() {
        if(document.LoginForm.userid.value=="") {
                ModalAlert('아이디를 입력하십시요.', '회원로그인');
                document.LoginForm.userid.focus();
                return false;
        }
       else if(document.LoginForm.password.value=="") {
                ModalAlert('비밀번호를 입력하십시요.', '회원로그인');
                document.LoginForm.password.focus();
                return false;
        }  else {
        document.LoginForm.action.value = 'confirm';
        document.LoginForm.submit();
        }

}

function Search_idcheck(f) {
     if( (document.SearchIdForm.username.value.length<2) || (document.SearchIdForm.username.value.search(/\s+/) != -1)) {
                ModalAlert('이름을 바르게 입력해 주십시오.', '아이디 찾기');
                document.SearchIdForm.username.focus();
                return false;
    } else if( document.SearchIdForm.jumin.value.length<13 ) {
                ModalAlert('주민등록번호를 바르게 입력해 주십시오.', '아이디 찾기');
                document.SearchIdForm.jumin.focus();
                return false;
    }   
}
function nonOrderForm(f) {
     if( (document.SearchOrderForm.username.value.length<2) || (document.SearchOrderForm.username.value.search(/\s+/) != -1)) {
                ModalAlert('이름을 바르게 입력해 주십시오.', '주문조회');
                document.SearchOrderForm.username.focus();
                return false;
    } else if( document.SearchOrderForm.jumunno.value.length<8 ) {
                ModalAlert('주문번호를 바르게 입력해 주십시오.', '주문조회');
                document.SearchOrderForm.jumunno.focus();
                return false;
    }  
        return true;
}




function Search_pwdcheck() {
     if( (document.SearchPwdForm.pusername.value.length<2) || (document.SearchPwdForm.pusername.value.search(/\s+/) != -1)) {
                ModalAlert('이름을 바르게 입력해 주십시오.', '비밀번호 찾기');
                document.SearchPwdForm.pusername.focus();
                return false;
    } else if( document.SearchPwdForm.puserid.value.length<4 ) {
                ModalAlert('아이디를 바르게 입력해 주십시오.', '비밀번호 찾기');
                document.SearchIdForm.puserid.focus();
                return false;
    } else if( document.SearchPwdForm.pjumin.value.length<13 ) {
                ModalAlert('주민등록번호를 바르게 입력해 주십시오.', '비밀번호 찾기');
                document.SearchIdForm.pjumin.focus();
                return false;
    }   
        return true;
}
function withdraw_check() {
          ModalConfirm('탈퇴하시면 회원님의 모든테이터가 삭제됩니다. \n일정기간 동안  다시 회원으로 가입하실 수 없습니다. \n정말 탈퇴하시겠습니까?', '회원탈퇴 확인 안내', function(r) {
                if(r == true) {
                document.withdrawForm.action.value = 'withdraw';
                document.withdrawForm.submit();
                ModalAlert('회원탈퇴되었습니다.\n 바로 회원가입하실려면  \n관리자에게 문의하시기 바랍니다.', '회원탈퇴 확인 안내'); 
               } 

        });
}



function mailcopy(){
  var mail = document.OrderForm.ori_email.value;
   if (mail == "") {
	document.OrderForm.email02.readOnly = false;
	document.OrderForm.email02.disabled = false;
	document.OrderForm.email02.style.backgroundColor = "#ffffff";
	document.OrderForm.email02.value = "";
	document.OrderForm.email02.focus();
   } else {
	document.OrderForm.email02.readOnly = true;
	document.OrderForm.email02.disabled = false;
	document.OrderForm.email02.style.backgroundColor = "#efefef";
	document.OrderForm.email02.value = document.OrderForm.ori_email.value;
   }

 }


function Pop_prodtview(id) {
   window.open('/product/popupview:'+id, 'popupview', 'scrollbars=no,width=830,height=608,top=30,left=30');
}

function ZipCode(frm_name, frm_zip1, frm_zip2, frm_addr,frm_addr1) {
   window.open('/member/searchzip?frm_name='+frm_name+'&frm_zip1='+frm_zip1+'&frm_zip2='+frm_zip2+'&frm_addr='+frm_addr+'&frm_addr1='+frm_addr1, 'winzip', 'scrollbars=yes,width=425,height=400,top=0,left=0');
}
function Pop_OutAddress() {
   window.open('/cart/outaddress', 'outaddress', 'scrollbars=no,width=635,height=700,top=0,left=0');
}
function Pop_discount() {
   window.open('/cart/discount', 'discount', 'scrollbars=no,width=630,height=495,top=0,left=0');
}
function Pop_discountt() {
   window.open('/cart/discountt', 'discount', 'scrollbars=no,width=630,height=495,top=0,left=0');
}



function orderbykcp(){
        document.order_info.action.value = '../payment/card_processing.php';
        document.order_info.submit();

}



 function bbs_search_check(f) {
   if(f.q.value=='') {
   ModalAlert('검색어를 입력해 주십시오.', '검색 안내');   
   f.q.focus(); return false;
   }
   return true;
}
function memoform_check(sun) {
        if (sun.name.value == '') {
           ModalAlert('이름을 입력하세요.', '덧글입력 안내'); sun.name.focus(); return false;
        } else if (sun.memo.value == '') {
           ModalAlert('내용을 입력하세요..', '덧글입력 안내'); sun.memo.focus(); return false; }
        return true;
}

function memologinform_check(url) {
  ModalConfirm('로그인 하셔야 이용하실 수 있습니다. \n로그인하시겠습니까?', '로그인 안내', function(r) {
  if(r) {  location.href='/member/login?ReturnUrl='+url; }
 });
}
function proqaform_check(url) {
  ModalConfirm('로그인 하셔야 이용하실 수 있습니다. \n로그인하시겠습니까?', '로그인 안내', function(r) {
  if(r) {  location.href='/member/login?ReturnUrl='+url; }
 });
}

function form_check(sun) {
         if (sun.title.value == '') {
           ModalAlert('제목을 입력하세요.', '게시글 입력 안내'); sun.title.focus(); return false;
        } else  if (sun.name.value == '') {
           ModalAlert('이름을 입력하세요.', '게시글 입력 안내'); sun.name.focus(); return false;
       } else if (sun.pwd.value == '') {
           ModalAlert('비밀번호를 입력하세요.', '게시글 입력 안내'); sun.pwd.focus(); return false;
        } else if (sun.content.value == '') {
           ModalAlert('내용을 입력하세요.', '게시글 입력 안내'); sun.content.focus(); return false;
        }

        return true;
}
function myfaq_check(sun) {
        if (sun.part.value == '') {
           ModalAlert('문의유형을 선택하세요.', '나의문의 입력 안내'); sun.part.focus(); return false;
       } else  if (sun.title.value == '') {
           ModalAlert('제목을 입력하세요.', '나의문의 입력 안내'); sun.title.focus(); return false;
        } else if (sun.content.value == '') {
           ModalAlert('내용을 입력하세요.', '나의문의 입력 안내'); sun.content.focus(); return false;
        }

        return true;
}

function reviewform_check(rvf) {
          if (rvf.Rtitle.value == '') {
           ModalAlert('제목을 입력하세요.', '게시글 입력 안내'); rvf.Rtitle.focus(); return false;
        } else if (rvf.Rcontent.value == '') {
           ModalAlert('내용을 입력하세요.', '게시글 입력 안내'); rvf.Rcontent.focus(); return false;
        }
        return true;
}


$(document).ready(function() {
	$("div.panel_button").click(function(){
		$("div#panel").animate({
			height: "500px"
		})
		.animate({
			height: "460px"
		}, "fast");
		$("div.panel_button").toggle();
	
	});	
	
   $("div#hide_button").click(function(){
		$("div#panel").animate({
			height: "0px"
		}, "fast");
		
	
   });	
	
});


function chulchecking(id){
  if(id) {
                document.addform.submit(); 
   } else {
       ModalConfirm('로그인 하셔야 글을 입력하실 수 있습니다. \n로그인하시겠습니까?', '로그인 안내', function(r) {
       if(r) {  location.href='/member/login?ReturnUrl=%2Fdailycheck'; }
     });
   }
}
function coupondnchecking(id){

       ModalConfirm('로그인 하셔야 쿠폰을 다운받으실 수 있습니다. \n로그인하시겠습니까?', '로그인 안내', function(r) {
       if(r) {  location.href='/member/login?ReturnUrl=%2Fcoupon'; }
     });
}
function gocoupondn() {
  ModalConfirm('쿠폰 발급이 완료되었습니다. \n 상품 주문시 해당 쿠폰을 사용하실 수 있습니다. \n지금 확인하시겠습니까?', '쿠폰다운로드 확인 안내', function(r) {
  if(r) {  location.href='/mypage/coupon'; }
 });
}

function gocouponchk(data){
       ModalConfirm('항상 저희 커피키바를 애용해 주셔서  \n대단히 감사드립니다.  \n고객님을 위해 최선을 다하는  \n커피키바가 되도록 노력하겠습니다. \n축하금을 충전 하시겠습니까?', '축하금 충전 안내', function(r) {
       if(r) {  location.href = "/mypage/autorefillcoupon"; }
     });

            
}
function memloginblock(){
         ModalAlert('로그인이 안되세요?\n 아래같이 해보세요\n\n 1.도구 > 인터넷옵션 > 개인정보 > 고급 > 모든 쿠키 허용 후 브라우저 재시작\n 2.도구 > 인터넷옵션 > 검색기록 삭제 (쿠키삭제. 파일삭제. 목록지우기) 후 브라우저 재시작\n 3. 도구 >인터넷 옵션 > 개인정보 > 낮음으로 바꿔주신 후 브라우저 재시작. \n 4. 도구 >인터넷 옵션 > 보안 > 신뢰할 수 있는 사이트에 추가 \n 5. 도구 >인터넷 옵션 > 보안 > 제한된 사이트에 삭제 \n \n 즐거운 쇼핑 되세요. \n \n ================================ 배 드 민 턴 마 트 ================================', '로그인이 안될 때 조치요령');
         return false;

}


function NaverCheckoutWishlist() {
with(document.addform){
	var isGoodsImage = 1;
	var isGoodsThumbImage = 1;
                var goodsId=Pid.value;
	var goodsName=Pname.value;
	var goodsPrice=Pseprice.value;
        window.open("/NaverCheckout/wishlist.php?goodsId=" + goodsId + "&goodsName=" + goodsName + "&goodsPrice=" + goodsPrice, "NaverCheckoutWishlist", "width=400, height=300, scrollbars=yes");
}

}

function NaverCheckoutPro() {
                    for (i=1; i<=5; i++)
                        {
  	          var selectval_01 = $("select[name^=item_"+ i + "]").val();
	          var selectval_02 = $("select[name^=option2_"+ i + "]").val();
   	          var selectval_03 = $("select[name^=option3_"+ i + "]").val();
   	          var selectval_04 = $("select[name^=option4_"+ i + "]").val();
   	          var selectval_05 = $("select[name^=option5_"+ i + "]").val();
	          var qtyval = $("input[name^=qty_"+ i + "]").val();
	           if(	qtyval == "" || qtyval == "0"   ){
     	         ModalAlert('수량을 입력하지 않았습니다.', '수량입력');
	         	 qtyval.focus();return;
                            }
	           if(	selectval_01 == "0"  || selectval_02 == "0"  || selectval_03 == "0"  || selectval_04 == "0"  || selectval_05 == "0" ){
   	         	ModalAlert('옵션을 선택하지 않았습니다.', '옵션선택');
	         	 focus();return;
                            }
                        }

                document.addform.action.value = 'NAVERCHK';
                document.addform.target="_top";
                document.addform.submit();
 }


function GoProductView(a) {
  location.href='/GoProducts?ID='+ a;
}

var TimeOut         = 300;
var currentLayer    = null;
var currentitem     = null;

var currentLayerNum = 0;
var noClose         = 0;
var closeTimer      = null;

// Open Hidden Layer
function mopen(n)
{
    var l  = document.getElementById("menu"+n);
    var mm = document.getElementById("mmenu"+n);
    
    if(l)
    {
        mcancelclosetime();
        l.style.visibility='visible';

        if(currentLayer && (currentLayerNum != n))
            currentLayer.style.visibility='hidden';

        currentLayer = l;
        currentitem = mm;
        currentLayerNum = n;            
    }
    else if(currentLayer)
    {
        currentLayer.style.visibility='hidden';
        currentLayerNum = 0;
        currentitem = null;
        currentLayer = null;
    }
}
function sopen(n)
{
    var l  = document.getElementById("smenu"+n);
    var mm = document.getElementById("smmenu"+n);
    
    if(l)
    {
        mcancelclosetime();
        l.style.visibility='visible';

        if(currentLayer && (currentLayerNum != n))
            currentLayer.style.visibility='hidden';

        currentLayer = l;
        currentitem = mm;
        currentLayerNum = n;            
    }
    else if(currentLayer)
    {
        currentLayer.style.visibility='hidden';
        currentLayerNum = 0;
        currentitem = null;
        currentLayer = null;
    }
}
// Turn On Close Timer
function mclosetime()
{
    closeTimer = window.setTimeout(mclose, TimeOut);
}

// Cancel Close Timer
function mcancelclosetime()
{
    if(closeTimer)
    {
        window.clearTimeout(closeTimer);
        closeTimer = null;
    }
}

// Close Showed Layer
function mclose()
{
    if(currentLayer && noClose!=1)
    {
        currentLayer.style.visibility='hidden';
        currentLayerNum = 0;
        currentLayer = null;
        currentitem = null;
    }
    else
    {
        noClose = 0;
    }

    currentLayer = null;
    currentitem = null;

}

// Close Layer Then Click-out
// document.onclick = mopen(n); 
// document.onclick = mclose();


/*-------------------------------------
스크롤 배너
-------------------------------------*/
var bodyHeight = scrollobjHeight = 0;

function scrollBanner()
{
	if ( document.all ) window.attachEvent("onload", initSlide); // IE 경우
	else window.addEventListener("load", initSlide, false); // FF(모질라) 경우
}

function initSlide()
{
	var scroll = document.getElementById('scroll');
	var scrollTop = get_objectTop(document.getElementById('scroll'));
	scroll.style.top = document.body.scrollTop + scrollTop;
	bodyHeight = document.body.scrollHeight;
	scrollobjHeight = scroll.clientHeight;
	movingSlide();
}

function mvb_scrl(gap)
{
	var mvb_scrl = document.getElementById('mvb_scrl');
	mvb_scrl.scrollTop += gap;
}

function eScroll()
{
	/*********************************
	 * eScroll ( eNamoo scroll script )
	 * by mirrh
	 * 2006.07.16
	 ********************************/

	var thisObj = this;
	this.timeObj = null;

	/*** 설정변수 ***/
	this.mode = "top";				// 스크롤 방향 (top|left)
	this.width = "100%";			// 라인당 가로값 (pixel)
	this.height = 20;				// 라인당 높이값 (pixel)
	this.line = 1;					// 출력 라인수
	this.delay = 150;				// 스크롤후 딜레이 시간
	this.speed = 1;					// 스크롤 속도 (작을수록 빠름)
	this.id = 'obj_eScroll';		// 객체 id (클래스 다중 사용시 id 다르게 지정 요망)
	this.contents = new Array();	// 출력 내용 (배열로 내용 지정 요망)
	this.align = "left";			// 내용 aligne
	this.valign = "middle";			// 내용 valigne

	/*** 내장변수 ***/
	this.gap = 0;
	this.direction = 1;

	this.add = add;
	this.exec = exec;
	this.start = start;
	this.stop = stop;
	this.scroll = scroll;
	this.direct = direct;
	this.go = go;

	function add(str)
	{
		this.contents[this.contents.length] = str;
	}

	function exec()
	{
		this.basis = (this.mode == "left") ? this.width : this.height;
		var outWidth = this.width * ((this.mode == "left") ? this.line : 1);
		var outHeight = this.height * ((this.mode == "top") ? this.line : 1);

		var outline = "<div id=" + this.id + " style='overflow:hidden;width:" + outWidth + ";height:" + outHeight + "'><table></table></div>";
		document.write(outline);
		this.obj = document.getElementById(this.id);

		var tb = this.obj.appendChild(document.createElement("table"));
		var tbody = tb.appendChild(document.createElement("tbody"));
		tb.cellPadding = 0 ;
		tb.cellSpacing = 0 ;
		tb.onmouseover = function(){thisObj.stop()};
		tb.onmouseout = function(){thisObj.start()};

		if (this.mode=="left") var tr = tbody.appendChild(document.createElement("tr"));
		for (k in this.contents){
			if (this.mode=="top") var tr = tbody.appendChild(document.createElement("tr"));
			var td = tr.appendChild(document.createElement("td"));
			td.noWrap = true;
			td.style.width = this.width;
			td.style.height = this.height;
			td.style.textAlign = this.align;
			td.style.verticalAlign = this.valign;
			td.innerHTML = this.contents[k];
		}

		var len = (this.contents.length<this.line) ? this.contents.length : this.line;
		for (i=0;i<len;i++){
			if (this.mode=="top") var tr = tbody.appendChild(document.createElement("tr"));
			td = tr.appendChild(document.createElement("td"));
			td.noWrap = true;
			td.style.width = this.width;
			td.style.height = this.height;
			td.style.textAlign = this.align;
			td.style.verticalAlign = this.valign;
			td.innerHTML = this.contents[i];
		}

		this.obj.parent = this;
		this.tpoint = this.basis * this.contents.length;
		this.start();
	}

	function scroll()
	{
		var out = (this.mode=="left") ? this.obj.scrollLeft : this.obj.scrollTop;
		if (out%this.basis==0){
			this.gap++;
			if (this.gap>=this.delay) this.gap = 0;
		}
		if (!this.gap){
			var ret = (out==this.tpoint) ? this.direction : out + this.direction;
			if (ret<0) ret = this.tpoint + ret;
			if (this.mode=="left") this.obj.scrollLeft = ret;
			else this.obj.scrollTop = ret;
		}
	}

	function start()
	{
		this.timeObj = window.setInterval("(document.getElementById('" + this.id + "')).parent.scroll()",this.speed);
	}

	function stop()
	{
		clearTimeout(this.timeObj);
	}

	function direct(d)
	{
		this.direction = d;
	}

	function go()
	{
		this.stop();
		var out = (this.mode=="left") ? this.obj.scrollLeft : this.obj.scrollTop;
		var ret = (parseInt(out / this.basis) + this.direction) * this.basis;
		if (ret<0) ret = this.tpoint + ret;
		if (ret>this.tpoint) ret = this.basis;
		if (this.mode=="left") this.obj.scrollLeft = ret;
		else this.obj.scrollTop = ret;
	}

}

function displayImage(picName, windowName, windowWidth, windowHeight){
var winHandle = window.open("" ,windowName,"toolbar=no,scrollbars=no,resizable=no,width=" + windowWidth + ",height=" + windowHeight)
if(winHandle != null){
var htmlString = "<html><head><title>▒▒▒▒이미지확대▒▒▒▒</title></head>" 
htmlString += "<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>"
htmlString += "<a href=javascript:window.close()><img src=" + picName + " border=0 alt=닫기></a>"
htmlString += "</body></html>"
winHandle.document.open()
winHandle.document.write(htmlString)
winHandle.document.close()
} 
if(winHandle != null) winHandle.focus()
return winHandle
}
function doNothing(){} 





function SimpleNew(theURL) {
location.href = theURL;
}
function SimpleCart(theURL) {
location.href = theURL;
}
function SimpleWish(theURL) {
location.href = theURL;
}


	$('#btnQcate a')
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(0 -20px)"}, {duration:200})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(0 0)"}, {duration:200})
		})
$(function(){


		
	$('.nblk a')
		.css( {backgroundPosition: "0 0"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(0 -20px)"}, {duration:200})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(0 0)"}, {duration:200})
		})
	$('.prvw a')
		.css( {backgroundPosition: "-73px 0"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-73px -20px)"}, {duration:200})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(-73px 0)"}, {duration:200})
		})

});



var ALEXACC={};

function T$(i){return document.getElementById(i)}
function T$$(e,p){return p.getElementsByTagName(e)}

ALEXACC.accordion=function(){
	function slider(n){this.n=n; this.a=[]}
	slider.prototype.init=function(t,e,m,o,k){
		var a=T$(t), i=s=0, n=a.childNodes, l=n.length; this.s=k||0; this.m=m||0;
		for(i;i<l;i++){
			var v=n[i];
			if(v.nodeType!=3){
				this.a[s]={}; this.a[s].h=h=T$$(e,v)[0]; this.a[s].c=c=T$$('div',v)[0]; h.onclick=new Function(this.n+'.pr(0,'+s+')');
				if(o==s){h.className=this.s; c.style.height='auto'; c.d=1}else{c.style.height=0; c.d=-1} s++
			}
		}
		this.l=s
	};
	slider.prototype.pr=function(f,d){
		for(var i=0;i<this.l;i++){
			var h=this.a[i].h, c=this.a[i].c, k=c.style.height; k=k=='auto'?1:parseInt(k); clearInterval(c.t);
			if((k!=1&&c.d==-1)&&(f==1||i==d)){
				c.style.height=''; c.m=c.offsetHeight; c.style.height=k+'px'; c.d=1; h.className=this.s; su(c,1)
			}else if(k>0&&(f==-1||this.m||i==d)){
				c.d=-1; h.className=''; su(c,-1)
			}
		}
	};
	function su(c){c.t=setInterval(function(){sl(c)},20)};
	function sl(c){
		var h=c.offsetHeight, d=c.d==1?c.m-h:h; c.style.height=h+(Math.ceil(d/5)*c.d)+'px';
		c.style.opacity=h/c.m; c.style.filter='alpha(opacity='+h*100/c.m+')';
		if((c.d==1&&h>=c.m)||(c.d!=1&&h==1)){if(c.d==1){c.style.height='auto'} clearInterval(c.t)}
	};
	return{slider:slider}
}();


(function($) {
	$.extend($.fx.step,{
	    backgroundPosition: function(fx) {
            if (fx.state === 0 && typeof fx.end == 'string') {
                var start = $(fx.elem).css('backgroundPosition');
                start = toArray(start);
                fx.start = [start[0],start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0],end[2]];
                fx.unit = [end[1],end[3]];
			}
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

           function toArray(strg){
               strg = strg.replace(/left|top/g,'0px');
               strg = strg.replace(/right|bottom/g,'100%');
               strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
               var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
               return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
           }
        }
	});
})(jQuery);

