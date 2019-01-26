'use strict';

$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut(); 
	$("#preloder").delay(400).fadeOut("slow");

});

// RATINGS

var $star_rating = $('.star-rating .fa');

var SetRatingStar = function () {
    return $star_rating.each(function () {
        if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
        } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
        }
    });
};

$star_rating.on('click', function () {
    $star_rating.siblings('input.rating-value').val($(this).data('rating'));
    return SetRatingStar();
});

SetRatingStar();
$(document).ready(function () {

});

// RATING END

//side bar selection effect
$(document.body).on("click", ".effect", function (e) {
    e.preventDefault();
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
});


$('select').change(function(){
    var sum = 0;
    $('select :selected').each(function() {
        sum += Number($(this).val());
    });
     $("#sum").html(sum);
});

$(document).ready(function() {   
    $('#processingFeePer').keyup(function() {
        var principalValue = parseFloat($('#principal').val());
        var principalPerValue = parseFloat($('#processingFeePer').val());
        var ProcessingFee = (principalValue*(principalPerValue/100));
        $('#processingFee').val(ProcessingFee);
      });

    $('.selectedValue').change(function(){     
        var total = 0;
        var loanDuration = $('#loanDuration').val();
        var loanDurationCycle = $('#loanDurationCycle').val();
        var loanRepaymentCycle = $('#loanRepaymentCycle').val();
        var principalValue = parseFloat($('#principal').val());
        var principalPerValue = parseFloat($('#processingFeePer').val());
        var ProcessingFee = (principalValue*(principalPerValue/100));


        // alert("Hello! you did not select any duration"+ProcessingFee);
        // Check for daily
        if(loanDurationCycle=="Days" && loanRepaymentCycle =="Daily"){
            total=loanDuration*4;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Weeks" && loanRepaymentCycle =="Daily"){
            total=loanDuration*6;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Months" && loanRepaymentCycle =="Daily"){
            total=loanDuration*30;
            $('#amount').val(total);
        }else if(loanDurationCycle=="Years" && loanRepaymentCycle =="Daily"){
            total=loanDuration*364;
            $('#amount').val(total);
        }
        
        // Check for weekly
        else if(loanDurationCycle=="Days" && loanRepaymentCycle =="Weekly"){
            total=loanDuration*6;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Weeks" && loanRepaymentCycle =="Weekly"){
            total=loanDuration*1;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Months" && loanRepaymentCycle =="Weekly"){
            total=loanDuration*4;
            $('#amount').val(total);
        }else if(loanDurationCycle=="Years" && loanRepaymentCycle =="Weekly"){
            total=loanDuration*52;
            $('#amount').val(total);
        }
         // Check for biweekly
         else if(loanDurationCycle=="Days" && loanRepaymentCycle =="Biweekly"){
            total=(loanDuration*6)/2;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Weeks" && loanRepaymentCycle =="Biweekly"){
            total=(loanDuration*1)/2;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Months" && loanRepaymentCycle =="Biweekly"){
            total=(loanDuration*4)/2;
            $('#amount').val(total);
        }else if(loanDurationCycle=="Years" && loanRepaymentCycle =="Biweekly"){
            total=(loanDuration*52)/2;
            $('#amount').val(total);
        }
         // Check for monthly
         else if(loanDurationCycle=="Days" && loanRepaymentCycle =="Monthly"){
            total=loanDuration/30;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Weeks" && loanRepaymentCycle =="Monthly"){
            total=loanDuration/4;
            $('#amount').val(total);
        }else if(loanDurationCycle == "Months" && loanRepaymentCycle =="Monthly"){
            total=loanDuration*1;
            $('#amount').val(total);
        }else if(loanDurationCycle=="Years" && loanRepaymentCycle =="Monthly"){
            total=loanDuration*12;
            $('#amount').val(total);
        }
        else{
            // alert("Hello! you did not select any duration");
        }
    });
// Show loan product fields
    $(function () {
        $('div[class="toggle"]').hide();
        //show it when the checkbox is clicked
        $('input[name="Loancheckbox"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('div[class="toggle"]').fadeIn();
            } else {
                $('div[class="toggle"]').hide();
            }
        });
    });

   
});    


($function(){
    //get the click event of customer create button
    $('modalButton').click(function(){
        $('#modal').modal('show')
        .find(#modalContent)
        .load($(this).attr('value');
    });
});
