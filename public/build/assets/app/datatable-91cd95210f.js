;var theDataTable;
var DataTable = {

    /**
     * data table options
     * @var object
     */
    tableOptions: {},

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
        this.tableOptions = $.extend(true, this.getDefaultOptions(), options);

        // create table's jquery object
        this.table = $(this.tableOptions.src);
        this.tableContainer = this.table.parents('.table-container');

        // apply the special class that used to restyle the default datatable
        var tmp = $.fn.dataTableExt.oStdClasses;

        $.fn.dataTableExt.oStdClasses.sWrapper = $.fn.dataTableExt.oStdClasses.sWrapper + " dataTables_extended_wrapper";
        $.fn.dataTableExt.oStdClasses.sFilterInput = "form-control input-xs input-sm input-inline";
        $.fn.dataTableExt.oStdClasses.sLengthSelect = "form-control input-xs input-sm input-inline";

        // initialize a datatable
        this.dataTable = this.table.DataTable(this.tableOptions.dataTable);

        // revert back to default
        $.fn.dataTableExt.oStdClasses.sWrapper = tmp.sWrapper;
        $.fn.dataTableExt.oStdClasses.sFilterInput = tmp.sFilterInput;
        $.fn.dataTableExt.oStdClasses.sLengthSelect = tmp.sLengthSelect;

        // get table wrapper
        this.tableWrapper = this.table.parents('.dataTables_wrapper');

        // build table group actions panel
        if ($('.table-actions-wrapper', this.tableContainer).size() === 1) {
            $('.table-group-actions', this.tableWrapper).html($('.table-actions-wrapper', this.tableContainer).html()); // place the panel inside the wrapper
            $('.table-actions-wrapper', this.tableContainer).remove(); // remove the template container
        }

        // handle group checkboxes check/uncheck
        $('.group-checkable', this.table).change(function() {
            var set = theDataTable.table.find('tbody > tr > td:nth-child(1) input[type="checkbox"]');
            var checked = $(this).prop("checked");
            $(set).each(function() {
                $(this).prop("checked", checked);
            });
            $.uniform.update(set);
            theDataTable.countSelectedRecords();
        });

        // handle row's checkbox click
        this.table.on('change', 'tbody > tr > td:nth-child(1) input[type="checkbox"]', function() {
            theDataTable.countSelectedRecords();
        });

        // handle filter submit button click
        this.table.on('click', '.filter-submit', function(e) {
            e.preventDefault();
            theDataTable.submitFilter();
        });

        // handle filter cancel button click
        this.table.on('click', '.filter-cancel', function(e) {
            e.preventDefault();
            theDataTable.resetFilter();
        });

        // handle datatable custom tools
        $('#lmcDataTableTools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            theDataTable.getDataTable().button(action).trigger();
        });
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

        this.dataTable.ajax.reload();
    },

    /**
     * reset filter of table
     */
    resetFilter: function()
    {
        $('textarea.form-filter, select.form-filter, input.form-filter', this.table).each(function() {
            $(this).val("");
        });
        $('input.form-filter[type="checkbox"]', this.table).each(function() {
            $(this).attr("checked", false);
        });
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
    getDataTable: function() {
        return this.dataTable;
    },

    /**
     * get table wrapper
     * @return table wraper
     */
    getTableWrapper: function() {
        return this.tableWrapper;
    },

    /**
     * get table container
     * @return table container
     */
    gettableContainer: function() {
        return this.tableContainer;
    },

    /**
     * get table
     * @return table
     */
    getTable: function() {
        return this.table;
    },

    /**
     * get default data table options function
     */
    getDefaultOptions: function()
    {
        return {
            src: "", // actual table
            filterApplyAction: "filter",
            filterCancelAction: "filter_cancel",
            loadingMessage: 'Yükleniyor...',
            dataTable: {
                dom: "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r><'table-responsive't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
                buttons: [
                    { extend: 'print',key: { key: 'p', altKey: true, shiftKey: true } },
                    { extend: 'copy',key: { key: 'c', altKey: true, shiftKey: true } },
                    { extend: 'pdf',key: { key: 'd', altKey: true, shiftKey: true } },
                    { extend: 'excel',key: { key: 'e', altKey: true, shiftKey: true } },
                    { extend: 'csv',key: { key: 'v', altKey: true, shiftKey: true } },
                    {
                        text: 'Reload', key: { key: 'r', altKey: true, shiftKey: true },
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
                columnDefs: [{ // define columns sorting options(by default all columns are sortable extept the first checkbox column)
                    'orderable': false,
                    'targets': [0,1]
                }],
                bStateSave: true, // save datatable state(pagination, sort, etc) in cookie.

                lengthMenu: [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "Hepsi"] // change per page values here
                ],
                order: [
                    [2, "asc"]
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

                        getNoty(theDataTable.tableOptions.dataTable.language.ajaxRequestGeneralErrorTitle,theDataTable.tableOptions.dataTable.language.ajaxRequestGeneralError,'error');
                    }
                },
                drawCallback: function(oSettings) { // run some code on table redraw
                    if (theDataTable.tableInitialized === false) { // check if table has been initialized
                        theDataTable.tableInitialized = true; // set table initialized
                        theDataTable.table.show(); // display table
                    }
                    App.initUniform($('input[type="checkbox"]', theDataTable.table)); // reinitialize uniform checkboxes on each table reload
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
