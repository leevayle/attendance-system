//written by kinanga  -> leevayle@protonmail.com

//checkboxes
const ch1 = document.getElementById('cbx-51');
const ch2 = document.getElementById('cbx-52');
const ch3 = document.getElementById('cbx-53');

//checkbox parents
const chb1 = document.getElementById('condition1');
const chb2 = document.getElementById('condition2');
const chb3 = document.getElementById('condition3');

//progress indicator
const pindicator = document.getElementById('pindicator');

//autochecking on click
chb1.addEventListener('click', ()=>{
    ch1.checked = 'true';
    pindicator.style.background = '#ffc4c4'; 
    updateP();   
});

chb2.addEventListener('click', ()=>{
     
     if(ch2.checked){
        ch2.checked = 'false';
     }else{
        ch2.checked = 'true';
     }
     pindicator.style.background = '#ffc4c4';
     updateP();
 });

 chb3.addEventListener('click', ()=>{
     ch3.checked = 'true';
     pindicator.style.background = '#ffc4c4';
     updateP();
 });

 function updateP(){
    if(ch1.checked){

        pindicator.style.background = '#ffc4c4';

     } 
      if(ch1.checked && ch2.checked){

        pindicator.style.background = '#fdff97';
        
     }
     if(ch1.checked && ch3.checked){

        pindicator.style.background = '#fdff97';
        
     }
     if(ch2.checked && ch3.checked){

        pindicator.style.background = '#fdff97';
        
     }
      if(ch1.checked && ch2.checked && ch3.checked){
        pindicator.style.background = '#a3ff97';
        setTimeout(()=>{
            pindicator.style.display = 'none';
            document.getElementById('proceed').style.display = 'block';
        },800);
     }else{
        document.getElementById('proceed').style.display = 'none';
        pindicator.style.display = 'block';            
     }
 }



//proceed
function Proceed(){    
        window.location.href=" install.php";    
};