var ModuleShow,Show={options:{formSrc:"#document-edit-info"},form:null,init:function(){ModuleShow=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{category_id:{required:!0},title:{required:!0}},messages:messagesOfRules}}),LMCFileinput.init(this.getPhotoFileinputOptions()),LMCFileinput.init(this.getDocumentFileinputOptions())},getDocumentFileinputOptions:function(){return{src:"#document",formSrc:"form.form",fileinput:{allowedFileExtensions:validExtension.split(","),allowedFileTypes:null,previewFileType:"any",showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}},getPhotoFileinputOptions:function(){return{src:"#photo",formSrc:"form.form",fileinput:{showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}}};