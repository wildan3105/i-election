<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// shared_options : highcharts global settings, like interface or language
$config['shared_options'] = array(
    'chart' => array(
        'backgroundColor' => array(
            'linearGradient' => array(0, 0, 500, 500),
            'stops' => array(
                array(0, 'rgb(255, 255, 255)'),
                array(1, 'rgb(255, 255, 255)')
            )
        )
    ),
    'exporting' => array(
        'enabled' =>true,
        'enableImages' => true,
        'buttons' => array(
            'exportButton' => array (
                'enabled' =>true
            )
        )
    ),
	'colors' => array(
	'#1693A5', '#CDD7B6', '#69D2E7', '#6CDFEA', '#025D8C', '#0B8C8F', '#C0D8D8', '#D2E4FC', '#D9FFA9', '#0B8C8F'
	)
);

// Template Example
$config['chart_template'] = array(
    'chart' => array(
        'renderTo' => 'graph',
        'defaultSeriesType' => 'column',
        'backgroundColor' => array(
            'linearGradient' => array(0, 500, 0, 0),
            'stops' => array(
                array(0, 'rgb(255, 255, 255)'),
                array(1, 'rgb(255, 255, 255)')
            )
        ),
     ),
     'colors' => array(
          '#ED561B'
     ),
     'credits' => array(
         'enabled'=> true,
         
         'text'    => '364247',
        'href' => 'isjournal.wordpress.com'
     ),
    'exporting' => array(
        'enabled' =>true,
        'enableImages' => true,
        'buttons' => array(
            'exportButton' => array (
                'enabled' =>true
            )
        )
    ),
     'title' => array(
        'text' => 'Template from config file'
     ),
     'legend' => array(
         'enabled' => false
     ),
    'yAxis' => array(
        'title' => array(
            'text' => 'yAxis'
        )

    ),
    'xAxis' => array(
        'title' => array(
            'text' => 'xAxis'
        )
    ),
    'tooltip' => array(
        'shared' => true
    )
);

?>