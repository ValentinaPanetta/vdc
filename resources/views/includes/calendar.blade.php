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
    $MONTHS=array(1=>'Januar','Februar','März','April','Mai','Juni',
        'Juli','August','September','Oktober','November','Dezember');
    for($k=1; $k<=$j; $k++){$adj.="<td> </td>";}
   /* echo "Today is " . date("j-n-Y");*/
    $today = date("j-n-Y");
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
    <td><strong>Montag</strong></td>
    <td><strong>Dienstag</strong></td>
    <td><strong>Mittwoch</strong></td>
    <td><strong>Donnerstag</strong></td>
    <td><strong>Freitag</strong></td>
    <td><strong>Samstag</strong></td>
    <td><strong>Sonntag</strong></td>
    </tr>
    <tr>
    @php
    $my_course = ''; 
    $my_course=Array();
    $sper=Array();
     for($i=1;$i<=$nd;$i++)
	    {
        $con = '';	
		$going = $i."-".$mn."-".$yn; //current day in the loop  CONSULTINGS
        if($con_date != null){
                for($r=0; $r<count($con_date); $r++){

                    if($con_date[$r] == $going){ 
                    $con .= "   
                             <a href='consultings/".$con_id[$r]."' class='text-success'>
                             <p>".$con_title[$r]."</p>
                             </a>";  

                    }
                }
            }
            /*-------------------------------------------------COURSES*/
           
            if($course_start != null){

                for($z=0; $z<count($course_start); $z++){
     
                    if(date_create($course_start[$z]) <= date_create($going)){ 
                            if(date_create($course_end[$z]) >= date_create($going))
                                $my_course[$z] = "<a href='/courses/".$course_id[$z]."'><p class='bg-prz-".$z." '>".$course_name[$z]."</p></a>";     
                            else
                                 $my_course[$z] = '';
                        
                    }
                }
            }

            echo $adj."<td class=' font-weight-bold'>";
            if($going == $today)
                echo "<h2 class='font-italic text-primary'>".$i."</h2>";
            else
                echo "<h2 class=''>".$i."</h2>";

            echo $con;

            foreach ($my_course as $cours_date => $value){
                echo $value;
            }

            foreach ($sper as $element =>$op){

                echo $op;
}
            echo "</div></td>"; 
            /*---------------------------.-----------------.------Course reset*/    
         /*   if($course_end != null){
                for($z=0; $z<count($course_end); $z++){
                    if($course_end[$z] == $going){ 
                    $my_course[$z] ='';     
                    }
                }
            } */

            $j++;
	    	$adj='';    	
     		if($j==7){echo"</tr><tr>";$j=0;}
     	}  //end main for loop 



      @endphp
    </tr>
   </table>

</div>


