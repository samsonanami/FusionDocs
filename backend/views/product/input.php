          
<!-- KRAJEE EXPLORER THEME (ADVANCED) -->
 <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
 
<!-- load the CSS files in the right order -->
<link href="css/fileinput.min.css" rel="stylesheet">
<!-- <link href="themes/explorer/theme.css" rel="stylesheet"> -->
 
<!-- load the JS files in the right order -->
<script src="js/fileinput.js"></script>
<!-- <script src="themes/explorer/theme.js"></script> -->
 
<div class="file-loading">
    <input id="input-ke-2" name="input-ke-2[]" type="file" multiple>
</div>
<script>
<!-- must load the font-awesome.css for this example -->
$("#input-ke-2").fileinput({
    theme: "explorer",
    uploadUrl: "/file-upload-batch/2",
    minFileCount: 1,
    maxFileCount: 5,
    overwriteInitial: false,
    previewFileIcon: '<i class="fa fa-file"></i>',
    initialPreview: [
        // IMAGE DATA
       'https://picsum.photos/800/560?image=1071',
        // IMAGE RAW MARKUP
        '<img src="https://picsum.photos/800/560?image=1075" class="kv-preview-data file-preview-image">',
        // TEXT DATA
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mauris ut libero fermentum feugiat eu et dui. Mauris condimentum rhoncus enim, sed semper neque vestibulum id. Nulla semper, turpis ut consequat imperdiet, enim turpis aliquet orci, eget venenatis elit sapien non ante. Aliquam neque ipsum, rhoncus id ipsum et, volutpat tincidunt augue. Maecenas dolor libero, gravida nec est at, commodo tempor massa. Sed id feugiat massa. Pellentesque at est eu ante aliquam viverra ac sed est.",
        // PDF DATA
        'http://kartik-v.github.io/bootstrap-fileinput-samples/samples/pdf-sample.pdf',
        // VIDEO DATA
        "http://kartik-v.github.io/bootstrap-fileinput-samples/samples/small.mp4"
    ],
    initialPreviewAsData: true, // defaults markup  
    initialPreviewConfig: [
        {caption: "Image 11.jpg", size: 762980, url: "/site/file-delete", downloadUrl: 'https://picsum.photos/800/460?image=11', key: 11},
        {previewAsData: false, size: 823782, caption: "Image 13.jpg", url: "/site/file-delete", downloadUrl: 'https://picsum.photos/800/460?image=13', key: 13}, 
        {caption: "Lorem Ipsum.txt", type: "text", size: 1430, url: "/site/file-delete", key: 12}, 
        {type: "pdf", size: 8000, caption: "PDF Sample.pdf", url: "/site/file-delete", key: 14}, 
        {type: "video", size: 375000, filetype: "video/mp4", caption: "Krajee Sample.mp4", url: "/site/file-delete", key: 15} 
    ],
    uploadExtraData: {
        img_key: "1000",
        img_keywords: "happy, nature"
    },
    preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
    previewFileIconSettings: { // configure your icon file extensions
        'doc': '<i class="fa fa-file-word-o text-primary"></i>',
        'xls': '<i class="fa fa-file-excel-o text-success"></i>',
        'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
        'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
        'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
        'htm': '<i class="fa fa-file-code-o text-info"></i>',
        'txt': '<i class="fa fa-file-text-o text-info"></i>',
        'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
        'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
        // note for these file types below no extension determination logic 
        // has been configured (the keys itself will be used as extensions)
        'jpg': '<i class="fa fa-file-photo-o text-danger"></i>', 
        'gif': '<i class="fa fa-file-photo-o text-muted"></i>', 
        'png': '<i class="fa fa-file-photo-o text-primary"></i>'    
    },
    previewFileExtSettings: { // configure the logic for determining icon file extensions
        'doc': function(ext) {
            return ext.match(/(doc|docx)$/i);
        },
        'xls': function(ext) {
            return ext.match(/(xls|xlsx)$/i);
        },
        'ppt': function(ext) {
            return ext.match(/(ppt|pptx)$/i);
        },
        'zip': function(ext) {
            return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
        },
        'htm': function(ext) {
            return ext.match(/(htm|html)$/i);
        },
        'txt': function(ext) {
            return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
        },
        'mov': function(ext) {
            return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
        },
        'mp3': function(ext) {
            return ext.match(/(mp3|wav)$/i);
        }
    }
});
</script>
