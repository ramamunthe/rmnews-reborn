$(".alert-success").show().delay(3000).fadeOut();
$(".alert-danger").show().delay(3000).fadeOut();

$('.carousel-inner').children().first().addClass('active');

$(document).ready(function() {
    $('.basic-multiple').select2();
});


tinymce.init({
    selector: '#editor',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste imagetools wordcount'
      ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    image_title: true,
    automatic_uploads: true,
    relative_urls : false,
    content_css : "",
    convert_urls : false,
      images_upload_url: '/uploadimage',
      file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');


      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    },
    mobile: {
        menubar: true
      },

    content_style: 'body { font-family: Quicksand, sans-serif; font-size:14px }'
  });


