
function previewFile() {
    const preview = document.getElementById('preview');
    const file = document.getElementById('upload').files[0];
    const reader = new FileReader();
  
    // listen for 'load' events on the FileReader
    reader.addEventListener("load", function () {
      // change the preview's src to be the "result" of reading the uploaded file (below)
      preview.src = reader.result; //this section to change img preview
    }, false);
  
    // if there's a file, tell the reader to read the data
    // which triggers the load event above
    if (file) {
      reader.readAsDataURL(file); //this section to read file data if data isset
    }
}