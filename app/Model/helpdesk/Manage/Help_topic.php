<?php
namespace App\Model\helpdesk\Manage;

use App\BaseModel;

class Help_topic extends BaseModel
{
    protected $table = 'help_topic';
    protected $fillable = [
        'id', 'topic', 'parent_topic', 'custom_form', 'department', 'ticket_status', 'priority',
        'sla_plan', 'thank_page', 'ticket_num_format', 'internal_notes', 'status', 'type', 'auto_assign',
        'auto_response',
    ];

    public function department()
    {
        $related = 'App\Model\helpdesk\Agent\Department';
        $foreignKey = 'department';
        return $this->belongsTo($related, $foreignKey);
    }

    public function delete()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        parent::delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
