var Hashtable=function(){function c(b){var d;if("string"==typeof b)return b;if(typeof b.hashCode==a)return d=b.hashCode(),"string"==typeof d?d:c(d);if(typeof b.toString==a)return b.toString();try{return String(b)}catch(a){return Object.prototype.toString.call(b)}}function d(a,b){return a.equals(b)}function e(b,c){return typeof c.equals==a?c.equals(b):b===c}function f(a){return function(b){if(null===b)throw new Error("null is not a valid "+a);if("undefined"==typeof b)throw new Error(a+" must not be undefined")}}function i(a,b,c,d){this[0]=a,this.entries=[],this.addEntry(b,c),null!==d&&(this.getEqualityFunction=function(){return d})}function m(a){return function(b){for(var d,c=this.entries.length,e=this.getEqualityFunction(b);c--;)if(d=this.entries[c],e(b,d[0]))switch(a){case j:return!0;case k:return d;case l:return[c,d[1]]}return!1}}function n(a){return function(b){for(var c=b.length,d=0,e=this.entries.length;d<e;++d)b[c+d]=this.entries[d][a]}}function o(a,b){for(var d,c=a.length;c--;)if(d=a[c],b===d[0])return c;return null}function p(a,b){var c=a[b];return c&&c instanceof i?c:null}function q(d,e){var f=this,j=[],k={},l=typeof d==a?d:c,m=typeof e==a?e:null;this.put=function(a,b){g(a),h(b);var d,e,c=l(a),f=null;return d=p(k,c),d?(e=d.getEntryForKey(a),e?(f=e[1],e[1]=b):d.addEntry(a,b)):(d=new i(c,a,b,m),j[j.length]=d,k[c]=d),f},this.get=function(a){g(a);var b=l(a),c=p(k,b);if(c){var d=c.getEntryForKey(a);if(d)return d[1]}return null},this.containsKey=function(a){g(a);var b=l(a),c=p(k,b);return!!c&&c.containsKey(a)},this.containsValue=function(a){h(a);for(var b=j.length;b--;)if(j[b].containsValue(a))return!0;return!1},this.clear=function(){j.length=0,k={}},this.isEmpty=function(){return!j.length};var n=function(a){return function(){for(var b=[],c=j.length;c--;)j[c][a](b);return b}};this.keys=n("keys"),this.values=n("values"),this.entries=n("getEntries"),this.remove=function(a){g(a);var d,c=l(a),e=null,f=p(k,c);return f&&(e=f.removeEntryForKey(a),null!==e&&(f.entries.length||(d=o(j,c),b(j,d),delete k[c]))),e},this.size=function(){for(var a=0,b=j.length;b--;)a+=j[b].entries.length;return a},this.each=function(a){for(var d,b=f.entries(),c=b.length;c--;)d=b[c],a(d[0],d[1])},this.putAll=function(b,c){for(var e,g,h,i,d=b.entries(),j=d.length,k=typeof c==a;j--;)e=d[j],g=e[0],h=e[1],k&&(i=f.get(g))&&(h=c(g,i,h)),f.put(g,h)},this.clone=function(){var a=new q(d,e);return a.putAll(f),a}}var a="function",b=typeof Array.prototype.splice==a?function(a,b){a.splice(b,1)}:function(a,b){var c,d,e;if(b===a.length-1)a.length=b;else for(c=a.slice(b+1),a.length=b,d=0,e=c.length;d<e;++d)a[b+d]=c[d]},g=f("key"),h=f("value"),j=0,k=1,l=2;return i.prototype={getEqualityFunction:function(b){return typeof b.equals==a?d:e},getEntryForKey:m(k),getEntryAndIndexForKey:m(l),removeEntryForKey:function(a){var c=this.getEntryAndIndexForKey(a);return c?(b(this.entries,c[0]),c[1]):null},addEntry:function(a,b){this.entries[this.entries.length]=[a,b]},keys:n(0),values:n(1),getEntries:function(a){for(var b=a.length,c=0,d=this.entries.length;c<d;++c)a[b+c]=this.entries[c].slice(0)},containsKey:m(j),containsValue:function(a){for(var b=this.entries.length;b--;)if(a===this.entries[b][1])return!0;return!1}},q}();
!function(a){function i(a,b,c){this.dec=a,this.group=b,this.neg=c}function j(){for(var a=0;a<h.length;a++){localeGroup=h[a];for(var c=0;c<localeGroup.length;c++)b.put(localeGroup[c],a)}}function k(a,c){0==b.size()&&j();var d=".",e=",",f="-";0==c&&(a.indexOf("_")!=-1?a=a.split("_")[1].toLowerCase():a.indexOf("-")!=-1&&(a=a.split("-")[1].toLowerCase()));var h=b.get(a);if(h){var k=g[h];k&&(d=k[0],e=k[1])}return new i(d,e,f)}var b=new Hashtable,c=["ae","au","ca","cn","eg","gb","hk","il","in","jp","sk","th","tw","us"],d=["at","br","de","dk","es","gr","it","nl","pt","tr","vn"],e=["cz","fi","fr","ru","se","pl"],f=["ch"],g=[[".",","],[",","."],[","," "],[".","'"]],h=[c,d,e,f];a.fn.formatNumber=function(b,c,d){return this.each(function(){null==c&&(c=!0),null==d&&(d=!0);var e;e=a(this).is(":input")?new String(a(this).val()):new String(a(this).text());var f=a.formatNumber(e,b);if(c&&(a(this).is(":input")?a(this).val(f):a(this).text(f)),d)return f})},a.formatNumber=function(b,c){for(var c=a.extend({},a.fn.formatNumber.defaults,c),d=k(c.locale.toLowerCase(),c.isFullLocale),h=(d.dec,d.group,d.neg,"0#-,."),i="",j=!1,l=0;l<c.format.length;l++){if(h.indexOf(c.format.charAt(l))!=-1){if(0==l&&"-"==c.format.charAt(l)){j=!0;continue}break}i+=c.format.charAt(l)}for(var m="",l=c.format.length-1;l>=0&&h.indexOf(c.format.charAt(l))==-1;l--)m=c.format.charAt(l)+m;c.format=c.format.substring(i.length),c.format=c.format.substring(0,c.format.length-m.length);var n=new Number(b);return a._formatNumber(n,c,m,i,j)},a._formatNumber=function(b,c,d,e,f){var c=a.extend({},a.fn.formatNumber.defaults,c),g=k(c.locale.toLowerCase(),c.isFullLocale),h=g.dec,i=g.group,j=g.neg,l=!1;if(isNaN(b)){if(1!=c.nanForceZero)return null;b=0,l=!0}"%"==d&&(b=100*b);var m="";if(c.format.indexOf(".")>-1){var n=h,o=c.format.substring(c.format.lastIndexOf(".")+1);if(1==c.round)b=new Number(b.toFixed(o.length));else{var p=b.toString();p=p.substring(0,p.lastIndexOf(".")+o.length+1),b=new Number(p)}var q=b%1,r=new String(q.toFixed(o.length));r=r.substring(r.lastIndexOf(".")+1);for(var s=0;s<o.length;s++)if("#"!=o.charAt(s)||"0"==r.charAt(s)){if("#"==o.charAt(s)&&"0"==r.charAt(s)){var t=r.substring(s);if(t.match("[1-9]")){n+=r.charAt(s);continue}break}"0"==o.charAt(s)&&(n+=r.charAt(s))}else n+=r.charAt(s);m+=n}else b=Math.round(b);var u=Math.floor(b);b<0&&(u=Math.ceil(b));var v="";v=c.format.indexOf(".")==-1?c.format:c.format.substring(0,c.format.indexOf("."));var w="";if(0!=u||"#"!=v.substr(v.length-1)||l){var x=new String(Math.abs(u)),y=9999;v.lastIndexOf(",")!=-1&&(y=v.length-v.lastIndexOf(",")-1);for(var z=0,s=x.length-1;s>-1;s--)w=x.charAt(s)+w,z++,z==y&&0!=s&&(w=i+w,z=0);if(v.length>w.length){var A=v.indexOf("0");if(A!=-1)for(var B=v.length-A,C=v.length-w.length-1;w.length<B;){var D=v.charAt(C);","==D&&(D=i),w=D+w,C--}}}return w||v.indexOf("0",v.length-1)===-1||(w="0"),m=w+m,b<0&&f&&e.length>0?e=j+e:b<0&&(m=j+m),c.decimalSeparatorAlwaysShown||m.lastIndexOf(h)==m.length-1&&(m=m.substring(0,m.length-1)),m=e+m+d},a.fn.parseNumber=function(b,c,d){null==c&&(c=!0),null==d&&(d=!0);var e;e=a(this).is(":input")?new String(a(this).val()):new String(a(this).text());var f=a.parseNumber(e,b);if(f&&(c&&(a(this).is(":input")?a(this).val(f.toString()):a(this).text(f.toString())),d))return f},a.parseNumber=function(b,c){for(var c=a.extend({},a.fn.parseNumber.defaults,c),d=k(c.locale.toLowerCase(),c.isFullLocale),e=d.dec,f=d.group,g=d.neg,h="1234567890.-";b.indexOf(f)>-1;)b=b.replace(f,"");b=b.replace(e,".").replace(g,"-");var i="",j=!1;"%"!=b.charAt(b.length-1)&&1!=c.isPercentage||(j=!0);for(var l=0;l<b.length;l++)h.indexOf(b.charAt(l))>-1&&(i+=b.charAt(l));var m=new Number(i);if(j){m/=100;var n=i.indexOf(".");if(n!=-1){var o=i.length-n-1;m=m.toFixed(o+2)}else m=m.toFixed(i.length-1)}return m},a.fn.parseNumber.defaults={locale:"us",decimalSeparatorAlwaysShown:!1,isPercentage:!1,isFullLocale:!1},a.fn.formatNumber.defaults={format:"#,###.00",locale:"us",decimalSeparatorAlwaysShown:!1,nanForceZero:!0,round:!0,isFullLocale:!1},Number.prototype.toFixed=function(b){return a._roundNumber(this,b)},a._roundNumber=function(a,b){var c=Math.pow(10,b||0),d=String(Math.round(a*c)/c);if(b>0){var e=d.indexOf(".");for(e==-1?(d+=".",e=0):e=d.length-(e+1);e<b;)d+="0",e++}return d}}(jQuery);
!function(){var a={};this.tmpl=function b(c,d){var e=/\W/.test(c)?new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+c.replace(/[\r\t\n]/g," ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g,"$1\r").replace(/\t=(.*?)%>/g,"',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'")+"');}return p.join('');"):a[c]=a[c]||b(document.getElementById(c).innerHTML);return d?e(d):e}}();