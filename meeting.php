class Meeting
{

    public $mdate;
    public $time;
    public $duration;
    public $location;
    public $employeeList;
    
    function __construct($mdate, $time, $duration, $location,$employeeList)
{
    if (!empty($mdate))
    {
        $this->id = $mdate;
    }
    if (!empty($time))
    {
        $this->title = $time;
    }
    if (!empty($duration))
    {
        $this->post = $duration;
    }
     if (!empty($location))
    {
        $this->post = $location;
    }
    if (!empty($employeeList))
    {
        $this->post = $employeeList;
    }
 
}