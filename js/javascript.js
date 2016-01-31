/* by pit */

function LoadValues(url,ck) {
    if (ck.length > 0)     {
        console.log(url);
        var url = url;
        XMLHTTP = GetBrowser();
        XMLHTTP.open("POST", url, true);
        XMLHTTP.send(null);
    }
    else    {
        document.getElementById("insert").innerHTML = "";
    } 
    
}
function StateChange() {
    console.log(XMLHTTP.readyState);
    if (XMLHTTP.readyState == 4)    {
        var R = document.getElementById("insert");
        R.innerHTML = XMLHTTP.responseText;
    }
}
function GetBrowser(WhichBrowser)
{
    if (navigator.userAgent.indexOf("MSIE") != (-1))
    {
        var Classe = "Msxml2.XMLHTTP";
        if (navigator.appVersion.indexOf("MSIE 5.5") != (-1));
        {
            Classe = "Microsoft.XMLHTTP";
        } 
        try
        {
            OggettoXMLHTTP = new ActiveXObject(Classe);
            OggettoXMLHTTP.onreadystatechange = WhichBrowser;
            return OggettoXMLHTTP;
        }
        catch(e)
        {
            alert("Errore: l'ActiveX non verrà eseguito!");
        }
    }
    else if (navigator.userAgent.indexOf("Mozilla") != (-1))
    {
        OggettoXMLHTTP = new XMLHttpRequest();
        OggettoXMLHTTP.onload = WhichBrowser;
        OggettoXMLHTTP.onerror = WhichBrowser;
        return OggettoXMLHTTP;
    }
    else
    {
        alert("L'esempio non funziona con altri browser!");
    }
}
function setCookie(name, value, last) {
    if (last) 
    {
        var now = new Date() ;
        var expires = new Date() ;
        expires.setTime(now.getTime()+(parseInt(last) * 365*24*60*60*1000)) ;
        document.cookie=name+'='+escape(value)+'; expires='+
        expires.toGMTString()+'; path=/';
    } 
    else 
    {
        document.cookie=name+'='+escape(value)+'; expires= ; path=/';
    }
}
