// video ve photo yönetimi
var fileManagement = 'fileinput';
$('#media_accordion a.accordion-toggle').on('click', function(e)
{
    var element = $(this);
    var href = element.prop('href');
    href = href.split('#');
    href = href[1];
    var elfinder = $('#elfinder-photo');
    var fileinput = $('#photo');
    var video = $('#video');

    // eğer kapandı ise geri dön
    if ( $('#' + href).hasClass('in') ) {
        return true;
    }

    if (href === 'photo_accordion') {
        // video alanı disabled
        video.val('').prop('disabled',true);
        // en son hangisi açıksa onu aç diğerini kapat
        if (fileManagement === 'fileinput') {
            LMCFileinput.enable(fileinput);
            elfinder.val('').prop('disabled',true);
        } else {
            LMCFileinput.disable(fileinput);
            elfinder.prop('disabled',false);
        }
        return true;
    }

    // açık olan file management elemanını kaydet, file management elemanlarını kapat, video elemanını aç
    fileManagement = elfinder.prop('disabled') ? 'fileinput' : 'elfinder';
    LMCFileinput.disable(fileinput);
    elfinder.val('').prop('disabled',true);
    video.val('').prop('disabled',false);
});

LMCApp.initInputMask({
    src: '.inputmask-youtube',
    type: 'youtube'
});