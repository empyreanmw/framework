<?php
namespace App\validation\rules;

use App\validation\ValidationErrors;

trait TriesToPassARule {

    protected $message = [];
    protected $value;
    protected $options;
    protected $field;

    public function __construct($value, $field, $options)
    {
        $this->value = $value;
        $this->options = $options;
        $this->field = $field;
    }

    public function passes()
    {
        if ($this->rule()) {

            $this->setMessage();

            ValidationErrors::instance()->add($this->getMessage());

            redirect()->back();
        }

        return true;
    }

    protected function getMessage()
    {
        return $this->message;
    }
}
