var url;
var docs = [];

$( document ).ready(
    function(){
        $( "#reference" ).change(
            function(e){
                e.preventDefault();

                reference = $( this ).val();
                url = window.location.pathname + '/task/reference/type/' + reference;

                if ( reference == 'mydocuments' ) {
                    $( ".profiles" ).hide();
                    $( ".docs-folder" ).show();
                    $( "#docsfolder" ).val('');
                }
                else if ( reference == 'myprofiledocuments' ) {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).show();
                    $( "#profile" ).val('');
                }
                else if ( reference == 'orcidworks' ) {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).hide();
                    loadData( url, e.type );
                }
                else {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).hide();
                }
            }
        )

        $( "#docsfolder" ).change(
            function(e){
                e.preventDefault();
                folder = $( this ).val();

                if ( folder ) {
                    href = url + '/folder/' + folder;
                    loadData( href, e.type );
                }
            }
        )

        $( "#profile" ).change(
            function(e){
                e.preventDefault();
                profile = $( this ).val();

                if ( profile ) {
                    href = url + '/profile/' + profile;
                    loadData( href, e.type );
                }
            }
        )

        $( this ).on( "change", "input[type='checkbox']", function(e) {
                e.preventDefault();

                size = arrayLength(docs);

                if ( size == 10 ) {
                    if ( $(this).is(":checked") ){
                        alert(labels[LANG]['MAX_DOCS']);
                        $(this).prop('checked', false);
                        return false;
                    }
                }

                id = $( this ).attr("id");
                val = $( this ).val();

                if ( $( this ).is(":checked") ){
                    docs[id] = val;
                } else {
                    delete docs[id];
                }

                size = arrayLength(docs);
                $( ".count" ).text(size);
            }
        )

        $( this ).on( "click", ".paginate_button a", function(e) {
                e.preventDefault();
                href = $( this ).attr("href");
                loadData( href );
            }
        )

        $( this ).on( "click", "button.submit", function(e) {
                e.preventDefault();

                size = arrayLength(docs);

                if ( size > 0 ) {
                    data = $.extend({}, docs);
                    obj = new Object();
                    obj.suggestions = data;
                    href = window.location.pathname + '/task/suggestions';

                    $.post( href, obj, function(data) {
                        location.reload();
                    });
                }
            }
        )

        $( "button.add-collection" ).on( "click", function(e) {
            path = window.location.pathname;
            parts = path.split("/controller/");
            href = parts[0]+"/controller/servicesplatform/control/business/task/addDoc";

            id = $(this).val();
            title = $(this).closest('tr').find('a').text();
            url = $(this).closest('tr').find('a').attr('href');
            author = $(this).closest('tr').find('small').text();

            obj = new Object();
            obj.url = $.trim(url);
            obj.source = 'pesquisa.bvsalud.org';
            obj.author = $.trim(author);
            obj.title = $.trim(title);
            obj.id = $.trim(id);
            obj.userTK = unescape(getCookie('userTK'));

            $.post( href, obj, function(data) {
                if(data == true){
                    alert(labels[LANG]['ADD_DOC_SUCCESS']);
                }else{
                    alert(labels[LANG]['ADD_DOC_FAIL']);
                }
            });
        })

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
          if (parts.length == 2) return parts.pop().split(";").shift();
        }
    }
);
