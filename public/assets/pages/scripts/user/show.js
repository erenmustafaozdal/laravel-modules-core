;var UserShow;
var Show = {

    /**
     * is auth user
     */
    isAuthUser: false,

    /**
     * user photo srcs
     */
    top_src: '',
    nav_src: '',

    /**
     * user show options
     * @var object
     */
    options: {
        fileinputSrc: '#photo',
        formSrc: '#change-avatar-form'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        UserShow = this;
        this.isAuthUser = isAuthUser;

        this.form = $(this.options.formSrc);

        // LMCFileinput app is init
        LMCFileinput.init(this.getFileinputInitOptions());

        // LMCJcrop app element is setup
        LMCJcrop.setupElements();

        // destroy avatar
        $('#destroy-avatar').on('click', function(event)
        {
            var top_photo = avatarPhotoPath + '/small.jpg',
                nav_photo = avatarPhotoPath + '/big.jpg';

            UserShow.changeAvatar('remove', top_photo, nav_photo);
            LMCApp.startDestroyTimer(function()
            {
                $.ajax({
                    url: destroyAvatarURL,
                    success: function(data)
                    {
                        if (data.result === 'success') {
                            LMCApp.getNoty({
                                message: LMCApp.lang.admin.flash.destroy_success.message,
                                title: LMCApp.lang.admin.flash.destroy_success.title,
                                type: 'success'
                            });
                            return;
                        }
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.destroy_error.message,
                            title: LMCApp.lang.admin.flash.destroy_error.title,
                            type: 'error'
                        });
                        UserShow.changeAvatar('add', UserShow.top_src, UserShow.nav_src);
                    }
                });
            }, function()
            {
                UserShow.changeAvatar('add', UserShow.top_src, UserShow.nav_src);
            });
        });

        // edit info form validation
        Validation.init({
            src: '#user-edit-info',
            isAjax: false,
            validate: {
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    }
                },
                messages: userEditInfoMessages
            }
        });

        // change password form validation
        Validation.init({
            src: '#user-change-password',
            isAjax: false,
            validate: {
                rules: {
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                messages: userChangePasswordMessages
            }
        });

    },

    /**
     * add or remove | change avatar image to page
     *
     * @var type add|remove
     * @var top_photo
     * @var nav_photo
     */
    changeAvatar: function(type, top_photo, nav_photo)
    {
        if (this.isAuthUser) {
            var top = $('li.dropdown-user').find('img');
            this.top_src = top.prop('src');
            top.prop('src', top_photo);
        }
        var nav = $('img#nav-profile-photo');
        this.nav_src = nav.prop('src');
        nav.prop('src', nav_photo);
        var li = $('#destroy-avatar').closest('li');
        if (type === 'add') {
            li.removeClass('hidden');
            return;
        }
        li.addClass('hidden');
    },

    /**
     * avatar photo uploaded
     */
    fileUploaded: function(data)
    {
        if (data.result != 'success') {
            LMCApp.getNoty({
                message: LMCApp.lang.admin.flash.update_error.message,
                title: LMCApp.lang.admin.flash.update_error.title,
                type: 'error'
            });
            return;
        }
        // profil fotoğrafları yerleştirilir
        this.changeAvatar('add', data.photos[0].thumbnails.small, data.photos[0].thumbnails.big);
        // file input sıfırlanır
        LMCFileinput.clear();

        LMCApp.getNoty({
            message: LMCApp.lang.admin.flash.update_success.message,
            title: LMCApp.lang.admin.flash.update_success.title,
            type: 'success'
        });
    },

    /**
     * get file input init options
     */
    getFileinputInitOptions: function()
    {
        return {
            src: UserShow.options.fileinputSrc,
            formSrc:  UserShow.options.formSrc,
            fileinput: {
                uploadUrl: UserShow.form.prop('action'),
                uploadExtraData: function (previewId, index)
                {
                    return {
                        x: $('#x').val(),
                        y: $('#y').val(),
                        width: $('#width').val(),
                        height: $('#height').val()
                    };
                },
                otherActionButtons: '<button type="button" id="image-crop-action" class="btn btn-xs yellow btn-outline tooltips" data-toggle="modal" title="' + LMCApp.lang.admin.ops.crop + '"><i class="icon-crop"></i> </button>'
            },
            // events
            filebrowse: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            fileloaded: function(event, file, previewId, index, reader)
            {
                // init tooltips
                LMCApp.initTooltips();
                // image crop action button click
                $('#image-crop-action').on('click', function(event)
                {
                    // jcrop init
                    theLMCJcrop.jcropPreInit(reader.result)
                        .init(UserShow.getJcropInitOptions());
                });
                // image crop cancel button click
                theLMCJcrop.imgCropCancelBtn.on('click', function(event)
                {
                    theLMCJcrop.jcropReset();
                });
            },
            filecleared: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            filereset: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            fileuploaded: function(event, data, previewId, index)
            {
                UserShow.fileUploaded(data.response);
            },
            filebatchuploadsuccess: function(event, data, previewId, index)
            {
                UserShow.fileUploaded(data.response);
            }
        };
    },

    /**
     * get jquery crop init options
     */
    getJcropInitOptions: function()
    {
        return {
            jcrop: {
                onRelease: function()
                {
                    UserShow.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};
