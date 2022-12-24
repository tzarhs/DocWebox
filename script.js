if (document.querySelector('input[name="select"]')) {
    document.querySelectorAll('input[name="select"]').forEach((elem) => {
    elem.addEventListener("change", function(event) {
    if(elem.id=="option2")
        {
            document.getElementById("location").style.display="block";       
            document.getElementById("profession").style.display="block";  
        }else if(elem.id=="option1")   
        {
            document.getElementById("location").style.display="none";     
            document.getElementById("profession").style.display="none"; 
        }

});
});
}    

