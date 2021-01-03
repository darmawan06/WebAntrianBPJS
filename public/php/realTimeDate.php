
<?php 
    function translateId($hari){
        switch($hari){
            case "Senin":
                return "Monday";
            break;
            case "Selasa":
                return "Tuesday";
            break;
            case "Rabu":
                return "Wednesday";
            break;
            case "Kamis":
                return "Thursday";
            break;
            case "Jumat":
                return "Friday";
            break;
            case "Sabtu":
                return "Saturday";
            break;
            case "Minggu":
                return "Sunday";
            break;
            default:
                return $hari;
        }
    }
    
    function translateEng($hari){
        switch($hari){
            case "Monday":
                return "Senin";
            break;
            case "Tuersday":
                return "Selasa";
            break;
            case "Wednesday":
                return "Rabu";
            break;
            case "Thursday":
                return "Kamis";
            break;
            case "Friday":
                return "Jumat";
            break;
            case "Saturday":
                return "Sabtu";
            break;
            case "Sunday":
                return "Minggu";
            break;
            default:
                return $hari;
        }
    }
    function searchDate($day){
        $i = 0;
        $date;
        while($day != date("l",strtotime("+{$i} day"))){
            $i++;
            $date = date("j F Y",strtotime("+{$i} day"));
        }
        return $date;
    }
    
?>
