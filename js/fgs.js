//var language;
//var clicked;
//var datepickers=[];
//var links=[];
//var statics=[];
//var dynamics=[];
var fgs;
var fgsConfirmSubmitMsg;
String.prototype.trim = function ()
{
    return this.replace(/^\s*/, "").replace(/\s*$/, "");
}
function fgsConfirmSubmit()
{

    if(fgsConfirmSubmitMsg)
    {
         var buf=fgsConfirmSubmitMsg;
         fgsConfirmSubmitMsg=null;
         return confirm(buf);
    }
    return true;
}
function fgsSetConfirmSubmitMsg(confirmMsg)
{
    fgsConfirmSubmitMsg= confirmMsg;
}
function ConvertBR(input)
{
    var output = "";
    for (var i = 0; i < input.length; i++)
    {
        if ((input.charCodeAt(i) == 13))
        {
           i++;
        }
        else
        {
            output += input.charAt(i);
        }
    }
    return output;
}
function inlineEdit1()
{
    obj=$(cell);
    obj.addClass('ajax');
    var column;
    var cellWindow=fgs.window;
    var pk;
    var apk;
    for(var i=0;i<fgs.grid.length;i++)
    {
        if(fgs.grid[i].unit==unit)
        {
            column=fgs.grid[i].column[iColumn];
            break;
        }
    }
    column.primary_key=primary_key;
    column.iRow=iRow;
    column.iColumn=iColumn;
    column.editboxId='editbox_'+iColumn+'_'.iRow;
    if(column.component=='ColumnInputText')
    {
        column.value=obj.text();
        obj.keydown(function(event)
        {
            if(event.which == 13)
            {
                event.preventDefault();
                updateCell(cell,iColumn,iRow,primary_key,controller,unit,trigger);

            }
        });
    }
    GridKit(column);
    var html=GridKit(column);
    obj.html(html);
    $('#'+column.editboxId).focus();
}

function inlineEdit()
{
    for(var i=0;i<fgs.grid.length;i++)
    {
        for(var j=0;j<fgs.grid[i].column.length;j++)
        {
            if(fgs.grid[i].column[j].component=='ColumnInputText')
            {
                setInputText(i,j);
            }
            else if(fgs.grid[i].column[j].component=='ColumnSelectOneMenu')
            {
                setSelectOneMenu(i,j);
            }
        }
    }
}
function setSelectOneMenu(iGrid,iColumn)
{
    var unit=fgs.grid[iGrid].unit;
    var tdClass='td.inline_'+unit+'_'+iColumn;
    var column=fgs.grid[iGrid].column[iColumn];
    var cellWindow=fgs.window;
    var controller=fgs.controller;
    var trigger='grid';
    $(tdClass).dblclick(function()
    {
        $('.ajax').html($('.ajax option:selected').text());
        $('.ajax').removeClass('ajax');
        $(this).addClass('ajax');
        $(this).html(GridKit(column,$(this).text()));
        $('#editbox').focus();
    });
    $(tdClass).keydown(function(event)
    {
        arr = $(this).attr('class').split( " " );
        if(event.which == 13)
        {
            event.preventDefault();
            $.ajax(
            {
                type: "POST",
                url:"cell_edit.php",
                data: "fgsw="+cellWindow+"&fgsc="+controller+"&fgsu="+unit+"&fgst="+trigger+"&primary_key="+arr[1]+"&field="+column.field+"&rowid="+column.rowid+"&irow=" +arr[2]+"&"+column.name+"="+ $("#editbox option:selected").val(),
                success: function(data)
                {
                    $('.ajax').html($("#editbox option:selected").text());
                    $('.ajax').removeClass('ajax');

                }
            });
        }
    });
    $(tdClass).change(function(event)
    {
        arr = $(this).attr('class').split( " " );
        $.ajax(
        {
            type: "POST",
            url:"cell_edit.php",
            data: "fgsw="+cellWindow+"&fgsc="+controller+"&fgsu="+unit+"&fgst="+trigger+"&primary_key="+arr[1]+"&field="+column.field+"&rowid="+column.rowid+"&irow=" +arr[2]+"&"+column.name+"="+ $("#editbox option:selected").val(),
            success: function(data)
            {
                $('.ajax').html($("#editbox option:selected").text());
                $('.ajax').removeClass('ajax');

            }
        });
    });
    $('#editbox').live('blur',function()
    {
        $('.ajax').html($('.ajax option:selected').text());
        $('.ajax').removeClass('ajax');
    });
}

function setInputText(iGrid,iColumn)
{
    var unit=fgs.grid[iGrid].unit;
    var tdClass='td.inline_'+unit+'_'+iColumn;
    var column=fgs.grid[iGrid].column[iColumn];
    var cellWindow=fgs.window;
    var controller=fgs.controller;
    var trigger='grid';
    $(tdClass).dblclick(function()
    {
        $('.ajax').html($('.ajax input').val());
        $('.ajax').removeClass('ajax');
        $(this).addClass('ajax');
        value=$(this).text();
        $(this).html(GridKit(column,$(this).text()));
        $('#editbox').focus();
    });
    $(tdClass).keydown(function(event)
    {
        arr = $(this).attr('class').split( " " );
        fieldValue=$('.ajax input').val();
        fieldValue=ConvertBR(fieldValue.trim());
        if(event.which == 13)
        {
            $.ajax(
            {
                type: "POST",
                url:"cell_edit.php",
                data: "fgsw="+cellWindow+"&fgsc="+controller+"&fgsu="+unit+"&fgst="+trigger+"&primary_key="+arr[1]+"&field="+column.field+"&rowid="+column.rowid+"&irow=" +arr[2]+"&"+column.name+"="+ fieldValue,
                success: function(data)
                {
                    $('.ajax').html($('.ajax input').val());
                    $('.ajax').removeClass('ajax');

                }
            });
            event.preventDefault();
        }
    });
    $('#editbox').live('blur',function()
    {
        $('.ajax').html($('.ajax input').val());
        $('.ajax').removeClass('ajax');
    });
}
function GridKit(column,value)
{
    var s;
    switch(column.component)
    {
        case 'ColumnInputText':
            s='<input class="ajax" id="editbox" name="'+column.name+'" size="'+column.size+'" maxlength="'+column.maxlength+'" value="' + value+'" type="text">';
            break;
        case 'ColumnSelectOneMenu':
            o=[];
            o[o.length]='<select class="ajax" id="editbox" name="'+column.name+'">\n';
            found=false;
            for(var i=0;i<column.options.length;i++)
            {
                id=column.options[i].id;
                name=column.options[i].name;
                if(id==='' && (value==='' || value===null) )
                {
                    selected='selected';
                    found=true;
                }
                if(!found && id==value)
                {
                    selected='selected';
                    found=true;
                }
                else
                {
                    selected='';
                }
                o[o.length]='<option value="'+id+'"'+selected+'>'+name+'</option>';
            }
            o[o.length]= '</select>';
            s= o.join('');
    }
    return s;
}
function noAction()
{
}
function disableEnterKey(e)
{
    var key;
    if(window.event)
    {
        key = window.event.keyCode;     //IE
    }
    else
    {
        key = e.which;     //firefox
    }
    if(key == 13)
    {
         return false;
    }
    else
    {
         return true;
    }
}
function preventEnter(oEvent)
{
    var key=  oEvent.keyCode;
    if(key==9)
    {
        return false;
    }
    if(key==13)
    {
        oEvent.cancelBubble = true;
        // IE
        if (window.event)
        {
            oEvent.returnValue = false;
        }
        // Firefox
        else
        {
            oEvent.preventDefault();
        }
    }
    return false;
}
function toggleRow(i,rowId,fieldName)
{
    var obj_box;
    var obj_box = $('#id_'+fieldName+'_'+i);
    var objRow=$('#'+rowId);
    if(obj_box.is(':checked'))
    {
        obj_box.attr('checked', false);
        objRow.removeClass('marked');
    }
    else
    {
        obj_box.attr('checked', true);
        objRow.addClass('marked');
    }
}
function toggleCheckbox(i,rowId,fieldName)
{
    var obj_box;
    var obj_box = $('#id_'+fieldName+'_'+i);
    var objRow=$('#'+rowId);
    if(obj_box.is(':checked'))
    {
        objRow.addClass('marked');
    }
    else
    {
        objRow.removeClass('marked');
    }
}
function setCheckboxes(do_check,id,n,initCheckBoxId,gridId)
{
   var obj_box;
   var objRow;
   for (var i = 0; i < n; i++)
   {
       obj_box = $('#id_'+id+'_'+i);
       obj_box.attr('checked', do_check);
       objRow=$('#'+gridId+'_'+i);
       if(do_check)
       {
           objRow.addClass('marked');
       }
       else
       {
           objRow.removeClass('marked');
       }
   }
   var obj_int = $('#'+initCheckBoxId);
   if(obj_int == null)
   {
      return false;
   }
   obj_int.attr('checked', do_check);
   return false;
}
function markAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            if ( checkbox.disabled == false ) {
                checkbox.checked = true;
                if ( typeof(marked_row[unique_id]) == 'undefined' || !marked_row[unique_id] ) {
                    rows[i].className += ' marked';
                    marked_row[unique_id] = true;
                }
            }
        }
    }

    return true;
}

/**
 * marks all rows and selects its first checkbox inside the given element
 * the given element is usaly a table or a div containing the table or tables
 *
 * @param    container    DOM element
 */
function unMarkAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            checkbox.checked = false;
            rows[i].className = rows[i].className.replace(' marked', '');
            marked_row[unique_id] = false;
        }
    }

    return true;
}
function toggleDebug()
{
    var obj=$('#debug_icon');
    var debugClass=obj.attr('class');
    if(debugClass=='icon_red_ball')
    {
        obj.removeClass('icon_red_ball');
        obj.addClass('icon_green_ball');
        debug=1;
    }
    else
    {
        obj.removeClass('icon_green_ball');
        obj.addClass('icon_red_ball');
        debug=0;
    }
    $.ajax
    (
        {
            type: "POST",
            url: "toggleDebug.php",
            data: "debug="+debug,
            success: function(msg)
            {
            }
        }
    );
}
function toggleMenu(id,iconId,role,menu_window)
{
    obj=$('#'+id);
    obj.toggle();
    var status = obj.is(':visible');
    var display;
    obj=$('#'+iconId)
    if(status)
    {

        obj.removeClass('icon_expand');
        obj.addClass('icon_collapse');
        display=1;
    }
    else
    {
        obj.removeClass('icon_collapse');
        obj.addClass('icon_expand');
        display=0;
    }

    $.ajax
    (
        {
            type: "POST",
            url: "toggleMenu.php",
            data: "window="+menu_window+"&role="+role+"&display="+display,
            success: function(msg)
            {
            }
        }
    );
}
function toggleSubmenu(anchor_id,option_id)
{
    obj=$('#'+option_id);
    obj.toggle();
    var status = obj.is(':visible');
    var display;
    obj=$('#'+anchor_id);
    if(status)
    {

        obj.removeClass('icon_expand');
        obj.addClass('icon_collapse');
        display=1;
    }
    else
    {
        obj.removeClass('icon_collapse');
        obj.addClass('icon_expand');
        display=0;
    }
}
function toggleFGS(fgsWindow,fgsController,fgsUnit,fgsSid,fgsType)
{
    var fgsClass='icon_invisible';
    id='#'+fgsSid+'_'+fgsType
    $(id).toggle();
    var status = $(id).is(':visible');
    var obj=$('#'+fgsSid+'_'+fgsType+'_icon');
    var display;
    if(status)
    {
        obj.removeClass('icon_visible');
        obj.addClass('icon_invisible');
        display=1;
    }
    else
    {
        obj.removeClass('icon_invisible');
        obj.addClass('icon_visible');
        display=0;
    }

    $.ajax
    (
        {
            type: "POST",
            url: "toggleFGS.php",
            data: "fgsw="+fgsWindow+"&fgsc="+fgsController+"&fgsu="+fgsUnit+"&fgst="+fgsType+"&display="+display,
            success: function(msg)
            {
            }
        }
    );
}
function setOneSelect(json,obj)
{
    var options = '';
    alert(json.length);
    for (var k = 0; k < json.length; k++)
    {
        options += '<option value="' + json[k].optionValue + '">' + json[k].optionDisplay + '</option>';
    }
    obj.html(options);
}
function setManyCheckbox(json,obj)
{
    var options = '';
    for (var k = 0; k < json.length; k++)
    {
        options += '<option value="' + json[k].optionValue + '">' + json[k].optionDisplay + '</option>';
    }
    obj.html(options);
}
function setManySelect(json,obj)
{
    var options = '';
    for (var k = 0; k < json.length; k++)
    {
        options += '<option value="' + json[k].optionValue + '">' + json[k].optionDisplay + '</option>';
    }
    obj.html(options);
}
function setRadio(json,obj)
{
    var options = '';
    for (var k = 0; k < json.length; k++)
    {
        options += '<option value="' + json[k].optionValue + '">' + json[k].optionDisplay + '</option>';
    }
    obj.html(options);
}
function confirmAction(aActions,aMessages)
{
    for (var i=0; i < aActions.length; i++)
    {
        var patternAction = new RegExp(aActions[i], "i");
        if(patternAction.test(clicked))
        {
            return confirm(aMessages[i]);
        }
    }
    return true;
}
function roundTo(base, precision)
{
    var m = Math.pow(10, precision);
    var a = Math.round(base * m) / m;
    return a;
}
function initControls()
{
    initDataPicker();
    initAutocomplete();
    inlineEdit();
    
}

function initDataPicker()
{
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
        'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
        'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.extend({showMonthAfterYear: false,duration: "",changeMonth: true,changeYear: true},$.datepicker.regional[fgs.language]));
    for (var i = 0; i < fgs.datepicker.length; i++)
    {
        id='#'+fgs.datepicker[i];
        $(id).datepicker();
    }
}
function loadOptions(iChain,iTier,url,rowid,callback,before_load,after_load)
{
    var objSelector;
    var objValue;
    var nextObj;
    var iObjSelector;
    var iObj;
    var iObjValue;
    if(before_load)
    {
        if(!before_load())
        {
            return;
        }
    }
    next=iTier+1;
    for(var i=next;i<fgs.chain[iChain].length;i++)
    {
        for(var j=0;j<fgs.chain[iChain][i].length;j++)
        {
            iObjSelector=fgs.chain[iChain][i][j].type+"[name='"+fgs.chain[iChain][i][j].name+"']";
            iObj=$(iObjSelector);
            iObj.attr("disabled","disabled");
        }
    }
    url_parameters=[];
    if(fgs.chainStatic[iChain])
    {
        for(var i=0;i<fgs.chainStatic[iChain].length;i++)
        {
            url_parameters[url_parameters.length]=fgs.chainStatic[iChain].parameter+'='+fgs.chainStatic[iChain].value;
        }
    }
    if(fgs.chainDynamic[iChain])
    {
        for(var i=0;i<fgs.chainDynamic[iChain].length;i++)
        {
            iObjSelector=fgs.chainDynamic[iChain].type+"[name='"+fgs.chainDynamic[iChain].name+"']";
            iObj=$(iObjSelector);
            iobjValue=iObj.getValue();

            url_parameters[url_parameters.length]=fgs.chainDynamic[iChain].parameter+'='+iobjValue;
        }
    }
    for(var i=0;i<next;i++)
    {
        for(var j=0;j<fgs.chain[iChain][i].length;j++)
        {
            iObjSelector=fgs.chain[iChain][i][j].type+"[name='"+fgs.chain[iChain][i][j].name+"']";
            iObj=$(iObjSelector);
            iobjValue=iObj.getValue();
            if(iobjValue.length==0)
            {
                return;
            }
            url_parameters[url_parameters.length]=fgs.chain[iChain][i][j].parameter+'='+iobjValue;
        }
    }
    last_element=url_parameters.length;
    url_parameters[last_element]='rowid='+fgs.chain[iChain][next][0].rowid;
    request_url=url+'?'+url_parameters.join("&");
    nextObjDiv=$('#'+'div_'+fgs.chain[iChain][next][0].id);
    $.get(request_url, function(data)
    {
        if(callback)
        {
            callback(data);
        }
        else
        {
            nextObjDiv.html(data);
        }
        if(fgs.chain[iChain][next][1])
        {
            url_parameters[last_element]='rowid='+fgs.chain[iChain][next][1].rowid;
            request_url=url+'?'+url_parameters.join("&");
            nextObjDiv=$('#'+'div_'+fgs.chain[iChain][next][1].id);
            $.get(request_url, function(data)
            {
                if(callback)
                {
                    callback(data);
                }
                else
                {
                    nextObjDiv.html(data);
                }
                if(fgs.chain[iChain][next][2])
                {
                    url_parameters[last_element]='rowid='+fgs.chain[iChain][next][2].rowid;
                    request_url=url+'?'+url_parameters.join("&");
                    nextObjDiv=$('#'+'div_'+fgs.chain[iChain][next][2].id);
                    $.get(request_url, function(data)
                    {
                        if(callback)
                        {
                            callback(data);
                        }
                        else
                        {
                            nextObjDiv.html(data);
                        }

                    });
                }

            });
        }

    });
    if(after_load)
    {
        after_load();
    }
    
}
function splitByToken( val,token )
{
    return val.split(token);
}
function extractLast( term,token )
{
    return splitByToken( term,token ).pop();
}
function initAutocomplete()
{

    for(var i=0;i<fgs.autocomplete.length;i++)
    {
        id="#"+fgs.autocomplete[i].id ;
        autocompleteStatic=fgs.autocompleteStatic[i];
        autocompleteDynamic=fgs.autocompleteDynamic[i];
        autocompleteV=fgs.autocomplete[i];
        if(fgs.autocomplete[i].callback)
        {
            $(id).autocomplete(
            {
                source: function(request, response)
                {
                    i=this.options.aIndex;
                    fgs.autocomplete[i].callback(request, response);
                },
                minLength: fgs.autocomplete[i].minLength,
                aIndex:i
            });
        }
        if(fgs.autocomplete[i].option)
        {
            var availableOptions=fgs.autocomplete[i].option;
            if(fgs.autocomplete[i].token)
            {
                $(id).bind( "keydown", function( event ){
                    if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                        event.preventDefault();
                    }
                });
                $(id).autocomplete(
                {
                    minLength: 0,
                    source: function( request, response ) {
                        i=this.options.aIndex;
                        // delegate back to autocomplete, but extract the last term
                        response( $.ui.autocomplete.filter(
                            fgs.autocomplete[i].option, extractLast( request.term,fgs.autocomplete[i].token ) ) );
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = splitByToken( this.value,fgs.autocomplete[i].token );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join(fgs.autocomplete[i].token );
                        return false;
                    },
                    aIndex:i
                    
                });
            }
            else
            {
                $(id).autocomplete(
                {
                    aIndex:i,
                    source: fgs.autocomplete[i].option

                });
            }
        }
        else if(fgs.autocomplete[i].token)
        {
            $(id).bind( "keydown", function( event ){
                if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            });
            $(id).autocomplete(
            {
                source: function(request, response)
                {
                    var s='';
                    i=this.options.aIndex;
                    for(var j=0;j<fgs.autocompleteStatic[i].length;j++)
                    {
                        s=s+'&'+fgs.autocompleteStatic[i][j].parameter+ '='+fgs.autocompleteStatic[i][j].value;
                    }
                    isEntered=true;
                    for(var j=0;j<autocompleteDynamic.length;j++)
                    {
                        iObjSelector=fgs.autocompleteDynamic[i][j].type+"[name='"+fgs.autocompleteDynamic[i][j].name+"']";
                        iObj=$(iObjSelector);
                        iobjValue=iObj.getValue();
                        if(iobjValue.length<1 && fgs.autocompleteDynamic[i][j].required)
                        {
                            isEntered=false;
                        }
                        s=s+'&'+fgs.autocompleteDynamic[i][j].parameter+ '='+iobjValue;
                    }
                    beforeRequest=true;
                    if(fgs.autocomplete[i].before_request)
                    {
                        beforeRequest=fgs.autocomplete[i].before_request();
                    }
                    if(beforeRequest&&isEntered)
                    {
                        $.ajax(
                        {
                            type: fgs.autocomplete[i].method,
                            dataType: fgs.autocomplete[i].dataType,
                            timeout: fgs.autocomplete[i].timeout,
                            url: fgs.autocomplete[i].url,
                            data: "term=" + request.term+s,
                            success: function(data)
                            {
                                response(data);
                                if(fgs.autocomplete[i].after_request)
                                {
                                    fgs.autocomplete[i].after_request();
                                }
                            }
                        });
                    }
                    else
                    {
                        response('');
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = splitByToken( this.value,fgs.autocomplete[i].token );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join(fgs.autocomplete[i].token );
                    return false;
                },
                minLength: fgs.autocomplete[i].minLength,
                aIndex:i

            });
        }
        else
        {

            $(id).autocomplete(
            {
                source: function(request, response)
                {
                    var s='';
                    i=this.options.aIndex;
                    for(var j=0;j<fgs.autocompleteStatic[i].length;j++)
                    {
                        s=s+'&'+fgs.autocompleteStatic[i][j].parameter+ '='+fgs.autocompleteStatic[i][j].value;
                    }
                    isEntered=true;
                    for(var j=0;j<autocompleteDynamic.length;j++)
                    {
                        iObjSelector=fgs.autocompleteDynamic[i][j].type+"[name='"+fgs.autocompleteDynamic[i][j].name+"']";
                        iObj=$(iObjSelector);
                        iobjValue=iObj.getValue();
                        if(iobjValue.length<1 && fgs.autocompleteDynamic[i][j].required)
                        {
                            isEntered=false;
                        }
                        s=s+'&'+fgs.autocompleteDynamic[i][j].parameter+ '='+iobjValue;
                    }
                    beforeRequest=true;
                    if(fgs.autocomplete[i].before_request)
                    {
                        beforeRequest=fgs.autocomplete[i].before_request();
                    }
                    if(beforeRequest&&isEntered)
                    {
                        $.ajax(
                        {
                            type: fgs.autocomplete[i].method,
                            dataType: fgs.autocomplete[i].dataType,
                            timeout: fgs.autocomplete[i].timeout,
                            url: fgs.autocomplete[i].url,
                            data: "term=" + request.term+s,
                            success: function(data)
                            {
                                response(data);
                                if(fgs.autocomplete[i].after_request)
                                {
                                    fgs.autocomplete[i].after_request();
                                }
                            }
                        });
                    }
                    else
                    {
                        response('');
                    }
                },
                minLength: fgs.autocomplete[i].minLength,
                aIndex:i
                
            });
        }
    }
}

