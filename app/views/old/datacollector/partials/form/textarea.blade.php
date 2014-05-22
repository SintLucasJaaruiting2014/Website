{{ Form::textarea($name, isset($value) ? $value : null, array('class' => 'form-control', 'rows' => (isset($rows) ? (int) $rows : 3), 'maxlength' => isset($maxlength) ? $maxlength : 300)) }}
