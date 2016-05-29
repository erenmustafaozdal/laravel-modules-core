var Index = {

    init: function () {
        LMCApp.initDatepicker();
        this.handleDatatable();
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

            /**
             * get detail child row table format
             * @param data
             */
            getDetailTableFormat: function(data)
            {
                return '<table class="table table-hover table-light">' +
                    '<tbody>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>E-posta:</strong> </td>' +
                            '<td class="text-left">' + data.email + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Son Giriş:</strong> </td>' +
                            '<td class="text-left">' + data.last_login.display + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td>' +
                            '<td class="text-left">' + data.updated_at.display + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td style="width:150px; text-align:right;"> <strong>Roller:</strong> </td>' +
                            '<td class="text-left">' + data.roles + '</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>';
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
                    // photo
                    { data: "photo", name: "photo", searchable: false, orderable: false, className: 'text-center',
                        render: function ( data, type, full, meta )
                        {
                            return '<img src="'+data+'" width="35" class="img-circle">';
                        }
                    },
                    // fullname
                    { data: "fullname", name: "first_name"},
                    // status
                    { data: "status", name: "is_active", className: 'text-center',
                        render: function ( data, type, full, meta )
                        {
                            if (data) {
                                return '<span class="label label-success"> Aktif </span>';
                            }
                            return '<span class="label label-danger"> Aktif Değil </span>';
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
                                title: full.status ? '<i class="fa fa-times"></i> ' + LMCApp.lang.admin.ops.not_activate : '<i class="fa fa-check"></i> ' + LMCApp.lang.admin.ops.activate,
                                attributes: {
                                    href: 'javascript:;',
                                    class: full.status ? 'fast-not-activate' : 'fast-activate'
                                }
                            });
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
                if (Editor.actionType === 'fast-edit') {
                    $(Editor.editorOptions.formSrc).find('input[name="email"]').attr('disabled','disabled');
                }
            },
            actionButtonCallback: function(Editor)
            {
                var url = Editor.actionType === 'fast-add' ? apiStoreURL : Editor.row.data().urls.edit ;
                // validation ve user form dosyaları yüklenir
                $script(userFormLoaderJs, 'formLoader');
                $script.ready(['formLoader','validation'], function()
                {
                    $script(userFormJs, 'user_form');
                });
                $script.ready('user_form', function()
                {
                    UserForm.init({
                        isAjax: true,
                        submitAjax: function(validation)
                        {
                            var datas = {
                                first_name: validation.form.find('input[name="first_name"]').val(),
                                last_name: validation.form.find('input[name="last_name"]').val(),
                                email: validation.form.find('input[name="email"]').val(),
                                password: validation.form.find('input[name="password"]').val(),
                                password_confirmation: validation.form.find('input[name="password_confirmation"]').val(),
                                is_active: $('#is_active').bootstrapSwitch('state')
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
                    if (Editor.actionType === 'fast-add') {
                        Validation.addElementRule('password', { required: true });
                        Validation.addElementRule('password_confirmation', { required: true });
                    } else {
                        Validation.removeElementRule('password', 'required');
                        Validation.removeElementRule('password_confirmation', 'required');
                    }
                    // form is submit
                    $(Editor.editorOptions.formSrc).submit();
                });
            }
        });

    }

};
