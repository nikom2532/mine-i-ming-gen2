		<td class='nortxt'><span id="tP2">&nbsp;</span>
				<script type="text/javascript">
					function tS(){ x=new Date(); x.setTime(x.getTime()); return x; } 
					function lZ(x){ return (x>9)?x:'0'+x; } 
					function tH(x){ if(x==0){ x=12; } return (x>12)?x-=12:x; } 
					function y4(x){ return (x<500)?x+1900:x+543; } 
					function dT(){ window.status=''+eval(oT)+'';  document.getElementById('tP2').innerHTML=eval(oT); setTimeout('dT()',1000); } 
					function aP(x){ return (x>11)?'pm':'am'; } var dN=new Array('Sunday ','Monday ','Tuesday ','Wednesday','Thursday','Friday','Saturday'),mN=new Array('Janurary','February','March','April','May','June','July','August','September','October','November','December'),oT="tS().getDate()+' '+mN[tS().getMonth()]+' '+y4(tS().getYear())+' '+' '+lZ(tS().getHours())+':'+lZ(tS().getMinutes())+':'+lZ(tS().getSeconds())+' ¹.'";
					if(!document.all){ window.onload=dT; }else{ dT(); }
				</script></td>
