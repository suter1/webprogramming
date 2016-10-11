<?php

class Templater {

    public function Templater($template){
        $this->name = $template;
        $this->template = file_get_contents($this->name, FILE_USE_INCLUDE_PATH);
    }


    /*
     * pass a hash like that [ "variable_name" => value, ...]
     *
     */
    public function bind($named_variable_array){
        foreach ($named_variable_array as $key => $value){
            //implement kind of this magic http://stackoverflow.com/questions/5017582/php-looping-template-engine-from-scratch
           $this->template = preg_replace('/(\{\s+' . $key . '\s+\})/i', $value, $this->template);
           $this->template = preg_replace('/\{\s+LOOP:'. $key . '\s+\}', '<?php foreach ($value as $ELEMENT): $this->bind($ELEMENT); ?>', $this->template);
           $this->template = preg_replace('/\{\s+ENDLOOP:'. $key . '\s+\}/', '<?php $this->unwrap(); endforeach; ?>', $this->template);
        }
    }

    public function render(){
        echo $this->name;
        echo $this->template;
    }
}