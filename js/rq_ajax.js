function f_avalia(itmCodigo, tipo, id) 
{
	var URL = "";
	
	if(tipo =='1'){var URL="../actions/gosteiItem.php?txtItemCodigo=" + itmCodigo;}
	if(tipo =='2'){var URL="../actions/naogosteiItem.php?txtItemCodigo=" + itmCodigo;}
	if(tipo =='3'){var URL="../actions/denunciaItem.php?txtItemCodigo=" + itmCodigo;}		

	$.ajax({
		type: "POST",
		url: URL,
		success: function(html){
			$(#id).attr('data-theme', 'b');
		}
	});
}