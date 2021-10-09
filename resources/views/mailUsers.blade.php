<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
  <tr>
    <td align="center" valign="top">
      <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
        <tr>
          <td align="left" valign="top">

            <a href="http://www.polarisdirect.net/resources/direct-marketers-toolbox/"><img 
                           src="http://docensa.ensa-learning.com/I/assets/media/image/cm-logo.png" style="width:600px;height:90px"></a>

            <p style="padding-top:10px;">Dear {{$data['name']}},</p>

            <p>{{$data['message']}}</p>

           
            
            <p>Happy mailing!</p>
            
            <p style="margin-bottom:0;">Sincerely,</p>
            <p style="margin-top:0; margin-bottom:0;">{{Auth::user()->name}}</p>
            <p style="margin-top:0; margin-bottom:0;"><a href="mailto:jmaloy2@polarisdirect.net?subject=RE: Keep an eye on your mailbox">{{Auth::user()->email}}</a></p>
            
          <!--  <p hidden>PS: Give us a call today at (603) 626-5800 to talk to our <a href="http://www.polarisdirect.net/services/strategic-marketing-services/">Strategic Marketing Services</a> team about re-investing your extra money into data-driven marketing.</p>  -->
            
            <p><small><em id="demo" ></em></small></p><br>
                        <script>
var d = new Date();
document.getElementById("demo").innerHTML = d;
</script>

            
        </td></tr>
      </table>
      </td>
  </tr>
</table>