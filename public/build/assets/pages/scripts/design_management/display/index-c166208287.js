;var ModelIndex;
var Index = {

    /**
     * options
     */
    options : {},

    /**
     * init function
     * @param options"
     */
    init: function (options)
    {
        ModelIndex = this;
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // eğer filtreleme destekleniyorsa tarih seçiciyi çalıştır
        if (this.options.DataTable.datatableFilterSupport) {
            LMCApp.initDatepicker();
        }

        DataTable.init(this.options.DataTable);
        Editor.init(this.options.Editor);

        // LMCFileinput app is init
        LMCFileinput.init(this.options.Fileinput);
        LMCFileinput.init(this.options.mainPhotoFileinput);
        LMCFileinput.init(this.options.firstMiniFileinput);
        LMCFileinput.init(this.options.secondMiniFileinput);
        LMCFileinput.init(this.options.thirdMiniFileinput);

        $('.color-picker').minicolors({
            control: 'hue',
            letterCase: 'lowercase',
            position: 'bottom right',
            theme: 'bootstrap'
        });

        // publish model
        $(DataTable.tableOptions.src + ' tbody').on('click','tr td ul.dropdown-menu a.fast-publish',function()
        {
            var tr = $(this).closest('tr');
            var table = theDataTable.getDataTable();
            var row = table.row(tr);
            $.ajax({
                url: row.data().urls.publish,
                success: function(data)
                {
                    if (data.result === 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.publish_success.message,
                            title: LMCApp.lang.admin.flash.publish_success.title,
                            type: 'success'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.publish_error.message,
                        title: LMCApp.lang.admin.flash.publish_error.title,
                        type: 'error'
                    });
                }
            }).done(function( data ) {
                if ( data.result === 'success' ) {
                    LMCApp.hasTransaction = false;
                    table.draw();
                }
            });
        });

        // not publish model
        $(DataTable.tableOptions.src + ' tbody').on('click','tr td ul.dropdown-menu a.fast-not-publish',function()
        {
            var tr = $(this).closest('tr');
            var table = theDataTable.getDataTable();
            var row = table.row(tr);
            $.ajax({
                url: row.data().urls.not_publish,
                success: function(data)
                {
                    if (data.result === 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.not_publish_success.message,
                            title: LMCApp.lang.admin.flash.not_publish_success.title,
                            type: 'success'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.not_publish_error.message,
                        title: LMCApp.lang.admin.flash.not_publish_error.title,
                        type: 'error'
                    });
                }
            }).done(function( data ) {
                if ( data.result === 'success' ) {
                    LMCApp.hasTransaction = false;
                    table.draw();
                }
            });
        });
    },

    /**
     * get default options function
     */
    getDefaultOptions: function()
    {
        return {
            DataTable: {
                src: ".lmcDataTable",
                exportTitle: 'Slaytlar',
                datatableIsResponsive: true,
                groupActionSupport: true,
                rowDetailSupport: false,
                datatableFilterSupport: true,
                exportColumnSize: 3,
                exportOrientation: 'landscape',
                exportOptionsFormat: {
                    body: function (data, column, row) {
                        return LMCApp.stripTags(data);
                    }
                },
                isRelationTable: false,
                changeRelationTable: function()
                {
                    //
                },
                onSuccess: function(grid, response)
                {
                    // on success function
                },
                onError: function(grid)
                {
                    // on error function
                },
                onDataLoad: function(grid)
                {
                    // on data load function
                },
                onDeleteError: function(data)
                {
                    // on delete error function
                },

                /**
                 * get detail child row table format
                 * @param data
                 */
                getDetailTableFormat: function(data)
                {
                    //
                },

                /**
                 * export data table options for columns
                 */
                exportOptions: {
                    columns: []
                },

                dataTable: {
                    columns: [
                        // id
                        { data: "id", name: "id", className: 'text-center' },
                        // photo
                        {
                            data: "photo", name: "photo",
                            searchable: false, orderable: false, className: 'text-center',
                            render: function ( data, type, full, meta )
                            {
                                if (data != null ) {
                                    return '<img src="' + data + '" height="150">';
                                }
                                return '';
                            }
                        },
                        // status
                        { data: "status", name: "is_publish", className: 'text-center',
                            render: function ( data, type, full, meta )
                            {
                                if (data) {
                                    return '<span class="label label-success"> Yayında </span>';
                                }
                                return '<span class="label label-danger"> Yayında Değil </span>';
                            }
                        },
                        // created_at
                        { data: { _: 'created_at.display', sort: 'created_at.timestamp' }, name: "created_at", className: 'text-center'},
                        // action
                        {
                            data: "action", name: "action", searchable: false, orderable: false, className: 'text-center',
                            render: function ( data, type, full, meta )
                            {
                                var options = {
                                    id: full.id,
                                    showUrl: null,
                                    buttons: [
                                        {
                                            title: '<i class="fa fa-trash"></i> ' + LMCApp.lang.admin.ops.destroy,
                                            attributes: {
                                                href: 'javascript:;',
                                                class: 'fast-destroy'
                                            }
                                        },
                                        'divider'
                                    ]
                                };
                                options.buttons.push({
                                    title: full.status ? '<i class="fa fa-times"></i> ' + LMCApp.lang.admin.ops.not_publish : '<i class="fa fa-check"></i> ' + LMCApp.lang.admin.ops.publish,
                                    attributes: {
                                        href: 'javascript:;',
                                        class: full.status ? 'fast-not-publish' : 'fast-publish'
                                    }
                                });
                                return theDataTable.getActionMenu(options);
                            }
                        }
                    ],
                    ajax: {
                        url: ajaxURL
                    }
                }
            },
            Editor: {
                modalShowCallback: function(Editor)
                {
                    //
                },
                actionButtonCallback: function(Editor)
                {
                    // validation ve user form dosyaları yüklenir
                    $script(formLoaderJs, 'formLoader');
                    $script.ready(['formLoader','validation'], function()
                    {
                        $script(formJs, 'form');
                    });
                    $script.ready('form', function()
                    {
                        ModelForm.init({
                            isAjax: true,
                            submitAjax: function(validation)
                            {
                                var element = $('#photo');
                                var isEnable = LMCFileinputs['#photo']['isEnable'];
                                if (Editor.actionType === 'fast-add' && isEnable) {
                                    element.fileinput('upload');
                                    return;
                                }

                                $.ajax({
                                    url: apiStoreURL,
                                    data: {
                                        photo: validation.form.find('input.elfinder[name="photo"]').val(),
                                        is_publish: validation.form.find('input[name="is_publish"]').bootstrapSwitch('state')
                                    },
                                    type: 'POST',
                                    success: function(data)
                                    {
                                        if (data.result === 'success') {
                                            LMCApp.getNoty({
                                                message: LMCApp.lang.admin.flash.store_success.message,
                                                title: LMCApp.lang.admin.flash.store_success.title,
                                                type: 'success'
                                            });
                                            Editor.modal.modal('hide');
                                            return;
                                        }
                                        LMCApp.getNoty({
                                            message: LMCApp.lang.admin.flash.store_error.message,
                                            title: LMCApp.lang.admin.flash.update_error.title,
                                            type: 'error'
                                        });
                                    }
                                }).done(function( data ) {
                                    if ( data.result === 'success' ) {
                                        LMCApp.hasTransaction = false;
                                        DataTable.dataTable.ajax.reload();
                                    }
                                });
                            }
                        });
                        // form is submit
                        $(Editor.editorOptions.formSrc).submit();
                    });
                }
            },
            Fileinput: {
                src: '#photo',
                fileinput: {
                    uploadUrl: apiStoreURL,
                    allowedFileExtensions: validExtension.split(','),
                    allowedFileTypes: null,
                    previewFileType: 'any',
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    },
                    uploadExtraData: function (previewId, index) {
                        var form = $('.form');
                        return {
                            is_publish: form.find('input[name="is_publish"]').bootstrapSwitch('state'),
                            x: $("input[name='x[]']").map(function(){return $(this).val();}).get(),
                            y: $("input[name='y[]']").map(function(){return $(this).val();}).get(),
                            width: $("input[name='width[]']").map(function(){return $(this).val();}).get(),
                            height: $("input[name='height[]']").map(function(){return $(this).val();}).get()
                        };
                    },
                    ajaxSettings: {
                        success: function(data)
                        {
                            var message_success, title_success, message_error, title_error;
                            if (Editor.actionType === 'fast-add') {
                                message_success = LMCApp.lang.admin.flash.store_success.message;
                                title_success = LMCApp.lang.admin.flash.store_success.title;
                                message_error = LMCApp.lang.admin.flash.store_error.message;
                                title_error = LMCApp.lang.admin.flash.store_error.title;
                            } else {
                                message_success = LMCApp.lang.admin.flash.update_success.message;
                                title_success = LMCApp.lang.admin.flash.update_success.title;
                                message_error = LMCApp.lang.admin.flash.update_error.message;
                                title_error = LMCApp.lang.admin.flash.update_error.title;
                            }
                            if (data.result === 'success') {
                                LMCApp.getNoty({
                                    message: message_success,
                                    title: title_success,
                                    type: 'success'
                                });
                                Editor.modal.modal('hide');
                                LMCApp.hasTransaction = false;
                                DataTable.dataTable.ajax.reload();
                                return;
                            }
                            LMCApp.getNoty({
                                message: message_error,
                                title: title_error,
                                type: 'error'
                            });
                        }
                    }
                }
            },
            mainPhotoFileinput: {
                src: '#main-photo',
                formSrc:  'form.form-horizontal',
                aspectRatio: mainAspectRatio,
                fileinput: {
                    maxFileSize: maxSize,
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    },
                    previewTemplates: {
                        image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                        '   <div class="kv-file-content">' +
                        '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                        '   </div>\n' +
                        '   {footer}\n' +
                        '   <input type="hidden" class="crop-x" name="photo[x]" value="0">\n' +
                        '   <input type="hidden" class="crop-y" name="photo[y]" value="0">\n' +
                        '   <input type="hidden" class="crop-width" name="photo[width]" value="0">\n' +
                        '   <input type="hidden" class="crop-height" name="photo[height]" value="0">\n' +
                        '</div>\n'
                    }
                }
            },
            firstMiniFileinput: {
                src: '#first-mini-photo',
                formSrc:  'form.form-horizontal',
                aspectRatio: firstAspectRatio,
                fileinput: {
                    maxFileSize: maxSize,
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    },
                    previewTemplates: {
                        image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                        '   <div class="kv-file-content">' +
                        '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                        '   </div>\n' +
                        '   {footer}\n' +
                        '   <input type="hidden" class="crop-x" name="first_mini_photo[x]" value="0">\n' +
                        '   <input type="hidden" class="crop-y" name="first_mini_photo[y]" value="0">\n' +
                        '   <input type="hidden" class="crop-width" name="first_mini_photo[width]" value="0">\n' +
                        '   <input type="hidden" class="crop-height" name="first_mini_photo[height]" value="0">\n' +
                        '</div>\n'
                    }
                }
            },
            secondMiniFileinput: {
                src: '#second-mini-photo',
                formSrc:  'form.form-horizontal',
                aspectRatio: secondAspectRatio,
                fileinput: {
                    maxFileSize: maxSize,
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    },
                    previewTemplates: {
                        image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                        '   <div class="kv-file-content">' +
                        '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                        '   </div>\n' +
                        '   {footer}\n' +
                        '   <input type="hidden" class="crop-x" name="second_mini_photo[x]" value="0">\n' +
                        '   <input type="hidden" class="crop-y" name="second_mini_photo[y]" value="0">\n' +
                        '   <input type="hidden" class="crop-width" name="second_mini_photo[width]" value="0">\n' +
                        '   <input type="hidden" class="crop-height" name="second_mini_photo[height]" value="0">\n' +
                        '</div>\n'
                    }
                }
            },
            thirdMiniFileinput: {
                src: '#third-mini-photo',
                formSrc:  'form.form-horizontal',
                aspectRatio: thirdAspectRatio,
                fileinput: {
                    maxFileSize: maxSize,
                    showUpload: false,
                    showCancel: false,
                    fileActionSettings: {
                        showUpload: false
                    },
                    previewTemplates: {
                        image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                        '   <div class="kv-file-content">' +
                        '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                        '   </div>\n' +
                        '   {footer}\n' +
                        '   <input type="hidden" class="crop-x" name="third_mini_photo[x]" value="0">\n' +
                        '   <input type="hidden" class="crop-y" name="third_mini_photo[y]" value="0">\n' +
                        '   <input type="hidden" class="crop-width" name="third_mini_photo[width]" value="0">\n' +
                        '   <input type="hidden" class="crop-height" name="third_mini_photo[height]" value="0">\n' +
                        '</div>\n'
                    }
                }
            }
        }
    }

};
