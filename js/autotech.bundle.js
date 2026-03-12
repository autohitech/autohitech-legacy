/**
 * Autotech Unified JS Bundle (Modernized for jQuery 3.7.1 & ES6+)
 * Includes: Core Namespaces, Easing, msAccordion, and UI Effects
 */

// 1. Core Namespaces
const G4 = window.G4 || {};
G4.util = {
    escape_html: (str) => {
        if (!str) return "";
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return str.toString().replace(/[&<>"']/g, (m) => map[m]);
    },
    trim: (s) => s ? s.toString().replace(/^\s+|\s+$/g, "") : "",
    number_format: (data) => data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","),
    no_comma: (data) => data.toString().replace(/,/g, ""),
    check_byte: (content_id, target_id) => {
        const el = document.getElementById(content_id);
        if (!el) return 0;
        const cont = el.value;
        let cnt = 0;
        for (let i = 0; i < cont.length; i++) {
            cnt += (escape(cont.charAt(i)).length > 4) ? 2 : 1;
        }
        const target = document.getElementById(target_id);
        if (target) target.textContent = cnt;
        return cnt;
    }
};

G4.cookie = {
    set: (name, value, expirehours, domain) => {
        const today = new Date();
        today.setTime(today.getTime() + (60 * 60 * 1000 * expirehours));
        let cookie = `${name}=${escape(value)}; path=/; expires=${today.toGMTString()};`;
        if (domain) cookie += `domain=${domain};`;
        document.cookie = cookie;
    },
    get: (name) => {
        const cookies = document.cookie.split("; ");
        for (let i = 0; i < cookies.length; i++) {
            const parts = cookies[i].split("=");
            if (parts[0] === name) return unescape(parts[1]);
        }
        return "";
    },
    delete: (name) => G4.cookie.set(name, "", -1)
};

G4.win = {
    popup: (url, winname, opt) => window.open(url, winname, opt),
    open: (url, name, option) => {
        const win = window.open(url, name, option);
        if (win) win.focus();
        return win;
    }
};

G4.ajax = {
    create_request: () => { try { return new XMLHttpRequest(); } catch (e) { return null; } },
    trackback_send_server: (url) => {
        const req = G4.ajax.create_request();
        if (!req) return;
        req.onreadystatechange = () => {
            if (req.readyState === 4 && req.status === 200) {
                prompt("아래 주소를 복사하세요.", `${url}/${req.responseText}`);
            }
        };
        req.open("POST", `${g4_path}/${g4_bbs}/tb_token.php`, true);
        req.send(null);
    }
};

// Global Aliases
window.trim = G4.util.trim;
window.number_format = G4.util.number_format;
window.no_comma = G4.util.no_comma;
window.set_cookie = G4.cookie.set;
window.get_cookie = G4.cookie.get;
window.delete_cookie = G4.cookie.delete;
window.popup_window = G4.win.popup;
window.win_open = G4.win.open;
window.create_request = G4.ajax.create_request;
window.trackback_send_server = G4.ajax.trackback_send_server;

window.G4_Popup = (url, winname, width = 720, height = 615, left = 0, top = 0, scrollbars = false) => {
    const finalLeft = (left === 0) ? (screen.width - width) / 2 : left;
    const finalTop = (top === 0) ? (screen.height - height) / 2 : top;
    const features = `width=${width},height=${height},left=${finalLeft},top=${finalTop},scrollbars=${scrollbars ? "yes" : "no"},resizable=yes,status=no,toolbar=no,menubar=no,location=no`;
    const win = window.open(url, winname, features);
    if (win) win.focus();
    return win;
};

window.MM_openBrWindow = (theURL, winName, features) => {
    let width = 720, height = 615, scrollbars = false;
    if (features) {
        const wMatch = features.match(/width=([0-9]+)/);
        if (wMatch) width = parseInt(wMatch[1]);
        const hMatch = features.match(/height=([0-9]+)/);
        if (hMatch) height = parseInt(hMatch[1]);
        if (features.indexOf("scrollbars=yes") > -1) scrollbars = true;
    }
    return G4_Popup(theURL, winName, width, height, null, null, scrollbars);
};

window.ModalAlert = (msg) => alert(msg);
window.ModalConfirm = (msg, title, callback) => {
    const result = confirm(msg);
    if (typeof callback === 'function') callback(result);
};

// 2. jQuery Easing (Simplified for modern use)
$.extend($.easing, {
    easeOutExpo: (x) => (x === 1) ? 1 : 1 - Math.pow(2, -10 * x)
});

// 3. msAccordion Plugin (Direct & Robust Implementation)
(function($){
    $.fn.msAccordion = function(options) {
        const settings = $.extend({ defaultid: 0, speed: 400 }, options);
        const $container = $(this);
        const $sets = $container.find(".set");
        let activeSet = null;

        if ($sets.length === 0) return;

        // Force critical styles
        $container.css({ display: 'block', overflow: 'hidden', width: '100%' });
        
        const closeSet = ($set) => {
            $set.find(".content").stop().animate({ width: '0px' }, settings.speed, function() {
                $(this).hide();
            });
        };

        const openSet = ($set) => {
            if ($set.hasClass('active')) return;
            
            // Close others
            $sets.not($set).each(function() { 
                $(this).removeClass('active');
                closeSet($(this)); 
            });

            // Open this
            $set.addClass('active');
            $set.find(".content").show().stop().animate({ width: '145px' }, settings.speed);
            activeSet = $set;
        };

        $sets.each(function(i) {
            const $set = $(this);
            const $title = $set.find(".title");
            
            // Layout Reset
            $set.css({ float: 'left', display: 'block', height: '120px', overflow: 'hidden' });
            $title.css({ float: 'left', cursor: 'pointer' });
            $set.find(".content").css({ float: 'left', overflow: 'hidden', width: '0px', display: 'none' });

            $set.on('mouseenter', () => openSet($set));

            // Default open
            if (i === settings.defaultid) {
                $set.addClass('active');
                $set.find(".content").show().css('width', '145px');
                activeSet = $set;
            }
        });
    };
})(jQuery);

// 4. UI Effects Plugins
(function ($) {
    $.fn.overexchange = function (p, opt, speed = 200) {
        return this.each(function () {
            const $el = $(this);
            const imgurl = $el.attr("src");
            const myselected = $el.attr("selected");

            const initEffect = (imgW, imgH) => {
                // If dimensions are missing, try to get them from a temporary clone
                if (imgW <= 0 || imgH <= 0) {
                    const $clone = $el.clone().css({
                        position: 'absolute',
                        visibility: 'hidden',
                        display: 'block',
                        left: '-9999px',
                        top: '-9999px',
                        width: 'auto',
                        height: 'auto'
                    }).appendTo('body');
                    imgW = $clone.width();
                    imgH = $clone.height();
                    $clone.remove();
                }

                if (imgW <= 0 || imgH <= 0) return;
                
                // For ovex/ovup/sovup, we always assume a 2-frame vertical sprite
                const itemH = imgH / p;
                const imgheight = (opt === "sup") ? "15px" : `${itemH}px`;
                const toimg = `-${itemH}px`;
                
                const $wrapper = $el.closest('.ved-wrapper').length ? $el.closest('.ved-wrapper') : 
                                ($el.attr("link") === 'no' ? $el.wrap('<div class="ved-wrapper">').parent() : $el.parent().wrap('<div class="ved-wrapper">').parent());

                const $link = $el.parent('a');
                if ($link.length) $link.css({ display: 'block', margin: 0, padding: 0, border: 'none', background: 'none' });

                $el.css({ display: 'block', visibility: 'visible', opacity: 1 }); // Force show
                $wrapper.css({ 
                    overflow: 'hidden', 
                    position: 'relative', 
                    width: `${imgW}px`, 
                    height: imgheight, 
                    display: 'inline-block', 
                    verticalAlign: 'top', 
                    margin: '0',
                    padding: '0',
                    background: 'none' 
                });
                $el.css({ position: 'relative', display: 'block', verticalAlign: 'top', margin: '0', padding: '0', background: 'none' });
                
                if (myselected) {
                    $el.css({ top: toimg });
                } else {
                    $el.css({ top: '0px' });
                    if (opt !== "sup") {
                        $wrapper.off('mouseenter mouseleave').on('mouseenter', () => $el.stop().animate({ top: toimg }, speed))
                               .on('mouseleave', () => $el.stop().animate({ top: "0px" }, speed));
                    }
                }
            };

            const tempImg = new Image();
            tempImg.onload = function() { initEffect(this.width, this.height); };
            tempImg.src = imgurl;
            if (tempImg.complete) initEffect(tempImg.width, tempImg.height);
        });
    };

    $.fn.mainexchange = function (speed = 200) {
        return this.each(function () {
            const $el = $(this);
            const initMain = (imgW, imgH) => {
                const imgwidth = `${imgW / 2}px`;
                const ltimg = `-${imgW / 2}px`;
                const $wrapper = $el.closest('.mainved-wrapper').length ? $el.closest('.mainved-wrapper') : 
                                ($el.attr("link") === 'no' ? $el.wrap('<div class="mainved-wrapper">').parent() : $el.parent().wrap('<div class="mainved-wrapper">').parent());

                const $link = $el.parent('a');
                if ($link.length) $link.css({ display: 'block', margin: 0, padding: 0, border: 'none', background: 'none' });

                $wrapper.css({ overflow: 'hidden', position: 'relative', width: imgwidth, height: `${imgH}px`, display: 'inline-block', verticalAlign: 'top', background: 'none' });
                $el.css({ display: 'block', position: 'relative', left: ltimg, background: 'none' });
                $wrapper.off('mouseenter mouseleave').on('mouseenter', () => $el.stop().animate({ left: "0px" }, speed))
                        .on('mouseleave', () => $el.stop().animate({ left: ltimg }, speed));
            };
            const tempImg = new Image();
            tempImg.onload = function() { initMain(this.width, this.height); };
            tempImg.src = $el.attr("src");
        });
    };

    $.fn.GlobalEffectFly = function (options) {
        const s = $.extend({ dirType: 'left', stageW: 0, stageH: 0, startW: 0, startH: 0, endPos: 0, speed: 200, delay: 200, easing: "easeOutExpo" }, options);
        return this.each(function () {
            const $el = $(this);
            const initFly = (imgW, imgH) => {
                let startt = s.startH, startl;
                switch (s.dirType) {
                    case "left":  startl = imgW * 2; break;
                    case "right": startl = -(imgW * 2); break;
                    case "top":   startt = imgH * 2; startl = s.startW; break;
                    default:      startl = imgW * 2;
                }
                const $wrapper = $el.parent().hasClass('fly-wrapper') ? $el.parent() : $el.wrap('<div class="fly-wrapper">').parent();
                $wrapper.css({ overflow: 'hidden', position: 'absolute', width: `${s.stageW}px`, height: `${s.stageH}px`, background: 'none' });
                $el.css({ display: 'block', position: 'absolute', top: `${startt}px`, left: `${startl}px`, background: 'none' });
                setTimeout(() => {
                    const anim = (s.dirType === "top") ? { top: `${s.endPos}px` } : { left: `${s.endPos}px` };
                    $el.stop().animate(anim, { duration: s.speed, easing: s.easing });
                }, s.delay);
            };
            const tempImg = new Image();
            tempImg.onload = function() { initFly(this.width, this.height); };
            tempImg.src = $el.attr("src");
        });
    };
})(jQuery);

// 5. Initialization
$(document).ready(() => {
    // Initializing Hover & Animation Effects
    $('img.sovup').overexchange(2, 'sup', 200);
    $('img.ovsub').overexchange(2, 'sub', 200);
    $('img.ovex').overexchange(2, 'up', 1);
    $('.overed').overexchange(2, '', 1);
    $('img.gexchange').overexchange(2, 'sub', 200);
    $('img.ovup').overexchange(2, 'up', 200);
    $('img.mainani').mainexchange(200);

    $('.s_txtT').GlobalEffectFly({ dirType: 'right', stageW: 730, stageH: 155, startH: 50, endPos: 230, speed: 300, delay: 200});
    $('.s_txtB').GlobalEffectFly({ dirType: 'left',  stageW: 730, stageH: 155, startH: 73, endPos: 230, speed: 500, delay: 300});
    $('.s_imgL').GlobalEffectFly({ dirType: 'top',   stageW: 150, stageH: 130, startW: 0,  speed: 400, delay: 400});
    $('.s_imgR').GlobalEffectFly({ dirType: 'top',   stageW: 980, stageH: 155, startW: 730,  speed: 600, delay: 500});
    $('.s_imgR_company').GlobalEffectFly({ dirType: 'top', stageW: 980, stageH: 130, startW: 730, speed: 600, delay: 500});
    $('.s_imgR_system').GlobalEffectFly({ dirType: 'top',  stageW: 980, stageH: 155, startW: 730, endPos: -15, speed: 600, delay: 500});

    // Applying Global Hover Events (Legacy Support)
    $("#topnav li").on('mouseenter', function() {
        const $li = $(this);
        // m02 (Controller), m03 (SCADA&Touch), m05 (Education) - no submenus on hover
        if (!$li.hasClass('m02') && !$li.hasClass('m03') && !$li.hasClass('m05')) {
            const $span = $li.find("span");
            if ($span.length) {
                $span.stop().css({ 'z-index': '10001', 'position': 'absolute', 'top': '40px', 'left': '0px' }).show();
            }
            $(".subBar").stop().show();
        }
        const $img = $li.find("img.sovup");
        if ($img.length && !$img.attr('selected')) {
            $img.stop().animate({ top: "-15px" }, 200);
        }
    }).on('mouseleave', function() {
        const $li = $(this);
        $li.find("span").stop().hide();
        const $img = $li.find("img.sovup");
        if ($img.length && !$img.attr('selected')) {
            $img.stop().animate({ top: "0px" }, 200);
        }
        $(".subBar").stop().hide();
    });

    if ($("#accordion1").length) {
        $("#accordion1").msAccordion({defaultid:0, speed:300});
    }

    // Font Resizing Logic
    let currentFontSize = 12;
    const $body = $('body');
    $('.increaseFont').on('click', (e) => {
        e.preventDefault();
        if (currentFontSize < 20) {
            currentFontSize += 1;
            $body.css('font-size', `${currentFontSize}px`);
            $('body, table, tr, td').css('font-size', `${currentFontSize}px`);
        }
    });
    $('.decreaseFont').on('click', (e) => {
        e.preventDefault();
        if (currentFontSize > 10) {
            currentFontSize -= 1;
            $body.css('font-size', `${currentFontSize}px`);
            $('body, table, tr, td').css('font-size', `${currentFontSize}px`);
        }
    });
    $('.resetFont').on('click', (e) => {
        e.preventDefault();
        currentFontSize = 12;
        $body.css('font-size', '');
        $('body, table, tr, td').css('font-size', '');
    });

    // TOP Button Follow-Scroll Logic
    const $quickR = $('#quickR');
    if ($quickR.length) {
        const initialTop = parseInt($quickR.css('top')) || 400;
        $(window).on('scroll', () => {
            const scrollTop = $(window).scrollTop();
            $quickR.stop().animate({ top: `${initialTop + scrollTop}px` }, 600, 'easeOutExpo');
        });
    }
});

// 6. SideView Implementation (Security Hardened)
if (typeof(SIDEVIEW_JS) === 'undefined') {
    window.SIDEVIEW_JS = true;
    class SideViewRow {
        constructor(idx, name, htmlContent) {
            this.idx = idx; this.name = name; this.htmlContent = htmlContent; this.isVisible = true;
        }
        render() {
            if (!this.isVisible) return "";
            return `<tr height='19'><td id='sideViewRow_${this.name}'>&nbsp;<font color=gray>&middot;</font>&nbsp;<span style='color: #A0A0A0; font-family: 돋움; font-size: 11px;'>${this.htmlContent}</span></td></tr>`;
        }
    }
    window.SideView = class {
        constructor(targetObj, curObj, mb_id, name, email, homepage) {
            this.targetObj = targetObj; this.curObj = curObj;
            this.mb_id = G4.util.escape_html(mb_id);
            this.name = G4.util.escape_html(name.replace(/…/g, ""));
            this.email = G4.util.escape_html(email);
            this.homepage = G4.util.escape_html(homepage);
            this.heads = []; this.tails = [];
            if (this.mb_id) this.insertTail("memo", `<a href="javascript:win_memo('${g4_path}/${g4_bbs}/memo_form.php?me_recv_mb_id=${this.mb_id}');">쪽지보내기</a>`);
            if (this.homepage) this.insertTail("homepage", `<a href="javascript:;" onclick="window.open('${this.homepage}');">홈페이지</a>`);
            if (typeof g4_bo_table !== 'undefined' && g4_bo_table) {
                if (this.mb_id) this.insertTail("mb_id", `<a href='${g4_path}/${g4_bbs}/board.php?bo_table=${g4_bo_table}&sca=${g4_sca}&sfl=mb_id,1&stx=${this.mb_id}'>아이디로 검색</a>`);
                else this.insertTail("name", `<a href='${g4_path}/${g4_bbs}/board.php?bo_table=${g4_bo_table}&sca=${g4_sca}&sfl=wr_name,1&stx=${this.name}'>이름으로 검색</a>`);
            }
            if (typeof g4_is_admin !== 'undefined' && g4_is_admin === "super") {
                if (this.mb_id) this.insertTail("modify", `<a href='${g4_path}/${g4_admin}/member_form.php?w=u&mb_id=${this.mb_id}' target='_blank'>회원정보변경</a>`);
            }
        }
        insertTail(name, html) { this.tails.push(new SideViewRow(this.tails.length, name, html)); }
        showLayer() {
            window.clickAreaCheck = true;
            let oSideViewLayer = document.getElementById(this.targetObj);
            if (!oSideViewLayer) {
                oSideViewLayer = document.createElement("DIV"); oSideViewLayer.id = this.targetObj;
                oSideViewLayer.style.position = 'absolute'; document.body.appendChild(oSideViewLayer);
            }
            let html = "<table border='0' cellpadding='0' cellspacing='0' width='90' style='border:1px solid #E0E0E0;' bgcolor='#F9FBFB'>";
            this.heads.forEach(row => html += row.render());
            this.tails.forEach(row => html += row.render());
            html += "</table>";
            oSideViewLayer.innerHTML = html;
            const rect = this.curObj.getBoundingClientRect();
            const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            oSideViewLayer.style.top = `${rect.bottom + scrollTop}px`;
            oSideViewLayer.style.left = `${rect.left + scrollLeft}px`;
            oSideViewLayer.style.display = 'block';
        }
    };
    window.showSideView = (curObj, mb_id, name, email, homepage) => {
        const sv = new window.SideView('nameContextMenu', curObj, mb_id, name, email, homepage);
        sv.showLayer();
    };
    window.hideSideView = () => {
        const el = document.getElementById("nameContextMenu");
        if (el) el.style.display = 'none';
    };
    window.clickAreaCheck = false;
    document.addEventListener('click', () => {
        if (!window.clickAreaCheck) window.hideSideView();
        else window.clickAreaCheck = false;
    });
}
