<?php
class View_Sample_Member extends ViewModel
{

    public function view()
    {
        $this->user = Model_User::find_by_pk(1);
    }
}
?>
