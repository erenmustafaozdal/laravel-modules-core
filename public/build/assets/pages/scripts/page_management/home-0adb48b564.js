var theHome,Home={options:{formSrc:"form.form-horizontal"},form:null,init:function(){theHome=this,this.form=$(this.options.formSrc),LMCFileinput.init(this.getPhotoHomeImageBannerFirstOptions()),LMCFileinput.init(this.getPhotoHomeImageBannerSecondOptions()),LMCFileinput.init(this.getPhotoHomeCreativeSliderOptions()),LMCFileinput.init(this.getPhotoHomeAdvertisementBannerBigOptions()),LMCFileinput.init(this.getPhotoHomeAdvertisementBannerSmallOptions()),$("a.remove-element").on("click",function(){var e=$(this);LMCApp.removeElement({element:e,removeElement:{src:".element-wrapper"},ajax:{url:removePhotoURL.replace("###id###",e.data("parent-id")),data:{id:e.data("element-id")}}})})},getPhotoHomeImageBannerOptions:function(){return{src:".photo_home_image_banner",formSrc:"form.form",aspectRatio:homeImageBannerAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}},getPhotoHomeCreativeSliderOptions:function(){return{src:".photo_home_creative_slider",formSrc:"form.form",aspectRatio:homeCreativeSliderAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}},getPhotoHomeImageBannerFirstOptions:function(){return{src:".photo_home_image_banner_first",formSrc:"form.form",aspectRatio:homeImageBannerAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="first[x]" value="0">\n   <input type="hidden" class="crop-y" name="first[y]" value="0">\n   <input type="hidden" class="crop-width" name="first[width]" value="0">\n   <input type="hidden" class="crop-height" name="first[height]" value="0">\n</div>\n'}}}},getPhotoHomeImageBannerSecondOptions:function(){return{src:".photo_home_image_banner_second",formSrc:"form.form",aspectRatio:homeImageBannerAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="second[x]" value="0">\n   <input type="hidden" class="crop-y" name="second[y]" value="0">\n   <input type="hidden" class="crop-width" name="second[width]" value="0">\n   <input type="hidden" class="crop-height" name="second[height]" value="0">\n</div>\n'}}}},getPhotoHomeAdvertisementBannerBigOptions:function(){return{src:".photo_home_advertisement_banner_big",formSrc:"form.form",aspectRatio:homeAdvertisementBannerBigAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="big[x]" value="0">\n   <input type="hidden" class="crop-y" name="big[y]" value="0">\n   <input type="hidden" class="crop-width" name="big[width]" value="0">\n   <input type="hidden" class="crop-height" name="big[height]" value="0">\n</div>\n'}}}},getPhotoHomeAdvertisementBannerSmallOptions:function(){return{src:".photo_home_advertisement_banner_small",formSrc:"form.form",aspectRatio:homeAdvertisementBannerSmallAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="small[x]" value="0">\n   <input type="hidden" class="crop-y" name="small[y]" value="0">\n   <input type="hidden" class="crop-width" name="small[width]" value="0">\n   <input type="hidden" class="crop-height" name="small[height]" value="0">\n</div>\n'}}}}};