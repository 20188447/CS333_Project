			function incrementValue(id)
			{
			    var value = parseInt(document.getElementById(id).value, 10);
			    value = isNaN(value) ? 0 : value;
			    if (value<100) {
			    value++;}
			    document.getElementById(id).value = value;
			 
			}
			function decrementValue(id)
			{
			    var value = parseInt(document.getElementById(id).value, 10);
			    value = isNaN(value) ? 0 : value;
			    if (value>1) {
			    value--;}
			    document.getElementById(id).value = value;
			    
			}
			
  			