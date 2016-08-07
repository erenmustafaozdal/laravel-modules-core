;var theTinymce;
var Tinymce = {

    /**
     * options
     */
    options: {},

    /**
     * elfinder route
     */
    route: null,

    /**
     * init function
     *
     * @param options
     */
    init: function(options)
    {
        // object
        theTinymce = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);
        this.route = this.options.route;
        this.options.tinymce.selector = this.options.src;

        // tinymce init
        tinymce.init(this.options.tinymce);

    },

    /**
     * elfinder function
     * @param field_name
     * @param url
     * @param type
     * @param win
     * @returns {boolean}
     */
    fileBrowserCallback: function (field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: theTinymce.route,// use an absolute path!
            title: 'Dosya Yöneticisi',
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '.tinymce',
            route: '',
            tinymce: {
                selector:'',
                cache_suffix: '?v=4.1.6',
                language: 'tr_TR',
                language_url: '/vendor/laravel-modules-core/assets/global/plugins/tinymce/langs/tr_TR.js',
                browser_spellcheck: true,
                image_caption: true,
                image_title: true,
                image_advtab: true,
                image_class_list: [
                    {title: 'Normal', value: ''},
                    {title: 'Kenarları Yuvarlanmış', value: 'img-rounded'},
                    {title: 'Daire', value: 'img-circle'},
                    {title: 'Uyumlu', value: 'img-responsive'}
                ],
                imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
                insertdatetime_formats: ["%H:%M:%S", "%d-%m-%Y", "%H:%M %d-%m-%Y, %A", "%d %B %Y, %A", "%d %b %Y, %a"],
                insertdatetime_element: true,
                default_link_target: "_blank",
                link_class_list: [
                    {title: 'Normal', value: ''},
                    {title: 'Varsayılan', value: 'btn btn-sm btn-default'},
                    {title: 'Öncelikli', value: 'btn btn-sm btn-primary'},
                    {title: 'Bilgilendirme', value: 'btn btn-sm btn-info'},
                    {title: 'Başarı', value: 'btn btn-sm btn-success'},
                    {title: 'Uyarı', value: 'btn btn-sm btn-warning'},
                    {title: 'Tehlike', value: 'btn btn-sm btn-danger'}
                ],
                media_alt_source: false,
                pagebreak_split_block: true,
                paste_data_images: true,
                paste_as_text: true,
                table_advtab: false,
                table_cell_advtab: false,
                table_row_advtab: false,
                table_class_list: [
                    {title: 'Basit Tablo', value: 'table table-hover'},
                    {title: 'Kenarlı Tablo', value: 'table table-bordered table-hover'},
                    {title: 'Çizgili Tablo', value: 'table table-striped table-hover'},
                    {title: 'Yoğun Tablo', value: 'table table-condensed table-hover'},
                    {title: 'Sade Tablo', value: 'table table-hover table-light'},
                    {title: 'Gelişmiş Tablo', value: 'table table-striped table-bordered table-advance table-hover'}
                ],
                table_cell_class_list: [
                    {title: 'Normal', value: ''},
                    {title: 'Aktif', value: 'active'},
                    {title: 'Başarı', value: 'success'},
                    {title: 'Uyarı', value: 'warning'},
                    {title: 'Tehlike', value: 'danger'}
                ],
                table_row_class_list: [
                    {title: 'Normal', value: ''},
                    {title: 'Aktif', value: 'active'},
                    {title: 'Başarı', value: 'success'},
                    {title: 'Uyarı', value: 'warning'},
                    {title: 'Tehlike', value: 'danger'}
                ],
                templates: [
                    {title: 'Duyarlı Tablo', description: 'Sayfaya her boyut ekrana duyarlı bir tablo ekler', content: '<div class="table-responsive"><table class="table table-striped table-bordered table-advance table-hover"><thead><tr><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th></tr></thead><tbody><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr></tbody></table></div>'},
                    {title: 'Duyarlı Yan Kaydırma Tablosu', description: 'Sayfaya her boyut ekrana duyarlı, başlığı yanda yer alan bir tablo ekler', content: '<div class="flip-scroll"><table class="table table-striped table-bordered table-advance table-hover flip-content"><thead class="flip-content"><tr><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th><th> Lorem ipsum </th></tr></thead><tbody><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr><tr><td> Suspendisse </td><td> Pellentesque rutrum malesuada lacus eget viverra </td><td> Nullam </td><td> Vestibulum </td><td> Donec </td><td> Aenean </td><td> Sed </td><td> Cras </td><td> Aliquam </td><td> Maecenas </td></tr><tr><td> Mauris </td><td> Nam lobortis tellus in massa mollis suscipit </td><td> Fusce </td><td> Quisque </td><td> Donec </td><td> Nam </td><td> Vivamus </td><td> Quisque </td><td> Pellentesque </td><td> Maecenas </td></tr></tbody></table></div>'},
                    {title: 'Duyarlı İçerik Alanı (2 Sütun)', description: 'Sayfaya her boyut ekrana duyarlı, iki sütunlu içerik alanı ekler', content: '<div class="row"><div class="col-md-6 col-sm-6 col-xs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. </div><div class="col-md-6 col-sm-6 col-xs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. Su</div></div>'},
                    {title: 'Duyarlı İçerik Alanı (3 Sütun)', description: 'Sayfaya her boyut ekrana duyarlı, üç sütunlu içerik alanı ekler', content: '<div class="row"><div class="col-md-4 col-sm-4 col-xs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. </div><div class="col-md-4 col-sm-4 col-xs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. Su</div><div class="col-md-4 col-sm-4 col-xs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc.</div></div>'},
                    {title: 'Duyarlı İçerik Alanı (4 Sütun)', description: 'Sayfaya her boyut ekrana duyarlı, dört sütunlu içerik alanı ekler', content: '<div class="row"><div class="col-md-3 col-sm-3 col-xs-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. </div><div class="col-md-3 col-sm-3 col-xs-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. Su</div><div class="col-md-3 col-sm-3 col-xs-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc.</div><div class="col-md-3 col-sm-3 col-xs-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nun</div></div>'},
                    {title: 'Duyarlı İçerik Alanı (6 Sütun)', description: 'Sayfaya her boyut ekrana duyarlı, altı sütunlu içerik alanı ekler', content: '<div class="row"><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. </div><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. Su</div><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc.</div><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nun</div><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc. Suspendi</div><div class="col-md-2 col-sm-2 col-xs-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies ante placerat sollicitudin fringilla. Nulla vel lectus a urna porttitor dapibus non vitae nunc.</div></div>'}
                ],
                textcolor_map: [
                    "FFFFFF", "Beyaz",
                    "E1E5EC", "Varsayılan",
                    "2F353B", "Koyu",
                    "3598DC", "Mavi",
                    "578EBE", "Madison Mavi",
                    "2C3E50", "Lacivert",
                    "22313F", "Abanoz Kil Mavi",
                    "67809F", "Hoki Mavi",
                    "4B77BE", "Çelik Mavi",
                    "4C87B9", "Yumuşak Mavi",
                    "5E738B", "Koyu Mavi",
                    "5C9BD1", "Keskin Mavi",
                    "32C5D2", "Yeşil",
                    "1BBC9B", "Çayır Yeşil",
                    "1BBC9B", "Çayır Yeşili",
                    "1BA39C", "Deniz Yeşili",
                    "36D7B7", "Turkuaz Yeşili",
                    "44B6AE", "Pus Yeşili",
                    "26C281", "Orman Yeşili",
                    "3FABA4", "Yumuşak Yeşil",
                    "4DB3A2", "Koyu Yeşil",
                    "2AB4C0", "Keskin Yeşil",
                    "E5E5E5", "Gri",
                    "E9EDEF", "Çelik Gri",
                    "FAFAFA", "Açık Gri",
                    "555555", "Galeri Grisi",
                    "95A5A6", "Çağlayan Gri",
                    "BFBFBF", "Gümüş Gri",
                    "ACB5C3", "Salsa Gri",
                    "BFCAD1", "Tuz Grisi",
                    "525E64", "Koyu Grisi",
                    "525E64", "Koyu Grisi",
                    "E7505A", "Kırmızı",
                    "E08283", "Pembe Kırmızı",
                    "E26A6A", "Şafak Kırmızısı",
                    "E35B5A", "Yoğun Kırmızı",
                    "D91E18", "Papağan Kırmızısı",
                    "EF4836", "Flamingo Kırmızısı",
                    "D05454", "Yumuşak Kırmızı",
                    "F36A5A", "Pus Kırmızı",
                    "E43A45", "Koyu Kırmızı",
                    "C49F47", "Sarı",
                    "E87E04", "Altın Sarısı",
                    "F2784B", "Kasablanka Sarısı",
                    "F3C200", "Net Sarı",
                    "F7CA18", "Limon Sarısı",
                    "F4D03F", "Safran Sarısı",
                    "C8D046", "Yumuşak Sarı",
                    "C5BF66", "Pus Sarı",
                    "C5B96B", "Koyu Sarı",
                    "8E44AD", "Mor",
                    "8775A7", "Kuşüzümü Moru",
                    "BF55EC", "Vasat Mor",
                    "8E44AD", "Stüdyo Moru",
                    "9B59B6", "Üzüm Moru",
                    "9A12B3", "Seans Mor",
                    "8775A7", "Yoğun Mor",
                    "796799", "Keskin Mor",
                    "8877A9", "Yumuşak Mor"
                ],
                textcolor_cols: "10",
                textcolor_rows: "6",
                end_container_on_empty_block: true,
                style_formats_merge: true,
                br_in_pre: false,
                custom_undo_redo_levels: 10,
                fullpage_hide_in_source_view: true,
                autoresize_max_height: 500,
                visual_table_class: 'table',
                //height: 300,
                //file_browser_callback_types: 'file image media',
                //file_picker_types: 'file image media',
                //toolbar_items_size: 'small',
                style_formats: [
                    {title: 'Uyarılar', items: [
                        { title:'Bilgi', block: 'div', classes:'alert alert-info' },
                        { title:'Başarı', block: 'div', classes:'alert alert-success' },
                        { title:'Uyarı', block: 'div', classes:'alert alert-warning' },
                        { title:'Tehlike', block: 'div', classes:'alert alert-danger' }
                    ]},
                    {title: 'Notlar', items: [
                        { title:'Bilgi', block: 'div', classes:'note note-info' },
                        { title:'Başarı', block: 'div', classes:'note note-success' },
                        { title:'Uyarı', block: 'div', classes:'note note-warning' },
                        { title:'Tehlike', block: 'div', classes:'note note-danger' }
                    ]},
                    {title: 'Etiketler', items: [
                        { title:'Bilgi', inline: 'span', classes:'label label-sm label-info' },
                        { title:'Başarı', inline: 'span', classes:'label label-sm label-success' },
                        { title:'Uyarı', inline: 'span', classes:'label label-sm label-warning' },
                        { title:'Tehlike', inline: 'span', classes:'label label-sm label-danger' }
                    ]},
                    {title: 'Rozetler', items: [
                        { title:'Bilgi', inline: 'span', classes:'badge badge-sm badge-info' },
                        { title:'Başarı', inline: 'span', classes:'badge badge-sm badge-success' },
                        { title:'Uyarı', inline: 'span', classes:'badge badge-sm badge-warning' },
                        { title:'Tehlike', inline: 'span', classes:'badge badge-sm badge-danger' }
                    ]},
                    {title: 'Metinler', items: [
                        { title:'Sönük', inline: 'span', classes:'text-muted' },
                        { title:'Birincil', inline: 'span', classes:'text-primary' },
                        { title:'Başarı', inline: 'span', classes:'text-success' },
                        { title:'Uyarı', inline: 'span', classes:'text-warning' },
                        { title:'Tehlike', inline: 'span', classes:'text-danger' }
                    ]},
                    {title: 'Uyumlu Alanlar', items: [
                        { title:'Bilgisayar 1/6 Sütunu', block: 'div', classes:'col-md-2' },
                        { title:'Bilgisayar 1/4 Sütunu', block: 'div', classes:'col-md-3' },
                        { title:'Bilgisayar 1/3 Sütunu', block: 'div', classes:'col-md-4' },
                        { title:'Bilgisayar 1/2 Sütunu', block: 'div', classes:'col-md-6' },
                        { title:'Tablet 1/6 Sütunu', block: 'div', classes:'col-sm-2' },
                        { title:'Tablet 1/4 Sütunu', block: 'div', classes:'col-sm-3' },
                        { title:'Tablet 1/3 Sütunu', block: 'div', classes:'col-sm-4' },
                        { title:'Tablet 1/2 Sütunu', block: 'div', classes:'col-sm-6' },
                        { title:'Telefon 1/6 Sütunu', block: 'div', classes:'col-xs-2' },
                        { title:'Telefon 1/4 Sütunu', block: 'div', classes:'col-xs-3' },
                        { title:'Telefon 1/3 Sütunu', block: 'div', classes:'col-xs-4' },
                        { title:'Telefon 1/2 Sütunu', block: 'div', classes:'col-xs-6' },
                    ]},
                    { title:'Kaynak', block: 'div', classes:'well' },
                    { title:'Öne Çıkar', block: 'div', classes:'lead' }
                ],
                formats: {
                    alignleft: { selector: '*', classes: 'pull-left' },
                    alignright: { selector: '*', classes: 'pull-right' }
                },
                content_css: [
                    'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
                    '/vendor/laravel-modules-core/assets/global/plugins/bootstrap/css/bootstrap.min.css',
                    '/vendor/laravel-modules-core/assets/global/css/met-global.css'
                ],
                plugins: [
                    'advlist anchor autoresize autolink autosave code charmap codesample colorpicker contextmenu',
                    'emoticons fullscreen hr image imagetools insertdatetime link lists media pagebreak paste',
                    'preview print searchreplace tabfocus table textcolor template wordcount'
                ],
                toolbar: [
                    'fontselect fontsizeselect | forecolor backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table template | styleselect codesample emoticons insertdatetime hr pagebreak charmap',
                    'undo redo print searchreplace | code fullscreen preview'
                ],
                file_browser_callback : theTinymce.fileBrowserCallback
            }
        };
    }
};