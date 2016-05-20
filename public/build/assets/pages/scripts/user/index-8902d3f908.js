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
            dataTable: {
                rowCallback: function( row, data, index ) {
                    $('td:eq(1)', row).prop( "align", "center" );
                    $('td:eq(2)', row).prop( "align", "center" );
                    $('td:eq(6)', row).prop( "align", "center" );
                    $('td:eq(7)', row).prop( "align", "center" );
                    $('td:eq(8)', row).prop( "align", "center" );
                },
                columns: [
                    {
                        data : "check_id", name: "check_id", searchable: false, orderable: false,
                        render: function ( data, type, full, meta )
                        {
                            return '<input type="checkbox" name="id[]" value="'+data+'">';
                        }
                    },
                    { data: "id", name: "id"},
                    { data: "photo", name: "photo", searchable: false, orderable: false,
                        render: function ( data, type, full, meta )
                        {
                            return '<img src="'+data+'" width="35" class="img-circle">';
                        }
                    },
                    { data: "first_name", name: "first_name"},
                    { data: "last_name", name: "last_name"},
                    { data: "email", name: "email",
                        render: function ( data, type, full, meta )
                        {
                            return '<a href="mailto:'+data+'">'+data+'</a>';
                        }
                    },
                    { data: "status", name: "is_active",
                        render: function ( data, type, full, meta )
                        {
                            if (data) {
                                return '<span class="label label-success"> Aktif </span>';
                            }
                            return '<span class="label label-danger"> Aktif Değil </span>';
                        }
                    },
                    { data: {_: 'last_login.display', sort: 'last_login.timestamp' }, name: "last_login"},
                    { data: { _: 'created_at.display', sort: 'created_at.timestamp' }, name: "created_at"},
                    {
                        data: "action", name: "action", searchable: false, orderable: false,
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
    }

};