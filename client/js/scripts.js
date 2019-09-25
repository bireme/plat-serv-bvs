var url;
var docs = [];

/********** Suggestions Scripts **********/
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

$( document ).on( "change", "#tab_config input[type='checkbox']", function(e) {
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

$( document ).on( "click", "#tab_config .paginate_button a", function(e) {
        e.preventDefault();
        href = $( this ).attr("href");
        loadData( href );
    }
)

$( document ).on( "click", "#tab_config button.submit", function(e) {
        e.preventDefault();

        size = arrayLength(docs);

        if ( size > 0 ) {
            data = $.extend({}, docs);
            obj = new Object();
            obj.suggestions = data;
            href = window.location.pathname + '/task/suggestions';

            $('#loading').show();
            
            $('html, body').animate({
                scrollTop: $("#loading").offset().top
            }, "fast");

            $.post( href, obj, function(data) {
                if(data == true){
                    location.reload();
                }else{
                    $('#loading').hide();
                    alert(labels[LANG]['SD_FAIL']);
                }
            });
        }
    }
)

$( document ).on( "click", ".fav-docs div.record a, .themes div.record a", function(e) {
        // e.preventDefault();

        val = $( this ).text();
        path = window.location.pathname;
        parts = path.split("/controller/");
        href = parts[0]+"/controller/suggesteddocs/control/business/task/suggestions";

        data = $.extend({}, [val]);
        obj = new Object();
        obj.suggestions = data;
        obj.prefix = 'RD';

        $.post( href, obj, function(data) {
            console.log(data);
        });
    }
)

/********** Interest Topics Scripts **********/
/*
$('a.add-collection').popover({
    html : true,
    placement : 'right',
    title: labels[LANG]['COLLECTIONS'],
    // trigger: 'manual',
    content : function() {
        return $('#docsfolderlist').html();
    }
});

$( document ).on('change', '.docsfolderlist', function(e) {
    e.preventDefault();

    path = window.location.pathname;
    parts = path.split("/controller/");
    href = parts[0]+"/controller/servicesplatform/control/business/task/addDoc";

    folder = $(this).val();
    text = $('.docsfolderlist option:selected').text();
    id = $(this).closest('td').find('a.add-collection').attr('value');
    title = $(this).closest('tr').find('div.record a').text();
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
        if (isJSON(data)){
            response = $.parseJSON(data);
        }else{
            response = data;
        }

        if(data == true){
            href = parts[0]+"/controller/directories/control/business/task/movedoc";

            obj = new Object();
            obj.mode = 'persist';
            obj.document = $.trim(id);
            obj.fromDirectory = 0;
            obj.moveToDirectory = folder;

            $.post( href, obj, function(data) {
                alert(labels[LANG]['ADD_DOC_SUCCESS']+' '+text);
            });
        }else if(typeof response == 'object'){
            if ( response.dir == 'INCOMING_FOLDER' )
                alert(labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']);
            else
                alert(labels[LANG]['DOC_EXISTS']+' '+response.dir);
        }else{
            alert(labels[LANG]['ADD_DOC_FAIL']);
        }
        
        $('.popover').popover('hide');
    });
});
*/
$( document ).on('change', 'input[name=docsfolderlist]', function(e) {
    $('#docsfolderlist').removeAttr('disabled');
});

$( document ).on('click', '#docsfolderlist', function(e) {
    e.preventDefault();

    path = window.location.pathname;
    parts = path.split("/controller/");
    href = parts[0]+"/controller/servicesplatform/control/business/task/addDoc";

    doc = $(this).val();
    folder = $('input[name=docsfolderlist]:checked');
    _opener = $("#"+doc, window.opener.document);
    id = _opener.find('a.add-collection').attr('value');
    title = _opener.find('div.record a').text();
    url = _opener.find('a').attr('href');
    author = _opener.find('small').text();

    obj = new Object();
    obj.url = $.trim(url);
    obj.source = 'pesquisa.bvsalud.org';
    obj.author = $.trim(author);
    obj.title = $.trim(title);
    obj.id = $.trim(id);
    obj.userTK = unescape(getCookie('userTK'));

    $.post( href, obj, function(data) {
        if (isJSON(data)){
            response = $.parseJSON(data);
        }else{
            response = data;
        }

        href = parts[0]+"/controller/directories/control/business/task/movedoc";

        obj = new Object();
        obj.mode = 'persist';
        obj.document = $.trim(id);
        obj.fromDirectory = 0;
        obj.moveToDirectory = folder.val();
        obj.docsrc = btoa('pesquisa.bvsalud.org');

        if ( window.opener.navigator.userAgent.indexOf('gonative') > -1 ) {
            if(data == true){
                $.post( href, obj, function(data) {
                    alert(labels[LANG]['ADD_DOC_SUCCESS']+' '+folder.next().text());
                    window.close();
                });
            }else if(typeof response == 'object'){
                if ( response.dir == 'INCOMING_FOLDER' ) {
                    alert(labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']);
                } else {
                    alert(labels[LANG]['DOC_EXISTS']+' '+response.dir);
                }
                window.close();
            }else{
                alert(labels[LANG]['ADD_DOC_FAIL']);
                window.close();
            }
        } else {
            if(data == true){
                $.post( href, obj, function(data) {
                    var msg = labels[LANG]['ADD_DOC_SUCCESS']+' '+folder.next().text();
                    $('.alert').text(msg).show();
                });
            }else if(typeof response == 'object'){
                if ( response.dir == 'INCOMING_FOLDER' ) {
                    var msg = labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']+'.\n'+labels[LANG]['TRY_ANOTHER_DOC'];
                    $('.alert').text(msg).show();
                } else {
                    var msg = labels[LANG]['DOC_EXISTS']+' '+response.dir+'.\n'+labels[LANG]['TRY_ANOTHER_DOC'];
                    $('.alert').text(msg).show();
                }
            }else{
                var msg = labels[LANG]['ADD_DOC_FAIL'];
                $('.alert').text(msg).show();
            }
        }
    });
});

$( document ).on('click', '#docs-folder-list', function(e) {
    e.preventDefault();

    path = window.location.pathname;
    parts = path.split("/controller/");
    href = parts[0]+"/controller/servicesplatform/control/business/task/addDoc";

    doc = $(this).data('similar');
    folder = $('input[name=docsfolderlist]:checked');
    similar = $("#"+doc);
    id = similar.find('a.add-collection').data('similar');
    title = similar.find('a.doctitle').text();
    url = similar.find('a.doctitle').attr('href');
    author = similar.find('.boxAutor').text();

    obj = new Object();
    obj.url = $.trim(url);
    obj.source = 'pesquisa.bvsalud.org';
    obj.author = $.trim(author);
    obj.title = $.trim(title);
    obj.id = $.trim(id);
    obj.userTK = unescape(getCookie('userTK'));

    // alert(JSON.stringify(folder.val())); return false;

    $.post( href, obj, function(data) {
        if (isJSON(data)){
            response = $.parseJSON(data);
        }else{
            response = data;
        }

        href = parts[0]+"/controller/directories/control/business/task/movedoc";

        obj = new Object();
        obj.mode = 'persist';
        obj.document = $.trim(id);
        obj.fromDirectory = 0;
        obj.moveToDirectory = folder.val();
        obj.docsrc = btoa('pesquisa.bvsalud.org');

        if ( window.navigator.userAgent.indexOf('gonative') > -1 ) {
            if(data == true){
                $.post( href, obj, function(data) {
                    alert(labels[LANG]['ADD_DOC_SUCCESS']+' '+folder.next().text());
                    window.close();
                });
            }else if(typeof response == 'object'){
                if ( response.dir == 'INCOMING_FOLDER' ) {
                    alert(labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']);
                } else {
                    alert(labels[LANG]['DOC_EXISTS']+' '+response.dir);
                }
                window.close();
            }else{
                alert(labels[LANG]['ADD_DOC_FAIL']);
                window.close();
            }
        } else {
            if(data == true){
                $.post( href, obj, function(data) {
                    var msg = labels[LANG]['ADD_DOC_SUCCESS']+' '+folder.next().text();
                    $('.alert div.card-panel').removeClass('red light-blue darken-1').addClass('green');
                    $('.alert div.card-panel').addClass('green');
                    $('.alert span').text(msg);
                    $('.alert').show();
                });
            }else if(typeof response == 'object'){
                if ( response.dir == 'INCOMING_FOLDER' ) {
                    var msg = labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']+'.\n'+labels[LANG]['TRY_ANOTHER_DOC'];
                    $('.alert div.card-panel').removeClass('red green').addClass('light-blue darken-1');
                    $('.alert span').text(msg);
                    $('.alert').show();
                } else {
                    var msg = labels[LANG]['DOC_EXISTS']+' '+response.dir+'.\n'+labels[LANG]['TRY_ANOTHER_DOC'];
                    $('.alert div.card-panel').removeClass('red green').addClass('light-blue darken-1');
                    $('.alert span').text(msg);
                    $('.alert').show();
                }
            }else{
                var msg = labels[LANG]['ADD_DOC_FAIL'];
                $('.alert div.card-panel').removeClass('green light-blue darken-1').addClass('red');
                $('.alert div.card-panel').addClass('red');
                $('.alert span').text(msg);
                $('.alert').show();
            }
        }
    });
});

$('ul#profile-actions a.remove').click(function(){
    title = $('b.topictitle').text();
    url = $(this).data('source');
    $('#topic-title').text(title);
    $('#topic-url').attr('href', url);
});

/********** Related Documents Scripts **********/
$(document).on('click', 'a.related-docs, a.public-related-docs',
    function(e){
        e.preventDefault();
        _this = $(this);
        _this.prop('disabled', true);

        if ( $(this).is(".related-docs") ) {
            task = 'related';
        } else {
            task = 'public';
        }

        path = window.location.pathname;
        parts = path.split("/controller/");
        href = parts[0]+"/controller/suggesteddocs/control/business/task/"+task;

        content = $(this).closest('td').find('div.related_docs');
        title = $(this).closest('td').find('div.record a').text();

        obj = new Object();
        obj.sentence = $.trim(title);

        content.find('.related-list').hide();
        content.find('.related-list').find('small').remove();
        content.find('.related-loading').show();

        $.post( href, obj, function(data) {
            if (isJSON(data)){
                response = $.parseJSON(data);
            }else{
                response = data;
            }

            if (typeof response == 'object') {
                var html;
                var before = '<small><ol>';
                var after = '</ol></small>';

                html = before;
                $.each(response, function(index, res) {
                    html += '<li><a href="'+res.docURL+'" target="_blank">'+res.title.replace(/\\/g, '')+'</a></li>';
                });
                html += after;

                content.find('.related-loading').hide();
                content.find('.related-list').append(html).show();
            } else {
                content.find('.related-loading').hide();
                alert(content.find('.related-alert').text());
            }

            _this.prop('disabled', false);
        });
    }
);

$('.btn2Botoes a.related-docs, .btn2Buttons a.related-docs').click(
    function(e){
        e.preventDefault();
        _this = $(this);
        _this.prop('disabled', true);

        if ( $(this).is(".related-docs") ) {
            task = 'related';
        } else {
            task = 'public';
        }

        path = window.location.pathname;
        parts = path.split("/controller/");
        href = parts[0]+"/controller/suggesteddocs/control/business/task/"+task;

        content = $('#modal-related-docs');
        title = $(this).parent().siblings('div.record').find('a.doctitle').text();

        $('#ref-title').text(title);

        obj = new Object();
        obj.sentence = $.trim(title);

        content.find('.related-list').hide();
        content.find('.related-list').find('ol').remove();
        content.find('.related-loading').show();

        $.post( href, obj, function(data) {
            if (isJSON(data)){
                response = $.parseJSON(data);
            }else{
                response = data;
            }

            if (typeof response == 'object') {
                var html;
                var before = '<ol>';
                var after = '</ol>';

                html = before;
                $.each(response, function(index, res) {
                    html += '<li><a href="'+res.docURL+'" target="_blank">'+res.title.replace(/\\/g, '')+'</a></li>';
                });
                html += after;

                content.find('.related-loading').hide();
                content.find('.related-list').append(html).show();
            } else {
                content.find('.related-loading').hide();
                alert(content.find('.related-alert').text());
                $("#modal-related-docs").modal();
            }

            _this.prop('disabled', false);
        });
    }
);

/********** Bulk Actions Scripts **********/
$( document ).on('change', '.bulkactions', function(e) {
    e.preventDefault();

    option = $('.bulkactions option:selected').attr('class');
    href = $(this).val();

    documents = [];

    $("input:checkbox:checked").each(function(){
        documents.push($(this).val());
    });

    implode = documents.join();

    if ( implode ) {
        if ( 'bulkremovedoc' == option ) {
            response = confirm(labels[LANG]['REMOVE_DOCS']);
            if (response == true) {
                window.location.href = href+'/document/'+implode;
            }
        } else if ( 'bulkmovedoc' == option ) {
            window.open(href+'/document/'+implode,'','resizable=no,width=420,height=270');
        }
    }
});

/********** VHL Search History Scripts **********/
$(document).on('click', function (e) {
    operatorCombine();
    portalPopup();
    searchPopover();
    combinePopover();

    $('[data-toggle="popover"],[data-original-title]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {                
            (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
        }
    });
});

var operatorCombine = function () {
    $('a.operator').on('click', function(){
        var operator = $(this).text();
        var query    = $(this).parents().siblings('.combine').data('query');
        var filter   = $(this).parents().siblings('.combine').data('filter');
        var search   = $("input[name='q']").val();

        filter = ( filter !== '' && filter !== '*' ) ? ' AND ' + filter : '';
        search = ( search !== '' ) ? search + ' ' + operator + ' ' : '';

        $("input[name='q']").val(search +  '(' + query + filter + ')');
        $(this).parents().siblings('button.combine').click();
    });
};

operatorCombine();

var portalPopup = function () {
    $('button.portal').on('click', function(e){
        var portal = "http://pesquisa.bvsalud.org/portal";
        var query  = encodeURIComponent($(this).data('query'));
        var filter = encodeURIComponent($(this).data('filter'));
        var expr = ( filter != '*' && filter != '' ) ? '?q='+query+' AND '+filter : '?q='+query;

        window.open(portal+expr, '_blank');
    });
};

portalPopup();

var searchPopover = function () {
    $('button.search').popover({
        html : true,
        placement : 'bottom',
        title: labels[LANG]['VIEW_ON'],
        // trigger: 'manual',
        content: function() {
            var query  = encodeURIComponent($(this).parent().siblings('.search').data('query'));
            var filter = encodeURIComponent($(this).parent().siblings('.search').data('filter'));
            var origin = $(this).val();
            var portal = "http://pesquisa.bvsalud.org/portal";
            var label  = $(this).attr('data-label');
            var expr   = ( filter != '*' && filter != '' ) ? '?q=' + query + ' AND ' + filter : '?q=' + query;
            var html   = '<a href="' + origin + expr + '" target="_blank">' + label + '</a><br /><a href="' + portal + expr + '" target="_blank">' + labels[LANG]['VHL_PORTAL'] + '</a>';

            return html;
        }
    });
};

searchPopover();

var combinePopover = function () {
    $('button.combine').popover({
        html : true,
        placement : 'bottom',
        title: labels[LANG]['OPERATOR'],
        // trigger: 'manual',
        content : '<a class="operator">AND</a> | <a class="operator">OR</a> | <a class="operator">AND NOT</a>'
    });
};

combinePopover();

if (typeof DataTable != 'undefined' && $.isFunction(DataTable)) {
    $('.datatable-search').DataTable( {
        paging: false,
        ordering: false,
        info: false,
        searching: false,
        responsive: true
    } );
}

$('span.show-all').on('click', function(e){
    e.preventDefault();
    $(this).hide();
    $(this).next().show();
});
/*
$(document).on('click', '.btn-bell', function(e) {
    var txt = $('.alerts-confirm-dialog').text();
    var r = confirm(txt);

    if ( r == false ) {
        return false;
    } else {
        var total = $('.bs-alerts-modal-lg table.datatable-search tr:last td:first-child').text();
        
        if ( total >= 5 ) {
            var error = $('.alerts-error').text();
            alert(error);
            return false;
        }
    }
});
*/
$('.search-actions a.portal').on('click', function(e){
    var portal = "http://pesquisa.bvsalud.org/portal";
    var query  = encodeURIComponent($(this).data('query'));
    var filter = encodeURIComponent($(this).data('filter'));
    var expr = ( filter != '*' && filter != '' ) ? '?q='+query+' AND '+filter : '?q='+query;

    window.open(portal+expr, '_blank');
});

$('.search-actions a.combine').on('click', function(e){
    var query  = $(this).data('query');
    var filter = $(this).data('filter');
    var expr = ( filter != '*' && filter != '' ) ? query+' AND '+filter : query;
    $('#combine-q').val(expr);
});

$('a.btnOperator').on('click', function(){
    operator = $(this).text();
    
    $('a.btnOperator').removeClass('darken-1').addClass('darken-4');
    $(this).removeClass('darken-4').addClass('darken-1');
    $('#combine-more').show();
    $('.modal.bottom-sheet').css('max-height','80%');
});

$('a.btnCombine').on('click', function(){
    var query    = $(this).data('query');
    var filter   = $(this).data('filter');
    var search   = $("#combine-q").val();

    filter = ( filter !== '' && filter !== '*' ) ? ' AND ' + filter : '';
    search = ( search !== '' ) ? search + ' ' + operator + ' ' : '';

    $("#combine-q").val(search +  '(' + query + filter + ')');
    $( "#combine-q" ).focus();
    $('#btSearchModal').removeClass('disabled');
});

/********** Layout Scripts **********/
var setContentHeight = function () {
    // reset height
    $RIGHT_COL.css('min-height', $(window).height());

    var bodyHeight = $BODY.outerHeight(),
        footerHeight = $BODY.hasClass('footer_fixed') ? 0 : $FOOTER.outerHeight(),
        leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
        contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

    // normalize content
    contentHeight -= footerHeight + 2;

    $RIGHT_COL.css('min-height', contentHeight);
};

$('.left_col .collapse-menu').on('click', function() { $MENU_TOGGLE.click(); });

$MENU_TOGGLE.on('click', function() { setContentHeight(); });

setContentHeight();

/********** Miscellaneous Scripts **********/
$(document).on('click', '.toggle_data #public_data .fa-chevron-circle-up',
    function(e){
        _icon = $('.toggle_data #public_data .fa-chevron-circle-down');
        _icon.show();
        $(this).hide();
        $('.left_col.public_menu').hide();
    }
);

$(document).on('click', '.toggle_data #public_data .fa-chevron-circle-down',
    function(e){
        _icon = $('.toggle_data #public_data .fa-chevron-circle-up');
        _icon.show();
        $(this).hide();
        $('.left_col.public_menu').show();
    }
);

$(document).on('click', '.toggle_icons #toggle_list .fa-bars',
    function(e){
        _icon = $('.toggle_icons #toggle_list .fa-list');
        _icon.show();
        $(this).hide();
        $('.col-list').hide();
        $('.col-filter').show();
    }
);

$(document).on('click', '.toggle_icons #toggle_list .fa-list',
    function(e){
        _icon = $('.toggle_icons #toggle_list .fa-bars');
        _icon.show();
        $(this).hide();
        $('.col-list').show();
        $('.col-filter').hide();
    }
);

// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
// the "data-source" attribute of .modal-trigger must specify the url that will be ajaxed
$( document ).on('click', '.modal-ajax', function(){
    var url = $(this).data("source");
    var modal = $(this).attr('href');
    // clear modal content
    $( modal ).empty();
    // use other ajax submission type for post, put ...
    $.get( url, function( data ) {
        // use this method you need to handle the response from the view 
        // with rails Server-Generated JavaScript Responses this is portion will be in a .js.erb file  
        $( modal ).html(data);
    });
});

// opens the modal
// $('.modal-trigger').modal();

$( document ).on('click', '.btn2Botoes a.remove, .btn2Buttons a.remove', function(){
    title = $(this).data('title');
    url = $(this).data('source');
    $('#doc-title').text(title);
    $('#doc-url').attr('href', url);
});

$( document ).on('click', '.search-actions a.remove', function(){
    query = $(this).siblings('a.search-query').data('query');
    url = $(this).data('source');
    $('#search-query').text(query);
    $('#search-query-url').attr('href', url);
});
