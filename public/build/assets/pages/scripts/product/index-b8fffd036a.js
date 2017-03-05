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

        // remove photo
        $(DataTable.tableOptions.src + ' tbody').on('click', 'a.remove-element', function()
        {
            var el = $(this);
            LMCApp.removeElement({
                element: el,
                removeElement: {
                    src: '.element-wrapper'
                },
                ajax: {
                    url: removePhotoURL.replace('###id###',el.data('parent-id')),
                    data: {id: el.data('element-id')}
                }
            });
        });

        // set main photo
        $(DataTable.tableOptions.src + ' tbody').on('click', 'a.set-main-photo', function () {
            var el = $(this);
            $.ajax({
                url: setMainPhotoURL.replace('###id###',el.data('parent-id')),
                data: {id: el.data('element-id')},
                success: function (data)
                {
                    if (data.result !== 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.update_error.message,
                            title: LMCApp.lang.admin.flash.update_error.title,
                            type: 'error'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.update_success.message,
                        title: LMCApp.lang.admin.flash.update_success.title,
                        type: 'success'
                    });

                    var ribbon = el.closest('div.row').find('.ribbon');
                    var oldMain = ribbon.next().find('a.remove-element');
                    var elementId = oldMain.data('element-id');
                    var parentId = oldMain.data('parent-id');
                    ribbon.prependTo(el.closest('.mt-element-overlay'));
                    oldMain.closest('ul.mt-info').append('<li></li>');
                    el.data('element-id', elementId).attr('data-element-id', elementId)
                        .data('parent-id',parentId).attr('data-parent-id',parentId)
                        .appendTo(oldMain.closest('ul.mt-info').find('li').last());
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
                exportTitle: 'Ürünler',
                datatableIsResponsive: true,
                groupActionSupport: true,
                rowDetailSupport: true,
                datatableFilterSupport: true,
                exportColumnSize: 9,
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
                    detail = '<table class="table table-hover table-light">' +
                        '<tbody>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Kategori:</strong> </td>' +
                            '<td class="text-left">';

                    var categoryLength = data.category.length;
                    var i = 1;
                    $.each(data.category, function(key,value)
                    {
                        detail += '<span';
                        detail += i < categoryLength ? ' class="text-muted"' : ' class="text-info"';
                        detail += '> ' + value.name + ' </span>';
                        if (i < categoryLength) {
                            detail += '<span class="text-muted">/</span>'
                        }
                        i++;
                    });

                    detail += '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Marka:</strong> </td>' +
                            '<td class="text-left">' + ( data.brand == null ? '' : data.brand.name ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Ad:</strong> </td>' +
                            '<td class="text-left">' + ( data.name == null ? '' : data.name ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Fiyat:</strong> </td>' +
                            '<td class="text-left">' + ( data.amount == null ? '' : data.amount ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Kod:</strong> </td>' +
                            '<td class="text-left">' + ( data.code == null ? '' : data.code ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Kısa Açıklama:</strong> </td>' +
                            '<td class="text-left">' + ( data.short_description == null ? '' : data.short_description ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Açıklama:</strong> </td>' +
                            '<td class="text-left">' + ( data.description == null ? '' : data.description ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>SEO Başlık:</strong> </td>' +
                            '<td class="text-left">' + ( data.meta_title == null ? '' : data.meta_title ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>SEO Açıklama:</strong> </td>' +
                            '<td class="text-left">' + ( data.meta_description == null ? '' : data.meta_description ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>SEO Anahtar Kelimeler:</strong> </td>' +
                            '<td class="text-left">' + ( data.meta_keywords == null ? '' : data.meta_keywords ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Vitrinler:</strong> </td>' +
                            '<td class="text-left">';

                    if (data.showcases.length > 0) {
                        detail += '<ul class="list-unstyled">';

                        $.each(data.showcases, function(key,value)
                        {
                            detail += '<li>' + value.name + '</li>';
                        });

                        detail += '</ul>';
                    }

                    detail += '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Oluşturma Tarihi:</strong> </td>' +
                            '<td class="text-left">' + data.created_at.display + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td>' +
                            '<td class="text-left">' + data.updated_at.display + '</td>' +
                        '</tr>';

                    if (data.photos != null) {
                        detail += '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Fotoğraf:</strong> </td>' +
                            '<td class="text-left">' +
                                '<div class="row">';
                        $.each(data.photos, function(key,value)
                        {
                            detail += '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin-bottom-5 element-wrapper  mt-element-ribbon photo-ribbon">' +
                                '<div class="mt-element-overlay">';

                            if (value.id == data.photo_id) {
                                detail += '<div class="ribbon ribbon-left ribbon-vertical-left ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase tooltips" data-container="body" data-original-title="Ana Fotoğraf">' +
                                        '<div class="ribbon-sub ribbon-bookmark"></div>' +
                                        '<i class="fa fa-star"></i>' +
                                    '</div>';
                            }

                            detail += '<div class="mt-overlay-2 mt-overlay-2-icons">' +
                                        '<img src="' + value.photo +'">' +
                                        '<div class="mt-overlay">' +
                                            '<ul class="mt-info">' +
                                                '<li>' +
                                                    '<a href="javascript:;" class="btn red btn-outline remove-element tooltips" data-element-id="' + value.id + '" data-parent-id="' + data.id + '" data-container="body" data-original-title="' + LMCApp.lang.admin.ops.destroy + '"> ' +
                                                        '<i class="fa fa-trash"></i>' +
                                                    '</a>' +
                                                '</li>';

                            if (value.id != data.photo_id) {
                                detail += '<li>' +
                                        '<a href="javascript:;" class="btn blue btn-outline set-main-photo tooltips" data-element-id="' + value.id + '" data-parent-id="' + data.id + '" data-container="body" data-original-title="' + LMCApp.lang.admin.ops.set_main_photo + '"> ' +
                                            '<i class="fa fa-share"></i>' +
                                        '</a>' +
                                    '</li>';
                            }

                            detail += '</ul>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '</div>';
                        });
                        detail += '</div>' +
                            '</td>' +
                            '</tr>';
                    }


                    return detail + '</tbody>' +
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
                        // mainPhoto
                        {
                            data: "main_photo", name: "main_photo",
                            searchable: false, orderable: false, className: 'text-center',
                            render: function ( data, type, full, meta )
                            {
                                if (data != null ) {
                                    return '<img src="' + data + '" width="100">';
                                }
                                return '';
                            }
                        },
                        // name
                        { data: "name", name: "name" },
                        // code
                        { data: "code", name: "code", className: 'text-center' },
                        // categories
                        {
                            data: "category", name: "category_id",
                            render: function ( data, type, full, meta )
                            {
                                var categories = '';
                                var categoryLength = data.length;
                                var i = 1;
                                $.each(data, function(key,value)
                                {
                                    categories += '<a href="' + categoryURL.replace("###id###", value.id) + '"';
                                    if (i < categoryLength) {
                                        categories += ' class="text-muted"';
                                    }
                                    categories += '>' + value.name + '</a>';
                                    if (i < categoryLength) {
                                        categories += '<span class="text-muted">/</span>'
                                    }
                                    i++;
                                });
                                return categories;
                            }
                        },
                        // brand
                        {
                            data: "brand", name: "brand_id",
                            render: function ( data, type, full, meta )
                            {
                                if (data != null ) {
                                    return '<a href="' + brandURL.replace("###id###", data.id) + '"> ' + data.name + ' </a>';
                                }
                                return '';
                            }
                        },
                        // amount
                        { data: "amount", name: "amount", className: 'text-center' },
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
                                            title: '<i class="fa fa-clone"></i> ' + LMCApp.lang.admin.ops.copy,
                                            attributes: {
                                                href: full.urls.copy_page
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
                    var fileWrapper = $('#file-upload-management');
                    if (Editor.actionType === 'fast-edit') {
                        LMCFileinput.disable(element);
                        elfinder.prop('disabled', true);
                        fileWrapper.hide();
                    } else {
                        LMCFileinput.enable(element);
                        elfinder.prop('disabled', false);
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

                                var showcase_elem = $('.icheck');
                                var showcase_id = {
                                    "1": {
                                        type: showcase_elem.iCheck('update')[0].checked ? 'random' : ''
                                    },
                                    "2": {
                                        type: showcase_elem.iCheck('update')[1].checked ? 'random' : ''
                                    }
                                };

                                var url, type, message_success, title_success, message_error, title_error, datas = {
                                    category_id: validation.form.find('select[name="category_id"]').val(),
                                    brand_id: validation.form.find('select[name="brand_id"]').val(),
                                    name: validation.form.find('input[name="name"]').val(),
                                    amount: validation.form.find('input[name="amount"]').val(),
                                    code: validation.form.find('input[name="code"]').val(),
                                    showcase_id: showcase_id,
                                    short_description: tinyMCE.activeEditor.getContent(),
                                    meta_title: validation.form.find('input[name="meta_title"]').val(),
                                    meta_description: validation.form.find('textarea[name="meta_description"]').val(),
                                    meta_keywords: validation.form.find('input[name="meta_keywords"]').val(),
                                    is_publish: validation.form.find('input[name="is_publish"]').bootstrapSwitch('state')
                                };
                                if (Editor.actionType === 'fast-add') {
                                    type = 'POST';
                                    url = apiStoreURL;
                                    message_success = LMCApp.lang.admin.flash.store_success.message;
                                    title_success = LMCApp.lang.admin.flash.store_success.title;
                                    message_error = LMCApp.lang.admin.flash.store_error.message;
                                    title_error = LMCApp.lang.admin.flash.store_error.title;
                                    datas.photo = $('#elfinder-photo').val();
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
                        var showcase_elem = $('.icheck');
                        var showcase_id = {
                            "1": {
                                type: showcase_elem.iCheck('update')[0].checked ? 'random' : ''
                            },
                            "2": {
                                type: showcase_elem.iCheck('update')[1].checked ? 'random' : ''
                            }
                        };

                        return {
                            category_id: form.find('select[name="category_id"]').val(),
                            brand_id: form.find('select[name="brand_id"]').val(),
                            name: form.find('input[name="name"]').val(),
                            amount: form.find('input[name="amount"]').val(),
                            code: form.find('input[name="code"]').val(),
                            showcase_id: JSON.stringify(showcase_id),
                            short_description: tinyMCE.activeEditor.getContent(),
                            meta_title: form.find('input[name="meta_title"]').val(),
                            meta_description: form.find('textarea[name="meta_description"]').val(),
                            meta_keywords: form.find('input[name="meta_keywords"]').val(),
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
            }
        }
    }

};
