$(function(){
    var basketContainer = $('#basket-container')
	// Табы в оформлении заказа
	$('.payment-select').hide();
    $('.payment').hide();
	//$('.payment, .payment1').hide();
	$('.tab, .order-sum').hide();
	$('.shipping-select ul li > div').click(function(){
        var element = $(this);
        var i = element.parent().index();
        var type = parseInt(element.data('type'))-1;
        ajaxParams.id = element.data('id');
        ajaxParams.type = 'delivery';
        $.post('/order/setParam',ajaxParams);
        if(!element.hasClass('active')){
            element.addClass('active').parent().siblings().find('div').removeClass('active');
			$('.payments .payment-select').eq(i).show().siblings().hide().find('li div').removeClass('active');
			$('.tabs .order-sum').eq(i).show().siblings().hide();
			$('.tabs .tab').eq(type).show().siblings().hide();
            //$('.tabs .tab').show();
		}
	});
$('.tabs').hide();
$('.payment-select ul li > div').click(function(){
        var element = $(this);
		var i =element.parent().index();
        ajaxParams.id = element.data('id');
        ajaxParams.type = 'payment';
        $.post('/order/setParam',ajaxParams);
		if(!element.hasClass('active')){
            element.addClass('active').parent().siblings().find('div').removeClass('active');
			//$('.payment-selected .payment1').eq(i).show().siblings().hide();
            $('.payment-selected .payment1 p').text('Способ оплаты:'+element.find('.name').text());
			$('.tabs').show();
		}
	});
	
	// Корзина
	var cart = $('.cart-products');
	function countCart(){
		var totalPrice = 0;
		cart.find('.product').each(function(){
			var count = parseInt($(this).find('.count div span').text());
			var price = parseInt($(this).find('.price input').val());
			// var totalPrice = parseInt($('.cart-bottom .total span').text());
			if(!isNaN(count)){
				var res = count * price;
				totalPrice = totalPrice + res;
				$(this).find('.price span').text(res);
			}
		});
		$('.cart-bottom .total span').text(totalPrice);
	}
	countCart();
	function redrawBasket(){

	    if(basketContainer.length)
        $.post('/cart/redraw',ajaxParams,function(data){
            basketContainer.html(data);
		});
	}
    $('.cart-close').live('click',function(e){
        e.preventDefault();
        $.post('/cart/clear',ajaxParams,function(){basketContainer.html('');})
    });
	var updateLink = cart.data('link');
    var deleteLink = cart.data('del-link');
	cart.find('.product').each(function(){
	    var element = $(this);
	    
	    var countlink = element.find('a');
	    var id = element.data('id');
	    
	    countlink.bind('click',function(e){
		var link = $(this);
		var flag = true;
		var prodCount = parseInt(link.siblings('div').text());
		ajaxParams.id = id;
		ajaxParams.sign=null;
		if(link.hasClass('plus'))
		    {
			prodCount++;
			ajaxParams.sign='+';
		    }
		else if(link.hasClass('minus')&& prodCount > 1)
		    {
			prodCount--;
			ajaxParams.sign='-';
		    }
		else flag = false;
		if(flag)
		{
		    $.post(updateLink,ajaxParams);
		    link.siblings('div').find('span').text(prodCount);
		    countCart();
		}
        if(link.hasClass('delete'))
        {
            if(confirm("Вы действительно хотите удалить товар"))
            {
            $.post(deleteLink,ajaxParams);
            element.remove();
            countCart();
            }
        }
		e.preventDefault();
	    });
	   
	});
	
	
	$('.pp-products .product').each(function(){
	    var element = $(this);
	    var basketLink = element.find('a.basket-link');
	    var orderLink = element.find('a.order-link');
	    var id = element.data('id');
	    
	    basketLink.bind('click',function(e){
		ajaxParams.id = id;
		$.post(basketLink.attr('href'),ajaxParams,function(){
		    redrawBasket();
		});
		
		//alert('Товар добавлен');
		e.preventDefault();
	    });
	    orderLink.bind('click',function(e){
        e.preventDefault();
		ajaxParams.id = id;
		$.post(basketLink.attr('href'),ajaxParams,function(){
            location.href=orderLink.attr('href');
            });
	    })
	});

});
function scrollWindow()
  {
  window.scrollTo(0,0)
  }