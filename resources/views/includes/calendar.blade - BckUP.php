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
   /* echo "Today is " . date("d-n-Y");*/
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
     for($i=1;$i<=$nd;$i++)
        {   
        $going = $i."-".$mn."-".$yn; //current day in the loop
        $match = false;             //default no consultings 
        if($con_date != null){
                for($r=0; $r<count($con_date); $r++){
                    if($con_date[$r] == $going){ //matched consultings    -->       print consulting
                        $j++;
                        $match = true;              // consulting found

                        if($today == $going) 
                            echo $adj."
                                <td class='text-success border border-success font-weight-bold'>
                                <a href='consultings/".$con_id[$r]."' class='text-success'>
                                <p>".$con_title[$r]."</p>
                                <h2 class='text-success font-italic'>".$i."</h2>
                                </a>
                                </td>";
                        else
                            echo $adj."
                                      <td class='text-success border border-success font-weight-bold'>
                                      <a href='consultings/".$con_id[$r]."' class='text-success'>
                                        <h2 class='font-italic'>".$i."</h2>
                                        <p>".$con_title[$r]."</p>
                                        </a>
                                      </div>
                                      </td>";
                    }
                }
            }//con_date != null
            if($match == false){ 
                                        //default no consultings today
                                      //   --> print normal days
                        $j++;
                        if($today == $going) 

                            echo $adj."<td>
                                            <h2 class='text-primary font-italic'>".$i."</h2> 
                                       </td>";  
                        else
                            echo $adj."<td><h4 class='font-italic p-2'>".$i."</h4></td>";       
            }

            $adj='';        
            if($j==7){echo"</tr><tr>";$j=0;}
        }  //end main for loop 



      @endphp
    </tr>
   </table>

</div>

