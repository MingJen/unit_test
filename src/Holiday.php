<?php
class Holiday
{

    public function IsTodayXmas()
    {
        $today = new DateTime('now');

        if (date_format($today, 'n') == 12 && date_format($today, 'j') == 25)
        {
           return "Merry Xmas!!";
        }
        else
        {
           return "Today is not Xmas";
        }
    }
}