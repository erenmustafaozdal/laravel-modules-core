var Pixastic=function(){function a(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)}function b(b){var c=!1,d=function(){c||(c=!0,b())};document.write('<script defer src="//:" id="__onload_ie_pixastic__"></script>');var e=document.getElementById("__onload_ie_pixastic__");e.onreadystatechange=function(){"complete"==e.readyState&&(e.parentNode.removeChild(e),d())},document.addEventListener&&document.addEventListener("DOMContentLoaded",d,!1),a(window,"load",d)}function c(){for(var a=d("pixastic",null,"img"),b=d("pixastic",null,"canvas"),c=a.concat(b),e=0;e<c.length;e++)!function(){for(var a=c[e],b=[],d=a.className.split(" "),f=0;f<d.length;f++){var g=d[f];if("pixastic-"==g.substring(0,9)){var h=g.substring(9);""!=h&&b.push(h)}}if(b.length)if("img"==a.tagName.toLowerCase()){var i=new Image;if(i.src=a.src,i.complete)for(var j=0;j<b.length;j++){var k=Pixastic.applyAction(a,a,b[j],null);k&&(a=k)}else i.onload=function(){for(var c=0;c<b.length;c++){var d=Pixastic.applyAction(a,a,b[c],null);d&&(a=d)}}}else setTimeout(function(){for(var c=0;c<b.length;c++){var d=Pixastic.applyAction(a,a,b[c],null);d&&(a=d)}},1)}()}function d(a,b,c){var d=new Array;null==b&&(b=document),null==c&&(c="*");var e=b.getElementsByTagName(c),f=e.length,g=new RegExp("(^|\\s)"+a+"(\\s|$)");for(i=0,j=0;i<f;i++)g.test(e[i].className)&&(d[j]=e[i],j++);return d}function f(a,b){if(Pixastic.debug)try{switch(b){case"warn":console.warn("Pixastic:",a);break;case"error":console.error("Pixastic:",a);break;default:console.log("Pixastic:",a)}}catch(a){}}"undefined"!=typeof pixastic_parseonload&&pixastic_parseonload&&b(c);var g=function(){var a=document.createElement("canvas"),b=!1;try{b=!("function"!=typeof a.getContext||!a.getContext("2d"))}catch(a){}return function(){return b}}(),h=function(){var c,a=document.createElement("canvas"),b=!1;try{"function"==typeof a.getContext&&(c=a.getContext("2d"))&&(b="function"==typeof c.getImageData)}catch(a){}return function(){return b}}(),k=function(){var a=!1,b=document.createElement("canvas");if(g()&&h()){b.width=b.height=1;var c=b.getContext("2d");c.fillStyle="rgb(255,0,0)",c.fillRect(0,0,1,1);var d=document.createElement("canvas");d.width=d.height=1;var e=d.getContext("2d");e.fillStyle="rgb(0,0,255)",e.fillRect(0,0,1,1),c.globalAlpha=.5,c.drawImage(d,0,0);var f=c.getImageData(0,0,1,1).data;a=255!=f[2]}return function(){return a}}();return{parseOnLoad:!1,debug:!1,applyAction:function(a,b,c,d){d=d||{};var e="canvas"==a.tagName.toLowerCase();if(e&&Pixastic.Client.isIE())return Pixastic.debug&&f("Tried to process a canvas element but browser is IE."),!1;var g,h,i=!1;Pixastic.Client.hasCanvas()&&(i=!!d.resultCanvas,g=d.resultCanvas||document.createElement("canvas"),h=g.getContext("2d"));var j=a.offsetWidth,k=a.offsetHeight;if(e&&(j=a.width,k=a.height),0==j||0==k){if(null!=a.parentNode)return void(Pixastic.debug&&f("Image has 0 width and/or height."));var l=a.style.position,m=a.style.left;a.style.position="absolute",a.style.left="-9999px",document.body.appendChild(a),j=a.offsetWidth,k=a.offsetHeight,document.body.removeChild(a),a.style.position=l,a.style.left=m}if(c.indexOf("(")>-1){var n=c;c=n.substr(0,n.indexOf("("));var o=n.match(/\((.*?)\)/);if(o[1]){o=o[1].split(";");for(var p=0;p<o.length;p++)if(thisArg=o[p].split("="),2==thisArg.length)if("rect"==thisArg[0]){var q=thisArg[1].split(",");d[thisArg[0]]={left:parseInt(q[0],10)||0,top:parseInt(q[1],10)||0,width:parseInt(q[2],10)||0,height:parseInt(q[3],10)||0}}else d[thisArg[0]]=thisArg[1]}}d.rect?(d.rect.left=Math.round(d.rect.left),d.rect.top=Math.round(d.rect.top),d.rect.width=Math.round(d.rect.width),d.rect.height=Math.round(d.rect.height)):d.rect={left:0,top:0,width:j,height:k};var r=!1;if(Pixastic.Actions[c]&&"function"==typeof Pixastic.Actions[c].process&&(r=!0),!r)return Pixastic.debug&&f('Invalid action "'+c+'". Maybe file not included?'),!1;if(!Pixastic.Actions[c].checkSupport())return Pixastic.debug&&f('Action "'+c+'" not supported by this browser.'),!1;Pixastic.Client.hasCanvas()?(g!==a&&(g.width=j,g.height=k),i||(g.style.width=j+"px",g.style.height=k+"px"),h.drawImage(b,0,0,j,k),a.__pixastic_org_image?(g.__pixastic_org_image=a.__pixastic_org_image,g.__pixastic_org_width=a.__pixastic_org_width,g.__pixastic_org_height=a.__pixastic_org_height):(g.__pixastic_org_image=a,g.__pixastic_org_width=j,g.__pixastic_org_height=k)):Pixastic.Client.isIE()&&"undefined"==typeof a.__pixastic_org_style&&(a.__pixastic_org_style=a.style.cssText);var s={image:a,canvas:g,width:j,height:k,useData:!0,options:d},t=Pixastic.Actions[c].process(s);return!!t&&(Pixastic.Client.hasCanvas()?(s.useData&&Pixastic.Client.hasCanvasImageData()&&(g.getContext("2d").putImageData(s.canvasData,d.rect.left,d.rect.top),g.getContext("2d").fillRect(0,0,0,0)),d.leaveDOM||(g.title=a.title,g.imgsrc=a.imgsrc,e||(g.alt=a.alt),e||(g.imgsrc=a.src),g.className=a.className,g.style.cssText=a.style.cssText,g.name=a.name,g.tabIndex=a.tabIndex,g.id=a.id,a.parentNode&&a.parentNode.replaceChild&&a.parentNode.replaceChild(g,a)),d.resultCanvas=g,g):a)},prepareData:function(a,b){var c=a.canvas.getContext("2d"),d=a.options.rect,e=c.getImageData(d.left,d.top,d.width,d.height),f=e.data;return b||(a.canvasData=e),f},process:function(a,b,c,d){if("img"==a.tagName.toLowerCase()){var e=new Image;if(e.src=a.src,e.complete){var f=Pixastic.applyAction(a,e,b,c);return d&&d(f),f}e.onload=function(){var f=Pixastic.applyAction(a,e,b,c);d&&d(f)}}if("canvas"==a.tagName.toLowerCase()){var f=Pixastic.applyAction(a,a,b,c);return d&&d(f),f}},revert:function(a){if(Pixastic.Client.hasCanvas()){if("canvas"==a.tagName.toLowerCase()&&a.__pixastic_org_image)return a.width=a.__pixastic_org_width,a.height=a.__pixastic_org_height,a.getContext("2d").drawImage(a.__pixastic_org_image,0,0),a.parentNode&&a.parentNode.replaceChild&&a.parentNode.replaceChild(a.__pixastic_org_image,a),a}else Pixastic.Client.isIE()&&"undefined"!=typeof a.__pixastic_org_style&&(a.style.cssText=a.__pixastic_org_style)},Client:{hasCanvas:g,hasCanvasImageData:h,hasGlobalAlpha:k,isIE:function(){return!!document.all&&!!window.attachEvent&&!window.opera}},Actions:{}}}();Pixastic.Actions.blur={process:function(a){if("undefined"==typeof a.options.fixMargin&&(a.options.fixMargin=!0),Pixastic.Client.hasCanvasImageData()){for(var b=Pixastic.prepareData(a),c=Pixastic.prepareData(a,!0),d=[[0,1,0],[1,2,1],[0,1,0]],e=0,f=0;f<3;f++)for(var g=0;g<3;g++)e+=d[f][g];e=1/(2*e);var h=a.options.rect,i=h.width,j=h.height,k=4*i,l=j;do{var m=(l-1)*k,n=1==l?0:l-2,o=l==j?l-1:l,p=n*i*4,q=o*i*4,r=i;do{var s=m+(4*r-4),t=p+4*(1==r?0:r-2),u=q+4*(r==i?r-1:r);b[s]=(2*(c[t]+c[s-4]+c[s+4]+c[u])+4*c[s])*e,b[s+1]=(2*(c[t+1]+c[s-3]+c[s+5]+c[u+1])+4*c[s+1])*e,b[s+2]=(2*(c[t+2]+c[s-2]+c[s+6]+c[u+2])+4*c[s+2])*e}while(--r)}while(--l);return!0}if(Pixastic.Client.isIE())return a.image.style.filter+=" progid:DXImageTransform.Microsoft.Blur(pixelradius=1.5)",a.options.fixMargin&&(a.image.style.marginLeft=(parseInt(a.image.style.marginLeft,10)||0)-2+"px",a.image.style.marginTop=(parseInt(a.image.style.marginTop,10)||0)-2+"px"),!0},checkSupport:function(){return Pixastic.Client.hasCanvasImageData()||Pixastic.Client.isIE()}},Pixastic.Actions.blurfast={process:function(a){var b=parseFloat(a.options.amount)||0,c=!(!a.options.clear||"false"==a.options.clear);if(b=Math.max(0,Math.min(5,b)),Pixastic.Client.hasCanvas()){var d=a.options.rect,e=a.canvas.getContext("2d");e.save(),e.beginPath(),e.rect(d.left,d.top,d.width,d.height),e.clip();var f=2,g=Math.round(a.width/f),h=Math.round(a.height/f),i=document.createElement("canvas");i.width=g,i.height=h;for(var c=!1,j=Math.round(20*b),k=i.getContext("2d"),l=0;l<j;l++){var m=Math.max(1,Math.round(g-l)),n=Math.max(1,Math.round(h-l));k.clearRect(0,0,g,h),k.drawImage(a.canvas,0,0,a.width,a.height,0,0,m,n),c&&e.clearRect(d.left,d.top,d.width,d.height),e.drawImage(i,0,0,m,n,0,0,a.width,a.height)}return e.restore(),a.useData=!1,!0}if(Pixastic.Client.isIE()){var o=10*b;return a.image.style.filter+=" progid:DXImageTransform.Microsoft.Blur(pixelradius="+o+")",a.options.fixMargin,a.image.style.marginLeft=(parseInt(a.image.style.marginLeft,10)||0)-Math.round(o)+"px",a.image.style.marginTop=(parseInt(a.image.style.marginTop,10)||0)-Math.round(o)+"px",!0}},checkSupport:function(){return Pixastic.Client.hasCanvas()||Pixastic.Client.isIE()}};