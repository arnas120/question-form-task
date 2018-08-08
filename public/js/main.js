/* birthdate inputs --start-- */

    for (i = new Date().getFullYear(); i > 1900; i--) {
        $('#years').append($('<option />').val(i).html(i));
    }
        
    for (i = 1; i < 13; i++) {
        $('#months').append($('<option />').val(i).html(i));
    }

    updateNumberOfDays(); 
        
    $('#years, #months').on("change", function(){
        updateNumberOfDays(); 
    });



function updateNumberOfDays(){
    $('#days').html('');
    month=$('#months').val();
    year=$('#years').val();
    days=daysInMonth(month, year);

    for(i=1; i < days+1 ; i++) {
        $('#days').append($('<option />').val(i).html(i));
    }
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

/* birthdate inputs --end-- */    

/* required check --start-- */  

$(function(){

    var requiredCheckboxes = $('input[type=checkbox][name=langs]');

    requiredCheckboxes.change(function() {

        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        }

        else {
            requiredCheckboxes.attr('required', 'required');
        }
    });

});

/* required check --end-- */



/* save form state --start-- */

$("#name").change(function(){
    var nameVal = this.value;
    Cookies.set('name', nameVal);
});

$("#years").change(function(){
    var nameVal = this.value;
    Cookies.set('birthYear', nameVal);
});

$("#months").change(function(){
    var nameVal = this.value;
    Cookies.set('birthMonth', nameVal);
});

$("#days").change(function(){
    var nameVal = this.value;
    Cookies.set('birthDay', nameVal);
});

$("input[type=radio][name=gender]").change(function(){
    var nameVal = this.value;
    Cookies.set('gender', nameVal);
});

$("input[type=radio][name=intProgramming]").change(function(){
    var intProg = this.value;
    Cookies.set('intrested', intProg);
    if (intProg == 'Ne') {
        $("#qForm").submit();
    }
});


if (Cookies.get('progLangs') != undefined) {
    var progVal = Cookies.getJSON('progLangs');
}
else {
    var progVal = [];
}

$("input[type=checkbox]#lang-y").change(function(){
    if (this.checked) {
    progVal.push(this.value);
    Cookies.set('progLangs', progVal);
    }
    else {
        progVal.splice(progVal.indexOf(this.value),1);
        Cookies.set('progLangs', progVal);
    }

});

$('input[type=checkbox]#lang-no').on('change', function() {
    if (this.checked) {
        $('input[type=checkbox]#lang-y').not(this).prop('checked', false).attr('disabled', true);
        Cookies.remove('progLangs');
        Cookies.set('noLang', 'true'); 
    }
    else {
        $('input[type=checkbox]#lang-y').not(this).attr('disabled', false);
        Cookies.remove('noLang');
    }
});

$("#finish").click(function(){
    Cookies.set('finished', 'true');
});


/* save form state --end-- */


/* load state of form --start-- */

$( document ).ready(function() {

    /* cookie variables */
    var nameCookie = Cookies.get('name');
    var birthYearCookie = Cookies.get('birthYear');
    var birthMonthCookie = Cookies.get('birthMonth');
    var birthDayCookie = Cookies.get('birthDay');
    var genderCookie = Cookies.get('gender');
    var progLangsCookie = Cookies.get('progLangs');
    var instrestedCookie = Cookies.get('intrested');
    var noLangCookie = Cookies.get('noLang');
    var finishedCookie = Cookies.get('finished');
    /* * */

        if (nameCookie != undefined) {
            $("#name").val(nameCookie);
        }

        if (birthYearCookie != undefined) {
            $("#years").val(birthYearCookie);
        }

        if (birthMonthCookie != undefined) {
            $("#months").val(birthMonthCookie);
        }

        if (birthDayCookie != undefined) {
            $("#days").val(birthDayCookie);
        }

        if (genderCookie != undefined) {
            var $radios = $('input:radio[name=gender]');
            $radios.filter('[value='+genderCookie+']').prop('checked', true);
        }

        if (progLangsCookie != undefined) {
            var langs = JSON.parse(progLangsCookie);
            $.each(langs, function (index, value) {
                $('input#lang-y[value="' + value.toString() + '"]').prop("checked", true);
              });
        }

        if (instrestedCookie == 'Ne') {
            var url = window.location.pathname;

            if (url != '/finished') {
                window.location.replace("/finished");
            }
        }

        if (noLangCookie == 'true' && finishedCookie == 'true') {
            var url = window.location.pathname;

            if (url != '/finished') {
                window.location.replace("/finished");
            }
        }


});

/* load state of form --end-- */