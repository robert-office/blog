<script type="text/javascript">
    // We want to preview images, so we register
    // the Image Preview plugin, We also register
    // exif orientation (to correct mobile image
    // orientation) and size validation, to prevent
    // large files from being added


    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    // How to use with Pintura Image Editor:
    // https://pqina.nl/pintura/docs/latest/getting-started/installation/filepond/
</script>
