<?php
function thedaily_random_featured_records_html($recordType, $featuredRecords)
{
    $html = '';

    $recordSinglePartial = [
        'exhibit' => 'exhibit-builder/exhibits/single.php',
        'collection' => 'collections/single.php',
        'item' => 'items/single.php',
    ];

    if ($featuredRecords) {
        foreach ($featuredRecords as $featuredRecord) {
            $html .= get_view()->partial($recordSinglePartial[$recordType], array($recordType => $featuredRecord));
        }
    }

    if ($recordType == 'exhibit') {
        $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    }

    return $html;
}

function thedaily_get_random_featured_records($record, $num = 0, $hasImage = true)
{
    return get_records($record, array('featured' => 1,
                                     'sort_field' => 'random',
                                     'hasImage' => $hasImage), $num);
}

function thedaily_display_featured_records()
{
    $recordTypes = ['Exhibit', 'Collection', 'Item'];

    $randomRecordCount = 0;
    $randomRecordHtml = '';

    foreach ($recordTypes as $recordType) {
        $randomRecords = null;
        $randomRecords = thedaily_get_random_featured_records($recordType);

        if ((get_theme_option("Display Featured $recordType") !== '0') && ($randomRecords !== null)) {
            if ($recordType == 'Exhibit' && !plugin_is_active('ExhibitBuilder')) {
                return;
            }
            $randomRecordCount += count($randomRecords);
            $randomRecordHtml .= thedaily_random_featured_records_html(strtolower($recordType), $randomRecords);
        }
    }

    $html = '<div id="featured" class="layout-' . $randomRecordCount . '">';
    $html .= $randomRecordHtml;
    $html .= '</div>';

    return $html;
}


function thedaily_get_recent_items($num = 0, $hasImage = true)
{
    return get_records('Item', array('sort_field' => 'random',
                                    'hasImage' => $hasImage), $num);
}

// function thedaily_display_recent_items($num)
// {
//     $lastItemsHtml = '';
//
//     $lastItems = null;
//     $lastItems = thedaily_get_recent_items($num);
//
//     $lastItemsHtml .= thedaily_last_items_html($lastItems);
//
//     $html .= $lastItemsHtml;
//
//     return $html;
// }
//
// function thedaily_last_items_html($items)
// {
//     $html = '';
//
//     $recordSinglePartial = [
//         'item' => 'items/single.php',
//     ];
//
//     if ($items) {
//         foreach ($items as $item) {
//             $html .= '<div class="item-img">'
//             $html .= get_view()->partial($recordSinglePartial['item'], array('item' => $item));
//             $html .= '</div>'
//         }
//     }
//
//     return $html;
// }


?>
