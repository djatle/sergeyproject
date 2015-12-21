  addEventListener('load', initiate);
  function initiate(){

  var dell = document.querySelectorAll('.dell');
	   for(var i=0, cnt=dell.length; i<cnt;i++){
 
		   dell[i].addEventListener('click', deletecat);
	      
	   }
	  
  }
  
   function deletecat(){

	   
	   var ask = 'Вы действительно хотите выгнать бедного котеньку?';
	   if(confirm(ask)){
		   	   var attr = this.getAttribute('data_url');
		   console.log(attr);
	   }
	   else{
		   console.log('no');
	   }
   }
	  


