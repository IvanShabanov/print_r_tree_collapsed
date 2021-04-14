<?
function print_r_tree($data, $level = 0, $parent = '')
{
    $out = '';
    if ($level == 0) {
        $out .='<script  data-skip-moving="true">function showinner(el) {if(el.nextSibling.style.display == "block") {el.nextSibling.style.display = "none";} else {el.nextSibling.style.display = "block";};}; </script>';
    }

    if (is_array($data)) {
        foreach ($data as $key=>$val) {
            $item = '["'.$key. '"]';
            $out .= '<div><div onclick="showinner(this);">'.$parent.$item.' &nbsp; &nbsp; ('.count($val).')</div>';
            if (is_array($val)) {
                $out .= '<div style="display: none; padding: 20px; border: 1px solid #000;">';
                $out .= print_r_tree($val, $level + 1, $parent.$item);
                $out .= '</div>';
            } else {
                $out .= print_r_tree($val, $level + 1, $parent.$item);
            }
            $out .= '</div>';
        }
    } else {
        $out .= '<pre style="display: none;">'.str_replace('<' , '&lt;', $data).'</pre>';
    }
    if ($level == 0) {
        echo $out;
    }
    return $out;
};
