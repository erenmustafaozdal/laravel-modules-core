var ModelOperation,Operation={options:{formSrc:"form.form"},form:null,init:function(){ModelOperation=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{title:{required:!0},photo:{required:function(o){var i=$("#video");return!i.length||i.prop("disabled")===!0}},video:{required:function(o){var i=$("#photo");return!i.length||i.prop("disabled")===!0}}},messages:messagesOfRules}}),LMCFileinput.init(this.getPhotoFileinputOptions())},getPhotoFileinputOptions:function(){return{src:"#photo",formSrc:"form.form",fileinput:{showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}}};