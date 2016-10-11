<?php

class Templater
{

	public function Templater($template)
	{
		$this->name = $template;
		$this->template = file_get_contents($this->name, FILE_USE_INCLUDE_PATH);
	}


	/*
	 * pass a hash like that [ "variable_name" => value, ...]
	 *
	 */
	public function bind($named_variable_array)
	{
		foreach ($named_variable_array as $key => $value) {
			//implement kind of this magic http://stackoverflow.com/questions/5017582/php-looping-template-engine-from-scratch
			$this->template = preg_replace('/(\{\s+' . $key . '\s+\})/i', $value, $this->template);
			$this->template = preg_replace('/\{\s+LOOP:' . $key . '\s+\}', '<?php foreach ($value as $ELEMENT): $this->bind($ELEMENT); ?>', $this->template);
			$this->template = preg_replace('/\{\s+ENDLOOP:' . $key . '\s+\}/', '<?php $this->unwrap(); endforeach; ?>', $this->template);
		}
	}

	public function render()
	{
		echo $this->name;
		echo $this->template;
	}


	/*
		 *
		 * class TemplateEngine {
		function showVariable($name) {
			if (isset($this->data[$name])) {
				echo $this->data[$name];
			} else {
				echo '{' . $name . '}';
			}
		}
		function wrap($element) {
			$this->stack[] = $this->data;
			foreach ($element as $k => $v) {
				$this->data[$k] = $v;
			}
		}
		function unwrap() {
			$this->data = array_pop($this->stack);
		}
		function run() {
			ob_start ();
			eval (func_get_arg(0));
			return ob_get_clean();
		}
		function process($template, $data) {
			$this->data = $data;
			$this->stack = array();
			$template = str_replace('<', '<?php echo \'<\'; ?>', $template);
			$template = preg_replace('~\{(\w+)\}~', '<?php $this->showVariable(\'$1\'); ?>', $template);
			$template = preg_replace('~\{LOOP:(\w+)\}~', '<?php foreach ($this->data[\'$1\'] as $ELEMENT): $this->wrap($ELEMENT); ?>', $template);
			$template = preg_replace('~\{ENDLOOP:(\w+)\}~', '<?php $this->unwrap(); endforeach; ?>', $template);
			$template = '?>' . $template;
			return $this->run($template);
		}
	}
		 */
}