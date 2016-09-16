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
                category_id: form.find('select[name="category_id[]"]').val() == null ? form.find('input[name="category_id[]"]').val() : form.find('select[name="category_id[]"]').val(),
                title: form.find('input[name="title"]').val(),
                description: form.find('textarea[name="description"]').val(),
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
                exportTitle: 'Medyalar',
                datatableIsResponsive: true,
                groupActionSupport: true,
                rowDetailSupport: true,
                datatableFilterSupport: true,
                exportColumnSize: 6,
                exportOptionsFormat: {
                    body: function (data, column, row) {
                        if (column === 1) {
                            return data;
                        }
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
                onGroupBeforeAjax: function(ajaxParams)
                {
                    var actionType = ajaxParams.action;
                    if (actionType !== 'create_album') {
                        return true;
                    }
                    var ids = ajaxParams.id.join(',');
                    var url = categoryCreateUrl + '&media_ids=' + ids;
                    console.log(ids);
                    console.log(url);
                    window.location.href = url;
                    return false;
                },

                /**
                 * get detail child row table format
                 * @param data
                 */
                getDetailTableFormat: function(data)
                {
                    var detail =  '<table class="table table-hover table-light">' +
                        '<tbody>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Albümler:</strong> </td>' +
                            '<td class="text-left">';

                    var cats = '';
                    $.each(data.categories,function(index, item)
                    {
                        cats += item.name + ', '
                    });
                    cats = cats.substring(0, cats.length - 2);
                    detail += cats;

                    detail += '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Başlık:</strong> </td>' +
                            '<td class="text-left">' + ( data.title == null ? '' : data.title ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Açıklama:</strong> </td>' +
                            '<td class="text-left">' + ( data.description == null ? '' : data.description ) + '</td>' +
                        '</tr>';

                    // fotoğrafsa eklenir
                    if (data.photo.photo != '') {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Fotoğraf:</strong> </td>' +
                            '<td class="text-left">' +
                                '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">' +
                                    '<div class="mt-element-overlay">' +
                                        '<div class="mt-overlay-2">' +
                                            '<img src="' + data.photo.photo +'">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                        '</tr>';
                    }

                    // videoysa eklenir
                    if (data.video.video != '') {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Video:</strong> </td>' +
                            '<td class="text-left">' +
                                '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">' +
                                    '<div class="embed-responsive embed-responsive-16by9">' +
                                        '<iframe class="embed-responsive-item" src="' + data.video.video + '"></iframe>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
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
                        // media
                        { data: "media", name: "media", searchable: false, orderable: false, className: 'text-center'},
                        // title
                        { data: "title", name: "title" },
                        // categories
                        {
                            data: "categories", name: "categories", orderable: false,
                            render: function ( data, type, full, meta )
                            {
                                var cats = '';
                                $.each(data, function(index,item)
                                {
                                    cats += '<a href="' + categoryURL.replace("###id###", item.id) + '"> ' + item.name + ' </a>, ';
                                });
                                cats = cats.substring(0, cats.length - 2);
                                return cats;
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
                    var element = $('#photo');
                    var elfinder = $('#elfinder-photo');
                    var video = $('#video');
                    var wrapper = $('#media_accordion');
                    var fileWrapper = $('#file-upload-management');
                    if (Editor.actionType === 'fast-edit') {
                        LMCFileinput.disable(element);
                        elfinder.prop('disabled', true);
                        video.prop('disabled', true);
                        wrapper.hide();
                        fileWrapper.hide();
                    } else {
                        LMCFileinput.enable(element);
                        elfinder.prop('disabled', false);
                        video.prop('disabled', false);
                        wrapper.show();
                        fileWrapper.show();
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
                                var element = $('#photo');
                                var isEnable = LMCFileinputs['#photo']['isEnable'];
                                if (element.length && Editor.actionType === 'fast-add' && isEnable) {
                                    element.fileinput('upload');
                                    return;
                                }

                                var url, type, message_success, title_success, message_error, title_error, datas = {
                                    category_id: validation.form.find('select[name="category_id[]"]').val() == null ? validation.form.find('input[name="category_id[]"]').val() : validation.form.find('select[name="category_id[]"]').val(),
                                    title: validation.form.find('input[name="title"]').val(),
                                    description: validation.form.find('textarea[name="description"]').val(),
                                    is_publish: validation.form.find('input[name="is_publish"]').bootstrapSwitch('state')
                                };
                                var video = $('#video');

                                if (Editor.actionType === 'fast-add') {
                                    type = 'POST';
                                    url = apiStoreURL;
                                    message_success = LMCApp.lang.admin.flash.store_success.message;
                                    title_success = LMCApp.lang.admin.flash.store_success.title;
                                    message_error = LMCApp.lang.admin.flash.store_error.message;
                                    title_error = LMCApp.lang.admin.flash.store_error.title;
                                    // duruma göre video veya elfinder eklenir
                                    if (video.prop('disabled')) {
                                        datas.photo = $('#elfinder-photo').val();
                                    } else {
                                        datas.video = video.val();
                                    }
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
                src: '#photo',
                fileinput: ModelIndex.fileinputOptions
            }
        }
    }

};
