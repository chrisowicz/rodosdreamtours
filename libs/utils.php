<?php
function generatePagination($paged, $loop) {

    $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $paged ),
            'total' => $loop->max_num_pages,
            'prev_text' => '«',
            'next_text' => '»',
            'type' => 'list'
        ) );
}

function cutText($text, $maxLength) {
    
    $maxLength++;

    $return = '';
    if (mb_strlen($text) > $maxLength) {
        $subex = mb_substr($text, 0, $maxLength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            $return = mb_substr($subex, 0, $excut);
        } else {
            $return = $subex;
        }
        $return .= '[...]';
    } else {
        $return = $text;
    }
    
    return $return;
}

function cut_the_title($maxLength) {
    echo cutText(get_the_title(), $maxLength);
}

function the_excerpt_max_charlength($charlength) {
    echo cutText(get_the_excerpt(), $charlength);
}

function getQueryParams()
{
  global $query_string;
  $parts = explode('&', $query_string);

  $return = array();
  foreach ($parts as $part) {
    $tmp = explode('=', $part);
    $return[$tmp[0]] = trim(urldecode($tmp[1]));
  }

  return $return;
}  
function getQuerySingleParam($name)
{
  $qparams = getQueryParams();

  if (isset($qparams[$name])) {
    return $qparams[$name];
  }

  return NULL;
}

function gp($title) {
  echo '<a id="wandachowicz" href="https://wandachowicz.com" title="'.$title.'" target="_blank" aria-label="'.$title.'" rel="noreferrer">
  <svg width="55px" height="50px" viewBox="0 0 56 51" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
      <g transform="matrix(1,0,0,1,-4063,-6382)">
          <g transform="matrix(1,0,0,6.00278,2248.29,0)">
              <g id="wandachowicz" transform="matrix(0.697399,0,0,0.116179,1865.29,1067.93)">
                  <path d="M0,-7.425L-13.572,-2.053L-13.572,-5.1L-3.766,-9.001L-13.572,-12.902L-13.572,-15.972L0,-10.576L0,-7.425ZM-23.987,0.689L-27.006,0.689L-19.58,-19.269L-16.534,-19.269L-23.987,0.689ZM-30.878,-2.24L-34.777,-2.24L-37.237,-11.511L-37.29,-11.511L-39.64,-2.24L-43.568,-2.24L-47.95,-16.053L-43.942,-16.053L-41.404,-6.675L-41.351,-6.675L-39.053,-16.053L-35.365,-16.053L-33.015,-6.703L-32.961,-6.703L-30.425,-16.053L-26.522,-16.053L-30.878,-2.24ZM-51.899,-12.902L-61.705,-9.001L-51.899,-5.1L-51.899,-2.053L-65.471,-7.425L-65.471,-10.576L-51.899,-15.972L-51.899,-12.902ZM3.602,-22.243C1.496,-26.007 -1.368,-29.168 -4.987,-31.736C-8.608,-34.299 -12.796,-36.243 -17.542,-37.569C-22.288,-38.899 -27.354,-39.56 -32.736,-39.56C-38.12,-39.56 -43.209,-38.899 -48.007,-37.569C-52.801,-36.243 -56.984,-34.299 -60.557,-31.736C-64.131,-29.168 -66.968,-26.007 -69.073,-22.243C-71.176,-18.482 -72.229,-14.161 -72.229,-9.287C-72.229,-4.412 -71.176,-0.097 -69.073,3.668C-66.968,7.429 -64.131,10.593 -60.557,13.156C-56.984,15.723 -52.801,17.664 -48.007,18.994C-43.209,20.319 -38.12,20.979 -32.736,20.979C-31.354,20.979 -29.993,20.934 -28.652,20.846L-32.887,32.135L-20.128,20.932L-18.079,19.134C-17.901,19.086 -17.72,19.044 -17.542,18.994C-12.796,17.664 -8.608,15.723 -4.987,13.156C-1.368,10.593 1.496,7.429 3.602,3.668C5.702,-0.097 6.758,-4.412 6.758,-9.287C6.758,-14.161 5.702,-18.482 3.602,-22.243" style="fill:rgb(135,135,135);fill-rule:nonzero;"/>
              </g>
          </g>
      </g>
  </svg>
  </a>';
}