var ModelIndex,Index={options:{},init:function(e){ModelIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),e),GTreeTable.init(this.options)},getDefaultOptions:function(){return{relationLinks:{category:!1,model:!1},relationURLs:{category:"#",model:"#"},nestableLevel:0}}};