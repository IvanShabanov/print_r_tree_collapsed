<?
function print_r_tree($data, $level = 0, $parent = '')
{
    $out = '';
    if ($level == 0) {
        $out .='<script  data-skip-moving="true">function showinner(el) {if(el.nextSibling.style.display == "block") {el.nextSibling.style.display = "none";} else {el.nextSibling.style.display = "block";};}; </script>';
    }
    $type = gettype($data);
    if ($type == 'array') {
        foreach ($data as $key=>$val) {
            $item = '["'.$key. '"]';
            $value =
            $out .= '<div><div onclick="showinner(this);">'.$parent.$item.' &nbsp; &nbsp; ('.count($val).') &nbsp; &nbsp; '.$type. '</div>';
            $out .= '<div style="display: none; padding: 20px; border: 1px solid #000;">';
            $out .= print_r_tree($val, $level + 1, $parent.$item);
            $out .= '</div>';
            $out .= '</div>';
        }
    } else if ($type == 'boolean') {
        if ($data) {
            $out .= '<pre style="display: none;">TRUE</pre>';
        } else {
            $out .= '<pre style="display: none;">FALSE</pre>';
        }
    } else if (in_array($type , array('integer', 'double', 'float', 'string')) ){
        $out .= '<pre style="display: none;">'.str_replace('<' , '&lt;', $data).'</pre>';
    } else {
        $out .= '<pre style="display: none;">'.print_r($data, true).'</pre>';
    };
    if ($level == 0) {
        echo $out;
    };
    return $out;
};
