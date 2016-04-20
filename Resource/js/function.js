function QueryString(name)
{
    var AllVars = window.location.search.substring(1);
    var Vars = AllVars.split("&");
    for (i = 0; i < Vars.length; i++)
    {
        var Var = Vars[i].split("=");
        if (Var[0] == name) return Var[1];
    }
    return "";
}
function setPageSubmit(page){
    var formname = 'mainform';
    document.forms[formname].method = 'get';
    $('form[name="'+formname+'"]').append('<input type="hidden" name="page" id="page" value="'+page+'" />');
    document.forms[formname].submit();
}