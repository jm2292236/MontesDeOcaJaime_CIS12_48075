<?php
//Mark E. Lehr
//July 2nd,2011
//Format Class
class Format
{
	//Formatting an ordered list
	public function OL($title,$all)
	{
		echo '<br>'.$title.'</br>';
		echo '<ol>';
		for($i=0;$i<count($all);$i++)
		{
			echo '<li>'.$all[$i].'</li>';
		}
		echo '</ol>';
	}
	
	//Formatting a descriptive ordered list
	public function OLD($title,$description,$all)
	{
		echo '<h3>',$title.'</h3>';
		echo '<ol>';
		for($i=0;$i<count($all);$i++)
		{
			echo '<li>'.$description[$i].' '.$all[$i].'</li>';
		}
		echo '</ol>';
	}
	
	//Formatting a table name
	public function TName($name)
	{
		echo '<h3>'.$name.'</h3>';
	}
	
	//Formatting a table heading
	public function THead($b,$w,$head)
	{
		echo '<table width='.$w.' border='.$b.'>';
		echo '<tr>';
		for($i=0;$i<count($head);$i++)
		{
			echo '<th>'.$head[$i].'</th>';
		}
		echo '</tr>';
	}
	
	//Formatting a table column
	public function TColumn($align,$begRow,$data,$endRow,$endTable)
	{
		if($begRow) echo '<tr align='.$align.'>';
		echo '<td>'.$data.'</td>';
		if($endRow) echo '</tr>';
		if($endRow&&$endTable) echo'</table>';
	}
}
?>