<script type="text/javascript">
    // We want to preview images, so we register
    // the Image Preview plugin, We also register
    // exif orientation (to correct mobile image
    // orientation) and size validation, to prevent
    // large files from being added
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginImageEdit
    );

    // Select the file input and use
    // create() to turn it into a pond
    FilePond.create(
        document.getElementsByClassName('filepond');
    );

    // How to use with Pintura Image Editor:
    // https://pqina.nl/pintura/docs/latest/getting-started/installation/filepond/
</script>
