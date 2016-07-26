;var RoleIndex;
var Index = {

    init: function () {
        LMCApp.initDatepicker();
        this.handleDatatable();
        RoleIndex = this;
    },

    handleDatatable: function()
    {
        DataTable.init({
            src: ".lmcDataTable",
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
                LMCApp.getNoty({
                    message: LMCApp.lang.admin.flash.destroy_self.message,
                    title: LMCApp.lang.admin.flash.destroy_self.title,
                    type: 'error'
                });
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
                            '<td style="width:150px; text-align:right;"> <strong>Rol Adı:</strong> </td>' +
                            '<td class="text-left">' + data.name + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Tanımlama:</strong> </td>' +
                            '<td class="text-left">' + data.slug + '</td>' +
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
                columns: [2,3,4,5]
            },
            dataTable: {
                columns: [
                    // checkable
                    {
                        data : "check_id", name: "check_id", searchable: false, orderable: false,
                        render: function ( data, type, full, meta )
                        {
                            return '<input type="checkbox" name="id[]" value="'+data+'">';
                        }
                    },
                    // child row button
                    { className: 'control', searchable: false, orderable: false, data: null, defaultContent: '' },
                    // id
                    { data: "id", name: "id", className: 'text-center' },
                    // name
                    { data: "name", name: "name" },
                    // status
                    { data: "slug", name: "slug" },
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
                                    }
                                ]
                            };
                            return theDataTable.getActionMenu(options);
                        }
                    }
                ],
                ajax: {
                    url: ajaxURL                  // ajax source url
                }
            }
        });

        Editor.init({
            modalShowCallback: function(Editor)
            {
                //
            },
            actionButtonCallback: function(Editor)
            {
                var url = Editor.actionType === 'fast-add' ? apiStoreURL : Editor.row.data().urls.edit ;
                // validation ve user form dosyaları yüklenir
                $script(formLoaderJs, 'formLoader');
                $script.ready(['formLoader','validation'], function()
                {
                    $script(formJs, 'form');
                });
                $script.ready('form', function()
                {
                    UserForm.init({
                        isAjax: true,
                        submitAjax: function(validation)
                        {
                            var datas = {
                                name: validation.form.find('input[name="name"]').val(),
                                slug: validation.form.find('input[name="slug"]').val()
                            };
                            if (Editor.actionType === 'fast-add') {
                                var type =  'POST';
                                var message_success = LMCApp.lang.admin.flash.store_success.message;
                                var title_success = LMCApp.lang.admin.flash.store_success.title;
                                var message_error = LMCApp.lang.admin.flash.store_error.message;
                                var title_error = LMCApp.lang.admin.flash.store_error.title;
                            } else {
                                var type =  'PATCH';
                                var message_success = LMCApp.lang.admin.flash.update_success.message;
                                var title_success = LMCApp.lang.admin.flash.update_success.title;
                                var message_error = LMCApp.lang.admin.flash.update_error.message;
                                var title_error = LMCApp.lang.admin.flash.update_error.title;
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
        });

    }

};
