if (document.querySelector('input[name="select"]')) {
    document.querySelectorAll('input[name="select"]').forEach((elem) => {
    elem.addEventListener("change", function(event) {
    if(elem.id=="option2")
        {
            document.getElementById("profession").style.display="block";  
            document.getElementById("city").style.display="block";   
            document.getElementById("address").style.display="block";   
            document.getElementById("tel").style.display="block";                   
        }else if(elem.id=="option1")   
        {
            document.getElementById("profession").style.display="none";
            document.getElementById("city").style.display="none";     
            document.getElementById("address").style.display="none";  
            document.getElementById("tel").style.display="none";  
        }

});
});
}    

