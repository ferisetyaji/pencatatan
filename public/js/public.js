$(document).ready(function(){
    $('#myTable').DataTable();
    $('#myTable1').DataTable();
    $('.dataTables_info').remove();

    $('.min-qty').click(function(){
    	var id = $(this).attr('data-id');
    	var qty = parseInt($('#nilai-qty-' + id).text());
    	var harga = parseInt($('#harga-' + id).attr('data-harga'));
    	console.log(harga);
    	if(qty > 0){
    		qty--;
    		harga *= qty;
    		var coin = harga > 0 ? numeral(harga).format('0,0'): 0;
    		$('#harga-' + id).text('Rp. ' + coin);
    		$('#nilai-qty-' + id).text(qty);
    		$('#stok-qty-' + id).val(qty);
    	}
    });

    $('.plus-qty').click(function(){
    	var id = $(this).attr('data-id');
    	var qty = parseInt($('#nilai-qty-' + id).text());
    	var harga = parseInt($('#harga-' + id).attr('data-harga'));
    	console.log(harga);
    	qty++;
    	harga *= qty;
    	var coin = harga > 0 ? numeral(harga).format('0,0'): 0;
    	$('#harga-' + id).text('Rp. ' + coin);
    	$('#nilai-qty-' + id).text(qty);
    	$('#stok-qty-' + id).val(qty);
    });
});

countCart();
suka();

function countCart(){
    var keranjang = localStorage.getItem('keranjang') != undefined ? JSON.parse(localStorage.getItem('keranjang')): [];
    var jmlKeranjang = 0;
    for(var i = 0; i < keranjang.length; i++){

        jmlKeranjang++;
    }

    document.querySelector('#j-keranjang').innerHTML = jmlKeranjang;
    if(jmlKeranjang == 0){
        $('.list-keranjang').html('<div style="text-align:center">Keranjang kosong</div>');
        $('.keranjang-btn').hide();
    }

    if(localStorage.getItem('keranjang') != undefined){
        var evenArray = keranjang;
        var arrayOut = [];
        var count = 0;
        var start = false;

        for (i = 0; i < evenArray.length; i++) {
             for (j = 0; j < arrayOut.length; j++) {
                   if ( evenArray[i] == arrayOut[j] ) {
                        start = true;
                   }
              }
             count++;
            if (count == 1 && start == false) {
                arrayOut.push(evenArray[i]);
            }
            start = false;
            count = 0;
        }

        for(var s = 0; s < arrayOut.length; s++){
            var item_cart = 0;
            for(var k = 0; k < keranjang.length; k++){
                item_cart += keranjang[k] == arrayOut[s] ? 1:0; 
            }

            $('.beli-'+arrayOut[s]).text('Beli ('+item_cart+')');
        }
    }
}

$(document).on('click', '.suka-item', function(){
    var data = localStorage.getItem('suka') != undefined ? JSON.parse(localStorage.getItem('suka')): [];
    var id = $(this).attr('data-id');
    var cart_a = [];
    var cart_b = [];
    for(var i = 0; i < data.length; i++){
        if(data[i] == id){
            cart_a.push(data[i]);
        }else{
            cart_b.push(data[i]);
        }
    }
    if(cart_a.length > 0){
        cart_a.pop();
    }

    var list_cart = [];
    for(var a = 0; a < cart_a.length; a++){
        list_cart.push(cart_a[a]);
    }
    for(var b = 0; b < cart_b.length; b++){
        list_cart.push(cart_b[b]);
    }
    data = JSON.stringify(list_cart);
    localStorage.setItem('suka', data);
    $(this).removeClass('suka-item');
    $(this).addClass('tidak-suka-item');
    suka1();
});

$(document).on('click', '.tidak-suka-item', function(){
    var id = $(this).attr('data-id');
    var data = localStorage.getItem('suka') != undefined ? JSON.parse(localStorage.getItem('suka')): [];

    data.push(id);
    data = JSON.stringify(data);
    localStorage.setItem('suka', data);
    suka();
    $(this).removeClass('tidak-suka-item');
});


function suka(){
    var keranjang = localStorage.getItem('suka') != undefined ? JSON.parse(localStorage.getItem('suka')): [];
    var jmlKeranjang = 0;

    if(localStorage.getItem('suka') != undefined){
        var evenArray = keranjang;
        var arrayOut = [];
        var count = 0;
        var start = false;

        for (i = 0; i < evenArray.length; i++) {
             for (j = 0; j < arrayOut.length; j++) {
                   if ( evenArray[i] == arrayOut[j] ) {
                        start = true;
                   }
              }
             count++;
        if (count == 1 && start == false) {
                arrayOut.push(evenArray[i]);
            }
            start = false;
            count = 0;
        }

        for(var s = 0; s < arrayOut.length; s++){
            jmlKeranjang++;
            $('.suka-'+arrayOut[s]).addClass('suka-item');
            $('.suka-'+arrayOut[s]).removeClass('tidak-suka-item');
        }
    }

    document.querySelector('#j-suka').innerHTML = jmlKeranjang;
}

function suka1(){
    var keranjang = localStorage.getItem('suka') != undefined ? JSON.parse(localStorage.getItem('suka')): [];
    var jmlKeranjang = 0;

    if(localStorage.getItem('suka') != undefined){
        var evenArray = keranjang;
        var arrayOut = [];
        var count = 0;
        var start = false;

        for (i = 0; i < evenArray.length; i++) {
             for (j = 0; j < arrayOut.length; j++) {
                   if ( evenArray[i] == arrayOut[j] ) {
                        start = true;
                   }
              }
             count++;
        if (count == 1 && start == false) {
                arrayOut.push(evenArray[i]);
            }
            start = false;
            count = 0;
        }

        for(var s = 0; s < arrayOut.length; s++){
            jmlKeranjang++;
        }
    }

    document.querySelector('#j-suka').innerHTML = jmlKeranjang;
}



$(document).on('click', '.plus-cart', function(){
    var data = localStorage.getItem('keranjang') != undefined ? JSON.parse(localStorage.getItem('keranjang')): [];
    var id = $(this).attr('data-id');
    data.push(id);
    var cart_a = [];
    for(var i = 0; i < data.length; i++){
        if(data[i] == id){
            cart_a.push(data[i]);
        }
    }
    $('.jml-cart-'+id).text(cart_a.length);
    $('.jml-cart-'+id).attr('data-jml', cart_a.length);
    data = JSON.stringify(data);
    localStorage.setItem('keranjang', data);
    countCart();
});

$(document).on('click', '.min-cart', function(){
    var data = localStorage.getItem('keranjang') != undefined ? JSON.parse(localStorage.getItem('keranjang')): [];
    var id = $(this).attr('data-id');
    var cart_a = [];
    var cart_b = [];
    for(var i = 0; i < data.length; i++){
        if(data[i] == id){
            cart_a.push(data[i]);
        }else{
            cart_b.push(data[i]);
        }
    }
    if(cart_a.length > 0){
        if(cart_a.length == 1){
            $('.cart-item-'+id).remove();
        }
        cart_a.pop();
    }
    $('.jml-cart-'+id).text(cart_a.length);
    $('.jml-cart-'+id).attr('data-jml', cart_a.length);
    var list_cart = [];
    for(var a = 0; a < cart_a.length; a++){
        list_cart.push(cart_a[a]);
    }
    for(var b = 0; b < cart_b.length; b++){
        list_cart.push(cart_b[b]);
    }
    data = JSON.stringify(list_cart);
    localStorage.setItem('keranjang', data);
    countCart();
});

$('.ac-alamat').click(function(){
    var up = $('.fa-chevron-up').attr('class');
    var down = $('.fa-chevron-down').attr('class');
    if(up != undefined){
        $('.fa-chevron-up').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
    if(down != undefined){
        $('.fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
});

