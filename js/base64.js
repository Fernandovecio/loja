$('#fotoId').on('change', function(){

   var reader = new FileReader();
    
   var svgTag = document.getElementsByTagName('svg')[0];
   if (svgTag !=null){
   
   
       var imgTag = document.createElement('img');
   
       imgTag.setAttribute('id', 'tenisId');
   
       svgTag.parentNode.removeChild(imgTag, svgTag);
   }  

    reader.onloadend = function(){
    $('tenisId').attr('src', reader.result);

   };

    reader.readAsDataURL(this.file[0]);
});