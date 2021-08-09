$(document).ready(function () {  
    var q = null;
    var p = null;
    var quantity_book = $('#quantity_book').text();  
    var p_initial = (Number)($('#price').val());
    // minus:
    $('#minus').click(function () {
        q = (Number)($('#quantity').val());
        p = (Number)($('#price').val());
        if (q > 1) {
            q--;
            $('#quantity').val(q);
        }
        if (p > p_initial) {
            p -= p_initial;
            $('#price').val(p);
        }
        
    });

    // plus:
    $('#plus').click(function () {
        q = (Number)($('#quantity').val());
        p = (Number)($('#price').val());
        q++;
        if (q > quantity_book) {
            alert('mehsul sayini kecmek olmaz');
        } else {     
            p += p_initial;
            $('#quantity').val(q);
            console.log(p_initial);
            $('#price').val(p);
        }
        
    });
    
    // change:
    $('#quantity').keyup(function () {
        var q_change = (Number)($('#quantity').val());
        
        if (isNaN(q_change)) {
            alert('eded daxil edin');
            $('#quantity').val(1);
        }
        if (q_change == 0) {
            $('#quantity').val(1);
        } else if(q_change>quantity_book) {
            alert('mehsul sayini kecmek olmaz');
            q_change = quantity_book;
            $('#quantity').val(q_change);
        }
        if (q_change != 0) {
            $('#price').val(q_change * p_initial);
        }
            
    });

    $('#price').keyup(function () {
        alert('qiymetde deyisiklik etmek olmaz');
        $('#price').val(p_initial);
    });

    $('.minusUpdate').click(function () {
        var m = $(this).next().val();
        if (m > 1) {
            m--;
            $(this).next().val(m);
        }
    });

    // plus:
    $('.plusUpdate').click(function () {
        var p = $(this).prev().val();
        p++;
        //console.log(quantity_book);
        $(this).prev().val(p);  
    });
});
