# summernote-image-attributes
A plugin for the [Summernote](https://github.com/summernote/summernote/) WYSIWYG editor.

Adds two buttons to the image popover to edit title, alt, class and style attributes, and Links with relevant Attributes (Thanks to [minidc](https://github.com/ninidc)).

It also optionally adds a dropdown to choose from Bootstrap image shapes (Thanks to [MarcosBL](https://github.com/MarcosBL)).

![summernote-image-attributes-popover](https://github.com/StudioJunkyard/summernote-image-attributes/blob/master/summernote-image-attributes-popover.png)

![summernote-image-attributes-modal](https://github.com/StudioJunkyard/summernote-image-attributes/blob/master/summernote-image-attributes-dialog.png)

### Installation

#### 1. Include JS

Include the following code after Summernote:

```html
<script src="summernote-image-attributes.js"></script>
```

#### 2. Supported languages

Currently available in English, Spanish, French and Chinese (Traditional)!

#### 3. Summernote options

Finally, customize the Summernote image popover.

```javascript
$(document).ready(function() {
    $('#summernote').summernote({
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['custom', ['imageAttributes', 'imageShape']],
                ['remove', ['removeMedia']]
            ],
        },
        lang: 'en-US'
/* Do NOT set the below options when Calling Summernote, we're working on why these are throwing an error that causes the plugin not to work.
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty:false // true = remove attributes | false = leave empty if present
        },
        imageShape: {
            icon: '<i class="note-icon-picture"/>'
        }
*/
    });
});
```

### Contributors
- Add links to Image
  - Thank you to [minidc](https://github.com/ninidc)
  - Thank you to [MarcosBL](https://github.com/MarcosBL)
- French Translation
  - Thank you to [b-alidr](https://github.com/b-alidra)
- Chinese (Traditional) Translation
  - Thank you to [horkenw](https://github.com/horkenw)
