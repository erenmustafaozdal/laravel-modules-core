var theModel,Model={options:{formSrc:"form.form-horizontal"},form:null,init:function(){theModel=this,this.form=$(this.options.formSrc),$(".color-picker").minicolors({control:"hue",letterCase:"lowercase",position:"bottom right",theme:"bootstrap"})}};