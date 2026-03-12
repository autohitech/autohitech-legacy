/**
 * G4 Core Bundle (Modernized)
 * Includes: board.js, capslock.js, filter.js
 */
const G4_Core = {
    // Board Image Resizing
    resizeBoardImage: (imageWidth, borderColor) => {
        const targets = document.getElementsByName('target_resize_image[]');
        if (!targets) return;

        Array.from(targets).forEach(img => {
            img.tmp_width = img.width;
            img.tmp_height = img.height;

            if (img.width > imageWidth) {
                const ratio = img.width / img.height;
                img.width = imageWidth;
                img.height = parseInt(imageWidth / ratio);
                img.style.cursor = 'pointer';
                img.style.width = '';
                img.style.height = '';
            }

            if (borderColor) {
                img.style.border = `1px solid ${borderColor}`;
            }
        });
    },

    // Font Scaling
    getFontSize: () => {
        const fontSize = parseInt(G4.cookie.get("ck_fontsize"));
        return isNaN(fontSize) ? 12 : fontSize;
    },

    scaleFont: (val) => {
        let fontSize = G4_Core.getFontSize();
        const oldSize = fontSize;
        
        if (val > 0) {
            if (fontSize <= 18) fontSize += val;
        } else {
            if (fontSize > 12) fontSize += val;
        }

        if (fontSize !== oldSize) {
            G4_Core.drawFont(fontSize);
        }
        G4.cookie.set("ck_fontsize", fontSize, 30);
    },

    drawFont: (fontSize) => {
        const size = fontSize || G4_Core.getFontSize();
        const elements = ["writeSubject", "writeContents", "commentContents", "wr_subject", "wr_content"];
        
        elements.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.fontSize = `${size}px`;
        });

        const comment = document.getElementById("commentContents");
        if (comment) {
            const divs = comment.getElementsByTagName("div");
            Array.from(divs).forEach(div => div.style.fontSize = `${size}px`);
        }
    },

    // Word Filtering
    wordFilterCheck: (v) => {
        if (typeof g4_cf_filter === 'undefined' || !g4_cf_filter) return "";
        const filters = g4_cf_filter.split(",").map(s => s.trim()).filter(s => s !== "");
        for (const word of filters) {
            if (v.indexOf(word) !== -1) return word;
        }
        return "";
    },

    // CapsLock Detection
    checkCapsLock: (e, elem_id) => {
        const keyCode = e.keyCode || e.which;
        const shiftKey = e.shiftKey;

        // Caps Lock is ON if:
        // 1. Upper case letter without Shift
        // 2. Lower case letter with Shift
        if (((keyCode >= 65 && keyCode <= 90) && !shiftKey) || 
            ((keyCode >= 97 && keyCode <= 122) && shiftKey)) {
            G4_Core.setCapsLockOn(elem_id);
        }
    },

    setCapsLockOn: (elem_id) => {
        const info = document.getElementById("capslock_info");
        const ref = document.getElementById(elem_id);
        if (info && ref) {
            const rect = ref.getBoundingClientRect();
            const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            info.style.left = `${rect.left + scrollLeft - 4}px`;
            info.style.top = `${rect.bottom + scrollTop}px`;
            info.style.display = "inline";
            setTimeout(() => { info.style.display = "none"; }, 3000);
        }
    }
};

// Global Aliases for Compatibility
window.resizeBoardImage = (w, c) => G4_Core.resizeBoardImage(w, c);
window.scaleFont = (v) => G4_Core.scaleFont(v);
window.drawFont = (s) => G4_Core.drawFont(s);
window.word_filter_check = (v) => G4_Core.wordFilterCheck(v);
window.check_capslock = (e, id) => G4_Core.checkCapsLock(e, id);

// Initialize CapsLock info element
$(() => {
    if (!document.getElementById('capslock_info')) {
        const div = document.createElement("div");
        div.id = 'capslock_info';
        div.style.cssText = "display:none; position:absolute; z-index:10001;";
        div.innerHTML = `<img src="${typeof g4_path !== 'undefined' ? g4_path : '..'}/img/capslock.gif">`;
        document.body.appendChild(div);
    }
});
/**
 * G4 KCaptcha Modernized
 */
const G4_KCaptcha = {
    md5_norobot_key: '',

    imageClick: () => {
        const url = `${typeof g4_path !== 'undefined' ? g4_path : '..'}/${typeof g4_bbs !== 'undefined' ? g4_bbs : 'bbs'}/kcaptcha_session.php`;
        
        $.ajax({
            url: url,
            method: 'POST',
            success: (result) => {
                const imgUrl = `${typeof g4_path !== 'undefined' ? g4_path : '..'}/${typeof g4_bbs !== 'undefined' ? g4_bbs : 'bbs'}/kcaptcha_image.php?t=${new Date().getTime()}`;
                const targetImg = document.getElementById('kcaptcha_image');
                if (targetImg) {
                    targetImg.src = imgUrl;
                }
                G4_KCaptcha.md5_norobot_key = result;
            }
        });
    }
};

// Global Alias
window.imageClick = () => G4_KCaptcha.imageClick();

// Initialize on load
$(() => {
    if (document.getElementById('kcaptcha_image')) {
        G4_KCaptcha.imageClick();
    }
});
/**
 * MD5 implementation (ES6+ Refactored)
 * See http://pajhome.org.uk/crypt/md5 for more info
 */
const G4_MD5 = (() => {
    const hexcase = 0;
    const b64pad  = "";
    const chrsz   = 8;

    const safe_add = (x, y) => {
        const lsw = (x & 0xFFFF) + (y & 0xFFFF);
        const msw = (x >> 16) + (y >> 16) + (lsw >> 16);
        return (msw << 16) | (lsw & 0xFFFF);
    };

    const bit_rol = (num, cnt) => (num << cnt) | (num >>> (32 - cnt));

    const md5_cmn = (q, a, b, x, s, t) => safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s), b);
    const md5_ff = (a, b, c, d, x, s, t) => md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
    const md5_gg = (a, b, c, d, x, s, t) => md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
    const md5_hh = (a, b, c, d, x, s, t) => md5_cmn(b ^ c ^ d, a, b, x, s, t);
    const md5_ii = (a, b, c, d, x, s, t) => md5_cmn(c ^ (b | (~d)), a, b, x, s, t);

    const core_md5 = (x, len) => {
        x[len >> 5] |= 0x80 << ((len) % 32);
        x[(((len + 64) >>> 9) << 4) + 14] = len;
        let a = 1732584193, b = -271733879, c = -1732584194, d = 271733878;
        for (let i = 0; i < x.length; i += 16) {
            let olda = a, oldb = b, oldc = c, oldd = d;
            a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936); d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586); c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819); b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
            a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897); d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426); c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341); b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
            a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416); d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417); c = md5_ff(c, d, a, b, x[i+10], 17, -42063); b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
            a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682); d = md5_ff(d, a, b, c, x[i+13], 12, -40341101); c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290); b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);
            a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510); d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632); c = md5_gg(c, d, a, b, x[i+11], 14,  643717713); b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
            a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691); d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083); c = md5_gg(c, d, a, b, x[i+15], 14, -660478335); b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
            a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438); d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690); c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961); b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
            a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467); d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784); c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473); b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);
            a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558); d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463); c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562); b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
            a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060); d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353); c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632); b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
            a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174); d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222); c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979); b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
            a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487); d = md5_hh(d, a, b, c, x[i+12], 11, -421815835); c = md5_hh(c, d, a, b, x[i+15], 16,  530742520); b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);
            a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844); d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415); c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905); b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
            a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571); d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606); c = md5_ii(c, d, a, b, x[i+10], 15, -1051523); b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
            a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359); d = md5_ii(d, a, b, c, x[i+15], 10, -30611744); c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380); b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
            a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070); d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379); c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259); b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);
            a = safe_add(a, olda); b = safe_add(b, oldb); c = safe_add(c, oldc); d = safe_add(d, oldd);
        }
        return [a, b, c, d];
    };

    const str2binl = (str) => {
        const bin = []; const mask = (1 << chrsz) - 1;
        for (let i = 0; i < str.length * chrsz; i += chrsz) bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (i%32);
        return bin;
    };

    const binl2hex = (binarray) => {
        const hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
        let str = "";
        for (let i = 0; i < binarray.length * 4; i++) str += hex_tab.charAt((binarray[i>>2] >> ((i%4)*8+4)) & 0xF) + hex_tab.charAt((binarray[i>>2] >> ((i%4)*8)) & 0xF);
        return str;
    };

    const binl2b64 = (binarray) => {
        const tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
        let str = "";
        for (let i = 0; i < binarray.length * 4; i += 3) {
            const triplet = (((binarray[i >> 2] >> 8 * (i % 4)) & 0xFF) << 16) | (((binarray[i+1 >> 2] >> 8 * ((i+1)%4)) & 0xFF) << 8 ) | ((binarray[i+2 >> 2] >> 8 * ((i+2)%4)) & 0xFF);
            for (let j = 0; j < 4; j++) {
                if (i * 8 + j * 6 > binarray.length * 32) str += b64pad;
                else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
            }
        }
        return str;
    };

    const binl2str = (bin) => {
        let str = ""; const mask = (1 << chrsz) - 1;
        for (let i = 0; i < bin.length * 32; i += chrsz) str += String.fromCharCode((bin[i>>5] >>> (i % 32)) & mask);
        return str;
    };

    const core_hmac_md5 = (key, data) => {
        let bkey = str2binl(key);
        if (bkey.length > 16) bkey = core_md5(bkey, key.length * chrsz);
        const ipad = Array(16), opad = Array(16);
        for (let i = 0; i < 16; i++) { ipad[i] = bkey[i] ^ 0x36363636; opad[i] = bkey[i] ^ 0x5C5C5C5C; }
        const hash = core_md5(ipad.concat(str2binl(data)), 512 + data.length * chrsz);
        return core_md5(opad.concat(hash), 512 + 128);
    };

    return {
        hex_md5: (s) => binl2hex(core_md5(str2binl(s), s.length * chrsz)),
        b64_md5: (s) => binl2b64(core_md5(str2binl(s), s.length * chrsz)),
        str_md5: (s) => binl2str(core_md5(str2binl(s), s.length * chrsz)),
        hex_hmac_md5: (key, data) => binl2hex(core_hmac_md5(key, data)),
        b64_hmac_md5: (key, data) => binl2b64(core_hmac_md5(key, data)),
        str_hmac_md5: (key, data) => binl2str(core_hmac_md5(key, data))
    };
})();

// Global Aliases
window.hex_md5 = (s) => G4_MD5.hex_md5(s);
window.b64_md5 = (s) => G4_MD5.b64_md5(s);
window.str_md5 = (s) => G4_MD5.str_md5(s);
window.hex_hmac_md5 = (k, d) => G4_MD5.hex_hmac_md5(k, d);
window.b64_hmac_md5 = (k, d) => G4_MD5.b64_hmac_md5(k, d);
window.str_hmac_md5 = (k, d) => G4_MD5.str_hmac_md5(k, d);
