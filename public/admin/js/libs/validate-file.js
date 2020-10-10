$(".file-upload").on("change", function(){
    if(window.File && window.FileReader && window.FileList && window.Blob){
        var size = this.files[0].size;
        //5 MB
        if(size > (5*2**21)){
            alert("El Archivo es mayor al tamaño soportado");
            $(".file-upload").val("");
        }
    }
});
