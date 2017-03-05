;var ModelIndex;
var Index = {

    /**
     * options
     */
    options : {},

    /**
     * file input options
     */
    fileinputOptions: {
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
                category_id: form.find('select[name="category_id"]').val(),
                title: form.find('input[name="title"]').val(),
                is_publish: form.find('input[name="is_publish"]').bootstrapSwitch('state')
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
    },

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

        // bootstrap touch spins init
        LMCApp.initTouchSpin({
            src:'#size_from',
            touchspin: {
                max: maxSize,
                step: 10,
                postfix: 'Bayt'
            }
        });
        LMCApp.initTouchSpin({
            src:'#size_to',
            touchspin: {
                max: maxSize,
                step: 10,
                postfix: 'Bayt'
            }
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
                exportTitle: 'Belgeler',
                datatableIsResponsive: true,
                groupActionSupport: true,
                rowDetailSupport: true,
                datatableFilterSupport: true,
                exportColumnSize: 7,
                exportOptionsFormat: {
                    body: function (data, column, row) {
                        return LMCApp.stripTags(data);
                    }
                },
                isRelationTable: false,
                changeRelationTable: function()
                {
                    theDataTable.tableOptions['exportColumnSize'] = 6;
                    theDataTable.tableOptions.dataTable.columns.splice(4, 1);
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
                    var detail =  '<table class="table table-hover table-light">' +
                        '<tbody>';
                    if( ! theDataTable.tableOptions.isRelationTable) {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Kategori:</strong> </td>' +
                            '<td class="text-left">' + ( data.category.name == null ? '' : data.category.name ) + '</td>' +
                            '</tr>';
                    }
                    detail += '<tr>' +
                        '<td style="width:150px; text-align:right;"> <strong>Başlık:</strong> </td>' +
                        '<td class="text-left">' + ( data.title == null ? '' : data.title ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="width:150px; text-align:right;"> <strong>Belge:</strong> </td>' +
                        '<td class="text-left">' + ( data.document == null ? '' : data.document ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="width:150px; text-align:right;"> <strong>Boyut:</strong> </td>' +
                        '<td class="text-left">' + ( data.size == null ? '' : data.size.display +' <span class="text-muted">(' + data.size.number + ' bayt)</span>' ) + '</td>' +
                        '</tr>';

                    if (data.category.has_description) {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Açıklama:</strong> </td>' +
                            '<td class="text-left">' + ( data.description == null ? '' : data.description.description ) + '</td>' +
                            '</tr>';
                    }

                    if (data.category.has_photo) {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Fotoğraf:</strong> </td>' +
                            '<td class="text-left">';
                        if (data.photo !== null && data.photo.photo !== '') {
                            detail += '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin-bottom-5">' +
                                '<div class="mt-element-overlay">' +
                                '<div class="mt-overlay-2">' +
                                '<img src="' + data.photo.photo +'">' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }
                        detail += '</td>' +
                            '</tr>';
                    }

                    return detail + '<tr>' +
                        '<td style="width:150px; text-align:right;"> <strong>Oluşturma Tarihi:</strong> </td>' +
                        '<td class="text-left">' + data.created_at.display + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td>' +
                        '<td class="text-left">' + data.updated_at.display + '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';
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
                        // title
                        { data: "title", name: "title" },
                        // document
                        { data: "document", name: "document" },
                        // size
                        { data: { _: 'size.display', sort: 'size.number' }, name: "size", className: 'text-center' },
                        // category
                        {
                            data: "category", name: "category",
                            render: function ( data, type, full, meta )
                            {
                                return '<a href="' + categoryURL.replace("###id###", data.id) + '"> ' + data.name + ' </a>';
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
                                    showUrl: full.urls.show,
                                    buttons: [
                                        {
                                            title: '<i class="fa fa-pencil"></i> ' + LMCApp.lang.admin.ops.fast_edit,
                                            attributes: {
                                                href: '#editor-modal',
                                                'data-toggle': 'modal',
                                                'data-action': 'fast-edit',
                                                'data-id': full.id
                                            }
                                        },
                                        {
                                            title: '<i class="fa fa-pencil"></i> ' + LMCApp.lang.admin.ops.edit,
                                            attributes: {
                                                href: full.urls.edit_page
                                            }
                                        },
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
                    var element = $('#document');
                    if (Editor.actionType === 'fast-edit') {
                        LMCFileinput.disable(element);
                    } else {
                        LMCFileinput.enable(element);
                    }
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
                                var element = $('#document');
                                var isEnable = LMCFileinputs['#document']['isEnable'];
                                if (Editor.actionType === 'fast-add' && isEnable) {
                                    element.fileinput('upload');
                                    return;
                                }

                                var url, type, message_success, title_success, message_error, title_error, datas = {
                                    category_id: validation.form.find('select[name="category_id"]').val(),
                                    title: validation.form.find('input[name="title"]').val(),
                                    is_publish: validation.form.find('input[name="is_publish"]').bootstrapSwitch('state')
                                };
                                if (Editor.actionType === 'fast-add') {
                                    type = 'POST';
                                    url = apiStoreURL;
                                    datas['document'] = validation.form.find('input.elfinder[name="document"]').val();
                                    message_success = LMCApp.lang.admin.flash.store_success.message;
                                    title_success = LMCApp.lang.admin.flash.store_success.title;
                                    message_error = LMCApp.lang.admin.flash.store_error.message;
                                    title_error = LMCApp.lang.admin.flash.store_error.title;
                                } else {
                                    type = 'PATCH';
                                    url = Editor.row.data().urls.edit;
                                    message_success = LMCApp.lang.admin.flash.update_success.message;
                                    title_success = LMCApp.lang.admin.flash.update_success.title;
                                    message_error = LMCApp.lang.admin.flash.update_error.message;
                                    title_error = LMCApp.lang.admin.flash.update_error.title;
                                }

                                $.ajax({
                                    url: url,
                                    data: datas,
                                    type: type,
                                    success: function(data)
                                    {
                                        if (data.result === 'success') {
                                            LMCApp.getNoty({
                                                message: message_success,
                                                title: title_success,
                                                type: 'success'
                                            });
                                            Editor.modal.modal('hide');
                                            return;
                                        }
                                        LMCApp.getNoty({
                                            message: message_error,
                                            title: title_error,
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
                src: '#document',
                fileinput: ModelIndex.fileinputOptions
            }
        }
    }

};
