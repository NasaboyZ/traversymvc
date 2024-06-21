document.getElementById('upload-container').addEventListener('click', function() {
    document.getElementById('file-upload').click();
  });

  document.getElementById('file-upload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('preview-image').src = e.target.result;
        document.getElementById('preview-image').style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });