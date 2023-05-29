<?php
class AllStudentsView {
 $Students;
public function output(){
    $html =  "<table>";

    foreach($this->students as $student ){
        $html .= "<tr>";

        $html .= "<td>";
        $html .= $student->name;
        $html .= "</td>";

        $html .= "<td>";
        $html .= $student->gba;
        $html .= "</td>";

        $html .= "<td>";
        $html .= $student->number;
        $html .= "</td>";

        $html .= "<td>";
        $html .= $student->Specialization;
        $html .= "</td>";

        $html .= "<td>";
        $html .= $student->Email;
        $html .= "</td>";

        $html .= "</tr>";
} 
$html  .="</table>";
}
}
   
?>

