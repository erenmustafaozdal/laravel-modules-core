@extends(config('laravel-product-module.views.product.layout'))

@section('title')
    {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-product-module/admin.product.{$operation}_description", [
                'product' => $operation === 'edit' ? $product->title_uc_first : null
            ]) !!}
        </small>
    </h1> @endsection

@section('css')
    @parent
    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}

    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/product/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($product_category))
            var modelsURL = "{!! route('api.product_category.models', ['id' => $product_category]) !!}";
        @else
            var modelsURL = "{!! route('api.product_category.models') !!}";
        @endif
        var categoriesURL = "{!! route('api.product_category.models') !!}";
        var brandsURL = "{!! route('api.product_brand.models') !!}";
        var removePhotoURL = "{!! route('api.description.removePhoto', ['id' => '###id###']) !!}";
        var tinymceURL = "{!! route('elfinder.tinymce4') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            'category_id[]': { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            brand_id: { required: "{!! LMCValidation::getMessage('brand_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            amount: { required: "{!! LMCValidation::getMessage('amount','required') !!}" }
        };
        var validExtension = "{!! config('laravel-description-module.description.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-description-module.description.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-description-module.description.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = "{!! config('laravel-description-module.description.uploads.photo.aspect_ratio') !!}";
        {{-- /languages --}}
        $script.ready(['config','operation','inputmask','app_fileinput','app_jcrop','touchspin'], function()
        {
            ;var theLMCFileinput;
            var LMCFileinputs = {};
            var LMCFileinput = {

                /**
                 * fileElement jquery element
                 * @var null | jquery element
                 */
                fileElement: null,

                /**
                 * fileinput options
                 * @var object
                 */
                options: {},

                /**
                 * fileinput init function
                 * @param options
                 */
                init: function(options)
                {
                    // Fileinput object
                    theLMCFileinput = this;

                    // default settings
                    this.options = $.extend(true, this.getDefaultOptions(), options);

                    // fileElement jquery element
                    this.fileElement = $(this.options.src);

                    this.fileElement.fileinput(this.options.fileinput);
                    LMCFileinputs[this.options.src] = { isEnable : true };

                    // file input events
                    this.fileElement.on('filebrowse', this.options.filebrowse);
                    this.fileElement.on('fileloaded', this.options.fileloaded);
                    this.fileElement.on('filecleared', this.options.filecleared);
                    this.fileElement.on('filereset', this.options.filereset);
                    this.fileElement.on('fileuploaded', this.options.fileuploaded);
                    this.fileElement.on('filebatchuploadsuccess', this.options.filebatchuploadsuccess);
                    this.fileElement.on('fileuploaderror', this.options.fileuploaderror);
                    this.fileElement.on('filedisabled', this.options.filedisabled);
                    this.fileElement.on('fileenabled', this.options.fileenabled);

                    // fileinput ve elfinder yönetimi
                    $('.fileinput-tabs').on('click',function(e)
                    {
                        var element = $(this);
                        var action = element.data('action');
                        var actionId = element.data('action-id');
                        var textInput = element.parents('.tabbable-line').find('input.elfinder[type="text"]');
                        var fileinput = $('#' + actionId);

                        if (action == 'fileinput') {
                            // text iptal edilir
                            textInput.val('').prop('disabled',true);
                            // fileinput aktif edilir
                            LMCFileinput.enable(fileinput);
                            return;
                        }
                        // text alanı aktif edilir
                        textInput.prop('disabled',false);
                        // fileinput iptal edilir
                        LMCFileinput.disable(fileinput);
                    });

                },

                /**
                 * file input clear
                 */
                clear: function()
                {
                    this.fileElement.fileinput('clear');
                },

                /**
                 * file input disable
                 *
                 * @param element
                 */
                disable: function(element)
                {
                    element.fileinput('disable').fileinput('clear').fileinput('reset');
                },

                /**
                 * file input enable
                 *
                 * @param element
                 */
                enable: function(element)
                {
                    element.fileinput('enable').fileinput('refresh');
                },

                /**
                 * get default options
                 */
                getDefaultOptions:function()
                {
                    return {
                        src: '',
                        formSrc: '',
                        fileinput: {
                            uploadUrl: '',
                            language: 'tr',
                            allowedFileExtensions: ['jpg', 'jpeg', 'png'],
                            allowedFileTypes: ['image'],
                            previewFileType: 'image',
                            previewFileIcon: '<i class="fa fa-file-photo-o"></i>',
                            msgErrorClass: 'alert alert-danger',
                            maxFileSize: 1024*5,
                            showUpload: true,
                            showCaption: true,
                            showPreview: true,
                            showRemove: true,
                            showCancel: true,
                            showClose: true,
                            showUploadedThumbs: false,
                            showBrowse: true,
                            browseOnZoneClick: true,
                            uploadAsync: false, // when upload multiple files
                            captionClass: 'form-control form-control-solid',
                            browseLabel: LMCApp.lang.admin.ops.browse,
                            browseIcon: '<i class="icon-folder-alt"></i> ',
                            browseClass: 'btn blue btn-outline',
                            removeIcon: '<i class="icon-trash"></i> ',
                            removeClass: 'btn red btn-outline',
                            uploadIcon: '<i class="icon-cloud-upload"></i> ',
                            uploadClass: 'btn green-meadow btn-outline',
                            progressClass: 'progress-bar progress-bar-info progress-bar-striped active',
                            progressCompleteClass: 'progress-bar progress-bar-success progress-bar-striped',
                            progressErrorClass: 'progress-bar progress-bar-danger progress-bar-striped',
                            fileActionSettings: {
                                showUpload: true,
                                uploadIcon: '<i class="icon-cloud-upload"></i> ',
                                uploadClass: 'btn btn-xs green-meadow btn-outline tooltips',
                                showRemove: true,
                                removeIcon: '<i class="icon-trash"></i> ',
                                removeClass: 'btn btn-xs red btn-outline tooltips',
                                showZoom: false,
                                zoomIcon: '<i class="icon-magnifier-add"></i> ',
                                zoomClass: 'btn btn-xs purple btn-outline tooltips'
                            },
                            showAjaxErrorDetails: false,
                            previewTemplates: {
                                image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                                '   <div class="kv-file-content">' +
                                '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                                '   </div>\n' +
                                '   {footer}\n' +
                                '   <input type="hidden" class="crop-x" name="x[]" value="0">\n' +
                                '   <input type="hidden" class="crop-y" name="y[]" value="0">\n' +
                                '   <input type="hidden" class="crop-width" name="width[]" value="0">\n' +
                                '   <input type="hidden" class="crop-height" name="height[]" value="0">\n' +
                                '</div>\n',
                            }
                        },
                        // events
                        filebrowse: function(event)
                        {
                            //
                        },
                        fileloaded: function(event, file, previewId, index, reader)
                        {
                            //
                        },
                        filecleared: function(event)
                        {
                            //
                        },
                        filereset: function(event)
                        {
                            //
                        },
                        fileuploaded: function(event, data, previewId, index)
                        {
                            //
                        },
                        filebatchuploadsuccess: function(event, data, previewId, index)
                        {
                            //
                        },
                        fileuploaderror: function(event, data, msg) {
                            //
                        },
                        filedisabled: function(event) {
                            var id = $(this).prop('id');
                            LMCFileinputs['#' + id]['isEnable'] = false;
                        },
                        fileenabled: function(event) {
                            var id = $(this).prop('id');
                            LMCFileinputs['#' + id]['isEnable'] = true;
                        }
                    };
                }

            };

            ;var theLMCJcrop;
            var LMCJcrop = {

                /**
                 * jcrop elementsSrc
                 * @var object
                 */
                elementsSrc: {
                    jcropWrapperSrc: '#jcrop-preview',
                    imgJcropSrc: '#img-jcrop',
                    imgJcropPreviewSrc: '#img-jcrop-preview',
                    imgJcropPreviewPaneWrapperSrc: '#preview-pane-wrapper',
                    imgJcropPreviewPaneSrc: '#preview-pane',
                    imgJcropPreviewContainerSrc: '#preview-pane .preview-container',
                    imgCropCancelBtnSrc: '#image-crop-cancel'
                },

                /**
                 * jcrop jquery elements
                 */
                jcropWrapper: null,
                imgJcrop: null,
                imgJcropPreview: null,
                imgJcropPreviewPaneWrapper: null,
                imgJcropPreviewPane: null,
                imgJcropPreviewContainer: null,
                imgCropCancelBtn: null,

                /**
                 * jcrop options
                 * @var object
                 */
                options: {},

                /**
                 * jcrop jquery elements
                 */
                element: null,

                /**
                 * original image
                 * @var Image
                 */
                originalImage: null,

                /**
                 * jquery crop api
                 * @var jcrop
                 */
                api: null,

                /**
                 * jcrop preview sizes
                 */
                xsize: 0,
                ysize: 0,

                /**
                 * jquery preview bound sizes
                 */
                boundx: 0,
                boundy: 0,

                /**
                 * jcrop init function
                 * @param options
                 */
                init: function(options)
                {
                    // if element is not setup; setup it
                    if ( ! theLMCJcrop) {
                        this.setupElements();
                    }

                    // if api is not null; destroy it
                    if(this.api){
                        this.api.destroy();
                    }

                    // default settings
                    this.options = $.extend(true, this.getDefaultOptions(), options);

                    // jquery crop jquery elements
                    this.element = $(this.options.src);
                    this.element.Jcrop(this.options.jcrop, function()
                    {
                        var bounds = this.getBounds();
                        theLMCJcrop.boundx = bounds[0];
                        theLMCJcrop.boundy = bounds[1];
                        theLMCJcrop.imgJcropPreviewPane.appendTo(this.ui.holder);

                        theLMCJcrop.api = this;
                    });
                },

                /**
                 * jquery elements setup
                 */
                setupElements: function()
                {
                    // Jcrop object
                    theLMCJcrop = this;

                    // set elements
                    this.jcropWrapper= $(this.elementsSrc.jcropWrapperSrc);
                    this.imgJcrop= $(this.elementsSrc.imgJcropSrc);
                    this.imgJcropPreview= $(this.elementsSrc.imgJcropPreviewSrc);
                    this.imgJcropPreviewPaneWrapper= $(this.elementsSrc.imgJcropPreviewPaneWrapperSrc);
                    this.imgJcropPreviewPane= $(this.elementsSrc.imgJcropPreviewPaneSrc);
                    this.imgJcropPreviewContainer= $(this.elementsSrc.imgJcropPreviewContainerSrc);
                    this.imgCropCancelBtn= $(this.elementsSrc.imgCropCancelBtnSrc);

                    // set preview sizes
                    this.xsize = this.imgJcropPreviewContainer.width();
                    this.ysize = this.imgJcropPreviewContainer.height();
                },

                /**
                 * set original image with src
                 * @param src
                 */
                setOriginalImage: function(src)
                {
                    this.originalImage = new Image();
                    this.originalImage.src = src;
                },

                /**
                 * jquery crop init function
                 *
                 * @param src
                 * @return LMCJcrop
                 */
                jcropPreInit: function(src)
                {
                    this.setOriginalImage(src);
                    this.imgJcrop.prop('src', src);
                    this.imgJcropPreview.prop('src', src);
                    this.jcropWrapper.removeClass('hidden');
                    return this;
                },

                /**
                 * jquery crop reset function
                 *
                 */
                jcropReset: function()
                {
                    this.jcropWrapper.addClass('hidden');
                    this.imgJcrop.prop('src', '').css({width: "", height: ""});
                    this.imgJcropPreview.prop('src', '');
                    this.resetFormElements();
                    if  (this.api) {
                        this.imgJcropPreviewPane.appendTo(this.imgJcropPreviewPaneWrapper);
                        this.api.ui.holder.remove();
                        this.release();
                        this.api.destroy();
                    }
                },

                /**
                 * set hidden form elements
                 *
                 * @param coordinates
                 */
                setFormElements: function(coordinates)
                {
                    $('#x').val(coordinates.x1);
                    $('#y').val(coordinates.y1);
                    $('#width').val(coordinates.width);
                    $('#height').val(coordinates.height);
                },

                /**
                 * reset hidden form elements
                 */
                resetFormElements: function()
                {
                    $('#x').val('');
                    $('#y').val('');
                    $('#width').val('');
                    $('#height').val('');
                },

                /**
                 * jcrop deselect
                 */
                release: function()
                {
                    this.api.animateTo([0,0,0,0], function()
                    {
                        theLMCJcrop.api.release();
                    });
                },

                /**
                 * get crop size preview image according to the original picture
                 *
                 * @param coordinates
                 * @param destination
                 * @param source
                 * @param forPreview
                 */
                getCropSize: function(coordinates, destination, source, forPreview)
                {
                    if ( ! forPreview) {
                        destination = {
                            width: this.originalImage.width,
                            height: this.originalImage.height
                        };
                    }
                    var rx = forPreview ? destination.width / coordinates.w : destination.width / source.width;
                    var ry = forPreview ? destination.height / coordinates.h : destination.height / source.height;

                    return {
                        width: Math.round(forPreview ? rx * source.width : rx * coordinates.w),
                        height: Math.round(forPreview ? ry * source.height : ry * coordinates.h),
                        x1: Math.round(rx * coordinates.x),
                        y1: Math.round(ry * coordinates.y),
                        x2: Math.round(rx * coordinates.x2),
                        y2: Math.round(ry * coordinates.y2)
                    };
                },


                /**
                 * get default options
                 */
                getDefaultOptions: function()
                {
                    return {
                        src: theLMCJcrop.elementsSrc.imgJcropSrc,
                        jcrop: {
                            bgFade: true,
                            bgOpacity: .2,
                            bgColor: 'white',
                            aspectRatio: theLMCJcrop.xsize / theLMCJcrop.ysize,
                            onChange: function(coords)
                            {
                                if (parseInt(coords.w) > 0)
                                {
                                    var recoords = theLMCJcrop.getCropSize(
                                            coords,
                                            {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                                            {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                                            true
                                    );

                                    theLMCJcrop.imgJcropPreview.css({
                                        width: recoords.width + 'px',
                                        height: recoords.height + 'px',
                                        marginLeft: '-' + recoords.x1 + 'px',
                                        marginTop: '-' + recoords.y1 + 'px'
                                    });
                                    LMCJcrop.setFormElements(theLMCJcrop.getCropSize(
                                            coords,
                                            {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                                            {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                                            false
                                    ));
                                }
                            },
                            onSelect: function(coords)
                            {
                                LMCJcrop.setFormElements(theLMCJcrop.getCropSize(
                                        coords,
                                        {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                                        {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                                        false
                                ));
                            }
                        }
                    };
                }

            };

            // LMCFileinput app is init
            LMCFileinput.init({
                src: '#photo',
                formSrc:  'form.form',
                fileinput: {
                    maxFileCount: maxFile,
                    maxFileSize: maxSize,
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    }
                }
            });
        });
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-product-module.icons.product') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                {!! getOps($product, 'edit', true) !!}
            </div>
            @endif
            {{-- /Actions --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.overview') !!}
                    </a>
                </li>
                <li id="seo_tab">
                    <a href="#seo" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.seo') !!}
                    </a>
                </li>
                <li id="showcase_tab">
                    <a href="#showcase" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.showcase') !!}
                    </a>
                </li>
            </ul>
            {{-- /Nav Tabs --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            <?php
                $form = [
                    'method'=> $operation === 'edit' ? 'PATCH' : 'POST',
                    'url'   => route('admin.product.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $product->id : null
                    ]),
                    'class' => 'form',
                    'files' => true
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">

                        @include('laravel-modules-core::product.partials.form')

                        {{-- Product Detail --}}
                        <div class="panel-group accordion margin-top-40" id="product_accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed"
                                           data-toggle="collapse"
                                           data-parent="#product_accordion"
                                           href="#detail_accordion"
                                        > {!! lmcTrans('laravel-product-module/admin.fields.product.product_detail') !!} </a>
                                    </h4>
                                </div>
                                <div id="detail_accordion" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @include('laravel-modules-core::product.partials.detail_form')
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /Product Detail --}}

                    </div>
                    <div class="tab-pane" id="seo">
                        @include('laravel-modules-core::product.partials.seo_form')
                    </div>
                    <div class="tab-pane" id="showcase">
                        @include('laravel-modules-core::product.partials.showcase_form')
                    </div>
                </div>
                {{-- /Tab Contents --}}

            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
