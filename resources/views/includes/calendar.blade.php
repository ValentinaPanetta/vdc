<div class="container border border-secondary mt-5">
	

@php
    if(isset($_GET['prm'])){
    	$m=strip_tags($_GET['prm'])+strip_tags($_GET['chm']);
    }else{
    	$m=date("m");
    }
    $adj="";
    $d=date("d");
    $y=date("Y");
    $nd=date('t',mktime(0,0,0,$m,1,$y));
    $mn=date('n',mktime(0,0,0,$m,1,$y));
    $yn=date('Y',mktime(0,0,0,$m,1,$y));
    $j= date('w',mktime(0,0,0,$m,1,$y))-1;
    if($j=="-1"){
    	$j="6";
    }
    $MONTHS=array(1=>'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
    for($k=1; $k<=$j; $k++){$adj.="<td> </td>";}
    echo "Today is " . date("d/n/Y");
    $today = date("d/n/Y");
@endphp

  <table class="table table-bordered text-center">
    <div class="d-flex justify-content-around p-2 border-bottom border-secondary">
	    <div>
		     <a href="?prm={{$m}}&chm=-1">
				<button class="btn btn-success "><h2><</h2></button>
		     </a>
	    </div>
	    <div >
	     	<h2 class="text-success pt-1">{{$MONTHS[$mn]." ".$yn}}</h2>
	    </div>
	    <div>
		     <a href="?prm={{$m}}&chm=1">
				<button class="btn btn-success "><h2>></h2></button>
		     </a>
	    </div>
    </div>
    <tr>
    <td><strong>Lun</strong></td>
    <td><strong>Mar</strong></td>
    <td><strong>Mer</strong></td>
    <td><strong>Gio</strong></td>
    <td><strong>Ven</strong></td>
    <td><strong>Sab</strong></td>
    <td><strong>Dom</strong></td>
    </tr>
    <tr>
    @php
     for($i=1;$i<=$nd;$i++)
	    {	/*     date mysql format   ->".$i." ".$mn." ".$yn."<-        */

			$controller = $i."/".$mn."/".$yn;
			if($today == $controller){
				echo $adj."<td class='text-success border border-success'>
								<h5>".$i." ".$MONTHS[$mn]."   ".$yn."</h5>
							</td>";
			}else{
	    		echo $adj."<td>".$i." ".$MONTHS[$mn]."   ".$yn."</td>";
	    	}
	    	$adj='';
	    	$j++;
     		if($j==7){
     			echo"</tr><tr>";$j=0;
     		}
	     	
     	} 
      @endphp
    </tr>
   </table>
</div>