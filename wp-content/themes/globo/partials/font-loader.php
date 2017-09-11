<?php
/**
 * The purpose of this file is to
 * conditionally load the font css
 * depending on if we have stored it
 * already in localstorage or native
 * browser storage
 *
 * @package globo
 */
?>
<script type="text/javascript">
    !function(){"use strict";function e(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)}function t(e){return window.localStorage&&localStorage.font_css_cache&&localStorage.font_css_cache_file===e}function n(){if(window.localStorage&&window.XMLHttpRequest)if(t(o))c(localStorage.font_css_cache);else{var e=new XMLHttpRequest;e.open("GET",o,!0),e.onreadystatechange=function(){4===e.readyState&&(c(e.responseText),localStorage.font_css_cache=e.responseText,localStorage.font_css_cache_file=o)},e.send()}else{var n=document.createElement("link");n.href=o,n.rel="stylesheet",n.type="text/css",document.getElementsByTagName("head")[0].appendChild(n),document.cookie="font_css_cache"}}function c(e){var t=document.createElement("style");t.setAttribute("type","text/css"),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e,document.getElementsByTagName("head")[0].appendChild(t)}var o="./wp-content/themes/globo/web-fonts.css";window.localStorage&&localStorage.font_css_cache||document.cookie.indexOf("font_css_cache")>-1?n():e(window,"load",n)}();
</script>