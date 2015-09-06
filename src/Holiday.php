<?php
class Holiday
{
    private $today;
    public function setToday(DateTime $today)
    {
        $this->today = $today;
    }

    public function IsTodayXmas()
    {
        $today = $this->today ? $this->today : new DateTime('now');

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