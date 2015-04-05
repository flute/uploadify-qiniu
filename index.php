<html>
    <head>
        <meta charset="utf-8">
        <title>uploadify+七牛</title>
    </head>
    <body>
        <form>
            <label>缩略图：</label>
            <input type="file" name="file_upload" id="file_upload" />
            <input type="hidden" id="cover" name="cover" />
            <img id="target"  width="166px" height="166px"/>
        </form>
    </body>
</html>
<link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.1.min.js"></script>
<script src="uploadify/jquery.uploadify.js"></script>
<script type="text/javascript">
$(function() {
    $("#file_upload").uploadify({
        'auto'              : true,
        'buttonText'        : '请选择图片',
        'fileTypeExts'      : '*.gif; *.jpg; *.jpeg; *.png;',
        'fileSizeLimit'     : '1024KB',
        'swf'               : '/admin/uploadify/uploadify.swf',
        'uploader'          : '/admin/uploadify/uploadify.php',
        'onUploadSuccess'   : function(file, data, response) {
            $("#cover").val(data);
            $("#target").attr("src",data);
        }
    });
})
</script>



