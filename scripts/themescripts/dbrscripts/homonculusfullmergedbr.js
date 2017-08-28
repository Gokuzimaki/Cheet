/*! jQuery v2.1.3 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
!function(a,b){"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){var c=[],d=c.slice,e=c.concat,f=c.push,g=c.indexOf,h={},i=h.toString,j=h.hasOwnProperty,k={},l=a.document,m="2.1.3",n=function(a,b){return new n.fn.init(a,b)},o=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,p=/^-ms-/,q=/-([\da-z])/gi,r=function(a,b){return b.toUpperCase()};n.fn=n.prototype={jquery:m,constructor:n,selector:"",length:0,toArray:function(){return d.call(this)},get:function(a){return null!=a?0>a?this[a+this.length]:this[a]:d.call(this)},pushStack:function(a){var b=n.merge(this.constructor(),a);return b.prevObject=this,b.context=this.context,b},each:function(a,b){return n.each(this,a,b)},map:function(a){return this.pushStack(n.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(d.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(0>a?b:0);return this.pushStack(c>=0&&b>c?[this[c]]:[])},end:function(){return this.prevObject||this.constructor(null)},push:f,sort:c.sort,splice:c.splice},n.extend=n.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||n.isFunction(g)||(g={}),h===i&&(g=this,h--);i>h;h++)if(null!=(a=arguments[h]))for(b in a)c=g[b],d=a[b],g!==d&&(j&&d&&(n.isPlainObject(d)||(e=n.isArray(d)))?(e?(e=!1,f=c&&n.isArray(c)?c:[]):f=c&&n.isPlainObject(c)?c:{},g[b]=n.extend(j,f,d)):void 0!==d&&(g[b]=d));return g},n.extend({expando:"jQuery"+(m+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===n.type(a)},isArray:Array.isArray,isWindow:function(a){return null!=a&&a===a.window},isNumeric:function(a){return!n.isArray(a)&&a-parseFloat(a)+1>=0},isPlainObject:function(a){return"object"!==n.type(a)||a.nodeType||n.isWindow(a)?!1:a.constructor&&!j.call(a.constructor.prototype,"isPrototypeOf")?!1:!0},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?h[i.call(a)]||"object":typeof a},globalEval:function(a){var b,c=eval;a=n.trim(a),a&&(1===a.indexOf("use strict")?(b=l.createElement("script"),b.text=a,l.head.appendChild(b).parentNode.removeChild(b)):c(a))},camelCase:function(a){return a.replace(p,"ms-").replace(q,r)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b,c){var d,e=0,f=a.length,g=s(a);if(c){if(g){for(;f>e;e++)if(d=b.apply(a[e],c),d===!1)break}else for(e in a)if(d=b.apply(a[e],c),d===!1)break}else if(g){for(;f>e;e++)if(d=b.call(a[e],e,a[e]),d===!1)break}else for(e in a)if(d=b.call(a[e],e,a[e]),d===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(o,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(s(Object(a))?n.merge(c,"string"==typeof a?[a]:a):f.call(c,a)),c},inArray:function(a,b,c){return null==b?-1:g.call(b,a,c)},merge:function(a,b){for(var c=+b.length,d=0,e=a.length;c>d;d++)a[e++]=b[d];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;g>f;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,f=0,g=a.length,h=s(a),i=[];if(h)for(;g>f;f++)d=b(a[f],f,c),null!=d&&i.push(d);else for(f in a)d=b(a[f],f,c),null!=d&&i.push(d);return e.apply([],i)},guid:1,proxy:function(a,b){var c,e,f;return"string"==typeof b&&(c=a[b],b=a,a=c),n.isFunction(a)?(e=d.call(arguments,2),f=function(){return a.apply(b||this,e.concat(d.call(arguments)))},f.guid=a.guid=a.guid||n.guid++,f):void 0},now:Date.now,support:k}),n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(a,b){h["[object "+b+"]"]=b.toLowerCase()});function s(a){var b=a.length,c=n.type(a);return"function"===c||n.isWindow(a)?!1:1===a.nodeType&&b?!0:"array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a}var t=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=hb(),z=hb(),A=hb(),B=function(a,b){return a===b&&(l=!0),0},C=1<<31,D={}.hasOwnProperty,E=[],F=E.pop,G=E.push,H=E.push,I=E.slice,J=function(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return c;return-1},K="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",L="[\\x20\\t\\r\\n\\f]",M="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",N=M.replace("w","w#"),O="\\["+L+"*("+M+")(?:"+L+"*([*^$|!~]?=)"+L+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+N+"))|)"+L+"*\\]",P=":("+M+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+O+")*)|.*)\\)|)",Q=new RegExp(L+"+","g"),R=new RegExp("^"+L+"+|((?:^|[^\\\\])(?:\\\\.)*)"+L+"+$","g"),S=new RegExp("^"+L+"*,"+L+"*"),T=new RegExp("^"+L+"*([>+~]|"+L+")"+L+"*"),U=new RegExp("="+L+"*([^\\]'\"]*?)"+L+"*\\]","g"),V=new RegExp(P),W=new RegExp("^"+N+"$"),X={ID:new RegExp("^#("+M+")"),CLASS:new RegExp("^\\.("+M+")"),TAG:new RegExp("^("+M.replace("w","w*")+")"),ATTR:new RegExp("^"+O),PSEUDO:new RegExp("^"+P),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+L+"*(even|odd|(([+-]|)(\\d*)n|)"+L+"*(?:([+-]|)"+L+"*(\\d+)|))"+L+"*\\)|)","i"),bool:new RegExp("^(?:"+K+")$","i"),needsContext:new RegExp("^"+L+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+L+"*((?:-\\d)?\\d*)"+L+"*\\)|)(?=[^-]|$)","i")},Y=/^(?:input|select|textarea|button)$/i,Z=/^h\d$/i,$=/^[^{]+\{\s*\[native \w/,_=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,ab=/[+~]/,bb=/'|\\/g,cb=new RegExp("\\\\([\\da-f]{1,6}"+L+"?|("+L+")|.)","ig"),db=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:0>d?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},eb=function(){m()};try{H.apply(E=I.call(v.childNodes),v.childNodes),E[v.childNodes.length].nodeType}catch(fb){H={apply:E.length?function(a,b){G.apply(a,I.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function gb(a,b,d,e){var f,h,j,k,l,o,r,s,w,x;if((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,d=d||[],k=b.nodeType,"string"!=typeof a||!a||1!==k&&9!==k&&11!==k)return d;if(!e&&p){if(11!==k&&(f=_.exec(a)))if(j=f[1]){if(9===k){if(h=b.getElementById(j),!h||!h.parentNode)return d;if(h.id===j)return d.push(h),d}else if(b.ownerDocument&&(h=b.ownerDocument.getElementById(j))&&t(b,h)&&h.id===j)return d.push(h),d}else{if(f[2])return H.apply(d,b.getElementsByTagName(a)),d;if((j=f[3])&&c.getElementsByClassName)return H.apply(d,b.getElementsByClassName(j)),d}if(c.qsa&&(!q||!q.test(a))){if(s=r=u,w=b,x=1!==k&&a,1===k&&"object"!==b.nodeName.toLowerCase()){o=g(a),(r=b.getAttribute("id"))?s=r.replace(bb,"\\$&"):b.setAttribute("id",s),s="[id='"+s+"'] ",l=o.length;while(l--)o[l]=s+rb(o[l]);w=ab.test(a)&&pb(b.parentNode)||b,x=o.join(",")}if(x)try{return H.apply(d,w.querySelectorAll(x)),d}catch(y){}finally{r||b.removeAttribute("id")}}}return i(a.replace(R,"$1"),b,d,e)}function hb(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ib(a){return a[u]=!0,a}function jb(a){var b=n.createElement("div");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function kb(a,b){var c=a.split("|"),e=a.length;while(e--)d.attrHandle[c[e]]=b}function lb(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&(~b.sourceIndex||C)-(~a.sourceIndex||C);if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function mb(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function nb(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function ob(a){return ib(function(b){return b=+b,ib(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function pb(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=gb.support={},f=gb.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return b?"HTML"!==b.nodeName:!1},m=gb.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=g.documentElement,e=g.defaultView,e&&e!==e.top&&(e.addEventListener?e.addEventListener("unload",eb,!1):e.attachEvent&&e.attachEvent("onunload",eb)),p=!f(g),c.attributes=jb(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=jb(function(a){return a.appendChild(g.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=$.test(g.getElementsByClassName),c.getById=jb(function(a){return o.appendChild(a).id=u,!g.getElementsByName||!g.getElementsByName(u).length}),c.getById?(d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c&&c.parentNode?[c]:[]}},d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){return a.getAttribute("id")===b}}):(delete d.find.ID,d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){return p?b.getElementsByClassName(a):void 0},r=[],q=[],(c.qsa=$.test(g.querySelectorAll))&&(jb(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\f]' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+L+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+L+"*(?:value|"+K+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),jb(function(a){var b=g.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+L+"*[*^$|!~]?="),a.querySelectorAll(":enabled").length||q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=$.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&jb(function(a){c.disconnectedMatch=s.call(a,"div"),s.call(a,"[s!='']:x"),r.push("!=",P)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=$.test(o.compareDocumentPosition),t=b||$.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===g||a.ownerDocument===v&&t(v,a)?-1:b===g||b.ownerDocument===v&&t(v,b)?1:k?J(k,a)-J(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,h=[a],i=[b];if(!e||!f)return a===g?-1:b===g?1:e?-1:f?1:k?J(k,a)-J(k,b):0;if(e===f)return lb(a,b);c=a;while(c=c.parentNode)h.unshift(c);c=b;while(c=c.parentNode)i.unshift(c);while(h[d]===i[d])d++;return d?lb(h[d],i[d]):h[d]===v?-1:i[d]===v?1:0},g):n},gb.matches=function(a,b){return gb(a,null,null,b)},gb.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(U,"='$1']"),!(!c.matchesSelector||!p||r&&r.test(b)||q&&q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return gb(b,n,null,[a]).length>0},gb.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},gb.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&D.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},gb.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},gb.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=gb.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=gb.selectors={cacheLength:50,createPseudo:ib,match:X,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(cb,db),a[3]=(a[3]||a[4]||a[5]||"").replace(cb,db),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||gb.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&gb.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return X.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&V.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(cb,db).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+L+")"+a+"("+L+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=gb.attr(d,a);return null==e?"!="===b:b?(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(Q," ")+" ").indexOf(c)>-1:"|="===b?e===c||e.slice(0,c.length+1)===c+"-":!1):!0}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h;if(q){if(f){while(p){l=b;while(l=l[p])if(h?l.nodeName.toLowerCase()===r:1===l.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){k=q[u]||(q[u]={}),j=k[a]||[],n=j[0]===w&&j[1],m=j[0]===w&&j[2],l=n&&q.childNodes[n];while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if(1===l.nodeType&&++m&&l===b){k[a]=[w,n,m];break}}else if(s&&(j=(b[u]||(b[u]={}))[a])&&j[0]===w)m=j[1];else while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if((h?l.nodeName.toLowerCase()===r:1===l.nodeType)&&++m&&(s&&((l[u]||(l[u]={}))[a]=[w,m]),l===b))break;return m-=e,m===d||m%d===0&&m/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||gb.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ib(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=J(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ib(function(a){var b=[],c=[],d=h(a.replace(R,"$1"));return d[u]?ib(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ib(function(a){return function(b){return gb(a,b).length>0}}),contains:ib(function(a){return a=a.replace(cb,db),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ib(function(a){return W.test(a||"")||gb.error("unsupported lang: "+a),a=a.replace(cb,db).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:function(a){return a.disabled===!1},disabled:function(a){return a.disabled===!0},checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return Z.test(a.nodeName)},input:function(a){return Y.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:ob(function(){return[0]}),last:ob(function(a,b){return[b-1]}),eq:ob(function(a,b,c){return[0>c?c+b:c]}),even:ob(function(a,b){for(var c=0;b>c;c+=2)a.push(c);return a}),odd:ob(function(a,b){for(var c=1;b>c;c+=2)a.push(c);return a}),lt:ob(function(a,b,c){for(var d=0>c?c+b:c;--d>=0;)a.push(d);return a}),gt:ob(function(a,b,c){for(var d=0>c?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=mb(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=nb(b);function qb(){}qb.prototype=d.filters=d.pseudos,d.setFilters=new qb,g=gb.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){(!c||(e=S.exec(h)))&&(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=T.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(R," ")}),h=h.slice(c.length));for(g in d.filter)!(e=X[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?gb.error(a):z(a,i).slice(0)};function rb(a){for(var b=0,c=a.length,d="";c>b;b++)d+=a[b].value;return d}function sb(a,b,c){var d=b.dir,e=c&&"parentNode"===d,f=x++;return b.first?function(b,c,f){while(b=b[d])if(1===b.nodeType||e)return a(b,c,f)}:function(b,c,g){var h,i,j=[w,f];if(g){while(b=b[d])if((1===b.nodeType||e)&&a(b,c,g))return!0}else while(b=b[d])if(1===b.nodeType||e){if(i=b[u]||(b[u]={}),(h=i[d])&&h[0]===w&&h[1]===f)return j[2]=h[2];if(i[d]=j,j[2]=a(b,c,g))return!0}}}function tb(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function ub(a,b,c){for(var d=0,e=b.length;e>d;d++)gb(a,b[d],c);return c}function vb(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;i>h;h++)(f=a[h])&&(!c||c(f,d,e))&&(g.push(f),j&&b.push(h));return g}function wb(a,b,c,d,e,f){return d&&!d[u]&&(d=wb(d)),e&&!e[u]&&(e=wb(e,f)),ib(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||ub(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:vb(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=vb(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?J(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=vb(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):H.apply(g,r)})}function xb(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=sb(function(a){return a===b},h,!0),l=sb(function(a){return J(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];f>i;i++)if(c=d.relative[a[i].type])m=[sb(tb(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;f>e;e++)if(d.relative[a[e].type])break;return wb(i>1&&tb(m),i>1&&rb(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(R,"$1"),c,e>i&&xb(a.slice(i,e)),f>e&&xb(a=a.slice(e)),f>e&&rb(a))}m.push(c)}return tb(m)}function yb(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,m,o,p=0,q="0",r=f&&[],s=[],t=j,u=f||e&&d.find.TAG("*",k),v=w+=null==t?1:Math.random()||.1,x=u.length;for(k&&(j=g!==n&&g);q!==x&&null!=(l=u[q]);q++){if(e&&l){m=0;while(o=a[m++])if(o(l,g,h)){i.push(l);break}k&&(w=v)}c&&((l=!o&&l)&&p--,f&&r.push(l))}if(p+=q,c&&q!==p){m=0;while(o=b[m++])o(r,s,g,h);if(f){if(p>0)while(q--)r[q]||s[q]||(s[q]=F.call(i));s=vb(s)}H.apply(i,s),k&&!f&&s.length>0&&p+b.length>1&&gb.uniqueSort(i)}return k&&(w=v,j=t),r};return c?ib(f):f}return h=gb.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=xb(b[c]),f[u]?d.push(f):e.push(f);f=A(a,yb(e,d)),f.selector=a}return f},i=gb.select=function(a,b,e,f){var i,j,k,l,m,n="function"==typeof a&&a,o=!f&&g(a=n.selector||a);if(e=e||[],1===o.length){if(j=o[0]=o[0].slice(0),j.length>2&&"ID"===(k=j[0]).type&&c.getById&&9===b.nodeType&&p&&d.relative[j[1].type]){if(b=(d.find.ID(k.matches[0].replace(cb,db),b)||[])[0],!b)return e;n&&(b=b.parentNode),a=a.slice(j.shift().value.length)}i=X.needsContext.test(a)?0:j.length;while(i--){if(k=j[i],d.relative[l=k.type])break;if((m=d.find[l])&&(f=m(k.matches[0].replace(cb,db),ab.test(j[0].type)&&pb(b.parentNode)||b))){if(j.splice(i,1),a=f.length&&rb(j),!a)return H.apply(e,f),e;break}}}return(n||h(a,o))(f,b,!p,e,ab.test(a)&&pb(b.parentNode)||b),e},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=jb(function(a){return 1&a.compareDocumentPosition(n.createElement("div"))}),jb(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||kb("type|href|height|width",function(a,b,c){return c?void 0:a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&jb(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||kb("value",function(a,b,c){return c||"input"!==a.nodeName.toLowerCase()?void 0:a.defaultValue}),jb(function(a){return null==a.getAttribute("disabled")})||kb(K,function(a,b,c){var d;return c?void 0:a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),gb}(a);n.find=t,n.expr=t.selectors,n.expr[":"]=n.expr.pseudos,n.unique=t.uniqueSort,n.text=t.getText,n.isXMLDoc=t.isXML,n.contains=t.contains;var u=n.expr.match.needsContext,v=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,w=/^.[^:#\[\.,]*$/;function x(a,b,c){if(n.isFunction(b))return n.grep(a,function(a,d){return!!b.call(a,d,a)!==c});if(b.nodeType)return n.grep(a,function(a){return a===b!==c});if("string"==typeof b){if(w.test(b))return n.filter(b,a,c);b=n.filter(b,a)}return n.grep(a,function(a){return g.call(b,a)>=0!==c})}n.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?n.find.matchesSelector(d,a)?[d]:[]:n.find.matches(a,n.grep(b,function(a){return 1===a.nodeType}))},n.fn.extend({find:function(a){var b,c=this.length,d=[],e=this;if("string"!=typeof a)return this.pushStack(n(a).filter(function(){for(b=0;c>b;b++)if(n.contains(e[b],this))return!0}));for(b=0;c>b;b++)n.find(a,e[b],d);return d=this.pushStack(c>1?n.unique(d):d),d.selector=this.selector?this.selector+" "+a:a,d},filter:function(a){return this.pushStack(x(this,a||[],!1))},not:function(a){return this.pushStack(x(this,a||[],!0))},is:function(a){return!!x(this,"string"==typeof a&&u.test(a)?n(a):a||[],!1).length}});var y,z=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,A=n.fn.init=function(a,b){var c,d;if(!a)return this;if("string"==typeof a){if(c="<"===a[0]&&">"===a[a.length-1]&&a.length>=3?[null,a,null]:z.exec(a),!c||!c[1]&&b)return!b||b.jquery?(b||y).find(a):this.constructor(b).find(a);if(c[1]){if(b=b instanceof n?b[0]:b,n.merge(this,n.parseHTML(c[1],b&&b.nodeType?b.ownerDocument||b:l,!0)),v.test(c[1])&&n.isPlainObject(b))for(c in b)n.isFunction(this[c])?this[c](b[c]):this.attr(c,b[c]);return this}return d=l.getElementById(c[2]),d&&d.parentNode&&(this.length=1,this[0]=d),this.context=l,this.selector=a,this}return a.nodeType?(this.context=this[0]=a,this.length=1,this):n.isFunction(a)?"undefined"!=typeof y.ready?y.ready(a):a(n):(void 0!==a.selector&&(this.selector=a.selector,this.context=a.context),n.makeArray(a,this))};A.prototype=n.fn,y=n(l);var B=/^(?:parents|prev(?:Until|All))/,C={children:!0,contents:!0,next:!0,prev:!0};n.extend({dir:function(a,b,c){var d=[],e=void 0!==c;while((a=a[b])&&9!==a.nodeType)if(1===a.nodeType){if(e&&n(a).is(c))break;d.push(a)}return d},sibling:function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c}}),n.fn.extend({has:function(a){var b=n(a,this),c=b.length;return this.filter(function(){for(var a=0;c>a;a++)if(n.contains(this,b[a]))return!0})},closest:function(a,b){for(var c,d=0,e=this.length,f=[],g=u.test(a)||"string"!=typeof a?n(a,b||this.context):0;e>d;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&n.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?n.unique(f):f)},index:function(a){return a?"string"==typeof a?g.call(n(a),this[0]):g.call(this,a.jquery?a[0]:a):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(n.unique(n.merge(this.get(),n(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function D(a,b){while((a=a[b])&&1!==a.nodeType);return a}n.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return n.dir(a,"parentNode")},parentsUntil:function(a,b,c){return n.dir(a,"parentNode",c)},next:function(a){return D(a,"nextSibling")},prev:function(a){return D(a,"previousSibling")},nextAll:function(a){return n.dir(a,"nextSibling")},prevAll:function(a){return n.dir(a,"previousSibling")},nextUntil:function(a,b,c){return n.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return n.dir(a,"previousSibling",c)},siblings:function(a){return n.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return n.sibling(a.firstChild)},contents:function(a){return a.contentDocument||n.merge([],a.childNodes)}},function(a,b){n.fn[a]=function(c,d){var e=n.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=n.filter(d,e)),this.length>1&&(C[a]||n.unique(e),B.test(a)&&e.reverse()),this.pushStack(e)}});var E=/\S+/g,F={};function G(a){var b=F[a]={};return n.each(a.match(E)||[],function(a,c){b[c]=!0}),b}n.Callbacks=function(a){a="string"==typeof a?F[a]||G(a):n.extend({},a);var b,c,d,e,f,g,h=[],i=!a.once&&[],j=function(l){for(b=a.memory&&l,c=!0,g=e||0,e=0,f=h.length,d=!0;h&&f>g;g++)if(h[g].apply(l[0],l[1])===!1&&a.stopOnFalse){b=!1;break}d=!1,h&&(i?i.length&&j(i.shift()):b?h=[]:k.disable())},k={add:function(){if(h){var c=h.length;!function g(b){n.each(b,function(b,c){var d=n.type(c);"function"===d?a.unique&&k.has(c)||h.push(c):c&&c.length&&"string"!==d&&g(c)})}(arguments),d?f=h.length:b&&(e=c,j(b))}return this},remove:function(){return h&&n.each(arguments,function(a,b){var c;while((c=n.inArray(b,h,c))>-1)h.splice(c,1),d&&(f>=c&&f--,g>=c&&g--)}),this},has:function(a){return a?n.inArray(a,h)>-1:!(!h||!h.length)},empty:function(){return h=[],f=0,this},disable:function(){return h=i=b=void 0,this},disabled:function(){return!h},lock:function(){return i=void 0,b||k.disable(),this},locked:function(){return!i},fireWith:function(a,b){return!h||c&&!i||(b=b||[],b=[a,b.slice?b.slice():b],d?i.push(b):j(b)),this},fire:function(){return k.fireWith(this,arguments),this},fired:function(){return!!c}};return k},n.extend({Deferred:function(a){var b=[["resolve","done",n.Callbacks("once memory"),"resolved"],["reject","fail",n.Callbacks("once memory"),"rejected"],["notify","progress",n.Callbacks("memory")]],c="pending",d={state:function(){return c},always:function(){return e.done(arguments).fail(arguments),this},then:function(){var a=arguments;return n.Deferred(function(c){n.each(b,function(b,f){var g=n.isFunction(a[b])&&a[b];e[f[1]](function(){var a=g&&g.apply(this,arguments);a&&n.isFunction(a.promise)?a.promise().done(c.resolve).fail(c.reject).progress(c.notify):c[f[0]+"With"](this===d?c.promise():this,g?[a]:arguments)})}),a=null}).promise()},promise:function(a){return null!=a?n.extend(a,d):d}},e={};return d.pipe=d.then,n.each(b,function(a,f){var g=f[2],h=f[3];d[f[1]]=g.add,h&&g.add(function(){c=h},b[1^a][2].disable,b[2][2].lock),e[f[0]]=function(){return e[f[0]+"With"](this===e?d:this,arguments),this},e[f[0]+"With"]=g.fireWith}),d.promise(e),a&&a.call(e,e),e},when:function(a){var b=0,c=d.call(arguments),e=c.length,f=1!==e||a&&n.isFunction(a.promise)?e:0,g=1===f?a:n.Deferred(),h=function(a,b,c){return function(e){b[a]=this,c[a]=arguments.length>1?d.call(arguments):e,c===i?g.notifyWith(b,c):--f||g.resolveWith(b,c)}},i,j,k;if(e>1)for(i=new Array(e),j=new Array(e),k=new Array(e);e>b;b++)c[b]&&n.isFunction(c[b].promise)?c[b].promise().done(h(b,k,c)).fail(g.reject).progress(h(b,j,i)):--f;return f||g.resolveWith(k,c),g.promise()}});var H;n.fn.ready=function(a){return n.ready.promise().done(a),this},n.extend({isReady:!1,readyWait:1,holdReady:function(a){a?n.readyWait++:n.ready(!0)},ready:function(a){(a===!0?--n.readyWait:n.isReady)||(n.isReady=!0,a!==!0&&--n.readyWait>0||(H.resolveWith(l,[n]),n.fn.triggerHandler&&(n(l).triggerHandler("ready"),n(l).off("ready"))))}});function I(){l.removeEventListener("DOMContentLoaded",I,!1),a.removeEventListener("load",I,!1),n.ready()}n.ready.promise=function(b){return H||(H=n.Deferred(),"complete"===l.readyState?setTimeout(n.ready):(l.addEventListener("DOMContentLoaded",I,!1),a.addEventListener("load",I,!1))),H.promise(b)},n.ready.promise();var J=n.access=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===n.type(c)){e=!0;for(h in c)n.access(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,n.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(n(a),c)})),b))for(;i>h;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f};n.acceptData=function(a){return 1===a.nodeType||9===a.nodeType||!+a.nodeType};function K(){Object.defineProperty(this.cache={},0,{get:function(){return{}}}),this.expando=n.expando+K.uid++}K.uid=1,K.accepts=n.acceptData,K.prototype={key:function(a){if(!K.accepts(a))return 0;var b={},c=a[this.expando];if(!c){c=K.uid++;try{b[this.expando]={value:c},Object.defineProperties(a,b)}catch(d){b[this.expando]=c,n.extend(a,b)}}return this.cache[c]||(this.cache[c]={}),c},set:function(a,b,c){var d,e=this.key(a),f=this.cache[e];if("string"==typeof b)f[b]=c;else if(n.isEmptyObject(f))n.extend(this.cache[e],b);else for(d in b)f[d]=b[d];return f},get:function(a,b){var c=this.cache[this.key(a)];return void 0===b?c:c[b]},access:function(a,b,c){var d;return void 0===b||b&&"string"==typeof b&&void 0===c?(d=this.get(a,b),void 0!==d?d:this.get(a,n.camelCase(b))):(this.set(a,b,c),void 0!==c?c:b)},remove:function(a,b){var c,d,e,f=this.key(a),g=this.cache[f];if(void 0===b)this.cache[f]={};else{n.isArray(b)?d=b.concat(b.map(n.camelCase)):(e=n.camelCase(b),b in g?d=[b,e]:(d=e,d=d in g?[d]:d.match(E)||[])),c=d.length;while(c--)delete g[d[c]]}},hasData:function(a){return!n.isEmptyObject(this.cache[a[this.expando]]||{})},discard:function(a){a[this.expando]&&delete this.cache[a[this.expando]]}};var L=new K,M=new K,N=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,O=/([A-Z])/g;function P(a,b,c){var d;if(void 0===c&&1===a.nodeType)if(d="data-"+b.replace(O,"-$1").toLowerCase(),c=a.getAttribute(d),"string"==typeof c){try{c="true"===c?!0:"false"===c?!1:"null"===c?null:+c+""===c?+c:N.test(c)?n.parseJSON(c):c}catch(e){}M.set(a,b,c)}else c=void 0;return c}n.extend({hasData:function(a){return M.hasData(a)||L.hasData(a)},data:function(a,b,c){return M.access(a,b,c)
},removeData:function(a,b){M.remove(a,b)},_data:function(a,b,c){return L.access(a,b,c)},_removeData:function(a,b){L.remove(a,b)}}),n.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=M.get(f),1===f.nodeType&&!L.get(f,"hasDataAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=n.camelCase(d.slice(5)),P(f,d,e[d])));L.set(f,"hasDataAttrs",!0)}return e}return"object"==typeof a?this.each(function(){M.set(this,a)}):J(this,function(b){var c,d=n.camelCase(a);if(f&&void 0===b){if(c=M.get(f,a),void 0!==c)return c;if(c=M.get(f,d),void 0!==c)return c;if(c=P(f,d,void 0),void 0!==c)return c}else this.each(function(){var c=M.get(this,d);M.set(this,d,b),-1!==a.indexOf("-")&&void 0!==c&&M.set(this,a,b)})},null,b,arguments.length>1,null,!0)},removeData:function(a){return this.each(function(){M.remove(this,a)})}}),n.extend({queue:function(a,b,c){var d;return a?(b=(b||"fx")+"queue",d=L.get(a,b),c&&(!d||n.isArray(c)?d=L.access(a,b,n.makeArray(c)):d.push(c)),d||[]):void 0},dequeue:function(a,b){b=b||"fx";var c=n.queue(a,b),d=c.length,e=c.shift(),f=n._queueHooks(a,b),g=function(){n.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return L.get(a,c)||L.access(a,c,{empty:n.Callbacks("once memory").add(function(){L.remove(a,[b+"queue",c])})})}}),n.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?n.queue(this[0],a):void 0===b?this:this.each(function(){var c=n.queue(this,a,b);n._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&n.dequeue(this,a)})},dequeue:function(a){return this.each(function(){n.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=n.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=L.get(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var Q=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,R=["Top","Right","Bottom","Left"],S=function(a,b){return a=b||a,"none"===n.css(a,"display")||!n.contains(a.ownerDocument,a)},T=/^(?:checkbox|radio)$/i;!function(){var a=l.createDocumentFragment(),b=a.appendChild(l.createElement("div")),c=l.createElement("input");c.setAttribute("type","radio"),c.setAttribute("checked","checked"),c.setAttribute("name","t"),b.appendChild(c),k.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,b.innerHTML="<textarea>x</textarea>",k.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue}();var U="undefined";k.focusinBubbles="onfocusin"in a;var V=/^key/,W=/^(?:mouse|pointer|contextmenu)|click/,X=/^(?:focusinfocus|focusoutblur)$/,Y=/^([^.]*)(?:\.(.+)|)$/;function Z(){return!0}function $(){return!1}function _(){try{return l.activeElement}catch(a){}}n.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,o,p,q,r=L.get(a);if(r){c.handler&&(f=c,c=f.handler,e=f.selector),c.guid||(c.guid=n.guid++),(i=r.events)||(i=r.events={}),(g=r.handle)||(g=r.handle=function(b){return typeof n!==U&&n.event.triggered!==b.type?n.event.dispatch.apply(a,arguments):void 0}),b=(b||"").match(E)||[""],j=b.length;while(j--)h=Y.exec(b[j])||[],o=q=h[1],p=(h[2]||"").split(".").sort(),o&&(l=n.event.special[o]||{},o=(e?l.delegateType:l.bindType)||o,l=n.event.special[o]||{},k=n.extend({type:o,origType:q,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&n.expr.match.needsContext.test(e),namespace:p.join(".")},f),(m=i[o])||(m=i[o]=[],m.delegateCount=0,l.setup&&l.setup.call(a,d,p,g)!==!1||a.addEventListener&&a.addEventListener(o,g,!1)),l.add&&(l.add.call(a,k),k.handler.guid||(k.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,k):m.push(k),n.event.global[o]=!0)}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,o,p,q,r=L.hasData(a)&&L.get(a);if(r&&(i=r.events)){b=(b||"").match(E)||[""],j=b.length;while(j--)if(h=Y.exec(b[j])||[],o=q=h[1],p=(h[2]||"").split(".").sort(),o){l=n.event.special[o]||{},o=(d?l.delegateType:l.bindType)||o,m=i[o]||[],h=h[2]&&new RegExp("(^|\\.)"+p.join("\\.(?:.*\\.|)")+"(\\.|$)"),g=f=m.length;while(f--)k=m[f],!e&&q!==k.origType||c&&c.guid!==k.guid||h&&!h.test(k.namespace)||d&&d!==k.selector&&("**"!==d||!k.selector)||(m.splice(f,1),k.selector&&m.delegateCount--,l.remove&&l.remove.call(a,k));g&&!m.length&&(l.teardown&&l.teardown.call(a,p,r.handle)!==!1||n.removeEvent(a,o,r.handle),delete i[o])}else for(o in i)n.event.remove(a,o+b[j],c,d,!0);n.isEmptyObject(i)&&(delete r.handle,L.remove(a,"events"))}},trigger:function(b,c,d,e){var f,g,h,i,k,m,o,p=[d||l],q=j.call(b,"type")?b.type:b,r=j.call(b,"namespace")?b.namespace.split("."):[];if(g=h=d=d||l,3!==d.nodeType&&8!==d.nodeType&&!X.test(q+n.event.triggered)&&(q.indexOf(".")>=0&&(r=q.split("."),q=r.shift(),r.sort()),k=q.indexOf(":")<0&&"on"+q,b=b[n.expando]?b:new n.Event(q,"object"==typeof b&&b),b.isTrigger=e?2:3,b.namespace=r.join("."),b.namespace_re=b.namespace?new RegExp("(^|\\.)"+r.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=d),c=null==c?[b]:n.makeArray(c,[b]),o=n.event.special[q]||{},e||!o.trigger||o.trigger.apply(d,c)!==!1)){if(!e&&!o.noBubble&&!n.isWindow(d)){for(i=o.delegateType||q,X.test(i+q)||(g=g.parentNode);g;g=g.parentNode)p.push(g),h=g;h===(d.ownerDocument||l)&&p.push(h.defaultView||h.parentWindow||a)}f=0;while((g=p[f++])&&!b.isPropagationStopped())b.type=f>1?i:o.bindType||q,m=(L.get(g,"events")||{})[b.type]&&L.get(g,"handle"),m&&m.apply(g,c),m=k&&g[k],m&&m.apply&&n.acceptData(g)&&(b.result=m.apply(g,c),b.result===!1&&b.preventDefault());return b.type=q,e||b.isDefaultPrevented()||o._default&&o._default.apply(p.pop(),c)!==!1||!n.acceptData(d)||k&&n.isFunction(d[q])&&!n.isWindow(d)&&(h=d[k],h&&(d[k]=null),n.event.triggered=q,d[q](),n.event.triggered=void 0,h&&(d[k]=h)),b.result}},dispatch:function(a){a=n.event.fix(a);var b,c,e,f,g,h=[],i=d.call(arguments),j=(L.get(this,"events")||{})[a.type]||[],k=n.event.special[a.type]||{};if(i[0]=a,a.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,a)!==!1){h=n.event.handlers.call(this,a,j),b=0;while((f=h[b++])&&!a.isPropagationStopped()){a.currentTarget=f.elem,c=0;while((g=f.handlers[c++])&&!a.isImmediatePropagationStopped())(!a.namespace_re||a.namespace_re.test(g.namespace))&&(a.handleObj=g,a.data=g.data,e=((n.event.special[g.origType]||{}).handle||g.handler).apply(f.elem,i),void 0!==e&&(a.result=e)===!1&&(a.preventDefault(),a.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,a),a.result}},handlers:function(a,b){var c,d,e,f,g=[],h=b.delegateCount,i=a.target;if(h&&i.nodeType&&(!a.button||"click"!==a.type))for(;i!==this;i=i.parentNode||this)if(i.disabled!==!0||"click"!==a.type){for(d=[],c=0;h>c;c++)f=b[c],e=f.selector+" ",void 0===d[e]&&(d[e]=f.needsContext?n(e,this).index(i)>=0:n.find(e,this,null,[i]).length),d[e]&&d.push(f);d.length&&g.push({elem:i,handlers:d})}return h<b.length&&g.push({elem:this,handlers:b.slice(h)}),g},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){return null==a.which&&(a.which=null!=b.charCode?b.charCode:b.keyCode),a}},mouseHooks:{props:"button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,b){var c,d,e,f=b.button;return null==a.pageX&&null!=b.clientX&&(c=a.target.ownerDocument||l,d=c.documentElement,e=c.body,a.pageX=b.clientX+(d&&d.scrollLeft||e&&e.scrollLeft||0)-(d&&d.clientLeft||e&&e.clientLeft||0),a.pageY=b.clientY+(d&&d.scrollTop||e&&e.scrollTop||0)-(d&&d.clientTop||e&&e.clientTop||0)),a.which||void 0===f||(a.which=1&f?1:2&f?3:4&f?2:0),a}},fix:function(a){if(a[n.expando])return a;var b,c,d,e=a.type,f=a,g=this.fixHooks[e];g||(this.fixHooks[e]=g=W.test(e)?this.mouseHooks:V.test(e)?this.keyHooks:{}),d=g.props?this.props.concat(g.props):this.props,a=new n.Event(f),b=d.length;while(b--)c=d[b],a[c]=f[c];return a.target||(a.target=l),3===a.target.nodeType&&(a.target=a.target.parentNode),g.filter?g.filter(a,f):a},special:{load:{noBubble:!0},focus:{trigger:function(){return this!==_()&&this.focus?(this.focus(),!1):void 0},delegateType:"focusin"},blur:{trigger:function(){return this===_()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return"checkbox"===this.type&&this.click&&n.nodeName(this,"input")?(this.click(),!1):void 0},_default:function(a){return n.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}},simulate:function(a,b,c,d){var e=n.extend(new n.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?n.event.trigger(e,null,b):n.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},n.removeEvent=function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)},n.Event=function(a,b){return this instanceof n.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?Z:$):this.type=a,b&&n.extend(this,b),this.timeStamp=a&&a.timeStamp||n.now(),void(this[n.expando]=!0)):new n.Event(a,b)},n.Event.prototype={isDefaultPrevented:$,isPropagationStopped:$,isImmediatePropagationStopped:$,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=Z,a&&a.preventDefault&&a.preventDefault()},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=Z,a&&a.stopPropagation&&a.stopPropagation()},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=Z,a&&a.stopImmediatePropagation&&a.stopImmediatePropagation(),this.stopPropagation()}},n.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){n.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return(!e||e!==d&&!n.contains(d,e))&&(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),k.focusinBubbles||n.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){n.event.simulate(b,a.target,n.event.fix(a),!0)};n.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=L.access(d,b);e||d.addEventListener(a,c,!0),L.access(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=L.access(d,b)-1;e?L.access(d,b,e):(d.removeEventListener(a,c,!0),L.remove(d,b))}}}),n.fn.extend({on:function(a,b,c,d,e){var f,g;if("object"==typeof a){"string"!=typeof b&&(c=c||b,b=void 0);for(g in a)this.on(g,b,c,a[g],e);return this}if(null==c&&null==d?(d=b,c=b=void 0):null==d&&("string"==typeof b?(d=c,c=void 0):(d=c,c=b,b=void 0)),d===!1)d=$;else if(!d)return this;return 1===e&&(f=d,d=function(a){return n().off(a),f.apply(this,arguments)},d.guid=f.guid||(f.guid=n.guid++)),this.each(function(){n.event.add(this,a,d,c,b)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,n(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return(b===!1||"function"==typeof b)&&(c=b,b=void 0),c===!1&&(c=$),this.each(function(){n.event.remove(this,a,c,b)})},trigger:function(a,b){return this.each(function(){n.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];return c?n.event.trigger(a,b,c,!0):void 0}});var ab=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,bb=/<([\w:]+)/,cb=/<|&#?\w+;/,db=/<(?:script|style|link)/i,eb=/checked\s*(?:[^=]|=\s*.checked.)/i,fb=/^$|\/(?:java|ecma)script/i,gb=/^true\/(.*)/,hb=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,ib={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ib.optgroup=ib.option,ib.tbody=ib.tfoot=ib.colgroup=ib.caption=ib.thead,ib.th=ib.td;function jb(a,b){return n.nodeName(a,"table")&&n.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function kb(a){return a.type=(null!==a.getAttribute("type"))+"/"+a.type,a}function lb(a){var b=gb.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function mb(a,b){for(var c=0,d=a.length;d>c;c++)L.set(a[c],"globalEval",!b||L.get(b[c],"globalEval"))}function nb(a,b){var c,d,e,f,g,h,i,j;if(1===b.nodeType){if(L.hasData(a)&&(f=L.access(a),g=L.set(b,f),j=f.events)){delete g.handle,g.events={};for(e in j)for(c=0,d=j[e].length;d>c;c++)n.event.add(b,e,j[e][c])}M.hasData(a)&&(h=M.access(a),i=n.extend({},h),M.set(b,i))}}function ob(a,b){var c=a.getElementsByTagName?a.getElementsByTagName(b||"*"):a.querySelectorAll?a.querySelectorAll(b||"*"):[];return void 0===b||b&&n.nodeName(a,b)?n.merge([a],c):c}function pb(a,b){var c=b.nodeName.toLowerCase();"input"===c&&T.test(a.type)?b.checked=a.checked:("input"===c||"textarea"===c)&&(b.defaultValue=a.defaultValue)}n.extend({clone:function(a,b,c){var d,e,f,g,h=a.cloneNode(!0),i=n.contains(a.ownerDocument,a);if(!(k.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||n.isXMLDoc(a)))for(g=ob(h),f=ob(a),d=0,e=f.length;e>d;d++)pb(f[d],g[d]);if(b)if(c)for(f=f||ob(a),g=g||ob(h),d=0,e=f.length;e>d;d++)nb(f[d],g[d]);else nb(a,h);return g=ob(h,"script"),g.length>0&&mb(g,!i&&ob(a,"script")),h},buildFragment:function(a,b,c,d){for(var e,f,g,h,i,j,k=b.createDocumentFragment(),l=[],m=0,o=a.length;o>m;m++)if(e=a[m],e||0===e)if("object"===n.type(e))n.merge(l,e.nodeType?[e]:e);else if(cb.test(e)){f=f||k.appendChild(b.createElement("div")),g=(bb.exec(e)||["",""])[1].toLowerCase(),h=ib[g]||ib._default,f.innerHTML=h[1]+e.replace(ab,"<$1></$2>")+h[2],j=h[0];while(j--)f=f.lastChild;n.merge(l,f.childNodes),f=k.firstChild,f.textContent=""}else l.push(b.createTextNode(e));k.textContent="",m=0;while(e=l[m++])if((!d||-1===n.inArray(e,d))&&(i=n.contains(e.ownerDocument,e),f=ob(k.appendChild(e),"script"),i&&mb(f),c)){j=0;while(e=f[j++])fb.test(e.type||"")&&c.push(e)}return k},cleanData:function(a){for(var b,c,d,e,f=n.event.special,g=0;void 0!==(c=a[g]);g++){if(n.acceptData(c)&&(e=c[L.expando],e&&(b=L.cache[e]))){if(b.events)for(d in b.events)f[d]?n.event.remove(c,d):n.removeEvent(c,d,b.handle);L.cache[e]&&delete L.cache[e]}delete M.cache[c[M.expando]]}}}),n.fn.extend({text:function(a){return J(this,function(a){return void 0===a?n.text(this):this.empty().each(function(){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&(this.textContent=a)})},null,a,arguments.length)},append:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=jb(this,a);b.appendChild(a)}})},prepend:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=jb(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},remove:function(a,b){for(var c,d=a?n.filter(a,this):this,e=0;null!=(c=d[e]);e++)b||1!==c.nodeType||n.cleanData(ob(c)),c.parentNode&&(b&&n.contains(c.ownerDocument,c)&&mb(ob(c,"script")),c.parentNode.removeChild(c));return this},empty:function(){for(var a,b=0;null!=(a=this[b]);b++)1===a.nodeType&&(n.cleanData(ob(a,!1)),a.textContent="");return this},clone:function(a,b){return a=null==a?!1:a,b=null==b?a:b,this.map(function(){return n.clone(this,a,b)})},html:function(a){return J(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a&&1===b.nodeType)return b.innerHTML;if("string"==typeof a&&!db.test(a)&&!ib[(bb.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(ab,"<$1></$2>");try{for(;d>c;c++)b=this[c]||{},1===b.nodeType&&(n.cleanData(ob(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=arguments[0];return this.domManip(arguments,function(b){a=this.parentNode,n.cleanData(ob(this)),a&&a.replaceChild(b,this)}),a&&(a.length||a.nodeType)?this:this.remove()},detach:function(a){return this.remove(a,!0)},domManip:function(a,b){a=e.apply([],a);var c,d,f,g,h,i,j=0,l=this.length,m=this,o=l-1,p=a[0],q=n.isFunction(p);if(q||l>1&&"string"==typeof p&&!k.checkClone&&eb.test(p))return this.each(function(c){var d=m.eq(c);q&&(a[0]=p.call(this,c,d.html())),d.domManip(a,b)});if(l&&(c=n.buildFragment(a,this[0].ownerDocument,!1,this),d=c.firstChild,1===c.childNodes.length&&(c=d),d)){for(f=n.map(ob(c,"script"),kb),g=f.length;l>j;j++)h=c,j!==o&&(h=n.clone(h,!0,!0),g&&n.merge(f,ob(h,"script"))),b.call(this[j],h,j);if(g)for(i=f[f.length-1].ownerDocument,n.map(f,lb),j=0;g>j;j++)h=f[j],fb.test(h.type||"")&&!L.access(h,"globalEval")&&n.contains(i,h)&&(h.src?n._evalUrl&&n._evalUrl(h.src):n.globalEval(h.textContent.replace(hb,"")))}return this}}),n.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){n.fn[a]=function(a){for(var c,d=[],e=n(a),g=e.length-1,h=0;g>=h;h++)c=h===g?this:this.clone(!0),n(e[h])[b](c),f.apply(d,c.get());return this.pushStack(d)}});var qb,rb={};function sb(b,c){var d,e=n(c.createElement(b)).appendTo(c.body),f=a.getDefaultComputedStyle&&(d=a.getDefaultComputedStyle(e[0]))?d.display:n.css(e[0],"display");return e.detach(),f}function tb(a){var b=l,c=rb[a];return c||(c=sb(a,b),"none"!==c&&c||(qb=(qb||n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement),b=qb[0].contentDocument,b.write(),b.close(),c=sb(a,b),qb.detach()),rb[a]=c),c}var ub=/^margin/,vb=new RegExp("^("+Q+")(?!px)[a-z%]+$","i"),wb=function(b){return b.ownerDocument.defaultView.opener?b.ownerDocument.defaultView.getComputedStyle(b,null):a.getComputedStyle(b,null)};function xb(a,b,c){var d,e,f,g,h=a.style;return c=c||wb(a),c&&(g=c.getPropertyValue(b)||c[b]),c&&(""!==g||n.contains(a.ownerDocument,a)||(g=n.style(a,b)),vb.test(g)&&ub.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0!==g?g+"":g}function yb(a,b){return{get:function(){return a()?void delete this.get:(this.get=b).apply(this,arguments)}}}!function(){var b,c,d=l.documentElement,e=l.createElement("div"),f=l.createElement("div");if(f.style){f.style.backgroundClip="content-box",f.cloneNode(!0).style.backgroundClip="",k.clearCloneStyle="content-box"===f.style.backgroundClip,e.style.cssText="border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute",e.appendChild(f);function g(){f.style.cssText="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",f.innerHTML="",d.appendChild(e);var g=a.getComputedStyle(f,null);b="1%"!==g.top,c="4px"===g.width,d.removeChild(e)}a.getComputedStyle&&n.extend(k,{pixelPosition:function(){return g(),b},boxSizingReliable:function(){return null==c&&g(),c},reliableMarginRight:function(){var b,c=f.appendChild(l.createElement("div"));return c.style.cssText=f.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",c.style.marginRight=c.style.width="0",f.style.width="1px",d.appendChild(e),b=!parseFloat(a.getComputedStyle(c,null).marginRight),d.removeChild(e),f.removeChild(c),b}})}}(),n.swap=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};var zb=/^(none|table(?!-c[ea]).+)/,Ab=new RegExp("^("+Q+")(.*)$","i"),Bb=new RegExp("^([+-])=("+Q+")","i"),Cb={position:"absolute",visibility:"hidden",display:"block"},Db={letterSpacing:"0",fontWeight:"400"},Eb=["Webkit","O","Moz","ms"];function Fb(a,b){if(b in a)return b;var c=b[0].toUpperCase()+b.slice(1),d=b,e=Eb.length;while(e--)if(b=Eb[e]+c,b in a)return b;return d}function Gb(a,b,c){var d=Ab.exec(b);return d?Math.max(0,d[1]-(c||0))+(d[2]||"px"):b}function Hb(a,b,c,d,e){for(var f=c===(d?"border":"content")?4:"width"===b?1:0,g=0;4>f;f+=2)"margin"===c&&(g+=n.css(a,c+R[f],!0,e)),d?("content"===c&&(g-=n.css(a,"padding"+R[f],!0,e)),"margin"!==c&&(g-=n.css(a,"border"+R[f]+"Width",!0,e))):(g+=n.css(a,"padding"+R[f],!0,e),"padding"!==c&&(g+=n.css(a,"border"+R[f]+"Width",!0,e)));return g}function Ib(a,b,c){var d=!0,e="width"===b?a.offsetWidth:a.offsetHeight,f=wb(a),g="border-box"===n.css(a,"boxSizing",!1,f);if(0>=e||null==e){if(e=xb(a,b,f),(0>e||null==e)&&(e=a.style[b]),vb.test(e))return e;d=g&&(k.boxSizingReliable()||e===a.style[b]),e=parseFloat(e)||0}return e+Hb(a,b,c||(g?"border":"content"),d,f)+"px"}function Jb(a,b){for(var c,d,e,f=[],g=0,h=a.length;h>g;g++)d=a[g],d.style&&(f[g]=L.get(d,"olddisplay"),c=d.style.display,b?(f[g]||"none"!==c||(d.style.display=""),""===d.style.display&&S(d)&&(f[g]=L.access(d,"olddisplay",tb(d.nodeName)))):(e=S(d),"none"===c&&e||L.set(d,"olddisplay",e?c:n.css(d,"display"))));for(g=0;h>g;g++)d=a[g],d.style&&(b&&"none"!==d.style.display&&""!==d.style.display||(d.style.display=b?f[g]||"":"none"));return a}n.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=xb(a,"opacity");return""===c?"1":c}}}},cssNumber:{columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=n.camelCase(b),i=a.style;return b=n.cssProps[h]||(n.cssProps[h]=Fb(i,h)),g=n.cssHooks[b]||n.cssHooks[h],void 0===c?g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b]:(f=typeof c,"string"===f&&(e=Bb.exec(c))&&(c=(e[1]+1)*e[2]+parseFloat(n.css(a,b)),f="number"),null!=c&&c===c&&("number"!==f||n.cssNumber[h]||(c+="px"),k.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),g&&"set"in g&&void 0===(c=g.set(a,c,d))||(i[b]=c)),void 0)}},css:function(a,b,c,d){var e,f,g,h=n.camelCase(b);return b=n.cssProps[h]||(n.cssProps[h]=Fb(a.style,h)),g=n.cssHooks[b]||n.cssHooks[h],g&&"get"in g&&(e=g.get(a,!0,c)),void 0===e&&(e=xb(a,b,d)),"normal"===e&&b in Db&&(e=Db[b]),""===c||c?(f=parseFloat(e),c===!0||n.isNumeric(f)?f||0:e):e}}),n.each(["height","width"],function(a,b){n.cssHooks[b]={get:function(a,c,d){return c?zb.test(n.css(a,"display"))&&0===a.offsetWidth?n.swap(a,Cb,function(){return Ib(a,b,d)}):Ib(a,b,d):void 0},set:function(a,c,d){var e=d&&wb(a);return Gb(a,c,d?Hb(a,b,d,"border-box"===n.css(a,"boxSizing",!1,e),e):0)}}}),n.cssHooks.marginRight=yb(k.reliableMarginRight,function(a,b){return b?n.swap(a,{display:"inline-block"},xb,[a,"marginRight"]):void 0}),n.each({margin:"",padding:"",border:"Width"},function(a,b){n.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];4>d;d++)e[a+R[d]+b]=f[d]||f[d-2]||f[0];return e}},ub.test(a)||(n.cssHooks[a+b].set=Gb)}),n.fn.extend({css:function(a,b){return J(this,function(a,b,c){var d,e,f={},g=0;if(n.isArray(b)){for(d=wb(a),e=b.length;e>g;g++)f[b[g]]=n.css(a,b[g],!1,d);return f}return void 0!==c?n.style(a,b,c):n.css(a,b)},a,b,arguments.length>1)},show:function(){return Jb(this,!0)},hide:function(){return Jb(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){S(this)?n(this).show():n(this).hide()})}});function Kb(a,b,c,d,e){return new Kb.prototype.init(a,b,c,d,e)}n.Tween=Kb,Kb.prototype={constructor:Kb,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||"swing",this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(n.cssNumber[c]?"":"px")},cur:function(){var a=Kb.propHooks[this.prop];return a&&a.get?a.get(this):Kb.propHooks._default.get(this)},run:function(a){var b,c=Kb.propHooks[this.prop];return this.pos=b=this.options.duration?n.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):Kb.propHooks._default.set(this),this}},Kb.prototype.init.prototype=Kb.prototype,Kb.propHooks={_default:{get:function(a){var b;return null==a.elem[a.prop]||a.elem.style&&null!=a.elem.style[a.prop]?(b=n.css(a.elem,a.prop,""),b&&"auto"!==b?b:0):a.elem[a.prop]},set:function(a){n.fx.step[a.prop]?n.fx.step[a.prop](a):a.elem.style&&(null!=a.elem.style[n.cssProps[a.prop]]||n.cssHooks[a.prop])?n.style(a.elem,a.prop,a.now+a.unit):a.elem[a.prop]=a.now}}},Kb.propHooks.scrollTop=Kb.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},n.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2}},n.fx=Kb.prototype.init,n.fx.step={};var Lb,Mb,Nb=/^(?:toggle|show|hide)$/,Ob=new RegExp("^(?:([+-])=|)("+Q+")([a-z%]*)$","i"),Pb=/queueHooks$/,Qb=[Vb],Rb={"*":[function(a,b){var c=this.createTween(a,b),d=c.cur(),e=Ob.exec(b),f=e&&e[3]||(n.cssNumber[a]?"":"px"),g=(n.cssNumber[a]||"px"!==f&&+d)&&Ob.exec(n.css(c.elem,a)),h=1,i=20;if(g&&g[3]!==f){f=f||g[3],e=e||[],g=+d||1;do h=h||".5",g/=h,n.style(c.elem,a,g+f);while(h!==(h=c.cur()/d)&&1!==h&&--i)}return e&&(g=c.start=+g||+d||0,c.unit=f,c.end=e[1]?g+(e[1]+1)*e[2]:+e[2]),c}]};function Sb(){return setTimeout(function(){Lb=void 0}),Lb=n.now()}function Tb(a,b){var c,d=0,e={height:a};for(b=b?1:0;4>d;d+=2-b)c=R[d],e["margin"+c]=e["padding"+c]=a;return b&&(e.opacity=e.width=a),e}function Ub(a,b,c){for(var d,e=(Rb[b]||[]).concat(Rb["*"]),f=0,g=e.length;g>f;f++)if(d=e[f].call(c,b,a))return d}function Vb(a,b,c){var d,e,f,g,h,i,j,k,l=this,m={},o=a.style,p=a.nodeType&&S(a),q=L.get(a,"fxshow");c.queue||(h=n._queueHooks(a,"fx"),null==h.unqueued&&(h.unqueued=0,i=h.empty.fire,h.empty.fire=function(){h.unqueued||i()}),h.unqueued++,l.always(function(){l.always(function(){h.unqueued--,n.queue(a,"fx").length||h.empty.fire()})})),1===a.nodeType&&("height"in b||"width"in b)&&(c.overflow=[o.overflow,o.overflowX,o.overflowY],j=n.css(a,"display"),k="none"===j?L.get(a,"olddisplay")||tb(a.nodeName):j,"inline"===k&&"none"===n.css(a,"float")&&(o.display="inline-block")),c.overflow&&(o.overflow="hidden",l.always(function(){o.overflow=c.overflow[0],o.overflowX=c.overflow[1],o.overflowY=c.overflow[2]}));for(d in b)if(e=b[d],Nb.exec(e)){if(delete b[d],f=f||"toggle"===e,e===(p?"hide":"show")){if("show"!==e||!q||void 0===q[d])continue;p=!0}m[d]=q&&q[d]||n.style(a,d)}else j=void 0;if(n.isEmptyObject(m))"inline"===("none"===j?tb(a.nodeName):j)&&(o.display=j);else{q?"hidden"in q&&(p=q.hidden):q=L.access(a,"fxshow",{}),f&&(q.hidden=!p),p?n(a).show():l.done(function(){n(a).hide()}),l.done(function(){var b;L.remove(a,"fxshow");for(b in m)n.style(a,b,m[b])});for(d in m)g=Ub(p?q[d]:0,d,l),d in q||(q[d]=g.start,p&&(g.end=g.start,g.start="width"===d||"height"===d?1:0))}}function Wb(a,b){var c,d,e,f,g;for(c in a)if(d=n.camelCase(c),e=b[d],f=a[c],n.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=n.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function Xb(a,b,c){var d,e,f=0,g=Qb.length,h=n.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=Lb||Sb(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;i>g;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),1>f&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:n.extend({},b),opts:n.extend(!0,{specialEasing:{}},c),originalProperties:b,originalOptions:c,startTime:Lb||Sb(),duration:c.duration,tweens:[],createTween:function(b,c){var d=n.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;d>c;c++)j.tweens[c].run(1);return b?h.resolveWith(a,[j,b]):h.rejectWith(a,[j,b]),this}}),k=j.props;for(Wb(k,j.opts.specialEasing);g>f;f++)if(d=Qb[f].call(j,a,k,j.opts))return d;return n.map(k,Ub,j),n.isFunction(j.opts.start)&&j.opts.start.call(a,j),n.fx.timer(n.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}n.Animation=n.extend(Xb,{tweener:function(a,b){n.isFunction(a)?(b=a,a=["*"]):a=a.split(" ");for(var c,d=0,e=a.length;e>d;d++)c=a[d],Rb[c]=Rb[c]||[],Rb[c].unshift(b)},prefilter:function(a,b){b?Qb.unshift(a):Qb.push(a)}}),n.speed=function(a,b,c){var d=a&&"object"==typeof a?n.extend({},a):{complete:c||!c&&b||n.isFunction(a)&&a,duration:a,easing:c&&b||b&&!n.isFunction(b)&&b};return d.duration=n.fx.off?0:"number"==typeof d.duration?d.duration:d.duration in n.fx.speeds?n.fx.speeds[d.duration]:n.fx.speeds._default,(null==d.queue||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){n.isFunction(d.old)&&d.old.call(this),d.queue&&n.dequeue(this,d.queue)},d},n.fn.extend({fadeTo:function(a,b,c,d){return this.filter(S).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=n.isEmptyObject(a),f=n.speed(b,c,d),g=function(){var b=Xb(this,n.extend({},a),f);(e||L.get(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=n.timers,g=L.get(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&Pb.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));(b||!c)&&n.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=L.get(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=n.timers,g=d?d.length:0;for(c.finish=!0,n.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;g>b;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),n.each(["toggle","show","hide"],function(a,b){var c=n.fn[b];n.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(Tb(b,!0),a,d,e)}}),n.each({slideDown:Tb("show"),slideUp:Tb("hide"),slideToggle:Tb("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){n.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),n.timers=[],n.fx.tick=function(){var a,b=0,c=n.timers;for(Lb=n.now();b<c.length;b++)a=c[b],a()||c[b]!==a||c.splice(b--,1);c.length||n.fx.stop(),Lb=void 0},n.fx.timer=function(a){n.timers.push(a),a()?n.fx.start():n.timers.pop()},n.fx.interval=13,n.fx.start=function(){Mb||(Mb=setInterval(n.fx.tick,n.fx.interval))},n.fx.stop=function(){clearInterval(Mb),Mb=null},n.fx.speeds={slow:600,fast:200,_default:400},n.fn.delay=function(a,b){return a=n.fx?n.fx.speeds[a]||a:a,b=b||"fx",this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},function(){var a=l.createElement("input"),b=l.createElement("select"),c=b.appendChild(l.createElement("option"));a.type="checkbox",k.checkOn=""!==a.value,k.optSelected=c.selected,b.disabled=!0,k.optDisabled=!c.disabled,a=l.createElement("input"),a.value="t",a.type="radio",k.radioValue="t"===a.value}();var Yb,Zb,$b=n.expr.attrHandle;n.fn.extend({attr:function(a,b){return J(this,n.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){n.removeAttr(this,a)})}}),n.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(a&&3!==f&&8!==f&&2!==f)return typeof a.getAttribute===U?n.prop(a,b,c):(1===f&&n.isXMLDoc(a)||(b=b.toLowerCase(),d=n.attrHooks[b]||(n.expr.match.bool.test(b)?Zb:Yb)),void 0===c?d&&"get"in d&&null!==(e=d.get(a,b))?e:(e=n.find.attr(a,b),null==e?void 0:e):null!==c?d&&"set"in d&&void 0!==(e=d.set(a,c,b))?e:(a.setAttribute(b,c+""),c):void n.removeAttr(a,b))
},removeAttr:function(a,b){var c,d,e=0,f=b&&b.match(E);if(f&&1===a.nodeType)while(c=f[e++])d=n.propFix[c]||c,n.expr.match.bool.test(c)&&(a[d]=!1),a.removeAttribute(c)},attrHooks:{type:{set:function(a,b){if(!k.radioValue&&"radio"===b&&n.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}}}),Zb={set:function(a,b,c){return b===!1?n.removeAttr(a,c):a.setAttribute(c,c),c}},n.each(n.expr.match.bool.source.match(/\w+/g),function(a,b){var c=$b[b]||n.find.attr;$b[b]=function(a,b,d){var e,f;return d||(f=$b[b],$b[b]=e,e=null!=c(a,b,d)?b.toLowerCase():null,$b[b]=f),e}});var _b=/^(?:input|select|textarea|button)$/i;n.fn.extend({prop:function(a,b){return J(this,n.prop,a,b,arguments.length>1)},removeProp:function(a){return this.each(function(){delete this[n.propFix[a]||a]})}}),n.extend({propFix:{"for":"htmlFor","class":"className"},prop:function(a,b,c){var d,e,f,g=a.nodeType;if(a&&3!==g&&8!==g&&2!==g)return f=1!==g||!n.isXMLDoc(a),f&&(b=n.propFix[b]||b,e=n.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){return a.hasAttribute("tabindex")||_b.test(a.nodeName)||a.href?a.tabIndex:-1}}}}),k.optSelected||(n.propHooks.selected={get:function(a){var b=a.parentNode;return b&&b.parentNode&&b.parentNode.selectedIndex,null}}),n.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){n.propFix[this.toLowerCase()]=this});var ac=/[\t\r\n\f]/g;n.fn.extend({addClass:function(a){var b,c,d,e,f,g,h="string"==typeof a&&a,i=0,j=this.length;if(n.isFunction(a))return this.each(function(b){n(this).addClass(a.call(this,b,this.className))});if(h)for(b=(a||"").match(E)||[];j>i;i++)if(c=this[i],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(ac," "):" ")){f=0;while(e=b[f++])d.indexOf(" "+e+" ")<0&&(d+=e+" ");g=n.trim(d),c.className!==g&&(c.className=g)}return this},removeClass:function(a){var b,c,d,e,f,g,h=0===arguments.length||"string"==typeof a&&a,i=0,j=this.length;if(n.isFunction(a))return this.each(function(b){n(this).removeClass(a.call(this,b,this.className))});if(h)for(b=(a||"").match(E)||[];j>i;i++)if(c=this[i],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(ac," "):"")){f=0;while(e=b[f++])while(d.indexOf(" "+e+" ")>=0)d=d.replace(" "+e+" "," ");g=a?n.trim(d):"",c.className!==g&&(c.className=g)}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):this.each(n.isFunction(a)?function(c){n(this).toggleClass(a.call(this,c,this.className,b),b)}:function(){if("string"===c){var b,d=0,e=n(this),f=a.match(E)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else(c===U||"boolean"===c)&&(this.className&&L.set(this,"__className__",this.className),this.className=this.className||a===!1?"":L.get(this,"__className__")||"")})},hasClass:function(a){for(var b=" "+a+" ",c=0,d=this.length;d>c;c++)if(1===this[c].nodeType&&(" "+this[c].className+" ").replace(ac," ").indexOf(b)>=0)return!0;return!1}});var bc=/\r/g;n.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=n.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,n(this).val()):a,null==e?e="":"number"==typeof e?e+="":n.isArray(e)&&(e=n.map(e,function(a){return null==a?"":a+""})),b=n.valHooks[this.type]||n.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=n.valHooks[e.type]||n.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(bc,""):null==c?"":c)}}}),n.extend({valHooks:{option:{get:function(a){var b=n.find.attr(a,"value");return null!=b?b:n.trim(n.text(a))}},select:{get:function(a){for(var b,c,d=a.options,e=a.selectedIndex,f="select-one"===a.type||0>e,g=f?null:[],h=f?e+1:d.length,i=0>e?h:f?e:0;h>i;i++)if(c=d[i],!(!c.selected&&i!==e||(k.optDisabled?c.disabled:null!==c.getAttribute("disabled"))||c.parentNode.disabled&&n.nodeName(c.parentNode,"optgroup"))){if(b=n(c).val(),f)return b;g.push(b)}return g},set:function(a,b){var c,d,e=a.options,f=n.makeArray(b),g=e.length;while(g--)d=e[g],(d.selected=n.inArray(d.value,f)>=0)&&(c=!0);return c||(a.selectedIndex=-1),f}}}}),n.each(["radio","checkbox"],function(){n.valHooks[this]={set:function(a,b){return n.isArray(b)?a.checked=n.inArray(n(a).val(),b)>=0:void 0}},k.checkOn||(n.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})}),n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){n.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),n.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}});var cc=n.now(),dc=/\?/;n.parseJSON=function(a){return JSON.parse(a+"")},n.parseXML=function(a){var b,c;if(!a||"string"!=typeof a)return null;try{c=new DOMParser,b=c.parseFromString(a,"text/xml")}catch(d){b=void 0}return(!b||b.getElementsByTagName("parsererror").length)&&n.error("Invalid XML: "+a),b};var ec=/#.*$/,fc=/([?&])_=[^&]*/,gc=/^(.*?):[ \t]*([^\r\n]*)$/gm,hc=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,ic=/^(?:GET|HEAD)$/,jc=/^\/\//,kc=/^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,lc={},mc={},nc="*/".concat("*"),oc=a.location.href,pc=kc.exec(oc.toLowerCase())||[];function qc(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(E)||[];if(n.isFunction(c))while(d=f[e++])"+"===d[0]?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function rc(a,b,c,d){var e={},f=a===mc;function g(h){var i;return e[h]=!0,n.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function sc(a,b){var c,d,e=n.ajaxSettings.flatOptions||{};for(c in b)void 0!==b[c]&&((e[c]?a:d||(d={}))[c]=b[c]);return d&&n.extend(!0,a,d),a}function tc(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===d&&(d=a.mimeType||b.getResponseHeader("Content-Type"));if(d)for(e in h)if(h[e]&&h[e].test(d)){i.unshift(e);break}if(i[0]in c)f=i[0];else{for(e in c){if(!i[0]||a.converters[e+" "+i[0]]){f=e;break}g||(g=e)}f=f||g}return f?(f!==i[0]&&i.unshift(f),c[f]):void 0}function uc(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}n.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:oc,type:"GET",isLocal:hc.test(pc[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":nc,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":n.parseJSON,"text xml":n.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?sc(sc(a,n.ajaxSettings),b):sc(n.ajaxSettings,a)},ajaxPrefilter:qc(lc),ajaxTransport:qc(mc),ajax:function(a,b){"object"==typeof a&&(b=a,a=void 0),b=b||{};var c,d,e,f,g,h,i,j,k=n.ajaxSetup({},b),l=k.context||k,m=k.context&&(l.nodeType||l.jquery)?n(l):n.event,o=n.Deferred(),p=n.Callbacks("once memory"),q=k.statusCode||{},r={},s={},t=0,u="canceled",v={readyState:0,getResponseHeader:function(a){var b;if(2===t){if(!f){f={};while(b=gc.exec(e))f[b[1].toLowerCase()]=b[2]}b=f[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return 2===t?e:null},setRequestHeader:function(a,b){var c=a.toLowerCase();return t||(a=s[c]=s[c]||a,r[a]=b),this},overrideMimeType:function(a){return t||(k.mimeType=a),this},statusCode:function(a){var b;if(a)if(2>t)for(b in a)q[b]=[q[b],a[b]];else v.always(a[v.status]);return this},abort:function(a){var b=a||u;return c&&c.abort(b),x(0,b),this}};if(o.promise(v).complete=p.add,v.success=v.done,v.error=v.fail,k.url=((a||k.url||oc)+"").replace(ec,"").replace(jc,pc[1]+"//"),k.type=b.method||b.type||k.method||k.type,k.dataTypes=n.trim(k.dataType||"*").toLowerCase().match(E)||[""],null==k.crossDomain&&(h=kc.exec(k.url.toLowerCase()),k.crossDomain=!(!h||h[1]===pc[1]&&h[2]===pc[2]&&(h[3]||("http:"===h[1]?"80":"443"))===(pc[3]||("http:"===pc[1]?"80":"443")))),k.data&&k.processData&&"string"!=typeof k.data&&(k.data=n.param(k.data,k.traditional)),rc(lc,k,b,v),2===t)return v;i=n.event&&k.global,i&&0===n.active++&&n.event.trigger("ajaxStart"),k.type=k.type.toUpperCase(),k.hasContent=!ic.test(k.type),d=k.url,k.hasContent||(k.data&&(d=k.url+=(dc.test(d)?"&":"?")+k.data,delete k.data),k.cache===!1&&(k.url=fc.test(d)?d.replace(fc,"$1_="+cc++):d+(dc.test(d)?"&":"?")+"_="+cc++)),k.ifModified&&(n.lastModified[d]&&v.setRequestHeader("If-Modified-Since",n.lastModified[d]),n.etag[d]&&v.setRequestHeader("If-None-Match",n.etag[d])),(k.data&&k.hasContent&&k.contentType!==!1||b.contentType)&&v.setRequestHeader("Content-Type",k.contentType),v.setRequestHeader("Accept",k.dataTypes[0]&&k.accepts[k.dataTypes[0]]?k.accepts[k.dataTypes[0]]+("*"!==k.dataTypes[0]?", "+nc+"; q=0.01":""):k.accepts["*"]);for(j in k.headers)v.setRequestHeader(j,k.headers[j]);if(k.beforeSend&&(k.beforeSend.call(l,v,k)===!1||2===t))return v.abort();u="abort";for(j in{success:1,error:1,complete:1})v[j](k[j]);if(c=rc(mc,k,b,v)){v.readyState=1,i&&m.trigger("ajaxSend",[v,k]),k.async&&k.timeout>0&&(g=setTimeout(function(){v.abort("timeout")},k.timeout));try{t=1,c.send(r,x)}catch(w){if(!(2>t))throw w;x(-1,w)}}else x(-1,"No Transport");function x(a,b,f,h){var j,r,s,u,w,x=b;2!==t&&(t=2,g&&clearTimeout(g),c=void 0,e=h||"",v.readyState=a>0?4:0,j=a>=200&&300>a||304===a,f&&(u=tc(k,v,f)),u=uc(k,u,v,j),j?(k.ifModified&&(w=v.getResponseHeader("Last-Modified"),w&&(n.lastModified[d]=w),w=v.getResponseHeader("etag"),w&&(n.etag[d]=w)),204===a||"HEAD"===k.type?x="nocontent":304===a?x="notmodified":(x=u.state,r=u.data,s=u.error,j=!s)):(s=x,(a||!x)&&(x="error",0>a&&(a=0))),v.status=a,v.statusText=(b||x)+"",j?o.resolveWith(l,[r,x,v]):o.rejectWith(l,[v,x,s]),v.statusCode(q),q=void 0,i&&m.trigger(j?"ajaxSuccess":"ajaxError",[v,k,j?r:s]),p.fireWith(l,[v,x]),i&&(m.trigger("ajaxComplete",[v,k]),--n.active||n.event.trigger("ajaxStop")))}return v},getJSON:function(a,b,c){return n.get(a,b,c,"json")},getScript:function(a,b){return n.get(a,void 0,b,"script")}}),n.each(["get","post"],function(a,b){n[b]=function(a,c,d,e){return n.isFunction(c)&&(e=e||d,d=c,c=void 0),n.ajax({url:a,type:b,dataType:e,data:c,success:d})}}),n._evalUrl=function(a){return n.ajax({url:a,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})},n.fn.extend({wrapAll:function(a){var b;return n.isFunction(a)?this.each(function(b){n(this).wrapAll(a.call(this,b))}):(this[0]&&(b=n(a,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstElementChild)a=a.firstElementChild;return a}).append(this)),this)},wrapInner:function(a){return this.each(n.isFunction(a)?function(b){n(this).wrapInner(a.call(this,b))}:function(){var b=n(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=n.isFunction(a);return this.each(function(c){n(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){n.nodeName(this,"body")||n(this).replaceWith(this.childNodes)}).end()}}),n.expr.filters.hidden=function(a){return a.offsetWidth<=0&&a.offsetHeight<=0},n.expr.filters.visible=function(a){return!n.expr.filters.hidden(a)};var vc=/%20/g,wc=/\[\]$/,xc=/\r?\n/g,yc=/^(?:submit|button|image|reset|file)$/i,zc=/^(?:input|select|textarea|keygen)/i;function Ac(a,b,c,d){var e;if(n.isArray(b))n.each(b,function(b,e){c||wc.test(a)?d(a,e):Ac(a+"["+("object"==typeof e?b:"")+"]",e,c,d)});else if(c||"object"!==n.type(b))d(a,b);else for(e in b)Ac(a+"["+e+"]",b[e],c,d)}n.param=function(a,b){var c,d=[],e=function(a,b){b=n.isFunction(b)?b():null==b?"":b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};if(void 0===b&&(b=n.ajaxSettings&&n.ajaxSettings.traditional),n.isArray(a)||a.jquery&&!n.isPlainObject(a))n.each(a,function(){e(this.name,this.value)});else for(c in a)Ac(c,a[c],b,e);return d.join("&").replace(vc,"+")},n.fn.extend({serialize:function(){return n.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=n.prop(this,"elements");return a?n.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!n(this).is(":disabled")&&zc.test(this.nodeName)&&!yc.test(a)&&(this.checked||!T.test(a))}).map(function(a,b){var c=n(this).val();return null==c?null:n.isArray(c)?n.map(c,function(a){return{name:b.name,value:a.replace(xc,"\r\n")}}):{name:b.name,value:c.replace(xc,"\r\n")}}).get()}}),n.ajaxSettings.xhr=function(){try{return new XMLHttpRequest}catch(a){}};var Bc=0,Cc={},Dc={0:200,1223:204},Ec=n.ajaxSettings.xhr();a.attachEvent&&a.attachEvent("onunload",function(){for(var a in Cc)Cc[a]()}),k.cors=!!Ec&&"withCredentials"in Ec,k.ajax=Ec=!!Ec,n.ajaxTransport(function(a){var b;return k.cors||Ec&&!a.crossDomain?{send:function(c,d){var e,f=a.xhr(),g=++Bc;if(f.open(a.type,a.url,a.async,a.username,a.password),a.xhrFields)for(e in a.xhrFields)f[e]=a.xhrFields[e];a.mimeType&&f.overrideMimeType&&f.overrideMimeType(a.mimeType),a.crossDomain||c["X-Requested-With"]||(c["X-Requested-With"]="XMLHttpRequest");for(e in c)f.setRequestHeader(e,c[e]);b=function(a){return function(){b&&(delete Cc[g],b=f.onload=f.onerror=null,"abort"===a?f.abort():"error"===a?d(f.status,f.statusText):d(Dc[f.status]||f.status,f.statusText,"string"==typeof f.responseText?{text:f.responseText}:void 0,f.getAllResponseHeaders()))}},f.onload=b(),f.onerror=b("error"),b=Cc[g]=b("abort");try{f.send(a.hasContent&&a.data||null)}catch(h){if(b)throw h}},abort:function(){b&&b()}}:void 0}),n.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(a){return n.globalEval(a),a}}}),n.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET")}),n.ajaxTransport("script",function(a){if(a.crossDomain){var b,c;return{send:function(d,e){b=n("<script>").prop({async:!0,charset:a.scriptCharset,src:a.url}).on("load error",c=function(a){b.remove(),c=null,a&&e("error"===a.type?404:200,a.type)}),l.head.appendChild(b[0])},abort:function(){c&&c()}}}});var Fc=[],Gc=/(=)\?(?=&|$)|\?\?/;n.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=Fc.pop()||n.expando+"_"+cc++;return this[a]=!0,a}}),n.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(Gc.test(b.url)?"url":"string"==typeof b.data&&!(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&Gc.test(b.data)&&"data");return h||"jsonp"===b.dataTypes[0]?(e=b.jsonpCallback=n.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(Gc,"$1"+e):b.jsonp!==!1&&(b.url+=(dc.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||n.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,Fc.push(e)),g&&n.isFunction(f)&&f(g[0]),g=f=void 0}),"script"):void 0}),n.parseHTML=function(a,b,c){if(!a||"string"!=typeof a)return null;"boolean"==typeof b&&(c=b,b=!1),b=b||l;var d=v.exec(a),e=!c&&[];return d?[b.createElement(d[1])]:(d=n.buildFragment([a],b,e),e&&e.length&&n(e).remove(),n.merge([],d.childNodes))};var Hc=n.fn.load;n.fn.load=function(a,b,c){if("string"!=typeof a&&Hc)return Hc.apply(this,arguments);var d,e,f,g=this,h=a.indexOf(" ");return h>=0&&(d=n.trim(a.slice(h)),a=a.slice(0,h)),n.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(e="POST"),g.length>0&&n.ajax({url:a,type:e,dataType:"html",data:b}).done(function(a){f=arguments,g.html(d?n("<div>").append(n.parseHTML(a)).find(d):a)}).complete(c&&function(a,b){g.each(c,f||[a.responseText,b,a])}),this},n.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){n.fn[b]=function(a){return this.on(b,a)}}),n.expr.filters.animated=function(a){return n.grep(n.timers,function(b){return a===b.elem}).length};var Ic=a.document.documentElement;function Jc(a){return n.isWindow(a)?a:9===a.nodeType&&a.defaultView}n.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=n.css(a,"position"),l=n(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=n.css(a,"top"),i=n.css(a,"left"),j=("absolute"===k||"fixed"===k)&&(f+i).indexOf("auto")>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),n.isFunction(b)&&(b=b.call(a,c,h)),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},n.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){n.offset.setOffset(this,a,b)});var b,c,d=this[0],e={top:0,left:0},f=d&&d.ownerDocument;if(f)return b=f.documentElement,n.contains(b,d)?(typeof d.getBoundingClientRect!==U&&(e=d.getBoundingClientRect()),c=Jc(f),{top:e.top+c.pageYOffset-b.clientTop,left:e.left+c.pageXOffset-b.clientLeft}):e},position:function(){if(this[0]){var a,b,c=this[0],d={top:0,left:0};return"fixed"===n.css(c,"position")?b=c.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),n.nodeName(a[0],"html")||(d=a.offset()),d.top+=n.css(a[0],"borderTopWidth",!0),d.left+=n.css(a[0],"borderLeftWidth",!0)),{top:b.top-d.top-n.css(c,"marginTop",!0),left:b.left-d.left-n.css(c,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||Ic;while(a&&!n.nodeName(a,"html")&&"static"===n.css(a,"position"))a=a.offsetParent;return a||Ic})}}),n.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(b,c){var d="pageYOffset"===c;n.fn[b]=function(e){return J(this,function(b,e,f){var g=Jc(b);return void 0===f?g?g[c]:b[e]:void(g?g.scrollTo(d?a.pageXOffset:f,d?f:a.pageYOffset):b[e]=f)},b,e,arguments.length,null)}}),n.each(["top","left"],function(a,b){n.cssHooks[b]=yb(k.pixelPosition,function(a,c){return c?(c=xb(a,b),vb.test(c)?n(a).position()[b]+"px":c):void 0})}),n.each({Height:"height",Width:"width"},function(a,b){n.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){n.fn[d]=function(d,e){var f=arguments.length&&(c||"boolean"!=typeof d),g=c||(d===!0||e===!0?"margin":"border");return J(this,function(b,c,d){var e;return n.isWindow(b)?b.document.documentElement["client"+a]:9===b.nodeType?(e=b.documentElement,Math.max(b.body["scroll"+a],e["scroll"+a],b.body["offset"+a],e["offset"+a],e["client"+a])):void 0===d?n.css(b,c,g):n.style(b,c,d,g)},b,f?d:void 0,f,null)}})}),n.fn.size=function(){return this.length},n.fn.andSelf=n.fn.addBack,"function"==typeof define&&define.amd&&define("jquery",[],function(){return n});var Kc=a.jQuery,Lc=a.$;return n.noConflict=function(b){return a.$===n&&(a.$=Lc),b&&a.jQuery===n&&(a.jQuery=Kc),n},typeof b===U&&(a.jQuery=a.$=n),n});/*!
 * Bootstrap v3.3.2 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.2",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.2",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")&&(c.prop("checked")&&this.$element.hasClass("active")?a=!1:b.find(".active").removeClass("active")),a&&c.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));a&&this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=this.sliding=this.interval=this.$active=this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&"show"==b&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a(this.options.trigger).filter('[href="#'+b.id+'"], [data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.2",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0,trigger:'[data-toggle="collapse"]'},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":a.extend({},e.data(),{trigger:this});c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){b&&3===b.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=c(d),f={relatedTarget:this};e.hasClass("open")&&(e.trigger(b=a.Event("hide.bs.dropdown",f)),b.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger("hidden.bs.dropdown",f)))}))}function c(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.2",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=c(e),g=f.hasClass("open");if(b(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click",b);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger("shown.bs.dropdown",h)}return!1}},g.prototype.keydown=function(b){if(/(38|40|27|32)/.test(b.which)&&!/input|textarea/i.test(b.target.tagName)){var d=a(this);if(b.preventDefault(),b.stopPropagation(),!d.is(".disabled, :disabled")){var e=c(d),g=e.hasClass("open");if(!g&&27!=b.which||g&&27==b.which)return 27==b.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.divider):visible a",i=e.find('[role="menu"]'+h+', [role="listbox"]'+h);if(i.length){var j=i.index(b.target);38==b.which&&j>0&&j--,40==b.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",b).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$backdrop=this.isShown=null,this.scrollbarWidth=0,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.options.backdrop&&d.adjustBackdrop(),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in").attr("aria-hidden",!1),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$element.find(".modal-dialog").one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a('<div class="modal-backdrop '+e+'" />').prependTo(this.$element).on("click.dismiss.bs.modal",a.proxy(function(a){a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus.call(this.$element[0]):this.hide.call(this))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.options.backdrop&&this.adjustBackdrop(),this.adjustDialog()},c.prototype.adjustBackdrop=function(){this.$backdrop.css("height",0).css("height",this.$element[0].scrollHeight)},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){this.bodyIsOverflowing=document.body.scrollHeight>document.documentElement.clientHeight,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right","")},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null,this.init("tooltip",a,b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(this.options.viewport.selector||this.options.viewport);for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c&&c.$tip&&c.$tip.is(":visible")?void(c.hoverState="in"):(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.options.container?a(this.options.container):this.$element.parent(),p=this.getPosition(o);h="bottom"==h&&k.bottom+m>p.bottom?"top":"top"==h&&k.top-m<p.top?"bottom":"right"==h&&k.right+l>p.width?"left":"left"==h&&k.left-l<p.left?"right":h,f.removeClass(n).addClass(h)}var q=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(q,h);var r=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",r).emulateTransitionEnd(c.TRANSITION_DURATION):r()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top=b.top+g,b.left=b.left+h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=this.tip(),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.width&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){return this.$tip=this.$tip||a(this.options.template)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type)})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.2",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")},c.prototype.tip=function(){return this.$tip||(this.$tip=a(this.options.template)),this.$tip};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){var e=a.proxy(this.process,this);this.$body=a("body"),this.$scrollElement=a(a(c).is("body")?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",e),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.2",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b="offset",c=0;a.isWindow(this.$scrollElement[0])||(b="position",c=this.$scrollElement.scrollTop()),this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight();var d=this;this.$body.find(this.selector).map(function(){var d=a(this),e=d.data("target")||d.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[b]().top+c,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){d.offsets.push(this[0]),d.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(!e[a+1]||b<=e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu")&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()
}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=this.unpin=this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.2",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=a("body").height();"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);/*!
 * Lightbox v2.7.4
 * by Lokesh Dhakar
 *
 * More info:
 * http://lokeshdhakar.com/projects/lightbox2/
 *
 * Copyright 2007, 2015 Lokesh Dhakar
 * Released under the MIT license
 * https://github.com/lokesh/lightbox2/blob/master/LICENSE
 */

(function() {
  // Use local alias
  var $ = jQuery;


  // Descriptions of all options available on the demo site:
  // http://lokeshdhakar.com/projects/lightbox2/index.html#options
  var LightboxOptions = (function() {
    function LightboxOptions() {
      this.alwaysShowNavOnTouchDevices = false;
      this.fadeDuration                = 500;
      this.fitImagesInViewport         = true;
      // this.maxWidth                    = 800;
      // this.maxHeight                   = 600;
      this.positionFromTop             = 50;
      this.resizeDuration              = 700;
      this.showImageNumberLabel        = true;
      this.wrapAround                  = false;
    }

    // Change to localize to non-english language
    LightboxOptions.prototype.albumLabel = function(curImageNum, albumSize) {
      return 'Image ' + curImageNum + ' of ' + albumSize;
    };

    return LightboxOptions;
  })();


  var Lightbox = (function() {
    function Lightbox(options) {
      this.options           = options;
      this.album             = [];
      this.currentImageIndex = void 0;
      this.init();
    }

    Lightbox.prototype.init = function() {
      this.enable();
      this.build();
    };

    // Loop through anchors and areamaps looking for either data-lightbox attributes or rel attributes
    // that contain 'lightbox'. When these are clicked, start lightbox.
    Lightbox.prototype.enable = function() {
      var self = this;
      $('body').on('click', 'a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]', function(event) {
        self.start($(event.currentTarget));
        return false;
      });
    };

    // Build html for the lightbox and the overlay.
    // Attach event handlers to the new DOM elements. click click click
    Lightbox.prototype.build = function() {
      var self = this;
      $('<div id="lightboxOverlay" class="lightboxOverlay"></div><div id="lightbox" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" /><div class="lb-nav"><a class="lb-prev" href="" ></a><a class="lb-next" href="" ></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>').appendTo($('body'));

      // Cache jQuery objects
      this.$lightbox       = $('#lightbox');
      this.$overlay        = $('#lightboxOverlay');
      this.$outerContainer = this.$lightbox.find('.lb-outerContainer');
      this.$container      = this.$lightbox.find('.lb-container');

      // Store css values for future lookup
      this.containerTopPadding = parseInt(this.$container.css('padding-top'), 10);
      this.containerRightPadding = parseInt(this.$container.css('padding-right'), 10);
      this.containerBottomPadding = parseInt(this.$container.css('padding-bottom'), 10);
      this.containerLeftPadding = parseInt(this.$container.css('padding-left'), 10);

      // Attach event handlers to the newly minted DOM elements
      this.$overlay.hide().on('click', function() {
        self.end();
        return false;
      });

      this.$lightbox.hide().on('click', function(event) {
        if ($(event.target).attr('id') === 'lightbox') {
          self.end();
        }
        return false;
      });

      this.$outerContainer.on('click', function(event) {
        if ($(event.target).attr('id') === 'lightbox') {
          self.end();
        }
        return false;
      });

      this.$lightbox.find('.lb-prev').on('click', function() {
        if (self.currentImageIndex === 0) {
          self.changeImage(self.album.length - 1);
        } else {
          self.changeImage(self.currentImageIndex - 1);
        }
        return false;
      });

      this.$lightbox.find('.lb-next').on('click', function() {
        if (self.currentImageIndex === self.album.length - 1) {
          self.changeImage(0);
        } else {
          self.changeImage(self.currentImageIndex + 1);
        }
        return false;
      });

      this.$lightbox.find('.lb-loader, .lb-close').on('click', function() {
        self.end();
        return false;
      });
    };

    // Show overlay and lightbox. If the image is part of a set, add siblings to album array.
    Lightbox.prototype.start = function($link) {
      var self    = this;
      var $window = $(window);

      $window.on('resize', $.proxy(this.sizeOverlay, this));

      $('select, object, embed').css({
        visibility: 'hidden'
      });

      this.sizeOverlay();

      this.album = [];
      var imageNumber = 0;

      function addToAlbum($link) {
        self.album.push({
          link: $link.attr('href'),
          title: $link.attr('data-title') || $link.attr('title')
        });
      }

      // Support both data-lightbox attribute and rel attribute implementations
      var dataLightboxValue = $link.attr('data-lightbox');
      var $links;

      if (dataLightboxValue) {
        $links = $($link.prop('tagName') + '[data-lightbox="' + dataLightboxValue + '"]');
        for (var i = 0; i < $links.length; i = ++i) {
          addToAlbum($($links[i]));
          if ($links[i] === $link[0]) {
            imageNumber = i;
          }
        }
      } else {
        if ($link.attr('rel') === 'lightbox') {
          // If image is not part of a set
          addToAlbum($link);
        } else {
          // If image is part of a set
          $links = $($link.prop('tagName') + '[rel="' + $link.attr('rel') + '"]');
          for (var j = 0; j < $links.length; j = ++j) {
            addToAlbum($($links[j]));
            if ($links[j] === $link[0]) {
              imageNumber = j;
            }
          }
        }
      }

      // Position Lightbox
      var top  = $window.scrollTop() + this.options.positionFromTop;
      var left = $window.scrollLeft();
      this.$lightbox.css({
        top: top + 'px',
        left: left + 'px'
      }).fadeIn(this.options.fadeDuration);

      this.changeImage(imageNumber);
    };

    // Hide most UI elements in preparation for the animated resizing of the lightbox.
    Lightbox.prototype.changeImage = function(imageNumber) {
      var self = this;

      this.disableKeyboardNav();
      var $image = this.$lightbox.find('.lb-image');

      this.$overlay.fadeIn(this.options.fadeDuration);

      $('.lb-loader').fadeIn('slow');
      this.$lightbox.find('.lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption').hide();

      this.$outerContainer.addClass('animating');

      // When image to show is preloaded, we send the width and height to sizeContainer()
      var preloader = new Image();
      preloader.onload = function() {
        var $preloader;
        var imageHeight;
        var imageWidth;
        var maxImageHeight;
        var maxImageWidth;
        var windowHeight;
        var windowWidth;

        $image.attr('src', self.album[imageNumber].link);

        $preloader = $(preloader);

        $image.width(preloader.width);
        $image.height(preloader.height);

        if (self.options.fitImagesInViewport) {
          // Fit image inside the viewport.
          // Take into account the border around the image and an additional 10px gutter on each side.

          windowWidth    = $(window).width();
          windowHeight   = $(window).height();
          maxImageWidth  = windowWidth - self.containerLeftPadding - self.containerRightPadding - 20;
          maxImageHeight = windowHeight - self.containerTopPadding - self.containerBottomPadding - 120;

          // Check if image size is larger then maxWidth|maxHeight in settings
          if (self.options.maxWidth && self.options.maxWidth < maxImageWidth) {
            maxImageWidth = self.options.maxWidth;
          }
          if (self.options.maxHeight && self.options.maxHeight < maxImageWidth) {
            maxImageHeight = self.options.maxHeight;
          }

          // Is there a fitting issue?
          if ((preloader.width > maxImageWidth) || (preloader.height > maxImageHeight)) {
            if ((preloader.width / maxImageWidth) > (preloader.height / maxImageHeight)) {
              imageWidth  = maxImageWidth;
              imageHeight = parseInt(preloader.height / (preloader.width / imageWidth), 10);
              $image.width(imageWidth);
              $image.height(imageHeight);
            } else {
              imageHeight = maxImageHeight;
              imageWidth = parseInt(preloader.width / (preloader.height / imageHeight), 10);
              $image.width(imageWidth);
              $image.height(imageHeight);
            }
          }
        }
        self.sizeContainer($image.width(), $image.height());
      };

      preloader.src          = this.album[imageNumber].link;
      this.currentImageIndex = imageNumber;
    };

    // Stretch overlay to fit the viewport
    Lightbox.prototype.sizeOverlay = function() {
      this.$overlay
        .width($(window).width())
        .height($(document).height());
    };

    // Animate the size of the lightbox to fit the image we are showing
    Lightbox.prototype.sizeContainer = function(imageWidth, imageHeight) {
      var self = this;

      var oldWidth  = this.$outerContainer.outerWidth();
      var oldHeight = this.$outerContainer.outerHeight();
      var newWidth  = imageWidth + this.containerLeftPadding + this.containerRightPadding;
      var newHeight = imageHeight + this.containerTopPadding + this.containerBottomPadding;

      function postResize() {
        self.$lightbox.find('.lb-dataContainer').width(newWidth);
        self.$lightbox.find('.lb-prevLink').height(newHeight);
        self.$lightbox.find('.lb-nextLink').height(newHeight);
        self.showImage();
      }

      if (oldWidth !== newWidth || oldHeight !== newHeight) {
        this.$outerContainer.animate({
          width: newWidth,
          height: newHeight
        }, this.options.resizeDuration, 'swing', function() {
          postResize();
        });
      } else {
        postResize();
      }
    };

    // Display the image and its details and begin preload neighboring images.
    Lightbox.prototype.showImage = function() {
      this.$lightbox.find('.lb-loader').stop(true).hide();
      this.$lightbox.find('.lb-image').fadeIn('slow');

      this.updateNav();
      this.updateDetails();
      this.preloadNeighboringImages();
      this.enableKeyboardNav();
    };

    // Display previous and next navigation if appropriate.
    Lightbox.prototype.updateNav = function() {
      // Check to see if the browser supports touch events. If so, we take the conservative approach
      // and assume that mouse hover events are not supported and always show prev/next navigation
      // arrows in image sets.
      var alwaysShowNav = false;
      try {
        document.createEvent('TouchEvent');
        alwaysShowNav = (this.options.alwaysShowNavOnTouchDevices) ? true : false;
      } catch (e) {}

      this.$lightbox.find('.lb-nav').show();

      if (this.album.length > 1) {
        if (this.options.wrapAround) {
          if (alwaysShowNav) {
            this.$lightbox.find('.lb-prev, .lb-next').css('opacity', '1');
          }
          this.$lightbox.find('.lb-prev, .lb-next').show();
        } else {
          if (this.currentImageIndex > 0) {
            this.$lightbox.find('.lb-prev').show();
            if (alwaysShowNav) {
              this.$lightbox.find('.lb-prev').css('opacity', '1');
            }
          }
          if (this.currentImageIndex < this.album.length - 1) {
            this.$lightbox.find('.lb-next').show();
            if (alwaysShowNav) {
              this.$lightbox.find('.lb-next').css('opacity', '1');
            }
          }
        }
      }
    };

    // Display caption, image number, and closing button.
    Lightbox.prototype.updateDetails = function() {
      var self = this;

      // Enable anchor clicks in the injected caption html.
      // Thanks Nate Wright for the fix. @https://github.com/NateWr
      if (typeof this.album[this.currentImageIndex].title !== 'undefined' &&
        this.album[this.currentImageIndex].title !== '') {
        this.$lightbox.find('.lb-caption')
          .html(this.album[this.currentImageIndex].title)
          .fadeIn('fast')
          .find('a').on('click', function(event) {
            if ($(this).attr('target') !== undefined) {
              window.open($(this).attr('href'), $(this).attr('target'));
            } else {
              location.href = $(this).attr('href');
            }
          });
      }

      if (this.album.length > 1 && this.options.showImageNumberLabel) {
        var labelText = this.options.albumLabel(this.currentImageIndex + 1, this.album.length);
        this.$lightbox.find('.lb-number').text(labelText).fadeIn('fast');
      } else {
        this.$lightbox.find('.lb-number').hide();
      }

      this.$outerContainer.removeClass('animating');

      this.$lightbox.find('.lb-dataContainer').fadeIn(this.options.resizeDuration, function() {
        return self.sizeOverlay();
      });
    };

    // Preload previous and next images in set.
    Lightbox.prototype.preloadNeighboringImages = function() {
      if (this.album.length > this.currentImageIndex + 1) {
        var preloadNext = new Image();
        preloadNext.src = this.album[this.currentImageIndex + 1].link;
      }
      if (this.currentImageIndex > 0) {
        var preloadPrev = new Image();
        preloadPrev.src = this.album[this.currentImageIndex - 1].link;
      }
    };

    Lightbox.prototype.enableKeyboardNav = function() {
      $(document).on('keyup.keyboard', $.proxy(this.keyboardAction, this));
    };

    Lightbox.prototype.disableKeyboardNav = function() {
      $(document).off('.keyboard');
    };

    Lightbox.prototype.keyboardAction = function(event) {
      var KEYCODE_ESC        = 27;
      var KEYCODE_LEFTARROW  = 37;
      var KEYCODE_RIGHTARROW = 39;

      var keycode = event.keyCode;
      var key     = String.fromCharCode(keycode).toLowerCase();
      if (keycode === KEYCODE_ESC || key.match(/x|o|c/)) {
        this.end();
      } else if (key === 'p' || keycode === KEYCODE_LEFTARROW) {
        if (this.currentImageIndex !== 0) {
          this.changeImage(this.currentImageIndex - 1);
        } else if (this.options.wrapAround && this.album.length > 1) {
          this.changeImage(this.album.length - 1);
        }
      } else if (key === 'n' || keycode === KEYCODE_RIGHTARROW) {
        if (this.currentImageIndex !== this.album.length - 1) {
          this.changeImage(this.currentImageIndex + 1);
        } else if (this.options.wrapAround && this.album.length > 1) {
          this.changeImage(0);
        }
      }
    };

    // Closing time. :-(
    Lightbox.prototype.end = function() {
      this.disableKeyboardNav();
      $(window).off('resize', this.sizeOverlay);
      this.$lightbox.fadeOut(this.options.fadeDuration);
      this.$overlay.fadeOut(this.options.fadeDuration);
      $('select, object, embed').css({
        visibility: 'visible'
      });
    };

    return Lightbox;

  })();

  $(function() {
    var options  = new LightboxOptions();
     /*jshint unused:false*/
    var lightbox = new Lightbox(options);
  });

}).call(this);
(function() {
  var MutationObserver, Util, WeakMap,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  Util = (function() {
    function Util() {}

    Util.prototype.extend = function(custom, defaults) {
      var key, value;
      for (key in defaults) {
        value = defaults[key];
        if (custom[key] == null) {
          custom[key] = value;
        }
      }
      return custom;
    };

    Util.prototype.isMobile = function(agent) {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(agent);
    };

    return Util;

  })();

  WeakMap = this.WeakMap || this.MozWeakMap || (WeakMap = (function() {
    function WeakMap() {
      this.keys = [];
      this.values = [];
    }

    WeakMap.prototype.get = function(key) {
      var i, item, _i, _len, _ref;
      _ref = this.keys;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        item = _ref[i];
        if (item === key) {
          return this.values[i];
        }
      }
    };

    WeakMap.prototype.set = function(key, value) {
      var i, item, _i, _len, _ref;
      _ref = this.keys;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        item = _ref[i];
        if (item === key) {
          this.values[i] = value;
          return;
        }
      }
      this.keys.push(key);
      return this.values.push(value);
    };

    return WeakMap;

  })());

  MutationObserver = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (MutationObserver = (function() {
    function MutationObserver() {
      console.warn('MutationObserver is not supported by your browser.');
      console.warn('WOW.js cannot detect dom mutations, please call .sync() after loading new content.');
    }

    MutationObserver.notSupported = true;

    MutationObserver.prototype.observe = function() {};

    return MutationObserver;

  })());

  this.WOW = (function() {
    WOW.prototype.defaults = {
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: true,
      live: true
    };

    function WOW(options) {
      if (options == null) {
        options = {};
      }
      this.scrollCallback = __bind(this.scrollCallback, this);
      this.scrollHandler = __bind(this.scrollHandler, this);
      this.start = __bind(this.start, this);
      this.scrolled = true;
      this.config = this.util().extend(options, this.defaults);
      this.animationNameCache = new WeakMap();
    }

    WOW.prototype.init = function() {
      var _ref;
      this.element = window.document.documentElement;
      if ((_ref = document.readyState) === "interactive" || _ref === "complete") {
        this.start();
      } else {
        document.addEventListener('DOMContentLoaded', this.start);
      }
      return this.finished = [];
    };

    WOW.prototype.start = function() {
      var box, _i, _len, _ref;
      this.stopped = false;
      this.boxes = (function() {
        var _i, _len, _ref, _results;
        _ref = this.element.getElementsByClassName(this.config.boxClass);
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          box = _ref[_i];
          _results.push(box);
        }
        return _results;
      }).call(this);
      this.all = (function() {
        var _i, _len, _ref, _results;
        _ref = this.boxes;
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          box = _ref[_i];
          _results.push(box);
        }
        return _results;
      }).call(this);
      if (this.boxes.length) {
        if (this.disabled()) {
          this.resetStyle();
        } else {
          _ref = this.boxes;
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            box = _ref[_i];
            this.applyStyle(box, true);
          }
          window.addEventListener('scroll', this.scrollHandler, false);
          window.addEventListener('resize', this.scrollHandler, false);
          this.interval = setInterval(this.scrollCallback, 50);
        }
      }
      if (this.config.live) {
        return new MutationObserver((function(_this) {
          return function(records) {
            var node, record, _j, _len1, _results;
            _results = [];
            for (_j = 0, _len1 = records.length; _j < _len1; _j++) {
              record = records[_j];
              _results.push((function() {
                var _k, _len2, _ref1, _results1;
                _ref1 = record.addedNodes || [];
                _results1 = [];
                for (_k = 0, _len2 = _ref1.length; _k < _len2; _k++) {
                  node = _ref1[_k];
                  _results1.push(this.doSync(node));
                }
                return _results1;
              }).call(_this));
            }
            return _results;
          };
        })(this)).observe(document.body, {
          childList: true,
          subtree: true
        });
      }
    };

    WOW.prototype.stop = function() {
      this.stopped = true;
      window.removeEventListener('scroll', this.scrollHandler, false);
      window.removeEventListener('resize', this.scrollHandler, false);
      if (this.interval != null) {
        return clearInterval(this.interval);
      }
    };

    WOW.prototype.sync = function(element) {
      if (MutationObserver.notSupported) {
        return this.doSync(this.element);
      }
    };

    WOW.prototype.doSync = function(element) {
      var box, _i, _len, _ref, _results;
      if (!this.stopped) {
        if (element == null) {
          element = this.element;
        }
        if (element.nodeType !== 1) {
          return;
        }
        element = element.parentNode || element;
        _ref = element.getElementsByClassName(this.config.boxClass);
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          box = _ref[_i];
          if (__indexOf.call(this.all, box) < 0) {
            this.applyStyle(box, true);
            this.boxes.push(box);
            this.all.push(box);
            _results.push(this.scrolled = true);
          } else {
            _results.push(void 0);
          }
        }
        return _results;
      }
    };

    WOW.prototype.show = function(box) {
      this.applyStyle(box);
      return box.className = "" + box.className + " " + this.config.animateClass;
    };

    WOW.prototype.applyStyle = function(box, hidden) {
      var delay, duration, iteration;
      duration = box.getAttribute('data-wow-duration');
      delay = box.getAttribute('data-wow-delay');
      iteration = box.getAttribute('data-wow-iteration');
      return this.animate((function(_this) {
        return function() {
          return _this.customStyle(box, hidden, duration, delay, iteration);
        };
      })(this));
    };

    WOW.prototype.animate = (function() {
      if ('requestAnimationFrame' in window) {
        return function(callback) {
          return window.requestAnimationFrame(callback);
        };
      } else {
        return function(callback) {
          return callback();
        };
      }
    })();

    WOW.prototype.resetStyle = function() {
      var box, _i, _len, _ref, _results;
      _ref = this.boxes;
      _results = [];
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        box = _ref[_i];
        _results.push(box.setAttribute('style', 'visibility: visible;'));
      }
      return _results;
    };

    WOW.prototype.customStyle = function(box, hidden, duration, delay, iteration) {
      if (hidden) {
        this.cacheAnimationName(box);
      }
      box.style.visibility = hidden ? 'hidden' : 'visible';
      if (duration) {
        this.vendorSet(box.style, {
          animationDuration: duration
        });
      }
      if (delay) {
        this.vendorSet(box.style, {
          animationDelay: delay
        });
      }
      if (iteration) {
        this.vendorSet(box.style, {
          animationIterationCount: iteration
        });
      }
      this.vendorSet(box.style, {
        animationName: hidden ? 'none' : this.cachedAnimationName(box)
      });
      return box;
    };

    WOW.prototype.vendors = ["moz", "webkit"];

    WOW.prototype.vendorSet = function(elem, properties) {
      var name, value, vendor, _results;
      _results = [];
      for (name in properties) {
        value = properties[name];
        elem["" + name] = value;
        _results.push((function() {
          var _i, _len, _ref, _results1;
          _ref = this.vendors;
          _results1 = [];
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            vendor = _ref[_i];
            _results1.push(elem["" + vendor + (name.charAt(0).toUpperCase()) + (name.substr(1))] = value);
          }
          return _results1;
        }).call(this));
      }
      return _results;
    };

    WOW.prototype.vendorCSS = function(elem, property) {
      var result, style, vendor, _i, _len, _ref;
      style = window.getComputedStyle(elem);
      result = style.getPropertyCSSValue(property);
      _ref = this.vendors;
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        vendor = _ref[_i];
        result = result || style.getPropertyCSSValue("-" + vendor + "-" + property);
      }
      return result;
    };

    WOW.prototype.animationName = function(box) {
      var animationName;
      try {
        animationName = this.vendorCSS(box, 'animation-name').cssText;
      } catch (_error) {
        animationName = window.getComputedStyle(box).getPropertyValue('animation-name');
      }
      if (animationName === 'none') {
        return '';
      } else {
        return animationName;
      }
    };

    WOW.prototype.cacheAnimationName = function(box) {
      return this.animationNameCache.set(box, this.animationName(box));
    };

    WOW.prototype.cachedAnimationName = function(box) {
      return this.animationNameCache.get(box);
    };

    WOW.prototype.scrollHandler = function() {
      return this.scrolled = true;
    };

    WOW.prototype.scrollCallback = function() {
      var box;
      if (this.scrolled) {
        this.scrolled = false;
        this.boxes = (function() {
          var _i, _len, _ref, _results;
          _ref = this.boxes;
          _results = [];
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            box = _ref[_i];
            if (!(box)) {
              continue;
            }
            if (this.isVisible(box)) {
              this.show(box);
              continue;
            }
            _results.push(box);
          }
          return _results;
        }).call(this);
        if (!(this.boxes.length || this.config.live)) {
          return this.stop();
        }
      }
    };

    WOW.prototype.offsetTop = function(element) {
      var top;
      while (element.offsetTop === void 0) {
        element = element.parentNode;
      }
      top = element.offsetTop;
      while (element = element.offsetParent) {
        top += element.offsetTop;
      }
      return top;
    };

    WOW.prototype.isVisible = function(box) {
      var bottom, offset, top, viewBottom, viewTop;
      offset = box.getAttribute('data-wow-offset') || this.config.offset;
      viewTop = window.pageYOffset;
      viewBottom = viewTop + Math.min(this.element.clientHeight, innerHeight) - offset;
      top = this.offsetTop(box);
      bottom = top + box.clientHeight;
      return top <= viewBottom && bottom >= viewTop;
    };

    WOW.prototype.util = function() {
      return this._util != null ? this._util : this._util = new Util();
    };

    WOW.prototype.disabled = function() {
      return !this.config.mobile && this.util().isMobile(navigator.userAgent);
    };

    return WOW;

  })();

}).call(this);
/**
 * hoverIntent is similar to jQuery's built-in "hover" method except that
 * instead of firing the handlerIn function immediately, hoverIntent checks
 * to see if the user's mouse has slowed down (beneath the sensitivity
 * threshold) before firing the event. The handlerOut function is only
 * called after a matching handlerIn.
 *
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2013 Brian Cherne
 *
 * // basic usage ... just like .hover()
 * .hoverIntent( handlerIn, handlerOut )
 * .hoverIntent( handlerInOut )
 *
 * // basic usage ... with event delegation!
 * .hoverIntent( handlerIn, handlerOut, selector )
 * .hoverIntent( handlerInOut, selector )
 *
 * // using a basic configuration object
 * .hoverIntent( config )
 *
 * @param  handlerIn   function OR configuration object
 * @param  handlerOut  function OR selector for delegation OR undefined
 * @param  selector    selector OR undefined
 * @author Brian Cherne <brian(at)cherne(dot)net>
 **/
(function($) {
    $.fn.hoverIntent = function(handlerIn,handlerOut,selector) {

        // default configuration values
        var cfg = {
            interval: 100,
            sensitivity: 7,
            timeout: 0
        };

        if ( typeof handlerIn === "object" ) {
            cfg = $.extend(cfg, handlerIn );
        } else if ($.isFunction(handlerOut)) {
            cfg = $.extend(cfg, { over: handlerIn, out: handlerOut, selector: selector } );
        } else {
            cfg = $.extend(cfg, { over: handlerIn, out: handlerIn, selector: handlerOut } );
        }

        // instantiate variables
        // cX, cY = current X and Y position of mouse, updated by mousemove event
        // pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
        var cX, cY, pX, pY;

        // A private function for getting mouse position
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY;
        };

        // A private function for comparing current and previous mouse position
        var compare = function(ev,ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            // compare mouse positions to see if they've crossed the threshold
            if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
                $(ob).off("mousemove.hoverIntent",track);
                // set hoverIntent state to true (so mouseOut can be called)
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob,[ev]);
            } else {
                // set previous coordinates for next time
                pX = cX; pY = cY;
                // use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
                ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
            }
        };

        // A private function for delaying the mouseOut function
        var delay = function(ev,ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob,[ev]);
        };

        // A private function for handling mouse 'hovering'
        var handleHover = function(e) {
            // copy objects to be passed into t (required for event object to be passed in IE)
            var ev = jQuery.extend({},e);
            var ob = this;

            // cancel hoverIntent timer if it exists
            if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

            // if e.type == "mouseenter"
            if (e.type == "mouseenter") {
                // set "previous" X and Y position based on initial entry point
                pX = ev.pageX; pY = ev.pageY;
                // update "current" X and Y position based on mousemove
                $(ob).on("mousemove.hoverIntent",track);
                // start polling interval (self-calling timeout) to compare mouse coordinates over time
                if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

                // else e.type == "mouseleave"
            } else {
                // unbind expensive mousemove event
                $(ob).off("mousemove.hoverIntent",track);
                // if hoverIntent state is true, then call the mouseOut function after the specified delay
                if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
            }
        };

        // listen for mouseenter and mouseleave
        return this.on({'mouseenter.hoverIntent':handleHover,'mouseleave.hoverIntent':handleHover}, cfg.selector);
    };
})(jQuery);/*
 * jQuery Superfish Menu Plugin
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */

(function ($, w) {
	"use strict";

	var methods = (function () {
		// private properties and methods go here
		var c = {
				bcClass: 'sf-breadcrumb',
				menuClass: 'sf-js-enabled',
				anchorClass: 'sf-with-ul',
				menuArrowClass: 'sf-arrows'
			},
			ios = (function () {
				var ios = /iPhone|iPad|iPod/i.test(navigator.userAgent);
				if (ios) {
					// iOS clicks only bubble as far as body children
					$(w).load(function () {
						$('body').children().on('click', $.noop);
					});
				}
				return ios;
			})(),
			wp7 = (function () {
				var style = document.documentElement.style;
				return ('behavior' in style && 'fill' in style && /iemobile/i.test(navigator.userAgent));
			})(),
			unprefixedPointerEvents = (function () {
				return (!!w.PointerEvent);
			})(),
			toggleMenuClasses = function ($menu, o) {
				var classes = c.menuClass;
				if (o.cssArrows) {
					classes += ' ' + c.menuArrowClass;
				}
				$menu.toggleClass(classes);
			},
			setPathToCurrent = function ($menu, o) {
				return $menu.find('li.' + o.pathClass).slice(0, o.pathLevels)
					.addClass(o.hoverClass + ' ' + c.bcClass)
						.filter(function () {
							return ($(this).children(o.popUpSelector).hide().show().length);
						}).removeClass(o.pathClass);
			},
			toggleAnchorClass = function ($li) {
				$li.children('a').toggleClass(c.anchorClass);
			},
			toggleTouchAction = function ($menu) {
				var msTouchAction = $menu.css('ms-touch-action');
				var touchAction = $menu.css('touch-action');
				touchAction = touchAction || msTouchAction;
				touchAction = (touchAction === 'pan-y') ? 'auto' : 'pan-y';
				$menu.css({
					'ms-touch-action': touchAction,
					'touch-action': touchAction
				});
			},
			applyHandlers = function ($menu, o) {
				var targets = 'li:has(' + o.popUpSelector + ')';
				if ($.fn.hoverIntent && !o.disableHI) {
					$menu.hoverIntent(over, out, targets);
				}
				else {
					$menu
						.on('mouseenter.superfish', targets, over)
						.on('mouseleave.superfish', targets, out);
				}
				var touchevent = 'MSPointerDown.superfish';
				if (unprefixedPointerEvents) {
					touchevent = 'pointerdown.superfish';
				}
				if (!ios) {
					touchevent += ' touchend.superfish';
				}
				if (wp7) {
					touchevent += ' mousedown.superfish';
				}
				$menu
					.on('focusin.superfish', 'li', over)
					.on('focusout.superfish', 'li', out)
					.on(touchevent, 'a', o, touchHandler);
			},
			touchHandler = function (e) {
				var $this = $(this),
					$ul = $this.siblings(e.data.popUpSelector);

				if ($ul.length > 0 && $ul.is(':hidden')) {
					$this.one('click.superfish', false);
					if (e.type === 'MSPointerDown' || e.type === 'pointerdown') {
						$this.trigger('focus');
					} else {
						$.proxy(over, $this.parent('li'))();
					}
				}
			},
			over = function () {
				var $this = $(this),
					o = getOptions($this);
				clearTimeout(o.sfTimer);
				$this.siblings().superfish('hide').end().superfish('show');
			},
			out = function () {
				var $this = $(this),
					o = getOptions($this);
				if (ios) {
					$.proxy(close, $this, o)();
				}
				else {
					clearTimeout(o.sfTimer);
					o.sfTimer = setTimeout($.proxy(close, $this, o), o.delay);
				}
			},
			close = function (o) {
				o.retainPath = ($.inArray(this[0], o.$path) > -1);
				this.superfish('hide');

				if (!this.parents('.' + o.hoverClass).length) {
					o.onIdle.call(getMenu(this));
					if (o.$path.length) {
						$.proxy(over, o.$path)();
					}
				}
			},
			getMenu = function ($el) {
				return $el.closest('.' + c.menuClass);
			},
			getOptions = function ($el) {
				return getMenu($el).data('sf-options');
			};

		return {
			// public methods
			hide: function (instant) {
				if (this.length) {
					var $this = this,
						o = getOptions($this);
					if (!o) {
						return this;
					}
					var not = (o.retainPath === true) ? o.$path : '',
						$ul = $this.find('li.' + o.hoverClass).add(this).not(not).removeClass(o.hoverClass).children(o.popUpSelector),
						speed = o.speedOut;

					if (instant) {
						$ul.show();
						speed = 0;
					}
					o.retainPath = false;
					o.onBeforeHide.call($ul);
					$ul.stop(true, true).animate(o.animationOut, speed, function () {
						var $this = $(this);
						o.onHide.call($this);
					});
				}
				return this;
			},
			show: function () {
				var o = getOptions(this);
				if (!o) {
					return this;
				}
				var $this = this.addClass(o.hoverClass),
					$ul = $this.children(o.popUpSelector);

				o.onBeforeShow.call($ul);
				$ul.stop(true, true).animate(o.animation, o.speed, function () {
					o.onShow.call($ul);
				});
				return this;
			},
			destroy: function () {
				return this.each(function () {
					var $this = $(this),
						o = $this.data('sf-options'),
						$hasPopUp;
					if (!o) {
						return false;
					}
					$hasPopUp = $this.find(o.popUpSelector).parent('li');
					clearTimeout(o.sfTimer);
					toggleMenuClasses($this, o);
					toggleAnchorClass($hasPopUp);
					toggleTouchAction($this);
					// remove event handlers
					$this.off('.superfish').off('.hoverIntent');
					// clear animation's inline display style
					$hasPopUp.children(o.popUpSelector).attr('style', function (i, style) {
						return style.replace(/display[^;]+;?/g, '');
					});
					// reset 'current' path classes
					o.$path.removeClass(o.hoverClass + ' ' + c.bcClass).addClass(o.pathClass);
					$this.find('.' + o.hoverClass).removeClass(o.hoverClass);
					o.onDestroy.call($this);
					$this.removeData('sf-options');
				});
			},
			init: function (op) {
				return this.each(function () {
					var $this = $(this);
					if ($this.data('sf-options')) {
						return false;
					}
					var o = $.extend({}, $.fn.superfish.defaults, op),
						$hasPopUp = $this.find(o.popUpSelector).parent('li');
					o.$path = setPathToCurrent($this, o);

					$this.data('sf-options', o);

					toggleMenuClasses($this, o);
					toggleAnchorClass($hasPopUp);
					toggleTouchAction($this);
					applyHandlers($this, o);

					$hasPopUp.not('.' + c.bcClass).superfish('hide', true);

					o.onInit.call(this);
				});
			}
		};
	})();

	$.fn.superfish = function (method, args) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		}
		else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		}
		else {
			return $.error('Method ' +  method + ' does not exist on jQuery.fn.superfish');
		}
	};

	$.fn.superfish.defaults = {
		popUpSelector: 'ul,.sf-mega', // within menu context
		hoverClass: 'sfHover',
		pathClass: 'overrideThisToUse',
		pathLevels: 1,
		delay: 800,
		animation: {opacity: 'show'},
		animationOut: {opacity: 'hide'},
		speed: 'normal',
		speedOut: 'fast',
		cssArrows: true,
		disableHI: false,
		onInit: $.noop,
		onBeforeShow: $.noop,
		onShow: $.noop,
		onBeforeHide: $.noop,
		onHide: $.noop,
		onIdle: $.noop,
		onDestroy: $.noop
	};

})(jQuery, window);
/*
Plugin Name: 	BrowserSelector
Written by: 	Crivos - (http://www.crivos.com)
Version: 		0.1
*/

(function($) {
	$.extend({

		browserSelector: function() {

			var u = navigator.userAgent,
				ua = u.toLowerCase(),
				is = function (t) {
					return ua.indexOf(t) > -1;
				},
				g = 'gecko',
				w = 'webkit',
				s = 'safari',
				o = 'opera',
				h = document.documentElement,
				b = [(!(/opera|webtv/i.test(ua)) && /msie\s(\d)/.test(ua)) ? ('ie ie' + parseFloat(navigator.appVersion.split("MSIE")[1])) : is('firefox/2') ? g + ' ff2' : is('firefox/3.5') ? g + ' ff3 ff3_5' : is('firefox/3') ? g + ' ff3' : is('gecko/') ? g : is('opera') ? o + (/version\/(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery1 : (/opera(\s|\/)(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery2 : '')) : is('konqueror') ? 'konqueror' : is('chrome') ? w + ' chrome' : is('iron') ? w + ' iron' : is('applewebkit/') ? w + ' ' + s + (/version\/(\d+)/.test(ua) ? ' ' + s + RegExp.jQuery1 : '') : is('mozilla/') ? g : '', is('j2me') ? 'mobile' : is('iphone') ? 'iphone' : is('ipod') ? 'ipod' : is('mac') ? 'mac' : is('darwin') ? 'mac' : is('webtv') ? 'webtv' : is('win') ? 'win' : is('freebsd') ? 'freebsd' : (is('x11') || is('linux')) ? 'linux' : '', 'js'];

			c = b.join(' ');
			h.className += ' ' + c;

		}

	});
})(jQuery);

/*
Plugin Name: 	smoothScroll for jQuery.
Written by: 	Crivos - (http://www.crivos.com)
Version: 		0.1

Based on:

	SmoothScroll v1.2.1
	Licensed under the terms of the MIT license.

	People involved
	 - Balazs Galambosi (maintainer)
	 - Patrick Brunner  (original idea)
	 - Michael Herf     (Pulse Algorithm)

*/
(function($) {
	$.extend({

		smoothScroll: function() {

			// Scroll Variables (tweakable)
			var defaultOptions = {

				// Scrolling Core
				frameRate        : 150, // [Hz]
				animationTime    : 700, // [px]
				stepSize         : 80, // [px]

				// Pulse (less tweakable)
				// ratio of "tail" to "acceleration"
				pulseAlgorithm   : true,
				pulseScale       : 8,
				pulseNormalize   : 1,

				// Acceleration
				accelerationDelta : 20,  // 20
				accelerationMax   : 1,   // 1

				// Keyboard Settings
				keyboardSupport   : true,  // option
				arrowScroll       : 50,     // [px]

				// Other
				touchpadSupport   : true,
				fixedBackground   : true,
				excluded          : ""
			};

			var options = defaultOptions;

			// Other Variables
			var isExcluded = false;
			var isFrame = false;
			var direction = { x: 0, y: 0 };
			var initDone  = false;
			var root = document.documentElement;
			var activeElement;
			var observer;
			var deltaBuffer = [ 120, 120, 120 ];

			var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32,
						pageup: 33, pagedown: 34, end: 35, home: 36 };


			/***********************************************
			 * INITIALIZE
			 ***********************************************/

			/**
			 * Tests if smooth scrolling is allowed. Shuts down everything if not.
			 */
			function initTest() {

				var disableKeyboard = false;

				// disable keys for google reader (spacebar conflict)
				if (document.URL.indexOf("google.com/reader/view") > -1) {
					disableKeyboard = true;
				}

				// disable everything if the page is blacklisted
				if (options.excluded) {
					var domains = options.excluded.split(/[,\n] ?/);
					domains.push("mail.google.com"); // exclude Gmail for now
					for (var i = domains.length; i--;) {
						if (document.URL.indexOf(domains[i]) > -1) {
							observer && observer.disconnect();
							removeEvent("mousewheel", wheel);
							disableKeyboard = true;
							isExcluded = true;
							break;
						}
					}
				}

				// disable keyboard support if anything above requested it
				if (disableKeyboard) {
					removeEvent("keydown", keydown);
				}

				if (options.keyboardSupport && !disableKeyboard) {
					addEvent("keydown", keydown);
				}
			}

			/**
			 * Sets up scrolls array, determines if frames are involved.
			 */
			function init() {

				if (!document.body) return;

				var body = document.body;
				var html = document.documentElement;
				var windowHeight = window.innerHeight;
				var scrollHeight = body.scrollHeight;

				// check compat mode for root element
				root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
				activeElement = body;

				initTest();
				initDone = true;

				// Checks if this script is running in a frame
				if (top != self) {
					isFrame = true;
				}

				/**
				 * This fixes a bug where the areas left and right to
				 * the content does not trigger the onmousewheel event
				 * on some pages. e.g.: html, body { height: 100% }
				 */
				else if (scrollHeight > windowHeight &&
						(body.offsetHeight <= windowHeight ||
						 html.offsetHeight <= windowHeight)) {

					// DOMChange (throttle): fix height
					var pending = false;
					var refresh = function () {
						if (!pending && html.scrollHeight != document.height) {
							pending = true; // add a new pending action
							setTimeout(function () {
								html.style.height = document.height + 'px';
								pending = false;
							}, 500); // act rarely to stay fast
						}
					};
					html.style.height = 'auto';
					setTimeout(refresh, 10);

					var config = {
						attributes: true,
						childList: true,
						characterData: false
					};

					observer = new MutationObserver(refresh);
					observer.observe(body, config);

					// clearfix
					if (root.offsetHeight <= windowHeight) {
						var underlay = document.createElement("div");
						underlay.style.clear = "both";
						body.appendChild(underlay);
					}
				}

				// gmail performance fix
				if (document.URL.indexOf("mail.google.com") > -1) {
					var s = document.createElement("style");
					s.innerHTML = ".iu { visibility: hidden }";
					(document.getElementsByTagName("head")[0] || html).appendChild(s);
				}
				// facebook better home timeline performance
				// all the HTML resized images make rendering CPU intensive
				else if (document.URL.indexOf("www.facebook.com") > -1) {
					var home_stream = document.getElementById("home_stream");
					home_stream && (home_stream.style.webkitTransform = "translateZ(0)");
				}
				// disable fixed background
				if (!options.fixedBackground && !isExcluded) {
					body.style.backgroundAttachment = "scroll";
					html.style.backgroundAttachment = "scroll";
				}
			}


			/************************************************
			 * SCROLLING
			 ************************************************/

			var que = [];
			var pending = false;
			var lastScroll = +new Date;

			/**
			 * Pushes scroll actions to the scrolling queue.
			 */
			function scrollArray(elem, left, top, delay) {

				delay || (delay = 1000);
				directionCheck(left, top);

				if (options.accelerationMax != 1) {
					var now = +new Date;
					var elapsed = now - lastScroll;
					if (elapsed < options.accelerationDelta) {
						var factor = (1 + (30 / elapsed)) / 2;
						if (factor > 1) {
							factor = Math.min(factor, options.accelerationMax);
							left *= factor;
							top  *= factor;
						}
					}
					lastScroll = +new Date;
				}

				// push a scroll command
				que.push({
					x: left,
					y: top,
					lastX: (left < 0) ? 0.99 : -0.99,
					lastY: (top  < 0) ? 0.99 : -0.99,
					start: +new Date
				});

				// don't act if there's a pending queue
				if (pending) {
					return;
				}

				var scrollWindow = (elem === document.body);

				var step = function (time) {

					var now = +new Date;
					var scrollX = 0;
					var scrollY = 0;

					for (var i = 0; i < que.length; i++) {

						var item = que[i];
						var elapsed  = now - item.start;
						var finished = (elapsed >= options.animationTime);

						// scroll position: [0, 1]
						var position = (finished) ? 1 : elapsed / options.animationTime;

						// easing [optional]
						if (options.pulseAlgorithm) {
							position = pulse(position);
						}

						// only need the difference
						var x = (item.x * position - item.lastX) >> 0;
						var y = (item.y * position - item.lastY) >> 0;

						// add this to the total scrolling
						scrollX += x;
						scrollY += y;

						// update last values
						item.lastX += x;
						item.lastY += y;

						// delete and step back if it's over
						if (finished) {
							que.splice(i, 1); i--;
						}
					}

					// scroll left and top
					if (scrollWindow) {
						window.scrollBy(scrollX, scrollY);
					}
					else {
						if (scrollX) elem.scrollLeft += scrollX;
						if (scrollY) elem.scrollTop  += scrollY;
					}

					// clean up if there's nothing left to do
					if (!left && !top) {
						que = [];
					}

					if (que.length) {
						requestFrame(step, elem, (delay / options.frameRate + 1));
					} else {
						pending = false;
					}
				};

				// start a new queue of actions
				requestFrame(step, elem, 0);
				pending = true;
			}


			/***********************************************
			 * EVENTS
			 ***********************************************/

			/**
			 * Mouse wheel handler.
			 * @param {Object} event
			 */
			function wheel(event) {

				if (!initDone) {
					init();
				}

				var target = event.target;
				var overflowing = overflowingAncestor(target);

				// use default if there's no overflowing
				// element or default action is prevented
				if (!overflowing || event.defaultPrevented ||
					isNodeName(activeElement, "embed") ||
				   (isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
					return true;
				}

				var deltaX = event.wheelDeltaX || 0;
				var deltaY = event.wheelDeltaY || 0;

				// use wheelDelta if deltaX/Y is not available
				if (!deltaX && !deltaY) {
					deltaY = event.wheelDelta || 0;
				}

				// check if it's a touchpad scroll that should be ignored
				if (!options.touchpadSupport && isTouchpad(deltaY)) {
					return true;
				}

				// scale by step size
				// delta is 120 most of the time
				// synaptics seems to send 1 sometimes
				if (Math.abs(deltaX) > 1.2) {
					deltaX *= options.stepSize / 120;
				}
				if (Math.abs(deltaY) > 1.2) {
					deltaY *= options.stepSize / 120;
				}

				scrollArray(overflowing, -deltaX, -deltaY);
				event.preventDefault();
			}

			/**
			 * Keydown event handler.
			 * @param {Object} event
			 */
			function keydown(event) {

				var target   = event.target;
				var modifier = event.ctrlKey || event.altKey || event.metaKey ||
							  (event.shiftKey && event.keyCode !== key.spacebar);

				// do nothing if user is editing text
				// or using a modifier key (except shift)
				// or in a dropdown
				if ( /input|textarea|select|embed/i.test(target.nodeName) ||
					 target.isContentEditable ||
					 event.defaultPrevented   ||
					 modifier ) {
				  return true;
				}
				// spacebar should trigger button press
				if (isNodeName(target, "button") &&
					event.keyCode === key.spacebar) {
				  return true;
				}

				var shift, x = 0, y = 0;
				var elem = overflowingAncestor(activeElement);
				var clientHeight = elem.clientHeight;

				if (elem == document.body) {
					clientHeight = window.innerHeight;
				}

				switch (event.keyCode) {
					case key.up:
						y = -options.arrowScroll;
						break;
					case key.down:
						y = options.arrowScroll;
						break;
					case key.spacebar: // (+ shift)
						shift = event.shiftKey ? 1 : -1;
						y = -shift * clientHeight * 0.9;
						break;
					case key.pageup:
						y = -clientHeight * 0.9;
						break;
					case key.pagedown:
						y = clientHeight * 0.9;
						break;
					case key.home:
						y = -elem.scrollTop;
						break;
					case key.end:
						var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
						y = (damt > 0) ? damt+10 : 0;
						break;
					case key.left:
						x = -options.arrowScroll;
						break;
					case key.right:
						x = options.arrowScroll;
						break;
					default:
						return true; // a key we don't care about
				}

				scrollArray(elem, x, y);
				event.preventDefault();
			}

			/**
			 * Mousedown event only for updating activeElement
			 */
			function mousedown(event) {
				activeElement = event.target;
			}


			/***********************************************
			 * OVERFLOW
			 ***********************************************/

			var cache = {}; // cleared out every once in while
			setInterval(function () { cache = {}; }, 10 * 1000);

			var uniqueID = (function () {
				var i = 0;
				return function (el) {
					return el.uniqueID || (el.uniqueID = i++);
				};
			})();

			function setCache(elems, overflowing) {
				for (var i = elems.length; i--;)
					cache[uniqueID(elems[i])] = overflowing;
				return overflowing;
			}

			function overflowingAncestor(el) {
				var elems = [];
				var rootScrollHeight = root.scrollHeight;
				do {
					var cached = cache[uniqueID(el)];
					if (cached) {
						return setCache(elems, cached);
					}
					elems.push(el);
					if (rootScrollHeight === el.scrollHeight) {
						if (!isFrame || root.clientHeight + 10 < rootScrollHeight) {
							return setCache(elems, document.body); // scrolling root in WebKit
						}
					} else if (el.clientHeight + 10 < el.scrollHeight) {
						overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
						if (overflow === "scroll" || overflow === "auto") {
							return setCache(elems, el);
						}
					}
				} while (el = el.parentNode);
			}


			/***********************************************
			 * HELPERS
			 ***********************************************/

			function addEvent(type, fn, bubble) {
				window.addEventListener(type, fn, (bubble||false));
			}

			function removeEvent(type, fn, bubble) {
				window.removeEventListener(type, fn, (bubble||false));
			}

			function isNodeName(el, tag) {
				return (el.nodeName||"").toLowerCase() === tag.toLowerCase();
			}

			function directionCheck(x, y) {
				x = (x > 0) ? 1 : -1;
				y = (y > 0) ? 1 : -1;
				if (direction.x !== x || direction.y !== y) {
					direction.x = x;
					direction.y = y;
					que = [];
					lastScroll = 0;
				}
			}

			var deltaBufferTimer;

			function isTouchpad(deltaY) {
				if (!deltaY) return;
				deltaY = Math.abs(deltaY)
				deltaBuffer.push(deltaY);
				deltaBuffer.shift();
				clearTimeout(deltaBufferTimer);
				var allEquals    = (deltaBuffer[0] == deltaBuffer[1] &&
									deltaBuffer[1] == deltaBuffer[2]);
				var allDivisable = (isDivisible(deltaBuffer[0], 120) &&
									isDivisible(deltaBuffer[1], 120) &&
									isDivisible(deltaBuffer[2], 120));
				return !(allEquals || allDivisable);
			}

			function isDivisible(n, divisor) {
				return (Math.floor(n / divisor) == n / divisor);
			}

			var requestFrame = (function () {
				  return  window.requestAnimationFrame       ||
						  window.webkitRequestAnimationFrame ||
						  function (callback, element, delay) {
							  window.setTimeout(callback, delay || (1000/60));
						  };
			})();

			var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;


			/***********************************************
			 * PULSE
			 ***********************************************/

			/**
			 * Viscous fluid with a pulse for part and decay for the rest.
			 * - Applies a fixed force over an interval (a damped acceleration), and
			 * - Lets the exponential bleed away the velocity over a longer interval
			 * - Michael Herf, http://stereopsis.com/stopping/
			 */
			function pulse_(x) {
				var val, start, expx;
				// test
				x = x * options.pulseScale;
				if (x < 1) { // acceleartion
					val = x - (1 - Math.exp(-x));
				} else {     // tail
					// the previous animation ended here:
					start = Math.exp(-1);
					// simple viscous drag
					x -= 1;
					expx = 1 - Math.exp(-x);
					val = start + (expx * (1 - start));
				}
				return val * options.pulseNormalize;
			}

			function pulse(x) {
				if (x >= 1) return 1;
				if (x <= 0) return 0;

				if (options.pulseNormalize == 1) {
					options.pulseNormalize /= pulse_(1);
				}
				return pulse_(x);
			}

			addEvent("mousedown", mousedown);
			addEvent("mousewheel", wheel);
			addEvent("load", init);

		}

	});
})(jQuery);!function(a,b,c,d){function e(b,c){this.settings=null,this.options=a.extend({},e.Defaults,c),this.$element=a(b),this.drag=a.extend({},m),this.state=a.extend({},n),this.e=a.extend({},o),this._plugins={},this._supress={},this._current=null,this._speed=null,this._coordinates=[],this._breakpoint=null,this._width=null,this._items=[],this._clones=[],this._mergers=[],this._invalidated={},this._pipe=[],a.each(e.Plugins,a.proxy(function(a,b){this._plugins[a[0].toLowerCase()+a.slice(1)]=new b(this)},this)),a.each(e.Pipe,a.proxy(function(b,c){this._pipe.push({filter:c.filter,run:a.proxy(c.run,this)})},this)),this.setup(),this.initialize()}function f(a){if(a.touches!==d)return{x:a.touches[0].pageX,y:a.touches[0].pageY};if(a.touches===d){if(a.pageX!==d)return{x:a.pageX,y:a.pageY};if(a.pageX===d)return{x:a.clientX,y:a.clientY}}}function g(a){var b,d,e=c.createElement("div"),f=a;for(b in f)if(d=f[b],"undefined"!=typeof e.style[d])return e=null,[d,b];return[!1]}function h(){return g(["transition","WebkitTransition","MozTransition","OTransition"])[1]}function i(){return g(["transform","WebkitTransform","MozTransform","OTransform","msTransform"])[0]}function j(){return g(["perspective","webkitPerspective","MozPerspective","OPerspective","MsPerspective"])[0]}function k(){return"ontouchstart"in b||!!navigator.msMaxTouchPoints}function l(){return b.navigator.msPointerEnabled}var m,n,o;m={start:0,startX:0,startY:0,current:0,currentX:0,currentY:0,offsetX:0,offsetY:0,distance:null,startTime:0,endTime:0,updatedX:0,targetEl:null},n={isTouch:!1,isScrolling:!1,isSwiping:!1,direction:!1,inMotion:!1},o={_onDragStart:null,_onDragMove:null,_onDragEnd:null,_transitionEnd:null,_resizer:null,_responsiveCall:null,_goToLoop:null,_checkVisibile:null},e.Defaults={items:3,loop:!1,center:!1,mouseDrag:!0,touchDrag:!0,pullDrag:!0,freeDrag:!1,margin:0,stagePadding:0,merge:!1,mergeFit:!0,autoWidth:!1,startPosition:0,rtl:!1,smartSpeed:250,fluidSpeed:!1,dragEndSpeed:!1,responsive:{},responsiveRefreshRate:200,responsiveBaseElement:b,responsiveClass:!1,fallbackEasing:"swing",info:!1,nestedItemSelector:!1,itemElement:"div",stageElement:"div",themeClass:"owl-theme",baseClass:"owl-carousel",itemClass:"owl-item",centerClass:"center",activeClass:"active"},e.Width={Default:"default",Inner:"inner",Outer:"outer"},e.Plugins={},e.Pipe=[{filter:["width","items","settings"],run:function(a){a.current=this._items&&this._items[this.relative(this._current)]}},{filter:["items","settings"],run:function(){var a=this._clones,b=this.$stage.children(".cloned");(b.length!==a.length||!this.settings.loop&&a.length>0)&&(this.$stage.children(".cloned").remove(),this._clones=[])}},{filter:["items","settings"],run:function(){var a,b,c=this._clones,d=this._items,e=this.settings.loop?c.length-Math.max(2*this.settings.items,4):0;for(a=0,b=Math.abs(e/2);b>a;a++)e>0?(this.$stage.children().eq(d.length+c.length-1).remove(),c.pop(),this.$stage.children().eq(0).remove(),c.pop()):(c.push(c.length/2),this.$stage.append(d[c[c.length-1]].clone().addClass("cloned")),c.push(d.length-1-(c.length-1)/2),this.$stage.prepend(d[c[c.length-1]].clone().addClass("cloned")))}},{filter:["width","items","settings"],run:function(){var a,b,c,d=this.settings.rtl?1:-1,e=(this.width()/this.settings.items).toFixed(3),f=0;for(this._coordinates=[],b=0,c=this._clones.length+this._items.length;c>b;b++)a=this._mergers[this.relative(b)],a=this.settings.mergeFit&&Math.min(a,this.settings.items)||a,f+=(this.settings.autoWidth?this._items[this.relative(b)].width()+this.settings.margin:e*a)*d,this._coordinates.push(f)}},{filter:["width","items","settings"],run:function(){var b,c,d=(this.width()/this.settings.items).toFixed(3),e={width:Math.abs(this._coordinates[this._coordinates.length-1])+2*this.settings.stagePadding,"padding-left":this.settings.stagePadding||"","padding-right":this.settings.stagePadding||""};if(this.$stage.css(e),e={width:this.settings.autoWidth?"auto":d-this.settings.margin},e[this.settings.rtl?"margin-left":"margin-right"]=this.settings.margin,!this.settings.autoWidth&&a.grep(this._mergers,function(a){return a>1}).length>0)for(b=0,c=this._coordinates.length;c>b;b++)e.width=Math.abs(this._coordinates[b])-Math.abs(this._coordinates[b-1]||0)-this.settings.margin,this.$stage.children().eq(b).css(e);else this.$stage.children().css(e)}},{filter:["width","items","settings"],run:function(a){a.current&&this.reset(this.$stage.children().index(a.current))}},{filter:["position"],run:function(){this.animate(this.coordinates(this._current))}},{filter:["width","position","items","settings"],run:function(){var a,b,c,d,e=this.settings.rtl?1:-1,f=2*this.settings.stagePadding,g=this.coordinates(this.current())+f,h=g+this.width()*e,i=[];for(c=0,d=this._coordinates.length;d>c;c++)a=this._coordinates[c-1]||0,b=Math.abs(this._coordinates[c])+f*e,(this.op(a,"<=",g)&&this.op(a,">",h)||this.op(b,"<",g)&&this.op(b,">",h))&&i.push(c);this.$stage.children("."+this.settings.activeClass).removeClass(this.settings.activeClass),this.$stage.children(":eq("+i.join("), :eq(")+")").addClass(this.settings.activeClass),this.settings.center&&(this.$stage.children("."+this.settings.centerClass).removeClass(this.settings.centerClass),this.$stage.children().eq(this.current()).addClass(this.settings.centerClass))}}],e.prototype.initialize=function(){if(this.trigger("initialize"),this.$element.addClass(this.settings.baseClass).addClass(this.settings.themeClass).toggleClass("owl-rtl",this.settings.rtl),this.browserSupport(),this.settings.autoWidth&&this.state.imagesLoaded!==!0){var b,c,e;if(b=this.$element.find("img"),c=this.settings.nestedItemSelector?"."+this.settings.nestedItemSelector:d,e=this.$element.children(c).width(),b.length&&0>=e)return this.preloadAutoWidthImages(b),!1}this.$element.addClass("owl-loading"),this.$stage=a("<"+this.settings.stageElement+' class="owl-stage"/>').wrap('<div class="owl-stage-outer">'),this.$element.append(this.$stage.parent()),this.replace(this.$element.children().not(this.$stage.parent())),this._width=this.$element.width(),this.refresh(),this.$element.removeClass("owl-loading").addClass("owl-loaded"),this.eventsCall(),this.internalEvents(),this.addTriggerableEvents(),this.trigger("initialized")},e.prototype.setup=function(){var b=this.viewport(),c=this.options.responsive,d=-1,e=null;c?(a.each(c,function(a){b>=a&&a>d&&(d=Number(a))}),e=a.extend({},this.options,c[d]),delete e.responsive,e.responsiveClass&&this.$element.attr("class",function(a,b){return b.replace(/\b owl-responsive-\S+/g,"")}).addClass("owl-responsive-"+d)):e=a.extend({},this.options),(null===this.settings||this._breakpoint!==d)&&(this.trigger("change",{property:{name:"settings",value:e}}),this._breakpoint=d,this.settings=e,this.invalidate("settings"),this.trigger("changed",{property:{name:"settings",value:this.settings}}))},e.prototype.optionsLogic=function(){this.$element.toggleClass("owl-center",this.settings.center),this.settings.loop&&this._items.length<this.settings.items&&(this.settings.loop=!1),this.settings.autoWidth&&(this.settings.stagePadding=!1,this.settings.merge=!1)},e.prototype.prepare=function(b){var c=this.trigger("prepare",{content:b});return c.data||(c.data=a("<"+this.settings.itemElement+"/>").addClass(this.settings.itemClass).append(b)),this.trigger("prepared",{content:c.data}),c.data},e.prototype.update=function(){for(var b=0,c=this._pipe.length,d=a.proxy(function(a){return this[a]},this._invalidated),e={};c>b;)(this._invalidated.all||a.grep(this._pipe[b].filter,d).length>0)&&this._pipe[b].run(e),b++;this._invalidated={}},e.prototype.width=function(a){switch(a=a||e.Width.Default){case e.Width.Inner:case e.Width.Outer:return this._width;default:return this._width-2*this.settings.stagePadding+this.settings.margin}},e.prototype.refresh=function(){if(0===this._items.length)return!1;(new Date).getTime();this.trigger("refresh"),this.setup(),this.optionsLogic(),this.$stage.addClass("owl-refresh"),this.update(),this.$stage.removeClass("owl-refresh"),this.state.orientation=b.orientation,this.watchVisibility(),this.trigger("refreshed")},e.prototype.eventsCall=function(){this.e._onDragStart=a.proxy(function(a){this.onDragStart(a)},this),this.e._onDragMove=a.proxy(function(a){this.onDragMove(a)},this),this.e._onDragEnd=a.proxy(function(a){this.onDragEnd(a)},this),this.e._onResize=a.proxy(function(a){this.onResize(a)},this),this.e._transitionEnd=a.proxy(function(a){this.transitionEnd(a)},this),this.e._preventClick=a.proxy(function(a){this.preventClick(a)},this)},e.prototype.onThrottledResize=function(){b.clearTimeout(this.resizeTimer),this.resizeTimer=b.setTimeout(this.e._onResize,this.settings.responsiveRefreshRate)},e.prototype.onResize=function(){return this._items.length?this._width===this.$element.width()?!1:this.trigger("resize").isDefaultPrevented()?!1:(this._width=this.$element.width(),this.invalidate("width"),this.refresh(),void this.trigger("resized")):!1},e.prototype.eventsRouter=function(a){var b=a.type;"mousedown"===b||"touchstart"===b?this.onDragStart(a):"mousemove"===b||"touchmove"===b?this.onDragMove(a):"mouseup"===b||"touchend"===b?this.onDragEnd(a):"touchcancel"===b&&this.onDragEnd(a)},e.prototype.internalEvents=function(){var c=(k(),l());this.settings.mouseDrag?(this.$stage.on("mousedown",a.proxy(function(a){this.eventsRouter(a)},this)),this.$stage.on("dragstart",function(){return!1}),this.$stage.get(0).onselectstart=function(){return!1}):this.$element.addClass("owl-text-select-on"),this.settings.touchDrag&&!c&&this.$stage.on("touchstart touchcancel",a.proxy(function(a){this.eventsRouter(a)},this)),this.transitionEndVendor&&this.on(this.$stage.get(0),this.transitionEndVendor,this.e._transitionEnd,!1),this.settings.responsive!==!1&&this.on(b,"resize",a.proxy(this.onThrottledResize,this))},e.prototype.onDragStart=function(d){var e,g,h,i;if(e=d.originalEvent||d||b.event,3===e.which||this.state.isTouch)return!1;if("mousedown"===e.type&&this.$stage.addClass("owl-grab"),this.trigger("drag"),this.drag.startTime=(new Date).getTime(),this.speed(0),this.state.isTouch=!0,this.state.isScrolling=!1,this.state.isSwiping=!1,this.drag.distance=0,g=f(e).x,h=f(e).y,this.drag.offsetX=this.$stage.position().left,this.drag.offsetY=this.$stage.position().top,this.settings.rtl&&(this.drag.offsetX=this.$stage.position().left+this.$stage.width()-this.width()+this.settings.margin),this.state.inMotion&&this.support3d)i=this.getTransformProperty(),this.drag.offsetX=i,this.animate(i),this.state.inMotion=!0;else if(this.state.inMotion&&!this.support3d)return this.state.inMotion=!1,!1;this.drag.startX=g-this.drag.offsetX,this.drag.startY=h-this.drag.offsetY,this.drag.start=g-this.drag.startX,this.drag.targetEl=e.target||e.srcElement,this.drag.updatedX=this.drag.start,("IMG"===this.drag.targetEl.tagName||"A"===this.drag.targetEl.tagName)&&(this.drag.targetEl.draggable=!1),a(c).on("mousemove.owl.dragEvents mouseup.owl.dragEvents touchmove.owl.dragEvents touchend.owl.dragEvents",a.proxy(function(a){this.eventsRouter(a)},this))},e.prototype.onDragMove=function(a){var c,e,g,h,i,j;this.state.isTouch&&(this.state.isScrolling||(c=a.originalEvent||a||b.event,e=f(c).x,g=f(c).y,this.drag.currentX=e-this.drag.startX,this.drag.currentY=g-this.drag.startY,this.drag.distance=this.drag.currentX-this.drag.offsetX,this.drag.distance<0?this.state.direction=this.settings.rtl?"right":"left":this.drag.distance>0&&(this.state.direction=this.settings.rtl?"left":"right"),this.settings.loop?this.op(this.drag.currentX,">",this.coordinates(this.minimum()))&&"right"===this.state.direction?this.drag.currentX-=(this.settings.center&&this.coordinates(0))-this.coordinates(this._items.length):this.op(this.drag.currentX,"<",this.coordinates(this.maximum()))&&"left"===this.state.direction&&(this.drag.currentX+=(this.settings.center&&this.coordinates(0))-this.coordinates(this._items.length)):(h=this.coordinates(this.settings.rtl?this.maximum():this.minimum()),i=this.coordinates(this.settings.rtl?this.minimum():this.maximum()),j=this.settings.pullDrag?this.drag.distance/5:0,this.drag.currentX=Math.max(Math.min(this.drag.currentX,h+j),i+j)),(this.drag.distance>8||this.drag.distance<-8)&&(c.preventDefault!==d?c.preventDefault():c.returnValue=!1,this.state.isSwiping=!0),this.drag.updatedX=this.drag.currentX,(this.drag.currentY>16||this.drag.currentY<-16)&&this.state.isSwiping===!1&&(this.state.isScrolling=!0,this.drag.updatedX=this.drag.start),this.animate(this.drag.updatedX)))},e.prototype.onDragEnd=function(b){var d,e,f;if(this.state.isTouch){if("mouseup"===b.type&&this.$stage.removeClass("owl-grab"),this.trigger("dragged"),this.drag.targetEl.removeAttribute("draggable"),this.state.isTouch=!1,this.state.isScrolling=!1,this.state.isSwiping=!1,0===this.drag.distance&&this.state.inMotion!==!0)return this.state.inMotion=!1,!1;this.drag.endTime=(new Date).getTime(),d=this.drag.endTime-this.drag.startTime,e=Math.abs(this.drag.distance),(e>3||d>300)&&this.removeClick(this.drag.targetEl),f=this.closest(this.drag.updatedX),this.speed(this.settings.dragEndSpeed||this.settings.smartSpeed),this.current(f),this.invalidate("position"),this.update(),this.settings.pullDrag||this.drag.updatedX!==this.coordinates(f)||this.transitionEnd(),this.drag.distance=0,a(c).off(".owl.dragEvents")}},e.prototype.removeClick=function(c){this.drag.targetEl=c,a(c).on("click.preventClick",this.e._preventClick),b.setTimeout(function(){a(c).off("click.preventClick")},300)},e.prototype.preventClick=function(b){b.preventDefault?b.preventDefault():b.returnValue=!1,b.stopPropagation&&b.stopPropagation(),a(b.target).off("click.preventClick")},e.prototype.getTransformProperty=function(){var a,c;return a=b.getComputedStyle(this.$stage.get(0),null).getPropertyValue(this.vendorName+"transform"),a=a.replace(/matrix(3d)?\(|\)/g,"").split(","),c=16===a.length,c!==!0?a[4]:a[12]},e.prototype.closest=function(b){var c=-1,d=30,e=this.width(),f=this.coordinates();return this.settings.freeDrag||a.each(f,a.proxy(function(a,g){return b>g-d&&g+d>b?c=a:this.op(b,"<",g)&&this.op(b,">",f[a+1]||g-e)&&(c="left"===this.state.direction?a+1:a),-1===c},this)),this.settings.loop||(this.op(b,">",f[this.minimum()])?c=b=this.minimum():this.op(b,"<",f[this.maximum()])&&(c=b=this.maximum())),c},e.prototype.animate=function(b){this.trigger("translate"),this.state.inMotion=this.speed()>0,this.support3d?this.$stage.css({transform:"translate3d("+b+"px,0px, 0px)",transition:this.speed()/1e3+"s"}):this.state.isTouch?this.$stage.css({left:b+"px"}):this.$stage.animate({left:b},this.speed()/1e3,this.settings.fallbackEasing,a.proxy(function(){this.state.inMotion&&this.transitionEnd()},this))},e.prototype.current=function(a){if(a===d)return this._current;if(0===this._items.length)return d;if(a=this.normalize(a),this._current!==a){var b=this.trigger("change",{property:{name:"position",value:a}});b.data!==d&&(a=this.normalize(b.data)),this._current=a,this.invalidate("position"),this.trigger("changed",{property:{name:"position",value:this._current}})}return this._current},e.prototype.invalidate=function(a){this._invalidated[a]=!0},e.prototype.reset=function(a){a=this.normalize(a),a!==d&&(this._speed=0,this._current=a,this.suppress(["translate","translated"]),this.animate(this.coordinates(a)),this.release(["translate","translated"]))},e.prototype.normalize=function(b,c){var e=c?this._items.length:this._items.length+this._clones.length;return!a.isNumeric(b)||1>e?d:b=this._clones.length?(b%e+e)%e:Math.max(this.minimum(c),Math.min(this.maximum(c),b))},e.prototype.relative=function(a){return a=this.normalize(a),a-=this._clones.length/2,this.normalize(a,!0)},e.prototype.maximum=function(a){var b,c,d,e=0,f=this.settings;if(a)return this._items.length-1;if(!f.loop&&f.center)b=this._items.length-1;else if(f.loop||f.center)if(f.loop||f.center)b=this._items.length+f.items;else{if(!f.autoWidth&&!f.merge)throw"Can not detect maximum absolute position.";for(revert=f.rtl?1:-1,c=this.$stage.width()-this.$element.width();(d=this.coordinates(e))&&!(d*revert>=c);)b=++e}else b=this._items.length-f.items;return b},e.prototype.minimum=function(a){return a?0:this._clones.length/2},e.prototype.items=function(a){return a===d?this._items.slice():(a=this.normalize(a,!0),this._items[a])},e.prototype.mergers=function(a){return a===d?this._mergers.slice():(a=this.normalize(a,!0),this._mergers[a])},e.prototype.clones=function(b){var c=this._clones.length/2,e=c+this._items.length,f=function(a){return a%2===0?e+a/2:c-(a+1)/2};return b===d?a.map(this._clones,function(a,b){return f(b)}):a.map(this._clones,function(a,c){return a===b?f(c):null})},e.prototype.speed=function(a){return a!==d&&(this._speed=a),this._speed},e.prototype.coordinates=function(b){var c=null;return b===d?a.map(this._coordinates,a.proxy(function(a,b){return this.coordinates(b)},this)):(this.settings.center?(c=this._coordinates[b],c+=(this.width()-c+(this._coordinates[b-1]||0))/2*(this.settings.rtl?-1:1)):c=this._coordinates[b-1]||0,c)},e.prototype.duration=function(a,b,c){return Math.min(Math.max(Math.abs(b-a),1),6)*Math.abs(c||this.settings.smartSpeed)},e.prototype.to=function(c,d){if(this.settings.loop){var e=c-this.relative(this.current()),f=this.current(),g=this.current(),h=this.current()+e,i=0>g-h?!0:!1,j=this._clones.length+this._items.length;h<this.settings.items&&i===!1?(f=g+this._items.length,this.reset(f)):h>=j-this.settings.items&&i===!0&&(f=g-this._items.length,this.reset(f)),b.clearTimeout(this.e._goToLoop),this.e._goToLoop=b.setTimeout(a.proxy(function(){this.speed(this.duration(this.current(),f+e,d)),this.current(f+e),this.update()},this),30)}else this.speed(this.duration(this.current(),c,d)),this.current(c),this.update()},e.prototype.next=function(a){a=a||!1,this.to(this.relative(this.current())+1,a)},e.prototype.prev=function(a){a=a||!1,this.to(this.relative(this.current())-1,a)},e.prototype.transitionEnd=function(a){return a!==d&&(a.stopPropagation(),(a.target||a.srcElement||a.originalTarget)!==this.$stage.get(0))?!1:(this.state.inMotion=!1,void this.trigger("translated"))},e.prototype.viewport=function(){var d;if(this.options.responsiveBaseElement!==b)d=a(this.options.responsiveBaseElement).width();else if(b.innerWidth)d=b.innerWidth;else{if(!c.documentElement||!c.documentElement.clientWidth)throw"Can not detect viewport width.";d=c.documentElement.clientWidth}return d},e.prototype.replace=function(b){this.$stage.empty(),this._items=[],b&&(b=b instanceof jQuery?b:a(b)),this.settings.nestedItemSelector&&(b=b.find("."+this.settings.nestedItemSelector)),b.filter(function(){return 1===this.nodeType}).each(a.proxy(function(a,b){b=this.prepare(b),this.$stage.append(b),this._items.push(b),this._mergers.push(1*b.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)},this)),this.reset(a.isNumeric(this.settings.startPosition)?this.settings.startPosition:0),this.invalidate("items")},e.prototype.add=function(a,b){b=b===d?this._items.length:this.normalize(b,!0),this.trigger("add",{content:a,position:b}),0===this._items.length||b===this._items.length?(this.$stage.append(a),this._items.push(a),this._mergers.push(1*a.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)):(this._items[b].before(a),this._items.splice(b,0,a),this._mergers.splice(b,0,1*a.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)),this.invalidate("items"),this.trigger("added",{content:a,position:b})},e.prototype.remove=function(a){a=this.normalize(a,!0),a!==d&&(this.trigger("remove",{content:this._items[a],position:a}),this._items[a].remove(),this._items.splice(a,1),this._mergers.splice(a,1),this.invalidate("items"),this.trigger("removed",{content:null,position:a}))},e.prototype.addTriggerableEvents=function(){var b=a.proxy(function(b,c){return a.proxy(function(a){a.relatedTarget!==this&&(this.suppress([c]),b.apply(this,[].slice.call(arguments,1)),this.release([c]))},this)},this);a.each({next:this.next,prev:this.prev,to:this.to,destroy:this.destroy,refresh:this.refresh,replace:this.replace,add:this.add,remove:this.remove},a.proxy(function(a,c){this.$element.on(a+".owl.carousel",b(c,a+".owl.carousel"))},this))},e.prototype.watchVisibility=function(){function c(a){return a.offsetWidth>0&&a.offsetHeight>0}function d(){c(this.$element.get(0))&&(this.$element.removeClass("owl-hidden"),this.refresh(),b.clearInterval(this.e._checkVisibile))}c(this.$element.get(0))||(this.$element.addClass("owl-hidden"),b.clearInterval(this.e._checkVisibile),this.e._checkVisibile=b.setInterval(a.proxy(d,this),500))},e.prototype.preloadAutoWidthImages=function(b){var c,d,e,f;c=0,d=this,b.each(function(g,h){e=a(h),f=new Image,f.onload=function(){c++,e.attr("src",f.src),e.css("opacity",1),c>=b.length&&(d.state.imagesLoaded=!0,d.initialize())},f.src=e.attr("src")||e.attr("data-src")||e.attr("data-src-retina")})},e.prototype.destroy=function(){this.$element.hasClass(this.settings.themeClass)&&this.$element.removeClass(this.settings.themeClass),this.settings.responsive!==!1&&a(b).off("resize.owl.carousel"),this.transitionEndVendor&&this.off(this.$stage.get(0),this.transitionEndVendor,this.e._transitionEnd);for(var d in this._plugins)this._plugins[d].destroy();(this.settings.mouseDrag||this.settings.touchDrag)&&(this.$stage.off("mousedown touchstart touchcancel"),a(c).off(".owl.dragEvents"),this.$stage.get(0).onselectstart=function(){},this.$stage.off("dragstart",function(){return!1})),this.$element.off(".owl"),this.$stage.children(".cloned").remove(),this.e=null,this.$element.removeData("owlCarousel"),this.$stage.children().contents().unwrap(),this.$stage.children().unwrap(),this.$stage.unwrap()},e.prototype.op=function(a,b,c){var d=this.settings.rtl;switch(b){case"<":return d?a>c:c>a;case">":return d?c>a:a>c;case">=":return d?c>=a:a>=c;case"<=":return d?a>=c:c>=a}},e.prototype.on=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,d):a.attachEvent&&a.attachEvent("on"+b,c)},e.prototype.off=function(a,b,c,d){a.removeEventListener?a.removeEventListener(b,c,d):a.detachEvent&&a.detachEvent("on"+b,c)},e.prototype.trigger=function(b,c,d){var e={item:{count:this._items.length,index:this.current()}},f=a.camelCase(a.grep(["on",b,d],function(a){return a}).join("-").toLowerCase()),g=a.Event([b,"owl",d||"carousel"].join(".").toLowerCase(),a.extend({relatedTarget:this},e,c));return this._supress[b]||(a.each(this._plugins,function(a,b){b.onTrigger&&b.onTrigger(g)}),this.$element.trigger(g),this.settings&&"function"==typeof this.settings[f]&&this.settings[f].apply(this,g)),g},e.prototype.suppress=function(b){a.each(b,a.proxy(function(a,b){this._supress[b]=!0},this))},e.prototype.release=function(b){a.each(b,a.proxy(function(a,b){delete this._supress[b]},this))},e.prototype.browserSupport=function(){if(this.support3d=j(),this.support3d){this.transformVendor=i();var a=["transitionend","webkitTransitionEnd","transitionend","oTransitionEnd"];this.transitionEndVendor=a[h()],this.vendorName=this.transformVendor.replace(/Transform/i,""),this.vendorName=""!==this.vendorName?"-"+this.vendorName.toLowerCase()+"-":""}this.state.orientation=b.orientation},a.fn.owlCarousel=function(b){return this.each(function(){a(this).data("owlCarousel")||a(this).data("owlCarousel",new e(this,b))})},a.fn.owlCarousel.Constructor=e}(window.Zepto||window.jQuery,window,document),function(a,b){var c=function(b){this._core=b,this._loaded=[],this._handlers={"initialized.owl.carousel change.owl.carousel":a.proxy(function(b){if(b.namespace&&this._core.settings&&this._core.settings.lazyLoad&&(b.property&&"position"==b.property.name||"initialized"==b.type))for(var c=this._core.settings,d=c.center&&Math.ceil(c.items/2)||c.items,e=c.center&&-1*d||0,f=(b.property&&b.property.value||this._core.current())+e,g=this._core.clones().length,h=a.proxy(function(a,b){this.load(b)},this);e++<d;)this.load(g/2+this._core.relative(f)),g&&a.each(this._core.clones(this._core.relative(f++)),h)},this)},this._core.options=a.extend({},c.Defaults,this._core.options),this._core.$element.on(this._handlers)};c.Defaults={lazyLoad:!1},c.prototype.load=function(c){var d=this._core.$stage.children().eq(c),e=d&&d.find(".owl-lazy");!e||a.inArray(d.get(0),this._loaded)>-1||(e.each(a.proxy(function(c,d){var e,f=a(d),g=b.devicePixelRatio>1&&f.attr("data-src-retina")||f.attr("data-src");this._core.trigger("load",{element:f,url:g},"lazy"),f.is("img")?f.one("load.owl.lazy",a.proxy(function(){f.css("opacity",1),this._core.trigger("loaded",{element:f,url:g},"lazy")},this)).attr("src",g):(e=new Image,e.onload=a.proxy(function(){f.css({"background-image":"url("+g+")",opacity:"1"}),this._core.trigger("loaded",{element:f,url:g},"lazy")},this),e.src=g)},this)),this._loaded.push(d.get(0)))},c.prototype.destroy=function(){var a,b;for(a in this.handlers)this._core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Lazy=c}(window.Zepto||window.jQuery,window,document),function(a){var b=function(c){this._core=c,this._handlers={"initialized.owl.carousel":a.proxy(function(){this._core.settings.autoHeight&&this.update()},this),"changed.owl.carousel":a.proxy(function(a){this._core.settings.autoHeight&&"position"==a.property.name&&this.update()},this),"loaded.owl.lazy":a.proxy(function(a){this._core.settings.autoHeight&&a.element.closest("."+this._core.settings.itemClass)===this._core.$stage.children().eq(this._core.current())&&this.update()},this)},this._core.options=a.extend({},b.Defaults,this._core.options),this._core.$element.on(this._handlers)};b.Defaults={autoHeight:!1,autoHeightClass:"owl-height"},b.prototype.update=function(){this._core.$stage.parent().height(this._core.$stage.children().eq(this._core.current()).height()).addClass(this._core.settings.autoHeightClass)},b.prototype.destroy=function(){var a,b;for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.AutoHeight=b}(window.Zepto||window.jQuery,window,document),function(a,b,c){var d=function(b){this._core=b,this._videos={},this._playing=null,this._fullscreen=!1,this._handlers={"resize.owl.carousel":a.proxy(function(a){this._core.settings.video&&!this.isInFullScreen()&&a.preventDefault()},this),"refresh.owl.carousel changed.owl.carousel":a.proxy(function(){this._playing&&this.stop()},this),"prepared.owl.carousel":a.proxy(function(b){var c=a(b.content).find(".owl-video");c.length&&(c.css("display","none"),this.fetch(c,a(b.content)))},this)},this._core.options=a.extend({},d.Defaults,this._core.options),this._core.$element.on(this._handlers),this._core.$element.on("click.owl.video",".owl-video-play-icon",a.proxy(function(a){this.play(a)},this))};d.Defaults={video:!1,videoHeight:!1,videoWidth:!1},d.prototype.fetch=function(a,b){var c=a.attr("data-vimeo-id")?"vimeo":"youtube",d=a.attr("data-vimeo-id")||a.attr("data-youtube-id"),e=a.attr("data-width")||this._core.settings.videoWidth,f=a.attr("data-height")||this._core.settings.videoHeight,g=a.attr("href");if(!g)throw new Error("Missing video URL.");if(d=g.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),d[3].indexOf("youtu")>-1)c="youtube";else{if(!(d[3].indexOf("vimeo")>-1))throw new Error("Video URL not supported.");c="vimeo"}d=d[6],this._videos[g]={type:c,id:d,width:e,height:f},b.attr("data-video",g),this.thumbnail(a,this._videos[g])},d.prototype.thumbnail=function(b,c){var d,e,f,g=c.width&&c.height?'style="width:'+c.width+"px;height:"+c.height+'px;"':"",h=b.find("img"),i="src",j="",k=this._core.settings,l=function(a){e='<div class="owl-video-play-icon"></div>',d=k.lazyLoad?'<div class="owl-video-tn '+j+'" '+i+'="'+a+'"></div>':'<div class="owl-video-tn" style="opacity:1;background-image:url('+a+')"></div>',b.after(d),b.after(e)};return b.wrap('<div class="owl-video-wrapper"'+g+"></div>"),this._core.settings.lazyLoad&&(i="data-src",j="owl-lazy"),h.length?(l(h.attr(i)),h.remove(),!1):void("youtube"===c.type?(f="http://img.youtube.com/vi/"+c.id+"/hqdefault.jpg",l(f)):"vimeo"===c.type&&a.ajax({type:"GET",url:"http://vimeo.com/api/v2/video/"+c.id+".json",jsonp:"callback",dataType:"jsonp",success:function(a){f=a[0].thumbnail_large,l(f)}}))},d.prototype.stop=function(){this._core.trigger("stop",null,"video"),this._playing.find(".owl-video-frame").remove(),this._playing.removeClass("owl-video-playing"),this._playing=null},d.prototype.play=function(b){this._core.trigger("play",null,"video"),this._playing&&this.stop();var c,d,e=a(b.target||b.srcElement),f=e.closest("."+this._core.settings.itemClass),g=this._videos[f.attr("data-video")],h=g.width||"100%",i=g.height||this._core.$stage.height();"youtube"===g.type?c='<iframe width="'+h+'" height="'+i+'" src="http://www.youtube.com/embed/'+g.id+"?autoplay=1&v="+g.id+'" frameborder="0" allowfullscreen></iframe>':"vimeo"===g.type&&(c='<iframe src="http://player.vimeo.com/video/'+g.id+'?autoplay=1" width="'+h+'" height="'+i+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),f.addClass("owl-video-playing"),this._playing=f,d=a('<div style="height:'+i+"px; width:"+h+'px" class="owl-video-frame">'+c+"</div>"),e.after(d)},d.prototype.isInFullScreen=function(){var d=c.fullscreenElement||c.mozFullScreenElement||c.webkitFullscreenElement;return d&&a(d).parent().hasClass("owl-video-frame")&&(this._core.speed(0),this._fullscreen=!0),d&&this._fullscreen&&this._playing?!1:this._fullscreen?(this._fullscreen=!1,!1):this._playing&&this._core.state.orientation!==b.orientation?(this._core.state.orientation=b.orientation,!1):!0},d.prototype.destroy=function(){var a,b;this._core.$element.off("click.owl.video");for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Video=d}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this.core=b,this.core.options=a.extend({},e.Defaults,this.core.options),this.swapping=!0,this.previous=d,this.next=d,this.handlers={"change.owl.carousel":a.proxy(function(a){"position"==a.property.name&&(this.previous=this.core.current(),this.next=a.property.value)},this),"drag.owl.carousel dragged.owl.carousel translated.owl.carousel":a.proxy(function(a){this.swapping="translated"==a.type},this),"translate.owl.carousel":a.proxy(function(){this.swapping&&(this.core.options.animateOut||this.core.options.animateIn)&&this.swap()},this)},this.core.$element.on(this.handlers)};e.Defaults={animateOut:!1,animateIn:!1},e.prototype.swap=function(){if(1===this.core.settings.items&&this.core.support3d){this.core.speed(0);var b,c=a.proxy(this.clear,this),d=this.core.$stage.children().eq(this.previous),e=this.core.$stage.children().eq(this.next),f=this.core.settings.animateIn,g=this.core.settings.animateOut;this.core.current()!==this.previous&&(g&&(b=this.core.coordinates(this.previous)-this.core.coordinates(this.next),d.css({left:b+"px"}).addClass("animated owl-animated-out").addClass(g).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c)),f&&e.addClass("animated owl-animated-in").addClass(f).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c))}},e.prototype.clear=function(b){a(b.target).css({left:""}).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),this.core.transitionEnd()},e.prototype.destroy=function(){var a,b;for(a in this.handlers)this.core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Animate=e}(window.Zepto||window.jQuery,window,document),function(a,b,c){var d=function(b){this.core=b,this.core.options=a.extend({},d.Defaults,this.core.options),this.handlers={"translated.owl.carousel refreshed.owl.carousel":a.proxy(function(){this.autoplay()
},this),"play.owl.autoplay":a.proxy(function(a,b,c){this.play(b,c)},this),"stop.owl.autoplay":a.proxy(function(){this.stop()},this),"mouseover.owl.autoplay":a.proxy(function(){this.core.settings.autoplayHoverPause&&this.pause()},this),"mouseleave.owl.autoplay":a.proxy(function(){this.core.settings.autoplayHoverPause&&this.autoplay()},this)},this.core.$element.on(this.handlers)};d.Defaults={autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!1,autoplaySpeed:!1},d.prototype.autoplay=function(){this.core.settings.autoplay&&!this.core.state.videoPlay?(b.clearInterval(this.interval),this.interval=b.setInterval(a.proxy(function(){this.play()},this),this.core.settings.autoplayTimeout)):b.clearInterval(this.interval)},d.prototype.play=function(){return c.hidden===!0||this.core.state.isTouch||this.core.state.isScrolling||this.core.state.isSwiping||this.core.state.inMotion?void 0:this.core.settings.autoplay===!1?void b.clearInterval(this.interval):void this.core.next(this.core.settings.autoplaySpeed)},d.prototype.stop=function(){b.clearInterval(this.interval)},d.prototype.pause=function(){b.clearInterval(this.interval)},d.prototype.destroy=function(){var a,c;b.clearInterval(this.interval);for(a in this.handlers)this.core.$element.off(a,this.handlers[a]);for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},a.fn.owlCarousel.Constructor.Plugins.autoplay=d}(window.Zepto||window.jQuery,window,document),function(a){"use strict";var b=function(c){this._core=c,this._initialized=!1,this._pages=[],this._controls={},this._templates=[],this.$element=this._core.$element,this._overrides={next:this._core.next,prev:this._core.prev,to:this._core.to},this._handlers={"prepared.owl.carousel":a.proxy(function(b){this._core.settings.dotsData&&this._templates.push(a(b.content).find("[data-dot]").andSelf("[data-dot]").attr("data-dot"))},this),"add.owl.carousel":a.proxy(function(b){this._core.settings.dotsData&&this._templates.splice(b.position,0,a(b.content).find("[data-dot]").andSelf("[data-dot]").attr("data-dot"))},this),"remove.owl.carousel prepared.owl.carousel":a.proxy(function(a){this._core.settings.dotsData&&this._templates.splice(a.position,1)},this),"change.owl.carousel":a.proxy(function(a){if("position"==a.property.name&&!this._core.state.revert&&!this._core.settings.loop&&this._core.settings.navRewind){var b=this._core.current(),c=this._core.maximum(),d=this._core.minimum();a.data=a.property.value>c?b>=c?d:c:a.property.value<d?c:a.property.value}},this),"changed.owl.carousel":a.proxy(function(a){"position"==a.property.name&&this.draw()},this),"refreshed.owl.carousel":a.proxy(function(){this._initialized||(this.initialize(),this._initialized=!0),this._core.trigger("refresh",null,"navigation"),this.update(),this.draw(),this._core.trigger("refreshed",null,"navigation")},this)},this._core.options=a.extend({},b.Defaults,this._core.options),this.$element.on(this._handlers)};b.Defaults={nav:!1,navRewind:!0,navText:["prev","next"],navSpeed:!1,navElement:"div",navContainer:!1,navContainerClass:"owl-nav",navClass:["owl-prev","owl-next"],slideBy:1,dotClass:"owl-dot",dotsClass:"owl-dots",dots:!0,dotsEach:!1,dotData:!1,dotsSpeed:!1,dotsContainer:!1,controlsClass:"owl-controls"},b.prototype.initialize=function(){var b,c,d=this._core.settings;d.dotsData||(this._templates=[a("<div>").addClass(d.dotClass).append(a("<span>")).prop("outerHTML")]),d.navContainer&&d.dotsContainer||(this._controls.$container=a("<div>").addClass(d.controlsClass).appendTo(this.$element)),this._controls.$indicators=d.dotsContainer?a(d.dotsContainer):a("<div>").hide().addClass(d.dotsClass).appendTo(this._controls.$container),this._controls.$indicators.on("click","div",a.proxy(function(b){var c=a(b.target).parent().is(this._controls.$indicators)?a(b.target).index():a(b.target).parent().index();b.preventDefault(),this.to(c,d.dotsSpeed)},this)),b=d.navContainer?a(d.navContainer):a("<div>").addClass(d.navContainerClass).prependTo(this._controls.$container),this._controls.$next=a("<"+d.navElement+">"),this._controls.$previous=this._controls.$next.clone(),this._controls.$previous.addClass(d.navClass[0]).html(d.navText[0]).hide().prependTo(b).on("click",a.proxy(function(){this.prev(d.navSpeed)},this)),this._controls.$next.addClass(d.navClass[1]).html(d.navText[1]).hide().appendTo(b).on("click",a.proxy(function(){this.next(d.navSpeed)},this));for(c in this._overrides)this._core[c]=a.proxy(this[c],this)},b.prototype.destroy=function(){var a,b,c,d;for(a in this._handlers)this.$element.off(a,this._handlers[a]);for(b in this._controls)this._controls[b].remove();for(d in this.overides)this._core[d]=this._overrides[d];for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},b.prototype.update=function(){var a,b,c,d=this._core.settings,e=this._core.clones().length/2,f=e+this._core.items().length,g=d.center||d.autoWidth||d.dotData?1:d.dotsEach||d.items;if("page"!==d.slideBy&&(d.slideBy=Math.min(d.slideBy,d.items)),d.dots||"page"==d.slideBy)for(this._pages=[],a=e,b=0,c=0;f>a;a++)(b>=g||0===b)&&(this._pages.push({start:a-e,end:a-e+g-1}),b=0,++c),b+=this._core.mergers(this._core.relative(a))},b.prototype.draw=function(){var b,c,d="",e=this._core.settings,f=(this._core.$stage.children(),this._core.relative(this._core.current()));if(!e.nav||e.loop||e.navRewind||(this._controls.$previous.toggleClass("disabled",0>=f),this._controls.$next.toggleClass("disabled",f>=this._core.maximum())),this._controls.$previous.toggle(e.nav),this._controls.$next.toggle(e.nav),e.dots){if(b=this._pages.length-this._controls.$indicators.children().length,e.dotData&&0!==b){for(c=0;c<this._controls.$indicators.children().length;c++)d+=this._templates[this._core.relative(c)];this._controls.$indicators.html(d)}else b>0?(d=new Array(b+1).join(this._templates[0]),this._controls.$indicators.append(d)):0>b&&this._controls.$indicators.children().slice(b).remove();this._controls.$indicators.find(".active").removeClass("active"),this._controls.$indicators.children().eq(a.inArray(this.current(),this._pages)).addClass("active")}this._controls.$indicators.toggle(e.dots)},b.prototype.onTrigger=function(b){var c=this._core.settings;b.page={index:a.inArray(this.current(),this._pages),count:this._pages.length,size:c&&(c.center||c.autoWidth||c.dotData?1:c.dotsEach||c.items)}},b.prototype.current=function(){var b=this._core.relative(this._core.current());return a.grep(this._pages,function(a){return a.start<=b&&a.end>=b}).pop()},b.prototype.getPosition=function(b){var c,d,e=this._core.settings;return"page"==e.slideBy?(c=a.inArray(this.current(),this._pages),d=this._pages.length,b?++c:--c,c=this._pages[(c%d+d)%d].start):(c=this._core.relative(this._core.current()),d=this._core.items().length,b?c+=e.slideBy:c-=e.slideBy),c},b.prototype.next=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!0),b)},b.prototype.prev=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!1),b)},b.prototype.to=function(b,c,d){var e;d?a.proxy(this._overrides.to,this._core)(b,c):(e=this._pages.length,a.proxy(this._overrides.to,this._core)(this._pages[(b%e+e)%e].start,c))},a.fn.owlCarousel.Constructor.Plugins.Navigation=b}(window.Zepto||window.jQuery,window,document),function(a,b){"use strict";var c=function(d){this._core=d,this._hashes={},this.$element=this._core.$element,this._handlers={"initialized.owl.carousel":a.proxy(function(){"URLHash"==this._core.settings.startPosition&&a(b).trigger("hashchange.owl.navigation")},this),"prepared.owl.carousel":a.proxy(function(b){var c=a(b.content).find("[data-hash]").andSelf("[data-hash]").attr("data-hash");this._hashes[c]=b.content},this)},this._core.options=a.extend({},c.Defaults,this._core.options),this.$element.on(this._handlers),a(b).on("hashchange.owl.navigation",a.proxy(function(){var a=b.location.hash.substring(1),c=this._core.$stage.children(),d=this._hashes[a]&&c.index(this._hashes[a])||0;return a?void this._core.to(d,!1,!0):!1},this))};c.Defaults={URLhashListener:!1},c.prototype.destroy=function(){var c,d;a(b).off("hashchange.owl.navigation");for(c in this._handlers)this._core.$element.off(c,this._handlers[c]);for(d in Object.getOwnPropertyNames(this))"function"!=typeof this[d]&&(this[d]=null)},a.fn.owlCarousel.Constructor.Plugins.Hash=c}(window.Zepto||window.jQuery,window,document);/**
 * BxSlider v4.1.2 - Fully loaded, responsive content slider
 * http://bxslider.com
 *
 * Copyright 2014, Steven Wanderski - http://stevenwanderski.com - http://bxcreative.com
 * Written while drinking Belgian ales and listening to jazz
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 */
!function(t){var e={},s={mode:"horizontal",slideSelector:"",infiniteLoop:!0,hideControlOnEnd:!1,speed:500,easing:null,slideMargin:0,startSlide:0,randomStart:!1,captions:!1,ticker:!1,tickerHover:!1,adaptiveHeight:!1,adaptiveHeightSpeed:500,video:!1,useCSS:!0,preloadImages:"visible",responsive:!0,slideZIndex:50,touchEnabled:!0,swipeThreshold:50,oneToOneTouch:!0,preventDefaultSwipeX:!0,preventDefaultSwipeY:!1,pager:!0,pagerType:"full",pagerShortSeparator:" / ",pagerSelector:null,buildPager:null,pagerCustom:null,controls:!0,nextText:"Next",prevText:"Prev",nextSelector:null,prevSelector:null,autoControls:!1,startText:"Start",stopText:"Stop",autoControlsCombine:!1,autoControlsSelector:null,auto:!1,pause:4e3,autoStart:!0,autoDirection:"next",autoHover:!1,autoDelay:0,minSlides:1,maxSlides:1,moveSlides:0,slideWidth:0,onSliderLoad:function(){},onSlideBefore:function(){},onSlideAfter:function(){},onSlideNext:function(){},onSlidePrev:function(){},onSliderResize:function(){}};t.fn.bxSlider=function(n){if(0==this.length)return this;if(this.length>1)return this.each(function(){t(this).bxSlider(n)}),this;var o={},r=this;e.el=this;var a=t(window).width(),l=t(window).height(),d=function(){o.settings=t.extend({},s,n),o.settings.slideWidth=parseInt(o.settings.slideWidth),o.children=r.children(o.settings.slideSelector),o.children.length<o.settings.minSlides&&(o.settings.minSlides=o.children.length),o.children.length<o.settings.maxSlides&&(o.settings.maxSlides=o.children.length),o.settings.randomStart&&(o.settings.startSlide=Math.floor(Math.random()*o.children.length)),o.active={index:o.settings.startSlide},o.carousel=o.settings.minSlides>1||o.settings.maxSlides>1,o.carousel&&(o.settings.preloadImages="all"),o.minThreshold=o.settings.minSlides*o.settings.slideWidth+(o.settings.minSlides-1)*o.settings.slideMargin,o.maxThreshold=o.settings.maxSlides*o.settings.slideWidth+(o.settings.maxSlides-1)*o.settings.slideMargin,o.working=!1,o.controls={},o.interval=null,o.animProp="vertical"==o.settings.mode?"top":"left",o.usingCSS=o.settings.useCSS&&"fade"!=o.settings.mode&&function(){var t=document.createElement("div"),e=["WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var i in e)if(void 0!==t.style[e[i]])return o.cssPrefix=e[i].replace("Perspective","").toLowerCase(),o.animProp="-"+o.cssPrefix+"-transform",!0;return!1}(),"vertical"==o.settings.mode&&(o.settings.maxSlides=o.settings.minSlides),r.data("origStyle",r.attr("style")),r.children(o.settings.slideSelector).each(function(){t(this).data("origStyle",t(this).attr("style"))}),c()},c=function(){r.wrap('<div class="bx-wrapper"><div class="bx-viewport"></div></div>'),o.viewport=r.parent(),o.loader=t('<div class="bx-loading" />'),o.viewport.prepend(o.loader),r.css({width:"horizontal"==o.settings.mode?100*o.children.length+215+"%":"auto",position:"relative"}),o.usingCSS&&o.settings.easing?r.css("-"+o.cssPrefix+"-transition-timing-function",o.settings.easing):o.settings.easing||(o.settings.easing="swing"),f(),o.viewport.css({width:"100%",overflow:"hidden",position:"relative"}),o.viewport.parent().css({maxWidth:p()}),o.settings.pager||o.viewport.parent().css({margin:"0 auto 0px"}),o.children.css({"float":"horizontal"==o.settings.mode?"left":"none",listStyle:"none",position:"relative"}),o.children.css("width",u()),"horizontal"==o.settings.mode&&o.settings.slideMargin>0&&o.children.css("marginRight",o.settings.slideMargin),"vertical"==o.settings.mode&&o.settings.slideMargin>0&&o.children.css("marginBottom",o.settings.slideMargin),"fade"==o.settings.mode&&(o.children.css({position:"absolute",zIndex:0,display:"none"}),o.children.eq(o.settings.startSlide).css({zIndex:o.settings.slideZIndex,display:"block"})),o.controls.el=t('<div class="bx-controls" />'),o.settings.captions&&P(),o.active.last=o.settings.startSlide==x()-1,o.settings.video&&r.fitVids();var e=o.children.eq(o.settings.startSlide);"all"==o.settings.preloadImages&&(e=o.children),o.settings.ticker?o.settings.pager=!1:(o.settings.pager&&T(),o.settings.controls&&C(),o.settings.auto&&o.settings.autoControls&&E(),(o.settings.controls||o.settings.autoControls||o.settings.pager)&&o.viewport.after(o.controls.el)),g(e,h)},g=function(e,i){var s=e.find("img, iframe").length;if(0==s)return i(),void 0;var n=0;e.find("img, iframe").each(function(){t(this).one("load",function(){++n==s&&i()}).each(function(){this.complete&&t(this).load()})})},h=function(){if(o.settings.infiniteLoop&&"fade"!=o.settings.mode&&!o.settings.ticker){var e="vertical"==o.settings.mode?o.settings.minSlides:o.settings.maxSlides,i=o.children.slice(0,e).clone().addClass("bx-clone"),s=o.children.slice(-e).clone().addClass("bx-clone");r.append(i).prepend(s)}o.loader.remove(),S(),"vertical"==o.settings.mode&&(o.settings.adaptiveHeight=!0),o.viewport.height(v()),r.redrawSlider(),o.settings.onSliderLoad(o.active.index),o.initialized=!0,o.settings.responsive&&t(window).bind("resize",Z),o.settings.auto&&o.settings.autoStart&&H(),o.settings.ticker&&L(),o.settings.pager&&q(o.settings.startSlide),o.settings.controls&&W(),o.settings.touchEnabled&&!o.settings.ticker&&O()},v=function(){var e=0,s=t();if("vertical"==o.settings.mode||o.settings.adaptiveHeight)if(o.carousel){var n=1==o.settings.moveSlides?o.active.index:o.active.index*m();for(s=o.children.eq(n),i=1;i<=o.settings.maxSlides-1;i++)s=n+i>=o.children.length?s.add(o.children.eq(i-1)):s.add(o.children.eq(n+i))}else s=o.children.eq(o.active.index);else s=o.children;return"vertical"==o.settings.mode?(s.each(function(){e+=t(this).outerHeight()}),o.settings.slideMargin>0&&(e+=o.settings.slideMargin*(o.settings.minSlides-1))):e=Math.max.apply(Math,s.map(function(){return t(this).outerHeight(!1)}).get()),e},p=function(){var t="100%";return o.settings.slideWidth>0&&(t="horizontal"==o.settings.mode?o.settings.maxSlides*o.settings.slideWidth+(o.settings.maxSlides-1)*o.settings.slideMargin:o.settings.slideWidth),t},u=function(){var t=o.settings.slideWidth,e=o.viewport.width();return 0==o.settings.slideWidth||o.settings.slideWidth>e&&!o.carousel||"vertical"==o.settings.mode?t=e:o.settings.maxSlides>1&&"horizontal"==o.settings.mode&&(e>o.maxThreshold||e<o.minThreshold&&(t=(e-o.settings.slideMargin*(o.settings.minSlides-1))/o.settings.minSlides)),t},f=function(){var t=1;if("horizontal"==o.settings.mode&&o.settings.slideWidth>0)if(o.viewport.width()<o.minThreshold)t=o.settings.minSlides;else if(o.viewport.width()>o.maxThreshold)t=o.settings.maxSlides;else{var e=o.children.first().width();t=Math.floor(o.viewport.width()/e)}else"vertical"==o.settings.mode&&(t=o.settings.minSlides);return t},x=function(){var t=0;if(o.settings.moveSlides>0)if(o.settings.infiniteLoop)t=o.children.length/m();else for(var e=0,i=0;e<o.children.length;)++t,e=i+f(),i+=o.settings.moveSlides<=f()?o.settings.moveSlides:f();else t=Math.ceil(o.children.length/f());return t},m=function(){return o.settings.moveSlides>0&&o.settings.moveSlides<=f()?o.settings.moveSlides:f()},S=function(){if(o.children.length>o.settings.maxSlides&&o.active.last&&!o.settings.infiniteLoop){if("horizontal"==o.settings.mode){var t=o.children.last(),e=t.position();b(-(e.left-(o.viewport.width()-t.width())),"reset",0)}else if("vertical"==o.settings.mode){var i=o.children.length-o.settings.minSlides,e=o.children.eq(i).position();b(-e.top,"reset",0)}}else{var e=o.children.eq(o.active.index*m()).position();o.active.index==x()-1&&(o.active.last=!0),void 0!=e&&("horizontal"==o.settings.mode?b(-e.left,"reset",0):"vertical"==o.settings.mode&&b(-e.top,"reset",0))}},b=function(t,e,i,s){if(o.usingCSS){var n="vertical"==o.settings.mode?"translate3d(0, "+t+"px, 0)":"translate3d("+t+"px, 0, 0)";r.css("-"+o.cssPrefix+"-transition-duration",i/1e3+"s"),"slide"==e?(r.css(o.animProp,n),r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),D()})):"reset"==e?r.css(o.animProp,n):"ticker"==e&&(r.css("-"+o.cssPrefix+"-transition-timing-function","linear"),r.css(o.animProp,n),r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),b(s.resetValue,"reset",0),N()}))}else{var a={};a[o.animProp]=t,"slide"==e?r.animate(a,i,o.settings.easing,function(){D()}):"reset"==e?r.css(o.animProp,t):"ticker"==e&&r.animate(a,speed,"linear",function(){b(s.resetValue,"reset",0),N()})}},w=function(){for(var e="",i=x(),s=0;i>s;s++){var n="";o.settings.buildPager&&t.isFunction(o.settings.buildPager)?(n=o.settings.buildPager(s),o.pagerEl.addClass("bx-custom-pager")):(n=s+1,o.pagerEl.addClass("bx-default-pager")),e+='<div class="bx-pager-item"><a href="" data-slide-index="'+s+'" class="bx-pager-link">'+n+"</a></div>"}o.pagerEl.html(e)},T=function(){o.settings.pagerCustom?o.pagerEl=t(o.settings.pagerCustom):(o.pagerEl=t('<div class="bx-pager" />'),o.settings.pagerSelector?t(o.settings.pagerSelector).html(o.pagerEl):o.controls.el.addClass("bx-has-pager").append(o.pagerEl),w()),o.pagerEl.on("click","a",I)},C=function(){o.controls.next=t('<a class="bx-next" href="">'+o.settings.nextText+"</a>"),o.controls.prev=t('<a class="bx-prev" href="">'+o.settings.prevText+"</a>"),o.controls.next.bind("click",y),o.controls.prev.bind("click",z),o.settings.nextSelector&&t(o.settings.nextSelector).append(o.controls.next),o.settings.prevSelector&&t(o.settings.prevSelector).append(o.controls.prev),o.settings.nextSelector||o.settings.prevSelector||(o.controls.directionEl=t('<div class="bx-controls-direction" />'),o.controls.directionEl.append(o.controls.prev).append(o.controls.next),o.controls.el.addClass("bx-has-controls-direction").append(o.controls.directionEl))},E=function(){o.controls.start=t('<div class="bx-controls-auto-item"><a class="bx-start" href="">'+o.settings.startText+"</a></div>"),o.controls.stop=t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">'+o.settings.stopText+"</a></div>"),o.controls.autoEl=t('<div class="bx-controls-auto" />'),o.controls.autoEl.on("click",".bx-start",k),o.controls.autoEl.on("click",".bx-stop",M),o.settings.autoControlsCombine?o.controls.autoEl.append(o.controls.start):o.controls.autoEl.append(o.controls.start).append(o.controls.stop),o.settings.autoControlsSelector?t(o.settings.autoControlsSelector).html(o.controls.autoEl):o.controls.el.addClass("bx-has-controls-auto").append(o.controls.autoEl),A(o.settings.autoStart?"stop":"start")},P=function(){o.children.each(function(){var e=t(this).find("img:first").attr("title");void 0!=e&&(""+e).length&&t(this).append('<div class="bx-caption"><span>'+e+"</span></div>")})},y=function(t){o.settings.auto&&r.stopAuto(),r.goToNextSlide(),t.preventDefault()},z=function(t){o.settings.auto&&r.stopAuto(),r.goToPrevSlide(),t.preventDefault()},k=function(t){r.startAuto(),t.preventDefault()},M=function(t){r.stopAuto(),t.preventDefault()},I=function(e){o.settings.auto&&r.stopAuto();var i=t(e.currentTarget),s=parseInt(i.attr("data-slide-index"));s!=o.active.index&&r.goToSlide(s),e.preventDefault()},q=function(e){var i=o.children.length;return"short"==o.settings.pagerType?(o.settings.maxSlides>1&&(i=Math.ceil(o.children.length/o.settings.maxSlides)),o.pagerEl.html(e+1+o.settings.pagerShortSeparator+i),void 0):(o.pagerEl.find("a").removeClass("active"),o.pagerEl.each(function(i,s){t(s).find("a").eq(e).addClass("active")}),void 0)},D=function(){if(o.settings.infiniteLoop){var t="";0==o.active.index?t=o.children.eq(0).position():o.active.index==x()-1&&o.carousel?t=o.children.eq((x()-1)*m()).position():o.active.index==o.children.length-1&&(t=o.children.eq(o.children.length-1).position()),t&&("horizontal"==o.settings.mode?b(-t.left,"reset",0):"vertical"==o.settings.mode&&b(-t.top,"reset",0))}o.working=!1,o.settings.onSlideAfter(o.children.eq(o.active.index),o.oldIndex,o.active.index)},A=function(t){o.settings.autoControlsCombine?o.controls.autoEl.html(o.controls[t]):(o.controls.autoEl.find("a").removeClass("active"),o.controls.autoEl.find("a:not(.bx-"+t+")").addClass("active"))},W=function(){1==x()?(o.controls.prev.addClass("disabled"),o.controls.next.addClass("disabled")):!o.settings.infiniteLoop&&o.settings.hideControlOnEnd&&(0==o.active.index?(o.controls.prev.addClass("disabled"),o.controls.next.removeClass("disabled")):o.active.index==x()-1?(o.controls.next.addClass("disabled"),o.controls.prev.removeClass("disabled")):(o.controls.prev.removeClass("disabled"),o.controls.next.removeClass("disabled")))},H=function(){o.settings.autoDelay>0?setTimeout(r.startAuto,o.settings.autoDelay):r.startAuto(),o.settings.autoHover&&r.hover(function(){o.interval&&(r.stopAuto(!0),o.autoPaused=!0)},function(){o.autoPaused&&(r.startAuto(!0),o.autoPaused=null)})},L=function(){var e=0;if("next"==o.settings.autoDirection)r.append(o.children.clone().addClass("bx-clone"));else{r.prepend(o.children.clone().addClass("bx-clone"));var i=o.children.first().position();e="horizontal"==o.settings.mode?-i.left:-i.top}b(e,"reset",0),o.settings.pager=!1,o.settings.controls=!1,o.settings.autoControls=!1,o.settings.tickerHover&&!o.usingCSS&&o.viewport.hover(function(){r.stop()},function(){var e=0;o.children.each(function(){e+="horizontal"==o.settings.mode?t(this).outerWidth(!0):t(this).outerHeight(!0)});var i=o.settings.speed/e,s="horizontal"==o.settings.mode?"left":"top",n=i*(e-Math.abs(parseInt(r.css(s))));N(n)}),N()},N=function(t){speed=t?t:o.settings.speed;var e={left:0,top:0},i={left:0,top:0};"next"==o.settings.autoDirection?e=r.find(".bx-clone").first().position():i=o.children.first().position();var s="horizontal"==o.settings.mode?-e.left:-e.top,n="horizontal"==o.settings.mode?-i.left:-i.top,a={resetValue:n};b(s,"ticker",speed,a)},O=function(){o.touch={start:{x:0,y:0},end:{x:0,y:0}},o.viewport.bind("touchstart",X)},X=function(t){if(o.working)t.preventDefault();else{o.touch.originalPos=r.position();var e=t.originalEvent;o.touch.start.x=e.changedTouches[0].pageX,o.touch.start.y=e.changedTouches[0].pageY,o.viewport.bind("touchmove",Y),o.viewport.bind("touchend",V)}},Y=function(t){var e=t.originalEvent,i=Math.abs(e.changedTouches[0].pageX-o.touch.start.x),s=Math.abs(e.changedTouches[0].pageY-o.touch.start.y);if(3*i>s&&o.settings.preventDefaultSwipeX?t.preventDefault():3*s>i&&o.settings.preventDefaultSwipeY&&t.preventDefault(),"fade"!=o.settings.mode&&o.settings.oneToOneTouch){var n=0;if("horizontal"==o.settings.mode){var r=e.changedTouches[0].pageX-o.touch.start.x;n=o.touch.originalPos.left+r}else{var r=e.changedTouches[0].pageY-o.touch.start.y;n=o.touch.originalPos.top+r}b(n,"reset",0)}},V=function(t){o.viewport.unbind("touchmove",Y);var e=t.originalEvent,i=0;if(o.touch.end.x=e.changedTouches[0].pageX,o.touch.end.y=e.changedTouches[0].pageY,"fade"==o.settings.mode){var s=Math.abs(o.touch.start.x-o.touch.end.x);s>=o.settings.swipeThreshold&&(o.touch.start.x>o.touch.end.x?r.goToNextSlide():r.goToPrevSlide(),r.stopAuto())}else{var s=0;"horizontal"==o.settings.mode?(s=o.touch.end.x-o.touch.start.x,i=o.touch.originalPos.left):(s=o.touch.end.y-o.touch.start.y,i=o.touch.originalPos.top),!o.settings.infiniteLoop&&(0==o.active.index&&s>0||o.active.last&&0>s)?b(i,"reset",200):Math.abs(s)>=o.settings.swipeThreshold?(0>s?r.goToNextSlide():r.goToPrevSlide(),r.stopAuto()):b(i,"reset",200)}o.viewport.unbind("touchend",V)},Z=function(){var e=t(window).width(),i=t(window).height();(a!=e||l!=i)&&(a=e,l=i,r.redrawSlider(),o.settings.onSliderResize.call(r,o.active.index))};return r.goToSlide=function(e,i){if(!o.working&&o.active.index!=e)if(o.working=!0,o.oldIndex=o.active.index,o.active.index=0>e?x()-1:e>=x()?0:e,o.settings.onSlideBefore(o.children.eq(o.active.index),o.oldIndex,o.active.index),"next"==i?o.settings.onSlideNext(o.children.eq(o.active.index),o.oldIndex,o.active.index):"prev"==i&&o.settings.onSlidePrev(o.children.eq(o.active.index),o.oldIndex,o.active.index),o.active.last=o.active.index>=x()-1,o.settings.pager&&q(o.active.index),o.settings.controls&&W(),"fade"==o.settings.mode)o.settings.adaptiveHeight&&o.viewport.height()!=v()&&o.viewport.animate({height:v()},o.settings.adaptiveHeightSpeed),o.children.filter(":visible").fadeOut(o.settings.speed).css({zIndex:0}),o.children.eq(o.active.index).css("zIndex",o.settings.slideZIndex+1).fadeIn(o.settings.speed,function(){t(this).css("zIndex",o.settings.slideZIndex),D()});else{o.settings.adaptiveHeight&&o.viewport.height()!=v()&&o.viewport.animate({height:v()},o.settings.adaptiveHeightSpeed);var s=0,n={left:0,top:0};if(!o.settings.infiniteLoop&&o.carousel&&o.active.last)if("horizontal"==o.settings.mode){var a=o.children.eq(o.children.length-1);n=a.position(),s=o.viewport.width()-a.outerWidth()}else{var l=o.children.length-o.settings.minSlides;n=o.children.eq(l).position()}else if(o.carousel&&o.active.last&&"prev"==i){var d=1==o.settings.moveSlides?o.settings.maxSlides-m():(x()-1)*m()-(o.children.length-o.settings.maxSlides),a=r.children(".bx-clone").eq(d);n=a.position()}else if("next"==i&&0==o.active.index)n=r.find("> .bx-clone").eq(o.settings.maxSlides).position(),o.active.last=!1;else if(e>=0){var c=e*m();n=o.children.eq(c).position()}if("undefined"!=typeof n){var g="horizontal"==o.settings.mode?-(n.left-s):-n.top;b(g,"slide",o.settings.speed)}}},r.goToNextSlide=function(){if(o.settings.infiniteLoop||!o.active.last){var t=parseInt(o.active.index)+1;r.goToSlide(t,"next")}},r.goToPrevSlide=function(){if(o.settings.infiniteLoop||0!=o.active.index){var t=parseInt(o.active.index)-1;r.goToSlide(t,"prev")}},r.startAuto=function(t){o.interval||(o.interval=setInterval(function(){"next"==o.settings.autoDirection?r.goToNextSlide():r.goToPrevSlide()},o.settings.pause),o.settings.autoControls&&1!=t&&A("stop"))},r.stopAuto=function(t){o.interval&&(clearInterval(o.interval),o.interval=null,o.settings.autoControls&&1!=t&&A("start"))},r.getCurrentSlide=function(){return o.active.index},r.getCurrentSlideElement=function(){return o.children.eq(o.active.index)},r.getSlideCount=function(){return o.children.length},r.redrawSlider=function(){o.children.add(r.find(".bx-clone")).outerWidth(u()),o.viewport.css("height",v()),o.settings.ticker||S(),o.active.last&&(o.active.index=x()-1),o.active.index>=x()&&(o.active.last=!0),o.settings.pager&&!o.settings.pagerCustom&&(w(),q(o.active.index))},r.destroySlider=function(){o.initialized&&(o.initialized=!1,t(".bx-clone",this).remove(),o.children.each(function(){void 0!=t(this).data("origStyle")?t(this).attr("style",t(this).data("origStyle")):t(this).removeAttr("style")}),void 0!=t(this).data("origStyle")?this.attr("style",t(this).data("origStyle")):t(this).removeAttr("style"),t(this).unwrap().unwrap(),o.controls.el&&o.controls.el.remove(),o.controls.next&&o.controls.next.remove(),o.controls.prev&&o.controls.prev.remove(),o.pagerEl&&o.settings.controls&&o.pagerEl.remove(),t(".bx-caption",this).remove(),o.controls.autoEl&&o.controls.autoEl.remove(),clearInterval(o.interval),o.settings.responsive&&t(window).unbind("resize",Z))},r.reloadSlider=function(t){void 0!=t&&(n=t),r.destroySlider(),d()},d(),this}}(jQuery);/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function(){function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype,r=this,o=r.EventEmitter;i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;e.length>t;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),o="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(o?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,o=this.getListenersAsObject(e);for(r in o)o.hasOwnProperty(r)&&(i=t(o[r],n),-1!==i&&o[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,o=e?this.removeListener:this.addListener,s=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)o.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?o.call(this,i,r):s.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,o,s=this.getListenersAsObject(e);for(r in s)if(s.hasOwnProperty(r))for(i=s[r].length;i--;)n=s[r][i],n.once===!0&&this.removeListener(e,n.listener),o=n.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,n.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},e.noConflict=function(){return r.EventEmitter=o,e},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return e}):"object"==typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){function t(t){var n=e.event;return n.target=n.target||n.srcElement||t,n}var n=document.documentElement,i=function(){};n.addEventListener?i=function(e,t,n){e.addEventListener(t,n,!1)}:n.attachEvent&&(i=function(e,n,i){e[n+i]=i.handleEvent?function(){var n=t(e);i.handleEvent.call(i,n)}:function(){var n=t(e);i.call(e,n)},e.attachEvent("on"+n,e[n+i])});var r=function(){};n.removeEventListener?r=function(e,t,n){e.removeEventListener(t,n,!1)}:n.detachEvent&&(r=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var o={bind:i,unbind:r};"function"==typeof define&&define.amd?define("eventie/eventie",o):e.eventie=o}(this),function(e,t){"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],function(n,i){return t(e,n,i)}):"object"==typeof exports?module.exports=t(e,require("wolfy87-eventemitter"),require("eventie")):e.imagesLoaded=t(e,e.EventEmitter,e.eventie)}(window,function(e,t,n){function i(e,t){for(var n in t)e[n]=t[n];return e}function r(e){return"[object Array]"===d.call(e)}function o(e){var t=[];if(r(e))t=e;else if("number"==typeof e.length)for(var n=0,i=e.length;i>n;n++)t.push(e[n]);else t.push(e);return t}function s(e,t,n){if(!(this instanceof s))return new s(e,t);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=o(e),this.options=i({},this.options),"function"==typeof t?n=t:i(this.options,t),n&&this.on("always",n),this.getImages(),a&&(this.jqDeferred=new a.Deferred);var r=this;setTimeout(function(){r.check()})}function f(e){this.img=e}function c(e){this.src=e,v[e]=this}var a=e.jQuery,u=e.console,h=u!==void 0,d=Object.prototype.toString;s.prototype=new t,s.prototype.options={},s.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);var i=n.nodeType;if(i&&(1===i||9===i||11===i))for(var r=n.querySelectorAll("img"),o=0,s=r.length;s>o;o++){var f=r[o];this.addImage(f)}}},s.prototype.addImage=function(e){var t=new f(e);this.images.push(t)},s.prototype.check=function(){function e(e,r){return t.options.debug&&h&&u.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var o=this.images[r];o.on("confirm",e),o.check()}},s.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;var t=this;setTimeout(function(){t.emit("progress",t,e),t.jqDeferred&&t.jqDeferred.notify&&t.jqDeferred.notify(t,e)})},s.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var t=this;setTimeout(function(){if(t.emit(e,t),t.emit("always",t),t.jqDeferred){var n=t.hasAnyBroken?"reject":"resolve";t.jqDeferred[n](t)}})},a&&(a.fn.imagesLoaded=function(e,t){var n=new s(this,e,t);return n.jqDeferred.promise(a(this))}),f.prototype=new t,f.prototype.check=function(){var e=v[this.img.src]||new c(this.img.src);if(e.isConfirmed)return this.confirm(e.isLoaded,"cached was confirmed"),void 0;if(this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this;e.on("confirm",function(e,n){return t.confirm(e.isLoaded,n),!0}),e.check()},f.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("confirm",this,t)};var v={};return c.prototype=new t,c.prototype.check=function(){if(!this.isChecked){var e=new Image;n.bind(e,"load",this),n.bind(e,"error",this),e.src=this.src,this.isChecked=!0}},c.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},c.prototype.onload=function(e){this.confirm(!0,"onload"),this.unbindProxyEvents(e)},c.prototype.onerror=function(e){this.confirm(!1,"onerror"),this.unbindProxyEvents(e)},c.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},c.prototype.unbindProxyEvents=function(e){n.unbind(e.target,"load",this),n.unbind(e.target,"error",this)},s});/*!
 * Isotope PACKAGED v2.2.0
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */

(function(t){function e(){}function i(t){function i(e){e.prototype.option||(e.prototype.option=function(e){t.isPlainObject(e)&&(this.options=t.extend(!0,this.options,e))})}function n(e,i){t.fn[e]=function(n){if("string"==typeof n){for(var s=o.call(arguments,1),a=0,u=this.length;u>a;a++){var p=this[a],h=t.data(p,e);if(h)if(t.isFunction(h[n])&&"_"!==n.charAt(0)){var f=h[n].apply(h,s);if(void 0!==f)return f}else r("no such method '"+n+"' for "+e+" instance");else r("cannot call methods on "+e+" prior to initialization; "+"attempted to call '"+n+"'")}return this}return this.each(function(){var o=t.data(this,e);o?(o.option(n),o._init()):(o=new i(this,n),t.data(this,e,o))})}}if(t){var r="undefined"==typeof console?e:function(t){console.error(t)};return t.bridget=function(t,e){i(e),n(t,e)},t.bridget}}var o=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],i):"object"==typeof exports?i(require("jquery")):i(t.jQuery)})(window),function(t){function e(e){var i=t.event;return i.target=i.target||i.srcElement||e,i}var i=document.documentElement,o=function(){};i.addEventListener?o=function(t,e,i){t.addEventListener(e,i,!1)}:i.attachEvent&&(o=function(t,i,o){t[i+o]=o.handleEvent?function(){var i=e(t);o.handleEvent.call(o,i)}:function(){var i=e(t);o.call(t,i)},t.attachEvent("on"+i,t[i+o])});var n=function(){};i.removeEventListener?n=function(t,e,i){t.removeEventListener(e,i,!1)}:i.detachEvent&&(n=function(t,e,i){t.detachEvent("on"+e,t[e+i]);try{delete t[e+i]}catch(o){t[e+i]=void 0}});var r={bind:o,unbind:n};"function"==typeof define&&define.amd?define("eventie/eventie",r):"object"==typeof exports?module.exports=r:t.eventie=r}(window),function(){function t(){}function e(t,e){for(var i=t.length;i--;)if(t[i].listener===e)return i;return-1}function i(t){return function(){return this[t].apply(this,arguments)}}var o=t.prototype,n=this,r=n.EventEmitter;o.getListeners=function(t){var e,i,o=this._getEvents();if(t instanceof RegExp){e={};for(i in o)o.hasOwnProperty(i)&&t.test(i)&&(e[i]=o[i])}else e=o[t]||(o[t]=[]);return e},o.flattenListeners=function(t){var e,i=[];for(e=0;t.length>e;e+=1)i.push(t[e].listener);return i},o.getListenersAsObject=function(t){var e,i=this.getListeners(t);return i instanceof Array&&(e={},e[t]=i),e||i},o.addListener=function(t,i){var o,n=this.getListenersAsObject(t),r="object"==typeof i;for(o in n)n.hasOwnProperty(o)&&-1===e(n[o],i)&&n[o].push(r?i:{listener:i,once:!1});return this},o.on=i("addListener"),o.addOnceListener=function(t,e){return this.addListener(t,{listener:e,once:!0})},o.once=i("addOnceListener"),o.defineEvent=function(t){return this.getListeners(t),this},o.defineEvents=function(t){for(var e=0;t.length>e;e+=1)this.defineEvent(t[e]);return this},o.removeListener=function(t,i){var o,n,r=this.getListenersAsObject(t);for(n in r)r.hasOwnProperty(n)&&(o=e(r[n],i),-1!==o&&r[n].splice(o,1));return this},o.off=i("removeListener"),o.addListeners=function(t,e){return this.manipulateListeners(!1,t,e)},o.removeListeners=function(t,e){return this.manipulateListeners(!0,t,e)},o.manipulateListeners=function(t,e,i){var o,n,r=t?this.removeListener:this.addListener,s=t?this.removeListeners:this.addListeners;if("object"!=typeof e||e instanceof RegExp)for(o=i.length;o--;)r.call(this,e,i[o]);else for(o in e)e.hasOwnProperty(o)&&(n=e[o])&&("function"==typeof n?r.call(this,o,n):s.call(this,o,n));return this},o.removeEvent=function(t){var e,i=typeof t,o=this._getEvents();if("string"===i)delete o[t];else if(t instanceof RegExp)for(e in o)o.hasOwnProperty(e)&&t.test(e)&&delete o[e];else delete this._events;return this},o.removeAllListeners=i("removeEvent"),o.emitEvent=function(t,e){var i,o,n,r,s=this.getListenersAsObject(t);for(n in s)if(s.hasOwnProperty(n))for(o=s[n].length;o--;)i=s[n][o],i.once===!0&&this.removeListener(t,i.listener),r=i.listener.apply(this,e||[]),r===this._getOnceReturnValue()&&this.removeListener(t,i.listener);return this},o.trigger=i("emitEvent"),o.emit=function(t){var e=Array.prototype.slice.call(arguments,1);return this.emitEvent(t,e)},o.setOnceReturnValue=function(t){return this._onceReturnValue=t,this},o._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},o._getEvents=function(){return this._events||(this._events={})},t.noConflict=function(){return n.EventEmitter=r,t},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return t}):"object"==typeof module&&module.exports?module.exports=t:n.EventEmitter=t}.call(this),function(t){function e(t){if(t){if("string"==typeof o[t])return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(var e,n=0,r=i.length;r>n;n++)if(e=i[n]+t,"string"==typeof o[e])return e}}var i="Webkit Moz ms Ms O".split(" "),o=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return e}):"object"==typeof exports?module.exports=e:t.getStyleProperty=e}(window),function(t){function e(t){var e=parseFloat(t),i=-1===t.indexOf("%")&&!isNaN(e);return i&&e}function i(){}function o(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0,i=s.length;i>e;e++){var o=s[e];t[o]=0}return t}function n(i){function n(){if(!d){d=!0;var o=t.getComputedStyle;if(p=function(){var t=o?function(t){return o(t,null)}:function(t){return t.currentStyle};return function(e){var i=t(e);return i||r("Style returned "+i+". Are you running this code in a hidden iframe on Firefox? "+"See http://bit.ly/getsizebug1"),i}}(),h=i("boxSizing")){var n=document.createElement("div");n.style.width="200px",n.style.padding="1px 2px 3px 4px",n.style.borderStyle="solid",n.style.borderWidth="1px 2px 3px 4px",n.style[h]="border-box";var s=document.body||document.documentElement;s.appendChild(n);var a=p(n);f=200===e(a.width),s.removeChild(n)}}}function a(t){if(n(),"string"==typeof t&&(t=document.querySelector(t)),t&&"object"==typeof t&&t.nodeType){var i=p(t);if("none"===i.display)return o();var r={};r.width=t.offsetWidth,r.height=t.offsetHeight;for(var a=r.isBorderBox=!(!h||!i[h]||"border-box"!==i[h]),d=0,l=s.length;l>d;d++){var c=s[d],m=i[c];m=u(t,m);var y=parseFloat(m);r[c]=isNaN(y)?0:y}var g=r.paddingLeft+r.paddingRight,v=r.paddingTop+r.paddingBottom,_=r.marginLeft+r.marginRight,I=r.marginTop+r.marginBottom,z=r.borderLeftWidth+r.borderRightWidth,L=r.borderTopWidth+r.borderBottomWidth,x=a&&f,E=e(i.width);E!==!1&&(r.width=E+(x?0:g+z));var b=e(i.height);return b!==!1&&(r.height=b+(x?0:v+L)),r.innerWidth=r.width-(g+z),r.innerHeight=r.height-(v+L),r.outerWidth=r.width+_,r.outerHeight=r.height+I,r}}function u(e,i){if(t.getComputedStyle||-1===i.indexOf("%"))return i;var o=e.style,n=o.left,r=e.runtimeStyle,s=r&&r.left;return s&&(r.left=e.currentStyle.left),o.left=i,i=o.pixelLeft,o.left=n,s&&(r.left=s),i}var p,h,f,d=!1;return a}var r="undefined"==typeof console?i:function(t){console.error(t)},s=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],n):"object"==typeof exports?module.exports=n(require("desandro-get-style-property")):t.getSize=n(t.getStyleProperty)}(window),function(t){function e(t){"function"==typeof t&&(e.isReady?t():s.push(t))}function i(t){var i="readystatechange"===t.type&&"complete"!==r.readyState;e.isReady||i||o()}function o(){e.isReady=!0;for(var t=0,i=s.length;i>t;t++){var o=s[t];o()}}function n(n){return"complete"===r.readyState?o():(n.bind(r,"DOMContentLoaded",i),n.bind(r,"readystatechange",i),n.bind(t,"load",i)),e}var r=t.document,s=[];e.isReady=!1,"function"==typeof define&&define.amd?define("doc-ready/doc-ready",["eventie/eventie"],n):"object"==typeof exports?module.exports=n(require("eventie")):t.docReady=n(t.eventie)}(window),function(t){function e(t,e){return t[s](e)}function i(t){if(!t.parentNode){var e=document.createDocumentFragment();e.appendChild(t)}}function o(t,e){i(t);for(var o=t.parentNode.querySelectorAll(e),n=0,r=o.length;r>n;n++)if(o[n]===t)return!0;return!1}function n(t,o){return i(t),e(t,o)}var r,s=function(){if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0,o=e.length;o>i;i++){var n=e[i],r=n+"MatchesSelector";if(t[r])return r}}();if(s){var a=document.createElement("div"),u=e(a,"div");r=u?e:n}else r=o;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return r}):"object"==typeof exports?module.exports=r:window.matchesSelector=r}(Element.prototype),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["doc-ready/doc-ready","matches-selector/matches-selector"],function(i,o){return e(t,i,o)}):"object"==typeof exports?module.exports=e(t,require("doc-ready"),require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.docReady,t.matchesSelector)}(window,function(t,e,i){var o={};o.extend=function(t,e){for(var i in e)t[i]=e[i];return t},o.modulo=function(t,e){return(t%e+e)%e};var n=Object.prototype.toString;o.isArray=function(t){return"[object Array]"==n.call(t)},o.makeArray=function(t){var e=[];if(o.isArray(t))e=t;else if(t&&"number"==typeof t.length)for(var i=0,n=t.length;n>i;i++)e.push(t[i]);else e.push(t);return e},o.indexOf=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++)if(t[i]===e)return i;return-1},o.removeFrom=function(t,e){var i=o.indexOf(t,e);-1!=i&&t.splice(i,1)},o.isElement="function"==typeof HTMLElement||"object"==typeof HTMLElement?function(t){return t instanceof HTMLElement}:function(t){return t&&"object"==typeof t&&1==t.nodeType&&"string"==typeof t.nodeName},o.setText=function(){function t(t,i){e=e||(void 0!==document.documentElement.textContent?"textContent":"innerText"),t[e]=i}var e;return t}(),o.getParent=function(t,e){for(;t!=document.body;)if(t=t.parentNode,i(t,e))return t},o.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},o.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},o.filterFindElements=function(t,e){t=o.makeArray(t);for(var n=[],r=0,s=t.length;s>r;r++){var a=t[r];if(o.isElement(a))if(e){i(a,e)&&n.push(a);for(var u=a.querySelectorAll(e),p=0,h=u.length;h>p;p++)n.push(u[p])}else n.push(a)}return n},o.debounceMethod=function(t,e,i){var o=t.prototype[e],n=e+"Timeout";t.prototype[e]=function(){var t=this[n];t&&clearTimeout(t);var e=arguments,r=this;this[n]=setTimeout(function(){o.apply(r,e),delete r[n]},i||100)}},o.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var r=t.console;return o.htmlInit=function(i,n){e(function(){for(var e=o.toDashed(n),s=document.querySelectorAll(".js-"+e),a="data-"+e+"-options",u=0,p=s.length;p>u;u++){var h,f=s[u],d=f.getAttribute(a);try{h=d&&JSON.parse(d)}catch(l){r&&r.error("Error parsing "+a+" on "+f.nodeName.toLowerCase()+(f.id?"#"+f.id:"")+": "+l);continue}var c=new i(f,h),m=t.jQuery;m&&m.data(f,n,c)}})},o}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["eventEmitter/EventEmitter","get-size/get-size","get-style-property/get-style-property","fizzy-ui-utils/utils"],function(i,o,n,r){return e(t,i,o,n,r)}):"object"==typeof exports?module.exports=e(t,require("wolfy87-eventemitter"),require("get-size"),require("desandro-get-style-property"),require("fizzy-ui-utils")):(t.Outlayer={},t.Outlayer.Item=e(t,t.EventEmitter,t.getSize,t.getStyleProperty,t.fizzyUIUtils))}(window,function(t,e,i,o,n){function r(t){for(var e in t)return!1;return e=null,!0}function s(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}var a=t.getComputedStyle,u=a?function(t){return a(t,null)}:function(t){return t.currentStyle},p=o("transition"),h=o("transform"),f=p&&h,d=!!o("perspective"),l={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"}[p],c=["transform","transition","transitionDuration","transitionProperty"],m=function(){for(var t={},e=0,i=c.length;i>e;e++){var n=c[e],r=o(n);r&&r!==n&&(t[n]=r)}return t}();n.extend(s.prototype,e.prototype),s.prototype._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},s.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},s.prototype.getSize=function(){this.size=i(this.element)},s.prototype.css=function(t){var e=this.element.style;for(var i in t){var o=m[i]||i;e[o]=t[i]}},s.prototype.getPosition=function(){var t=u(this.element),e=this.layout.options,i=e.isOriginLeft,o=e.isOriginTop,n=parseInt(t[i?"left":"right"],10),r=parseInt(t[o?"top":"bottom"],10);n=isNaN(n)?0:n,r=isNaN(r)?0:r;var s=this.layout.size;n-=i?s.paddingLeft:s.paddingRight,r-=o?s.paddingTop:s.paddingBottom,this.position.x=n,this.position.y=r},s.prototype.layoutPosition=function(){var t=this.layout.size,e=this.layout.options,i={},o=e.isOriginLeft?"paddingLeft":"paddingRight",n=e.isOriginLeft?"left":"right",r=e.isOriginLeft?"right":"left",s=this.position.x+t[o];s=e.percentPosition&&!e.isHorizontal?100*(s/t.width)+"%":s+"px",i[n]=s,i[r]="";var a=e.isOriginTop?"paddingTop":"paddingBottom",u=e.isOriginTop?"top":"bottom",p=e.isOriginTop?"bottom":"top",h=this.position.y+t[a];h=e.percentPosition&&e.isHorizontal?100*(h/t.height)+"%":h+"px",i[u]=h,i[p]="",this.css(i),this.emitEvent("layout",[this])};var y=d?function(t,e){return"translate3d("+t+"px, "+e+"px, 0)"}:function(t,e){return"translate("+t+"px, "+e+"px)"};s.prototype._transitionTo=function(t,e){this.getPosition();var i=this.position.x,o=this.position.y,n=parseInt(t,10),r=parseInt(e,10),s=n===this.position.x&&r===this.position.y;if(this.setPosition(t,e),s&&!this.isTransitioning)return this.layoutPosition(),void 0;var a=t-i,u=e-o,p={},h=this.layout.options;a=h.isOriginLeft?a:-a,u=h.isOriginTop?u:-u,p.transform=y(a,u),this.transition({to:p,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},s.prototype.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},s.prototype.moveTo=f?s.prototype._transitionTo:s.prototype.goTo,s.prototype.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},s.prototype._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},s.prototype._transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return this._nonTransition(t),void 0;var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var o=this.element.offsetHeight;o=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var g=h&&n.toDashed(h)+",opacity";s.prototype.enableTransition=function(){this.isTransitioning||(this.css({transitionProperty:g,transitionDuration:this.layout.options.transitionDuration}),this.element.addEventListener(l,this,!1))},s.prototype.transition=s.prototype[p?"_transition":"_nonTransition"],s.prototype.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},s.prototype.onotransitionend=function(t){this.ontransitionend(t)};var v={"-webkit-transform":"transform","-moz-transform":"transform","-o-transform":"transform"};s.prototype.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,i=v[t.propertyName]||t.propertyName;if(delete e.ingProperties[i],r(e.ingProperties)&&this.disableTransition(),i in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[i]),i in e.onEnd){var o=e.onEnd[i];o.call(this),delete e.onEnd[i]}this.emitEvent("transitionEnd",[this])}},s.prototype.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(l,this,!1),this.isTransitioning=!1},s.prototype._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var _={transitionProperty:"",transitionDuration:""};return s.prototype.removeTransitionStyles=function(){this.css(_)},s.prototype.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},s.prototype.remove=function(){if(!p||!parseFloat(this.layout.options.transitionDuration))return this.removeElem(),void 0;var t=this;this.once("transitionEnd",function(){t.removeElem()}),this.hide()},s.prototype.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},s.prototype.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},s.prototype.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},s.prototype.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},s.prototype.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},s.prototype.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},s}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/outlayer",["eventie/eventie","eventEmitter/EventEmitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,o,n,r,s){return e(t,i,o,n,r,s)}):"object"==typeof exports?module.exports=e(t,require("eventie"),require("wolfy87-eventemitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.eventie,t.EventEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,o,n,r){function s(t,e){var i=n.getQueryElement(t);if(!i)return a&&a.error("Bad element for "+this.constructor.namespace+": "+(i||t)),void 0;this.element=i,u&&(this.$element=u(this.element)),this.options=n.extend({},this.constructor.defaults),this.option(e);var o=++h;this.element.outlayerGUID=o,f[o]=this,this._create(),this.options.isInitLayout&&this.layout()}var a=t.console,u=t.jQuery,p=function(){},h=0,f={};return s.namespace="outlayer",s.Item=r,s.defaults={containerStyle:{position:"relative"},isInitLayout:!0,isOriginLeft:!0,isOriginTop:!0,isResizeBound:!0,isResizingContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}},n.extend(s.prototype,i.prototype),s.prototype.option=function(t){n.extend(this.options,t)},s.prototype._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),n.extend(this.element.style,this.options.containerStyle),this.options.isResizeBound&&this.bindResize()},s.prototype.reloadItems=function(){this.items=this._itemize(this.element.children)},s.prototype._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,o=[],n=0,r=e.length;r>n;n++){var s=e[n],a=new i(s,this);o.push(a)}return o},s.prototype._filterFindItemElements=function(t){return n.filterFindElements(t,this.options.itemSelector)},s.prototype.getItemElements=function(){for(var t=[],e=0,i=this.items.length;i>e;e++)t.push(this.items[e].element);return t},s.prototype.layout=function(){this._resetLayout(),this._manageStamps();var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;this.layoutItems(this.items,t),this._isLayoutInited=!0},s.prototype._init=s.prototype.layout,s.prototype._resetLayout=function(){this.getSize()},s.prototype.getSize=function(){this.size=o(this.element)},s.prototype._getMeasurement=function(t,e){var i,r=this.options[t];r?("string"==typeof r?i=this.element.querySelector(r):n.isElement(r)&&(i=r),this[t]=i?o(i)[e]:r):this[t]=0},s.prototype.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},s.prototype._getItemsForLayout=function(t){for(var e=[],i=0,o=t.length;o>i;i++){var n=t[i];n.isIgnored||e.push(n)}return e},s.prototype._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){for(var i=[],o=0,n=t.length;n>o;o++){var r=t[o],s=this._getItemLayoutPosition(r);s.item=r,s.isInstant=e||r.isLayoutInstant,i.push(s)}this._processLayoutQueue(i)}},s.prototype._getItemLayoutPosition=function(){return{x:0,y:0}},s.prototype._processLayoutQueue=function(t){for(var e=0,i=t.length;i>e;e++){var o=t[e];this._positionItem(o.item,o.x,o.y,o.isInstant)}},s.prototype._positionItem=function(t,e,i,o){o?t.goTo(e,i):t.moveTo(e,i)},s.prototype._postLayout=function(){this.resizeContainer()},s.prototype.resizeContainer=function(){if(this.options.isResizingContainer){var t=this._getContainerSize();t&&(this._setContainerMeasure(t.width,!0),this._setContainerMeasure(t.height,!1))}},s.prototype._getContainerSize=p,s.prototype._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},s.prototype._emitCompleteOnItems=function(t,e){function i(){n.emitEvent(t+"Complete",[e])}function o(){s++,s===r&&i()}var n=this,r=e.length;if(!e||!r)return i(),void 0;for(var s=0,a=0,u=e.length;u>a;a++){var p=e[a];p.once(t,o)}},s.prototype.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},s.prototype.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},s.prototype.stamp=function(t){if(t=this._find(t)){this.stamps=this.stamps.concat(t);for(var e=0,i=t.length;i>e;e++){var o=t[e];this.ignore(o)}}},s.prototype.unstamp=function(t){if(t=this._find(t))for(var e=0,i=t.length;i>e;e++){var o=t[e];n.removeFrom(this.stamps,o),this.unignore(o)}},s.prototype._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=n.makeArray(t)):void 0},s.prototype._manageStamps=function(){if(this.stamps&&this.stamps.length){this._getBoundingRect();for(var t=0,e=this.stamps.length;e>t;t++){var i=this.stamps[t];this._manageStamp(i)}}},s.prototype._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},s.prototype._manageStamp=p,s.prototype._getElementOffset=function(t){var e=t.getBoundingClientRect(),i=this._boundingRect,n=o(t),r={left:e.left-i.left-n.marginLeft,top:e.top-i.top-n.marginTop,right:i.right-e.right-n.marginRight,bottom:i.bottom-e.bottom-n.marginBottom};return r},s.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},s.prototype.bindResize=function(){this.isResizeBound||(e.bind(t,"resize",this),this.isResizeBound=!0)},s.prototype.unbindResize=function(){this.isResizeBound&&e.unbind(t,"resize",this),this.isResizeBound=!1},s.prototype.onresize=function(){function t(){e.resize(),delete e.resizeTimeout}this.resizeTimeout&&clearTimeout(this.resizeTimeout);var e=this;this.resizeTimeout=setTimeout(t,100)},s.prototype.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},s.prototype.needsResizeLayout=function(){var t=o(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},s.prototype.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},s.prototype.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},s.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},s.prototype.reveal=function(t){this._emitCompleteOnItems("reveal",t);for(var e=t&&t.length,i=0;e&&e>i;i++){var o=t[i];o.reveal()}},s.prototype.hide=function(t){this._emitCompleteOnItems("hide",t);for(var e=t&&t.length,i=0;e&&e>i;i++){var o=t[i];o.hide()}},s.prototype.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},s.prototype.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},s.prototype.getItem=function(t){for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];if(o.element===t)return o}},s.prototype.getItems=function(t){t=n.makeArray(t);for(var e=[],i=0,o=t.length;o>i;i++){var r=t[i],s=this.getItem(r);s&&e.push(s)}return e},s.prototype.remove=function(t){var e=this.getItems(t);if(this._emitCompleteOnItems("remove",e),e&&e.length)for(var i=0,o=e.length;o>i;i++){var r=e[i];r.remove(),n.removeFrom(this.items,r)}},s.prototype.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="";for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];o.destroy()}this.unbindResize();var n=this.element.outlayerGUID;delete f[n],delete this.element.outlayerGUID,u&&u.removeData(this.element,this.constructor.namespace)},s.data=function(t){t=n.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&f[e]},s.create=function(t,e){function i(){s.apply(this,arguments)}return Object.create?i.prototype=Object.create(s.prototype):n.extend(i.prototype,s.prototype),i.prototype.constructor=i,i.defaults=n.extend({},s.defaults),n.extend(i.defaults,e),i.prototype.settings={},i.namespace=t,i.data=s.data,i.Item=function(){r.apply(this,arguments)},i.Item.prototype=new r,n.htmlInit(i,t),u&&u.bridget&&u.bridget(t,i),i},s.Item=r,s}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/item",["outlayer/outlayer"],e):"object"==typeof exports?module.exports=e(require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.Item=e(t.Outlayer))}(window,function(t){function e(){t.Item.apply(this,arguments)}e.prototype=new t.Item,e.prototype._create=function(){this.id=this.layout.itemGUID++,t.Item.prototype._create.call(this),this.sortData={}},e.prototype.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var t=this.layout.options.getSortData,e=this.layout._sorters;for(var i in t){var o=e[i];this.sortData[i]=o(this.element,this)}}};var i=e.prototype.destroy;return e.prototype.destroy=function(){i.apply(this,arguments),this.css({display:""})},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/layout-mode",["get-size/get-size","outlayer/outlayer"],e):"object"==typeof exports?module.exports=e(require("get-size"),require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.LayoutMode=e(t.getSize,t.Outlayer))}(window,function(t,e){function i(t){this.isotope=t,t&&(this.options=t.options[this.namespace],this.element=t.element,this.items=t.filteredItems,this.size=t.size)}return function(){function t(t){return function(){return e.prototype[t].apply(this.isotope,arguments)}}for(var o=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout"],n=0,r=o.length;r>n;n++){var s=o[n];i.prototype[s]=t(s)}}(),i.prototype.needsVerticalResizeLayout=function(){var e=t(this.isotope.element),i=this.isotope.size&&e;return i&&e.innerHeight!=this.isotope.size.innerHeight},i.prototype._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},i.prototype.getColumnWidth=function(){this.getSegmentSize("column","Width")},i.prototype.getRowHeight=function(){this.getSegmentSize("row","Height")},i.prototype.getSegmentSize=function(t,e){var i=t+e,o="outer"+e;if(this._getMeasurement(i,o),!this[i]){var n=this.getFirstItemSize();this[i]=n&&n[o]||this.isotope.size["inner"+e]}},i.prototype.getFirstItemSize=function(){var e=this.isotope.filteredItems[0];return e&&e.element&&t(e.element)},i.prototype.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},i.prototype.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},i.modes={},i.create=function(t,e){function o(){i.apply(this,arguments)}return o.prototype=new i,e&&(o.options=e),o.prototype.namespace=t,i.modes[t]=o,o},i}),function(t,e){"function"==typeof define&&define.amd?define("masonry/masonry",["outlayer/outlayer","get-size/get-size","fizzy-ui-utils/utils"],e):"object"==typeof exports?module.exports=e(require("outlayer"),require("get-size"),require("fizzy-ui-utils")):t.Masonry=e(t.Outlayer,t.getSize,t.fizzyUIUtils)}(window,function(t,e,i){var o=t.create("masonry");return o.prototype._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns();var t=this.cols;for(this.colYs=[];t--;)this.colYs.push(0);this.maxY=0},o.prototype.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var o=this.columnWidth+=this.gutter,n=this.containerWidth+this.gutter,r=n/o,s=o-n%o,a=s&&1>s?"round":"floor";r=Math[a](r),this.cols=Math.max(r,1)},o.prototype.getContainerWidth=function(){var t=this.options.isFitWidth?this.element.parentNode:this.element,i=e(t);this.containerWidth=i&&i.innerWidth},o.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,o=e&&1>e?"round":"ceil",n=Math[o](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var r=this._getColGroup(n),s=Math.min.apply(Math,r),a=i.indexOf(r,s),u={x:this.columnWidth*a,y:s},p=s+t.size.outerHeight,h=this.cols+1-r.length,f=0;h>f;f++)this.colYs[a+f]=p;return u},o.prototype._getColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,o=0;i>o;o++){var n=this.colYs.slice(o,o+t);e[o]=Math.max.apply(Math,n)}return e},o.prototype._manageStamp=function(t){var i=e(t),o=this._getElementOffset(t),n=this.options.isOriginLeft?o.left:o.right,r=n+i.outerWidth,s=Math.floor(n/this.columnWidth);s=Math.max(0,s);var a=Math.floor(r/this.columnWidth);a-=r%this.columnWidth?0:1,a=Math.min(this.cols-1,a);for(var u=(this.options.isOriginTop?o.top:o.bottom)+i.outerHeight,p=s;a>=p;p++)this.colYs[p]=Math.max(u,this.colYs[p])},o.prototype._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this.options.isFitWidth&&(t.width=this._getContainerFitWidth()),t},o.prototype._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},o.prototype.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!==this.containerWidth},o}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/layout-modes/masonry",["../layout-mode","masonry/masonry"],e):"object"==typeof exports?module.exports=e(require("../layout-mode"),require("masonry-layout")):e(t.Isotope.LayoutMode,t.Masonry)}(window,function(t,e){function i(t,e){for(var i in e)t[i]=e[i];return t}var o=t.create("masonry"),n=o.prototype._getElementOffset,r=o.prototype.layout,s=o.prototype._getMeasurement;i(o.prototype,e.prototype),o.prototype._getElementOffset=n,o.prototype.layout=r,o.prototype._getMeasurement=s;var a=o.prototype.measureColumns;o.prototype.measureColumns=function(){this.items=this.isotope.filteredItems,a.call(this)};var u=o.prototype._manageStamp;return o.prototype._manageStamp=function(){this.options.isOriginLeft=this.isotope.options.isOriginLeft,this.options.isOriginTop=this.isotope.options.isOriginTop,u.apply(this,arguments)},o}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/layout-modes/fit-rows",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){var e=t.create("fitRows");return e.prototype._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this._getMeasurement("gutter","outerWidth")
},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth+this.gutter,i=this.isotope.size.innerWidth+this.gutter;0!==this.x&&e+this.x>i&&(this.x=0,this.y=this.maxY);var o={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=e,o},e.prototype._getContainerSize=function(){return{height:this.maxY}},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/layout-modes/vertical",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){var e=t.create("vertical",{horizontalAlignment:0});return e.prototype._resetLayout=function(){this.y=0},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},e.prototype._getContainerSize=function(){return{height:this.y}},e}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","matches-selector/matches-selector","fizzy-ui-utils/utils","isotope/js/item","isotope/js/layout-mode","isotope/js/layout-modes/masonry","isotope/js/layout-modes/fit-rows","isotope/js/layout-modes/vertical"],function(i,o,n,r,s,a){return e(t,i,o,n,r,s,a)}):"object"==typeof exports?module.exports=e(t,require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("fizzy-ui-utils"),require("./item"),require("./layout-mode"),require("./layout-modes/masonry"),require("./layout-modes/fit-rows"),require("./layout-modes/vertical")):t.Isotope=e(t,t.Outlayer,t.getSize,t.matchesSelector,t.fizzyUIUtils,t.Isotope.Item,t.Isotope.LayoutMode)}(window,function(t,e,i,o,n,r,s){function a(t,e){return function(i,o){for(var n=0,r=t.length;r>n;n++){var s=t[n],a=i.sortData[s],u=o.sortData[s];if(a>u||u>a){var p=void 0!==e[s]?e[s]:e,h=p?1:-1;return(a>u?1:-1)*h}}return 0}}var u=t.jQuery,p=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},h=document.documentElement,f=h.textContent?function(t){return t.textContent}:function(t){return t.innerText},d=e.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});d.Item=r,d.LayoutMode=s,d.prototype._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),e.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var t in s.modes)this._initLayoutMode(t)},d.prototype.reloadItems=function(){this.itemGUID=0,e.prototype.reloadItems.call(this)},d.prototype._itemize=function(){for(var t=e.prototype._itemize.apply(this,arguments),i=0,o=t.length;o>i;i++){var n=t[i];n.id=this.itemGUID++}return this._updateItemsSortData(t),t},d.prototype._initLayoutMode=function(t){var e=s.modes[t],i=this.options[t]||{};this.options[t]=e.options?n.extend(e.options,i):i,this.modes[t]=new e(this)},d.prototype.layout=function(){return!this._isLayoutInited&&this.options.isInitLayout?(this.arrange(),void 0):(this._layout(),void 0)},d.prototype._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},d.prototype.arrange=function(t){function e(){o.reveal(i.needReveal),o.hide(i.needHide)}this.option(t),this._getIsInstant();var i=this._filter(this.items);this.filteredItems=i.matches;var o=this;this._bindArrangeComplete(),this._isInstant?this._noTransition(e):e(),this._sort(),this._layout()},d.prototype._init=d.prototype.arrange,d.prototype._getIsInstant=function(){var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;return this._isInstant=t,t},d.prototype._bindArrangeComplete=function(){function t(){e&&i&&o&&n.emitEvent("arrangeComplete",[n.filteredItems])}var e,i,o,n=this;this.once("layoutComplete",function(){e=!0,t()}),this.once("hideComplete",function(){i=!0,t()}),this.once("revealComplete",function(){o=!0,t()})},d.prototype._filter=function(t){var e=this.options.filter;e=e||"*";for(var i=[],o=[],n=[],r=this._getFilterTest(e),s=0,a=t.length;a>s;s++){var u=t[s];if(!u.isIgnored){var p=r(u);p&&i.push(u),p&&u.isHidden?o.push(u):p||u.isHidden||n.push(u)}}return{matches:i,needReveal:o,needHide:n}},d.prototype._getFilterTest=function(t){return u&&this.options.isJQueryFiltering?function(e){return u(e.element).is(t)}:"function"==typeof t?function(e){return t(e.element)}:function(e){return o(e.element,t)}},d.prototype.updateSortData=function(t){var e;t?(t=n.makeArray(t),e=this.getItems(t)):e=this.items,this._getSorters(),this._updateItemsSortData(e)},d.prototype._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=l(i)}},d.prototype._updateItemsSortData=function(t){for(var e=t&&t.length,i=0;e&&e>i;i++){var o=t[i];o.updateSortData()}};var l=function(){function t(t){if("string"!=typeof t)return t;var i=p(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),r=n&&n[1],s=e(r,o),a=d.sortDataParsers[i[1]];return t=a?function(t){return t&&a(s(t))}:function(t){return t&&s(t)}}function e(t,e){var i;return i=t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&f(i)}}return t}();d.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},d.prototype._sort=function(){var t=this.options.sortBy;if(t){var e=[].concat.apply(t,this.sortHistory),i=a(e,this.options.sortAscending);this.filteredItems.sort(i),t!=this.sortHistory[0]&&this.sortHistory.unshift(t)}},d.prototype._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw Error("No layout mode: "+t);return e.options=this.options[t],e},d.prototype._resetLayout=function(){e.prototype._resetLayout.call(this),this._mode()._resetLayout()},d.prototype._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},d.prototype._manageStamp=function(t){this._mode()._manageStamp(t)},d.prototype._getContainerSize=function(){return this._mode()._getContainerSize()},d.prototype.needsResizeLayout=function(){return this._mode().needsResizeLayout()},d.prototype.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},d.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){this._resetLayout(),this._manageStamps();var i=this._filterRevealAdded(e);this.layoutItems(this.filteredItems),this.filteredItems=i.concat(this.filteredItems),this.items=e.concat(this.items)}},d.prototype._filterRevealAdded=function(t){var e=this._filter(t);return this.hide(e.needHide),this.reveal(e.matches),this.layoutItems(e.matches,!0),e.matches},d.prototype.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;n>i;i++)o=e[i],this.element.appendChild(o.element);var r=this._filter(e).matches;for(i=0;n>i;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;n>i;i++)delete e[i].isLayoutInstant;this.reveal(r)}};var c=d.prototype.remove;return d.prototype.remove=function(t){t=n.makeArray(t);var e=this.getItems(t);c.call(this,t);var i=e&&e.length;if(i)for(var o=0;i>o;o++){var r=e[o];n.removeFrom(this.filteredItems,r)}},d.prototype.shuffle=function(){for(var t=0,e=this.items.length;e>t;t++){var i=this.items[t];i.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},d.prototype._noTransition=function(t){var e=this.options.transitionDuration;this.options.transitionDuration=0;var i=t.call(this);return this.options.transitionDuration=e,i},d.prototype.getFilteredItemElements=function(){for(var t=[],e=0,i=this.filteredItems.length;i>e;e++)t.push(this.filteredItems[e].element);return t},d});/* ------------------------------------------------------------------------
	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1.6
------------------------------------------------------------------------- */
!function(e){function t(){var e=location.href;return hashtag=-1!==e.indexOf("#prettyPhoto")?decodeURI(e.substring(e.indexOf("#prettyPhoto")+1,e.length)):!1,hashtag&&(hashtag=hashtag.replace(/<|>/g,"")),hashtag}function i(){"undefined"!=typeof theRel&&(location.hash=theRel+"/"+rel_index+"/")}function p(){-1!==location.href.indexOf("#prettyPhoto")&&(location.hash="prettyPhoto")}function o(e,t){e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var i="[\\?&]"+e+"=([^&#]*)",p=new RegExp(i),o=p.exec(t);return null==o?"":o[1]}e.prettyPhoto={version:"3.1.6"},e.fn.prettyPhoto=function(a){function s(){e(".pp_loaderIcon").hide(),projectedTop=scroll_pos.scrollTop+(I/2-f.containerHeight/2),projectedTop<0&&(projectedTop=0),$ppt.fadeTo(settings.animation_speed,1),$pp_pic_holder.find(".pp_content").animate({height:f.contentHeight,width:f.contentWidth},settings.animation_speed),$pp_pic_holder.animate({top:projectedTop,left:j/2-f.containerWidth/2<0?0:j/2-f.containerWidth/2,width:f.containerWidth},settings.animation_speed,function(){$pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(f.height).width(f.width),$pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed),isSet&&"image"==h(pp_images[set_position])?$pp_pic_holder.find(".pp_hoverContainer").show():$pp_pic_holder.find(".pp_hoverContainer").hide(),settings.allow_expand&&(f.resized?e("a.pp_expand,a.pp_contract").show():e("a.pp_expand").hide()),!settings.autoplay_slideshow||P||v||e.prettyPhoto.startSlideshow(),settings.changepicturecallback(),v=!0}),m(),a.ajaxcallback()}function n(t){$pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility","hidden"),$pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed,function(){e(".pp_loaderIcon").show(),t()})}function r(t){t>1?e(".pp_nav").show():e(".pp_nav").hide()}function l(e,t){if(resized=!1,d(e,t),imageWidth=e,imageHeight=t,(k>j||b>I)&&doresize&&settings.allow_resize&&!$){for(resized=!0,fitting=!1;!fitting;)k>j?(imageWidth=j-200,imageHeight=t/e*imageWidth):b>I?(imageHeight=I-200,imageWidth=e/t*imageHeight):fitting=!0,b=imageHeight,k=imageWidth;(k>j||b>I)&&l(k,b),d(imageWidth,imageHeight)}return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(b),containerWidth:Math.floor(k)+2*settings.horizontal_padding,contentHeight:Math.floor(y),contentWidth:Math.floor(w),resized:resized}}function d(t,i){t=parseFloat(t),i=parseFloat(i),$pp_details=$pp_pic_holder.find(".pp_details"),$pp_details.width(t),detailsHeight=parseFloat($pp_details.css("marginTop"))+parseFloat($pp_details.css("marginBottom")),$pp_details=$pp_details.clone().addClass(settings.theme).width(t).appendTo(e("body")).css({position:"absolute",top:-1e4}),detailsHeight+=$pp_details.height(),detailsHeight=detailsHeight<=34?36:detailsHeight,$pp_details.remove(),$pp_title=$pp_pic_holder.find(".ppt"),$pp_title.width(t),titleHeight=parseFloat($pp_title.css("marginTop"))+parseFloat($pp_title.css("marginBottom")),$pp_title=$pp_title.clone().appendTo(e("body")).css({position:"absolute",top:-1e4}),titleHeight+=$pp_title.height(),$pp_title.remove(),y=i+detailsHeight,w=t,b=y+titleHeight+$pp_pic_holder.find(".pp_top").height()+$pp_pic_holder.find(".pp_bottom").height(),k=t}function h(e){return e.match(/youtube\.com\/watch/i)||e.match(/youtu\.be/i)?"youtube":e.match(/vimeo\.com/i)?"vimeo":e.match(/\b.mov\b/i)?"quicktime":e.match(/\b.swf\b/i)?"flash":e.match(/\biframe=true\b/i)?"iframe":e.match(/\bajax=true\b/i)?"ajax":e.match(/\bcustom=true\b/i)?"custom":"#"==e.substr(0,1)?"inline":"image"}function c(){if(doresize&&"undefined"!=typeof $pp_pic_holder){if(scroll_pos=_(),contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width(),projectedTop=I/2+scroll_pos.scrollTop-contentHeight/2,projectedTop<0&&(projectedTop=0),contentHeight>I)return;$pp_pic_holder.css({top:projectedTop,left:j/2+scroll_pos.scrollLeft-contentwidth/2})}}function _(){return self.pageYOffset?{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset}:document.documentElement&&document.documentElement.scrollTop?{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft}:document.body?{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft}:void 0}function g(){I=e(window).height(),j=e(window).width(),"undefined"!=typeof $pp_overlay&&$pp_overlay.height(e(document).height()).width(j)}function m(){isSet&&settings.overlay_gallery&&"image"==h(pp_images[set_position])?(itemWidth=57,navWidth="facebook"==settings.theme||"pp_default"==settings.theme?50:30,itemsPerPage=Math.floor((f.containerWidth-100-navWidth)/itemWidth),itemsPerPage=itemsPerPage<pp_images.length?itemsPerPage:pp_images.length,totalPage=Math.ceil(pp_images.length/itemsPerPage)-1,0==totalPage?(navWidth=0,$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()):$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show(),galleryWidth=itemsPerPage*itemWidth,fullGalleryWidth=pp_images.length*itemWidth,$pp_gallery.css("margin-left",-(galleryWidth/2+navWidth/2)).find("div:first").width(galleryWidth+5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected"),goToPage=Math.floor(set_position/itemsPerPage)<totalPage?Math.floor(set_position/itemsPerPage):totalPage,e.prettyPhoto.changeGalleryPage(goToPage),$pp_gallery_li.filter(":eq("+set_position+")").addClass("selected")):$pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")}function u(){if(settings.social_tools&&(facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href))),settings.markup=settings.markup.replace("{pp_social}",""),e("body").append(settings.markup),$pp_pic_holder=e(".pp_pic_holder"),$ppt=e(".ppt"),$pp_overlay=e("div.pp_overlay"),isSet&&settings.overlay_gallery){currentGalleryPage=0,toInject="";for(var t=0;t<pp_images.length;t++)pp_images[t].match(/\b(jpg|jpeg|png|gif)\b/gi)?(classname="",img_src=pp_images[t]):(classname="default",img_src=""),toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>";toInject=settings.gallery_markup.replace(/{gallery}/g,toInject),$pp_pic_holder.find("#pp_full_res").after(toInject),$pp_gallery=e(".pp_pic_holder .pp_gallery"),$pp_gallery_li=$pp_gallery.find("li"),$pp_gallery.find(".pp_arrow_next").click(function(){return e.prettyPhoto.changeGalleryPage("next"),e.prettyPhoto.stopSlideshow(),!1}),$pp_gallery.find(".pp_arrow_previous").click(function(){return e.prettyPhoto.changeGalleryPage("previous"),e.prettyPhoto.stopSlideshow(),!1}),$pp_pic_holder.find(".pp_content").hover(function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()},function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()}),itemWidth=57,$pp_gallery_li.each(function(t){e(this).find("a").click(function(){return e.prettyPhoto.changePage(t),e.prettyPhoto.stopSlideshow(),!1})})}settings.slideshow&&($pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>'),$pp_pic_holder.find(".pp_nav .pp_play").click(function(){return e.prettyPhoto.startSlideshow(),!1})),$pp_pic_holder.attr("class","pp_pic_holder "+settings.theme),$pp_overlay.css({opacity:0,height:e(document).height(),width:e(window).width()}).bind("click",function(){settings.modal||e.prettyPhoto.close()}),e("a.pp_close").bind("click",function(){return e.prettyPhoto.close(),!1}),settings.allow_expand&&e("a.pp_expand").bind("click",function(){return e(this).hasClass("pp_expand")?(e(this).removeClass("pp_expand").addClass("pp_contract"),doresize=!1):(e(this).removeClass("pp_contract").addClass("pp_expand"),doresize=!0),n(function(){e.prettyPhoto.open()}),!1}),$pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click",function(){return e.prettyPhoto.changePage("previous"),e.prettyPhoto.stopSlideshow(),!1}),$pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click",function(){return e.prettyPhoto.changePage("next"),e.prettyPhoto.stopSlideshow(),!1}),c()}a=jQuery.extend({hook:"rel",animation_speed:"fast",ajaxcallback:function(){},slideshow:5e3,autoplay_slideshow:!1,opacity:.8,show_title:!0,allow_resize:!0,allow_expand:!0,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",horizontal_padding:20,hideflash:!1,wmode:"opaque",autoplay:!0,modal:!1,deeplinking:!0,overlay_gallery:!0,overlay_gallery_max:30,keyboard_shortcuts:!0,changepicturecallback:function(){},callback:function(){},ie6_fallback:!0,markup:'<div class="pp_pic_holder"> 						<div class="ppt">&nbsp;</div> 						<div class="pp_top"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 						<div class="pp_content_container"> 							<div class="pp_left"> 							<div class="pp_right"> 								<div class="pp_content"> 									<div class="pp_loaderIcon"></div> 									<div class="pp_fade"> 										<a href="#" class="pp_expand" title="Expand the image">Expand</a> 										<div class="pp_hoverContainer"> 											<a class="pp_next" href="#">next</a> 											<a class="pp_previous" href="#">previous</a> 										</div> 										<div id="pp_full_res"></div> 										<div class="pp_details"> 											<div class="pp_nav"> 												<a href="#" class="pp_arrow_previous">Previous</a> 												<p class="currentTextHolder">0/0</p> 												<a href="#" class="pp_arrow_next">Next</a> 											</div> 											<p class="pp_description"></p> 											<div class="pp_social">{pp_social}</div> 											<a class="pp_close" href="#">Close</a> 										</div> 									</div> 								</div> 							</div> 							</div> 						</div> 						<div class="pp_bottom"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 					</div> 					<div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> 								<a href="#" class="pp_arrow_previous">Previous</a> 								<div> 									<ul> 										{gallery} 									</ul> 								</div> 								<a href="#" class="pp_arrow_next">Next</a> 							</div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:"",social_tools:'<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&layout=button_count&show_faces=true&width=500&action=like&font&colorscheme=light&height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'},a);var f,v,y,w,b,k,P,x=this,$=!1,I=e(window).height(),j=e(window).width();return doresize=!0,scroll_pos=_(),e(window).unbind("resize.prettyphoto").bind("resize.prettyphoto",function(){c(),g()}),a.keyboard_shortcuts&&e(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto",function(t){if("undefined"!=typeof $pp_pic_holder&&$pp_pic_holder.is(":visible"))switch(t.keyCode){case 37:e.prettyPhoto.changePage("previous"),t.preventDefault();break;case 39:e.prettyPhoto.changePage("next"),t.preventDefault();break;case 27:settings.modal||e.prettyPhoto.close(),t.preventDefault()}}),e.prettyPhoto.initialize=function(){return settings=a,"pp_default"==settings.theme&&(settings.horizontal_padding=16),theRel=e(this).attr(settings.hook),galleryRegExp=/\[(?:.*)\]/,isSet=galleryRegExp.exec(theRel)?!0:!1,pp_images=isSet?jQuery.map(x,function(t){return-1!=e(t).attr(settings.hook).indexOf(theRel)?e(t).attr("href"):void 0}):e.makeArray(e(this).attr("href")),pp_titles=isSet?jQuery.map(x,function(t){return-1!=e(t).attr(settings.hook).indexOf(theRel)?e(t).find("img").attr("alt")?e(t).find("img").attr("alt"):"":void 0}):e.makeArray(e(this).find("img").attr("alt")),pp_descriptions=isSet?jQuery.map(x,function(t){return-1!=e(t).attr(settings.hook).indexOf(theRel)?e(t).attr("title")?e(t).attr("title"):"":void 0}):e.makeArray(e(this).attr("title")),pp_images.length>settings.overlay_gallery_max&&(settings.overlay_gallery=!1),set_position=jQuery.inArray(e(this).attr("href"),pp_images),rel_index=isSet?set_position:e("a["+settings.hook+"^='"+theRel+"']").index(e(this)),u(this),settings.allow_resize&&e(window).bind("scroll.prettyphoto",function(){c()}),e.prettyPhoto.open(),!1},e.prettyPhoto.open=function(t){return"undefined"==typeof settings&&(settings=a,pp_images=e.makeArray(arguments[0]),pp_titles=e.makeArray(arguments[1]?arguments[1]:""),pp_descriptions=e.makeArray(arguments[2]?arguments[2]:""),isSet=pp_images.length>1?!0:!1,set_position=arguments[3]?arguments[3]:0,u(t.target)),settings.hideflash&&e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","hidden"),r(e(pp_images).size()),e(".pp_loaderIcon").show(),settings.deeplinking&&i(),settings.social_tools&&(facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href)),$pp_pic_holder.find(".pp_social").html(facebook_like_link)),$ppt.is(":hidden")&&$ppt.css("opacity",0).show(),$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity),$pp_pic_holder.find(".currentTextHolder").text(set_position+1+settings.counter_separator_label+e(pp_images).size()),"undefined"!=typeof pp_descriptions[set_position]&&""!=pp_descriptions[set_position]?$pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position])):$pp_pic_holder.find(".pp_description").hide(),movie_width=parseFloat(o("width",pp_images[set_position]))?o("width",pp_images[set_position]):settings.default_width.toString(),movie_height=parseFloat(o("height",pp_images[set_position]))?o("height",pp_images[set_position]):settings.default_height.toString(),$=!1,-1!=movie_height.indexOf("%")&&(movie_height=parseFloat(e(window).height()*parseFloat(movie_height)/100-150),$=!0),-1!=movie_width.indexOf("%")&&(movie_width=parseFloat(e(window).width()*parseFloat(movie_width)/100-150),$=!0),$pp_pic_holder.fadeIn(function(){switch($ppt.html(settings.show_title&&""!=pp_titles[set_position]&&"undefined"!=typeof pp_titles[set_position]?unescape(pp_titles[set_position]):"&nbsp;"),imgPreloader="",skipInjection=!1,h(pp_images[set_position])){case"image":imgPreloader=new Image,nextImage=new Image,isSet&&set_position<e(pp_images).size()-1&&(nextImage.src=pp_images[set_position+1]),prevImage=new Image,isSet&&pp_images[set_position-1]&&(prevImage.src=pp_images[set_position-1]),$pp_pic_holder.find("#pp_full_res")[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]),imgPreloader.onload=function(){f=l(imgPreloader.width,imgPreloader.height),s()},imgPreloader.onerror=function(){alert("Image cannot be loaded. Make sure the path is correct and image exist."),e.prettyPhoto.close()},imgPreloader.src=pp_images[set_position];break;case"youtube":f=l(movie_width,movie_height),movie_id=o("v",pp_images[set_position]),""==movie_id&&(movie_id=pp_images[set_position].split("youtu.be/"),movie_id=movie_id[1],movie_id.indexOf("?")>0&&(movie_id=movie_id.substr(0,movie_id.indexOf("?"))),movie_id.indexOf("&")>0&&(movie_id=movie_id.substr(0,movie_id.indexOf("&")))),movie="http://www.youtube.com/embed/"+movie_id,movie+=o("rel",pp_images[set_position])?"?rel="+o("rel",pp_images[set_position]):"?rel=1",settings.autoplay&&(movie+="&autoplay=1"),toInject=settings.iframe_markup.replace(/{width}/g,f.width).replace(/{height}/g,f.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"vimeo":f=l(movie_width,movie_height),movie_id=pp_images[set_position];var t=/http(s?):\/\/(www\.)?vimeo.com\/(\d+)/,i=movie_id.match(t);movie="http://player.vimeo.com/video/"+i[3]+"?title=0&byline=0&portrait=0",settings.autoplay&&(movie+="&autoplay=1;"),vimeo_width=f.width+"/embed/?moog_width="+f.width,toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,f.height).replace(/{path}/g,movie);break;case"quicktime":f=l(movie_width,movie_height),f.height+=15,f.contentHeight+=15,f.containerHeight+=15,toInject=settings.quicktime_markup.replace(/{width}/g,f.width).replace(/{height}/g,f.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case"flash":f=l(movie_width,movie_height),flash_vars=pp_images[set_position],flash_vars=flash_vars.substring(pp_images[set_position].indexOf("flashvars")+10,pp_images[set_position].length),filename=pp_images[set_position],filename=filename.substring(0,filename.indexOf("?")),toInject=settings.flash_markup.replace(/{width}/g,f.width).replace(/{height}/g,f.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+"?"+flash_vars);break;case"iframe":f=l(movie_width,movie_height),frame_url=pp_images[set_position],frame_url=frame_url.substr(0,frame_url.indexOf("iframe")-1),toInject=settings.iframe_markup.replace(/{width}/g,f.width).replace(/{height}/g,f.height).replace(/{path}/g,frame_url);break;case"ajax":doresize=!1,f=l(movie_width,movie_height),doresize=!0,skipInjection=!0,e.get(pp_images[set_position],function(e){toInject=settings.inline_markup.replace(/{content}/g,e),$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject,s()});break;case"custom":f=l(movie_width,movie_height),toInject=settings.custom_markup;break;case"inline":myClone=e(pp_images[set_position]).clone().append('<br clear="all" />').css({width:settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo(e("body")).show(),doresize=!1,f=l(e(myClone).width(),e(myClone).height()),doresize=!0,e(myClone).remove(),toInject=settings.inline_markup.replace(/{content}/g,e(pp_images[set_position]).html())}imgPreloader||skipInjection||($pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject,s())}),!1},e.prettyPhoto.changePage=function(t){currentGalleryPage=0,"previous"==t?(set_position--,set_position<0&&(set_position=e(pp_images).size()-1)):"next"==t?(set_position++,set_position>e(pp_images).size()-1&&(set_position=0)):set_position=t,rel_index=set_position,doresize||(doresize=!0),settings.allow_expand&&e(".pp_contract").removeClass("pp_contract").addClass("pp_expand"),n(function(){e.prettyPhoto.open()})},e.prettyPhoto.changeGalleryPage=function(e){"next"==e?(currentGalleryPage++,currentGalleryPage>totalPage&&(currentGalleryPage=0)):"previous"==e?(currentGalleryPage--,currentGalleryPage<0&&(currentGalleryPage=totalPage)):currentGalleryPage=e,slide_speed="next"==e||"previous"==e?settings.animation_speed:0,slide_to=currentGalleryPage*itemsPerPage*itemWidth,$pp_gallery.find("ul").animate({left:-slide_to},slide_speed)},e.prettyPhoto.startSlideshow=function(){"undefined"==typeof P?($pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function(){return e.prettyPhoto.stopSlideshow(),!1}),P=setInterval(e.prettyPhoto.startSlideshow,settings.slideshow)):e.prettyPhoto.changePage("next")},e.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function(){return e.prettyPhoto.startSlideshow(),!1}),clearInterval(P),P=void 0},e.prettyPhoto.close=function(){$pp_overlay.is(":animated")||(e.prettyPhoto.stopSlideshow(),$pp_pic_holder.stop().find("object,embed").css("visibility","hidden"),e("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed,function(){e(this).remove()}),$pp_overlay.fadeOut(settings.animation_speed,function(){settings.hideflash&&e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","visible"),e(this).remove(),e(window).unbind("scroll.prettyphoto"),p(),settings.callback(),doresize=!0,v=!1,delete settings}))},!pp_alreadyInitialized&&t()&&(pp_alreadyInitialized=!0,hashIndex=t(),hashRel=hashIndex,hashIndex=hashIndex.substring(hashIndex.indexOf("/")+1,hashIndex.length-1),hashRel=hashRel.substring(0,hashRel.indexOf("/")),setTimeout(function(){e("a["+a.hook+"^='"+hashRel+"']:eq("+hashIndex+")").trigger("click")},50)),this.unbind("click.prettyphoto").bind("click.prettyphoto",e.prettyPhoto.initialize)}}(jQuery);var pp_alreadyInitialized=!1;(function ($) {
  var CountTo = function (element, options) {
    this.$element = $(element);
    this.options  = $.extend({}, CountTo.DEFAULTS, this.dataOptions(), options);
    this.init();
  };

  CountTo.DEFAULTS = {
    from: 0,               // the number the element should start at
    to: 0,                 // the number the element should end at
    speed: 1000,           // how long it should take to count between the target numbers
    refreshInterval: 100,  // how often the element should be updated
    decimals: 0,           // the number of decimal places to show
    formatter: formatter,  // handler for formatting the value before rendering
    onUpdate: null,        // callback method for every time the element is updated
    onComplete: null       // callback method for when the element finishes updating
  };

  CountTo.prototype.init = function () {
    this.value     = this.options.from;
    this.loops     = Math.ceil(this.options.speed / this.options.refreshInterval);
    this.loopCount = 0;
    this.increment = (this.options.to - this.options.from) / this.loops;
  };

  CountTo.prototype.dataOptions = function () {
    var options = {
      from:            this.$element.data('from'),
      to:              this.$element.data('to'),
      speed:           this.$element.data('speed'),
      refreshInterval: this.$element.data('refresh-interval'),
      decimals:        this.$element.data('decimals')
    };

    var keys = Object.keys(options);

    for (var i in keys) {
      var key = keys[i];

      if (typeof(options[key]) === 'undefined') {
        delete options[key];
      }
    }

    return options;
  };

  CountTo.prototype.update = function () {
    this.value += this.increment;
    this.loopCount++;

    this.render();

    if (typeof(this.options.onUpdate) == 'function') {
      this.options.onUpdate.call(this.$element, this.value);
    }

    if (this.loopCount >= this.loops) {
      clearInterval(this.interval);
      this.value = this.options.to;

      if (typeof(this.options.onComplete) == 'function') {
        this.options.onComplete.call(this.$element, this.value);
      }
    }
  };

  CountTo.prototype.render = function () {
    var formattedValue = this.options.formatter.call(this.$element, this.value, this.options);
    this.$element.text(formattedValue);
  };

  CountTo.prototype.restart = function () {
    this.stop();
    this.init();
    this.start();
  };

  CountTo.prototype.start = function () {
    this.stop();
    this.render();
    this.interval = setInterval(this.update.bind(this), this.options.refreshInterval);
  };

  CountTo.prototype.stop = function () {
    if (this.interval) {
      clearInterval(this.interval);
    }
  };

  CountTo.prototype.toggle = function () {
    if (this.interval) {
      this.stop();
    } else {
      this.start();
    }
  };

  function formatter(value, options) {
    return value.toFixed(options.decimals);
  }

  $.fn.countTo = function (option) {
    return this.each(function () {
      var $this   = $(this);
      var data    = $this.data('countTo');
      var init    = !data || typeof(option) === 'object';
      var options = typeof(option) === 'object' ? option : {};
      var method  = typeof(option) === 'string' ? option : 'start';

      if (init) {
        if (data) data.stop();
        $this.data('countTo', data = new CountTo(this, options));
      }

      data[method].call(data);
    });
  };
}(jQuery));
function forceForm(formObj){
	console.log(formObj,fomrObj.getAttribute('name'));
$(document).ready(function(){
var usertype=$('input[name=usertype]').attr('id');
var userid=$('input[name=usertype]').val();
var usermode="<input type=\"hidden\"name=\"usermode\" value=\""+usertype+"\">";
var uid="<input type=\"hidden\"name=\"uid\" value=\""+userid+"\">";	
var userdata=''+usermode+''+uid+'';
$(userdata).insertBefore('form[name='+formObj+'] input[name=entryvariant]').val();
});
}

$(document).ready(function(){
  	var pagedata=document.URL;
  	var pagedatatwo=pagedata.split(".");
 	var realpage=pagedatatwo[0];
	// var usertype=$('input[name=userdata]').attr('data-type');
	// var userid=$('input[name=userdata]').attr('value');
	$(document).on("blur",'input[type!=hidden][type!=button][type!=submit]',function(){
		$(this).removeClass('error-class');
	});
	$(document).on("blur",'select',function(){
		$(this).removeClass('error-class');
	});
	$(document).on("blur",'textarea',function(){
		$(this).removeClass('error-class');
	});
	$(document).on("mouseenter",'form #elementholder',function(){
		$(this).removeClass('error-class');
	});
	$(document).on("blur",'form[name^=edit] input[type!="file"][type!="button"][type!="submit"][type!="hidden"],form[name^=edit] textarea',function(){
		// tinymce.triggerSave();
		// console.log($(this));
		// curval=$(this).val();
		/*if(curval==""){
			// $(this).val("");
			// console.log("No Value");
			// $(this).get(0).defaultValue="";
		}*/
	})
$(document).on("click",'input[type=button]',function(){
	var viewwindow=$('#viewneditcontent');
	var buttonname=$(this).attr('name');
	var buttonid=$(this).attr('id');
	var tester="";
	
	if(buttonname=="adminloginsubmit"){
		var formstatus=true;
		var inputname1=$('input[name=username]').attr('value');
		var inputname2=$('input[name=password]').attr('value');
		if(inputname1==""){
			window.alert('Please enter the username number');
			$("input[name=username]").addClass('error-class').focus();
			formstatus= false;
		}else if(inputname2==""){
			window.alert('Please enter your password');
			$("input[name=password]").addClass('error-class').focus();
			formstatus= false;
		}
		if(formstatus==true){
			$('form[name=adminloginform]').submit();
		}		
	}



if(buttonname=="createbooking"){
var formstatus=true;
var inputname1=$('form[name=bookingform] input[name=name]');
var testervala=$('form[name=bookingform] input[name=name]').val();
	console.log(realpage,buttonname,testervala);
var inputname2=$('textarea[name=address]');
var inputname11=$('input[name=themetitle]');
var inputname3=$('input[name=contactperson]');
var inputname4=$('input[name=from]');
var inputname5=$('input[name=to]');
var inputname6=$('select[name=eventtype]');
var inputname7=$('select[name=language]');
var inputname8=$('input[name=expectedattendance]');
var inputname9=$('input[name=phone1]');
var inputname10=$('input[name=email]');
if(inputname1.val()==""){
	window.alert('Please give the organization\'s name');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname2.val()==""){
	window.alert('Please give the address of the organization');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}else if(inputname11.val()==""){
	window.alert('Please give the Theme/Title for the program');
	$(inputname11).addClass('error-class').focus();
	formstatus= false;
}else if(inputname3.val()==""){
	window.alert('Please fill the Contact Person field');
	$(inputname3).addClass('error-class').focus();
	formstatus= false;
}else if(inputname4.val()==""){
	window.alert('Please give the start date of the event');
	$(inputname4).addClass('error-class').focus();
	formstatus= false;
}else if(inputname5.val()==""){
	window.alert('Please give the ending date of the event');
	$(inputname5).addClass('error-class').focus();
	formstatus= false;
}else if(inputname6.val()==""){
	window.alert('Kindly Choose an Event Type in the presented categories');
	$(inputname6).addClass('error-class').focus();
	formstatus= false;
}else if(inputname7.val()==""){
	window.alert('Please choose a language from the selection');
	$(inputname7).addClass('error-class').focus();
	formstatus= false;
}else if(inputname8.val()==""){
	window.alert('Please state the expected attendance at the event');
	$(inputname8).addClass('error-class').focus();
	formstatus= false;
}else if(inputname9.val()==""){
	window.alert('Please give a contact number we can call when necessary');
	$(inputname9).addClass('error-class').focus();
	formstatus= false;
}else if(inputname10.val()==""){
	window.alert('Email address missing');
	$(inputname10).addClass('error-class').focus();
	formstatus= false;
}else if(inputname10!==""){
		var status=emailValidator(inputname10.val());
		status!==""?formstatus=status:status=status;
	}

if(formstatus==true){
	// window.alert('The form is ready to be submitted');
$('form[name=bookingform]').submit();
}
}


if(buttonname=="createservicerequest"){
	var formstatus=true;
	var inputname1=$('input[name=name]');
	var inputname2=$('input[name=organizationname]');
	var inputname3=$('input[name=team]');
	var inputname4=$('input[name=from]');
	var inputname5=$('input[name=to]');
	var inputname6=$('select[name=eventtype]');
	var inputname7=$('input[name=expectedattendance]');
	var inputname8=$('input[name=phone1]');
	var inputname9=$('textarea[name=venue]');
	if(inputname1.val()==""){
		window.alert('Please provide your fullname');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""&&inputname3.val()==""){
		window.alert('Please give the name of the organization or team');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname4.val()==""){
		window.alert('Please give the start date and duration of the event');
		$(inputname4).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname5.val()==""){
		window.alert('Please give the ending date and duration of the event');
		$(inputname5).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname6.val()==""){
		window.alert('Kindly Choose an Event Type in the presented categories');
		$(inputname6).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname7.val()==""){
		window.alert('Please state the expected attendance at the event');
		$(inputname7).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname8.val()==""){
		window.alert('Please give a contact number we can call when necessary');
		$(inputname8).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname9.val()==""){
		window.alert('Please give the address of the venue the event is expected to hold at.');
		$(inputname9).addClass('error-class').focus();
		formstatus= false;
	}

	if(formstatus==true){
		// window.alert('The form is ready to be submitted');
	 $('form[name=servicerequestform]').submit();
	}

}


if(buttonname=="fvtblogsubscriptiontwo"||buttonname=="fvtblogsubscription"){
	var formstatus=true;
	var inputname1=$('form[name='+buttonname+'] input[name=email]');
	if(inputname1.val()==""){
		window.alert('Please fill the email field with your email address then subscribe to this blog.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname1.val()!==""){
			var status=emailValidator(inputname1.val());
			status!==""?formstatus=status:status=status;
	}
	if(formstatus==true){
		window.alert('The form is ready to be submitted');
		$('form[name='+buttonname+']').submit();
	}
}
if(buttonname=="categorysubscription"){
	var formstatus=true;
	var inputname1=$('input[name=email]');
	if(inputname1.val()==""){
		window.alert('Please fill the email field with your email address then subscribe to this blog.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname1.val()!==""){
		var status=emailValidator(inputname1.val());
		status!==""?formstatus=status:status=status;
	}
	if(formstatus==true){
		// window.alert('The form is ready to be submitted');
		$('form[name=categorysubscription]').submit();
	}
}
if(buttonname=="createtestimony"){
	var formstatus=true;
	var inputname1=$('input[name=name]');
	var inputname2=$('form[name=testimonyform] input[name=email]');
	var inputname3=$('textarea[name=testimony]');
	if(inputname1.val()==""){
		window.alert('Please provide your fullname');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please fill the email address field.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
		window.alert('Please give your testimony');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()!==""){
			var status=emailValidator(inputname2.val());
			formstatus=status;
	}
		// console.log(status);
	if(formstatus==true){
		var tester=window.confirm('The form is ready to be submitted click ok to continue or cancel to review');
	if(tester===true){
	$('form[name=testimonyform]').submit();
	}
	}
}

if(buttonname=="createblogcomment"){
	var formstatus=true;
	var inputname1=$('input[name=name]');
	var inputname2=$('input[name=email]');
	var inputname4=$('input[name=sectester]');
	var inputname5=$('input[name=secnumber]');

	tinyMCE.triggerSave();
	var inputname3=$('textarea[name=comment]');
	console.log(inputname3.val());
	if(inputname1.val()==""){
		window.alert('Please provide your fullname');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please fill the email address field.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
		window.alert('You haven\'t given any comment');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname5.val()==""){
		window.alert('Please enter the security number');
		$(inputname5).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname4.val()!==inputname5.val()){
		window.alert('Sorry the security number is not correct.');
		$(inputname5).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()!==""){
			var status=emailValidator(inputname2.val());
			formstatus=status;
	}
		// console.log(status);
	if(formstatus==true){
		var confirmed=window.confirm('Your comment is ready to be submitted, it would be reviewed before being activated for this blog post, if you dont want to comment click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
			$('form[name=blogcommentform]').submit();
		}
	}
}

if(buttonname=="createblogtype"){
	var formstatus=true;
	var inputname1=$('input[name=name]');
	var inputname2=$('textarea[name=description]');
	if(inputname1.val()==""){
		window.alert('Please fill the name field.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please give a description for the blog.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}
		// console.log(status);
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
			$('form[name=blogtype]').submit();
		}
	}
}

if(buttonname=="createblogcategory"){
	var formstatus=true;
	var inputname1=$('select[name=categoryid]');
	var inputname2=$('input[name=name]');
	var inputname3=$('input[name=profpic]');
	var inputname4=$('input[name=subtext]');

	if(inputname1.val()==""){
		window.alert('Please select a blog type.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please fill the category name field.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname1.val()=="3"&&inputname3.val()==""){
		window.alert('Please select a category image for this, endeavour to make sure your image dimension is not too large i.e greater than 1280 on both width and length.');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname1.val()=="3"&&inputname4.val()==""){
		window.alert('Please state the subtext of the category.');
		$(inputname4).addClass('error-class').focus();
		formstatus= false;
	}
		// console.log(status);
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
			$('form[name=blogcategory]').submit();
		}
	}
}
if(buttonname=="createblogpost"){
	var formstatus=true;
	var monitor="off";
	tinyMCE.triggerSave();
	var inputname1=$('select[name=blogtypeid]');
	var inputname2=$('select[name=blogcategoryid]');
	var inputname3=$('input[name=profpic]');
	var inputname4=$('input[name=title]');
	var inputname5=$('textarea[name=introparagraph]');
	var inputname6=$('textarea[name=blogentry]');
	var inputname7=$('select[name=blogentrytype]');
	var inputname8=$('input[name=bannerpic]');
	var inputname9=$('select[name=audiotype]');
	var inputname10=$('input[name=audio]');
	var inputname11=$('textarea[name=audioembed]');
	var inputname12=$('select[name=videotype]');
	var inputname13=$('input[name=videoflv]');
	var inputname14=$('input[name=videomp4]');
	var inputname15=$('input[name=video3gp]');
	var inputname17=$('input[name=videowebm]');
	var inputname16=$('textarea[name=videoembed]');

	if(inputname1.val()==""){
		window.alert('Please select a blog type.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please select the category for this blog post.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""&&(inputname7.val()==""||inputname7.val()=="normal"||inputname7.val()=="audio"||inputname7.val()=="video")){
		window.alert('Please select a cover image for this post, endeavour to make sure your image dimension is not too large i.e greater than 1280 on both width and length.');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname4.val()==""){
		window.alert('Please the title of the blog post, adviceably, make the title as close to what a web user would search for when looking for the content you want to post.');
		$(inputname4).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname5.val()==""&&(inputname7.val()==""||inputname7.val()=="normal"||inputname7.val()=="audio"||inputname7.val()=="video")){
		window.alert('Please give the introductory part of this blog, this could be a short summary of the contents of the blog, something to make your reader have an understanding of your post there in or to make them actually want to continue reading. click cancel if you want to continue');
		$(inputname5).addClass('error-class').focus();
		formstatus= false;		
		monitor="on";
	}else if(inputname6.val()==""&&(inputname7.val()==""||inputname7.val()=="normal"||inputname7.val()=="audio"||inputname7.val()=="video")){
		window.alert('Please give the blog post some meaning, its empty');
		$(inputname6).addClass('error-class').focus();
		formstatus= false;	
		monitor="on";	
	}else if(inputname8.val()==""&&inputname7.val()=="banner"){
		window.alert('Please give the banner image');
		$(inputname8).addClass('error-class').focus();
		formstatus= false;
		monitor="on";
	}else if (inputname9.val()==""&&inputname7.val()=="audio") {
		window.alert('Please select the nature of the audio entry you wnat dislplayed for this post.');
		$(inputname9).addClass('error-class').focus();
		formstatus= false;
		monitor="on";
	}else if (inputname12.val()==""&&inputname7.val()=="video") {
		window.alert('Please select the nature of the video entry you wnat dislplayed for this post.');
		$(inputname12).addClass('error-class').focus();
		formstatus= false;
		monitor="on";
	}


	// check mp3 audio
	if(monitor=="off" && inputname10.val()!==""){
		var videoout=getExtension(inputname10.val());
		if(videoout['extension']!=="mp3"){
			window.alert('Please select a valid mp3 audio');
			$(inputname10).addClass('error-class').focus();
			formstatus= false;
			monitor="on";
		}
	}
	// check flv video
	if(monitor=="off" && inputname13.val()!==""){
		var videoout=getExtension(inputname13.val());
		if(videoout['extension']!=="flv"){
			window.alert('Please select a valid flv video');
			$(inputname13).addClass('error-class').focus();
			formstatus= false;
			monitor="on";
		}
	}

	// check mp4 video
	if(monitor=="off" && inputname14.val()!==""){
		var videoout=getExtension(inputname14.val());
		if(videoout['extension']!=="mp4"){
			window.alert('Please select a valid mp4 video');
			$(inputname14).addClass('error-class').focus();
			formstatus= false;
			monitor="on";
		}
	}
	// check 3gp video
	if(monitor=="off" && inputname15.val()!==""){
		var videoout=getExtension(inputname15.val());
		if(videoout['extension']!=="3gp"&&videoout['extension']!=="3gpp"){
			window.alert('Please select a valid 3gp video');
			$(inputname15).addClass('error-class').focus();
			formstatus= false;
			monitor="on";
		}
	}
	// check webm video
	if(monitor=="off" && inputname17.val()!==""){
		var videoout=getExtension(inputname17.val());
		if(videoout['extension']!=="webm"){
			window.alert('Please select a valid webm video');
			$(inputname17).addClass('error-class').focus();
			formstatus= false;
			monitor="on";
		}
	}
	if(monitor=="off"&&inputname7.val()=="video"&&inputname13.val()==""&&inputname14.val()==""&&inputname15.val()==""&&inputname16.val()==""&&inputname17.val()==""){
		window.alert('No file or embed code detected');
		$(inputname13).addClass('error-class').focus();
		formstatus= false;
		monitor="on";
	}
	if(monitor=="off"&&inputname7.val()=="audio"&&inputname10.val()==""&&inputname11.val()==""){
		window.alert('No file or embed code detected');
		$(inputname10).addClass('error-class').focus();
		formstatus= false;
		monitor="on";
	}
		// console.log(status);
	if(formstatus==true){
		var confirmed=window.confirm('The post is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
			// console.log(confirmed,$('form[name=blogpost]'));
			$('form[name=blogpost]').submit();
		}
	}
}
if(buttonname=="unsubscribe"){
var formstatus=true;
var inputname1=$('input[name=email]');
if(inputname1.val()==""){
window.alert('Please fill the email address field.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname1.val()!==""){
var status=emailValidator(inputname1.val());
		status!==""?formstatus=status:status=status;
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check or are unsure you want to cancel your subscription, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	// console.log(confirmed,$('form[name=blogpost]'));
$('form[name=unsubscribe]').submit();
	}
}
}

if(buttonname=="createqotd"){
	var formstatus=true;
	var inputname1=$('select[name=quotetype]');
	var inputname2=$('input[name=quotedperson]');
	var inputname3=$('textarea[name=quoteoftheday]');
	if(inputname1.val()==""){
		window.alert('Please Select the Quotetype to help the application know where this quote can show.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
	window.alert('Please give the quote information the field is empty .');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check or are unsure you want to cancel your subscription, click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
		// console.log(confirmed,$('form[name=qotd]'));
	$('form[name=qotdform]').submit();
		}
	}
}

if(buttonname=="createevent"||buttonname=="editevent"){
	var formname=$(this).attr("data-formdata");
	console.log("the form data - ",formname);
	var formit=submitCustom(formname);
	var formstatus=formit['formstatus'];
	var pointmonitor=formit['pointmonitor'];

	if(formstatus==true&&pointmonitor==false){
	    var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	    // console.log(confirmed);
	    if(confirmed===true){
	      $('form[name='+formname+']').attr("onSubmit","return true").submit();
	    }else{
	      $('form[name='+formname+']').attr("onSubmit","return false");
	    }
	}
}

if(buttonname=="gallerystream"||buttonname=="editgallerystream"){
	var formname=$(this).attr("data-formdata");
	console.log("the form data - ",formname);
	var formit=submitCustom(formname);
	var formstatus=formit['formstatus'];
	var pointmonitor=formit['pointmonitor'];

	if(formstatus==true&&pointmonitor==false){
	    var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	    // console.log(confirmed);
	    if(confirmed===true){
	      $('form[name='+formname+']').attr("onSubmit","return true").submit();
	    }else{
	      $('form[name='+formname+']').attr("onSubmit","return false");
	    }
	}
}

if(buttonname=="creategallery"){
var formstatus=true;
var inputname1=$('input[name=gallerytitle]');
var inputname2=$('textarea[name=gallerydetails]');

if(inputname1.val()==""){
window.alert('Please give the gallery title.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname2.val()==""){
window.alert('Please give the gallery details.');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	$('form[name=galleryform]').submit();
	}
}
}

if(buttonname=="createtrendingtopic"){
var formstatus=true;
var inputname1=$('input[name=name]');
var inputname2=$('input[name=profpic]');
if(inputname1.val()==""){
window.alert('Please give the trending topic title.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname2.val()==""){
window.alert('Please give the topic cover photo.');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	$('form[name=trendingtopicform]').submit();
	}
}
}

if(buttonname=="createtoptenplaylist"){
var formstatus=true;
var inputname1=$('input[name=title]');
var inputname2=$('input[name=artist]');
var inputname3=$('input[name=profpic]');
var inputname4=$('input[name=music]');
if(inputname1.val()==""){
window.alert('Please give the song title.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname2.val()==""){
window.alert('Please give the artiste\'s name.');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}else if(inputname3.val()==""){
window.alert('Please give the album art/album cover photo.');
	$(inputname3).addClass('error-class').focus();
	formstatus= false;
}else if(inputname4.val()==""){
window.alert('Choose a mp3 audio file to upload.');
	$(inputname4).addClass('error-class').focus();
	formstatus= false;
}else if(inputname4.val()!==""){
var output=getExtension(inputname4.val());
console.log(output['type'],output['extension']);
if(output['extension']!=="mp3"||output['type']!=="audio"){
window.alert('Choose a valid mp3 audio file to upload.');
$(inputname4).addClass('error-class').focus();
formstatus= false;
}
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	$('form[name=toptenplaylistform]').submit();
	}
}
}

if(buttonname=="createtopaudio"){
var formstatus=true;
var inputname1=$('input[name=title]');
var inputname4=$('input[name=music]');
if(inputname1.val()==""){
window.alert('Please give the episode title.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}/*else if(inputname2.val()==""){
window.alert('Please give the artiste\'s name.');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}else if(inputname3.val()==""){
window.alert('Please give the album art/album cover photo.');
	$(inputname3).addClass('error-class').focus();
	formstatus= false;
}*/else if(inputname4.val()==""){
window.alert('Choose a mp3 audio file to upload.');
	$(inputname4).addClass('error-class').focus();
	formstatus= false;
}else if(inputname4.val()!==""){
var output=getExtension(inputname4.val());
console.log(output['type'],output['extension']);
if(output['extension']!=="mp3"||output['type']!=="audio"){
window.alert('Choose a valid mp3 audio file to upload.');
$(inputname4).addClass('error-class').focus();
formstatus= false;
}
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	$('form[name=topaudioform]').submit();
	}
}
}

if(buttonname=="createadvert"){
var formstatus=true;
var inputname1=$('select[name=advertpage]');
var inputname2=$('select[name=adverttype]');
var inputname3=$('input[name=advertowner]');
var inputname4=$('input[name=adverttitle]');
var inputname5=$('input[name=advertlandingpage]');
var inputname6=$('input[name=profpic]');
if(inputname1.val()==""){
	window.alert('Please select the page this advert will show up on.');
	$(inputname1).addClass('error-class').focus();
	formstatus= false;
}else if(inputname2.val()==""){
window.alert('Choose an advert type');
	$(inputname2).addClass('error-class').focus();
	formstatus= false;
}else if(inputname3.val()==""){
	window.alert('State the owner of the advert');
	$(inputname3).addClass('error-class').focus();
	formstatus= false;
}else if(inputname4.val()==""){
	window.alert('Give the title for the advert');
	$(inputname4).addClass('error-class').focus();
	formstatus= false;
}else if(inputname5.val()==""){
	window.alert('Please give the complete url of the landing page for this advert');
	$(inputname5).addClass('error-class').focus();
	formstatus= false;
}else if(inputname6.val()==""){
window.alert('Choose a file to upload for this advert.');
	$(inputname6).addClass('error-class').focus();
	formstatus= false;
}else if(inputname6.val()!==""){
var output=getExtension(inputname6.val());
if(inputname2.val()=="videoadvert"){
if(output['extension']!=="mp4"||output['type']!==""){
window.alert('Choose a valid mp4 video file to upload.');
$(inputname6).addClass('error-class').focus();
formstatus= false;
}
}
// console.log(output['type'],output['extension']);
}
if(formstatus==true){
	var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
	console.log(confirmed);
	if(confirmed===true){
	$('form[name=advertform]').submit();
	}
}
}



if(buttonname=="submitintro"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('textarea[name=intro]');
	var inputname2=$('textarea[name=maintitle]');

	if(inputname1.val()==""){
	window.alert('Please provide the introductory part of this page.');
		$(inputname1).addClass('alerterror').focus();
		formstatus= false;
	}/*else if(inputname2.val()==""){
	window.alert('Please give the gallery details.');
		$(inputname2).addClass('alerterror').focus();
		formstatus= false;
	}*/
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name=introform]').attr("onSubmit","return true").submit();
		}
	}
}
/*generaldata module section*/
if(buttonname=="submituser"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('input[name=username]');
	var inputname2=$('input[name=password]');
	var inputname3=$('select[name=accesslevel]');
	var inputname4=$('input[name=fullname]');

	if(inputname1.val()==""){
	window.alert('Please provide the username.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
	window.alert('Please give the password.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
	window.alert('Please select the access level.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname4.val()==""){
	window.alert('Provide the name of this user.');
		$(inputname4).addClass('error-class').focus();
		formstatus= false;
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name=userform]').attr("onSubmit","return true").submit();
		}
	}
}

if(buttonname=="submitcontent"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('form[name=contentform] input[name=contenttitle]');
	var inputname2=$('form[name=contentform] textarea[name=contentpost]');
	var inputname3=$('form[name=contentform] input[name=maintype]');

	if(inputname1.val()==""&&inputname3.val()!=="productservices"){
		window.alert('Please provide the introductory part of this page/post.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""&&inputname3.val()!=="productservices"){
	window.alert('Please provide the content for this entry.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name=contentform]').attr("onSubmit","return true").submit();
		}
	}
}
if(buttonname=="submitcontent2"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('form[name=contentform] input[name=contenttitle]');
	var inputname2=$('form[name=contentform] textarea[name=contentpost]');
	var inputname3=$('form[name=contentform] input[name=contentpic]');

	if(inputname1.val()==""){
	window.alert('Please provide the title of the unit/branch.');
		$(inputname1).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
	window.alert('Please provide the details for this unit/branch.');
		$(inputname2).addClass('error-class').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
		window.alert('Please provide the image you want to use to represent this unit.');
		$(inputname3).addClass('error-class').focus();
		formstatus= false;
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name=contentform]').attr("onSubmit","return true").submit();
		}
	}
}
if(buttonname=="submitcustom"){
	var formstatus=true;
	tinyMCE.triggerSave();
	// var parentel=$(this).parent().parent().attr("name");
	var truename=$(this).attr("data-formdata");
	if(truename===null||truename===undefined||truename===NaN){
		var truename="contentform";
	}
	var inputname0=$('form[name='+truename+'] input[name=errormap]');
	var inputname01=$('form[name='+truename+'] input[name=coverid]');
	var inputname1=$('form[name='+truename+'] input[name=contenttitle]');
	var inputname2=$('form[name='+truename+'] input[name=contentpic]');
	var inputname3=$('form[name='+truename+'] textarea[name=contentintro]');
	var inputname7=$('form[name='+truename+'] textarea[name=intro]');
	var inputname4=$('form[name='+truename+'] textarea[name=contentpost]');
	var inputname5=$('form[name='+truename+'] input[name=monitorcustom]');
	var inputname6=$('form[name='+truename+'] input[name=contentsubtitle]');
	if(inputname5.val()!==""&&inputname5.val()!=="nomonitor"&&typeof(inputname5)!=="undefined"){
		var pdata=inputname5.val();
		var pdataout=pdata.split(":");
		for(var i=0;i<pdataout.length;i++){
			if(pdataout[i]==1){
				if(inputname1.val()==""){

					// window.alert('Please provide the title of the entry.');
					if(typeof(inputname1.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname1.attr('data-errmsg');
					}else{
						errmsg="Please provide the title of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname1).addClass('error-class').focus();
			        });
					// $(inputname1).addClass('error-class').focus();
					formstatus= false;
					break;
				}
			}else if(pdataout[i]==5){
				if(inputname6.val()==""){
					if(typeof(inputname6.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname6.attr('data-errmsg');
					}else{
						errmsg="Please provide the sub-title of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname6).addClass('error-class').focus();
			        });
					formstatus= false;
					break;
				}
			}else if (pdataout[i]==2) {
				if(inputname2.val()==""&&inputname01.val()<1){
					if(typeof(inputname2.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname2.attr('data-errmsg');
					}else{
						errmsg="Please provide the image of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname2).addClass('error-class').focus();
			        });
					formstatus= false;
					break;
				}else if(inputname2.val()!==""){
					var slideout=getExtension(inputname2.val());
					if(slideout['type']!=="image"){
						var errmsg="Provide a valid Image file";
						raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
				        $("#mainPageModal").on("hidden.bs.modal", function () {
				            $(inputname2).addClass('error-class').focus();
				        });
						formstatus= false;
						break;
					}
				}
			}else if (pdataout[i]==3) {
				if(inputname3.val()==""){
					if(typeof(inputname3.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname3.attr('data-errmsg');
					}else{
						errmsg="Please provide the intro of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname3).addClass('error-class').focus();
			            var mcetester=$(inputname3).attr("data-mce");
			 			if(mcetester===null||mcetester===undefined||mcetester===NaN){ var mcetester="";}
			 			if(mcetester=="true"){
				            var mcid=$(inputname3).attr("id");
							tinyMCE.get(mcid).focus();
			 			}
			        });
					formstatus= false;
					break;
				}else if(inputname7.val()==""){
					if(typeof(inputname7.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname7.attr('data-errmsg');
					}else{
						errmsg="Please provide the intro of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname7).addClass('error-class').focus();
			            var mcetester=$(inputname7).attr("data-mce");
			 			if(mcetester===null||mcetester===undefined||mcetester===NaN){ var mcetester="";}
			 			if(mcetester=="true"){
				            var mcid=$(inputname7).attr("id");
							tinyMCE.get(mcid).focus();
			 			}
			        });
					formstatus= false;
					break;
				}
			}else if (pdataout[i]==4) {
				if(inputname4.val()==""){
					if(typeof(inputname4.attr('data-errmsg'))!=="undefined"){
						errmsg=inputname4.attr('data-errmsg');
					}else{
						errmsg="Please provide the content details of the entry."
					}
					raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
			        $("#mainPageModal").on("hidden.bs.modal", function () {
			            $(inputname4).addClass('error-class').focus();
			            var mcetester=$(inputname4).attr("data-mce");
			 			if(mcetester===null||mcetester===undefined||mcetester===NaN){ var mcetester="";}
			 			if(mcetester=="true"){
				            var mcid=$(inputname4).attr("id");
							tinyMCE.get(mcid).focus();
			 			}
			        });
					formstatus= false;
					break;
				}
			}

		}
	}else if(inputname5.val()=="nomonitor"){
		formstatus=true;
	}else /*if(inputname5.val()=="")*/{
		if(inputname1.val()==""){
			window.alert('Please provide the title of the entry.');
			$(inputname1).addClass('error-class').focus();
			formstatus= false;
		}if(inputname6.val()==""){
			window.alert('Please provide the sub-title of the entry.');
			$(inputname6).addClass('error-class').focus();
			formstatus= false;
		}else if(inputname3.val()==""){
			window.alert('Please provide the little details for this entry.');
			$(inputname3).addClass('error-class').focus();
			formstatus= false;
		}else if(inputname2.val()==""){
			window.alert('Please provide the image for this entry.');
			$(inputname2).addClass('error-class').focus();
			formstatus= false;
		}else if(inputname4.val()==""){
			window.alert('Please provide the content for this entry.');
			$(inputname4).addClass('error-class').focus();
			formstatus= false;
		}
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name='+truename+']').attr("onSubmit","return true").submit();
		}
	}
}
if(buttonname=="createevent"){
	
}
if(buttonname=="submitcustomtwo"){
	// var tester="[1,2,3,4,5,6]";
	// get the current values in the square brackets
    // var out=/[^\[\]]+/i.exec(tester);
	var formstatus=true;
	var pointmonitor=false;
	tinyMCE.triggerSave();
	var formname=typeof($(this).attr('data-formdata'))!=="undefined"?$(this).attr('data-formdata'):"contentform";
	// var formname=typeof($('input[name=formdata]'))!=="undefined"?$('input[name=formdata]').val():"contentform";
	// obtain
	var errormap=$('form[name='+formname+'] input[name=errormap]');
	var multierror=$('form[name='+formname+'] input[name=multierrormap]');
	var extraformdata=$('form[name='+formname+'] input[name=extraformdata]');
	var inputname1=$('form[name='+formname+'] input[name=contenttitle]');
	var inputname2=$('form[name='+formname+'] input[name=contentpic]');
	var inputname3=$('form[name='+formname+'] textarea[name=contentintro]');
	var inputname4=$('form[name='+formname+'] textarea[name=contentpost]');
	var inputname5=$('form[name='+formname+'] input[name=monitorcustom]');
	// if(){}


	console.log("Running validator."," Running eformdata",extraformdata.val()," Running errormap",errormap.val());	
	if(typeof(extraformdata.val())!=="undefined"&&extraformdata.val()!==""&&typeof(errormap.val())!=="undefined"&&errormap.val()!==""){
		console.log("Running First steps..."," Form:- ",formname);	
		var efdstepone=extraformdata.val().split("<|>");
		var emstepone=errormap.val().split("<|>");
		if(efdstepone.length==emstepone.length){
			// group counter variable keeping track of disabled content
			var groupcounter=0;
			for(var i=0;i<efdstepone.length;i++){
				// begin division of current values
				// get current extraformdata
				var curgroup=efdstepone[i];
				
				// get current errormap
				var errgroup=emstepone[i];
				var errcontentout="";
				var finalgroup=[];
				var finalreqgroup=[];
				if(curgroup.indexOf("egroup|data")>-1){
					groupcounter++;					
					// multiple data focus section, here validation is done
					// on a grouped set of elements
	 				var subgroup=curgroup.split("egroup|data-:-");
	 				var suberrgroup=errgroup.split("egroup|data-:-");
	 				// console.log("Suberror group before: ",suberrgroup);
	 				var suberrgroupdata=/[^\[\]]+/i.exec(suberrgroup[1]);
	 				// suberrgroupdata=suberrgroupdata[1];
	 				// divide the subgroups further into fielddata and requirement data
	 				// also extradata block
	 				// for error checking content
	 				// console.log("Subgroup before split: ",subgroup," Replaced data", subgroup[0].replace(/\n*/g,""));
	 				subgroup=subgroup[1].split("-:-");
	 				var reqdata=subgroup[1];
	 				// console.log("Subgroup after split: ",subgroup);

	 				var fielddata=/[^\[\]]+/ig.exec(subgroup[0]);
	 				// console.log("Field data: ",fielddata[0].replace(/[\n\r]+/g,""));
	 				fielddata=fielddata[0].replace(/[\n\r]+/g,"").replace(/\s{1,}/g, '').split(">|<");
	 				
	 				// trap a third layer of content from the field data obtained
	 				// this represents the sub content that defines that the 
	 				// current entry is related to the value of another field
	 				var subfielddataone=[];
	 				if(subgroup.length>2){
	 					subfielddataone=/[^\[\]]+/ig.exec(subgroup[2]);
	 					subfielddataone=subfielddataone[0].replace(/[\n\r]+/g,"").replace(/\s{1,}/g, '').split(">|<");
	 				}
	 				// get the name of the current counter element from the array
					var ccelem=fielddata.shift();
					var valset="";
					var compulsoryoutput='';
					var valcount="";
					var ccount=0;
					
					// console.log("Countelement value: ",ccount,"Countelement: ",ccelem);
					if(ccelem!=="" &&isNumber($('form[name='+formname+'] input[name='+ccelem+']').val())){
						ccount=$('form[name='+formname+'] input[name='+ccelem+']').val();
			            valset=$('form[name='+formname+'] input[name='+ccelem+']').attr("data-valset");
			            valcount=$('form[name='+formname+'] input[name='+ccelem+']').attr("data-valcount");
						if(valset===null||valset===undefined||valset===NaN){
							valset="";
			            }
			            
			            if(valcount===null||valcount===undefined||valcount===NaN){
							valcount=1;
			            }else{
			            	valcount=Math.floor(valcount);
			            }
					}	
					
	 				
	 				// get the fieldata groups in the form of fieldname-|-fieldtype
	 				// fielddata=fielddata.split(">|<");
	 				// get the errormsg data
	 				suberrgroupdata=suberrgroupdata[0].split(">|<");
	 				// console.log("Suberror group after further split: ",suberrgroupdata);	 				
	 				// verify the nature of the validation requirements for the group

	 				// loop through each field set and get the fieldname seperate of its
	 				// type
	 				var dogroupfall="";
	 				var evalvardefns="";
	 				var evalcontent="";
	 				for(var x=0;x<fielddata.length;x++){
	 					// put current value in a local easy to use variable
	 					var curfielddata=fielddata[x].split("-|-");
	 					var fieldname=curfielddata[0];
	 					var fieldtype=curfielddata[1];
	 					// for edit forms, this will be used to test if the entry
	 					// being validated should be ignored or not
	 					// by default, the delete element has only one possible value hence
	 					// validation can commence when it has no value
	 					var conditionstatusblock="";
	 					
	 					//tells of the field expects a valid kind of input
	 					// e.g 'image' would signify any valid image is passed
	 					// office for valid office files , video, audio
	 					// pdf for pdf e.t.c 
	 					var fieldentrytype="";
	 					// tests against a valid extension for the fieldentrytype 
	 					var fieldextension="";
	 					// variable holds further validation content for current field
	 					var extendvalidationblock="";

	 					var vcblock_main="";
	 					var vcinit_main="";
	 					
	 					// variable for holding filetype check and extension validation data
	 					var preinit="";
	 					if(fieldtype.indexOf("|")>-1){
	 						// this is done for mainly file based fields that need content checked
	 						var fieldtypedata=fieldtype.split("|");
	 						fieldtype=fieldtypedata[0];
	 						fieldentrytype=fieldtypedata[1];
	 						var fecblock="";
	 						if(fieldtypedata.length>2){
		 						fieldextension=fieldtypedata[2];
		 						if(fieldextension.indexOf(",")>-1){
		 							var efetype=fieldextension.split(",");
		 							for(var tt=0;tt<efetype.length;tt++){
		 								curfetype=efetype[tt];
			 							fecblock+=fecblock==""?'||(checkout[\'extension\']!=="'+curfetype+'"':'&&checkout[\'extension\']!=="'+curfetype+'"';
			 							if (tt==efetype.length-1) {
			 								fecblock+=")";
			 							};
		 							}
		 						}else{
		 							fecblock='||checkout[\'extension\']!=="'+fieldextension+'"';
		 						}
		 						// console.log(fieldextension,fecblock);

	 						}
	 						// create attachment condition block
	 						preinit='if('+fieldname+'.val()!==""&&formstatus==true&&pointmonitor==false){'+
	 								'var checkout=getExtension('+fieldname+'.val());'+
									'if(checkout[\'type\']!=="'+fieldentrytype+'"'+fecblock+'){'+
									'	window.alert(checkout[\''+fieldentrytype+'errormsg\']);'+
									'	$('+fieldname+').addClass(\'error-class\').focus();'+
									'	formstatus= false;'+
									'	pointmonitor=true;'+
									'}'+
 								'}';
	 					}
	 					var errmsgout=suberrgroupdata[x].replace(/[\n\r]+/g,"").replace(/\s{2,}/g, ' ');
	 					finalgroup[x]=[];
	 					// store the key as a value with the field name as the value
	 					finalgroup[''+fieldname+'']=x;
	 					finalgroup[x]['fieldname']=fieldname;
	 					finalgroup[x]['fieldtype']=fieldtype;
	 					finalgroup[x]['fieldentrytype']=fieldentrytype;
	 					finalgroup[x]['fieldextension']=fieldextension;
	 					finalgroup[x]['fieldcextra']=preinit;
	 					finalgroup[x]['errmsg']=errmsgout;
	 					finalgroup[x]['errtestdata']="";
	 					if(fieldentrytype!==""){
	 						// check to see if the entrype is a file
	 						vcinit_main+='var '+fieldname+'_edittype=$('+fieldname+').attr("data-edittype");\r\n'+
	 							'if('+fieldname+'_edittype===null||'+fieldname+'_edittype===undefined||'+fieldname+'_edittype===NaN){\r\n'+
								'	'+fieldname+'_edittype="";\r\n'+
					            '}'; 
 							finalgroup[x]['errtestdata']='&&'+fieldname+'_edittype==""';
	 					}
	 					// carries validation content at the errtestmsg level

	 					// carries validation variable initalisation and condition 
	 					// block based information
	 					finalgroup[x]['vcblock']=vcblock_main;
	 					finalgroup[x]['vcinit']=vcinit_main;

	 				}

	 				// create compulsory data set and force them into the vcinit portion
	 				// of the finalgroup data set
	 				if(valset!==""){
	 					var valcontent=valset.split(",");
		 				var fc=1;
		 				var cvaltotalset='';
						cvaltotalset+='var compulsorymsgout="Please, there is a group set of data with expected number of entries \\"'+valcount+'\\" that has not been completed.'+
 						'<br> After you close this error field the group would be focused on. Please make sure you fill in data in the group-set accordingly.<br>'+
 						'For example, if the expected number of entries is \'2\', this means that you must provide at least 2 entries for the set, and they must be provided '+
 						'in direct order in the form, so skipping say set 2 to fill set 3 will create an error'+
 						'even though 2 entries (Set 1 and Set 3) have been provided.<br> Hope this helps, if you do not understand, contact the developer of this application for '+
 						'clarification";'+
 						'var cparelemcount=$("form[name='+formname+'] input[name='+ccelem+']").val();';
	 					
		 				var cvalinitset='';
		 				var brco='';
	 					for(var wi = 0; wi < Math.floor(valcount); wi++){
				 			var pt=wi+1;
		 					var cvalcoset='';
			 				for (var vi = 0; vi < valcontent.length; vi++) {
			 					if(isNumber(Math.floor(valcontent[vi]))&&Math.floor(valcontent[vi])>0){
				 					var cgd=Math.floor(valcontent[vi])-1;
				 					var tv=vi+1;
				 					if(vi==0){
				 						// set the focus group element counter
				 						fc=tv;
				 					}
				 					cvalinitset+='var cvalinitset'+tv+''+pt+'=$("form[name='+formname+'] '+finalgroup[cgd]['fieldtype']+'[name='+finalgroup[cgd]['fieldname']+''+pt+']");var cvalinitsetcval'+tv+''+pt+'="";if(cvalinitset'+tv+''+pt+'===null||cvalinitset'+tv+''+pt+'===undefined||cvalinitset'+tv+''+pt+'===NaN){ cvalinitsetcval="";}else{ cvalinitsetcval'+tv+''+pt+'=cvalinitset'+tv+''+pt+'.val();}';
				 					cvalcoset+=vi==0?'cvalinitsetcval'+tv+''+pt+'==""':'&&cvalinitsetcval'+tv+''+pt+'==""';

			 					}
			 				};
			 				// console.log("Initset - ",cvalinitset," Condition set - ",cvalcoset," Counter - ",pt);
			 				if((wi==0&&brco==""&&cvalcoset!=="")||(wi>0&&brco==""&&cvalcoset!=="")){
			 					brco="on";
		 						cvaltotalset+='if('+cvalcoset+'){'+
			 						'	formstatus=false;pointmonitor=true; raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');'+
			 						'	$("#mainPageModal").on("hidden.bs.modal", function () {'+
			 						'		var mcetester=$(cvalinitset'+fc+''+pt+').attr("data-mce");'+
			 						'		if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}'+
			 						'		 if(mcetester=="true"){'+
									'			var mcid=$(cvalinitset'+fc+''+pt+').attr("id");'+
									'			tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/'+
									'		}else{'+
									'			$(cvalinitset'+fc+''+pt+').addClass(\'error-class\').focus();'+
									'		}'+
									'	});	'+
			 						'}';
			 				}else if(wi>0&&brco=="on"&&cvalcoset!==""){
			 					cvaltotalset+='else if('+cvalcoset+'){'+
			 						'	formstatus=false;pointmonitor=true; raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');'+
			 						'	$("#mainPageModal").on("hidden.bs.modal", function () {'+
			 						'		var mcetester=$(cvalinitset'+fc+''+pt+').attr("data-mce");'+
			 						'		if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}'+
			 						'		 if(mcetester=="true"){'+
									'			var mcid=$(cvalinitset'+fc+''+pt+').attr("id");'+
									'			tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/'+
									'		}else{'+
									'			$(cvalinitset'+fc+''+pt+').addClass(\'error-class\').focus();'+
									'		}'+
									'	});	'+
			 						'}';
			 				}
		 					var penultm8=pt-1;
	 					}
	 					// final cvaltotalset, here, the count of entries is tallied and 
	 					// an error raised if the count doesnt match the expected number of entries
	 					if(cvaltotalset!==""){
	 						cvaltotalset=''+cvalinitset+''+cvaltotalset+'';
				 			cvaltotalset+='else if(cparelemcount<'+valcount+'){'+
			 						'	var curerror="Sorry, the minimum number of expected entries is: '+valcount+' current detected is: \"+cparelemcount+\" Please add more entries"; formstatus=false;pointmonitor=true; raiseMainModal(\'Form error!!\', curerror, \'fail\');'+
			 						'	$("#mainPageModal").on("hidden.bs.modal", function () {'+
									'			$(cvalinitset'+fc+''+penultm8+').parent().focus();'+
									'	});	'+
			 						'}';
				 			// console.log("cvaltotalset - ",cvaltotalset);
	 						
	 					}

		 				// add the compulsory section to the vcinit portion of the
		 				// first fielddata element in the finalgroup array
	 					finalgroup[0]['vcinit']+=cvaltotalset;
	 				}


	 				// test for subfield data and proceed to craete array of condition
	 				// add-on content for the validation fields, using the target fields 
	 				// name or group data
	 				var subtests=[];
	 				if(subfielddataone!==""&&subfielddataone.length>0){
	 					for(var l=0;l<subfielddataone.length;l++){
	 						var subfielddata=subfielddataone[l].replace(/[\n\r]+/g,"").replace(/\s{2,}/g, ' ').split("-|-");
	 						// get the type for the current group set
	 						var type=subfielddata.shift();
	 						if(type!=="group"){
		 						var telemname=subfielddata[0];
		 						var telemtype=subfielddata[1];
		 						var telemvalue=subfielddata[2];
		 						var tarelemname="";
		 						var curcondition="";
		 						if(type==""||type.toLowerCase()=="all"){
		 							for (var m = 0; m < finalgroup.length; m++) {
		 								finalgroup[m]['vcinit']+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
		 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
		 								// makes sure that the telemvalue field equates empty on
		 								// encountering *null* keyword as its value
			 							telemvalue==""||telemvalue.indexOf('*any*')>-1?telemvalue="":telemvalue=telemvalue;
		 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
		 								finalgroup[m]['vcblock']+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
		 								// console.log("current count - ",m," curvblock - ",finalgroup[m]['vcblock'],"curvcinit - ",finalgroup[m]['vcinit']);
		 							};
		 						}else if(type=="single"){
			 						tarelemname=subfielddata[3];
			 						if(tarelemname!==""){
			 							var ckey="";
			 							ckey=finalgroup[''+tarelemname+''];
			 							if(finalgroup[ckey][''+tarelemname+'']){
			 								finalgroup[ckey]['vcinit']+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
			 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
			 								telemvalue==""||telemvalue.indexOf('*any*')>-1?telemvalue="":telemvalue=telemvalue;
			 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
			 								finalgroup[ckey]['vcblock']+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
		 									// console.log("current key - ",ckey," curvblock - ",finalgroup[ckey]['vcblock'],"curvcinit - ",finalgroup[ckey]['vcinit']);
			 							}
			 						}else{
			 							var tarelemerr='Sub-validation group error discovered where type is "Single", and validation element is "<b>'+telemname+'</b>", in error map';
			 							raiseMainModal('ED System Failure!!', tarelemerr, 'fail');
			 							formstatus=false;
			 							break;
			 						}
		 						}

	 						}else if(type=="group"){
	 							for(var l2=3;l2<subfielddata.length;l2+=3){
	 								var telemname=subfielddata[l2];
			 						var telemtype=subfielddata[l2+1];
			 						var telemvalue=subfielddata[l2+2];
			 						var tarelemname="";
			 						var curcondition="";
			 						for (var m = 0; m < finalgroup.length; m++) {
		 								finalgroup[m]['vcinit']+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
		 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
		 								// makes sure that the telemvalue field equates empty on
		 								// encountering *null* keyword as its value
			 							telemvalue==""||telemvalue.indexOf('*any*')>-1?telemvalue="":telemvalue=telemvalue;
		 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
		 								finalgroup[m]['vcblock']+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
		 							};
	 							}
	 						}
	 					}
	 				}
	 				// sort requirements based on group fall data
	 				// console.log("Required data: ",reqdata);
	 				if(reqdata.indexOf("groupfall")>-1){
	 					dogroupfall="true";
	 					reqdata=reqdata.split("groupfall");//remove groupfall
	 					reqdata=/[^\[\]]+/ig.exec(reqdata[1]);
	 					// console.log("the new req data: ",reqdata);
	 					reqdata=reqdata[0].split(",");// get inidividual data groups
	 					// console.log("the new req data after split: ",reqdata," length: ",reqdata.length);
	 				}else{
	 					reqdata=/[^\[\]]+/ig.exec(reqdata);
	 					// console.log("the new req data: ",reqdata);
	 					reqdata=reqdata[0].split(",");// get inidividual data groups
	 					// console.log("the new req data after split: ",reqdata);

	 				}

		 			
	 				
	 				// create block control for the multiple validation entries
	 				if(ccount>0){
	 					var extendederrorblock="";
	 					var extendedtestblock="";
	 					// allows the current set of entries to fail validation
	 					var gstatus=$('form[name='+formname+'] select[name=group'+groupcounter+'_status'+x+']');
	 					// console.log("cur status test- ",gstatus);
	 					if(typeof(gstatus)!=="undefined"&&(gstatus.val()=="inactive"||gstatus.val()=="yes")){
	 						// create an expression that always evaluates as false
	 						extendederrorblock='&&1<0';
	 					}else{

	 					}

	 					// create condition blocks for handling multiple form element validation
		 				for(var c=0;c<reqdata.length;c++){
		 					var conditionblock="";
		 					var conderrorblock="";
		 					// for initialisation of sub validation field section variables
		 					//  and corresponding condition block output
		 					var preinit="";
		 					var vcinit="";
		 					var vcblock="";
		 					var compulsoryblock="";
		 					if(dogroupfall=="true"){
								var curreq=reqdata[c].split('-');
								// console.log("Current requirements: ",curreq);
			 					for(var ct=0;ct<curreq.length;ct++){
			 						id=curreq[ct]>0?curreq[ct]-1:curreq[ct];
			 						vcblock=finalgroup[id]['vcblock'];
			 						if(vcinit==""){
			 							vcinit=finalgroup[id]['vcinit'];

			 						}else if(finalgroup[id]['vcinit']!==""&&vcinit.indexOf(''+finalgroup[id]['vcinit']+'')<0){
			 							// avoid repeating content in the init section
			 							vcinit+=finalgroup[id]['vcinit'];
			 						}
			 						if(valset!==""){

			 						}
			 						preinit=finalgroup[id]['fieldcextra'];

		 							// console.log("curvblock valpoint- ",finalgroup[0]['vcblock'],"curvcinit valpoint - ",finalgroup[0]['vcinit']);
									// console.log("Current id: ",id)," Current ct: ",curreq[ct];

			 						if(ct==0){
			 							conditionblock=''+finalgroup[id]['fieldname']+'.val()==""&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';
			 							conderrorblock='var edittype='+finalgroup[id]['fieldname']+'.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};/*console.log("Edittype1 - ",edittype," Current Value - ",'+finalgroup[id]['fieldname']+'.val());*/var errtestmsg="'+finalgroup[id]['errmsg']+'";if(errtestmsg!=="NA"&&edittype!=="true"'+finalgroup[id]['errtestdata']+'){formstatus=false; pointmonitor=true; raiseMainModal(\'Form error!!\', \''+finalgroup[id]['errmsg']+'\', \'fail\');'+
									        '$("#mainPageModal").on("hidden.bs.modal", function () {'+
								            	'		var mcetester=$('+finalgroup[id]['fieldname']+').attr("data-mce");'+
					 							'		if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}'+
									            '		 if(mcetester=="true"){'+
												'			var mcid=$('+finalgroup[id]['fieldname']+').attr("id");'+
												'			tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/'+
												'		}else{'+
												'			$('+finalgroup[id]['fieldname']+').addClass(\'error-class\').focus();'+
												'		}'
									        +'});}';
			 						}else if(ct==1&&Math.floor(curreq.length)<=2){
			 							// in the event there are only two entries
			 							conditionblock+='&&'+finalgroup[id]['fieldname']+'.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';

			 						}else if(ct==1&&Math.floor(curreq.length)>2){
			 							// in the event of more than two entries, open the bracket for the entries
			 							conditionblock+='&&('+finalgroup[id]['fieldname']+'.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';

			 						}else if(Math.floor(curreq.length)>Math.floor(ct)+1&&Math.floor(curreq.length)>2){
			 							conditionblock+='||'+finalgroup[id]['fieldname']+'.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';

			 						}else if(Math.floor(curreq.length)==Math.floor(ct)+1&&Math.floor(curreq.length)>2){
			 							conditionblock+='||'+finalgroup[id]['fieldname']+'.val()!=="")&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';
			 						}else{

			 						}
			 					}
		 					}else{
		 						// do plain waterfall check on requireddata array content
			 					id=reqdata[c]-1>0?reqdata[c]-1:0;
			 					vcblock=finalgroup[id]['vcblock'];
		 						if(vcinit==""){
		 							vcinit=finalgroup[id]['vcinit'];

		 						}else if(finalgroup[id]['vcinit']!==""&&vcinit.indexOf(''+finalgroup[id]['vcinit']+'')<0){
		 							// avoid repeating content in the init section
		 							vcinit+=finalgroup[id]['vcinit'];
		 						}
		 						// console.log("the final group value: ",finalgroup[id]," the type of final group",typeof(finalgroup[id]));
			 					if(typeof(finalgroup[id])!=="undefined"&&finalgroup[id]['fieldname']!==""&&finalgroup[id]['fieldtype']!==""){
			 						conditionblock=''+finalgroup[id]['fieldname']+'.val()==""&&formstatus==true&&pointmonitor==false&&curselect==""'+vcblock+'';
		 							conderrorblock='var edittype='+finalgroup[id]['fieldname']+'.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};/*console.log("Edittype2 - ",edittype," Current Value - ",'+finalgroup[id]['fieldname']+'.val())*/;var errtestmsg="'+finalgroup[id]['errmsg']+'";if(errtestmsg.toLowerCase()!=="na"&&edittype!=="true"){formstatus=false; pointmonitor=true; console.log(formstatus,'+finalgroup[id]['fieldname']+');raiseMainModal(\'Form error!!\', \''+finalgroup[id]['errmsg']+'\', \'fail\');'+
								        '$("#mainPageModal").on("hidden.bs.modal", function () {'+
								        '		var mcetester=$('+finalgroup[id]['fieldname']+').attr("data-mce");'+
					 					'		if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}'+
							            '		 if(mcetester).attr("data-mce")=="true"){'+
										'			var mcid=$('+finalgroup[id]['fieldname']+').attr("id");'+
										'			tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/'+
										'		}else{'+
										'			$('+finalgroup[id]['fieldname']+').addClass(\'error-class\').focus();'+
										'		}'
							        +'});}';
			 					}
		 					}
		 					// var valtotal='if(){}';
		 					// console.log("errcontentout value: ",errcontentout," cur block: ",conditionblock," condition error: ",conderrorblock," cur count: ",c," reqdata length: ",reqdata.length," errcontentout typeof", typeof(errcontentout))
		 					if(errcontentout==""){
		 						if(conditionblock!==""&&conderrorblock!==""){
			 						errcontentout=''+vcinit+'if('+conditionblock+'){'+
			 						''+conderrorblock+''+
			 						'}'+preinit+'';
		 						}
		 					}else if(errcontentout!==""){
		 						// console.log("conderrorblock value: ",conderrorblock);
		 						// console.log("errcontentout value: ",errcontentout);
		 						if(conditionblock!==""&&conderrorblock!==""){
		 							errcontentout+='else if('+conditionblock+'){'+
			 						''+conderrorblock+''+
			 						'}'+preinit+'';
			 					}
		 					}
		 				}
	 					// create the formelment variable definitions
		 				for(var cx=0;cx<ccount;cx++){
		 					evalvardefns="";
		 					var cto=cx+1;
	 						var gstatus=$('form[name='+formname+'] select[name=group'+groupcounter+'_status'+cto+']');
		 					// console.log("cur status test- ",gstatus);
		 					if(typeof(gstatus)!=="undefined"&&(gstatus.val()=="inactive"||gstatus.val()=="yes")){
		 						// create an expression that always evaluates as false
		 						extendederrorblock=' var curselect=$(\'form[name='+formname+'] select[name=group'+groupcounter+'_status'+cto+']\').val();';
		 					}else{
		 						extendederrorblock='var curselect="";';
		 					}
		 					evalvardefns+=extendederrorblock;
		 					for(var v=0;v<finalgroup.length;v++){
		 						var p=cx+1;
		 						// create the variable instances for the eval section
		 						evalvardefns+=" var "+finalgroup[v]['fieldname']+"="
		 						+"$('form[name="+formname+"] "+finalgroup[v]['fieldtype']+"[name="+finalgroup[v]['fieldname']+""+p+"]');";
		 					}
	 						evalcontent=''+evalvardefns+''+errcontentout+'';
	 						// console.log("Eval count group data: ",cx," Eval Data", evalcontent);
		 					eval(evalcontent);
		 					// this ensures the loop stops running completely
		 					// when a condition is not met
		 					if(formstatus==false){
		 						break;
		 					}
		 				}
		 				
	 				}

				}else{
					// console.log(typeof(curgroup));
					if(typeof(curgroup)!=="undefined"&&curgroup!==""){
			 			var errcontentout="";
			 			var evalcontent="";
			 			var evalvardefns="";
			 			var vcinit="";
			 			var vcblock="";
			 			var preinit="";
						var fielddata=curgroup.split("-:-");
						var fieldname=fielddata[0].replace(/[\n\r]*/g,"").replace(/\s{1,}/g, '');
						var fieldtype=fielddata[1].replace(/[\n\r]*/g,"").replace(/\s{1,}/g, '');
						var fieldentrytype="";
						var fieldextension="";
						var errtestdata="";

						if(fieldtype.indexOf("|")>-1){
	 						var fieldtypedata=fieldtype.split("|");
	 						fieldtype=fieldtypedata[0];
	 						fieldentrytype=fieldtypedata[1];
	 						var fecblock="";
	 						if(fieldtypedata.length>2){
		 						fieldextension=fieldtypedata[2];
		 						if(fieldextension.indexOf(",")>-1){
		 							var efetype=fieldextension.split(",");
		 							console.log(efetype);
		 							for(var tt=0;tt<efetype.length;tt++){
		 								curfetype=efetype[tt];
			 							fecblock+=fecblock==""?'||(checkout[\'extension\']!=="'+curfetype+'"':'&&checkout[\'extension\']!=="'+curfetype+'"';
			 							if (tt==efetype.length-1) {
			 								fecblock+=")";
			 							};
		 							}
		 						}else{
		 							fecblock='||checkout[\'extension\']!=="'+fieldextension+'"';
		 						}
	 						}
		 					// console.log(fieldextension,fecblock);
	 						if(fieldentrytype!==""){
		 						// check to see if the entrype is a file
		 						vcinit+='var '+fieldname+'_edittype=$('+fieldname+').attr("data-edittype");\r\n'+
		 							'if('+fieldname+'_edittype===null||'+fieldname+'_edittype===undefined||'+fieldname+'_edittype===NaN){\r\n'+
									'	'+fieldname+'_edittype="";\r\n'+
						            '}'; 
	 							errtestdata='&&'+fieldname+'_edittype==""';
		 					}
	 						// create attachment condition block
	 						preinit='if('+fieldname+'.val()!==""&&formstatus==true&&pointmonitor==false){'+
	 								'var checkout=getExtension('+fieldname+'.val());'+
									'if(checkout[\'type\']!=="'+fieldentrytype+'"'+fecblock+'){'+
									'	window.alert(checkout[\''+fieldentrytype+'errormsg\']);'+
									'	$('+fieldname+').addClass(\'error-class\').focus();'+
									'	formstatus= false;'+
									'	pointmonitor= true;'+
									'}'+
 								'}';
	 					}
		 				
		 				// trap a third layer of content from the field data obtained
		 				// this represents the sub content that defines that the 
		 				// current entry is related to the value of another field
		 				var subfielddataone=[];
		 				if(fielddata.length>2){
		 					subfielddataone=/[^\[\]]+/ig.exec(fielddata[2]);
		 					subfielddataone=subfielddataone[0].replace(/[\n\r]+/g,"").replace(/\s{1,}/g, '').split(">|<");
		 					// console.log("subfielddataparent - ",fielddata[2]," subfielddataone - ",subfielddataone);
		 				}

		 				// test for subfield data and proceed to craete array of condition
		 				// add-on content for the validation fields, using the target fields 
		 				// name or group data
		 				var subtests=[];
		 				if(subfielddataone!==""&&subfielddataone.length>0){
		 					for(var l=0;l<subfielddataone.length;l++){
		 						var subfielddata=subfielddataone[l].replace(/[\n\r]+/g,"").replace(/\s{2,}/g, ' ').split("-|-");
		 						// get the type for the current group set
		 						var type=subfielddata.shift();
		 						if(type!=="group"){
			 						var telemname=subfielddata[0];
			 						var telemtype=subfielddata[1];
			 						var telemvalue=subfielddata[2];
			 						var tarelemname="";
			 						var curcondition="";
			 						if(type==""||type.toLowerCase()=="all"){
			 							for (var m = 0; m < finalgroup.length; m++) {
			 								vcinit+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
			 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
			 								// makes sure that the telemvalue field equates empty on
			 								// encountering *null* keyword as its value
			 								telemvalue==""||telemvalue.indexOf('*any*')>-1?telemvalue="":telemvalue=telemvalue;
			 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
			 								vcblock+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
			 							};
			 						}else if(type=="single"){
				 						tarelemname=subfielddata[3];
				 						if(tarelemname!==""){
				 							/*var ckey="";
				 							ckey=finalgroup[''+tarelemname+''];*/

				 								vcinit+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
				 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
				 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
				 								vcblock+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
				 							
				 						}else{
				 							var tarelemerr='Sub-validation group error discovered where type is "Single", and validation element is "<b>'+telemname+'</b>", in error map';
				 							raiseMainModal('ED System Failure!!', tarelemerr, 'fail');
				 							formstatus=false;
				 							break;
				 						}
			 						}
			 						// console.log("curvblock - ",vcblock," curvinit - ",vcinit);
		 						}else if(type=="group"){
			 						// console.log("subfielddata length - ",subfielddata.length," subfielddata - ",subfielddata);
		 							for(var l2=0;l2<subfielddata.length;l2+=3){
		 								var telemname=subfielddata[l2];
				 						var telemtype=subfielddata[l2+1];
				 						var telemvalue=subfielddata[l2+2];
				 						var tarelemname="";
				 						var curcondition="";
			 								vcinit+='var '+telemname+'=$("form[name='+formname+'] '+telemtype+'[name='+telemname+']");';
			 								var c_all=telemvalue==""||telemvalue.indexOf('*any*')>-1?"!":"";
			 								// makes sure that the telemvalue field equates empty on
			 								// encountering *null* keyword as its value
			 								telemvalue==""||telemvalue.indexOf('*any*')>-1?telemvalue="":telemvalue=telemvalue;
			 								telemvalue=="*null*"?telemvalue="":telemvalue=telemvalue;
			 								vcblock+="&&"+telemname+".val()"+c_all+"==\""+telemvalue+"\"";
			 								// console.log("curvblock - ",vcblock," curvinit - ",vcinit);
		 							}
		 						}
		 					}
		 				}
						var errdata=errgroup.split("-:-");
			            var errdata1=errdata[1];
			            if(errdata[1]===null||errdata[1]===undefined||errdata[1]===NaN){
			              var errdata1="";
			            }
			            var errmsgout=typeof(errdata1)!=="undefined"&&errdata1!==""?errdata[1].replace(/[\n\r]*/g,"").replace(/\s{1,}/g, ' '):"";
						// create the variable instances for the eval section
						// and make sure the field is not chosen if the NA
						// errmsg is present meaning that the field is not required
						if(errmsgout.toLowerCase()!=="na"||errmsgout!=="NA"||errmsgout!==" NA"||errmsgout!==" NA "||errmsgout!=="NA "){
							evalvardefns+="var "+fieldname+"="
							+"$('form[name="+formname+"] "+fieldtype+"[name="+fieldname+"]');/*console.log(\" Current Value - \","+fieldname+".val());*/";
							conditionblock=''+fieldname+'.val()==""&&formstatus==true&&pointmonitor==false'+vcblock+'';
							conderrorblock='var edittype='+fieldname+'.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};'+
							'console.log("Element - ",$(fieldname));/*console.log("Edittype3 - ",edittype);*/var errtestmsg="'+errmsgout+'";if(errtestmsg!=="NA"&&edittype!=="true"'+errtestdata+'){formstatus=false; pointmonitor=true; raiseMainModal(\'Form error!!\', \''+errmsgout+'\', \'fail\');'+
						        '$("#mainPageModal").on("hidden.bs.modal", function () {'+
						        '		var mcetester=$('+fieldname+').attr("data-mce");'+
					 			'		if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}'+
					            '		 if(mcetester=="true"){'+
								'			var mcid=$('+fieldname+').attr("id");/*console.log("tmcid - ",tinyMCE.get(mcid),"mcid - ",mcid);*/'+
								'			tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/'+
								'			/*tinyMCE.getInstanceById(mcid).focus();*/'+
								'		}else{'+
								'			$('+fieldname+').addClass(\'error-class\').focus();'+
								'		}'+
						        '});}';
						}
						if(errcontentout==""){
							if(conditionblock!==""&&conderrorblock!==""){
	 						errcontentout=''+vcinit+'if('+conditionblock+'){'+
	 						''+conderrorblock+''+
	 						'}'+preinit+'';
								
							}
						}
						evalcontent=''+evalvardefns+''+errcontentout+'';
						// console.log("Eval Data single", evalcontent);
						eval(evalcontent);
						// this ensures the loop stops running completely
	 					// when a condition is not met
	 					if(formstatus==false){
	 						break;
	 					}
					}else{
						errmsg='Missing form data detected, possible malformed validation triggers.';
						raiseMainModal('Parse error!!', ''+errmsg+'', 'fail');
						formstatus=false;
						break;
					}
				}

			}
		}else{
			errmsg='Extra form data and errormap do not match in length.';
			raiseMainModal('Parse error!!', ''+errmsg+'', 'fail');
			formstatus=false;
			// break;
		}

	};





	if(formstatus==true&&pointmonitor==false){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
			$('form[name='+formname+']').attr("onSubmit","return true").submit();
		}else{
			$('form[name='+formname+']').attr("onSubmit","return false");
		}
	}
}
if(buttonname=="teamentrysubmit"){
	var formstatus=true;	
	var inputname1=$('input[name=curbannerslidecount]');
	var inputname2=$('input[name=slide1]');
	var inputname3=$('input[name=fullname1]');
	var inputname4=$('input[name=position1]');
	var inputname5=$('input[name=details1]');
	var inputname11=$('input[name=qualifications1]');
	if(inputname2.val()==""){
		window.alert('Please provide the photograph.');
		$(inputname2).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname3.val()==""){
		window.alert('Please provide the fullname.');
		$(inputname3).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname4.val()==""){
		window.alert('Please provide the position.');
		$(inputname4).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname5.val()==""){
		window.alert('Please provide the details.');
		$(inputname5).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname11.val()==""){
		window.alert('Qualifications.');
		$(inputname11).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname2.val()!==""){
		var slideout=getExtension(inputname2.val());
		if(slideout['type']!=="image"){
			window.alert('Please provide a valid slide image.');
			$(inputname2).addClass('alerterror').focus();
			formstatus= false;
			pointmonitor=true;
		}
	}else if(inputname1.val()>1){
		for (var i = 2; i <= inputname1.val(); i++) {
			var inputname6=$('input[name=slide'+i+']');
			var inputname7=$('input[name=fullname'+i+']');
			var inputname8=$('input[name=position'+i+']');
			var inputname9=$('input[name=details'+i+']');
			var inputname10=$('input[name=qualifications'+i+']');
			if(inputname6.val()!==""){
				var slideout=getExtension(inputname6.val());
				if(inputname3.val()==""){
					window.alert('Please provide the fullname.');
					$(inputname3).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(inputname4.val()==""){
					window.alert('Please provide the position.');
					$(inputname4).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(inputname5.val()==""){
					window.alert('Please provide the details.');
					$(inputname5).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(slideout['type']!=="image"){
					window.alert('Please provide a valid slide image.');
					$(inputname6).addClass('alerterror').focus();
					formstatus= false;
					break;
				}

			}
		};
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
			$('form[name=contentform]').attr({"onSubmit":"return true;"}).submit();
		}
	}
}
if(buttonname=="newbranchsubmit"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('form[name=branchform] input[name=locationtitle]');
	var inputname2=$('form[name=branchform] textarea[name=address]');
	var inputname3=$('form[name=branchform] input[name=phonenumbers1]');
	var inputname4=$('form[name=branchform] input[name=email1]');
	var inputname5=$('form[name=branchform] input[name=contactpersons1]');
	var inputname6=$('form[name=branchform] input[name=curcontactcount]');
	var inputname7=$('form[name=branchform] input[name=latitude]');
	var inputname8=$('form[name=branchform] input[name=longitude]');
	var inputname9=$('form[name=branchform] select[name=mainbranch]');
	if(inputname1.val()==""){
		window.alert('Please provide the title of the branch.');
		$(inputname1).addClass('alerterror').focus();
		formstatus= false;
	}else if(inputname2.val()==""){
		window.alert('Please provide the address for this branch.');
		$(inputname2).addClass('alerterror').focus();
		formstatus= false;
	}else if(inputname3.val()==""){
		window.alert('Please provide the phone number.');
		$(inputname3).addClass('alerterror').focus();
		formstatus= false;
	}else if(inputname4.val()==""){
		window.alert('Please provide the email address.');
		$(inputname4).addClass('alerterror').focus();
		formstatus= false;
	}else if(inputname5.val()==""){
		window.alert('Please provide the contact person.');
		$(inputname5).addClass('alerterror').focus();
		formstatus= false;
	}else if(inputname6.val()>1){
		for (var i = 2; i <= inputname6.val() ; i++) {
			var inputname7=$('form[name=branchform] input[name=phonenumbers'+i+']');
			var inputname8=$('form[name=branchform] input[name=email'+i+']');
			var inputname9=$('form[name=branchform] input[name=contactpersons'+i+']');
			if(inputname7.val()!==""&&inputname8.val()==""){
				window.alert('Please provide the email address(s).');
				$(inputname8).addClass('alerterror').focus();
				formstatus= false;
				break;
			}else if(inputname8.val()!==""&&inputname9.val()==""){
				window.alert('Please provide the contact person(s).');
				$(inputname9).addClass('alerterror').focus();
				formstatus= false;
				break;

			}else if(inputname9.val()!==""&&inputname7.val()==""){
				window.alert('Please provide the phone number.');
				$(inputname7).addClass('alerterror').focus();
				formstatus= false;
				break;

			}
		};
	}
	if(inputname9.val()!==""&&formstatus==true&&inputname7.val()==""&&inputname8==""){
		formstatus=false;
		errmsg='Please provide the latitude and longitude value for this Main Branch Entry.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname7).addClass('error-class').focus();
        });
	}
	if(formstatus==true&&inputname7.val()!==""&&inputname8==""){
		formstatus=false;
		errmsg='Please provide the longitude value.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname8).addClass('error-class').focus();
        });
	}else if(formstatus==true&&inputname8.val()!==""&&inputname7==""){
		formstatus=false;
		errmsg='Please provide the latitude value.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname7).addClass('error-class').focus();
        });
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
		$('form[name=branchform]').attr("onSubmit","return true").submit();
		}
	}
}
if(buttonname=="recommendationsubmit"||buttonname=="testimonialsubmit"||buttonname=="clientellesubmit"){
	tinyMCE.triggerSave();
	var formstatus=true;	
	var inputname1=buttonname=="recommendationsubmit"?$('input[name=currecommendationslidecount]'):(buttonname=="testimonialsubmit"?$('input[name=curtestimonialslidecount]'):buttonname=="clientellesubmit"?$('input[name=curclientelleslidecount]'):$('input[name=currecommendaionslidecount]'));
	var inputname2=$('input[name=slide1]');
	var inputname3=$('input[name=fullname1]');
	var inputname4=$('input[name=position1]');
	var inputname5=$('input[name=personalwebsite1]');
	var inputname6=$('input[name=companyname1]');
	var inputname7=$('input[name=companywebsite1]');
	var inputname8=$('textarea[name=details1]');
	if(inputname2.val()==""&&buttonname=="clientellesubmit"){
		window.alert('Please provide an image.');
		$(inputname2).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname3.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="testimonialsubmit")){
		window.alert('Please provide the fullname.');
		$(inputname3).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname4.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="testimonialsubmit")){
		window.alert('Please provide the position.');
		$(inputname4).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname6.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="clientellesubmit")){
		window.alert('Please provide the company name, this field must not be empty, if there is no company simply put in "none" or "null".');
		$(inputname6).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname8.val()==""){
		window.alert('Please provide the details.');
		$(inputname8).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname6.val()==""){
		window.alert('Qualifications.');
		$(inputname6).addClass('alerterror').focus();
		formstatus= false;
		// pointmonitor=true;
	}else if(inputname2.val()!==""){
		var slideout=getExtension(inputname2.val());
		if(slideout['type']!=="image"){
			window.alert('Please provide a valid image.');
			$(inputname2).addClass('alerterror').focus();
			formstatus= false;
			pointmonitor=true;
		}
	}else if(inputname1.val()>1){
		for (var i = 2; i <= inputname1.val(); i++) {
			var inputname9=$('input[name=slide'+i+']');
			var inputname10=$('input[name=fullname'+i+']');
			var inputname11=$('input[name=position'+i+']');
			var inputname12=$('input[name=personalwebsite'+i+']');
			var inputname13=$('input[name=companyname'+i+']');
			var inputname14=$('input[name=companywebsite'+i+']');
			var inputname15=$('textarea[name=details'+i+']');
			var inputname16=$('input[name=qualifications'+i+']');
			if(inputname10.val()!==""||inputname9.val()!==""||inputname11.val()!==""||inputname12.val()!==""||inputname13.val()!==""||inputname15.val()!==""){
				var slideout=inputname9.val()!==""?getExtension(inputname9.val()):"";
				if(inputname9.val()==""&&buttonname=="clientellesubmit"){
					window.alert('Please provide an image.');
					$(inputname9).addClass('alerterror').focus();
					formstatus= false;
					// pointmonitor=true;
				}else if(inputname10.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="clientellesubmit")){
					window.alert('Please provide the fullname.');
					$(inputname10).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(inputname11.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="clientellesubmit")){
					window.alert('Please provide the position.');
					$(inputname11).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(inputname13.val()==""&&(buttonname=="recommendationsubmit"||buttonname=="clientellesubmit")){
					window.alert('Please provide the Company name.');
					$(inputname13).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(inputname15.val()==""){
					window.alert('Please provide the details.');
					$(inputname15).addClass('alerterror').focus();
					formstatus= false;
					break;
				}else if(slideout!==""&&slideout['type']!=="image"){
					window.alert('Please provide a valid image.');
					$(inputname13).addClass('alerterror').focus();
					formstatus= false;
					break;
				}
			}
		};
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
			$('form[name=contentform]').attr({"onSubmit":"return true;"}).submit();
		}
	}
}
if(buttonname=="homebannersubmit"){
	var formstatus=true;
	tinyMCE.triggerSave();
	var inputname1=$('form[name=homebanners] input[name=curbannerslidecount]');
	for(var i=1; i<=inputname1.val();i++){ 
		var inputname2=$('form[name=homebanners] input[name=slide'+i+']');
		var inputname3=$('form[name=homebanners] input[name=headercaption'+i+']');
		var inputname4=$('form[name=homebanners] input[name=minicaption'+i+']');
		if(inputname2.val()==""&&(inputname3.val()!==""||inputname4.val()!=="")){
			window.alert('Please provide the banner image.');
			$(inputname2).addClass('alerterror').focus();
			formstatus= false;
			break;
		}
	}
	if(formstatus==true){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		console.log(confirmed);
		if(confirmed===true){
		$('form[name=homebanners]').submit();
		}
	}
}
/*end*/

if(buttonname=="createfvtmember"){
	var formstatus=true;
	// for managing broken condition block validation
	// e.g for emails, or verifying multiple content via ajax
	// it basically stops the validation from continuing in said instances and more
	var pointmonitor="false";
	
    var formselector='form[name=membershipform] ';
	var inputname1=$(''+formselector+'input[name=fullname]');
	var inputname2=$(''+formselector+'input[name=organisation]');
	var inputname3=$(''+formselector+'input[name=occupation]');
	var inputname4=$(''+formselector+'input[name=address]');
	var inputname5=$(''+formselector+'input[name=email]');
	var inputname6=$(''+formselector+'input[name=phonenumber]');
	var inputname7=$(''+formselector+'select[name=memberregcat]');
	var inputname8=$(''+formselector+'select[name=subscriptioncat]');
	var inputname9=$(''+formselector+'select[name=modeofpayment]');
	var inputname10=$(''+formselector+'textarea[name=comments]');
	var errmsg="";
	if(inputname1.val()==""){
		errmsg='Please give your fullname.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname1).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname3.val()==""){
		errmsg='Please state your occupation e.g "Student" , "Entrepreneur" e.t.c .';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname3).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname4.val()==""){
		errmsg='Please provide an address you are reachable from, this is important in the event we need to send documents accross to you.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname4).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname5.val()==""){
		errmsg='Please a valid email address.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname5).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname6.val()==""){
		errmsg='Please give your phone number(s).';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname6).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname7.val()==""){
		errmsg='Please choose a membership registration type from the list provided.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname7).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname8.val()==""){
		errmsg='Please select an annual subscription plan type.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname8).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}else if(inputname9.val()==""){
		errmsg='Please select a subscription payment mode from the list provided.';
		raiseMainModal('Form error!!', ''+errmsg+'', 'fail');
        $("#mainPageModal").on("hidden.bs.modal", function () {
            $(inputname9).addClass('error-class').focus();
        });
		formstatus= false;
		pointmonitor="true";
	}
	if(inputname5.val()!==""&&pointmonitor=="false"){
        var outit = emailValidatorReturnableTwo(inputname5.val());
        if (outit['status'] == "false") {
            window.alert(outit['errormsg']);
            inputname5.addClass('error-class').focus();
            formstatus=false;
            pointmonitor="true";
        }
    }

	console.log(errmsg);
	if(formstatus==true&&pointmonitor=="false"){
		var confirmed=window.confirm('The form is ready to be submitted, if you want to cross check, click "Cancel" otherwise click "OK"');
		// console.log(confirmed);
		if(confirmed===true){
			$('form[name=membershipform]').attr("onSubmit","return true").submit();
		}
	}
}

});
});//set this variable for new projects to work
var host_addr = "http://" + location.hostname + "/";
var host_env = "live";
if (host_addr.indexOf('localhost/') > -1) {
    host_addr = "http://localhost/dreambench/";
    host_env = "local";
}
if (host_addr.indexOf('ngrok.io/') > -1) {
    host_addr = "http://" + location.hostname + "/dreambench/";
}
//variable for holding filemangerheader title
var host_admin_title_name = "Dream Bench Technologies";
//get userid and usertype
$(document).ready(function() {
    $('body').addClass('loaded');
    userid = $('input[name=userdata]').attr('data-userid');
    usertype = $('input[name=userdata]').attr('data-usertype');
    // convert resource content links into selection box options
    if ($('.resource-content-link').length > 0) {
        var optlnt = $('.resource-content-link').length;
        var options = '<option value="">Choose Resource Option</option>';
        var defaultactive = 0;
        for (var i = 0; i < optlnt; i++) {
            var curid = $('.resource-content-link')[i].getAttribute('data-id');
            var fullclass = $('.resource-content-link')[i].getAttribute('class');
            if (fullclass.indexOf('active') > 0) {
                defaultactive = curid;
            }
            ;var text = $('.resource-content-link')[i].text;
            // console.log($('.resource-content-link')[i])
            options += '<option value="' + curid + '">' + text + '</option>';
        }
        $('select[name=resource-content-selection]').html(options);
        if (defaultactive > 0) {
            $('select[name=resource-content-selection]').val(defaultactive);
        }
    }
    // enable all event-count down elements on the page
    if ($('.eventCountdown').length > 0) {

        //run a loop on all the current event counters on the page
        var totallenght = $('.eventCountdown').length;

        for (var i = 0; i < totallenght; i++) {

            // get the current time 
            var curDay = new Date();
            var curtimespan = curDay.getTime();
            // console.log("Current Timespan value - ",curtimespan);
            var $this = $('.eventCountdown')[i];
            // console.log($this);
            var curid = $this.getAttribute("data-id");
            var $trueelem = $('div.event_countdown_' + curid);

            if (curid !== "undefined" && typeof ($('.eventCountdown')[i].getAttribute("data-id")) !== "undefined") {

                // event start time
                var targetdate = $this.getAttribute('data-datetime');
                var targetdatetime = new Date("" + targetdate + "");
                // console.log("targettimeframe - ",targetdatetime);
                // targetdatetime=new Date(targetdatetime.getFullYear(),targetdatetime.getMonth(),targetdatetime.getDay(),targetdatetime.getHours(),targetdatetime.getMinutes(),targetdatetime.getSeconds());
                // console.log("targettimeframetwo - ",targetdatetime);
                // event stop time
                var targetdateend = $this.getAttribute('data-datetimestop');
                var targetdatetimestop = new Date(targetdateend);
                // console.log("targettimeframeend - ",targetdatetimestop);
                // targetdatetimestop=new Date(targetdatetimestop.getFullYear(),targetdatetimestop.getMonth(),targetdatetimestop.getDay(),targetdatetimestop.getHours(),targetdatetimestop.getMinutes(),targetdatetimestop.getSeconds());
                // console.log("targettimeframeendtwo - ",targetdatetimestop);

                // event id
                var targetid = $this.getAttribute('data-id');
                // division that shows the markup for "Our time left"
                var $timeleftholder = $('.event_' + targetid + ' .event-start-date');

                // holds the markup, if any for ongoing or completed texts for events
                var outmark = "";

                // test to see if current date period is less than the event date to make
                // sure the event is ongoing
                // console.log("curtime:",curtimespan," starttime:",targetdatetime.getTime()," stoptime", targetdatetimestop.getTime());
                // console.log("targetdate:",targetdate," targetdateend:",targetdateend);
                if (curtimespan < targetdatetime.getTime()) {
                    outmark = '<strong class="title">Time till Event Starts:</strong>';
                    // the event hasnt started so the countdown can be implemented
                    $trueelem.countdown({
                        until: targetdatetime
                    });
                    // console.log("not yet");
                } else if (curtimespan >= targetdatetime.getTime() && curtimespan < targetdatetimestop.getTime()) {

                    // the event has started but it is still ongoing
                    outmark = '<strong class="title">Time till Event Ends:(<span class="green">Ongoing</span>)</strong>';
                    // the event hasnt started so the countdown can be implemented
                    $trueelem.countdown({
                        until: targetdatetimestop
                    });
                    // console.log("ongoing");

                } else if (curtimespan > targetdatetimestop.getTime() || (typeof (targetdatetimestop.getTime()) == "NaN" && typeof (targetdatetime.getTime()) == "NaN")) {

                    // the event has ended
                    console.log("ended", typeof (targetdatetimestop.getTime()));
                    outmark = '<h3 class="title text-center text-shadow-color-blue color-white">Event has ended</h3>';
                    $('div.event_' + curid + ' .caption').css("display", "none");
                    var endmarkup = '<span class="countdown-row countdown-show"><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Day</span></span><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Hrs</span></span><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Mins</span></span><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Sec</span></span></span></div>';
                    $trueelem.html(endmarkup);
                }
                // change the markup of the time left div display in the event display 
                // container
                $('div.event_' + curid + ' .event-start-date').html(outmark);

            }
        }
    }

});
// console.log(usertype);

/*Old backend sidebar menu accordion display code*/
$(document).on("click", "div#menulinkcontainer a[data-type=sublink]", function() {
    $("div#menulinkcontainer a[data-type=sublink]").attr("data-state", "inactive");
    $(this).attr("data-state", "active");

});
// code for handling old backend ui sidebar menu clicks
// this code ensures to hide open menus and only expand the current menu clicked
$(document).on("click", "div#menulinkcontainer a[data-type=mainlink]", function() {
    var parentcontrol = this.parentNode
    // // console.log($(parentcontrol));
    $(parentcontrol).find("div#menunotification").fadeOut(1000);

    var datastate = $(parentcontrol).attr("data-state");

    var thelength = $(parentcontrol).find("a").length;
    var newheight = 0;
    if (datastate == "inactive") {
        $("div#menulinkcontainer").attr({
            "data-state": "inactive"
        }).css("height", "");
        $("div#menulinkcontainer a[data-type=sublink]").attr("data-state", "inactive");
        $("a[data-type=sublink]").attr("style", "");
        $(parentcontrol).attr("data-state", "active");
        if (thelength > 2) {
            for (var i = 0; i < thelength; i++) {
                newheight += $(parentcontrol).find("a")[i].clientHeight;
            }
        } else {
            newheight = $(parentcontrol).find("a")[1].clientHeight + 31;
        }
        if (newheight > 0) {
            newheight = newheight + 3;
            if (thelength > 2) {
                $(parentcontrol).animate({
                    height: "" + newheight + ""
                }, 500, function() {
                    $("div#menulinkcontainer[data-state=inactive]").css("height", "");
                });
            } else {
                $(parentcontrol).animate({
                    height: "" + newheight + ""
                }, 500, function() {
                    $("div#menulinkcontainer[data-state=inactive]").css("height", "");
                });
            }

        }
        // // console.log($(parentcontrol).find("a")[1].clientHeight,newheight,parentcontrol.clientHeight);
    } else if (datastate == "active") {}
});
/*admin lte control, mainlink clicks*/
// this code hides the notification contents in the menu treeview that is clicked
$(document).on("click", "li.treeview a[appdata-otype=mainlink]", function() {
    $(this).children("small.mainsmall").fadeOut(300).remove();
    // // console.log($(this).children("small.mainsmall"));
});

// this section makes sure that other treeviews in the list are closed when one is
// clicked
$(document).on("click", "a[appdata-type=menulinkitem][appdata-otype=mainlink]", function() {
    $("ul.sidebar-menu ul").removeClass("menu-open").attr("style", " ");
    $("ul.sidebar-menu li").removeClass("active");
    // console.log($(this).children("small.mainsmall"));
})

// this section handles the breadcrumb displays at the top of the page for the 
// backend when menu options are clicked, it relies on data attributes
// on the clicked elements to obtain the breadcrumb titles and icons
$(document).on("click", "ul li a[appdata-type=menulinkitem]", function() {
    var pcrumb = $(this).attr("appdata-pcrumb");
    $("ul.sidebar-menu ul li:not(.treeparent-child)").removeClass("active");
    $(this).parent().addClass("active");
    $(this).children("small").fadeOut(200).remove();
    //   $(this).getElementsByTagName("small").fadeOut(200).remove();
    var pcrumb = $(this).attr("appdata-pcrumb");

    // // console.log($(this).children("small"));
    var crumb = $(this).html();
    var fa = $(this).attr("appdata-fa");
    var notifylinkval = "";
    var crumbout = "";
    if (pcrumb !== "undefined" && typeof (pcrumb) !== "undefined") {
        fa !== "undefined" && typeof (fa) !== "undefined" ? fa = fa.replace(/a\|\|/g, '"') + " " : fa = "";
        crumbout += "<li><a href=\"#" + pcrumb + "\">" + fa + "" + pcrumb + "</a></li>";
        notifylinkval = pcrumb;
        $('h1[appdata-name=notifylinkheader]').text(notifylinkval);

    }
    if (crumb !== "undefined" && typeof (crumb) !== "undefined") {
        crumbdata = crumb.split(">");
        crumbout += "&nbsp;&nbsp; >&nbsp;&nbsp; " + crumb;
    }
    if (crumbout == "") {
        crumbout = '<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>';
    } else {}
    /*create bread crumb*/
    $('ol[appdata-name="breadcrumb"]').html(crumbout);
    /*end*/
});
/*end*/
/*LTE custom options controller*/
/*make ajax request to for clicked option*/
$(document).on("click", "ul li a[appdata-type=menulinkitem]", function() {
    var linkname = $(this).attr("appdata-name");
    var datamap = $(this).attr("appdata-datamap");
    if (datamap === null || datamap === undefined || datamap === NaN) {
        datamap = "";
    }
    /*if(tinymce){
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "adminposter");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmall");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallone");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalltwo");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallthree");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallfour");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallfive");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallsix");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallseven");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalleight");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallnine");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallten");
    
  }*/
    //$('section.content').html(help[''+linkname+'']);
    var sublinkreq = new Request();
    sublinkreq.generate('section.content', true);
    //enter the url
    sublinkreq.url('' + host_addr + 'snippets/display.php?displaytype=' + linkname + '&datamap=' + datamap + '&extraval=admin');
    //send request

    sublinkreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    sublinkreq.update('section.content', 'html', 'fadeIn', 1000);

});
/*end*/

//for backend data output tables edit content display 
$(document).on("click", "td[name=trcontrolpoint] a", function() {
    // the name of the link, used to describe what clicking the link would do
    var linkname = $(this).attr("name");
    // console.log(linkname);

    // extra data in json format.
    var linkedata = $(this).attr("data-edata");
    if (linkedata === null || linkedata === undefined || linkedata === NaN) {
        linkedata = "";
    }
    // the type of the link, later used as the displaytype, in display.php
    var linktype = $(this).attr("data-type");
    var controlid = $(this).attr("data-divid");
    if (linkname == "edit" || linkname == "view") {} else if (linkname == "remove" || linkname == "delete") {
        $('tr[data-id=' + controlid + ']').fadeOut(500);
    }
    var loadstate = $('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editmodal]').attr("data-load");
    var presentcontent = $('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]').text();
    presentcontent = presentcontent.replace(/\s\s*/g, "");
    // // console.log(linkname,linktype,controlid,loadstate,presentcontent,$('tr[name=tableeditcontainer][data-divid='+controlid+'] div[data-type=editmodal]'));
    var datastate = $('tr[name=tableeditcontainer][data-divid=' + controlid + ']').attr("data-state");

    if (datastate == "inactive") {
        // console.log('inactive  zone');
        $('tr[name=tableeditcontainer] td div[data-type=editmodal]').css({
            "height": "0"
        });
        $('tr[name=tableeditcontainer] td div[data-type=editmodal]').css({
            "min-height": ""
        });
        $('tr[name=tableeditcontainer] td').css("padding", "0px");
        $('tr[name=tableeditcontainer]').attr("data-state", "inactive");
        $('tr[name=tableeditcontainer] td div[data-type=editdisplay]').html("");
        if (linkname !== "disablecomment" && linkname !== "activatecomment" && linkname !== "reactivatecomment" && linkname !== "activatesubscriber" && linkname !== "disablesubscriber") {
            // replace the edit links text with appropriate value based on the linkname
            // this variable defaults to Edit as it is the main/expected text in this
            // type of user interaction
            var textdata = "Edit";
            if (linkname == "view") {
                textdata = "View";
            }
            $('td[name=trcontrolpoint] a').text(textdata);
            $('td[name=trcontrolpoint] a[data-divid=' + controlid + ']').text("Hide");
            $('tr[name=tableeditcontainer][data-divid=' + controlid + '] td').css("padding", "8px 5px 8px");
        }

        // control point for static table behaviour, i.e interactions with, the backend
        // data output tables that dont involve any page change or ajax loading.
        // good for javascript only editing
        if (linkname !== "disablecomment" && linkname !== "activatecomment" && linkname !== "reactivatecomment" && linkname !== "activatesubscriber" && linkname !== "disablesubscriber") {
            $(this).text("Hide");
            $('tr[name=tableeditcontainer][data-divid=' + controlid + '] td').css("padding", "8px 5px 8px");
        }
        var targetheight = $('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]').height();
        if (loadstate == "unloaded" || presentcontent == "") {
            // control point for static table behaviour, good for javascript only editing
            // this section handles the ajax request that usually accompanies the admin
            // data output table content link clicks
            if (linkname !== "disablecomment" && linkname !== "activatecomment" && linkname !== "reactivatecomment" && linkname !== "activatesubscriber" && linkname !== "disablesubscriber") {
                $('div[data-type=editmodal][data-divid=' + controlid + ']').animate({
                    height: "" + targetheight + ""
                }, 500, function() {
                    $(this).css({
                        "min-height": "" + targetheight + "",
                        "height": "auto"
                    });
                    var editreq = new Request();
                    editreq.generate('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]', true);
                    //enter the url
                    editreq.url('' + host_addr + 'snippets/display.php?displaytype=' + linktype + '&editid=' + controlid + '&extraval=admin&datamap=' + linkedata + '');
                    //send request
                    editreq.opensend('GET');
                    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
                    editreq.update('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]', 'html', 'fadeIn', 1000);
                    $('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]').attr("data-load", "loaded");
                });
            } else {
                var editreq = new Request();
                editreq.generate('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]', false);
                //enter the url
                editreq.url('' + host_addr + 'snippets/display.php?displaytype=' + linktype + '&editid=' + controlid + '&extraval=admin');
                //send request
                editreq.opensend('GET');
                // // console.log('in here');
                //update dom when finished, takes four params targetElement,entryType,entryEffect,period
                editreq.update('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editdisplay]', 'nothing', '', 0);
            }
        } else if (loadstate == "loaded" || presentcontent !== "") {
            // control point for static table behaviour, good for javascript only editing

            $('tr[name=tableeditcontainer][data-divid=' + controlid + '] div[data-type=editmodal]').animate({
                height: "" + targetheight + ""
            }, 500, function() {
                $(this).css({
                    "min-height": "" + targetheight + ""
                });
            });

        }
        if (linkname !== "disablecomment" & linkname !== "activatecomment" && linkname !== "reactivatecomment" && linkname !== "activatesubscriber" && linkname !== "disablesubscriber") {
            $('tr[name=tableeditcontainer][data-divid=' + controlid + ']').attr("data-state", "active");
        }
    } else if (datastate == "active") {
        // console.log('inactive  zone');    
        // replace the 
        // replace the edit links text with appropriate value based on the linkname
        // this variable defaults to Edit as it is the main/expected text in this
        // type of user interaction
        var textdata = "Edit";
        if (linkname == "view") {
            textdata = "View";
        }
        $(this).text(textdata);
        $('tr[name=tableeditcontainer] td div#completeresultdisplaycontent').html("");
        $('div[data-type=editmodal][data-divid=' + controlid + ']').css({
            "min-height": "",
            "height": "0"
        });
        $('tr[name=tableeditcontainer][data-divid=' + controlid + '] td').css("padding", "0px");
        $('tr[name=tableeditcontainer][data-divid=' + controlid + ']').attr("data-state", "inactive");
        $('div[data-type=editmodal]').css({
            "min-height": ""
        });
        $('tr[name=tableeditcontainer] td').css("padding", "0px");
        $('tr[name=tableeditcontainer]').attr("data-state", "inactive");
        if (linkname !== "disablecomment" && linkname !== "activatecomment" && linkname !== "reactivatecomment" && linkname !== "activatesubscriber" && linkname !== "disablesubscriber") {
            $('td[name=trcontrolpoint] a').text(textdata);
        }
    }
    ;
});

$(document).on("click", "div.meneame div[data-name=paginationpageshold] a", function() {
    $("div.meneame div[data-name=paginationpageshold] a").removeClass("current");
    $(this).addClass("current");
    var page = $(this).attr("data-page");
    var ipp = $(this).attr("data-ipp");
    var curquery = $("input[name=curquery]").val();
    var datamap = $("input[name=datamap]").val();
    if (datamap === null || datamap === undefined || datamap === NaN) {
        datamap = "";
    }
    var outputtype = $("input[name=outputtype]").val();
    var curstamp = $("input[name=curstamp]") ? $("input[name=curstamp]").val() : "";
    var url = "" + host_addr + "snippets/display.php?displaytype=paginationpages&curquery=" + curquery + "&ipp=" + ipp + "&page=" + page + "&curstamp=" + curstamp + "&datamap=" + datamap + "&extraval=admin";
    // // console.log("achieved",page,ipp,curquery,outputtype,url);
    var pagesreq = new Request();
    pagesreq.generate('div.meneame div[data-name=paginationpageshold]', false);
    //enter the url
    pagesreq.url("" + url + "");
    //send request
    pagesreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    pagesreq.update('div.meneame div[data-name=paginationpageshold]', 'html', '', 0);
    $("div.meneame input[name=currentview]").attr({
        "data-ipp": "" + ipp + "",
        "data-page": "" + page + "",
        "value": "" + page + ""
    }).trigger('change');
});

$(document).on("change", "div.meneame input[name=currentview]", function() {
    // console.log("in here");
    var page = $("div.meneame input[name=currentview]").attr("data-page");
    var ipp = $("div.meneame input[name=currentview]").attr("data-ipp");
    var curquery = $("input[name=curquery]").val();
    var outputtype = $("input[name=outputtype]").val();
    var curstamp = $("input[name=curstamp]") ? $("input[name=curstamp]").val() : "";
    var datamap = $("input[name=datamap]").val();
    if (datamap === null || datamap === undefined || datamap === NaN) {
        datamap = "";
    }
    // var url=''+host_addr+'snippets/display.php?displaytype=paginationpagesout&curquery='+curquery+'&outputtype='+outputtype+'&ipp='+ipp+'&page='+page+'&extraval=admin';
    var url = "" + host_addr + "snippets/display.php?displaytype=paginationpagesout&curquery=" + curquery + "&outputtype=" + outputtype + "&ipp=" + ipp + "&page=" + page + "&curstamp=" + curstamp + "&datamap=" + datamap + "&extraval=admin";
    var pagesoutreq = new Request();
    pagesoutreq.generate('div#contentdisplayhold div[data-name=contentholder],section.content div[data-name=contentholder]', true);
    //enter the url
    pagesoutreq.url('' + url + '');
    //send request
    pagesoutreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    pagesoutreq.update('div#contentdisplayhold div[data-name=contentholder],section.content div[data-name=contentholder]', 'html', 'fadeIn', 500);
});

$(document).on("blur", "div.meneame  select[name=entriesperpage]", function() {
    var parent=$(this).parent().parent().parent();
    var ipp = $(this).val();
    var cview=parent.find("input[name=currentview]");
    var ipp2 = cview.attr("data-ipp");
    // console.log(typeof ipp,ipp2);

    /*ipp=Math.floor(ipp);
  ipp2=Math.floor(ipp2);*/
    if (ipp !== ipp2) {
        var page = 1;
        var curquery = parent.find("input[name=curquery]").val();
        var outputtype = parent.find("input[name=outputtype]").val();
        var curstamp = parent.find("input[name=curstamp]").length>0 ? parent.find("input[name=curstamp]").val() : "";
        var datamap = parent.find("input[name=datamap]").val();
        if (datamap === null || datamap === undefined || datamap === NaN) {
            datamap = "";
        }
        var url = "" + host_addr + "snippets/display.php?displaytype=paginationpages&curquery=" + curquery + "&ipp=" + ipp + "&page=" + page + "&curstamp=" + curstamp + "&datamap=" + datamap + "&extraval=admin";
        // // console.log("achieved",page,ipp,curquery,outputtype);
        var pagesreq = new Request();
        pagesreq.generate('div.meneame div[data-name=paginationpageshold]', false);
        //enter the url
        pagesreq.url('' + url + '');
        //send request
        pagesreq.opensend('GET');
        //update dom when finished, takes four params targetElement,entryType,entryEffect,period
        pagesreq.update('div.meneame div[data-name=paginationpageshold]', 'html', '', 0);
        $("div.meneame input[name=currentview]").attr({
            "data-ipp": "" + ipp + "",
            "data-page": "" + page + "",
            "value": "" + page + ""
        }).trigger('change');
    }
});

//for generic calender control, relies on connection.php function and display.php control
//the php function is calenderOut(date,time,year), refer to the connection.php page 

$(document).on("click", 'div#calmonthpointer', function() {
    var months = new Array();
    months[1] = "January";
    months[2] = "Feburary";
    months[3] = "March";
    months[4] = "April";
    months[5] = "May";
    months[6] = "June";
    months[7] = "July";
    months[8] = "August";
    months[9] = "September";
    months[10] = "October";
    months[11] = "November";
    months[12] = "December";
    var curviewmonth = $('div#calDispDetails').attr("data-curmonth");
    var curyear = Math.floor($('div#calDispDetails').attr("data-year"));
    // var popmonth=months[nextmonth];
    var pointname = $(this).attr("name");
    var datatheme = $(this).attr("data-theme");
    var datacontrol = $(this).attr("data-control");
    var dataviewtype = $(this).attr("data-viewtype");
    var datapop = new Array();
    var datedata = new Date();
    var curmonth = datedata.getMonth();
    // var curyear=Math.floor(datedata.getFullYear());
    var nextyear = curyear;
    var prevyear = curyear;
    var prevmonth = Math.floor(curviewmonth) - 1;
    var nextmonth = Math.floor(curviewmonth) + 1;
    var data_target = $(this).attr('data-target');
    // data_target==""?data_target="":data_target=""+data_target+"";
    prevmonth < 1 ? prevyear = curyear - 1 : prevyear;
    prevmonth < 1 ? prevmonth = 12 : prevmonth;
    nextmonth > 12 ? nextyear = curyear + 1 : nextyear;
    nextmonth > 12 ? nextmonth = 1 : nextmonth;
    if (pointname == "calpointleft") {
        var requireddate = "1-:-" + prevmonth + "-:-" + prevyear + "-:-" + data_target + "-:-" + datatheme + "-:-" + datacontrol + "-:-" + dataviewtype + "";
        var data_pop = "" + months[prevmonth] + ", " + prevyear + "";
        $('div#calDispDetails').html(data_pop).attr({
            "data-curmonth": "" + prevmonth + "",
            "data-year": "" + prevyear + ""
        });
    } else if (pointname == "calpointright") {
        var requireddate = "1-:-" + nextmonth + "-:-" + nextyear + "-:-" + data_target + "-:-" + datatheme + "-:-" + datacontrol + "-:-" + dataviewtype + "";
        var data_pop = "" + months[nextmonth] + ", " + nextyear + "";
        $('div#calDispDetails').html(data_pop).attr({
            "data-curmonth": "" + nextmonth + "",
            "data-year": "" + nextyear + ""
        });
    }
    // // console.log(datatheme,requireddate);
    var calFullreq = new Request();
    //enter the url 
    if (usertype !== "admin") {
        calFullreq.generatetwo('#calHold #calDaysHold', true);
        calFullreq.url('' + host_addr + 'snippets/display.php?displaytype=calenderout&extraval=' + requireddate + '');
    } else {
        calFullreq.generate('#calHold #calDaysHold', true);
        calFullreq.url('' + host_addr + 'snippets/display.php?displaytype=calenderout&extraval=' + requireddate + '');
    }

    //send request
    calFullreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    calFullreq.update('#calHold #calDaysHold', 'html', 'fadeIn', 1000);
    // console.log(pointname,data_pop,requireddate);
});
// legacy modal background overlay control
$(document).on("click", "div#fullbackground", function() {
    // console.log("clicked fullbackground");
    event.stopPropagation();
    // $(this).fadeOut(500);
    $('#fullbackground').fadeOut(500);
    $('#fullcontenthold').fadeOut(500);
});

$(document).on("click", 'div#calDaysHold div#calDay', function() {
    $('div#calDaysHold #calDay').removeClass("activedate");
    $(this).addClass("activedate");
    var date = $(this).attr('name');
    var data_target = $(this).attr('data-target');
    if (data_target !== "") {
        $('input[name=' + data_target + ']').attr("value", "" + date + "");
    }
});




function getExtension(entry) {
    var outs = new Array();
    if (typeof (entry) == "string") {
        var extension = entry.split('.');
        var alength = extension.length;
        var realposition = alength - 1;
        extension = extension[realposition].toLowerCase();
        outs['rextension'] = "" + extension + "";
        var entrytype = "";
        if (extension == "jpg" || extension == "jpeg" || extension == "png" || extension == "gif"|| extension == "bmp"|| extension == "ico"|| extension == "svg") {
            entrytype = "image";
        } else if (extension == "mp4" || extension == "3gp" || extension == "flv" || extension == "swf" || extension == "webm") {
            entrytype = "video";
        } else if (extension == "doc" || extension == "docx" || extension == "xls" || extension == "xlsx" || extension == "ppt" || extension == "pptx") {
            entrytype = "office";
        } else if (extension == "pdf") {
            entrytype = "pdf";
        } else if (extension == "mp3" || extension == "ogg" || extension == "wav" || extension == "amr") {
            entrytype = "audio";

        } else if (extension == "tar" || extension == "gz" || extension == "zip" || extension == "7z" || extension == "rar") {
            entrytype = "compressed";

        } else {
            entrytype = "others";
        }
        outs['imageerrormsg'] = "Please select a valid image file in the accepted format";
        outs['videoerrormsg'] = "Please select a valid video file in the accepted format e.g .webm, .flv or .3gp";
        outs['officeerrormsg'] = "Please select a office document file in the accepted format";
        outs['pdferrormsg'] = "Please choose a valid pdf document";
        outs['audioerrormsg'] = "Please select a valid audio file in the accepted format";
        outs['otherserrormsg'] = "An error occured";
        outs['type'] = entrytype;
        outs['extension'] = extension;
        return outs;
    } else {
        return outs['type']="";
        return outs['extension']="";
    }
}

function getPageGetData(partname) {
    var pagedata = document.URL;
    var getdata = "nothing";
    var pagedatatwo = "";
    var pagefol = "nothing";
    if (partname == "bookmark") {
        pagedatatwo = pagedata.split("#");
        pagefol = pagedatatwo[1];
        getdata = pagefol;
    } else if (pagedata.indexOf("" + partname + "") > -1) {
        pagedatatwo = pagedata.split("" + partname + "");
        pagefol = pagedatatwo[1];
        if (pagefol !== "nothing") {
            if (pagefol.indexOf("&") > -1 && pagefol.indexOf("#") < 0) {
                getdata = pagefol.split("&");
                var totaldata = getdata.length;
                getdata = getdata[0].split("=");
                //getdata=getdata[1];
                getdata = getdata[1];
            } else if (pagefol.indexOf("&") < 0 && pagefol.indexOf("#") < 0) {
                getdata = pagefol.split("=");
                getdata = getdata[1];
            } else if (pagefol.indexOf("&") > -1 && pagefol.indexOf("#") > -1) {
                getdata = pagefol.split("&");
                getdata = getdata[0].split("#");
                var totaldata = getdata.length;
                getdata = getdata[0].split("=");
                getdata = getdata[1];
            } else if (pagefol.indexOf("&") < 0 && pagefol.indexOf("#") > -1) {
                getdata = pagefol.split("#");
                getdata = getdata[0].split("=");
                getdata = getdata[1];
            }
        }
    }
    return getdata;
}

function produceImageFitSize(curwidth, curheight, contwidth, contheight, auto) {
    var output = new Array();
    output['width'] = "20px";
    output['height'] = "20px";
    output['style'] = "";
    output['truewidth'] = curwidth;
    output['trueheight'] = curheight;
    var style = "";
    if (curwidth !== "" && curheight !== "" && contwidth !== "" && contheight !== "") {
        if (contwidth > contheight) {
            if (curwidth > contwidth || curheight > contheight) {

                if (curwidth > curheight && curheight >= contheight && curwidth > contwidth) {
                    curwidth = contwidth;
                    style = 'cursor:pointer;height:' + contheight + 'px;width:' + curwidth + 'px;margin:auto;';
                } else if (curwidth < curheight && curheight > contheight && curwidth > contwidth) {
                    var extrawidth = Math.floor(curwidth - contheight);
                    var dimensionratio = curwidth / curheight;
                    // // console.log(dimensionratio);

                    curwidth = Math.floor(contheight * dimensionratio);
                    var widthdiff = contwidth - curwidth;
                    if (widthdiff > 0 && contwidth > 767) {
                        var marginleft = Math.floor(widthdiff / 2);
                    } else {
                        var marginleft = 0;
                    }
                    if (extrawidth > contwidth && extrawidth > contheight) {
                        extrawidth = curwidth - extrawidth;
                    }
                    /*else if (curwidth>contwidth&&curwidth>contheight) {
          curwidth=curwidth-120;
        }*/

                    style = 'cursor:pointer;width:' + curwidth + 'px;height:' + contheight + 'px;';
                    if (auto == "on") {
                        style = 'cursor:pointer;width:' + curwidth + 'px;height:' + contheight + 'px;test:;';
                    }
                } else if (curwidth < curheight && curheight >= contheight && curwidth < contwidth) {
                    var dimensionratio = curwidth / curheight;
                    // // console.log(dimensionratio);

                    curwidth = Math.floor(contheight * dimensionratio);
                    var widthdiff = contwidth - curwidth;
                    if (widthdiff > 0 && contwidth > 767) {
                        var marginleft = Math.floor(widthdiff / 2);
                    } else {
                        var marginleft = 0;
                    }

                    style = 'cursor:pointer;width:' + curwidth + 'px;height:' + contheight + 'px;';
                } else if (curwidth > curheight && curheight < contheight && curwidth > contwidth) {
                    var dimensionratio = curwidth / curheight;
                    // // console.log(dimensionratio);
                    curwidth = Math.floor(contheight * dimensionratio);
                    var difference = contheight - curheight;
                    var margintop = Math.floor(difference / 2);
                    if (auto == "on") {
                        style = 'cursor:pointer;width:' + contwidth + 'px;height:' + curheight + 'px;margin-top:auto;';
                    } else {
                        style = 'cursor:pointer;width:' + contwidth + 'px;height:' + curheight + 'px;margin-top:' + margintop + 'px;';
                    }
                } else if (curwidth < curheight && curheight < contheight) {
                    var difference = contheight - curheight;
                    var margintop = Math.floor(difference / 2);
                    curwidth = curheight - 10;
                    if (auto == "on") {
                        style = 'cursor:pointer;width:' + curwidth + 'px;height:' + curheight + 'px;margin-top:auto;';
                    } else {
                        // style='cursor:pointer;width:'+curwidth+'px;height:'+curheight+'px;margin-top:'+margintop+'px;'; 
                        style = 'cursor:pointer;width:' + curwidth + 'px;height:' + curheight + 'px;margin-top:' + margintop + 'px;';
                    }
                } else if (curwidth == curheight && curheight > contheight) {
                    var marginleft = Math.floor(contwidth) - Math.floor(contheight);
                    marginleft = Math.floor(marginleft / 2);
                    style = 'cursor:pointer;width:' + contheight + 'px;height:' + contheight + 'px;';
                }
            } else {
                var difference = contheight - curheight;
                var margintop = Math.floor(difference / 2);
                var widthdiff = contwidth - curwidth;
                var marginleft = Math.floor(widthdiff / 2);
                style = 'cursor:pointer;width:' + curwidth + 'px;height:' + curheight + 'px;margin-top:' + margintop + 'px;';
            }

        } else if (contwidth < contheight) {
            style = 'cursor:pointer;width:100%;height:auto;margin:auto;';

        }

        output['width'] = curwidth;
        output['height'] = curheight;
        output['style'] = "" + style + "";
    }
    return output;
}

function emailValidatorReturnable(email) {
    var outs = [];
    var inputname7 = email.replace(/\s\s*/g, "");
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var statuscontrol = "true"
      , errormsg = "none";
    ;// console.log(email,inputname7);

    if (inputname7.length > 0) {
        var match = inputname7.search(pattern);
        if (match < 0) {
            statuscontrol = "false";
            errormsg = "Email invalid";
        }
    } else {
        statuscontrol = "false";
        errormsg = "No email provided";
    }
    outs['status'] = statuscontrol;
    alert(outs['status']);
    outs['errormsg'] = errormsg;
    return outs;
}
function emailValidatorReturnableTwo(email) {
    var outs = [];
    var inputname7 = email.replace(/\s\s*/g, "");
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,}(\.[a-zA-Z]{2,})?$/;
    var statuscontrol = "true"
      , errormsg = "none";
    ;// console.log(email,inputname7);

    if (inputname7.length > 0) {
        var match = inputname7.search(pattern);
        if (match < 0) {
            statuscontrol = "false";
            errormsg = "Email invalid";
        }
    } else {
        statuscontrol = "false";
        errormsg = "No email provided";
    }
    outs['status'] = statuscontrol;
    // alert(outs['status']);
    outs['errormsg'] = errormsg;
    return outs;
}
function doFJCALert(obj, errorheader, errormsg, type) {
    var outs = [];
    var hideit = "hidden";
    if (type == "showheader") {
        hideit = "";
    }
    var alertel = '<div class="alert-specialv validation-error">' + '  <h6 class="' + hideit + '">' + errorheader + '</h6>' + '  <p>' + errormsg + '.</p>' + '</div>';
    // // console.log(alertel);
    $(obj).focus().parent().find('.alert-specialv.validation-error').remove();
    $(alertel).insertAfter(obj);
}
function emailValidator(inputname6) {
    // // console.log(inputname6);
    var statuscontrol = true;
    var inputname7 = inputname6.replace(/\s\s*/g, "");
    if (inputname7.length < 1) {
        statuscontrol = false;
        window.alert("E-mail field is empty");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf("/") > -1) {
        statuscontrol = false;
        window.alert("E-mail address has invalid character: /");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf(":") > -1) {
        statuscontrol = false;
        window.alert("E-mail address has invalid character: :");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf(",") > -1) {
        statuscontrol = false;
        window.alert("E-mail address has invalid character: ,");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf(";") > -1) {
        statuscontrol = false;
        window.alert("E-mail address has invalid character: ;")
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf("@") < 0) {
        statuscontrol = false;
        window.alert("E-mail address is missing @");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf("\.") < 0) {
        statuscontrol = false;
        window.alert("E-mail address is missing .");
        $("input[name=email]").css('border', '1px solid red').focus();
    } else if (inputname7.indexOf("@") > -1) {
        var inputtester = inputname7.split("@");
        var firstpart = inputtester[0];
        var secondpart = inputtester[1];
        // // console.log(secondpart);
        if (secondpart.length < 2 && secondpart[0] == ".") {
            statuscontrol = false;
            window.alert('Complete your email address properly,server name missing');
            $("input[name=email]").css('border', '1px solid red').focus();
        } else if (firstpart.length < 1) {
            window.alert('You seem to have...errr..left out something in your email, we cannot find anything before the @');
            $("input[name=email]").css('border', '1px solid red').focus();
        } else if (inputname7.indexOf("\.") > -1) {
            var inputtester = inputname7.split(".");
            var totalsplit = inputtester.length - 1;
            var realvalue = inputtester[totalsplit];
            if (realvalue.length < 1) {
                statuscontrol = false;
                window.alert('Complete your email address properly,domain name missing, try .com .net e.t.c');
                $("input[name=email]").css('border', '1px solid red').focus();
            }
        }
    } else {
        statuscontrol = true;
        // // console.log(statuscontrol);
    }
    // $("input[name=email]").attr("value",""+inputname7+"");
    return statuscontrol;
}

function testCharVal(string) {
    var testing = "false";
    if (string !== "") {
        var newstring = string.toLowerCase();
        if (newstring.indexOf("a") > -1 || newstring.indexOf("b") > -1 || newstring.indexOf("c") > -1 || newstring.indexOf("d") > -1 || newstring.indexOf("e") > -1 || newstring.indexOf("f") > -1 || newstring.indexOf("g") > -1 || newstring.indexOf("h") > -1 || newstring.indexOf("i") > -1 || newstring.indexOf("j") > -1 || newstring.indexOf("k") > -1 || newstring.indexOf("l") > -1 || newstring.indexOf("m") > -1 || newstring.indexOf("n") > -1 || newstring.indexOf("o") > -1 || newstring.indexOf("p") > -1 || newstring.indexOf("q") > -1 || newstring.indexOf("r") > -1 || newstring.indexOf("s") > -1 || newstring.indexOf("t") > -1 || newstring.indexOf("u") > -1 || newstring.indexOf("v") > -1 || newstring.indexOf("w") > -1 || newstring.indexOf("x") > -1 || newstring.indexOf("y") > -1 || newstring.indexOf("/") > -1 || newstring.indexOf(",") > -1 || newstring.indexOf(".") > -1 || newstring.indexOf("<") > -1 || newstring.indexOf(">") > -1 || newstring.indexOf("?") > -1 || newstring.indexOf("\\") > -1 || newstring.indexOf("|") > -1 || newstring.indexOf("'") > -1 || newstring.indexOf("\"") > -1 || newstring.indexOf(":") > -1 || newstring.indexOf(";") > -1 || newstring.indexOf("}") > -1 || newstring.indexOf("]") > -1 || newstring.indexOf("{") > -1 || newstring.indexOf("[") > -1 || newstring.indexOf("`") > -1 || newstring.indexOf("~") > -1 || newstring.indexOf("!") > -1 || newstring.indexOf("@") > -1 || newstring.indexOf("#") > -1 || newstring.indexOf("$") > -1 || newstring.indexOf("%") > -1 || newstring.indexOf("^") > -1 || newstring.indexOf("&") > -1 || newstring.indexOf("*") > -1 || newstring.indexOf("(") > -1 || newstring.indexOf(")") > -1 || newstring.indexOf("_") > -1 || newstring.indexOf("+") > -1 || newstring.indexOf("1") > -1 || newstring.indexOf("2") > -1 || newstring.indexOf("3") > -1 || newstring.indexOf("4") > -1 || newstring.indexOf("5") > -1 || newstring.indexOf("6") > -1 || newstring.indexOf("7") > -1 || newstring.indexOf("8") > -1 || newstring.indexOf("9") > -1 || newstring.indexOf("0") > -1 || newstring.indexOf("-") > -1 || newstring.indexOf("=") > -1) {
            testing = "true";
        }

    }
    return testing;
}

function hideBind(clickElem, targetElement, effect, period, extraAttr, extraVal) {
    $(document).on("click", '' + clickElem + '', function() {
        var extradatas = extraAttr.split(".");
        extraAttr = extradatas[0];
        var elemType = extradatas[1];
        var testvalue = "";
        testvalue = $(this).attr("data-id");
        if (extraAttr !== "" && extraAttr !== "multiple") {
            $('' + targetElement + '').attr("" + extraAttr + "", "" + extraVal + "");

        } else if (extraAttr == "multiple") {

            // console.log(extraAttr,elemType,testvalue,extraVal,clickElem);
            $('' + targetElement + ' ' + elemType + '[' + extraVal + '=' + testvalue + ']');
            if (effect == "slidedown" || effect == "slideDown") {
                $('' + targetElement + ' ' + elemType + '[' + extraVal + '=' + testvalue + ']').animate({
                    height: "0px"
                }, period, function() {
                    $(this).hide();
                });
            } else if (effect == "fadeOut" || effect == "fadeout") {
                $('' + targetElement + ' ' + elemType + '[' + extraVal + '=' + testvalue + ']').fadeOut(period);
            } else if (effect == "hide" || effect == "Hide") {
                $('' + targetElement + ' ' + elemType + '[' + extraVal + '=' + testvalue + ']').hide(period);
            } else if (effect == "html" || effect == "Html") {
                $('' + targetElement + ' ' + elemType + '[' + extraVal + '=' + testvalue + ']').hide(period).html('');
            }
        } else {
            if (effect == "slidedown" || effect == "slideDown") {
                $('' + targetElement + '').animate({
                    height: "0px"
                }, period, function() {
                    $(this).hide();
                });
            } else if (effect == "fadeOut" || effect == "fadeout") {
                $('' + targetElement + '').fadeOut(period);
            } else if (effect == "hide" || effect == "Hide") {
                $('' + targetElement + '').hide(period);
            } else if (effect == "html" || effect == "Html") {
                $('' + targetElement + '').hide(period).html('');
            }
        }
    });

}
function hoverChange(targetImg, hoverImg) {
    $(document).ready(function() {
        var realimg = "";
        // // console.log(realimg);
        $(document).on("mouseenter", '' + targetImg + '', function() {
            realimg = $('' + targetImg + '').attr("src");
            $(this).attr("src", "" + hoverImg + "");
        });
        $(document).on("mouseleave", '' + targetImg + '', function() {
            $(this).attr("src", "" + realimg + "");
        });
    });
}
function errorControl(countval) {
    $(document).ready(function() {
        if (countval > 0) {
            $('#contentleftcontent h2').html("<font>You Have done this three times, sorry but you cant login for the next " + countval + "seconds.</font>");
            countval--;
            // console.log(countval)
            window.setTimeout('errorControl(' + countval + ')', 1000);
            $('#backhold').css("display", "block");
            //  document.getElementById('contentleftcontent').firstChild('');

        } else {
            window.clearTimeout(errorControl);
            $('#backhold').css("display", "none");
            $('#contentleftcontent h2').css("display", "none");
        }
    });
}

function effectControl(targetElement, entryType, entryEffect, period, entryVal) {
    var timeoutval = period / 2;
    timeoutval = Math.floor(timeoutval);
    //// console.log(timeoutval);
    if (entryType !== "insertBefore" && entryType !== "insertAfter") {
        if (entryEffect == "fadein" || entryEffect == "fadeIn") {
            $(document).ready(function() {
                $('' + targetElement + '').hide().html(entryVal).fadeIn(period);
            });
        } else if (entryEffect == "fadeto" || entryEffect == "fadeTo") {
            $(document).ready(function() {
                $('' + targetElement + '').hide().html(entryVal).fadeTo(period, 0.9, function() {});
            });
        } else if (entryEffect == "show" || entryEffect == "Show") {
            $(document).ready(function() {
                $('' + targetElement + '').hide().html(entryVal).show(period);
                $('' + targetElement + '').attr({
                    "style": ""
                });
            });
        } else if (entryEffect == "slidedown" || entryEffect == "slideDown") {
            $(document).ready(function() {
                $('' + targetElement + '').hide().html(entryVal).slideDown(period, function() {
                    $('' + targetElement + '').attr({
                        "style": ""
                    });
                });
            });
        } else {
            $('' + targetElement + '').html(entryVal)
        }
    } else if (entryType == "insertBefore" || entryType == "insertAfter") {
        if (entryType == "insertBefore" || entryType == "insertbefore") {
            if (entryEffect == "fadein" || entryEffect == "fadeIn") {
                $(document).ready(function() {
                    $('' + entryVal + '').insertBefore('' + targetElement + '').fadeIn(period);
                });

            } else if (entryEffect == "fadeto" || entryEffect == "fadeTo") {
                $(document).ready(function() {
                    $(entryVal).insertBefore('' + targetElement + '').fadeTo(period, 0.8, function() {});
                });

            } else if (entryEffect == "slidedown" || entryEffect == "slideDown") {
                $(document).ready(function() {
                    $(entryVal).css("height", "0px").insertBefore('' + targetElement + '').slideDown(period, function() {});
                });

            } else if (entryEffect == "show" || entryEffect == "Show") {
                $(document).ready(function() {
                    $(entryVal).css("visibility", "none").insertBefore('' + targetElement + '').show(period);
                });
            }
        } else if (entryType == "insertAfter" || entryType == "insertafter") {
            if (entryEffect == "fadein" || entryEffect == "fadeIn") {
                $(document).ready(function() {
                    $(entryVal).css("visibility", "none").insertAfter('' + targetElement + '').fadeIn(period);
                });

            } else if (entryEffect == "fadeto" || entryEffect == "fadeTo") {
                $(document).ready(function() {
                    $(entryVal).css("visibility", "none").insertAfter('' + targetElement + '').fadeTo(period, 0.8, function() {});
                });

            } else if (entryEffect == "slidedown" || entryEffect == "slideDown") {
                $(document).ready(function() {
                    $(entryVal).insertAfter('' + targetElement + '').slideDown(period, function() {
                        $('' + targetElement + '').attr({
                            "style": ""
                        });
                    });
                });

            } else if (entryEffect == "show" || entryEffect == "Show") {
                $(document).ready(function() {
                    $(entryVal).insertAfter('' + targetElement + '').show(period);
                    $('' + targetElement + '').attr({
                        "style": ""
                    });
                });
            } else {
                $('' + targetElement + '').html(entryVal)
            }
        }
    }
}

function Requesttwo(maincontainer, waitdisplay, waittype, sendtype, targetElement, entryType, entryEffect, period, url) {
    if (waitdisplay === true && waittype == "admin") {
        $('' + maincontainer + '').html('<img src="' + host_addr + 'images/waiting.gif" class="total2"/>');
    } else if (waitdisplay === true && waittype == "viewer") {
        $('' + maincontainer + '').html('<img src="' + host_addr + 'images/waiting.gif" class="total2"/>');
    }
    var requestthree = false;
    try {
        requestthree = new XMLHttpRequest();
    } catch (trymicrosoft) {
        try {
            requestthree = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (othermicrosoft) {
            try {
                requestthree = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                requestthree = false;
            }
        }
    }
    requestthree.open("" + sendtype + "", url, true);
    requestthree.send(null);
    requestthree.onreadystatechange = function() {
        if (requestthree.readyState == 2 || requestthree.readyState == 1 || requestthree.readyState == 0) {} else if (requestthree.readyState == 4) {
            var response = requestthree.responseText;
            // // console.log(requestthree);
            if (targetElement !== "none") {
                effectControl(targetElement, entryType, entryEffect, period, response);
            } else if (targetElement == "none") {
                if (entryType == "reload") {
                    location.reload();
                }
            } else {
                outs = response;
            }

            // // console.log(targetElement,response,url,requestthree,period);
        }

    }
    // requestthree.onreadystatechange=generalUpdatetwo();
}

var Request = function() {
    this.requesttwo = false;
    var url;
    var response;
}
//creates reference request object
Request.prototype = {
    //get the url
    url: function(dataentry) {
        url = dataentry;
    },
    opensend: function(sentType, params="") {

        if (sentType == "GET") {
            if (params !== "") {
                url = url + "" + params;
            }
            this.requesttwo.open("" + sentType + "", url, true);
            this.requesttwo.send(null);

        } else if (sentType == "GET") {
            this.requesttwo.open("" + sentType + "", url, true);
            this.requesttwo.setRequestHeader('application/x-www-form-urlencoded');
            this.requesttwo.send(params);
        }
    },
    update: function(targetElement, entryType, entryEffect, period) {
        outs = "nothing";

        requesttwo = this.requesttwo.readyState;
        this.requesttwo.onreadystatechange = function() {
            if (this.readyState == 2 || this.readyState == 1 || this.readyState == 0) {} else if (this.readyState == 4) {
                var response = this.responseText;
                // console.log(response);
                if (targetElement !== "none") {
                    effectControl(targetElement, entryType, entryEffect, period, response);
                    if (this.maincontainer !== targetElement) {
                        $('' + this.maincontainer + '').html("");
                    }
                } else {
                    if (entryType == "reload") {
                        location.reload();
                    }
                }

                // // console.log(targetElement,response,url,this.requesttwo,period);
            }

        }
        // this.requesttwo.onreadystatechange=generalUpdate;

    },
    updatetwo: function() {
        outs = "nothing";

        this.requesttwo.onreadystatechange = function() {
            if (this.requesttwo.readyState == 2 || this.requesttwo.readyState == 1 || this.requesttwo.readyState == 0) {} else if (this.requesttwo.readyState == 4) {
                var response = this.requesttwo.responseText;
                // // console.log(response);
                return response;
            }
        }
        // this.requesttwo.onreadystatechange=generalUpdate;

    },
    generate: function(maincontainer, waitdisplay) {
        this.maincontainer = maincontainer;
        if (waitdisplay === true) {
            $('' + maincontainer + '').html('<img src="' + host_addr + 'images/waiting.gif" class="total2"/>');
        }
        try {
            this.requesttwo = new XMLHttpRequest();
        } catch (trymicrosoft) {
            try {
                this.requesttwo = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (othermicrosoft) {
                try {
                    this.requesttwo = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (failed) {
                    this.requesttwo = false;
                }
            }
        }

    },
    generatetwo: function(maincontainer, waitdisplay) {
        if (waitdisplay === true) {
            $('' + maincontainer + '').html('<img src="./images/waiting.gif" class="total2"/>');
        }
        try {
            this.requesttwo = new XMLHttpRequest();
        } catch (trymicrosoft) {
            try {
                this.requesttwo = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (othermicrosoft) {
                try {
                    this.requesttwo = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (failed) {
                    this.requesttwo = false;
                }
            }
        }

    },
    extraFunctions: function(targetElement, value) {
        if (this.requesttwo.readyState == 4) {
            $("" + targetElement + "").html("" + value + "");
        }
    }
}
function endSlideMotion() {
    if (slideFunction) {
        clearTimeout(slideFunction);
        slideFunction = "";
    }
}

var slideFunction = "";
var slidePoint = 0;
function slideMotion(targetElement, slideDir, moveval, period, timeout, statestart) {
    /*
      Timeout is the time inbetween the slide motions while
      stateStart is a value of 1 for motion firing off on pageload or
       0 for motion that waits the timeout period specified then changes to
       1 for continued motion.  
    */

    // // console.log(targetElement,slideDir,moveval,period,timeout,statestart);
    if (statestart == "stop") {
        window.clearTimeout(slideFunction);
        // slideFunction=window.setTimeout("slideMotion('"+targetElement+"','"+slideDir+"','"+moveval+"','"+period+"','"+timeout+"','stop')",timeout);
    } else if (statestart == 1) {
        var curposleft = $('' + targetElement + '').css("left");
        curposleft2 = curposleft.split("p");
        curposleft2 = Math.floor(curposleft2[0]);
        var curposright = $('' + targetElement + '').css("right");
        var curposright2 = curposright.split("p");
        curposright2 = curposright2[0];
        var curpostop = $('' + targetElement + '').css("top");
        curpostop2 = curpostop.split("p");
        curpostop2 = Math.floor(curpostop2[0]);
        var curposbottom = $('' + targetElement + '').css("bottom");
        var curposbottom2 = curposbottom.split("p");
        curposbottom2 = Math.floor(curposbottom2[0]);
        var totalwidth = $('' + targetElement + '').width();
        var totalheight = $('' + targetElement + '').height();
        // // console.log(curposleft,curposright,curposright2,curpostop,curposbottom,totalwidth,totalheight);
        if (slideDir == "left") {
            if (curposleft == "auto" || curposleft2 < totalwidth - moveval) {
                $('' + targetElement + '').animate({
                    left: "+=" + moveval + ""
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    left: "0"
                }, period, function() {});
            }
        } else if (slideDir == "right") {
            if (curposright == "auto" || curposright2 < totalwidth - moveval) {
                $('' + targetElement + '').animate({
                    right: "+=" + moveval + ""
                }, 2000, function() {
                    slidePoint += 1;

                });
            } else {
                $('' + targetElement + '').animate({
                    right: "0"
                }, period, function() {});
            }
        } else if (slideDir == "bottom") {
            if (curposbottom == "auto" || curposbottom2 < totalheight - moveval) {
                $('' + targetElement + '').animate({
                    bottom: "+=" + moveval + ""
                }, 2000, function() {});
            } else {
                $('' + targetElement + '').animate({
                    bottom: "0"
                }, period, function() {});
            }
        } else if (slideDir == "top") {
            if (curpostop == "auto" || curpostop2 < totalheight - moveval) {
                $('' + targetElement + '').animate({
                    top: "+=" + moveval + ""
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    top: "0"
                }, period, function() {});
            }
        }
        if (statestart == "stop") {
            clearTimeout(slideFunction);
        } else if (timeout !== "" && timeout > 0) {
            slideFunction = window.setTimeout("slideMotion('" + targetElement + "','" + slideDir + "'," + moveval + "," + period + "," + timeout + "," + statestart + ")", timeout);
        }
    } else if (statestart == 0) {
        slideFunction = window.setTimeout("slideMotion('" + targetElement + "','" + slideDir + "'," + moveval + "," + period + "," + timeout + ",1)", timeout);
    } else {

        // // console.log(curposleft,curposright,curposright2,curpostop,curposbottom,totalwidth,totalheight);
        if (slideDir == "left") {
            if (curposleft == "auto" || curposleft2 < totalwidth - moveval) {
                $('' + targetElement + '').animate({
                    left: "+=" + moveval + ""
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    left: "0"
                }, period, function() {});
            }
        } else if (slideDir == "right") {
            if (curposright == "auto" || curposright2 < totalwidth - moveval) {
                $('' + targetElement + '').animate({
                    right: "+=" + moveval + ""
                }, 2000, function() {});
            } else {
                $('' + targetElement + '').animate({
                    right: "0"
                }, period, function() {});
            }
        } else if (slideDir == "bottom") {
            if (curposbottom == "auto" || curposbottom2 < totalheight - moveval) {
                $('' + targetElement + '').animate({
                    bottom: "+=" + moveval + ""
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    bottom: "0"
                }, period, function() {});
            }
        } else if (slideDir == "top") {
            if (curpostop == "auto" || curpostop2 < totalheight - moveval) {
                $('' + targetElement + '').animate({
                    top: "+=" + moveval + ""
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    top: "0"
                }, period, function() {});
            }
        }
    }

}
//control mobile panel toggle
$(document).on("click", "a[data-name=navbartoggle],div[data-name=navbartoggle]", function() {
    // console.log($(this)," active element");
    var state = $(this).attr("data-state");
    var target = $(this).attr("data-target");
    var pullstyle = $(this).attr("data-pullstyle");
    if (state == "inactive") {
        $('' + target + '').addClass('activepanel');
        $(this).attr("data-state", "active");
        $(this).addClass("toggleactive");
    } else if (state == "active") {
        $('' + target + '').removeClass('activepanel');
        $(this).removeClass('toggleactive');
        $(this).attr("data-state", "inactive");
    }
});
// control auto generation of links for the mobile option
if ($('#linkspanel ul')) {
    var children = $('#linkspanel ul a').clone();
    $('.mobile-panel ul.mobile-links').html(children);
}

$(document).on("click", "div[data-name=dropperpoint]", function() {
    var curstate = $(this).attr("data-state");
    var rotatetarget = $(this).attr("data-rotatetarget");
    var target = $(this).attr("data-target");
    var target_height = $('div[data-targetname=' + target + '] .displaydropperhold').height();
    // console.log($('div[data-targetname='+target+'] .displaydropperhold'),target_height);
    if (curstate == "inactive") {
        $(this).css({
            "-webkit-transform": "rotate(90deg)",
            "moz-transform": "rotate(90deg)",
            "o-transform": "rotate(90deg)",
            "-ms-transform": "rotate(90deg)"
        });
        $('div[data-targetname=' + target + ']').animate({
            height: "" + target_height + ""
        }, 1000, function() {
            $('div[data-targetname=' + target + ']').css("height", "auto");
        });
        $(this).attr("data-state", "active");
    } else if (curstate == "active") {
        $(this).attr("data-state", "inactive");
        $(this).css({
            "-webkit-transform": "rotate(0deg)",
            "moz-transform": "rotate(0deg)",
            "o-transform": "rotate(0deg)",
            "-ms-transform": "rotate(0deg)"
        });

        $('div[data-targetname=' + target + ']').animate({
            height: "34"
        }, 1000, function() {});
    }
});
var contentslides = $('div#slidepointhold div#slidepoint').length;
if (contentslides > 0) {
    var fullslidelength = windowwidth * contentslides;
    var percenttotal = 100 * contentslides;
    $('div#slidepointhold[data-name=homeslider]').attr("data-slides", "" + contentslides + "").css("width", "" + fullslidelength + "px");
    var slidelength = $('div#slidepointhold[data-name=homeslider] div#slidepoint').width();
    // // console.log($('div#slidepointhold[data-name=homeslider]'),percenttotal);
    slideMotionResponsive('div#slidepointhold[data-name=homeslider]', "left", 100, 1000, 20000, 0);
} else {
    $('div#slidepointhold').css("display", "none");
}
function slideMotionResponsive(targetElement, slideDir, moveval, period, timeout, statestart) {
    /*
    Timeout is the time inbetween the slide motions while
    stateStart is a value of 1 for motion firing off on pageload or
     0 for motion that waits the timeout period specified then changes to
     1 for continued motion.  
    */
    var parentcontent = $('' + targetElement + '').attr("data-slides");
    var slidelength = $('' + targetElement + ' div#slidepoint').width();
    var curposleft = $('' + targetElement + '').css("left");
    if (curposleft.indexOf("px") > -1) {
        var curposleft2 = curposleft.split("p");
        curposleft2 = Math.floor(curposleft2[0]);
    } else if (curposleft.indexOf("%") > -1) {
        var curposleft2 = curposleft.split("%");
        curposleft2 = Math.floor(curposleft2[0]);
    }

    var curposright = $('' + targetElement + '').css("right");
    var curposright2 = curposright.split("p");
    curposright2 = curposright2[0];

    var percentlast = 100 * parentcontent - 100;
    var totpercent = parentcontent * slidelength;
    var lastpoint = slidelength - totpercent;
    var totalwidth = slidelength * 100;
    var totalheight = $('' + targetElement + '').height();

    // // console.log(targetElement,slideDir,moveval,period,timeout,statestart);
    // // console.log(curposleft,lastpoint,slidelength,parentcontent);
    if (statestart == "stop") {
        window.clearTimeout(slideFunctionResponsive);
        // slideFunction=window.setTimeout("slideMotion('"+targetElement+"','"+slideDir+"','"+moveval+"','"+period+"','"+timeout+"','stop')",timeout);
    } else if (statestart == 1) {
        /*var curpostop=$(''+targetElement+'').css("top");
        curpostop2=curpostop.split("p");
        curpostop2=Math.floor(curpostop2[0]);
        var curposbottom=$(''+targetElement+'').css("bottom");
        var curposbottom2=curposbottom.split("p");
        curposbottom2=Math.floor(curposbottom2[0]);*/
        if (slideDir == "left") {
            if (curposleft2 > lastpoint) {
                $('' + targetElement + '').animate({
                    left: "-=" + moveval + "%"
                }, period, function() {});
            } else {
                $('' + targetElement + '').animate({
                    left: "0%"
                }, period, function() {});
            }
        } else if (slideDir == "right") {
            if (curposright2 < lastpoint) {
                $('' + targetElement + '').animate({
                    right: "+=" + moveval + "%"
                }, period, function() {
                    slidePoint += 1;

                });
            } else {
                $('' + targetElement + '').animate({
                    right: "0%"
                }, period, function() {});
            }
        }
    }

}
var blockanim = false;
//for responsiveslide drag effect
$(document).on("mousedown", "div#slidepointhold", function(e) {
    // console.log(e.clientX,slideFunctionResponsive);
    clearTimeout(slideFunctionResponsive);
});

//end
// for contentpreviewoptions options click 
$(document).on("click", ".contentpreviewoptions > a.option", function() {
    // get the parent
    var mainparent=$(this).parent().parent().parent();
    var datastate=$(this).attr("data-state");
    if (datastate === null || datastate === undefined || datastate === NaN) {
        datastate = "";
    }
    // console.log('mainparent:',mainparent);

    if(datastate==""||datastate=="inactive"){
        // search the parent for elements that have the .coptionpoint._hold class
        mainparent.find(".coptionpoint._hold").removeClass('_hold')
        $(this).attr("data-state","active");
        $(this).find('i').attr("class","fa fa-eye-slash");
        // console.log('options hold:',mainparent.find(".coptionpoint._hold"));

    }else if(datastate=="active"){
        mainparent.find(".coptionpoint").addClass('_hold');
        $(this).attr("data-state","inactive");
        $(this).find('i').attr("class","fa fa-gear fa-spin");
    }

})

// for responsive slides pointers works with slidepoint plugin
$(document).on("click", "div#slidepointleft[data-state=idle],div#slidepointright[data-state=idle]", function() {
    event.stopPropagation();
    clearTimeout(slideFunctionResponsive);
    var direction = $(this).attr("data-motion");
    $(this).attr("data-state", "running");
    var target = $(this).attr("data-target");
    var parentlength = $('div#slidepointhold[data-name=' + target + ']').width();
    var slidelength = $('div#slidepointhold[data-name=' + target + '] div#slidepoint').width();
    var parentcontent = $('div#slidepointhold[data-name=' + target + ']').attr("data-slides");
    var parpos = $('').css('left');
    var curposleft = $('div#slidepointhold[data-name=' + target + ']').css("left");
    if (curposleft.indexOf("px") > -1) {
        var curposleft2 = curposleft.split("p");
        curposleft2 = Math.floor(curposleft2[0]);
    } else if (curposleft.indexOf("%") > -1) {
        var curposleft2 = curposleft.split("%");
        curposleft2 = Math.floor(curposleft2[0]);
    }
    ;var percentlast = 100 * parentcontent - 100;
    var totpercent = parentcontent * slidelength;
    var lastpoint = slidelength - totpercent;
    // // console.log(curposleft,lastpoint);
    var moveval = 100;
    var slideDir = "left";
    var period = 3000;
    var timeout = 20000;
    var statestart = 0;
    if (direction == "left") {
        if (curposleft2 > lastpoint && blockanim == false) {
            blockanim = true;
            $('div#slidepointhold[data-name=' + target + ']').animate({
                left: '-=100%'
            }, 1000, function() {
                /*    var firstel=$('div#slidepointhold[data-name='+target+'] div#slidepoint')[0];
    $('div#slidepointhold[data-name='+target+'] div#slidepoint')[0].remove;
    $(firstel).insertAfter('div#slidepointhold[data-name='+target+'] div#slidepoint:last');*/
                slideFunctionResponsive = window.setTimeout("slideMotionResponsive('div#slidepointhold[data-name=" + target + "]','" + slideDir + "'," + moveval + "," + period + "," + timeout + "," + statestart + ")", timeout);
                blockanim = false;
                $('div#slidepointright[data-motion=left]').attr("data-state", "idle");
                // // console.log($('div#slidepointhold[data-name='+target+'] div[data-motion=left]'));
            });
        } else if (curposleft2 <= lastpoint && blockanim == false) {
            blockanim = true;
            $('div#slidepointhold[data-name=' + target + ']').animate({
                left: '0%'
            }, 1000, function() {
                slideFunctionResponsive = window.setTimeout("slideMotionResponsive('div#slidepointhold[data-name=" + target + "]','" + slideDir + "'," + moveval + "," + period + "," + timeout + "," + statestart + ")", timeout);
                blockanim = false;
                // // console.log($('div#slidepointright[data-target='+target+']'));
                $('div#slidepointright[data-motion=left]').attr("data-state", "idle");
            });
        }
    } else if (direction == "right") {
        var slidelast = $('div#slidepointhold[data-name=' + target + '] div#slidepoint').length - 1;
        var lastel = $('div#slidepointhold[data-name=' + target + '] div#slidepoint')[0];
        if (curposleft2 < 0) {
            blockanim = true;
            $('div#slidepointhold[data-name=' + target + ']').animate({
                left: '+=100%'
            }, 1000, function() {
                blockanim = false;
                $('div#slidepointleft[data-motion=right]').attr("data-state", "idle");
            });
        } else if (curposleft2 == 0) {
            blockanim = true;
            $('div#slidepointhold[data-name=' + target + ']').animate({
                left: '-' + percentlast + '%'
            }, 1000, function() {
                blockanim = false;
                $('div#slidepointleft[data-motion=right]').attr("data-state", "idle");
            });
        }
    }
});
//end
// instantiate multiple jplayer elements
function js_audioPlayer(file, location) {
    $(document).ready(function() {

        $("#jquery_jplayer_" + location).jPlayer({
            ready: function() {
                jQuery(this).jPlayer("setMedia", {
                    mp3: file
                });
            },
            cssSelectorAncestor: "#jp_interface_" + location,
            swfPath: "/swf"
        });
    });
    return;
}

// function to parse funcdata input value of the gdmodule library
/**
*   @params JSONObject, json  carries all the values needed for the function to parse 
*
*   @return array, output carries the final string(s) for the parsed json data
*/
function parseDataFunc(json){
    // the json parameter passed through here must have the following
    // indexes/objects
    // func - array, this represents the method to be called on a selector
    // selectors - array, this represents the selectors the method is to be called on
    // type - array, this represents the nature of the parameters sent to the method
    // specifying if they are encapsulated in parentheses from the start e.g 
    // .select2({}) or are just plain e.g .select2('');
    // params - array this represents the parameters to be passed into the method
    // being called the values here are created singular or in twos, meaning that 
    // everytwo values represents a potential key and value pair in the method or
    // a single value pair, depending on the corresponding 'type' value provided

    var output=[];
    var doparse="false";
    var dodeleteparse="false";
    var func="";
    var selectors="";
    var typegd="";
    var params="";
    var dselectors="";
    var dtypegd="";
    var dparams="";
    if(typeof json.func !=="undefined"&& Array.isArray(json.func)===true&&json.func[0]!==""){
        func=json.func;
        doparse="true"; 
    }
    if(typeof json.selectors !=="undefined"&& Array.isArray(json.selectors)===true&&json.selectors[0]!==""){
        selectors=json.selectors;
        doparse="true"; 
    }
    if(typeof json.typegd !=="undefined"&& Array.isArray(json.typegd)===true&&json.typegd[0]!==""){
        typegd=json.typegd;
        doparse="true"; 
    }
    if(typeof json.params !=="undefined"&& Array.isArray(json.params)===true&&json.params[0]!==""){
        params=json.params;
        doparse="true"; 
    }

    if(typeof json.dselectors !=="undefined"&& Array.isArray(json.dselectors)===true&&json.dselectors[0]!==""){
        dselectors=json.dselectors;
        dodeleteparse="true"; 
    }
    if(typeof json.dtypegd !=="undefined"&& Array.isArray(json.dtypegd)===true&&json.dtypegd[0]!==""){
        dtypegd=json.dtypegd;
        dodeleteparse="true"; 
    }
    if(typeof json.dparams !=="undefined"&& Array.isArray(json.dparams)===true&&json.dparams[0]!==""){
        dparams=json.dparams;
        dodeleteparse="true"; 
    }



    var curoutput="";
    if(doparse=="true"){
        var flen=func.length;
        for(var i=0;i<flen;i++){
            curfuncname=func[i];
            curselector=selectors[i];
            curtype=typegd[i];
            
            curparams=params[i];
            var cplen=curparams.length;
            // console.log("curparams: ",curparams, " cplen: ",cplen);
            var curparamsout="";
            if(curtype=="encapsjq"){
                for (var t=0;t<cplen;t+=2){
                    
                    var coma= t<cplen-2?",":"";
                    
                    ckey=curparams[t];
                    cval=curparams[t+1];
                    // console.log("ckey: ",ckey," cval: ",cval);
                    // replace the sign `` with a single quote;
                    cval=cval.replace(/``/g, "'");
                    // replace the sign ~~ with a double quote;
                    cval=cval.replace(/~~/g, '"');

                    curparamsout+=ckey+":"+cval+coma;
                        

                }
                curparamsout='{'+curparamsout+'}';
            }else if(curtype=="plainjq"){
                for (var t=0;t<cplen;t++){
                    var coma="";
                    t<cplen?coma=",":coma="";
                    cval=curparams[t];
                    curparamsout+='\''+cval+'\''+coma+'';
                }
            }

            curoutput+="$('"+curselector+"')."+curfuncname+"("+curparamsout+");";
        }

    }

    var curdoutput="";
    if(dodeleteparse=="true"){
        var flen=func.length;
        for(var i=0;i<flen;i++){
            curfuncname=func[i];
            curselector=dselectors[i];
            curtype=dtypegd[i];
            
            curparams=dparams[i];
            var cplen=curparams.length;
            var curparamsout="";
            if(curtype=="encapsjq"){
                for (var t=0;t<cplen;t+=2){
                    
                    var coma= t<cplen-2?",":"";
                    
                    ckey=curparams[t];
                    cval=curparams[t+1];
                    // replace the sign `` with a single quote;
                    cval=cval.replace(/``/g, "'");
                    // replace the sign ~~ with a double quote;
                    cval=cval.replace(/~~/g, '"');

                    curparamsout+=ckey+":"+cval+coma;
                        

                }
                curparamsout='{'+curparamsout+'}';
            }else if(curtype=="plainjq"){
                for (var t=0;t<cplen;t++){
                    
                    var coma=t<cplen-1?",":"";
                    
                    cval=curparams[t];

                    curparamsout+='\''+cval+'\''+coma;
                        

                }
            }

            curdoutput+="$('"+curselector+"')."+curfuncname+"("+curparamsout+");";
        }

    }
    output['output']=curoutput;
    output['doutput']=curdoutput;
    output['totaloutput']=curdoutput+" "+curoutput;
    // console.log("output: ",output);
    return output;
};


// for handling forms that have steps 
function doFormStepMainLib(targetElement) {
    // // console.log(targetElement,typeof targetElement);
    if (typeof targetElement == "object") {
        var pstep = $(targetElement).attr("data-cmonitor")
          , datapoint = $(targetElement).attr("data-pointer");
    } else if (typeof (targetElement) == "string") {
        var pstep = $('' + targetElement + '').attr("data-cmonitor")
          , datapoint = $('' + targetElement + '').attr("data-pointer");
    }
    var prevdatapoint = Math.floor(datapoint) - 1;
    $('div[data-smonitortype][data-cmonitor=' + pstep + '] div[data-stepc]').hide();
    $('div[data-smonitortype][data-cmonitor=' + pstep + '] div[data-stepc=' + datapoint + ']').show();
    // update the step at the top of the display i.e Step 1, Step 2 part of it
    $('ul[data-smonitortype][data-cmonitor=' + pstep + '] li').removeClass("active");
    // update the previous step to show completion
    if (prevdatapoint > 0) {
        $('ul[data-smonitortype][data-cmonitor=' + pstep + '] li[data-stepc=' + prevdatapoint + ']').addClass("completed");
    }
    $('ul[data-smonitortype][data-cmonitor=' + pstep + '] li[data-stepc=' + datapoint + ']').addClass("active").removeClass("completed");
}
function loadFullDisplayAfterLoad(timeout, content) {
    setTimeout(function() {
        var topdistance = $(window).scrollTop();
        //insert the content into your target div

        if (topdistance > 100) {
            var mainheight = $('#main').height();
            $('#fullcontenthold').css("margin-top", "" + topdistance + "px");
        } else {
            $('#fullcontenthold').css("margin-top", "0px");
        }
        $('#fullbackground').fadeIn(1000);
        $('#fullcontenthold').fadeIn(1000);
        $('#fullcontent').html(content).fadeIn(1000);
        // console.log("ran load display");
        clearTimeout();
    }, timeout);
}
/*
//subscriber display information
<div class="subcribe-display">  <div class="minilogo"><img class="minilogo-logo" src="./images/muyiwalogo5.png"/></div>  <h2 class="subscribe-heading">Subscribe</h2>  <p class="subscribe-text">    Hope you are Enjoying your reading?    <br>If you want more simply drop your email address below and we will    add you to our list.<br>    You'll get instant access to our latest Frankly Speaking Content.<br>  </p>  <form name="franklyspeakingblogsubscriptiontwo" method="POST" onSubmit="" action="./snippets/basicsignup.php">    <input type="hidden" name="entryvariant" value="franklyspeakingblogsubscription"/>    <div id="formend"><input type="text" style="text-align:center;"name="email" placeholder="Enter email here..." value=""class="curved"/></div>    <div id="formend"><input type="button" class="submitbutton two" name="franklyspeakingblogsubscriptiontwo" value="Subscribe"/></div>  </form></div>
*/
//for approximation to particular decimal places
(function() {

    /**
   * Decimal adjustment of a number.
   *
   * @param {String}  type  The type of adjustment.
   * @param {Number}  value The number.
   * @param {Integer} exp   The exponent (the 10 logarithm of the adjustment base).
   * @returns {Number}      The adjusted value.
   */
    function decimalAdjust(type, value, exp) {
        // If the exp is undefined or zero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // If the value is not a number or the exp is not an integer...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Decimal round
    if (!Math.round10) {
        Math.round10 = function(value, exp) {
            return decimalAdjust('round', value, exp);
        }
        ;
    }
    // Decimal floor
    if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
            return decimalAdjust('floor', value, exp);
        }
        ;
    }
    // Decimal ceil
    if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
            return decimalAdjust('ceil', value, exp);
        }
        ;
    }
})();

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function bootPagInit(total, curquery, ipp, selector="", data=[]) {
    selector == "" ? selector = '.generic_ajax_pages_hold._top._test, .generic_ajax_pages_hold._bottom._test' : selector = selector;
    var datatarget = data['datatarget'] !== null && data['datatarget'] !== undefined && data['datatarget'] !== NaN && data['datatarget'] !== "" ? data['datatarget'] : 'div.generic_ajax_pages_hold div.page_content_out_hold._test';
    var dataitemloader = data['dataitemloader'] !== null && data['dataitemloader'] !== undefined && data['dataitemloader'] !== NaN && data['dataitemloader'] !== "" ? data['dataitemloader'] : 'div.content_image_loader_bootpag._test';
    var outputtype = data['outputtype'] !== null && data['outputtype'] !== undefined && data['outputtype'] !== NaN && data['outputtype'] !== "" ? data['outputtype'] : '';

    $(selector).bootpag({
        total: total,
        page: 1,
        maxVisible: 9,
        leaps: true,
        firstLastUse: true,
        first: '<i class="fa fa-arrow-left"></i>',
        last: '<i class="fa fa-arrow-right"></i>',
        wrapClass: 'pagination',
        dataquery: true,
        datacurquery: curquery,
        dataipp: ipp,
        dataoutputtype: outputtype,
        dataselectorset: selector,
        datavariant: true,
        datapages: [15, 25, 40, 60],
        datatarget: datatarget,
        dataitemloader: dataitemloader,
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(event, num) {
        event.preventDefault();
        var curtimestamp = parseInt(event.timeStamp);
        var doajax = "";
        var timetest = 0;
        // stop bootpag from running twice for dual pagination elements
        // on the same target
        if (timestamp == 0) {
            timestamp = curtimestamp;
        } else {
            timetest = parseInt(curtimestamp) - parseInt(timestamp);
            if (timetest <= 10) {
                doajax = "false";
            }
        }
        if (doajax == "") {
            timestamp = curtimestamp;
            var dataparent = $(this)[0].childNodes[1];
            if (dataparent.getAttribute("class").indexOf("pagination bootpag") > -1) {
                dataparent = $(this)[0].childNodes[2];
            }
            var endtarget = $(this)[0].parentNode.getElementsByClassName('page_content_out_hold')[0];
            var page = parseInt(num);
            var dipp = 15;
            var curquery = "";
            var outputtype = "";
            // console.log($(this)[0].parentNode.getElementsByClassName('content_image_loader_bootpag'),endtarget);
            var dcnl=dataparent.childNodes.length;
            for (var i = 0; i < dcnl; i++) {
                // console.log(dataparent.childNodes[i],dataparent.childNodes[i].name);
                if (dataparent.childNodes[i].name == "curquery") {
                    curquery = dataparent.childNodes[i].value;
                }
                if (dataparent.childNodes[i].name == "outputtype") {
                    outputtype = dataparent.childNodes[i].value;
                }
                if (dataparent.childNodes[i].name == "ipp") {
                    dipp = dataparent.childNodes[i].value;
                }

            }
            // for testing purposes only
            // outputtype="";

            // var item_loader=$(this)[0].parentNode.getElementById('content_image_loader_bootpag');
            var item_loader = $(this)[0].parentNode.getElementsByClassName('content_image_loader_bootpag')[0];
            item_loader.className = item_loader.className.replace(/(?:^|\s)hidden(?!\S)/g, '');
            // console.log(item_loader,item_loader.className);
            // item_loader.removeClass('hidden');
            var url = '' + host_addr + 'snippets/display.php';
            var opts = {
                type: 'GET',
                url: url,
                data: {
                    displaytype: 'paginationpagesout',
                    ipp: dipp,
                    curquery: curquery,
                    outputtype: outputtype,
                    page: num,
                    loadtype: 'jsonloadalt',
                    extraval: "admin"
                },
                dataType: 'json',
                success: function(output) {
                    // console.log(endtarget);
                    // console.log(output);
                    item_loader.className += ' hidden';
                    // item_loader.addClass('hidden').css("display","");
                    // item_loader.remove();
                    if (output.success == "true") {
                        endtarget.innerHTML = output.msg;
                    }
                },
                error: function(error) {
                    if (typeof (error) == "object") {
                        console.log(error.responseText);
                    }
                    var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                    // item_loader.remove();
                    item_loader.className += ' hidden';
                    raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                    // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                }
            };
            $.ajax(opts)
            // console.log(event,$(this)[0].childNodes,dataparent);
            // get the datadiv refereence
            // $(".content4").html("Page " + num); // or some ajax content loading...
            // $(this).addClass("current");

        }

    });
}
timestamp = 0;
function doBootPagReInit(total, curquery, ipp, selector="", data=[]) {
    if (curquery.indexOf("|-|-|") > -1) {// perform deobfuscation on the query entry
    }
    selector == "" ? selector = '.generic_ajax_pages_hold._top._test, .generic_ajax_pages_hold._bottom._test' : selector = selector;
    var datatarget = data['datatarget'] !== null && data['datatarget'] !== undefined && data['datatarget'] !== NaN && data['datatarget'] !== "" ? data['datatarget'] : 'div.generic_ajax_pages_hold div.page_content_out_hold._test';
    var dataitemloader = data['dataitemloader'] !== null && data['dataitemloader'] !== undefined && data['dataitemloader'] !== NaN && data['dataitemloader'] !== "" ? data['dataitemloader'] : 'div.content_image_loader_bootpag._test';
    var outputtype = data['outputtype'] !== null && data['outputtype'] !== undefined && data['outputtype'] !== NaN && data['outputtype'] !== "" ? data['outputtype'] : '';

    $(selector).bootpag({
        total: total,
        page: 1,
        maxVisible: 9,
        leaps: true,
        firstLastUse: true,
        first: '<i class="fa fa-arrow-left"></i>',
        last: '<i class="fa fa-arrow-right"></i>',
        wrapClass: 'pagination',
        dataquery: true,
        datacurquery: curquery,
        dataipp: ipp,
        dataoutputtype: outputtype,
        dataselectorset: selector,
        datavariant: true,
        datapages: [15, 25, 40, 60],
        datatarget: datatarget,
        dataitemloader: dataitemloader,
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    })
}

// bootpag demo setup test and 
$(document).ready(function() {
    if ($.fn.bootpag) {
        var timestamp = 0;
        var pagsetdata = "";
        $('.generic_ajax_pages_hold._top._test, .generic_ajax_pages_hold._bottom_test').bootpag({
            total: 15,
            page: 1,
            maxVisible: 9,
            leaps: true,
            firstLastUse: true,
            first: '<i class="fa fa-arrow-left"></i>',
            last: '<i class="fa fa-arrow-right"></i>',
            wrapClass: 'pagination',
            dataquery: true,
            datacurquery: "SELECT * FROM capitalexpenditure ORDER BY code desc",
            dataipp: 15,
            datavariant: true,
            datapages: [15, 25, 40, 60],
            datatarget: '.page_content_out_hold_test',
            dataitemloader: '.content_image_loader_bootpag_test',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num, a) {
            event.preventDefault();
            // console.log($(this).parent(),this,a,a.datatarget);
            var curtimestamp = parseInt(event.timeStamp);
            var doajax = "";
            var timetest = 0;
            // stop bootpag from running twice for dual pagination elements
            // on the same target
            if (timestamp == 0) {
                timestamp = curtimestamp;
            } else {
                timetest = parseInt(curtimestamp) - parseInt(timestamp);
                if (timetest <= 10) {
                    doajax = "false";
                }
            }
            if (doajax == "") {
                timestamp = curtimestamp;
                var dataparent = $(this)[0].childNodes[1];
                if (dataparent.getAttribute("class").indexOf("pagination bootpag") > -1) {
                    dataparent = $(this)[0].childNodes[2];
                }

                // var endtarget=$(this).parent().find(a.datatarget);
                var endtarget = $(this).parent().find(a.datatarget);
                var page = parseInt(num);
                var dipp = a.dataipp;
                var curquery = a.dataquery;
                var outputtype = "";
                // console.log($(this)[0].parentNode.getElementsByClassName('content_image_loader_bootpag'),endtarget);
                var dcnl=dataparent.childNodes.length;
                for (var i = 0; i < dcnl; i++) {
                    // console.log(dataparent.childNodes[i],dataparent.childNodes[i].name);
                    if (dataparent.childNodes[i].name == "curquery") {
                        curquery = dataparent.childNodes[i].value;
                    }
                    if (dataparent.childNodes[i].name == "outputtype") {
                        outputtype = dataparent.childNodes[i].value;
                    }
                    if (dataparent.childNodes[i].name == "ipp") {
                        dipp = dataparent.childNodes[i].value;
                    }

                }
                // for testing purposes only
                outputtype = "";

                // var item_loader=$(this)[0].parentNode.getElementById('content_image_loader_bootpag');
                var item_loader = $(this).parent().find(a.dataitemloader);
                // var item_loader=$(this)[0].parent.find(a.dataitemloader);
                item_loader.removeClass('hidden');
                // item_loader.className=item_loader.className.replace( /(?:^|\s)hidden(?!\S)/g , '' );
                // console.log(item_loader,item_loader.className);
                // item_loader.removeClass('hidden');
                var url = '' + host_addr + 'snippets/display.php';
                var opts = {
                    type: 'GET',
                    url: url,
                    data: {
                        displaytype: 'paginationpagesout',
                        ipp: dipp,
                        curquery: curquery,
                        outputtype: outputtype,
                        page: num,
                        loadtype: 'jsonloadalt',
                        extraval: "admin"
                    },
                    dataType: 'json',
                    success: function(output) {
                        // console.log(endtarget);
                        // console.log(output);
                        item_loader.className += ' hidden';
                        // item_loader.addClass('hidden').css("display","");
                        // item_loader.remove();
                        if (output.success == "true") {
                            endtarget.innerHTML = output.msg;
                        }
                    },
                    error: function(error) {
                        if (typeof (error) == "object") {
                            console.log(error.responseText);
                        }
                        var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                        // item_loader.remove();
                        // item_loader.className +=' hidden';
                        item_loader.addClass('hidden');
                        raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                        // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                    }
                };
                $.ajax(opts)
                // console.log(event,$(this)[0].childNodes,dataparent);
                // get the datadiv refereence
                // $(".content4").html("Page " + num); // or some ajax content loading...
                // $(this).addClass("current");

            }

        });
        var timestampselect = 0;
        $(document).on("click", "select[name=general_ipp_select]", function() {
            var ipp = $(this).val();
            var ipp2 = $(this).attr("data-curipp");
            var selectorset = $(this).attr("data-selector");
            if (selectorset === null || selectorset === undefined || selectorset === NaN) {
                var selectorset = "";
            }
            if (selectorset == "") {
                selectorset = '.generic_ajax_pages_hold._top._test, .generic_ajax_pages_hold._bottom._test';
            }

            var datatarget = $(this).attr("data-target");
            if (datatarget === null || datatarget === undefined || datatarget === NaN) {
                var datatarget = "";
            }
            if (datatarget == "") {
                datatarget = '.generic_ajax_pages_hold._top._test, .generic_ajax_pages_hold._bottom._test';
            }
            console.log("Selector: ", selectorset);
            if (ipp !== ipp2 && ipp !== "") {
                var dataparent = $(this).parent().parent().parent()[0].childNodes[1];
                var bootpagul = $(this).parent().parent().parent()[0].childNodes[0];
                if (dataparent.getAttribute("class").indexOf("pagination bootpag") > -1) {
                    bootpagul = dataparent;
                    dataparent = $(this).parent().parent().parent()[0].childNodes[2];
                }

                var endtarget = $(this).parent().parent().parent().parent()[0].getElementsByClassName('page_content_out_hold')[0];
                var page = 1;
                var dipp = parseInt(ipp);
                var curquery = "";
                var outputtype = "";
                // console.log(dataparent,$(this).parent().parent().parent().parent()[0].getElementsByClassName('content_image_loader_bootpag'),endtarget,bootpagul);
                var dcnl=dataparent.childNodes.length
                for (var i = 0; i < dcnl; i++) {
                    // console.log(dataparent.childNodes[i],dataparent.childNodes[i].name);
                    if (dataparent.childNodes[i].name == "curquery") {
                        curquery = dataparent.childNodes[i].value;
                    }
                    if (dataparent.childNodes[i].name == "outputtype") {
                        outputtype = dataparent.childNodes[i].value;
                    }
                    if (dataparent.childNodes[i].name == "datatarget") {
                        datatarget = dataparent.childNodes[i].value;
                    }

                }
                // for testing purposes only
                // outputtype="";
                // var item_loader=$(this)[0].parentNode.getElementById('content_image_loader_bootpag');
                var item_loader = $(this).parent().parent().parent().parent()[0].getElementsByClassName('content_image_loader_bootpag')[0];
                item_loader.className = item_loader.className.replace(/(?:^|\s)hidden(?!\S)/g, '');
                // console.log(item_loader,item_loader.className);
                // item_loader.removeClass('hidden');
                var url = '' + host_addr + 'snippets/display.php';
                var cname = "." + item_loader.className;
                cname = cname.replace(/\s{2,}/g, '').replace(/\s/g, ".");
                // console.log("curitemloader - ",cname," datatarget - ",datatarget," outputtype - ", outputtype);
                // reinit data
                var data = [];
                data['datatarget'] = datatarget;
                data['dataitemloader'] = cname;
                data['outputtype'] = outputtype;
                // pulls the new result count for the ipp(Instances per page) value
                var opts = {
                    type: 'GET',
                    url: url,
                    data: {
                        displaytype: 'paginationpages',
                        ipp: dipp,
                        curquery: curquery,
                        outputtype: outputtype,
                        page: page,
                        loadtype: 'bootpag',
                        extraval: "admin"
                    },
                    dataType: 'json',
                    success: function(output) {
                        // console.log(endtarget);
                        // console.log(output);
                        // item_loader.className +=' hidden';
                        // item_loader.addClass('hidden').css("display","");
                        // item_loader.remove();
                        if (output.success == "true") {
                            // endtarget.innerHTML=output.msg;
                            // reinitialise the pagination fields to the new count
                            // empty previous bootpag containers and populate them
                            $('' + selectorset + '').html("");
                            doBootPagReInit(output.resultcount, curquery, ipp, selectorset, data);

                        }
                    },
                    error: function(error) {
                        if (typeof (error) == "object") {
                            console.log(error.responseText, error);
                        }
                        var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                        // item_loader.remove();
                        item_loader.className += ' hidden';
                        raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                        // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                    }
                };
                $.ajax(opts)
                // pulls the new content for the page display
                var opts2 = {
                    type: 'GET',
                    url: url,
                    data: {
                        displaytype: 'paginationpagesout',
                        ipp: dipp,
                        curquery: curquery,
                        outputtype: outputtype,
                        page: page,
                        loadtype: 'jsonloadalt',
                        extraval: "admin"
                    },
                    dataType: 'json',
                    success: function(output) {
                        console.log(endtarget);
                        console.log(output);
                        item_loader.className += ' hidden';
                        // item_loader.addClass('hidden').css("display","");
                        // item_loader.remove();
                        if (output.success == "true") {
                            endtarget.innerHTML = output.msg;
                        }
                    },
                    error: function(error) {
                        if (typeof (error) == "object") {
                            console.log(error.responseText, error);
                        }
                        var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                        // item_loader.remove();
                        item_loader.className += ' hidden';
                        raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                        // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                    }
                };
                $.ajax(opts2)

            }
        })

    }

})

function count(obj) {
    var count = 0;
    for (var prop in obj) {
        if (obj.hasOwnProperty(prop)) {
            ++count;
        }
    }
    return count;
}

function countSingle(obj) {
    return Object.keys(obj).length;
}

function raiseMainModal(title, content, failsuccess, show="") {
    //for content bg and color controls
    var outclass = "";
    var inclass = "";
    // for button bg and color controls
    var btnoutclass = "";
    var btninclass = "";
    if (failsuccess == "fail") {
        outclass = 'bg-yellow-active bg-green-active color-darkgreen bg-aqua-active';
        inclass = 'bg-red-active color-white';
    } else if (failsuccess == "success") {
        outclass = 'bg-yellow-active bg-red-active color-red bg-aqua-active';
        inclass = 'bg-green-active color-darkgreen';
    } else if (failsuccess == "info") {
        outclass = 'bg-yellow-active bg-red-active color-red bg-green-active color-darkgreen';
        inclass = 'bg-aqua-active';
    } else if (failsuccess == "warning") {
        outclass = 'bg-red-active color-red bg-green-active color-darkgreen';
        inclass = 'bg-yellow-active';
    }
    // check to see if the modal element exists, otherwise create it
    var mainmodal = "";
    var mainmodalcontent = "";
    var mainmodaltitle = "";
    var mainmodalbody = "";
    var mainmodalfooter = "";
    var mainmodalbuttonone = "";
    var mainmodalbuttontwo = "";
    if (document.getElementById("mainPageModal") === null || document.getElementById("mainPageModal")) {
        var fullmodb = $('<!-- General Modal display section -->      <div id="mainPageModal" class="modal fade" data-backdrop="false" data-show="true" data-role="dialog">        <div class="modal-dialog">            <div class="modal-content">                <div class="modal-header">                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>                    <h4 class="modal-title">Message</h4>                </div>                <div class="modal-body">                </div>                <div class="modal-footer">                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>                </div>            </div>        </div>      </div>');
        $('body').append(fullmodb);
    }

    mainmodal = $("#mainPageModal");
    mainmodaltitle = $("#mainPageModal .modal-header .modal-title");
    mainmodalbody = $("#mainPageModal .modal-body");
    mainmodalcontent = $("#mainPageModal .modal-content");
    mainmodalfooter = $("#mainPageModal .modal-content .modal-footer");
    mainmodalbuttonone = $("#mainPageModal .modal-content .modal-footer .btn");

    // raise the success modal
    mainmodaltitle.html(title);
    mainmodalbody.html(content);
    mainmodalcontent.removeClass(outclass).addClass(inclass);

    if (show == "true" || show == "") {
        mainmodal.modal({
            show: true
        });
    } else if (show == "noclose") {}

}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
// function works with isotope gallery on the portfolio page
// triggers hover effect randomly on default for 4 elements in the 
// isotope gallery
testc = 0;
function doIsotopeGalleryHover(parentitemselector, isotopitemselector, timeout=500, triggerlim=4, delay=5000, liftclass='lift') {
    // get the total num of kid objects in parentitem
    var curlength = $('' + parentitemselector + ' ' + isotopitemselector + '').length;
    testc += 1;
    var count = 1;
    var trandout = "";
    for (var i = 1; i <= triggerlim; i++) {
        if (testc < 2) {
            var trand = randomIntFromInterval(1, 7);

        } else {
            var trand = randomIntFromInterval(1, curlength);

        }
        var trandelay = parseInt(delay) > 1999 ? randomIntFromInterval(2000, delay) : delay;
        if (!$('' + parentitemselector + ' ' + isotopitemselector + ':nth-of-type(' + trand + ')').hasClass(liftclass)) {
            if (count <= triggerlim) {
                trandout += trandout == "" ? trand : "," + trand;
                $('' + parentitemselector + ' ' + isotopitemselector + ':nth-of-type(' + trand + ')').addClass(liftclass).delay(trandelay).queue(function(nxt) {
                    $(this).removeClass(liftclass);
                    nxt();
                });
                count++;
            } else {
                count = 1;
            }
        }
    }
    count = 1;
    window.setTimeout(function() {
        doIsotopeGalleryHover(".cp-gallery", "figure.item", timeout, triggerlim, delay, liftclass);
    }, timeout);

    // console.log(trandout," ",testc);

    // console.log(Math.floor(testc++),curlength,count);
}
// infiniteload script can translate to infinite scroll
$(document).ready(function() {
    $(document).on("click", "a[data-ptrigger=true]", function() {
        // this block handles the pagination trigger system or "ptrigger" system
        // it simply takes the following parameters done below into consideration

        // type: state the associated data-ptype attribute for the current pagination trigger 
        // used in obtaining the top('pnph_top') and bottom(pnph_bottom) elements
        // flowtype: determines which point the result set is being fetched from, values are 
        // 'lastentryset' or 'nextentryset' specifying what they imply..., 'old content' and
        // 'new content' or feed
        // pagelastid: the last id for whatever result set has been displayed either top result set or bottom
        // pagelim: the limit of results to pull for the current request 
        // containerclass & containertag the css class and html tag used for the container element
        // objectclass & objecttag the css class and html tag used for the object element
        // the object element is the unit element of the paginated display

        var extraval = "";
        var celemdata = $(this);
        var type = $(this).attr("data-ptype") !== "" && typeof ($(this).attr("data-ptype")) !== "undefined" ? $(this).attr("data-ptype") : "";
        var flowtype = $(this).attr("data-pflow") !== "" && typeof ($(this).attr("data-pflow")) !== "undefined" ? $(this).attr("data-pflow") : "";
        var pagelastid = $(this).attr("data-plid") !== "" && typeof ($(this).attr("data-plid")) !== "undefined" ? $(this).attr("data-plid") : 0;
        var pagelim = $(this).attr("data-picou") !== "" && typeof ($(this).attr("data-picou")) !== "undefined" ? "LIMIT " + $(this).attr("data-picou").replace(/\:/g, ",") : "LIMIT 0,15";
        var containerclass = $(this).attr("data-ptobjp") !== "" && typeof ($(this).attr("data-ptobjp")) !== "undefined" ? $(this).attr("data-ptobjp") : "";
        var containertag = $(this).attr("data-ptobjptype") !== "" && typeof ($(this).attr("data-ptobjptype")) !== "undefined" ? $(this).attr("data-ptobjptype") : "";
        var objectclass = $(this).attr("data-ptobj") !== "" && typeof ($(this).attr("data-ptobj")) !== "undefined" ? $(this).attr("data-ptobj") : "";
        var objecttag = $(this).attr("data-ptobjtype") !== "" && typeof ($(this).attr("data-ptobjtype")) !== "undefined" ? $(this).attr("data-ptobjtype") : "";
        var objectstate = $(this).attr("data-state") !== "" && typeof ($(this).attr("data-state")) !== "undefined" ? $(this).attr("data-state") : "inactive";
        var entrytype = $(this).attr("data-ptobje") !== "" && typeof ($(this).attr("data-ptobje")) !== "undefined" ? $(this).attr("data-ptobje") : "";
        extraval = $(this).attr("data-peval") !== "" && typeof ($(this).attr("data-peval")) !== "undefined" ? $(this).attr("data-peval") : "";

        // get itemloader
        var item_loader = $('[class*=pnph_][data-ptype=' + type + '][data-pflow=' + flowtype + '] .pnph_loaderimg');
        // console.log(item_loader);
        // get endtargetcontainer and other container related elements
        // and set the insertion parameters
        var endcontainer = $('' + containertag + '' + containerclass + '');
        var endtarget = "";
        var n_of_type = "";
        if (entrytype.toLowerCase().indexOf("insertafter") > -1) {
            n_of_type = ":last-of-type";
        } else if (entrytype.toLowerCase().indexOf("insertbefore") > -1) {
            n_of_type = ":nth-of-type(1)";

        }
        endtarget = $('' + containertag + '' + containerclass + ' ' + objecttag + '' + objectclass + '' + n_of_type + '');

        // error checks and trigger validity
        var errmsg = "";
        var validitycheck = "";
        if (flowtype == "") {
            errmsg = 'Sorry the flowtype for this trigger is unspecified.';
            raiseMainModal('Dev error!!', '' + errmsg + '', 'fail');
            validitycheck = "fail";
        } else if (pagelastid == "") {
            errmsg = 'Corresponding "id" defined.';
            raiseMainModal('Dev error!!', '' + errmsg + '', 'fail');
            validitycheck = "fail";
        } else if (entrytype == "") {
            errmsg = 'Entry type is not defined.';
            raiseMainModal('Dev error!!', '' + errmsg + '', 'fail');
            validitycheck = "fail";
        } else if (containerclass == "" || containertag == "") {
            errmsg = 'No container class or tag specified.';
            raiseMainModal('Dev error!!', '' + errmsg + '', 'fail');
            validitycheck = "fail";
        } else if (objectclass == "" || objecttag == "") {
            errmsg = 'No object class or tag specified.';
            raiseMainModal('Dev error!!', '' + errmsg + '', 'fail');
            validitycheck = "fail";
        }
        // code block for handling paginationtype specific extravalues
        if (type == "gallerytest" || type == "gallery") {}
        celemdata.attr("data-state", "active");

        //proceed to main code work 
        if (validitycheck == "" && objectstate == "inactive") {
            item_loader.removeClass('hidden');
            var url = '' + host_addr + 'snippets/display.php';
            var opts = {
                type: 'POST',
                url: url,
                data: {
                    displaytype: 'refreshpagination',
                    paginationtype: type,
                    flowtype: flowtype,
                    limit: pagelim,
                    id: pagelastid,
                    entrytype: entrytype,
                    extraval: extraval,
                },
                dataType: 'json',
                success: function(output) {
                    // console.log(endtarget);
                    // console.log(output);
                    // item_loader.className +=' hidden';
                    item_loader.addClass('hidden').css("display", "");
                    // item_loader.remove();
                    if (output.success == "true") {
                        if (output.catdata !== "") {
                            var currows = parseInt(output.resultcount);
                            var curmax = parseInt(output.currentmax);
                            var nextmax = parseInt(output.nextmax);
                            var newmax = "";
                            if (nextmax !== "") {
                                newmax = curmax + ":" + nextmax;
                                celemdata.attr("data-picou", newmax);

                            }
                            // console.log("Ran Currows - ",currows," curmax - ",curmax," nextmax - ",nextmax);

                            // endtarget.=output.catdat;
                            celemdata.attr("data-state", "inactive");
                            if (entrytype.toLowerCase().indexOf("insertafter") > -1) {
                                $(output.catdata).insertAfter(endtarget);

                            } else if (entrytype.toLowerCase().indexOf("insertbefore") > -1) {
                                $(output.catdata).insertBefore(endtarget);

                            }
                        } else {
                            var errmsg = "Sorry, there are no more results";

                            raiseMainModal('No Results!!', '' + errmsg + '', 'info');
                            celemdata.attr("data-state", "inactive");

                        }
                    }
                },
                error: function(error) {
                    console.log("Error Type:", typeof (error));
                    if (typeof (error) == "object" || typeof (error) === "object") {
                        console.log("Error Response: ", error.responseText);
                    }
                    var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                    // item_loader.remove();
                    item_loader.addClass('hidden').css("display", "");
                    // item_loader.className +=' hidden';
                    raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                    // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                }
            };
            $.ajax(opts)
        }
    })
    // handle batch content delete trigger
    $(document).on("click", "a[data-name=deleteset]", function() {
        var delstate = $(this).attr("data-del-state");
        if (delstate === null || delstate === undefined || delstate === NaN) {
            var delstate = "";
        }
        if (delstate == "") {
            $(this).html('<i class="fa fa-ban"></i> Stop Delete');
        } else {
            $(this).html('<i class="fa fa-trash"></i> Delete Batch');

        }

        var datatype = $(this).attr("data-type");
        if (datatype === null || datatype === undefined || datatype === NaN) {
            var datatype = "";
        }
        var typename = $(this).attr("data-type-name");
        if (typename === null || typename === undefined || typename === NaN) {
            var typename = "";
        }
        var value = $(this).attr("data-type-value");
        if (value === null || value === undefined || value === NaN) {
            var value = "";
        }
        var state = $(this).attr("data-state");
        if (state === null || state === undefined || state === NaN) {
            var state = "";
        }

        if (datatype !== "" && typename !== "" && value !== "") {

            if (state !== "") {
                if (delstate == "") {
                    $('' + datatype + '[name*=' + typename + ']:' + state + '');
                    $(this).attr("data-del-state", "active");
                } else {
                    $('' + datatype + '[name*=' + typename + ']:un' + state + '');
                    $(this).attr("data-del-state", "");
                }

            } else {
                if (delstate == "") {
                    $('' + datatype + '[name*=' + typename + ']').val(value);
                    $(this).attr("data-del-state", "active");
                } else {
                    $('' + datatype + '[name*=' + typename + ']').val("");
                    $(this).attr("data-del-state", "");
                }

            }
            if (delstate == "") {
                var tarelemerr = 'Current set of entries have been set to be deleted on update, submit the form to perform delete operations';
                raiseMainModal('Delete System Active!!', tarelemerr, 'success');
            } else {
                var tarelemerr = 'Current set of entries have been removed from the delete set';
                raiseMainModal('Delete System Deactivated!!', tarelemerr, 'info');
            }

        } else {
            var tarelemerr = 'Delete System Error, missing trigger attribute values on batch delete object';

            raiseMainModal('Delete System Failure!!', tarelemerr, 'fail');
            console.log("Datatype - ", datatype, " typename - ", typename, " value - ", value, " state - ", state);
        }

    })
})

function goToByScroll(id, speedstyle="slow",type="id") {
    // Remove "link" from the ID
    // id = id.replace("link", "");
    // remove the # sign of its present
    if(type=="id"){
        id = id.replace("#", "");
        // Scroll
        $('html,body').animate({
            scrollTop: $("#" + id).offset().top
        }, '' + speedstyle + '');
    }else if(type=="selector"){
        $('html,body').animate({
            scrollTop: $(id).offset().top
        }, '' + speedstyle + '');
    }
}
function doIsotopeFiveGrid(container=".cp-gallery", item=".item") {
    $(document).ready(function() {
        var $container = $('' + container + '');
        var colWidth = function() {
            // console.log($container);
            var w = $container.width()
              , columnNum = 1
              , columnWidth = 0;
            if (w > 0) {
                columnNum = 5;
            } else if (w > 900) {
                columnNum = 4;
            } else if (w > 600) {
                columnNum = 3;
            } else if (w > 300) {
                columnNum = 2;
            }
            columnWidth = Math.floor(w / columnNum);
            $container.find('' + item + '').each(function() {
                var $item = $(this)
                  , multiplier_w = $item.attr('class').match(/item-w(\d)/)
                  , multiplier_h = $item.attr('class').match(/item-h(\d)/)
                  , width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth
                  , height = multiplier_h ? columnWidth * multiplier_h[1] * 0.5 : columnWidth * 0.5;
                $item.css({
                    width: width,
                    height: height
                });
            });
            return columnWidth;
        }
        isotope = function() {
            // console.log('ran');
            $container.isotope({
                resizable: false,
                itemSelector: '.item',
                masonry: {
                    columnWidth: colWidth(),
                    gutterWidth: 0
                }
            });
        }
        ;
        isotope();
        $(window).smartresize(isotope);
    })

}
function doFAPicker(thea) {
    // console.log("it was clicked");
    curval = thea.attr("value");
    icontitle = thea.attr("title");

    var target_input = thea.parent().parent().parent().parent().find('input[name=icontitle]');
    var target_display = thea.parent().parent().parent().parent().find('.currentfa i');
    var prevval = target_input.val();
    // console.log(target_input,target_display);
    if (prevval !== curval) {
        target_input.val(curval);
        target_display.attr("class", "fa " + curval);

    } else {
        target_input.val("");
        target_display.attr("class", "");
    }

}
function callTinyMCEInit(selector, data=[]) {
    theme = data['theme'] !== "" && typeof data['theme'] !== "undefined" ? data['theme'] : "modern";
    toolbar1 = data['toolbar1'] !== "" && typeof data['toolbar1'] !== "undefined" ? data['toolbar1'] : "";
    toolbar1addon = data['toolbar1addon'] !== "" && typeof data['toolbar1addon'] !== "undefined" ? data['toolbar1addon'] : "";
    toolbar2 = data['toolbar2'] !== "" && typeof data['toolbar2'] !== "undefined" ? data['toolbar2'] : "";
    toolbar2addon = data['toolbar2addon'] !== "" && typeof data['toolbar2addon'] !== "undefined" ? data['toolbar2addon'] : "";
    width = data['width'] !== "" && typeof data['width'] !== "undefined" ? data['width'] : "100%";
    height = data['height'] !== "" && typeof data['height'] !== "undefined" ? data['height'] : "250px";
    filemanagertitle = data['filemanagertitle'] !== "" && typeof data['filemanagertitle'] !== "undefined" ? data['filemanagertitle'] : "Content Filemanager";

    toolbar1 == "" ? toolbar1 = "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect" : toolbar1 = toolbar1;
    toolbar2 == "" ? toolbar2 = "| link unlink anchor | emoticons" : toolbar2 = toolbar2;

    // if you want to add content to the toolbar instead of replacing entirely
    toolbar1+=toolbar1addon;
    toolbar2+=toolbar2addon;
    var rfmanager= typeof data['rfmanager']!=="undefined" ?data['rfmanager']:"responsivefilemanager";
    // console.log("selector - ",selector," theme - ",theme," toolbar1 - ",toolbar1," toolbar2 - ",toolbar2," width - ",width," height - ",height," filemanagertitle - ",filemanagertitle);
    var extpath="" + host_addr + "scripts/filemanager/";
    var extplugin="filemanager";
    var extpath="" + host_addr + "scripts/filemanager/plugin.min.js";
    if(rfmanager==""){
        extplugins="";
        extpath="";
    }   
    tinyMCE.init({
        theme: theme,
        selector: selector,
        menubar: false,
        statusbar: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", 
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", 
            "save table contextmenu directionality emoticons template paste textcolor "+rfmanager+""
        ],
        width: width,
        height: height,
        toolbar1: toolbar1,
        toolbar2: toolbar2,
        image_advtab: true,
        editor_css: "" + host_addr + "stylesheets/mce.css?" + new Date().getTime(),
        content_css: "" + host_addr + "stylesheets/mce.css?" + new Date().getTime(),
        external_filemanager_path: extpath,
        filemanager_title: filemanagertitle,
        external_plugins: {
            extplugin : extpath
        }
    });
}


// make password fields viewable 
$(document).on("click",".pshow",function(){
  // console.log(this);
  var target=$(this).parent().find('input[data-type=password]');

  if($(this).hasClass('in')){
    target.attr("type","password");
    $(this).removeClass('in');
    $(this).find('i.fa').removeClass("fa-eye").addClass("fa-eye-slash");
  }else{
    target.attr("type","text");
    $(this).addClass('in');
    $(this).find('i.fa').removeClass("fa-eye-slash").addClass("fa-eye");
  }
})

function submitCustom(formname, stype="") {
    formit = [];
    var formstatus = true;
    var pointmonitor = false;
    if (typeof (tinyMCE) !== "undefined") {
        tinyMCE.triggerSave();
    }
    // var formname=typeof($(this).attr('data-formdata'))!=="undefined"?$(this).attr('data-formdata'):"contentform";
    // var formname=typeof($('input[name=formdata]'))!=="undefined"?$('input[name=formdata]').val():"contentform";
    // obtain
    var formmain=$('form[name=' + formname + ']');
    var errormap = $('form[name=' + formname + '] input[name=errormap]');
    var multierror = $('form[name=' + formname + '] input[name=multierrormap]');
    var extraformdata = $('form[name=' + formname + '] input[name=extraformdata]');
    var inputname1 = $('form[name=' + formname + '] input[name=contenttitle]');
    var inputname2 = $('form[name=' + formname + '] input[name=contentpic]');
    var inputname3 = $('form[name=' + formname + '] textarea[name=contentintro]');
    var inputname4 = $('form[name=' + formname + '] textarea[name=contentpost]');
    var inputname5 = $('form[name=' + formname + '] input[name=monitorcustom]');
    // get the setup for the globalmodal window
    var boolmodal=false;
    if($('#mainPageModal').length>0){
        boolmodal=$('#mainPageModal').hasClass('in');
        // console.log(boolmodal);
    }

    // console.log("Running validator."," Running eformdata",extraformdata.val()," Running errormap",errormap.val());  
    if (typeof (extraformdata.val()) !== "undefined" && extraformdata.val() !== "" && typeof (errormap.val()) !== "undefined" && errormap.val() !== "") {
        // console.log("Running First steps..."," Form:- ",formname);  
        var efdstepone = extraformdata.val().split("<|>");
        var emstepone = errormap.val().split("<|>");
        // console.log("Running First split...");  
        // console.log("Running step one Form data:- ",efdstepone);  
        // console.log("Running step one Errormap..."," Form:- ",emstepone);  
        // output console.logs for final validation data, search for "Current Value", and 
        // uncomment the log content to get a preview ofthe final output
        if (efdstepone.length == emstepone.length) {
            // group counter variable keeping track of disabled content
            var groupcounter = 0;
            var singlecounter = 0;
            var edsone=efdstepone.length;
            var totalvardefns="";
            var totalerrcontentout="";
            var totalpreinits="";
            var totalvalsets="";
            var elsec="";
            for (var i = 0; i < edsone; i++) {
                if(i>1){
                    elsec="else";
                }
                // begin division of current values
                // get current extraformdata
                var curgroup = efdstepone[i];
                // get current errormap
                var errgroup = emstepone[i];
                var errcontentout = "";
                var finalgroup = [];
                var finalreqgroup = [];
                if (curgroup.indexOf("egroup|data") > -1) {
                    groupcounter++;
                    // multiple data focus section, here validation is done
                    // on a grouped set of elements
                    var subgroup = curgroup.split("egroup|data-:-");
                    var suberrgroup = errgroup.split("egroup|data-:-");
                    // console.log("Suberror group before: ",suberrgroup);
                    var suberrgroupdata = /[^\[\]]+/i.exec(suberrgroup[1]);
                    // suberrgroupdata=suberrgroupdata[1];
                    // divide the subgroups further into fielddata and requirement data
                    // also extradata block
                    // for error checking content
                    // console.log("Subgroup before split: ",subgroup," Replaced data", subgroup[0].replace(/\n*/g,""));
                    subgroup = subgroup[1].split("-:-");
                    var reqdata = subgroup[1];
                    // console.log("Subgroup after split: ",subgroup);

                    var fielddata = /[^\[\]]+/ig.exec(subgroup[0]);
                    // console.log("Field data: ",fielddata[0].replace(/[\n\r]+/g,""));
                    fielddata = fielddata[0].replace(/[\n\r]+/g, "").replace(/\s{1,}/g, '').split(">|<");

                    // trap a third layer of content from the field data obtained
                    // this represents the sub content that defines that the 
                    // current entry is related to the value of another field
                    var subfielddataone = [];
                    if (subgroup.length > 2) {
                        subfielddataone = /[^\[\]]+/ig.exec(subgroup[2]);
                        subfielddataone = subfielddataone[0].replace(/[\n\r]+/g, "").replace(/\s{1,}/g, '').split(">|<");
                    }

                    // get the name of the current counter element from the array
                    // and initialise attribute based variables to hold the values
                    // of extra attributes
                    var ccelem = fielddata.shift();
                    if(ccelem.indexOf(":*:")>-1){
                        // this section means that a gdeminimum entry is connected to the counter
                        // elementtci
                        var ccelemsplit=ccelem.split(":*:");
                        ccelem=ccelemsplit[0];
                    }

                    // get the corename of the current group
                    var corename=ccelem.split("count");
                    corename=corename[0];
                    // console.log("corename: ",corename);
                    var preinitout = "";
                    
                    var valset = "";
                    var compulsoryoutput = '';
                    var valcount = 0;
                    var ccount = 0;

                    // console.log("Countelement value: ",ccount,"Countelement: ",ccelem);
                    if (ccelem !== "" && isNumber($('form[name=' + formname + '] input[name=' + ccelem + ']').val())) {
                        ccount = $('form[name=' + formname + '] input[name=' + ccelem + ']').val();
                        valset = $('form[name=' + formname + '] input[name=' + ccelem + ']').attr("data-valset");
                        valcount = $('form[name=' + formname + '] input[name=' + ccelem + ']').attr("data-valcount");
                        if (valset === null || valset === undefined || valset === NaN) {
                            valset = "";
                        }

                        if (valcount === null || valcount === undefined || valcount === NaN) {
                            valcount = 0;
                        } else {
                            valcount = Math.floor(valcount);
                        }
                        // console.log("valset: ",valset," valcount: ",valcount," formname: ",formname," ccelem:",ccelem);
                    }

                    // get the fieldata groups in the form of fieldname-|-fieldtype
                    // fielddata=fielddata.split(">|<");
                    // get the errormsg data
                    suberrgroupdata = suberrgroupdata[0].split(">|<");
                    // console.log("Suberror group after further split: ",suberrgroupdata);         
                    // verify the nature of the validation requirements for the group

                    // loop through each field set and get the fieldname seperate of its
                    // type
                    var dogroupfall = "";
                    var evalvardefns = "";
                    var evalcontent = "";
                    var mainx = 0;
                    for (var x = 0; x < fielddata.length; x++) {
                        mainx++;
                        // put current value in a local easy to use variable
                        var curfielddata = fielddata[x].split("-|-");
                        var fieldname = curfielddata[0];
                        var fieldtype = curfielddata[1];
                        // console.log("fieldtype: ",fieldtype," curfielddata",curfielddata);
                        var dosubgroup = "";
                        var singlefielddataone = [];
                        if (curfielddata.length > 2) {
                            if (curfielddata[2] !== "") {
                                // console.log(" Curfield data: ", curfielddata[2]);
                                singlefielddataone = /[^\(\)]+/ig.exec(curfielddata[2]);
                                singlefielddataone[0] = singlefielddataone[0].replace(/[\n\r]+/g, "").replace(/\s{1,}/g, '');

                                // console.log(" singlefield data: ",singlefielddataone);              
                                dosubgroup = "true";
                            }
                        }
                        // for edit forms, this will be used to test if the entry
                        // being validated should be ignored or not
                        // by default, the delete element has only one possible value hence
                        // validation can commence when it has no value
                        var conditionstatusblock = "";

                        //tells of the field expects a valid kind of input
                        // e.g 'image' would signify any valid image is passed
                        // office for valid office files , video, audio
                        // pdf for pdf e.t.c 
                        var fieldentrytype = "";
                        // tests against a valid extension for the fieldentrytype 
                        var fieldextension = "";
                        // variable holds further validation content for current field
                        var extendvalidationblock = "";

                        var vcblock_main = "";
                        var vcinit_main = "";

                        // variable for holding filetype check and extension validation data
                        var preinit = "";
                        if (fieldtype.indexOf("|") > -1) {
                            // this is done for mainly file based fields that need content checked
                            var fieldtypedata = fieldtype.split("|");
                            fieldtype = fieldtypedata[0];
                            fieldentrytype = fieldtypedata[1];
                            var fecblock = "";
                            if (fieldtypedata.length > 2) {
                                fieldextension = fieldtypedata[2];
                                if (fieldextension.indexOf(",") > -1) {
                                    var efetype = fieldextension.split(",");
                                    for (var tt = 0; tt < efetype.length; tt++) {
                                        curfetype = efetype[tt];
                                        fecblock += fecblock == "" ? '||(checkout[\'extension\']!=="' + curfetype + '"' : '&&checkout[\'extension\']!=="' + curfetype + '"';
                                        if (tt == efetype.length - 1) {
                                            fecblock += ")";
                                        };
                                    }
                                } else {
                                    fecblock = '||checkout[\'extension\']!=="' + fieldextension + '"';
                                }
                            }
                            // create attachment condition block
                            preinit = 'if(' + fieldname + '.val()!==""&&formstatus==true&&pointmonitor==false){' + 'var checkout=getExtension(' + fieldname + '.val());' + 'if(checkout[\'type\']!=="' + fieldentrytype + '"' + fecblock + '){' + ' window.alert(checkout[\'' + fieldentrytype + 'errormsg\']);console.log("Preview");' + ' $(' + fieldname + ').addClass(\'error-class\').focus();' + ' formstatus= false;' + ' pointmonitor=true;' + '}' + '}';
                        }
                        var errmsgout = suberrgroupdata[x].replace(/[\n\r]+/g, "").replace(/\s{2,}/g, ' ');
                        finalgroup[x] = [];
                        // store the key as a value with the field name as the value
                        finalgroup['' + fieldname + ''] = x;
                        finalgroup[x]['fieldname'] = fieldname;
                        finalgroup[x]['fieldtype'] = fieldtype;
                        finalgroup[x]['fieldentrytype'] = fieldentrytype;
                        finalgroup[x]['fieldextension'] = fieldextension;
                        finalgroup[x]['fieldcextra'] = preinit;
                        finalgroup[x]['errmsg'] = errmsgout;
                        finalgroup[x]['errtestdata'] = "";
                        // console.log(" fieldentrytype group: ",fieldentrytype, " fieldname group: ",fieldname);
                        if (fieldentrytype !== "") {
                            // check to see if the entrype is a file
                            vcinit_main += 'var ' + fieldname + '_edittype=$(' + fieldname + ').attr("data-edittype");\r\n' + 'if(' + fieldname + '_edittype===null||' + fieldname + '_edittype===undefined||' + fieldname + '_edittype===NaN){\r\n' + ' ' + fieldname + '_edittype="";\r\n' + '}';
                            // console.log(" vcinit_main: ",vcinit_main);
                            finalgroup[x]['errtestdata'] = '&&' + fieldname + '_edittype==""';
                        }

                        if (dosubgroup == "true") {
                            var singletests = [];
                            if (singlefielddataone !== "" && singlefielddataone.length > 0) {
                                for (var l = 0; l < singlefielddataone.length; l++) {
                                    var subfielddata = singlefielddataone[l].replace(/[\n\r]+/g, "").replace(/\s{2,}/g, ' ').split("-*-");
                                    // get the type for the current group set
                                    var type = subfielddata.shift();
                                    // console.log(" singlefield data: ",subfielddata," type: ", type);              

                                    if (type !== "group") {
                                        var telemname = subfielddata[0];
                                        // telemname=telemname.replace(/\*n\*/g,x);
                                        var telemtype = subfielddata[1];
                                        var telemvalue = subfielddata[2];
                                        if (telemvalue.indexOf("_") > -1) {
                                            telemvalue = telemvalue.replace(/_{1,}/g, " ");

                                        }

                                        var telemarr = [];
                                        var mtelemv = "";
                                        // check for multiple values that validate
                                        // on the same fieldtest element
                                        if (telemvalue.indexOf(':*:') > -1) {
                                            telemarr = telemvalue.split(":*:");
                                            mtelemv = "domulti";
                                        }
                                        var tarelemname = "";
                                        var curcondition = "";
                                        if (type == "" || type.toLowerCase() == "all") {

                                            // vcinit_main = 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                            if (mtelemv == "") {
                                            
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                vcblock_main += "&&" + telemname + "" + x + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                                // console.log("current count - ",m," curvblock - ",finalgroup[m]['vcblock'],"curvcinit - ",finalgroup[m]['vcinit']);
                                            
                                            } else if (mtelemv = "domulti") {
                                            
                                                var finout = "";
                                            
                                                for (var mu = 0; mu < telemarr.length; mu++) {
                                                    var ccond = mu == 0 ? "(" : "||";
                                                    var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                    telemvalue = telemarr[mu];
                                                    var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                    // makes sure that the telemvalue field equates empty on
                                                    // encountering *null* keyword as its value
                                                    telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                    telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                    finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                }
                                                vcblock_main += "&&" + finout;
                                            
                                            }

                                        } else if (type == "single") {
                                            tarelemname = subfielddata[3];
                                            // console.log('targetElementname: ',tarelemname);
                                            if (tarelemname !== "") {
                                                var ckey = "";
                                                ckey = finalgroup['' + tarelemname + ''];
                                                if (finalgroup[ckey]) {
                                                    // vcinit_main += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                                    if (mtelemv == "") {
                                                        var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                        telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                        telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                        vcblock_main += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                                        // console.log("current count - ",m," curvblock - ",finalgroup[m]['vcblock'],"curvcinit - ",finalgroup[m]['vcinit']);
                                                    } else if (mtelemv = "domulti") {
                                                        var finout = "";
                                                        for (var mu = 0; mu < telemarr.length; mu++) {
                                                            var ccond = mu == 0 ? "(" : "||";
                                                            var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                            telemvalue = telemarr[mu];
                                                            var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                            // makes sure that the telemvalue field equates empty on
                                                            // encountering *null* keyword as its value
                                                            telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                            telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                            finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                        }
                                                        vcblock_main += "&&" + finout;
                                                    }

                                                    // console.log("current key - ",ckey," curvblock - ",finalgroup[ckey]['vcblock'],"curvcinit - ",finalgroup[ckey]['vcinit']);
                                                }
                                            } else {
                                                var tarelemerr = 'Sub-validation group error discovered where type is "Single", and validation element is "<b>' + telemname + '</b>", in error map';
                                                raiseMainModal('ED System Failure!!', tarelemerr, 'fail');
                                                formstatus = false;
                                                break;
                                            }
                                        }

                                    } else if (type == "group") {
                                        for (var l2 = 0; l2 < subfielddata.length; l2 += 3) {
                                            // console.log(" singlefield data: ",subfielddata," type: ", type);              
                                            var telemname = subfielddata[l2];
                                            var elt = "";
                                            if (telemname.indexOf('*n*') > -1) {
                                                telemname = telemname;
                                                //.replace(/\*n\*/g,x);
                                                elt = "groupel";
                                            }
                                            var telemtype = subfielddata[l2 + 1];
                                            var telemvalue = subfielddata[l2 + 2];
                                            if (telemvalue.indexOf("_") > -1) {
                                                telemvalue = telemvalue.replace(/_{1,}/g, " ");

                                            }

                                            // console.log("telemvalue: ",telemvalue,"telemtype: ",telemtype," telemname: ",telemname, " cur x: ",x)
                                            var telemarr = [];
                                            var mtelemv = "";
                                            // check for multiple values that validate
                                            if (telemvalue.indexOf(':*:') > -1) {
                                                telemarr = telemvalue.split(":*:");
                                                mtelemv = "domulti";
                                            }

                                            var tarelemname = "";
                                            var curcondition = "";
                                            // vcinit_main += ' /*a test mark*/var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                            if (mtelemv == "") {
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                vcblock_main += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                                // console.log(vcblock_main);
                                            } else if (mtelemv == "domulti") {
                                                var finout = "";
                                                // console.log("telemvalue: ",telemvalue,"telemtype: ",telemtype," telemname: ",telemname, " cur x: ",x)
                                                for (var mu = 0; mu < telemarr.length; mu++) {
                                                    var ccond = mu == 0 ? "(" : "||";
                                                    var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                    telemvalue = telemarr[mu];
                                                    var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                    // makes sure that the telemvalue field equates empty on
                                                    // encountering *null* keyword as its value
                                                    telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                    telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                    finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                }
                                                vcblock_main += "&&" + finout;
                                            }
                                            

                                        }
                                        // console.log(vcblock_main);
                                    }
                                }
                            }
                        }
                        // carries validation content at the errtestmsg level

                        // carries validation variable initalisation and condition 
                        // block based information
                        finalgroup[x]['vcblock'] = vcblock_main;
                        // console.log(finalgroup[x]['vcblock']);
                        finalgroup[x]['vcinit'] = vcinit_main;

                    }

                    // create compulsory data set and force them into the vcinit portion
                    // of the finalgroup data set
                    var valsetinit="";
                    var valsetcond="";
                    if (valset !== "") {
                        var valcontent = valset.split(",");
                        var fc = 1;
                        var cvaltotalset = '';
                        cvaltotalset += 'var compulsorymsgout="Please, there is a group set of data with expected number of entries \\"' + valcount + '\\" that has not been completed.' + '<br> After you close this error field the group would be focused on. The group is group : <b>'+groupcounter+'</b>.Please make sure you fill in data in the group-set accordingly.<br>' + 'For example, if the expected number of entries is \'2\', this means that you must provide at least 2 entries for the set, and they must be provided ' + 'in direct order in the form, so skipping say set 2 to fill set 3 will create an error ' + 'even though 2 entries (Set 1 and Set 3) have been provided.<br> Hope this helps, if you do not understand, contact the developer of this application for ' + 'clarification";' + 'var cparelemcount=$("form[name=' + formname + '] input[name=' + ccelem + ']").val();';
                        valsetinit += 'var compulsorymsgout="Please, there is a group set of data with expected number of entries \\"' + valcount + '\\" that has not been completed.' + '<br> After you close this error field the group would be focused on. The group is group : <b>'+groupcounter+'</b>.Please make sure you fill in data in the group-set accordingly.<br>' + 'For example, if the expected number of entries is \'2\', this means that you must provide at least 2 entries for the set, and they must be provided ' + 'in direct order in the form, so skipping say set 2 to fill set 3 will create an error ' + 'even though 2 entries (Set 1 and Set 3) have been provided.<br> Hope this helps, if you do not understand, contact the developer of this application for ' + 'clarification";' + 'var cparelemcount=$("form[name=' + formname + '] input[name=' + ccelem + ']").val();';
                        // obtain the current groups set data element parent and see if
                        var cvalinitset = '';
                        var brco = '';
                        for (var wi = 0; wi < Math.floor(valcount); wi++) {
                            var pt = wi + 1;
                            var cvalcoset = '';
                            for (var vi = 0; vi < valcontent.length; vi++) {
                                if (isNumber(Math.floor(valcontent[vi])) && Math.floor(valcontent[vi]) > 0) {
                                    var cgd = Math.floor(valcontent[vi]) - 1;
                                    /*if(cgd<0){
                                        cgd=0;
                                    }*/
                                    // console.log("cgd: ",cgd," finalgroup: ",finalgroup, " valcontent: ",valcontent);
                                    var tv = vi + 1;
                                    if (vi == 0) {
                                        // set the focus group element counter
                                        fc = tv;
                                    }
                                    cvalinitset += '  var cvalinitset' + tv + '' + pt + '=$("form[name=' + formname + '] ' + finalgroup[cgd]['fieldtype'] + '[name=' + finalgroup[cgd]['fieldname'] + '' + pt + ']");var cvalinitsetcval' + tv + '' + pt + '="";if(cvalinitset' + tv + '' + pt + '===null||cvalinitset' + tv + '' + pt + '===undefined||cvalinitset' + tv + '' + pt + '=="undefined"||typeof cvalinitset' + tv + '' + pt + '=="undefined"||cvalinitset' + tv + '' + pt + '===NaN){ cvalinitsetcval' + tv + '' + pt + '="";}else{ cvalinitsetcval' + tv + '' + pt + '=cvalinitset' + tv + '' + pt + '.val();}/*console.log("cvalinitsetcval: ",cvalinitsetcval' + tv + '' + pt + ');*/';
                                    cvalcoset += vi == 0 ? 'cvalinitsetcval' + tv + '' + pt + '==""' : '&&cvalinitsetcval' + tv + '' + pt + '==""';

                                }
                            }
                            // console.log("Initset - ",cvalinitset," \n Condition set - ",cvalcoset," Counter - ",pt);
                            if ((wi == 0 && brco == "" && cvalcoset !== "") || (wi > 0 && brco == "" && cvalcoset !== "")) {
                                brco = "on";
                                cvaltotalset += 'if(' + cvalcoset + '&&formstatus==true&&pointmonitor==false){' + 'formstatus=false;pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');' + ' $("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(cvalinitset' + fc + '' + pt + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '     if(mcetester=="true"){' + '     var mcid=$(cvalinitset' + fc + '' + pt + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(cvalinitset' + fc + '' + pt + ').addClass(\'error-class\').focus(); }' + '   ' + ' }); /*console.log(" formstatus:",formstatus);*/}' + '}';
                                valsetcond += 'else if(' + cvalcoset + '&&formstatus==true&&pointmonitor==false){' + 'formstatus=false;pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');' + ' $("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(cvalinitset' + fc + '' + pt + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '     if(mcetester=="true"){' + '     var mcid=$(cvalinitset' + fc + '' + pt + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(cvalinitset' + fc + '' + pt + ').addClass(\'error-class\').focus(); }' + '   ' + ' }); /*console.log(" formstatus:",formstatus);*/}' + '}';
                            } else if (wi > 0 && brco == "on" && cvalcoset !== "") {
                                cvaltotalset += 'else if(' + cvalcoset + '&&formstatus==true&&pointmonitor==false){' + ' formstatus=false;pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');' + ' $("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(cvalinitset' + fc + '' + pt + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '    if(mcetester=="true"){' + '     var mcid=$(cvalinitset' + fc + '' + pt + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(cvalinitset' + fc + '' + pt + ').addClass(\'error-class\').focus();}' + '  ' + ' }); /*console.log(" formstatus:",formstatus);*/}' + '}';
                                valsetcond += 'else if(' + cvalcoset + '&&formstatus==true&&pointmonitor==false){' + ' formstatus=false;pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', compulsorymsgout, \'fail\');' + ' $("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(cvalinitset' + fc + '' + pt + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '    if(mcetester=="true"){' + '     var mcid=$(cvalinitset' + fc + '' + pt + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(cvalinitset' + fc + '' + pt + ').addClass(\'error-class\').focus();  }' + '  ' + ' }); /*console.log(" formstatus:",formstatus);*/}' + '}';
                            }
                            var penultm8 = pt - 1;
                        }
                        // final cvaltotalset, here, the count of entries is tallied and 
                        // an error raised if the count doesnt match the expected number of entries
                        if (cvaltotalset !== "") {
                            valsetinit+=cvalinitset;
                            // valsetcond=cvaltotalset;
                            valsetcond += 'else if(cparelemcount<' + valcount + '&&formstatus==true&&pointmonitor==false){' + ' var curerror="Sorry, the minimum number of expected entries is: ' + valcount + ' current detected is: \"+cparelemcount+\" Please add more entries for data groupset '+groupcounter+'"; formstatus=false;pointmonitor=true; raiseMainModal(\'Form error!!\', curerror, \'fail\');' + '  if($("#mainPageModal div.modal-body").html()==curerror){$("#mainPageModal").on("hidden.bs.modal", function () {/*console.log("mainmodalmarkup",$("#mainPageModal div.modal-body").html());*/' + '  goToByScroll(\'form[name='+formname+'] div.' + corename + '-field-hold\',\'fast\',\'selector\');' + ' });/*console.log(" formstatus:",formstatus);*/} ' + '}';
                            cvaltotalset = '' + cvalinitset + '' + cvaltotalset + '';
                            cvaltotalset += 'else if(cparelemcount<' + valcount + '&&formstatus==true&&pointmonitor==false){' + ' var curerror="Sorry, the minimum number of expected entries is: ' + valcount + ' current detected is: \"+cparelemcount+\" Please add more entries for data groupset '+groupcounter+'"; formstatus=false;pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', curerror, \'fail\');' + ' /*console.log(" Current cvalinitset parent: ",$(cvalinitset' + fc + '' + penultm8 + ').parent());*/ $("#mainPageModal").on("hidden.bs.modal", function () {' + '  goToByScroll(\'form[name='+formname+'] div.' + corename + '-field-hold\',\'fast\',\'selector\');' + ' }); }/*console.log(" formstatus:",formstatus);*/' + '}';
                            // console.log("cvaltotalset - ",cvaltotalset);

                        }

                        // add the compulsory section to the vcinit portion of the
                        // first fielddata element in the finalgroup array
                        // finalgroup[0]['vcinit'] += cvaltotalset;
                    }

                    // test for subfield data and proceed to create array of condition
                    // add-on content for the validation fields, using the target fields 
                    // name or group data
                    var subtests = [];
                    var fgl=finalgroup.length;

                    if (subfielddataone !== "" && subfielddataone.length > 0) {
                        for (var l = 0; l < subfielddataone.length; l++) {
                            var subfielddata = subfielddataone[l].replace(/[\n\r]+/g, "").replace(/\s{2,}/g, ' ').split("-|-");
                            // get the type for the current group set
                            var type = subfielddata.shift();
                            // console.log("type: ",type," Subfielddata: " ,subfielddata);
                            if (type !== "group") {
                                var telemname = subfielddata[0];
                                var telemtype = subfielddata[1];
                                var telemvalue = subfielddata[2];
                                if (telemvalue.indexOf("_") > -1) {
                                    telemvalue = telemvalue.replace(/_{1,}/g, " ");

                                }


                                var telemarr = [];
                                var mtelemv = "";
                                // check for multiple values that validate
                                if (telemvalue.indexOf(':*:') > -1) {
                                    telemarr = telemvalue.split(":*:");
                                    mtelemv = "domulti";
                                }

                                var tarelemname = "";
                                var curcondition = "";
                                if (type == "" || type.toLowerCase() == "all") {
                                    for (var m = 0; m < finalgroup.length; m++) {
                                        if (mtelemv == "") {
                                            finalgroup[m]['vcinit'] += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                            var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                            // makes sure that the telemvalue field equates empty on
                                            // encountering *null* keyword as its value
                                            telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                            telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                            finalgroup[m]['vcblock'] += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                            // console.log("current count - ",m," curvblock - ",finalgroup[m]['vcblock'],"curvcinit - ",finalgroup[m]['vcinit']);
                                        } else if (mtelemv == "domulti") {
                                            var finout = "";
                                            for (var mu = 0; mu < telemarr.length; mu++) {
                                                var ccond = mu == 0 ? "(" : "||";
                                                var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                telemvalue = telemarr[mu];
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                            }
                                            finalgroup[m]['vcblock'] += "&&" + finout;
                                        }
                                    }
                                    ;
                                } else if (type == "single") {
                                    tarelemname = subfielddata[3];
                                    if (tarelemname !== "") {
                                        var ckey = "";
                                        ckey = finalgroup['' + tarelemname + ''];
                                        if (finalgroup[ckey]) {
                                            finalgroup[ckey]['vcinit'] += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';

                                            if (mtelemv == "") {
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                // bind the current condition to every block in the set
                                                for(var si=0;si<fgl;si++){
                                                    finalgroup[si]['vcblock'] += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                                    // finalgroup[si]['vcblock'] += "&&" + finout;
                                                }
                                                // console.log("current key - ",ckey," curvblock - ",finalgroup[ckey]['vcblock'],"curvcinit - ",finalgroup[ckey]['vcinit']);
                                            } else if (mtelemv == "domulti") {
                                                var finout = "";
                                                for (var mu = 0; mu < telemarr.length; mu++) {
                                                    var ccond = mu == 0 ? "(" : "||";
                                                    var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                    telemvalue = telemarr[mu];
                                                    var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                    // makes sure that the telemvalue field equates empty on
                                                    // encountering *null* keyword as its value
                                                    telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                    telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                    finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                }
                                                // bind the current condition to every block in the set
                                                for(var si=0;si<fgl;si++){
                                                    finalgroup[si]['vcblock'] += "&&" + finout;
                                                }
                                            }
                                            ;
                                        }
                                    } else {
                                        var tarelemerr = 'Sub-validation group error discovered where type is "Single", and validation element is "<b>' + telemname + '</b>", in error map';
                                        raiseMainModal('ED System Failure!!', tarelemerr, 'fail');
                                        formstatus = false;
                                        break;
                                    }
                                }
                            } else if (type == "group") {
                                for (var l2 = 3; l2 < subfielddata.length; l2 += 3) {
                                    var telemname = subfielddata[l2];
                                    var telemtype = subfielddata[l2 + 1];
                                    var telemvalue = subfielddata[l2 + 2];
                                    if (telemvalue.indexOf("_") > -1) {
                                        telemvalue = telemvalue.replace(/_{1,}/g, " ");

                                    }

                                    var telemarr = [];
                                    var mtelemv = "";
                                    // check for multiple values that valikdate
                                    if (telemvalue.indexOf(':*:') > -1) {
                                        telemarr = telemvalue.split(":*:");
                                        mtelemv = "domulti";
                                    }
                                    var tlal=telemarr.length;
                                    var tarelemname = "";
                                    var curcondition = "";

                                    for (var m = 0; m < fgl; m++) {
                                        if (mtelemv == "") {
                                            finalgroup[m]['vcinit'] += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                            var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                            // makes sure that the telemvalue field equates empty on
                                            // encountering *null* keyword as its value
                                            telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                            telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                            finalgroup[m]['vcblock'] += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                        } else if (mtelemv == "domulti") {
                                            var finout = "";
                                            for (var mu = 0; mu < tlal; mu++) {
                                                var ccond = mu == 0 ? "(" : "||";
                                                var ccend = mu == tlal - 1 ? ")" : "";
                                                telemvalue = telemarr[mu];
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                            }
                                            finalgroup[m]['vcblock'] += "&&" + finout;
                                        }
                                    }
                                    ;
                                }
                            }
                        }
                    }

                    // sort requirements based on group fall data
                    // console.log("Required data: ",reqdata);
                    if (reqdata.indexOf("groupfall") > -1) {
                        dogroupfall = "true";
                        reqdata = reqdata.split("groupfall");
                        //remove groupfall
                        reqdata = /[^\[\]]+/ig.exec(reqdata[1]);
                        // console.log("the new req data: ",reqdata);
                        reqdata = reqdata[0].split(",");
                        // get inidividual data groups
                        // console.log("the new req data after split: ",reqdata," length: ",reqdata.length);
                    } else {
                        reqdata = /[^\[\]]+/ig.exec(reqdata);
                        // console.log("the new req data: ",reqdata);
                        reqdata = reqdata[0].split(",");
                        // get inidividual data groups
                        // console.log("the new req data after split: ",reqdata);

                    }

                    // create block control for the multiple validation entries
                    if (ccount > 0) {
                        var extendederrorblock = "";
                        var extendedtestblock = "";
                        // allows the current set of entries to fail validation
                        var gstatus = $('form[name=' + formname + '] select[name=group' + groupcounter + '_status' + x + ']');
                        // console.log("cur status test- ",gstatus);
                        if (typeof (gstatus) !== "undefined" && (gstatus.val() == "inactive" || gstatus.val() == "yes")) {
                            // create an expression that always evaluates as false
                            extendederrorblock = '&&1<0';
                        } else {}

                        // create condition blocks for handling multiple form element validation
                        var vcinit = "";
                        for (var c = 0; c < reqdata.length; c++) {
                            var conditionblock = "";
                            var conderrorblock = "";
                            // for initialisation of sub validation field section variables
                            //  and corresponding condition block output
                            var preinit = "";
                            var vcblock = "";
                            var compulsoryblock = "";
                            var rq = reqdata[c];
                            if (dogroupfall == "true") {

                                var curreq = reqdata[c].split('-');

                                // console.log("Current requirements: ",curreq);
                                for (var ct = 0; ct < curreq.length; ct++) {
                                    id = curreq[ct] > 0 ? curreq[ct] - 1 : curreq[ct];
                                    vcblock = finalgroup[id]['vcblock'];
                                    if (vcinit == "") {
                                        vcinit = finalgroup[id]['vcinit'];

                                    } else if (finalgroup[id]['vcinit'] !== "" && vcinit.indexOf('' + finalgroup[id]['vcinit'] + '') < 0) {
                                        // avoid repeating content in the init section
                                        vcinit += finalgroup[id]['vcinit'];
                                    }
                                    
                                    preinitout += finalgroup[id]['fieldcextra'];
                                    preinit = finalgroup[id]['fieldcextra'];

                                    // console.log("curvblock valpoint- ",finalgroup[0]['vcblock'],"curvcinit valpoint - ",finalgroup[0]['vcinit']);
                                    // console.log("Current id: ",id)," Current ct: ",curreq[ct];

                                    if (ct == 0) {
                                        conditionblock = '' + finalgroup[id]['fieldname'] + '.val()==""&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';
                                        conderrorblock = 'var edittype=' + finalgroup[id]['fieldname'] + '.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};/*console.log("Edittype1 - ",edittype," Current Value - ",' + finalgroup[id]['fieldname'] + '.val());*/var errtestmsg="' + finalgroup[id]['errmsg'] + '";if(errtestmsg!=="NA"&&edittype!=="true"' + finalgroup[id]['errtestdata'] + '){formstatus=false; pointmonitor=true; raiseMainModal(\'Form error!!\', \'' + finalgroup[id]['errmsg'] + '\', \'fail\');' + '$("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(' + finalgroup[id]['fieldname'] + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '    if(mcetester=="true"){' + '     var mcid=$(' + finalgroup[id]['fieldname'] + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(' + finalgroup[id]['fieldname'] + ').addClass(\'error-class\').focus();' + '   }' + '});}';
                                    } else if (ct == 1 && Math.floor(curreq.length) <= 2) {
                                        // in the event there are only two entries
                                        conditionblock += '&&' + finalgroup[id]['fieldname'] + '.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';

                                    } else if (ct == 1 && Math.floor(curreq.length) > 2) {
                                        // in the event of more than two entries, open the bracket for the entries
                                        conditionblock += '&&(' + finalgroup[id]['fieldname'] + '.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';

                                    } else if (Math.floor(curreq.length) > Math.floor(ct) + 1 && Math.floor(curreq.length) > 2) {
                                        conditionblock += '||' + finalgroup[id]['fieldname'] + '.val()!==""&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';

                                    } else if (Math.floor(curreq.length) == Math.floor(ct) + 1 && Math.floor(curreq.length) > 2) {
                                        conditionblock += '||' + finalgroup[id]['fieldname'] + '.val()!=="")&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';
                                    } else {}
                                }

                            } else {
                                // do plain waterfall check on requireddata array content
                                id = reqdata[c] - 1 > 0 ? reqdata[c] - 1 : 0;
                                vcblock = finalgroup[id]['vcblock'];
                                if (vcinit == "") {
                                    vcinit = finalgroup[id]['vcinit'];

                                } else if (finalgroup[id]['vcinit'] !== "" && vcinit.indexOf('' + finalgroup[id]['vcinit'] + '') < 0) {
                                    // avoid repeating content in the init section
                                    vcinit += finalgroup[id]['vcinit'];
                                }
                                // console.log("the final group value: ",finalgroup[id]," the type of final group",typeof(finalgroup[id]));
                                if (typeof (finalgroup[id]) !== "undefined" && finalgroup[id]['fieldname'] !== "" && finalgroup[id]['fieldtype'] !== "") {
                                    conditionblock = '' + finalgroup[id]['fieldname'] + '.val()==""&&formstatus==true&&pointmonitor==false&&curselect==""' + vcblock + '';
                                    conderrorblock = 'var edittype=' + finalgroup[id]['fieldname'] + '.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};/*console.log("Edittype2 - ",edittype," Current Value - ",' + finalgroup[id]['fieldname'] + '.val());*/var errtestmsg="' + finalgroup[id]['errmsg'] + '";if(errtestmsg.toLowerCase()!=="na"&&edittype!=="true"){formstatus=false; pointmonitor=true; console.log(formstatus,' + finalgroup[id]['fieldname'] + ');raiseMainModal(\'Form error!!\', \'' + finalgroup[id]['errmsg'] + '\', \'fail\');' + '$("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(' + finalgroup[id]['fieldname'] + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '    if(mcetester=="true"){' + '     var mcid=$(' + finalgroup[id]['fieldname'] + ').attr("id");' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '   }else{' + '     $(' + finalgroup[id]['fieldname'] + ').addClass(\'error-class\').focus();' + '   }' + '});}';
                                }
                            }
                            // var valtotal='{}';
                            // console.log("errcontentout value: ",errcontentout," cur block: ",conditionblock," condition error: ",conderrorblock," cur count: ",c," reqdata length: ",reqdata.length," errcontentout typeof", typeof(errcontentout))
                            /*if (valset !== "") {
                                vcinit+=valsetinit;
                            }*/
                            if (errcontentout == "") {
                                // console.log("vcinit ",vcinit);
                                if (conditionblock !== "" && conderrorblock !== "") {
                                    errcontentout = 'if(' + conditionblock + '){$("#mainPageModal").off("hidden.bs.modal");' + '' + conderrorblock + '' + 'console.log(" formstatus:",formstatus);}';
                                }
                            } else if (errcontentout !== "") {
                                // console.log("conderrorblock value: ",conderrorblock);
                                // console.log("errcontentout value: ",errcontentout);
                                if (conditionblock !== "" && conderrorblock !== "") {
                                    errcontentout += 'else if(' + conditionblock + '){$("#mainPageModal").off("hidden.bs.modal");' + '' + conderrorblock + '' + 'console.log(" formstatus:",formstatus);}';
                                }
                            }
                        }
                        // attatch the total current vcinit value
                        errcontentout=vcinit+errcontentout;
                        if(valset!==""){
                            errcontentout=valsetinit+errcontentout+valsetcond;
                        }
                        // attach the preinit data
                        if(preinitout!==""){
                            errcontentout+=preinitout;

                        }
                        // create the formelment variable definitions
                        for (var cx = 0; cx < ccount; cx++) {
                            evalvardefns = "";
                            var cto = cx + 1;
                            var gstatus = $('form[name=' + formname + '] select[name=group' + groupcounter + '_status' + cto + ']');
                            // console.log("cur status test- ",gstatus);
                            if (typeof (gstatus) !== "undefined" && (gstatus.val() == "inactive" || gstatus.val() == "yes")) {
                                // create an expression that always evaluates as false
                                extendederrorblock = ' var curselect=$(\'form[name=' + formname + '] select[name=group' + groupcounter + '_status' + cto + ']\').val();';
                            } else {
                                extendederrorblock = 'var curselect="";';
                            }
                            evalvardefns += extendederrorblock;
                            for (var v = 0; v < finalgroup.length; v++) {
                                var p = cx + 1;
                                // create the variable instances for the eval section
                                evalvardefns += " var " + finalgroup[v]['fieldname'] + "=" + "$('form[name=" + formname + "] " + finalgroup[v]['fieldtype'] + "[name=" + finalgroup[v]['fieldname'] + "" + p + "]'); console.log('fieldname: '," + finalgroup[v]['fieldname'] + ",' formstatus:',formstatus);";
                            }
                            evalcontent = '' + evalvardefns + '' + errcontentout + '';
                            // console.log('Eval count group data: ',groupcounter," Eval Data", evalcontent);
                            eval(evalcontent);
                            /*reset the hiddenbs modal function to something harmless*/
                            /*$("#mainPageModal").on("hidden.bs.modal", function() {

                            });*/
                            // testsystem using only scripts, the script data is placed in an appended
                            // scriptelement for the current form
                            /*if($('form[name=' + formname + '] script[data-name=parse_gd').length>0){
                                $('form[name=' + formname + '] script[data-name=parse_gd').remove();
                            }
                            maintotalscripts='<script data-name="parse_gd">$(document).ready(function(){var formstatus=true; var pointmonitor=false; '+evalcontent+'});</script>';
                            $(maintotalscripts).appendTo('form[name=' + formname + ']');*/
                            // this ensures the loop stops running completely
                            // when a condition is not met
                            if (formstatus == false) {
                                break;
                            }
                        }

                    }
                    // end egroup|data section
                } else {
                    // start single field data section
                    // singlecounter++;
                    // console.log(typeof(curgroup));
                    if (typeof (curgroup) !== "undefined" && curgroup !== "") {
                        var errcontentout = "";
                        var evalcontent = "";
                        var evalvardefns = "";
                        var vcinit = "";
                        var vcblock = "";
                        var preinit = "";
                        var fielddata = curgroup.split("-:-");
                        var fieldname = fielddata[0].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, '');
                        var fieldtype = fielddata[1].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, '');
                        var fieldentrytype = "";
                        var fieldextension = "";
                        var errtestdata = "";

                        if (fieldtype.indexOf("|") > -1) {
                            var fieldtypedata = fieldtype.split("|");
                            fieldtype = fieldtypedata[0];
                            fieldentrytype = fieldtypedata[1];
                            var fecblock = "";
                            if (fieldtypedata.length > 2) {
                                fieldextension = fieldtypedata[2];
                                if (fieldextension.indexOf(",") > -1) {
                                    var efetype = fieldextension.split(",");
                                    for (var tt = 0; tt < efetype.length; tt++) {
                                        curfetype = efetype[tt];
                                        fecblock += fecblock == "" ? '||(checkout[\'extension\']!=="' + curfetype + '"' : '&&checkout[\'extension\']!=="' + curfetype + '"';
                                        if (tt == efetype.length - 1) {
                                            fecblock += ")";
                                        }
                                        ;
                                    }
                                } else {
                                    fecblock = '||checkout[\'extension\']!=="' + fieldextension + '"';
                                }
                            }
                            // console.log(" fieldentrytype: ",fieldentrytype)
                            if (fieldentrytype !== "") {
                                // check to see if the entryTYpe is a file
                                vcinit += 'var ' + fieldname + '_edittype=$(' + fieldname + ').attr("data-edittype");\r\n' + 'if(' + fieldname + '_edittype===null||' + fieldname + '_edittype===undefined||' + fieldname + '_edittype===NaN){\r\n' + ' ' + fieldname + '_edittype="";\r\n' + '}';
                                errtestdata = '&&' + fieldname + '_edittype==""';
                            }
                            // create attachment condition block
                            preinit = 'if(' + fieldname + '.val()!==""&&formstatus==true&&pointmonitor==false){' + 'var checkout=getExtension(' + fieldname + '.val());' + 'if(checkout[\'type\']!=="' + fieldentrytype + '"' + fecblock + '){' + ' window.alert(checkout[\'' + fieldentrytype + 'errormsg\']);console.log("Preview");' + ' $(' + fieldname + ').addClass(\'error-class\').focus();' + ' formstatus= false;' + ' pointmonitor= true;' + '}' + '/*console.log("fieldname: "," '+fieldname+' "," formstatus: ",formstatus);*/}';
                            totalpreinits+=preinit;
                        }

                        // trap a third layer of content from the field data obtained
                        // this represents the sub content that defines that the 
                        // current entry is related to the value of another field
                        var subfielddataone = [];
                        if (fielddata.length > 2) {
                            subfielddataone = /[^\[\]]+/ig.exec(fielddata[2]);
                            subfielddataone = subfielddataone[0].replace(/[\n\r]+/g, "").replace(/\s{1,}/g, '').split(">|<");
                            // console.log("subfielddataparent - ",fielddata[2]," subfielddataone - ",subfielddataone);
                        }

                        // test for subfield data and proceed to craete array of condition
                        // add-on content for the validation fields, using the target fields 
                        // name or group data
                        var subtests = [];
                        // console.log(subfielddataone);
                        if (subfielddataone !== "" && subfielddataone.length > 0) {
                            for (var l = 0; l < subfielddataone.length; l++) {
                                var subfielddata = subfielddataone[l].replace(/[\n\r]+/g, "").replace(/\s{2,}/g, ' ').split("-|-");
                                // get the type for the current group set
                                var type = subfielddata.shift();
                                if (type !== "group") {
                                    var telemname = subfielddata[0];
                                    var telemtype = subfielddata[1];
                                    var telemvalue = subfielddata[2];
                                    if (telemvalue.indexOf("_") > -1) {
                                        telemvalue = telemvalue.replace(/_{1,}/g, " ");

                                    }

                                    var telemarr = [];
                                    var mtelemv = "";
                                    // check for multiple values that valikdate
                                    if (telemvalue.indexOf(':*:') > -1) {
                                        // console.log("splitting the atom");
                                        telemarr = telemvalue.split(":*:");
                                        mtelemv = "domulti";
                                    }

                                    var tarelemname = "";
                                    var curcondition = "";
                                    if (type == "" || type.toLowerCase() == "all") {

                                        for (var m = 0; m < finalgroup.length; m++) {
                                            if (mtelemv == "") {
                                                vcinit += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                vcblock += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                            } else if (mtelemv == "domulti") {
                                                var finout = "";
                                                for (var mu = 0; mu < telemarr.length; mu++) {
                                                    var ccond = mu == 0 ? "(" : "||";
                                                    var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                    telemvalue = telemarr[mu];
                                                    var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                    // makes sure that the telemvalue field equates empty on
                                                    // encountering *null* keyword as its value
                                                    telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                    telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                    finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                }
                                                vcblock += "&&" + finout;
                                            }
                                        }
                                        ;
                                    } else if (type == "single") {
                                        tarelemname = subfielddata[3];
                                        if (tarelemname !== "") {
                                            /*var ckey="";
                                            ckey=finalgroup[''+tarelemname+''];*/
                                            if (mtelemv == "") {
                                                vcinit += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                vcblock += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                            } else if (mtelemv == "domulti") {
                                                var finout = "";
                                                for (var mu = 0; mu < telemarr.length; mu++) {
                                                    var ccond = mu == 0 ? "(" : "||";
                                                    var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                    telemvalue = telemarr[mu];
                                                    var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                    // makes sure that the telemvalue field equates empty on
                                                    // encountering *null* keyword as its value
                                                    telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                    telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                    finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                                }
                                                vcblock += "&&" + finout;
                                            }

                                        } else {
                                            var tarelemerr = 'Sub-validation group error discovered where type is "Single", and validation element is "<b>' + telemname + '</b>", in error map';
                                            raiseMainModal('ED System Failure!!', tarelemerr, 'fail');
                                            formstatus = false;
                                            break;
                                        }
                                    }
                                    // console.log("curvblock - ",vcblock," curvinit - ",vcinit);
                                } else if (type == "group") {
                                    // console.log("subfielddata length - ",subfielddata.length," subfielddata - ",subfielddata);
                                    for (var l2 = 0; l2 < subfielddata.length; l2 += 3) {
                                        var telemname = subfielddata[l2];
                                        var telemtype = subfielddata[l2 + 1];
                                        var telemvalue = subfielddata[l2 + 2];
                                        if (telemvalue.indexOf("_") > -1) {
                                            telemvalue = telemvalue.replace(/_{1,}/g, " ");
                                        }
                                        var telemarr = [];
                                        var mtelemv = "";
                                        // check for multiple values that valikdate
                                        if (telemvalue.indexOf(':*:') > -1) {
                                            // console.log("splitting the atom");
                                            telemarr = telemvalue.split(":*:");
                                            mtelemv = "domulti";
                                        }
                                        var tarelemname = "";
                                        var curcondition = "";
                                        vcinit += 'var ' + telemname + '=$("form[name=' + formname + '] ' + telemtype + '[name=' + telemname + ']");';
                                        if (mtelemv == "") {
                                            var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                            // makes sure that the telemvalue field equates empty on
                                            // encountering *null* keyword as its value
                                            telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                            telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                            vcblock += "&&" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"";
                                            // console.log("curvblock - ",vcblock," curvinit - ",vcinit);
                                        } else if (mtelemv == "domulti") {
                                            var finout = "";
                                            // console.log("entering the dragon");

                                            for (var mu = 0; mu < telemarr.length; mu++) {
                                                var ccond = mu == 0 ? "(" : "||";
                                                var ccend = mu == telemarr.length - 1 ? ")" : "";
                                                telemvalue = telemarr[mu];
                                                var c_all = telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? "!" : "";
                                                // makes sure that the telemvalue field equates empty on
                                                // encountering *null* keyword as its value
                                                telemvalue == "" || telemvalue.indexOf('*any*') > -1 ? telemvalue = "" : telemvalue = telemvalue;
                                                telemvalue == "*null*" ? telemvalue = "" : telemvalue = telemvalue;
                                                finout += ccond + "" + telemname + ".val()" + c_all + "==\"" + telemvalue + "\"" + ccend;
                                            }
                                            vcblock += "&&" + finout;

                                        }
                                        // console.log("curvblock - ",vcblock," curvinit - ",vcinit);

                                    }
                                }
                            }
                        }
                        var errdata = errgroup.split("-:-");
                        var errdata1 = errdata[1];
                        if (errdata[1] === null || errdata[1] === undefined || errdata[1] === NaN) {
                            var errdata1 = "";
                        }
                        var errmsgout = typeof (errdata1) !== "undefined" && errdata1 !== "" ? errdata[1].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, ' ') : "";
                        // create the variable instances for the eval section
                        // and make sure the field is not chosen if the NA
                        // errmsg is present meaning that the field is not required
                        // console.log("Error msag out - ",errmsgout);
                        if (errmsgout.toLowerCase() !== "na" || errmsgout !== "NA" || errmsgout !== " NA" || errmsgout !== " NA " || errmsgout !== "NA ") {
                            evalvardefns += " var " + fieldname + "=" + "$('form[name=" + formname + "] " + fieldtype + "[name=" + fieldname + "]'); /*console.log(\" Current Value - \"," + fieldname + ".val());*/";
                            conditionblock = '' + fieldname + '.val()==""&&formstatus==true&&pointmonitor==false' + vcblock + '';
                            conderrorblock = 'var edittype=' + fieldname + '.attr("data-form-edit");if(edittype===null||edittype===undefined||edittype===NaN){var edittype=""};' + '/*console.log("Element - ",$(fieldname));*//*console.log("Edittype3 - ",edittype);*/var errtestmsg="' + errmsgout + '";if(errtestmsg!=="NA"&&edittype!=="true"' + errtestdata + '){formstatus=false; pointmonitor=true; if(boolmodal==false){raiseMainModal(\'Form error!!\', \'' + errmsgout + '\', \'fail\');' + '$("#mainPageModal").on("hidden.bs.modal", function () {' + '   var mcetester=$(' + fieldname + ').attr("data-mce");' + '   if(mcetester===null||mcetester===undefined||mcetester===NaN){ mcetester="";}' + '    if(mcetester=="true"){' + '     var mcid=$(' + fieldname + ').attr("id");/*console.log("tmcid - ",tinyMCE.get(mcid),"mcid - ",mcid);*/' + '     tinyMCE.get(mcid).focus();/*tinymce.execCommand(\'mceFocus\',false,mcid);*/' + '     /*tinyMCE.getInstanceById(mcid).focus();*/' + '   }else{' + '     $(' + fieldname + ').addClass(\'error-class\').focus();' + '   } ' + '});}/*console.log("fieldname: "," '+fieldname+' "," formstatus: ",formstatus);*/}';
                        } else {
                            evalvardefns += "var " + fieldname + "=" + "$('form[name=" + formname + "] " + fieldtype + "[name=" + fieldname + "]');";
                        }

                        totalvardefns+=evalvardefns+" "+vcinit;
                        if (errcontentout == "") {
                            if (conditionblock !== "" && conderrorblock !== "") {
                                errcontentout = '' + vcinit + 'if(' + conditionblock + '){' + '' + conderrorblock + '' + '}' + preinit + '';
                                totalerrcontentout+='if(' + conditionblock + '){' + '' + conderrorblock + '' + '}';
                            }
                        }
                        evalcontent = '' + evalvardefns + '' + errcontentout + '/*console.log("Current Point Single Test")*/';
                        // console.log("Eval Data single", evalcontent);
                        eval(evalcontent);
                        
                        
                        // this ensures the loop stops running completely
                        // when a condition is not met
                        if (formstatus == false) {
                            break;
                        }
                    } else {
                        errmsg = 'Missing form data detected, possible malformed validation triggers.';
                        raiseMainModal('Parse error!!', '' + errmsg + '', 'fail');
                        formstatus = false;
                        break;
                    }
                }

            }
        } else {
            errmsg = 'Extra form data and errormap do not match in length.';
            raiseMainModal('Parse error!!', '' + errmsg + '', 'fail');
            formstatus = false;
            // break;
        }
    }
    
    // begin password and email data verification
    var psect = $('form[name=' + formname + '] input[data-pvalidate=true]');
    if (psect === null || psect === undefined || psect === NaN) {
        var psect = "";
    }
    // console.log("psect: ",psect);

    if (psect.length > 0 && formstatus == true) {
        // for handling password fields and checking their confirmation fields
        // if available
        // the current password element
        var celemname = $('form[name=' + formname + '] [data-pvalidate=true]').attr("name");
        var celem = $('form[name=' + formname + '] input[name=' + celemname + ']');
        console.log("Celem: ", celem);

        var pval = $('form[name=' + formname + '] [data-pvalidate=true]').val();
        var pvala = "";
        if (pval !== "") {
            pvala = " Current Password is \"<b>" + pval + "</b>\"";
        }
        // validation types
        // letters only = "l"
        // letters and underscore= "lu"
        // letter casesensitive and underscore = "lcu"
        // numbers and letters = "nl"
        // numbers and letter casesensitive = "nlc"
        // numbers and letter and underscore = "nlu"
        // numbers and letter casesensitive and underscore = "nlcu"
        var vtype = $('form[name=' + formname + '] [data-pvalidate=true]').attr('data-pvtype');

        // validation confirmation field name
        var vcname = $('form[name=' + formname + '] [data-pvalidate=true]').attr('data-pvcname');
        var rgx = "";

        // strongly enforce the type ensuring that all parameters are fulfilled
        var ftype = "";
        ftype = $('form[name=' + formname + '] [data-pvalidate=true]').attr('data-pvforce');

        // minimum amount of characters expected
        var fcount = $('form[name=' + formname + '] [data-pvalidate=true]').attr('data-pvcount');
        if (fcount === null || fcount === undefined || fcount === NaN) {
            var fcount = 8;
        }

        // verify if there is a confirmation field
        var cfieldname = $('form[name=' + formname + '] [data-pvalidate=true]').attr('data-pvcfieldname');
        if (cfieldname === null || cfieldname === undefined || cfieldname === NaN) {
            var cfieldname = "";
        }
        if (cfieldname !== "") {
            var cfdata = $('form[name=' + formname + '] input[name=' + cfieldname + ']');

        }

        if (vtype == "l") {
            rgx = new RegExp('[A-z][a-z]{' + fcount + ',}');
        } else if (vtype == "lu" || vtype == "lcu") {
            ftype !== "" ? rgx = new RegExp('^(?=.*[a-zA-Z_])(?=.*[A-Z])(?=.*[^\\d])(?=.*[_])[a-zA-Z_]{' + fcount + ',}$') : rgx = new RegExp('^[a-zA-Z_](?=[a-zA-Z_]{1,}$)');

        } else if (vtype == "nl" || vtype == "nlc" || vtype == "nlu" || vtype == "nlcu") {
            ftype !== "" ? rgx = new RegExp('^(?=.*[a-zA-Z_\\d])(?=.*[A-Z])(?=.*[\\d])(?=.*[_])[a-zA-Z_\\d]{' + fcount + ',}$') : rgx = new RegExp('^[A-Z0-9\\w\\d](?=[A-Z0-9\\w\\d]{1,}$)');
        } else if (vtype == "nlcus") {
            ftype !== "" ? rgx = new RegExp('^(?=.*[a-zA-Z_\\d\\$!%&])(?=.*[A-Z])(?=.*[\\d])(?=.*[_])(?=.*[\\$!%&])[a-zA-Z_\\d\\$!%&]{' + fcount + ',}$') : rgx = new RegExp('([A-z][0-9][\\w][\\$!%&])?(?=.*[a-z]{1,}).{' + fcount + ',}');
        }
        var errmsg = "";
        var ftypemsg = "";
        if (ftype == "true") {
            ftypemsg = " (at least one of each character set must be matched). ";

        }
        if (vtype == "lcu" || vtype == "lu") {

            errmsg = "This Password field's accepted characters are letters(Upper and Lower Case) and underscore" + ftypemsg + "" + pvala;
        } else if (vtype == "nl" || vtype == "nlc") {
            errmsg = "This Password field's accepted characters are letters(Upper and Lower Case) and numbers only" + ftypemsg + "" + pvala;

        } else if (vtype == "nlu" || vtype == "nlcu") {
            errmsg = "This Password field's accepted characters are letters(Upper and Lower Case), numbers and underscore" + ftypemsg + "" + pvala;
        } else if (vtype == "nlcus") {
            errmsg = "This Password field's accepted characters are letters, numbers, underscore, and special characters: $ ! @ % &." + ftypemsg + "" + pvala;
        }
        if (pval !== "" && pval.replace(/\s\s*/g, "").length < parseInt(fcount)) {
            var clength = pval.replace(/\s\s*/g, "").length;
            var cleft = parseInt(fcount) - parseInt(clength);
            errmsg = "Minimum password length is " + fcount + ", characters left: " + cleft;
            raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
            celem.focus();
            formstatus = false;
            pointmonitor = true;
        } else {
            var testreg = rgx.test(pval);
            console.log(testreg);
            if (testreg == false) {
                raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                celem.focus();
                formstatus = false;
                pointmonitor = true;
            }
        }

        // compare the current value with the confirmation value
        if(cfieldname!==""&&formstatus==true){
            if(cfdata.val()!==pval){
                errmsg="Passwords do not match ";
                raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                celem.focus();
                formstatus = false;
                pointmonitor = true;   
            }
        }
    }

    var esect = $('form[name=' + formname + '] input[data-evalidate=true]');
    if (esect === null || esect === undefined || esect === NaN) {
        var esect = "";
    }
    if (esect.length > 0 && formstatus == true) {
        // console.log(esect);
        // email data verification
        // check to see how many email fields for validation are present
        var elen = $('form[name=' + formname + '] input[data-evalidate=true]').length;
        for (var i = 0; i < parseInt(elen); i++) {
            var curel = $('form[name=' + formname + '] input[data-evalidate=true]')[i];

            var curval = curel.value;
            var cstat = emailValidatorReturnableTwo(curval);
            if (cstat['status'] == "false") {
                var errmsg = cstat['errormsg'];
                raiseMainModal('Form Error!!', '' + errmsg + '', 'fail');
                formstatus = false;
                pointmonitor = true;
                curel.focus();
                break;
            }
        }
    }
    // note, do not use the pvalidate or evalidate attributes on elements whose current
    // values are not being vetted for emptiness. i.e fields that are not required


    // begin comparison field data for the current form fields
    var csect = $('form[name=' + formname + '] input[data-cvalidate=true]');

    if (csect === null || csect === undefined || csect === NaN) {

        var csect = "";

    }

    if (csect.length > 0 && formstatus == true) {

        var elen = $('form[name=' + formname + '] input[data-cvalidate=true]').length;

        for (var i = 0; i < parseInt(elen); i++) {
            var curel = $('form[name=' + formname + '] input[data-cvalidate=true]')[i];

            var curval = curel.value;
            // get the value of the field to be compared to
            var nextel=curel.getAttribute("data-element-data"); 
            var eldata=nextel.split("-:-");
            var nextval=$('form[name=' + formname + '] '+eldata[1]+'[name='+eldata[0]+']').val();
            // console.log(nextel,nextval,curval,eldata);
            if (curval !== nextval) {
                var errmsg=$('form[name=' + formname + '] '+eldata[1]+'[name='+eldata[0]+']').attr('data-error-output');
                if (errmsg === null || errmsg === undefined || errmsg === NaN) {

                    var errmsg = "";

                }
                errmsg = errmsg==""?"Values do not match":errmsg;
                raiseMainModal('Form Error!!', '' + errmsg + '', 'fail');
                formstatus = false;
                pointmonitor = true;
                curel.focus();
                break;
            }
        }

    }




    // begin total file size calculation for the current form file fields

    // first check if the form is a monitor type
    var fttypeform=formmain.attr("data-fdgen");
    if(typeof fttypeform=="undefined" || fttypeform === null || fttypeform === undefined || fttypeform === NaN){
        var fttypeform="noval";
    }

    if(fttypeform=="true"&& formstatus == true){
        // run through the form for each input file element
        var robj=formmain.find('input[type=file]');
        var inputlength=robj.length;
        totalsize=0;
        if(inputlength>0){
            for(var i=0;i<inputlength;i++){
                var curel=robj.get(i);
                // console.log("curel: ",curel);
                var cval=curel.value;
                var csize=curel.getAttribute('data-file-size');
                if(typeof csize=="undefined" || esect === null || csize === undefined || csize === NaN){
                    var csize="noval";
                }
                if(cval!==""&&csize!=="noval"){
                    // add the value of csize
                    totalsize+=parseInt(csize);
                }else if(cval!==""&&csize=="noval"){
                    var errmsg = "A file field in your form has a value but no file size calculated for it, please make sure the form has not been tampered with, check the file field, and try submitting again";
                    raiseMainModal('File Data Mark Error!!', '' + errmsg + '', 'fail');
                    formstatus = false;
                    pointmonitor = true;
                    $("#mainPageModal").on("hidden.bs.modal", function () {
                        curel.focus();
                    });
                    break;
                }
            }
            // convert the size to main 
            // get the expected filesize value
            var fdgen=formmain.find('input[type=hidden][data-fdgen=true]');
            if(totalsize>0){
                if(fdgen.length>0){
                    maxsize=fdgen.val();
                    // console.log("fdgen element: ",fdgen," maxsize value: ",maxsize);
                    if(maxsize!==""){
                        //  the  expected maximum value is in G,M,K
                        // so we remove the suffix and get the real maximum if they are
                        // present
                        var sttype="megabyte";
                        if(maxsize.toLowerCase().indexOf('k')>-1||maxsize.toLowerCase().indexOf('kb')>-1||maxsize.toLowerCase().indexOf('kilobytes')>-1){
                            sttype='kilobyte';
                        }else if(maxsize.toLowerCase().indexOf('g')>-1||maxsize.toLowerCase().indexOf('gb')>-1||maxsize.toLowerCase().indexOf('gigabytes')>-1){
                            sttype='gigabyte';

                        }
                        var tconvert=calculateTotalFileSize(totalsize);
                        tsize=tconvert[sttype];
                        maxsize=maxsize.replace(/\D/g,"");
                        // make sure the value obtianed is in digits first 
                        if(isNumber(maxsize)){
                            if(tsize>maxsize){
                                var errmsg = "A cumulative filesize error has occured, the current size of files to be upploaded is : "+tsize+"("+sttype+") Max allowed is "+maxsize+"";
                                raiseMainModal('File Size Error!!', '' + errmsg + '', 'fail');
                                formstatus = false;
                                pointmonitor = true;

                            }
                        }
                    }
                }else{
                    var errmsg = "There seems to be a problem, no maximum marker element set for file size data sets";
                    raiseMainModal('File Data Mark Error!!', '' + errmsg + '', 'fail');
                    formstatus = false;
                    pointmonitor = true;

                }
            }
        }else{
            // check to see if any of the file elements have a value om ot
        }
    }
    formit['formstatus'] = formstatus;
    formit['pointmonitor'] = pointmonitor;
    if (stype == "") {
        return formit;
    } else if (stype == "complete") {
        if (formstatus == true) {
            var tester = window.confirm('The form is ready to be submitted click ok to continue or cancel to review');
            if (tester === true) {
                $('form[name=' + formname + ']').attr("onSubmit", "return true;").submit();
            } else {
                $('form[name=' + formname + ']').attr("onSubmit", "return false;");
            }
        }
        /*else if(formstatus==false && ajaxtestrun==true){
      alert("There is a validation process currently being carried out on a field with provided data, please be patient as this takes a moment");
    }*/
    }
}

// init fdgen form field elements for data operations
$(document).on("change","form[data-fdgen=true] input[type=file]",function(){
    // run the fileSizeGen Function
    fileSizeGen($(this),"form[data-fdgen=true]","");
});

// generic function to produce file size for selected files and total their output

function fileSizeGen(input,type="",totalsizel,stypel="megabyte") {
    // generates files size
    // attaches filesize to associated element using the data-file-size attribute
    var results_arr=[];
    // console.log("Input 1:",input,"\n Input 2:",input[0].files[0],"Input 3:",$(input[0]));
    // check for the 
    if (input[0].files[0]) {
        // create reader instance for monitoring the choosen file from the 
        // input file field
        var reader = new FileReader();
        $(input[0]).attr("data-state", "loading");
        var targetElem = $(input[0]);
        var editelemdata = targetElem.attr("data-edit");
        var filesize=totalsizel;
        
        // console.log("Editdata: ",editelemdata," Section head:", editsectionhead," readurl: ",type);
        var csize=typeof input[0].files[0].size !=="undefined"?input[0].files[0].size:0;
        if(csize==0){

            reader.onload = function(e) {
                // data list is as follows
                /*
                  * e.total=total number of bytes
                  * e.target.result=total entry
                  *
                  *
                  *
                */
                // $(''+targetElementImg+'').attr('src', e.target.result).removeClass('hidden');
                name = $(input[0]).val();
                totalname = name.split('\\');
                // console.log('name: ',name,' splitname: ',totalname);
                name = totalname[totalname.length - 1];
                // console.log(e);
                bytesize = e.total;
                // this variable carries the data value for the selected file
                // for images, this value can be used to generate a preview
                result = e.target.result;
                var ftype = getExtension(targetElem.val());
                input.attr("data-file-size", bytesize);
                var totalsize = calculateTotalFileSize(curtotal);
                if(totalsizel!==""){
                    var curtotal = Math.floor(filesize.val());
                    curtotal += bytesize;
                    filesize.val(curtotal);
                }
                /*CONTROL Block FOR varying output formats*/
                
                    // recalculate total size
                    // deals only in MB
                    var cursize = '<span class="color-green">' + totalsize[stypel] + 'MB</span>';
                    if (totalsize['megabyte'] > 30) {
                        cursize = '<span class="color-red">' + totalsize[stypel] + 'MB</span>';
                    }
                    var totalsize = calculateTotalFileSize(bytesize);
                    results_arr['cursizekb']=totalsize['kilobyte'];
                    results_arr['cursizemb']=totalsize['megabyte'];
                    results_arr['cursizegb']=totalsize['gigabyte'];

                $(input[0]).attr("data-state", "loaded");

            }
        }else{
            bytesize=csize;
            var totalsize = calculateTotalFileSize(bytesize);
            results_arr['cursizekb']=totalsize['kilobyte'];
            results_arr['cursizemb']=totalsize['megabyte'];
            results_arr['cursizegb']=totalsize['gigabyte'];
        }
        reader.readAsDataURL(input[0].files[0]);
        $(input[0]).attr({"data-state":"loaded","data-file-size":bytesize});
        // console.log(bytesize,'in here');
    } else {
        
        $(input[0]).attr({"data-state":"loaded","data-file-size":"0"});
    }
    if(type=="fdgen"){
        /*if(input[0].form.find('span.fdgen-fsoutput').length>0){
            input[0].form.find('span.fdgen-fsoutput').html();
        }*/
    }
    return results_arr;
}
// for gmaps setup with several location:resources
function initializeGmap(lat, lng, data, multiple="", locations=[]) {
    // console.log(lat, lng, locations);
    var elid = data['elid'] !== "" && typeof (data['elid']) !== "undefined" ? data['elid'] : "default_map";
    var zoom = data['zoom'] !== "" && typeof (data['zoom']) !== "undefined" ? Math.floor(data['zoom']) : 8;
    var zoomcontrol = data['zoomcontrol'] !== "" && typeof (data['zoomcontrol']) !== "undefined" ? data['zoomcontrol'] : true;
    var defaultui = data['defaultui'] !== "" && typeof (data['defaultui']) !== "undefined" ? Boolean(data['defaultui']) : true;
    var styles = data['styles'] !== "" && typeof (data['styles']) !== "undefined" ? data['styles'] : "";
    var mtypeid = data['mtypeid'] !== "" && typeof (data['mtypeid']) !== "undefined" ? data['mtypeid'] : google.maps.MapTypeId.ROADMAP;
    // data represents the multiple map locations
    if (lat !== "" && lng !== "") {
        console.log(lat, lng, locations, zoom, zoomcontrol, styles, mtypeid, defaultui);
        var myOptions = {
            center: new google.maps.LatLng(lat,lng),
            zoom: zoom,
            disableDefaultUI: defaultui,
            zoomControl: zoomcontrol,
            styles: styles,
            mapTypeId: mtypeid

        }

        var map = new google.maps.Map(document.getElementById(elid),myOptions);
        // if(multiple=="yes"){
        // console.log(location[0][0]);
        setMarkers(map, locations);

        // }

    }

}

function setMarkers(map, locations) {

    var marker, i;
    console.log(locations);
    var ll=locations.length;
    for (i = 0; i < ll; i++) {

        var title = locations[i][0];
        var lat = locations[i][1];
        var lng = locations[i][2];
        var add = locations[i][3];
        var con = locations[i][4];
        var icon = locations[i][5];
        // var clatlng
        latlngset = new google.maps.LatLng(lat,lng);

        var marker = new google.maps.Marker({
            map: map,
            title: title,
            position: latlngset
        });
        map.setCenter(marker.getPosition());

        var content = con;

        var infowindow = new google.maps.InfoWindow({
            position: latlngset,
            icon: icon
        });

        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
            return function() {
                closeInfos();
                infowindow.setContent(content);
                infowindow.open(map, marker);
                /* keep the handle, in order to close it on next click event */
                infos[0] = infowindow;
            }
            ;
        })(marker, content, infowindow));

    }
}

function closeInfos() {

    if (infos.length > 0) {

        /* detach the info-window from the marker ... undocumented in the API docs */
        infos[0].set("marker", null);

        /* and close it */
        infos[0].close();

        /* blank the array */
        infos.length = 0;
    }
}

// end gmaps

bytesize = 0;
result = "";
function readURLTwo(input, type) {
    // var results_arr=[];
    // console.log(input,input[0].files[0],$(input[0]));
    if (input[0].files[0]) {
        var reader = new FileReader();
        $(input[0]).attr("data-state", "loading");
        var targetElem = $(input[0]);
        var editelemdata = targetElem.attr("data-edit");
        if (type == "napstanduserimgupload" || type == "napstanduserimgeditupload") {
            var targetelement = targetElem.parent().parent().parent().parent().parent().parent().parent();

        } else if (type == "napstanduserzipupload" || type == "napstanduserzipeditupload") {
            var targetelement = targetElem.parent().parent().parent().parent().parent().parent();

        }
        var targetparid = targetelement.attr("data-id");
        // console.log(targetelement,targetparid);
        if (targetparid !== "" && typeof (targetelement.attr("data-id")) !== "undefined") {
            targetparid = '[data-id=' + targetparid + ']';
            targetparidmain = 'div' + targetparid + '';
        } else {
            targetparid = "";
            targetparidmain = "";
        }
        typeof (editelemdata) == "undefined" || editelemdata == "undefined" ? editelemdata = "" : editelemdata = editelemdata;
        if (type == "napstanduserzipupload" || type == "napstanduserzipeditupload") {
            var filesize = editelemdata !== "edit" ? $('input[name=zipfilesizeout]') : $('' + targetparidmain + ' input[name=zipfilesizeoutedit]');
            var editsectionhead = "div[data-name=upload-zip-section" + editelemdata + "]" + targetparid + " ";

            $('' + editsectionhead + '.entrymarker.zip p.total-size').html('<img src="' + host_addr + 'images/waiting.gif" class="loadermini">')
            $('' + editsectionhead + 'input[name=zipfilesizeout' + editelemdata + ']').attr("data-state", "loading");
        } else if (type == "napstanduserimgupload" || type == "napstanduserimgeditupload") {
            var filesize = editelemdata !== "edit" ? $('input[name=filesizeout]') : $('' + targetparidmain + ' input[name=filesizeoutedit]');
            var editsectionhead = "div[data-name=upload-image-section" + editelemdata + "]" + targetparid + " ";

        }
        // console.log("Editdata: ",editelemdata," Section head:", editsectionhead," readurl: ",type);

        reader.onload = function(e) {
            // data list is as follows
            /*
          * e.total=total number of bytes
          * e.target.result=total entry
          *
          *
          *
          */
            // $(''+targetElementImg+'').attr('src', e.target.result).removeClass('hidden');
            name = $(input[0]).val();
            totalname = name.split('\\');
            // console.log('name: ',name,' splitname: ',totalname);
            name = totalname[totalname.length - 1];
            // console.log(e);
            bytesize = e.total;
            result = e.target.result;
            /*CONTROL Block FOR varying output formats*/
            if (type == "napstanduserimgupload" || type == "napstanduserimgeditupload") {
                var divide = input.attr("name").split('e');
                var c = divide[1];

                $('' + editsectionhead + '.img_prev_hold.' + c + '').html('<img src="' + result + '"/>');
                input.attr("data-file-size", bytesize);
                var curtotal = Math.floor(filesize.val());
                curtotal += bytesize;
                filesize.val(curtotal);
                // recalculate total size
                var totalsize = calculateTotalFileSize(curtotal);
                // deal only in MB
                var cursize = '<span class="color-green">' + totalsize['megabyte'] + 'MB</span>';
                if (totalsize['megabyte'] > 30) {
                    cursize = '<span class="color-red">' + totalsize['megabyte'] + 'MB</span>';
                }
                $('' + editsectionhead + '.entrymarker.images p.total-size').html(cursize);
                $('' + editsectionhead + '.entrymarker.images input[name=filesizeout' + editelemdata + ']').attr("data-state", "loaded");
            } else if (type == "napstanduserzipupload" || type == "napstanduserzipeditupload") {
                // input.attr("data-file-size",bytesize);

                var ftype = getExtension(targetElem.val());
                if (ftype['extension'] == "zip") {
                    filesize.val(bytesize);
                    // recalculate total size
                    var totalsize = calculateTotalFileSize(bytesize);
                    // deal only in MB
                    var cursize = '<span class="color-green">' + name + ' : ' + totalsize['megabyte'] + 'MB</span>';
                    if (totalsize['megabyte'] > 30) {
                        cursize = '<span class="color-red">' + name + ' : ' + totalsize['megabyte'] + 'MB TOO LARGE!!!</span>';
                    }
                    $('' + editsectionhead + '.entrymarker.zip p.total-size').html(cursize);
                    $('' + editsectionhead + '.entrymarker.zip input[name=zipfilesizeout' + editelemdata + ']').attr("data-state", "loaded");

                } else {
                    cursize = '<span class="color-red">WRONG FILE TYPE : 0MB</span>';
                    $('' + editsectionhead + '.entrymarker.zip p.total-size').html(cursize);
                    $('' + editsectionhead + '.entrymarker.zip input[name=zipfilesizeout' + editelemdata + ']').val("0").attr("data-state", "loaded");
                }
            }

            $(input[0]).attr("data-state", "loaded");

        }
        reader.readAsDataURL(input[0].files[0]);
        // console.log(bytesize,'in here');
    } else {
        if (type == "napstanduserimgupload") {} else if (type == "napstanduserzipupload") {
            $('' + editsectionhead + '.entrymarker.zip p.total-size').html('<span class="color-red">0MB</span>');
            $('' + editsectionhead + '.entrymarker.zip input[name=zipfilesizeout' + editelemdata + ']').attr("data-state", "loaded");
        }
        $(input[0]).attr("data-state", "loaded");
    }
    // return results_arr;
}
function contentImageSelect(input) {
    var targetElem = $(input);
    var divide = targetElem.attr("name").split('e');
    var c = divide[1];
    var editelemdata = targetElem.attr("data-edit");
    typeof (editelemdata) == "undefined" || editelemdata == "undefined" ? editelemdata = "" : editelemdata = editelemdata;
    // console.log("c: ",c, input)
    var curfilesize = targetElem.attr('data-file-size');
    var filesize = editelemdata !== "edit" ? $('input[name=filesizeout]') : $('input[name=filesizeoutedit]');
    var editsectionhead = "div[data-name=upload-image-section] ";
    var editreadurl = "napstanduserimgupload";
    if (editelemdata == "edit") {
        editsectionhead = "div[data-name=upload-image-sectionedit] ";
        editreadurl = "napstanduserimgeditupload";
    }
    // console.log("Editdata: ",editelemdata," Section head:", editsectionhead," readurl: ",editreadurl);

    if (typeof (curfilesize) !== "undefined" && curfilesize !== "") {
        var totalfilesize = filesize.val();
        var curtotalsize = totalfilesize - curfilesize;
        filesize.val(curtotalsize);
        // recalculate total size
        var totalsize = calculateTotalFileSize(curtotalsize);
        // deal only in MB
        var cursize = '<span class="color-green">' + totalsize['megabyte'] + 'MB</span>';
        if (totalsize['megabyte'] > 30) {
            cursize = '<span class="color-red">' + totalsize['megabyte'] + 'MB</span>';
        }
        $('' + editsectionhead + '.entrymarker.images p.total-size').html(cursize);
        // console.log("contentmarker: ",$(''+editsectionhead+'.entrymarker.images p.total-size'));
        targetElem.attr('data-file-size', '0')
    }
    if (targetElem.val() !== "") {
        var ftype = getExtension(targetElem.val());
        if (ftype['type'] == "image") {
            readURLTwo(targetElem, "" + editreadurl + "");
            // console.log("src data: ",bytesize,filesrc);
        } else {
            alert("Please Upload an image, no other file format is accepted here");
        }
    } else {
        $('' + editsectionhead + ' .img_prev_hold.' + c + '').html("");

    }

}





function calculateTotalFileSize(bytecount) {
    var fileout = [];
    // calculate for KB
    var kb_count = Math.ceil10(Math.floor(bytecount) / 1024, -2);
    // Calculate for MB
    var mb_count = Math.ceil10(Math.floor(kb_count) / 1024, -2);
    // calculate for GB
    var gb_count = Math.ceil10(Math.floor(mb_count) / 1024, -2);
    fileout['kilobyte'] = kb_count;
    fileout['megabyte'] = mb_count;
    fileout['gigabyte'] = gb_count;
    return fileout;
}


function sortThroughSplitPoints() {
    // get all the split point markers
    var markerp = $('div.split-point-bottom, div.split-point-top');
    // console.log('Running Sort');
    // get all indent type markers
    var markeri = $('div.split-indent-bottom, div.split-indent-top');
    // console.log("Markermain: ",markerp);
    // run a for loop to get each marker, obtain its parent, then get the details for
    // the border pointer/indentation pixel parameter
    var mpl=markerp.length;
    for (var i = 0; i < mpl; i++) {
        var curmarker = markerp.get(i);
        var curmarkerp = markerp.get(i).parentElement;
        var maxw = curmarkerp.clientWidth;
        var maxh = curmarkerp.clientHeight;

        // check to see if there are spaces in the classname and get
        // the first content of the class as it would be the split marker
        var spacecheck = markerp.get(i).className.split(" ");
        var fullcheck = spacecheck[0];
        // get the type of point
        var pointcheck = fullcheck.split("-");
        var lpoint = pointcheck[pointcheck.length - 1];
        var btlr = Math.floor(parseInt(maxw) / 2);
        if (lpoint == "bottom" || lpoint == "top") {
            // markerp.get(i).css({"border-left-width":btlr+"px","border-right-width":btlr+"px"});
            markerp.get(i).style.borderLeftWidth = btlr + "px";
            markerp.get(i).style.borderRightWidth = btlr + "px";
        }
        // calculate the current left and right dimensions for top and bottom
        if (i == 0) {// console.log("Marker: ", markerp.get(i),"\n Parent el: ", curmarkerp.clientWidth," \n markerclass: ",markerp.get(i).className);
        }
    }
    var mil=markeri.length
    for (var i = 0; i < mil; i++) {
        var curmarker = markeri.get(i);
        var curmarkeri = markeri.get(i).parentElement;
        var maxw = curmarkeri.clientWidth;
        var maxh = curmarkeri.clientHeight;

        // check to see if there are spaces in the classname and get
        // the first content of the class as it would be the split marker
        var spacecheck = markeri.get(i).className.split(" ");
        var fullcheck = spacecheck[0];
        // get the type of point
        var pointcheck = fullcheck.split("-");
        var lpoint = pointcheck[pointcheck.length - 1];
        var btlr = Math.floor(parseInt(maxw) / 2);
        // btlr=maxw<=480?btlr+12:btlr;
        if (lpoint == "bottom" || lpoint == "top") {
            // markeri.get(i).css({"border-left-width":btlr+"px","border-right-width":btlr+"px"});
            markeri.get(i).style.borderLeftWidth = btlr + "px";
            markeri.get(i).style.borderRightWidth = btlr + "px";
        }
        // calculate the current left and right dimensions for top and bottom
        if (i == 0) {// console.log("Marker: ", markeri.get(i),"\n Parent el: ", curmarkeri.clientWidth," \n markerclass: ",markeri.get(i).className);
        }
    }

}




/**
    *   Create form fields in multiple element groups in repeating format
    *   This is a part of the groupset handler functions
    *   
    *   @param string&JQuery Selector 'element' represents the element that triggers the  
    *   generation/removal of extra fields in the form
    *
    *   @param string&JQuery selector 'entryel' represents the field element that determines
    *   where new generated content will be posted to, either before, or after it, this is
    *   optional
    *
    *   @param selector 'groupparent' this represents the parent element holding the current
    *   group set of elements. the values defaults to the parent of the 'element' selector
    *
    *   @param int 'curcountel' this represents the current amount of entries in the parent
    *   container element 'groupparent'
    *
    *   @param int 'curnextcount' is the new total amount of entries expected in the parent
    *   element container, the value is either more than or less than 'cucountel' and depend
    *   -ing on the value an increment or decrement in the number of entries will occur. 
    *
    *   @param selector 'countel' is the form element responsible for storing the current 
    *   amount of sets within the parent container, this value can be used to sort through
    *   the group upon submission of the form for processing.
    *
    *   refer to $HOST/snippets/gdsdocs.php group set entries section for usage sample    
*/
function multipleElGenerator(element, entryel="", groupparent="", curcountel=0, curnextcount=0, countel="") {
    // element = selector for the clickable element to trigger the generation
    // entryel = selector for the entry field dummy element where new form content
    // are posted into
    // group parent = the parent element for the multiple entry elements
    var podtype = "";
    var eldiff = 0;
    var formname = $('' + element + '').attr("data-form-name");
    var curname = $('' + element + '').attr("data-name");
    var codata = curname.split("_addlink");
    var countername = codata[0];
    var coredata = countername.split("count");
    var corename = coredata[0];
    var insertiontype = $('' + element + '').attr("data-i-type");
    
    var maintotalscripts="";

    // check if the funcdata input element exists in the current group
    var funcdatamap=$('div.' + corename + '-field-hold').find('input[name='+corename+'funcdata]');
    // console.log("funcdata map: ",funcdatamap);
    
    if(funcdatamap.length>0 && funcdatamap.val()!==""){
        if(typeof JSON.parse=="function"){
            var curfdmap=JSON.parse(funcdatamap.val().replace(/'{1,}/g,'"'));
        }else{
            var curfdmap=eval(funcdatamap.val().replace(/'{1,}/g,'"'));
        }

        var curfdmapout=parseDataFunc(curfdmap);
        // console.log("funcdata map: ",curfdmap, " curdmap: ",curfdmapout);
        // get the delete/destroy scripts if available
        if(curfdmapout['doutput']!==""){

            if($('div.' + corename + '-field-hold script[data-name=multiscript_gd').length>0){
                $('div.' + corename + '-field-hold script[data-name=multiscript_gd').remove();
            }
            // $('<script data-name="multiscript_gd">'+curfdmapout['doutput']+'</script>').appendTo('div.' + corename + '-field-hold');
                
            
        }
        // get the script equivalent
        maintotalscripts='<script data-name="multiscript_gd">$(document).ready(function(){'+curfdmapout['output']+'});</script>';
    }

    // console.log("insertiontype: ",insertiontype, typeof(insertiontype));
    if (typeof (insertiontype) == "undefined" || insertiontype == null || !insertiontype || insertiontype == "" || insertiontype == "undefined") {
        var insertiontype = "default";
    }
    if (parseInt(curcountel) > 0 && parseInt(curnextcount) > 0) {
        if (parseInt(curcountel) > parseInt(curnextcount)) {
            // decrement
            podtype = "decrement";
            eldiff = parseInt(curcountel) - parseInt(curnextcount);
        } else if (parseInt(curcountel) < parseInt(curnextcount)) {
            // increment
            podtype = "increment";
            eldiff = parseInt(curnextcount) - parseInt(curcountel);
        }
        // console.log("Podtype: ",podtype," \n eldiff: ",eldiff," \n curcountel: ",curcountel," \n curnextcount: ",curnextcount);
    }
    if (parseInt(curcountel) == parseInt(curnextcount) && groupparent !== "") {
        podtype = "noadd";
        var errmsg = "Exact field amount has been displayed, no change detected";
        raiseMainModal('Form error!!', '' + errmsg + '', 'fail');
        if (countel !== "") {
            $("#mainPageModal").on("hidden.bs.modal", function() {
                $('' + countel + '').addClass('error-class').focus();
            });
        }
    }
    // make sure that the next count is not a negative or neutral number 
    if(curnextcount>0){
        if (podtype == "" || podtype == "increment") {
            var sentineltype = $('' + element + '').attr("data-sentineltype");
            // console.log("sentineltype: ",sentineltype, typeof(sentineltype));
            if (typeof (sentineltype) == "undefined" || sentineltype == null || !sentineltype || sentineltype == "" || sentineltype == "undefined") {
                var sentineltype = "";
            }

            var mainparent = groupparent !== "" ? $('' + groupparent + '') : $('' + element + '').parent();
            var shadowlimit = 0;
            if (mainparent.find('input[name=' + countername + ']').length > 0) {
                var branchcount = mainparent.find('input[name=' + countername + ']').val();
            } else {
                var branchcount = curcountel;
            }
            // get the entry point div
            var entrypoint = mainparent.find('[name=' + corename + 'entrypoint][data-marker=true]');
            // console.log(entrypoint);
            // get the limit to the entries
            var branchlimit = $('' + element + '').attr("data-limit");
            var doentry = "true";

            if (typeof (branchlimit) == "undefined") {
                branchlimit = "";
            } else {
                branchlimit = Math.floor(branchlimit);
            }

            var eltotalgroup = "";

            if (podtype == "") {
                // console.log("After modify insertiontype: ",insertiontype, typeof(insertiontype));

                // console.log("branchlimit - ",branchlimit);
                var nextcounttrue = 0;
                var nextcount = curnextcount == "" || curnextcount == 0 ? Math.floor(branchcount) + 1 : curnextcount;
                if (sentineltype !== "" && Math.floor(sentineltype) > 0) {
                    nextcounttrue = Math.floor(nextcount) - Math.floor(sentineltype);
                } else {
                    nextcounttrue = nextcount;
                }
                if (isNumber(branchlimit) && branchlimit > 0) {
                    if (nextcounttrue <= Math.floor(branchlimit)) {
                        if(typeof curfdmapout!=="undefined"){
                            $('<script data-name="multiscript_gd">'+curfdmapout['doutput']+'</script>').appendTo('form[name='+formname+'] div.' + corename + '-field-hold');
                        }
                    }
                }
                // console.log("nextcounttrue - ",nextcounttrue," branchlimit - ",branchlimit);
                // get the base element and clone it
                var elgroup = groupparent !== "" ? $('' + groupparent + '').find('[data-type=triggerprogenitor]').clone(true) : $('' + element + '').parent().find('[data-type=triggerprogenitor]').clone(true);
                // console.log(elgroup);
                // reset the values for all form content within the fields
                elgroup.find('input[type!=hidden]').val("");
                elgroup.find('[data-hdeftype=hidden]').addClass("hidden");
                // console.log(elgroup.find('input[type!=hidden]'));
                elgroup.find('select').val("");
                elgroup.find('textarea').val("");

                // check for tinymce elements in the elgroup and proceed to augment them as appropriate
                var mceelements = elgroup.find('[data-type=tinymcefield]');

                // runa for loop on the mce elements to process them for the new content
                // this array holds the new set of ids for tinymce initialization
                var strinnerset = [];
                // these arrays carry the config for new toolbar components in tinymce initialization
                var mceoptions = [];
                var domce = "";
                var cmcecount = 0;
                if (mceelements.length > 0) {

                    domce = "true";
                    cmcecount = mceelements.length;
                    // remove all tiny mce cloned content
                    elgroup.find('div.mce-container').remove();
                    for (var i = 0; i < cmcecount; i++) {
                        // convert to multidimensional array
                        mceoptions[i] = [];
                        var curparent = "";
                        curparent = elgroup.find('[data-type=tinymcefield]').parent()[i];

                        // console.log("Cur match set - ",elgroup.find('[data-type=tinymcefield]').parent().find('input[type=hidden][name=width][data-type=tinymce]'),"Element Parent - ", curparent," Element Parent with JQ - ",$(curparent));
                        var curelem = mceelements[i];
                        // var tpinner=tp[0].innerText;
                        // get the current id
                        var curid = curelem.getAttribute("id");
                        var nxtid = '' + curid + '' + nextcount + '';
                        // change the element id to match the new one
                        curelem.removeAttribute("style");
                        curelem.removeAttribute("aria-hidden");
                        curelem.setAttribute("id", nxtid);

                        var nxtstrfunc = 'textarea#' + curid + '' + nextcount + '';
                        strinnerset[i] = nxtstrfunc;

                        // get the tinymce options if they exist, they are in hidden elements
                        // with the data-type attribute of tinymce and name associated with their
                        // settings
                        var wt = "";
                        wt = curparent.querySelector('input[type=hidden][name=width][data-type=tinymce]');
                        if (wt === null || wt === undefined || wt === NaN) {
                            wt = "";
                        }
                        mceoptions[i]['width'] = wt !== "" && typeof wt !== "undefined" ? wt.value : "";
                        // console.log("width test 1");

                        var tb1 = "";
                        tb1 = curparent.querySelector('input[type=hidden][name=toolbar1][data-type=tinymce]');
                        if (tb1 === null || tb1 === undefined || tb1 === NaN) {
                            tb1 = "";
                        }
                        mceoptions[i]['toolbar1'] = tb1 !== "" && typeof tb1 !== "undefined" ? tb1.value : "";

                        var tb2 = "";
                        tb2 = curparent.querySelector('input[type=hidden][name=toolbar2][data-type=tinymce]');
                        if (tb2 === null || tb2 === undefined || tb2 === NaN) {
                            tb2 = "";
                        }
                        mceoptions[i]['toolbar2'] = tb2 !== "" && typeof tb2 !== "undefined" ? tb2.value : "";
                        var ht = "";
                        ht = curparent.querySelector('input[type=hidden][name=height][data-type=tinymce]');
                        if (ht === null || ht === undefined || ht === NaN) {
                            ht = "";
                        }
                        mceoptions[i]['height'] = ht !== "" && typeof ht !== "undefined" ? ht.value : "";

                        var th = "";
                        th = curparent.querySelector('input[type=hidden][name=theme][data-type=tinymce]');
                        if (th === null || th === undefined || th === NaN) {
                            th = "";
                        }
                        mceoptions[i]['theme'] = th !== "" && typeof th !== "undefined" ? th.value : "";

                        var fmt = "";
                        fmt = curparent.querySelector('input[type=hidden][name=filemanagertitle][data-type=tinymce]');
                        if (fmt === null || fmt === undefined || fmt === NaN) {
                            fmt = "";
                        }
                        mceoptions[i]['filemanagertitle'] = fmt !== "" && typeof fmt !== "undefined" ? fmt.value : "";

                    }
                    ;
                }
                // console.log("script elements - ", scriptelements);
                // console.log("Real group first- ", elgroup," Parent element", $(''+element+'').parent()," corename - ",corename);        

                // remove any progenitor details from the cloned element

                var cid = groupparent !== "" ? $('' + groupparent + '').find('div[data-type=triggerprogenitor]').attr("data-cid") : $('' + element + '').parent().find('div[data-type=triggerprogenitor]').attr("data-cid");
                elgroup.removeAttr("data-cid");
                elgroup.attr("data-type", "triggerprogeny");

                var hlabeltext = elgroup.find('.multi_content_countlabels').html();

                // console.log("Real group - ", elgroup," ",elgroup.find('.multi_content_countlabels'));

                // change the h4 label content if necessary to reflect new content present
                hlabeltext = hlabeltext.replace('(Entry ' + cid + ')', '(Entry ' + nextcount + ')');

                elgroup.find('.multi_content_countlabels').html(hlabeltext);
                // get element map for form element name manipulation
                var cmap = mainparent.find('input[name=' + corename + 'datamap]');
                // console.log("cmap: ",cmap);
                var efdstepone = cmap.val().split("<|>");
                var efdl=efdstepone.length;
                for (var i = 0; i < efdl; i++) {
                    if (efdstepone[i] !== "") {
                        var curdata = efdstepone[i].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, '').split("-:-");
                        var fieldname = curdata[0];
                        var fieldtype = curdata[1];
                        // console.log("curfieldname - ", ''+fieldname+''+cid+''," curfieldtype - ", ''+fieldtype+'');
                        // run through the clone set and replace every instance of the current
                        // element set with their new values
                        // you can also change other values as well
                        if (fieldname !== "" && fieldtype !== "") {
                            elgroup.find('' + fieldtype + '[name=' + fieldname + '' + cid + ']').attr("name", '' + fieldname + '' + nextcount + '');
                        }
                    }
                }
                ;// console.log("elgroup modified: ",elgroup);
                if (isNumber(branchlimit) && branchlimit > 0) {
                    if (nextcounttrue <= Math.floor(branchlimit)) {
                        doentry = "true";
                        // update the library scripts for reinitializing the content
                        // that are tied to said libraries
                        if(maintotalscripts!==""){
                            elgroup.append(maintotalscripts);
                        }
                    } else {
                        doentry = "false";
                        window.alert("Maximum allowed entries reached");
                    }
                }
                if (doentry == "true") {
                    if (insertiontype == "default" || insertiontype == "before") {
                        $(elgroup).insertBefore(entrypoint);
                    } else if (insertiontype == "after") {
                        $(elgroup).insertAfter(entrypoint);

                    }
                    //selection.appendTo(outs);
                    mainparent.find('input[name=' + countername + ']').val('' + nextcount + '');
                    // for tinymce init
                    if (domce == "true") {
                        for (var i = 0; i < cmcecount; i++) {
                            callTinyMCEInit(strinnerset[i], mceoptions[i]);
                        }
                        ;
                    }
                }
                // var nextcountout=nextcount-3;
                // var nextcountmain=nextcount-1;
            } else if (podtype == "increment") {
                var cid = groupparent !== "" ? $('' + groupparent + '').find('div[data-type=triggerprogenitor]').attr("data-cid") : $('' + element + '').parent().find('div[data-type=triggerprogenitor]').attr("data-cid");
                for (var ti = curcountel + 1; ti <= curnextcount; ti++) {
                    // console.log("Curcount", ti);
                    var nextcounttrue = 0;
                    var nextcount = ti;
                    if (sentineltype !== "" && Math.floor(sentineltype) > 0) {
                        nextcounttrue = Math.floor(nextcount) - Math.floor(sentineltype);
                    } else {
                        nextcounttrue = nextcount;
                    }
                    if (isNumber(branchlimit) && branchlimit > 0) {
                        if (nextcounttrue <= Math.floor(branchlimit)) {
                            if(typeof curfdmapout!=="undefined"){
                                $('<script data-name="multiscript_gd">'+curfdmapout['doutput']+'</script>').appendTo('form[name='+formname+'] div.' + corename + '-field-hold');
                            }
                        }
                    }
                    
                    var elgroup = groupparent !== "" ? $('' + groupparent + '').find('[data-type=triggerprogenitor]').clone(true) : $('' + element + '').parent().find('[data-type=triggerprogenitor]').clone(true);
                    // console.log("nextcounttrue - ",nextcounttrue," branchlimit - ",branchlimit);
                    // get the base element and clone it
                    // console.log(elgroup);
                    // reset the values for all form content within the fields
                    elgroup.find('input[type!=hidden]').val("");
                    elgroup.find('[data-hdeftype=hidden]').addClass("hidden");
                    // console.log(elgroup.find('input[type!=hidden]'));
                    elgroup.find('select').val("");
                    elgroup.find('textarea').val("");

                    // check for tinymce elements in the elgroup and proceed to augment them as appropriate
                    var mceelements = elgroup.find('[data-type=tinymcefield]');

                    // runa for loop on the mce elements to process them for the new content
                    // this array holds the new set of ids for tinymce initialization
                    var strinnerset = [];
                    // these arrays carry the config for new toolbar components in tinymce initialization
                    var mceoptions = [];
                    var domce = "";
                    var cmcecount = 0;
                    if (mceelements.length > 0) {

                        domce = "true";
                        cmcecount = mceelements.length;
                        // remove all tiny mce cloned content
                        elgroup.find('div.mce-container').remove();
                        for (var i = 0; i < cmcecount; i++) {
                            // convert to multidimensional array
                            mceoptions[i] = [];
                            var curparent = "";
                            curparent = elgroup.find('[data-type=tinymcefield]').parent()[i];

                            // console.log("Cur match set - ",elgroup.find('[data-type=tinymcefield]').parent().find('input[type=hidden][name=width][data-type=tinymce]'),"Element Parent - ", curparent," Element Parent with JQ - ",$(curparent));
                            var curelem = mceelements[i];
                            // var tpinner=tp[0].innerText;
                            // get the current id
                            var curid = curelem.getAttribute("id");
                            var nxtid = '' + curid + '' + nextcount + '';
                            // change the element id to match the new one
                            curelem.removeAttribute("style");
                            curelem.removeAttribute("aria-hidden");
                            curelem.setAttribute("id", nxtid);

                            var nxtstrfunc = 'textarea#' + curid + '' + nextcount + '';
                            strinnerset[i] = nxtstrfunc;

                            // get the tinymce options if they exist, they are in hidden elements
                            // with the data-type attribute of tinymce and name associated with their
                            // settings
                            var wt = "";
                            wt = curparent.querySelector('input[type=hidden][name=width][data-type=tinymce]');
                            if (wt === null || wt === undefined || wt === NaN) {
                                wt = "";
                            }
                            mceoptions[i]['width'] = wt !== "" && typeof wt !== "undefined" ? wt.value : "";
                            // console.log("width test 1");

                            var tb1 = "";
                            tb1 = curparent.querySelector('input[type=hidden][name=toolbar1][data-type=tinymce]');
                            if (tb1 === null || tb1 === undefined || tb1 === NaN) {
                                tb1 = "";
                            }
                            mceoptions[i]['toolbar1'] = tb1 !== "" && typeof tb1 !== "undefined" ? tb1.value : "";

                            var tb2 = "";
                            tb2 = curparent.querySelector('input[type=hidden][name=toolbar2][data-type=tinymce]');
                            if (tb2 === null || tb2 === undefined || tb2 === NaN) {
                                tb2 = "";
                            }
                            mceoptions[i]['toolbar2'] = tb2 !== "" && typeof tb2 !== "undefined" ? tb2.value : "";
                            var ht = "";
                            ht = curparent.querySelector('input[type=hidden][name=height][data-type=tinymce]');
                            if (ht === null || ht === undefined || ht === NaN) {
                                ht = "";
                            }
                            mceoptions[i]['height'] = ht !== "" && typeof ht !== "undefined" ? ht.value : "";

                            var th = "";
                            th = curparent.querySelector('input[type=hidden][name=theme][data-type=tinymce]');
                            if (th === null || th === undefined || th === NaN) {
                                th = "";
                            }
                            mceoptions[i]['theme'] = th !== "" && typeof th !== "undefined" ? th.value : "";

                            var fmt = "";
                            fmt = curparent.querySelector('input[type=hidden][name=filemanagertitle][data-type=tinymce]');
                            if (fmt === null || fmt === undefined || fmt === NaN) {
                                fmt = "";
                            }
                            mceoptions[i]['filemanagertitle'] = fmt !== "" && typeof fmt !== "undefined" ? fmt.value : "";

                        }
                        ;
                    }
                    // console.log("script elements - ", scriptelements);
                    // console.log("Real group first- ", elgroup," Parent element", $(''+element+'').parent()," corename - ",corename);        

                    // remove any progenitor details from the cloned element

                    elgroup.removeAttr("data-cid");
                    elgroup.attr("data-type", "triggerprogeny");

                    var hlabeltext = elgroup.find('.multi_content_countlabels').html();

                    // console.log("Real group - ", elgroup," ",elgroup.find('.multi_content_countlabels'));

                    // change the h4 label content if necessary to reflect new content present
                    hlabeltext = hlabeltext.replace('(Entry ' + cid + ')', '(Entry ' + ti + ')');

                    elgroup.find('.multi_content_countlabels').html(hlabeltext);
                    // get element map for form element name manipulation
                    var cmap = mainparent.find('input[name=' + corename + 'datamap]');
                    // console.log("cmap: ",cmap);
                    var efdstepone = cmap.val().split("<|>");
                    var efdl=efdstepone.length;
                    for (var i = 0; i < efdl; i++) {
                        if (efdstepone[i] !== "") {
                            var curdata = efdstepone[i].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, '').split("-:-");
                            var fieldname = curdata[0];
                            var fieldtype = curdata[1];
                            // console.log("curfieldname - ", ''+fieldname+''+cid+''," curfieldtype - ", ''+fieldtype+'');
                            // run through the clone set and replace every instance of the current
                            // element set with their new values
                            // you can also change other values as well
                            if (fieldname !== "" && fieldtype !== "") {
                                elgroup.find('' + fieldtype + '[name=' + fieldname + '' + cid + ']').attr("name", '' + fieldname + '' + nextcount + '');
                            }
                        }
                    };
                    if (isNumber(branchlimit) && branchlimit > 0) {
                        if (nextcounttrue <= Math.floor(branchlimit)) {
                            if(maintotalscripts!==""){
                                elgroup.append(maintotalscripts);
                            }
                            doentry = "true";
                        } else {
                            doentry = "false";
                            window.alert("Maximum allowed entries reached");
                        }
                    }
                    if (doentry == "true") {
                        if (insertiontype == "default" || insertiontype == "before") {
                            $(elgroup).insertBefore(entrypoint);
                        } else if (insertiontype == "after") {
                            $(elgroup).insertAfter(entrypoint);

                        }
                        //selection.appendTo(outs);
                        mainparent.find('input[name=' + countername + ']').val('' + nextcount + '');
                        // for tinymce init
                        if (domce == "true") {
                            for (var i = 0; i < cmcecount; i++) {
                                callTinyMCEInit(strinnerset[i], mceoptions[i]);
                            }
                            ;
                        }
                    }
                }
                // reset the content of the output variable
            }
            // console.log(eltotalgroup);

            // console.log("elgroup modified: ",elgroup);

            // console.log("Nextcount: ",nextcount," nextcounttrue - ", nextcounttrue," entrypoint - ", entrypoint);

        } else if (podtype == "decrement") {
            // remove previous entries
            var gc = $('' + groupparent + ' .multi_content_hold');
            console.log(gc);
            for (var i = gc.length - 1; i > curnextcount - 1; i--) {
                console.log("Curcount: ", i, " Current entries: ", $('' + groupparent + ' .multi_content_hold')[i]);
                if (typeof ($('' + groupparent + ' .multi_content_hold')[i]) !== "undefined") {
                    $('' + groupparent + ' .multi_content_hold')[i].remove();

                }
            }
        }
    }
}

// for general form addition
$(document).on("click", "a[data-type=triggerformaddlib]", function() {
    var formname = $(this).attr("data-form-name");
    var curname = $(this).attr("data-name");
    var codata = curname.split("_addlink");
    var countername = codata[0];
    var coredata = countername.split("count");
    var corename = coredata[0];
    var insertiontype = $(this).attr("data-i-type");
    // console.log("insertiontype: ",insertiontype, typeof(insertiontype));
    if (typeof (insertiontype) == "undefined" || insertiontype == null || !insertiontype || insertiontype == "" || insertiontype == "undefined") {
        var insertiontype = "default";
    }

    var sentineltype = $(this).attr("data-sentineltype");
    // console.log("sentineltype: ",sentineltype, typeof(sentineltype));
    if (typeof (sentineltype) == "undefined" || sentineltype == null || !sentineltype || sentineltype == "" || sentineltype == "undefined") {
        var sentineltype = "";
    }
    // console.log("After modify insertiontype: ",insertiontype, typeof(insertiontype));

    var mainparent = $(this).parent();
    var maintotalscripts="";
    
    // check if the funcdata input element exists in the current group
    var funcdatamap=$('div.' + corename + '-field-hold').find('input[name='+corename+'funcdata]');
    // console.log("funcdata map: ",funcdatamap);
    
    if(funcdatamap.length>0 && funcdatamap.val()!==""){
        if(typeof JSON.parse=="function"){
            var curfdmap=JSON.parse(funcdatamap.val().replace(/'{1,}/g,'"'));
        }else{
            var curfdmap=eval(funcdatamap.val().replace(/'{1,}/g,'"'));
        }

        var curfdmapout=parseDataFunc(curfdmap);
        // console.log("funcdata map: ",curfdmap, " curdmap: ",curfdmapout);
        // get the delete/destroy scripts if available
        if(typeof curfdmapout!=="undefined"){
            if($('form[name='+formname+'] div.' + corename + '-field-hold script[data-name=multiscript_gd').length>0){
                $('form[name='+formname+'] div.' + corename + '-field-hold script[data-name=multiscript_gd').remove();
            }
            
        }
        // get the script equivalent
        maintotalscripts='<script data-name="multiscript_gd">$(document).ready(function(){'+curfdmapout['output']+'});</script>';
    }
    var branchcount = mainparent.find('input[name=' + countername + ']').val();
    // console.log("BranchCount: ",mainparent.find('input[name=' + countername + ']'));
    // get the entry point div
    var entrypoint = mainparent.find('[name=' + corename + 'entrypoint][data-marker=true]');
    // console.log(entrypoint);
    // get the limit to the entries
    var branchlimit = $(this).attr("data-limit");
    if (typeof (branchlimit) == "undefined") {
        branchlimit = "";
    } else {
        branchlimit = Math.floor(branchlimit);
    }

    // console.log("branchlimit - ",branchlimit);
    var nextcounttrue = 0;
    var nextcount = Math.floor(branchcount) + 1;
    if (sentineltype !== "" && Math.floor(sentineltype) > 0) {
        nextcounttrue = Math.floor(nextcount) - Math.floor(sentineltype);
    } else {
        nextcounttrue = nextcount;
    }
    if (isNumber(branchlimit) && branchlimit > 0) {
        if (nextcounttrue <= Math.floor(branchlimit)) {
            if(typeof curfdmapout!=="undefined"){
                $('<script data-name="multiscript_gd">'+curfdmapout['doutput']+'</script>').appendTo('form[name='+formname+'] div.' + corename + '-field-hold');
                
            }
        }
    }
    // console.log("nextcounttrue - ",nextcounttrue," branchlimit - ",branchlimit);
    // get the base element and clone it
    
    var elgroup = $(this).parent().find('div[data-type=triggerprogenitor]').clone(true);
    // destruction block for certain js libraries
    elgroup.children('select').select2("destroy");
    // console.log(elgroup);
    // reset the values for all form content within the fields
    elgroup.find('input[type!=hidden]').val("");
    // console.log(elgroup.find('input[type!=hidden]'));
    elgroup.find('select').val("");
    elgroup.find('textarea').val("");

    // check for tinymce elements in the elgroup and proceed to augment them as appropriate
    var mceelements = elgroup.find('[data-type=tinymcefield]');

    // run a for loop on the mce elements to process them for the new content
    // this array holds the new set of ids for tinymce initialization
    var strinnerset = [];
    // these arrays carry the config for new toolbar components in tinymce initialization
    var mceoptions = [];
    var domce = "";
    var cmcecount = 0;
    if (mceelements.length > 0) {

        domce = "true";
        cmcecount = mceelements.length;
        // remove all tiny mce cloned content
        elgroup.find('div.mce-container').remove();
        for (var i = 0; i < cmcecount; i++) {
            // convert to multidimensional array
            mceoptions[i] = [];
            var curparent = "";
            curparent = elgroup.find('[data-type=tinymcefield]').parent()[i];

            // console.log("Cur match set - ",elgroup.find('[data-type=tinymcefield]').parent().find('input[type=hidden][name=width][data-type=tinymce]'),"Element Parent - ", curparent," Element Parent with JQ - ",$(curparent));
            var curelem = mceelements[i];
            // var tpinner=tp[0].innerText;
            // get the current id
            var curid = curelem.getAttribute("id");
            var nxtid = '' + curid + '' + nextcount + '';
            // change the element id to match the new one
            curelem.removeAttribute("style");
            curelem.removeAttribute("aria-hidden");
            curelem.setAttribute("id", nxtid);

            var nxtstrfunc = 'textarea#' + curid + '' + nextcount + '';
            strinnerset[i] = nxtstrfunc;

            // get the tinymce options if they exist, they are in hidden elements
            // with the data-type attribute of tinymce and name associated with their
            // settings
            var wt = "";
            wt = curparent.querySelector('input[type=hidden][name=width][data-type=tinymce]');
            if (wt === null || wt === undefined || wt === NaN) {
                wt = "";
            }
            mceoptions[i]['width'] = wt !== "" && typeof wt !== "undefined" ? wt.value : "";
            // console.log("width test 1");

            var tb1 = "";
            tb1 = curparent.querySelector('input[type=hidden][name=toolbar1][data-type=tinymce]');
            if (tb1 === null || tb1 === undefined || tb1 === NaN) {
                tb1 = "";
            }
            mceoptions[i]['toolbar1'] = tb1 !== "" && typeof tb1 !== "undefined" ? tb1.value : "";

            var tb2 = "";
            tb2 = curparent.querySelector('input[type=hidden][name=toolbar2][data-type=tinymce]');
            if (tb2 === null || tb2 === undefined || tb2 === NaN) {
                tb2 = "";
            }
            mceoptions[i]['toolbar2'] = tb2 !== "" && typeof tb2 !== "undefined" ? tb2.value : "";
            var ht = "";
            ht = curparent.querySelector('input[type=hidden][name=height][data-type=tinymce]');
            if (ht === null || ht === undefined || ht === NaN) {
                ht = "";
            }
            mceoptions[i]['height'] = ht !== "" && typeof ht !== "undefined" ? ht.value : "";

            var th = "";
            th = curparent.querySelector('input[type=hidden][name=theme][data-type=tinymce]');
            if (th === null || th === undefined || th === NaN) {
                th = "";
            }
            mceoptions[i]['theme'] = th !== "" && typeof th !== "undefined" ? th.value : "";

            var fmt = "";
            fmt = curparent.querySelector('input[type=hidden][name=filemanagertitle][data-type=tinymce]');
            if (fmt === null || fmt === undefined || fmt === NaN) {
                fmt = "";
            }
            mceoptions[i]['filemanagertitle'] = fmt !== "" && typeof fmt !== "undefined" ? fmt.value : "";

        }
        ;
    }
    // console.log("script elements - ", scriptelements);
    // console.log("Real group first- ", elgroup," Parent element", $(this).parent()," corename - ",corename);        

    // remove any progenitor details from the cloned element
    var cid = $(this).parent().find('div[data-type=triggerprogenitor]').attr("data-cid");
    elgroup.removeAttr("data-cid");
    elgroup.attr("data-type", "triggerprogeny");

    var hlabeltext = elgroup.find('.multi_content_countlabels').html();
    // console.log(hlabeltext);
    // console.log("Real group - ", elgroup," ",elgroup.find('.multi_content_countlabels'));

    // change the h4 label content if necessary to reflect new content present

    hlabeltext = hlabeltext.replace('(Entry ' + cid + ')', '(Entry ' + nextcount + ')');

    elgroup.find('.multi_content_countlabels').html(hlabeltext);
    // get element map for form element name manipulation
    var cmap = mainparent.find('input[name=' + corename + 'datamap]');
    // console.log("cmap: ",cmap);
    var efdstepone = cmap.val().split("<|>");
    var efdsteponel=efdstepone.length;
    for (var i = 0; i < efdsteponel; i++) {
        if (efdstepone[i] !== "") {
            var curdata = efdstepone[i].replace(/[\n\r]*/g, "").replace(/\s{1,}/g, '').split("-:-");
            var fieldname = curdata[0];
            var fieldtype = curdata[1];
            // console.log("curfieldname - ", ''+fieldname+''+cid+''," curfieldtype - ", ''+fieldtype+'');
            // run through the clone set and replace every instance of the current
            // element set with their new values
            // you can also change other values as well
            if (fieldname !== "" && fieldtype !== "") {
                elgroup.find('' + fieldtype + '[name=' + fieldname + '' + cid + ']').attr("name", '' + fieldname + '' + nextcount + '');
                
            }
        }
    };
    var doentry = "true";
    // console.log("elgroup modified: ",elgroup);

    // var nextcountout=nextcount-3;
    // var nextcountmain=nextcount-1;

    if (isNumber(branchlimit) && branchlimit > 0) {
        
        if (nextcounttrue <= Math.floor(branchlimit)) {
            if(maintotalscripts!==""){
                elgroup.append(maintotalscripts);
            }
            doentry = "true";
        } else {
            doentry = "false";
            window.alert("Maximum allowed entries reached");
        }
    }

    // console.log("Nextcount: ",nextcount," nextcounttrue - ", nextcounttrue," entrypoint - ", entrypoint);
    if (doentry == "true") {
        if (insertiontype == "default" || insertiontype == "before") {
            $(elgroup).insertBefore(entrypoint);
        } else if (insertiontype == "after") {
            $(elgroup).insertAfter(entrypoint);

        }
        //selection.appendTo(outs);
        mainparent.find('input[name=' + countername + ']').val('' + nextcount + '');
        // for tinymce init
        if (domce == "true") {
            for (var i = 0; i < cmcecount; i++) {
                callTinyMCEInit(strinnerset[i], mceoptions[i]);
            }
            ;
        }
    }
})


/**
*   this function is a callable version for the fapicker(FontAwesome Picker system);
*   the purpose here is to allow interactable elements display the fontawesome picker
*   section.
*   
*   @param Jquery selector 'containerel' is the JQuery selector for the container
*   element holding the fontawesome display section 
*
*   
*
*
*/
function bindFAPicker(containerel){
    
    // console.log("it was clicked");
    curval=$(this).attr("value");
    icontitle=$(this).attr("title");

    var target_input=$(containerel).find('input[data-name=icontitle]');
    var target_display=$(containerel).find('.currentfa i');
    var prevval=target_input.val();
    // console.log(target_input,target_display);
    if(type=="attached"){
        // this section means the fontawesome selection list is being pulled via
        // ajax
        var load_img='<div class="faloadergauze"><img src="'+host_addr+'" class="loadermini"/></div>'
        // check to see if the container element already has a 'loadermini'
        // class element in it
        if($(containerel).find('.faloaderguaze').length==0){
            // add the loader section to the container element
            $(containerel).append(load_img);
        }
        // check if the ul.fadisplaylist
        // if one exists then clone it, otherwise load it via ajax
        var listoutput='';
        if($('ul.fadisplaylist').length>0){
            listoutput=$('ul.fadisplaylist').clone();
            var url = '' + host_addr + 'snippets/display.php';
            var opts = {
                type: 'GET',
                url: url,
                data: {
                    displaytype: 'pullfontawesomelist',
                    fatype: 'list',
                    extraval: "admin"
                },
                dataType: 'json',
                success: function(output) {
                    // console.log(endtarget);
                    // console.log(output);
                    // item_loader.className += ' hidden';
                    item_loader.addClass('hidden');
                    // item_loader.remove();
                    if (output.success == "true") {
                        endtarget.innerHTML = output.msg;
                    }
                },
                error: function(error) {
                    if (typeof (error) == "object") {
                        console.log(error.responseText);
                    }
                    var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
                    // item_loader.remove();
                    item_loader.addClass('hidden');
                    // item_loader.className += ' hidden';
                    raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                    // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
                }
            };
            $.ajax(opts);
        }else{
            // lets go ajax hunting
        }
        // $().insertAfter();
    }
    if(prevval!==curval){
        target_input.val(curval);
        target_display.attr("class","fa "+curval);

    }else{
        target_input.removeAttr("value");
        target_input.val("");
        target_display.attr("class","");
    }
}

// select fa templating
function faSelectTemplate(faelem){
    var $fadisplay="";
    var cfv="";
    var cft="Choose an Icon";
    // console.log(faelem); 
    if (!faelem.id) { return faelem.text; }
    if(typeof(faelem)!=="undefined"&&faelem.element.value!==""){
        cfv=faelem.element.value;
        cft=faelem.element.outerText;
        // console.log("faelem: ",faelem,"\n cft:",cft,"\n cfv:",cfv);
        $fadisplay=$('<span class="fa_classet"><i class="fa '+cfv+' _classet"></i> '+cft+'</span>');

    }else{
        $fadisplay=$('<span class="fa_classet"><i class="fa '+cfv+' _classet"></i> '+cft+'</span>');
    }
    return $fadisplay;
}



//filter results based on query
function filter(selector, query,type='text',attr="",phide="") {
    query =   $.trim(query); //trim white space
    query = query.replace(/ /gi, '|'); //add OR for regex query
    // phide is the selector for a seperate element to be show or hidden
    // its mostly an object
    if(phide==""){
        if(type=="text"){
            $(selector).each(function() {
                ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).addClass('hidden') : $(this).removeClass('hidden');
            });
        }else if(type=="html"){
            $(selector).each(function() {
                ($(this).html().search(new RegExp(query, "i")) < 0) ? $(this).addClass('hidden') : $(this).removeClass('hidden');
            });
        }else if(type=="attribute"){
            $(selector).each(function() {
                ($(this).attr(attr).search(new RegExp(query, "i")) < 0) ? $(this).addClass('hidden') : $(this).removeClass('hidden');
            });
        }

    }else{
        if(type=="text"){
            $(selector).each(function() {
                ($(this).text().search(new RegExp(query, "i")) < 0) ? $(phide).addClass('hidden') : $(phide).removeClass('hidden');
            });
        }else if(type=="html"){
            $(selector).each(function() {
                ($(this).html().search(new RegExp(query, "i")) < 0) ? $(phide).addClass('hidden') : $(phide).removeClass('hidden');
            });
        }else if(type=="attribute"){
            $(selector).each(function() {
                ($(this).attr(attr).search(new RegExp(query, "i")) < 0) ? $(phide).addClass('hidden') : $(phide).removeClass('hidden');
            });
        }
    }
}

(function($){
    // CSearch is expected to be attached to an input element
    $.fn.CSearch= function(targetElement,type='text',attr="",phide=""){
        // valid type values are 'text' and attribute, of which the 'attr'
        // parameter must be provided
        if(phide=="parent"){
            // phide=$(this).parent();
        }


        // console.log("Running: true ", "This: ", $(this)," Phide: ",phide);
        $(this).keyup(function(event) {

            //if esc is pressed or nothing is entered
            if (event.keyCode == 27 || $(this).val() == '') {
              //if esc is pressed we want to clear the value of search box
              $(this).val('');
            
              //check each group of fa target elements, if nothing 
              //is entered then all targets are matched.
              $(''+targetElement+'').removeClass('hidden');
            }else{
                filter(''+targetElement+'', $(this).val(),type,attr,phide);
            }

        })        
    }
}(jQuery));

/*wordMax*/
(function($){
    // wordMax is expected to be attached to an input or textarea element
    $.fn.wordMAX= function(){
        
        // console.log("Running: true ", "This: ", $(this)," Phide: ",phide);
        var tthis=$(this);

        var error=false;
        var mcetester=$(this).attr("data-mce");
        if(mcetester===null||mcetester===undefined||mcetester===NaN){ 
            mcetester="";
        }   
        
        
        var maxcount = $(this).attr('data-wMAX')!==""&&isNumber(parseInt($(this).attr('data-wMAX')))?$(this).attr('data-wMAX'):0;
        
        // console.log('type',$(this).attr('data-wMAX-type'));
        var type = typeof $(this).attr('data-wMAX-type')!== "undefined"&&$(this).attr('data-wMAX-type')!==""?$(this).attr('data-wMAX-type'):"word";
        
        var formname = typeof $(this).attr('data-wMAX-fname')!== "undefined"&&$(this).attr('data-wMAX-fname')!==""?$(this).attr('data-wMAX-fname'):"";
        var checkElem=$(this).next();
        var tout=type=="word"?"Words":"Characters";
        var maxout=maxcount>0?maxcount:"none";
        var countout=0;
        // get the number of wmax-view elements for the current element
        var parent=$(this).parent();
        var mViewcount=parent.find('.wMax-view').length;

        if(mcetester==""){

            $(this).keyup(function(event) {
                var cval = $(this).val();
                // console.log("Cur val:",cval,' cur type:',type,' maxcount:',maxcount);
                if(isNumber(maxcount)){
                    maxcount=parseInt(maxcount);
                    //if esc is pressed or nothing is entered
                    // console.log(event.keyCode);
                    if (event.keyCode == 27) {
                        //if esc is pressed we want to clear the value of textbox
                        $(this).val('');
                        countout=0;
                        // next remove any excess maxview elements
                        if(mViewcount>1){
                            for(var i=1;i<mviewcount;i++){
                                parent.find('.wMax-view')[i].remove();
                            }
                        }
                        // $(''+targetElement+'').removeClass('hidden');
                    }else{
                        // process the value of the field
                        if(maxcount>0){
                            if(type=="word"){
                                // match all non white space characters
                                var wordcount=0;
                                // console.log(" tp:",typeof String(cval).match(/\S+/g).length);
                                if(cval.length>0&&String(cval).match(/\S+/g).length>0){
                                    wordcount=String(cval).match(/\S+/g).length;

                                }
                                // console.log("Word count:",wordcount);
                                var countout=wordcount;

                                if(wordcount>maxcount){
                                
                                    countout=maxcount;
                                    var diff=wordcount-maxcount;
                                    var wo=diff>1?"words":"word";
                                    var errmsg="Word count exceeded by: "+diff+" "+wo+"";
                                
                                    raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                                
                                    $("#mainPageModal").on("hidden.bs.modal", function() {
                                
                                        var mainc=cval.split(" ");
                                        var subc=mainc.splice(0,maxcount+2);
                                        var orval="";
                                        for(var si=0;si<maxcount;si++){
                                            orval+=si==0?subc[si]:" "+subc[si];
                                        }
                                        // console.log("CVAL: ",cval,"\n NEW: ",orval);
                                        tthis.val(orval);
                                        tthis.focus();
                                    });
                                } 
                                // checkElem.find('.wMax-count').html(countout);
                                // console.log(checkElem.find('.wMax-count'));
                                if(error==true&&formname!==""){
                                    // $('form[name='+formname+']').attr("onSubmit","return false;");
                                }
                                
                            }else if(type=="length"){
                                var lengthcount=cval.length;
                                var countout=lengthcount;
                                // console.log("Length count:",lengthcount);
                                if(lengthcount>maxcount){
                                    countout=maxcount;
                                    var diff=lengthcount-maxcount;
                                    var errmsg="Length count exceeded by character:"+diff;
                                    raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                                    $("#mainPageModal").on("hidden.bs.modal", function() {
                                        var orval=cval.slice(0,maxcount-1);
                                        // console.log(cval," new:",orval);
                                        tthis.val(orval);
                                        tthis.focus();
                                    });
                                } 
                                if(error==true&&formname!==""){
                                    // $('form[name='+formname+']').attr("onSubmit","return false;");
                                }
                            }


                        }
                    }
                    if(checkElem.is('.wMax-view')){
                        checkElem.find('.wMax-count').html(countout);
                        // next remove any excess maxview elements
                        if(mViewcount>1){
                            for(var i=1;i<mviewcount;i++){
                                parent.find('.wMax-view')[i].remove();
                            }
                        }
                    }else{
                        // create the wMax elem object and place it after the current element
                        var tval = $(this).val();
                        var chel=$('<div class="wMax-view"><span class="wMax-type">'+tout+'</span>: <span class="wMax-count">'+countout+'</span> <span class="wMax-limit">Limit: '+maxout+'</span></div>');
                        // check and make sure there are no wMax-View elements already
                        // if there are none insertion of the new element can occur
                        if(mViewcount==0){
                            $(chel).insertAfter($(this));
                        }

                        // get the wMax-view element for the entry
                        checkElem=$(this).next();
                        // console.log("check elem: ",checkElem);
                    }
                }else{
                    var errmsg="No valid data-wMAX attribute value detected, or attribute not present";
                    raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                }

            });       
        }else if(mcetester=="true"){  
            var mcid=$(this).attr("id");
            var cval = $(this).val();
                // console.log("Cur val:",cval,' cur type:',type,' maxcount:',maxcount);
            $(this).on("change",function(){
                if(isNumber(maxcount)){
                    maxcount=parseInt(maxcount);
                    //if esc is pressed or nothing is entered
                    // console.log(event.keyCode);
                    
                    // process the value of the field
                    if(maxcount>0){
                        if(type=="word"){
                            // match all non white space characters
                            var wordcount=0;
                            // console.log(" tp:",typeof String(cval).match(/\S+/g).length);
                            if(cval.length>0&&String(cval).match(/\S+/g).length>0){
                                wordcount=String(cval).match(/\S+/g).length;

                            }
                            // console.log("Word count:",wordcount);
                            var countout=wordcount;

                            if(wordcount>maxcount){
                            
                                countout=maxcount;
                            
                                var diff=wordcount-maxcount;
                                var errmsg="Word count exceeded by word count: "+diff;
                            
                                raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                            
                                $("#mainPageModal").on("hidden.bs.modal", function() {
                            
                                    var mainc=cval.split(" ");
                                    var subc=mainc.splice(0,maxcount+2);
                                    var orval="";
                                    for(var si=0;si<maxcount;si++){
                                        orval+=si==0?subc[si]:" "+subc[si];
                                    }
                                    // console.log("CVAL: ",cval,"\n NEW: ",orval);
                                    tthis.val(orval);
                                    tthis.focus();
                                });
                            } 
                            // checkElem.find('.wMax-count').html(countout);
                            // console.log(checkElem.find('.wMax-count'));
                            if(error==true&&formname!==""){
                                // $('form[name='+formname+']').attr("onSubmit","return false;");
                            }
                            
                        }else if(type=="length"){
                            var lengthcount=cval.length;
                            var countout=lengthcount;
                            // console.log("Length count:",lengthcount);
                            if(lengthcount>maxcount){
                                countout=maxcount;
                                var diff=lengthcount-maxcount;
                                var errmsg="Length count exceeded by character:"+diff;
                                raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                                $("#mainPageModal").on("hidden.bs.modal", function() {
                                    var orval=cval.slice(0,maxcount-1);
                                    // console.log(cval," new:",orval);
                                    tthis.val(orval);
                                    tthis.focus();
                                });
                            } 
                            if(error==true&&formname!==""){
                                // $('form[name='+formname+']').attr("onSubmit","return false;");
                            }
                        }


                    }
                    
                    if(checkElem.is('.wMax-view')){
                        checkElem.find('.wMax-count').html(countout);
                    }else{
                        // create the wMax elem object and place it after the current element
                        var tval = $(this).val();
                        var chel=$('<div class="wMax-view"><span class="wMax-type">'+tout+'</span>: <span class="wMax-count">'+countout+'</span> <span class="wMax-limit">Limit: '+maxout+'</span></div>')
                        $(chel).insertAfter($(this));
                        // get the wMax-view element for the entry
                        checkElem=$(this).next();
                        // console.log("check elem: ",checkElem);
                    }
                }else{
                    var errmsg="No valid data-wMAX attribute value detected, or attribute not present";
                    raiseMainModal('Important!!', '' + errmsg + '', 'warning');
                    $("#mainPageModal").on("hidden.bs.modal", function () {
                        tinyMCE.get(mcid).focus();
                    });

                }     
            })
        }

    }
}(jQuery));

/** Obtained from Locutus library
* URL:
*/
function exit( status ) {
    // http://kevin.vanzonneveld.net
    // +   original by: Brett Zamir (http://brettz9.blogspot.com)
    // +      input by: Paul
    // +   bugfixed by: Hyam Singer (http://www.impact-computing.com/)
    // +   improved by: Philip Peterson
    // +   bugfixed by: Brett Zamir (http://brettz9.blogspot.com)
    // %        note 1: Should be considered expirimental. Please comment on this function.
    // *     example 1: exit();
    // *     returns 1: null

    var i;

    if (typeof status === 'string') {
        alert(status);
    }

    window.addEventListener('error', function (e) {e.preventDefault();e.stopPropagation();}, false);

    var handlers = [
        'copy', 'cut', 'paste',
        'beforeunload', 'blur', 'change', 'click', 'contextmenu', 'dblclick', 'focus', 'keydown', 'keypress', 'keyup', 'mousedown', 'mousemove', 'mouseout', 'mouseover', 'mouseup', 'resize', 'scroll',
        'DOMNodeInserted', 'DOMNodeRemoved', 'DOMNodeRemovedFromDocument', 'DOMNodeInsertedIntoDocument', 'DOMAttrModified', 'DOMCharacterDataModified', 'DOMElementNameChanged', 'DOMAttributeNameChanged', 'DOMActivate', 'DOMFocusIn', 'DOMFocusOut', 'online', 'offline', 'textInput',
        'abort', 'close', 'dragdrop', 'load', 'paint', 'reset', 'select', 'submit', 'unload'
    ];

    function stopPropagation (e) {
        e.stopPropagation();
        // e.preventDefault(); // Stop for the form controls, etc., too?
    }
    for (i=0; i < handlers.length; i++) {
        window.addEventListener(handlers[i], function (e) {stopPropagation(e);}, true);
    }

    if (window.stop) {
        window.stop();
        
    }

    throw '';
}

// function to make all form elements lose focus()
function loseFocus(formname=""){
    if(formname!==""){
        $('form[name='+formname+'] input,form[name='+formname+'] select,form[name='+formname+'] textarea,form[name='+formname+'] button,form[name='+formname+'] radio,form[name='+formname+'] checkbox').blur()
    }else{
       $('input,select,textarea,button,radio,checkbox').blur();    
    }
}
// resets the values of all fields in specified element
function resetValues(telem){
    var tg=$(''+telem+'');
    if(telem!==""&&tg.length){
        elgroup=tg.clone();
        elgroup.find('input[type!=hidden]').val("");
        elgroup.find('[data-hdeftype=hidden]').addClass("hidden");
        // console.log(elgroup.find('input[type!=hidden]'));
        elgroup.find('select').val("");
        elgroup.find('textarea').val("");
        tg.replaceWith(elgroup);
    }
}
/**
* Hex to rgb vice versa functions, kudos to Tim Down
* http://stackoverflow.com/users/96100/tim-down
* for the awesome work, and me for whatever extras
* muhahahahahaha
*/
function hexToRgb(hex) {
    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}
function rgbToHex(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

function getInputSelection(el) {
    var start = 0, end = 0, normalizedValue, range,
        textInputRange, len, endRange;

    if (typeof el.selectionStart == "number" && typeof el.selectionEnd == "number") {
        start = el.selectionStart;
        end = el.selectionEnd;
    } else {
        range = document.selection.createRange();

        if (range && range.parentElement() == el) {
            len = el.value.length;
            normalizedValue = el.value.replace(/\r\n/g, "\n");

            // Create a working TextRange that lives only in the input
            textInputRange = el.createTextRange();
            textInputRange.moveToBookmark(range.getBookmark());

            // Check if the start and end of the selection are at the very end
            // of the input, since moveStart/moveEnd doesn't return what we want
            // in those cases
            endRange = el.createTextRange();
            endRange.collapse(false);

            if (textInputRange.compareEndPoints("StartToEnd", endRange) > -1) {
                start = end = len;
            } else {
                start = -textInputRange.moveStart("character", -len);
                start += normalizedValue.slice(0, start).split("\n").length - 1;

                if (textInputRange.compareEndPoints("EndToEnd", endRange) > -1) {
                    end = len;
                } else {
                    end = -textInputRange.moveEnd("character", -len);
                    end += normalizedValue.slice(0, end).split("\n").length - 1;
                }
            }
        }
    }

    return {
        start: start,
        end: end
    };
}


// function for stopping video seek 
function seekTimeControl(vidselector,playlimit=0){
    var video = $(vidselector).get(0);
    var supposedCurrentTime = 0;
    if(parseInt(playlimit)>0){

        video.addEventListener('timeupdate', function() {
            if (!this._startTime) this._startTime = this.currentTime;
            var playedTime = this.currentTime - this._startTime;
            if (playedTime >= playlimit){
                this.pause();
                $(this).removeAttr("controls");
            } 
            if (!video.seeking) {
                supposedCurrentTime = video.currentTime;
            }
        });
        // prevent user from seeking
        video.addEventListener('seeking', function() {
          // guard agains infinite recursion:
          // user seeks, seeking is fired, currentTime is modified, seeking is fired, current time is modified, ....
          var delta = video.currentTime - supposedCurrentTime;
          if (Math.abs(delta) > 0.01) {
            console.log("Seeking is disabled");
            video.currentTime = supposedCurrentTime;
          }
        });
        // delete the following event handler if rewind is not required
        video.addEventListener('ended', function() {
          // reset state in order to allow for rewind
            supposedCurrentTime = 0;
        });
    }
}/*!
 * Dreambench tech 
 * 
 */
 
var $ = jQuery.noConflict();
$(window).bind('resize', function ($) {
	"use strict";
	// Load Functions
	// Close opened collapsed menu in responsive window resize
	if ( window.innerWidth > 768 ) {
		jQuery('#main-menu').collapse('hide');
	}
});

$(window).load(function () {
	"use strict";
	// Load Functions
});

$(document).ready(function ($) {

	// initialize smoothscroll
	try {
		jQuery.browserSelector();
		// Adds window smooth scroll on chrome.
		if(jQuery("html").hasClass("chrome")) {
			jQuery.smoothScroll();
		}
	} catch(err) {

	}
	
	// initialise superfish
	try {
		var sfMenu = $('#main-menu').superfish({
			//add options here if required
			delay: 200,
			speed: 'fast'
		});

		// buttons to demonstrate Superfish's public methods
		$('.destroy').on('click', function(){
			sfMenu.superfish('destroy');
		});

		$('.init').on('click', function(){
			sfMenu.superfish();
		});

		$('.open').on('click', function(){
			sfMenu.children('li:first').superfish('show');
		});

		$('.close').on('click', function(){
			sfMenu.children('li:first').superfish('hide');
		});
	} catch(err) {
	
	}
	
	/*-------------------------------------------------*/
	/* =  Testimonials OWL Carousel
	/*-------------------------------------------------*/	

	try {
		$(".testimonials-slider").owlCarousel({
			autoplay: true,
			autoplayTimeout: 15000,
			nav:false,
			autoplayHoverPause: false,
			dots: true,
			items : 1,
			singleItem : true,
			autoHeight : true,
			animateOut: 'fadeOutDown',
			animateIn: 'fadeInUp',
			loop: true
		});
	} catch(err) {
	
	}

	/*-------------------------------------------------*/
	/* =  Blog OWL Carousel
	/*-------------------------------------------------*/	

	try {
		$(".blog-carousel-slider").owlCarousel({
			autoplay: true,
			autoplayTimeout: 10000,
			nav:true,
			autoplayHoverPause: false,
			dots: false,
			items : 1,
			singleItem : true,
			autoHeight : false,
			animateOut: 'slideOutLeft',
			// animateIn: 'slideInRight',
			loop: true
		});
	} catch(err) {
	
	}

	/*-------------------------------------------------*/
	/* =  portfolio isotope
	/*-------------------------------------------------*/
	
	var winDow = $(window);
	// Needed variables
	var $container=$('.portfolio-container');
	var $filter=$('.portfolio-filter');

	try{
		$container.imagesLoaded( function(){
			$container.fadeIn(1000).isotope({
				filter:'*',
				layoutMode:'fitRows',
				transitionDuration: '0.8s',
				hiddenStyle: {
					opacity: 0,
					transform: 'scale(0.001)'
				},
				visibleStyle: {
					opacity: 1,
					transform: 'scale(1)'
				}					
			});
		});
	} catch(err) {
	}

	winDow.bind('resize', function(){
		var selector = $filter.find('a.active').attr('data-filter');

		try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear'
				}
			});
		} catch(err) {
		}
		return false;
	});
	
	// Isotope Filter 
	$filter.find('a').click(function(){
		var selector = $(this).attr('data-filter');

		//try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear',
					queue	: false,
				}
			});
		//} catch(err) {

		//}
		return false;
	});


	var filterItemA	= $('.portfolio-filter a');
	filterItemA.on('click', function(){
		var $this = $(this);
		if ( !$this.hasClass('active')) {
			filterItemA.removeClass('active');
			$this.addClass('active');
		}
	});

	/*-------------------------------------------------*/
	/* =  Clients  Carousel
	/*-------------------------------------------------*/	

	try {
		var clientslide = $(".clients-container").bxSlider({
			minSlides: 1,
			maxSlides: 3,
			slideWidth: 300,
			slideMargin: 0,
			controls: false,
			pager: false
		});
	} catch(err) {
	
	}

	winDow.bind('resize', function(){

		try {
			clientslide.reloadSlider();
		} catch(err) {
		}
		return false;
	});		
	
	/*-------------------------------------------------*/
	/* =  Image Boxes
	/*-------------------------------------------------*/	

	try {
		$(".images-boxes").owlCarousel({
			autoplay: true,
			autoplayTimeout: 5000,
			nav:true,
			autoplayHoverPause: true,
			dots: false,
			items : 4,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				480:{
					items:2,
					nav:true
				},
				800:{
					items:3,
					nav:true,
				},
				1000:{
					items:4,
					nav:true,
				}
			}
		});
	} catch(err) {
	
	}
	
	/* PrettyPhoto Init */
	$("a[data-gal^='prettyPhoto']").prettyPhoto({
		hook: 'data-gal',
		social_tools: false
	});
	
	/*-------------------------------------------------*/
	/* =  Accordions
	/*-------------------------------------------------*/	
	
	var clickElem = $('.accordion-title');

	clickElem.on('click', function(e){
		e.preventDefault();
		
		var $this = $(this),
			parentCheck = $this.parent('.accordion-item'), 
			accordContainer = $this.parent('div').parent('div'),
			accordItems = accordContainer.find('.accordion-item'),
			accordContent = accordContainer.find('.accordion-content');
			
			
		if( !parentCheck.hasClass('active')) {
			// Close active accordions and open current accordion
			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});
			parentCheck.find('.accordion-content').slideDown(400, function(){
				parentCheck.addClass('active');
			});

		} else {
			// Close the open accordion ( User clicked it while it's open )
			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});

		}
	});
	
	jQuery('.accordions-box').not('.faq').each( function() {
		jQuery(this).find('.accordion-content:eq(0)').slideDown(400, function(){});
		jQuery(this).find('.accordion-item:eq(0)').addClass('active');
	});	

	/* ---------------------------------------------------------------------- */
	/*	Tabs
	/* ---------------------------------------------------------------------- */
	
	// Set the default height for each iconned-tab
	var sameHeightTabs = 1; // 0: tab content section height only (shorter tab contents not visible; 1: tab items height; 2: off / dynamic height for each tab

	$('.tab-box').each( function() {
		var largest_height = 200;
		$(this).find('.tab-content-section .tab-item-content').each( function() {
			if ( $(this).outerHeight() > largest_height ) {
				largest_height = $(this).outerHeight();
			}
		});
		if ( sameHeightTabs != 2 ) {
			$(this).find('.tab-content-section').animate({ 'height' : largest_height + 60});
			if ( sameHeightTabs == 1 ) {
				$(this).find('.tab-content-section .tab-item-content').each( function() {
					$(this).animate({ 'height' : largest_height + 30});
				});
			}
		}
	});

	$('.tab-nav li a').on('click', function(e){
		var clickTab = $('.tab-nav li');
		e.preventDefault();

		var $this = $(this),
			hisIndex = $this.parent('li').index(),
			tabContainer = $this.parent('li').parent('ul').parent('div'),
			tabCont = tabContainer.find('.tab-content-section'),
			tabContIndex = tabContainer.find(".tab-item-content:eq(" + hisIndex + ")");
			
		if( !$this.parent().hasClass('active')) {
			
			tabContainer.find(clickTab).each( function() { 
				$(this).removeClass('active');
			});
			$this.parent().addClass('active');

			tabCont.find(".tab-item-content").slideUp(1200);
			tabCont.find(".tab-item-content").removeClass('active');
			tabContIndex.delay(500).slideDown(400);
			tabContIndex.addClass('active');
		}
	});

	jQuery('.tab-box').each( function() {
		jQuery(this).find('.tab-item-content:eq(0)').slideDown(400, function(){});
		jQuery(this).find('.tab-item-content:eq(0)').addClass('active');
	});	

	/* Count To */
	// start all the timers
	$('.count-counter').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}
	});

	$('.count-counter').each(count);


	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}	

	/* Animated Progress Bars */
	jQuery('.progress-bar-item').each( function() {
		var percent = jQuery(this).attr('data-percent');
		jQuery(this).find('.progress-percentage').text(percent + '%');
		jQuery(this).find('.progress-done').width(percent + '%');
		jQuery(this).find('.progress-done_2').width(percent + '%');
	});
	
	/* Google Map */
	function init_map(){
		var myOptions = {
			zoom:16,
			center:new google.maps.LatLng(6.632389, 3.320779),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			disableDefaultUI: true
		};
		map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
		marker = new google.maps.Marker({
			map: map,
			position: new google.maps.LatLng(6.632389, 3.320779)
		});
		infowindow = new google.maps.InfoWindow({
			content:"<b>DreamBench Technologies</b><br/>279b Old Abeokuta Road, <br/> Agege, Lagos State."
		});
		google.maps.event.addListener(marker, "click", function(){
			infowindow.open(map,marker);
		});
		infowindow.open(map,marker);
	}
	
	if ($('#gmap_canvas').length > 0) {
		google.maps.event.addDomListener(window, 'load', init_map);
	}
	
	/*-------------------------------------------------*/
	/* =  OWL Slider
	/*-------------------------------------------------*/	

	try {
		$('.owl-slider-container').imagesLoaded( function(){
			$('.owl-slider').owlCarousel({
				autoplay: false,
				autoplayTimeout: 5000,
				nav:true,
				autoplayHoverPause: false,
				dots: false,
				items : 1,
				singleItem : true,
				autoHeight : true,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				loop: true
			});
		});
	} catch(err) {
	
	}
	
	/*-------------------------------------------------*/
	/* =  Related Posts
	/*-------------------------------------------------*/	

	try {
		$(".related-posts-slider.tmq-3-cols").owlCarousel({
			autoplay: false,
			autoplayTimeout: 5000,
			nav:false,
			autoplayHoverPause: true,
			dots: false,
			items : 3,
			margin: 10,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				480:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:false,
				}
			}
		});
		
		$(".related-posts-slider.tmq-4-cols").owlCarousel({
			autoplay: false,
			autoplayTimeout: 5000,
			nav:false,
			autoplayHoverPause: true,
			dots: false,
			items : 4,
			margin: 10,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				480:{
					items:2,
					nav:false
				},
				1000:{
					items:4,
					nav:false,
				}
			}
		});
	} catch(err) {
	
	}

	$('.related-post-item').hover(
		/*function() {
			$(this).find('.related-post-content p').animate({
				opacity: 'show' , 
				height: 'show', 
				margin: 'show', 
				padding: 'show'}, 500);
		}, function() {
			$(this).find('.related-post-content p').animate({
				opacity: 'hide' , 
				height: 'hide', 
				margin: 'hide', 
				padding: 'hide'}, 500);
		}*/
	);	
	
	/*-------------------------------------------------*/
	/* =  Bootstrap Tooltip
	/*-------------------------------------------------*/
	$(document).ready(function(){
		$('[data-toggle="portfolio-tooltip"]').tooltip({
			placement: 'bottom', 
			container: '.portfolio-text-banner'}); 
	});
		
	
	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/

	var animateTopButton = $('.go-top'),
		htmBody = $('html, body');	
		animateTopButton.click(function(){
		htmBody.animate({scrollTop: 0}, 'slow');
		return false;
	});	
		
	
});
// begin mind-rape section of the code
// aka, "I WROTE THIS"
if(typeof(WOW)=="function"){
	wow = new WOW()
	wow.init();
}
var windowwidth=$(window).width();
var windowheight=$(window).height();
windowwidth=$(window).width();
windowheight=Math.floor(windowheight)-45;

if(windowwidth<=767){
	// this section handles the related post coverimage in the related post
	// slider on the home page
	var relpcontainer=$('.related-post-container._blog');
	relpcontainer.each(function(){
		var thumb=relpcontainer.attr("data-thumb");
		relpcontainer.css("background-image",'url(\''+thumb+'\')');
		
	});

}
if(windowwidth>767 && windowwidth<=1023){


}
if(windowwidth>768 && windowwidth<=902){

}
if(windowwidth>=903 && windowwidth<=1023){
	
}
if(windowwidth>1023){

}
$(document).ready(function(){
	var curX=Math.floor(window.scrollX);
	var curY=parseInt(window.scrollY);
	// check for split points
	var splitpoints=$('div.split-point-bottom, div.split-point-top, div.split-indent-top,div.split-indent-bottom');
	
	if(typeof splitpoints =="undefined"||splitpoints===null||splitpoints===undefined||splitpoints===NaN){
        splitpoints=0;
    }else{
    	splitpoints=splitpoints.length;
    }
    // console.log("splitpointstot: ",splitpoints);
	if(parseInt(splitpoints)>0){
		sortThroughSplitPoints();
	}
	if(curY>540){
		if(!$('header div.navbar').hasClass('fixed-nav')){
			$('header div.navbar').addClass('fixed-nav');
		}
	}else{
		if($('header div.navbar').hasClass('fixed-nav')){
			$('header div.navbar').removeClass('fixed-nav');
		}
	};
	// control the nav bar from fixed to relative positioning to allow viewing even 
	// after scrolling 
	$(window).scroll(function(){
		// console.log("it hit",this.scrollX,this.scrollY);
		var curX=Math.floor(this.scrollX);
		var curY=parseInt(this.scrollY);
		// adjust the nav bar to be  fixed when the slider is out of view
		if(curY>450){
			if(!$('header div.navbar').hasClass('fixed-nav')){
				$('header div.navbar').hide().addClass('fixed-nav').fadeIn(500);
			}
		}else{
			if($('header div.navbar').hasClass('fixed-nav')){
				$('header div.navbar').removeClass('fixed-nav');
			}
		};
	})
})

$(window).resize(function(){
	windowwidth=$(window).width();
	var windowheight=$(window).height();
	// check for split points
	var splitpoints=$('div.split-point-bottom, div.split-point-top, div.split-indent-top,div.split-indent-bottom');
	
	if(typeof splitpoints =="undefined"||splitpoints===null||splitpoints===undefined||splitpoints===NaN){
        splitpoints=0;
    }else{
    	splitpoints=splitpoints.length;
    }
    // console.log("splitpointstot: ",splitpoints);
	if(parseInt(splitpoints)>0){
		sortThroughSplitPoints();
	}
	if(windowwidth<=767){
	  var windowheight=$(window).height();

	}
	if(windowwidth>767){
		// this section handles the related post coverimage in the related post
		// slider on the home page
		var relpcontainer=$('.related-post-container._blog');
		relpcontainer.each(function(){
			var med=relpcontainer.attr("data-med");
			relpcontainer.css("background-image",'url(\''+med+'\')');
		});

	}

	if(windowwidth>767 && windowwidth<=1023){

	}

	if(windowwidth>768 && windowwidth<=902){

	}

	if(windowwidth>=903 && windowwidth<=1023){

	}

	if(windowwidth>1023){

	}
})


