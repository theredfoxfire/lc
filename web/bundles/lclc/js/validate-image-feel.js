var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    var input, file;
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Silahkan pilih file image, dengan type: " + _validFileExtensions.join(", "));
                    return false;
                }


            }
        }

    }
    if (!window.FileReader) {
					alert("The file API isn't supported on this browser yet.");
					return false;
				}

		input = document.getElementById('lc_lcbundle_feeling_file');
		if (!input) {
      input = document.getElementById('foto_file');
      if (!input) {
        alert("Um, couldn't find the fileinput element.");
				return false;
      }
		}
		if (!input.files) {
			alert("This browser doesn't seem to support the `files` property of file inputs.");
			return false;
		}
		if (!input.files[0]) {
			alert("Please select a file before clicking 'Load'");
			return false;
		}
		file = input.files[0];
		if(file.size > 10200000) {
			alert("Ukuran file tidak boleh melebihi 10 MB.");
			return false;
		}

    return true;
}
