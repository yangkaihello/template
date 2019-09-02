// rem.js
// 
(function (doc, win) {
   var viewport = document.querySelector("meta[name=viewport]");
   var initClientWidth = 375;
  var docEl = doc.documentElement,
  resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
  recalc = function () {
      var clientWidth = docEl.clientWidth;
      if (!clientWidth) return;
      // 默认设计图为640的情况下1rem=100px；根据自己需求修改
      docEl.style.fontSize = 100 * (clientWidth / initClientWidth) + 'px';
  };
  if (!doc.addEventListener) return;
  win.addEventListener(resizeEvt, recalc, false);
  doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);