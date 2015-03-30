/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Ã‚Â© 2001 Robert Penner
 * All rights reserved.
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Ã‚Â© 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/
jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});

/**!
 * MixItUp v2.0.4
 *
 * @copyright Copyright 2014 KunkaLabs Limited.
 * @author    KunkaLabs Limited.
 * @link      https://mixitup.kunkalabs.com
 *
 * @license   Commercial use requires a commercial license.
 *            https://mixitup.kunkalabs.com/licenses/
 *
 *            Non-commercial use permitted under terms of CC-BY-NC license.
 *            http://creativecommons.org/licenses/by-nc/3.0/
 */
!function(a,b){a.MixItUp=function(){var b=this;b._execAction("_constructor",0),a.extend(b,{selectors:{target:".mix",filter:".filter",sort:".sort"},animation:{enable:!0,effects:"fade scale",duration:600,easing:"ease",perspectiveDistance:"3000",perspectiveOrigin:"50% 50%",queue:!0,queueLimit:1,animateChangeLayout:!1,animateResizeContainer:!0,animateResizeTargets:!1,staggerSequence:!1,reverseOut:!1},callbacks:{onMixLoad:!1,onMixStart:!1,onMixBusy:!1,onMixEnd:!1,onMixFail:!1,_user:!1},controls:{enable:!0,live:!1,toggleFilterButtons:!1,toggleLogic:"or",activeClass:"active"},layout:{display:"inline-block",containerClass:"",containerClassFail:"fail"},load:{filter:"all",sort:!1},_$body:null,_$container:null,_$targets:null,_$parent:null,_$sortButtons:null,_$filterButtons:null,_suckMode:!1,_mixing:!1,_sorting:!1,_clicking:!1,_loading:!0,_changingLayout:!1,_changingClass:!1,_changingDisplay:!1,_origOrder:[],_startOrder:[],_newOrder:[],_activeFilter:null,_toggleArray:[],_toggleString:"",_activeSort:"default:asc",_newSort:null,_startHeight:null,_newHeight:null,_incPadding:!0,_newDisplay:null,_newClass:null,_targetsBound:0,_targetsDone:0,_queue:[],_$show:a(),_$hide:a()}),b._execAction("_constructor",1)},a.MixItUp.prototype={constructor:a.MixItUp,_instances:{},_actions:{},_filters:{},_init:function(b,c){var d=this;if(d._execAction("_init",0,arguments),c&&a.extend(!0,d,c),d._$body=a("body"),d._domNode=b,d._$container=a(b),d._$container.addClass(d.layout.containerClass),d._id=b.id,d._platformDetect(),d._brake=d._getPrefixedCSS("transition","none"),d._refresh(!0),d._$parent=d._$targets.parent().length?d._$targets.parent():d._$container,d.load.sort&&(d._newSort=d._parseSort(d.load.sort),d._newSortString=d.load.sort,d._activeSort=d.load.sort,d._sort(),d._printSort()),d._activeFilter="all"===d.load.filter?d.selectors.target:"none"===d.load.filter?"":d.load.filter,d.controls.enable&&d._bindHandlers(),d.controls.toggleFilterButtons){d._buildToggleArray();for(var e=0;e<d._toggleArray.length;e++)d._updateControls({filter:d._toggleArray[e],sort:d._activeSort},!0)}else d.controls.enable&&d._updateControls({filter:d._activeFilter,sort:d._activeSort});d._filter(),d._init=!0,d._$container.data("mixItUp",d),d._execAction("_init",1,arguments),d._buildState(),d._$targets.css(d._brake),d._goMix(d.animation.enable)},_platformDetect:function(){var a=this,c=["Webkit","Moz","O","ms"],d=["webkit","moz"],e=window.navigator.appVersion.match(/Chrome\/(\d+)\./)||!1,f="undefined"!=typeof InstallTrigger,g=function(a){for(var b=0;b<c.length;b++)if(c[b]+"Transition"in a.style)return{prefix:"-"+c[b].toLowerCase()+"-",vendor:c[b]};return"transition"in a.style?"":!1},h=g(a._domNode);a._execAction("_platformDetect",0),a._chrome=e?parseInt(e[1],10):!1,a._ff=f?parseInt(window.navigator.userAgent.match(/rv:([^)]+)\)/)[1]):!1,a._prefix=h.prefix,a._vendor=h.vendor,a._suckMode=window.atob&&a._prefix?!1:!0,a._suckMode&&(a.animation.enable=!1),a._ff&&a._ff<=4&&(a.animation.enable=!1);for(var i=0;i<d.length&&!window.requestAnimationFrame;i++)window.requestAnimationFrame=window[d[i]+"RequestAnimationFrame"];"function"!=typeof Object.getPrototypeOf&&(Object.getPrototypeOf="object"==typeof"test".__proto__?function(a){return a.__proto__}:function(a){return a.constructor.prototype}),a._domNode.nextElementSibling===b&&Object.defineProperty(Element.prototype,"nextElementSibling",{get:function(){for(var a=this.nextSibling;a;){if(1===a.nodeType)return a;a=a.nextSibling}return null}}),a._execAction("_platformDetect",1)},_refresh:function(a){var c=this;c._execAction("_refresh",0,arguments),c._$targets=c._$container.find(c.selectors.target);for(var d=0;d<c._$targets.length;d++){var e=c._$targets[d];if(e.dataset===b){e.dataset={};for(var f=0;f<e.attributes.length;f++){var g=e.attributes[f],h=g.name,i=g.value;if(h.indexOf("data-")>-1){var j=c._helpers._camelCase(h.substring(5,h.length));e.dataset[j]=i}}}e.mixParent===b&&(e.mixParent=c._id)}if(c._$targets.length&&a||!c._origOrder.length&&c._$targets.length){c._origOrder=[];for(var d=0;d<c._$targets.length;d++){var e=c._$targets[d];c._origOrder.push(e)}}c._execAction("_refresh",1,arguments)},_bindHandlers:function(){var b=this;b._execAction("_bindHandlers",0),b.controls.live?b._$body.on("click.mixItUp."+b._id,b.selectors.sort,function(){b._processClick(a(this),"sort")}).on("click.mixItUp."+b._id,b.selectors.filter,function(){b._processClick(a(this),"filter")}):(b._$sortButtons=a(b.selectors.sort),b._$filterButtons=a(b.selectors.filter),b._$sortButtons.on("click.mixItUp."+b._id,function(){b._processClick(a(this),"sort")}),b._$filterButtons.on("click.mixItUp."+b._id,function(){b._processClick(a(this),"filter")})),b._execAction("_bindHandlers",1)},_processClick:function(b,c){var d=this;if(d._execAction("_processClick",0,arguments),!d._mixing||d.animation.queue&&d._queue.length<d.animation.queueLimit){if(d._clicking=!0,"sort"===c){var e=b.attr("data-sort");(!b.hasClass(d.controls.activeClass)||e.indexOf("random")>-1)&&(a(d.selectors.sort).removeClass(d.controls.activeClass),b.addClass(d.controls.activeClass),d.sort(e))}if("filter"===c){var f,g=b.attr("data-filter"),h="or"===d.controls.toggleLogic?",":"";d.controls.toggleFilterButtons?(d._buildToggleArray(),b.hasClass(d.controls.activeClass)?(b.removeClass(d.controls.activeClass),f=d._toggleArray.indexOf(g),d._toggleArray.splice(f,1)):(b.addClass(d.controls.activeClass),d._toggleArray.push(g)),d._toggleArray=a.grep(d._toggleArray,function(a){return a}),d._toggleString=d._toggleArray.join(h),d.filter(d._toggleString)):b.hasClass(d.controls.activeClass)||(a(d.selectors.filter).removeClass(d.controls.activeClass),b.addClass(d.controls.activeClass),d.filter(g))}d._execAction("_processClick",1,arguments)}else"function"==typeof d.callbacks.onMixBusy&&d.callbacks.onMixBusy.call(d._domNode,d._state,d),d._execAction("_processClickBusy",1,arguments)},_buildToggleArray:function(){var a=this,b=a._activeFilter.replace(/\s/g,"");if(a._execAction("_buildToggleArray",0,arguments),"or"===a.controls.toggleLogic)a._toggleArray=b.split(",");else{a._toggleArray=b.split("."),!a._toggleArray[0]&&a._toggleArray.shift();for(var c,d=0;c=a._toggleArray[d];d++)a._toggleArray[d]="."+c}a._execAction("_buildToggleArray",1,arguments)},_updateControls:function(c,d){var e=this,f={filter:c.filter,sort:c.sort},g=function(a,b){d&&"filter"==h&&"none"!==f.filter&&""!==f.filter?a.filter(b).addClass(e.controls.activeClass):a.removeClass(e.controls.activeClass).filter(b).addClass(e.controls.activeClass)},h="filter",i=null;e._execAction("_updateControls",0,arguments),c.filter===b&&(f.filter=e._activeFilter),c.sort===b&&(f.sort=e._activeSort),f.filter===e.selectors.target&&(f.filter="all");for(var j=0;2>j;j++)i=e.controls.live?a(e.selectors[h]):e["_$"+h+"Buttons"],i&&g(i,"[data-"+h+'="'+f[h]+'"]'),h="sort";e._execAction("_updateControls",1,arguments)},_filter:function(){var b=this;b._execAction("_filter",0);for(var c=0;c<b._$targets.length;c++){var d=a(b._$targets[c]);d.is(b._activeFilter)?b._$show=b._$show.add(d):b._$hide=b._$hide.add(d)}b._execAction("_filter",1)},_sort:function(){var a=this,b=function(a){for(var b=a.slice(),c=b.length,d=c;d--;){var e=parseInt(Math.random()*c),f=b[d];b[d]=b[e],b[e]=f}return b};a._execAction("_sort",0),a._startOrder=[];for(var c=0;c<a._$targets.length;c++){var d=a._$targets[c];a._startOrder.push(d)}switch(a._newSort[0].sortBy){case"default":a._newOrder=a._origOrder;break;case"random":a._newOrder=b(a._startOrder);break;case"custom":a._newOrder=a._newSort[0].order;break;default:a._newOrder=a._startOrder.concat().sort(function(b,c){return a._compare(b,c)})}a._execAction("_sort",1)},_compare:function(a,b,c){c=c?c:0;var d=this,e=d._newSort[c].order,f=function(a){return a.dataset[d._newSort[c].sortBy]||0},g=isNaN(1*f(a))?f(a).toLowerCase():1*f(a),h=isNaN(1*f(b))?f(b).toLowerCase():1*f(b);return h>g?"asc"==e?-1:1:g>h?"asc"==e?1:-1:g==h&&d._newSort.length>c+1?d._compare(a,b,c+1):0},_printSort:function(a){var b=this,c=a?b._startOrder:b._newOrder,d=b._$parent[0].querySelectorAll(b.selectors.target),e=d[d.length-1].nextElementSibling,f=document.createDocumentFragment();b._execAction("_printSort",0,arguments);for(var g=0;g<d.length;g++){var h=d[g],i=h.nextSibling;"absolute"!==h.style.position&&(i&&"#text"==i.nodeName&&b._$parent[0].removeChild(i),b._$parent[0].removeChild(h))}for(var g=0;g<c.length;g++){var j=c[g];if("default"==b._newSort[0].sortBy&&"desc"==b._newSort[0].order){var k=f.firstChild;f.insertBefore(j,k),f.insertBefore(document.createTextNode(" "),j)}else f.appendChild(j),f.appendChild(document.createTextNode(" "))}e?b._$parent[0].insertBefore(f,e):b._$parent[0].appendChild(f),b._execAction("_printSort",1,arguments)},_parseSort:function(a){for(var b=this,c="string"==typeof a?a.split(" "):[a],d=[],e=0;e<c.length;e++){var f="string"==typeof a?c[e].split(":"):["custom",c[e]],g={sortBy:b._helpers._camelCase(f[0]),order:f[1]||"asc"};if(d.push(g),"default"==g.sortBy||"random"==g.sortBy)break}return b._execFilter("_parseSort",d,arguments)},_parseEffects:function(){var a=this,b={opacity:"",transformIn:"",transformOut:"",filter:""},c=function(b,c){if(a.animation.effects.indexOf(b)>-1){if(c){var d=a.animation.effects.indexOf(b+"(");if(d>-1){var e=a.animation.effects.substring(d),f=/\(([^)]+)\)/.exec(e),g=f[1];return{val:g}}}return!0}return!1},d=function(a,b){return b?"-"===a.charAt(0)?a.substr(1,a.length):"-"+a:a},e=function(a,e){for(var f=[["scale",".01"],["translateX","20px"],["translateY","20px"],["translateZ","20px"],["rotateX","90deg"],["rotateY","90deg"],["rotateZ","180deg"]],g=0;g<f.length;g++){var h=f[g][0],i=f[g][1],j=e&&"scale"!==h;b[a]+=c(h)?h+"("+d(c(h,!0).val||i,j)+") ":""}};return b.opacity=c("fade")?c("fade",!0).val||"0":"",e("transformIn"),a.animation.reverseOut?e("transformOut",!0):b.transformOut=b.transformIn,b.transition={},b.transition=a._getPrefixedCSS("transition","all "+a.animation.duration+"ms "+a.animation.easing+", opacity "+a.animation.duration+"ms linear"),a.animation.stagger=c("stagger")?!0:!1,a.animation.staggerDuration=parseInt(c("stagger")?c("stagger",!0).val?c("stagger",!0).val:100:100),a._execFilter("_parseEffects",b)},_buildState:function(){var a=this;a._execAction("_buildState",0),a._state={activeFilter:""===a._activeFilter?"none":a._activeFilter,activeSort:a._activeSort,fail:!a._$show.length&&""!==a._activeFilter,$targets:a._$targets,$show:a._$show,$hide:a._$hide,totalTargets:a._$targets.length,totalShow:a._$show.length,totalHide:a._$hide.length,display:a.layout.display},a._execAction("_buildState",1)},_goMix:function(a){var b=this,c=function(){b._chrome&&31===b._chrome&&f(b._$parent[0]),b._setInter(),d()},d=function(){b._getInterMixData(),b._setFinal(),b._getFinalMixData(),b._prepTargets(),window.requestAnimationFrame?requestAnimationFrame(e):setTimeout(function(){e()},20)},e=function(){b._animateTargets(),0===b._targetsBound&&b._cleanUp()},f=function(a){var b=a.parentElement,c=document.createElement("div"),d=document.createDocumentFragment();b.insertBefore(c,a),d.appendChild(a),b.replaceChild(a,c)};b._execAction("_goMix",0,arguments),!b.animation.duration&&(a=!1),b._mixing=!0,b._$container.removeClass(b.layout.containerClassFail),"function"==typeof b.callbacks.onMixStart&&b.callbacks.onMixStart.call(b._domNode,b._state,b),b._$container.trigger("mixStart",[b._state,b]),b._getOrigMixData(),a&&!b._suckMode?window.requestAnimationFrame?requestAnimationFrame(c):c():b._cleanUp(),b._execAction("_goMix",1,arguments)},_getTargetData:function(a,b){var c,d=this;a.dataset[b+"PosX"]=a.offsetLeft,a.dataset[b+"PosY"]=a.offsetTop,d.animation.animateResizeTargets&&(c=window.getComputedStyle(a),a.dataset[b+"MarginBottom"]=parseInt(c.marginBottom),a.dataset[b+"MarginRight"]=parseInt(c.marginRight),a.dataset[b+"Width"]=a.offsetWidth,a.dataset[b+"Height"]=a.offsetHeight)},_getOrigMixData:function(){var a=this,b=a._suckMode?{boxSizing:""}:window.getComputedStyle(a._$parent[0]),c=b.boxSizing||b[a._vendor+"BoxSizing"];a._incPadding="border-box"===c,a._execAction("_getOrigMixData",0),!a._suckMode&&(a.effects=a._parseEffects()),a._$toHide=a._$hide.filter(":visible"),a._$toShow=a._$show.filter(":hidden"),a._$pre=a._$targets.filter(":visible"),a._startHeight=a._incPadding?a._$parent.outerHeight():a._$parent.height();for(var d=0;d<a._$pre.length;d++){var e=a._$pre[d];a._getTargetData(e,"orig")}a._execAction("_getOrigMixData",1)},_setInter:function(){var a=this;a._execAction("_setInter",0),a._changingLayout&&a.animation.animateChangeLayout?(a._$toShow.css("display",a._newDisplay),a._changingClass&&a._$container.removeClass(a.layout.containerClass).addClass(a._newClass)):a._$toShow.css("display",a.layout.display),a._execAction("_setInter",1)},_getInterMixData:function(){var a=this;a._execAction("_getInterMixData",0);for(var b=0;b<a._$toShow.length;b++){var c=a._$toShow[b];a._getTargetData(c,"inter")}for(var b=0;b<a._$pre.length;b++){var c=a._$pre[b];a._getTargetData(c,"inter")}a._execAction("_getInterMixData",1)},_setFinal:function(){var a=this;a._execAction("_setFinal",0),a._sorting&&a._printSort(),a._$toHide.removeStyle("display"),a._changingLayout&&a.animation.animateChangeLayout&&a._$pre.css("display",a._newDisplay),a._execAction("_setFinal",1)},_getFinalMixData:function(){var a=this;a._execAction("_getFinalMixData",0);for(var b=0;b<a._$toShow.length;b++){var c=a._$toShow[b];a._getTargetData(c,"final")}for(var b=0;b<a._$pre.length;b++){var c=a._$pre[b];a._getTargetData(c,"final")}a._newHeight=a._incPadding?a._$parent.outerHeight():a._$parent.height(),a._sorting&&a._printSort(!0),a._$toShow.removeStyle("display"),a._$pre.css("display",a.layout.display),a._changingClass&&a.animation.animateChangeLayout&&a._$container.removeClass(a._newClass).addClass(a.layout.containerClass),a._execAction("_getFinalMixData",1)},_prepTargets:function(){var b=this,c={_in:b._getPrefixedCSS("transform",b.effects.transformIn),_out:b._getPrefixedCSS("transform",b.effects.transformOut)};b._execAction("_prepTargets",0),b.animation.animateResizeContainer&&b._$parent.css("height",b._startHeight+"px");for(var d=0;d<b._$toShow.length;d++){var e=b._$toShow[d],f=a(e);e.style.opacity=b.effects.opacity,e.style.display=b._changingLayout&&b.animation.animateChangeLayout?b._newDisplay:b.layout.display,f.css(c._in),b.animation.animateResizeTargets&&(e.style.width=e.dataset.finalWidth+"px",e.style.height=e.dataset.finalHeight+"px",e.style.marginRight=-(e.dataset.finalWidth-e.dataset.interWidth)+1*e.dataset.finalMarginRight+"px",e.style.marginBottom=-(e.dataset.finalHeight-e.dataset.interHeight)+1*e.dataset.finalMarginBottom+"px")}for(var d=0;d<b._$pre.length;d++){var e=b._$pre[d],f=a(e),g={x:e.dataset.origPosX-e.dataset.interPosX,y:e.dataset.origPosY-e.dataset.interPosY},c=b._getPrefixedCSS("transform","translate("+g.x+"px,"+g.y+"px)");f.css(c),b.animation.animateResizeTargets&&(e.style.width=e.dataset.origWidth+"px",e.style.height=e.dataset.origHeight+"px",e.dataset.origWidth-e.dataset.finalWidth&&(e.style.marginRight=-(e.dataset.origWidth-e.dataset.interWidth)+1*e.dataset.origMarginRight+"px"),e.dataset.origHeight-e.dataset.finalHeight&&(e.style.marginBottom=-(e.dataset.origHeight-e.dataset.interHeight)+1*e.dataset.origMarginBottom+"px"))}b._execAction("_prepTargets",1)},_animateTargets:function(){var b=this;b._execAction("_animateTargets",0),b._targetsDone=0,b._targetsBound=0,b._$parent.css(b._getPrefixedCSS("perspective",b.animation.perspectiveDistance+"px")).css(b._getPrefixedCSS("perspective-origin",b.animation.perspectiveOrigin)),b.animation.animateResizeContainer&&b._$parent.css(b._getPrefixedCSS("transition","height "+b.animation.duration+"ms ease")).css("height",b._newHeight+"px");for(var c=0;c<b._$toShow.length;c++){var d=b._$toShow[c],e=a(d),f={x:d.dataset.finalPosX-d.dataset.interPosX,y:d.dataset.finalPosY-d.dataset.interPosY},g=b._getDelay(c),h={};d.style.opacity="";for(var i=0;2>i;i++){var j=0===i?j=b._prefix:"";b._ff&&b._ff<=20&&(h[j+"transition-property"]="all",h[j+"transition-timing-function"]=b.animation.easing+"ms",h[j+"transition-duration"]=b.animation.duration+"ms"),h[j+"transition-delay"]=g+"ms",h[j+"transform"]="translate("+f.x+"px,"+f.y+"px)"}(b.effects.transform||b.effects.opacity)&&b._bindTargetDone(e),b._ff&&b._ff<=20?e.css(h):e.css(b.effects.transition).css(h)}for(var c=0;c<b._$pre.length;c++){var d=b._$pre[c],e=a(d),f={x:d.dataset.finalPosX-d.dataset.interPosX,y:d.dataset.finalPosY-d.dataset.interPosY},g=b._getDelay(c);(d.dataset.finalPosX!==d.dataset.origPosX||d.dataset.finalPosY!==d.dataset.origPosY)&&b._bindTargetDone(e),e.css(b._getPrefixedCSS("transition","all "+b.animation.duration+"ms "+b.animation.easing+" "+g+"ms")),e.css(b._getPrefixedCSS("transform","translate("+f.x+"px,"+f.y+"px)")),b.animation.animateResizeTargets&&(d.dataset.origWidth-d.dataset.finalWidth&&1*d.dataset.finalWidth&&(d.style.width=d.dataset.finalWidth+"px",d.style.marginRight=-(d.dataset.finalWidth-d.dataset.interWidth)+1*d.dataset.finalMarginRight+"px"),d.dataset.origHeight-d.dataset.finalHeight&&1*d.dataset.finalHeight&&(d.style.height=d.dataset.finalHeight+"px",d.style.marginBottom=-(d.dataset.finalHeight-d.dataset.interHeight)+1*d.dataset.finalMarginBottom+"px"))}b._changingClass&&b._$container.removeClass(b.layout.containerClass).addClass(b._newClass);for(var c=0;c<b._$toHide.length;c++){for(var d=b._$toHide[c],e=a(d),g=b._getDelay(c),k={},i=0;2>i;i++){var j=0===i?j=b._prefix:"";k[j+"transition-delay"]=g+"ms",k[j+"transform"]=b.effects.transformOut,k.opacity=b.effects.opacity}e.css(b.effects.transition).css(k),(b.effects.transform||b.effects.opacity)&&b._bindTargetDone(e)}b._execAction("_animateTargets",1)},_bindTargetDone:function(b){var c=this,d=b[0];c._execAction("_bindTargetDone",0,arguments),d.dataset.bound||(d.dataset.bound=!0,c._targetsBound++,b.on("webkitTransitionEnd.mixItUp transitionend.mixItUp",function(e){(e.originalEvent.propertyName.indexOf("transform")>-1||e.originalEvent.propertyName.indexOf("opacity")>-1)&&a(e.originalEvent.target).is(c.selectors.target)&&(b.off(".mixItUp"),delete d.dataset.bound,c._targetDone())})),c._execAction("_bindTargetDone",1,arguments)},_targetDone:function(){var a=this;a._execAction("_targetDone",0),a._targetsDone++,a._targetsDone===a._targetsBound&&a._cleanUp(),a._execAction("_targetDone",1)},_cleanUp:function(){var b=this,c=b.animation.animateResizeTargets?"transform opacity width height margin-bottom margin-right":"transform opacity";unBrake=function(){b._$targets.removeStyle("transition",b._prefix)},b._execAction("_cleanUp",0),b._changingLayout?b._$show.css("display",b._newDisplay):b._$show.css("display",b.layout.display),b._$targets.css(b._brake),b._$targets.removeStyle(c,b._prefix).removeAttr("data-inter-pos-x data-inter-pos-y data-final-pos-x data-final-pos-y data-orig-pos-x data-orig-pos-y data-orig-height data-orig-width data-final-height data-final-width data-inter-width data-inter-height data-orig-margin-right data-orig-margin-bottom data-inter-margin-right data-inter-margin-bottom data-final-margin-right data-final-margin-bottom"),b._$hide.removeStyle("display"),b._$parent.removeStyle("height transition perspective-distance perspective perspective-origin-x perspective-origin-y perspective-origin perspectiveOrigin",b._prefix),b._sorting&&(b._printSort(),b._activeSort=b._newSortString,b._sorting=!1),b._changingLayout&&(b._changingDisplay&&(b.layout.display=b._newDisplay,b._changingDisplay=!1),b._changingClass&&(b._$parent.removeClass(b.layout.containerClass).addClass(b._newClass),b.layout.containerClass=b._newClass,b._changingClass=!1),b._changingLayout=!1),b._refresh(),b._buildState(),b._state.fail&&b._$container.addClass(b.layout.containerClassFail),b._$show=a(),b._$hide=a(),window.requestAnimationFrame&&requestAnimationFrame(unBrake),b._mixing=!1,"function"==typeof b.callbacks._user&&b.callbacks._user.call(b._domNode,b._state,b),"function"==typeof b.callbacks.onMixEnd&&b.callbacks.onMixEnd.call(b._domNode,b._state,b),b._$container.trigger("mixEnd",[b._state,b]),b._state.fail&&("function"==typeof b.callbacks.onMixFail&&b.callbacks.onMixFail.call(b._domNode,b._state,b),b._$container.trigger("mixFail",[b._state,b])),b._loading&&("function"==typeof b.callbacks.onMixLoad&&b.callbacks.onMixLoad.call(b._domNode,b._state,b),b._$container.trigger("mixLoad",[b._state,b])),b._queue.length&&(b._execAction("_queue",0),b.multiMix(b._queue[0][0],b._queue[0][1],b._queue[0][2]),b._queue.splice(0,1)),b._execAction("_cleanUp",1),b._loading=!1},_getPrefixedCSS:function(a,b,c){var d=this,e={};for(i=0;2>i;i++){var f=0===i?d._prefix:"";e[f+a]=c?f+b:b}return d._execFilter("_getPrefixedCSS",e,arguments)},_getDelay:function(a){var b=this,c="function"==typeof b.animation.staggerFunction?b.animation.staggerFunction.call(b._domNode,a,b._state):a,d=b.animation.stagger?c*b.animation.staggerDuration:0;return b._execFilter("_getDelay",d,arguments)},_parseMultiMixArgs:function(a){for(var b=this,c={command:null,animate:b.animation.enable,callback:null},d=0;d<a.length;d++){var e=a[d];null!==e&&("object"==typeof e||"string"==typeof e?c.command=e:"boolean"==typeof e?c.animate=e:"function"==typeof e&&(c.callback=e))}return b._execFilter("_parseMultiMixArgs",c,arguments)},_parseInsertArgs:function(b){for(var c=this,d={index:0,$object:a(),multiMix:{filter:c._state.activeFilter},callback:null},e=0;e<b.length;e++){var f=b[e];"number"==typeof f?d.index=f:"object"==typeof f&&f instanceof a?d.$object=f:"object"==typeof f&&f instanceof HTMLElement?d.$object=a(f):"object"==typeof f&&null!==f?d.multiMix=f:"boolean"!=typeof f||f?"function"==typeof f&&(d.callback=f):d.multiMix=!1}return c._execFilter("_parseInsertArgs",d,arguments)},_execAction:function(a,b,c){var d=this,e=b?"post":"pre";if(!d._actions.isEmptyObject&&d._actions.hasOwnProperty(a))for(var f in d._actions[a][e])d._actions[a][e][f].call(d,c)},_execFilter:function(a,b,c){var d=this;if(d._filters.isEmptyObject||!d._filters.hasOwnProperty(a))return b;for(var e in d._filters[a])return d._filters[a][e].call(d,c)},_helpers:{_camelCase:function(a){return a.replace(/-([a-z])/g,function(a){return a[1].toUpperCase()})}},isMixing:function(){var a=this;return a._execFilter("isMixing",a._mixing)},filter:function(){var a=this,b=a._parseMultiMixArgs(arguments);a._clicking&&(a._toggleString=""),a.multiMix({filter:b.command},b.animate,b.callback)},sort:function(){var a=this,b=a._parseMultiMixArgs(arguments);a.multiMix({sort:b.command},b.animate,b.callback)},changeLayout:function(){var a=this,b=a._parseMultiMixArgs(arguments);a.multiMix({changeLayout:b.command},b.animate,b.callback)},multiMix:function(){var a=this,c=a._parseMultiMixArgs(arguments);if(a._execAction("multiMix",0,arguments),a._mixing)a.animation.queue&&a._queue.length<a.animation.queueLimit?(a._queue.push(arguments),a.controls.enable&&!a._clicking&&a._updateControls(c.command),a._execAction("multiMixQueue",1,arguments)):("function"==typeof a.callbacks.onMixBusy&&a.callbacks.onMixBusy.call(a._domNode,a._state,a),a._$container.trigger("mixBusy",[a._state,a]),a._execAction("multiMixBusy",1,arguments));else{a.controls.enable&&!a._clicking&&(a.controls.toggleFilterButtons&&a._buildToggleArray(),a._updateControls(c.command,a.controls.toggleFilterButtons)),a._queue.length<2&&(a._clicking=!1),delete a.callbacks._user,c.callback&&(a.callbacks._user=c.callback);var d=c.command.sort,e=c.command.filter,f=c.command.changeLayout;a._refresh(),d&&(a._newSort=a._parseSort(d),a._newSortString=d,a._sorting=!0,a._sort()),e!==b&&(e="all"===e?a.selectors.target:e,a._activeFilter=e),a._filter(),f&&(a._newDisplay="string"==typeof f?f:f.display||a.layout.display,a._newClass=f.containerClass||"",(a._newDisplay!==a.layout.display||a._newClass!==a.layout.containerClass)&&(a._changingLayout=!0,a._changingClass=a._newClass!==a.layout.containerClass,a._changingDisplay=a._newDisplay!==a.layout.display)),a._$targets.css(a._brake),a._goMix(c.animate^a.animation.enable?c.animate:a.animation.enable),a._execAction("multiMix",1,arguments)}},insert:function(){var a=this,b=a._parseInsertArgs(arguments),c="function"==typeof b.callback?b.callback:null,d=document.createDocumentFragment(),e=b.index<a._$targets.length?a._$targets[b.index]:a._$targets[a._$targets.length-1].nextElementSibling;if(a._execAction("insert",0,arguments),b.$object){for(var f=0;f<b.$object.length;f++){var g=b.$object[f];d.appendChild(g),d.appendChild(document.createTextNode(" "))}a._$parent[0].insertBefore(d,e)}a._execAction("insert",1,arguments),"object"==typeof b.multiMix?a.multiMix(b.multiMix,c):a._refresh()},prepend:function(){var a=this,b=a._parseInsertArgs(arguments);a.insert(0,b.$object,b.multiMix,b.callback)},append:function(){var a=this,b=a._parseInsertArgs(arguments);a.insert(a._state.totalTargets,b.$object,b.multiMix,b.callback)},getOption:function(a){var c=this,d=function(a,c){for(var d=c.split("."),e=d.pop(),f=d.length,g=1,h=d[0]||c;(a=a[h])&&f>g;)h=d[g],g++;return a!==b?a[e]!==b?a[e]:a:void 0};return a?c._execFilter("getOption",d(c,a),arguments):c},setOptions:function(b){var c=this;c._execAction("setOptions",0,arguments),"object"==typeof b&&a.extend(!0,c,b),c._execAction("setOptions",1,arguments)},getState:function(){var a=this;return a._execFilter("getState",a._state,a)},destroy:function(b){var c=this;c._execAction("destroy",0,arguments),c._$body.add(a(c.selectors.sort)).add(a(c.selectors.filter)).off(".mixItUp");for(var d=0;d<c._$targets.length;d++){var e=c._$targets[d];b&&(e.style.display=""),delete e.mixParent}c._execAction("destroy",1,arguments),delete a.MixItUp.prototype._instances[c._id]}},a.fn.mixItUp=function(){var c,d=arguments,e=[],f=function(b,c){var d=new a.MixItUp,e=function(){return("00000"+(16777216*Math.random()<<0).toString(16)).substr(-6).toUpperCase()};d._execAction("_instantiate",0,arguments),b.id=b.id?b.id:"MixItUp"+e(),d._instances[b.id]||(d._instances[b.id]=d,d._init(b,c)),d._execAction("_instantiate",1,arguments)};return c=this.each(function(){if(d&&"string"==typeof d[0]){var c=a.MixItUp.prototype._instances[this.id];if("isLoaded"==d[0])e.push(c?!0:!1);else{var g=c[d[0]](d[1],d[2],d[3]);g!==b&&e.push(g)}}else f(this,d[0])}),e.length?e.length>1?e:e[0]:c},a.fn.removeStyle=function(a,c){return c=c?c:"",this.each(function(){for(var d=this,e=a.split(" "),f=0;f<e.length;f++)for(var g=0;2>g;g++){var h=g?e[f]:c+e[f];if(d.style[h]!==b&&"unknown"!=typeof d.style[h]&&d.style[h].length>0&&(d.style[h]=""),!c)break}d.attributes&&d.attributes.style&&d.attributes.style!==b&&""===d.attributes.style.value&&d.attributes.removeNamedItem("style")})}}(jQuery);

/*@preserve
 * Copyright (c) 2013 Ben Olson (https://github.com/bseth99/jquery-ui-scrollable)
 * jQuery UI Scrollable 0.1.1
 * Depends:
 *  jquery.ui.core.js
 *  jquery.ui.widget.js
 */
!function($){"use strict";var rootex=/^(?:html)$/i,max=Math.max,abs=Math.abs,round=Math.round,rhorizontal=/left|center|right/,rvertical=/top|center|bottom/,roffset=/[\+\-]\d+(\.[\d]+)?%?/,rposition=/^\w+/,rpercent=/%$/;function getOffsets(offsets,width,height){return[parseFloat(offsets[0])*(rpercent.test(offsets[0])?width/100:1),parseFloat(offsets[1])*(rpercent.test(offsets[1])?height/100:1)]}function parseCss(element,property){return parseInt($.css(element,property),10)||0}function trackScrolling(scroller){var _waiter=null;scroller.onscroll=function(e){if(!_waiter&&!scroller.ignoreScrolling){_waiter=setTimeout(function(){$.each(scroller.watch,function(){this._checkPositioning(e)});_waiter=null},$.osb.scrollable.CONFIG.throttler)}};scroller.element.on("scroll.scrollable",scroller.onscroll)}var monitor={scrollers:[],getScroller:function(obj){var scroller;for(var i=0;i<this.scrollers.length;i++){if(this.scrollers[i].element[0]===obj[0]){scroller=this.scrollers[i];break}}return scroller},attach:function(scroll){var scroller;if(!(scroller=this.getScroller(scroll.container))){scroller={element:scroll.container,watch:[],onscroll:null};this.scrollers.push(scroller)}if(scroller.watch.length==0)trackScrolling(scroller);scroller.watch.push(scroll)},detach:function(scroll){var scroller;if(scroller=this.getScroller(scroll.container)){for(var i=0;i<scroller.watch.length;i++){if(scroller.watch[i]===scroll){scroller.watch.splice(i,1);break}}if(scroller.watch.length==0){scroller.element.off("scroll.scrollable")}}},scrollInProgress:function(scroll,state){var scroller;if(scroller=this.getScroller(scroll.container)){scroller.ignoreScrolling=state}}};window.Scrollable=monitor;$.widget("osb.scrollable",{version:"0.1.4",widgetEventPrefix:"scroll",options:{"in":null,out:null,direction:"both",offset:null},inView:true,_create:function(){this.options.offset=this.options.offset||{top:0,left:0,bottom:0,right:0}},_init:function(){if(this.container){monitor.detach(this)}this.container=this.element.closest(":scrollable"+(this.direction=="both"?"":"("+this.direction+")"));if(this.container.length==0||rootex.test(this.container[0].nodeName))this.container=$(window);monitor.attach(this);this._checkPositioning()},_destroy:function(){monitor.detach(this);this.container=null},_checkPositioning:function(e){var _inView=this.inView,pos=this.position();this.inView=pos.inside;if(this.inView){if(!_inView){this._trigger("in",e,{container:this.container,element:this.element,position:pos})}}else if(_inView){this._trigger("out",e,{container:this.container,element:this.element,position:pos})}},position:function(){var doc={top:this.container.scrollTop(),left:this.container.scrollLeft()},elem=this.element.position(),ofs=$.extend({},this.options.offset),width=this.container.width(),height=this.container.height(),otmp,ret;if(ofs.vertical||ofs.y){otmp=getOffsets([0,ofs.vertical||ofs.y],width,height);ofs.top=ofs.bottom=otmp[1]/2}if(ofs.horizontal||ofs.x){otmp=getOffsets([ofs.horizontal||ofs.x,0],width,height);ofs.left=ofs.right=otmp[0]/2}otmp=getOffsets([ofs.left||0,ofs.top||0],width,height);ofs.left=otmp[0];ofs.top=otmp[1];otmp=getOffsets([ofs.right||0,ofs.bottom||0],width,height);ofs.right=otmp[0];ofs.bottom=otmp[1];doc.right=doc.left+width-ofs.right;doc.bottom=doc.top+height-ofs.bottom;doc.left+=ofs.left;doc.top+=ofs.top;elem.right=elem.left+this.element.width();elem.bottom=elem.top+this.element.height();ret={container:doc,element:elem,inside:false,outside:false,left:elem.right<doc.left,right:elem.left>doc.right,top:elem.bottom<doc.top,bottom:elem.top>doc.bottom};ret.inside=!ret.left&&!ret.right&&!ret.top&&!ret.bottom;ret.outside=!ret.inside;return ret},"goto":function(options){var self=this,options=options||{},offsets={},position=this.position(),targetWidth=this.container.width(),targetHeight=this.container.height(),elemWidth=this.element.outerWidth(true),elemHeight=this.element.outerHeight(true),dir=this.options.direction,target=this.container[0]===window?$("html"):this.container,scroll,atOffset,myOffset;if(!options.onlyOutside||options.onlyOutside&&!this.inView){$.each(["my","at"],function(){var pos=(options[this]||"").split(" "),horizontalOffset,verticalOffset;if(pos.length===1){pos=rhorizontal.test(pos[0])?pos.concat(["center"]):rvertical.test(pos[0])?["center"].concat(pos):["center","center"]}pos[0]=rhorizontal.test(pos[0])?pos[0]:"center";pos[1]=rvertical.test(pos[1])?pos[1]:"center";horizontalOffset=roffset.exec(pos[0]);verticalOffset=roffset.exec(pos[1]);offsets[this]=[horizontalOffset?horizontalOffset[0]:0,verticalOffset?verticalOffset[0]:0];options[this]=[rposition.exec(pos[0])[0],rposition.exec(pos[1])[0]]});if(options.at[0]==="right"){position.element.left-=targetWidth}else if(options.at[0]==="center"){position.element.left-=targetWidth/2}if(options.at[1]==="bottom"){position.element.top-=targetHeight}else if(options.at[1]==="center"){position.element.top-=targetHeight/2}atOffset=getOffsets(offsets.at,targetWidth,targetHeight);position.element.left-=atOffset[0];position.element.top-=atOffset[1];myOffset=getOffsets(offsets.my,elemWidth,elemHeight);if(options.my[0]==="right"){position.element.left+=elemWidth}else if(options.my[0]==="center"){position.element.left+=elemWidth/2}if(options.my[1]==="bottom"){position.element.top+=elemHeight}else if(options.my[1]==="center"){position.element.top+=elemHeight/2}position.element.left-=myOffset[0];position.element.top-=myOffset[1];scroll={};if(dir=="both"||dir=="horizontal")scroll.scrollLeft=round(position.element.left)+"px";if(dir=="both"||dir=="vertical")scroll.scrollTop=round(position.element.top)+"px";monitor.scrollInProgress(this,true);target.animate(scroll,{duration:options.duration||"slow",easing:options.easing||"swing",complete:function(){monitor.scrollInProgress(self,false);self._checkPositioning();if($.isFunction(options.complete))options.complete.call()}})}else{if($.isFunction(options.complete))options.complete.call(this.element)}}});$.expr[":"].scrollable=$.expr.createPseudo(function(dir){var dir=!dir||dir=="undefined"?"both":dir;return function(elem){var $el=$(elem),isRoot=rootex.test(elem.nodeName),styles=$el.css(["overflow-x","overflow-y"]),overflow={x:styles["overflow-x"]=="auto"||styles["overflow-x"]=="scroll",y:styles["overflow-y"]=="auto"||styles["overflow-y"]=="scroll"},test=false;if(!isRoot&&!overflow.x&&!overflow.y){return false}if(dir=="both"||dir=="vertical")test=test||(overflow.x||isRoot)&&elem.scrollWidth>elem.clientWidth;if(dir=="both"||dir=="horizontal")test=test||(overflow.y||isRoot)&&elem.scrollHeight>elem.clientHeight;return test}});$.propHooks.scrollTop=$.propHooks.scrollLeft={get:function(elem,prop){var result=null;if(elem.tagName==="HTML"||elem.tagName==="BODY"){if(prop==="scrollLeft"){result=window.scrollX}else if(prop==="scrollTop"){result=window.scrollY}}if(result==null){result=elem[prop]}return result}};$.Tween.propHooks.scrollTop=$.Tween.propHooks.scrollLeft={get:function(tween){return $.propHooks.scrollTop.get(tween.elem,tween.prop)},set:function(tween){if(tween.elem.tagName==="HTML"||tween.elem.tagName==="BODY"){tween.options.bodyScrollLeft=tween.options.bodyScrollLeft||window.scrollX;tween.options.bodyScrollTop=tween.options.bodyScrollTop||window.scrollY;if(tween.prop==="scrollLeft"){tween.options.bodyScrollLeft=Math.round(tween.now)}else if(tween.prop==="scrollTop"){tween.options.bodyScrollTop=Math.round(tween.now)}window.scrollTo(tween.options.bodyScrollLeft,tween.options.bodyScrollTop)}else if(tween.elem.nodeType&&tween.elem.parentNode){tween.elem[tween.prop]=tween.now}}};$.osb.scrollable.CONFIG={throttler:300}}(jQuery);


/**!
 * Portfolio filter
 *
 */
jQuery(function () {
		var filterList = {
			init: function () {
				jQuery('.portfoliolist-wrapper').mixItUp({
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			},
			hoverEffect: function () {}
		};
		// Run the show!
		filterList.init();
	});	

/**!
 * progress bar scroll action
 *
 */
jQuery(function () {

   jQuery('div.progress-item')
      .addClass('ui-corner-all')
      .on('scrollin', function ( e, ui) {
			var progress_num = jQuery(this).find(".progress > .progress-bar").attr("aria-valuenow");
           if(jQuery(this).hasClass("progress-item")){
			  jQuery(this).stop().find(".progress-bar-item").animate({
               width: progress_num+"%"
               }, 1000 ,function(){
				   jQuery(this).parents(".skills").find(".progress-num").animate({opacity:1}, 3500);
				   jQuery(this).parents(".skills").find(".progress-bar").removeClass(".progress-bar-item");
				   });
         jQuery(this).removeClass("progress-item");
		 }
         })
	   .scrollable();
   

});


			
/**
*/
   jQuery(document).ready(function() {
    
/* ------------------------------------------------------------------------ */
/*   testimonial 																*/
/* ------------------------------------------------------------------------ */
  //style 1
   jQuery("#testimonial").owlCarousel({
    autoPlay : 3000,
    stopOnHover : true,
    navigation : false,
    paginationSpeed : 1000,
    goToFirstSpeed : 5000,
    singleItem : true,
    autoHeight : true,
    transitionStyle:"fade"
    });
	
	//style 2
	jQuery("#testimonial2").owlCarousel({
items : 1,singleItem : true,pagination:false,slideSpeed:200, navigation : false,autoPlay:true,navigationText: [
"<i class='icon-angle-left'></i>",
"<i class='icon-angle-right'></i>"]});
	jQuery(".testimonials-wrapper .icon-angle-left").click(function(){jQuery("#testimonial2").trigger('owl.next');});jQuery(".testimonials-wrapper .icon-angle-right").click(function(){jQuery("#testimonial2").trigger('owl.prev');})
/* ------------------------------------------------------------------------ */
/*  contact form																*/
/* ------------------------------------------------------------------------ */
	 
	jQuery(".contact-submit").click(function(){
         jQuery(".contact-form").submit(function(e){
										   
	var obj    = jQuery(this);	
	var notify = obj.find(".noticefailed");
	notify.html("").hide();
	notify.append("<img alt='loading' class='loading' src='"+cosmone_params.themeurl+"/images/AjaxLoader.gif' />");
	
	 var name    = obj.find("#contact-name").val();
	 var email   = obj.find("#contact-email").val();
	 var sendto  = obj.find("#sendto").val();
	 var message = obj.find("#contact-msg").val();
	  jQuery.ajax({type:"POST",dataType:"json",url:cosmone_params.ajaxurl,data:"name="+name+"&email="+email+"&sendto="+sendto+"&message="+message+"&action=cosmone_contact",
	    success:function(data){
			    obj.find('.loading').remove();
				if(data.error==0){
				 notify.addClass("noticesuccess").removeClass("noticefailed");
				 notify.html(data.msg);
				 obj.find("#contact-name").val("");
	             obj.find("#contact-email").val("");
	             obj.find("#contact-msg").val("");
				}else{
				 notify.html(data.msg);
				}
		notify.show();
				},
		error:function(){
		obj.find('.loading').remove();
		notify.html("Error.");
		notify.show();
       }});
	  });
 });
/* ------------------------------------------------------------------------ */
/*   timeline load																*/
/* ------------------------------------------------------------------------ */
    
	jQuery(".timeline-load").click(function(){
		 var postype = jQuery(this).data("type");
		 var paged   = jQuery(this).data("paged");
		 var num     = jQuery(this).data("num");
		 var cat     = jQuery(this).data("cat");
		 var obj     = jQuery(this).parents(".timeline-container");
		 jQuery(this).find(".icon-refresh").addClass("icon-spin");
		 paged = paged + 1;
	     jQuery.ajax({type:"POST",dataType:"json",url:cosmone_params.ajaxurl,data:"paged="+paged+"&num="+num+"&cat="+cat+"&action=cosmone_get_timeline_"+postype+"_list",
	    success:function(data){
			obj.find(".timeline-left").append(data.left_list);
			obj.find(".timeline-right").append(data.right_list);
			obj.find(".timeline-load").data("paged",paged)
			obj.find(".timeline-load i.icon-refresh").removeClass("icon-spin");
			},
		error:function(){
			obj.find(".timeline-load i.icon-refresh").removeClass("icon-spin");
			}
		});
      });

/* ------------------------------------------------------------------------ */
/* get portfolio item content																*/
/* ------------------------------------------------------------------------ */
 jQuery("#portfolio-detail").hide();
	jQuery(".portfolio-box").click(function(){
		var postid = jQuery(this).data("id");
		var image  = jQuery(this).data("image");
		    jQuery(".portfolio-gallery-preview").remove();
			jQuery("#portfolio-detail").find("img.img-responsive").hide();
			jQuery("#portfolio-detail").find(".portfolio-image-preview").append('<img src="'+cosmone_params.themeurl+'/images/AjaxLoader.gif" class="portfolio-image-loading" alt="loading" />');
			   
		   jQuery("#portfolio-detail").find("h2.portfolio-detail-title").text("");
		   jQuery("#portfolio-detail").find(".portfolio-detail-content p").html("");
		   
		   
		jQuery.ajax({type:"POST",dataType:"json",url:cosmone_params.ajaxurl,data:"postid="+postid+"&action=cosmone_get_portfolio_content",success:function(data){
			if(typeof data.gallery !== 'undefined' && data.gallery){
				 jQuery(".portfolio-image-loading").remove();
				 jQuery("#portfolio-detail").find(".portfolio-image-preview").append(data.gallery);
				 jQuery("#portfolio-detail").find("img.img-responsive").hide();
				 jQuery("#portfolio-gallery").owlCarousel({ slideSpeed : 300, paginationSpeed : 400, singleItem:true });
				}else{
				 jQuery(".portfolio-image-loading").remove();
				 jQuery("#portfolio-detail").find("img.img-responsive").attr("src",image).show();
				}																																
		  
		   jQuery("#portfolio-detail").find("h2.portfolio-detail-title").text(data.post_title);
		   jQuery("#portfolio-detail").find(".portfolio-detail-content p").html(data.post_content);
		   jQuery("#portfolio-detail").show();
		   
		},error:function(){
		
		}});
		 
    		jQuery("#portfolio-detail").show();
  		});
		jQuery("#portfolio-detail-close").click(function(){
    		jQuery("#portfolio-detail").hide();
  		});
/* ------------------------------------------------------------------------ */
/* BACK TO TOP 																*/
/* ------------------------------------------------------------------------ */

 jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() > 200){
			jQuery("#back-to-top").fadeIn(200);
		} else{
			jQuery("#back-to-top").fadeOut(200);
		}
		if(jQuery(window).scrollTop() < jQuery('header').height()){
			jQuery(".onepage-home .main-menu .main-nav > li").removeClass("current");
			jQuery(".onepage-home .main-menu .main-nav > li:first-child").addClass("current");
			}
	});
	
	jQuery('#back-to-top, .back-to-top').click(function() {
		  jQuery('html, body').animate({ scrollTop:0 }, '800');
		  return false;
	});
/* ------------------------------------------------------------------------ */
/* fixed header															*/
/* ------------------------------------------------------------------------ */
jQuery('header').affix({offset: {top: jQuery('header').height()}}); 

/* ------------------------------------------------------------------------ */
/* nav menu scroll															*/
/* ------------------------------------------------------------------------ */

jQuery('header nav ul').onePageNav({filter: '.cosmone-menuitem a[href^="#"]'});

/*if(jQuery(".rev_slider_wrapper").length > 0){
 jQuery('body').scrollspy({ target: 'header',offset: 100});
	}else{
 jQuery('body').scrollspy({ target: 'header',offset: 50 + jQuery('header').height()});
	}
 
 jQuery('.cosmone-menuitem a[href^="#"]').on('click', function(event) {
    event.preventDefault();
    var target =  jQuery(this).attr('href');
    jQuery('html, body').animate({
        scrollTop: (jQuery(target).offset().top-jQuery('header').height())
    }, 1500);

  });*/
/* ------------------------------------------------------------------------ */
/* tabs														*/
/* ------------------------------------------------------------------------ */

jQuery('.tab-box .nav-tabs li a').click(function(){
  var current_tab = jQuery(this).attr("href");
  var obj         = jQuery(this).parents('.tab-box');
  obj.find(".nav-tabs > li").removeClass("active");
  jQuery(this).parent("li").addClass("active");
  obj.find(".tab-content .tab-pane").hide();
  obj.find(current_tab).show();
  });

/* ------------------------------------------------------------------------ */
/* accordion															*/
/* ------------------------------------------------------------------------ */
 jQuery('.accordion-box.style1 .accordion').click(function(){
				jQuery(this).parent(".accordion-box").find('div.accordion-detail').hide(400);
				jQuery(this).parent(".accordion-box").find('i').removeClass("icon-angle-right").addClass("icon-angle-down");
				jQuery(this).parent('.accordion-box').find(" .accordion").removeClass("active");
				
					jQuery(this).addClass("active");
					
				
				var detailObj = jQuery(this).find('div.accordion-detail');
                  	detailObj.toggle();
					if( detailObj.is(':visible') ) {
					jQuery(this).find("i").removeClass("icon-angle-down").addClass("icon-angle-right");
					}else{
					jQuery(this).find("i").removeClass("icon-angle-right").addClass("icon-angle-down");
					jQuery(this).removeClass("active");
					}
              	});
  	jQuery('.accordion-box.style2 .accordion').click(function(){
				jQuery(this).parent(".accordion-box").find('div.accordion-detail').hide(400);
				jQuery(this).parent(".accordion-box").find('i').removeClass("icon-minus").addClass("icon-plus");
				jQuery(this).parent('.accordion-box').find(" .accordion").removeClass("active");
				jQuery(this).addClass("active");
				var detailObj = jQuery(this).find('div.accordion-detail');
                  	detailObj.toggle();
					if( detailObj.is(':visible') ) {
					jQuery(this).find("i").removeClass("icon-plus").addClass("icon-minus");
					}else{
					jQuery(this).find("i").removeClass("icon-minus").addClass("icon-plus");
					jQuery(this).removeClass("active");
					}
              	});
/* ------------------------------------------------------------------------ */
/* smooth scrolling															*/
/* ------------------------------------------------------------------------ */
jQuery(document).ready(function(){
  jQuery('section a[href^="#"], .post a[href^="#"], .page a[href^="#"]').on('click',function (e) {
    e.preventDefault();

    var target = this.hash,
    $target = jQuery(target);

    jQuery('html, body').stop().animate({
        'scrollTop': $target.offset().top-jQuery('header').height()
    }, 1200, 'swing', function () {
        window.location.hash = target;
    });
  });
  });

/* ------------------------------------------------------------------------ */
/* portfolio gallery													*/
/* ------------------------------------------------------------------------ */
    jQuery("#portfolio-gallery").owlCarousel({
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true
     
    });

jQuery("a[rel^='portfolio-image']").prettyPhoto();
/* ------------------------------------------------------------------------ */	
/* ------------------------------------------------------------------------ */
jQuery(".comment-form .form-submit #submit").addClass("btn-normal");
/* ------------------------------------------------------------------------ */	
/* timeline style 2													*/
/* ------------------------------------------------------------------------ */


			
jQuery(".timeline-box.style2").each(function(){
	  var item_width        = jQuery(this).find(".timeline-top .project-box:first").width();
	  var top_warp_width    = jQuery(this).find(".timeline-top .project-box").length*item_width;
	  var bottom_warp_width = jQuery(this).find(".timeline-bottom .project-box").length*item_width;
	  var warp_width        = top_warp_width > bottom_warp_width ? top_warp_width:bottom_warp_width;
	  var warp_width        = warp_width + 250;
	  jQuery(this).css({"width":(warp_width)+"px"});
	  jQuery(this).css({left:"-"+(warp_width-jQuery(this).parents(".timeline-stle2-viewport").width()-150)+"px"});
	  });
            

            jQuery(".timeline-page .pre").mousedown(function(){
			var obj = jQuery(this).parents(".timeline-wrapper").find(".timeline-box");
			var item_width        = obj.find(".timeline-top .project-box:first").width();
	        var top_warp_width    = obj.find(".timeline-top .project-box").length*item_width;
	        var bottom_warp_width = obj.find(".timeline-bottom .project-box").length*item_width;
	        var warp_width        = top_warp_width > bottom_warp_width ? top_warp_width:bottom_warp_width;
            var warp_width        = warp_width + 250;
			if(warp_width - jQuery(this).parents(".timeline-wrapper").width()+  obj.offset().left > 0){
                obj.animate({ left: "+="+(warp_width-jQuery(this).parents(".timeline-window").width())+"px" }, 1000); 
				}
				
            }).mouseup(function(e){
			var obj = jQuery(this).parents(".timeline-wrapper").find(".timeline-box");
            obj.stop(true);
			var obj = jQuery(this).parents(".timeline-wrapper").find(".timeline-box");
			var item_width        = obj.find(".timeline-top .project-box:first").width();
	        var top_warp_width    = obj.find(".timeline-top .project-box").length*item_width;
	        var bottom_warp_width = obj.find(".timeline-bottom .project-box").length*item_width;
	        var warp_width        = top_warp_width > bottom_warp_width ? top_warp_width:bottom_warp_width;
            var warp_width        = warp_width + 250;
		
		/*	if(warp_width - jQuery(this).parents(".timeline-wrapper").width() +  obj.offset().left < 0){
				
			obj.animate({ left: "-" + (obj.width()-jQuery(this).parents(".timeline-wrapper").width()+250)+"px" }, 1000); 
 
				}*/
				
				if( obj.offset().left > 0){
			obj.animate({ left: "0px" }, 1000); 
 
				}
				
            });

            jQuery(".timeline-page .next").mousedown(function(){
			var obj = jQuery(this).parents(".timeline-wrapper").find(".timeline-box");
			var item_width        = obj.find(".timeline-top .project-box:first").width();
	        var top_warp_width    = obj.find(".timeline-top .project-box").length*item_width;
	        var bottom_warp_width = obj.find(".timeline-bottom .project-box").length*item_width;
	        var warp_width        = top_warp_width > bottom_warp_width ? top_warp_width:bottom_warp_width;
			var warp_width        = warp_width + 250;
                obj.animate({ left: "-="+(warp_width-jQuery(this).parents(".timeline-window").width())+"px" }, 1000); 
            }).mouseup(function(e){
			var obj = jQuery(this).parents(".timeline-wrapper").find(".timeline-box");
            obj.stop(true);
			var item_width        = obj.find(".timeline-top .project-box:first").width();
	        var top_warp_width    = obj.find(".timeline-top .project-box").length*item_width;
	        var bottom_warp_width = obj.find(".timeline-bottom .project-box").length*item_width;
	        var warp_width        = top_warp_width > bottom_warp_width ? top_warp_width:bottom_warp_width;
            var warp_width        = warp_width + 250;
			/*if( obj.offset().left > 0){
			obj.animate({ left: "0px" }, 1000); 
 
				}*/
				if(warp_width - jQuery(this).parents(".timeline-wrapper").width() +  obj.offset().left < 0){
				
			obj.animate({ left: "-" + (obj.width()-jQuery(this).parents(".timeline-wrapper").width()+50)+"px" }, 1000); 
 
				}
				
            });
			//
	
 });
   if(typeof cosmone_js_var !== 'undefined' && typeof cosmone_js_var.global_color !== 'undefined'){
 less.modifyVars({
        '@color-link': cosmone_js_var.global_color
    });
   }