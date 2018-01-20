

jQuery(document).ready(function(){
    $('.etat').hide() 
      $('.alr').hide()
    
  function validation(id){
$('#'+id).on('blur',function(){
if(ver($(this))=='vide'){
 $('.alr').show().text('veuillez saisir le '+' '+$(this).attr('val-champ'))}
else{
 $('.alr').hide()
}  
})}
validation('pass')
validation('login')

       function ver(champ){
         if(champ.val()==''){
           return  'vide';
         }else{
           return 'rempli'
         }
       }
       
 
     
   
 
   
 
   
 });