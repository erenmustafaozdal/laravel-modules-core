var theLMCFileinput,LMCFileinput={fileElement:null,options:{},init:function(e){theLMCFileinput=this,this.options=$.extend(!0,this.getDefaultOptions(),e),this.fileElement=$(this.options.src),this.fileElement.fileinput(this.options.fileinput),this.fileElement.on("filebrowse",this.options.filebrowse),this.fileElement.on("fileloaded",this.options.fileloaded),this.fileElement.on("filecleared",this.options.filecleared),this.fileElement.on("filereset",this.options.filereset),this.fileElement.on("fileuploaded",this.options.fileuploaded),this.fileElement.on("filebatchuploadsuccess",this.options.filebatchuploadsuccess)},clear:function(){this.fileElement.fileinput("clear")},getDefaultOptions:function(){return{src:"",formSrc:"",fileinput:{uploadUrl:"",language:"tr",allowedFileExtensions:["jpg","jpeg","png"],allowedFileTypes:["image"],previewFileType:"image",previewFileIcon:'<i class="fa fa-file-photo-o"></i>',msgErrorClass:"alert alert-danger",maxFileSize:5120,showUpload:!0,showCaption:!0,showPreview:!0,showRemove:!0,showCancel:!0,showClose:!0,showUploadedThumbs:!1,showBrowse:!0,browseOnZoneClick:!0,uploadAsync:!1,captionClass:"form-control form-control-solid",browseIcon:'<i class="icon-folder-alt"></i> ',browseClass:"btn blue btn-outline",removeIcon:'<i class="icon-trash"></i> ',removeClass:"btn red btn-outline",uploadIcon:'<i class="icon-cloud-upload"></i> ',uploadClass:"btn green-meadow btn-outline",progressClass:"progress-bar progress-bar-info progress-bar-striped active",progressCompleteClass:"progress-bar progress-bar-success progress-bar-striped",progressErrorClass:"progress-bar progress-bar-danger progress-bar-striped",fileActionSettings:{showUpload:!0,uploadIcon:'<i class="icon-cloud-upload"></i> ',uploadClass:"btn btn-xs green-meadow btn-outline tooltips",showRemove:!0,removeIcon:'<i class="icon-trash"></i> ',removeClass:"btn btn-xs red btn-outline tooltips",showZoom:!1,zoomIcon:'<i class="icon-magnifier-add"></i> ',zoomClass:"btn btn-xs purple btn-outline tooltips"}},filebrowse:function(e){},fileloaded:function(e,o,s,i,l){},filecleared:function(e){},filereset:function(e){},fileuploaded:function(e,o,s,i){},filebatchuploadsuccess:function(e,o,s,i){}}}};