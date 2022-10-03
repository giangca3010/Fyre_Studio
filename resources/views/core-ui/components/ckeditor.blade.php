<script>
    ClassicEditor
        .create( document.querySelector( '#<?php echo $id; ?>' ), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'indent', 'outdent', '|',
                    'ckfinder', 'blockQuote', 'insertTable', 'mediaEmbed',
                    'undo', 'redo'
                ]
            },
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
