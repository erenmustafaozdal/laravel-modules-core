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
                    {
                        data : "check_id", name: "check_id", searchable: false, orderable: false,
                        render: function ( data, type, full, meta )
                        {
                            return '<input type="checkbox" name="id[]" value="'+data+'">';
                        }
                    },
                    { className: 'control', searchable: false, orderable: false, data: null, defaultContent: '' },
                    { data: "id", name: "id", className: 'text-center' },
                    { data: "photo", name: "photo", searchable: false, orderable: false, className: 'text-center',
                        render: function ( data, type, full, meta )
                        {
                            return '<img src="'+data+'" width="35" class="img-circle">';
                        }
                    },
                    { data: "first_name", name: "fullname"},
                    { data: "status", name: "is_active", className: 'text-center',
                        render: function ( data, type, full, meta )
                        {
                            if (data) {
                                return '<span class="label label-success"> Aktif </span>';
                            }
                            return '<span class="label label-danger"> Aktif Değil </span>';
                        }
                    },
                    { data: { _: 'created_at.display', sort: 'created_at.timestamp' }, name: "created_at", className: 'text-center'},
                    {
                        data: "action", name: "action", searchable: false, orderable: false, className: 'text-center',
                        render: function ( data, type, full, meta )
                        {
                            return 'action';
                        }
                    }
                ],
                ajax: {
                    url: ajaxURL                  // ajax source url
                }
            }
        });

        Editor.init({

        });
    }

};
