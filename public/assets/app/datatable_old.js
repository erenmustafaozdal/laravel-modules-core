;var the = null;                    // actual init function
var Datatable = {

    dataTable: null,                // datatable object
    table: null,                    // actual table jquery object
    tableContainer: null,           // actual table container object
    tableWrapper: null,             // actual table wrapper jquery object
    tableInitialized: false,        // table is initalized
    ajaxParams: {},                 // set filter mode
    tableOptions: {                 // main options
        src: "", // actual table
        filterApplyAction: "filter",
        filterCancelAction: "filter_cancel",
        resetGroupActionInputOnSuccess: true,
        loadingMessage: 'Yükleniyor...',
        dataTable: {
            "dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r><'table-responsive't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
            "pageLength": 10, // default records per page
            "language": {
                "decimal": ",",
                "thousands": ".",
                "metronicGroupActions": "_TOTAL_ kayıt seçildi:  ",
                "metronicAjaxRequestGeneralError": "İstek tamamlanmadı. Lütfen internet bağlantını kontrol et.",

                // data tables spesific
                "lengthMenu": "<span class='seperator'>|</span>_MENU_ kayıt görüntüleniyor",
                "info": "<span class='seperator'>|</span>Toplam <strong>_TOTAL_</strong> kayıt bulundu",
                "infoEmpty": "Görüntülenecek sonuç bulunamadı",
                "emptyTable": "Tabloda veri yok",
                "zeroRecords": "Eşleşen kayıt bulunamadı",
                "paginate": {
                    "previous": "Önceki",
                    "next": "Sonraki",
                    "last": "Son",
                    "first": "İlk",
                    "page": "Sayfa",
                    "pageOf": "/"
                }
            },

            "orderCellsTop": true,
            "columnDefs": [{ // define columns sorting options(by default all columns are sortable extept the first checkbox column)
                'orderable': false,
                'targets': [0]
            }],
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "lengthMenu": [
                [10, 20, 50, 100, 150, -1],
                [10, 20, 50, 100, 150, "Hepsi"] // change per page values here
            ],
            "order": [
                [1, "asc"]
            ], // set first column as a default sort by asc

            "pagingType": "bootstrap_extended", // pagination type(bootstrap, bootstrap_full_number or bootstrap_extended)
            "autoWidth": false, // disable fixed width and enable fluid table
            "processing": false, // enable/disable display message box on record load
            "serverSide": true, // enable/disable server side ajax loading

            "ajax": { // define ajax settings
                "url": "", // ajax URL
                "type": "POST", // request type
                "timeout": 20000,
                "data": function(data) { // add request parameters before submit
                    $.each(this.ajaxParams, function(key, value) {
                        data[key] = value;
                    });
                    App.blockUI({
                        message: this.tableOptions.loadingMessage,
                        target: this.tableContainer,
                        overlayColor: 'none',
                        centerY: true,
                        boxed: true
                    });
                },
                "dataSrc": function(res) { // Manipulate the data returned from the server
                    if (res.customActionMessage) {
                        App.alert({
                            type: (res.customActionStatus == 'OK' ? 'success' : 'danger'),
                            icon: (res.customActionStatus == 'OK' ? 'check' : 'warning'),
                            message: res.customActionMessage,
                            container: this.tableWrapper,
                            place: 'prepend'
                        });
                    }

                    if (res.customActionStatus) {
                        if (this.tableOptions.resetGroupActionInputOnSuccess) {
                            $('.table-group-action-input', this.tableWrapper).val("");
                        }
                    }

                    if ($('.group-checkable', this.table).size() === 1) {
                        $('.group-checkable', this.table).attr("checked", false);
                        $.uniform.update($('.group-checkable', this.table));
                    }

                    if (this.tableOptions.onSuccess) {
                        this.tableOptions.onSuccess.call(undefined, the, res);
                    }

                    App.unblockUI(this.tableContainer);

                    return res.data;
                },
                "error": function() { // handle general connection errors
                    if (this.tableOptions.onError) {
                        this.tableOptions.onError.call(undefined, the);
                    }

                    App.alert({
                        type: 'danger',
                        icon: 'warning',
                        message: this.tableOptions.dataTable.language.metronicAjaxRequestGeneralError,
                        container: this.tableWrapper,
                        place: 'prepend'
                    });

                    App.unblockUI(this.tableContainer);
                }
            },

            "drawCallback": function(oSettings) { // run some code on table redraw
                if (this.tableInitialized === false) { // check if table has been initialized
                    this.tableInitialized = true; // set table initialized
                    this.table.show(); // display table
                }
                App.initUniform($('input[type="checkbox"]', this.table)); // reinitialize uniform checkboxes on each table reload
                countSelectedRecords(); // reset selected records indicator

                // callback for ajax data load
                if (this.tableOptions.onDataLoad) {
                    this.tableOptions.onDataLoad.call(undefined, the);
                }
            }
        }
    },

    countSelectedRecords : function()
    {
        var selected = $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).size();
        var text = this.tableOptions.dataTable.language.metronicGroupActions;
        if (selected > 0) {
            $('.table-group-actions > span', this.tableWrapper).text(text.replace("_TOTAL_", selected));
        } else {
            $('.table-group-actions > span', this.tableWrapper).text("");
        }
    },

    init: function(options)
    {
        if (!$().dataTable) {
            return;
        }

        the = this;

        // default settings
        options = $.extend(true, this.tableOptions, options);
        this.tableOptions = options;

        // create table's jquery object
        this.table = $(options.src);
        this.tableContainer = this.table.parents(".table-container");

        // apply the special class that used to restyle the default datatable
        var tmp = $.fn.dataTableExt.oStdClasses;

        $.fn.dataTableExt.oStdClasses.sWrapper = $.fn.dataTableExt.oStdClasses.sWrapper + " dataTables_extended_wrapper";
        $.fn.dataTableExt.oStdClasses.sFilterInput = "form-control input-xs input-sm input-inline";
        $.fn.dataTableExt.oStdClasses.sLengthSelect = "form-control input-xs input-sm input-inline";

        // initialize a datatable
        this.dataTable = this.table.DataTable(options.dataTable);

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
            var set = this.table.find('tbody > tr > td:nth-child(1) input[type="checkbox"]');
            var checked = $(this).prop("checked");
            $(set).each(function() {
                $(this).prop("checked", checked);
            });
            $.uniform.update(set);
            this.countSelectedRecords();
        });

        // handle row's checkbox click
        this.table.on('change', 'tbody > tr > td:nth-child(1) input[type="checkbox"]', function() {
            this.countSelectedRecords();
        });

        // handle filter submit button click
        this.table.on('click', '.filter-submit', function(e) {
            e.preventDefault();
            the.submitFilter();
        });

        // handle filter cancel button click
        this.table.on('click', '.filter-cancel', function(e) {
            e.preventDefault();
            the.resetFilter();
        });
    },

    submitFilter: function() {
        the.setAjaxParam("action", this.tableOptions.filterApplyAction);

        // get all typeable inputs
        $('textarea.form-filter, select.form-filter, input.form-filter:not([type="radio"],[type="checkbox"])', this.table).each(function() {
            the.setAjaxParam($(this).attr("name"), $(this).val());
        });

        // get all checkboxes
        $('input.form-filter[type="checkbox"]:checked', this.table).each(function() {
            the.addAjaxParam($(this).attr("name"), $(this).val());
        });

        // get all radio buttons
        $('input.form-filter[type="radio"]:checked', this.table).each(function() {
            the.setAjaxParam($(this).attr("name"), $(this).val());
        });

        this.dataTable.ajax.reload();
    },

    resetFilter: function() {
        $('textarea.form-filter, select.form-filter, input.form-filter', this.table).each(function() {
            $(this).val("");
        });
        $('input.form-filter[type="checkbox"]', this.table).each(function() {
            $(this).attr("checked", false);
        });
        the.clearAjaxParams();
        the.addAjaxParam("action", this.tableOptions.filterCancelAction);
        this.dataTable.ajax.reload();
    },

    getSelectedRowsCount: function() {
        return $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).size();
    },

    getSelectedRows: function() {
        var rows = [];
        $('tbody > tr > td:nth-child(1) input[type="checkbox"]:checked', this.table).each(function() {
            rows.push($(this).val());
        });

        return rows;
    },

    setAjaxParam: function(name, value) {
        this.ajaxParams[name] = value;
    },

    addAjaxParam: function(name, value) {
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

    clearAjaxParams: function(name, value) {
        this.ajaxParams = {};
    },

    getDataTable: function() {
        return this.dataTable;
    },

    getTableWrapper: function() {
        return this.tableWrapper;
    },

    gettableContainer: function() {
        return this.tableContainer;
    },

    getTable: function() {
        return this.table;
    }
};