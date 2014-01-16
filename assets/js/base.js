$(document).ready(function(){
	$('#loading .bar').css('width','100%');
	$('#loading').delay(500).fadeOut();
	$('#gear').delay(900).fadeIn();
	function afterLoad() {
		alert('done');
	}
	$('.buy').click(function(){
		var company; var url; var product;
		company = $(this).attr('data-company');
		url = $(this).attr('data-url');
		product = $(this).attr('data-product');
		$('#disclaimer').modal('show').on('show',function(){
			$(this).find('#title').text(product);
		});
	});
	$.ajax({
		url: 'get_gear.php', 
		dataType: 'json',  
		success: function(items){
    	for (var i in items){
      	var item = items[i];          
				var company = item['company'];
				var companyUrl = item['company_url'];
				var product = item['product'];
				var info = item['info'];
				var image = item['image'];
				var price = item['price'];
				var purchase = item['purchase'];
				$('.item:first-child','#gear').clone().html(function(){
					$(this).removeClass('hide');
					$(this).find('.product').text(product);
					$(this).find('.price').text(price);
					$(this).find('.info').text(info);
					$(this).find('.image').attr({
						src:'/assets/gear/'+image,
						alt:product
					});
					$(this).find('.buy').attr({
						'data-product':product,
						'data-company':company,
						'data-url':purchase
					});
				}).appendTo('.thumbnails');      
    	} 
  	} 
	});
});
  
