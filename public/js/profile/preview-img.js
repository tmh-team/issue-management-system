function showPreviewImage(event) {
    let file = event.target.files[0];
    if (file === undefined) {
        return;
    }
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#preview-img').attr('src', e.target.result);
    }

    reader.readAsDataURL(event.target.files[0]);
}
