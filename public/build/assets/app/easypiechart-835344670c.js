var EasyPie={init:function(e){return $().easyPieChart?(e=$.extend(!0,this.getDefaultOptions(),e),void $(e.src).easyPieChart(e.easyPieChart)):!1},getDefaultOptions:function(){return{src:"",easyPieChart:{animate:1e3,size:75,lineWidth:5,trackColor:"#f2f2f2",scaleColor:"#dfe0e0",lineCap:"round",barColor:function(e){return e>70?App.getBrandColor("green"):e>45?App.getBrandColor("yellow"):App.getBrandColor("red")}}}}};