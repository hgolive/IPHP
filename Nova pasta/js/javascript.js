

window.onload = function troca(){
    
    var img = 1;
    
    var myVar = setInterval(function trocaBackgroud(){
        
        
        if(img == 1){
            document.body.style.backgroundImage = "URL('img/modelo1.jpg')";
           
        }
        if(img == 2){
            document.body.style.backgroundImage = "URL('img/modelo2.jpg')";
            
        }
        if(img == 3){
            document.body.style.backgroundImage = "URL('img/modelo3.jpg')";
            img = 0;
        }
        img ++;
       
    }, 7000);
    
    
}

