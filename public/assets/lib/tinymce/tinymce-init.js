var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host;
tinymce.init({
    selector: 'textarea',
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern responsivefilemanager'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',

    external_filemanager_path:baseUrl+"/assets/lib/filemanager/",
    filemanager_title:"Filemanager" ,
    external_plugins: { "filemanager" : "../filemanager/plugin.min.js"},
    filemanager_access_key:"lB2PK8fl735R7xM849MA50UHFJXpID38" ,

    image_advtab: true
});