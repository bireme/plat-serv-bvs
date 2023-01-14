function loadData(url, type, obj) {
    $('#loading').show();
    
    $(".result").load( url + ' .result', obj, function() {
        if ( 'change' == type ) {
            docs = [];
            $( ".count" ).text(0);
        } else{
            for (var key in docs) {
                size = arrayLength(docs);
                $( ".count" ).text(size);
                $('#'+key).prop('checked', true);
            }
        }                

        $('#loading').hide();
    });
}

function arrayLength(arr) {
    obj = $.extend({}, arr);
    size = Object.keys(obj).length;
    return size;
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  
  if (parts.length == 2) {
    return parts.pop().split(";").shift();
  } else {
    return false;
  }
}

function isJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }

    return true;
}