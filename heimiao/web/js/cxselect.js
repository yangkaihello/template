/*!
 * jQuery cxSelect
 * @name jquery.cxselect.js
 * @version 1.4.2
 * @date 2017-09-26
 * @author ciaoca
 * @email ciaoca@gmail.com
 * @site https://github.com/ciaoca/cxSelect
 * @license Released under the MIT license
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(window.jQuery||window.Zepto||window.$)}(function(a){var b=function(){var d,e,f,g,h,i;for(g=0,h=arguments.length;h>g;g++)b.isJquery(arguments[g])||b.isZepto(arguments[g])?d=arguments[g]:b.isElement(arguments[g])?d=a(arguments[g]):"function"==typeof arguments[g]?f=arguments[g]:"object"==typeof arguments[g]&&(e=arguments[g]);return i=new b.init(d,e),"function"==typeof f&&f(i),i};b.isElement=function(a){return a&&("function"==typeof HTMLElement||"object"==typeof HTMLElement)&&a instanceof HTMLElement?!0:a&&a.nodeType&&1===a.nodeType?!0:!1},b.isJquery=function(a){return a&&a.length&&("function"==typeof jQuery||"object"==typeof jQuery)&&a instanceof jQuery?!0:!1},b.isZepto=function(a){return a&&a.length&&("function"==typeof Zepto||"object"==typeof Zepto)&&Zepto.zepto.isZ(a)?!0:!1},b.getIndex=function(a,b){return b?a:a-1},b.getData=function(a,b){if("string"==typeof b&&b.length){b=b.split(".");for(var c=0,d=b.length;d>c;c++)a=a[b[c]]}return a},b.init=function(c,d){var f,g,e=this;(b.isJquery(c)||b.isZepto(c))&&(f={dom:{box:c}},e.attach=b.attach.bind(f),e.detach=b.detach.bind(f),e.setOptions=b.setOptions.bind(f),e.clear=b.clear.bind(f),f.changeEvent=function(){b.selectChange.call(f,this.className)},f.settings=a.extend({},a.cxSelect.defaults,d,{url:f.dom.box.data("url"),emptyStyle:f.dom.box.data("emptyStyle"),required:f.dom.box.data("required"),firstTitle:f.dom.box.data("firstTitle"),firstValue:f.dom.box.data("firstValue"),jsonSpace:f.dom.box.data("jsonSpace"),jsonName:f.dom.box.data("jsonName"),jsonValue:f.dom.box.data("jsonValue"),jsonSub:f.dom.box.data("jsonSub")}),g=f.dom.box.data("selects"),"string"==typeof g&&g.length&&(f.settings.selects=g.split(",")),e.setOptions(),e.attach(),f.settings.url||f.settings.data?a.isArray(f.settings.data)?b.start.call(f,f.settings.data):"string"==typeof f.settings.url&&f.settings.url.length&&a.getJSON(f.settings.url,function(a){b.start.call(f,a)}):b.start.apply(f))},b.setOptions=function(c){var e,f,g,d=this;if(c&&a.extend(d.settings,c),(!a.isArray(d.selectArray)||!d.selectArray.length||c&&c.selects)&&(d.selectArray=[],a.isArray(d.settings.selects)&&d.settings.selects.length))for(f=0,g=d.settings.selects.length;g>f&&(e=d.dom.box.find("select."+d.settings.selects[f]),e&&e.length);f++)d.selectArray.push(e);c&&(!a.isArray(c.data)&&"string"==typeof c.url&&c.url.length?a.getJSON(d.settings.url,function(a){b.start.call(d,a)}):b.start.call(d,c.data))},b.attach=function(){var a=this;a.attachStatus||a.dom.box.on("change","select",a.changeEvent),"boolean"==typeof a.attachStatus&&b.start.call(a),a.attachStatus=!0},b.detach=function(){var a=this;a.dom.box.off("change","select",a.changeEvent),a.attachStatus=!1},b.clear=function(a){var d,e,b=this,c={display:"",visibility:""};for(a=isNaN(a)?0:a,d=a,e=b.selectArray.length;e>d;d++)b.selectArray[d].empty().prop("disabled",!0),"none"===b.settings.emptyStyle?c.display="none":"hidden"===b.settings.emptyStyle&&(c.visibility="hidden"),b.selectArray[d].css(c)},b.start=function(c){var e,f,d=this;if(a.isArray(c)&&(d.settings.data=b.getData(c,d.settings.jsonSpace)),d.selectArray.length){for(e=0,f=d.selectArray.length;f>e;e++)"string"!=typeof d.selectArray[e].attr("data-value")&&d.selectArray[e][0].options.length&&d.selectArray[e].attr("data-value",d.selectArray[e].val());d.settings.data||"string"==typeof d.selectArray[0].data("url")&&d.selectArray[0].data("url").length?b.getOptionData.call(d,0):d.selectArray[0][0].options.length&&"string"==typeof d.selectArray[0].attr("data-value")&&d.selectArray[0].attr("data-value").length?(d.selectArray[0].val(d.selectArray[0].attr("data-value")),b.getOptionData.call(d,1)):d.selectArray[0].prop("disabled",!1).css({display:"",visibility:""})}},b.getOptionData=function(c){var f,g,h,i,j,k,l,m,n,o,p,d=this;if(!("number"!=typeof c||isNaN(c)||0>c||c>=d.selectArray.length))if(f=d.selectArray[c],i=f.data("url"),j="undefined"==typeof f.data("jsonSpace")?d.settings.jsonSpace:f.data("jsonSpace"),k={},b.clear.call(d,c),"string"==typeof i&&i.length){if(c>0)for(o=0,p=1;c>o;o++,p++)l=d.selectArray[p].data("queryName"),m=d.selectArray[o].attr("name"),n=d.selectArray[o].val(),"string"==typeof l&&l.length?k[l]=n:"string"==typeof m&&m.length&&(k[m]=n);a.getJSON(i,k,function(a){g=b.getData(a,j),b.buildOption.call(d,c,g)})}else if(d.settings.data&&"object"==typeof d.settings.data){for(g=d.settings.data,o=0;c>o;o++){if(h=b.getIndex(d.selectArray[o][0].selectedIndex,"boolean"==typeof d.selectArray[o].data("required")?d.selectArray[o].data("required"):d.settings.required),"object"!=typeof g[h]||!a.isArray(g[h][d.settings.jsonSub])||!g[h][d.settings.jsonSub].length){g=null;break}g=g[h][d.settings.jsonSub]}b.buildOption.call(d,c,g)}},b.buildOption=function(b,c){var k,l,m,d=this,e=d.selectArray[b],f="boolean"==typeof e.data("required")?e.data("required"):d.settings.required,g="undefined"==typeof e.data("firstTitle")?d.settings.firstTitle:e.data("firstTitle"),h="undefined"==typeof e.data("firstValue")?d.settings.firstValue:e.data("firstValue"),i="undefined"==typeof e.data("jsonName")?d.settings.jsonName:e.data("jsonName"),j="undefined"==typeof e.data("jsonValue")?d.settings.jsonValue:e.data("jsonValue");if(a.isArray(c)){if(k=f?"":'<option value="'+String(h)+'">'+String(g)+"</option>","string"==typeof i&&i.length)for("string"==typeof j&&j.length||(j=i),l=0,m=c.length;m>l;l++)k+='<option value="'+String(c[l][j])+'">'+String(c[l][i])+"</option>";else for(l=0,m=c.length;m>l;l++)k+='<option value="'+String(c[l])+'">'+String(c[l])+"</option>";e.html(k).prop("disabled",!1).css({display:"",visibility:""}),"string"==typeof e.attr("data-value")&&(e.val(String(e.attr("data-value"))).removeAttr("data-value"),e[0].selectedIndex<0&&(e[0].options[0].selected=!0)),(f||e[0].selectedIndex>0)&&e.trigger("change")}},b.selectChange=function(a){var d,e,f,c=this;if("string"==typeof a&&a.length){for(a=a.replace(/\s+/g,","),a=","+a+",",e=0,f=c.selectArray.length;f>e;e++)if(a.indexOf(","+c.settings.selects[e]+",")>-1){d=e;break}"number"==typeof d&&d>-1&&(d+=1,b.getOptionData.call(c,d))}},a.cxSelect=function(){return b.apply(this,arguments)},a.cxSelect.defaults={selects:[],url:null,data:null,emptyStyle:null,required:!1,firstTitle:"请选择",firstValue:"",jsonSpace:"",jsonName:"n",jsonValue:"",jsonSub:"s"},a.fn.cxSelect=function(b,c){return this.each(function(){a.cxSelect(this,b,c)}),this}});