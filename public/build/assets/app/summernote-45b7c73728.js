;var theSummernote;
var Summernote = {

    /**
     * element
     */
    element: null,

    /**
     * options
     */
    options: {},

    /**
     * init function
     *
     * @param options
     */
    init: function(options)
    {
        // object
        theSummernote = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // element
        this.element = $(this.options.src);

        // summernote init
        this.element.summernote(this.options.summernote);

    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '.summernote',
            summernote: {
                placeholder: LMCApp.lang.admin.ops.write_here,
                height: 500,
                lang: 'tr-TR',
                dialogsInBody: true,
                toolbar: [
                    ['font', ['fontname','fontsize']],
                    ['font-style', ['bold','italic','underline']],
                    ['font-style', ['superscript','subscript','strikethrough','clear','height']],
                    ['color', ['color']],
                    ['style', ['style']],
                    ['para', ['paragraph','ul','ol']],
                    ['insert', ['addclass','table','link','picture','video','map','hr']],
                    ['misc', ['print']],
                    ['ops', ['undo','redo']],
                    ['view', ['fullscreen','codeview']],
                    ['help', ['help']]
                ],
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['floatBS', ['floatBSLeft', 'floatBSNone', 'floatBSRight']],
                        ['custom', ['imageAttributes']],
                        ['remove', ['removeMedia']]
                    ]
                },
                map: {
                    apiKey: 'AIzaSyDt_BTC7JZ0TPkjSi0gRNmeTOdkbcqgRdo',
                    center: {
                        lat: 44,
                        lng: 23
                    },
                    zoom: 5
                },
                addclass: {
                    debug: false,
                    classTags: [
                        {tag: 'div', title:'Uyarı (Bilgi)',value:'alert alert-info'},
                        {tag: 'div', title:'Uyarı (Başarılı)',value:'alert alert-success'},
                        {tag: 'div', title:'Uyarı (Uyarı)',value:'alert alert-warning'},
                        {tag: 'div', title:'Uyarı (Tehlike)',value:'alert alert-danger'},
                        {tag: 'div', title:'Not (Bilgi)',value:'note note-info'},
                        {tag: 'div', title:'Not (Başarılı)',value:'note note-success'},
                        {tag: 'div', title:'Not (Uyarı)',value:'note note-warning'},
                        {tag: 'div', title:'Not (Tehlike)',value:'note note-danger'},
                        {tag: 'div', title:'Kaynak',value:'well'},
                        {title:'Öne Çıkar',value:'lead'},
                        {title:'Kenarları Yuvarlanmış fotoğraf',value:'img-rounded'},
                        {title:'Daire Fotoğraf',value:'img-circle'},
                        {title:'Uyumlu Fotoğraf',value:'img-responsive'},
                        {title:'Sönük Metin',value:'text-muted'},
                        {title:'Birincil Metin',value:'text-primary'},
                        {title:'Uyarı Metni',value:'text-warning'},
                        {title:'Tehlike Metni',value:'text-danger'},
                        {title:'Başarı Metni',value:'text-success'},
                    ]
                }
            } // end of summernote
        };
    }

};