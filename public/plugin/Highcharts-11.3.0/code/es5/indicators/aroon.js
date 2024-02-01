/**
 * Highstock JS v11.3.0 (2024-01-10)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2024 Wojciech Chmiel
 *
 * License: www.highcharts.com/license
 */!function(t){"object"==typeof module&&module.exports?(t.default=t,module.exports=t):"function"==typeof define&&define.amd?define("highcharts/indicators/aroon",["highcharts","highcharts/modules/stock"],function(o){return t(o),t.Highcharts=o,t}):t("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(t){"use strict";var o=t?t._modules:{};function n(t,o,n,e){t.hasOwnProperty(o)||(t[o]=e.apply(null,n),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:o,module:t[o]}})))}n(o,"Stock/Indicators/MultipleLinesComposition.js",[o["Core/Series/SeriesRegistry.js"],o["Core/Utilities.js"]],function(t,o){var n,e=t.seriesTypes.sma.prototype,r=o.defined,i=o.error,a=o.merge;return function(t){var o=["bottomLine"],n=["top","bottom"],s=["top"];function p(t){return"plot"+t.charAt(0).toUpperCase()+t.slice(1)}function l(t,o){var n=[];return(t.pointArrayMap||[]).forEach(function(t){t!==o&&n.push(p(t))}),n}function c(){var t,o=this,n=o.pointValKey,s=o.linesApiNames,c=o.areaLinesNames,h=o.points,u=o.options,f=o.graph,d={options:{gapSize:u.gapSize}},y=[],m=l(o,n),g=h.length;if(m.forEach(function(o,n){for(y[n]=[];g--;)t=h[g],y[n].push({x:t.x,plotX:t.plotX,plotY:t[o],isNull:!r(t[o])});g=h.length}),o.userOptions.fillColor&&c.length){var v=y[m.indexOf(p(c[0]))],A=1===c.length?h:y[m.indexOf(p(c[1]))],x=o.color;o.points=A,o.nextPoints=v,o.color=o.userOptions.fillColor,o.options=a(h,d),o.graph=o.area,o.fillGraph=!0,e.drawGraph.call(o),o.area=o.graph,delete o.nextPoints,delete o.fillGraph,o.color=x}s.forEach(function(t,n){y[n]?(o.points=y[n],u[t]?o.options=a(u[t].styles,d):i('Error: "There is no '+t+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names."'),o.graph=o["graph"+t],e.drawGraph.call(o),o["graph"+t]=o.graph):i('Error: "'+t+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")}),o.points=h,o.options=u,o.graph=f,e.drawGraph.call(o)}function h(t){var o,n=[],r=[];if(t=t||this.points,this.fillGraph&&this.nextPoints){if((o=e.getGraphPath.call(this,this.nextPoints))&&o.length){o[0][0]="L",n=e.getGraphPath.call(this,t),r=o.slice(0,n.length);for(var i=r.length-1;i>=0;i--)n.push(r[i])}}else n=e.getGraphPath.apply(this,arguments);return n}function u(t){var o=[];return(this.pointArrayMap||[]).forEach(function(n){o.push(t[n])}),o}function f(){var t,o=this,n=this.pointArrayMap,r=[];r=l(this),e.translate.apply(this,arguments),this.points.forEach(function(e){n.forEach(function(n,i){t=e[n],o.dataModify&&(t=o.dataModify.modifyValue(t)),null!==t&&(e[r[i]]=o.yAxis.toPixels(t,!0))})})}t.compose=function(t){var e=t.prototype;return e.linesApiNames=e.linesApiNames||o.slice(),e.pointArrayMap=e.pointArrayMap||n.slice(),e.pointValKey=e.pointValKey||"top",e.areaLinesNames=e.areaLinesNames||s.slice(),e.drawGraph=c,e.getGraphPath=h,e.toYData=u,e.translate=f,t}}(n||(n={})),n}),n(o,"Stock/Indicators/Aroon/AroonIndicator.js",[o["Stock/Indicators/MultipleLinesComposition.js"],o["Core/Series/SeriesRegistry.js"],o["Core/Utilities.js"]],function(t,o,n){var e,r=this&&this.__extends||(e=function(t,o){return(e=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,o){t.__proto__=o}||function(t,o){for(var n in o)Object.prototype.hasOwnProperty.call(o,n)&&(t[n]=o[n])})(t,o)},function(t,o){if("function"!=typeof o&&null!==o)throw TypeError("Class extends value "+String(o)+" is not a constructor or null");function n(){this.constructor=t}e(t,o),t.prototype=null===o?Object.create(o):(n.prototype=o.prototype,new n)}),i=o.seriesTypes.sma,a=n.extend,s=n.merge,p=n.pick;function l(t,o){var n,e=t[0],r=0;for(n=1;n<t.length;n++)("max"===o&&t[n]>=e||"min"===o&&t[n]<=e)&&(e=t[n],r=n);return r}var c=function(t){function o(){return null!==t&&t.apply(this,arguments)||this}return r(o,t),o.prototype.getValues=function(t,o){var n,e,r,i,a,s=o.period,c=t.xData,h=t.yData,u=h?h.length:0,f=[],d=[],y=[];for(i=s-1;i<u;i++)r=l((a=h.slice(i-s+1,i+2)).map(function(t){return p(t[2],t)}),"min"),n=l(a.map(function(t){return p(t[1],t)}),"max")/s*100,e=r/s*100,c[i+1]&&(f.push([c[i+1],n,e]),d.push(c[i+1]),y.push([n,e]));return{values:f,xData:d,yData:y}},o.defaultOptions=s(i.defaultOptions,{params:{index:void 0,period:25},marker:{enabled:!1},tooltip:{pointFormat:'<span style="color:{point.color}">●</span><b> {series.name}</b><br/>Aroon Up: {point.y}<br/>Aroon Down: {point.aroonDown}<br/>'},aroonDown:{styles:{lineWidth:1,lineColor:void 0}},dataGrouping:{approximation:"averages"}}),o}(i);return a(c.prototype,{areaLinesNames:[],linesApiNames:["aroonDown"],nameBase:"Aroon",pointArrayMap:["y","aroonDown"],pointValKey:"y"}),t.compose(c),o.registerSeriesType("aroon",c),c}),n(o,"masters/indicators/aroon.src.js",[],function(){})});