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
   /* echo "Today is " . date("d-n-Y");*/
    $today = date("d-n-Y");
@endphp

  <table class="table table-bordered text-center" id="calendar_table">
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
    <tr class="">
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
	    {	
		$going = $i."-".$mn."-".$yn; //current day in the loop
        $match = false;             //default no consultings 
        for($r=0; $r<count($con_date); $r++){
            if($con_date[$r] == $going){ //matched consultings    -->       print consulting
                $j++;
                echo $adj."<td class='text-success border border-success font-weight-bold'>
                        <a href='consultings/".$con_id[$r]."' class='text-success'>
                        <p>".$con_title[$r]."</p>
                        ";
                // is it today?
                if($today == $going) 
                    echo"<h2 class='text-success font-italic'>".$i."</h2>
                        <p class='text-success font-italic'>Today</p></a>
                        </td>";
                else
                    echo $i ."</a></td>";
                $match = true;              // consulting found
            }
        }
           
            if($match == false){ 
               $catch = false;     //default no consultings today
                for($z=0; $z<count($un_date); $z++){ 
                    if($going == $un_date[$z]){  //               -->print consulting not in
                        $catch = true;$j++; 
                            if($today == $going) 
                                echo $adj."<td>
                                            <a href='consultings/".$un_id[$z]."' class='text-info'>
                                            <p class=''>".$un_title[$z]."</p>
                                            <h2 class='text-success font-italic'>".$i."</h2>
                                            <p class='text-success font-italic'>Today</p>
                                            </a>
                                            </td>";  
                            else
                                echo $adj."<td>
                                            <a href='consultings/".$un_id[$z]."' class='text-info'>
                                            <p class=''>".$un_title[$z]."</p>".$i."</a>
                                            </td>" ; 
                    }     
                } 
                if($catch == false){                           //   --> print normal days
                        $j++;
                        if($today == $going) 
                            echo $adj."<td>
                                            <h2 class='text-danger font-italic'><p></p>".$i."</h2>
                                            <p class='text-success font-italic'>Today</p>
                                       </td>";  
                        else
                            echo $adj."<td><p></p>".$i."</td>";
                    }
            }
	    	$adj='';    	
     		if($j==7){echo"</tr><tr>";$j=0;}
     	}  //end main for loop 

   
      @endphp
    </tr>
   </table>
</div>

