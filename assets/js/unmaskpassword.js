/*
 * from Moodle to unmask password
 */

function unmaskPassword(id) 
{
    var pw = document.getElementById(id);
    var chb = document.getElementById(id+'unmask');

    try 
    {
        // first try IE way - it can not set name attribute later
        if (chb.checked) 
        {
            var newpw = document.createElement('<input type="text" name="'+pw.name+'">');
        }
        else 
        {
        var newpw = document.createElement('<input type="password" name="'+pw.name+'">');
        }
        newpw.attributes['class'].nodeValue = pw.attributes['class'].nodeValue;
    }
    catch(e) 
    {
        var newpw = document.createElement('input');
        newpw.setAttribute('name', pw.name);
        if (chb.checked) 
        {
            newpw.setAttribute('type', 'text');
        } 
        else 
        {
            newpw.setAttribute('type', 'password');
        }
        newpw.setAttribute('class', pw.getAttribute('class'));
    }
    newpw.id = pw.id;
    newpw.size = pw.size;
    newpw.onblur = pw.onblur;
    newpw.onchange = pw.onchange;
    newpw.value = pw.value;
    pw.parentNode.replaceChild(newpw, pw);
}