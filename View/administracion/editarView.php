<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administración Hotel - Edición de servicios</title>
        <script src='../../View/js/tinymce/jquery.tinymce.min.js'></script>
        <script src='../../View/js/tinymce/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                branding: false,
                content_css: '../../View/css/main.css',
                body_class: 'textoDescripciones',
                autoresize_max_height: 200,
                autoresize_min_height: 20,
                style_formats: [
                    {
                        title: 'Image Left',
                        selector: 'img',
                        styles: {
                            'float': 'left',
                            'margin': '0 10px 0 10px'
                        }
                    },
                    {
                        title: 'Image Right',
                        selector: 'img',
                        styles: {
                            'float': 'right',
                            'margin': '0 0 10px 10px'
                        }
                    },

                    {title: 'Headers', items: [
                            {title: 'h1', block: 'h1'},
                            {title: 'h2', block: 'h2'},
                            {title: 'h3', block: 'h3'},
                            {title: 'h4', block: 'h4'},
                            {title: 'h5', block: 'h5'},
                            {title: 'h6', block: 'h6'}
                        ]},

                    {title: 'Blocks', items: [
                            {title: 'p', block: 'p'},
                            {title: 'div', block: 'div'},
                            {title: 'pre', block: 'pre'}
                        ]},

                    {title: 'Containers', items: [
                            {title: 'section', block: 'section', wrapper: true, merge_siblings: false},
                            {title: 'article', block: 'article', wrapper: true, merge_siblings: false},
                            {title: 'blockquote', block: 'blockquote', wrapper: true},
                            {title: 'hgroup', block: 'hgroup', wrapper: true},
                            {title: 'aside', block: 'aside', wrapper: true},
                            {title: 'figure', block: 'figure', wrapper: true}
                        ]}

                ],

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste jbimages autoresize"
                ],

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | fontsizeselect",

                relative_urls: false,

                fontsize_formats: "8px 10px 12px 14px 18px 24px 36px 1.3rem"
            });
        </script>
    </head>
    <body>
        <textarea rows="10" cols="30"><?= $texto->$parrafo ?></textarea> 
        <br>
        <div id="idTextoMod" class="elementosOcultos"><?= $textoMod ?></div>
    </body>
</html>