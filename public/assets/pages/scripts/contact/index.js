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
                exportTitle: 'Şubeler',
                datatableIsResponsive: true,
                groupActionSupport: true,
                rowDetailSupport: true,
                datatableFilterSupport: true,
                exportColumnSize: 5,
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
                    return '<table class="table table-hover table-light">' +
                        '<tbody>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Ad:</strong> </td>' +
                            '<td class="text-left">' + ( data.name == null ? '' : data.name ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Adres:</strong> </td>' +
                            '<td class="text-left">' + ( data.address == null ? '' : data.address ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Sabit Telefon:</strong> </td>' +
                            '<td class="text-left">' + ( data.land_phone == null ? '' : data.land_phone ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Cep Telefonu:</strong> </td>' +
                            '<td class="text-left">' + ( data.mobile_phone == null ? '' : data.mobile_phone ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>İnternet Adresi:</strong> </td>' +
                            '<td class="text-left">' + ( data.url == null ? '' : data.url ) + '</td>' +
                        '</tr>' +
                        '<tr>' +
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
                        // map
                        { data: "map", name: "map", searchable: false, orderable: false, className: 'text-center'},
                        // name
                        { data: "name", name: "name" },
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
                                var url, type, message_success, title_success, message_error, title_error, datas = {
                                    name: validation.form.find('input[name="name"]').val(),
                                    province_id: validation.form.find('select[name="province_id"]').val(),
                                    county_id: validation.form.find('select[name="county_id"]').val(),
                                    district_id: validation.form.find('select[name="district_id"]').val(),
                                    neighborhood_id: validation.form.find('select[name="neighborhood_id"]').val(),
                                    postal_code_id: validation.form.find('select[name="postal_code_id"]').val(),
                                    is_publish: validation.form.find('input[name="is_publish"]').bootstrapSwitch('state')
                                };
                                if (Editor.actionType === 'fast-add') {
                                    type = 'POST';
                                    url = apiStoreURL;
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
            }
        }
    }

};
