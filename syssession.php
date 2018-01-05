<?php
require 'connection.php';
date_default_timezone_set('Asia/Jakarta');
class SysSession implements SessionHandlerInterface
{
    private $_link;

    public function open($savePath, $sessionName)
    {
        $_link = connect();
        if ($_link) {
            error_log("Opening ".$_COOKIE['PHPSESSID'], 0);
            $this->link = $_link;
            return true;
        } else {
            return false;
        }
    }
    public function close()
    {
        error_log("Closing", 0);
        mysqli_close($this->link);
        return true;
    }
    public function read($id)
    {
        $date = date('Y-m-d H:i:s');
        $result = mysqli_query($this->link, "SELECT data FROM session WHERE id = '".$id."' AND expires > '".$date."'");
        if ($row = mysqli_fetch_assoc($result)) {
            error_log("Reading ".$id." expires ".$date, 0);
            return $row['data'];
        } else {
            return "";
        }
    }
    public function write($id, $data)
    {
        $DateTime = date('Y-m-d H:i:s');
        $NewDateTime = date('Y-m-d H:i:s', strtotime($DateTime.' + 1 hour'));
        $result = mysqli_query($this->link, "REPLACE INTO session SET id = '".$id."', expires = '".$NewDateTime."', data = '".$data."'");
        if ($result) {
            error_log("Writing ".$id." data ".$data, 0);
            return true;
        } else {
            return false;
        }
    }
    public function destroy($id)
    {
        $result = mysqli_query($this->link, "DELETE FROM session WHERE id ='".$id."'");
        if ($result) {
            error_log("Destroying ".$id, 0);
            return true;
        } else {
            return false;
        }
    }
    public function gc($maxlifetime)
    {
        $result = mysqli_query($this->link, "DELETE FROM session WHERE ((UNIX_TIMESTAMP(expires) + ".$maxlifetime.") < ".$maxlifetime.")");
        if ($result) {
            error_log("GC ".$maxlifetime, 0);
            return true;
        } else {
            return false;
        }
    }
}
$handler = new SysSession();
session_set_save_handler($handler, true);
session_start(['use_only_cookies' => 0, 'use_trans_id' => 1]);
?>
