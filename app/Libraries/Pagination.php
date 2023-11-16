<?php

namespace App\Libraries;

class Pagination
{
    public static function pageCurrent()
    {
        return $_REQUEST['page'] ?? 1;
    }
    public static function pageOffset($current,$limit)
    {
        return ($current-1) * $limit;
    }
    public static function pageLink($total, $current, $limit, $url = '')
    {
        if ($total == 0) return '';
        $numPage = floor($total / $limit);
        if (($total / $limit) - $numPage > 0) {
            $numPage += 1;
        }
        $html = "<ul class='pagination justify-content-center'>";
        if ($numPage == 1) {
            return '';
        }
        if ($current == 1) {
            $html .= "<li class='page-item'><a class='page-link'>Trang đầu </a></li> ";
            $html .= "<li class='page-item'><a class='page-link'>Trước </a></li> ";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=1'>Trang đầu</a> </li> ";
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current - 1) . "'>Trước</a> </li> ";
        }
        if ($current <= 3) {
            for ($i = 1; ($i <= 5) and ($i <= $numPage); $i++) {
                if ($i == $current) {
                    $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                } else {
                    $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
                }
            }
        } else {
            if ($numPage >= $current + 2) {
                for ($i = $current - 2; ($i <= $current + 2) and ($i <= $numPage); $i++) {
                    if ($i == $current) {
                        $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                    } else {
                        $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a> </li> ";
                    }
                }
            } else {
                for ($i = $numPage - 4; $i <= $numPage; $i++) {
                    if ($i > 0) {
                        if ($i == $current) {
                            $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                        } else {
                            $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a> </li> ";
                        }
                    }
                }
            }
        }
        if ($current == $numPage) {
            $html .= "<li class='page-item'><a class='page-link'>Sau </a></li> ";
            $html .= "<li class='page-item'><a class='page-link'>Trang cuối</a></li>";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current + 1) . "'>Sau</a> </li> ";
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=$numPage'>Trang cuối</a></li>";
        }
        $html .= "</ul>";
        return $html;
    }
}
