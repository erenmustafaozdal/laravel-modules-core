;var theDataTable;
var DataTable = {

    /**
     * data table options
     * @var object
     */
    tableOptions: {},
    options: {},

    /**
     * table jquery object
     * @var null|jquery object
     */
    table: null,
    tableContainer: null,
    tableWrapper: null,

    /**
     * dataTable object
     * @var DataTable
     */
    dataTable: null,

    /**
     * is table initialized
     * @var boolean
     */
    tableInitialized: false,

    /**
     * ajax parameters
     * @var object
     */
    ajaxParams: {},

    /**
     * exporting index
     */
    exportIndex: 0,

    /**
     * init function
     * @param options
     */
    init: function(options)
    {
        if (!$().dataTable) {
            return;
        }

        // DataTable object
        theDataTable = this;

        // default settings
        theDataTable.options = options;
        theDataTable.tableOptions = $.extend(true, theDataTable.getDefaultOptions(), options);

        // create table's jquery object
        theDataTable.table = $(theDataTable.tableOptions.src);
        theDataTable.tableContainer = theDataTable.table.parents('.table-container');

        // apply the special class that used to restyle the default datatable
        var tmp = $.fn.dataTableExt.oStdClasses;

        $.fn.dataTableExt.oStdClasses.sWrapper = $.fn.dataTableExt.oStdClasses.sWrapper + " dataTables_extended_wrapper";
        $.fn.dataTableExt.oStdClasses.sFilterInput = "form-control input-xs input-sm input-inline";
        $.fn.dataTableExt.oStdClasses.sLengthSelect = "form-control input-xs input-sm input-inline";

        // ##### some relative changes
        // if relation table; make some changes on the table
        if (theDataTable.tableOptions.isRelationTable) {
            theDataTable.tableOptions.changeRelationTable();
        }
        // set columns
        theDataTable.setColumns();
        // set datatable dom pattern
        theDataTable.setTableDom();
        // set export options
        theDataTable.setExportOptions();
        // set data table default order
        theDataTable.setOrder();

        // initialize a datatable
        theDataTable.dataTable = theDataTable.table.DataTable(theDataTable.tableOptions.dataTable);

        // revert back to default
        $.fn.dataTableExt.oStdClasses.sWrapper = tmp.sWrapper;
        $.fn.dataTableExt.oStdClasses.sFilterInput = tmp.sFilterInput;
        $.fn.dataTableExt.oStdClasses.sLengthSelect = tmp.sLengthSelect;

        // get table wrapper
        theDataTable.tableWrapper = theDataTable.table.parents('.dataTables_wrapper');

        // build table group actions panel
        if (theDataTable.tableOptions.groupActionSupport && $('.table-actions-wrapper', theDataTable.tableContainer).size() === 1) {
            $('.table-group-actions', theDataTable.tableWrapper).html($('.table-actions-wrapper', theDataTable.tableContainer).html()); // place the panel inside the wrapper
            $('.table-actions-wrapper', theDataTable.tableContainer).remove(); // remove the template container
        }

        // handle group checkboxes check/uncheck
        if (theDataTable.tableOptions.groupActionSupport) {
            $('.group-checkable', theDataTable.table).change(function () {
                var set = theDataTable.table.find('tbody > tr > td:nth-child(1) input[type="checkbox"]');
                var checked = $(this).prop("checked");
                $(set).each(function () {
                    $(this).prop("checked", checked);
                });
                $.uniform.update(set);
                theDataTable.countSelectedRecords();
            });
        }


        // handle row's checkbox click
        if (theDataTable.tableOptions.groupActionSupport) {
            theDataTable.table.on('change', 'tbody > tr > td:nth-child(1) input[type="checkbox"]', function () {
                theDataTable.countSelectedRecords();
            });
        }

        // handle filter submit button click
        if (theDataTable.tableOptions.datatableFilterSupport) {
            theDataTable.table.on('click', '.filter-submit', function (e) {
                e.preventDefault();
                theDataTable.submitFilter();
            });
        }

        // handle filter cancel button click
        if (theDataTable.tableOptions.datatableFilterSupport) {
            theDataTable.table.on('click', '.filter-cancel', function (e) {
                e.preventDefault();
                theDataTable.resetFilter();
            });
        }

        // handle datatable custom tools
        $('#lmcDataTableTools > li > a.tool-action').on('click', function()
        {
            var action = $(this).attr('data-action');
            theDataTable.getDataTable().button(action).trigger();
        });

        // add event listener for opening and closing details
        if (theDataTable.tableOptions.rowDetailSupport) {
            $(theDataTable.tableOptions.src + ' tbody').on('click', 'tr td.control', function () {
                var tr = $(this).closest('tr');
                var row = theDataTable.getDataTable().row(tr);
                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('parent');
                } else {
                    $.ajax({
                        url: row.data().urls.details,
                        type: 'GET',
                        success: function (data) {
                            row.child(theDataTable.tableOptions.getDetailTableFormat(data.data[0])).show();
                            tr.addClass('parent').next().addClass('child').children('td').addClass('child');
                        }
                    });
                }
            });
        }

        // destroy api
        $(theDataTable.tableOptions.src + ' tbody').on('click','tr td ul.dropdown-menu a.fast-destroy',function()
        {
            var tr = $(this).closest('tr');
            var row = theDataTable.getDataTable().row(tr);
            tr.fadeOut();
            LMCApp.startDestroyTimer(function()
            {
                $.ajax({
                    url: row.data().urls.destroy,
                    type: 'DELETE',
                    success: function(data)
                    {
                        if (data.result === 'success') {
                            row.remove();
                            LMCApp.getNoty({
                                message: LMCApp.lang.admin.flash.destroy_success.message,
                                title: LMCApp.lang.admin.flash.destroy_success.title,
                                type: 'success'
                            });
                            return;
                        }
                        if (data.result === 'error') {
                            LMCApp.getNoty({
                                message: LMCApp.lang.admin.flash.destroy_error.message,
                                title: LMCApp.lang.admin.flash.destroy_error.title,
                                type: 'error'
                            });
                            tr.fadeIn();
                            return;
                        }
                        // call on delete error function
                        if (theDataTable.tableOptions.onDeleteError) {
                            theDataTable.tableOptions.onDeleteError.call(data);
                        }
                        tr.fadeIn();
                    }
                });
            }, function()
            {
                tr.fadeIn();
            });
        });

        // handle group action submit button click
        if (theDataTable.tableOptions.groupActionSupport) {
            theDataTable.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
                e.preventDefault();
                var input = $(".table-group-action-input", theDataTable.getTableWrapper());
                var action = input;
                // eğer action seçilmemişse
                if (action.val() == '') {
                    LMCApp.getNoty({
                        title: LMCApp.lang.admin.flash.not_select_action.title,
                        message: LMCApp.lang.admin.flash.not_select_action.message,
                        type: 'error'
                    });
                    return;
                }
                // eğer satır seçilmediyse
                if (theDataTable.getSelectedRowsCount() === 0) {
                    LMCApp.getNoty({
                        title: LMCApp.lang.admin.flash.not_select_rows.title,
                        message: LMCApp.lang.admin.flash.not_select_rows.message,
                        type: 'error'
                    });
                    return;
                }
                // seçilen satır sayısı 0'dan büyük ve action seçilmiş ise
                theDataTable.setAjaxParam('action', action.val());
                theDataTable.setAjaxParam('id', theDataTable.getSelectedRows());

                // group action ajax before fonksiyonu çağrılır
                var result = theDataTable.tableOptions.onGroupBeforeAjax.call(undefined, theDataTable.ajaxParams);
                if ( ! result ) {
                    return false;
                }

                $.ajax({
                    url: apiGroupAction,
                    data: theDataTable.ajaxParams,
                    success: function (data) {
                        if (data.result === 'success') {
                            LMCApp.getNoty({
                                title: LMCApp.lang.admin.flash.group_action_success.title,
                                message: LMCApp.lang.admin.flash.group_action_success.message,
                                type: 'success'
                            });
                            theDataTable.tableOptions.onGroupAfterAjax.call(undefined, theDataTable.ajaxParams, data);
                            return;
                        }

                        LMCApp.getNoty({
                            title: LMCApp.lang.admin.flash.group_action_error.title,
                            message: LMCApp.lang.admin.flash.group_action_error.message,
                            type: 'error'
                        });

                        theDataTable.tableOptions.onGroupAfterAjax.call(undefined, theDataTable.ajaxParams, data);
                    }
                }).done(function (data) {
                    if (data.result === 'success') {
                        LMCApp.hasTransaction = false;
                        theDataTable.dataTable.ajax.reload();
                        theDataTable.clearAjaxParams();
                    }
                });

                // seçim sıfırlanır
                input.val('');
            });
        }
    },

    /**
     * set data table order column
     */
    setOrder: function()
    {
        this.tableOptions.dataTable['order'] = [
            [
                this.tableOptions.dataTable.order[0][0]+this.exportIndex, // column index
                this.tableOptions.dataTable.order[0][1] // type
            ]
        ];
    },

    /**
     * set export options
     */
    setExportOptions: function()
    {
        var index = this.exportIndex;
        for (var i = 0; i < this.tableOptions.exportColumnSize; i++, index++) {
            this.options.exportOptions.columns.push(index);
        }
        if (this.tableOptions.exportOptionsFormat != null) {
            this.options.exportOptions.format = this.tableOptions.exportOptionsFormat;
        }
    },

    /**
     * set data table dom pattern
     */
    setTableDom: function()
    {
        var col = this.tableOptions.groupActionSupport ? 'col-md-8 col-sm-12' : 'col-md-12';
        var responsive = this.tableOptions.datatableIsResponsive ? '-responsive' : '';

        var dom = "<'row'<'" + col +"'pli>";
        if (this.tableOptions.groupActionSupport) {
            dom += "<'col-md-4 col-sm-12'<'table-group-actions pull-right'>>";
        }
        dom += "r><'table" + responsive + "'t><'row'<'col-md-12'pli>r>";
        this.tableOptions.dataTable['dom'] = dom;
    },

    /**
     * add row detail column
     */
    addRowDetailColumn: function()
    {
        // column eklenir
        this.tableOptions.dataTable.columns.push({
            className: 'control',
            searchable: false,
            orderable: false,
            data: null,
            defaultContent: ''
        });

        // responsive detay özelliği belirlenir
        this.tableOptions.dataTable.responsive = {
            details: {
                type: 'column',
                target: 1
            }
        };

        this.exportIndex++;
    },

    /**
     * add group action column
     */
    addGroupActionColumn: function()
    {
        this.tableOptions.dataTable.columns.push({
            data : "check_id", name: "check_id", searchable: false, orderable: false,
            render: function ( data, type, full, meta )
            {
                return '<input type="checkbox" name="id[]" value="'+data+'">';
            }
        });
        this.exportIndex++;
    },

    /**
     * set data table columns
     */
    setColumns: function()
    {
        var defaultColumns = this.tableOptions.dataTable.columns;
        this.tableOptions.dataTable['columns'] = [];
        // if support group action
        if (this.tableOptions.groupActionSupport) {
            this.addGroupActionColumn();
        }
        // if support row detail
        if (this.tableOptions.rowDetailSupport) {
            this.addRowDetailColumn();
        }
        // set defaults columns
        $.each(defaultColumns, function(index,value)
        {
            theDataTable.tableOptions.dataTable.columns.push(value);
        });
    },

    /**
     * update cell
     *
     * @param row
     * @param cell
     * @param value
     */
    updateCell: function(row, cell, value)
    {
        var dtCell = this.getDataTable().cell(row, cell);
        if (value !== null) {
            dtCell.data(value);
        }
        return dtCell;
    },

    /**
     * get count selected records
     */
    countSelectedRecords: function()
    {
        var selected = $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).size();
        var text = this.tableOptions.dataTable.language.groupActions;
        if (selected > 0) {
            $('.table-group-actions > span', this.tableWrapper).text(text.replace("_TOTAL_", selected));
        } else {
            $('.table-group-actions > span', this.tableWrapper).text("");
        }
    },

    getSelectedRowsCount: function()
    {
        return $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).size();
    },

    getSelectedRows: function()
    {
        var rows = [];
        $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).each(function() {
            rows.push($(this).val());
        });

        return rows;
    },

    /**
     * submit filter of table
     */
    submitFilter: function()
    {
        theDataTable.setAjaxParam("action", this.tableOptions.filterApplyAction);

        // get all typeable inputs
        $('textarea.form-filter, select.form-filter, input.form-filter:not([type="radio"],[type="checkbox"])', this.table).each(function() {
            theDataTable.setAjaxParam($(this).attr("name"), $(this).val());
        });

        // get all checkboxes
        $('input.form-filter[type="checkbox"]:checked', this.table).each(function() {
            theDataTable.addAjaxParam($(this).attr("name"), $(this).val());
        });

        // get all radio buttons
        $('input.form-filter[type="radio"]:checked', this.table).each(function() {
            theDataTable.setAjaxParam($(this).attr("name"), $(this).val());
        });

        theDataTable.dataTable.ajax.reload();
    },

    /**
     * reset filter of table
     */
    resetFilter: function()
    {
        LMCApp.resetAllFormFields(this.table);
        this.clearAjaxParams();
        this.addAjaxParam("action", this.tableOptions.filterCancelAction);
        this.dataTable.ajax.reload();
    },

    /**
     * set ajax parameter to data
     * @param name
     * @param value
     */
    setAjaxParam: function(name, value)
    {
        this.ajaxParams[name] = value;
    },

    /**
     * add ajax parameter to data
     * @param name
     * @param value
     */
    addAjaxParam: function(name, value)
    {
        if (!this.ajaxParams[name]) {
            this.ajaxParams[name] = [];
        }

        skip = false;
        for (var i = 0; i < (this.ajaxParams[name]).length; i++) { // check for duplicates
            if (this.ajaxParams[name][i] === value) {
                skip = true;
            }
        }

        if (skip === false) {
            this.ajaxParams[name].push(value);
        }
    },

    /**
     * clear ajax parameters
     */
    clearAjaxParams: function()
    {
        this.ajaxParams = {};
    },

    /**
     * get datatable
     * @return DataTable
     */
    getDataTable: function()
    {
        return this.dataTable;
    },

    /**
     * get table wrapper
     * @return table wraper
     */
    getTableWrapper: function()
    {
        return this.tableWrapper;
    },

    /**
     * get table container
     * @return table container
     */
    getTableContainer: function()
    {
        return this.tableContainer;
    },

    /**
     * get table
     * @return table
     */
    getTable: function()
    {
        return this.table;
    },

    /**
     * get table action column menu
     * @param options
     */
    getActionMenu: function(options)
    {
        var menu = '<div class="btn-group" role="group">';
        var ops = $.extend(true, {
            id: -1,
            showUrl: '',
            buttons: []
        }, options);

        // show button
        menu += '<a href="' + ops.showUrl + '" ' +
            'class="btn green btn-outline tooltips" ' +
            'title="' + LMCApp.lang.admin.ops.show + '" ' +
            'style="margin-right:0;">';
        menu += '<i class="fa fa-search"></i>';
        menu += '</a>';

        if (ops.buttons.length < 1) {
            return menu + '</div>';
        }

        menu += '<div class="btn-group" role="group">';
        // dropdown button
        menu += '<button type="button" class="btn green btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';

        // dropdown menus
        menu += '<ul class="dropdown-menu pull-right" role="menu">';
        $.each(ops.buttons, function(key, value)
        {
            if (value === 'divider') {
                menu += '<li class="divider" role="presentation"></li>';
                return;
            }

            menu += '<li>';
            menu += '<a';
            $.each(value.attributes, function(key, value)
            {
                menu += ' ' + key + '="' + value + '"';
            });
            menu += '>';
            menu += value.title;
            menu += '</a>';
            menu += '</li>';
        });
        menu += '</ul>';
        menu += '</div>';

        menu += '</div>';
        return menu;
    },

    /**
     * get default data table options function
     */
    getDefaultOptions: function()
    {
        return {
            src: "", // actual table
            exportTitle: 'Doküman',
            filterApplyAction: "filter",
            filterCancelAction: "filter_cancel",
            loadingMessage: 'Yükleniyor...',
            datatableIsResponsive: true,
            groupActionSupport: true,
            rowDetailSupport: true,
            datatableFilterSupport: true,
            exportColumnSize: 0,
            exportOptionsFormat: null,
            isRelationTable: false,
            changeRelationTable: function()
            {
                //
            },
            onGroupBeforeAjax: function(actionType, rows, ajaxParams)
            {
                return true;
            },
            onGroupAfterAjax: function(actionType, rows, ajaxParams, responseData)
            {
                // on error function
            },

            /**
             * export data table options for columns
             */
            exportOptions: {
                columns: []
            },
            dataTable: {
                dom: "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r><'table-responsive't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
                responsive: {},
                buttons: [
                    { extend: 'print',key: { key: 'p', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions },
                    { extend: 'copyHtml5',key: { key: 'c', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions },
                    { extend: 'pdfHtml5',key: { key: 'd', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions, title: this.options.exportTitle },
                    { extend: 'excelHtml5',key: { key: 'e', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions, title: this.options.exportTitle },
                    { extend: 'csvHtml5',key: { key: 'v', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions, title: this.options.exportTitle },
                    {
                        text: 'Reload', key: { key: 'r', altKey: true, shiftKey: true }, exportOptions: this.options.exportOptions,
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                        }
                    }
                ],
                pageLength: 10, // default records per page
                language: {
                    // data tables spesific
                    decimal: ",",
                    emptyTable: "Tabloda veri yok",
                    info: "<span class='seperator'>|</span>Toplam <strong>_TOTAL_</strong> kayıt bulundu",
                    infoEmpty: " | Görüntülenecek sonuç bulunamadı",
                    infoFiltered: "(Toplam _MAX_ kayıt arasından filtrelendi)",
                    infoPostFix: "",
                    thousands: ".",
                    lengthMenu: "<span class='seperator'>|</span>_MENU_ kayıt görüntüleniyor",
                    loadingRecords: "Yükleniyor...",
                    processing: "İşleniyor...",
                    search: "Ara:",
                    zeroRecords: "Eşleşen kayıt bulunamadı",
                    paginate: {
                        previous: "Önceki",
                        next: "Sonraki",
                        last: "Son",
                        first: "İlk",
                        page: "Sayfa",
                        pageOf: "/"
                    },
                    aria: {
                        sortAscending: ": artan sıralama",
                        sortDescending: ": azalan sıralama"
                    },
                    buttons: {
                        copySuccess: {
                            _: "<strong>%d</strong> satır panoya kopyalandı"
                        },
                        copyTitle: 'Veriler kopyalandı',
                    },

                    // personal spesific
                    groupActions: "_TOTAL_ kayıt seçildi:  ",
                    ajaxRequestGeneralErrorTitle: "İstek Tamamlanmadı",
                    ajaxRequestGeneralError: "İstek tamamlanmadı. Lütfen internet bağlantını kontrol et."
                },

                orderCellsTop: true,
                columnDefs: [],
                bStateSave: true, // save datatable state(pagination, sort, etc) in cookie.

                lengthMenu: [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "Hepsi"] // change per page values here
                ],
                order: [
                    [0, 'desc']
                ], // set first column as a default sort by asc

                pagingType: "bootstrap_extended", // pagination type(bootstrap, bootstrap_full_number or bootstrap_extended)
                autoWidth: false, // disable fixed width and enable fluid table
                processing: false, // enable/disable display message box on record load
                serverSide: true, // enable/disable server side ajax loading

                ajax: { // define ajax settings
                    url: "", // ajax URL
                    type: "GET", // request type
                    timeout: 20000,
                    data: function(data) { // add request parameters before submit
                        $.each(theDataTable.ajaxParams, function(key, value) {
                            data[key] = value;
                        });
                    },
                    dataSrc: function(response)
                    {
                        // group checkable is reset
                        if ($('.group-checkable', theDataTable.table).size() === 1) {
                            $('.group-checkable', theDataTable.table).attr("checked", false);
                            $.uniform.update($('.group-checkable', theDataTable.table));
                        }

                        // call on success user function
                        if (theDataTable.tableOptions.onSuccess) {
                            theDataTable.tableOptions.onSuccess.call(undefined, theDataTable, response);
                        }

                        return response.data;
                    },
                    error: function()
                    {
                        if (theDataTable.tableOptions.onError) {
                            theDataTable.tableOptions.onError.call(undefined, theDataTable);
                        }
                        LMCApp.getNoty({
                            message: theDataTable.tableOptions.dataTable.language.ajaxRequestGeneralError,
                            title: theDataTable.tableOptions.dataTable.language.ajaxRequestGeneralErrorTitle,
                            type: 'error'
                        });
                    }
                },
                drawCallback: function(oSettings) { // run some code on table redraw
                    if (theDataTable.tableInitialized === false) { // check if table has been initialized
                        theDataTable.tableInitialized = true; // set table initialized
                        theDataTable.table.show(); // display table
                    }
                    App.initUniform($('input[type="checkbox"]', theDataTable.table)); // reinitialize uniform checkboxes on each table reload
                    LMCApp.initTooltips();
                    theDataTable.countSelectedRecords(); // reset selected records indicator

                    // callback for ajax data load
                    if (theDataTable.tableOptions.onDataLoad) {
                        theDataTable.tableOptions.onDataLoad.call(undefined, theDataTable);
                    }
                }
            }
        };
    }
};