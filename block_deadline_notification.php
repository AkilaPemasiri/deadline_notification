<?php
class block_deadline_notification extends block_base{
    
    public function init(){
        
        $this->title = get_string('deadline_notification', 'block_deadline_notification');
    }
      public function get_content() {
        global $USER, $CFG, $DB;
        $user = $USER->id; //username of the current user
        $prf = $CFG->prefix;  //perfix of the moodle tables
        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        //content of the block which is to be displayed
        $this->content = new stdClass;
        $this->content->text = get_string('wantservice', 'block_deadline_notification');
        $this->content->text .= '<form id="form1" name="form1" method="post" action="">';
        $this->content->text .= '<table width="120" border="0"><tr>';
        $this->content->text .= '<td width= "120"><input type = "display" name= "adress_label" value="' . get_string('view', 'block_quiz_notification') . '" readonly align="left"/></td></tr>';
        $this->content->text .= '<tr><td width= "120"><input type = "text" name= "id_val" value="' . get_string('view1', 'block_quiz_notification') . '"a align="left"/></td>';
        $this->content->text .= ' </tr></table>';

        //     $this->content->text .=      </table>';
        $this->content->text .= '<tr>';
        $this->content->text .= '<td width="60"><input type="submit" name="ok" id="button" value="' . get_string('yes', 'block_quiz_notification') . '" a align="left"/></td>';
        $this->content->text .= '<td width="60"><input type="submit" name="no" id="button" value="' . get_string('no', 'block_quiz_notification') . '" a align="right"/></td>';
        $this->content->text .= '</tr> </table>';
        $this->content->text .= '</form>';
///************************************************************///
///************************************************************///
///************************************************************///
        //here onwards did not check the code//

      
///************************************************************///
///************************************************************///
///************************************************************///
    }
    public function cron(){
        
        
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
