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
            $this->link = $_link;
            return true;
        } else {
            return false;
        }
    }
    public function close()
    {
        mysqli_close($this->link);
        return true;
    }
    public function read($id)
    {
        $result = mysqli_query($this->link, "SELECT data FROM session WHERE id = '".$id."' AND expires > '".date('Y-m-d H:i:s')."'");
        if ($row = mysqli_fetch_assoc($result)) {
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
            return true;
        } else {
            return false;
        }
    }
    public function destroy($id)
    {
        $result = mysqli_query($this->link, "DELETE FROM session WHERE id ='".$id."'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function gc($maxlifetime)
    {
        $result = mysqli_query($this->link, "DELETE FROM session WHERE ((UNIX_TIMESTAMP(expires) + ".$maxlifetime.") < ".$maxlifetime.")");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
$handler = new SysSession();
session_set_save_handler($handler, true);
session_start();
?>
