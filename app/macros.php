<?php

Form::macro('title', function($title) {
   return '<div class="form-group">
      <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12">
      <h2>' . $title . '</h2>
      </div>
    </div>';
});

Form::macro('myText', function($name, $label, $type, $errors, $default = '') {
   return '<div class="form-group ' . ($errors->first($name) ? 'has-error' : '') . '">
     <label class="col-lg-3 col-md-3 col-sm-3 control-label" >' . $label . ': </label>
       <div class="col-lg-5 col-md-5 col-sm-7">
         <input type="' . $type . '" name="' . $name . '" value="' . (Form::old($name) ? Form::old($name) : $default)  . '" class="form-control"/>
       </div>
       <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 form_error">' .
         $errors->first($name) .
       '</div>
    </div>';
});

Form::macro('myTextArea', function($name, $label, $errors, $default = '') {
   return '<div class="form-group ' . ($errors->first($name) ? 'has-error' : '') . '">
     <label class="col-lg-3 col-md-3 col-sm-3 control-label" >' . $label . ': </label>
       <div class="col-lg-5 col-md-5 col-sm-7">
         <textarea name="' . $name . '"   class="form-control">' . (Form::old($name) ? Form::old($name) : $default) . '</textarea>
       </div>
       <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 form_error">' .
         $errors->first($name) .
       '</div>
    </div>';
});

Form::macro('myCKEDITOR', function($name, $label, $errors, $default = '') {
   return '<div class="form-group ' . ($errors->first($name) ? 'has-error' : '') . '">
     <label class="col-lg-3 col-md-3 col-sm-3 control-label" >' . $label . ': </label>
       <div class="col-lg-7 col-md-7 col-sm-7">
         <textarea name="' . $name . '"   class="form-control">' . (Form::old($name) ? Form::old($name) : $default) . '</textarea>
       </div>
       <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 form_error">' .
         $errors->first($name) .
       '</div>
    </div>';
});


Form::macro('mySelect', function($name, $label, $fields, $errors, $default = '') {
    $ret = '<div class="form-group">
      <label class="col-lg-3 col-md-3 col-sm-3 control-label" >' . $label . ': </label>
      <div class="col-lg-5 col-md-5 col-sm-7">
      <select class="form-control" name="' . $name . '">';
      foreach ( $fields as $field => $label ) {
         if ( $field == (Form::old($name) ? Form::old($name) : $default) ) {
           $ret = $ret . '<option selected value="' . $field . '">' . $label . '</option>';
         } else {
           $ret = $ret . '<option value="' . $field . '">' . $label . '</option>';
         }
      }
      $ret = $ret . '</select>
      </div>
      <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 form_error">' .
         $errors->first($name) .
      '</div>

    </div>';
  return $ret;
});

Form::macro('myFile', function($name, $errors) {
  return '<div class="form-group ' . ($errors->first($name) ? 'has-error' : '') . '">
     <label class="col-lg-3 col-md-3 col-sm-3 control-label" >File: </label>
       <div class="col-lg-5 col-md-5 col-sm-7">
         <input type="file" id="name" name="image" class="form-control"/>
       </div>
       <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 form_error">' .
         $errors->first($name) .
       '</div>
    </div>';
});

Form::macro('mySubmit', function($label) {
  return '<div class="form-group">
     <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9">
        <input type="submit" class="btn btn-primary" value="' . $label . '">
      </div>
    </div>';
});

Form::macro('myContainerOpen', function($id = "") {
  return '<div class="form-group">
     <div id="' . $id . '" class="col-lg-9 col-md-9 col-sm-9">';
});

Form::macro('myContainerClose', function() {
  return '</div>
  </div>';
});
