
// File Upload//
function ekUpload(){
    function Init() {

        console.log("Upload Initialised");

        let fileSelect    = document.getElementById('file-upload'),
            fileDrag      = document.getElementById('file-drag'),
            submitButton  = document.getElementById('submit-button');

        fileSelect.addEventListener('change', fileSelectHandler, false);

        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            fileDrag.addEventListener('dragover', fileDragHover, false);
            fileDrag.addEventListener('dragleave', fileDragHover, false);
            fileDrag.addEventListener('drop', fileSelectHandler, false);
        }
    }

    function fileDragHover(e) {
        let fileDrag = document.getElementById('file-drag');

        e.stopPropagation();
        e.preventDefault();

        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
    }

    function fileSelectHandler(e) {
        let files = e.target.files || e.dataTransfer.files;

        fileDragHover(e);

        for (let i = 0, f; f = files[i]; i++) {
            parseFile(f);
            uploadFile(f);
        }
    }

    function output(msg) {
        let m = document.getElementById('messages');
        m.innerHTML = msg;
    }

    function parseFile(file) {
        console.log(file.name);

        let isPDF = /\.pdf$/i.test(file.name);
        if (isPDF) {
            document.getElementById('start').classList.add("hidden");
            document.getElementById('response').classList.remove("hidden");
            document.getElementById('notimage').classList.add("hidden");

            let pdfEmbed = document.getElementById('pdf-embed');
            pdfEmbed.style.display = "block";
            pdfEmbed.src = URL.createObjectURL(file);
        } else {
            document.getElementById('pdf-embed').style.display = "none";
            document.getElementById('pdf-embed').src = "";

            document.getElementById('notimage').classList.remove("hidden");
            document.getElementById('start').classList.remove("hidden");
            document.getElementById('response').classList.add("hidden");
            document.getElementById("file-upload-form").reset();
        }
    }

        function setProgressMaxValue(e) {
        let pBar = document.getElementById('file-progress');

        if (e.lengthComputable) {
            pBar.max = e.total;
        }
    }

    function updateFileProgress(e) {
        let pBar = document.getElementById('file-progress');

        if (e.lengthComputable) {
            pBar.value = e.loaded;
        }
    }

    function uploadFile(file) {

        let xhr = new XMLHttpRequest(),
            fileInput = document.getElementById('class-roster-file'),
            pBar = document.getElementById('file-progress'),
            fileSizeLimit = 1024;
        if (xhr.upload) {
            if (file.size <= fileSizeLimit * 1024 * 1024) {
                pBar.style.display = 'inline';
                xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                xhr.upload.addEventListener('progress', updateFileProgress, false);

                xhr.onreadystatechange = function(e) {
                    if (xhr.readyState == 4) {
                    }
                };

                // Start upload
                xhr.open('POST', document.getElementById('file-upload-form').action, true);
                xhr.setRequestHeader('X-File-Name', file.name);
                xhr.setRequestHeader('X-File-Size', file.size);
                xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                xhr.send(file);
            } else {
                output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
            }
        }
    }
    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}
ekUpload();
