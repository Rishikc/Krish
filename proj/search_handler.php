<?php
session_start();
class btag
{
public $count=0;
public $bookid='';
 function _construct($count) {
    $this->count = $count;
  }

}



$j=0;
$books=array();
$count="count";
$bookid="bookid";
function countSort( $a, $b ) 
{
    return $a->count == $b->count ? 0 : ( $a->count > $b->count ) ? 1 : -1;
}
      
		$query=$_POST["q"];
		
		$tag=explode(' ',$query);
		
		$con=mysqli_connect('localhost','root','qwerty','delta');
		$datt=mysqli_query($con,"select * from bookdetails");
     while($roww=mysqli_fetch_array($datt) )
     {
     	 $books[$j]=new btag;
     	 
     	 $books[$j]->$bookid=$roww['book_id'];
     	  $j++;  
     	  
     	  
     }
     $j=0;
		$dat=mysqli_query($con,"select * from hash");
     while($row=mysqli_fetch_array($dat) )
     {
  			for($i=0;$i<count($tag);$i++)
		{ 
		    if(md5(strtoupper($tag[$i]))==$row['md5'])
		    {
		    	for($j=0;$j<count($books);$j++)
		    	{
		    	 if($books[$j]->$bookid==$row['book_id'])
		    	 {
		    	 	$books[$j]->$count++;
		    	 }
		    	}
		    }
		}			   	
     }
		usort( $books, 'countSort' );
rsort( $books);
echo "<table style='border-style:solid;border-size:1px;'>";
for($j=0;$j<count($books);$j++)
		    	{
		    	 if($books[$j]->$count>0)
		    	 {
		    	 	$dat=mysqli_query($con,"select * from bookdetails where book_id='".$books[$j]->$bookid."'");
		    	 	while($row=mysqli_fetch_array($dat) )
{

echo "<tr><td style='border-style:solid;border-size:1px;' >".$row['username']."</td><td style='border-style:solid;border-size:1px;'>".$row['bookname']."</td><td style='border-style:solid;border-size:1px;'>".$row['author']."</td><td style='border-style:solid;border-size:1px;'>".$row['lastupdated']."</td></tr>";
}
		    	 }
		    	}
echo "</table>";

?>